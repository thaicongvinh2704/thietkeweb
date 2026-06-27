<?php
/**
 * Single post template.
 *
 * @package dvtkwgr
 */

get_header();
dvtkwgr_breadcrumb();
?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php echo esc_attr( get_the_ID() ); ?>" <?php post_class( 'single-post-wrap' ); ?>>
			<header class="single-header section">
				<div class="container narrow reveal">
					<div class="post-meta">
						<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						<span><?php echo esc_html( wp_strip_all_tags( get_the_category_list( ', ' ) ) ); ?></span>
					</div>
					<h1><?php echo esc_html( get_the_title() ); ?></h1>
					<?php if ( has_excerpt() ) : ?>
						<p><?php echo esc_html( get_the_excerpt() ); ?></p>
					<?php endif; ?>
				</div>
			</header>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="container narrow single-featured reveal">
					<?php the_post_thumbnail( 'large', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
				</div>
			<?php endif; ?>
			<div class="section single-body-section">
				<div class="container blog-layout">
					<div class="entry-content reveal">
						<?php the_content(); ?>
						<?php
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Trang:', 'dvtkwgr' ),
								'after'  => '</div>',
							)
						);
						?>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</article>
	<?php endwhile; ?>
<?php endif; ?>
<?php
get_footer();
