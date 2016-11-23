<?php
if ( ! function_exists( 'of_options' ) ) {
	
	function of_options() {
			
		// Homepage blocks for the layout manager (sorter)
		$home_blocks = array(
			"disabled"	=> array(
			"placebo"	=> "placebo", //REQUIRED!
			), 
			"enabled"	=> array(
				"placebo"			=> "placebo", //REQUIRED!
				"home_tagline"		=> __( 'Site Description', 'wpex-adapt' ),
				"home_slider"		=> __( 'Slider', 'wpex-adapt' ),
				"home_content"		=> __( 'Page Content', 'wpex-adapt' ),
				"home_highlights"	=> __( 'Highlights', 'wpex-adapt' ),
				"home_portfolio"	=> __( 'Portfolio', 'wpex-adapt' ),
				"home_blog"			=> __( 'Blog', 'wpex-adapt' )
			),
		);

		// Image crops
		$img_crop_locations = array(
			'center-center' => __( 'Center Center', 'mesa' ),
			'false'         => __( 'False', 'mesa' ),
			'left-top'      => __( 'Top Left', 'mesa' ),
			'right-top'     => __( 'Top Right', 'mesa' ),
			'center-top'    => __( 'Top Center', 'mesa' ),
			'left-center'   => __( 'Center Left', 'mesa' ),
			'right-center'  => __( 'Center Right', 'mesa' ),
			'left-bottom'   => __( 'Bottom Left', 'mesa' ),
			'right-bottom'  => __( 'Bottom Right', 'mesa' ),
			'center-bottom' => __( 'Bottom Center', 'mesa' ),
		);


	/*-----------------------------------------------------------------------------------*/
	/* The Options Array */
	/*-----------------------------------------------------------------------------------*/

	// Set the Options Array
	global $of_options;
	$of_options = array();

		// GENERAl SETTINGS
		$of_options[] = array( 
			"name"	=> "General",
			"type"	=> "heading"
		);

		//logos + fav
		$of_options[] = array(
			"name"	=> __( 'Custom Logo', 'wpex-adapt' ),
			"desc"	=> __( 'Use this field to upload your custom logo for use in the theme header', 'wpex-adapt' ),
			"id"	=> "custom_logo",
			"std"	=> "",
			"type"	=> "media"
		);
		
		$of_options[] = array(
			"name"	=> __( "Retina Logo (optional)", "adapt" ),
			"desc"	=> __( "Upload your custom retina ready logo. This should be 2x the size of your standard logo.", "adapt" ),
			"std"	=> "",
			"id"	=> "custom_retina_logo",
			"type"	=> "media",
		);
		
		$of_options[] = array(
			"name"	=> __( "Standard Logo Height", "adapt" ),
			"desc"	=> __( "Enter your standard logo height in pixels. Used for retina purposes. Should be 1/2 the height of your retina logo dimensions and do not include the px. Example: 150", "adapt" ),
			"std"	=> "",
			"id"	=> "logo_height",
			"type"	=> "text",
		);
							
		$of_options[] = array(
			"name"	=> __( 'Custom Favicon', 'wpex-adapt' ),
			"desc"	=> __( 'Upload a 16px x 16px Png/Gif image that will represent your website\'s favicon.', 'wpex-adapt' ),
			"id"	=> "custom_favicon",
			"std"	=> "",
			"type"	=> "media"
		);
		
		//misc
		$of_options[] = array( 
			"name"	=> __( 'Responsiveness', 'wpex-adapt' ),
			"desc"	=> __( 'Do you wish to enable or disable the responsive CSS for this theme?', 'wpex-adapt' ),
			"id"	=> "responsive",
			"std"	=> '1',
			"on"	=> __( 'Enable', 'wpex-adapt' ),
			"off"	=> __( 'Disable', 'wpex-adapt' ),
			"type"	=> "switch"
		);
		
		$of_options[] = array( 
			"name"	=> __( 'Retina Support', 'wpex-adapt' ),
			"desc"	=> __( 'Do you wish to enable or disable the built-in retina support? If using a caching system such as W3Total Cache or hosted on WPEngine, it is best to disable. When enabled this will create a second version of every cropped image that is 2x as large and save it on your server.', 'wpex-adapt' ),
			"id"	=> "builtin_retina",
			"std"	=> '0',
			"on"	=> __( 'Enable', 'wpex-adapt' ),
			"off"	=> __( 'Disable', 'wpex-adapt' ),
			"type"	=> "switch"
		);

		// POST TYPES
		$of_options[] = array(
			"name"	=> __( 'Post Types', 'wpex-adapt' ),
			"type"	=> "heading"
		);
					
		$of_options[] = array(
			"name"	=> __( 'Enable Slides Post Type', 'wpex-adapt' ),
			"desc"	=> __( 'Do you wish to enable or disable the built-in Slider post type? Refresh your page after saving to see your changes.', 'wpex-adapt' ),
			"id"	=> "slides_post_type",
			"std"	=> '1',
			"on"	=> __( 'Enable', 'wpex-adapt' ),
			"off"	=> __( 'Disable', 'wpex-adapt' ),
			"type"	=> "switch"
		);
		
		$of_options[] = array(
			"name"	=> __( 'Enable Highlights Post Type', 'wpex-adapt' ),
			"desc"	=> __( 'Do you wish to enable or disable the built-in Highlights post type? Refresh your page after saving to see your changes.', 'wpex-adapt' ),
			"id"	=> "highlights_post_type",
			"std"	=> '1',
			"on"	=> __( 'Enable', 'wpex-adapt' ),
			"off"	=> __( 'Disable', 'wpex-adapt' ),
			"type"	=> "switch"
		);
		
		$of_options[] = array(
			"name"	=> __( 'Enable Portfolio Post Type', 'wpex-adapt' ),
			"desc"	=> __( 'Do you wish to enable or disable the built-in Portfolio post type? Refresh your page after saving to see your changes.', 'wpex-adapt' ),
			"id"	=> "portfolio_post_type",
			"std"	=> '1',
			"on"	=> __( 'Enable', 'wpex-adapt' ),
			"off"	=> __( 'Disable', 'wpex-adapt' ),
			"type"	=> "switch"
		);

		// HOME SETTINGS	
		$of_options[] = array(
			"name"	=> __( 'Home', 'wpex-adapt' ),
			"type"	=> "heading"
		);
									
		$of_options[] = array(
			"name"	=> __( 'Homepage Layout Manager', 'wpex-adapt' ),
			"desc"	=> __( 'Organize how you want the layout to appear on the homepage.', 'wpex-adapt' ),
			"id"	=> "homepage_blocks",
			"std"	=> $home_blocks,
			"type"	=> "sorter"
		);
		
		//home highlights				
		$of_options[] = array(
			"name"	=> "",
			"desc"	=> "",
			"id"	=> "subheading",
			"std"	=> "<h3 style=\"margin: 0;\">". __( 'Highlights', 'wpex-adapt' ) ."</h3>",
			"icon"	=> true,
			"type"	=> "info"
		);
						
		$of_options[] = array( 
			"name"	=> __( 'Highlights Heading', 'wpex-adapt' ),
			"desc"	=> __( 'Do you wish to enable or disable the highlights section heading?', 'wpex-adapt' ),
			"id"	=> "home_highlights_heading",
			"std"	=> '0',
			"on"	=> __( 'Enable', 'wpex-adapt' ),
			"off"	=> __( 'Disable', 'wpex-adapt' ),
			"type"	=> "switch"
		);
		
		$of_options[] = array( 
			"name"	=> __( 'Highlights Custom Heading', 'wpex-adapt' ),
			"desc"	=> __( 'Custom heading text for the homepage highlights section.<br /><br /><strong>Note:</strong> Leave blank to show the translatable/localized default string.', 'wpex-adapt' ),
			"id"	=> "home_highlights_heading_txt",
			"std"	=> '',
			"fold"	=> 'home_highlights_heading',
			"type"	=> "text"
		);		
						
		//home portfolio				
		$of_options[] = array(
			"name"	=> "",
			"desc"	=> "",
			"id"	=> "subheading",
			"std"	=> "<h3 style=\"margin: 0;\">". __( 'Portfolio', 'wpex-adapt' ) ."</h3>",
			"icon"	=> true,
			"type"	=> "info"
		);
						
		$of_options[] = array( 
			"name"	=> __( 'Portfolio Heading', 'wpex-adapt' ),
			"desc"	=> __( 'Do you wish to enable or disable the portfolio section heading?', 'wpex-adapt' ),
			"id"	=> "home_port_heading",
			"std"	=> '1',
			"on"	=> __( 'Enable', 'wpex-adapt' ),
			"off"	=> __( 'Disable', 'wpex-adapt' ),
			"type"	=> "switch"
		); 
		
		$of_options[] = array( 
			"name"	=> __( 'Portfolio Custom Heading', 'wpex-adapt' ),
			"desc"	=> __( 'Custom heading text for the homepage portfolio section.<br /><br /><strong>Note:</strong> Leave blank to show the translatable/localized default string.', 'wpex-adapt' ),
			"id"	=> "home_port_heading_txt",
			"std"	=> '',
			"fold"	=> 'home_port_heading',
			"type"	=> "text"
		);
										
		$of_options[] = array(
			"name"	=> __( 'Portfolio Count', 'wpex-adapt' ),
			"desc"	=> __( 'How many portfolio posts do you wish to show for the portfolio section?', 'wpex-adapt' ),
			"id"	=> "home_port_count",
			"std"	=> "4",
			"type"	=> "text"
		);
						
		$of_options[] = array(
			"name"		=> __( 'Portfolio Category', 'wpex-adapt' ),
			"desc"		=> __( 'Select a category for your homepage recent blog items.', 'wpex-adapt' ),
			"id"		=> "home_port_cat",
			"std"		=> '',
			"type"		=> "select",
			"options"	=> wpex_port_cat_array()
		);

		
		//home blog				
		$of_options[] = array(
			"name"	=> "",
			"desc"	=> "",
			"id"	=> "subheading",
			"std"	=> "<h3 style=\"margin: 0;\">". __( 'Blog', 'wpex-adapt' ) ."</h3>",
			"icon"	=> true,
			"type"	=> "info"
		);
						
		$of_options[] = array( 
			"name"	=> __( 'Blog Heading', 'wpex-adapt' ),
			"desc"	=> __( 'Do you wish to enable or disable the blog section heading?', 'wpex-adapt' ),
			"id"	=> "home_blog_heading",
			"std"	=> '1',
			"on"	=> __( 'Enable', 'wpex-adapt' ),
			"off"	=> __( 'Disable', 'wpex-adapt' ),
			"type"	=> "switch"
		); 
		
		$of_options[] = array( 
			"name"	=> __( 'Blog Intro Custom Heading', 'wpex-adapt' ),
			"desc"	=> __( 'Custom heading text for the homepage blog section.<br /><br /><strong>Note:</strong> Leave blank to show the translatable/localized default string.', 'wpex-adapt' ),
			"id"	=> "home_blog_heading_txt",
			"std"	=> '',
			"fold"	=> 'home_blog_heading',
			"type"	=> "text"
		);
						
										
		$of_options[] = array(
			"name"	=> __( 'Blog Count', 'wpex-adapt' ),
			"desc"	=> __( 'How many blog posts do you wish to show for the blog section?', 'wpex-adapt' ),
			"id"	=> "home_blog_count",
			"std"	=> "4",
			"type"	=> "text"
		);
						
		$of_options[] = array(
			"name"		=> __( 'Blog Category', 'wpex-adapt' ),
			"desc"		=> __( 'Select a category for your homepage recent blog items.', 'wpex-adapt' ),
			"id"		=> "home_blog_cat",
			"std"		=> '',
			"type"		=> "select",
			"options"	=> wpex_blog_cat_array()
		);
			
		// SLIDER SETTINGS	
		$of_options[] = array(
			"name"	=> __( 'Slider', 'wpex-adapt' ),
			"type"	=> "heading"
		);
					
		$of_options[] = array(
			"name"	=>  __( 'Slider Height', 'wpex-adapt' ),
			"desc"	=>  __( 'Select a custom height for the slider in px. If left blank the theme will not crop any images vertically so you can have different height slides.', 'wpex-adapt' ),
			"id"	=> "slider_height",
			"std"	=> "400",
			"type"	=> "text"
		);	

		$of_options[] = array(
			"name"		=>  __( 'Animation', 'wpex-adapt' ),
			"desc"		=>  __( 'Select your desired slider animation.', 'wpex-adapt' ),
			"id"		=> "slider_animation",
			"std"		=> "fade",
			"type"		=> "select",
			"options"	=> array(
				'fade'	=> 'fade',
				'slide'	=> 'slide',
			)
		);
						
		$of_options[] = array(
			"name"		=>  __( 'Animation Direction', 'wpex-adapt' ),
			"desc"		=>  __( 'Select your desired direction for the slider animation.<br /><br /><strong>Note:</strong> If you choose vertical slides, all slides must be the same height to prevent issues.', 'wpex-adapt' ),
			"id"		=> "slider_direction",
			"std"		=> "horizontal",
			"type"		=> "select",
			"options"	=> array(
				'horizontal'	=> 'horizontal',
				'vertical'		=> 'vertical',
			)
		);
						
		$of_options[] = array(
			"name"	=> __( 'Auto Slideshow', 'wpex-adapt' ),
			"desc"	=> __( 'Do you wish to enable or disable the automatic slideshow', 'wpex-adapt' ),
			"id"	=> "slider_slideshow",
			"std"	=> '1',
			"on"	=> __( 'Enable', 'wpex-adapt' ),
			"off"	=> __( 'Disable', 'wpex-adapt' ),
			"type"	=> "switch"
		);
						
		$of_options[] = array(
			"name"	=> __( 'Randomize Slideshow', 'wpex-adapt' ),
			"desc"	=> __( 'Do you wish to enable or disable random slide order.', 'wpex-adapt' ),
			"id"	=> "slider_randomize",
			"std"	=> '0',
			"on"	=> __( 'Enable', 'wpex-adapt' ),
			"off"	=> __( 'Disable', 'wpex-adapt' ),
			"type"	=> "switch"
		);
						
		$of_options[] = array(
			"name"	=> __( 'Slideshow Speed', 'wpex-adapt' ),
			"desc"	=> __( 'Adjust the slideshow speed of your homepage slider. Time in milliseconds', 'wpex-adapt' ),
			"id"	=> "slider_slideshow_speed",
			"std"	=> "7000",
			"min"	=> "2000",
			"step"	=> "500",
			"max"	=> "20000",
			"type"	=> "sliderui" ,
		);
					
		$of_options[] = array(
			"name"	=>  __( 'Slider Alternate', 'wpex-adapt' ),
			"desc"	=>  __( 'Use this field to insert a shortcode or other HTML to replace the default flexslider', 'wpex-adapt' ),
			"id"	=> "slider_alternative",
			"std"	=> "",
			"type"	=> "textarea",
		);
			
			
		// PORTFOLIO SETTINGS	
		$of_options[] = array(
			"name"	=> __( 'Portfolio', 'wpex-adapt' ),
			"type"	=> "heading"
		);
			
		$of_options[] = array(
				'name'	=> __( 'Custom Portfolio Labels', 'wpex-adapt' ),
				'desc'	=> __( 'Easily change the name of your post type here to say something else.<br /><br /><strong>IMPORTANT</strong>: Refresh your page to see the change live in your dashboard.', 'wpex-adapt' ),
				'id'	=> 'portfolio_labels',
				"std"	=> 'Portfolio',
				'type'	=> 'text'
			);
				
		$of_options[] = array(
			'name'	=> __( 'Custom Portfolio Slug', 'wpex-adapt' ),
			'desc'	=> __( 'Easily change the slug of your post type here to say something else. If you are using a page with the slug "portfolio" and want to use pagination do not set this value to "portfolio" or your pagination will break.<br /><br /><strong>IMPORTANT</strong>: You must re-save your permalinks after changing this setting.', 'wpex-adapt' ),
			'id'	=> 'portfolio_slug',
			"std"	=> 'portfolio-item',
			'type'	=> 'text'
		);
				
		$of_options[] = array(
			'name'	=> __( 'Custom Portfolio Category Slug', 'wpex-adapt' ),
			'desc'	=> __( 'Easily change the slug of your category taxonomy here to say something else. <br /><br /><strong>IMPORTANT</strong>: You must re-save your permalinks after changing this setting.', 'wpex-adapt' ),
			'id'	=> 'portfolio_cat_slug',
			"std"	=> 'portfolio-category',
			'type'	=> 'text'
		);
				
		$of_options[] = array(
			'name'	=> __( 'Custom Portfolio Tag Slug', 'wpex-adapt' ),
			'desc'	=> __( 'Easily change the slug of your tag taxonomy here to say something else. <br /><br /><strong>IMPORTANT</strong>: You must re-save your permalinks after changing this setting.', 'wpex-adapt' ),
			'id'	=> 'portfolio_tag_slug',
			"std"	=> 'portfolio-tag',
			'type'	=> 'text',
		);
				
		$of_options[] = array(
		"name"	=> __( 'Posts Per Page', 'wpex-adapt' ),
								"desc"	=> __( 'How many posts per page to show for this post type archives.', 'wpex-adapt' ),
								"id"	=> "portfolio_pagination",
								"std"	=> '12',
								"type"	=> "text"
						);


			
		// BLOG SETTINGS	
		$of_options[] = array(
			"name"	=> __( 'Blog', 'wpex-adapt' ),
			"type"	=> "heading"
		);	
		
		$of_options[] = array(
			"name"	=> __( 'Custom Blog Title', 'wpex-adapt' ),
			"desc"	=> __( 'Enter your custom blog title. Used for the main heading on single posts. To change your main blog page title edit the page title in your page editor.', 'wpex-adapt' ),
			"id"	=> "blog_title",
			"std"	=> '',
			"type"	=> "text"
		);
			
		$of_options[] = array(
			'name'	=> __( 'Featured Images On Single Posts?', 'wpex-adapt' ),
			'desc'	=> __( 'Display featured images on single blog posts?', 'wpex-adapt' ),
			'id'	=> 'blog_single_thumbnail',
			"std"	=> '1',
				"on"	=> __( 'Enable', 'wpex-adapt' ),
				"off"	=> __( 'Disable', 'wpex-adapt' ),
				"type"	=> "switch"
			); 
			
		$of_options[] = array(
			'name'	=> __( 'Entry Excerpts', 'wpex-adapt' ),
			'desc'	=> __( 'Display excerpts on your standard post entries instead of the full posts?', 'wpex-adapt' ),
			'id'	=> 'blog_exceprt',
			"std"	=> '1',
				"on"	=> __( 'Enable', 'wpex-adapt' ),
				"off"	=> __( 'Disable', 'wpex-adapt' ),
				"type"	=> "switch"
			); 
				
		$of_options[] = array(
			'name'	=> __( 'Display Tags', 'wpex-adapt' ),
			'desc'	=> __( 'Display current post tags at the bottom of standard posts?', 'wpex-adapt' ),
			'id'	=> 'blog_tags',
			"std"	=> '1',
				"on"	=> __( 'Enable', 'wpex-adapt' ),
				"off"	=> __( 'Disable', 'wpex-adapt' ),
				"type"	=> "switch"
		);		

		// FOOTER SETTINGS	
		$of_options[] = array(
			"name"	=> __( 'Footer', 'wpex-adapt' ),
			"type"	=> "heading"
		);
		
		$of_options[] = array(
			'name'	=> __( 'Widgetized Footer', 'wpex-adapt' ),
			'desc'	=> __( 'Display widgetized Footer?', 'wpex-adapt' ),
			'id'	=> 'widgetized_footer',
			"std"	=> '1',
				"on"	=> __( 'Enable', 'wpex-adapt' ),
				"off"	=> __( 'Disable', 'wpex-adapt' ),
				"type"	=> "switch"
		);
						
		$of_options[] = array(
			"name"	=> __( 'Copyright Text', 'wpex-adapt' ),
			"desc"	=> __( 'You can use the following shortcodes in your footer text: [site-title] [site-link] [the-year]', 'wpex-adapt' ),
			"id"	=> "footer_text",
			"std"	=> "",
			"type"	=> "textarea",
		);

		// IMG SIZES
		$of_options[] = array(
			"name"	=> __( 'Image Cropping', 'wpex-adapt' ),
			"type"	=> "heading"
		);

		$images = array(
			'home_slider' => array(
				'label' => __( 'Homepage Slider', 'wpex' ),
				'fold' => 'slides_post_type',
			),
			'entry' => array(
				'label' => __( 'Blog Entry', 'wpex' ),
			),
			'post' => array(
				'label' => __( 'Blog Post', 'wpex' ),
			),
			'portfolio_entry' => array(
				'label' => __( 'Portfolio Entry', 'wpex' ),
				'fold' => 'portfolio_post_type',
			), 
			'portfolio_post' => array(
				'label' => __( 'Portfolio Post', 'wpex' ),
				'fold' => 'portfolio_post_type',
			),
		);

		foreach ( $images as $key => $val ) {
			$fold = isset( $val['fold'] ) ? $val['fold'] : false;

			// Heading
			$heading = array(
				"name"	=> "",
				"desc"	=> "",
				"id"	=> "subheading",
				"std"	=> "<h3 style=\"margin: 0;\">". $val['label'] ."</h3>",
				"icon"	=> true,
				"type"	=> "info",
			);
			if ( $fold ) {
				$heading['fold'] = $fold;
			}
			$of_options[] = $heading;

			// Width
			$width = array(
				"name" => __( 'Width', 'wpex-adapt' ),
				"id"   => $key .'_img_width',
				"std"  => '',
				"type" => "text",
			);
			if ( $fold ) {
				$width['fold'] = $fold;
			}
			$of_options[] = $width;

			// Height
			$height = array(
				"name" => __( 'Height', 'wpex-adapt' ),
				"id"   => $key .'_img_height',
				"std"  => '',
				"type" => "text",
			);
			if ( $fold ) {
				$height['fold'] = $fold;
			}
			$of_options[] = $height;

			// Crop
			$crop = array(
				"name"    => __( 'Crop', 'wpex-adapt' ),
				"id"      => $key .'_img_crop',
				"std"     => '',
				"type"    => "select",
				"options" => $img_crop_locations,
			);
			if ( $fold ) {
				$crop['fold'] = $fold;
			}
			$of_options[] = $crop;

		}

		
		// TRACKING	
		$of_options[] = array(
			"name"	=> __( 'Tracking', 'wpex-adapt' ),
			"type"	=> "heading"
		);
		
		$of_options[] = array(
			"name"	=>	__( 'Tracking Code', 'wpex-adapt' ),
			"desc"	=>	__( 'Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'wpex-adapt' ),
			"id"	=>	"google_analytics",
			"std"	=>	"",
			"type"	=>	"textarea"
		);
					
		// BACKUP
		$of_options[] = array(
			"name"	=> __( 'Backup', 'wpex-adapt' ),
			"type"	=> "heading"
		);
					
		$of_options[] = array(
			"name"	=> __( 'Backup and Restore Options', 'wpex-adapt' ),
			"id"	=> "of_backup",
			"std"	=> "",
			"type"	=> "backup",
			"desc"	=> __( 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.', 'wpex-adapt' ),
		);
						
		$of_options[] = array(
			"name"	=> __( 'Transfer Theme Options Data', 'wpex-adapt' ),
			"id"	=> "of_transfer",
			"std"	=> "",
			"type"	=> "transfer",
			"desc"	=> __( 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".', 'wpex-adapt' ),
		);
				
	}
}
add_action( 'init', 'of_options' );