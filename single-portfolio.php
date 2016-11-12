<?php
/**
 * Single portfolio post content
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 3.0.0
 */

// Get main header
get_header();

// Main post loop
while ( have_posts() ) : the_post(); ?>

	<article>

		<header id="page-heading">
			<h1><?php the_title(); ?></h1>
			<nav id="single-nav" class="clearfix"> 
				<?php next_post_link('<div id="single-nav-left">%link</div>', '<span class="fa fa-chevron-left"></span> '.__('Newer','wpex-adapt').'', false); ?>
				<?php previous_post_link('<div id="single-nav-right">%link</div>', ''.__('Older','wpex-adapt').' <span class="fa fa-chevron-right"></span>', false); ?>
			</nav><!-- #single-nav --> 
		</header><!-- #page-heading -->

		<div id="single-portfolio" class="content-area full-width clearfix">
			<div id="single-portfolio-left">
				<?php
				// Check for portfolio alternative media custom field (meta)
				if ( get_post_meta( get_the_ID(), 'wpex_portfolio_post_media_alternative', true ) ) { ?>
					<div id="portfolio-post-alt" class="clearfix fitvids">
						<?php
						// Display alternative media
						echo apply_filters( 'the_content', get_post_meta( get_the_ID(), 'wpex_portfolio_post_media_alternative', true ) ); ?>
					</div><!-- #portfolio-post-alt -->
				<?php }

				// Display slider
				elseif ( $attachments = wpex_get_gallery_ids() ) {

					// Load the slider js if there is more then one attachment
					if ( count( $attachments ) > '1' ) {
						wp_enqueue_script( 'flexslider' );
						wp_enqueue_script( 'wpex-slider-home', WPEX_JS_DIR .'/slider-portfolio.js', array( 'jquery', 'flexslider' ), '1.0', true );
					} ?>

					<div id="portfolio-post-slider" class="clearfix">
						<div class="<?php if ( count( $attachments ) > '1' ) echo 'flexslider'; ?>">
							<ul class="slides"> 
								<?php
								// Loop through gallery images
								foreach ( $attachments as $attachment ) :
									// Get image alt
									$img_alt = strip_tags( get_post_meta( $attachment, '_wp_attachment_image_alt', true ) );?>
									<li><a href="<?php echo wp_get_attachment_url( $attachment ); ?>" title="<?php echo esc_attr( $img_alt ); ?>" <?php if ( '1' == count( $attachments ) ) { echo 'class="prettyphoto-link"'; } else { echo 'rel="prettyphoto[gallery]"'; } ?>><?php echo wp_get_attachment_image( $attachment, 'wpex_portfolio_post' ); ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div><!-- .flex-slider -->
					</div><!-- #portfolio-post-slider -->
				<?php }

				// Display featured image
				elseif ( has_post_thumbnail() ) { ?>

					<div id="single-portfolio-thumbnail" class="clearfix">
						<?php
						// Get thumbnail url
						$thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
						<a href="<?php echo esc_url( $thumbnail_url ); ?>" title="<?php wpex_esc_title(); ?>" class="prettyphoto-link"><?php the_post_thumbnail( 'wpex_portfolio_post' ); ?></a>
					</div><!-- #single-portfolio-thumbnail -->

				<?php } ?>

			</div><!-- /single-portfolio-left -->

			<div id="single-portfolio-right" class="clearfix">
				<?php the_content(); ?>
			</div><!-- #single-portfolio-right -->

		</div><!-- #post -->

	</article>

<?php endwhile; ?>

<?php get_footer(); ?>