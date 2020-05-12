<?php
/**
 *
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Postmandu
 */

get_header();

?>

<?php if ( postmandu_is_active_ssp() ) : ?>
	<?php
	// WP_Query arguments
	$args = array(
		'post_type'           => array( 'podcast' ),
		'post_status'         => array( 'publish' ),
		'posts_per_page'      => '4',
		'ignore_sticky_posts' => true,
		'order'               => 'DESC',
		'orderby'             => 'date',
	);

	// The Query
	$postmandu_podcasts = new WP_Query( $args );
	if ( $postmandu_podcasts->have_posts() ) :
		?>
<section class="latest-episode">
	<div class="container">
		<?php if ( get_theme_mod( 'episode_section_title' ) ) : ?>
		<h2 class="section-heading"><?php echo esc_html( get_theme_mod( 'episode_section_title' ) ); ?></h2>
		<?php endif; ?>
		<div class="action to-right-align">
			<span class="active"><i class="fas fa-th-large view-grid"></i></span>
			<span><i class="fas fa-th-list view-list"></i></span>
		</div>

		<div class="episode-grid show-grid">
			<div class="grid-wrap row">
				<?php
				while ( $postmandu_podcasts->have_posts() ) :
					$postmandu_podcasts->the_post();
					?>
				<div class="column-grid col-sm-6">
					<?php if ( has_post_thumbnail() ) : ?>
					<figure>
						<?php the_post_thumbnail(); ?>
					</figure>
					<?php endif; ?>

					<div class="grid-content">
						<?php the_title( sprintf( '<h4 class="episode-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
						<div class="episode-meta">
							<?php postmandu_posted_on(); ?>
							<?php postmandu_posted_by(); ?>

							<span class="episode-category">
							<?php
							$postmandu_terms = get_the_term_list( $post->ID, 'series', '', ', ' );
							echo wp_kses_post( $postmandu_terms );
							?>
							</span>

							<span class="duration">
							<?php
							$postmandu_duration = get_post_meta( get_the_id(), 'duration', true );
							echo esc_html( $postmandu_duration );
							?>
							</span>
						</div>

						<div class="episode-summary">
							<?php postmandu_entry_summary(); ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>


			</div>
			<a href="#" class="more-link-btn btn-postmandu">More Episode</a>
		</div>

		<div class="episode-list">
			<?php
			while ( $postmandu_podcasts->have_posts() ) :
				$postmandu_podcasts->the_post();
				?>
			<div class="list-wrap">
				<?php if ( has_post_thumbnail() ) : ?>
				<figure class="column m-0">
					<?php the_post_thumbnail(); ?>
				</figure>
				<?php endif; ?>

				<div class="column list-content">
					<?php the_title( sprintf( '<h4 class="episode-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
					<div class="episode-meta">
						<?php postmandu_posted_on(); ?>
						<?php postmandu_posted_by(); ?>

						<span class="episode-category">
							<a href="#">Media</a>
						</span>

						<span class="duration">
							<?php
							$postmandu_duration = get_post_meta( get_the_id(), 'duration', true );
							echo esc_html( $postmandu_duration );
							?>
							</span>
					</div>

					<div class="episode-summary">
						<?php postmandu_entry_summary(); ?>
					</div>
				</div>
			</div>
			<?php endwhile; ?>


			<a href="" class="more-link-btn btn-postmandu">More Episode</a>
		</div>
	</div>
</section>
<?php endif; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>

<section class="featured-guest">
	<div class="container">
		<h2 class="section-heading">Featured Guest</h2>
		<div class="row featured-guest-row">
			<div class="col-lg-3 col-md-6">
				<div class="column">
					<figure>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/music-avatar.jpg" />
					</figure>
					<h5 class="guest-name">Emma Thomas</h5>
					<span class="guest-post">DIRECTOR</span>
					<p class="guest-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
						tempor
						incididunt ut</p>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-6">
				<div class="column">
					<figure>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/music-avatar.jpg" />
					</figure>
					<h5 class="guest-name">Emma Thomas</h5>
					<span class="guest-post">DIRECTOR</span>
					<p class="guest-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
						tempor
						incididunt ut</p>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-6">
				<div class="column">
					<figure>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/music-avatar.jpg" />
					</figure>
					<h5 class="guest-name">Emma Thomas</h5>
					<span class="guest-post">DIRECTOR</span>
					<p class="guest-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
						tempor
						incididunt ut</p>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-6">
				<div class="column">
					<figure>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/music-avatar.jpg" />
					</figure>
					<h5 class="guest-name">Emma Thomas</h5>
					<span class="guest-post">DIRECTOR</span>
					<p class="guest-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
						tempor
						incididunt ut</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="newsletter">
	<div class="container">
		<div class="newsletter-wrap">
		</div>
	</div>
</section>

<?php

get_footer();
