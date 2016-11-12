jQuery( function( $ ) {

	$( document ).ready( function( ) {
		
		// Responsive videos
		$( '.fitvids' ).fitVids();
		
		// Superfish dropdowns
		$( 'ul.sf-menu' ).superfish({
			cssArrows : false,
			delay     : 200,
			animation : {
				opacity : 'show',
				height  : 'show'
			},
			speed     : 'fast',
			disableHI : true
		} );
		
		// back to top
		$( 'a.scroll-top' ).click( function( ) {
			$( 'html, body' ).animate({scrollTop:0}, 200);
			return false;
		} );
	
		// Comment scroll
		$( 'li.comments-scroll a' ).click( function( event ) {
			event.preventDefault();
			$( 'html,body' ).animate( {
				scrollTop:$( this.hash ).offset().top
			}, 'normal' );
		} );
		
		// Lightbox
		$( '.prettyphoto-link' ).prettyPhoto( {
			theme              : 'pp_default',
			animation_speed    :'fast',
			allow_resize       : true,
			keyboard_shortcuts : true,
			show_title         : false,
			social_tools       : false,
			autoplay_slideshow : false
		} );
			
		$( "a[rel^='prettyphoto']" ).prettyPhoto( {
			theme              : 'pp_default',
			animation_speed    : 'fast',
			allow_resize       : true,
			keyboard_shortcuts : true,
			show_title         : false,
			slideshow          : 3000,
			social_tools       : false,
			autoplay_slideshow : false,
			overlay_gallery    : true
		} );
		
		// Mobile menu
		var $nav = $( '#masternav .masternav-menu' );
		if ( $nav.length ) {
			$nav.slicknav( {
				appendTo         : '#masternav',
				label            : wpexLocalize.mobileMenuText,
				allowParentLinks : true
			} );
		}

	} );
} );