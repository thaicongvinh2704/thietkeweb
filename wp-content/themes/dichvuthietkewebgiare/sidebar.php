<?php
/**
 * Blog sidebar.
 *
 * @package dvtkwgr
 */
?>
<aside class="blog-sidebar reveal" aria-label="<?php esc_attr_e( 'Sidebar tin tức', 'dvtkwgr' ); ?>">
	<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'blog-sidebar' ); ?>
	<?php else : ?>
		<section class="widget">
			<h2 class="widget-title"><?php esc_html_e( 'Chủ đề hữu ích', 'dvtkwgr' ); ?></h2>
			<ul>
				<li><?php esc_html_e( 'Thiết kế website giá rẻ', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Website WordPress cho doanh nghiệp nhỏ', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Landing page chạy quảng cáo', 'dvtkwgr' ); ?></li>
			</ul>
		</section>
		<section class="widget cta-widget">
			<h2 class="widget-title"><?php esc_html_e( 'Cần làm website?', 'dvtkwgr' ); ?></h2>
			<p><?php esc_html_e( 'Gửi nhu cầu để nhận tư vấn mẫu giao diện và chi phí phù hợp.', 'dvtkwgr' ); ?></p>
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Nhận tư vấn', 'dvtkwgr' ); ?></a>
		</section>
	<?php endif; ?>
</aside>
