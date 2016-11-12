<?php
/**
 * 404 Error page template file.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

get_header(); ?>

	<header id="page-heading">
		<h1 class="page-title"><?php _e( '404 Error', 'wpex-adapt' ); ?></h1>		
	</header><!-- #page-heading -->
	
	<div class="content-area clearfix">
		<div class="entry clearfix">
			<p><?php _e( 'Sorry, the page you were looking for could not be found.', 'wpex-adapt' ); ?></p>
		</div><!-- .entry -->
	</div><!-- .content-area -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>