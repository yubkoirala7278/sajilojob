"use strict";
/* ==== Jquery Functions ==== */
(function($) {
		
	
	/* ==== Testimonials Slider ==== */	
  	$(".testimonialsList").owlCarousel({      
	   loop:true,
		margin:30,
		nav:false,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:false
			},
			768:{
				items:1,
				nav:false
			},
			1170:{
				items:1,
				nav:false,
				loop:true
			}
		}
  	});
	
	/* ==== employerList Slider ==== */	
  	$(".employerList").owlCarousel({      
	    loop:true,
		margin:20,
		nav:true,
		autoplay : true,
    	autoplayTimeout:2000,
		autoplayHoverPause:true,
		responsive:{
			0:{
				items:3,
				nav:true
			},
			768:{
				items:6,
				nav:true
			},
			1170:{
				items:12,
				nav:true
			}
		}
  	});
	
	
	/* ==== Revolution Slider ==== */
	if($('.tp-banner').length > 0){
		$('.tp-banner').show().revolution({
			delay:6000,
	        startheight:550,
	        startwidth: 1140,
	        hideThumbs: 1000,
	        navigationType: 'none',
	        touchenabled: 'on',
	        onHoverStop: 'on',
	        navOffsetHorizontal: 0,
	        navOffsetVertical: 0,
	        dottedOverlay: 'none',
	        fullWidth: 'on'
		});
	}
	
	
	//Top search bar open/close
    if (!$('.srchbox').hasClass("searchStayOpen")) {
        $("#jbsearch").click(function() {
            $(".srchbox").addClass("openSearch");
            $(".additional_fields").slideDown();
        });


        $(".srchbox").click(function(e) {
            e.stopPropagation();
        });
    }
	
})(jQuery);