<?php
/**
 * Registers the Portfolio Custom Post Type
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */


if ( ! class_exists( 'WPEX_Portfolio_Post_Type' ) ) {

	class WPEX_Portfolio_Post_Type {

		function __construct() {

			// Adds the portfolio post type and taxonomies
			add_action( 'init', array( &$this, 'portfolio_init' ), 0 );

			// Thumbnail support for portfolio posts
			add_theme_support( 'post-thumbnails', array( 'portfolio' ) );

			// Adds columns in the admin view for thumbnail and taxonomies
			add_filter( 'manage_edit-portfolio_columns', array( &$this, 'portfolio_edit_columns' ) );
			add_action( 'manage_posts_custom_column', array( &$this, 'portfolio_column_display' ), 10, 2 );

			// Allows filtering of posts by taxonomy in the admin view
			add_action( 'restrict_manage_posts', array( &$this, 'portfolio_add_taxonomy_filters' ) );

		}
		

		function portfolio_init() {

			/**
			 * Enable the Portfolio custom post type
			 * http://codex.wordpress.org/Function_Reference/register_post_type
			 */

			$labels = array(
				'name'					=> __( 'Portfolio', 'wpex-adapt' ),
				'singular_name'			=> __( 'Portfolio Item', 'wpex-adapt' ),
				'add_new'				=> __( 'Add New Item', 'wpex-adapt' ),
				'add_new_item'			=> __( 'Add New Portfolio Item', 'wpex-adapt' ),
				'edit_item'				=> __( 'Edit Portfolio Item', 'wpex-adapt' ),
				'new_item'				=> __( 'Add New Portfolio Item', 'wpex-adapt' ),
				'view_item'				=> __( 'View Item', 'wpex-adapt' ),
				'search_items'			=> __( 'Search Portfolio', 'wpex-adapt' ),
				'not_found'				=> __( 'No portfolio items found', 'wpex-adapt' ),
				'not_found_in_trash'	=> __( 'No portfolio items found in trash', 'wpex-adapt' )
			);
			
			$args = array(
				'labels'			=> $labels,
				'public'			=> true,
				'supports'			=> array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'custom-fields', 'revisions', 'post-formats' ),
				'capability_type'	=> 'post',
				'rewrite'			=> array("slug" => "portfolio-item"), // Permalinks format
				'has_archive'		=> false,
				'menu_icon'			=> 'dashicons-portfolio',
			); 
			
			$args = apply_filters( 'wpex_portfolio_args', $args);
			
			register_post_type( 'portfolio', $args );


			/**
			 * Register a taxonomy for Portfolio Categories
			 * http://codex.wordpress.org/Function_Reference/register_taxonomy
			 */

			$taxonomy_portfolio_category_labels = array(
				'name'							=> __( 'Portfolio Categories', 'wpex-adapt' ),
				'singular_name'					=> __( 'Portfolio Category', 'wpex-adapt' ),
				'search_items'					=> __( 'Search Portfolio Categories', 'wpex-adapt' ),
				'popular_items'					=> __( 'Popular Portfolio Categories', 'wpex-adapt' ),
				'all_items'						=> __( 'All Portfolio Categories', 'wpex-adapt' ),
				'parent_item'					=> __( 'Parent Portfolio Category', 'wpex-adapt' ),
				'parent_item_colon'				=> __( 'Parent Portfolio Category:', 'wpex-adapt' ),
				'edit_item'						=> __( 'Edit Portfolio Category', 'wpex-adapt' ),
				'update_item'					=> __( 'Update Portfolio Category', 'wpex-adapt' ),
				'add_new_item'					=> __( 'Add New Portfolio Category', 'wpex-adapt' ),
				'new_item_name'					=> __( 'New Portfolio Category Name', 'wpex-adapt' ),
				'separate_items_with_commas'	=> __( 'Separate portfolio categories with commas', 'wpex-adapt' ),
				'add_or_remove_items'			=> __( 'Add or remove portfolio categories', 'wpex-adapt' ),
				'choose_from_most_used'			=> __( 'Choose from the most used portfolio categories', 'wpex-adapt' ),
				'menu_name'						=> __( 'Portfolio Categories', 'wpex-adapt' ),
		);

			$taxonomy_portfolio_category_args = array(
				'labels'			=> $taxonomy_portfolio_category_labels,
				'public'			=> true,
				'show_in_nav_menus'	=> true,
				'show_ui'			=> true,
				'show_tagcloud'		=> true,
				'hierarchical'		=> true,
				'rewrite'			=> array( 'slug' => 'portfolio-category' ),
				'query_var'			=> true
			);

			$taxonomy_portfolio_category_args = apply_filters( 'wpex_taxonomy_portfolio_category_args', $taxonomy_portfolio_category_args);
			
			register_taxonomy( 'portfolio_category', array( 'portfolio' ), $taxonomy_portfolio_category_args );

		}

		/**
		 * Add Columns to Portfolio Edit Screen
		 * http://wptheming.com/2010/07/column-edit-pages/
		 */

		function portfolio_edit_columns( $columns ) {
			$columns['portfolio_thumbnail']	= __( 'Thumbnail', 'wpex-adapt' );
			$columns['portfolio_category']	= __( 'Category', 'wpex-adapt' );
			return $columns;
		}

		function portfolio_column_display( $portfolio_columns, $post_id ) {

			// Code from: http://wpengineer.com/display-post-thumbnail-post-page-overview

			switch ( $portfolio_columns ) {

				// Display the thumbnail in the column view
				case "portfolio_thumbnail":
					$width = (int) 80;
					$height = (int) 80;
					$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );

					// Display the featured image in the column view if possible
					if ( $thumbnail_id ) {
						$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
					}
					if ( isset( $thumb ) ) {
						echo $thumb;
					} else {
						echo __( 'None', 'wpex-adapt' );
					}
					break;	

				// Display the portfolio tags in the column view
				case "portfolio_category":

				if ( $category_list = get_the_term_list( $post_id, 'portfolio_category', '', ', ', '' ) ) {
					echo $category_list;
				} else {
					echo __( 'None', 'wpex-adapt' );
				}
				break;	
		
			}
		}

		/**
		 * Adds taxonomy filters to the portfolio admin page
		 * Code artfully lifed from http://pippinsplugins.com
		 */

		function portfolio_add_taxonomy_filters() {
			global $typenow;

			// An array of all the taxonomyies you want to display. Use the taxonomy name or slug
			$taxonomies = array( 'portfolio_category' );

			// must set this to the post type you want the filter(s) displayed on
			if ( $typenow == 'portfolio' ) {

				foreach ( $taxonomies as $tax_slug ) {
					$current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
					$tax_obj = get_taxonomy( $tax_slug );
					$tax_name = $tax_obj->labels->name;
					$terms = get_terms($tax_slug);
					if ( count( $terms ) > 0) {
						echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
						echo "<option value=''>$tax_name</option>";
						foreach ( $terms as $term ) {
							echo '<option value=' . $term->slug, $current_tax_slug == $term->slug ? ' selected="selected"' : '','>' . $term->name .' ( ' . $term->count .')</option>';
						}
						echo "</select>";
					}
				}
			}
		}

	}

	new WPEX_Portfolio_Post_Type;

}