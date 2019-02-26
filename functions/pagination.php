<?php
/**
 * Custom pagination functions
 *
 * @package WordPress
 * @subpackage Adapt
 * @since Adapt 2.0
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
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => $format,
				'current' => max( 1, get_query_var( 'paged') ),
				'wpex-adapt' => $total,
				'mid_size' => 2,
				'type' => 'list',
				'prev_text' => '&laquo;',
				'next_text' => '&raquo;',
			 ));
		}
	}
}