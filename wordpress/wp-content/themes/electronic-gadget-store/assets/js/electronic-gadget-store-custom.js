/**
 * Theme JS file.
 */
jQuery(function($) {
  "use strict";

  // Preloader
  $(document).ready(function() {
    setTimeout(function() {
      $(".loader").fadeOut("slow");
    }, 1000);
  });

  // Scroll to top
  $(function() {
    $(window).scroll(function() {
      if ($(this).scrollTop() >= 50) {
        $('#return-to-top').fadeIn(200);
      } else {
        $('#return-to-top').fadeOut(200);
      }
    });
    $('#return-to-top').click(function() {
      $('body,html').animate({
        scrollTop: 0
      }, 500);
    });
  });

});

// Define functions in the global scope
function electronic_gadget_store_menu_open_nav() {
  jQuery(".sidenav").addClass('open');
}

function electronic_gadget_store_menu_close_nav() {
  jQuery(".sidenav").removeClass('open');
}

// dropdown category
jQuery(document).ready(function(){
  jQuery(".category-dropdown").hide();
  
  jQuery("button.category-btn").click(function(){
    jQuery(".category-dropdown").toggle();
  });

  // Handle focus using Tab and Shift+Tab
  jQuery(".category-btn, .category-dropdown").on("keydown", function(e) {
    var dropdownItems = jQuery(".category-dropdown").find("a"); // Assuming dropdown items are represented by <a> tags
    
    if (e.keyCode === 9) { // Tab key
      if (!e.shiftKey && document.activeElement === dropdownItems.last().get(0)) {
        e.preventDefault();
        jQuery(".category-btn").focus();
      } else if (e.shiftKey && document.activeElement === dropdownItems.first().get(0)) {
        e.preventDefault();
        jQuery(".category-btn").focus();
      }
    }
  });
});
