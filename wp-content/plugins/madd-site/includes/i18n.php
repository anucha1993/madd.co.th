<?php
/**
 * Thai version of the site's shared parts (Polylang: the pages themselves are translated in wp-admin).
 *
 * On /th/ pages only:
 * - header / mobile "HOT PROMOTION" button, mobile drawer texts, footer widgets and copyright → Thai, and their
 *   links (/?page_id=N, /slug/) → the Thai page when one exists;
 * - text rendered by madd-site itself (Get a shipping quote card, contact form, review form, article list,
 *   article end box) → Thai, through madd_th_strtr();
 * - window.MaddTh: the same dictionary for messages written by madd-site.js (see maddT() there).
 */

if (! defined('ABSPATH')) {
    exit;
}

function madd_is_th()
{
    return function_exists('pll_current_language') && pll_current_language() === 'th';
}

// English UI text → Thai. Keys are matched literally (with their tags where a short word could appear elsewhere).
function madd_th_dict()
{
    return [
        // header, drawer, footer
        'HOT PROMOTION' => 'โปรโมชั่น',
        'Talk to our team' => 'คุยกับทีมงาน',
        'Call 02 629 4441-2' => 'โทร. 02 629 4441-2',
        'International Shipping from Thailand You Can Trust.' => 'ส่งพัสดุไปต่างประเทศจากไทย มั่นใจได้กับ MADD',
        'Affordable international shipping for parcels, goods and products by MADD.Co.,Ltd' => 'บริการส่งพัสดุ สินค้า และผลิตภัณฑ์ไปต่างประเทศในราคาคุ้มค่า โดย MADD.Co.,Ltd',
        '1631 Town in Town Soi 7 Soi Laprao94 (Panjamitr), Plubpla, Wangthonglang, Bangkok, Thailand' => '1631 ทาวน์อินทาวน์ ซอย 7 ซอยลาดพร้าว 94 (ปัญจมิตร) แขวงพลับพลา เขตวังทองหลาง กรุงเทพฯ',
        '<strong>Our websites</strong>' => '<strong>เว็บไซต์ของเรา</strong>',
        ' – Our main website' => ' – เว็บไซต์หลักของเรา',
        '>Contact us<' => '>ติดต่อเรา<',
        '☎ Tel:' => '☎ โทร:',
        '📱 Mobile:' => '📱 มือถือ:',
        '<strong>Our Thai domain names</strong>' => '<strong>โดเมนภาษาไทยของเรา</strong>',
        'The Thai domain names make it easier for Thai customers to find us and access our services via the Thai names. All websites are maintained under the same high service standards of MADD Co., Ltd.' => 'โดเมนภาษาไทยช่วยให้ลูกค้าคนไทยค้นหาและเข้าถึงบริการของเราได้ง่ายขึ้น ทุกเว็บไซต์ดูแลภายใต้มาตรฐานการบริการเดียวกันของ MADD Co., Ltd.',
        '>Our Branch<' => '>สาขาของเรา<',
        '>Khaosan road<' => '>ถนนข้าวสาร<',
        '>China town (Yaowarach)<' => '>ไชน่าทาวน์ (เยาวราช)<',
        '>Chatuchak Weekend Market<' => '>ตลาดนัดจตุจักร<',
        '>Ladprao (Town in Town)<' => '>ลาดพร้าว (ทาวน์อินทาวน์)<',
        '>Pratunam (Palladium)<' => '>ประตูน้ำ (พาลาเดียม)<',
        '>Bangkapi (Ladprao 115)<' => '>บางกะปิ (ลาดพร้าว 115)<',
        '>Quick Links<' => '>ลิงก์ด่วน<',
        '>Hot Promotion<' => '>โปรโมชั่น<',
        '>How to Calculate Shipping Cost<' => '>วิธีคำนวณค่าส่ง<',
        '>Check Status<' => '>ติดตามพัสดุ<',
        '>Prohibited Article<' => '>สิ่งของต้องห้าม<',
        '>Articles<' => '>บทความ<',
        '>FAQ<' => '>คำถามที่พบบ่อย<',
        'All rights reserved.' => 'สงวนลิขสิทธิ์',

        // Get a shipping quote card (quote-pause.php)
        'Get a shipping quote' => 'ขอใบเสนอราคาค่าส่ง',
        'Send us a few details and our team will compare UPS, DHL and SAGAWA for you and reply with the best rate for your shipment.' => 'แจ้งรายละเอียดพัสดุสั้น ๆ แล้วทีมงานจะเปรียบเทียบราคา UPS, DHL และ SAGAWA ให้ พร้อมแจ้งราคาที่คุ้มที่สุดสำหรับพัสดุของคุณ',
        'What to tell us' => 'ข้อมูลที่ต้องแจ้ง',
        '<strong>Destination</strong> country and city / postcode' => '<strong>ปลายทาง</strong> ประเทศ และเมือง / รหัสไปรษณีย์',
        '<strong>Weight</strong> of each box (kg)' => '<strong>น้ำหนัก</strong> ของแต่ละกล่อง (กก.)',
        '<strong>Size</strong> of each box (L × W × H cm)' => '<strong>ขนาด</strong> ของแต่ละกล่อง (ยาว × กว้าง × สูง ซม.)',
        '<strong>What is inside</strong> — documents, personal items or goods' => '<strong>สิ่งของข้างใน</strong> — เอกสาร ของใช้ส่วนตัว หรือสินค้า',
        'Ask for a quote on LINE' => 'ขอราคาผ่าน LINE',
        'Or e-mail ' => 'หรืออีเมล ',

        // contact form (contact.php)
        '<span>Your name <b>*</b>' => '<span>ชื่อของคุณ <b>*</b>',
        '<span>Your e-mail <b>*</b>' => '<span>อีเมลของคุณ <b>*</b>',
        '<span>Phone / LINE / WhatsApp</span>' => '<span>โทรศัพท์ / LINE / WhatsApp</span>',
        '<span>Subject</span>' => '<span>หัวข้อ</span>',
        '<option>General inquiry</option>' => '<option value="General inquiry">สอบถามทั่วไป</option>',
        '<option>Shipping rate / quotation</option>' => '<option value="Shipping rate / quotation">ค่าส่ง / ขอใบเสนอราคา</option>',
        '<option>Tracking / my shipment</option>' => '<option value="Tracking / my shipment">ติดตามพัสดุ / พัสดุของฉัน</option>',
        '<option>Business &amp; bulk shipping</option>' => '<option value="Business &amp; bulk shipping">ธุรกิจ &amp; ส่งจำนวนมาก</option>',
        '<option>Other</option>' => '<option value="Other">อื่น ๆ</option>',
        '<span>Your message <b>*</b>' => '<span>ข้อความ <b>*</b>',
        'Tell us what you would like to send, where to, and roughly how big or heavy it is.' => 'บอกเราว่าต้องการส่งอะไร ไปที่ไหน และขนาดหรือน้ำหนักโดยประมาณ',
        '>Send message<' => '>ส่งข้อความ<',

        // website reviews form (web-reviews.php)
        ' reviews on our website' => ' รีวิวบนเว็บไซต์ของเรา',
        ' review on our website' => ' รีวิวบนเว็บไซต์ของเรา',
        'No website reviews yet — be the first to share your experience.' => 'ยังไม่มีรีวิวบนเว็บไซต์ — มาเป็นคนแรกที่แชร์ประสบการณ์',
        '>Write a review<' => '>เขียนรีวิว<',
        'Your rating <i>*</i>' => 'คะแนนของคุณ <i>*</i>',
        'aria-label="Your rating"' => 'aria-label="คะแนนของคุณ"',
        'Your name <i>*</i>' => 'ชื่อของคุณ <i>*</i>',
        'Shipped to (country)' => 'ส่งไปประเทศ',
        'placeholder="e.g. Japan"' => 'placeholder="เช่น ญี่ปุ่น"',
        'Service used' => 'บริการที่ใช้',
        '— Choose —' => '— เลือก —',
        'E-mail <small>(not shown on the website)</small>' => 'อีเมล <small>(ไม่แสดงบนเว็บไซต์)</small>',
        'Your review <i>*</i>' => 'รีวิวของคุณ <i>*</i>',
        'How was your shipment and our service?' => 'การส่งพัสดุและบริการของเราเป็นอย่างไรบ้าง?',
        'I allow MADD to publish my name, country and review on www.madd.co.th.' => 'ยินยอมให้ MADD เผยแพร่ชื่อ ประเทศ และรีวิวของฉันบน www.madd.co.th',
        '>Send my review<' => '>ส่งรีวิว<',
        'Reviews appear on the website after our team has checked them.' => 'รีวิวจะแสดงบนเว็บไซต์หลังจากทีมงานตรวจสอบแล้ว',
        '>Show more reviews<' => '>ดูรีวิวเพิ่มเติม<',
        'Shipped to ' => 'ส่งไป ',

        // article list + article end (articles.php)
        'placeholder="Search articles, e.g. customs, packing, e-commerce…"' => 'placeholder="ค้นหาบทความ เช่น ศุลกากร การแพ็ค อีคอมเมิร์ซ…"',
        '>Search articles<' => '>ค้นหาบทความ<',
        '>Our services<' => '>บริการของเรา<',
        '>What can I send?<' => '>ส่งอะไรได้บ้าง?<',
        '>Shipping cost &amp; customs<' => '>ค่าส่ง &amp; ศุลกากร<',
        '>How to ship<' => '>วิธีส่งพัสดุ<',
        '>Grow your online business<' => '>ขยายธุรกิจออนไลน์<',
        ' articles</p>' => ' บทความ</p>',
        'No articles match your search. Ask our team on LINE or call +66 (0)2 629 4441-2.' => 'ไม่พบบทความที่ค้นหา สอบถามทีมงานทาง LINE หรือโทร 02 629 4441-2',
        '← Articles' => '← บทความ',
        '<p class="madd-art-related-title">Related pages</p>' => '<p class="madd-art-related-title">หน้าที่เกี่ยวข้อง</p>',
        'Ready to ship from Thailand?' => 'พร้อมส่งพัสดุจากไทยแล้วใช่ไหม?',
        'Check your shipping rate online, or ask our team on LINE.' => 'เช็คค่าบริการออนไลน์ได้ทันที หรือทักมาคุยกับทีมงานเราทาง LINE ได้เลย',
        'Ask our team on LINE for a shipping quote.' => 'ทักมาขอราคาค่าส่งกับทีมงานทาง LINE ได้เลย',
        '>Check shipping rate<' => '>เช็คค่าบริการขนส่ง<',
        '>Chat on LINE<' => '>แชทคุยกับเราทาง LINE<',
    ];
}

function madd_th_strtr($html)
{
    return madd_is_th() ? strtr((string) $html, madd_th_dict()) : $html;
}

// /?page_id=N and /slug/ links → the Thai page (if it has one)
function madd_th_links($html)
{
    if (! madd_is_th()) {
        return $html;
    }

    return preg_replace_callback('#href="((?:'.preg_quote(home_url(), '#').')?/(?!th/|wp-)[^"]*)"#', function ($m) {
        $url = html_entity_decode($m[1]);
        $frag = ($h = strpos($url, '#')) !== false ? substr($url, $h) : '';
        $path = $frag !== '' ? substr($url, 0, $h) : $url;
        $id = preg_match('#[?&]page_id=(\d+)#', $path, $pm) ? (int) $pm[1] : url_to_postid(str_starts_with($path, 'http') ? $path : home_url($path));
        $th = $id ? (int) pll_get_post($id, 'th') : 0;

        return $th ? 'href="'.esc_url(get_permalink($th).$frag).'"' : $m[0];
    }, $html);
}

add_filter('widget_block_content', fn ($html) => madd_th_links(madd_th_strtr($html)), 20);
foreach (['header_button_label', 'mobile_button_label', 'mobile_html_content', 'footer_html_content'] as $mod) {
    add_filter('theme_mod_'.$mod, fn ($v) => madd_th_strtr($v));
}
foreach (['header_button_link', 'mobile_button_link'] as $mod) {
    add_filter('theme_mod_'.$mod, function ($v) {
        return madd_is_th() && ($th = pll_get_post(24, 'th')) ? wp_make_link_relative(get_permalink($th)) : $v;
    });
}
add_filter('option_blogdescription', fn ($v) => madd_is_th() ? 'ส่งพัสดุไปต่างประเทศจากไทย มั่นใจได้กับ MADD' : $v);
add_filter('do_shortcode_tag', function ($out, $tag) {
    return in_array($tag, ['madd_contact_form', 'madd_shipping_guide', 'madd_visitors'], true) ? madd_th_strtr($out) : $out;
}, 20, 2);
add_filter('render_block', function ($html, $block) {
    return in_array($block['blockName'], ['madd/web-reviews', 'madd/rate-quote', 'core/group'], true) && madd_is_th() && str_contains($html, 'madd-')
        ? ($block['blockName'] === 'core/group' && ! str_contains($html, 'madd-contact-card') ? $html : madd_th_strtr($html))
        : $html;
}, 20, 2);
add_filter('the_content', fn ($html) => is_singular('post') ? madd_th_links(madd_th_strtr($html)) : $html, 30);

// messages written by madd-site.js
add_action('wp_enqueue_scripts', function () {
    if (! madd_is_th()) {
        return;
    }
    wp_add_inline_script('madd-site', 'window.MaddTh = '.wp_json_encode([
        'Close' => 'ปิด',
        'Write a review' => 'เขียนรีวิว',
        'Sending…' => 'กำลังส่ง…',
        'Send message' => 'ส่งข้อความ',
        'Sorry, something went wrong. Please try again.' => 'ขออภัย เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง',
        'Sorry, your message could not be sent. Please try again or contact us by phone or LINE.' => 'ขออภัย ส่งข้อความไม่สำเร็จ กรุณาลองใหม่ หรือติดต่อเราทางโทรศัพท์หรือ LINE',
        'Thank you for your review!' => 'ขอบคุณสำหรับรีวิว!',
        'It will appear on our website after our team has checked it.' => 'รีวิวจะแสดงบนเว็บไซต์หลังจากทีมงานตรวจสอบแล้ว',
        'Please check the form.' => 'กรุณาตรวจสอบข้อมูลในแบบฟอร์ม',
        'Please enter your name.' => 'กรุณากรอกชื่อ',
        'Please enter a valid e-mail address.' => 'กรุณากรอกอีเมลให้ถูกต้อง',
        'Please write at least 10 characters.' => 'กรุณาเขียนอย่างน้อย 10 ตัวอักษร',
        'Please write at least 20 characters.' => 'กรุณาเขียนอย่างน้อย 20 ตัวอักษร',
        'Please choose a star rating.' => 'กรุณาให้คะแนน',
        'Please allow us to publish your review.' => 'กรุณายินยอมให้เราเผยแพร่รีวิว',
        'You have already sent a review. Thank you!' => 'คุณส่งรีวิวแล้ว ขอบคุณค่ะ!',
        'Dimensional weight = L × W × H ÷ 5,000. The greater of the two weights is generally used.' => 'น้ำหนักตามปริมาตร = ยาว × กว้าง × สูง ÷ 5,000 โดยทั่วไปจะคิดจากน้ำหนักที่มากกว่า',
        'Your parcel is bulky for its weight — you are charged for the dimensional weight.' => 'พัสดุมีขนาดใหญ่เมื่อเทียบกับน้ำหนัก — คิดค่าส่งตามน้ำหนักตามปริมาตร',
        'Your parcel is heavier than its size — you are charged for the actual weight.' => 'พัสดุหนักเมื่อเทียบกับขนาด — คิดค่าส่งตามน้ำหนักจริง',
        'Enter the box size and weight.' => 'ใส่ขนาดกล่องและน้ำหนัก',
        'Light but bulky — charged by its size.' => 'น้ำหนักเบาแต่ขนาดใหญ่ — คิดค่าส่งตามขนาด',
        'Heavy for its size — charged by its actual weight.' => 'หนักเมื่อเทียบกับขนาด — คิดค่าส่งตามน้ำหนักจริง',
        'Copied — paste anywhere' => 'คัดลอกแล้ว — วางได้ทุกที่',
        'Swipe' => 'ปัด',
        'Visitors today' => 'ผู้เข้าชมวันนี้',
        'This month' => 'เดือนนี้',
        'Total' => 'ทั้งหมด',
    ], JSON_UNESCAPED_UNICODE).';', 'before');
}, 20);
