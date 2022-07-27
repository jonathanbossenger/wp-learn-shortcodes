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
function wp_learn_shortcode_callback( $attributes, $content = null ) {
	$output = '';
	if ( isset( $attributes['name'] ) ) {
		$output = "<div>";
		$output .= "<p>Hello from the shortcode, {$attributes['name']}!</p>";
		$output .= $content;
		$output .= "</div>";
	} else {
		$output = "<div>";
		$output .= "<p>Hello from the shortcode</p>";
		$output .= $content;
		$output .= "</div>";
	}

	return $output;
}

/**
 * Add a filter hook callback to the_excerpt filter
 * https://developer.wordpress.org/reference/functions/add_filter/
 */
add_filter( 'the_excerpt', 'wp_learn_update_the_excerpt' );
/**
 * Filter hook callback function
 *
 * @param $the_excerpt
 *
 * @return string
 */
function wp_learn_update_the_excerpt( $the_excerpt ) {
	/*
	 * Trigger the shortcode programmatically
	 * https://developer.wordpress.org/reference/functions/do_shortcode/
	 */
	$updated_excerpt = do_shortcode( '[wp-learn-shortcode name="bob"]' . $the_excerpt . '[/wp-learn-shortcode]' );

	return $updated_excerpt;
}