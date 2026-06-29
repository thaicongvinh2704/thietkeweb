<?php
/**
 * Template Name: Tin tức
 *
 * @package dvtkwgr
 */

get_header();
dvtkwgr_breadcrumb();

$paged      = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
$blog_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'paged'               => $paged,
		'ignore_sticky_posts' => false,
	)
);

$fallback_posts = array(
	array( 'image' => 'cheap-website-professional-blog-thumbnail.webp', 'category' => 'Tư vấn website', 'title' => 'Website giá rẻ có chuyên nghiệp không?', 'excerpt' => 'Những tiêu chí giúp một website chi phí hợp lý vẫn tạo cảm giác đáng tin và bán hàng tốt.', 'alt' => 'Website giá rẻ có chuyên nghiệp không' ),
	array( 'image' => 'wordpress-website-preparation-blog-thumbnail.webp', 'category' => 'Chuẩn bị nội dung', 'title' => 'Làm website WordPress cần chuẩn bị gì?', 'excerpt' => 'Logo, hình ảnh, danh sách dịch vụ, thông tin liên hệ và website tham khảo nên có trước khi bắt đầu.', 'alt' => 'Những thứ cần chuẩn bị trước khi làm website WordPress' ),
	array( 'image' => 'website-design-cost-breakdown-blog-thumbnail.webp', 'category' => 'Chi phí', 'title' => 'Chi phí thiết kế website gồm những gì?', 'excerpt' => 'Hiểu rõ các khoản thường gặp để tránh phát sinh và chọn phạm vi phù hợp ngân sách.', 'alt' => 'Chi phí thiết kế website gồm những khoản nào' ),
	array( 'image' => 'landing-page-for-small-business-blog-thumbnail.webp', 'category' => 'Landing page', 'title' => 'Landing page là gì và khi nào doanh nghiệp nhỏ nên dùng?', 'excerpt' => 'Landing page phù hợp khi cần giới thiệu một dịch vụ, chạy quảng cáo hoặc kiểm thử nhu cầu thị trường.', 'alt' => 'Landing page cho doanh nghiệp nhỏ' ),
	array( 'image' => 'website-design-process-blog-thumbnail.webp', 'category' => 'Quy trình', 'title' => 'Quy trình thiết kế website chuyên nghiệp gồm những bước nào?', 'excerpt' => 'Một quy trình rõ giúp khách hàng biết khi nào xem demo, thanh toán và nhận bàn giao quản trị.', 'alt' => 'Quy trình thiết kế website chuyên nghiệp' ),
);
?>
<section class="page-hero section">
	<div class="container narrow reveal">
		<p class="eyebrow"><?php esc_html_e( 'Tin tức', 'dvtkwgr' ); ?></p>
		<h1><?php esc_html_e( 'Tin tức thiết kế website', 'dvtkwgr' ); ?></h1>
		<p><?php esc_html_e( 'Kiến thức thiết kế website WordPress giá rẻ, tối ưu nội dung và vận hành website cho doanh nghiệp nhỏ.', 'dvtkwgr' ); ?></p>
	</div>
</section>
<section class="section">
	<div class="container blog-layout">
		<div class="post-list">
			<?php if ( $blog_query->have_posts() ) : ?>
				<?php while ( $blog_query->have_posts() ) : ?>
					<?php $blog_query->the_post(); ?>
					<?php get_template_part( 'template-parts/blog-card' ); ?>
				<?php endwhile; ?>
				<div class="pagination">
					<?php
					echo wp_kses_post(
						paginate_links(
							array(
								'current' => $paged,
								'total'   => $blog_query->max_num_pages,
							)
						)
					);
					?>
				</div>
			<?php else : ?>
				<div class="blog-card-grid fallback-blog-grid">
					<?php foreach ( $fallback_posts as $post ) : ?>
						<article class="static-blog-card reveal">
							<img src="<?php echo esc_url( dvtkwgr_asset( 'images/' . $post['image'] ) ); ?>" alt="<?php echo esc_attr( $post['alt'] ); ?>" width="720" height="450" loading="lazy" decoding="async">
							<div>
								<span><?php echo esc_html( $post['category'] ); ?></span>
								<h2><?php echo esc_html( $post['title'] ); ?></h2>
								<p><?php echo esc_html( $post['excerpt'] ); ?></p>
								<a class="text-link" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Đọc thêm', 'dvtkwgr' ); ?></a>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<?php
get_footer();
