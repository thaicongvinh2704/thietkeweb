<?php
/**
 * Redesigned front page.
 *
 * @package dvtkwgr-child
 */

get_header();

$asset = static function ( $file ) {
	return dvtkwgr_child_home_asset( $file );
};

$icon = static function ( $name = 'check' ) {
	$paths = array(
		'check'    => '<path d="m5 12 4 4L19 6"/>',
		'clock'    => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
		'info'     => '<circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/>',
		'chat'     => '<path d="M5 18.5 3.5 21l.7-4A8 8 0 1 1 7 19"/><path d="M8 10h8M8 14h5"/>',
		'shield'   => '<path d="M12 3 4.5 6v5.5c0 4.5 3 7.6 7.5 9.5 4.5-1.9 7.5-5 7.5-9.5V6L12 3Z"/><path d="m9 12 2 2 4-4"/>',
		'layout'   => '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M9 9v11"/>',
		'cart'     => '<path d="M3 4h2l2.2 10.2a2 2 0 0 0 2 1.6h7.9a2 2 0 0 0 1.9-1.4L21 7H6"/><circle cx="10" cy="20" r="1"/><circle cx="18" cy="20" r="1"/>',
		'building' => '<path d="M4 21V7l8-4 8 4v14M8 10h2m4 0h2M8 14h2m4 0h2M9 21v-3h6v3"/>',
		'rocket'   => '<path d="M14 5c3.5-3.5 6-2 6-2s1.5 2.5-2 6l-5 5-3-3 4-6Z"/><path d="m9 12-4 1-2 2 6 1M12 15l-1 4-2 2-1-6"/>',
		'code'     => '<path d="m8 9-4 3 4 3M16 9l4 3-4 3M14 5l-4 14"/>',
		'wrench'   => '<path d="M14.5 6.5a4 4 0 0 0-5-5l2.2 2.2-3 3-2.2-2.2a4 4 0 0 0 5 5L20 18a1.4 1.4 0 0 1-2 2l-8.5-8.5"/>',
		'gauge'    => '<path d="M4 18a9 9 0 1 1 16 0"/><path d="m12 15 4-6"/><path d="M5 18h14"/>',
		'arrow'    => '<path d="M5 12h14M14 7l5 5-5 5"/>',
		'phone'    => '<path d="M7 3H5a2 2 0 0 0-2 2c0 8.8 7.2 16 16 16a2 2 0 0 0 2-2v-2l-5-1-1 3c-4.5-1.4-8-4.9-9.4-9.4l3-1L7 3Z"/>',
		'mail'     => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/>',
	);
	$path = isset( $paths[ $name ] ) ? $paths[ $name ] : $paths['check'];

	return '<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
};

$benefits = array(
	array( 'title' => 'Kinh doanh không giới hạn thời gian', 'text' => 'Website tiếp nhận nhu cầu và giới thiệu dịch vụ ngay cả ngoài giờ làm việc.', 'icon' => 'clock' ),
	array( 'title' => 'Cung cấp thông tin nhanh chóng', 'text' => 'Khách hàng chủ động xem dịch vụ, quy trình, bảng giá và thông tin liên hệ.', 'icon' => 'info' ),
	array( 'title' => 'Hỗ trợ khách hàng hiệu quả', 'text' => 'Form tư vấn và các kênh liên hệ được đặt đúng lúc, dễ tìm và dễ thao tác.', 'icon' => 'chat' ),
	array( 'title' => 'Gia tăng nhận diện và độ tin cậy', 'text' => 'Một kênh chính thức giúp thương hiệu nhất quán hơn khi khách hàng tìm kiếm.', 'icon' => 'shield' ),
	array( 'title' => 'Hỗ trợ quảng cáo và chuyển đổi', 'text' => 'Landing page rõ mục tiêu giúp chiến dịch có điểm đến chuyên nghiệp hơn.', 'icon' => 'rocket' ),
	array( 'title' => 'Thu thập dữ liệu khách hàng', 'text' => 'Biểu mẫu có cấu trúc giúp doanh nghiệp nhận đúng thông tin cần tư vấn.', 'icon' => 'layout' ),
);

$services = array(
	array( 'title' => 'Website bán hàng', 'text' => 'Danh mục sản phẩm, chính sách mua hàng, form đặt hàng hoặc WooCommerce theo phạm vi.', 'icon' => 'cart' ),
	array( 'title' => 'Website doanh nghiệp', 'text' => 'Giới thiệu năng lực, dịch vụ, dự án, tin tức và kênh nhận yêu cầu tư vấn.', 'icon' => 'building' ),
	array( 'title' => 'Landing page', 'text' => 'Trang đích tập trung cho một dịch vụ, sản phẩm hoặc chiến dịch quảng cáo.', 'icon' => 'rocket' ),
	array( 'title' => 'Website theo yêu cầu', 'text' => 'Cấu trúc và chức năng được xác định từ nhu cầu vận hành thực tế.', 'icon' => 'code' ),
	array( 'title' => 'Chăm sóc WordPress', 'text' => 'Cập nhật nội dung, kiểm tra lỗi, sao lưu và hỗ trợ kỹ thuật theo gói.', 'icon' => 'wrench' ),
	array( 'title' => 'Tối ưu và nâng cấp website', 'text' => 'Cải thiện giao diện, responsive, tốc độ và trải nghiệm trên website hiện có.', 'icon' => 'gauge' ),
);

$portfolio = array(
	array( 'file' => 'web-mau-doanh-nghiep-full.png', 'width' => 1440, 'height' => 1100, 'title' => 'VPN Paper Box Manufacturer', 'tag' => 'Website doanh nghiệp', 'url' => 'https://hopgiayvpn.com/', 'domain' => 'hopgiayvpn.com' ),
	array( 'file' => 'web-mau-spa-full.png', 'width' => 1440, 'height' => 1100, 'title' => 'Mộc An Spa', 'tag' => 'Website Spa', 'url' => 'http://spa.dichvuthietketrangweb.com/', 'domain' => 'spa.dichvuthietketrangweb.com' ),
	array( 'file' => 'web-mau-mam-non-fixed.png', 'width' => 1440, 'height' => 1100, 'title' => 'Little Seed Montessori', 'tag' => 'Website Mầm non', 'url' => 'http://mamnon.dichvuthietketrangweb.com/', 'domain' => 'mamnon.dichvuthietketrangweb.com' ),
);

$reasons = array(
	array( 'file' => 'reason-direct-consulting.webp', 'title' => 'Trao đổi trực tiếp', 'text' => 'Làm rõ mục tiêu, khách hàng và nội dung cần ưu tiên trước khi dựng giao diện.' ),
	array( 'file' => 'reason-transparent-pricing.webp', 'title' => 'Báo giá rõ ràng', 'text' => 'Hạng mục, phạm vi bàn giao và chi phí được nêu trước khi triển khai.' ),
	array( 'file' => 'reason-fast-delivery.webp', 'title' => 'Triển khai đúng phạm vi', 'text' => 'Tiến độ được theo dõi theo từng giai đoạn, phản hồi tập trung trên bản demo.' ),
	array( 'file' => 'reason-modern-development.webp', 'title' => 'Công nghệ phù hợp', 'text' => 'Ưu tiên WordPress và giải pháp vừa đủ để dễ vận hành, bảo trì và mở rộng.' ),
	array( 'file' => 'reason-support-maintenance.webp', 'title' => 'Hỗ trợ kỹ thuật', 'text' => 'Hướng dẫn quản trị và hỗ trợ các vấn đề thuộc phạm vi đã thống nhất.' ),
	array( 'file' => 'reason-small-business-partner.webp', 'title' => 'Dễ tiếp tục phát triển', 'text' => 'Cấu trúc rõ ràng giúp doanh nghiệp bổ sung nội dung và chức năng về sau.' ),
);

$qualities = array(
	array( 'id' => 'responsive', 'file' => 'quality-responsive-design.webp', 'title' => 'Responsive nhiều thiết bị', 'text' => 'Nội dung và thao tác được ưu tiên theo từng kích thước màn hình, không chỉ thu nhỏ giao diện desktop.', 'points' => array( 'Kiểm tra điện thoại, tablet và desktop', 'Tap target tối thiểu 44px', 'Không có cuộn ngang ngoài ý muốn' ) ),
	array( 'id' => 'uxui', 'file' => 'quality-ux-ui-design.webp', 'title' => 'Giao diện chuẩn UX/UI', 'text' => 'Bố cục dẫn người xem từ thông tin quan trọng đến hành động phù hợp, với hệ thống chữ và khoảng cách nhất quán.', 'points' => array( 'Một CTA chính cho mỗi vùng nội dung', 'Tương phản đạt mức dễ đọc', 'Trạng thái hover và focus rõ ràng' ) ),
	array( 'id' => 'seo', 'file' => 'quality-seo-foundation.webp', 'title' => 'Cấu trúc SEO nền tảng', 'text' => 'Trang được tổ chức bằng heading, semantic HTML và metadata phù hợp để hỗ trợ quá trình tối ưu sau này.', 'points' => array( 'Một H1 và hệ thống H2/H3 logic', 'Schema Service và FAQ phù hợp', 'Giữ canonical và thiết lập SEO hiện có' ) ),
	array( 'id' => 'security', 'file' => 'quality-website-security.webp', 'title' => 'An toàn và bảo mật', 'text' => 'Áp dụng các thực hành WordPress an toàn ở mức nền tảng và hạn chế dữ liệu không cần thiết.', 'points' => array( 'Form có nonce và lọc dữ liệu', 'Khuyến nghị HTTPS/SSL', 'Cập nhật và sao lưu theo kế hoạch' ) ),
	array( 'id' => 'integration', 'file' => 'quality-channel-integration.webp', 'title' => 'Liên kết và tích hợp', 'text' => 'Kết nối website với đúng các kênh doanh nghiệp đang sở hữu, không thêm liên kết hoặc logo không xác minh.', 'points' => array( 'Email và mạng xã hội chính thức', 'Analytics/Search Console khi có tài khoản', 'Tích hợp theo nhu cầu vận hành' ) ),
	array( 'id' => 'management', 'file' => 'quality-easy-management.webp', 'title' => 'Dễ dàng quản trị', 'text' => 'Cấu trúc WordPress được giữ dễ hiểu để người phụ trách có thể cập nhật nội dung thường xuyên.', 'points' => array( 'Hướng dẫn cập nhật nội dung', 'Phân nhóm trang và bài viết rõ ràng', 'Hạn chế phụ thuộc không cần thiết' ) ),
	array( 'id' => 'features', 'file' => 'quality-useful-features.webp', 'title' => 'Tính năng phù hợp', 'text' => 'Chức năng được chọn theo mục tiêu kinh doanh và ngân sách, tránh làm phức tạp website chỉ để có nhiều tính năng.', 'points' => array( 'Form nhận nhu cầu có cấu trúc', 'Tính năng theo phạm vi báo giá', 'Có đường hướng nâng cấp về sau' ) ),
	array( 'id' => 'speed', 'file' => 'quality-website-speed.webp', 'title' => 'Tốc độ tải trang', 'text' => 'Ảnh WebP, lazy loading và JavaScript nhẹ giúp giảm dữ liệu tải ban đầu mà vẫn giữ trải nghiệm đầy đủ.', 'points' => array( 'Ảnh có kích thước để giảm CLS', 'Không tải slider từ CDN', 'Tôn trọng reduced motion' ) ),
);

$pricing = array(
	array( 'title' => 'Khởi Nghiệp', 'price' => '990.000 đ', 'text' => 'Phù hợp cá nhân kinh doanh hoặc dịch vụ cần một trang giới thiệu tập trung.', 'features' => array( '01 landing page', 'Tùy chỉnh màu theo thương hiệu', 'Responsive đa thiết bị', 'Form tư vấn hoặc nút liên hệ', 'Tối ưu tốc độ cơ bản', 'SEO nền tảng' ) ),
	array( 'title' => 'Business Pro', 'price' => '1.990.000 đ', 'badge' => 'Phù hợp doanh nghiệp nhỏ', 'text' => 'Website nhiều trang để giới thiệu doanh nghiệp, dịch vụ và tiếp nhận khách hàng.', 'features' => array( 'Trang chủ, giới thiệu và dịch vụ', 'Trang tin tức và liên hệ', 'Form nhận tư vấn', 'Tích hợp kênh liên hệ đang có', 'Cài đặt SSL khi hosting hỗ trợ', 'Hướng dẫn quản trị WordPress' ) ),
	array( 'title' => 'Theo Phạm Vi', 'price' => 'Liên hệ', 'text' => 'Dành cho giao diện riêng, bán hàng hoặc các chức năng và tích hợp nâng cao.', 'features' => array( 'Thiết kế layout theo nhu cầu', 'WooCommerce khi cần', 'Tối ưu tốc độ nâng cao', 'Analytics/Search Console', 'Chức năng theo phạm vi', 'Bàn giao theo thỏa thuận' ) ),
);

$process = array(
	array( 'title' => 'Tiếp nhận nhu cầu', 'text' => 'Ghi nhận ngành nghề, mục tiêu, số trang và chức năng cần có.' ),
	array( 'title' => 'Tư vấn giải pháp', 'text' => 'Đề xuất cấu trúc, nền tảng và hướng giao diện phù hợp.' ),
	array( 'title' => 'Thống nhất giao diện và phạm vi', 'text' => 'Chốt nội dung, hạng mục, mốc phản hồi và kết quả bàn giao.' ),
	array( 'title' => 'Báo giá và xác nhận triển khai', 'text' => 'Gửi báo giá theo phạm vi và xác nhận trước khi bắt đầu.' ),
	array( 'title' => 'Thiết kế và lập trình', 'text' => 'Xây dựng giao diện, chức năng và cấu trúc responsive.' ),
	array( 'title' => 'Gửi demo', 'text' => 'Cung cấp đường dẫn demo để khách hàng kiểm tra trực tiếp.' ),
	array( 'title' => 'Chỉnh sửa và kiểm thử', 'text' => 'Điều chỉnh theo phản hồi và kiểm tra thiết bị, form, liên kết.' ),
	array( 'title' => 'Bàn giao và hướng dẫn quản trị', 'text' => 'Bàn giao theo thỏa thuận và hướng dẫn cập nhật nội dung.' ),
);

$faqs = array(
	array( 'q' => 'Thiết kế website mất bao lâu?', 'a' => 'Thời gian phụ thuộc vào số trang, mức độ tùy chỉnh, nội dung và chức năng. Mốc triển khai cụ thể được thống nhất sau khi làm rõ phạm vi.' ),
	array( 'q' => 'Giá thiết kế website được tính như thế nào?', 'a' => 'Chi phí được tính theo số lượng trang, mức tùy chỉnh giao diện, chức năng, nội dung và yêu cầu tích hợp. Mọi phần phát sinh đều được báo trước.' ),
	array( 'q' => 'Có được xem demo trước không?', 'a' => 'Có. Khách hàng được xem demo và gửi phản hồi trong phạm vi đã thống nhất trước khi hoàn thiện.' ),
	array( 'q' => 'Website có dùng tốt trên điện thoại không?', 'a' => 'Có. Giao diện được kiểm tra trên điện thoại, máy tính bảng và máy tính để bảo đảm nội dung dễ đọc và thao tác thuận tiện.' ),
	array( 'q' => 'Sau bàn giao có tự cập nhật nội dung được không?', 'a' => 'Website WordPress cho phép cập nhật bài viết, hình ảnh và các nội dung cơ bản sau khi được hướng dẫn quản trị.' ),
	array( 'q' => 'Có bàn giao source code không?', 'a' => 'Phạm vi bàn giao source code và tài khoản quản trị được ghi rõ trong báo giá hoặc thỏa thuận triển khai.' ),
	array( 'q' => 'Có hỗ trợ SEO và quảng cáo không?', 'a' => 'Website có cấu trúc SEO nền tảng. Các hạng mục SEO nội dung hoặc quảng cáo chuyên sâu được tư vấn riêng theo nhu cầu.' ),
	array( 'q' => 'Chi phí duy trì hằng năm gồm những gì?', 'a' => 'Chi phí thường gồm tên miền, hosting và các dịch vụ trả phí được chọn thêm. Mức thực tế phụ thuộc cấu hình sử dụng.' ),
);
?>

<div class="homepage-redesign">
	<section class="hp-hero hp-section" aria-labelledby="home-title">
		<div class="hp-container hp-hero-grid">
			<div class="hp-hero-copy">
				<p class="hp-eyebrow reveal-up">Thiết kế website WordPress cho doanh nghiệp</p>
				<h1 id="home-title" class="reveal-up">Thiết kế website giá hợp lý cho doanh nghiệp vừa và nhỏ</h1>
				<p class="hp-hero-desc reveal-up">Website được xây dựng để giới thiệu đúng năng lực, dễ dùng trên điện thoại và giúp khách hàng biết bước tiếp theo cần làm. Phạm vi, chi phí và kết quả bàn giao được trao đổi rõ trước khi triển khai.</p>
				<div class="hp-actions reveal-up">
					<a class="hp-btn hp-btn-primary" href="#tu-van">Nhận tư vấn miễn phí</a>
					<a class="hp-btn hp-btn-secondary" href="#bang-gia">Xem bảng giá</a>
				</div>
				<ul class="hp-trust-points reveal-up" aria-label="Thông tin bàn giao">
					<?php foreach ( array( 'Có demo trước', 'Báo giá rõ ràng', 'Bàn giao source code theo thỏa thuận', 'Hướng dẫn quản trị' ) as $point ) : ?>
						<li><?php echo $icon( 'check' ); ?><span><?php echo esc_html( $point ); ?></span></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<figure class="hp-hero-visual reveal-right">
				<div class="hp-hero-frame">
					<img src="<?php echo esc_url( $asset( 'homepage-web-design-hero.webp' ) ); ?>" alt="Website hiển thị trên máy tính, máy tính bảng và điện thoại" width="1512" height="1040" fetchpriority="high" decoding="async">
				</div>
			</figure>
		</div>
	</section>

	<section class="hp-quick-contact" aria-label="Liên hệ nhanh">
		<div class="hp-container hp-quick-contact-inner">
			<div><strong>Chia sẻ ý tưởng về website của bạn</strong><span>Nhận gợi ý về cấu trúc, phạm vi và ngân sách phù hợp.</span></div>
			<div class="hp-quick-actions"><a href="mailto:<?php echo esc_attr( dvtkwgr_contact_email() ); ?>"><?php echo $icon( 'mail' ); ?><?php echo esc_html( dvtkwgr_contact_email() ); ?></a><a class="hp-btn hp-btn-accent" href="#tu-van">Gửi yêu cầu</a></div>
		</div>
	</section>

	<section id="loi-ich" class="hp-section hp-benefits" aria-labelledby="benefits-title">
		<div class="hp-container">
			<header class="hp-section-heading hp-centered reveal-up"><p class="hp-eyebrow">Giá trị thực tế</p><h2 id="benefits-title">Nâng tầm thương hiệu với website chuyên nghiệp</h2><p>Một website rõ ràng giúp doanh nghiệp xuất hiện chuyên nghiệp hơn, cung cấp thông tin nhất quán và tạo thêm cơ hội nhận yêu cầu tư vấn.</p></header>
			<div class="hp-benefits-grid">
				<div class="hp-benefit-list">
					<?php foreach ( array_slice( $benefits, 0, 3 ) as $benefit ) : ?>
						<article class="hp-benefit reveal-left"><span class="hp-icon"><?php echo $icon( $benefit['icon'] ); ?></span><div><h3><?php echo esc_html( $benefit['title'] ); ?></h3><p><?php echo esc_html( $benefit['text'] ); ?></p></div></article>
					<?php endforeach; ?>
				</div>
				<figure class="hp-benefits-image reveal-scale"><img src="<?php echo esc_url( $asset( 'website-business-growth.webp' ) ); ?>" alt="Website bán hàng hỗ trợ hoạt động kinh doanh của doanh nghiệp" width="1409" height="1116" loading="lazy" decoding="async"></figure>
				<div class="hp-benefit-list">
					<?php foreach ( array_slice( $benefits, 3 ) as $benefit ) : ?>
						<article class="hp-benefit reveal-right"><span class="hp-icon"><?php echo $icon( $benefit['icon'] ); ?></span><div><h3><?php echo esc_html( $benefit['title'] ); ?></h3><p><?php echo esc_html( $benefit['text'] ); ?></p></div></article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<section id="dich-vu" class="hp-section hp-surface" aria-labelledby="services-title">
		<div class="hp-container">
			<header class="hp-section-heading reveal-up"><p class="hp-eyebrow">Giải pháp theo nhu cầu</p><h2 id="services-title">Dịch vụ thiết kế website</h2><p>Rõ phạm vi – Dễ quản trị – Phù hợp nhu cầu thực tế</p></header>
			<div class="hp-service-grid">
				<?php foreach ( $services as $service ) : ?>
					<article class="hp-service-card reveal-up"><span class="hp-icon hp-icon-large"><?php echo $icon( $service['icon'] ); ?></span><h3><?php echo esc_html( $service['title'] ); ?></h3><p><?php echo esc_html( $service['text'] ); ?></p><a href="#tu-van">Tư vấn dịch vụ <?php echo $icon( 'arrow' ); ?></a></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="mau-website" class="hp-section hp-portfolio" aria-labelledby="portfolio-title">
		<div class="hp-container">
			<div class="hp-heading-row"><header class="hp-section-heading reveal-up"><p class="hp-eyebrow">Web mẫu đã triển khai</p><h2 id="portfolio-title">Mẫu website theo ngành nghề</h2><p>Khám phá các website mẫu hoàn chỉnh dành cho doanh nghiệp, spa và trường mầm non. Mỗi mẫu có thể tùy chỉnh nội dung, màu sắc và chức năng theo nhu cầu.</p></header><div class="hp-carousel-controls"><button type="button" data-carousel-prev aria-label="Mẫu trước">←</button><button type="button" data-carousel-next aria-label="Mẫu tiếp theo">→</button></div></div>
			<div class="hp-carousel" data-carousel data-autoplay="5200">
				<div class="hp-carousel-track" tabindex="0">
					<?php foreach ( $portfolio as $item ) : ?>
						<article class="hp-portfolio-card hp-slide">
							<div class="hp-browser"><span></span><span></span><span></span><small><?php echo esc_html( $item['domain'] ); ?></small></div>
							<a class="hp-portfolio-link" href="<?php echo esc_url( $item['url'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Xem website <?php echo esc_attr( $item['title'] ); ?>">
								<div class="hp-screenshot"><img src="<?php echo esc_url( $asset( $item['file'] ) ); ?>" alt="Ảnh đại diện <?php echo esc_attr( $item['title'] ); ?>" width="<?php echo esc_attr( $item['width'] ); ?>" height="<?php echo esc_attr( $item['height'] ); ?>" loading="lazy" decoding="async"></div>
								<div class="hp-portfolio-meta"><span><?php echo esc_html( $item['tag'] ); ?></span><h3><?php echo esc_html( $item['title'] ); ?></h3><strong>Xem website <?php echo $icon( 'arrow' ); ?></strong></div>
							</a>
						</article>
					<?php endforeach; ?>
				</div>
				<div class="hp-carousel-dots" aria-label="Chọn nhóm mẫu"></div>
			</div>
		</div>
	</section>

	<section id="ly-do" class="hp-section hp-surface" aria-labelledby="reasons-title">
		<div class="hp-container">
			<header class="hp-section-heading hp-centered reveal-up"><p class="hp-eyebrow">Cách chúng tôi làm việc</p><h2 id="reasons-title">Lý do lựa chọn dịch vụ</h2><p>Tập trung vào trao đổi rõ, giải pháp vừa đủ và khả năng tiếp tục vận hành sau bàn giao.</p></header>
			<div class="hp-reasons-grid">
				<?php foreach ( $reasons as $reason ) : ?>
					<article class="hp-reason-card reveal-up"><div class="hp-reason-image"><img src="<?php echo esc_url( $asset( $reason['file'] ) ); ?>" alt="<?php echo esc_attr( $reason['title'] ); ?>" width="1555" height="1011" loading="lazy" decoding="async"></div><div><h3><?php echo esc_html( $reason['title'] ); ?></h3><p><?php echo esc_html( $reason['text'] ); ?></p></div></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="tieu-chuan" class="hp-section hp-quality" aria-labelledby="quality-title">
		<div class="hp-container">
			<header class="hp-section-heading reveal-up"><p class="hp-eyebrow">Tiêu chuẩn bàn giao</p><h2 id="quality-title">Tiêu chuẩn chất lượng website</h2><p>Mỗi tiêu chí được triển khai theo phạm vi thực tế và được kiểm tra trước khi bàn giao.</p></header>
			<div class="hp-quality-layout">
				<div class="hp-tablist" role="tablist" aria-label="Tiêu chuẩn chất lượng">
					<?php foreach ( $qualities as $index => $quality ) : ?>
						<button id="quality-tab-<?php echo esc_attr( $quality['id'] ); ?>" role="tab" type="button" aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>" aria-controls="quality-panel-<?php echo esc_attr( $quality['id'] ); ?>" tabindex="<?php echo 0 === $index ? '0' : '-1'; ?>"><?php echo esc_html( $quality['title'] ); ?></button>
					<?php endforeach; ?>
				</div>
				<div class="hp-tabpanels">
					<?php foreach ( $qualities as $index => $quality ) : ?>
						<article id="quality-panel-<?php echo esc_attr( $quality['id'] ); ?>" class="hp-tabpanel" role="tabpanel" aria-labelledby="quality-tab-<?php echo esc_attr( $quality['id'] ); ?>" <?php echo 0 === $index ? '' : 'hidden'; ?>>
							<img src="<?php echo esc_url( $asset( $quality['file'] ) ); ?>" alt="<?php echo esc_attr( $quality['title'] ); ?>" width="1536" height="1024" loading="lazy" decoding="async">
							<div><h3><?php echo esc_html( $quality['title'] ); ?></h3><p><?php echo esc_html( $quality['text'] ); ?></p><ul><?php foreach ( $quality['points'] as $point ) : ?><li><?php echo $icon( 'check' ); ?><?php echo esc_html( $point ); ?></li><?php endforeach; ?></ul></div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<section id="bang-gia" class="hp-section hp-surface" aria-labelledby="pricing-title">
		<div class="hp-container">
			<header class="hp-section-heading hp-centered reveal-up"><p class="hp-eyebrow">Chi phí tham khảo</p><h2 id="pricing-title">Bảng giá thiết kế website</h2><p>Giá cuối cùng phụ thuộc số trang, mức tùy chỉnh, nội dung và chức năng. Phạm vi cụ thể luôn được xác nhận trước.</p></header>
			<div class="hp-pricing-grid">
				<?php foreach ( $pricing as $plan ) : ?>
					<article class="hp-price-card reveal-up <?php echo ! empty( $plan['badge'] ) ? 'is-featured' : ''; ?>">
						<?php if ( ! empty( $plan['badge'] ) ) : ?><span class="hp-price-badge"><?php echo esc_html( $plan['badge'] ); ?></span><?php endif; ?>
						<span class="hp-icon hp-icon-large"><?php echo $icon( 'layout' ); ?></span><h3><?php echo esc_html( $plan['title'] ); ?></h3><strong><?php echo esc_html( $plan['price'] ); ?></strong><p><?php echo esc_html( $plan['text'] ); ?></p><ul><?php foreach ( $plan['features'] as $feature ) : ?><li><?php echo $icon( 'check' ); ?><?php echo esc_html( $feature ); ?></li><?php endforeach; ?></ul><a class="hp-btn <?php echo ! empty( $plan['badge'] ) ? 'hp-btn-primary' : 'hp-btn-secondary'; ?>" href="#tu-van">Nhận tư vấn gói này</a>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="quy-trinh" class="hp-section hp-process" aria-labelledby="process-title">
		<div class="hp-container">
			<header class="hp-section-heading reveal-up"><p class="hp-eyebrow">Từ nhu cầu đến bàn giao</p><h2 id="process-title">Quy trình thiết kế website 8 bước</h2><p>Mỗi giai đoạn có đầu việc và kết quả cụ thể để hai bên dễ theo dõi.</p></header>
			<div class="hp-timeline" data-timeline>
				<?php foreach ( $process as $index => $step ) : ?>
					<article class="hp-process-step reveal-up" style="--step-index: <?php echo esc_attr( $index ); ?>"><div class="hp-step-marker"><span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span><?php echo $icon( 'check' ); ?></div><div><h3><?php echo esc_html( $step['title'] ); ?></h3><p><?php echo esc_html( $step['text'] ); ?></p></div></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="hp-stats" aria-labelledby="stats-title">
		<div class="hp-container"><header><p class="hp-eyebrow">Cam kết có thể kiểm chứng</p><h2 id="stats-title">Các nguyên tắc áp dụng cho mọi gói</h2></header><div class="hp-stats-grid"><article><strong><span data-counter="100">0</span>%</strong><p>Bàn giao rõ phạm vi</p></article><article><strong>Responsive</strong><p>Đa thiết bị</p></article><article><strong>Online</strong><p>Hỗ trợ toàn quốc</p></article></div></div>
	</section>

	<section id="du-an" class="hp-section hp-projects" aria-labelledby="projects-title">
		<div class="hp-container hp-projects-grid">
			<header class="hp-section-heading reveal-left"><p class="hp-eyebrow">Không dùng lời chứng thực giả</p><h2 id="projects-title">Một số giao diện và dự án mẫu</h2><p>Hiện website chưa có đủ logo và case study khách hàng được xác minh để công bố. Bộ mẫu dưới đây thể hiện cách một website doanh nghiệp có thể triển khai thành nhiều trang đồng nhất.</p><a class="hp-btn hp-btn-primary" href="<?php echo esc_url( home_url( '/mau-giao-dien/mau-website-doanh-nghiep/' ) ); ?>">Xem demo doanh nghiệp</a></header>
			<div class="hp-project-slider reveal-right" data-project-slider><div class="hp-project-track" tabindex="0"><figure><img src="<?php echo esc_url( $asset( 'templates/business/mau-website-doanh-nghiep-trang-chu.webp' ) ); ?>" alt="Giao diện mẫu trang chủ doanh nghiệp" width="920" height="1709" loading="lazy" decoding="async"><figcaption>Trang chủ doanh nghiệp</figcaption></figure><figure><img src="<?php echo esc_url( $asset( 'templates/business/mau-website-doanh-nghiep-dich-vu.webp' ) ); ?>" alt="Giao diện mẫu trang dịch vụ doanh nghiệp" width="938" height="1676" loading="lazy" decoding="async"><figcaption>Trang dịch vụ doanh nghiệp</figcaption></figure></div><div class="hp-project-actions"><button type="button" data-project-prev aria-label="Dự án trước">←</button><button type="button" data-project-next aria-label="Dự án tiếp theo">→</button></div></div>
		</div>
	</section>

	<section id="tu-van" class="hp-section hp-contact" aria-labelledby="contact-title">
		<div class="hp-container hp-contact-grid">
			<div class="hp-contact-copy reveal-left" style="--contact-image: url('<?php echo esc_url( $asset( 'homepage-contact-consulting.webp' ) ); ?>')"><div><p class="hp-eyebrow">Trao đổi nhu cầu thực tế</p><h2 id="contact-title">Nhận tư vấn hướng triển khai website</h2><p>Hãy cho chúng tôi biết loại website, ngân sách dự kiến và điều bạn muốn khách hàng thực hiện trên trang.</p><ul><li><?php echo $icon( 'mail' ); ?><a href="mailto:<?php echo esc_attr( dvtkwgr_contact_email() ); ?>"><?php echo esc_html( dvtkwgr_contact_email() ); ?></a></li><li><?php echo $icon( 'check' ); ?>Báo giá theo phạm vi</li><li><?php echo $icon( 'check' ); ?>Có demo trước khi hoàn thiện</li><li><?php echo $icon( 'check' ); ?>Hướng dẫn quản trị WordPress</li></ul></div></div>
			<div class="hp-form-wrap reveal-right">
				<?php $form_status = isset( $_GET['home_contact'] ) ? sanitize_key( wp_unslash( $_GET['home_contact'] ) ) : ''; ?>
				<?php if ( 'success' === $form_status ) : ?><div class="hp-form-alert is-success" role="status">Đã ghi nhận yêu cầu. Chúng tôi sẽ phản hồi qua thông tin bạn cung cấp.</div><?php elseif ( 'invalid' === $form_status ) : ?><div class="hp-form-alert is-error" role="alert">Vui lòng kiểm tra các trường bắt buộc và thử lại.</div><?php elseif ( 'error' === $form_status ) : ?><div class="hp-form-alert is-error" role="alert">Chưa gửi được email. Vui lòng liên hệ trực tiếp qua địa chỉ email bên cạnh.</div><?php endif; ?>
				<form class="hp-contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" data-home-form novalidate>
					<input type="hidden" name="action" value="dvtkwgr_home_contact"><?php wp_nonce_field( 'dvtkwgr_home_contact', 'dvtkwgr_home_nonce' ); ?><label class="hp-honeypot" aria-hidden="true">Website công ty<input type="text" name="company_website" tabindex="-1" autocomplete="off"></label>
					<label>Họ và tên <span aria-hidden="true">*</span><input type="text" name="name" autocomplete="name" required><small class="hp-field-error"></small></label>
					<label>Số điện thoại <span aria-hidden="true">*</span><input type="tel" name="phone" autocomplete="tel" inputmode="tel" required><small class="hp-field-error"></small></label>
					<label>Email<input type="email" name="email" autocomplete="email"><small class="hp-field-error"></small></label>
					<label>Loại website<select name="website_type"><option value="">Chọn nhu cầu</option><option>Website doanh nghiệp</option><option>Website bán hàng</option><option>Landing page</option><option>Chăm sóc / nâng cấp WordPress</option><option>Website theo yêu cầu</option></select></label>
					<label>Ngân sách dự kiến<select name="budget"><option value="">Chọn khoảng ngân sách</option><option>Dưới 2 triệu</option><option>2–5 triệu</option><option>5–10 triệu</option><option>Trên 10 triệu</option></select></label>
					<label class="hp-field-full">Nội dung yêu cầu <span aria-hidden="true">*</span><textarea name="message" rows="5" required></textarea><small class="hp-field-error"></small></label>
					<label class="hp-consent hp-field-full"><input type="checkbox" name="consent" value="1" required><span>Tôi đồng ý để website sử dụng thông tin này nhằm phản hồi yêu cầu tư vấn. <span aria-hidden="true">*</span></span></label>
					<button class="hp-btn hp-btn-primary hp-field-full" type="submit"><span>Gửi yêu cầu tư vấn</span><i aria-hidden="true"></i></button><div class="hp-form-live hp-field-full" aria-live="polite"></div>
				</form>
			</div>
		</div>
	</section>

	<section id="faq" class="hp-section hp-faq" aria-labelledby="faq-title">
		<div class="hp-container hp-faq-grid">
			<header class="hp-section-heading reveal-left"><p class="hp-eyebrow">Câu hỏi thường gặp</p><h2 id="faq-title">Thông tin cần biết trước khi làm website</h2><p>Nếu câu hỏi của bạn chưa có trong danh sách, hãy gửi nội dung qua form tư vấn để được trao đổi theo trường hợp thực tế.</p></header>
			<div class="hp-faq-list">
				<?php foreach ( $faqs as $index => $faq ) : $faq_id = 'faq-answer-' . ( $index + 1 ); ?>
					<article class="hp-faq-item reveal-up"><h3><button class="hp-faq-question" type="button" aria-expanded="<?php echo 0 === $index ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $faq_id ); ?>"><span><?php echo esc_html( $faq['q'] ); ?></span><i aria-hidden="true"></i></button></h3><div id="<?php echo esc_attr( $faq_id ); ?>" class="hp-faq-answer" <?php echo 0 === $index ? '' : 'hidden'; ?>><p><?php echo esc_html( $faq['a'] ); ?></p></div></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<button class="hp-back-to-top" type="button" aria-label="Lên đầu trang" data-back-to-top>↑</button>
</div>

<?php get_footer(); ?>
