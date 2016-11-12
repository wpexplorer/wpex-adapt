<?php
/**
 * Single post template file.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<header id="page-heading">
		<h1><?php echo wpex_get_data( 'blog_title', __( 'Blog', 'wpex-adapt' ) ); ?></h1>	
		<nav id="single-nav" class="clearfix"> 
			<?php
			// next post link
			next_post_link(
				'<div id="single-nav-left">%link</div>',
				'<span class="fa fa-chevron-left"></span> '.__( 'Newer','wpex-adapt' ),
				false
			);

			// Previous post link
			previous_post_link(
				'<div id="single-nav-right">%link</div>',
				__( 'Older','wpex-adapt' ).' <span class="fa fa-chevron-right"></span>',
				false
			); ?>
		</nav><!-- /single-nav -->	
	</header>
	
	<article class="content-area clearfix">
		<header>
			<h1 class="single-title"><?php the_title(); ?></h1>
			<ul class="post-meta clearfix">
				<li class="post-meta-date"><i class="fa fa-clock-o"></i><?php _e( 'On','wpex-adapt' ); ?> <?php the_time( 'j' ); ?> <?php the_time( 'M' ); ?>, <?php the_time( 'Y' ); ?></li>
				<li class="post-meta-author"><i class="fa fa-user"></i><?php _e( 'By', 'wpex-adapt' ); ?> <?php the_author_posts_link(); ?></li>
				<?php if( comments_open() ) { ?>
					<li class="post-meta-comments comments-scroll"><i class="fa fa-comments"></i><?php _e( 'With', 'wpex-adapt' ); ?> <?php comments_popup_link( '0 Comments', '1 Comment', '% Comments' ); ?></li>
				<?php } ?>
			</ul><!-- .loop-entry-meta -->
		</header>
		<div class="entry clearfix">
			<?php
			// Display post thumbnail if enabled and defined
			if ( wpex_get_data( 'blog_single_thumbnail', '1' ) == '1'
				&& has_post_thumbnail()
			) : ?>
				<div class="post-thumbnail"><?php the_post_thumbnail( 'wpex_post' ); ?></div>
			<?php endif; ?>
			<?php
			// Show post content
			the_content(); ?>
			<div class="clear"></div>
			<?php
			// Post pagination
			wp_link_pages( ' ' ); ?>
			<?php
			// Display post tags if enabled
			if ( wpex_get_data( 'blog_tags', '1' ) == '1' ) : ?>
				<footer class="post-bottom">
					<?php the_tags( '<div class="post-tags"><span class="fa fa-tags"></span>',' , ','</div>' ); ?>
				</footer><!-- .post-bottom -->
			<?php endif; ?>
		</div><!-- .entry -->
		<?php comments_template(); ?>
	</article><!-- .content-area -->

<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>