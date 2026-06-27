<?php
/**
 * Template Name: Giới thiệu
 *
 * @package dvtkwgr
 */

get_header();
dvtkwgr_breadcrumb();
?>
<section class="page-hero section">
	<div class="container narrow reveal">
		<p class="eyebrow"><?php esc_html_e( 'Về chúng tôi', 'dvtkwgr' ); ?></p>
		<h1><?php esc_html_e( 'Giới thiệu về Dịch Vụ Thiết Kế Web Giá Rẻ', 'dvtkwgr' ); ?></h1>
		<p><?php esc_html_e( 'Chúng tôi tập trung hỗ trợ cá nhân, cửa hàng và doanh nghiệp nhỏ xây dựng website WordPress với chi phí hợp lý, giao diện chuyên nghiệp và quy trình làm việc minh bạch.', 'dvtkwgr' ); ?></p>
	</div>
</section>
<section class="section">
	<div class="container content-grid">
		<article class="content-block reveal">
			<h2><?php esc_html_e( 'Minh bạch từ nhu cầu đến bàn giao', 'dvtkwgr' ); ?></h2>
			<p><?php esc_html_e( 'Mỗi dự án đều bắt đầu bằng việc làm rõ mục tiêu, số lượng trang, nội dung cần có và ngân sách dự kiến. Khách hàng được xem demo, thống nhất báo giá và chỉ triển khai khi hai bên hiểu rõ phạm vi công việc.', 'dvtkwgr' ); ?></p>
		</article>
		<article class="content-block reveal">
			<h2><?php esc_html_e( 'Chúng tôi phù hợp với ai?', 'dvtkwgr' ); ?></h2>
			<ul>
				<li><?php esc_html_e( 'Cá nhân kinh doanh dịch vụ cần website giới thiệu gọn gàng.', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Cửa hàng muốn có nền tảng riêng ngoài Facebook và Zalo.', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Doanh nghiệp nhỏ cần website dễ quản trị, dễ liên hệ khách hàng.', 'dvtkwgr' ); ?></li>
			</ul>
		</article>
		<article class="content-block reveal">
			<h2><?php esc_html_e( 'Nguyên tắc làm việc', 'dvtkwgr' ); ?></h2>
			<ul>
				<li><?php esc_html_e( 'Không đề xuất chức năng nếu chưa thật sự cần thiết.', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Báo giá rõ trước khi triển khai, hạn chế phát sinh.', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Thiết kế ưu tiên tốc độ, mobile và khả năng tự quản trị.', 'dvtkwgr' ); ?></li>
			</ul>
		</article>
		<article class="content-block warning reveal">
			<h2><?php esc_html_e( 'Không nhận các dự án quá phức tạp nếu không phù hợp với ngân sách', 'dvtkwgr' ); ?></h2>
			<p><?php esc_html_e( 'Với các yêu cầu cần hệ thống riêng, tích hợp phức tạp hoặc xử lý dữ liệu lớn, chúng tôi sẽ tư vấn thật về chi phí và phạm vi thay vì nhận bằng mọi giá.', 'dvtkwgr' ); ?></p>
		</article>
	</div>
</section>
<section class="final-cta section">
	<div class="container final-cta-inner reveal">
		<h2><?php esc_html_e( 'Cần tư vấn website phù hợp ngân sách?', 'dvtkwgr' ); ?></h2>
		<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Liên hệ tư vấn', 'dvtkwgr' ); ?></a>
	</div>
</section>
<?php
get_footer();
