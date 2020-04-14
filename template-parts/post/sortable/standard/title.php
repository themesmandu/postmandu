<?php
/**
 * Template part for displaying title Posts page
 *
 * @package Postmandu
 */


the_title( sprintf( '<h5 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
