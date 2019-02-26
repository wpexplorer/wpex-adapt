<?php
/**
 * Template Name: Full-Width
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<article class="clearfix">
		<header id="page-heading">
			<h1><?php the_title(); ?></h1>		
		</header><!-- #page-heading -->
		<?php if ( has_post_thumbnail() ) : ?>
			<div id="page-featured-img" class="container clearfix">
				<?php the_post_thumbnail(); ?>
			</div><!-- #page-featured-img -->
		<?php endif; ?>
		<div class="content-area full-width clearfix">
			<div class="entry clearfix"><?php the_content(); ?></div>
		</div><!-- .content-area -->
	</article>
<?php endwhile; ?>

<?php get_footer(); ?>