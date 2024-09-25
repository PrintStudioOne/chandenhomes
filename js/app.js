jQuery(document).ready(function($) {


//*** Smooth Scroll ***
  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });//End Smooth Scroll

//*** Scroll to Top *** use with less *** use with html ***
  $(window).scroll(function() {
      if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
          $('#return-to-top').fadeIn(200);    // Fade in the arrow
      } else {
          $('#return-to-top').fadeOut(200);   // Else fade out the arrow
      }
  });

  $('#return-to-top').click(function() {      // When arrow is clicked
      $('body,html').animate({
          scrollTop : 0                       // Scroll to top of body
      }, 500);
  });//End Scroll to Top

//*** Flexslider ***
  var $flexslider = $('.flex-slider');
  $flexslider.flexslider({
    smoothHeight: false,
	slideshow: true,
  animation: 'slide',
	controlNav: false,
	directionNav: true,
    useCSS: false /* Chrome fix*/
  });// End Flexslider

//*** Flexslider ***
  var $flexslider = $('.flex-slider2');
  $flexslider.flexslider({
    smoothHeight: false,
    animationSpeed: 2000,
    slideshowSpeed: 10000,
	slideshow: true,
  animation: 'slide',
	controlNav: true,
	directionNav: true,
    useCSS: false /* Chrome fix*/
  });// End Flexslider


// Accordion
$(".panel").hide();
$(".accordion").click(function() {
  $(this).children(".arrow").toggleClass("rotate");
  $(this).next().slideToggle();
});

// *** Fancy Box ***
  $(".fancybox").fancybox({
    openEffect  : 'none',
    closeEffect : 'none',
    'width'   : '95%',
   'height' : '85%',
   'autoScale' : false
  });

  $('#toggle').click(function() {
   $(this).toggleClass('active');
   $('#overlay').toggleClass('open');
  });

// Closes overlay menu after clicking on the menu link
  $('#site-navigation3 ul li a').on("click", function (e) {
  $('#toggle').click();
});

$('#accordion').find('.accordion-toggle').click(function(){

      //Expand or collapse this panel
      $(this).next().slideToggle('fast');

      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp('fast');

    });


    //About block slider
  // $( window ).load(function() {
    // $(".giving").addClass("active").removeClass("about-button").removeClass("load-about");
    $("#about .about-block").slideUp();
    $("#about .giving-block").addClass("active-block").slideDown();
  // });

  $(".about-button").on( "click", function( event ) {

  	$('html, body').animate({
  		scrollTop: $('#about').offset().top -50
  	}, 400);

  	// event.preventDefault();
  	$(this).siblings(".active").removeClass("active").addClass("about-button");
  	$(this).addClass("active").removeClass("about-button");
  	if ($(this).hasClass("giving")) {
  		$("#about .active-block").removeClass("active-block").slideUp();
  		$("#about .giving-block").addClass("active-block").slideDown("slow");
  	} else if ($(this).hasClass("board")) {
  		$("#about .active-block").removeClass("active-block").slideUp();
  		$("#about .board-block").addClass("active-block").slideDown("slow");
  	} else if ($(this).hasClass("reports")) {
  		$("#about .active-block").removeClass("active-block").slideUp();
  		$("#about .reports-block").addClass("active-block").slideDown("slow");
  	} else if ($(this).hasClass("member")) {
  		$("#about .active-block").removeClass("active-block").slideUp();
  		$("#about .member-block").addClass("active-block").slideDown("slow");
  	}
  });


// $(window).scroll(function() {
//   if ($(window).width() >= 992) {
//
//     if ($(this).scrollTop() > 100) {
//       $('.site-logo').fadeIn(100).css("transform", "scale(.8)");
//       $('#site-navigation ul li a').fadeIn(100).css("font-size", "14px");
//     } else {
//       $('.site-logo').fadeIn(100).css("transform", "scale(1)");
//       $('#site-navigation ul li a').fadeIn(100).css("font-size", "15px");
//     }
//   }
//
//   else {
//
//   }
// });

// Clone Navigation
// var clonedDiv = $('#masthead').clone();
//   clonedDiv.attr("class", "site-header clone");
//   $('#masthead').after(clonedDiv);
//
//   $("#masthead.clone").hide();
//   $(window).scroll(function(){
//     if ($(this).scrollTop() > 500) {
//       $('#masthead.clone').fadeIn(500);
//       $('.button_container').addClass('white-btn');
//     } else {
//       $('#masthead.clone').fadeOut(500);
//       $('.button_container').removeClass('white-btn');
//     }
//   });

// Clone Navigation
// var clonedDiv = $('#masthead-prop').clone();
//   clonedDiv.attr("class", "site-header clone");
//   $('#masthead-prop').after(clonedDiv);
//
//   $("#masthead-prop.clone").hide();
//   $(window).scroll(function(){
//     if ($(this).scrollTop() > 500) {
//       $('#masthead-prop.clone').fadeIn(500);
//       $('.button_container').addClass('white-btn');
//     } else {
//       $('#masthead.clone').fadeOut(500);
//       $('.button_container').removeClass('white-btn');
//     }
//   });
$('.portfolio-item-slider-mb').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  infinite: false,
});

  $('.portfolio-item-slider').on('init', function(event, slick, currentSlide){
  var nrCurrentSlide = slick.currentSlide + 1, // din cauza ca e array si incepe de la 0
      totalSlidesPerPage = nrCurrentSlide + 3; // daca ai 5 thumb-uri pe pagina pui + 4
  $('.controls').html(nrCurrentSlide + " - " + totalSlidesPerPage + " of " + slick.slideCount);
});

$('.portfolio-thumb-slider').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  asNavFor: '.portfolio-item-slider',
  dots: false,
  arrows: true,
  focusOnSelect: true,
  infinite: false
});

$('.portfolio-item-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  asNavFor: '.portfolio-thumb-slider',
  infinite: false
});

var current = 0; // current slider dupa refresh
$('.portfolio-thumb-slider .slick-slide:not(.slick-cloned)').eq(current).addClass('slick-current');
$('.portfolio-item-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
  current = currentSlide;
  $('.portfolio-thumb-slider .slick-slide').removeClass('slick-current');
  $('.portfolio-thumb-slider .slick-slide:not(.slick-cloned)').eq(current).addClass('slick-current');
  var nrCurrentSlide = slick.currentSlide + 1, // din cauza ca e array si incepe de la 0
      totalSlidesPerPage = nrCurrentSlide + 3; // daca ai 5 thumb-uri pe pagina pui + 4

  if(totalSlidesPerPage > slick.slideCount) {
    $('.controls').html(nrCurrentSlide + " - " + slick.slideCount + " of " + slick.slideCount);
  } else {
    $('.controls').html(nrCurrentSlide + " - " + totalSlidesPerPage + " of " + slick.slideCount);
  }
});







//*** Flexslider ***
  /*var $flexslider = $('.history-slider');
  $flexslider.flexslider({
    animation: "slide",
    smoothHeight: false,
	slideshow: false,
	directionNav: true,
	manualControls: ".history-control-nav li",
    useCSS: false /* Chrome fix*/
  //});// End Flexslider

//*** Flexslider ***
  /*var $flexslider = $('.project-slider');
  $flexslider.flexslider({
    animation: "slide",
    smoothHeight: false,
	slideshow: false,
	controlNav: true,
	directionNav: true,
    useCSS: false /* Chrome fix*/
  //});// End Flexslider

});
