<?php
/**
 * Front page.
 *
 * @package dvtkwgr
 */

get_header();
?>

<section class="hero section">
	<div class="container hero-grid">
		<div class="hero-copy reveal">
			<p class="eyebrow"><?php esc_html_e( 'Website WordPress rõ quy trình, dễ quản trị', 'dvtkwgr' ); ?></p>
			<h1><?php esc_html_e( 'Thiết kế website WordPress giá rẻ cho doanh nghiệp nhỏ', 'dvtkwgr' ); ?></h1>
			<p class="hero-lead"><?php esc_html_e( 'Giúp cá nhân, cửa hàng và doanh nghiệp nhỏ có website chuyên nghiệp, dễ quản trị, dễ liên hệ khách hàng qua Zalo, điện thoại hoặc form tư vấn.', 'dvtkwgr' ); ?></p>
			<div class="hero-actions">
				<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Nhận tư vấn miễn phí', 'dvtkwgr' ); ?></a>
				<a class="btn btn-secondary" href="#quy-trinh"><?php esc_html_e( 'Xem quy trình làm việc', 'dvtkwgr' ); ?></a>
			</div>
			<div class="trust-row" aria-label="<?php esc_attr_e( 'Cam kết dịch vụ', 'dvtkwgr' ); ?>">
				<span><?php esc_html_e( 'Có demo trước', 'dvtkwgr' ); ?></span>
				<span><?php esc_html_e( 'Báo giá rõ ràng', 'dvtkwgr' ); ?></span>
				<span><?php esc_html_e( 'Bàn giao minh bạch', 'dvtkwgr' ); ?></span>
			</div>
		</div>
		<div class="hero-visual reveal" aria-label="<?php esc_attr_e( 'Mockup giao diện website trên laptop và điện thoại', 'dvtkwgr' ); ?>">
			<div class="device laptop">
				<div class="device-bar"><span></span><span></span><span></span></div>
				<div class="mock-nav"></div>
				<div class="mock-layout">
					<div class="mock-panel"></div>
					<div class="mock-lines"><span></span><span></span><span></span></div>
				</div>
				<div class="mock-cards"><span></span><span></span><span></span></div>
			</div>
			<div class="device phone">
				<div class="phone-speaker"></div>
				<div class="phone-block"></div>
				<div class="phone-lines"><span></span><span></span><span></span></div>
			</div>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Vấn đề thường gặp', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Bạn cần một website đơn giản nhưng đủ chuyên nghiệp?', 'dvtkwgr' ); ?></h2>
		</div>
		<div class="card-grid five">
			<?php
			$problems = array(
				'Chưa có website nên khách hàng khó tin tưởng',
				'Chỉ bán qua Facebook/Zalo nên thiếu nền tảng lâu dài',
				'Muốn chạy quảng cáo nhưng chưa có landing page',
				'Sợ thuê làm web bị phát sinh chi phí',
				'Không biết quản trị website sau khi làm xong',
			);
			foreach ( $problems as $problem ) :
				?>
				<article class="info-card reveal"><span class="card-icon">!</span><h3><?php echo esc_html( $problem ); ?></h3></article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section-muted">
	<div class="container">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Giải pháp', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Chúng tôi tập trung vào website nhỏ, gọn, dễ dùng', 'dvtkwgr' ); ?></h2>
		</div>
		<div class="card-grid services">
			<?php
			$services = array(
				array( 'icon' => 'LP', 'title' => 'Landing page dịch vụ', 'desc' => 'Một trang bán hàng rõ CTA, phù hợp chạy quảng cáo và đo chuyển đổi.' ),
				array( 'icon' => 'DN', 'title' => 'Website giới thiệu doanh nghiệp', 'desc' => 'Trình bày năng lực, dịch vụ, thông tin liên hệ và tạo độ tin cậy.' ),
				array( 'icon' => 'CT', 'title' => 'Website sản phẩm dạng catalog', 'desc' => 'Trưng bày danh mục sản phẩm, nhận yêu cầu báo giá nhanh.' ),
				array( 'icon' => 'BH', 'title' => 'Website bán hàng đơn giản', 'desc' => 'Phù hợp cửa hàng nhỏ cần giới thiệu sản phẩm và nhận đơn cơ bản.' ),
				array( 'icon' => 'WP', 'title' => 'Chỉnh sửa và chăm sóc website WordPress', 'desc' => 'Hỗ trợ chỉnh giao diện, cập nhật nội dung và xử lý lỗi kỹ thuật.' ),
			);
			foreach ( $services as $service ) :
				?>
				<article class="service-card reveal">
					<span class="service-icon"><?php echo esc_html( $service['icon'] ); ?></span>
					<h3><?php echo esc_html( $service['title'] ); ?></h3>
					<p><?php echo esc_html( $service['desc'] ); ?></p>
					<a class="text-link" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Tư vấn gói này', 'dvtkwgr' ); ?></a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Chi phí tham khảo', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Bảng giá tham khảo rõ ràng', 'dvtkwgr' ); ?></h2>
		</div>
		<div class="pricing-grid">
			<?php
			$plans = array(
				array( 'name' => 'Gói Landing Page', 'price' => 'Từ 1.500.000đ', 'items' => array( '1 trang duy nhất', 'Form liên hệ', 'Nút gọi/Zalo', 'Responsive mobile', 'Phù hợp chạy quảng cáo' ) ),
				array( 'name' => 'Gói Website Cơ Bản', 'price' => 'Từ 2.900.000đ', 'items' => array( '4-5 trang cơ bản', 'Trang chủ, giới thiệu, dịch vụ, liên hệ', 'SEO cơ bản', 'Form liên hệ', 'Phù hợp doanh nghiệp nhỏ' ), 'featured' => true ),
				array( 'name' => 'Gói Website Bán Hàng Đơn Giản', 'price' => 'Từ 4.900.000đ', 'items' => array( 'Danh mục sản phẩm', 'Trang chi tiết sản phẩm', 'Form nhận báo giá', 'Nút Zalo/điện thoại', 'Phù hợp trưng bày sản phẩm' ) ),
			);
			foreach ( $plans as $plan ) :
				?>
				<article class="pricing-card reveal <?php echo ! empty( $plan['featured'] ) ? 'is-featured' : ''; ?>">
					<h3><?php echo esc_html( $plan['name'] ); ?></h3>
					<p class="price"><?php echo esc_html( $plan['price'] ); ?></p>
					<ul>
						<?php foreach ( $plan['items'] as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
					<a class="btn btn-secondary" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Nhận báo giá', 'dvtkwgr' ); ?></a>
				</article>
			<?php endforeach; ?>
		</div>
		<p class="note reveal"><?php esc_html_e( 'Chi phí thực tế phụ thuộc vào số lượng trang, nội dung, hình ảnh và chức năng. Chúng tôi sẽ báo giá rõ trước khi triển khai.', 'dvtkwgr' ); ?></p>
	</div>
</section>

<section class="section section-muted">
	<div class="container">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Demo ngành nghề', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Mẫu giao diện phù hợp nhiều ngành nghề', 'dvtkwgr' ); ?></h2>
		</div>
		<div class="demo-grid">
			<?php
			$demos = array(
				array(
					'title' => 'Website Hộp Giấy VPN',
					'desc'  => 'Mẫu tham khảo theo phong cách nhà máy hộp giấy, bao bì, carton, quà tặng và catalog sản phẩm B2B.',
					'url'   => 'https://hopgiayvpn.com/',
					'tag'   => 'Nguồn: hopgiayvpn.com',
					'tone'  => 'packaging',
				),
				array(
					'title' => 'Website Spa',
					'desc'  => 'Phù hợp spa, thẩm mỹ viện, clinic nhỏ cần giới thiệu dịch vụ, bảng giá và đặt lịch nhanh.',
					'url'   => home_url( '/lien-he/' ),
					'tag'   => 'Làm đẹp',
					'tone'  => 'spa',
				),
				array(
					'title' => 'Website Xây Dựng',
					'desc'  => 'Dành cho nhà thầu, đội thi công, công ty xây dựng cần hồ sơ năng lực và dự án đã làm.',
					'url'   => home_url( '/lien-he/' ),
					'tag'   => 'Công trình',
					'tone'  => 'build',
				),
				array(
					'title' => 'Website Nha Khoa',
					'desc'  => 'Mẫu gọn cho phòng khám nha khoa với dịch vụ nổi bật, bác sĩ, feedback và nút tư vấn.',
					'url'   => home_url( '/lien-he/' ),
					'tag'   => 'Phòng khám',
					'tone'  => 'dental',
				),
				array(
					'title' => 'Website Nội Thất',
					'desc'  => 'Tập trung hình ảnh dự án, phong cách thiết kế, quy trình thi công và form nhận báo giá.',
					'url'   => home_url( '/lien-he/' ),
					'tag'   => 'Showroom',
					'tone'  => 'interior',
				),
				array(
					'title' => 'Website Nhà Hàng',
					'desc'  => 'Phù hợp quán ăn, nhà hàng, cà phê cần menu, hình món, đặt bàn và bản đồ chỉ đường.',
					'url'   => home_url( '/lien-he/' ),
					'tag'   => 'Ẩm thực',
					'tone'  => 'food',
				),
				array(
					'title' => 'Website Công Ty Dịch Vụ',
					'desc'  => 'Mẫu doanh nghiệp nhỏ giới thiệu dịch vụ, quy trình, cam kết và kênh liên hệ rõ ràng.',
					'url'   => home_url( '/lien-he/' ),
					'tag'   => 'Dịch vụ',
					'tone'  => 'service',
				),
				array(
					'title' => 'Website Bất Động Sản',
					'desc'  => 'Dùng cho môi giới hoặc dự án nhỏ cần đăng sản phẩm, vị trí, tiện ích và nhận khách quan tâm.',
					'url'   => home_url( '/lien-he/' ),
					'tag'   => 'Dự án',
					'tone'  => 'realty',
				),
				array(
					'title' => 'Website Giáo Dục',
					'desc'  => 'Phù hợp trung tâm đào tạo, khóa học ngắn hạn, gia sư, tư vấn du học và tuyển sinh.',
					'url'   => home_url( '/lien-he/' ),
					'tag'   => 'Khóa học',
					'tone'  => 'edu',
				),
			);
			foreach ( $demos as $index => $demo ) :
				?>
				<article class="demo-card reveal">
					<div class="demo-thumb demo-thumb-<?php echo esc_attr( $demo['tone'] ); ?>" role="img" aria-label="<?php echo esc_attr( 'Ảnh minh họa mẫu ' . $demo['title'] ); ?>">
						<span></span>
						<i></i>
						<b><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></b>
						<em><?php echo esc_html( $demo['tag'] ); ?></em>
					</div>
					<div class="demo-body">
						<h3><?php echo esc_html( $demo['title'] ); ?></h3>
						<p><?php echo esc_html( $demo['desc'] ); ?></p>
						<div class="demo-actions">
							<a href="<?php echo esc_url( $demo['url'] ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Xem mẫu', 'dvtkwgr' ); ?></a>
							<a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Chọn mẫu này', 'dvtkwgr' ); ?></a>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="quy-trinh" class="section process-section">
	<div class="container">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Quy trình', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Quy trình làm website rõ ràng, hạn chế rủi ro', 'dvtkwgr' ); ?></h2>
		</div>
		<ol class="timeline">
			<?php
			$steps = array( 'Tư vấn nhu cầu', 'Chọn mẫu giao diện', 'Thống nhất báo giá và đặt cọc', 'Dựng demo để khách xem trước', 'Thanh toán còn lại và bàn giao website' );
			foreach ( $steps as $index => $step ) :
				?>
				<li class="reveal"><span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span><h3><?php echo esc_html( $step ); ?></h3></li>
			<?php endforeach; ?>
		</ol>
		<div class="highlight-box reveal"><?php esc_html_e( 'Khách hàng được xem bản demo trước khi thanh toán đủ. Website chỉ bàn giao tài khoản quản trị sau khi hoàn tất thanh toán theo thỏa thuận.', 'dvtkwgr' ); ?></div>
	</div>
</section>

<section class="section section-muted">
	<div class="container">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Lý do chọn chúng tôi', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Tập trung vào điều doanh nghiệp nhỏ thật sự cần', 'dvtkwgr' ); ?></h2>
		</div>
		<div class="card-grid three">
			<?php
			$reasons = array(
				'Chi phí phù hợp doanh nghiệp nhỏ',
				'Không vẽ ra chức năng không cần thiết',
				'Có bản demo trước khi bàn giao',
				'Website dễ quản trị bằng WordPress',
				'Hỗ trợ hướng dẫn sử dụng cơ bản',
				'Bảo hành lỗi kỹ thuật theo thỏa thuận',
			);
			foreach ( $reasons as $reason ) :
				?>
				<article class="info-card reveal"><span class="card-icon">✓</span><h3><?php echo esc_html( $reason ); ?></h3></article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section">
	<div class="container narrow">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'FAQ', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Câu hỏi thường gặp', 'dvtkwgr' ); ?></h2>
		</div>
		<div class="faq-list">
			<?php
			$faqs = array(
				'Website giá rẻ có chuyên nghiệp không?' => 'Có, nếu phạm vi được xác định rõ và tập trung vào những phần quan trọng: giao diện sạch, thông tin dễ hiểu, CTA rõ và tốc độ tốt.',
				'Bao lâu thì hoàn thành website?' => 'Thông thường landing page mất vài ngày làm việc, website cơ bản mất khoảng một đến hai tuần tùy nội dung và phản hồi.',
				'Tôi có cần mua domain và hosting không?' => 'Có. Chúng tôi có thể tư vấn gói phù hợp, còn quyền sở hữu domain và hosting nên đứng tên khách hàng.',
				'Tôi có tự sửa nội dung sau khi bàn giao không?' => 'Có. Website dùng WordPress nên bạn có thể tự sửa bài viết, hình ảnh và thông tin cơ bản.',
				'Có hỗ trợ SEO không?' => 'Có SEO on-page cơ bản như cấu trúc heading, title, mô tả, tốc độ và giao diện thân thiện mobile.',
				'Nếu muốn chỉnh sửa thêm thì sao?' => 'Các chỉnh sửa ngoài phạm vi ban đầu sẽ được báo chi phí rõ trước khi thực hiện.',
				'Thanh toán như thế nào?' => 'Thông thường đặt cọc sau khi chốt báo giá, xem demo trước, sau đó thanh toán phần còn lại để bàn giao.',
			);
			foreach ( $faqs as $question => $answer ) :
				?>
				<details class="faq-item reveal">
					<summary><?php echo esc_html( $question ); ?></summary>
					<p><?php echo esc_html( $answer ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="final-cta section">
	<div class="container final-cta-inner reveal">
		<h2><?php esc_html_e( 'Bạn muốn có một website đơn giản, chuyên nghiệp với chi phí hợp lý?', 'dvtkwgr' ); ?></h2>
		<p><?php esc_html_e( 'Gửi thông tin ngành nghề của bạn, chúng tôi sẽ tư vấn mẫu website phù hợp và báo giá rõ ràng trước khi triển khai.', 'dvtkwgr' ); ?></p>
		<div class="hero-actions">
			<a class="btn btn-primary" href="https://zalo.me/09xxxxxxxx" target="_blank" rel="noopener"><?php esc_html_e( 'Nhắn Zalo', 'dvtkwgr' ); ?></a>
			<a class="btn btn-light" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Gửi yêu cầu báo giá', 'dvtkwgr' ); ?></a>
		</div>
	</div>
</section>

<?php
get_footer();
