<?php
/**
 * Theme functions.
 *
 * @package dvtkwgr
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'DVTKWGR_VERSION', '1.0.0' );

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

function dvtkwgr_excerpt_length() {
	return 24;
}
add_filter( 'excerpt_length', 'dvtkwgr_excerpt_length' );

function dvtkwgr_excerpt_more() {
	return '...';
}
add_filter( 'excerpt_more', 'dvtkwgr_excerpt_more' );

function dvtkwgr_meta_description() {
	if ( is_singular() ) {
		$description = has_excerpt() ? get_the_excerpt() : wp_trim_words( wp_strip_all_tags( get_the_content() ), 28 );
	} elseif ( is_home() || is_archive() ) {
		$description = 'Tin tức và kiến thức thiết kế website WordPress giá rẻ, rõ quy trình, dễ áp dụng cho doanh nghiệp nhỏ.';
	} else {
		$description = 'Dịch vụ thiết kế website WordPress giá rẻ cho cá nhân, cửa hàng và doanh nghiệp nhỏ. Có demo trước, báo giá rõ ràng, bàn giao minh bạch.';
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

function dvtkwgr_schema_json_ld() {
	if ( ! is_front_page() ) {
		return;
	}

	$schema = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'ProfessionalService',
		'name'        => 'Dịch Vụ Thiết Kế Web Giá Rẻ',
		'url'         => home_url( '/' ),
		'description' => dvtkwgr_meta_description(),
		'areaServed'  => 'Việt Nam',
		'email'       => 'contact@dichvuthietkewebgiare.com',
		'telephone'   => '09xx xxx xxx',
		'priceRange'  => '₫₫',
		'sameAs'      => array(),
		'serviceType' => array(
			'Thiết kế website WordPress giá rẻ',
			'Landing page dịch vụ',
			'Website doanh nghiệp nhỏ',
		),
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_head', 'dvtkwgr_schema_json_ld' );

function dvtkwgr_breadcrumb() {
	if ( is_front_page() ) {
		return;
	}
	?>
	<nav class="breadcrumb" aria-label="<?php esc_attr_e( 'Đường dẫn', 'dvtkwgr' ); ?>">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Trang chủ', 'dvtkwgr' ); ?></a>
		<span aria-hidden="true">/</span>
		<span><?php echo esc_html( get_the_title() ? get_the_title() : wp_get_document_title() ); ?></span>
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
