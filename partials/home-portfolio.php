<?php
/**
 * Homepage Portfolio template part.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Setup tax query if needed
if ( wpex_get_data('home_port_cat') !== '' && wpex_get_data('home_port_cat') !== 'All' ) {
	$wpex_tax_query = array( array (
		'taxonomy'	=> 'portfolio_category',
		'field' 	=> 'slug',
		'terms'		=> wpex_get_data( 'home_port_cat' )
	) );
} else { $wpex_tax_query = NULL; }

$wpex_query = new WP_Query( array(
	'post_type'     => 'portfolio',
	'showposts'     => wpex_get_data( 'home_port_count', '4' ),
	'no_found_rows' => true,
	'tax_query'     => $wpex_tax_query,
) );

// Display portfolio items
if ( $wpex_query->posts ) : ?>

	<section id="home-projects" class="clearfix">
		<?php
		// Display portfolio section heading
		if ( '1' == wpex_get_data( 'home_port_heading', '1' )) { ?>
			<h2 class="heading">
				<span><?php echo wpex_get_data( 'home_port_heading_txt', __( 'Recent Work', 'wpex-adapt' ) ); ?></span>
			</h2>
		<?php } ?>
		<div class="wpex-row wpex-clr">
			<?php
			// Setup counter for clearing floats
			$wpex_count=0;
			// Loop through portfolio items
			foreach( $wpex_query->posts as $post ) : setup_postdata( $post );
				$wpex_count++;
				// Include template part
				// Can't use get_template_part because it won't pass the wpex_count variable
				get_template_part( 'partials/entry', 'portfolio' );
				// Clear counter
				if ( '4' == $wpex_count ) $wpex_count=0;
			// End loop
			endforeach; ?>
		</div><!-- .wpex-row -->
	</section><!-- #home-projects -->

<?php endif; ?>

<?php wp_reset_postdata(); ?>