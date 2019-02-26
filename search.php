<?php
/**
 * Search results template file.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

get_header(); ?>

	<header id="page-heading">
		<h1 id="archive-title">
			<?php _e( 'Search Results For', 'wpex-adapt' ); ?>: <?php the_search_query(); ?>
		</h1>
	</header><!-- #page-heading -->

	<div id="post" class="content-area clearfix">

	<?php if ( have_posts() ) : ?>
  
		<?php while( have_posts() ) : the_post() ?>
			<?php get_template_part( 'partials/entry', get_post_format() ) ?>
		<?php endwhile; ?>
		<?php wpex_pagination(); ?>
	
	<?php else : ?>

		<?php _e( 'No results found for that query.', 'wpex-adapt' ); ?>

	<?php endif; ?>

	  </div><!-- .content-area  -->
		
<?php get_sidebar(); ?>		  
<?php get_footer(); ?>