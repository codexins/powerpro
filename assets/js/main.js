"use strict";

/******************************
 Main Theme JS File

 INDEX:

	s00 - Predefined Variables
	s01 - Main Navigation Menu
	s02 - Mobile Navigation Menu
	s03 - Image Background Settings
	s04 - Primary Slider Settings
	s05 - Elements Spacing & Classes
	s06 - Elements Carousel
	s07 - Tooltips
	s08 - Testimonial Carousel
	s09 - Scroll to Top JS
	s10 - Interactive Behaviour


******************************/
(function ($) {
  "use strict"; // Declaring main variable.

  var CODEXIN = {};
  /************************************************************
  	s00 - Predefined Variables
  *************************************************************/

  var $window = $(window),
      $document = $(document),
      $mainMenu = $('.sf-menu'),
      $headerfl = $('.floating-header'),
      $pSlider = $('#primary_slider'),
      $elCarousel = $('.element-carousel'),
      $testimonial = $('.testimonial-container'),
      $toTop = $('#to_top'),
      $intelHeader = $('.header-top'),
      $fixedMenuSpace = $('.fixed-header-space'),
      $footer = $('#colophon'); // Check if element exists.

  $.fn.elExists = function () {
    return this.length > 0;
  };
  /************************************************************
  	s01 - Main Navigation Menu
  *************************************************************/


  CODEXIN.mainNav = function () {
    $mainMenu.superfish({
      delay: 0,
      animation: {
        opacity: 'show'
      },
      animationOut: {
        opacity: 'hide'
      },
      speed: 'fast',
      autoArrows: false,
      disableHI: true
    });
    $mainMenu.on('hover', '.sub-menu', function () {
      var menu = $(this);
      var child_menu = $(this).find('ul');

      if ($(menu).offset().left + $(menu).width() + $(child_menu).width() > $window.width()) {
        $(child_menu).css({
          "left": "inherit",
          "right": "100%"
        });
      }
    });
  };
  /************************************************************
  	s02 - Mobile Navigation Menu
  *************************************************************/


  CODEXIN.mobileNav = function () {
    var slideLeft = new Menu({
      wrapper: '#o-wrapper',
      type: 'slide-left',
      menuOpenerClass: '.c-button',
      maskId: '#c-mask'
    });
    var slideLeftBtn = document.querySelector('#c-button--slide-left');
    slideLeftBtn.addEventListener('click', function (e) {
      e.preventDefault;
      slideLeft.open();
    });
  }; // Mobile menu sub-menu actions


  CODEXIN.responsiveSubMenu = function () {
    var nav = $('#mobile-menu'); // adds toggle button to li items that have children

    nav.find('li a').each(function () {
      if ($(this).next().length > 0) {
        $(this).parent('li').addClass('has-child').append('<a class="drawer-toggle" href="#"><i class="fa fa-angle-down"></i></a>');
      }
    }); // expands the dropdown menu on each click 

    nav.find('li .drawer-toggle').on('click', function (e) {
      e.preventDefault();
      $(this).parent('li').children('ul').stop(true, true).slideToggle(250);
      $(this).parent('li').toggleClass('open');
    });
  };
  /************************************************************
  	s03 - Image Background Settings
  *************************************************************/


  CODEXIN.imageBgSettings = function () {
    $('.bg-img-wrapper').each(function () {
      var $this = $(this);
      var img = $this.find('img.visually-hidden').attr('src');
      $this.find('.image-placeholder').css({
        backgroundImage: 'url(' + img + ')',
        backgroundSize: 'cover',
        backgroundPosition: 'center center'
      });
    });
  };
  /************************************************************
  	s04 - Primary Slider Settings
  *************************************************************/

  /************************************************************
  	s04 - Temp, will be shifted later
  *************************************************************/


  if ($window.width() < 576) {
    $(".mobile-search-icon a").click(function (e) {
      e.preventDefault();
      $(".header-search").fadeIn();
      $(".header-search").find('input[type="search"]').focus();
    });
    $('.header-search').on('focusout', function () {
      $(this).fadeOut();
    });
  }
  /************************************************************
  	s05 - Elements Spacing & Classes
  *************************************************************/


  CODEXIN.ElementsSpacingClasses = function () {
    $('.sidebar-widget p:empty').remove();
    $('.tagcloud').find('a').removeAttr('style'); // Fluid Wrapper for iframe.
    // $( '#whole' ).find( '.cx-fluid-wrapper' ).removeClass( 'cx-fluid-wrapper' );
    // $( '#whole' ).find( 'iframe' ).parent().addClass( 'cx-fluid-wrapper' );

    $('.rwmb-oembed-not-available').closest('.cx-fluid-wrapper').remove();
  };
  /************************************************************
  	s06 - Elements Carousel
  *************************************************************/


  CODEXIN.elementsCarousel = function () {
    var visibleSlides = null;
    var visibleSlides_xl = null;
    var visibleSlides_lg = null;
    var visibleSlides_md = null;
    var visibleSlides_sm = null;
    var visibleSlides_xs = null;
    var slideLoop = null;
    var slideSpeed = null;
    var slideSpace = null;
    var slideAutoPlayDelay = null;
    var slideEffect = null;

    if ($elCarousel.elExists()) {
      var swiperInstances = [];
      $elCarousel.each(function (index, element) {
        var $this = $(this); // Fetching from data attributes.

        var visibleSlides = $this.attr('data-visible-slide') ? parseInt($this.attr('data-visible-slide')) : 5;
        var visibleSlides_xl = $this.attr('data-visible-xl-slide') ? parseInt($this.attr('data-visible-xl-slide')) : 5;
        var visibleSlides_lg = $this.attr('data-visible-lg-slide') ? parseInt($this.attr('data-visible-lg-slide')) : 4;
        var visibleSlides_md = $this.attr('data-visible-md-slide') ? parseInt($this.attr('data-visible-md-slide')) : 3;
        var visibleSlides_sm = $this.attr('data-visible-sm-slide') ? parseInt($this.attr('data-visible-sm-slide')) : 2;
        var visibleSlides_xs = $this.attr('data-visible-xs-slide') ? parseInt($this.attr('data-visible-xs-slide')) : 1;
        var slideSpeed = $this.attr('data-speed') ? parseInt($this.attr('data-speed')) : 1000;
        var slideLoop = $this.attr('data-loop') === 'true' ? 1 : 0;
        var slideSpace = $this.attr('data-space-between') ? parseInt($this.attr('data-space-between')) : 30;
        var slideAutoPlayDelay = $this.attr('data-autoplay-delay') ? parseInt($this.attr('data-autoplay-delay')) : 100000000;
        var slideEffect = $this.attr('data-effect') ? $this.attr('data-effect') : 'slide'; // Adding slider and slider-nav instances to use multiple times in a page.

        $this.addClass('instance-' + index);
        $this.parent().find('.prev').addClass('prev-' + index);
        $this.parent().find('.next').addClass('next-' + index);
        swiperInstances[index] = new Swiper('.instance-' + index, {
          slidesPerView: visibleSlides,
          spaceBetween: slideSpace,
          speed: slideSpeed,
          loop: slideLoop,
          effect: slideEffect,
          observer: true,
          observeParents: true,
          watchSlidesProgress: true,
          watchSlidesVisibility: true,
          loopAdditionalSlides: 10,
          autoplay: {
            delay: slideAutoPlayDelay
          },
          navigation: {
            nextEl: '.swiper-arrow.next',
            prevEl: '.swiper-arrow.prev'
          },
          pagination: {
            el: '.pagination-' + index,
            type: 'bullets',
            clickable: true
          },
          // Responsive breakpoints.
          breakpoints: {
            1400: {
              slidesPerView: visibleSlides_xl,
              autoplay: {
                delay: slideAutoPlayDelay
              }
            },
            1199: {
              slidesPerView: visibleSlides_lg,
              autoplay: {
                delay: slideAutoPlayDelay
              }
            },
            991: {
              slidesPerView: visibleSlides_md,
              autoplay: {
                delay: slideAutoPlayDelay
              }
            },
            767: {
              slidesPerView: visibleSlides_sm,
              autoplay: {
                delay: slideAutoPlayDelay
              }
            },
            479: {
              slidesPerView: visibleSlides_xs,
              autoplay: {
                delay: 5000
              }
            }
          },
          on: {
            slideChange: function slideChange() {
              $('.swiper-slide.swiper-slide-visible').removeClass('visible-not-last');
              $('.swiper-slide.swiper-slide-visible').prev().addClass('visible-not-last');
            }
          }
        });
      }); // Updating the sliders.

      setTimeout(function () {
        swiperInstances.forEach(function (slider) {
          slider.update();
        });
      }, 50); // Updating the sliders in tab.

      $('body').on('shown.bs.tab', 'a[data-toggle="tab"], a[data-toggle="pill"]', function (e) {
        swiperInstances.forEach(function (slider) {
          slider.update();
        });
      });
    } // End if().

  };
  /************************************************************
  	s07 - Tooltips
  *************************************************************/


  CODEXIN.toolTips = function () {
    $('body').tooltip({
      selector: '[data-toggle="tooltip"]'
    });
  };
  /************************************************************
  	s08 - Testimonial Carousel
  *************************************************************/


  CODEXIN.testimonialCarousel = function () {
    if ($testimonial.elExists()) {
      var testimonial = new Swiper($testimonial, {
        loop: true,
        spaceBetween: 0,
        parallax: true,
        speed: 1000,
        autoplay: {
          delay: 6000
        },
        pagination: {
          el: '.swiper-pagination-testimonial',
          clickable: true
        },
        navigation: {
          nextEl: '.swiper-arrow.next.testimonial-slide',
          prevEl: '.swiper-arrow.prev.testimonial-slide'
        }
      });
    }
  };
  /************************************************************
  	s09 - Scroll to Top JS
  *************************************************************/


  CODEXIN.scrollToTop = function () {
    $toTop.hide();
    $window.on('scroll', function () {
      if ($window.scrollTop() > 300) {
        $toTop.fadeIn();
      } else {
        $toTop.fadeOut();
      }
    });
    $toTop.on('click', function () {
      $('html,body').animate({
        scrollTop: 0
      }, 1500, 'easeInOutExpo');
    });
  };
  /************************************************************
  	s10 - Interactive Behaviour
  *************************************************************/


  CODEXIN.interactiveBehaviour = function () {}; // Window load functions.


  $window.on('load', function () {
    CODEXIN.interactiveBehaviour();
    CODEXIN.imageBgSettings();
    $(".navigation-wrapper").sticky({
      topSpacing: 0
    });
  }); // Document ready functions.

  $document.on('ready', function () {
    CODEXIN.mainNav(), CODEXIN.mobileNav(), CODEXIN.responsiveSubMenu(), CODEXIN.elementsCarousel(), CODEXIN.testimonialCarousel(), CODEXIN.scrollToTop(), CODEXIN.toolTips(), CODEXIN.ElementsSpacingClasses();
  }); // Window load and resize functions.

  $window.on('load resize', function () {// CODEXIN.ElementsSpacingClasses();
  });
})(jQuery);