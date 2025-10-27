<?php
/**
 * Adapt functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Adapt WordPress Theme
 * @subpackage Functions
 * @version 3.2
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get template dirs
$template_dir_uri = get_template_directory_uri();
$template_dir     = get_template_directory();

/*--------------------------------------*/
/* Define Constants
/*--------------------------------------*/
define( 'WPEX_JS_DIR', $template_dir_uri . '/js' );
define( 'WPEX_CSS_DIR', $template_dir_uri . '/css' );

/*--------------------------------------*/
/* Include main functions
/*--------------------------------------*/
require_once $template_dir . '/admin/index.php';
require_once $template_dir . '/functions/helpers.php';
require_once $template_dir . '/functions/theme-setup.php';
require_once $template_dir . '/functions/image-sizes.php';
require_once $template_dir . '/functions/admin-options.php';
require_once $template_dir . '/functions/customizer/styling.php';
require_once $template_dir . '/functions/shortcodes.php';
require_once $template_dir . '/functions/widget-areas.php';
require_once $template_dir . '/functions/gallery-metabox/gallery-metabox.php';

if ( wp_validate_boolean( wpex_get_data( 'portfolio_post_type' , '1' ) ) ) {
	require_once $template_dir . '/functions/post-types-taxonomies/register-portfolio.php';
}
if (  wp_validate_boolean( wpex_get_data( 'highlights_post_type' , '1' ) ) ) {
	require_once $template_dir . '/functions/post-types-taxonomies/register-highlights.php';
}
if (  wp_validate_boolean( wpex_get_data( 'slides_post_type' , '1' ) ) ) {
	require_once $template_dir . '/functions/post-types-taxonomies/register-slides.php';
}

require_once $template_dir . '/functions/post-types-taxonomies/taxonomies-labels.php';
require_once $template_dir . '/functions/post-types-taxonomies/post-type-labels.php';

if ( is_admin() ) {
	require_once $template_dir . '/functions/meta/usage.php';
} else {
	require_once $template_dir . '/functions/scripts.php';
	require_once $template_dir . '/functions/excerpts.php';
	require_once $template_dir . '/functions/posts-per-page.php';
	require_once $template_dir . '/functions/comments-callback.php';
}

/**
* Modify WP menu for dropdown styles
*/
class WPEX_Dropdown_Walker_Nav_Menu extends Walker_Nav_Menu {
	function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output) {
		$id_field = $this->db_fields['id'];
		if ( ! empty( $children_elements[ $element->$id_field ] ) && ( $depth == 0 ) ) {
			$element->classes[] = 'dropdown';
			$element->title .= ' <i class="fa fa-angle-down"></i>';
		}
		if ( ! empty( $children_elements[ $element->$id_field] ) && ( $depth > 0 ) ) {
			$element->classes[] = 'dropdown';
			$element->title .= ' <i class="fa fa-angle-right"></i>';
		}
		Walker_Nav_Menu::display_element(
			$element,
			$children_elements,
			$max_depth,
			$depth,
			$args,
			$output
		);
	}
}
