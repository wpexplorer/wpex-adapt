<?php
/**
 * Homepage Highlight singular template file.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <article class="content-area clearfix">
        <header><h1 class="single-title"><?php the_title(); ?></h1></header>
        <div class="entry clearfix">
            <?php the_content(); ?>
            <div class="clear"></div>
            <?php wp_link_pages(' '); ?>
        </div><!-- .entry -->
    </article><!-- .content-area -->

<?php endwhile; ?>
             
<?php get_sidebar(); ?>
<?php get_footer(); ?>