<?php
/**
 * Alter the posts per page as needed
 *
 * @package Adapt WordPress Theme
 * @subpackage Functions
 * @version 2.2.0
 */

function wpex_pre_get_posts( $query ) {

	// Main Checks
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	// Search
	if ( $query->is_search() ) {
		$pagination = wpex_get_data( 'search_pagination' );
		$pagination = $pagination ? $pagination : '10';
		$query->set( 'posts_per_page', $pagination );
	}

	// Portfolio
	if ( is_tax( 'portfolio_category' )
		|| is_tax( 'portfolio_tag' )
		|| is_post_type_archive( 'portfolio' )
	) {
		$pagination = wpex_get_data( 'portfolio_pagination' );
		$pagination = $pagination ? $pagination : '12';
		$query->set( 'posts_per_page', $pagination );
	}

}
add_action( 'pre_get_posts', 'wpex_pre_get_posts' );