jQuery(document).ready(function($){
	
	// $.fancybox.defaults.loop = true;

	//Run loop though all vidSlideshows	
	var $root = $('html, body');
	
	$('.videoSlideshow').each(function(){
	var slideshowContainer = $(this);	
	 var slideshows = $('.cycle-slideshow.tourSlideshow',slideshowContainer);


		$('.tourNav',slideshowContainer).owlCarousel({
			items : 5,
			margin : 10,
			nav : true ,
			navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
			loop: true,
			dots : false,
			responsive : {
				0 : {
					items : 2,
				},
				600 : {
					items :3,
				},
				992 : {
					items : 4,
				},
				1200 : {
					items : 5,
				}
			}
			
		});

		$('.tourNav .navIcon',slideshowContainer).click(function(){
			//var index = $('#tourNav').data('cycle.API').getSlideIndex(this);
			var index = $(this).data('index');
			$('.cycle-slide-active .tourVid',slideshowContainer).each(function(){
				var iframe = $('iframe',this);
				var iframeSrc = iframe.attr('src');
				$(iframe).attr('src',iframeSrc);
			});
			slideshows.cycle('goto', index);
			//Scroll up main slide
			$root.animate({
				scrollTop: $($('.slideshowMain',slideshowContainer)).offset().top - 140
			}, 500);
			return false;
			
		});
	
	});
	
});