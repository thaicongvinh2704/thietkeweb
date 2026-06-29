<?php
/**
 * Template Name: Liên hệ
 *
 * @package dvtkwgr
 */

get_header();
dvtkwgr_breadcrumb();
?>
<section class="page-hero section">
	<div class="container split-media page-hero-media">
		<div class="content-block reveal">
			<p class="eyebrow"><?php esc_html_e( 'Tư vấn miễn phí', 'dvtkwgr' ); ?></p>
			<h1><?php esc_html_e( 'Liên hệ tư vấn thiết kế website', 'dvtkwgr' ); ?></h1>
			<p><?php esc_html_e( 'Gửi thông tin nhu cầu, ngành nghề và ngân sách dự kiến. Chúng tôi sẽ phản hồi trong ngày làm việc với hướng triển khai phù hợp.', 'dvtkwgr' ); ?></p>
		</div>
		<figure class="section-visual reveal">
			<img src="<?php echo esc_url( dvtkwgr_asset( 'images/contact-web-design-consultation.webp' ) ); ?>" alt="<?php esc_attr_e( 'Liên hệ tư vấn thiết kế website WordPress giá rẻ', 'dvtkwgr' ); ?>" width="760" height="520" fetchpriority="high" decoding="async">
		</figure>
	</div>
</section>

<section class="section" id="contact">
	<div class="container contact-grid">
		<aside class="contact-info reveal">
			<h2><?php esc_html_e( 'Thông tin liên hệ', 'dvtkwgr' ); ?></h2>
			<ul>
				<li><strong><?php esc_html_e( 'Điện thoại/Zalo:', 'dvtkwgr' ); ?></strong> <?php esc_html_e( '09xx xxx xxx', 'dvtkwgr' ); ?></li>
				<li><strong>Email:</strong> <a href="mailto:contact@dichvuthietkewebgiare.com">contact@dichvuthietkewebgiare.com</a></li>
				<li><strong><?php esc_html_e( 'Khu vực hỗ trợ:', 'dvtkwgr' ); ?></strong> <?php esc_html_e( 'Toàn quốc, tư vấn online', 'dvtkwgr' ); ?></li>
				<li><strong><?php esc_html_e( 'Thời gian phản hồi:', 'dvtkwgr' ); ?></strong> <?php esc_html_e( 'Trong ngày làm việc', 'dvtkwgr' ); ?></li>
			</ul>
			<p><?php esc_html_e( 'Bạn có thể gửi mô tả ngắn về ngành nghề, số trang cần làm, website tham khảo và ngân sách dự kiến để được tư vấn nhanh hơn.', 'dvtkwgr' ); ?></p>
		</aside>
		<form class="contact-form reveal" action="#" method="post">
			<?php /* Kết nối Contact Form 7, Fluent Forms hoặc custom handler tại đây khi cần xử lý gửi form thật. */ ?>
			<label><?php esc_html_e( 'Họ tên', 'dvtkwgr' ); ?><input type="text" name="name" autocomplete="name"></label>
			<label><?php esc_html_e( 'Số điện thoại/Zalo', 'dvtkwgr' ); ?><input type="tel" name="phone" autocomplete="tel"></label>
			<label><?php esc_html_e( 'Email', 'dvtkwgr' ); ?><input type="email" name="email" autocomplete="email"></label>
			<label><?php esc_html_e( 'Ngành nghề kinh doanh', 'dvtkwgr' ); ?><input type="text" name="business"></label>
			<label><?php esc_html_e( 'Loại website cần làm', 'dvtkwgr' ); ?>
				<select name="website_type">
					<option><?php esc_html_e( 'Landing page', 'dvtkwgr' ); ?></option>
					<option><?php esc_html_e( 'Website doanh nghiệp', 'dvtkwgr' ); ?></option>
					<option><?php esc_html_e( 'Website catalog sản phẩm', 'dvtkwgr' ); ?></option>
					<option><?php esc_html_e( 'Website bán hàng đơn giản', 'dvtkwgr' ); ?></option>
				</select>
			</label>
			<label><?php esc_html_e( 'Ngân sách dự kiến', 'dvtkwgr' ); ?><input type="text" name="budget"></label>
			<label class="full"><?php esc_html_e( 'Nội dung cần tư vấn', 'dvtkwgr' ); ?><textarea name="message" rows="5"></textarea></label>
			<button class="btn btn-primary" type="submit"><?php esc_html_e( 'Gửi yêu cầu báo giá', 'dvtkwgr' ); ?></button>
		</form>
	</div>
</section>

<section class="section section-muted">
	<div class="container">
		<div class="section-heading reveal">
			<h2><?php esc_html_e( 'Trước khi liên hệ, bạn nên chuẩn bị gì?', 'dvtkwgr' ); ?></h2>
		</div>
		<div class="card-grid five">
			<?php foreach ( array( 'Logo', 'Hình ảnh', 'Danh sách dịch vụ/sản phẩm', 'Website tham khảo', 'Ngân sách dự kiến' ) as $item ) : ?>
				<article class="info-card reveal"><span class="card-icon">✓</span><h3><?php echo esc_html( $item ); ?></h3></article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php
get_footer();
