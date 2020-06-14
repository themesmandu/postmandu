<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Postmandu
 */

if ( ! is_active_sidebar( 'sidebar-1' ) || postmandu_get_theme_option( 'sidebar_position' ) === 'none' ) {
	return;
}

if ( postmandu_get_theme_option( 'sidebar_position' ) === 'right' ) {
	$postmandu_sidebar_order = 'order-last';
} elseif ( postmandu_get_theme_option( 'sidebar_position' ) === 'left' ) {
	$postmandu_sidebar_order = 'order-first';
} else {
	$postmandu_sidebar_order = 'order-last';
}
?>

<aside id="sidebar" class="widget-area col-lg-4 <?php echo esc_attr( $postmandu_sidebar_order ); ?>">
	<div class="sidebar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside>
