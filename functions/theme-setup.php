<?php
/**
 * Lets setup our theme!
 *
 * @package Adapt WordPress Theme
 * @subpackage Functions
 * @version 3.1
 */

function wpex_setup() {

	// Content width
	if ( ! isset( $content_width ) ) {
		$content_width = 980;
	}
	
	// Localization support
	load_theme_textdomain( 'wpex-adapt', get_template_directory() .'/languages' );

	// Register navigation menus
	register_nav_menus ( array(
		'menu' => esc_html__( 'Main', 'wpex-adapt' )
	) );
		
	// Add theme support
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'post-thumbnails' );

}
add_action( 'after_setup_theme', 'wpex_setup' );

function wpex_define_gmb_types( $types ) {
	$types = array( 'portfolio' );
	return $types;
}
add_filter( 'wpex_gallery_metabox_post_types', 'wpex_define_gmb_types' );

function wpex_define_gallery_metabox_dir_uri() {
	return get_template_directory_uri() .'/functions/gallery-metabox/';
}
add_filter( 'wpex_gallery_metabox_dir_uri', 'wpex_define_gallery_metabox_dir_uri' );

// Flush rewrite rules for custom post types on theme activation
function wpex_flush_rewrite_rules() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'wpex_flush_rewrite_rules' );