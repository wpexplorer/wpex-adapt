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
* Portfolio Cats & Tags
* @since 2.0
*/

// Cats
if ( ! function_exists( 'wpex_custom_portfolio_category_args' ) ) {
	function wpex_custom_portfolio_category_args( $args ) {
		
		//post name based on theme options
		$post_type_name = ( wpex_get_data('portfolio_labels','Portfolio') ) ? wpex_get_data('portfolio_labels','Portfolio') : 'Portfolio';
		$tax_slug = ( wpex_get_data('portfolio_cat_slug','portfolio-category') ) ? wpex_get_data('portfolio_cat_slug','portfolio-category') : 'portfolio-category';
		
		$taxonomy_portfolio_category_labels = array(
			'name' => $post_type_name . ' '. __( 'Categories', 'adapt' ),
			'singular_name' => $post_type_name . ' '. __( 'Category', 'adapt' ),
			'search_items' => __( 'Search','adapt') .' '. $post_type_name .' '. __('Category', 'adapt' ),
			'popular_items' => __( 'Popular','adapt') .' '. $post_type_name .' '. __('Categories', 'adapt' ),
			'all_items' => __( 'All','adapt') .' '. $post_type_name .' '. __('Categories', 'adapt' ),
			'parent_item' => __( 'Parent','adapt') .' '. $post_type_name .' '. __('Category', 'adapt' ),
			'parent_item_colon' => __( 'Parent','adapt') .' '. $post_type_name .' '. __('Category', 'adapt' ),
			'edit_item' => __( 'Edit','adapt') .' '. $post_type_name .' '. __('Category', 'adapt' ),
			'update_item' => __( 'Update','adapt') .' '. $post_type_name .' '. __('Category', 'adapt' ),
			'add_new_item' =>__( 'Add New','adapt') .' '. $post_type_name .' '. __('Category', 'adapt' ),
			'new_item_name' => __( 'New','adapt') .' '. $post_type_name .' '. __('Category name', 'adapt' ),
			'separate_items_with_commas' => __( 'Seperate','adapt') .' '. $post_type_name .' '. __('categories with commas', 'adapt' ),
			'add_or_remove_items' => __( 'Add or remove','adapt') .' '. $post_type_name .' '. __('categories', 'adapt' ),
			'choose_from_most_used' => __( 'Choose from the most used','adapt') .' '. $post_type_name .' '. __('categories', 'adapt' ),
			'menu_name' => $post_type_name .' '. __('Categories', 'adapt' ),
		);

		$custom_taxonomy_portfolio_category_args = array(
			'labels' => $taxonomy_portfolio_category_labels,
			'rewrite' => array( 'slug' => $tax_slug )
		);
		
		return $custom_taxonomy_portfolio_category_args + $args;
			
	}
	add_filter( 'symple_taxonomy_portfolio_category_args', 'wpex_custom_portfolio_category_args' );
}


// Tags
if ( ! function_exists( 'wpex_custom_portfolio_tag_args' ) ) {
	function wpex_custom_portfolio_tag_args( $args ) {
		
		//post name based on theme options
		$post_type_name = ( wpex_get_data('portfolio_labels','Portfolio') ) ? wpex_get_data('portfolio_labels','Portfolio') : 'Portfolio';
		$tax_slug = ( wpex_get_data('portfolio_tag_slug','portfolio-tag') ) ? wpex_get_data('portfolio_tag_slug','portfolio-tag') : 'portfolio-tag';
		
		$taxonomy_portfolio_tag_labels = array(
			'name' => $post_type_name . ' '. __( 'Tags', 'adapt' ),
			'singular_name' => $post_type_name . ' '. __( 'Tag', 'adapt' ),
			'search_items' => __( 'Search','adapt') .' '. $post_type_name .' '. __('Tag', 'adapt' ),
			'popular_items' => __( 'Popular','adapt') .' '. $post_type_name .' '. __('Tags', 'adapt' ),
			'all_items' => __( 'All','adapt') .' '. $post_type_name .' '. __('Tags', 'adapt' ),
			'parent_item' => __( 'Parent','adapt') .' '. $post_type_name .' '. __('Tag', 'adapt' ),
			'parent_item_colon' => __( 'Parent','adapt') .' '. $post_type_name .' '. __('Tag', 'adapt' ),
			'edit_item' => __( 'Edit','adapt') .' '. $post_type_name .' '. __('Tag', 'adapt' ),
			'update_item' => __( 'Update','adapt') .' '. $post_type_name .' '. __('Tag', 'adapt' ),
			'add_new_item' =>__( 'Add New','adapt') .' '. $post_type_name .' '. __('Tag', 'adapt' ),
			'new_item_name' => __( 'New','adapt') .' '. $post_type_name .' '. __('Tag name', 'adapt' ),
			'separate_items_with_commas' => __( 'Seperate','adapt') .' '. $post_type_name .' '. __('tags with commas', 'adapt' ),
			'add_or_remove_items' => __( 'Add or remove','adapt') .' '. $post_type_name .' '. __('tags', 'adapt' ),
			'choose_from_most_used' => __( 'Choose from the most used','adapt') .' '. $post_type_name .' '. __('tags', 'adapt' ),
			'menu_name' => $post_type_name .' '. __('Tags', 'adapt' ),
		);

		$custom_taxonomy_portfolio_tag_args = array(
			'labels' => $taxonomy_portfolio_tag_labels,
			'rewrite' => array( 'slug' => $tax_slug )
		);
		
		return $custom_taxonomy_portfolio_tag_args + $args;
			
	}
	add_filter( 'symple_taxonomy_portfolio_tag_args', 'wpex_custom_portfolio_tag_args' );
}