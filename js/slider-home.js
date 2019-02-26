jQuery(function($){
	$(window).load(function() {
		$('#home-slider-loader').hide();
		if(flexLocalize.slideshow == "true") flexLocalize.slideshow = true; else flexLocalize.slideshow = false;
		if(flexLocalize.randomize == "true") flexLocalize.randomize = true; else flexLocalize.randomize = false;
		if(flexLocalize.slideshowSpeed !== '') flexLocalize.slideshowSpeed = flexLocalize.slideshowSpeed; else flexLocalize.slideshowSpeed = 7000;
		$('#home-flexslider').flexslider({
			slideshow : flexLocalize.slideshow,
			controlsContainer: ".flex-container",
			randomize : flexLocalize.randomize,
			animation : flexLocalize.animation,
			direction : flexLocalize.direction,
			slideshowSpeed : flexLocalize.slideshowSpeed,
			animationSpeed : 400,
			smoothHeight : true,
			video: true,
			controlNav : false,
			prevText : '<span class="fa fa-chevron-left"></span>',
			nextText : '<span class="fa fa-chevron-right"></span>'
		});		
		
	});
});