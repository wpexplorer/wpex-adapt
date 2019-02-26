<?php
/**
 * Template Name: Filterable Portfolio
 *
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php
	// Load isotope scripts
	wp_enqueue_script( 'isotope', WPEX_JS_DIR . '/isotope.js', '', true );
	wp_enqueue_script( 'isotope_init', WPEX_JS_DIR . '/isotope_init.js', '', true );  ?>
	
	<header id="page-heading" class="clearfix">
		<h1><?php the_title(); ?></h1>
		<?php $terms = get_terms( 'portfolio_category' ); ?>
		<?php if( $terms[0] ) { ?>
			<ul id="portfolio-cats" class="filter clearfix">
				<li><a href="#" class="active" data-filter="*"><span><?php _e('All', 'wpex-adapt'); ?></span></a></li>
				<?php foreach ($terms as $term ) : ?>
					<li><a href="#" data-filter=".<?php echo $term->slug; ?>"><span><?php echo $term->name; ?></span></a></li>
				<?php endforeach; ?>
			</ul><!-- /portfolio-cats -->
		<?php } ?>	 
	</header><!-- /page-heading -->

	<div class="post full-width clearfix">
		<?php
		// Get Portfolio Items
		global $post,$paged;
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$display_count = wpex_get_data( 'portfolio_pagination', '12' );
		$wpex_query = new WP_Query( array(
			'post_type'      => 'portfolio',
			'posts_per_page' => $display_count,
			'paged'          => $paged
		) );
		if( $wpex_query->posts ) { ?>
			<div id="portfolio-wrap" class="clearfix filterable-portfolio">
				<div class="portfolio-content wpex-row wpex-clr">
					<?php
					// Loop through portfolio posts
					foreach( $wpex_query->posts as $post ) : setup_postdata( $post );
						// Get portfolio entry partial template file
						get_template_part( 'partials/entry', 'portfolio' );
					endforeach; ?>
				</div><!-- /portfolio-content -->
			</div><!-- /portfolio-wrap -->
		<?php } ?>
		<?php wp_reset_postdata(); ?>
		<?php wpex_pagination(); ?>
	</div><!-- /post full-width -->

<?php endwhile; ?>
<?php get_footer(); ?>