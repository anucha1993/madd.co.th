<?php
/**
 * Public visitor counter ("Visitors today · This month · Total"), counted on this site — no third-party service.
 *
 * - The [madd_visitors] shortcode (placed in the footer bar text) prints an empty placeholder; madd-site.js posts one
 *   hit to /wp-json/madd/v1/visit per page view and fills in the numbers, so it also works behind page caching.
 * - A browser counts as one visitor per day (localStorage); bots that don't run JavaScript are never counted,
 *   known crawler user agents are ignored, and logged-in editors are not counted.
 * - Daily totals live in the {prefix}madd_visits table. Settings → MADD Visitors: starting total, reset, last 30 days.
 */

if (! defined('ABSPATH')) {
    exit;
}

const MADD_VISITS_DB = '1';

function madd_visits_table()
{
    global $wpdb;

    return $wpdb->prefix.'madd_visits';
}

add_action('init', function () {
    if (get_option('madd_visits_db') === MADD_VISITS_DB) {
        return;
    }
    global $wpdb;
    require_once ABSPATH.'wp-admin/includes/upgrade.php';
    dbDelta('CREATE TABLE '.madd_visits_table()." (
        day date NOT NULL,
        visitors int unsigned NOT NULL DEFAULT 0,
        views int unsigned NOT NULL DEFAULT 0,
        PRIMARY KEY  (day)
    ) {$wpdb->get_charset_collate()};");
    update_option('madd_visits_db', MADD_VISITS_DB);
});

function madd_visits_stats()
{
    global $wpdb;
    $t = madd_visits_table();
    $today = current_time('Y-m-d');

    return [
        'today' => (int) $wpdb->get_var($wpdb->prepare("SELECT visitors FROM $t WHERE day = %s", $today)),
        'month' => (int) $wpdb->get_var($wpdb->prepare("SELECT SUM(visitors) FROM $t WHERE day >= %s", current_time('Y-m-01'))),
        'total' => (int) $wpdb->get_var("SELECT SUM(visitors) FROM $t") + (int) get_option('madd_visits_offset', 0),
    ];
}

add_action('rest_api_init', function () {
    register_rest_route('madd/v1', '/visit', [
        'methods'             => 'POST',
        'permission_callback' => '__return_true',
        'callback'            => function (WP_REST_Request $req) {
            $ua = (string) $req->get_header('user_agent');
            $bot = $ua === '' || preg_match('/bot|crawl|spider|slurp|preview|headless|lighthouse|facebookexternalhit|curl|wget|python/i', $ua);
            // One counted hit per IP every 5 seconds keeps reloads and simple scripts from inflating the numbers.
            $ip = md5((string) ($_SERVER['REMOTE_ADDR'] ?? ''));
            $throttled = get_transient('madd_visit_'.$ip);
            if ($req->get_param('count') && ! $bot && ! $throttled) {
                global $wpdb;
                set_transient('madd_visit_'.$ip, 1, 5);
                $new = $req->get_param('first') ? 1 : 0;
                $wpdb->query($wpdb->prepare(
                    'INSERT INTO '.madd_visits_table().' (day, visitors, views) VALUES (%s, %d, 1)
                     ON DUPLICATE KEY UPDATE visitors = visitors + %d, views = views + 1',
                    current_time('Y-m-d'), $new, $new
                ));
            }

            return madd_visits_stats();
        },
    ]);
});

add_shortcode('madd_visitors', function () {
    // Editors see the numbers but are not counted.
    return '<span class="madd-visitors" data-endpoint="'.esc_url(rest_url('madd/v1/visit')).'" data-count="'.(current_user_can('edit_posts') ? '0' : '1').'" hidden></span>';
});

// --- Settings → MADD Visitors ---
add_action('admin_menu', function () {
    add_options_page('MADD Visitors', 'MADD Visitors', 'manage_options', 'madd-visitors', 'madd_visits_page');
});

add_action('admin_post_madd_visits_save', function () {
    if (! current_user_can('manage_options')) {
        wp_die('Not allowed');
    }
    check_admin_referer('madd_visits_save');
    update_option('madd_visits_offset', max(0, (int) ($_POST['offset'] ?? 0)));
    if (! empty($_POST['reset'])) {
        global $wpdb;
        $wpdb->query('TRUNCATE TABLE '.madd_visits_table());
    }
    wp_safe_redirect(admin_url('options-general.php?page=madd-visitors&updated=1'));
    exit;
});

function madd_visits_page()
{
    global $wpdb;
    $s = madd_visits_stats();
    $rows = $wpdb->get_results('SELECT * FROM '.madd_visits_table().' ORDER BY day DESC LIMIT 30'); ?>
    <div class="wrap">
        <h1>MADD Visitors</h1>
        <p>ตัวนับคนเข้าเว็บที่แสดงใน footer (Visitors today · This month · Total) — นับ 1 คนต่อวันต่อเครื่อง ไม่นับบอทและผู้ที่ล็อกอินแก้เว็บ</p>
        <?php if (isset($_GET['updated'])) { ?><div class="notice notice-success"><p>บันทึกแล้ว</p></div><?php } ?>
        <p><strong>วันนี้:</strong> <?php echo esc_html(number_format($s['today'])); ?> &nbsp; <strong>เดือนนี้:</strong> <?php echo esc_html(number_format($s['month'])); ?> &nbsp; <strong>ทั้งหมด:</strong> <?php echo esc_html(number_format($s['total'])); ?></p>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="madd_visits_save">
            <?php wp_nonce_field('madd_visits_save'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="madd_offset">ยอดสะสมตั้งต้น</label></th>
                    <td><input id="madd_offset" name="offset" type="number" min="0" class="regular-text" value="<?php echo esc_attr((int) get_option('madd_visits_offset', 0)); ?>">
                        <p class="description">บวกเพิ่มในช่อง “Total” — ใส่ได้เฉพาะตัวเลขจริง เช่น จำนวนผู้ใช้สะสมจาก Google Analytics ของเว็บเดิม</p></td>
                </tr>
                <tr>
                    <th scope="row">ล้างสถิติ</th>
                    <td><label><input type="checkbox" name="reset" value="1"> ลบสถิติที่นับไว้ทั้งหมด (เช่น ก่อนเปิดเว็บจริง เพื่อลบยอดตอนทดสอบ)</label></td>
                </tr>
            </table>
            <?php submit_button('บันทึก'); ?>
        </form>
        <h2>30 วันล่าสุด</h2>
        <table class="widefat striped" style="max-width:520px">
            <thead><tr><th>วันที่</th><th>คนเข้า</th><th>หน้าที่เปิด</th></tr></thead>
            <tbody>
            <?php foreach ($rows as $r) { ?>
                <tr><td><?php echo esc_html($r->day); ?></td><td><?php echo esc_html(number_format($r->visitors)); ?></td><td><?php echo esc_html(number_format($r->views)); ?></td></tr>
            <?php } ?>
            <?php if (! $rows) { ?><tr><td colspan="3">ยังไม่มีข้อมูล</td></tr><?php } ?>
            </tbody>
        </table>
    </div>
    <?php
}
