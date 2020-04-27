<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Postmandu
 */

?>

</div><!-- #content -->


<footer id="footer">
<?php if ( is_active_sidebar( 'postmandu_newsletter' ) ) : ?>
	<div class="newsletter-widgets">
		<div class="container">
			<?php dynamic_sidebar( 'postmandu_newsletter' ); ?>
		</div>
	</div>
	<?php endif; ?> <!-- End of div newsletter -->
	<div class="overlay"></div>
	<div class="widget-content-wrap">
		<div class="container">
			<?php
			$active = array();
			for ( $i = 1; $i <= 4; $i++ ) {
				if ( is_active_sidebar( 'footer-' . $i ) ) {
					$active[] = $i;
				}
			}
			?>
			<?php if ( 0 !== count( $active ) ) { ?>
			<div id="footer-widgets" class="row content">
				<?php foreach ( $active as $footer_widget_id ) : ?>
				<div class="col-lg-3 col-sm-6 column">
					<?php dynamic_sidebar( 'footer-' . $footer_widget_id ); ?>
				</div>
				<?php endforeach; ?>
			</div><!-- #footer-widgets -->
			<?php } ?>

			<div class="footer_content_wrap content">
				<?php if ( get_theme_mod( 'footer_title' ) ) : ?>
				<h2 class="postmandu-heading"><?php echo esc_html( get_theme_mod( 'footer_title' ) ); ?></h2>
				<?php else : ?>
				<h2 class="postmandu-heading"><?php bloginfo( 'name' ); ?></h2>
				<?php endif; ?>
				<?php
				if ( has_nav_menu( 'footer' ) ) :
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu_id'        => 'footer-menu',
							'menu_class'     => 'footer-nav',
						)
					);
		endif;
				?>
			</div>
		</div><!-- .container -->
	</div><!-- ."widget-content-wrap -->

	<div class="footer-copyright">
		<div class="container">
			<?php if ( get_theme_mod( 'footer_copyright' ) ) : ?>
			<div class="site-info">
				<?php echo wp_kses_post( get_theme_mod( 'footer_copyright' ) ); ?>
			</div><!-- .site-info -->
			<?php endif; ?>

			<?php
			if ( has_nav_menu( 'social' ) ) :
				wp_nav_menu(
					array(
						'theme_location' => 'social',
						'menu_id'        => 'social-menu',
						'menu_class'     => 'footer-social-nav',
					)
				);
			endif;
			?>
		</div>
	</div><!-- .footer-copyright -->
	<button class="up-btn btn-postmandu" id="up-btn" title="<?php echo esc_html( __( 'Go to top', 'postmandu' ) ); ?>"
		style="display: block;">&uarr;</button>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
