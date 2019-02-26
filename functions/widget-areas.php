<?php
/**
 * Register widgetized areas
 *
 * @package Adapt WordPress Theme
 * @subpackage Functions
 * @version 2.2.0
 */

function wpex_register_sidebars() {

	// Main Sidebar
	register_sidebar( array (
		'name'			=> __( 'Sidebar','wpex-adapt'),
		'id'			=> 'sidebar',
		'description'	=> __( 'Widgets in this area are used in the default sidebar.','wpex-adapt' ),
		'before_widget'	=> '<div class="sidebar-box %2$s clearfix">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="heading widget-title"><span>',
		'after_title'	=> '</span></h4>',
	) );

	// Footer widgets
	if ( wpex_get_data( 'widgetized_footer', '1' ) == '1' ) {
		
		register_sidebar( array (
			'name'			=> __( 'Footer 1','wpex-adapt'),
			'id'			=> 'footer-one',
			'description'	=> __( 'Widgets in this area are used in the first footer column','wpex-adapt' ),
			'before_widget'	=> '<div class="footer-widget %2$s clearfix">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h6 class="widget-title">',
			'after_title'	=> '</h6>',
		) );
		
		register_sidebar( array (
			'name'			=> __( 'Footer 2','wpex-adapt'),
			'id'			=> 'footer-two',
			'description'	=> __( 'Widgets in this area are used in the second footer column','wpex-adapt' ),
			'before_widget'	=> '<div class="footer-widget %2$s clearfix">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h6 class="widget-title">',
			'after_title'	=> '</h6>'
		) );
		
		register_sidebar( array (
			'name'			=> __( 'Footer 3','wpex-adapt'),
			'id'			=> 'footer-three',
			'description'	=> __( 'Widgets in this area are used in the third footer column','wpex-adapt' ),
			'before_widget'	=> '<div class="footer-widget %2$s clearfix">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h6 class="widget-title">',
			'after_title'	=> '</h6>',
		) );
		
		register_sidebar( array (
			'name'			=> __( 'Footer 4','wpex-adapt'),
			'id'			=> 'footer-four',
			'description'	=> __( 'Widgets in this area are used in the fourth footer column','wpex-adapt' ),
			'before_widget'	=> '<div class="footer-widget %2$s clearfix">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h6 class="widget-title">',
			'after_title'	=> '</h6>',
		) );
		
	}

}
add_action( 'widgets_init', 'wpex_register_sidebars' );