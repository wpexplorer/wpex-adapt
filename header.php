<?php
/**
 * The Header for our theme.
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */ ?><!DOCTYPE html>
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

	<header id="masterhead" class="clearfix">
		<nav id="masternav" class="clearfix">
			<?php wp_nav_menu( array(
				'theme_location' => 'menu',
				'sort_column'    => 'menu_order',
				'menu_class'     => 'sf-menu masternav-menu',
				'fallback_cb'    => 'default_menu',
				'walker'         => new WPEX_Dropdown_Walker_Nav_Menu(),
			)); ?>
		</nav><!-- #masternav -->
		<div id="logo">
			<?php
			// Custom Logo
			if ( $custom_logo = wpex_get_data( 'custom_logo' ) ) { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><img src="<?php echo esc_url( $custom_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /></a>
			<?php }
			// Standard link logo
			else { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php } ?>
		</div><!-- #logo -->
	</header><!-- #masterhead -->
	
<div id="main" class="clearfix">