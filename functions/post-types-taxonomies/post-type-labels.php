<?php
/**
 * Changes custom tanomy labels based on theme options settings.
 * @package Adapt WordPress Theme
 * @since 2.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 */



/**
* Portfolio Post Type
* @since 2.0
*/
if ( ! function_exists( 'wpex_custom_portfolio_args' ) ) {
	function wpex_custom_portfolio_args( $args ) {
		
		//post name based on theme options
		$post_type_name = ( wpex_get_data('portfolio_labels','Portfolio') ) ? wpex_get_data('portfolio_labels','Portfolio') : 'Portfolio';
		$post_slug = ( wpex_get_data('portfolio_slug','portfolio') ) ? wpex_get_data('portfolio_slug','portfolio') : 'portfolio';
		
		$labels = array(
			'name' => $post_type_name,
			'singular_name' => $post_type_name . __( 'Item', 'wpex-adapt' ),
			'add_new' => __( 'Add New Item', 'wpex-adapt' ),
			'add_new_item' => __( 'Add New','wpex-adapt') . ' ' . $post_type_name . ' ' . __( 'Item', 'wpex-adapt' ),
			'edit_item' => __( 'Edit New','wpex-adapt') . ' ' . $post_type_name . ' ' . __( 'Item', 'wpex-adapt' ),
			'new_item' => __( 'Add New','wpex-adapt') . ' ' . $post_type_name . ' ' . __( 'Item', 'wpex-adapt' ),
			'view_item' => __( 'View Item', 'wpex-adapt' ),
			'search_items' => __( 'Search', 'wpex-adapt' ). $post_type_name,
			'not_found' =>  __( 'No','wpex-adapt') . ' ' . $post_type_name . ' ' . __( 'items found', 'wpex-adapt' ),
			'not_found_in_trash' => __( 'No','wpex-adapt') . ' ' . $post_type_name . ' ' . __( 'items found in the trash', 'wpex-adapt' ),
		);
		
		$custom_args = array(
			'labels' => $labels,
			'rewrite' => array("slug" => $post_slug)
		);
		return $custom_args + $args;
	}
	add_filter( 'wpex_portfolio_args', 'wpex_custom_portfolio_args' );
}