<?php
/**
 * Template part for displaying content Posts page
 *
 * @package Postmandu
 */

?>
<div class="col-md-8">
    <div class="column">

        <?php
	$postmandu_list2_sortables = postmandu_get_theme_option( 'blog_sortable_content_list2' );
foreach ( $postmandu_list2_sortables as $postmandu_list2_sortable ) {
	get_template_part( 'template-parts/post/sortable/list/' . $postmandu_list2_sortable );
}
?>
    </div>
</div>