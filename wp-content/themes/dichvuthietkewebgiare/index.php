<?php
/**
 * Blog index.
 *
 * @package dvtkwgr
 */

get_header();
dvtkwgr_breadcrumb();
?>
<section class="page-hero section">
	<div class="container narrow reveal">
		<p class="eyebrow"><?php esc_html_e( 'Tin tức', 'dvtkwgr' ); ?></p>
		<h1><?php echo esc_html( is_home() && ! is_front_page() ? get_the_title( get_option( 'page_for_posts' ) ) : 'Tin tức thiết kế website' ); ?></h1>
		<p><?php esc_html_e( 'Kiến thức thiết kế website WordPress giá rẻ, tối ưu nội dung và vận hành website cho doanh nghiệp nhỏ.', 'dvtkwgr' ); ?></p>
	</div>
</section>
<section class="section">
	<div class="container blog-layout">
		<div class="post-list">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/blog-card' ); ?>
				<?php endwhile; ?>
				<div class="pagination"><?php the_posts_pagination(); ?></div>
			<?php else : ?>
				<article class="content-block">
					<h2><?php esc_html_e( 'Chưa có bài viết', 'dvtkwgr' ); ?></h2>
					<p><?php esc_html_e( 'Nội dung tin tức sẽ được cập nhật trong thời gian tới.', 'dvtkwgr' ); ?></p>
				</article>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<?php
get_footer();
