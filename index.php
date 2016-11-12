<?php
/**
 * Main index template file.
 *
 * This file is used as a fallback in WordPress for any page/post/archive
 * that is missing a template file.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

get_header();

	// Display header if it's the homepage but not front-page
	if ( is_home() && ! is_front_page() ) :
		$page_for_posts = get_option( 'page_for_posts' );
		if ( $page_for_posts ) : ?>
			<header id="page-heading">
				<h1><?php echo esc_html( get_the_title( $page_for_posts ) ); ?></h1>
			</header>
		<?php endif; ?>
	<?php endif; ?>

	<div class="content-area clearfix">
		<?php if ( have_posts() ) : ?>
			<?php while (have_posts()) : the_post(); ?> 
				<?php get_template_part( 'partials/entry', get_post_format() ) ?>
			<?php endwhile; ?>  	
		<?php endif; ?>
		<?php wpex_pagination(); ?>
	</div><!-- .content-area -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>