<?php
/**
 * Front page.
 *
 * @package dvtkwgr
 */

get_header();

$demo_cards = array(
	array( 'image' => 'templates/business/mau-website-doanh-nghiep-thumbnail.webp', 'tag' => 'Doanh nghiệp', 'title' => 'Mẫu website doanh nghiệp', 'desc' => 'Phù hợp công ty mới, công ty dịch vụ, doanh nghiệp địa phương, giới thiệu năng lực và nhận yêu cầu tư vấn.', 'alt' => 'Mẫu website doanh nghiệp chuyên nghiệp cho công ty nhỏ', 'slug' => 'mau-website-doanh-nghiep', 'view_url' => home_url( '/mau-giao-dien/mau-website-doanh-nghiep/' ) ),
	array( 'image' => 'ecommerce-company-website-demo-thumbnail.webp', 'tag' => 'Bán hàng', 'title' => 'Mẫu website bán hàng đơn giản', 'desc' => 'Phù hợp cửa hàng nhỏ, catalog sản phẩm, nhận đơn và tư vấn nhanh qua Zalo.', 'alt' => 'Mẫu website bán hàng đơn giản cho cửa hàng nhỏ' ),
	array( 'image' => 'construction-website-demo-thumbnail.webp', 'tag' => 'Xây dựng', 'title' => 'Mẫu website xây dựng', 'desc' => 'Phù hợp công ty xây dựng, sửa chữa nhà, nhà thầu, hồ sơ năng lực và báo giá.', 'alt' => 'Mẫu website công ty xây dựng và sửa chữa nhà' ),
	array( 'image' => 'dental-clinic-website-demo-thumbnail.webp', 'tag' => 'Nha khoa', 'title' => 'Mẫu website nha khoa', 'desc' => 'Phù hợp phòng khám nha khoa, dịch vụ răng hàm mặt, tư vấn lịch hẹn.', 'alt' => 'Mẫu website phòng khám nha khoa chuyên nghiệp' ),
	array( 'image' => 'interior-design-website-demo-thumbnail.webp', 'tag' => 'Nội thất', 'title' => 'Mẫu website nội thất', 'desc' => 'Phù hợp thiết kế thi công nội thất, portfolio dự án, nhận tư vấn và báo giá.', 'alt' => 'Mẫu website thiết kế nội thất hiện đại' ),
	array( 'image' => 'restaurant-website-demo-thumbnail.webp', 'tag' => 'Ẩm thực', 'title' => 'Mẫu website nhà hàng', 'desc' => 'Phù hợp nhà hàng, quán ăn, quán cà phê, menu, hình món và đặt bàn.', 'alt' => 'Mẫu website nhà hàng quán ăn chuyên nghiệp' ),
	array( 'image' => 'service-company-website-demo-thumbnail.webp', 'tag' => 'Dịch vụ', 'title' => 'Mẫu website công ty dịch vụ', 'desc' => 'Phù hợp công ty tư vấn, logistics, kế toán, sửa chữa và dịch vụ nhỏ.', 'alt' => 'Mẫu website công ty dịch vụ nhỏ' ),
	array( 'image' => 'real-estate-website-demo-thumbnail.webp', 'tag' => 'Bất động sản', 'title' => 'Mẫu website bất động sản', 'desc' => 'Phù hợp môi giới, dự án nhỏ, tư vấn căn hộ, nhà đất và thu lead.', 'alt' => 'Mẫu website bất động sản cho môi giới và dự án nhỏ' ),
	array( 'image' => 'education-website-demo-thumbnail.webp', 'tag' => 'Giáo dục', 'title' => 'Mẫu website giáo dục', 'desc' => 'Phù hợp trung tâm đào tạo, khóa học, gia sư, tư vấn du học và tuyển sinh.', 'alt' => 'Mẫu website giáo dục và trung tâm đào tạo' ),
);

$blog_cards = array(
	array( 'image' => 'cheap-website-professional-blog-thumbnail.webp', 'title' => 'Website giá rẻ có chuyên nghiệp không?', 'excerpt' => 'Cách nhìn đúng về website chi phí thấp nhưng vẫn rõ thông tin, có CTA và tạo niềm tin.', 'alt' => 'Website giá rẻ có chuyên nghiệp không' ),
	array( 'image' => 'wordpress-website-preparation-blog-thumbnail.webp', 'title' => 'Làm website WordPress cần chuẩn bị gì?', 'excerpt' => 'Danh sách nội dung, hình ảnh, logo, dịch vụ và thông tin liên hệ nên chuẩn bị trước.', 'alt' => 'Những thứ cần chuẩn bị trước khi làm website WordPress' ),
	array( 'image' => 'website-design-cost-breakdown-blog-thumbnail.webp', 'title' => 'Chi phí thiết kế website gồm những gì?', 'excerpt' => 'Các khoản thường gặp như giao diện, nội dung, hosting, domain, bảo trì và nâng cấp.', 'alt' => 'Chi phí thiết kế website gồm những khoản nào' ),
);
?>

<section class="hero image-hero section">
	<div class="container hero-grid">
		<div class="hero-copy reveal">
			<p class="eyebrow"><?php esc_html_e( 'Website WordPress rõ quy trình, dễ quản trị', 'dvtkwgr' ); ?></p>
			<h1><?php esc_html_e( 'Thiết kế website WordPress giá rẻ cho doanh nghiệp nhỏ', 'dvtkwgr' ); ?></h1>
			<p class="hero-lead"><?php esc_html_e( 'Giúp cá nhân, cửa hàng và doanh nghiệp nhỏ có website chuyên nghiệp, dễ quản trị, dễ liên hệ khách hàng qua Zalo, điện thoại hoặc form tư vấn.', 'dvtkwgr' ); ?></p>
			<div class="hero-actions">
				<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Nhận tư vấn miễn phí', 'dvtkwgr' ); ?></a>
				<a class="btn btn-secondary" href="#mau-giao-dien"><?php esc_html_e( 'Xem mẫu giao diện', 'dvtkwgr' ); ?></a>
			</div>
			<div class="trust-row" aria-label="<?php esc_attr_e( 'Cam kết dịch vụ', 'dvtkwgr' ); ?>">
				<span><?php esc_html_e( 'Có demo trước', 'dvtkwgr' ); ?></span>
				<span><?php esc_html_e( 'Báo giá rõ ràng', 'dvtkwgr' ); ?></span>
				<span><?php esc_html_e( 'Bàn giao minh bạch', 'dvtkwgr' ); ?></span>
			</div>
		</div>
		<figure class="hero-media reveal">
			<img src="<?php echo esc_url( dvtkwgr_asset( 'images/landing-page-website-hero-banner.webp' ) ); ?>" alt="<?php esc_attr_e( 'Thiết kế website WordPress giá rẻ cho doanh nghiệp nhỏ', 'dvtkwgr' ); ?>" width="960" height="640" fetchpriority="high" decoding="async">
		</figure>
	</div>
</section>

<section class="section">
	<div class="container split-media">
		<figure class="section-visual reveal">
			<img src="<?php echo esc_url( dvtkwgr_asset( 'images/responsive-company-website-mockup.webp' ) ); ?>" alt="<?php esc_attr_e( 'Mẫu website WordPress responsive trên laptop tablet và điện thoại', 'dvtkwgr' ); ?>" width="760" height="520" loading="lazy" decoding="async">
		</figure>
		<div class="content-block reveal">
			<p class="eyebrow"><?php esc_html_e( 'Giải pháp gọn cho doanh nghiệp nhỏ', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Website đẹp trên điện thoại, dễ sửa nội dung sau bàn giao', 'dvtkwgr' ); ?></h2>
			<p><?php esc_html_e( 'Chúng tôi ưu tiên cấu trúc rõ ràng, tốc độ tốt, CTA dễ thấy và giao diện phù hợp ngành nghề. Website dùng WordPress để bạn có thể tự cập nhật bài viết, hình ảnh và thông tin cơ bản.', 'dvtkwgr' ); ?></p>
			<a class="text-link" href="<?php echo esc_url( home_url( '/gioi-thieu/' ) ); ?>"><?php esc_html_e( 'Tìm hiểu cách chúng tôi làm việc', 'dvtkwgr' ); ?></a>
		</div>
	</div>
</section>

<section id="mau-giao-dien" class="section section-muted">
	<div class="container">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Demo ngành nghề', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Mẫu giao diện phù hợp nhiều ngành nghề', 'dvtkwgr' ); ?></h2>
		</div>
		<div class="demo-grid image-card-grid">
			<?php foreach ( $demo_cards as $demo ) : ?>
				<?php
				$sample_slug = ! empty( $demo['slug'] ) ? $demo['slug'] : sanitize_title( $demo['title'] );
				$view_url    = ! empty( $demo['view_url'] ) ? $demo['view_url'] : '#';
				?>
				<article class="demo-card image-demo-card reveal <?php echo 'mau-website-doanh-nghiep' === $sample_slug ? 'demo-business-card' : ''; ?>">
					<a class="demo-image" href="#" aria-label="<?php echo esc_attr( 'Xem ' . $demo['title'] ); ?>">
						<img src="<?php echo esc_url( dvtkwgr_asset( 'images/' . $demo['image'] ) ); ?>" alt="<?php echo esc_attr( $demo['alt'] ); ?>" width="720" height="480" loading="lazy" decoding="async">
					</a>
					<div class="demo-body">
						<span class="demo-tag"><?php echo esc_html( $demo['tag'] ); ?></span>
						<h3><?php echo esc_html( $demo['title'] ); ?></h3>
						<p><?php echo esc_html( $demo['desc'] ); ?></p>
						<div class="demo-actions">
							<a href="<?php echo esc_url( $view_url ); ?>"><?php esc_html_e( 'Xem mẫu', 'dvtkwgr' ); ?></a>
							<a href="<?php echo esc_url( add_query_arg( 'mau', $sample_slug, home_url( '/lien-he/' ) ) ); ?>"><?php esc_html_e( 'Chọn mẫu này', 'dvtkwgr' ); ?></a>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="quy-trinh" class="section">
	<div class="container process-layout">
		<div class="process-copy reveal">
			<p class="eyebrow"><?php esc_html_e( 'Quy trình', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Làm website rõ từng bước, khách được xem demo trước', 'dvtkwgr' ); ?></h2>
			<ol class="timeline">
				<?php
				$steps = array( 'Tư vấn nhu cầu', 'Chọn mẫu giao diện', 'Thống nhất báo giá và đặt cọc', 'Dựng demo để khách xem trước', 'Thanh toán còn lại và bàn giao website' );
				foreach ( $steps as $index => $step ) :
					?>
					<li><span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span><h3><?php echo esc_html( $step ); ?></h3></li>
				<?php endforeach; ?>
			</ol>
			<div class="highlight-box"><?php esc_html_e( 'Khách hàng được xem bản demo trước khi thanh toán đủ. Website chỉ bàn giao tài khoản quản trị sau khi hoàn tất thanh toán theo thỏa thuận.', 'dvtkwgr' ); ?></div>
		</div>
		<figure class="section-visual reveal">
			<img src="<?php echo esc_url( dvtkwgr_asset( 'images/website-consulting-demo-review.webp' ) ); ?>" alt="<?php esc_attr_e( 'Khách hàng xem bản demo website trước khi bàn giao', 'dvtkwgr' ); ?>" width="760" height="520" loading="lazy" decoding="async">
		</figure>
	</div>
</section>

<section class="section section-muted">
	<div class="container split-media">
		<figure class="section-visual reveal">
			<img src="<?php echo esc_url( dvtkwgr_asset( 'images/website-handover-process-checklist.webp' ) ); ?>" alt="<?php esc_attr_e( 'Quy trình bàn giao website WordPress minh bạch', 'dvtkwgr' ); ?>" width="760" height="520" loading="lazy" decoding="async">
		</figure>
		<div class="content-block reveal">
			<p class="eyebrow"><?php esc_html_e( 'Bàn giao minh bạch', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Cam kết phạm vi rõ trước khi làm', 'dvtkwgr' ); ?></h2>
			<ul class="check-list">
				<li><?php esc_html_e( 'Không bàn giao admin/source trước khi hoàn tất thanh toán.', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Có hướng dẫn quản trị cơ bản sau khi bàn giao.', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Bảo hành lỗi kỹ thuật theo thỏa thuận.', 'dvtkwgr' ); ?></li>
				<li><?php esc_html_e( 'Báo giá rõ trước khi làm, hạn chế phát sinh.', 'dvtkwgr' ); ?></li>
			</ul>
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Nhận tư vấn quy trình', 'dvtkwgr' ); ?></a>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Tin tức', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Kiến thức làm website cho doanh nghiệp nhỏ', 'dvtkwgr' ); ?></h2>
		</div>
		<div class="blog-card-grid">
			<?php foreach ( $blog_cards as $post ) : ?>
				<article class="static-blog-card reveal">
					<img src="<?php echo esc_url( dvtkwgr_asset( 'images/' . $post['image'] ) ); ?>" alt="<?php echo esc_attr( $post['alt'] ); ?>" width="720" height="450" loading="lazy" decoding="async">
					<div>
						<span><?php esc_html_e( 'Kinh nghiệm website', 'dvtkwgr' ); ?></span>
						<h3><?php echo esc_html( $post['title'] ); ?></h3>
						<p><?php echo esc_html( $post['excerpt'] ); ?></p>
						<a class="text-link" href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>"><?php esc_html_e( 'Đọc thêm', 'dvtkwgr' ); ?></a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="final-cta section">
	<div class="container final-cta-inner reveal">
		<h2><?php esc_html_e( 'Bạn muốn có website gọn, đẹp và dễ quản trị?', 'dvtkwgr' ); ?></h2>
		<p><?php esc_html_e( 'Gửi thông tin ngành nghề của bạn, chúng tôi sẽ tư vấn mẫu website phù hợp và báo giá rõ ràng trước khi triển khai.', 'dvtkwgr' ); ?></p>
		<div class="hero-actions">
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Gửi yêu cầu báo giá', 'dvtkwgr' ); ?></a>
			<a class="btn btn-light" href="<?php echo esc_url( home_url( '/gioi-thieu/' ) ); ?>"><?php esc_html_e( 'Xem nguyên tắc làm việc', 'dvtkwgr' ); ?></a>
		</div>
	</div>
</section>

<?php
get_footer();
