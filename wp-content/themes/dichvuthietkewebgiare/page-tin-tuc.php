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
				<article class="content-block">
					<h2><?php esc_html_e( 'Chưa có bài viết', 'dvtkwgr' ); ?></h2>
					<p><?php esc_html_e( 'Nội dung tin tức sẽ được cập nhật trong thời gian tới.', 'dvtkwgr' ); ?></p>
				</article>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<?php
get_footer();
