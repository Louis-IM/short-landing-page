jQuery( document ).ready(function($) {

	// menu-toggles
	$('.menu-toggle, .close-link, #toggler').on('click',function(){
		  $('body').toggleClass('menuopen');
	});
	
	$(window).resize(function(){
		  $('body').removeClass('menuopen');
	});
	
	$('.portalToggle').click(function(){
		$(this).next('.menu').slideToggle();
	});
	$('#menu-main li.menu-item-has-children .arrow').on('click',function(e){
		$(this).parent('li').toggleClass('open');
		e.stopPropagation();
	});
	$('#menu-side li.menu-item-has-children .arrow').on('click',function(e){
		$(this).parent('li').toggleClass('open');
		e.stopPropagation();
	});

	$('#menu-main li.current-menu-ancestor').addClass('open');
	$('#menu-main li.menu-item-has-children.current-menu-ancestor').addClass('open');
	$('#menu-side li.current-menu-ancestor').addClass('open');
	$('#menu-side li.menu-item-has-children.current-menu-ancestor').addClass('open');
	$('#menu-side li.menu-item-has-children.current-menu-item').addClass('open');
	
	$('#menu-main a').click(function(e){
		e.stopPropagation();
	});
	// end-menu-toggles
	
	$('.faq-question').on('click',function(){
		var faq = $(this).parents('.faq');
		var faqgroup = $(this).parents('.faqs');
		$('.faq',faqgroup).not(faq).removeClass('open');
		$('.faq',faqgroup).not(faq).children('.faq-answer').slideUp();
		$(faq).toggleClass('open');
		$(faq).children('.faq-answer').slideToggle();
	});
	
	$('.search-toggle').on('click',function(){
		  $('.search-form-holder').fadeToggle();
	});
	
	$('.search-form-holder .searchform .searchSubmit').click(function(e){
     var parentContainer = $(this).parents('.searchform');
	 //prevent default if there is no value
	  if($('#s',parentContainer).val() == ''){
		  e.preventDefault();		  
		  if($(parentContainer).hasClass('openSearch')){
			$(parentContainer).removeClass('openSearch');		
		 }else{
		  $(parentContainer).addClass('openSearch');
		 } 
	  } 
	 
     
	
   });
   
	   //smooth anchor scrolling
	   /*
	  var $root = $('html, body');
	  $('a.bodyAnchor').click(function() {
		$root.animate({
			scrollTop: $( $.attr(this, 'href') ).offset().top - 40
		}, 500);
		return false;
	  });
	  $(document).on('click', 'a[href^="#"]', function (event) {
		event.preventDefault();

		$('html, body').animate({
			scrollTop: $($.attr(this, 'href')).offset().top
		}, 500);
		});
	  
	  */
	var fixHeader =  function(){
	var windowHeight = $(window).height();
	if($(window).scrollTop() < 150) {
	$('body').removeClass('fixedHeader');
	}
	else {
	$('body').addClass('fixedHeader');
	} 
	  }
	$(document).ready(fixHeader);
	$(window).scroll(fixHeader);  

	$('a[data-fancybox]').fancybox();

	$('.acreds.owl-carousel').owlCarousel({
		loop:true,
		autoplay:false,
		margin:15,
		nav:true,
		responsive:{
			0:{
				items:2
			},
			480:{
				items:4
			},
			480:{
				items:3
			},
			992:{
				items:4
			},
			1200: {
				items: 4
			}
		}
	});

	$('.calloutCarousel cycle-slideshow').on('cycle-initialized', function(event, opts){
		$(this).addClass('initialized');
	});


/*
	function philImg(){
		philLeft = $('img.phil-space').closest('.col2').css('padding-left');
		philOffset = $('img.phil-space').closest('.col2').offset(); 
		philOffsetLeft = philOffset.left;
		philOffsetWidth = $(window).width() - philOffsetLeft;
		$('img.phil-space').closest('p').css('margin', '0px');
		$('img.phil-space').css('margin', '0px');
		$('img.phil-space').css('max-width', 'none');
		$('img.phil-space').css('transform', 'translate(-' + philLeft + ', 0)');
		$('img.phil-space').css('width', philOffsetWidth + 'px');
		$('img.phil-space').css('position', 'absolute');
		$('img.phil-space').css('bottom', '0');
		philNewHeight = $('img.phil-space').height();
		$('img.phil-space').closest('.col2').css('padding-bottom', philNewHeight);
	}
	
	philImg()
	
	$( window ).resize(function() {
	  philImg()
	});
*/
	//Telephone Link
	$('.telephoneLink a').click(function(){
		var teltext = $('span.cont',this);
		var telno = $('span.number',this);
		$(this).addClass('telOpen');
	});
	$('.imgBlockCar').owlCarousel({
		loop:true,
		autoplay:true,
		margin:0,
		nav:true,
		responsive:{
			0:{
				items:2
			},
			600:{
				items:3
			},
			992:{
				items:4
			},
			1200: {
				items: 4,
				margin:0,
			}
		}
	});
});
