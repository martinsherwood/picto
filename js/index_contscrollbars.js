$(document).ready(function(){

	//variable to hold scroll type
	var slideDrag,
	//width of .scroll-content ul
	slideWidth = 680,
	//animation speed (ms)
	slideSpeed = 800,
	animated = false;
	
	//initialize sliders
	$(".scrollSlider").slider({
		animate: slideSpeed,
		start: checkType,
		slide: doSlide,
		change: doSlide,
		max: slideWidth
	});
	
	//set sliders to start on reload
	$(".scrollSlider").each(function(index){
		$(this).slider("value", 680 / 680);
	});
	
	$(".scrollSlider").each(function(index){
		$(this).slider("value", 680 / 680);
	});
	
	function checkType(e){
		slideDrag = $(e.originalEvent.target).hasClass("ui-slider-handle"); //jquery ui class
	}
	
	function doSlide(e, ui){
		var target = $(e.target).prev(".dynamicCont"),
		maxScroll = target.attr("scrollWidth") - target.width();
		
		//check for drag or click
		if (e.type == 'slide'){
			//was it a click or drag?
			if (slideDrag === true){
				//match position
				target.attr({scrollLeft: ui.value * (maxScroll / slideWidth) });
			}
			else{
				//do a nice animation to clicked position
				target.stop().animate({scrollLeft: ui.value * (maxScroll / slideWidth) }, slideSpeed);
			}
			animated = true;
		}
		else{
			if (animated === false){
				target.stop().animate({scrollLeft: ui.value * (maxScroll / slideWidth) }, slideSpeed);
			}
			animated = false;
		}
	}
	
});