<?php
/**
 * Google reviews for the MADD branches (Google Places API (New)).
 *
 * - API key: Settings → MADD Google Reviews, or define('MADD_GOOGLE_PLACES_KEY', '...') in wp-config.php.
 * - Each branch is matched once by text search and verified by its Google Maps CID (from the branch's Maps link);
 *   only the place ID is stored permanently.
 * - Ratings and reviews are fetched only when an admin presses "บันทึกและดึงข้อมูลใหม่" in the settings page
 *   (MADD fetches about once a year to stay within Google's free usage). Page views never call Google.
 * - Shown through the "MADD Google Reviews" block (madd/google-reviews). It renders nothing until data is available.
 * - Reviewer photos are downloaded into uploads/madd-google-reviews/ on refresh (never hotlinked); initials are the fallback.
 */

if (! defined('ABSPATH')) {
    exit;
}

const MADD_GR_OPTION = 'madd_google_reviews';
const MADD_GR_DATA   = 'madd_google_reviews_data';
const MADD_GR_MIN_RATING = 3; // reviews below this many stars are not kept

// slug => [label, text-search query, Google Maps CID (decimal of the 0x… id in the branch's Maps link)]
function madd_gr_branches()
{
    return [
        'town-in-town' => ['Ladprao (Town in Town)', 'MADD CO.,LTD (UPS & DHL Service) Town in Town, Ladprao 94', '6150344996990278687'],
        'chatuchak'    => ['Chatuchak Weekend Market', 'MADD CO.,LTD. (UPS & DHL Service) Chatuchack Weekend Market', '17387782619955726801'],
        'pratunam'     => ['Pratunam (Palladium)', 'MADD CO.,LTD (UPS) Pratunam Palladium', '13445591597020675580'],
        'khaosan'      => ['Khaosan Road', 'MADD CO,. LTD (UPS & DHL Service) Khaosan Road Banglampoo', '14480027411872894977'],
        'china-town'   => ['China Town (Yaowarach)', 'MADD CO.,LTD. (UPS & DHL Service) China Town Yaowarach', '3520719194458160751'],
    ];
}

function madd_gr_settings()
{
    return wp_parse_args(get_option(MADD_GR_OPTION, []), ['api_key' => '', 'place_ids' => [], 'hidden' => []]);
}

function madd_gr_api_key()
{
    return defined('MADD_GOOGLE_PLACES_KEY') ? MADD_GOOGLE_PLACES_KEY : madd_gr_settings()['api_key'];
}

function madd_gr_request($method, $url, $fieldMask, $body = null)
{
    $res = wp_remote_request($url, [
        'method'  => $method,
        'timeout' => 15,
        'headers' => [
            'Content-Type'     => 'application/json',
            'X-Goog-Api-Key'   => madd_gr_api_key(),
            'X-Goog-FieldMask' => $fieldMask,
        ],
        'body'    => $body ? wp_json_encode($body) : null,
    ]);
    if (is_wp_error($res)) {
        return $res;
    }
    $data = json_decode(wp_remote_retrieve_body($res), true);
    if (wp_remote_retrieve_response_code($res) !== 200) {
        return new WP_Error('madd_gr_http', $data['error']['message'] ?? 'HTTP '.wp_remote_retrieve_response_code($res));
    }

    return (array) $data;
}

// Place ID for a branch: stored after the first successful match (place IDs may be kept indefinitely).
function madd_gr_place_id($slug)
{
    $settings = madd_gr_settings();
    if (! empty($settings['place_ids'][$slug])) {
        return $settings['place_ids'][$slug];
    }
    [, $query, $cid] = madd_gr_branches()[$slug];
    $found = madd_gr_request('POST', 'https://places.googleapis.com/v1/places:searchText', 'places.id,places.googleMapsUri', [
        'textQuery'    => $query,
        'languageCode' => 'en',
        'regionCode'   => 'TH',
    ]);
    if (is_wp_error($found)) {
        return $found;
    }
    foreach ($found['places'] ?? [] as $place) {
        if (strpos($place['googleMapsUri'] ?? '', 'cid='.$cid) !== false) {
            $settings['place_ids'][$slug] = $place['id'];
            update_option(MADD_GR_OPTION, $settings);

            return $place['id'];
        }
    }

    return new WP_Error('madd_gr_nomatch', 'No search result matches the branch’s Google Maps link');
}

// Ratings + reviews for all branches, stored until the next manual refresh.
// Returns ['branches' => [...], 'reviews' => [...], 'errors' => [...], 'fetched' => ts].
function madd_gr_data($refresh = false)
{
    if (! madd_gr_api_key()) {
        return null;
    }
    $stored = get_option(MADD_GR_DATA);
    if (! $refresh) {
        return $stored ?: null;
    }
    $data = ['branches' => [], 'reviews' => [], 'errors' => [], 'fetched' => time()];
    foreach (madd_gr_branches() as $slug => [$label]) {
        $id = madd_gr_place_id($slug);
        $place = is_wp_error($id) ? $id : madd_gr_request('GET', 'https://places.googleapis.com/v1/places/'.rawurlencode($id).'?languageCode=en',
            'id,rating,userRatingCount,googleMapsUri,reviews');
        if (is_wp_error($place)) {
            $data['errors'][$slug] = $place->get_error_message();
            continue;
        }
        $data['branches'][$slug] = [
            'label'  => $label,
            'rating' => (float) ($place['rating'] ?? 0),
            'count'  => (int) ($place['userRatingCount'] ?? 0),
            'uri'    => $place['googleMapsUri'] ?? '',
        ];
        foreach ($place['reviews'] ?? [] as $r) {
            $text = trim($r['originalText']['text'] ?? $r['text']['text'] ?? '');
            $author = $r['authorAttribution']['displayName'] ?? 'Google user';
            $key = madd_gr_review_key($author, $text);
            // The same person often posts one review on several branch listings: keep it once.
            if (($r['rating'] ?? 0) < MADD_GR_MIN_RATING || mb_strlen($text) < 20 || isset($data['reviews'][$key])) {
                continue;
            }
            $data['reviews'][$key] = [
                'branch' => $slug,
                'rating' => (int) $r['rating'],
                'text'   => $text,
                'author' => $author,
                'author_uri' => $r['authorAttribution']['uri'] ?? '',
                'avatar' => madd_gr_save_avatar($key, $r['authorAttribution']['photoUri'] ?? ''),
                'when'   => $r['relativePublishTimeDescription'] ?? '',
                'time'   => $r['publishTime'] ?? '',
                'uri'    => $r['googleMapsUri'] ?? ($place['googleMapsUri'] ?? ''),
            ];
        }
    }
    // Keep the last good reviews if this run returned none (e.g. a temporary API error).
    if (! $data['reviews'] && ! empty($stored['reviews'])) {
        $stored['fetched'] = time();
        $data = $stored;
    }
    update_option(MADD_GR_DATA, $data, false);

    return $data;
}

// Reviewer photos are downloaded into uploads/madd-google-reviews/ so the page never hotlinks Google. Returns the path relative to uploads.
function madd_gr_save_avatar($key, $photoUri)
{
    if (! $photoUri) {
        return '';
    }
    $url = strpos($photoUri, '//') === 0 ? 'https:'.$photoUri : $photoUri;
    $res = wp_remote_get($url, ['timeout' => 15]);
    $type = wp_remote_retrieve_header($res, 'content-type');
    if (is_wp_error($res) || wp_remote_retrieve_response_code($res) !== 200 || strpos((string) $type, 'image/') !== 0) {
        return '';
    }
    $ext = ['image/png' => 'png', 'image/webp' => 'webp', 'image/gif' => 'gif'][$type] ?? 'jpg';
    $dir = wp_upload_dir()['basedir'].'/madd-google-reviews';
    wp_mkdir_p($dir);
    file_put_contents("$dir/$key.$ext", wp_remote_retrieve_body($res));

    return "madd-google-reviews/$key.$ext";
}

function madd_gr_review_key($author, $text)
{
    return md5($author.'|'.$text);
}

function madd_gr_stars($rating)
{
    return '<span class="madd-stars" style="--r:'.esc_attr(round($rating, 1)).'" role="img" aria-label="'.esc_attr(round($rating, 1)).' out of 5 stars"></span>';
}

function madd_gr_render($attrs)
{
    $data = madd_gr_data();
    if (! $data || ! $data['branches']) {
        return '';
    }
    $max = max(3, (int) ($attrs['max'] ?? 12));

    // Overall score weighted by each branch's number of ratings.
    $total = array_sum(array_column($data['branches'], 'count'));
    $score = $total ? array_sum(array_map(fn ($b) => $b['rating'] * $b['count'], $data['branches'])) / $total : 0;

    // Newest first, alternating branches so one location doesn't fill the grid. Reviews hidden in the settings page are skipped.
    $hidden = madd_gr_settings()['hidden'];
    $byBranch = [];
    foreach ($data['reviews'] as $r) {
        if (! in_array(madd_gr_review_key($r['author'], $r['text']), $hidden, true)) {
            $byBranch[$r['branch']][] = $r;
        }
    }
    foreach ($byBranch as &$list) {
        usort($list, fn ($a, $b) => strcmp($b['time'], $a['time']));
    }
    unset($list);
    $picked = [];
    while (count($picked) < $max && $byBranch) {
        foreach ($byBranch as $slug => &$list) {
            if ($list && count($picked) < $max) {
                $picked[] = array_shift($list);
            }
            if (! $list) {
                unset($byBranch[$slug]);
            }
        }
        unset($list);
    }

    $label = $score >= 4.5 ? 'Excellent' : ($score >= 4 ? 'Very good' : 'Good');
    $uploads = wp_upload_dir();

    ob_start(); ?>
    <div class="madd-greviews">
        <div class="madd-greviews-summary">
            <strong class="madd-greviews-label"><?php echo esc_html($label); ?></strong>
            <?php echo madd_gr_stars($score); ?>
            <span class="madd-greviews-total">Based on <b><?php echo esc_html(number_format($total)); ?> reviews</b></span>
            <span class="madd-google-word" aria-label="Google"><i>G</i><i>o</i><i>o</i><i>g</i><i>l</i><i>e</i></span>
        </div>
        <?php if ($picked) { ?>
            <div class="madd-greviews-slider">
                <button type="button" class="madd-greviews-nav is-prev" aria-label="Previous reviews"></button>
                <div class="madd-greviews-track">
                <?php foreach ($picked as $r) {
                    $initial = mb_strtoupper(mb_substr($r['author'], 0, 1));
                    $date = $r['time'] ? wp_date('j F Y', strtotime($r['time'])) : $r['when']; ?>
                    <article class="madd-greview">
                        <header>
                            <?php if (! empty($r['avatar']) && file_exists($uploads['basedir'].'/'.$r['avatar'])) { ?>
                                <img class="madd-greview-avatar" src="<?php echo esc_url($uploads['baseurl'].'/'.$r['avatar']); ?>" alt="" width="40" height="40" loading="lazy">
                            <?php } else { ?>
                                <span class="madd-greview-avatar" aria-hidden="true"><?php echo esc_html($initial); ?></span>
                            <?php } ?>
                            <span class="madd-greview-who">
                                <?php if ($r['author_uri']) { ?>
                                    <a href="<?php echo esc_url($r['author_uri']); ?>" target="_blank" rel="noopener nofollow"><?php echo esc_html($r['author']); ?></a>
                                <?php } else { ?>
                                    <strong><?php echo esc_html($r['author']); ?></strong>
                                <?php } ?>
                                <small><?php echo esc_html($date); ?></small>
                            </span>
                            <span class="madd-g-logo" aria-hidden="true"></span>
                        </header>
                        <?php echo madd_gr_stars($r['rating']); ?>
                        <p class="madd-greview-text"><?php echo esc_html($r['text']); ?></p>
                        <a class="madd-greview-more" href="<?php echo esc_url($r['uri']); ?>" target="_blank" rel="noopener">Read more</a>
                    </article>
                <?php } ?>
                </div>
                <button type="button" class="madd-greviews-nav is-next" aria-label="Next reviews"></button>
            </div>
        <?php } ?>
    </div>
    <?php
    return ob_get_clean();
}

add_action('init', function () {
    wp_register_script(
        'madd-blocks-reviews',
        MADD_SITE_URL.'assets/madd-blocks-reviews.js',
        ['wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-server-side-render'],
        (string) filemtime(MADD_SITE_DIR.'assets/madd-blocks-reviews.js'),
        true
    );
    register_block_type('madd/google-reviews', [
        'api_version'     => 3,
        'title'           => 'MADD Google Reviews',
        'category'        => 'widgets',
        'icon'            => 'star-filled',
        'editor_script'   => 'madd-blocks-reviews',
        'attributes'      => ['max' => ['type' => 'number', 'default' => 12]],
        'supports'        => ['html' => false],
        'render_callback' => 'madd_gr_render',
    ]);
});

// --- Settings page ---
add_action('admin_menu', function () {
    add_options_page('MADD Google Reviews', 'MADD Google Reviews', 'manage_options', 'madd-google-reviews', 'madd_gr_settings_page');
});

add_action('admin_post_madd_gr_save', function () {
    if (! current_user_can('manage_options')) {
        wp_die('Not allowed');
    }
    check_admin_referer('madd_gr_save');
    $settings = madd_gr_settings();
    $key = trim(sanitize_text_field(wp_unslash($_POST['api_key'] ?? '')));
    if ($key !== '') {
        $settings['api_key'] = $key;
    }
    if (! empty($_POST['rematch'])) {
        $settings['place_ids'] = [];
    }
    if (isset($_POST['shown'])) {
        // Every review listed on the page that is not ticked "show" is hidden.
        $listed = array_map('sanitize_key', (array) ($_POST['listed'] ?? []));
        $shown = array_map('sanitize_key', (array) $_POST['shown']);
        $settings['hidden'] = array_values(array_unique(array_merge(array_diff($settings['hidden'], $listed), array_diff($listed, $shown))));
    }
    update_option(MADD_GR_OPTION, $settings);
    $refresh = ! empty($_POST['refresh']);
    if ($refresh) {
        madd_gr_data(true);
    }
    wp_safe_redirect(admin_url('options-general.php?page=madd-google-reviews&updated='.($refresh ? 'fetched' : 'saved')));
    exit;
});

function madd_gr_settings_page()
{
    $settings = madd_gr_settings();
    $key = madd_gr_api_key();
    $data = $key ? get_option(MADD_GR_DATA) : null; ?>
    <div class="wrap">
        <h1>MADD Google Reviews</h1>
        <p>แสดงคะแนนและรีวิวจาก Google Maps ของแต่ละสาขาบนหน้าเว็บ (บล็อก “MADD Google Reviews”) — ระบบดึงข้อมูลจาก Google เฉพาะตอนกดปุ่ม “บันทึกและดึงข้อมูลใหม่” เท่านั้น (แนะนำปีละครั้ง) ข้อมูลที่ดึงมาจะเก็บไว้ในเว็บจนกว่าจะดึงใหม่</p>
        <?php if (isset($_GET['updated'])) { ?><div class="notice notice-success"><p><?php echo $_GET['updated'] === 'fetched' ? 'บันทึกและดึงข้อมูลใหม่จาก Google แล้ว' : 'บันทึกแล้ว'; ?></p></div><?php } ?>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="madd_gr_save">
            <?php wp_nonce_field('madd_gr_save'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="madd_gr_key">Google Places API key</label></th>
                    <td>
                        <input id="madd_gr_key" name="api_key" type="password" class="regular-text" value="" autocomplete="new-password"
                               placeholder="<?php echo $key ? esc_attr(substr($key, 0, 8).'… (บันทึกไว้แล้ว)') : 'AIza...'; ?>" <?php disabled(defined('MADD_GOOGLE_PLACES_KEY')); ?>>
                        <p class="description">ต้องเปิดใช้ <strong>Places API (New)</strong> ใน Google Cloud และแนะนำให้จำกัด key ให้ใช้ได้เฉพาะ Places API</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">จับคู่สาขาใหม่</th>
                    <td><label><input type="checkbox" name="rematch" value="1"> ค้นหาและจับคู่สาขากับ Google Maps ใหม่ทั้งหมด</label></td>
                </tr>
            </table>
            <?php if (! empty($data['reviews'])) { ?>
                <h2>เลือกรีวิวที่จะแสดงบนเว็บ</h2>
                <p>เอาเครื่องหมายถูกออกเพื่อซ่อนรีวิวที่ไม่เหมาะสม (เช่น เนื้อหาไม่เกี่ยวกับบริการ) แล้วกด “บันทึก” — ไม่ต้องดึงข้อมูลใหม่</p>
                <input type="hidden" name="shown[]" value="">
                <table class="widefat striped" style="max-width:1100px">
                    <thead><tr><th style="width:60px">แสดง</th><th>รีวิว</th><th style="width:170px">ผู้รีวิว</th><th style="width:170px">สาขา</th></tr></thead>
                    <tbody>
                    <?php foreach ($data['reviews'] as $r) {
                        $rk = madd_gr_review_key($r['author'], $r['text']); ?>
                        <tr>
                            <td><input type="hidden" name="listed[]" value="<?php echo esc_attr($rk); ?>">
                                <input type="checkbox" name="shown[]" value="<?php echo esc_attr($rk); ?>" <?php checked(! in_array($rk, $settings['hidden'], true)); ?>></td>
                            <td><?php echo esc_html(str_repeat('★', $r['rating'])); ?><br><?php echo esc_html($r['text']); ?></td>
                            <td><?php echo esc_html($r['author']); ?><br><small><?php echo esc_html($r['when']); ?></small></td>
                            <td><?php echo esc_html(madd_gr_branches()[$r['branch']][0] ?? $r['branch']); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
            <p class="submit">
                <?php submit_button('บันทึก', 'primary', 'save', false); ?>
                <?php submit_button('บันทึกและดึงข้อมูลใหม่จาก Google', 'secondary', 'refresh', false); ?>
            </p>
            <p class="description">“ดึงข้อมูลใหม่” จะเรียก Google ประมาณ 5 ครั้ง (สาขาละครั้ง) — แนะนำปีละครั้ง</p>
        </form>
        <h2>สถานะแต่ละสาขา</h2>
        <table class="widefat striped" style="max-width:900px">
            <thead><tr><th>สาขา</th><th>Place ID</th><th>คะแนน</th><th>จำนวนรีวิว</th><th>หมายเหตุ</th></tr></thead>
            <tbody>
            <?php foreach (madd_gr_branches() as $slug => [$label]) {
                $b = $data['branches'][$slug] ?? null; ?>
                <tr>
                    <td><?php echo esc_html($label); ?></td>
                    <td><code><?php echo esc_html($settings['place_ids'][$slug] ?? '—'); ?></code></td>
                    <td><?php echo $b ? esc_html(number_format($b['rating'], 1)) : '—'; ?></td>
                    <td><?php echo $b ? esc_html(number_format($b['count'])) : '—'; ?></td>
                    <td><?php echo esc_html($data['errors'][$slug] ?? ($b ? 'OK' : ($key ? 'ยังไม่มีข้อมูล' : 'ยังไม่ได้ใส่ API key'))); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php if ($data) { ?><p>ดึงข้อมูลล่าสุด: <?php echo esc_html(wp_date('j M Y H:i', $data['fetched'])); ?></p><?php } ?>
    </div>
    <?php
}
