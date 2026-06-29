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
	<div class="container split-media page-hero-media">
		<div class="content-block reveal">
			<p class="eyebrow"><?php esc_html_e( 'Về chúng tôi', 'dvtkwgr' ); ?></p>
			<h1><?php esc_html_e( 'Giới thiệu về Dịch Vụ Thiết Kế Web Giá Rẻ', 'dvtkwgr' ); ?></h1>
			<p><?php esc_html_e( 'Chúng tôi tập trung vào website WordPress nhỏ, gọn, dễ quản trị và phù hợp với cá nhân, cửa hàng, doanh nghiệp nhỏ cần hiện diện chuyên nghiệp trên internet.', 'dvtkwgr' ); ?></p>
		</div>
		<figure class="section-visual reveal">
			<img src="<?php echo esc_url( dvtkwgr_asset( 'images/about-affordable-web-design-service.webp' ) ); ?>" alt="<?php esc_attr_e( 'Giới thiệu dịch vụ thiết kế website giá rẻ cho doanh nghiệp nhỏ', 'dvtkwgr' ); ?>" width="760" height="520" fetchpriority="high" decoding="async">
		</figure>
	</div>
</section>

<section class="section">
	<div class="container content-grid">
		<article class="content-block reveal">
			<h2><?php esc_html_e( 'Chúng tôi phù hợp với ai?', 'dvtkwgr' ); ?></h2>
			<ul>
				<li><?php esc_html_e( 'Cá nhân kinh doanh dịch vụ cần một website giới thiệu gọn gàng.', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Cửa hàng muốn có nền tảng riêng ngoài Facebook và Zalo.', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Doanh nghiệp nhỏ cần website dễ quản trị, dễ liên hệ khách hàng.', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Đội nhóm muốn có landing page để chạy quảng cáo hoặc kiểm thử thị trường.', 'dvtkwgr' ); ?></li>
			</ul>
		</article>
		<article class="content-block reveal">
			<h2><?php esc_html_e( 'Nguyên tắc làm việc', 'dvtkwgr' ); ?></h2>
			<ul>
				<li><?php esc_html_e( 'Làm rõ mục tiêu, số lượng trang, nội dung và ngân sách trước khi triển khai.', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Không đề xuất chức năng nếu chưa thật sự cần thiết.', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Ưu tiên tốc độ, mobile, nội dung rõ và khả năng tự quản trị.', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Khách được xem demo trước khi thanh toán đủ và bàn giao quản trị.', 'dvtkwgr' ); ?></li>
			</ul>
		</article>
		<article class="content-block warning reveal">
			<h2><?php esc_html_e( 'Dự án không khuyến khích nhận nếu ngân sách quá thấp', 'dvtkwgr' ); ?></h2>
			<p><?php esc_html_e( 'Với yêu cầu cần hệ thống riêng, tích hợp phức tạp, xử lý dữ liệu lớn hoặc thương mại điện tử nhiều nghiệp vụ, chúng tôi sẽ tư vấn thật về chi phí và phạm vi thay vì nhận bằng mọi giá.', 'dvtkwgr' ); ?></p>
			<a class="text-link" href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>"><?php esc_html_e( 'Xem thêm kiến thức chuẩn bị website', 'dvtkwgr' ); ?></a>
		</article>
		<article class="content-block reveal">
			<h2><?php esc_html_e( 'Điều chúng tôi muốn website mang lại', 'dvtkwgr' ); ?></h2>
			<p><?php esc_html_e( 'Một website tốt với doanh nghiệp nhỏ không cần quá phức tạp. Điều quan trọng là khách hàng hiểu bạn bán gì, vì sao nên tin, liên hệ thế nào và bạn có thể cập nhật nội dung sau này.', 'dvtkwgr' ); ?></p>
		</article>
	</div>
</section>

<section class="final-cta section">
	<div class="container final-cta-inner reveal">
		<h2><?php esc_html_e( 'Cần tư vấn website phù hợp ngân sách?', 'dvtkwgr' ); ?></h2>
		<p><?php esc_html_e( 'Gửi nhu cầu hiện tại, chúng tôi sẽ gợi ý mẫu giao diện và phạm vi triển khai phù hợp.', 'dvtkwgr' ); ?></p>
		<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Liên hệ tư vấn thiết kế website', 'dvtkwgr' ); ?></a>
	</div>
</section>
<?php
get_footer();
