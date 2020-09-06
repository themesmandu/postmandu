<?php
/**
 * The template for displaying a single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Simple Podcast
 */

get_header();
?>

<div class="container">
	<div class="row">

		<div id="primary" class="content-area<?php simple_podcast_content_class(); ?>">
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
				<nav class="navigation card-footer" role="navigation" aria-label="<?php _e('Post', 'simple-podcast'); ?>">
					<div class="nav_direction">
						<?php
						$prevpost = get_previous_post();
						if ( $prevpost ) {
							?>
						<div class="previous_post column">
							<?php $prevthumbnail = get_the_post_thumbnail_url( $prevpost->ID, 'prev-next-link-image' ); ?>
							<?php if ($prevthumbnail) : ?>
							<figure>
								<a href="<?php echo esc_url( get_permalink( $prevpost->ID ) ); ?>"><img
										src="<?php echo esc_url( $prevthumbnail ); ?>" alt="<?php echo esc_url( $prevthumbnail ); ?>"></a>
							</figure>
							<?php endif; ?>
							<div class="prev_title">
								<span><?php echo esc_html__( 'Prev Post', 'simple-podcast' ); ?></span>
								<?php previous_post_link( '%link', "<div class='detials'><span>%title</span></div>" ); ?>
							</div>
						</div>

							<?php
						}
							$nextpost = get_next_post();
						if ( $nextpost ) {
							?>
						<div class="next_post column">
							<?php $nextthumbnail = get_the_post_thumbnail_url( $nextpost->ID, 'prev-next-link-image' ); ?>
							<?php if ($nextthumbnail) : ?>
							<figure>
								<a href="<?php echo esc_url( get_permalink( $nextpost->ID ) ); ?>"><img
										src="<?php echo esc_url( $nextthumbnail ); ?>" alt="<?php echo esc_url( $nextthumbnail ); ?>"></a>
							</figure>
							<?php endif; ?>

							<div class="next_title">
								<span><?php echo esc_html__( 'Next Post', 'simple-podcast' ); ?></span>
								<?php next_post_link( '%link', "<div class='detials'><span>%title</span></div>" ); ?>
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
