<?php
/**
 * Site header.
 *
 * @package dvtkwgr
 */
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
<header class="site-header" data-header>
	<div class="container header-inner">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( dvtkwgr_site_name() ); ?>">
			<picture class="brand-picture">
				<source media="(max-width: 640px)" srcset="<?php echo esc_url( dvtkwgr_logo_asset( '04-website-logo-header-600x200.webp' ) ); ?>" type="image/webp">
				<source media="(max-width: 1100px)" srcset="<?php echo esc_url( dvtkwgr_logo_asset( '03-website-logo-header-800x267.webp' ) ); ?>" type="image/webp">
				<img class="brand-logo" src="<?php echo esc_url( dvtkwgr_logo_asset( '03-website-logo-header-800x267.webp' ) ); ?>" srcset="<?php echo esc_url( dvtkwgr_logo_asset( '04-website-logo-header-600x200.webp' ) ); ?> 600w, <?php echo esc_url( dvtkwgr_logo_asset( '03-website-logo-header-800x267.webp' ) ); ?> 800w" sizes="(max-width: 640px) 260px, (max-width: 1100px) 340px, 420px" alt="<?php echo esc_attr( dvtkwgr_site_name() ); ?>" width="800" height="267" fetchpriority="high" decoding="async">
			</picture>
		</a>
		<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false" data-menu-toggle>
			<span class="menu-toggle-bars" aria-hidden="true"></span>
			<span class="screen-reader-text"><?php esc_html_e( 'Mở menu', 'dvtkwgr' ); ?></span>
		</button>
		<nav class="primary-nav" aria-label="<?php esc_attr_e( 'Menu chính', 'dvtkwgr' ); ?>" data-primary-nav>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'fallback_cb'    => 'dvtkwgr_primary_menu_fallback',
				)
			);
			?>
			<a class="btn btn-primary nav-cta" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Nhận tư vấn miễn phí', 'dvtkwgr' ); ?></a>
		</nav>
	</div>
</header>
<main id="content" class="site-main">
