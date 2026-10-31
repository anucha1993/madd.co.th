<?php
/**
 * Website reviews: customers write a review on the site, staff approve it, and it shows on the home page.
 *
 * - Block "madd/web-reviews" renders the approved reviews plus a "Write a review" form.
 * - The form posts to REST madd/v1/review; each submission is saved as a "madd_review" post with status
 *   "pending" and the site admin gets an e-mail. Publishing it (Reviews › Edit › Publish) puts it on the site.
 * - Spam protection without a third-party captcha: hidden honeypot field, minimum fill time, and a per-IP limit.
 * - Stored per review: name (title), review text (content), rating, shipped-to country, service, and an optional
 *   e-mail that is never shown.
 */

if (! defined('ABSPATH')) {
    exit;
}

const MADD_WR_TYPE = 'madd_review';

function madd_wr_services()
{
    return ['UPS', 'DHL Express', 'SAGAWA Express', 'Domestic shipping', 'Free storage / consolidation', 'Other'];
}

add_action('init', function () {
    register_post_type(MADD_WR_TYPE, [
        'labels' => [
            'name' => 'Website Reviews', 'singular_name' => 'Website Review', 'menu_name' => 'Website Reviews',
            'edit_item' => 'Review', 'all_items' => 'All reviews', 'search_items' => 'Search reviews',
            'not_found' => 'No reviews yet',
        ],
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-star-filled',
        'menu_position' => 25,
        'supports' => ['title', 'editor'],
        'capability_type' => 'post',
        'map_meta_cap' => true,
    ]);

    wp_register_script('madd-blocks-web-reviews', MADD_SITE_URL.'assets/madd-blocks-web-reviews.js',
        ['wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-server-side-render'], (string) filemtime(MADD_SITE_DIR.'assets/madd-blocks-web-reviews.js'), true);
    register_block_type('madd/web-reviews', [
        'api_version' => 3,
        'title' => 'MADD Website Reviews',
        'category' => 'widgets',
        'icon' => 'star-filled',
        'editor_script' => 'madd-blocks-web-reviews',
        'attributes' => ['max' => ['type' => 'number', 'default' => 12]],
        'supports' => ['html' => false, 'multiple' => false],
        'render_callback' => 'madd_wr_render',
    ]);
});

// ---------------------------------------------------------------- submit

add_action('rest_api_init', function () {
    register_rest_route('madd/v1', '/review', [
        'methods' => 'POST',
        'permission_callback' => '__return_true',
        'callback' => 'madd_wr_submit',
    ]);
});

function madd_wr_submit(WP_REST_Request $req)
{
    $p = $req->get_params();
    // Bots fill every field (honeypot) or post instantly; answer "ok" so they don't retry.
    if (! empty($p['website']) || (time() - (int) ($p['t'] ?? 0)) < 4) {
        return ['ok' => true];
    }
    $ip = md5((string) ($_SERVER['REMOTE_ADDR'] ?? ''));
    $count = (int) get_transient('madd_wr_'.$ip);
    if ($count >= 3) {
        return new WP_Error('too_many', 'You have already sent a review. Thank you!', ['status' => 429]);
    }

    $name = sanitize_text_field($p['name'] ?? '');
    $country = sanitize_text_field($p['country'] ?? '');
    $service = in_array($p['service'] ?? '', madd_wr_services(), true) ? $p['service'] : '';
    $rating = (int) ($p['rating'] ?? 0);
    $text = trim(sanitize_textarea_field($p['review'] ?? ''));
    $email = sanitize_email($p['email'] ?? '');
    $errors = [];
    if (mb_strlen($name) < 2) {
        $errors['name'] = 'Please enter your name.';
    }
    if ($rating < 1 || $rating > 5) {
        $errors['rating'] = 'Please choose a star rating.';
    }
    if (mb_strlen($text) < 20) {
        $errors['review'] = 'Please write at least 20 characters.';
    }
    if (mb_strlen($text) > 1500) {
        $errors['review'] = 'Please keep your review under 1,500 characters.';
    }
    if (empty($p['consent'])) {
        $errors['consent'] = 'Please allow us to publish your review.';
    }
    if ($errors) {
        return new WP_Error('invalid', 'Please check the form.', ['status' => 422, 'fields' => $errors]);
    }

    $id = wp_insert_post([
        'post_type' => MADD_WR_TYPE,
        'post_status' => 'pending',
        'post_title' => mb_substr($name, 0, 80),
        'post_content' => $text,
        'meta_input' => [
            'madd_rating' => $rating,
            'madd_country' => mb_substr($country, 0, 60),
            'madd_service' => $service,
            'madd_email' => $email,
        ],
    ], true);
    if (is_wp_error($id)) {
        return new WP_Error('save_failed', 'Sorry, your review could not be saved. Please try again.', ['status' => 500]);
    }
    set_transient('madd_wr_'.$ip, $count + 1, DAY_IN_SECONDS);

    wp_mail(get_option('admin_email'), 'New website review ('.$rating.'★) from '.$name,
        $name.($country ? ' — '.$country : '')."\n".str_repeat('★', $rating)."\n\n".$text."\n\n"
        .'Approve it here: '.admin_url('post.php?post='.$id.'&action=edit'));

    return ['ok' => true];
}

// ---------------------------------------------------------------- render

function madd_wr_render($attrs)
{
    $max = max(1, min(24, (int) ($attrs['max'] ?? 12)));
    $show = 6; // the rest open with "Show more reviews"
    // Sample (mockup) reviews are saved as private posts: only logged-in editors see them, marked "Sample".
    $status = current_user_can('edit_posts') ? ['publish', 'private'] : 'publish';
    $all = get_posts(['post_type' => MADD_WR_TYPE, 'post_status' => $status, 'posts_per_page' => -1, 'fields' => 'ids']);
    $ratings = array_map(fn ($id) => (int) get_post_meta($id, 'madd_rating', true), $all);
    $count = count($ratings);
    $avg = $count ? array_sum($ratings) / $count : 0;
    $reviews = array_slice(get_posts(['post_type' => MADD_WR_TYPE, 'post_status' => $status, 'posts_per_page' => $max]), 0, $max);
    $uid = 'madd-wr-'.wp_unique_id();

    ob_start(); ?>
    <div class="madd-wr" data-endpoint="<?php echo esc_url(rest_url('madd/v1/review')); ?>">
        <div class="madd-wr-bar">
            <div class="madd-wr-score">
                <?php if ($count) { ?>
                    <strong><?php echo esc_html(number_format($avg, 1)); ?></strong>
                    <?php echo madd_gr_stars($avg); ?>
                    <span><?php echo esc_html(sprintf(_n('%s review on our website', '%s reviews on our website', $count), number_format($count))); ?></span>
                <?php } else { ?>
                    <span>No website reviews yet — be the first to share your experience.</span>
                <?php } ?>
            </div>
            <button type="button" class="madd-wr-open" aria-expanded="false" aria-controls="<?php echo esc_attr($uid); ?>">Write a review</button>
        </div>

        <form class="madd-wr-form" id="<?php echo esc_attr($uid); ?>" hidden novalidate>
            <div class="madd-wr-field madd-wr-rating" data-field="rating">
                <span class="madd-wr-label">Your rating <i>*</i></span>
                <div class="madd-wr-stars" role="radiogroup" aria-label="Your rating">
                    <?php for ($i = 5; $i >= 1; $i--) { ?>
                        <input type="radio" id="<?php echo esc_attr("$uid-r$i"); ?>" name="rating" value="<?php echo $i; ?>">
                        <label for="<?php echo esc_attr("$uid-r$i"); ?>" title="<?php echo $i; ?> star<?php echo $i > 1 ? 's' : ''; ?>">★</label>
                    <?php } ?>
                </div>
            </div>
            <div class="madd-wr-row">
                <label class="madd-wr-field" data-field="name"><span class="madd-wr-label">Your name <i>*</i></span>
                    <input type="text" name="name" maxlength="80" autocomplete="name" required></label>
                <label class="madd-wr-field" data-field="country"><span class="madd-wr-label">Shipped to (country)</span>
                    <input type="text" name="country" maxlength="60" placeholder="e.g. Japan"></label>
            </div>
            <div class="madd-wr-row">
                <label class="madd-wr-field" data-field="service"><span class="madd-wr-label">Service used</span>
                    <select name="service"><option value="">— Choose —</option>
                        <?php foreach (madd_wr_services() as $s) { ?><option><?php echo esc_html($s); ?></option><?php } ?>
                    </select></label>
                <label class="madd-wr-field" data-field="email"><span class="madd-wr-label">E-mail <small>(not shown on the website)</small></span>
                    <input type="email" name="email" maxlength="120" autocomplete="email"></label>
            </div>
            <label class="madd-wr-field" data-field="review"><span class="madd-wr-label">Your review <i>*</i></span>
                <textarea name="review" rows="5" maxlength="1500" required placeholder="How was your shipment and our service?"></textarea></label>
            <label class="madd-wr-check" data-field="consent"><input type="checkbox" name="consent" value="1">
                <span>I allow MADD to publish my name, country and review on www.madd.co.th. <i>*</i></span></label>
            <input type="text" name="website" class="madd-wr-hp" tabindex="-1" autocomplete="off" aria-hidden="true">
            <input type="hidden" name="t" value="">
            <div class="madd-wr-actions">
                <button type="submit" class="madd-wr-submit">Send my review</button>
                <p class="madd-wr-msg" role="status" aria-live="polite"></p>
            </div>
            <p class="madd-wr-note">Reviews appear on the website after our team has checked them.</p>
        </form>

        <?php if ($reviews) { ?>
            <div class="madd-wr-grid">
                <?php foreach ($reviews as $i => $r) {
                    $rating = (int) get_post_meta($r->ID, 'madd_rating', true);
                    $meta = array_filter([get_post_meta($r->ID, 'madd_country', true) ? 'Shipped to '.get_post_meta($r->ID, 'madd_country', true) : '', get_post_meta($r->ID, 'madd_service', true)]); ?>
                    <article class="madd-wr-item"<?php echo $i >= $show ? ' hidden' : ''; ?>>
                        <?php if ($r->post_status === 'private') { ?><span class="madd-wr-sample" title="Only logged-in editors see sample reviews">Sample</span><?php } ?>
                        <header>
                            <span class="madd-wr-avatar" aria-hidden="true"><?php echo esc_html(mb_strtoupper(mb_substr($r->post_title, 0, 1))); ?></span>
                            <div><strong><?php echo esc_html($r->post_title); ?></strong>
                                <small><?php echo esc_html(get_the_date('j F Y', $r)); ?></small></div>
                        </header>
                        <?php echo madd_gr_stars($rating); ?>
                        <p><?php echo nl2br(esc_html($r->post_content)); ?></p>
                        <?php if ($meta) { ?><footer><?php echo esc_html(implode(' · ', $meta)); ?></footer><?php } ?>
                    </article>
                <?php } ?>
            </div>
            <?php if (count($reviews) > $show) { ?>
                <p class="madd-wr-more-wrap"><button type="button" class="madd-wr-more">Show more reviews</button></p>
            <?php } ?>
        <?php } ?>
    </div>
    <?php
    return ob_get_clean();
}

// ---------------------------------------------------------------- admin

add_filter('manage_'.MADD_WR_TYPE.'_posts_columns', function ($cols) {
    return ['cb' => $cols['cb'], 'title' => 'Name', 'madd_rating' => 'Rating', 'madd_review' => 'Review', 'madd_country' => 'Shipped to', 'date' => $cols['date']];
});
add_action('manage_'.MADD_WR_TYPE.'_posts_custom_column', function ($col, $id) {
    if ($col === 'madd_rating') {
        echo esc_html(str_repeat('★', (int) get_post_meta($id, 'madd_rating', true)));
    } elseif ($col === 'madd_review') {
        echo esc_html(wp_trim_words(get_post_field('post_content', $id), 30));
    } elseif ($col === 'madd_country') {
        echo esc_html(trim(get_post_meta($id, 'madd_country', true).' · '.get_post_meta($id, 'madd_service', true), ' ·'));
    }
}, 10, 2);

// Pending count bubble on the menu, so new reviews are noticed.
add_action('admin_menu', function () {
    global $menu;
    $pending = (int) wp_count_posts(MADD_WR_TYPE)->pending;
    foreach ($menu as $i => $item) {
        if (($item[2] ?? '') === 'edit.php?post_type='.MADD_WR_TYPE && $pending) {
            $menu[$i][0] .= ' <span class="awaiting-mod">'.$pending.'</span>';
        }
    }
}, 99);

// Rating / country / service / e-mail box on the edit screen.
add_action('add_meta_boxes_'.MADD_WR_TYPE, function () {
    add_meta_box('madd_wr_meta', 'Review details', function ($post) {
        wp_nonce_field('madd_wr_meta', 'madd_wr_nonce');
        $v = fn ($k) => esc_attr(get_post_meta($post->ID, $k, true)); ?>
        <p><label>Rating (1–5)<br><input type="number" min="1" max="5" name="madd_rating" value="<?php echo $v('madd_rating'); ?>"></label></p>
        <p><label>Shipped to<br><input type="text" name="madd_country" value="<?php echo $v('madd_country'); ?>" class="widefat"></label></p>
        <p><label>Service<br><input type="text" name="madd_service" value="<?php echo $v('madd_service'); ?>" class="widefat"></label></p>
        <p><label>E-mail (private)<br><input type="email" name="madd_email" value="<?php echo $v('madd_email'); ?>" class="widefat"></label></p>
        <p class="description">Click <b>Publish</b> to show this review on the website.</p>
        <?php
    }, MADD_WR_TYPE, 'side', 'high');
});
add_action('save_post_'.MADD_WR_TYPE, function ($id) {
    if (! isset($_POST['madd_wr_nonce']) || ! wp_verify_nonce($_POST['madd_wr_nonce'], 'madd_wr_meta') || ! current_user_can('edit_post', $id)) {
        return;
    }
    update_post_meta($id, 'madd_rating', max(1, min(5, (int) ($_POST['madd_rating'] ?? 5))));
    foreach (['madd_country', 'madd_service'] as $k) {
        update_post_meta($id, $k, sanitize_text_field(wp_unslash($_POST[$k] ?? '')));
    }
    update_post_meta($id, 'madd_email', sanitize_email(wp_unslash($_POST['madd_email'] ?? '')));
});
// Plain textarea is enough for a review; skip the block editor.
add_filter('use_block_editor_for_post_type', fn ($use, $type) => $type === MADD_WR_TYPE ? false : $use, 10, 2);
