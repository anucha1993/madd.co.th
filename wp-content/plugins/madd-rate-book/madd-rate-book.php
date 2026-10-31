<?php
/**
 * Plugin Name: MADD Rate Book
 * Description: ตารางราคาค่าส่ง (Rate Book) ทุกโซน ทุกน้ำหนัก พร้อมช่องค้นหาประเทศ — shortcode [madd_rate_book] หรือ block "MADD Rate Book" · ดึงจากระบบ MADD (ถ้าเปิด endpoint แล้ว) หรือวางตารางจาก Excel ในหน้าตั้งค่า
 * Version: 1.0.0
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * Author: MADD
 * Text Domain: madd-rate-book
 *
 * Source "api": GET {MADD API URL}/public/v1/rate-book with the API key (same connection as MADD Rate Quote /
 * MADD Tracking), cached for 6 hours. If it fails, the tables entered in Settings › MADD Rate Book are shown.
 * Expected JSON (also the format kept for the manual tables):
 *   { "updated_at": "2026-06-01", "books": [ { "id": "special", "title": "...", "note": "...",
 *     "zones": [ { "name": "Zone 1", "countries": ["Hong Kong", "Malaysia"] } ],
 *     "rows":  [ { "label": "0.50", "prices": [1067, 1505, null] } ] } ] }
 */

if (! defined('ABSPATH')) {
    exit;
}

final class Madd_Rate_Book
{
    const OPTION = 'madd_rate_book';
    const VERSION = '1.0.0';
    const CACHE = 'madd_rate_book_remote';

    public static function init()
    {
        add_action('admin_menu', [__CLASS__, 'admin_menu']);
        add_action('admin_post_madd_rate_book_save', [__CLASS__, 'save']);
        add_filter('plugin_action_links_'.plugin_basename(__FILE__), [__CLASS__, 'action_links']);
        add_shortcode('madd_rate_book', [__CLASS__, 'shortcode']);
        add_action('init', [__CLASS__, 'register_block']);
    }

    /** @return array{source:string,updated_at:string,books:array} */
    public static function settings()
    {
        $saved = get_option(self::OPTION, []);

        return wp_parse_args(is_array($saved) ? $saved : [], ['source' => 'manual', 'updated_at' => '', 'books' => []]);
    }

    /** Connection settings shared with MADD Rate Quote / MADD Tracking. */
    private static function connection()
    {
        $url = defined('MADD_RATE_API_URL') ? MADD_RATE_API_URL : '';
        $key = defined('MADD_RATE_API_KEY') ? MADD_RATE_API_KEY : '';
        foreach (['madd_rate_quote', 'madd_tracking'] as $opt) {
            $o = get_option($opt, []);
            if (is_array($o)) {
                $url = $url ?: ($o['api_url'] ?? '');
                $key = $key ?: ($o['api_key'] ?? '');
            }
        }

        return [preg_replace('#/public(/v1)?(/.*)?$#', '', untrailingslashit(trim((string) $url))), (string) $key];
    }

    /** Rate book from MADD (cached), or WP_Error. */
    private static function remote($fresh = false)
    {
        $cached = get_transient(self::CACHE);
        if (! $fresh && is_array($cached)) {
            return $cached;
        }
        [$url, $key] = self::connection();
        if (! $url || ! $key) {
            return new WP_Error('madd_not_configured', 'MADD API URL / API Key is not set');
        }
        $res = wp_remote_get($url.'/public/v1/rate-book', ['timeout' => 30, 'headers' => ['Authorization' => 'Bearer '.$key, 'Accept' => 'application/json']]);
        if (is_wp_error($res)) {
            return $res;
        }
        $code = (int) wp_remote_retrieve_response_code($res);
        $data = json_decode(wp_remote_retrieve_body($res), true);
        if ($code !== 200 || ! is_array($data) || empty($data['books'])) {
            return new WP_Error('http_'.$code, 'MADD rate book unavailable (HTTP '.$code.')');
        }
        $data = self::clean($data);
        set_transient(self::CACHE, $data, 6 * HOUR_IN_SECONDS);

        return $data;
    }

    /** Normalise a rate book array (from MADD or from the settings form). */
    private static function clean(array $data)
    {
        $books = [];
        foreach ((array) ($data['books'] ?? []) as $i => $b) {
            $zones = [];
            foreach ((array) ($b['zones'] ?? []) as $z) {
                $zones[] = [
                    'name' => sanitize_text_field($z['name'] ?? ''),
                    'countries' => array_values(array_filter(array_map('sanitize_text_field', (array) ($z['countries'] ?? [])))),
                ];
            }
            $rows = [];
            foreach ((array) ($b['rows'] ?? []) as $r) {
                $prices = [];
                foreach (array_slice((array) ($r['prices'] ?? []), 0, count($zones)) as $p) {
                    $prices[] = is_numeric($p) ? (float) $p : null;
                }
                $rows[] = ['label' => sanitize_text_field($r['label'] ?? ''), 'prices' => array_pad($prices, count($zones), null)];
            }
            if ($zones && $rows) {
                $books[] = [
                    'id' => sanitize_key($b['id'] ?? '') ?: 'book-'.($i + 1),
                    'title' => sanitize_text_field($b['title'] ?? ''),
                    'note' => sanitize_text_field($b['note'] ?? ''),
                    'zones' => $zones,
                    'rows' => $rows,
                ];
            }
        }

        return ['updated_at' => sanitize_text_field($data['updated_at'] ?? ''), 'books' => $books];
    }

    /** The rate book to show: MADD when source=api and reachable, else the manual tables. */
    public static function book()
    {
        $s = self::settings();
        if ($s['source'] === 'api') {
            $remote = self::remote();
            if (! is_wp_error($remote)) {
                return $remote + ['from' => 'api'];
            }
        }

        return ['updated_at' => $s['updated_at'], 'books' => $s['books'], 'from' => 'manual'];
    }

    // ------------------------------------------------------------------ Admin

    public static function action_links($links)
    {
        array_unshift($links, '<a href="'.esc_url(admin_url('options-general.php?page=madd-rate-book')).'">ตั้งค่า</a>');

        return $links;
    }

    public static function admin_menu()
    {
        add_options_page('MADD Rate Book', 'MADD Rate Book', 'manage_options', 'madd-rate-book', [__CLASS__, 'settings_page']);
    }

    // "Zone 1 | Hong Kong, Malaysia" per line
    private static function zones_text(array $zones)
    {
        return implode("\n", array_map(fn ($z) => $z['name'].($z['countries'] ? ' | '.implode(', ', $z['countries']) : ''), $zones));
    }

    // first cell = weight / label, then one price per zone; tab-separated (pasted from Excel)
    private static function rows_text(array $rows)
    {
        return implode("\n", array_map(fn ($r) => $r['label']."\t".implode("\t", array_map(fn ($p) => $p === null ? '-' : (floor($p) == $p ? (string) (int) $p : (string) $p), $r['prices'])), $rows));
    }

    public static function settings_page()
    {
        $s = self::settings();
        [$url, $key] = self::connection();
        $remote = $s['source'] === 'api' ? self::remote(isset($_GET['refresh'])) : null;
        $books = $s['books'] ?: [['id' => '', 'title' => '', 'note' => '', 'zones' => [], 'rows' => []]];
        $books[] = ['id' => '', 'title' => '', 'note' => '', 'zones' => [], 'rows' => [], 'new' => true]; ?>
        <div class="wrap">
            <h1>MADD Rate Book</h1>
            <p>แสดงในหน้าใดก็ได้ด้วย block <b>MADD Rate Book</b> หรือ shortcode <code>[madd_rate_book]</code> · เฉพาะบางตาราง <code>[madd_rate_book book="special"]</code></p>
            <?php if (isset($_GET['saved'])) : ?><div class="notice notice-success is-dismissible"><p>บันทึกแล้ว</p></div><?php endif; ?>
            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <input type="hidden" name="action" value="madd_rate_book_save">
                <?php wp_nonce_field('madd_rate_book_save'); ?>
                <h2>แหล่งข้อมูล</h2>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row">ดึงราคาจาก</th>
                        <td>
                            <label><input type="radio" name="source" value="manual" <?php checked($s['source'], 'manual'); ?>> ตารางด้านล่าง (กรอก / วางจาก Excel)</label><br>
                            <label><input type="radio" name="source" value="api" <?php checked($s['source'], 'api'); ?>> ระบบ MADD — <code><?php echo esc_html(($url ?: '(ยังไม่ได้ตั้ง API URL)').'/public/v1/rate-book'); ?></code></label>
                            <p class="description">ใช้ URL / API Key เดียวกับ MADD Rate Quote · เก็บผลไว้ 6 ชั่วโมง · ถ้าระบบ MADD ไม่ตอบ จะแสดงตารางด้านล่างแทน</p>
                            <?php if ($remote !== null) : ?>
                                <p><?php echo is_wp_error($remote)
                                    ? '<span style="color:#b32d2e">✗ ดึงจากระบบ MADD ไม่ได้: '.esc_html($remote->get_error_message()).'</span> — ตอนนี้แสดงตารางด้านล่าง'
                                    : '<span style="color:#008a20">✓ ดึงจากระบบ MADD ได้ '.count($remote['books']).' ตาราง</span>'; ?>
                                    · <a href="<?php echo esc_url(add_query_arg('refresh', 1)); ?>">ดึงใหม่ตอนนี้</a></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="mrb_updated">ราคา ณ วันที่</label></th>
                        <td><input id="mrb_updated" name="updated_at" type="text" class="regular-text" value="<?php echo esc_attr($s['updated_at']); ?>" placeholder="เช่น June 2026"></td>
                    </tr>
                </table>

                <h2>ตาราง</h2>
                <p class="description">
                    <b>โซน</b> — บรรทัดละ 1 โซน (= 1 คอลัมน์): <code>ชื่อโซน | ประเทศ, ประเทศ</code><br>
                    <b>ราคา</b> — บรรทัดละ 1 แถว: ช่องแรก = น้ำหนัก/ชื่อแถว แล้วตามด้วยราคาทีละโซน คั่นด้วย Tab (copy จาก Excel มาวางได้เลย) หรือ <code>|</code> · ไม่มีราคา ใส่ <code>-</code>
                </p>
                <?php foreach ($books as $i => $b) : ?>
                    <div class="card" style="max-width:none;margin:16px 0;padding:8px 20px 16px">
                        <h3><?php echo ! empty($b['new']) ? '+ เพิ่มตารางใหม่' : esc_html($b['title'] ?: 'ตารางที่ '.($i + 1)); ?></h3>
                        <table class="form-table" role="presentation">
                            <tr><th scope="row">ชื่อตาราง</th><td>
                                <input name="books[<?php echo $i; ?>][title]" type="text" class="large-text" value="<?php echo esc_attr($b['title']); ?>" placeholder="เช่น Special Rate — Air Door to Door">
                                <p><label>รหัส (สำหรับ shortcode) <input name="books[<?php echo $i; ?>][id]" type="text" value="<?php echo esc_attr($b['id']); ?>" placeholder="special" style="width:160px"></label></p>
                            </td></tr>
                            <tr><th scope="row">โซน</th><td><textarea name="books[<?php echo $i; ?>][zones]" rows="5" class="large-text code" placeholder="Zone 1 | Hong Kong, Malaysia, Macau, Singapore&#10;JP KR | Japan, South Korea"><?php echo esc_textarea(self::zones_text($b['zones'])); ?></textarea></td></tr>
                            <tr><th scope="row">ราคา</th><td><textarea name="books[<?php echo $i; ?>][rows]" rows="8" class="large-text code" placeholder="0.50&#9;1067&#9;1505&#10;1.00&#9;1089&#9;1549"><?php echo esc_textarea(self::rows_text($b['rows'])); ?></textarea></td></tr>
                            <tr><th scope="row">หมายเหตุใต้ตาราง</th><td><input name="books[<?php echo $i; ?>][note]" type="text" class="large-text" value="<?php echo esc_attr($b['note']); ?>"></td></tr>
                            <?php if (empty($b['new'])) : ?>
                                <tr><th scope="row"></th><td><label><input type="checkbox" name="books[<?php echo $i; ?>][delete]" value="1"> ลบตารางนี้</label></td></tr>
                            <?php endif; ?>
                        </table>
                    </div>
                <?php endforeach; ?>
                <?php submit_button('บันทึก'); ?>
            </form>
        </div>
        <?php
    }

    public static function save()
    {
        if (! current_user_can('manage_options')) {
            wp_die('Forbidden', 403);
        }
        check_admin_referer('madd_rate_book_save');
        $in = wp_unslash($_POST);
        $books = [];
        foreach ((array) ($in['books'] ?? []) as $b) {
            if (! empty($b['delete'])) {
                continue;
            }
            $zones = [];
            foreach (preg_split('/\r?\n/', trim((string) ($b['zones'] ?? ''))) as $line) {
                if (trim($line) === '') {
                    continue;
                }
                [$name, $countries] = array_pad(explode('|', $line, 2), 2, '');
                $zones[] = ['name' => trim($name), 'countries' => array_map('trim', array_filter(explode(',', $countries), 'strlen'))];
            }
            $rows = [];
            foreach (preg_split('/\r?\n/', trim((string) ($b['rows'] ?? ''))) as $line) {
                if (trim($line) === '') {
                    continue;
                }
                $cells = array_map('trim', preg_split(strpos($line, "\t") !== false ? '/\t/' : '/\|/', $line));
                $label = array_shift($cells);
                $prices = array_map(function ($c) {
                    $n = str_replace([',', ' ', '฿'], '', $c);

                    return is_numeric($n) ? (float) $n : null;
                }, $cells);
                $rows[] = ['label' => $label, 'prices' => $prices];
            }
            $books[] = ['id' => $b['id'] ?? '', 'title' => $b['title'] ?? '', 'note' => $b['note'] ?? '', 'zones' => $zones, 'rows' => $rows];
        }
        $clean = self::clean(['updated_at' => $in['updated_at'] ?? '', 'books' => $books]);
        update_option(self::OPTION, [
            'source' => ($in['source'] ?? '') === 'api' ? 'api' : 'manual',
            'updated_at' => $clean['updated_at'],
            'books' => $clean['books'],
        ]);
        delete_transient(self::CACHE);
        wp_safe_redirect(admin_url('options-general.php?page=madd-rate-book&saved=1'));
        exit;
    }

    // ------------------------------------------------------------------ Front end

    public static function register_block()
    {
        $base = plugin_dir_url(__FILE__);
        wp_register_script('madd-rate-book-block', $base.'assets/madd-rate-book-block.js', ['wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-server-side-render'], self::VERSION, true);
        register_block_type('madd/rate-book', [
            'api_version' => 3,
            'title' => 'MADD Rate Book',
            'category' => 'widgets',
            'icon' => 'editor-table',
            'editor_script' => 'madd-rate-book-block',
            'attributes' => ['book' => ['type' => 'string', 'default' => '']],
            'supports' => ['html' => false],
            'render_callback' => fn ($attrs) => self::shortcode(['book' => $attrs['book'] ?? '']),
        ]);
    }

    public static function shortcode($atts = [])
    {
        $atts = shortcode_atts(['book' => ''], $atts, 'madd_rate_book');
        $data = self::book();
        $only = array_filter(array_map('sanitize_key', explode(',', (string) $atts['book'])));
        $books = array_values(array_filter($data['books'], fn ($b) => ! $only || in_array($b['id'], $only, true)));
        if (! $books) {
            return current_user_can('manage_options') ? '<p class="madd-rb-empty">MADD Rate Book: ยังไม่มีตาราง — ตั้งค่าที่ Settings › MADD Rate Book</p>' : '';
        }
        $base = plugin_dir_url(__FILE__);
        wp_enqueue_style('madd-rate-book', $base.'assets/madd-rate-book.css', [], self::VERSION);
        wp_enqueue_script('madd-rate-book', $base.'assets/madd-rate-book.js', [], self::VERSION, true);
        $uid = 'madd-rb-'.wp_unique_id();
        $fmt = fn ($p) => $p === null ? '<span class="madd-rb-na">–</span>' : esc_html(number_format($p, floor($p) == $p ? 0 : 2));

        ob_start(); ?>
        <div class="madd-rb" id="<?php echo esc_attr($uid); ?>">
            <div class="madd-rb-bar">
                <?php if (count($books) > 1) : ?>
                    <div class="madd-rb-tabs" role="tablist">
                        <?php foreach ($books as $i => $b) : ?>
                            <button type="button" role="tab" id="<?php echo esc_attr($uid.'-tab-'.$i); ?>" aria-controls="<?php echo esc_attr($uid.'-'.$i); ?>" aria-selected="<?php echo $i ? 'false' : 'true'; ?>" tabindex="<?php echo $i ? '-1' : '0'; ?>"><?php echo esc_html($b['title'] ?: 'Rates '.($i + 1)); ?></button>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <label class="madd-rb-find">
                    <span class="screen-reader-text">Find your destination</span>
                    <input type="search" placeholder="Find your destination country…" autocomplete="off">
                </label>
            </div>
            <p class="madd-rb-hit" aria-live="polite" hidden></p>
            <?php foreach ($books as $i => $b) : ?>
                <section class="madd-rb-book" id="<?php echo esc_attr($uid.'-'.$i); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($uid.'-tab-'.$i); ?>" <?php echo $i ? 'hidden' : ''; ?>>
                    <?php if (count($books) === 1 && $b['title']) : ?><h3 class="madd-rb-title"><?php echo esc_html($b['title']); ?></h3><?php endif; ?>
                    <div class="madd-rb-scroll">
                        <table class="madd-rb-table">
                            <thead>
                                <tr>
                                    <th scope="col">Weight (kg)</th>
                                    <?php foreach ($b['zones'] as $z) : ?>
                                        <th scope="col" data-countries="<?php echo esc_attr(strtolower(implode('|', $z['countries']))); ?>"><?php echo esc_html($z['name']); ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($b['rows'] as $r) : ?>
                                    <tr><th scope="row"><?php echo esc_html($r['label']); ?></th><?php foreach ($r['prices'] as $p) : ?><td><?php echo $fmt($p); ?></td><?php endforeach; ?></tr>
                                <?php endforeach; ?>
                            </tbody>
                            <?php if (array_filter($b['zones'], fn ($z) => $z['countries'])) : ?>
                                <tfoot>
                                    <tr><th scope="row">Countries</th><?php foreach ($b['zones'] as $z) : ?><td><?php echo esc_html(implode(', ', $z['countries'])); ?></td><?php endforeach; ?></tr>
                                </tfoot>
                            <?php endif; ?>
                        </table>
                    </div>
                    <?php if ($b['note']) : ?><p class="madd-rb-note"><?php echo esc_html($b['note']); ?></p><?php endif; ?>
                </section>
            <?php endforeach; ?>
            <p class="madd-rb-meta">Prices in THB<?php echo $data['updated_at'] ? ' · rates as of '.esc_html($data['updated_at']) : ''; ?></p>
        </div>
        <?php
        return ob_get_clean();
    }
}

Madd_Rate_Book::init();
