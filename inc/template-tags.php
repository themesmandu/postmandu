<?php
/**
 * Postmandu Standalone Functions.
 *
 * Some of the functionality here could be replaced by core features.
 *
 * @package Postmandu
 */

if ( ! function_exists( 'postmandu_entry_summary' ) ) :
	/**
	 *
	 * Template part which displays post excerpts on the posts page.
	 */
	function postmandu_entry_summary() {

		global $post;
		$has_more = strpos( $post->post_content, '<!--more' );

		if ( $has_more ) {
			the_content();
		} else {
			the_excerpt();
		}

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'postmandu' ),
				'after'  => '</div>',
			)
		);
	}
endif;

if ( ! function_exists( 'postmandu_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function postmandu_posted_on() {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'postmandu' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}

endif;

if ( ! function_exists( 'postmandu_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function postmandu_posted_by() {
		$post   = get_post();
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( ' %s', 'post author', 'postmandu' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( $post->post_author ) ) . '">' . esc_html( get_the_author_meta( 'display_name', $post->post_author ) ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'postmandu_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function postmandu_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ' , ', 'postmandu' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'postmandu' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ' , ', 'list item separator', 'postmandu' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links"><i class="fas fa-tags"></i>' . esc_html__( ' %1$s', 'postmandu' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( 'Leave a Comment', '<i class="far fa-comment"></i> 1', '<i class="far fa-comments"></i> %', '', 'Comments are off for this post' );

			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'postmandu' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


if ( ! function_exists( 'postmandu_comment' ) ) :
	/**
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @param string $comment actual comment.
	 * @param string $args arguments.
	 * @param string $depth depth.
	 */
	function postmandu_comment( $comment, $args, $depth ) {
		// Get correct tag used for the comments.
		if ( 'div' === $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		} ?>

<<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
	id="comment-<?php comment_ID(); ?>">

		<?php
			// Switch between different comment types.
		switch ( $comment->comment_type ) :
			case 'pingback':
			case 'trackback':
				?>
	<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'postmandu' ); ?></span>
				<?php comment_author_link(); ?></div>
				<?php
				break;
			default:
				if ( 'div' != $args['style'] ) {
					?>
	<div id="div-comment-<?php comment_ID(); ?>" class="comment-meta">
		<?php } ?>
		<div class="comment-author vcard">
			<figure>
				<?php
						// Display avatar unless size is set to 0.
				if ( $args['avatar_size'] != 0 ) {
					$avatar_size = ! empty( $args['avatar_size'] ) ? $args['avatar_size'] : 70; // set default avatar size
					echo get_avatar( $comment, $avatar_size );
				}
				?>
			</figure>

			<div class="comment-metadata">
				<?php
						// Display author name.
						printf( __( '<span class="fn">%s</span> ', 'postmandu' ), get_comment_author_link() );
				?>
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" class="date">
					<?php
							/* translators: 1: date, 2: time */
							printf(
								__( '%1$s at %2$s', 'postmandu' ),
								get_comment_date(),
								get_comment_time()
							);
					?>
				</a>

				<div class="comment-details">
					<div class="comment-text"><?php comment_text(); ?></div><!-- .comment-text -->
					<?php
							// Display comment moderation text.
					if ( $comment->comment_approved === '0' ) {
						?>
					<em
						class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'postmandu' ); ?></em><br />
						<?php
					}
					?>

				</div><!-- .comment-details -->
				<?php
						edit_comment_link( __( '(Edit)', 'postmandu' ), '  ', '' );
				?>

				<div class="reply">
					<?php
						// Display comment reply link.
						comment_reply_link(
							array_merge(
								$args,
								array(
									'add_below' => $add_below,
									'depth'     => $depth,
									'max_depth' => $args['max_depth'],
								)
							)
						);
					?>
				</div>
			</div><!-- .comment-meta -->
		</div><!-- .comment-author -->
				<?php
				if ( 'div' !== $args['style'] ) {
					?>
	</div>
					<?php
				}
				// IMPORTANT: Note that we do NOT close the opening tag, WordPress does this for us.
				break;
		endswitch; // End comment_type check.
	}
endif;


/**
 * Display the class for layout div wrapper.
 *
 * @param array $classes One or more classes to add to the class list.
 */
function postmandu_layout_class( $classes = '' ) {
	// Separates classes with a single space.
	echo 'class="' . join( ' ', postmandu_set_layout_class( $classes ) ) . '"'; // WPCS: XSS OK.
}

/**
 * Adds custom class.
 *
 * @param array $class Classes for the div element.
 * @return array
 */
function postmandu_set_layout_class( $class = '' ) {

	// Define classes array.
	$classes = array();

	// Grid classes.
	if ( ( is_home() || is_archive() ) && ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = '';
	}

	$classes = array_map( 'esc_attr', $classes );

	// Apply filters to entry post class for child theming.
	$classes = apply_filters( 'postmandu_set_layout_class', $classes );

	// Classes array.
	return array_unique( $classes );
}

/**
 * Display the class for content wrapper div.
 *
 * @param array $classes One or more classes to add to the class list.
 */
function postmandu_content_class( $classes = '' ) {
	// Separates classes with a single space.
	echo ' ' . join( ' ', postmandu_set_content_class( $classes ) );// WPCS: XSS OK.
}

/**
 * Adds custom class.
 *
 * @param array $class Classes for the div element.
 * @return array
 */
function postmandu_set_content_class( $class = '' ) {

	// Define classes array.
	$classes = array();

	$classes[] = 'col-lg-8';

	// Centered.
<<<<<<< HEAD
	if ( ! is_active_sidebar( 'sidebar-1' ) || get_theme_mod( '' ) === 'none' ) {
=======
	if ( ! is_active_sidebar( 'sidebar-1' ) || postmandu_get_theme_option( 'sidebar_position' ) === 'none' ) {
>>>>>>> ac96980918610fc28a198358c942de2924adf9af
		$classes[] = 'col-lg-12 no-sidebar';
	}

	$classes = array_map( 'esc_attr', $classes );

	// Apply filters to entry post class for child theming.
	$classes = apply_filters( 'postmandu_set_content_class', $classes );

	// Classes array.
	return array_unique( $classes );
}

/**
 * Condition function.
 * This is a static front page and not the latest posts page.
 */
function postmandu_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}
