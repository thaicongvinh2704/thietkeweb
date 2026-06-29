<?php
/**
 * Site footer.
 *
 * @package dvtkwgr
 */
?>
</main>
<footer class="site-footer">
	<div class="container footer-grid">
		<section class="footer-about">
			<h2><?php esc_html_e( 'Dịch Vụ Thiết Kế Web Giá Rẻ', 'dvtkwgr' ); ?></h2>
			<p><?php esc_html_e( 'Thiết kế website WordPress giá rẻ cho cá nhân, cửa hàng và doanh nghiệp nhỏ. Tập trung vào giao diện rõ ràng, chi phí hợp lý, dễ quản trị và dễ liên hệ khách hàng.', 'dvtkwgr' ); ?></p>
		</section>
		<section>
			<h2><?php esc_html_e( 'Link nhanh', 'dvtkwgr' ); ?></h2>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Trang chủ', 'dvtkwgr' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/gioi-thieu/' ) ); ?>"><?php esc_html_e( 'Giới thiệu', 'dvtkwgr' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>"><?php esc_html_e( 'Tin tức', 'dvtkwgr' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Liên hệ', 'dvtkwgr' ); ?></a></li>
			</ul>
		</section>
		<section>
			<h2><?php esc_html_e( 'Dịch vụ', 'dvtkwgr' ); ?></h2>
			<ul>
				<li><?php esc_html_e( 'Landing page', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Website doanh nghiệp', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Website bán hàng đơn giản', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Chăm sóc WordPress', 'dvtkwgr' ); ?></li>
			</ul>
		</section>
		<section>
			<h2><?php esc_html_e( 'Liên hệ', 'dvtkwgr' ); ?></h2>
			<ul>
				<li><?php esc_html_e( 'Điện thoại/Zalo: 09xx xxx xxx', 'dvtkwgr' ); ?></li>
				<li><a href="mailto:contact@dichvuthietkewebgiare.com">contact@dichvuthietkewebgiare.com</a></li>
				<li><?php esc_html_e( 'Hỗ trợ toàn quốc, tư vấn online', 'dvtkwgr' ); ?></li>
			</ul>
		</section>
	</div>
	<div class="container footer-bottom">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( wp_parse_url( home_url(), PHP_URL_HOST ) ); ?>. <?php esc_html_e( 'All rights reserved.', 'dvtkwgr' ); ?></p>
	</div>
</footer>
<div class="mobile-sticky-cta" aria-label="<?php esc_attr_e( 'Liên hệ nhanh', 'dvtkwgr' ); ?>">
	<a href="tel:09xxxxxxxx"><?php esc_html_e( 'Gọi tư vấn', 'dvtkwgr' ); ?></a>
	<a href="https://zalo.me/09xxxxxxxx" target="_blank" rel="noopener"><?php esc_html_e( 'Nhắn Zalo', 'dvtkwgr' ); ?></a>
</div>
<?php wp_footer(); ?>
</body>
</html>
