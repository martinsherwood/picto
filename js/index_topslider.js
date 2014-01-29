$(document).ready(function() {

	$(".paging").show();
	$(".paging a:first").addClass("active");
	
	var imageWidth = $(".window").width();
	var imageSum = $(".imageReel img").size();
	var imageReelWidth = imageWidth * imageSum;
	
	//size of slider
	$(".imageReel").css({'width' : imageReelWidth});
	
	rotate = function(){	
		var triggerID = $active.attr("rel") - 1; //slide times
		var image_reelPosition = triggerID * imageWidth;

		$(".paging a").removeClass('active');
		$active.addClass('active'); //page active
		
		//1 second slide time
		$(".imageReel").animate({ 
			left: -image_reelPosition
		}, 1000 );
		
	};
	
	rotateSwitch = function(){		
		play = setInterval(function(){
			$active = $('.paging a.active').next();
			if ( $active.length === 0) {
				$active = $('.paging a:first');
			}
			rotate();
		}, 6000); //stay on each image for 6 seconds
	};
	
	rotateSwitch();
	
	$(".image_reel a").hover(function() {
		clearInterval(play); //stop on hover
	}, function() {
		rotateSwitch();
	});	
	
	$(".paging a").click(function() {	
		$active = $(this);
		//reset
		clearInterval(play);
		rotate();
		rotateSwitch();
		return false;
	});	
	
});