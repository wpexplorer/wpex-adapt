<?php
/**
 * Helpter functions
 *
 * @package Adapt WordPress Theme
 * @subpackage Functions
 * @version 2.2.0
 */

/**
 * Returns smof data
 *
 * @since 2.0.0
 */
if ( ! function_exists('wpex_get_data') ) {
	function wpex_get_data($id, $fallback = false) {
		global $smof_data;
		if ( $fallback == false ) $fallback = '';
		$output = ( isset($smof_data[$id]) && $smof_data[$id] !== '' ) ? $smof_data[$id] : $fallback;
		return $output;
	}
}

/**
 * Returns escaped post title
 *
 * @since 2.0.0
 */
function wpex_get_esc_title() {
	return esc_attr( the_title_attribute( 'echo=0' ) );
}

/**
 * Outputs escaped post title
 *
 * @since 2.0.0
 */
function wpex_esc_title() {
	echo wpex_get_esc_title();
}

/**
 * Create array of portfolio categories
 *
 * @since 2.0.0
 */
if ( ! function_exists( 'wpex_port_cat_array' ) ) {
	function wpex_port_cat_array() {
		$port_categories = array();  
		if ( !taxonomy_exists( 'portfolio_category' ) ) return array( __( 'No terms', 'wpex-adapt' ) );
		$port_categories_obj = get_terms( 'portfolio_category', array( 'hide_empty'	=> '0' ) );
		foreach ($port_categories_obj as $port_cat) {
			$port_categories[$port_cat->term_id] = $port_cat->slug;}
		$categories_tmp = array_unshift($port_categories, "All");
		return $port_categories;
	}
}

/**
 * Create array of standard categories
 *
 * @since 2.0.0
 */
if ( ! function_exists( 'wpex_blog_cat_array' ) ) {
	function wpex_blog_cat_array() {
		$blog_categories = array();  
		$blog_categories_obj 	= get_categories( 'hide_empty=0' );
		foreach ($blog_categories_obj as $blog_cat) {
		    $blog_categories[$blog_cat->cat_ID] = $blog_cat->slug;}
		$categories_tmp = array_unshift($blog_categories, "All");
		return $blog_categories;
	}
}

/**
 * Pagination
 *
 * @since 2.0.0
 */
if ( ! function_exists( 'wpex_pagination') ) {
	function wpex_pagination() {
		global $wp_query,$wpex_query;
		if ( $wpex_query ) {
			$total = $wpex_query->max_num_pages;
		} else {
			$total = $wp_query->max_num_pages;
		}
		$big = 999999999; // need an unlikely integer
		if ( $total > 1 )  {
			 if ( !$current_page = get_query_var( 'paged') )
				 $current_page = 1;
			 if ( get_option( 'permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => $format,
				'current'   => max( 1, get_query_var( 'paged') ),
				'wpex-adapt'     => $total,
				'mid_size'  => 2,
				'type'      => 'list',
				'prev_text' => '&laquo;',
				'next_text' => '&raquo;',
			 ));
		}
	}
}