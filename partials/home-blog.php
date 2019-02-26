<?php
/**
 * Homepage Blog template part.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 3.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Setup tax query if needed
$wpex_tax_query = NULL;
if ( wpex_get_data( 'home_blog_cat' ) && 'All' !== wpex_get_data( 'home_blog_cat' ) ) {
	$wpex_tax_query = array( array(
		'taxonomy' => 'category',
		'field'    => 'slug',
		'terms'    => wpex_get_data( 'home_blog_cat' )
	) );
}

// Get Standard posts
$wpex_posts_query = new WP_Query( array(
	'post_type'     => 'post',
	'showposts'     => wpex_get_data( 'home_blog_count', '4' ),
	'no_found_rows'	=> true,
	'tax_query'     => $wpex_tax_query
) );

if ( $wpex_posts_query->posts ) : ?>

	<section id="home-posts" class="clearfix">
		<?php
		// Display blog section heading if enabled
		if ( '1' == wpex_get_data( 'home_blog_heading', '1' ) ) { ?>
			<h2 class="heading">
				<span><?php echo esc_html( wpex_get_data( 'home_blog_heading_txt', __( 'Recent News', 'wpex-adapt' ) ) ); ?></span>
			</h2>
		<?php } ?>
		<div class="wpex-row wpex-clr">
			<?php $wpex_count=0; ?>
			<?php
			// Loop through standard posts
			foreach( $wpex_posts_query->posts as $post ) : setup_postdata( $post ); ?>
				<?php $wpex_count++; ?>
				<article class="home-entry wpex-col wpex-col-4 wpex-count-<?php echo $wpex_count; ?>">
					<div class="home-entry-inner wpex-clr">
						<?php
						// Display post featured image
						if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><?php the_post_thumbnail( 'wpex_entry' ); ?></a>
						<?php endif; ?>
						<div class="home-entry-description">
							<h3><a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><?php echo the_title(); ?></a></h3>
							<?php
							// Get and display post exerpt
							echo wpex_excerpt( '15' ); ?>
						</div><!-- .home-entry-description -->
						</div><!-- .home-entry-inner-->
				</article><!-- .home-entry-->
				<?php
				// Reset post counter
				if ( $wpex_count == '4' ) $wpex_count=0; ?>
			<?php endforeach; ?>
		</div><!-- .wpex-row -->
	</section><!-- #home-posts -->

<?php endif; ?>

<?php wp_reset_postdata(); ?>