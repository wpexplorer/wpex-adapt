<?php
/**
 * Template Name: Landing Page
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */
?>

<!DOCTYPE html>

<!-- WordPress Theme developed by WPExplorer (http://www.wpexplorer.com) -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<?php wp_head(); ?>
</head>

<!-- Begin Body -->
<body <?php body_class(); ?>>

<div id="wrap" class="clearfix">
	<div id="main" class="clearfix">
	<?php while ( have_posts() ) : the_post(); ?>
        <article class="content-area full-width clearfix" style="padding-top: 25px;">
			<div class="entry clearfix"><?php the_content(); ?></div>
        </article><!-- .content-area -->
    <?php endwhile; ?>
    </div><!-- #main -->
</div><!-- #wrap -->

<?php wp_footer(); ?>