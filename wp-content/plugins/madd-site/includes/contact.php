<?php
/**
 * Contact form ([madd_contact_form], on the Contact us page) — replaces the old site's Contact Form 7.
 *
 * - Posts to REST madd/v1/contact. Every message is kept as a "madd_message" post (admin menu "Contact
 *   Messages") so nothing is lost if e-mail delivery fails, and is e-mailed to MADD_CONTACT_TO
 *   (default customerservice@madd.co.th) with Reply-To set to the sender.
 * - Spam protection as for website reviews: honeypot field, minimum fill time, per-IP limit.
 */

if (! defined('ABSPATH')) {
    exit;
}

const MADD_CT_TYPE = 'madd_message';

if (! defined('MADD_CONTACT_TO')) {
    define('MADD_CONTACT_TO', 'customerservice@madd.co.th');
}

function madd_ct_subjects()
{
    return ['General inquiry', 'Shipping rate / quotation', 'Tracking / my shipment', 'Business & bulk shipping', 'Other'];
}

add_action('init', function () {
    register_post_type(MADD_CT_TYPE, [
        'labels' => [
            'name' => 'Contact Messages', 'singular_name' => 'Contact Message', 'menu_name' => 'Contact Messages',
            'edit_item' => 'Message', 'all_items' => 'All messages', 'search_items' => 'Search messages', 'not_found' => 'No messages yet',
        ],
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-email-alt',
        'menu_position' => 26,
        'supports' => ['title', 'editor'],
        'capability_type' => 'post',
        'capabilities' => ['create_posts' => 'do_not_allow'],
        'map_meta_cap' => true,
    ]);
    add_shortcode('madd_contact_form', 'madd_ct_form');
});

add_action('rest_api_init', function () {
    register_rest_route('madd/v1', '/contact', [
        'methods' => 'POST',
        'permission_callback' => '__return_true',
        'callback' => 'madd_ct_submit',
    ]);
});

function madd_ct_submit(WP_REST_Request $req)
{
    $p = $req->get_params();
    // Bots fill every field (honeypot) or post instantly; answer "ok" so they don't retry.
    if (! empty($p['website']) || (time() - (int) ($p['t'] ?? 0)) < 3) {
        return ['ok' => true];
    }
    $ip = md5((string) ($_SERVER['REMOTE_ADDR'] ?? ''));
    $count = (int) get_transient('madd_ct_'.$ip);
    if ($count >= 5) {
        return new WP_Error('too_many', 'You have sent several messages already. Please contact us by phone or LINE.', ['status' => 429]);
    }

    $name = sanitize_text_field($p['name'] ?? '');
    $email = sanitize_email($p['email'] ?? '');
    $phone = sanitize_text_field($p['phone'] ?? '');
    $subject = in_array($p['subject'] ?? '', madd_ct_subjects(), true) ? $p['subject'] : 'General inquiry';
    $message = trim(sanitize_textarea_field($p['message'] ?? ''));
    $errors = [];
    if (mb_strlen($name) < 2) {
        $errors['name'] = 'Please enter your name.';
    }
    if (! is_email($email)) {
        $errors['email'] = 'Please enter a valid e-mail address.';
    }
    if (mb_strlen($message) < 10) {
        $errors['message'] = 'Please write at least 10 characters.';
    }
    if (mb_strlen($message) > 3000) {
        $errors['message'] = 'Please keep your message under 3,000 characters.';
    }
    if ($errors) {
        return new WP_Error('invalid', 'Please check the form.', ['status' => 422, 'fields' => $errors]);
    }

    $id = wp_insert_post([
        'post_type' => MADD_CT_TYPE,
        'post_status' => 'private',
        'post_title' => mb_substr($subject.' — '.$name, 0, 120),
        'post_content' => $message,
        'meta_input' => ['madd_email' => $email, 'madd_phone' => mb_substr($phone, 0, 40), 'madd_subject' => $subject],
    ], true);
    if (is_wp_error($id)) {
        return new WP_Error('save_failed', 'Sorry, your message could not be sent. Please try again or contact us by phone.', ['status' => 500]);
    }
    set_transient('madd_ct_'.$ip, $count + 1, HOUR_IN_SECONDS);

    wp_mail(MADD_CONTACT_TO, '[Website] '.$subject.' — '.$name,
        "Name: {$name}\nE-mail: {$email}".($phone ? "\nPhone: {$phone}" : '')."\nSubject: {$subject}\n\n{$message}\n\n— "
        .admin_url('post.php?post='.$id.'&action=edit'),
        ['Reply-To: '.$name.' <'.$email.'>']);

    return ['ok' => true];
}

function madd_ct_form()
{
    ob_start(); ?>
    <form class="madd-ct" data-endpoint="<?php echo esc_url(rest_url('madd/v1/contact')); ?>" novalidate>
        <div class="madd-ct-row">
            <label class="madd-ct-field" data-field="name"><span>Your name <b>*</b></span><input type="text" name="name" maxlength="80" autocomplete="name" required></label>
            <label class="madd-ct-field" data-field="email"><span>Your e-mail <b>*</b></span><input type="email" name="email" maxlength="120" autocomplete="email" required></label>
        </div>
        <div class="madd-ct-row">
            <label class="madd-ct-field" data-field="phone"><span>Phone / LINE / WhatsApp</span><input type="text" name="phone" maxlength="40" autocomplete="tel"></label>
            <label class="madd-ct-field" data-field="subject"><span>Subject</span><select name="subject"><?php foreach (madd_ct_subjects() as $s) : ?><option><?php echo esc_html($s); ?></option><?php endforeach; ?></select></label>
        </div>
        <label class="madd-ct-field" data-field="message"><span>Your message <b>*</b></span><textarea name="message" rows="6" maxlength="3000" required placeholder="Tell us what you would like to send, where to, and roughly how big or heavy it is."></textarea></label>
        <label class="madd-ct-hp" aria-hidden="true">Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
        <input type="hidden" name="t" value="">
        <button type="submit" class="madd-ct-send">Send message</button>
        <p class="madd-ct-status" role="status" hidden></p>
    </form>
    <?php
    return ob_get_clean();
}

// ---------------------------------------------------------------- admin list

add_filter('manage_'.MADD_CT_TYPE.'_posts_columns', function ($cols) {
    return ['cb' => $cols['cb'], 'title' => 'Subject — name', 'madd_email' => 'E-mail', 'madd_phone' => 'Phone', 'madd_msg' => 'Message', 'date' => 'Received'];
});
add_action('manage_'.MADD_CT_TYPE.'_posts_custom_column', function ($col, $id) {
    if ($col === 'madd_email') {
        $e = get_post_meta($id, 'madd_email', true);
        echo '<a href="mailto:'.esc_attr($e).'">'.esc_html($e).'</a>';
    } elseif ($col === 'madd_phone') {
        echo esc_html(get_post_meta($id, 'madd_phone', true));
    } elseif ($col === 'madd_msg') {
        echo esc_html(wp_trim_words(get_post_field('post_content', $id), 24));
    }
}, 10, 2);
