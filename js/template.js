


//Preloader


	$(window).load(function() {
		$("#status").fadeOut();
		$("#preloader").delay(350).fadeOut("slow");
	}) 

	
/*global $:false */
$(document).ready(function(){"use strict";
	$(".scroll").click(function(event){

		event.preventDefault();

		var full_url = this.href;
		var parts = full_url.split("#");
		var trgt = parts[1];
		var target_offset = $("#"+trgt).offset();
		var target_top = target_offset.top ;

		$('html, body').animate({scrollTop:target_top}, 800);
	});
});			
	
//Home Background Slider	
	
        $(function(){

            $.mbBgndGallery.buildGallery({
							containment:"#home",
							timer:2000,
							effTimer:6000,
							controls:"#controls",
							grayScale:false,
							shuffle:true,
							preserveWidth:false,
							effect:"zoom",
							// effect:{enter:{transform:"scale("+(1+ Math.random()*2)+")",opacity:0},exit:{transform:"scale("+(Math.random()*2)+")",opacity:0}},

							// If your server allow directory listing you can use:
							// (however this doesn't work locally on your computer)

							//folderPath:"testImage/",

							// else:

							images:[
								"images/4.jpg",
								"images/5.jpg",
								"images/6.jpg"
							],

							onStart:function(){},
							onPause:function(){},
							onPlay:function(opt){},
							onChange:function(opt,idx){},
							onNext:function(opt){},
							onPrev:function(opt){}
					});


        });	
	
	
//Home fit screen	
	
	
	/*global $:false */
	$(function(){"use strict";
		$('#home').css({'height':($(window).height())+'px'});
		$(window).resize(function(){
		$('#home').css({'height':($(window).height())+'px'});
		});
	});



			(function() {
	
				function init() {
					var speed = 330,
						easing = mina.backout;

					[].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-hover' )
							};

						el.addEventListener( 'mouseenter', function() {
							path.animate( { 'path' : pathConfig.to }, speed, easing );
						} );

						el.addEventListener( 'mouseleave', function() {
							path.animate( { 'path' : pathConfig.from }, speed, easing );
						} );
					} );
				}

				init();

			})();	



$(document).ready(function() {

			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});	
});






			
	
