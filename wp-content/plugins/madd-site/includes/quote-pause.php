<?php
/**
 * Pause the Check shipping rate form site-wide while the rates are being set up.
 *
 * Settings › MADD Check Rate › "Pause" (option madd_rate_quote_paused). While paused:
 * - every "Check shipping rate" card (a group "madd-quote-card" holding the madd/rate-quote block) and any bare
 *   madd/rate-quote block or [madd_rate_quote] shortcode shows a "Get a shipping quote" card instead — LINE,
 *   WhatsApp, phone and e-mail;
 * - the "Check shipping rate" button at the end of articles is left out (the LINE button stays).
 * Un-tick it and every form is back, nothing in the pages has to change.
 */

if (! defined('ABSPATH')) {
    exit;
}

function madd_quote_paused()
{
    return (bool) get_option('madd_rate_quote_paused');
}

function madd_quote_contact_card()
{
    $li = fn ($b, $t) => '<li><strong>'.$b.'</strong> '.$t.'</li>';

    return '<div class="wp-block-group madd-quote-card madd-contact-card">'
        .'<div class="wp-block-group madd-card-head"><h2 class="wp-block-heading">Get a shipping quote</h2><p class="madd-card-tag">UPS · DHL · SAGAWA</p></div>'
        .'<p class="madd-contact-intro">Send us a few details and our team will compare UPS, DHL and SAGAWA for you and reply with the best rate for your shipment.</p>'
        .'<p class="madd-contact-label">What to tell us</p>'
        .'<ul class="wp-block-list madd-contact-list">'
        .$li('Destination', 'country and city / postcode')
        .$li('Weight', 'of each box (kg)')
        .$li('Size', 'of each box (L × W × H cm)')
        .$li('What is inside', '— documents, personal items or goods')
        .'</ul>'
        .'<div class="wp-block-buttons madd-contact-btns">'
        .'<div class="wp-block-button madd-btn madd-btn-line"><a class="wp-block-button__link wp-element-button" href="http://line.me/ti/p/~madd.co.th" target="_blank" rel="noreferrer noopener">Ask for a quote on LINE</a></div>'
        .'<div class="wp-block-button madd-btn madd-btn-wa"><a class="wp-block-button__link wp-element-button" href="https://wa.me/66818383226" target="_blank" rel="noreferrer noopener">WhatsApp</a></div>'
        .'<div class="wp-block-button madd-btn madd-btn-call"><a class="wp-block-button__link wp-element-button" href="tel:026294441">Call 02 629 4441-2</a></div>'
        .'</div>'
        .'<p class="madd-contact-foot">Or e-mail <a href="mailto:customerservice@madd.co.th">customerservice@madd.co.th</a> · LINE ID: madd.co.th</p>'
        .'</div>';
}

// the whole "Check shipping rate" card (its heading lives outside the form block) → the contact card
add_filter('render_block', function ($html, $block) {
    if (! madd_quote_paused() || is_admin()) {
        return $html;
    }
    if ($block['blockName'] === 'core/group' && preg_match('/(^| )madd-quote-card( |$)/', $block['attrs']['className'] ?? '')
        && ! str_contains($block['attrs']['className'], 'madd-contact-card')) {
        foreach ($block['innerBlocks'] as $inner) {
            if ($inner['blockName'] === 'madd/rate-quote') {
                return madd_quote_contact_card();
            }
        }
    }
    if ($block['blockName'] === 'madd/rate-quote') {
        return madd_quote_contact_card();
    }

    return $html;
}, 5, 2);

add_action('init', function () {
    if (madd_quote_paused() && ! is_admin()) {
        remove_shortcode('madd_rate_quote');
        add_shortcode('madd_rate_quote', 'madd_quote_contact_card');
    }
}, 20);

// ---------------------------------------------------------------- settings

add_action('admin_menu', function () {
    add_options_page('MADD Check Rate', 'MADD Check Rate', 'manage_options', 'madd-quote-pause', function () {
        if (isset($_POST['madd_quote_pause_nonce']) && wp_verify_nonce($_POST['madd_quote_pause_nonce'], 'madd_quote_pause') && current_user_can('manage_options')) {
            update_option('madd_rate_quote_paused', empty($_POST['paused']) ? 0 : 1);
            echo '<div class="notice notice-success"><p>Saved.</p></div>';
        } ?>
        <div class="wrap">
            <h1>MADD Check Rate</h1>
            <form method="post">
                <?php wp_nonce_field('madd_quote_pause', 'madd_quote_pause_nonce'); ?>
                <p><label><input type="checkbox" name="paused" value="1" <?php checked(madd_quote_paused()); ?>>
                    <strong>Pause the Check shipping rate form</strong> — show a "Get a shipping quote" card (LINE, WhatsApp, phone) on every page instead</label></p>
                <p class="description">Untick when the rates are ready: every Check shipping rate form comes back on all pages.</p>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    });
});
