<?php

/**
 * Template part for alternative displaying main navigation top-bar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Simple Podcast
 */

?>
	<nav class="navbar navbar-expand-lg main-navigation nav-search" role="navigation">
		<div class="container">
			<div class="site-branding">
				<?php if ( ! has_custom_logo() ) { ?>

					<?php if ( is_front_page() && is_home() ) : ?>

				<span class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
						title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
						itemprop="url"><?php bloginfo( 'name' ); ?></a></span>

				<?php else : ?>

				<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
					title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
					itemprop="url"><?php bloginfo( 'name' ); ?></a>

				<?php endif; ?>
				<span><?php echo esc_html( get_bloginfo( 'description', 'display' ) ); /* WPCS: xss ok. */ ?></span>

					<?php
				} else {
					the_custom_logo();
				}
				?>
			</div>

			<button id="menu" class="navbar-toggler collapsed" type="button" data-toggle="collapse"
				data-target="#navbarmenus">
				<span class="screen-reader-text">Menu</span>
				<span></span>
				<span></span>
				<span></span>
			</button>

			<?php
			if ( has_nav_menu( 'primary' ) ) :
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container'       => 'div',
						'container_id'    => 'navbarmenus',
						'container_class' => 'collapse navbar-collapse justify-content-end',
						'menu_id'         => false,
						'depth'           => 8,
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => 'simple_podcast_WP_Bootstrap_Navwalker::fallback',
					)
				);
			endif;
			?>

			<?php
			get_template_part( 'template-parts/navigation/add-item', 'search-form' );
			?>
		</div><!-- .container -->
	</nav><!-- .site-navigation -->
