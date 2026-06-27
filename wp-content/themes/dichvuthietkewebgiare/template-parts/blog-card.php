<?php
/**
 * Blog card.
 *
 * @package dvtkwgr
 */
?>
<article id="post-<?php echo esc_attr( get_the_ID() ); ?>" <?php post_class( 'post-card reveal' ); ?>>
	<a class="post-card-thumb" href="<?php echo esc_url( get_permalink() ); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'medium_large', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
		<?php else : ?>
			<span class="placeholder-thumb" aria-hidden="true"></span>
		<?php endif; ?>
	</a>
	<div class="post-card-body">
		<div class="post-meta">
			<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			<span><?php echo esc_html( get_the_category_list( ', ' ) ? wp_strip_all_tags( get_the_category_list( ', ' ) ) : 'Tin tức' ); ?></span>
		</div>
		<h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h2>
		<p><?php echo esc_html( get_the_excerpt() ); ?></p>
		<a class="text-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Đọc thêm', 'dvtkwgr' ); ?></a>
	</div>
</article>
