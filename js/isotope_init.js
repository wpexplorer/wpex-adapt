jQuery(function($){
	$(window).load(function() {

			/*main function*/
			var $container = $('.portfolio-content');

			if ( $container.length ) {

				if ( 'undefined' !== typeof $.fn.imagesLoaded ) {
					$container.imagesLoaded( function() {
						$container.isotope({
							itemSelector: '.portfolio-item'
						});
					});
				}

				/*filter*/
				$('.filter a').click(function(){
					var selector = $(this).attr('data-filter');
					$container.isotope({ filter: selector });
					$(this).parents('ul').find('a').removeClass('active');
					$(this).addClass('active');
					return false;
				});

			}

	});

});