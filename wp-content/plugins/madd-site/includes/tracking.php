<?php
/**
 * Visitor statistics: Google Tag Manager container GTM-PJQ6SC (same container as the old madd.co.th site;
 * it loads Google Analytics 4 property G-67ESS2XDEB, so statistics continue without a break).
 *
 * Output only on the live domain (madd.co.th / www.madd.co.th) so local or staging copies don't pollute the
 * statistics, and not for logged-in editors. Change the container with the MADD_GTM_ID constant in wp-config.php.
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! defined('MADD_GTM_ID')) {
    define('MADD_GTM_ID', 'GTM-PJQ6SC');
}

function madd_tracking_enabled()
{
    $host = (string) wp_parse_url(home_url(), PHP_URL_HOST);
    $live = in_array($host, ['madd.co.th', 'www.madd.co.th'], true);

    return (bool) apply_filters('madd_tracking_enabled', $live && MADD_GTM_ID && ! current_user_can('edit_posts'));
}

add_action('wp_head', function () {
    if (! madd_tracking_enabled()) {
        return;
    }
    $id = esc_js(MADD_GTM_ID); ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','<?php echo $id; ?>');</script>
<!-- End Google Tag Manager -->
<?php
}, 1);

add_action('wp_body_open', function () {
    if (! madd_tracking_enabled()) {
        return;
    } ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr(MADD_GTM_ID); ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
});
