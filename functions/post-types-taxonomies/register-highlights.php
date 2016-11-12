<?php
/**
 * Registers highlights custom post type
 *
 * @package Adapt WordPress Theme
 * @subpackage Templates
 * @version 2.2.0
 */

if ( ! class_exists( 'Symple_Highlights_Post_Type' ) ) :

	class Symple_Highlights_Post_Type {

		public function __construct() {

			// Adds the highlights post type and taxonomies
			add_action( 'init', array( &$this, 'highlights_init' ), 0 );

			// Thumbnail support for highlights posts
			add_theme_support( 'post-thumbnails', array( 'hp_highlights' ) );

			// Adds columns in the admin view for thumbnail and taxonomies
			add_filter( 'manage_edit-hp_highlights_columns', array( &$this, 'hp_highlights_edit_columns' ) );
			add_action( 'manage_posts_custom_column', array( &$this, 'hp_highlights_column_display' ), 10, 2 );
			
		}
		
		// Adds the highlights post type
		public function highlights_init() {
			$args = apply_filters( 'symple_highlights_args', array(
					'labels'			=> array(
					'name'					=> __( 'Highlights', 'wpex-adapt' ),
					'singular_name'			=> __( 'Highlights Item', 'wpex-adapt' ),
					'add_new'				=> __( 'Add New Item', 'wpex-adapt' ),
					'add_new_item'			=> __( 'Add New Highlights Item', 'wpex-adapt' ),
					'edit_item'				=> __( 'Edit Highlights Item', 'wpex-adapt' ),
					'new_item'				=> __( 'Add New Highlights Item', 'wpex-adapt' ),
					'view_item'				=> __( 'View Item', 'wpex-adapt' ),
					'search_items'			=> __( 'Search Highlights', 'wpex-adapt' ),
					'not_found'				=> __( 'No highlights items found', 'wpex-adapt' ),
					'not_found_in_trash'	=> __( 'No highlights items found in trash', 'wpex-adapt' )
				),
				'public'			=> true,
				'supports'			=> array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'custom-fields', 'revisions' ),
				'capability_type'	=> 'post',
				'rewrite'			=> array("slug"	=> "highlights"), // Permalinks format
				'has_archive'		=> false,
				'menu_icon'			=> 'dashicons-star-filled',
			) );
			register_post_type( 'hp_highlights', $args );
		}

		// Adds columns in the admin view for thumbnail and taxonomies
		public function hp_highlights_edit_columns( $highlights_columns ) {
			$highlights_columns = array(
				"cb"					=> "<input type=\"checkbox\" />",
				"title"					=> __( 'Title', 'wpex-adapt' ),
				"highlights_thumbnail"	=> __( 'Thumbnail', 'wpex-adapt' ),
				"author" 				=> __( 'Author', 'wpex-adapt' ),
				"comments" 				=> __( 'Comments', 'wpex-adapt' ),
				"date" 					=> __( 'Date', 'wpex-adapt' ),
			);
			$highlights_columns['comments'] = '<div class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></div>';
			return $highlights_columns;
		}

		// Adds columns in the admin view for thumbnail and taxonomies
		public function hp_highlights_column_display( $highlights_columns, $post_id ) {

			switch ( $highlights_columns ) {

				// Display the thumbnail in the column view
				case "highlights_thumbnail":
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
		
			}

		}

	}

	new Symple_Highlights_Post_Type;

endif;