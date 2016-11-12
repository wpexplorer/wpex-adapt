<?php
/**
 * Returns correct image sizes
 *
 * @package Adapt WordPress Theme
 * @subpackage Functions
 * @version 3.0.0
 */

function wpex_image_crop_locations() {
	return array(
		' '             => __( 'Default', 'mesa' ),
		'false'         => __( 'False', 'mesa' ),
		'left-top'      => __( 'Top Left', 'mesa' ),
		'right-top'     => __( 'Top Right', 'mesa' ),
		'center-top'    => __( 'Top Center', 'mesa' ),
		'left-center'   => __( 'Center Left', 'mesa' ),
		'right-center'  => __( 'Center Right', 'mesa' ),
		'center-center' => __( 'Center Center', 'mesa' ),
		'left-bottom'   => __( 'Bottom Left', 'mesa' ),
		'right-bottom'  => __( 'Bottom Right', 'mesa' ),
		'center-bottom' => __( 'Bottom Center', 'mesa' ),
	);
}

function wpex_parse_image_crop( $crop = 'true' ) {
	$return = true;
	if ( $crop && is_string( $crop ) && array_key_exists( $crop, wpex_image_crop_locations() ) ) {
		$return = explode( '-', $crop );
	}
	$return = $return ? $return : true;
	return $return;
}

function wpex_add_image_sizes() {

	$images = array(
		'home_slider',
		'entry',
		'post',
		'portfolio_entry',
		'portfolio_post',
	);

	foreach ( $images as $image ) {

		$crop = wpex_get_data( $image .'_img_crop' );
		$crop = 'false' == $crop ? false : wpex_parse_image_crop( $crop );
		add_image_size(
			'wpex_'. $image,
			intval( wpex_get_data( $image .'_img_width' ) ),
			intval( wpex_get_data( $image .'_img_height' ) ),
			$crop
		);

	}

}
add_action( 'after_setup_theme', 'wpex_add_image_sizes' );

if ( ! function_exists( 'wpex_img' ) ) {

	function wpex_img($args) {

		// Slider
		if ( $args == 'slider_width' ) {
			$width = get_theme_mod( 'wpex_home_slider_img_width' );
			$width = $width ? intval( $width ) : 9999;
			return $width;
		} elseif ( $args == 'slider_height' ) {
			$height = get_theme_mod( 'wpex_home_slider_img_height' );
			$height = $height ? intval( $height ) : 9999;
			return $height;
		} elseif ( $args == 'slider_crop' ) { 
			
		}

		// Blog entries
		elseif ( $args == 'blog_entry_width' ) {
			$width = get_theme_mod( 'wpex_blog_entry_img_width' );
			$width = $width ? intval( $width ) : 9999;
			return $width;
		} elseif ( $args == 'blog_entry_height' ) {
			$height = get_theme_mod( 'wpex_blog_entry_img_height' );
			$height = $height ? intval( $height ) : 9999;
			return $height;
		} elseif ( $args == 'blog_entry_crop' ) {
			return $crop;
		}

		// Blog post
		elseif ( $args == 'blog_post_width' ) {
			$width = get_theme_mod( 'wpex_blog_post_img_width' );
			$width = $width ? intval( $width ) : 9999;
			return $width;
		} elseif ( $args == 'blog_post_height' ) {
			$height = get_theme_mod( 'wpex_blog_post_img_height' );
			$height = $height ? intval( $height ) : 9999;
			return $height;
		} elseif ( $args == 'blog_post_crop' ) {
			if ( '9999' == $blog_post_height ) {
				return false;
			} else {
				return true;
			}
		}

		// Portfolio entries
		elseif ( $args == 'portfolio_entry_width' ) {
			$width = get_theme_mod( 'wpex_portfolio_entry_img_width' );
			$width = $width ? intval( $width ) : 9999;
			return $width;
		} elseif ( $args == 'portfolio_entry_height' ) {
			$height = get_theme_mod( 'wpex_portfolio_entry_img_height' );
			$height = $height ? intval( $height ) : 9999;
			return $height;
		} elseif ( $args == 'portfolio_entry_crop' ) {
			if ( '9999' == $port_entry_height ) {
				return false;
			} else {
				return true;
			}
		}
		
		// Portfolio post
		elseif ( $args == 'portfolio_post_width' ) {
			$width = get_theme_mod( 'wpex_portfolio_post_img_width' );
			$width = $width ? intval( $width ) : 9999;
			return $width;
		} elseif ( $args == 'portfolio_post_height' ) {
			$height = get_theme_mod( 'wpex_portfolio_post_img_height' );
			$height = $height ? intval( $height ) : 9999;
			return $height;
		}
		elseif ( $args == 'portfolio_post_crop' ) {
			if ( '9999' == $port_post_height ) {
				return false;
			} else {
				return true;
			}
		}

	}

}