<?php
/*
Plugin Name: WP Learn Shortcodes
Plugin URI: https://learn.wordpress.org/
Description: All about shortcodes
Author: Learn WordPress
Version: 1.0.0
*/

/**
 * Add a new shortcode
 */
add_shortcode( 'wp-learn-shortcode', 'wp_learn_shortcode_callback' );

/**
 * Callback function for wp-learn-shortcode shortcode
 *
 * @return void
 */
function wp_learn_shortcode_callback() {
	return "Hello from the shortcode";
}