<?php
/**
 * 404 template.
 *
 * @package dvtkwgr
 */

get_header();
?>
<section class="page-hero section not-found">
	<div class="container narrow reveal">
		<p class="eyebrow"><?php esc_html_e( '404', 'dvtkwgr' ); ?></p>
		<h1><?php esc_html_e( 'Không tìm thấy trang', 'dvtkwgr' ); ?></h1>
		<p><?php esc_html_e( 'Trang bạn đang tìm có thể đã được di chuyển hoặc không còn tồn tại.', 'dvtkwgr' ); ?></p>
		<div class="hero-actions">
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Về trang chủ', 'dvtkwgr' ); ?></a>
			<a class="btn btn-secondary" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Liên hệ tư vấn', 'dvtkwgr' ); ?></a>
		</div>
	</div>
</section>
<?php
get_footer();
