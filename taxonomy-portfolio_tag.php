<?php
/**
 * Portfolio Tag taxonomy template file.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

get_header(); ?>

    <header id="page-heading">
         <h1 class="page-header-title">
            <?php
            $posttype_obj = get_post_type_object( get_post_type( ) );
            echo $posttype_obj->label; ?>: <span><?php echo single_term_title(); ?></span>
         </h1>
    </header><!-- #page-heading -->
    
    <?php if ( have_posts() ) : ?>
        <div id="portfolio-archive-entries" class="wpex-row wpex-clr">
            <?php $wpex_count=0; ?>
            <?php while( have_posts() ) : the_post() ?>
                <?php $wpex_count++; ?>
                <?php get_template_part( 'partials/entry', 'portfolio' ); ?>
                <?php if ( $wpex_count == '4' ) $wpex_count=0; ?>
            <?php endwhile; ?>
            <?php wpex_pagination(); ?>
        </div><!--  /"portfolio-archive-entries -->
    <?php endif; ?>
 
<?php get_footer(); ?>