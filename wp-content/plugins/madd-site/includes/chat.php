<?php
/**
 * AI chat assistant (floating "Ask MADD" button on every page).
 *
 * - The browser posts the conversation to REST madd/v1/chat. WordPress adds a plain-text digest of the
 *   site's own pages ("knowledge") and forwards it server-to-server to MADD
 *   POST {API URL}/public/v1/ai-chat with the API key of MADD Rate Quote — the key never reaches the page.
 *   MADD runs the AI (the key's OpenAI settings) and the live rate / tracking lookups.
 * - Knowledge: every published page, the FAQ and the Shipping Guide articles, as text with their URLs;
 *   cached, rebuilt whenever a page or article is saved.
 * - On/off: option "madd_chat_enabled" (Settings › MADD Chat), or MADD_CHAT_ENABLED in wp-config.php
 *   (wins over the option). Needs the MADD API URL + key of MADD Rate Quote.
 */

if (! defined('ABSPATH')) {
    exit;
}

const MADD_CHAT_KNOWLEDGE = 'madd_chat_knowledge';

function madd_chat_enabled()
{
    $on = defined('MADD_CHAT_ENABLED') ? (bool) MADD_CHAT_ENABLED : (bool) get_option('madd_chat_enabled');
    if (! $on || ! class_exists('Madd_Rate_Quote')) {
        return false;
    }
    $s = Madd_Rate_Quote::settings();

    return $s['api_url'] && $s['api_key'];
}

// ---------------------------------------------------------------- knowledge digest

function madd_chat_text($html)
{
    $html = preg_replace('#<!--.*?-->#s', '', (string) $html);
    $html = strip_shortcodes($html);
    $html = preg_replace('#<(script|style|form|iframe|svg)[^>]*>.*?</\1>#is', ' ', $html);
    $html = preg_replace('#<(br|/p|/h\d|/li|/tr|/details|summary)[^>]*>#i', "\n", $html);
    $text = html_entity_decode(wp_strip_all_tags($html), ENT_QUOTES, 'UTF-8');
    $text = preg_replace("/[ \t\x{00A0}]+/u", ' ', $text);

    return trim(preg_replace("/\n\s*\n+/", "\n", $text));
}

function madd_chat_knowledge()
{
    $cached = get_transient(MADD_CHAT_KNOWLEDGE);
    if (is_string($cached) && $cached !== '') {
        return $cached;
    }
    $parts = [];
    $pages = get_posts(['post_type' => 'page', 'post_status' => 'publish', 'numberposts' => -1, 'orderby' => 'menu_order ID', 'order' => 'ASC']);
    $posts = get_posts(['post_type' => 'post', 'post_status' => 'publish', 'numberposts' => 50]);
    foreach (array_merge($pages, $posts) as $p) {
        $text = madd_chat_text($p->post_content);
        if (mb_strlen($text) < 40) {
            continue;
        }
        // relative links: the digest is cached in the database shared by every host of the site
        $parts[] = '## '.get_the_title($p).' — '.wp_make_link_relative(get_permalink($p))."\n".mb_substr($text, 0, 6000);
    }
    // footer: contact channels and branch list
    foreach ((array) get_option('widget_block', []) as $w) {
        if (is_array($w) && ! empty($w['content']) && preg_match('/Contact us|Our Branch/', $w['content'])) {
            $parts[] = madd_chat_text($w['content']);
        }
    }
    $out = mb_substr(implode("\n\n", $parts), 0, 58000);
    set_transient(MADD_CHAT_KNOWLEDGE, $out, 12 * HOUR_IN_SECONDS);

    return $out;
}

add_action('save_post', function ($id, $post) {
    if (in_array($post->post_type, ['page', 'post'], true)) {
        delete_transient(MADD_CHAT_KNOWLEDGE);
    }
}, 10, 2);

// ---------------------------------------------------------------- REST proxy

add_action('rest_api_init', function () {
    register_rest_route('madd/v1', '/chat', [
        'methods' => 'POST',
        'permission_callback' => '__return_true',
        'callback' => 'madd_chat_send',
    ]);
});

function madd_chat_send(WP_REST_Request $req)
{
    if (! madd_chat_enabled()) {
        return new WP_Error('chat_off', 'Chat is not available.', ['status' => 503]);
    }
    $messages = [];
    foreach (array_slice((array) $req->get_param('messages'), -12) as $m) {
        $role = ($m['role'] ?? '') === 'assistant' ? 'assistant' : 'user';
        $content = trim(mb_substr(sanitize_textarea_field((string) ($m['content'] ?? '')), 0, 1500));
        if ($content !== '') {
            $messages[] = ['role' => $role, 'content' => $content];
        }
    }
    if (! $messages || end($messages)['role'] !== 'user') {
        return new WP_Error('invalid', 'Please type a message.', ['status' => 422]);
    }

    $s = Madd_Rate_Quote::settings();
    $url = preg_replace('#/public(/v1)?(/.*)?$#', '', untrailingslashit($s['api_url'])).'/public/v1/ai-chat';
    $ip = filter_var($_SERVER['REMOTE_ADDR'] ?? '', FILTER_VALIDATE_IP) ?: '';
    $args = [
        'timeout' => 60,
        'headers' => ['Authorization' => 'Bearer '.$s['api_key'], 'Accept' => 'application/json', 'Content-Type' => 'application/json', 'X-End-User-IP' => $ip],
        'body' => wp_json_encode(['messages' => $messages, 'knowledge' => madd_chat_knowledge()]),
    ];
    $started = microtime(true);
    $res = wp_remote_post($url, $args);
    if (is_wp_error($res)) { // one retry on a network error
        $res = wp_remote_post($url, $args);
    }
    // last failure kept for Settings › MADD Chat (the visitor only sees a generic message)
    $fail = is_wp_error($res) ? $res->get_error_message() : ((int) wp_remote_retrieve_response_code($res) !== 200 ? 'HTTP '.wp_remote_retrieve_response_code($res).' '.mb_substr(wp_remote_retrieve_body($res), 0, 300) : '');
    if ($fail) {
        update_option('madd_chat_last_error', ['time' => current_time('mysql'), 'host' => wp_parse_url(home_url(), PHP_URL_HOST), 'seconds' => round(microtime(true) - $started, 1), 'error' => $fail], false);
    }
    if (is_wp_error($res)) {
        return new WP_Error('unreachable', 'Sorry, the assistant is not available right now.', ['status' => 502, 'admin' => current_user_can('manage_options') ? $res->get_error_message() : null]);
    }
    $code = (int) wp_remote_retrieve_response_code($res);
    $data = json_decode(wp_remote_retrieve_body($res), true);
    if ($code !== 200 || ! is_array($data)) {
        $msg = $code === 429 ? 'You are sending messages very quickly — please wait a moment and try again.' : 'Sorry, the assistant is not available right now.';

        return new WP_Error($data['error']['code'] ?? 'http_'.$code, $msg, ['status' => $code === 429 ? 429 : 502]);
    }

    return [
        'reply' => (string) ($data['reply'] ?? ''),
        'quotes' => array_values((array) ($data['quotes'] ?? [])),
        'tracking' => array_values((array) ($data['tracking'] ?? [])),
    ];
}

// ---------------------------------------------------------------- settings (on / off)

add_action('admin_menu', function () {
    add_options_page('MADD Chat', 'MADD Chat', 'manage_options', 'madd-chat', function () {
        if (isset($_POST['madd_chat_save']) && check_admin_referer('madd_chat')) {
            update_option('madd_chat_enabled', ! empty($_POST['enabled']) ? 1 : 0);
            delete_transient(MADD_CHAT_KNOWLEDGE);
            echo '<div class="notice notice-success"><p>บันทึกแล้ว</p></div>';
        }
        $s = class_exists('Madd_Rate_Quote') ? Madd_Rate_Quote::settings() : ['api_url' => '', 'api_key' => '']; ?>
        <div class="wrap">
            <h1>MADD Chat (AI)</h1>
            <p>ปุ่ม "Ask MADD" มุมขวาล่างทุกหน้า — ตอบจากเนื้อหาเว็บ, เช็คราคา และ Tracking จริงจากระบบ MADD (<code>/public/v1/ai-chat</code>) ด้วย API URL / Key ของ MADD Rate Quote</p>
            <?php if (! $s['api_url'] || ! $s['api_key']) : ?><div class="notice notice-warning inline"><p>ยังไม่ได้ตั้ง API URL / Key ที่ Settings › MADD Rate Quote</p></div><?php endif; ?>
            <?php if (defined('MADD_CHAT_ENABLED')) : ?><div class="notice notice-info inline"><p>wp-config.php กำหนด MADD_CHAT_ENABLED ไว้ — ค่านั้นใช้แทนตัวเลือกด้านล่าง</p></div><?php endif; ?>
            <form method="post"><?php wp_nonce_field('madd_chat'); ?>
                <p><label><input type="checkbox" name="enabled" value="1" <?php checked(get_option('madd_chat_enabled')); ?>> เปิดใช้ AI Chat บนเว็บ</label></p>
                <p class="description">เนื้อหาที่ AI ใช้ตอบ: <?php echo esc_html(number_format(mb_strlen(madd_chat_knowledge()))); ?> ตัวอักษร จากทุกหน้า / บทความที่เผยแพร่ (สร้างใหม่อัตโนมัติเมื่อแก้หน้า)</p>
                <?php $last = get_option('madd_chat_last_error'); if ($last) : ?>
                    <p class="description">ข้อผิดพลาดล่าสุด: <?php echo esc_html($last['time'].' · '.$last['host'].' · '.$last['seconds'].'s · '.$last['error']); ?></p>
                <?php endif; ?>
                <?php submit_button('บันทึก', 'primary', 'madd_chat_save'); ?>
            </form>
        </div>
        <?php
    });
});

// ---------------------------------------------------------------- widget

add_action('wp_enqueue_scripts', function () {
    if (! madd_chat_enabled()) {
        return;
    }
    $v = (string) filemtime(MADD_SITE_DIR.'assets/madd-chat.js');
    wp_enqueue_style('madd-chat', MADD_SITE_URL.'assets/madd-chat.css', [], (string) filemtime(MADD_SITE_DIR.'assets/madd-chat.css'));
    wp_enqueue_script('madd-chat', MADD_SITE_URL.'assets/madd-chat.js', [], $v, true);
    wp_localize_script('madd-chat', 'MaddChat', [
        'endpoint' => esc_url_raw(rest_url('madd/v1/chat')),
        'rateUrl' => get_permalink((int) get_page_by_path('hot-promotion')?->ID) ?: home_url('/'),
        'trackUrl' => get_permalink((int) get_page_by_path('check-status')?->ID) ?: home_url('/'),
        'line' => 'https://line.me/ti/p/~madd.co.th',
    ]);
});
