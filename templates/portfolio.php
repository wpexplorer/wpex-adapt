<?php
/**
 * Template Name: Portfolio
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get header template
get_header();

// Main page query
while ( have_posts() ) : the_post(); ?>
	
	<header id="page-heading" class="clearfix">
		<h1><?php the_title(); ?></h1>
	</header><!-- #page-heading -->
		
	<div class="post full-width clearfix">
		<?php
		// Get Portfolio Items
		global $post,$paged;
		$paged         = get_query_var('paged') ? get_query_var('paged') : 1;
		$display_count = wpex_get_data( 'portfolio_pagination', '12' );
		$display_count = $display_count ? $display_count : '12';
		$wpex_query    = new WP_Query( array(
			'post_type'      => 'portfolio',
			'posts_per_page' => $display_count,
			'paged'          => $paged
		) );

		// Display portfolio items if there are any
		if ( $wpex_query->posts ) : ?>

			<div id="portfolio-wrap" class="clearfix">
				<div class="wpex-row wpex-clr">
					<?php
					// Loop through portfolio posts
					$wpex_count = 0;
					foreach( $wpex_query->posts as $post ) : setup_postdata( $post );
						$wpex_count ++;
						// Get portfolio entry partial template file
						get_template_part( 'partials/entry', 'portfolio' );
						if ( '4' == $wpex_count ) $wpex_count=0;
					endforeach; ?>
				</div><!-- .portfolio-content -->
			</div><!-- #portfolio-wrap -->

			<?php
			// Display pagination
			wpex_pagination(); ?>

		<?php
		// End query check
		endif; ?>

		<?php
		// Reset post data to prevent conflicts with main query
		wp_reset_postdata(); ?>

	</div><!-- .post .full-width -->

<?php endwhile; ?>
<?php get_footer(); ?>