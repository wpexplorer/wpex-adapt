<?php
/**
 * Template Name: Homepage
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

get_header(); ?>

	<div class="home-wrap clearfix">
		<?php
		// Get homepage module blocks
		$home_blocks = $smof_data['homepage_blocks']['enabled'];
		if ( $home_blocks && is_array( $home_blocks ) ) :
			// Loop through each block and get it's template part
			foreach ( $home_blocks as $key => $value ) :
				$partial = str_replace( '_', '-', $key );
				// Get homepage template part - you can add these
				// to a child theme for easy modification
				$file = locate_template( 'partials/'. $partial .'.php' );
				if ( file_exists( $file ) ) {
					include( $file );
				}
			endforeach;
		endif; ?>
	</div><!-- /home-wrap -->
<?php get_footer(); ?>