<?php
/**
 * Main content for portfolio entries.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get global counter
global $wpex_count;

// Get portfolio categories
$terms = get_the_terms( get_the_ID(), 'portfolio_category' );

// Define entry classes
$classes = array();
$classes[] = 'portfolio-item wpex-col wpex-col-4';
if ( $wpex_count ) {
	$classes[] = 'wpex-count-'. esc_html( $wpex_count );
}
if ( ! empty( $terms ) ) {
	foreach ( $terms as $term ) {
		$classes[] = esc_html( $term->slug );
	}
} ?>

<article <?php post_class( $classes ); ?>>
	<div class="portfolio-item-inner wpex-clr">
		<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'wpex_portfolio_entry' ); ?>
			<?php endif; ?>
			<div class="portfolio-overlay">
				<h3><?php the_title(); ?></h3>
			</div><!-- .portfolio-overlay -->
		</a>
	</div>
</article><!-- .portfolio-item -->