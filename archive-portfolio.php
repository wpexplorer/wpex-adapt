<?php
/**
 * Portfolio Archive Template
 *
 * This file isn't used by default but provided if you want to
 * enable the portfolio archive via a child theme.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */
?>
<?php get_header(); ?>

    <header id="page-heading">
        <h1><?php post_type_archive_title(); ?></h1>
    </header><!-- #page-heading -->
    
    <?php if ( have_posts() ) : ?>
        <div id="portfolio-archive-entries" class="wpex-row wpex-clr">
        	<?php $wpex_count=0; ?>
        	<?php while( have_posts() ) : the_post() ?>
            	<?php $wpex_count++; ?>
            	<?php get_template_part( 'partials/entry', 'portfolio') ?>
                <?php if ( $wpex_count == '4' ) $wpex_count=0; ?>
            <?php endwhile; ?>    
            <?php wpex_pagination(); ?>
        </div><!--  #portfolio-archive-entries -->
    <?php endif; ?>
 
<?php get_footer(); ?>