<?php
/**
 * Front page.
 *
 * @package dvtkwgr
 */

get_header();

$image_base = 'images/file%20anh%20chinh%20thuc/';
$img        = static function ( $file ) use ( $image_base ) {
	return dvtkwgr_asset( $image_base . $file );
};

$images = array(
	'hero'      => 'trust-active-working-team.webp',
	'why'       => 'credibility-metrics-dashboard.webp',
	'service_1' => 'website-design-service.webp',
	'service_2' => 'advertising-landing-page.webp',
	'service_3' => 'ecommerce-product-website.webp',
	'service_4' => 'ui-ux-optimization.webp',
	'service_5' => 'website-maintenance-security.webp',
	'service_6' => 'hosting-domain-ssl-setup.webp',
	'tpl_1'     => '28-website-local-service-leads.webp',
	'tpl_2'     => '21-website-spa-beauty-clinic.webp',
	'tpl_3'     => '23-website-mechanical-workshop-quote.webp',
	'tpl_4'     => '25-website-interior-furniture-projects.webp',
	'tpl_5'     => '24-website-packaging-printing-catalog.webp',
	'tpl_6'     => 'ecommerce-product-website.webp',
	'process'   => 'process-website-planning.webp',
);

$hero_data = array(
	'eyebrow' => 'Dịch vụ thiết kế website',
	'title'   => 'Thiết kế website chuyên nghiệp cho doanh nghiệp vừa và nhỏ',
	'desc'    => 'Website là nơi khách hàng đánh giá độ uy tín của doanh nghiệp trước khi liên hệ. Chúng tôi thiết kế website WordPress rõ ràng, chuẩn mobile, dễ quản trị và phù hợp với nhu cầu thực tế của từng ngành nghề.',
	'badges'  => array(
		'Có demo trước khi bàn giao',
		'Chuẩn mobile',
		'Dễ quản trị WordPress',
		'Báo giá rõ theo phạm vi',
	),
	'floating' => array( 'Chuẩn mobile', 'Có demo trước', 'SEO nền tảng' ),
);

$trust_data = array(
	array( 'value' => '01', 'label' => 'Tư vấn theo nhu cầu thật' ),
	array( 'value' => '02', 'label' => 'Thiết kế rõ mục tiêu chuyển đổi' ),
	array( 'value' => '03', 'label' => 'Bàn giao WordPress dễ quản trị' ),
	array( 'value' => '04', 'label' => 'Hỗ trợ theo phạm vi đã thống nhất' ),
);

$why_data = array(
	'title' => 'Tại sao doanh nghiệp cần một website chuyên nghiệp?',
	'desc'  => 'Một website chỉn chu giúp doanh nghiệp có kênh chính thức để giới thiệu năng lực, dịch vụ và nhận yêu cầu tư vấn, thay vì phụ thuộc hoàn toàn vào mạng xã hội.',
	'items' => array(
		array( 'icon' => '01', 'title' => 'Tăng độ uy tín khi khách tìm kiếm', 'desc' => 'Khách hàng dễ kiểm tra thông tin doanh nghiệp, dịch vụ và kênh liên hệ chính thức.' ),
		array( 'icon' => '02', 'title' => 'Có kênh chính thức ngoài Facebook/Zalo', 'desc' => 'Nội dung quan trọng được lưu trữ ổn định, dễ chia sẻ và dễ tìm trên Google.' ),
		array( 'icon' => '03', 'title' => 'Trình bày dịch vụ/sản phẩm rõ ràng', 'desc' => 'Bố cục giúp khách hiểu bạn cung cấp gì, phù hợp với ai và nên liên hệ thế nào.' ),
		array( 'icon' => '04', 'title' => 'Nhận yêu cầu tư vấn 24/7', 'desc' => 'Form tư vấn, email và Facebook được đặt ở các vị trí khách dễ hành động.' ),
	),
);

$services_data = array(
	array( 'image' => 'service_1', 'title' => 'Website doanh nghiệp', 'desc' => 'Phù hợp cho công ty, xưởng sản xuất, đơn vị dịch vụ cần giới thiệu năng lực, dịch vụ và thông tin liên hệ.' ),
	array( 'image' => 'service_2', 'title' => 'Landing page dịch vụ', 'desc' => 'Tập trung cho một dịch vụ, một sản phẩm hoặc chiến dịch quảng cáo cần chuyển đổi khách hàng.' ),
	array( 'image' => 'service_3', 'title' => 'Website bán hàng', 'desc' => 'Trình bày sản phẩm, danh mục, chính sách và nút nhận đơn hoặc yêu cầu tư vấn.' ),
	array( 'image' => 'service_4', 'title' => 'Website theo ngành', 'desc' => 'Thiết kế giao diện theo đặc thù ngành như spa, nha khoa, cơ khí, xây dựng, nội thất, bao bì.' ),
	array( 'image' => 'service_5', 'title' => 'Chăm sóc / nâng cấp WordPress', 'desc' => 'Hỗ trợ chỉnh sửa giao diện, cập nhật nội dung, tối ưu tốc độ và xử lý lỗi WordPress.' ),
	array( 'image' => 'service_6', 'title' => 'Hosting, domain, SSL', 'desc' => 'Tư vấn nền tảng kỹ thuật cần thiết để website hoạt động ổn định và an toàn hơn.' ),
);

$templates_data = array(
	array( 'image' => 'tpl_1', 'tag' => 'Công ty', 'title' => 'Website công ty', 'desc' => 'Giới thiệu năng lực, dịch vụ, quy trình và form nhận tư vấn.' ),
	array( 'image' => 'tpl_2', 'tag' => 'Spa / Clinic', 'title' => 'Website spa / clinic', 'desc' => 'Trình bày dịch vụ, không gian, ưu điểm và đặt lịch tư vấn.' ),
	array( 'image' => 'tpl_3', 'tag' => 'Cơ khí', 'title' => 'Website cơ khí', 'desc' => 'Làm rõ năng lực xưởng, sản phẩm, máy móc và yêu cầu báo giá.' ),
	array( 'image' => 'tpl_4', 'tag' => 'Xây dựng / Nội thất', 'title' => 'Website xây dựng / nội thất', 'desc' => 'Giới thiệu hạng mục, phong cách, quy trình và hình ảnh tham khảo.' ),
	array( 'image' => 'tpl_5', 'tag' => 'Bao bì / In ấn', 'title' => 'Website bao bì / in ấn', 'desc' => 'Phù hợp cho catalog sản phẩm, chất liệu, quy cách và tư vấn báo giá.' ),
	array( 'image' => 'tpl_6', 'tag' => 'Bán hàng', 'title' => 'Website bán hàng', 'desc' => 'Danh mục sản phẩm, chính sách, thông tin mua hàng và kênh liên hệ.' ),
);

$pricing_data = array(
	array(
		'title'    => 'Landing Page',
		'price'    => 'từ 990.000đ',
		'desc'     => 'Phù hợp cho một dịch vụ, một sản phẩm hoặc chiến dịch quảng cáo nhỏ.',
		'features' => array( '01 trang landing page', 'Tùy chỉnh màu sắc theo thương hiệu', 'Giao diện chuẩn mobile', 'Form tư vấn hoặc nút liên hệ', 'Tối ưu tốc độ cơ bản', 'SEO nền tảng cơ bản' ),
	),
	array(
		'title'    => 'Website Doanh Nghiệp',
		'price'    => 'từ 1.990.000đ',
		'badge'    => 'Phổ biến',
		'desc'     => 'Phù hợp cho doanh nghiệp nhỏ cần website nhiều trang để giới thiệu dịch vụ và nhận khách hàng.',
		'features' => array( 'Trang chủ, giới thiệu, dịch vụ', 'Tin tức và liên hệ', 'Form nhận tư vấn', 'Tích hợp Facebook/Messenger nếu có', 'Cài SSL', 'Hướng dẫn quản trị WordPress' ),
	),
	array(
		'title'    => 'Website Theo Phạm Vi',
		'price'    => 'Báo giá theo yêu cầu',
		'desc'     => 'Dành cho website cần giao diện riêng, nhiều chức năng hơn hoặc tích hợp nâng cao.',
		'features' => array( 'Thiết kế layout theo nhu cầu', 'WooCommerce nếu cần', 'Tối ưu tốc độ nâng cao', 'Analytics/Search Console', 'Chức năng tùy chỉnh theo phạm vi', 'Bàn giao theo thỏa thuận' ),
	),
);

$process_data = array(
	array( 'title' => 'Tiếp nhận yêu cầu', 'desc' => 'Trao đổi ngành nghề, mục tiêu website, số lượng trang, chức năng cần có và phong cách mong muốn.' ),
	array( 'title' => 'Đề xuất hướng giao diện', 'desc' => 'Gợi ý cấu trúc trang, hình ảnh và hướng thiết kế phù hợp với ngành nghề.' ),
	array( 'title' => 'Thống nhất phạm vi và báo giá', 'desc' => 'Chốt hạng mục bàn giao, thời gian triển khai, chi phí và các phần có thể phát sinh.' ),
	array( 'title' => 'Dựng demo website', 'desc' => 'Triển khai bản demo để khách hàng xem trước bố cục, giao diện và nội dung chính.' ),
	array( 'title' => 'Chỉnh sửa và hoàn thiện', 'desc' => 'Điều chỉnh theo phản hồi trong phạm vi đã thống nhất và kiểm tra responsive.' ),
	array( 'title' => 'Bàn giao và hướng dẫn quản trị', 'desc' => 'Bàn giao website theo thỏa thuận, hướng dẫn quản trị WordPress và hỗ trợ trong phạm vi cam kết.' ),
);

$handover_data = array(
	'Responsive trên nhiều thiết bị',
	'Form liên hệ / Facebook / Messenger nếu có',
	'Cấu trúc SEO nền tảng',
	'Tối ưu tốc độ cơ bản',
	'Quản trị WordPress dễ dùng',
	'Bàn giao rõ ràng theo phạm vi',
);

$faq_data = array(
	array( 'q' => 'Thiết kế website cần chuẩn bị những gì?', 'a' => 'Bạn nên chuẩn bị logo, thông tin doanh nghiệp, danh sách dịch vụ/sản phẩm, hình ảnh thực tế, thông tin liên hệ và một vài website tham khảo nếu có.' ),
	array( 'q' => 'Website có dễ tự chỉnh sửa không?', 'a' => 'Website được xây dựng trên WordPress nên khách hàng có thể tự cập nhật bài viết, hình ảnh và một số nội dung cơ bản sau khi được hướng dẫn.' ),
	array( 'q' => 'Bao lâu thì hoàn thành một website?', 'a' => 'Tùy phạm vi. Landing page thường nhanh hơn website nhiều trang. Thời gian cụ thể sẽ được thống nhất sau khi làm rõ nội dung và chức năng.' ),
	array( 'q' => 'Có được xem demo trước khi bàn giao không?', 'a' => 'Có. Khách hàng được xem bản demo để góp ý trong phạm vi đã thống nhất trước khi hoàn thiện và bàn giao.' ),
	array( 'q' => 'Chi phí có phát sinh không?', 'a' => 'Chi phí được báo theo phạm vi ban đầu. Nếu khách hàng thêm trang, thêm chức năng hoặc thay đổi lớn ngoài phạm vi, phần phát sinh sẽ được báo trước.' ),
	array( 'q' => 'Có hỗ trợ sau bàn giao không?', 'a' => 'Có hỗ trợ kỹ thuật theo phạm vi đã thống nhất, bao gồm hướng dẫn quản trị và xử lý lỗi kỹ thuật thuộc phần triển khai.' ),
);
?>

<section class="home-hero section-xl">
	<div class="container hero-grid">
		<div class="hero-copy reveal">
			<p class="eyebrow"><?php echo esc_html( $hero_data['eyebrow'] ); ?></p>
			<h1><?php echo esc_html( $hero_data['title'] ); ?></h1>
			<p class="hero-desc"><?php echo esc_html( $hero_data['desc'] ); ?></p>
			<div class="hero-actions">
				<button class="btn btn-primary" type="button" data-open-consult><?php esc_html_e( 'Nhận tư vấn miễn phí', 'dvtkwgr' ); ?></button>
				<a class="btn btn-secondary" href="#bang-gia"><?php esc_html_e( 'Xem bảng giá', 'dvtkwgr' ); ?></a>
			</div>
			<div class="hero-badges">
				<?php foreach ( $hero_data['badges'] as $badge ) : ?>
					<span><?php echo esc_html( $badge ); ?></span>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="hero-visual reveal">
			<img src="<?php echo esc_url( $img( $images['hero'] ) ); ?>" alt="<?php esc_attr_e( 'Đội ngũ thiết kế website WordPress đang tư vấn giao diện cho doanh nghiệp vừa và nhỏ', 'dvtkwgr' ); ?>" width="780" height="680" fetchpriority="high" decoding="async">
			<?php foreach ( $hero_data['floating'] as $index => $card ) : ?>
				<span class="hero-float float-<?php echo esc_attr( $index + 1 ); ?>"><?php echo esc_html( $card ); ?></span>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="trust-strip-section">
	<div class="container trust-strip">
		<?php foreach ( $trust_data as $item ) : ?>
			<div class="trust-item reveal">
				<strong><?php echo esc_html( $item['value'] ); ?></strong>
				<span><?php echo esc_html( $item['label'] ); ?></span>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<section id="vi-sao" class="section why-section">
	<div class="container why-grid">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Vì sao cần website', 'dvtkwgr' ); ?></p>
			<h2><?php echo esc_html( $why_data['title'] ); ?></h2>
			<p><?php echo esc_html( $why_data['desc'] ); ?></p>
		</div>
		<figure class="why-image reveal">
			<img src="<?php echo esc_url( $img( $images['why'] ) ); ?>" alt="<?php esc_attr_e( 'Website chuyên nghiệp giúp doanh nghiệp tăng uy tín và nhận tư vấn', 'dvtkwgr' ); ?>" width="760" height="520" loading="lazy" decoding="async">
		</figure>
		<div class="why-cards">
			<?php foreach ( $why_data['items'] as $item ) : ?>
				<article class="icon-card reveal">
					<span><?php echo esc_html( $item['icon'] ); ?></span>
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['desc'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="dich-vu" class="section section-soft">
	<div class="container">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Dịch vụ thiết kế website', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Thiết kế website theo đúng mục tiêu kinh doanh', 'dvtkwgr' ); ?></h2>
			<p><?php esc_html_e( 'Mỗi loại website có một nhiệm vụ riêng. Chúng tôi tư vấn theo nhu cầu thực tế trước khi chốt cấu trúc, giao diện và chi phí.', 'dvtkwgr' ); ?></p>
		</div>
		<div class="service-grid">
			<?php foreach ( $services_data as $service ) : ?>
				<article class="media-card reveal">
					<img src="<?php echo esc_url( $img( $images[ $service['image'] ] ) ); ?>" alt="<?php echo esc_attr( $service['title'] ); ?>" width="560" height="340" loading="lazy" decoding="async">
					<div>
						<h3><?php echo esc_html( $service['title'] ); ?></h3>
						<p><?php echo esc_html( $service['desc'] ); ?></p>
						<button type="button" class="text-button" data-open-consult><?php esc_html_e( 'Tư vấn gói này', 'dvtkwgr' ); ?></button>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="mau-website" class="section templates-section">
	<div class="container">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Mẫu website theo ngành', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Mẫu website tham khảo có thể tùy chỉnh theo ngành nghề', 'dvtkwgr' ); ?></h2>
			<p><?php esc_html_e( 'Các mẫu dưới đây là định hướng giao diện, không phải dự án thật. Nội dung, màu sắc và bố cục có thể tùy chỉnh theo doanh nghiệp.', 'dvtkwgr' ); ?></p>
		</div>
		<div class="template-grid">
			<?php foreach ( $templates_data as $template ) : ?>
				<article class="template-card reveal">
					<img src="<?php echo esc_url( $img( $images[ $template['image'] ] ) ); ?>" alt="<?php echo esc_attr( $template['title'] ); ?>" width="560" height="360" loading="lazy" decoding="async">
					<div>
						<span><?php echo esc_html( $template['tag'] ); ?></span>
						<h3><?php echo esc_html( $template['title'] ); ?></h3>
						<p><?php echo esc_html( $template['desc'] ); ?></p>
						<button type="button" class="text-button" data-open-consult><?php esc_html_e( 'Tư vấn mẫu này', 'dvtkwgr' ); ?></button>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="bang-gia" class="section section-soft">
	<div class="container">
		<div class="section-heading centered reveal">
			<p class="eyebrow"><?php esc_html_e( 'Bảng giá tham khảo', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Bảng giá thiết kế website theo phạm vi nhu cầu', 'dvtkwgr' ); ?></h2>
			<p><?php esc_html_e( 'Giá thực tế phụ thuộc vào số lượng trang, mức tùy chỉnh, nội dung và chức năng. Các gói dưới đây giúp bạn ước lượng ngân sách ban đầu.', 'dvtkwgr' ); ?></p>
		</div>
		<div class="pricing-grid">
			<?php foreach ( $pricing_data as $plan ) : ?>
				<article class="pricing-card reveal <?php echo ! empty( $plan['badge'] ) ? 'is-featured' : ''; ?>">
					<?php if ( ! empty( $plan['badge'] ) ) : ?>
						<span class="plan-badge"><?php echo esc_html( $plan['badge'] ); ?></span>
					<?php endif; ?>
					<h3><?php echo esc_html( $plan['title'] ); ?></h3>
					<strong class="price"><?php echo esc_html( $plan['price'] ); ?></strong>
					<p><?php echo esc_html( $plan['desc'] ); ?></p>
					<ul>
						<?php foreach ( $plan['features'] as $feature ) : ?>
							<li><?php echo esc_html( $feature ); ?></li>
						<?php endforeach; ?>
					</ul>
					<button class="btn <?php echo ! empty( $plan['badge'] ) ? 'btn-primary' : 'btn-secondary'; ?>" type="button" data-open-consult><?php esc_html_e( 'Gửi yêu cầu tư vấn', 'dvtkwgr' ); ?></button>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="quy-trinh" class="section process-section">
	<div class="container process-layout">
		<figure class="process-image reveal">
			<img src="<?php echo esc_url( $img( $images['process'] ) ); ?>" alt="<?php esc_attr_e( 'Quy trình thiết kế website WordPress rõ ràng từ tư vấn đến bàn giao', 'dvtkwgr' ); ?>" width="720" height="760" loading="lazy" decoding="async">
		</figure>
		<div class="process-content">
			<div class="section-heading reveal">
				<p class="eyebrow"><?php esc_html_e( 'Quy trình thiết kế website', 'dvtkwgr' ); ?></p>
				<h2><?php esc_html_e( '6 bước rõ ràng từ tư vấn đến bàn giao', 'dvtkwgr' ); ?></h2>
				<p><?php esc_html_e( 'Quy trình giúp khách hàng biết mình đang ở bước nào, cần chuẩn bị gì và sẽ nhận được gì sau mỗi giai đoạn.', 'dvtkwgr' ); ?></p>
			</div>
			<div class="timeline">
				<?php foreach ( $process_data as $index => $step ) : ?>
					<article class="timeline-item reveal">
						<span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<div>
							<h3><?php echo esc_html( $step['title'] ); ?></h3>
							<p><?php echo esc_html( $step['desc'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<section class="section section-soft handover-section">
	<div class="container">
		<div class="section-heading centered reveal">
			<p class="eyebrow"><?php esc_html_e( 'Cam kết bàn giao', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Một website có thể sử dụng thật và tiếp tục phát triển', 'dvtkwgr' ); ?></h2>
		</div>
		<div class="handover-grid">
			<?php foreach ( $handover_data as $index => $item ) : ?>
				<article class="handover-card reveal">
					<span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3><?php echo esc_html( $item ); ?></h3>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="faq" class="section faq-section">
	<div class="container faq-container">
		<div class="section-heading centered reveal">
			<p class="eyebrow"><?php esc_html_e( 'FAQ', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Những câu hỏi thường gặp khi thiết kế website', 'dvtkwgr' ); ?></h2>
		</div>
		<div class="faq-list">
			<?php foreach ( $faq_data as $index => $item ) : ?>
				<article class="faq-item reveal">
					<button type="button" class="faq-question" aria-expanded="<?php echo 0 === $index ? 'true' : 'false'; ?>">
						<span><?php echo esc_html( $item['q'] ); ?></span>
						<i aria-hidden="true"></i>
					</button>
					<div class="faq-answer" <?php echo 0 === $index ? '' : 'hidden'; ?>>
						<p><?php echo esc_html( $item['a'] ); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="final-cta section" style="--cta-image: url('<?php echo esc_url( $img( $images['hero'] ) ); ?>')">
	<div class="container final-cta-inner reveal">
		<p class="eyebrow"><?php esc_html_e( 'Sẵn sàng bắt đầu?', 'dvtkwgr' ); ?></p>
		<h2><?php esc_html_e( 'Bạn cần một website nhìn chuyên nghiệp hơn?', 'dvtkwgr' ); ?></h2>
		<p><?php esc_html_e( 'Gửi ngành nghề, mục tiêu website và thông tin liên hệ. Chúng tôi sẽ tư vấn hướng giao diện phù hợp, phạm vi cần làm và chi phí dự kiến trước khi triển khai.', 'dvtkwgr' ); ?></p>
		<div class="hero-actions">
			<button class="btn btn-primary" type="button" data-open-consult><?php esc_html_e( 'Gửi yêu cầu tư vấn', 'dvtkwgr' ); ?></button>
			<a class="btn btn-light" href="<?php echo esc_url( dvtkwgr_facebook_url() ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Liên hệ qua Facebook', 'dvtkwgr' ); ?></a>
		</div>
	</div>
</section>

<div class="consult-modal" data-consult-modal hidden>
	<div class="consult-overlay" data-close-consult></div>
	<div class="consult-dialog" role="dialog" aria-modal="true" aria-labelledby="consult-title">
		<button class="consult-close" type="button" aria-label="<?php esc_attr_e( 'Đóng form tư vấn', 'dvtkwgr' ); ?>" data-close-consult>×</button>
		<p class="eyebrow"><?php esc_html_e( 'Tư vấn miễn phí', 'dvtkwgr' ); ?></p>
		<h2 id="consult-title"><?php esc_html_e( 'Gửi yêu cầu tư vấn website', 'dvtkwgr' ); ?></h2>
		<form class="consult-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="dvtkwgr_contact_form">
			<?php wp_nonce_field( 'dvtkwgr_contact_form', 'dvtkwgr_contact_nonce' ); ?>
			<label><?php esc_html_e( 'Họ tên', 'dvtkwgr' ); ?><input type="text" name="name" autocomplete="name" required></label>
			<label><?php esc_html_e( 'Số điện thoại/Zalo nếu muốn nhập', 'dvtkwgr' ); ?><input type="tel" name="phone" autocomplete="tel"></label>
			<label><?php esc_html_e( 'Email', 'dvtkwgr' ); ?><input type="email" name="email" autocomplete="email"></label>
			<label><?php esc_html_e( 'Ngành nghề', 'dvtkwgr' ); ?><input type="text" name="business"></label>
			<label class="full"><?php esc_html_e( 'Nhu cầu website', 'dvtkwgr' ); ?><textarea name="message" rows="4" required></textarea></label>
			<label class="full"><?php esc_html_e( 'Ngân sách dự kiến', 'dvtkwgr' ); ?><select name="budget"><option>Dưới 2 triệu</option><option>2-5 triệu</option><option>5-10 triệu</option><option>Trên 10 triệu</option></select></label>
			<button class="btn btn-primary full" type="submit"><?php esc_html_e( 'Gửi yêu cầu tư vấn', 'dvtkwgr' ); ?></button>
			<p class="form-note full"><?php echo esc_html( 'Hoặc gửi email trực tiếp: ' . dvtkwgr_contact_email() ); ?></p>
		</form>
	</div>
</div>

<?php
get_footer();
