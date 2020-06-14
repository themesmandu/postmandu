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

							<?php
							$postmandu_terms = get_the_term_list( $post->ID, 'series', '', ', ' );
							if ( $postmandu_terms ) :
								?>
						<span class="episode-category">
								<?php echo wp_kses_post( $postmandu_terms ); ?>
							</span>
							<?php endif; ?>

							<?php
							$postmandu_duration = get_post_meta( get_the_id(), 'duration', true );
							if ( $postmandu_duration ) :
								?>
						<span class="duration">
								<?php
								echo esc_html( $postmandu_duration );
								?>
							</span>
							<?php endif; ?>
						</div>

						<div class="episode-summary">
							<?php postmandu_entry_summary(); ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>


			</div>
			<?php if ( get_theme_mod( 'episode_section_button_link' ) || get_theme_mod( 'episode_section_button_label' ) ) : ?>
			<a href="<?php echo esc_url( get_theme_mod( 'episode_section_button_link' ) ); ?>" class="more-link-btn btn-postmandu"><?php echo esc_html( get_theme_mod( 'episode_section_button_label' ) ); ?></a>
		<?php endif; ?>
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

						<?php
							$postmandu_terms = get_the_term_list( $post->ID, 'series', '', ', ' );
						if ( $postmandu_terms ) :
							?>
						<span class="episode-category">
							<?php echo wp_kses_post( $postmandu_terms ); ?>
							</span>
							<?php endif; ?>

							<?php
							$postmandu_duration = get_post_meta( get_the_id(), 'duration', true );
							if ( $postmandu_duration ) :
								?>
						<span class="duration">
								<?php
								echo esc_html( $postmandu_duration );
								?>
							</span>
							<?php endif; ?>
					</div>

					<div class="episode-summary">
						<?php postmandu_entry_summary(); ?>
					</div>
				</div>
			</div>
			<?php endwhile; ?>

		<?php if ( get_theme_mod( 'episode_section_button_link' ) || get_theme_mod( 'episode_section_button_label' ) ) : ?>
			<a href="<?php echo esc_url( get_theme_mod( 'episode_section_button_link' ) ); ?>" class="more-link-btn btn-postmandu"><?php echo esc_html( get_theme_mod( 'episode_section_button_label' ) ); ?></a>
		<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>

<section class="featured-guest">
<?php
	$postmandu_users = get_users(
		array(
			'orderby'      => 'user_registered',
			'order'        => 'DESC',
			'role__not_in' => array( 'administrator' ),

		)
	);
	?>
	<div class="container">
	<?php if ( get_theme_mod( 'users_section_title' ) ) : ?>
		<h2 class="section-heading"><?php echo esc_html( get_theme_mod( 'users_section_title' ) ); ?></h2>
		<?php endif; ?>
		<div class="row featured-guest-row">
		<?php foreach ( $postmandu_users as $postmandu_user ) : ?>
			<?php
			$postmandu_user_meta  = get_user_meta( $postmandu_user->ID );
			$postmandu_user_roles = $postmandu_user->roles;
			?>
			<div class="col-lg-3 col-md-6">
				<div class="column">
					<figure>
						<img src="<?php echo esc_url( get_avatar_url( $postmandu_user->ID ) ); ?>" />
					</figure>
					<h5 class="guest-name"><?php echo esc_html( $postmandu_user->display_name ); ?></h5>
					<?php foreach ( $postmandu_user_roles as $posmandu_user_role ) : ?>
					<span class="guest-post"><?php echo esc_html( $posmandu_user_role ); ?></span>
					<?php endforeach; ?>
					<p class="guest-content"><?php echo esc_html( $postmandu_user_meta['description'][0] ); ?></p>
				</div>
			</div>
			<?php endforeach; ?>
			</div>
	</div>
</section>

<?php

get_footer();
