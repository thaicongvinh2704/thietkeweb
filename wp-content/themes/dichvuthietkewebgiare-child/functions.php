<?php
/**
 * Homepage redesign child theme functions.
 *
 * @package dvtkwgr-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'DVTKWGR_CHILD_VERSION', '1.0.0' );

function dvtkwgr_child_home_asset( $path = '' ) {
	return get_template_directory_uri() . '/assets/images/' . ltrim( $path, '/' );
}

function dvtkwgr_child_global_assets() {
	$css_path = get_stylesheet_directory() . '/assets/css/header.min.css';
	$js_path  = get_stylesheet_directory() . '/assets/js/header.js';

	wp_enqueue_style(
		'dvtkwgr-header',
		get_stylesheet_directory_uri() . '/assets/css/header.min.css',
		array( 'dvtkwgr-main' ),
		file_exists( $css_path ) ? (string) filemtime( $css_path ) : DVTKWGR_CHILD_VERSION
	);

	wp_enqueue_script(
		'dvtkwgr-header',
		get_stylesheet_directory_uri() . '/assets/js/header.js',
		array(),
		file_exists( $js_path ) ? (string) filemtime( $js_path ) : DVTKWGR_CHILD_VERSION,
		true
	);
	wp_script_add_data( 'dvtkwgr-header', 'defer', true );
}
add_action( 'wp_enqueue_scripts', 'dvtkwgr_child_global_assets', 15 );

function dvtkwgr_child_assets() {
	if ( ! is_front_page() ) {
		return;
	}

	$css_path = get_stylesheet_directory() . '/assets/css/homepage.css';
	$js_path  = get_stylesheet_directory() . '/assets/js/homepage.js';

	wp_enqueue_style(
		'dvtkwgr-homepage',
		get_stylesheet_directory_uri() . '/assets/css/homepage.css',
		array( 'dvtkwgr-main' ),
		file_exists( $css_path ) ? (string) filemtime( $css_path ) : DVTKWGR_CHILD_VERSION
	);

	wp_enqueue_script(
		'dvtkwgr-homepage',
		get_stylesheet_directory_uri() . '/assets/js/homepage.js',
		array(),
		file_exists( $js_path ) ? (string) filemtime( $js_path ) : DVTKWGR_CHILD_VERSION,
		true
	);
	wp_script_add_data( 'dvtkwgr-homepage', 'defer', true );
}
add_action( 'wp_enqueue_scripts', 'dvtkwgr_child_assets', 20 );

function dvtkwgr_child_preload_hero() {
	if ( ! is_front_page() ) {
		return;
	}

	printf(
		'<link rel="preload" as="image" href="%s" type="image/webp" fetchpriority="high">' . "\n",
		esc_url( dvtkwgr_child_home_asset( 'homepage-web-design-hero.webp' ) )
	);
}
add_action( 'wp_head', 'dvtkwgr_child_preload_hero', 1 );

function dvtkwgr_child_contact_redirect( $status ) {
	$url = add_query_arg( 'home_contact', sanitize_key( $status ), home_url( '/' ) );
	wp_safe_redirect( $url . '#tu-van' );
	exit;
}

function dvtkwgr_child_handle_home_contact() {
	if (
		empty( $_POST['dvtkwgr_home_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['dvtkwgr_home_nonce'] ) ), 'dvtkwgr_home_contact' )
	) {
		dvtkwgr_child_contact_redirect( 'invalid' );
	}

	if ( ! empty( $_POST['company_website'] ) ) {
		dvtkwgr_child_contact_redirect( 'success' );
	}

	$name         = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$phone        = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$email        = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$website_type = isset( $_POST['website_type'] ) ? sanitize_text_field( wp_unslash( $_POST['website_type'] ) ) : '';
	$budget       = isset( $_POST['budget'] ) ? sanitize_text_field( wp_unslash( $_POST['budget'] ) ) : '';
	$message      = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	$consent      = ! empty( $_POST['consent'] );

	if ( '' === $name || '' === $phone || '' === $message || ! $consent || ( '' !== $email && ! is_email( $email ) ) ) {
		dvtkwgr_child_contact_redirect( 'invalid' );
	}

	$lines = array(
		'Họ và tên: ' . $name,
		'Số điện thoại: ' . $phone,
		'Email: ' . ( $email ? $email : 'Chưa cung cấp' ),
		'Loại website: ' . ( $website_type ? $website_type : 'Chưa xác định' ),
		'Ngân sách dự kiến: ' . ( $budget ? $budget : 'Chưa xác định' ),
		'',
		'Nội dung yêu cầu:',
		$message,
	);
	$headers = array( 'Content-Type: text/plain; charset=UTF-8' );

	if ( $email ) {
		$headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
	}

	$sent = wp_mail(
		dvtkwgr_contact_email(),
		'Yêu cầu tư vấn website từ ' . $name,
		implode( "\n", $lines ),
		$headers
	);

	dvtkwgr_child_contact_redirect( $sent ? 'success' : 'error' );
}
add_action( 'admin_post_dvtkwgr_home_contact', 'dvtkwgr_child_handle_home_contact' );
add_action( 'admin_post_nopriv_dvtkwgr_home_contact', 'dvtkwgr_child_handle_home_contact' );

function dvtkwgr_child_home_schema() {
	if ( ! is_front_page() ) {
		return;
	}

	$faqs = array(
		'Thiết kế website mất bao lâu?' => 'Thời gian phụ thuộc vào số trang, mức độ tùy chỉnh, nội dung và chức năng. Mốc triển khai cụ thể được thống nhất sau khi làm rõ phạm vi.',
		'Giá thiết kế website được tính như thế nào?' => 'Chi phí được tính theo số lượng trang, mức tùy chỉnh giao diện, chức năng, nội dung và yêu cầu tích hợp. Mọi phần phát sinh đều được báo trước.',
		'Có được xem demo trước không?' => 'Có. Khách hàng được xem demo và gửi phản hồi trong phạm vi đã thống nhất trước khi hoàn thiện.',
		'Website có dùng tốt trên điện thoại không?' => 'Có. Giao diện được kiểm tra trên điện thoại, máy tính bảng và máy tính để bảo đảm nội dung dễ đọc và thao tác thuận tiện.',
		'Sau bàn giao có tự cập nhật nội dung được không?' => 'Website WordPress cho phép cập nhật bài viết, hình ảnh và các nội dung cơ bản sau khi được hướng dẫn quản trị.',
		'Có bàn giao source code không?' => 'Phạm vi bàn giao source code và tài khoản quản trị được ghi rõ trong báo giá hoặc thỏa thuận triển khai.',
		'Có hỗ trợ SEO và quảng cáo không?' => 'Website có cấu trúc SEO nền tảng. Các hạng mục SEO nội dung hoặc quảng cáo chuyên sâu được tư vấn riêng theo nhu cầu.',
		'Chi phí duy trì hằng năm gồm những gì?' => 'Chi phí thường gồm tên miền, hosting và các dịch vụ trả phí được chọn thêm. Mức thực tế phụ thuộc cấu hình sử dụng.',
	);
	$entities = array();

	foreach ( $faqs as $question => $answer ) {
		$entities[] = array(
			'@type'          => 'Question',
			'name'           => $question,
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => $answer,
			),
		);
	}

	$schema = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type'       => 'Service',
				'name'        => 'Dịch vụ thiết kế website WordPress',
				'provider'    => array(
					'@type' => 'ProfessionalService',
					'name'  => dvtkwgr_site_name(),
					'url'   => home_url( '/' ),
					'email' => dvtkwgr_contact_email(),
				),
				'areaServed'  => 'Việt Nam',
				'description' => 'Thiết kế website WordPress cho doanh nghiệp vừa và nhỏ, rõ phạm vi, dễ quản trị và responsive đa thiết bị.',
			),
			array(
				'@type'      => 'FAQPage',
				'mainEntity' => $entities,
			),
		),
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}

function dvtkwgr_child_home_meta() {
	if ( ! is_front_page() ) {
		return;
	}

	$title       = 'Thiết kế website giá hợp lý cho doanh nghiệp vừa và nhỏ';
	$description = 'Dịch vụ thiết kế website WordPress rõ phạm vi, responsive đa thiết bị, dễ quản trị và có bảng giá tham khảo cho doanh nghiệp vừa và nhỏ.';
	$url         = home_url( '/' );
	$image       = dvtkwgr_child_home_asset( 'homepage-web-design-hero.webp' );

	printf( '<link rel="canonical" href="%s">' . "\n", esc_url( $url ) );
	printf( '<meta name="description" content="%s">' . "\n", esc_attr( $description ) );
	echo '<meta property="og:type" content="website">' . "\n";
	printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( $title ) );
	printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $description ) );
	printf( '<meta property="og:url" content="%s">' . "\n", esc_url( $url ) );
	printf( '<meta property="og:site_name" content="%s">' . "\n", esc_attr( dvtkwgr_site_name() ) );
	printf( '<meta property="og:image" content="%s">' . "\n", esc_url( $image ) );
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	printf( '<meta name="twitter:title" content="%s">' . "\n", esc_attr( $title ) );
	printf( '<meta name="twitter:description" content="%s">' . "\n", esc_attr( $description ) );
	printf( '<meta name="twitter:image" content="%s">' . "\n", esc_url( $image ) );
}

function dvtkwgr_child_replace_home_schema() {
	if ( ! is_front_page() ) {
		return;
	}

	remove_action( 'wp_head', 'dvtkwgr_output_canonical_and_social_meta', 2 );
	remove_action( 'wp_head', 'dvtkwgr_schema_json_ld' );
	add_action( 'wp_head', 'dvtkwgr_child_home_meta', 2 );
	add_action( 'wp_head', 'dvtkwgr_child_home_schema', 12 );
}
add_action( 'wp', 'dvtkwgr_child_replace_home_schema' );
