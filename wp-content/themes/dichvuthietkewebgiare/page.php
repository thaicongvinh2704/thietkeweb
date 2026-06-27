<?php
/**
 * Generic page template.
 *
 * @package dvtkwgr
 */

get_header();
dvtkwgr_breadcrumb();
?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php echo esc_attr( get_the_ID() ); ?>" <?php post_class(); ?>>
			<header class="page-hero section">
				<div class="container narrow reveal">
					<h1><?php echo esc_html( get_the_title() ); ?></h1>
				</div>
			</header>
			<div class="container narrow entry-content reveal">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
<?php endif; ?>
<?php
get_footer();
