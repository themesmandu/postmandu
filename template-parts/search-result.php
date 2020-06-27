<?php
/**
 * Template part for displaying search result
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Simple Podcast
 */

the_title(
	sprintf(
		'<li><a href="%s" rel="bookmark">',
		esc_url( get_permalink() )
	),
	'</a></li>'
);

