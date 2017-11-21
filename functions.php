<?php
/**
 * Functions for Nextop child theme
 * @author Binjuhor - <binjuhor@gmail.com>
 */

function nextop_child_theme_style() {
	wp_enqueue_style( 'nextop_child-childtheme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'nextop_child_theme_style' , 10);

/* Insert custom functions below */