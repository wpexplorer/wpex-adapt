<?php
/**
 * This file is used to display your homepage slides
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 3.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<section class="home-slider clr">
	<div class="container">
		<?php
		// Display slider alternative
		if ( wpex_get_data( 'slider_alternative' ) ) :

			echo do_shortcode( wpex_get_data( 'slider_alternative' ) );

		// Display built-in slider slides
		elseif ( wpex_get_data( 'slides_post_type', '1' ) == '1' ) :

			// Query slides
			$query_slides = new WP_Query( array(
				'post_type'      => 'slides',
				'posts_per_page' => '-1',
				'no_found_rows'  => true,
			) );

			// Display slider if slides are found
			if ( $query_slides->posts ) :

				// Load slider scripts
				wp_enqueue_script( 'flexslider' );
				wp_enqueue_script( 'wpex-slider-home', WPEX_JS_DIR .'/slider-home.js', array( 'jquery', 'flexslider' ), '1.0', true );

				// Define slider variables
				$wpex_slideshow = ( wpex_get_data('slider_slideshow', '1') == 1 ) ? 'true' : 'false';
				$wpex_slider_randomize = ( wpex_get_data('slider_randomize', '1') == 1 ) ? 'true' : 'false';
				
				// Set slider options
				$flex_params = array(
					'slideshow'      => $wpex_slideshow,
					'randomize'      => $wpex_slider_randomize,
					'animation'      => wpex_get_data( 'slider_animation', 'slide' ),
					'direction'      => wpex_get_data( 'slider_direction', 'horizontal' ),
					'slideshowSpeed' => wpex_get_data( 'slider_slideshow_speed', '7000' )
				);
				
				// Localize slider script
				wp_localize_script( 'wpex-slider-home', 'flexLocalize', $flex_params ); ?>

				<div id="home-slider-wrap" class="flex-container">
					<div id="home-slider-loader"><i class="icon-spinner icon-spin"></i></div>
					<div id="home-flexslider" class="flexslider">
						<ul class="slides">
							<?php
							// Loop through slides
							foreach( $query_slides->posts as $post ) : setup_postdata( $post );
								// Get slide video
								$video = esc_url( get_post_meta( get_the_ID(), 'wpex_slides_video', true ) );
								// Display slide if it has a thumbnail or video
								if ( has_post_thumbnail() || $video ) : ?>
									<li class="fitvids">
										<?php
										// Display oembed slide (video)
										if ( $video ) {
											echo wp_oembed_get( $video );
										}
										// Display standard image slide
										else {
											// Slide with URL
											if ( get_post_meta( get_the_ID(), 'wpex_slides_url', true ) ) { ?>
												<a href="<?php echo get_post_meta( get_the_ID(), 'wpex_slides_url', true ); ?>" title="<?php wpex_esc_title(); ?>" target="_<?php echo get_post_meta( get_the_ID(), 'wpex_slides_url_target', true ); ?>">
												<?php the_post_thumbnail( 'wpex_home_slider' ); ?>
											</a>
											<?php
											// Slide without URL
											} else { ?>
												<?php the_post_thumbnail( 'wpex_home_slider' ); ?>
										<?php }
										 } ?>
										 <?php
										 // Display slide content unless a video is defined
										 if ( $post->post_content && ! $video ) : ?>
											<div class="flex-caption"><?php the_content(); ?></div>
										<?php endif; ?>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul><!-- .slides -->
					</div><!-- .flexslider -->
				</div><!-- #home-slider-wrap -->
			<?php endif; ?>

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>
	</div><!-- .container -->
</section><!-- #home-slider .clr -->