<?php
/**
 * Template part for displaying posts preview on the Posts page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Postmandu
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'list-view' ); ?>>
	<div class="row">
	<?php
		$postmandu_list_sortables = postmandu_get_theme_option( 'blog_sortable_content_list' );
	foreach ( $postmandu_list_sortables as $postmandu_list_sortable ) {
			get_template_part( 'template-parts/post/sortable/list/' . $postmandu_list_sortable );
	}
	?>


	</div>
</article><!-- #post-<?php the_ID(); ?> -->
