<?php
/**
 * Plugin Name: MADD Site
 * Description: สไตล์หน้าแรกและสีแบรนด์ของ madd.co.th (เหลือง #F4B940 / น้ำเงิน #273444) — ใช้คู่กับธีม Kadence และปลั๊กอิน MADD Rate Quote / MADD Tracking
 * Version: 1.2.0
 * Author: MADD
 */

if (! defined('ABSPATH')) {
    exit;
}

define('MADD_SITE_DIR', plugin_dir_path(__FILE__));
define('MADD_SITE_URL', plugin_dir_url(__FILE__));

require MADD_SITE_DIR.'includes/google-reviews.php';
require MADD_SITE_DIR.'includes/tracking.php';
require MADD_SITE_DIR.'includes/visitors.php';
require MADD_SITE_DIR.'includes/web-reviews.php';

// Hero background photo (media library attachment id saved in option madd_hero_image).
function madd_site_hero_css()
{
    $hero = wp_get_attachment_image_url((int) get_option('madd_hero_image'), 'full');

    return $hero ? ':root{--madd-hero-img:url("'.esc_url($hero).'")}' : '';
}

add_action('wp_enqueue_scripts', function () {
    $file = __DIR__.'/assets/madd-site.css';
    wp_enqueue_style('madd-site', plugin_dir_url(__FILE__).'assets/madd-site.css', [], (string) filemtime($file));
    $js = __DIR__.'/assets/madd-site.js';
    wp_enqueue_script('madd-site', plugin_dir_url(__FILE__).'assets/madd-site.js', [], (string) filemtime($js), true);
    // Country flags are served from this plugin (assets/flags/<iso>.png), not hotlinked.
    wp_add_inline_script('madd-site', 'window.MADD_FLAGS='.wp_json_encode(plugin_dir_url(__FILE__).'assets/flags/').';', 'before');
    wp_add_inline_style('madd-site', madd_site_hero_css());
});

// Block editor: same stylesheet as the site (plus a few editor-only fixes) so pages look as they do live.
add_action('enqueue_block_assets', function () {
    if (! is_admin()) {
        return;
    }
    $url = plugin_dir_url(__FILE__).'assets/';
    wp_enqueue_style('madd-site-editor-base', $url.'madd-site.css', [], (string) filemtime(__DIR__.'/assets/madd-site.css'));
    wp_enqueue_style('madd-site-editor', $url.'madd-editor.css', ['madd-site-editor-base'], (string) filemtime(__DIR__.'/assets/madd-editor.css'));
    wp_add_inline_style('madd-site-editor', madd_site_hero_css());
});

// Only administrators may lock/unlock blocks; editors can change content inside locked sections but not the layout.
add_filter('block_editor_settings_all', function ($settings) {
    $settings['canLockBlocks'] = current_user_can('activate_plugins');

    return $settings;
});

// "MADD Check Rate" block: wraps the [madd_rate_quote] shortcode so editors see a labelled preview instead of raw code.
add_action('init', function () {
    wp_register_script(
        'madd-blocks',
        plugin_dir_url(__FILE__).'assets/madd-blocks.js',
        ['wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components'],
        (string) filemtime(__DIR__.'/assets/madd-blocks.js'),
        true
    );
    register_block_type('madd/rate-quote', [
        'api_version'     => 3,
        'title'           => 'MADD Check Rate',
        'category'        => 'widgets',
        'icon'            => 'calculator',
        'editor_script'   => 'madd-blocks',
        'attributes'      => ['lang' => ['type' => 'string', 'default' => 'en']],
        'supports'        => ['html' => false, 'multiple' => false],
        'render_callback' => function ($attrs) {
            $lang = ($attrs['lang'] ?? 'en') === 'th' ? 'th' : 'en';

            return do_shortcode('[madd_rate_quote lang="'.$lang.'"]');
        },
    ]);
});
