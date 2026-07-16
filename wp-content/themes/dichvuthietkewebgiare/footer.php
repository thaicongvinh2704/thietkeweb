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
			<h2><?php esc_html_e( 'Dịch Vụ Thiết Kế Trang Web', 'dvtkwgr' ); ?></h2>
			<p><?php esc_html_e( 'Thiết kế website WordPress cho cá nhân kinh doanh, cửa hàng và doanh nghiệp vừa và nhỏ. Tập trung vào giao diện rõ ràng, quy trình minh bạch, dễ quản trị và dễ tiếp nhận khách hàng.', 'dvtkwgr' ); ?></p>
		</section>
		<section>
			<h2><?php esc_html_e( 'Link nhanh', 'dvtkwgr' ); ?></h2>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Trang chủ', 'dvtkwgr' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/#dich-vu' ) ); ?>"><?php esc_html_e( 'Dịch vụ', 'dvtkwgr' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/#mau-website' ) ); ?>"><?php esc_html_e( 'Mẫu website', 'dvtkwgr' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/#bang-gia' ) ); ?>"><?php esc_html_e( 'Bảng giá', 'dvtkwgr' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/#quy-trinh' ) ); ?>"><?php esc_html_e( 'Quy trình', 'dvtkwgr' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Liên hệ', 'dvtkwgr' ); ?></a></li>
			</ul>
		</section>
		<section>
			<h2><?php esc_html_e( 'Dịch vụ', 'dvtkwgr' ); ?></h2>
			<ul>
				<li><?php esc_html_e( 'Thiết kế website doanh nghiệp', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Thiết kế landing page', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Website bán hàng', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Chăm sóc WordPress', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Hosting / domain / SSL', 'dvtkwgr' ); ?></li>
			</ul>
		</section>
		<section>
			<h2><?php esc_html_e( 'Ngành phù hợp', 'dvtkwgr' ); ?></h2>
			<ul>
				<li><?php esc_html_e( 'Spa / Clinic', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Cơ khí / Sản xuất', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Xây dựng / Nội thất', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Bao bì / In ấn', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Công ty dịch vụ', 'dvtkwgr' ); ?></li>
			</ul>
		</section>
		<section>
			<h2><?php esc_html_e( 'Liên hệ', 'dvtkwgr' ); ?></h2>
			<ul>
				<li><strong><?php esc_html_e( 'Email:', 'dvtkwgr' ); ?></strong> <a href="<?php echo esc_url( 'mailto:' . dvtkwgr_contact_email() ); ?>"><?php echo esc_html( dvtkwgr_contact_email() ); ?></a></li>
				<li><strong><?php esc_html_e( 'Facebook:', 'dvtkwgr' ); ?></strong> <a href="<?php echo esc_url( dvtkwgr_facebook_url() ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Trang Facebook chính thức', 'dvtkwgr' ); ?></a></li>
				<li><?php esc_html_e( 'Hỗ trợ online toàn quốc', 'dvtkwgr' ); ?></li>
			</ul>
		</section>
	</div>
	<div class="container footer-bottom">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( wp_parse_url( home_url(), PHP_URL_HOST ) ); ?>. <?php esc_html_e( 'All rights reserved.', 'dvtkwgr' ); ?></p>
	</div>
</footer>
<div class="mobile-sticky-cta" aria-label="<?php esc_attr_e( 'Liên hệ nhanh', 'dvtkwgr' ); ?>">
	<button type="button" data-open-consult><?php esc_html_e( 'Tư vấn', 'dvtkwgr' ); ?></button>
	<a href="<?php echo esc_url( 'mailto:' . dvtkwgr_contact_email() ); ?>"><?php esc_html_e( 'Email', 'dvtkwgr' ); ?></a>
	<a href="<?php echo esc_url( dvtkwgr_facebook_url() ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Facebook', 'dvtkwgr' ); ?></a>
</div>
<?php wp_footer(); ?>
</body>
</html>
