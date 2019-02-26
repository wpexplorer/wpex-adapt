<?php
/**
 * This class adds styling (color) options to the WordPress
 * Theme Customizer and outputs the needed CSS to the header
 * 
 * @package Adapt WordPress Theme
 * @subpackage Customizer Functions
 * @version 2.2.0
 */

class WPEX_Theme_Customizer_Styling {

	/**
	* This hooks into 'customize_register' (available as of WP 3.4) and allows
	* you to add new sections and controls to the Theme Customize screen.
	*
	* @see add_action('register',$func)
	* @param \WP_Customize_Manager $wp_customize
	* @since Fabulous 1.0
	*/
	public static function register ( $wp_customize ) {

			// Theme Design Section
			$wp_customize->add_section( 'wpex_styling' , array(
				'title'		=> __( 'Styling', 'wpex-adapt' ),
				'priority'	=> 202,
			) );

			// Get Color Options
			$color_options = self::wpex_color_options();

			// Loop through color options and add a theme customizer setting for it
			$count='2';
			foreach( $color_options as $option ) {
				$count++;
				$default  = isset( $option['default'] ) ? $option['default'] : '';
				$type     = isset( $option['type'] ) ? $option['type'] : '';
				$sanitize = isset( $option['sanitize'] ) ? $option['sanitize'] : false;
				$wp_customize->add_setting( 'wpex_'. $option['id'] .'', array(
					'type'		        => 'theme_mod',
					'default'	        => $default,
					'transport'	        => 'refresh',
					'sanitize_callback' => 'esc_html',
				) );
				if ( 'text' == $type ) {
					$wp_customize->add_control( 'wpex_'. $option['id'] .'', array(
						'label'		=> $option['label'],
						'section'	=> 'wpex_styling',
						'settings'	=> 'wpex_'. $option['id'] .'',
						'priority'	=> $count,
						'type'		=> 'text',
					) );
				} else {
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wpex_'. $option['id'] .'', array(
						'label'		=> $option['label'],
						'section'	=> 'wpex_styling',
						'settings'	=> 'wpex_'. $option['id'] .'',
						'priority'	=> $count,
					) ) );
				}
			} // End foreach

	} // End register
	/**
	* This will output the custom styling settings to the live theme's WP head.
	* Used by hook: 'wp_head'
	* 
	* @see add_action('wp_head',$func)
	* @since Fabulous 1.0
	*/
	public static function header_output() {
		$color_options = self::wpex_color_options();
		$css ='';
		foreach( $color_options as $option ) {
			$theme_mod = get_theme_mod('wpex_'. $option['id'] .'');
			if ( '' != $theme_mod ) {
				if ( !empty($option['media_query']) ) {

					$css .= $option['media_query'] .'{'. $option['element'] .'{ '. $option['style'] .':'. $theme_mod.' !important; } }';
				} else {
					$css .= $option['element'] .'{ '. $option['style'] .':'. $theme_mod.' !important; }';
				}
			}
		}
		$css =  preg_replace( '/\s+/', ' ', $css );
		$css = "<!-- Theme Customizer Styling Options -->\n<style type=\"text/css\">\n" . $css . "\n</style>";
		if ( !empty( $css ) ) {
			echo $css;
		}
	} // End header_output function


	/**
	* Array of styling options
	* 
	* @since Fabulous 1.0
	*/
	public static function wpex_color_options() {

		$array = array();

		$array[] = array(
			'label'		=> __( 'Header Top Padding', 'wpex-adapt' ),
			'id'		=> 'header_top_pad',
			'element'	=> '#masterhead',
			'style'		=> 'padding-top',
			'type'		=> 'text',
			'default'	=> '30px',
		);

		$array[] = array(
			'label'		=> __( 'Header Bottom Padding', 'wpex-adapt' ),
			'id'		=> 'header_bottom_pad',
			'element'	=> '#masterhead',
			'style'		=> 'padding-bottom',
			'type'		=> 'text',
			'default'	=> '30px',
		);

		$array[] = array(
			'label'		=>	__( 'Logo Text Color', 'wpex-adapt' ),
			'id'		=>	'logo_color',
			'element'	=> '#logo a',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Header Top Border Color', 'wpex-adapt' ),
			'id'		=>	'masthead_bottom_border_color',
			'element'	=> '#masterhead',
			'style'		=> 'border-bottom-color',
		);

		$array[] = array(
			'label'		=>	__( 'Header Bottom Border Color', 'wpex-adapt' ),
			'id'		=>	'page_heading_bottom_border_color',
			'element'	=> '#page-heading, #home-tagline',
			'style'		=> 'border-bottom-color',
		);

		$array[] = array(
			'label'		=>	__( 'Menu Link Color', 'wpex-adapt' ),
			'id'		=>	'nav_link_color',
			'element'	=> '#masternav .sf-menu > li > a',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Menu Link Hover Color', 'wpex-adapt' ),
			'id'		=>	'nav_link_hover_color',
			'element'	=> '#masternav .sf-menu > li > a:hover, #masternav .sf-menu > li.sfHover > a',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Active Menu Link Color', 'wpex-adapt' ),
			'id'		=>	'nav_link_active_color',
			'element'	=> '#masternav .current-menu-item > a, #masternav .sf-menu > li.current-menu-item > a:hover',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Sub-Menu Background', 'wpex-adapt' ),
			'id'		=>	'nav_drop_bg',
			'element'	=> '#masternav .sf-menu ul',
			'style'		=> 'background',
		);

		$array[] = array(
			'label'		=>	__( 'Sub-Menu Border', 'wpex-adapt' ),
			'id'		=>	'nav_drop_border',
			'element'	=> '#masternav .sf-menu ul',
			'style'		=> 'border-color',
		);

		$array[] = array(
			'label'		=>	__( 'Sub-Menu Link Bottom Border', 'wpex-adapt' ),
			'id'		=>	'nav_drop_link_border',
			'element'	=> '#masternav .sf-menu ul li',
			'style'		=> 'border-color',
		);

		$array[] = array(
			'label'		=>	__( 'Sub-Menu Link Color', 'wpex-adapt' ),
			'id'		=>	'nav_drop_link_color',
			'element'	=> '#masternav .sf-menu ul > li > a',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Sub-Menu Link Hover Color', 'wpex-adapt' ),
			'id'		=>	'nav_drop_link_hover_color',
			'element'	=> '#masternav .sf-menu ul > li > a:hover',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Sub-Menu Link Hover Background', 'wpex-adapt' ),
			'id'		=>	'nav_drop_link_hover_bg',
			'element'	=> '#masternav .sf-menu ul > li > a:hover',
			'style'		=> 'background',
		);

		$array[] = array(
			'label'			=>	__( 'Mobile Menu Background', 'wpex-adapt' ),
			'id'			=>	'mobile_nav_bg',
			'element'		=> '.slicknav_btn',
			'style'			=> 'background',
		);

		$array[] = array(
			'label'		=>	__( 'Mobile Menu Link Color', 'wpex-adapt' ),
			'id'		=>	'mobile_nav_link_color',
			'element'	=> '.slicknav_btn, .slicknav_menu .slicknav_icon',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Mobile Menu Link Hover Color', 'wpex-adapt' ),
			'id'		=>	'mobile_nav_link_hover_color',
			'element'	=> '.slicknav_btn:hover, .slicknav_menu .slicknav_icon:hover',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Mobile Menu Borders', 'wpex-adapt' ),
			'id'		=>	'mobile_nav_borders',
			'element'	=> '.wpex-mobile-nav-ul li a',
			'style'		=> 'border-color',
		);

		$array[] = array(
			'label'		=>	__( 'Footer Widgets Background', 'wpex-adapt' ),
			'id'		=>	'footer_widgets_bg',
			'element'	=> '#footer',
			'style'		=> 'background',
		);

		$array[] = array(
			'label'		=>	__( 'Footer Widgets Text', 'wpex-adapt' ),
			'id'		=>	'footer_widgets_color',
			'element'	=> 'footer, #footer p',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Footer Widgets Heading', 'wpex-adapt' ),
			'id'		=>	'footer_widgets_headings',
			'element'	=> '#footer h2, #footer h3, #footer h4, #footer h5,  #footer h6, #footer-widgets .widget-title',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Footer Widgets Links', 'wpex-adapt' ),
			'id'		=>	'footer_widgets_links_color',
			'element'	=> '#footer a, #footer-widgets .widget_nav_menu ul > li li a:before',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Footer Widgets Links Hover', 'wpex-adapt' ),
			'id'		=>	'footer_widgets_links_hover_color',
			'element'	=> '#footer a:hover',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Footer Widgets Borders', 'wpex-adapt' ),
			'id'		=>	'footer_widgets_borders',
			'element'	=> '#footer-widgets .widget_nav_menu ul > li, #footer-widgets .widget_nav_menu ul > li a, .footer-widget > ul > li:first-child, .footer-widget > ul > li, .footer-widget h6, #footer-bottom',
			'style'		=> 'border-color',
		);

		$array[] = array(
			'label'		=>	__( 'Entry Title Hover Color', 'wpex-adapt' ),
			'id'		=>	'entry_title_hover_color',
			'element'	=> '.loop-entry h2 a:hover',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Link Color', 'wpex-adapt' ),
			'id'		=>	'link_color',
			'element'	=> '.entry a, #sidebar a, .loop-entry-meta a, .post-meta a, .comment-meta a.url',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Post Link Hover Color', 'wpex-adapt' ),
			'id'		=>	'link_hover_color',
			'element'	=> '.entry a:hover, #sidebar a:hover, .loop-entry-meta a:hover, .post-meta a:hover, .comment-meta a.url:hover',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Sidebar Link Color', 'wpex-adapt' ),
			'id'		=>	'sidebar_link_color',
			'element'	=> '#sidebar a',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Sidebar Link Hover Color', 'wpex-adapt' ),
			'id'		=>	'sidebar_link_hover_color',
			'element'	=> '#sidebar a:hover',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Theme Button Color', 'wpex-adapt' ),
			'id'		=>	'theme_button_color',
			'element'	=> 'input[type="button"], input[type="submit"], .page-numbers a:hover, .page-numbers.current, .page-links span, .page-links a:hover span',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Theme Button Background', 'wpex-adapt' ),
			'id'		=>	'theme_button_bg',
			'element'	=> 'input[type="button"], input[type="submit"], .page-numbers a:hover, .page-numbers.current, .page-links span, .page-links a:hover span',
			'style'		=> 'background',
		);

		$array[] = array(
			'label'		=>	__( 'Theme Button Hover Color', 'wpex-adapt' ),
			'id'		=>	'theme_button_hover_color',
			'element'	=> 'input[type="button"]:hover, input[type="submit"]:hover',
			'style'		=> 'color',
		);

		$array[] = array(
			'label'		=>	__( 'Theme Button Hover Background', 'wpex-adapt' ),
			'id'		=>	'theme_button_hover_bg',
			'element'	=> 'input[type="button"]:hover, input[type="submit"]:hover',
			'style'		=> 'background-color',
		);

		$array[] = array(
			'label'		=>	__( 'Slider Arrow Hover Background', 'wpex-adapt' ),
			'id'		=>	'slider_arrow_hover_bg',
			'element'	=> '.flex-direction-nav li a.flex-prev:hover, .flex-direction-nav li a.flex-next:hover',
			'style'		=> 'background-color',
		);

		$array[] = array(
			'label'		=>	__( 'Slider Arrow Hover Color', 'wpex-adapt' ),
			'id'		=>	'slider_arrow_hover_color',
			'element'	=> '.flex-direction-nav li a.flex-prev:hover, .flex-direction-nav li a.flex-next:hover',
			'style'		=> 'color',
		);

		// Apply filters for child theming magic
		$array = apply_filters( 'wpex_color_options_array', $array );

		// Return array
		return $array;
	}

} // End Theme_Customizer_Styling Class


// Setup the Theme Customizer settings and controls
add_action( 'customize_register' , array( 'WPEX_Theme_Customizer_Styling' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'WPEX_Theme_Customizer_Styling' , 'header_output' ) );



/**
* Remove Inner shadow for buttons if their colors
* have been altered via the customizer
* 
* @since Fabulous 1.0
*/
if ( ! function_exists('wpex_remove_button_shadow') ) {
	function wpex_remove_button_shadow() {
		$css='';
		if ( '' != get_theme_mod( 'wpex_theme_button_bg' ) ) {
			$css = 'input[type="button"], input[type="submit"], .page-numbers a:hover, .page-numbers.current, .page-links span, .page-links a:hover span { box-shadow: 0 1px 2px rgba(0,0,0,0.07); }';
		}
		if ( $css ) {
			$css =  preg_replace( '/\s+/', ' ', $css );
			$css = "<!-- Remove Button Box Shadow -->\n<style type=\"text/css\">\n" . $css . "\n</style>";
			echo $css;
		} else {
			return;
		}

	}
}


// Output custom CSS to live site
add_action( 'wp_head' , 'wpex_remove_button_shadow' );