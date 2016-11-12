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
			'name' => $post_type_name . ' '. __( 'Categories', 'wpex-adapt' ),
			'singular_name' => $post_type_name . ' '. __( 'Category', 'wpex-adapt' ),
			'search_items' => __( 'Search','wpex-adapt') .' '. $post_type_name .' '. __('Category', 'wpex-adapt' ),
			'popular_items' => __( 'Popular','wpex-adapt') .' '. $post_type_name .' '. __('Categories', 'wpex-adapt' ),
			'all_items' => __( 'All','wpex-adapt') .' '. $post_type_name .' '. __('Categories', 'wpex-adapt' ),
			'parent_item' => __( 'Parent','wpex-adapt') .' '. $post_type_name .' '. __('Category', 'wpex-adapt' ),
			'parent_item_colon' => __( 'Parent','wpex-adapt') .' '. $post_type_name .' '. __('Category', 'wpex-adapt' ),
			'edit_item' => __( 'Edit','wpex-adapt') .' '. $post_type_name .' '. __('Category', 'wpex-adapt' ),
			'update_item' => __( 'Update','wpex-adapt') .' '. $post_type_name .' '. __('Category', 'wpex-adapt' ),
			'add_new_item' =>__( 'Add New','wpex-adapt') .' '. $post_type_name .' '. __('Category', 'wpex-adapt' ),
			'new_item_name' => __( 'New','wpex-adapt') .' '. $post_type_name .' '. __('Category name', 'wpex-adapt' ),
			'separate_items_with_commas' => __( 'Seperate','wpex-adapt') .' '. $post_type_name .' '. __('categories with commas', 'wpex-adapt' ),
			'add_or_remove_items' => __( 'Add or remove','wpex-adapt') .' '. $post_type_name .' '. __('categories', 'wpex-adapt' ),
			'choose_from_most_used' => __( 'Choose from the most used','wpex-adapt') .' '. $post_type_name .' '. __('categories', 'wpex-adapt' ),
			'menu_name' => $post_type_name .' '. __('Categories', 'wpex-adapt' ),
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
			'name' => $post_type_name . ' '. __( 'Tags', 'wpex-adapt' ),
			'singular_name' => $post_type_name . ' '. __( 'Tag', 'wpex-adapt' ),
			'search_items' => __( 'Search','wpex-adapt') .' '. $post_type_name .' '. __('Tag', 'wpex-adapt' ),
			'popular_items' => __( 'Popular','wpex-adapt') .' '. $post_type_name .' '. __('Tags', 'wpex-adapt' ),
			'all_items' => __( 'All','wpex-adapt') .' '. $post_type_name .' '. __('Tags', 'wpex-adapt' ),
			'parent_item' => __( 'Parent','wpex-adapt') .' '. $post_type_name .' '. __('Tag', 'wpex-adapt' ),
			'parent_item_colon' => __( 'Parent','wpex-adapt') .' '. $post_type_name .' '. __('Tag', 'wpex-adapt' ),
			'edit_item' => __( 'Edit','wpex-adapt') .' '. $post_type_name .' '. __('Tag', 'wpex-adapt' ),
			'update_item' => __( 'Update','wpex-adapt') .' '. $post_type_name .' '. __('Tag', 'wpex-adapt' ),
			'add_new_item' =>__( 'Add New','wpex-adapt') .' '. $post_type_name .' '. __('Tag', 'wpex-adapt' ),
			'new_item_name' => __( 'New','wpex-adapt') .' '. $post_type_name .' '. __('Tag name', 'wpex-adapt' ),
			'separate_items_with_commas' => __( 'Seperate','wpex-adapt') .' '. $post_type_name .' '. __('tags with commas', 'wpex-adapt' ),
			'add_or_remove_items' => __( 'Add or remove','wpex-adapt') .' '. $post_type_name .' '. __('tags', 'wpex-adapt' ),
			'choose_from_most_used' => __( 'Choose from the most used','wpex-adapt') .' '. $post_type_name .' '. __('tags', 'wpex-adapt' ),
			'menu_name' => $post_type_name .' '. __('Tags', 'wpex-adapt' ),
		);

		$custom_taxonomy_portfolio_tag_args = array(
			'labels' => $taxonomy_portfolio_tag_labels,
			'rewrite' => array( 'slug' => $tax_slug )
		);
		
		return $custom_taxonomy_portfolio_tag_args + $args;
			
	}
	add_filter( 'symple_taxonomy_portfolio_tag_args', 'wpex_custom_portfolio_tag_args' );
}