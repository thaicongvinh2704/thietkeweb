<?php
/**
 * Static template detail for the business website demo.
 *
 * @package dvtkwgr
 */

get_header();

$contact_url = add_query_arg( 'mau', 'mau-website-doanh-nghiep', home_url( '/lien-he/' ) );
$gallery     = array(
	array(
		'title' => 'Tổng quan mẫu website',
		'image' => 'mau-website-doanh-nghiep-thumbnail.webp',
		'alt'   => 'Mẫu website doanh nghiệp chuyên nghiệp cho công ty nhỏ',
		'large' => true,
	),
	array(
		'title' => 'Giao diện trang chủ',
		'image' => 'mau-website-doanh-nghiep-trang-chu.webp',
		'alt'   => 'Giao diện trang chủ mẫu website doanh nghiệp',
	),
	array(
		'title' => 'Giao diện trang giới thiệu',
		'image' => 'mau-website-doanh-nghiep-gioi-thieu.webp',
		'alt'   => 'Giao diện trang giới thiệu mẫu website doanh nghiệp',
	),
	array(
		'title' => 'Giao diện trang dịch vụ',
		'image' => 'mau-website-doanh-nghiep-dich-vu.webp',
		'alt'   => 'Giao diện trang dịch vụ mẫu website doanh nghiệp',
	),
	array(
		'title' => 'Giao diện trang liên hệ',
		'image' => 'mau-website-doanh-nghiep-lien-he.webp',
		'alt'   => 'Giao diện trang liên hệ mẫu website doanh nghiệp',
	),
);
?>

<section class="template-hero section">
	<div class="container template-hero-grid">
		<div class="template-hero-copy reveal">
			<p class="eyebrow"><?php esc_html_e( 'Mẫu giao diện doanh nghiệp', 'dvtkwgr' ); ?></p>
			<h1><?php esc_html_e( 'Mẫu website doanh nghiệp', 'dvtkwgr' ); ?></h1>
			<p><?php esc_html_e( 'Mẫu website hiện đại dành cho công ty dịch vụ, doanh nghiệp nhỏ và đơn vị địa phương cần giới thiệu năng lực, dịch vụ và nhận yêu cầu tư vấn từ khách hàng.', 'dvtkwgr' ); ?></p>
			<div class="hero-actions">
				<a class="btn btn-primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Chọn mẫu này', 'dvtkwgr' ); ?></a>
				<a class="btn btn-secondary" href="#cac-trang-mau"><?php esc_html_e( 'Xem các trang mẫu', 'dvtkwgr' ); ?></a>
			</div>
			<div class="template-quick-links">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Về trang chủ', 'dvtkwgr' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/#mau-giao-dien' ) ); ?>"><?php esc_html_e( 'Xem thêm mẫu giao diện', 'dvtkwgr' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Liên hệ tư vấn', 'dvtkwgr' ); ?></a>
			</div>
		</div>
		<figure class="template-hero-preview reveal">
			<img src="<?php echo esc_url( dvtkwgr_asset( 'images/templates/business/mau-website-doanh-nghiep-thumbnail.webp' ) ); ?>" alt="<?php esc_attr_e( 'Mẫu website doanh nghiệp chuyên nghiệp cho công ty nhỏ', 'dvtkwgr' ); ?>" width="1200" height="900" fetchpriority="high" decoding="async">
		</figure>
	</div>
</section>

<section id="cac-trang-mau" class="section section-muted">
	<div class="container template-gallery">
		<div class="section-heading reveal">
			<p class="eyebrow"><?php esc_html_e( 'Preview giao diện', 'dvtkwgr' ); ?></p>
			<h2><?php esc_html_e( 'Các trang trong mẫu website doanh nghiệp', 'dvtkwgr' ); ?></h2>
		</div>
		<?php foreach ( $gallery as $item ) : ?>
			<figure class="template-shot reveal <?php echo ! empty( $item['large'] ) ? 'is-large' : ''; ?>">
				<figcaption><?php echo esc_html( $item['title'] ); ?></figcaption>
				<img src="<?php echo esc_url( dvtkwgr_asset( 'images/templates/business/' . $item['image'] ) ); ?>" alt="<?php echo esc_attr( $item['alt'] ); ?>" width="1200" height="900" loading="<?php echo ! empty( $item['large'] ) ? 'eager' : 'lazy'; ?>" decoding="async">
			</figure>
		<?php endforeach; ?>
	</div>
</section>

<section class="section">
	<div class="container template-info-grid">
		<div class="content-block reveal">
			<h2><?php esc_html_e( 'Mẫu này phù hợp với', 'dvtkwgr' ); ?></h2>
			<ul class="check-list">
				<?php foreach ( array( 'Công ty dịch vụ nhỏ', 'Doanh nghiệp địa phương', 'Công ty tư vấn', 'Đơn vị thi công, sửa chữa, kỹ thuật', 'Công ty mới cần website giới thiệu năng lực', 'Cá nhân kinh doanh muốn có website chuyên nghiệp' ) as $item ) : ?>
					<li><?php echo esc_html( $item ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="content-block reveal">
			<h2><?php esc_html_e( 'Bao gồm các trang', 'dvtkwgr' ); ?></h2>
			<ul class="check-list">
				<?php foreach ( array( 'Trang chủ', 'Giới thiệu', 'Dịch vụ', 'Tin tức', 'Liên hệ' ) as $item ) : ?>
					<li><?php echo esc_html( $item ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="content-block reveal">
			<h2><?php esc_html_e( 'Có thể tùy chỉnh', 'dvtkwgr' ); ?></h2>
			<ul class="check-list">
				<?php foreach ( array( 'Màu sắc theo thương hiệu', 'Logo và hình ảnh doanh nghiệp', 'Nội dung dịch vụ', 'Form liên hệ', 'Nút gọi điện, Zalo, WhatsApp', 'Bố cục section cơ bản' ) as $item ) : ?>
					<li><?php echo esc_html( $item ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>

<section class="final-cta section">
	<div class="container final-cta-inner reveal">
		<h2><?php esc_html_e( 'Bạn muốn dùng mẫu website doanh nghiệp này?', 'dvtkwgr' ); ?></h2>
		<p><?php esc_html_e( 'Gửi thông tin ngành nghề của bạn, chúng tôi sẽ tư vấn cách tùy chỉnh mẫu này phù hợp với thương hiệu và ngân sách.', 'dvtkwgr' ); ?></p>
		<a class="btn btn-primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Chọn mẫu này', 'dvtkwgr' ); ?></a>
	</div>
</section>

<?php
get_footer();
