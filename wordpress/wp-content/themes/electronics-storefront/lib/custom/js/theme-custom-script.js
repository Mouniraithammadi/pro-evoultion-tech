jQuery(document).ready(function ($) {
    "use strict";
    var isMobile = false;
    if (/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('html').addClass('touch');
        isMobile = true;
    } else {
        $('html').addClass('no-touch');
        isMobile = false;
    }
    
    // Banner Slider
    var swiper = new Swiper('.theme-main-carousel', {
        centeredSlides: true,
        slidesPerView: 1,
        loop: true,
        spaceBetween: 30,
        speed: 1000,
        roundLengths: true,
        keyboard: true,
        parallax: true,
        mousewheel: false,
        grabCursor: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 1,
            },
            1200: {
                slidesPerView: 1,
            },
            1600: {
                slidesPerView: 1,
            }
        }
    });

    // Scroll To
    $(".scroll-content").click(function () {
        $('html, body').animate({
            scrollTop: $("#site-content").offset().top
        }, 500);
    });
    // Aub Menu Toggle
    $('.submenu-toggle').click(function () {
        $(this).toggleClass('button-toggle-active');
        var currentClass = $(this).attr('data-toggle-target');
        $(currentClass).toggleClass('submenu-toggle-active');
    });
    $('.skip-link-menu-start').focus(function () {
        if (!$("#offcanvas-menu #primary-nav-offcanvas").length == 0) {
            $("#offcanvas-menu #primary-nav-offcanvas ul li:last-child a").focus();
        }
    });
    // Toggle Menu
    $('.navbar-control-offcanvas').click(function () {
        $(this).addClass('active');
        $('body').addClass('body-scroll-locked');
        $('#offcanvas-menu').toggleClass('offcanvas-menu-active');
        $('.button-offcanvas-close').focus();
    });
    $('.offcanvas-close .button-offcanvas-close').click(function () {
        $('#offcanvas-menu').removeClass('offcanvas-menu-active');
        $('.navbar-control-offcanvas').removeClass('active');
        $('body').removeClass('body-scroll-locked');
        setTimeout(function () {
            $('.navbar-control-offcanvas').focus();
        }, 300);
    });
    $('#offcanvas-menu').click(function () {
        $('#offcanvas-menu').removeClass('offcanvas-menu-active');
        $('.navbar-control-offcanvas').removeClass('active');
        $('body').removeClass('body-scroll-locked');
    });
    $(".offcanvas-wraper").click(function (e) {
        e.stopPropagation(); //stops click event from reaching document
    });
    $('.skip-link-menu-end').on('focus', function () {
        $('.button-offcanvas-close').focus();
    });
    // Data Background
    var pageSection = $(".data-bg");
    pageSection.each(function (indx) {
        if ($(this).attr("data-background")) {
            $(this).css("background-image", "url(" + $(this).data("background") + ")");
        }
    });
    // Scroll to Top on Click
    $('.to-the-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 700);
        return false;
    });

    $(".product-cat").hide();
    $("button.product-btn").click(function(){
        $(".product-cat").toggle();
    });
});

    jQuery(window).scroll(function() {
      var data_sticky = jQuery('.header-navbar').attr('data-sticky');

      if (data_sticky == "true") {
        if (jQuery(this).scrollTop() > 1){
          jQuery('.header-navbar').addClass("stick_head");
        } else {
          jQuery('.header-navbar').removeClass("stick_head");
        }
      }
    });

jQuery(function($) {

   var owl = jQuery('.theme-product-block .owl-carousel');
        owl.owlCarousel({
            margin: 30,
            nav: true,
            rtl: $('html').attr('dir') === 'rtl',  // Set RTL based on HTML direction
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            loop: true,
            navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
            responsive: {
              0: {
                items: 1
              },
              600: {
                items: 3
              },
              1024: {
                items: 4
            }
        }
    })
});
var interval=null;
function show_loading_box()
{
  jQuery(".spinner-loading-box").css("display","none");
  clearInterval(interval);
}
jQuery('document').ready(function(){

  interval = setInterval(show_loading_box,1000);

  function flashcountdown($timer,mydate){
    // Set the date we're counting down to
    var countDownDate = new Date(mydate).getTime();
    // Update the count down every 1 second
    var x = setInterval(function() {
        // Get todays date and time
        var now = new Date().getTime();
        // Find the distance between now an the count down date
        var distance = countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Output the result in an element with id="timer"
        // console.log($timer.html())
        $timer.html( "<div class='numbers'><span class='timer_days'>" + days + "</span><span class='nofont'>Day</span>" + "</div>" + "   " +"<div class='numbers'><span class='timer_days'>" + hours + "</span><span class='nofont'>Hours</span>" + "</div>" + "   " + "<div class='numbers'><span class='timer_days'>" + minutes + "</span><span class='nofont'>Minutes</span>" + "</div>" + "   " + "<div class='numbers'><span class='timer_days'>" + seconds + "</span><span class='nofont'>Seconds</spn" + "</div>");
        
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            $timer.html("TIMER UP - EVENT EXPIRED");
        }
    }, 1000);
  }
  
  var mydate =jQuery('.date2').val();
  jQuery(".countdown2").each(function(){
      flashcountdown(jQuery(this),mydate);
  });
});

//Loader
jQuery(window).load(function() {
    jQuery(".preloader").delay(1000).fadeOut("fast");
  });