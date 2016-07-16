$(document).ready(function($) {
	$('#gal-slider').flexslider({
		animation: "fade",
		slideshow: false,                
		directionNav: true,
		controlsContainer: ".gal-wrap",
		controlNav: true,
		manualControls: ".gal-nav li"
	});

$('.flex-prev').on('click', function(){
    $('#gal-slider').flexslider('prev')
    return false;
})

$('.flex-next').on('click', function(){
    $('#gal-slider').flexslider('next')
    return false;
})

});
