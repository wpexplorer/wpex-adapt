<?php
/**
 * Excerpt functions
 *
 * @package Adapt WordPress Theme
 * @subpackage Functions
 * @version 2.2.0
 */

/**
* Generate custom excerpt
*
* @since 2.0.0
*/
if ( ! function_exists( 'wpex_excerpt' ) ) {
	function wpex_excerpt( $length=30, $readmore=false ) {
		global $post;
		$id = $post->ID;
		$meta_excerpt = get_post_meta( $id, 'wpex_excerpt_length', true );
		$length = $meta_excerpt ? $meta_excerpt : $length;	
		if ( has_excerpt( $id ) ) {
			$output = $post->post_excerpt;
		} else {
			$output = wp_trim_words( strip_shortcodes( get_the_content( $id ) ), $length);
			if ( $readmore == true ) {
				$readmore_link = '<a href="'. get_permalink( $id ) .'" title="'. __('continue reading', 'wpex-adapt' ) .'" rel="bookmark" class="readmore-link">'. __('continue reading', 'wpex-adapt' ) .' &rarr;</a>';
				$output .= apply_filters( 'wpex_readmore_link', $readmore_link );
			}
		}
		echo $output;
	}
}

/**
* Change default read more style
*
* @since 2.0.0
*/
if ( ! function_exists( 'wpex_excerpt_more' ) ) {
	function wpex_excerpt_more($more) {
		global $post;
		return '...';
	}
}
add_filter( 'excerpt_more', 'wpex_excerpt_more' );

/**
* Change default excerpt length
*
* @since 2.0.0
*/
if ( ! function_exists( 'wpex_custom_excerpt_length' ) ) {
	function wpex_custom_excerpt_length( $length ) {
		return wpex_get_data('excerpt_length','40');
	}
}
add_filter( 'excerpt_length', 'wpex_custom_excerpt_length', 999 );