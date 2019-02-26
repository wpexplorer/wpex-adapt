<?php
/**
 * Main archive template file.
 *
 * Used for standard categories, tags and post type archives.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<header id="page-heading">
		<h1><?php the_archive_title(); ?></h1>
	</header><!-- #page-heading -->
	
	<div id="post" class="content-area clearfix">  
		<?php while( have_posts() ) : the_post() ?>
			<?php get_template_part( 'partials/entry', get_post_format() ) ?>
		<?php endwhile; ?>
		<?php wpex_pagination(); ?>
	</div><!-- .content-area -->

<?php endif; ?>
<?php get_sidebar(); ?>	  
<?php get_footer(); ?>