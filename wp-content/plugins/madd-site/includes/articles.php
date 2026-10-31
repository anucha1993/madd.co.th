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

// The Shipping Guide page (option madd_guide_page) lists the articles by topic — see [madd_shipping_guide].
function madd_guide_url()
{
    $id = (int) get_option('madd_guide_page');

    return $id ? get_permalink($id) : home_url('/');
}

// topic categories, in the order shown on the Shipping Guide: slug => [English heading, icon class]
function madd_guide_topics()
{
    return [
        'what-can-i-send' => ['What can I send?', 'is-items'],
        'cost-and-customs' => ['Shipping cost & customs', 'is-cost'],
        'how-to-ship' => ['How to ship', 'is-steps'],
    ];
}

// Articles are signed "MADD Team" — never the admin's login name — and the name links to the Shipping Guide.
add_filter('the_author', fn ($name) => is_admin() ? $name : 'MADD Team');
add_filter('get_the_author_display_name', fn ($name) => is_admin() ? $name : 'MADD Team'); // Kadence's post meta
add_filter('author_link', fn () => madd_guide_url());
// author archives (?author=1) would show the login name in the title — send them to the Shipping Guide
add_action('template_redirect', function () {
    if (is_author()) {
        wp_safe_redirect(madd_guide_url(), 301);
        exit;
    }
});

add_action('init', fn () => add_shortcode('madd_shipping_guide', 'madd_guide_render'));

function madd_guide_render()
{
    $out = '<div class="madd-guide"><div class="madd-pro-find madd-guide-find"><label><span class="screen-reader-text">Search the shipping guide</span>'
        .'<input type="search" placeholder="Search the guide, e.g. food, tax, dimensional weight…" autocomplete="off"></label></div>';
    foreach (madd_guide_topics() as $slug => [$heading, $icon]) {
        $term = get_term_by('slug', $slug, 'category');
        if (! $term) {
            continue;
        }
        $posts = get_posts(['category' => $term->term_id, 'numberposts' => -1, 'orderby' => 'menu_order date', 'order' => 'ASC']);
        if (! $posts) {
            continue;
        }
        $out .= '<section class="madd-guide-topic '.$icon.'"><div class="madd-guide-head"><div><h2>'.esc_html($heading).'</h2><p>'.count($posts).' articles</p></div></div><ul>';
        foreach ($posts as $p) {
            $out .= '<li><a href="'.esc_url(get_permalink($p)).'"><strong>'.esc_html(get_the_title($p)).'</strong><span>'.esc_html(get_the_excerpt($p)).'</span></a></li>';
        }
        $out .= '</ul></section>';
    }

    return $out.'<p class="madd-guide-empty" hidden>No articles match your search. Ask our team on LINE or call +66 (0)2 629 4441-2.</p></div>';
}

// FAQ page: FAQPage structured data built from its <details><summary> question / answer blocks.
add_action('wp_head', function () {
    if (! is_page() || get_post_field('post_name', get_queried_object_id()) !== 'faq') {
        return;
    }
    preg_match_all('#<details[^>]*>\s*<summary>(.*?)</summary>(.*?)</details>#s', get_post_field('post_content', get_queried_object_id()), $m, PREG_SET_ORDER);
    $items = [];
    foreach ($m as [, $q, $a]) {
        $items[] = ['@type' => 'Question', 'name' => wp_strip_all_tags($q), 'acceptedAnswer' => ['@type' => 'Answer', 'text' => trim(wp_strip_all_tags(preg_replace('#<!--.*?-->#s', '', $a)))]];
    }
    if ($items) {
        echo '<script type="application/ld+json">'.wp_json_encode(['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $items], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES).'</script>'."\n";
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

    $topic = '';
    foreach (get_the_category() as $c) {
        if (isset(madd_guide_topics()[$c->slug])) {
            $topic = madd_guide_topics()[$c->slug][0];
        }
    }

    return '<p class="madd-art-crumb"><a href="'.esc_url(madd_guide_url()).'">← Shipping Guide</a>'.($topic ? ' <span>/</span> '.esc_html($topic) : '').'</p>'
        .$content
        .($links ? '<div class="madd-art-related"><p class="madd-art-related-title">Related pages</p><ul>'.$links.'</ul></div>' : '')
        .'<div class="madd-art-cta"><div><p class="madd-art-cta-title">Ready to ship from Thailand?</p><p>Check your shipping rate online, or ask our team on LINE.</p></div>'
        .'<p class="madd-art-cta-btns"><a class="is-rate" href="'.esc_url(get_permalink(24)).'#check-rate">Check shipping rate</a>'
        .'<a class="is-line" href="https://line.me/ti/p/~madd.co.th" target="_blank" rel="noopener">Chat on LINE</a></p></div>';
}, 20);
