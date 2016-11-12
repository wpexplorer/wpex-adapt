<?php
/**
 * Template Name: Blog
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

// Get main header
get_header();

// Main loop
while ( have_posts() ) : the_post(); ?>

	<header id="page-heading"><h1><?php the_title(); ?></h1></header>
	
	<div class="content-area clearfix">
		<?php
		// Query posts
		query_posts( array(
			'post_type' => 'post',
			'paged'     => $paged,
		) ); ?>
		<?php if ( have_posts() ) : ?>
			<?php while (have_posts()) : the_post(); ?> 
				<?php get_template_part( 'partials/entry', get_post_format() ) ?>
			<?php endwhile; ?>  	
		<?php endif; ?>
		<?php wpex_pagination(); wp_reset_query(); ?>
	</div><!-- .content-area -->

<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>