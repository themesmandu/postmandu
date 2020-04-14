<?php
/**
 * Template part for displaying posts preview on the Posts page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Postmandu
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrap">
		<?php
		$postmandu_standard_sortables = postmandu_get_theme_option( 'blog_sortable_content_sandard' );
		foreach ( $postmandu_standard_sortables as $postmandu_standard_sortable ) {
			get_template_part( 'template-parts/post/sortable/standard/' . $postmandu_standard_sortable );
		}
		?>
	</div>

	<?php if ( get_post_type() === 'post' ) { ?>

	<footer class="entry-footer card-footer">
		<?php postmandu_entry_footer(); ?>
	</footer>


		<?php
	}
	?>

</article><!-- #post-<?php the_ID(); ?> -->
