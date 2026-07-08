<?php
/**
 * Theme functions.
 *
 * @package dvtkwgr
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'DVTKWGR_VERSION', '1.0.1' );
define( 'DVTKWGR_REWRITE_VERSION', '20260629.5' );

function dvtkwgr_asset( $path ) {
	return get_template_directory_uri() . '/assets/' . ltrim( $path, '/' );
}

function dvtkwgr_logo_asset( $file ) {
	$file = ltrim( $file, '/' );
	$direct_path = get_theme_file_path( 'assets/images/' . $file );

	if ( file_exists( $direct_path ) ) {
		return dvtkwgr_asset( 'images/' . $file );
	}

	return dvtkwgr_asset( 'images/file%20logo%20chinh%20thuc/' . $file );
}

function dvtkwgr_home_banner_asset() {
	return dvtkwgr_asset( 'images/office-people-working-centered-logo.webp' );
}

function dvtkwgr_contact_email() {
	return 'contact@dichvuthietketrangweb.com';
}

function dvtkwgr_facebook_url() {
	return 'https://www.facebook.com/people/D%E1%BB%8Bch-v%E1%BB%A5-thi%E1%BA%BFt-k%E1%BA%BF-web-gi%C3%A1-r%E1%BA%BB/61578982262267/';
}

function dvtkwgr_site_name() {
	$site_name = trim( get_bloginfo( 'name' ) );

	return $site_name ? $site_name : 'Dịch Vụ Thiết Kế Trang Web';
}

function dvtkwgr_setup() {
	load_theme_textdomain( 'dvtkwgr', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array( 'height' => 80, 'width' => 260, 'flex-width' => true, 'flex-height' => true ) );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Menu chính', 'dvtkwgr' ),
		)
	);
}
add_action( 'after_setup_theme', 'dvtkwgr_setup' );

function dvtkwgr_assets() {
	wp_enqueue_style( 'dvtkwgr-main', get_template_directory_uri() . '/assets/css/main.css', array(), DVTKWGR_VERSION );
	wp_enqueue_script( 'dvtkwgr-main', get_template_directory_uri() . '/assets/js/main.js', array(), DVTKWGR_VERSION, true );
	wp_script_add_data( 'dvtkwgr-main', 'defer', true );
}
add_action( 'wp_enqueue_scripts', 'dvtkwgr_assets' );

function dvtkwgr_output_favicon_links() {
	if ( has_site_icon() ) {
		return;
	}

	printf( '<link rel="icon" href="%s" sizes="32x32" type="image/png">' . "\n", esc_url( dvtkwgr_logo_asset( '12-favicon-32x32.png' ) ) );
	printf( '<link rel="icon" href="%s" sizes="48x48" type="image/png">' . "\n", esc_url( dvtkwgr_logo_asset( '12-favicon-48x48.png' ) ) );
	printf( '<link rel="shortcut icon" href="%s">' . "\n", esc_url( dvtkwgr_logo_asset( '13-favicon.ico' ) ) );
	printf( '<link rel="apple-touch-icon" href="%s" sizes="180x180">' . "\n", esc_url( dvtkwgr_logo_asset( '14-apple-touch-icon-180x180.png' ) ) );
}
add_action( 'wp_head', 'dvtkwgr_output_favicon_links', 3 );
add_action( 'admin_head', 'dvtkwgr_output_favicon_links', 3 );
add_action( 'login_head', 'dvtkwgr_output_favicon_links', 3 );

function dvtkwgr_site_icon_url( $url, $size ) {
	$size = absint( $size );

	if ( $size <= 32 ) {
		return dvtkwgr_logo_asset( '12-favicon-32x32.png' );
	}

	if ( $size <= 48 ) {
		return dvtkwgr_logo_asset( '12-favicon-48x48.png' );
	}

	if ( 180 === $size ) {
		return dvtkwgr_logo_asset( '14-apple-touch-icon-180x180.png' );
	}

	if ( $size <= 192 ) {
		return dvtkwgr_logo_asset( '15-android-chrome-192x192.png' );
	}

	if ( $size <= 256 ) {
		return dvtkwgr_logo_asset( '11-logo-icon-transparent-256x256.png' );
	}

	return dvtkwgr_logo_asset( '10-logo-icon-transparent-512x512.png' );
}
add_filter( 'get_site_icon_url', 'dvtkwgr_site_icon_url', 10, 2 );

function dvtkwgr_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar tin tức', 'dvtkwgr' ),
			'id'            => 'blog-sidebar',
			'description'   => esc_html__( 'Hiển thị ở trang danh sách bài viết và bài viết chi tiết.', 'dvtkwgr' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dvtkwgr_widgets_init' );

function dvtkwgr_register_virtual_routes() {
	add_rewrite_tag( '%dvtkwgr_virtual_page%', '([^&]+)' );
	add_rewrite_tag( '%dvtkwgr_sitemap%', '([0-1])' );
	add_rewrite_tag( '%dvtkwgr_robots%', '([0-1])' );
	add_rewrite_rule( '^tin-tuc/page/([0-9]+)/?$', 'index.php?dvtkwgr_virtual_page=tin-tuc&paged=$matches[1]', 'top' );
	add_rewrite_rule( '^tin-tuc/?$', 'index.php?dvtkwgr_virtual_page=tin-tuc', 'top' );
	add_rewrite_rule( '^gioi-thieu/?$', 'index.php?dvtkwgr_virtual_page=gioi-thieu', 'top' );
	add_rewrite_rule( '^lien-he/?$', 'index.php?dvtkwgr_virtual_page=lien-he', 'top' );
	add_rewrite_rule( '^mau-giao-dien/mau-website-doanh-nghiep/?$', 'index.php?dvtkwgr_virtual_page=mau-website-doanh-nghiep', 'top' );
	add_rewrite_rule( '^dvtkwgr-sitemap\.xml$', 'index.php?dvtkwgr_sitemap=1', 'top' );
	add_rewrite_rule( '^robots\.txt$', 'index.php?dvtkwgr_robots=1', 'top' );
}
add_action( 'init', 'dvtkwgr_register_virtual_routes' );

function dvtkwgr_virtual_route_query_vars( $vars ) {
	$vars[] = 'dvtkwgr_virtual_page';
	$vars[] = 'dvtkwgr_sitemap';
	$vars[] = 'dvtkwgr_robots';

	return $vars;
}
add_filter( 'query_vars', 'dvtkwgr_virtual_route_query_vars' );

function dvtkwgr_flush_virtual_routes_once() {
	if ( get_option( 'dvtkwgr_rewrite_version' ) === DVTKWGR_REWRITE_VERSION ) {
		return;
	}

	dvtkwgr_register_virtual_routes();
	flush_rewrite_rules( false );
	update_option( 'dvtkwgr_rewrite_version', DVTKWGR_REWRITE_VERSION );
}
add_action( 'init', 'dvtkwgr_flush_virtual_routes_once', 20 );

function dvtkwgr_virtual_route_status( $handled, $query ) {
	if ( $query->get( 'dvtkwgr_virtual_page' ) ) {
		$query->is_404 = false;
		status_header( 200 );

		return true;
	}

	return $handled;
}
add_filter( 'pre_handle_404', 'dvtkwgr_virtual_route_status', 10, 2 );

function dvtkwgr_virtual_route_template( $template ) {
	$virtual_page = get_query_var( 'dvtkwgr_virtual_page' );

	if ( 'tin-tuc' === $virtual_page ) {
		return get_template_directory() . '/page-tin-tuc.php';
	}

	if ( 'gioi-thieu' === $virtual_page ) {
		return get_template_directory() . '/page-about.php';
	}

	if ( 'lien-he' === $virtual_page ) {
		return get_template_directory() . '/page-contact.php';
	}

	if ( 'mau-website-doanh-nghiep' === $virtual_page ) {
		return get_template_directory() . '/template-demo-business.php';
	}

	return $template;
}
add_filter( 'template_include', 'dvtkwgr_virtual_route_template' );

function dvtkwgr_seo_profiles() {
	return array(
		'home'                       => array(
			'title'       => 'Thiết kế website giá hợp lý cho doanh nghiệp vừa và nhỏ',
			'description' => 'Dịch vụ thiết kế website WordPress với chi phí phù hợp, quy trình rõ ràng, có demo trước và dễ quản trị sau bàn giao.',
			'url'         => home_url( '/' ),
			'image'       => dvtkwgr_home_banner_asset(),
		),
		'gioi-thieu'                 => array(
			'title'       => 'Giới thiệu dịch vụ thiết kế website rõ ràng và thực tế',
			'description' => 'Tìm hiểu cách triển khai website WordPress tinh gọn, rõ phạm vi và dễ quản trị cho cá nhân, cửa hàng và doanh nghiệp nhỏ.',
			'url'         => home_url( '/gioi-thieu/' ),
			'image'       => dvtkwgr_asset( 'images/about-affordable-web-design-service.webp' ),
		),
		'tin-tuc'                   => array(
			'title'       => 'Kiến thức thiết kế và vận hành website',
			'description' => 'Kiến thức xây dựng, quản trị và tối ưu website WordPress cho cá nhân kinh doanh, cửa hàng và doanh nghiệp nhỏ.',
			'url'         => home_url( '/tin-tuc/' ),
			'image'       => dvtkwgr_asset( 'images/website-design-process-blog-thumbnail.webp' ),
		),
		'lien-he'                   => array(
			'title'       => 'Liên hệ tư vấn thiết kế website WordPress',
			'description' => 'Liên hệ tư vấn thiết kế website WordPress cho cá nhân, cửa hàng và doanh nghiệp nhỏ. Tư vấn online toàn quốc, phản hồi trong ngày làm việc.',
			'url'         => home_url( '/lien-he/' ),
			'image'       => dvtkwgr_asset( 'images/contact-web-design-consultation.webp' ),
		),
		'mau-website-doanh-nghiep'  => array(
			'title'       => 'Mẫu website doanh nghiệp chuyên nghiệp cho công ty nhỏ',
			'description' => 'Xem mẫu website doanh nghiệp hiện đại cho công ty dịch vụ, doanh nghiệp nhỏ và đơn vị địa phương cần giới thiệu năng lực, dịch vụ và nhận tư vấn.',
			'url'         => home_url( '/mau-giao-dien/mau-website-doanh-nghiep/' ),
			'image'       => dvtkwgr_asset( 'images/templates/business/mau-website-doanh-nghiep-thumbnail.webp' ),
		),
	);
}

function dvtkwgr_current_seo_profile() {
	$profiles     = dvtkwgr_seo_profiles();
	$virtual_page = get_query_var( 'dvtkwgr_virtual_page' );

	if ( $virtual_page && isset( $profiles[ $virtual_page ] ) ) {
		return $profiles[ $virtual_page ];
	}

	if ( is_front_page() && isset( $profiles['home'] ) ) {
		return $profiles['home'];
	}

	return array();
}

function dvtkwgr_document_title( $title ) {
	$profile = dvtkwgr_current_seo_profile();

	if ( empty( $profile['title'] ) ) {
		return $title ? $title : get_bloginfo( 'name' );
	}

	$branded_title = $profile['title'] . ' | ' . dvtkwgr_site_name();

	return mb_strlen( $branded_title ) <= 65 ? $branded_title : $profile['title'];
}
add_filter( 'pre_get_document_title', 'dvtkwgr_document_title' );

function dvtkwgr_excerpt_length() {
	return 24;
}
add_filter( 'excerpt_length', 'dvtkwgr_excerpt_length' );

function dvtkwgr_excerpt_more() {
	return '...';
}
add_filter( 'excerpt_more', 'dvtkwgr_excerpt_more' );

function dvtkwgr_default_wordpress_post_ids() {
	$default_posts = get_posts(
		array(
			'fields'         => 'ids',
			'post_type'      => 'post',
			'post_status'    => 'any',
			'post_name__in'  => array( 'hello-world', 'chao-moi-nguoi', 'chao-tat-ca-moi-nguoi' ),
			'posts_per_page' => 10,
			'no_found_rows'  => true,
		)
	);

	return array_map( 'absint', $default_posts );
}

function dvtkwgr_real_blog_query_args( $args = array() ) {
	$excluded = dvtkwgr_default_wordpress_post_ids();
	$existing = ! empty( $args['post__not_in'] ) ? array_map( 'absint', (array) $args['post__not_in'] ) : array();

	$args['post__not_in'] = array_values( array_unique( array_merge( $existing, $excluded ) ) );

	return $args;
}

function dvtkwgr_exclude_default_wordpress_post( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( ! ( $query->is_home() || $query->is_archive() || $query->is_search() ) ) {
		return;
	}

	$excluded = dvtkwgr_default_wordpress_post_ids();
	if ( empty( $excluded ) ) {
		return;
	}

	$current = (array) $query->get( 'post__not_in' );
	$query->set( 'post__not_in', array_values( array_unique( array_merge( array_map( 'absint', $current ), $excluded ) ) ) );
}
add_action( 'pre_get_posts', 'dvtkwgr_exclude_default_wordpress_post' );

function dvtkwgr_meta_description() {
	$profile = dvtkwgr_current_seo_profile();
	if ( ! empty( $profile['description'] ) ) {
		return $profile['description'];
	}

	if ( is_singular() ) {
		$description = has_excerpt() ? get_the_excerpt() : wp_trim_words( wp_strip_all_tags( get_the_content() ), 28 );
	} elseif ( is_home() || is_archive() ) {
		$description = 'Tin tức và kiến thức thiết kế website WordPress, rõ quy trình, dễ áp dụng cho doanh nghiệp nhỏ.';
	} else {
		$description = 'Dịch vụ thiết kế website WordPress cho cá nhân, cửa hàng và doanh nghiệp nhỏ. Có demo trước, báo giá rõ ràng, bàn giao minh bạch.';
	}

	return trim( wp_strip_all_tags( $description ) );
}

function dvtkwgr_output_meta_description() {
	if ( defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) ) {
		return;
	}

	printf(
		'<meta name="description" content="%s">' . "\n",
		esc_attr( dvtkwgr_meta_description() )
	);
}
add_action( 'wp_head', 'dvtkwgr_output_meta_description', 1 );

function dvtkwgr_output_canonical_and_social_meta() {
	if ( defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) ) {
		return;
	}

	$profile = dvtkwgr_current_seo_profile();
	if ( empty( $profile ) ) {
		return;
	}

	$title       = ! empty( $profile['title'] ) ? $profile['title'] : wp_get_document_title();
	$description = dvtkwgr_meta_description();
	$url         = ! empty( $profile['url'] ) ? $profile['url'] : home_url( add_query_arg( array(), $GLOBALS['wp']->request ?? '' ) );
	$image       = ! empty( $profile['image'] ) ? $profile['image'] : dvtkwgr_home_banner_asset();
	$type        = is_front_page() ? 'website' : 'article';
	$site_name   = dvtkwgr_site_name();

	if ( get_query_var( 'dvtkwgr_virtual_page' ) ) {
		printf( '<link rel="canonical" href="%s">' . "\n", esc_url( $url ) );
	}

	printf( '<meta property="og:type" content="%s">' . "\n", esc_attr( $type ) );
	printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( $title ) );
	printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $description ) );
	printf( '<meta property="og:url" content="%s">' . "\n", esc_url( $url ) );
	printf( '<meta property="og:site_name" content="%s">' . "\n", esc_attr( $site_name ) );
	printf( '<meta property="og:image" content="%s">' . "\n", esc_url( $image ) );
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	printf( '<meta name="twitter:title" content="%s">' . "\n", esc_attr( $title ) );
	printf( '<meta name="twitter:description" content="%s">' . "\n", esc_attr( $description ) );
	printf( '<meta name="twitter:image" content="%s">' . "\n", esc_url( $image ) );
}
add_action( 'wp_head', 'dvtkwgr_output_canonical_and_social_meta', 2 );

function dvtkwgr_schema_json_ld() {
	$profile = dvtkwgr_current_seo_profile();
	if ( empty( $profile ) || ! is_front_page() ) {
		return;
	}

	$schema = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'ProfessionalService',
		'name'        => dvtkwgr_site_name(),
		'url'         => home_url( '/' ),
		'description' => $profile['description'],
		'image'       => $profile['image'],
		'areaServed'  => 'Việt Nam',
		'email'       => dvtkwgr_contact_email(),
		'telephone'   => '09xx xxx xxx',
		'priceRange'  => '₫₫',
		'sameAs'      => array( dvtkwgr_facebook_url() ),
		'serviceType' => array(
			'Thiết kế website WordPress giá rẻ',
			'Landing page dịch vụ',
			'Website doanh nghiệp nhỏ',
		),
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_head', 'dvtkwgr_schema_json_ld' );

function dvtkwgr_output_custom_sitemap() {
	if ( '1' !== get_query_var( 'dvtkwgr_sitemap' ) ) {
		return;
	}

	$profiles = dvtkwgr_seo_profiles();
	$urls     = array(
		$profiles['home']['url'],
		$profiles['gioi-thieu']['url'],
		$profiles['tin-tuc']['url'],
		$profiles['lien-he']['url'],
		$profiles['mau-website-doanh-nghiep']['url'],
	);

	status_header( 200 );
	header( 'Content-Type: application/xml; charset=' . get_bloginfo( 'charset' ) );
	echo '<?xml version="1.0" encoding="' . esc_attr( get_bloginfo( 'charset' ) ) . '"?>' . "\n";
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
	foreach ( $urls as $url ) {
		echo "\t<url><loc>" . esc_url( $url ) . '</loc><changefreq>weekly</changefreq><priority>' . ( home_url( '/' ) === $url ? '1.0' : '0.8' ) . '</priority></url>' . "\n";
	}
	echo '</urlset>';
	exit;
}
add_action( 'template_redirect', 'dvtkwgr_output_custom_sitemap' );

function dvtkwgr_output_custom_robots() {
	if ( '1' !== get_query_var( 'dvtkwgr_robots' ) ) {
		return;
	}

	status_header( 200 );
	header( 'Content-Type: text/plain; charset=' . get_bloginfo( 'charset' ) );
	echo "User-agent: *\n";
	echo "Allow: /\n\n";
	echo 'Sitemap: ' . esc_url( home_url( '/wp-sitemap.xml' ) ) . "\n";
	echo 'Sitemap: ' . esc_url( home_url( '/dvtkwgr-sitemap.xml' ) ) . "\n";
	exit;
}
add_action( 'template_redirect', 'dvtkwgr_output_custom_robots' );

function dvtkwgr_robots_txt( $output ) {
	$output .= "\nSitemap: " . esc_url( home_url( '/wp-sitemap.xml' ) );
	$output .= "\nSitemap: " . esc_url( home_url( '/dvtkwgr-sitemap.xml' ) ) . "\n";

	return $output;
}
add_filter( 'robots_txt', 'dvtkwgr_robots_txt' );

function dvtkwgr_contact_form_defaults() {
	return array(
		'name'         => '',
		'phone'        => '',
		'email'        => '',
		'business'     => '',
		'website_type' => '',
		'budget'       => '',
		'message'      => '',
	);
}

function dvtkwgr_contact_form_redirect( $status, $values = array(), $errors = array() ) {
	$args = array( 'contact_status' => $status );

	if ( ! empty( $values ) || ! empty( $errors ) ) {
		$token = wp_generate_uuid4();
		set_transient(
			'dvtkwgr_contact_form_' . $token,
			array(
				'values' => wp_parse_args( $values, dvtkwgr_contact_form_defaults() ),
				'errors' => array_values( $errors ),
			),
			10 * MINUTE_IN_SECONDS
		);
		$args['contact_token'] = $token;
	}

	wp_safe_redirect( add_query_arg( $args, home_url( '/lien-he/#contact-form' ) ) );
	exit;
}

function dvtkwgr_handle_contact_form() {
	$raw_values = wp_parse_args( wp_unslash( $_POST ), dvtkwgr_contact_form_defaults() );
	$values     = array(
		'name'         => sanitize_text_field( $raw_values['name'] ),
		'phone'        => sanitize_text_field( $raw_values['phone'] ),
		'email'        => sanitize_email( $raw_values['email'] ),
		'business'     => sanitize_text_field( $raw_values['business'] ),
		'website_type' => sanitize_text_field( $raw_values['website_type'] ),
		'budget'       => sanitize_text_field( $raw_values['budget'] ),
		'message'      => sanitize_textarea_field( $raw_values['message'] ),
	);
	$errors     = array();

	if ( empty( $_POST['dvtkwgr_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['dvtkwgr_contact_nonce'] ) ), 'dvtkwgr_contact_form' ) ) {
		$errors[] = __( 'Phiên gửi form không hợp lệ. Vui lòng tải lại trang và thử lại.', 'dvtkwgr' );
	}

	if ( '' === $values['name'] ) {
		$errors[] = __( 'Vui lòng nhập họ tên.', 'dvtkwgr' );
	}

	if ( '' === $values['phone'] && '' === $values['email'] ) {
		$errors[] = __( 'Vui lòng để lại ít nhất số điện thoại/Zalo hoặc email để liên hệ lại.', 'dvtkwgr' );
	}

	if ( '' !== $values['email'] && ! is_email( $values['email'] ) ) {
		$errors[] = __( 'Email chưa đúng định dạng.', 'dvtkwgr' );
	}

	if ( '' === $values['message'] ) {
		$errors[] = __( 'Vui lòng mô tả ngắn nhu cầu website.', 'dvtkwgr' );
	}

	if ( ! empty( $errors ) ) {
		dvtkwgr_contact_form_redirect( 'error', $values, $errors );
	}

	$lines = array(
		'Họ tên: ' . $values['name'],
		'Điện thoại/Zalo: ' . ( $values['phone'] ? $values['phone'] : 'Chưa cung cấp' ),
		'Email: ' . ( $values['email'] ? $values['email'] : 'Chưa cung cấp' ),
		'Ngành nghề: ' . ( $values['business'] ? $values['business'] : 'Chưa cung cấp' ),
		'Loại website: ' . ( $values['website_type'] ? $values['website_type'] : 'Chưa cung cấp' ),
		'Ngân sách dự kiến: ' . ( $values['budget'] ? $values['budget'] : 'Chưa cung cấp' ),
		'',
		'Nội dung cần tư vấn:',
		$values['message'],
	);
	$headers = array( 'Content-Type: text/plain; charset=UTF-8' );

	if ( is_email( $values['email'] ) ) {
		$headers[] = 'Reply-To: ' . $values['name'] . ' <' . $values['email'] . '>';
	}

	$sent = wp_mail(
		dvtkwgr_contact_email(),
		'Yêu cầu tư vấn website từ ' . $values['name'],
		implode( "\n", $lines ),
		$headers
	);

	if ( ! $sent ) {
		dvtkwgr_contact_form_redirect(
			'error',
			$values,
			array( __( 'Chưa gửi được email trong lúc này. Vui lòng thử lại hoặc liên hệ trực tiếp qua điện thoại/Zalo.', 'dvtkwgr' ) )
		);
	}

	dvtkwgr_contact_form_redirect( 'success' );
}
add_action( 'admin_post_dvtkwgr_contact_form', 'dvtkwgr_handle_contact_form' );
add_action( 'admin_post_nopriv_dvtkwgr_contact_form', 'dvtkwgr_handle_contact_form' );

function dvtkwgr_get_contact_form_state() {
	$state = array(
		'status' => '',
		'values' => dvtkwgr_contact_form_defaults(),
		'errors' => array(),
	);

	if ( empty( $_GET['contact_status'] ) ) {
		return $state;
	}

	$state['status'] = sanitize_key( wp_unslash( $_GET['contact_status'] ) );

	if ( 'error' === $state['status'] && ! empty( $_GET['contact_token'] ) ) {
		$token = sanitize_text_field( wp_unslash( $_GET['contact_token'] ) );
		$saved = get_transient( 'dvtkwgr_contact_form_' . $token );
		if ( is_array( $saved ) ) {
			$state['values'] = wp_parse_args( $saved['values'] ?? array(), dvtkwgr_contact_form_defaults() );
			$state['errors'] = array_map( 'sanitize_text_field', (array) ( $saved['errors'] ?? array() ) );
			delete_transient( 'dvtkwgr_contact_form_' . $token );
		}
	}

	return $state;
}

function dvtkwgr_breadcrumb() {
	if ( is_front_page() ) {
		return;
	}
	$virtual_titles = array(
		'gioi-thieu'                 => 'Giới thiệu',
		'tin-tuc'                   => 'Tin tức',
		'lien-he'                   => 'Liên hệ',
		'mau-website-doanh-nghiep'  => 'Mẫu website doanh nghiệp',
	);
	$virtual_page   = get_query_var( 'dvtkwgr_virtual_page' );
	$current_title  = isset( $virtual_titles[ $virtual_page ] ) ? $virtual_titles[ $virtual_page ] : '';
	if ( ! $current_title ) {
		$current_title = get_the_title() ? get_the_title() : wp_get_document_title();
	}
	?>
	<nav class="breadcrumb" aria-label="<?php esc_attr_e( 'Đường dẫn', 'dvtkwgr' ); ?>">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Trang chủ', 'dvtkwgr' ); ?></a>
		<span aria-hidden="true">/</span>
		<span><?php echo esc_html( $current_title ); ?></span>
	</nav>
	<?php
}

function dvtkwgr_primary_menu_fallback() {
	$items = array(
		'Trang chủ'  => home_url( '/' ),
		'Giới thiệu' => home_url( '/gioi-thieu/' ),
		'Tin tức'   => home_url( '/tin-tuc/' ),
		'Liên hệ'   => home_url( '/lien-he/' ),
	);
	echo '<ul id="primary-menu" class="menu">';
	foreach ( $items as $label => $url ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
	}
	echo '</ul>';
}
