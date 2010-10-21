jQuery.noConflict();

jQuery(document).ready(function() {

	/* Font Replacement */
	Cufon.replace('h1:not(#logo), h2:not(.post-title), h3, h4, h5, h6, .meta, .dropcap, .dropcap-bg, .question, .commenter, .button-big, .button-big-unselected, .bar-info-box, ul.tabs li a, .toggle-title, .price-tag', { fontFamily: 'Cufon', hover: true });
	Cufon.replace('#sub-header-content h2, .title, .portfolio-browse, .post-title, .related-posts-title, #author-title', { fontFamily: 'Cufon Light', hover: true });	


	/* Dropdown menu using superfish */
	jQuery('.nav').supersubs({
		minWidth: 12,
		maxWidth: 25,
		extraWidth: 1
	}).superfish({
		delay: 1000,
		animation: { opacity: 'show', height: 'show' },
		speed: 'fast',
		autoArrows: false 
	})
	.find('ul')
	.bgIframe({ 
		opacity: false 
	});


	/* Quicksand animation and filtering of the Portfolio */
	var $data = jQuery(".portfolio-3-columns-list, .portfolio-4-columns-list").clone();

	jQuery('.portfolio-filters li').click(function(e) {

		jQuery(".portfolio-filters li a").addClass("button-unselected");
		jQuery(".portfolio-filters li a").removeClass("button");	

		jQuery(".portfolio-3-columns-list span.lightbox-image, .portfolio-4-columns-list span.lightbox-image").remove();	
		jQuery(".portfolio-3-columns-list span.lightbox-video, .portfolio-4-columns-list span.lightbox-video").remove();	

		var filterClass = jQuery(this).attr('class');

		if (filterClass == 'all') {
			var $filteredData = $data.find('.portfolio-item');
		} else {
			var $filteredData = $data.find('.portfolio-item[data-type*=' + filterClass + ']');
		}

		jQuery('.portfolio-3-columns-list, .portfolio-4-columns-list').quicksand($filteredData, {
			duration: 800,
			easing: 'easeInOutQuad',
			adjustHeight: 'dynamic',
			enhancement: function() {
				if(jQuery.browser.mozilla || jQuery.browser.opera) {
					// FIX for FF and Opera rounded corners
					jQuery('.portfolio-item img').addClass('rounded-top');

					// FF and Opera rounded corners of images
					jQuery('.portfolio-item img.rounded-top').rounded();
				}
			}
		}, function(){
			// end callback
			SetLightbox(true);
		});

		jQuery(this).children('a').removeClass("button-unselected");
		jQuery(this).children('a').addClass("button");

		return false;
	});


	/* Ajax Contact form validation and submit */
	jQuery('form#contactForm').submit(function() {
		jQuery('form#contactForm .error').remove();
		var hasError = false;
		jQuery('.requiredField').each(function() {
			if(jQuery.trim(jQuery(this).val()) == '') {
				jQuery(this).addClass('input-error');
				hasError = true;
			} else if(jQuery(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
					jQuery(this).addClass('input-error');
					hasError = true;
				}
			}
		});
		if(!hasError) {
			jQuery('form#contactForm #unisphere-submit').fadeOut('normal', function() {
				jQuery('.sending-message').show('normal');
			});
			var formInput = jQuery(this).serialize();
			jQuery.ajax({
				type: "POST",
				url: jQuery(this).attr('action'),
				data: formInput,
				success: function(data){
					jQuery('#contact-form').fadeOut("normal", function() {
						jQuery('.success-sending-message').show('normal');
					});
				},
				error: function(data){
					jQuery('#contact-form').fadeOut("normal", function() {
						jQuery('.error-sending-message').show('normal');
					});
				}
			});
		}
		
		return false;
		
	});
	
	jQuery('.requiredField').blur(function() {
		if(jQuery.trim(jQuery(this).val()) != '' && !jQuery(this).hasClass('email')) {
			jQuery(this).removeClass('input-error');
		} else {
			jQuery(this).addClass('input-error');
		}
	});
	
	jQuery('.email').blur(function() {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if(emailReg.test(jQuery.trim(jQuery(this).val()))) {
			jQuery(this).removeClass('input-error');
		} else {
			jQuery(this).addClass('input-error');
		} 
	});	
		
	
	/* Search Watermark */
	var watermark = jQuery("meta[name=search]").attr('content');
	if (jQuery(".search").val() == "") {
		jQuery(".search").val(watermark);
	}
	
	jQuery(".search")
		.focus(	function() {
			if (this.value == watermark) {
				this.value = "";
			}
		})
		.blur(function() {
			if (this.value == "") {
				this.value = watermark;
			}
		});

	/* Remove empty #comments div */
	if(jQuery.trim(jQuery("#comments").text()) == "") {
		jQuery("#comments").remove();
	}
	
	/* Tabs */
	jQuery(".tab-content").hide(); //Hide all content
	jQuery(".tab-container > br").remove(); //Hide all content

	jQuery("ul.tabs").each( function() {
		jQuery(this).find("li:first").addClass("active"); //Activate first tab
	});
	
	jQuery(".tab-container").each( function() {
		jQuery(this).find(".tab-content:first").show(); //Show first tab content
	});

	jQuery("ul.tabs li").click(function() {
		jQuery(this).parent().find('li.active').removeClass("active");
		Cufon.replace('ul.tabs li a', { fontFamily: 'Cufon', hover: true });
		jQuery(this).addClass("active"); //Add "active" class to selected tab
		jQuery(this).parent().next().find(".tab-content").hide(); //Hide all tab content

		var activeTabIndex = (jQuery(this).find("a").attr("href")).replace('#tab', ''); //Find the href attribute value to identify the active tab + content
		
		var activeTabContent = jQuery(this).parent().next().find("div.tab-content:nth-child(" + activeTabIndex + ")");
		activeTabContent.fadeIn(); //Fade in the active ID content
		
		// A fix for firefox rounded corners on images
		if(jQuery.browser.mozilla || jQuery.browser.opera) {			
			activeTabContent.find('span.rounded-all > img.rounded-all, span.rounded-top > img.rounded-top, span.rounded-bottom > img.rounded-bottom, span.rounded-left > img.rounded-left, span.rounded-right > img.rounded-right').each( function() {
				jQuery(this).unwrap().show();				
				jQuery(jQuery(this)).rounded();					
			});
			
			activeTabContent.find("span.lightbox-image, span.lightbox-video").remove();				
			activeTabContent.find("a[rel^='lightbox'] img").each( function() {   
				SetPlayIcon(jQuery(this));
			});
		}
		return false;
	});
	
	/* Toggle */
	jQuery(".toggle-container .toggle-content").hide(); //Hide (Collapse) the toggle containers on load
	jQuery(".toggle-container .toggle-sign").text('+'); //Add the + sign on load

	jQuery(".toggle-container .toggle-content").each( function() {
		jQuery(this).css('width', jQuery(this).parent().width() - 30 );
	});
		
	jQuery(".toggle-container .toggle").toggle(function() {
		jQuery(this).find('.toggle-sign').text('-');
		jQuery(this).next(".toggle-content").slideToggle();
		
		// A fix for firefox rounded corners on images
		if(jQuery.browser.mozilla || jQuery.browser.opera) {	
			var toggleContent = jQuery(this).parent().find(".toggle-content");
			toggleContent.find('span.rounded-all > img.rounded-all, span.rounded-top > img.rounded-top, span.rounded-bottom > img.rounded-bottom, span.rounded-left > img.rounded-left, span.rounded-right > img.rounded-right').each( function() {
				jQuery(this).unwrap().show();				
				jQuery(jQuery(this)).rounded();					
			});
			
			toggleContent.find("span.lightbox-image, span.lightbox-video").remove();
			toggleContent.find("a[rel^='lightbox'] img").each( function() {   
				SetPlayIcon(jQuery(this));
			});
		}
	}, function() {
		// A fix for firefox rounded corners on images
		if(jQuery.browser.mozilla || jQuery.browser.opera) {	
			jQuery(this).next(".toggle-content").find("span.lightbox-image, span.lightbox-video").remove();				
		}

		jQuery(this).find('.toggle-sign').text('+');
		jQuery(this).next(".toggle-content").slideToggle();
	});
	
	/* Required to style post page links similar to the wp-pagenavi ones */
	jQuery('.post_linkpages a span').each( function() {                                  
        jQuery(this).parent().html(jQuery(this).html());
    });
    jQuery('.post_linkpages span').addClass('current');
	
	/* Pricing Table */
	jQuery(".price-table > br").remove();
	jQuery(".price-table .price-column:nth-child(even)").addClass('price-column-even');
	jQuery(".price-column li:nth-child(even)").addClass('even');
	
	jQuery(".price-table").each( function() { 
        jQuery(this).find('.price-column:first').addClass('price-column-first');
    });
	
	jQuery(".price-table").each( function() { 
        jQuery(this).find('.price-column:last').addClass('price-column-last');
    });
});

/* After the page has loaded... */
jQuery(window).load(function() {

	/* Insert the footer of the inner page sliders using javascript */
	jQuery('.slider').after('<div class="slider-footer"></div>');
	
	/* Rounded images for FF and Opera */
	jQuery('img.rounded-all, img.rounded-top, img.rounded-bottom, img.rounded-left, img.rounded-right').rounded();
	
	/* Apply lightbox */
	SetLightbox(false);
	
});


function SetLightbox($load) {
	
	/* Display a open icon when mouse hover lightbox images */
	jQuery("a[rel^='lightbox'] img").not("#slider-full-width img, #slider img, #stage-slider img, .slider img").each( function() {   
		
		if ($load) {
			jQuery(this).load(function() {
				SetPlayIcon(jQuery(this));
			});
		} else {
			SetPlayIcon(jQuery(this));			
		}
		
	});

	/* PrettyPhoto */
	jQuery("a[rel^='lightbox']").prettyPhoto({
		theme: 'facebook'
	});
	
	/* PrettyPhoto */
	jQuery("a[rel^='lightbox']").css('position', 'relative');
	
	
	/* Reduce opacity when mouse hover lightbox images */
	jQuery("a[rel^='lightbox'] img").not("#slider-full-width img, #slider img, #stage-slider img, .slider img").hover(function() {
		jQuery(this).stop().fadeTo("normal", 0.5); // This sets the opacity to 60% on hover
	},function(){
		jQuery(this).stop().fadeTo("normal", 1.0); // This sets the opacity back to 100% on mouseout
	});
	

	/* FF and Opera mouse over of SPAN instead of a IMG */	
	jQuery("a[rel^='lightbox'] span.rounded-all, a[rel^='lightbox'] span.rounded-top, a[rel^='lightbox'] span.rounded-bottom, a[rel^='lightbox'] span.rounded-left, a[rel^='lightbox'] span.rounded-right").live('mouseover mouseout', function(event) {
		if (event.type == 'mouseover') {
			jQuery(this).stop().fadeTo("normal", 0.5); // This sets the opacity to 60% on hover
		} else {
			jQuery(this).stop().fadeTo("normal", 1.0); // This sets the opacity back to 100% on mouseout
		}
	});

}

function SetPlayIcon($element){
	
	var $lightbox = $element.parent("a[rel^='lightbox']");
	var $image = $element;
	
	/* FF and Opera image parent may be a SPAN tag to apply rounded corners */
	if ($lightbox.length == 0) {
		$lightbox = $element.parent().parent("a[rel^='lightbox']");
		$image = $element.parent();
	}
	
	$image.css("position", "relative");

	var $class = '';

	if($lightbox.attr('href').match(/(jpg|gif|jpeg|png|tif)/)) {
		$class = 'lightbox-image';
	} else {
		$class = 'lightbox-video';
	}

	if ($image.length > 0) {

		var $span = jQuery("<span class='" + $class + "' style='top: 0; left: 0;'></span>").appendTo($lightbox);
		
		$image.bind('mouseenter', function(){
			$height = $image.height();
			$width = $image.width();
			$span.css({
				height:$height,
				width:$width,
				top:0,
				left:0
			});
		});
	}
}

/* This applies rounded corners to images in FF and Opera (FF 4.0 won't need this hack) */
(function($){  
	$.fn.extend({   
	
		rounded: function() {  

			return this.each(function() {  
	
				var $element = $(this);
				var _class = $(this).attr('class');
				
				$element.show();
				
				if($.browser.mozilla || $.browser.opera) {
					$element.wrap(function() {
						return '<span style="background-image:url(' + $element.attr('src') + '); height: ' + $element.height() + 'px; width: ' + $element.width() + 'px;" class="' + _class + '" />';
					}).hide();
				}
			});
		}
	});
})(jQuery); 

/* Event triggered before every stage slider transition */
function onCycleBefore() {
	// By default resume the slider, if a video exists it will pause it
	jQuery('#stage-slider').cycle('resume'); // go to next slider item
	
	// Search for an embeded video and remove it
	var element = jQuery(this).parent().find('object');
	element.wrap(function() {
		return '<div id="object' + element.attr('id') + '" />';
	}).remove();
	
	// Now create a video if it's present on this slider item
	createVideo(jQuery(this).find('.stage-slider-video'));
}

/* Function to embed a video in the stage slider */
function createVideo(element) {
	if(element.length) { // if element exists
		jQuery('#stage-slider').cycle('pause'); // pause the slider until video finishes
		var video_id = GetVideoId(element.attr('videourl'));
		var player_id = element.find('div').attr('id');					
		var _url = element.attr('videourl');
		var unisphere_js = jQuery("meta[name=unisphere_js]").attr('content');
		
		if(_url.match(/(youtube)/)) {
			var params = { allowScriptAccess: "always", allowfullscreen: "true", wmode: 'transparent' };
			var atts = { id: player_id };
			swfobject.embedSWF("http://www.youtube.com/v/" + video_id + "?enablejsapi=1&fs=1&playerapiid=" + player_id, player_id, "100%", "100%", "8", unisphere_js + "/expressinstall.swf", null, params, atts);
		} else if(_url.match(/(vimeo)/)) {
			var flashvars = {
				clip_id: video_id,
				fullscreen: 1,
				show_portrait: 1,
				show_byline: 1,
				show_title: 1,
				js_api: 1, // required in order to use the Javascript API
				js_onLoad: 'vimeo_player_loaded', // moogaloop will call this JS function when it's done loading (optional)
				js_swf_id: player_id // this will be passed into all event methods so you can keep track of multiple moogaloops (optional)
			};
			var params = { allowscriptaccess: 'always', allowfullscreen: 'true', wmode: 'transparent' };
			var attributes = {};
			
			// For more SWFObject documentation visit: http://code.google.com/p/swfobject/wiki/documentation
			swfobject.embedSWF("http://vimeo.com/moogaloop.swf", player_id, "100%", "100%", "9.0.0", unisphere_js + "/expressinstall.swf", flashvars, params, attributes);
		} else {
			flowplayer(player_id, 
				{ 
					src: unisphere_js + "/flowplayer-3.2.4.swf",
					cachebusting: true, 
					wmode: 'transparent' 
				},
				{
					clip: {					
						url: _url,
						autoPlay: false,
						scaling: 'fit'
					},							
					onLoad: function() {
						this.play();
					},
					onFinish: function() {
						jQuery('#stage-slider').cycle('next'); // go to next slider item
					}
				}
			);
		}
	}
}

function onYouTubePlayerReady(playerId) {
	ytplayer = document.getElementById(playerId); // Get the reference to the video			
	ytplayer.playVideo(); // start the video				
	ytplayer.addEventListener("onStateChange", "onytplayerStateChange"); // add onStateChange event listener
}
	
function onytplayerStateChange(newState) {
	if(newState == '0') { // Video has ended
		jQuery('#stage-slider').cycle('next'); // go to next slider item
	}
}

function vimeo_player_loaded(playerId) {
	vmplayer = document.getElementById(playerId); // Get the reference to the video			
	vmplayer.api_play(); // start the video				
	vmplayer.api_addEventListener('onFinish', 'vimeo_on_finish'); // add onStateChange event listener
}

function vimeo_on_finish(playerId) {
	jQuery('#stage-slider').cycle('next'); // go to next slider item
}

/* Extract video id */
function GetVideoId(url) {
	var videoId;

	if(url.match(/(youtube)/)) {
		videoId = url.replace(/^[^v]+v.(.{11}).*/,"$1"); // Youtube Video
	} else if(url.match(/(vimeo)/)) {
		var re = new RegExp('/[0-9]+', "g");
		var match = re.exec(url);
		videoId = match[0].substring(1);
	} else {
		videoId = false;
	}

	return videoId;
}