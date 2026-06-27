<?php
/**
 * Archive template.
 *
 * @package dvtkwgr
 */

get_header();
dvtkwgr_breadcrumb();
?>
<section class="page-hero section">
	<div class="container narrow reveal">
		<p class="eyebrow"><?php esc_html_e( 'Lưu trữ', 'dvtkwgr' ); ?></p>
		<h1><?php the_archive_title(); ?></h1>
		<?php if ( get_the_archive_description() ) : ?>
			<div class="archive-description"><?php the_archive_description(); ?></div>
		<?php else : ?>
			<p><?php esc_html_e( 'Tổng hợp bài viết theo chuyên mục, thời gian hoặc thẻ nội dung.', 'dvtkwgr' ); ?></p>
		<?php endif; ?>
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
					<h2><?php esc_html_e( 'Không có bài viết phù hợp', 'dvtkwgr' ); ?></h2>
				</article>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<?php
get_footer();
