<?php
/**
 * The template for displaying a single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Postmandu
 */

get_header();
?>

<div class="container">
	<div class="row">

		<div id="primary" class="content-area<?php postmandu_content_class(); ?>">
			<main id="main" class="site-main">

				<?php
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-single-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/post/single', get_post_format() );
					?>
					<?php if ( ! is_attachment() ) { ?>
				<nav class="navigation card-footer">
					<div class="nav_direction">
						<?php
						$prevpost = get_previous_post();
						if ( $prevpost ) {
							?>
						<div class="previous_post column">
							<?php $prevthumbnail = get_the_post_thumbnail_url( $prevpost->ID, 'prev-next-link-image' ); ?>
							<figure>
								<a href="<?php echo esc_url( get_permalink( $prevpost->ID ) ); ?>"><img
										src="<?php echo esc_url( $prevthumbnail ); ?>" alt=""></a>
							</figure>
							<div class="prev_title">
								<span>Prev Post</span>
								<?php previous_post_link( '%link', "<div class='detials'><h4>%title</h4></div>" ); ?>
							</div>
						</div>

							<?php
						}
							$nextpost = get_next_post();
						if ( $nextpost ) {
							?>
						<div class="next_post column">
							<?php $nextthumbnail = get_the_post_thumbnail_url( $nextpost->ID, 'prev-next-link-image' ); ?>
							<figure>
								<a href="<?php echo esc_url( get_permalink( $nextpost->ID ) ); ?>"><img
										src="<?php echo esc_url( $nextthumbnail ); ?>" alt=""></a>
							</figure>

							<div class="next_title">
								<span>Next Post</span>
								<?php next_post_link( '%link', "<div class='detials'><h4>%title</h4></div>" ); ?>
							</div>
						</div>
						<?php } ?>
					</div>
				</nav>
				<?php } ?>
						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
					endif;

		endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php
		/* Get Sidebar #secondary */
		get_sidebar();
		?>

	</div><!-- /.row -->
</div><!-- /.container -->

<?php
get_footer();
