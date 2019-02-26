<?php
/**
 * Homepage Highlights template part.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<?php
// Query highlights
$wpex_query = new WP_Query( array(
	'post_type'     => 'hp_highlights',
	'showposts'     => '-1',
	'no_found_rows' => true,
) );

if ( $wpex_query->posts ) : ?>

	<section id="home-highlights" class="clearfix">
		<?php
		// Display highlights section heading if enabled
		if ( '1' == wpex_get_data( 'home_highlights_heading' ) ) : ?>
			<h2 class="heading">
				<span><?php echo wpex_get_data('home_highlights_heading_txt', __( 'Features', 'wpex-adapt' ) ); ?></span>
			</h2>
		<?php endif; ?>
		<div class="wpex-row wpex-clr">
			<?php
			// Loop through posts
			$wpex_count=0;
			foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
				<?php $wpex_count++; ?>
				<article class="hp-highlight wpex-col wpex-col-4 wpex-count-<?php echo $wpex_count; ?>">
					<?php
					// Open link tag if highlight URL is defined in custom field
					if ( $url = get_post_meta( get_the_ID(), 'wpex_highlights_url', true ) ) { ?>
						<a href="<?php echo esc_url( $url ); ?>" title="<?php wpex_esc_title(); ?>">
					<?php } ?>
					<?php
					// Display thumbnail
					if ( has_post_thumbnail() ) : ?>
						<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" alt="<?php wpex_esc_title(); ?>" class="hp-highlight-thumb" />
					<?php endif; ?>
					<h2><?php the_title(); ?></h2>
					<?php
					// Close link tag
					if ( $url ) echo '</a>'; ?>
					<?php the_excerpt(); ?>
				</article><!-- .hp-highlight -->
				<?php if ( $wpex_count == '4' ) $wpex_count=0; ?>
			<?php endforeach; ?>
		</div>
	</section><!-- #home-highlights -->     

<?php endif; ?>

<?php wp_reset_postdata(); ?>