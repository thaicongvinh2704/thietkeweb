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

$homepage_posts = new WP_Query(
	dvtkwgr_real_blog_query_args(
		array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	)
);
$show_homepage_posts = 3 <= (int) $homepage_posts->post_count;
?>

<section class="hero image-hero section">
	<div class="container hero-grid">
		<div class="hero-copy reveal">
			<p class="eyebrow"><?php esc_html_e( 'Website WordPress rõ quy trình, dễ quản trị', 'dvtkwgr' ); ?></p>
			<h1><?php esc_html_e( 'Thiết kế website giá hợp lý cho doanh nghiệp vừa và nhỏ', 'dvtkwgr' ); ?></h1>
			<p class="hero-lead"><?php esc_html_e( 'Thiết kế website WordPress với chi phí phù hợp, quy trình rõ ràng và dễ quản trị sau bàn giao. Phù hợp cho cá nhân kinh doanh, cửa hàng và doanh nghiệp cần một website chuyên nghiệp để giới thiệu dịch vụ, sản phẩm và tiếp nhận khách hàng tiềm năng.', 'dvtkwgr' ); ?></p>
			<div class="hero-actions">
				<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Nhận tư vấn miễn phí', 'dvtkwgr' ); ?></a>
				<a class="btn btn-secondary" href="#bang-gia"><?php esc_html_e( 'Xem bảng giá', 'dvtkwgr' ); ?></a>
			</div>
			<div class="trust-row" aria-label="<?php esc_attr_e( 'Cam kết dịch vụ', 'dvtkwgr' ); ?>">
				<span><?php esc_html_e( 'Có demo trước', 'dvtkwgr' ); ?></span>
				<span><?php esc_html_e( 'Báo giá rõ ràng', 'dvtkwgr' ); ?></span>
				<span><?php esc_html_e( 'Bàn giao source code', 'dvtkwgr' ); ?></span>
				<span><?php esc_html_e( 'Hướng dẫn quản trị', 'dvtkwgr' ); ?></span>
			</div>
		</div>
		<figure class="hero-media reveal">
			<img src="<?php echo esc_url( dvtkwgr_home_banner_asset() ); ?>" alt="<?php esc_attr_e( 'Thiết kế website WordPress cho doanh nghiệp vừa và nhỏ', 'dvtkwgr' ); ?>" width="960" height="640" fetchpriority="high" decoding="async">
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

<section class="section section-compact">
	<div class="container">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Cách chúng tôi làm việc', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Mô hình làm việc tinh gọn, tập trung vào nhu cầu thực tế', 'dvtkwgr' ); ?></h2>
			<p><?php esc_html_e( 'Thay vì xây dựng một quy trình phức tạp với nhiều tầng trung gian, dịch vụ tập trung vào việc làm rõ nhu cầu, phạm vi công việc và kết quả bàn giao ngay từ đầu.', 'dvtkwgr' ); ?></p>
		</div>
		<div class="card-grid four">
			<article class="info-card reveal">
				<span class="card-icon">01</span>
				<h3><?php esc_html_e( 'Trao đổi trực tiếp', 'dvtkwgr' ); ?></h3>
				<p><?php esc_html_e( 'Nhu cầu được trao đổi trực tiếp để hạn chế việc thông tin bị sai lệch qua nhiều tầng trung gian.', 'dvtkwgr' ); ?></p>
			</article>
			<article class="info-card reveal">
				<span class="card-icon">02</span>
				<h3><?php esc_html_e( 'Chỉ triển khai những gì cần thiết', 'dvtkwgr' ); ?></h3>
				<p><?php esc_html_e( 'Không cố gắng thêm chức năng phức tạp khi doanh nghiệp chưa thật sự cần sử dụng.', 'dvtkwgr' ); ?></p>
			</article>
			<article class="info-card reveal">
				<span class="card-icon">03</span>
				<h3><?php esc_html_e( 'Chi phí theo phạm vi công việc', 'dvtkwgr' ); ?></h3>
				<p><?php esc_html_e( 'Báo giá dựa trên loại website, số lượng trang, yêu cầu giao diện và tính năng cần triển khai.', 'dvtkwgr' ); ?></p>
			</article>
			<article class="info-card reveal">
				<span class="card-icon">04</span>
				<h3><?php esc_html_e( 'Dễ quản trị sau bàn giao', 'dvtkwgr' ); ?></h3>
				<p><?php esc_html_e( 'Ưu tiên WordPress và cấu trúc quản trị phù hợp để khách hàng có thể chủ động cập nhật những nội dung cơ bản.', 'dvtkwgr' ); ?></p>
			</article>
		</div>
	</div>
</section>

<section id="bang-gia" class="section section-muted">
	<div class="container">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Báo giá minh bạch', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Bảng Giá Dịch Vụ Thiết Kế Website', 'dvtkwgr' ); ?></h2>
			<p><?php esc_html_e( 'Các gói dưới đây giúp ước lượng chi phí ban đầu. Phạm vi, nội dung bàn giao và tiến độ sẽ được thống nhất rõ trước khi triển khai.', 'dvtkwgr' ); ?></p>
		</div>
		<div class="pricing-board">
			<article class="pricing-package">
				<p class="package-kicker"><?php esc_html_e( 'Gói cơ bản', 'dvtkwgr' ); ?></p>
				<h3><?php esc_html_e( 'Khởi Nghiệp', 'dvtkwgr' ); ?></h3>
				<div class="package-price"><strong>990.000</strong><span>đ</span></div>
				<p class="package-note"><?php esc_html_e( 'Giao diện landing page gọn, rõ CTA, phù hợp cá nhân và doanh nghiệp nhỏ.', 'dvtkwgr' ); ?></p>
				<h4><?php esc_html_e( 'Thời gian triển khai: 3-5 ngày', 'dvtkwgr' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Thiết kế 1 landing page theo template tối ưu chuyển đổi.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Tùy chỉnh màu sắc theo nhận diện thương hiệu.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Giao diện chuẩn mobile, PC và tablet.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Tối ưu tốc độ tải trang cơ bản.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Chuẩn SEO cơ bản: meta title, description.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Tích hợp form tư vấn hoặc thông tin khách hàng.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Trang cảm ơn sau khi đăng ký.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Tích hợp nút gọi nhanh, Zalo, Messenger.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Bàn giao source code.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Hướng dẫn quản trị sau bàn giao.', 'dvtkwgr' ); ?></li>
				</ul>
				<a class="btn btn-secondary" href="<?php echo esc_url( add_query_arg( 'goi', 'khoi-nghiep', home_url( '/lien-he/' ) ) ); ?>"><?php esc_html_e( 'Đăng Ký Ngay', 'dvtkwgr' ); ?></a>
			</article>
			<article class="pricing-package is-recommended">
				<div class="package-badge"><?php esc_html_e( 'Phù hợp doanh nghiệp nhỏ', 'dvtkwgr' ); ?></div>
				<p class="package-kicker"><?php esc_html_e( 'Gói chuyên nghiệp', 'dvtkwgr' ); ?></p>
				<h3><?php esc_html_e( 'Business Pro', 'dvtkwgr' ); ?></h3>
				<div class="package-price"><strong>1.990.000</strong><span>đ</span></div>
				<p class="package-note"><?php esc_html_e( 'Website nhiều trang, SEO cơ bản và giao diện chuyên nghiệp cho doanh nghiệp nhỏ.', 'dvtkwgr' ); ?></p>
				<h4><?php esc_html_e( 'Thời gian triển khai: 7-15 ngày', 'dvtkwgr' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Giao diện theo mẫu, tùy chỉnh theo nhận diện thương hiệu.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Cấu trúc SEO nền tảng và giao diện responsive trên các kích thước phổ biến.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Tối ưu cấu trúc SEO nền tảng: URL, heading, meta, sitemap.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Sẵn sàng tích hợp SEO và quảng cáo dài hạn.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Giao diện chuẩn mobile và tablet.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Tối ưu tốc độ tải trang.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Hướng dẫn quản trị website sau bàn giao.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Thiết kế form liên hệ và nhận yêu cầu.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Thiết lập form liên hệ gửi email.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Tích hợp form liên hệ, nút gọi nhanh, Zalo, Messenger.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Cài đặt SSL bảo mật.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Hướng dẫn đăng tối ưu 05 bài viết chuẩn SEO.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Hỗ trợ kỹ thuật sau bàn giao theo phạm vi đã thống nhất.', 'dvtkwgr' ); ?></li>
				</ul>
				<a class="btn btn-primary" href="<?php echo esc_url( add_query_arg( 'goi', 'business-pro', home_url( '/lien-he/' ) ) ); ?>"><?php esc_html_e( 'Đăng Ký Ngay', 'dvtkwgr' ); ?></a>
			</article>
			<article class="pricing-package">
				<p class="package-kicker"><?php esc_html_e( 'Gói mở rộng', 'dvtkwgr' ); ?></p>
				<h3><?php esc_html_e( 'Theo Phạm Vi', 'dvtkwgr' ); ?></h3>
				<div class="package-price is-contact"><?php esc_html_e( 'Liên Hệ', 'dvtkwgr' ); ?></div>
				<p class="package-note"><?php esc_html_e( 'Báo giá theo dự án thực tế.', 'dvtkwgr' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Thiết kế layout giao diện độc quyền theo yêu cầu.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Thiết kế website độc quyền đa trang theo yêu cầu, chuẩn SEO nâng cao.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Thiết kế bộ nhận diện trang chủ theo yêu cầu.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Tích hợp tính năng nâng cao: giỏ hàng, vận chuyển, thanh toán.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Tích hợp công cụ đo lường: Google Analytics, Search Console.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Tối ưu tốc độ tải trang website.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Thiết lập form liên hệ, đăng ký nhận tư vấn.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Cài đặt SSL bảo mật.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Liên kết Facebook, Zalo và các kênh liên hệ phù hợp.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Hỗ trợ thiết lập chiến dịch Facebook/Google Ads.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Bàn giao source code và tài khoản quản trị.', 'dvtkwgr' ); ?></li>
				</ul>
				<h4><?php esc_html_e( 'Tặng kèm:', 'dvtkwgr' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Tặng tên miền .vn năm đầu.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Hosting SSD 1 năm.', 'dvtkwgr' ); ?></li>
					<li><?php esc_html_e( 'Sao lưu dữ liệu định kỳ.', 'dvtkwgr' ); ?></li>
				</ul>
				<a class="btn btn-primary package-orange" href="<?php echo esc_url( add_query_arg( 'goi', 'enterprise', home_url( '/lien-he/' ) ) ); ?>"><?php esc_html_e( 'Đăng Ký Ngay', 'dvtkwgr' ); ?></a>
			</article>
		</div>
		<?php if ( false ) : // Tạm ẩn section mẫu giao diện trong khi hiển thị bảng báo giá. ?>
		<div class="demo-grid image-card-grid">
			<?php foreach ( $demo_cards as $demo ) : ?>
				<?php
				$sample_slug = ! empty( $demo['slug'] ) ? $demo['slug'] : sanitize_title( $demo['title'] );
				$view_url    = ! empty( $demo['view_url'] ) ? $demo['view_url'] : '#';
				?>
				<article class="demo-card image-demo-card reveal <?php echo 'mau-website-doanh-nghiep' === $sample_slug ? 'demo-business-card' : ''; ?>">
					<a class="demo-image" href="<?php echo esc_url( $view_url ); ?>" aria-label="<?php echo esc_attr( 'Xem ' . $demo['title'] ); ?>">
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
		<?php endif; ?>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Giá trị bàn giao', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Một website có thể sử dụng và tiếp tục phát triển', 'dvtkwgr' ); ?></h2>
		</div>
		<div class="card-grid three">
			<article class="info-card reveal">
				<span class="card-icon">✓</span>
				<h3><?php esc_html_e( 'Responsive trên nhiều thiết bị', 'dvtkwgr' ); ?></h3>
				<p><?php esc_html_e( 'Giao diện được kiểm tra trên các kích thước màn hình phổ biến để đảm bảo nội dung và CTA dễ sử dụng.', 'dvtkwgr' ); ?></p>
			</article>
			<article class="info-card reveal">
				<span class="card-icon">✓</span>
				<h3><?php esc_html_e( 'Quản trị nội dung bằng WordPress', 'dvtkwgr' ); ?></h3>
				<p><?php esc_html_e( 'Khách hàng có thể cập nhật bài viết, hình ảnh và các nội dung cơ bản sau khi được bàn giao.', 'dvtkwgr' ); ?></p>
			</article>
			<article class="info-card reveal">
				<span class="card-icon">✓</span>
				<h3><?php esc_html_e( 'Cấu trúc SEO nền tảng', 'dvtkwgr' ); ?></h3>
				<p><?php esc_html_e( 'Thiết lập cấu trúc heading, URL, metadata và sitemap ở mức phù hợp với phạm vi gói dịch vụ.', 'dvtkwgr' ); ?></p>
			</article>
			<article class="info-card reveal">
				<span class="card-icon">✓</span>
				<h3><?php esc_html_e( 'Kênh tiếp nhận khách hàng', 'dvtkwgr' ); ?></h3>
				<p><?php esc_html_e( 'Có thể tích hợp form tư vấn và các kênh liên hệ phù hợp với nhu cầu của website.', 'dvtkwgr' ); ?></p>
			</article>
			<article class="info-card reveal">
				<span class="card-icon">✓</span>
				<h3><?php esc_html_e( 'Bàn giao rõ ràng', 'dvtkwgr' ); ?></h3>
				<p><?php esc_html_e( 'Tài khoản và dữ liệu nằm trong phạm vi dự án được bàn giao theo thỏa thuận sau khi dự án hoàn tất.', 'dvtkwgr' ); ?></p>
			</article>
			<article class="info-card reveal">
				<span class="card-icon">✓</span>
				<h3><?php esc_html_e( 'Hướng dẫn sử dụng cơ bản', 'dvtkwgr' ); ?></h3>
				<p><?php esc_html_e( 'Hướng dẫn những thao tác quản trị cần thiết để khách hàng có thể vận hành website.', 'dvtkwgr' ); ?></p>
			</article>
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
