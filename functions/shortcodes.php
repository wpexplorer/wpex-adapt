<?php
/**
 * Theme Shortcodes
 *
 * @package Adapt WordPress Theme
 * @subpackage Functions
 * @version 3.0.1
 */

function wpex_site_title_shortcode() {
	return esc_html( get_bloginfo( 'name' ) );
}
add_shortcode( 'site-title', 'wpex_site_title_shortcode' );

function wpex_site_link_shortcode() {
	return esc_html( home_url( '/' ) );
}
add_shortcode( 'site-link', 'wpex_site_link_shortcode' );

function wpex_the_year_shortcode() {
	return date( 'Y' );
}
add_shortcode( 'the-year', 'wpex_the_year_shortcode' );