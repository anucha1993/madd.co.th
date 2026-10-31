<?php
/**
 * Articles (blog) and old-URL redirects.
 *
 * - 301 redirects from old madd.co.th URLs: option "madd_redirects" = [ '/old/path/' => post ID or URL ].
 *   The map only holds old paths that no longer exist here (the site uses ?p= / ?page_id= links). Filled when
 *   the old articles were imported (with and without the old /th/ prefix).
 * - The end of every article gets "Related pages" (post meta madd_related = page IDs) and a Check Rate box.
 */

if (! defined('ABSPATH')) {
    exit;
}

add_action('template_redirect', function () {
    $map = get_option('madd_redirects', []);
    if (! $map) {
        return;
    }
    $path = rawurldecode((string) wp_parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH));
    $path = '/'.trim($path, '/').'/';
    $to = $map[$path] ?? $map[mb_strtolower($path)] ?? null;
    if ($to === null) {
        return;
    }
    $url = is_numeric($to) ? get_permalink((int) $to) : $to;
    // never redirect a URL to itself (e.g. once pretty permalinks give an article its old slug back)
    $target = '/'.trim(rawurldecode((string) wp_parse_url($url, PHP_URL_PATH)), '/').'/';
    if ($url && ($target !== $path || wp_parse_url($url, PHP_URL_QUERY))) {
        wp_safe_redirect($url, 301);
        exit;
    }
}, 1);

// Articles are signed "MADD Team" — never the admin's login name — and the name links to the Articles page.
add_filter('the_author', fn ($name) => is_admin() ? $name : 'MADD Team');
add_filter('get_the_author_display_name', fn ($name) => is_admin() ? $name : 'MADD Team'); // Kadence's post meta
add_filter('author_link', fn ($link) => get_option('page_for_posts') ? get_permalink((int) get_option('page_for_posts')) : $link);
// author archives (?author=1) would show the login name in the title — send them to the Articles page
add_action('template_redirect', function () {
    if (is_author() && get_option('page_for_posts')) {
        wp_safe_redirect(get_permalink((int) get_option('page_for_posts')), 301);
        exit;
    }
});

// Thai has no spaces between words, so WordPress's word-count excerpt would be the whole article — cut by characters.
add_filter('get_the_excerpt', function ($excerpt, $post) {
    if ($post->post_type !== 'post' || has_excerpt($post)) {
        return $excerpt;
    }
    $text = trim(preg_replace('/\s+/u', ' ', wp_strip_all_tags(strip_shortcodes($post->post_content))));

    return mb_strimwidth($text, 0, 190, '…');
}, 20, 2);

add_filter('the_content', function ($content) {
    if (! is_singular('post') || ! in_the_loop() || ! is_main_query()) {
        return $content;
    }
    $related = array_filter(array_map('intval', (array) get_post_meta(get_the_ID(), 'madd_related', true)));
    $links = '';
    foreach ($related as $id) {
        if (get_post_status($id) === 'publish') {
            $links .= '<li><a href="'.esc_url(get_permalink($id)).'">'.esc_html(get_the_title($id)).' <span aria-hidden="true">→</span></a></li>';
        }
    }

    return $content
        .($links ? '<div class="madd-art-related"><p class="madd-art-related-title">Related pages</p><ul>'.$links.'</ul></div>' : '')
        .'<div class="madd-art-cta"><div><p class="madd-art-cta-title">Ready to ship from Thailand?</p><p>Check your shipping rate online, or ask our team on LINE.</p></div>'
        .'<p class="madd-art-cta-btns"><a class="is-rate" href="'.esc_url(add_query_arg('page_id', 24, home_url('/'))).'#check-rate">Check shipping rate</a>'
        .'<a class="is-line" href="https://line.me/ti/p/~madd.co.th" target="_blank" rel="noopener">Chat on LINE</a></p></div>';
}, 20);
