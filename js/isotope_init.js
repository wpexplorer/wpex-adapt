jQuery(function($){
	$(window).load(function() {

			/*main function*/
			function wpexPortfolioIsotope() {
				var $container = $('.portfolio-content');
				$container.imagesLoaded(function(){
					$container.isotope({
						itemSelector: '.portfolio-item'
					});
				});
			} wpexPortfolioIsotope();
			
			/*filter*/
			$('.filter a').click(function(){
			  var selector = $(this).attr('data-filter');
				$('.portfolio-content').isotope({ filter: selector });
				$(this).parents('ul').find('a').removeClass('active');
				$(this).addClass('active');
			  return false;
			});
			
			/*resize*/
			var isIE8 = $.browser.msie && +$.browser.version === 8;
			if (isIE8) {
				document.body.onresize = function () {
					wpexPortfolioIsotope();
				};
			} else {
				$(window).resize(function () {
					wpexPortfolioIsotope();
				});
			}
			
			// Orientation change
			window.addEventListener("orientationchange", function() {
				wpexPortfolioIsotope();
			});
		
	});
});