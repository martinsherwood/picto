$(document).ready(function() {
    $('.thumb img').each(function() {
        var maxWidth = 200;
        var maxHeight = 200;
        var ratio = 0;
        var width = $(this).width();
        var height = $(this).height();
 
        //check if the current width is larger than the max
        if(width > maxWidth){
            ratio = maxWidth / width;
            $(this).css("width", maxWidth);
            $(this).css("height", height * ratio);
            height = height * ratio;
            width = width * ratio;
        }
 
        //check if current height is larger than max
        if(height > maxHeight){
            ratio = maxHeight / height; // get ratio for scaling image
            $(this).css("height", maxHeight);
            $(this).css("width", width * ratio);
            width = width * ratio;
        }
    });
});

/*thumbnail functions starts here*/
$(document).ready(function($) {
	
$.fn.thumbs = function(options) {
	var $thumbs = this;
	
	if (options == 'destroy') {
		return Thumbs.destroy($thumbs);
	}
	
	if( $thumbs.data('thumbs') ) {
		return $thumbs;
	}
	
	var center = {},
	defaults = {
		center: true,
		classNames: {
			center: 'thumb-center',
			container: 'thumb-container',
			icon: 'thumb-icon',
			img: 'thumb-img',
			inner: 'thumb-inner',
			strip: 'thumb-strip'
		},
		html: '<span class="%container%"><span class="%inner%"><span class="%img%"></span><span class="%strip%">%strip_content%</span><span class="%icon%"></span></span></span>',
		strip: true
	};
	
	options = $.extend(true, {}, defaults, options);
	
	return $thumbs.each(function(){
		var $thumb = $(this),
		c = options.classNames,
		clone = $thumb.clone(true),
		html = new String(options.html),
		centered = false,
		strip = '';
		
		for (className in c) {
			var newClassName = c[className];
			
			if ( options.center && !centered && className == 'container' ) {
				newClassName = c.container + ' ' + c.center;
				centered = true;
			}
			
			html = html.replace('%' + className + '%', newClassName);
		}
		
		if (options.strip) {
			strip = $thumb.is('img') ? $thumb.attr('alt') : $thumb.find('img').attr('alt');
			strip = strip != undefined ? strip : $thumb.attr('title');
			strip = strip != undefined ? strip : '';
		}
		
		html = html.replace('%strip_content%', strip);
		
		$thumb.wrap( html );
		
		if (options.center) {
			Thumbs.centerImg( $thumb );
		}
		
		var data = {
			'container': $thumb.parents('.' + c.container),
			'raw': clone
		};
		
		$thumb.data('thumbs', data);
	});
};


var Thumbs = {

	/*positioning*/
	centerImg: function($thumb) {
		var $img = $thumb.is('img') ? $thumb : $thumb.find('img'),
		css = {
			left: '-' + ( parseInt( $img.css('width') ) / 2 ) + 'px',
			top: '-' + ( parseInt( $img.css('height') ) / 2 ) + 'px'
		};
	
		$img.css( css );
	
		return $thumb;
	},

	/*remove un-needed html*/
	destroy: function($thumbs) {
		$thumbs.each(function(index) {
			var $thumb = $(this),
			data = $thumb.data('thumbs');
			
			if (!data) {
				return;
			}
			
			data.container.after(data.raw).remove();
		});
	}

}

})(jQuery);