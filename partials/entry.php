<?php
/**
 * Main post entry template part.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<article <?php post_class( array( 'loop-entry', 'clearfix' ) ); ?>>
	<?php
	// Display post thumbnail
	if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>" class="loop-entry-thumbnail"><?php the_post_thumbnail( 'wpex_entry' ); ?></a>
	<?php endif; ?>

	<h2><a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><?php the_title(); ?></a></h2>
	
	<?php
	// Display post meta for standard post type only.
	if ( 'post' == get_post_type() ) : ?>
		<ul class="loop-entry-meta">
			<li class="loop-entry-meta-date"><i class="fa fa-clock-o"></i><?php _e( 'On','wpex-adapt' ); ?> <?php echo get_the_date(); ?></li>
			<li class="loop-entry-meta-author"><i class="fa fa-user"></i><?php _e( 'By', 'wpex-adapt' ); ?> <?php the_author_posts_link(); ?></li>
			<?php if ( comments_open() ) { ?>
				<li class="loop-entry-meta-comments"><i class="fa fa-comments"></i><?php _e( 'With', 'wpex-adapt' ); ?>  <?php comments_popup_link(
					'0 '. __( 'Comments', 'wpex-adapt' ),
					'1 '. __( 'Comment', 'wpex-adapt' ),
					'% '. __( 'Comments', 'wpex-adapt' )
				); ?></li>
			<?php } ?>
		</ul><!-- .loop-entry-meta -->
	<?php endif; ?>

	<?php
	// Display excerpt if custom excerpts are enabled
	if ( '1' == wpex_get_data( 'blog_exceprt', '1' ) ) { ?>
		<?php wpex_excerpt( '30' ); ?>
	<?php }
	// Display full content
	else { ?>
		<?php the_content(); ?>
	<?php } ?>

</article><!-- .loop-entry -->