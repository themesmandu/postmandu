<?php
/**
 * Template part for displaying page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Simple Podcast
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	the_post_thumbnail();
	?>

	<div class="content">

		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simple-podcast' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>

		<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current page */
						__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'simple-podcast' ),
						get_the_title()
					),
					'<footer class="entry-footer"><span class="edit-link">',
					'</span></footer>'
				);
			?>
		</footer>
		<?php endif; ?>

	</div><!-- .content -->
</article><!-- #post-<?php the_ID(); ?> -->
