<?php
/**
 * Editorial agency header inspired by the visual rhythm of Thuy Thu Agency.
 *
 * @package dvtkwgr-child
 */

$home_anchor = static function ( $id ) {
	return is_front_page() ? '#' . $id : home_url( '/#' . $id );
};
$consult_url = $home_anchor( 'tu-van' );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#content"><?php esc_html_e( 'Chuyển đến nội dung', 'dvtkwgr' ); ?></a>
<header class="site-header brand-header" data-header>
	<button class="header-menu-overlay" type="button" aria-label="<?php esc_attr_e( 'Đóng menu', 'dvtkwgr' ); ?>" tabindex="-1" data-menu-overlay></button>
	<div class="header-shell">
		<div class="container header-inner">
			<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( dvtkwgr_site_name() ); ?>">
				<img class="brand-mark" src="<?php echo esc_url( dvtkwgr_logo_asset( '10-logo-icon-transparent-512x512.png' ) ); ?>" alt="" width="512" height="512" fetchpriority="high" decoding="async">
				<span class="brand-wordmark">
					<small><?php esc_html_e( 'Dịch vụ', 'dvtkwgr' ); ?></small>
					<strong><?php esc_html_e( 'Thiết Kế Trang Web', 'dvtkwgr' ); ?></strong>
				</span>
			</a>

			<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false" data-menu-toggle>
				<span class="menu-toggle-label" aria-hidden="true"><?php esc_html_e( 'Menu', 'dvtkwgr' ); ?></span>
				<span class="menu-toggle-bars" aria-hidden="true"></span>
				<span class="screen-reader-text"><?php esc_html_e( 'Mở menu', 'dvtkwgr' ); ?></span>
			</button>

			<nav class="primary-nav" aria-label="<?php esc_attr_e( 'Menu chính', 'dvtkwgr' ); ?>" data-primary-nav>
				<div class="mobile-nav-heading">
					<span><?php esc_html_e( 'Khám phá', 'dvtkwgr' ); ?></span>
					<strong><?php esc_html_e( 'Chúng tôi có thể giúp gì cho bạn?', 'dvtkwgr' ); ?></strong>
				</div>
				<ul id="primary-menu" class="menu">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php echo is_front_page() ? 'aria-current="page"' : ''; ?>>Trang chủ</a></li>
					<li class="menu-item-services">
						<button class="submenu-toggle" type="button" aria-expanded="false" aria-controls="services-submenu" aria-haspopup="true">
							<span>Dịch vụ</span>
							<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2"><path d="m7 10 5 5 5-5"/></svg>
						</button>
						<div id="services-submenu" class="services-mega" hidden>
							<div class="mega-intro">
								<small><?php esc_html_e( 'Dịch vụ thiết kế web', 'dvtkwgr' ); ?></small>
								<strong><?php esc_html_e( 'Chọn đúng giải pháp cho mục tiêu kinh doanh.', 'dvtkwgr' ); ?></strong>
								<a href="<?php echo esc_url( $home_anchor( 'dich-vu' ) ); ?>">
									<?php esc_html_e( 'Xem tất cả dịch vụ', 'dvtkwgr' ); ?>
									<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M14 7l5 5-5 5"/></svg>
								</a>
							</div>
							<ul>
								<li><a href="<?php echo esc_url( $home_anchor( 'dich-vu' ) ); ?>"><img src="<?php echo esc_url( dvtkwgr_child_home_asset( 'reason-small-business-partner.webp' ) ); ?>" alt="" width="640" height="426" loading="lazy" decoding="async"><span>Website doanh nghiệp</span></a></li>
								<li><a href="<?php echo esc_url( $home_anchor( 'dich-vu' ) ); ?>"><img src="<?php echo esc_url( dvtkwgr_child_home_asset( 'reason-modern-development.webp' ) ); ?>" alt="" width="640" height="426" loading="lazy" decoding="async"><span>Website bán hàng</span></a></li>
								<li><a href="<?php echo esc_url( $home_anchor( 'dich-vu' ) ); ?>"><img src="<?php echo esc_url( dvtkwgr_child_home_asset( 'homepage-web-design-hero.webp' ) ); ?>" alt="" width="1200" height="900" loading="lazy" decoding="async"><span>Landing page</span></a></li>
								<li><a href="<?php echo esc_url( $home_anchor( 'dich-vu' ) ); ?>"><img src="<?php echo esc_url( dvtkwgr_child_home_asset( 'quality-easy-management.webp' ) ); ?>" alt="" width="640" height="426" loading="lazy" decoding="async"><span>Chăm sóc WordPress</span></a></li>
							</ul>
						</div>
					</li>
					<li><a href="<?php echo esc_url( $home_anchor( 'mau-website' ) ); ?>">Kho giao diện</a></li>
					<li><a href="<?php echo esc_url( $home_anchor( 'bang-gia' ) ); ?>">Bảng giá</a></li>
					<li><a href="<?php echo esc_url( $home_anchor( 'quy-trinh' ) ); ?>">Quy trình</a></li>
					<li><a href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>" <?php echo 'tin-tuc' === get_query_var( 'dvtkwgr_virtual_page' ) ? 'aria-current="page"' : ''; ?>>Kiến thức</a></li>
				</ul>
				<a class="header-cta" href="<?php echo esc_url( $consult_url ); ?>">
					<span><?php esc_html_e( 'Báo giá dự án', 'dvtkwgr' ); ?></span>
					<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M14 7l5 5-5 5"/></svg>
				</a>
			</nav>
		</div>
	</div>
</header>
<main id="content" class="site-main">
