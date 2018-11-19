jQuery(document).ready(function($){

	// activating wow (animation on scroll) 
	new WOW().init();

	// $('#navigation').affix({
	// 	offset: {top: 160} 
	// });

	// activating superfish menu
  $(".sf-menu").superfish({

      delay:       0,                            // one second delay on mouseout
      //animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
      animation: {opacity: 'show', height: 'show'},
      animationOut: {opacity: 'hide'},
      speed:       'fast',                          // faster animation speed
      autoArrows:  false,
      disableHI: true, 

  });

  $('.sub-menu').hover(function() {
      var menu = $(this);
      // var child_menu = $('.site-nav ul.sub-menu .sub-menu');
      var child_menu = $(this).find('ul');
      if( $(menu).offset().left + $(menu).width() + $(child_menu).width() > $(window).width() ){
          $(child_menu).css({"left": "inherit", "right": "100%"});
         }        
  });

	$('.sidebar-widget p:empty').remove();

	//Parallax

	// $('#service_promo').parallax({
	// 	imageSrc: '/wp-content/uploads/2017/03/bryce-overlay.jpg'
	// });

	// $('#thankyou').parallax({
	// 	imageSrc: '/wp-content/uploads/2017/03/bryce-overlay-parallex.jpg'
	// });

	// $('#promo_image').parallax({
	// 	imageSrc: '/wp-content/uploads/2017/02/modern-maestro-cover-facebook.jpg'
	// });


	// $('.testimonials').slick({
	// 	dots: false,
	// 	arrows: true,
	// 	infinite: true,
	// 	slidesToShow: 1,
	// 	speed: 500,
	// 	autoplay: false,
	// 	autoplaySpeed: 4000,
	// 	cssEase: 'ease-in-out',
	// });


	$('.mpopup').magnificPopup({
	  type:'image',
	  mainClass: 'mfp-with-zoom', // this class is for CSS animation below

	  zoom: {
	    enabled: true, // By default it's false, so don't forget to enable it

	    duration: 300, // duration of the effect, in milliseconds
	    easing: 'ease-in-out', // CSS transition easing function
	    opener: function(openerElement) {
	      // openerElement is the element on which popup was initialized, in this case its <a> tag
	      // you don't need to add "opener" option if this code matches your needs, it's defailt one.
	      return openerElement.is('img') ? openerElement : openerElement.find('img');
	    }
	  }
	});


	$(".mpopup, .img-gallery").click(function(){
		$("html").addClass("pop-triggered");
	});

	$('.img-gallery').magnificPopup({
		type: 'image',
		gallery:{
		        enabled:true
		        },

		fixedContentPos: true,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,

		midClick: true,
		removalDelay: 300,
		mainClass: 'mfp-fade',
		image: {
		    titleSrc: 'title' 
		}
	});

	/************************************************************
		Sticky Header
	*************************************************************/

		$('#nav.header_sticky').affix({
			offset: {top: 160} 
		});

		$('#topbar_hide').click(function() {
				$('#nav.affix').css('top', '0');
				$('#nav.header_sticky').css('top', '0');
				$('#topbar').removeClass('active');
				$('#topbar').siblings('#whole').css('padding-top', '0');
				console.log('hidden');
		});
		      
		$('#topbar_show').click(function() {
				$('#nav.affix').css('top', '40px');
				$('#nav.header_sticky').css('top', '40px');
				$('#topbar').addClass('active');
				$('#topbar').siblings('#whole').css('padding-top', '40px');
				console.log('visible');
		});



    /*--------------------------------------------------------------
    smooth scrolling
    ---------------------------------------------------------------- */
	
	// $('.explore').bind('click', function() {
	// 	$('html, body').stop().animate({
	// 		scrollTop: $($(this).attr('href')).offset().top - 50
	// 	}, 1000, 'easeOutCubic');
	// 	event.preventDefault();
	// });


	// Countdown timer

	// $("#future_date").countdowntimer({
	// 		hours: 1,
	// 		minutes: 0,
	// 		size: "lg",
	// 		// expiryUrl: "/about/"

	// });

    /*--------------------------------------------------------------
    scrollUp button (Go to top) at the right bottom corner of window
    ---------------------------------------------------------------- */

    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 200) {
            $("#toTop").fadeIn();
        } else {
            $("#toTop").fadeOut();
        }
    });

    $("#toTop").on('click', function() {
        $("html,body").animate({
            scrollTop: 0
        }, 500)
    }); //scrollup finished

    // page loader
    $('.cx-pageloader').delay(300).fadeOut('fast');


});
	

// For Responsive Menu

var slideLeft = new Menu({
    wrapper: '#o-wrapper',
    type: 'slide-left',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
});

var slideLeftBtn = document.querySelector('#c-button--slide-left');

slideLeftBtn.addEventListener('click', function(e) {
	e.preventDefault;
	slideLeft.open();
});




