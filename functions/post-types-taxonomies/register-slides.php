<?php
/**
 * Registers slides custom post type
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 */

if ( ! class_exists( 'WPEX_Slides_Post_Type' ) ) {

	class WPEX_Slides_Post_Type {

		public function __construct() {

			// Adds the slides post type and taxonomies
			add_action( 'init', array( &$this, 'slides_init' ), 0 );

			// Thumbnail support for slides posts
			add_theme_support( 'post-thumbnails', array( 'slides' ) );

			// Adds columns in the admin view for thumbnail and taxonomies
			add_filter( 'manage_edit-slides_columns', array( &$this, 'slides_edit_columns' ) );
			add_action( 'manage_posts_custom_column', array( &$this, 'slides_column_display' ), 10, 2 );
			
		}
		
		public function slides_init() {
			$args = apply_filters( 'wpex_slides_args', $args = array(
					'labels'			=> array(
					'name'					=> __( 'Slides', 'adapt' ),
					'menu_name'				=> __( 'Home Slides', 'adapt' ),
					'singular_name'			=> __( 'Slides Item', 'adapt' ),
					'add_new'				=> __( 'Add New Item', 'adapt' ),
					'add_new_item'			=> __( 'Add New Slides Item', 'adapt' ),
					'edit_item'				=> __( 'Edit Slides Item', 'adapt' ),
					'new_item'				=> __( 'Add New Slides Item', 'adapt' ),
					'view_item'				=> __( 'View Item', 'adapt' ),
					'search_items'			=> __( 'Search Slides', 'adapt' ),
					'not_found'				=> __( 'No slides items found', 'adapt' ),
					'not_found_in_trash'	=> __( 'No slides items found in trash', 'adapt' )
				),
				'public'			=> true,
				'supports'			=> array( 'title', 'thumbnail', 'custom-fields', 'editor' ),
				'capability_type'	=> 'post',
				'rewrite'			=> array("slug" => "slides"), // Permalinks format
				'has_archive'		=> false,
				'menu_icon'			=> 'dashicons-images-alt2',
			) );
			register_post_type( 'slides', $args );
		}

		public function slides_edit_columns( $slides_columns ) {
			$slides_columns = array(
				"cb"				=> "<input type=\"checkbox\" />",
				"title"				=> __( 'Title', 'adapt' ),
				"slides_thumbnail"	=> __( 'Thumbnail', 'adapt' )
			);
			return $slides_columns;
		}

		public function slides_column_display( $slides_columns, $post_id ) {

			switch ( $slides_columns ) {

				// Display the thumbnail in the column view
				case "slides_thumbnail":
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
						echo __( 'None', 'adapt' );
					}
					break;
				
			}
		}

	}

	new WPEX_Slides_Post_Type;

}