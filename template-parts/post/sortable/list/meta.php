<?php
/**
 * Template part for displaying content Posts page
 *
 * @package Postmandu
 */


if ( get_post_type() === 'post' ) {
	?>
	<div class="entry-meta">
	<?php postmandu_posted_on(); ?>
		<?php postmandu_posted_by(); ?>
	</div>
		<?php
}
?>
