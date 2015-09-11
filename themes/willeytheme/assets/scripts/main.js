/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        
        $(document).on("scroll", function () {
          if ( $(document).scrollTop() > 0 ) {
            $('header').addClass('tiny_header');
            $('#left_menu_button').addClass('tiny_header');
            $('.right_menu_button').addClass('tiny_header');
            $('main.main').addClass('tiny_header');
            $('.exit-button').addClass('tiny_header');
            $('#right_menu').addClass('tiny_header');
            $('#main_logo_full').addClass('hidden');
            $('#main_logo').removeClass('hidden');
          } else {
            $('header').removeClass('tiny_header');
            $('#left_menu_button').removeClass('tiny_header');
            $('.right_menu_button').removeClass('tiny_header');
            $('main.main').removeClass('tiny_header');
            $('.exit-button').removeClass('tiny_header');
            $('#right_menu').removeClass('tiny_header');
            $('#main_logo_full').removeClass('hidden');
            $('#main_logo').addClass('hidden');
          }
        });

      // Left menu toggle
        $('#left_menu_button').click(function(e){
          e.preventDefault();
          $("#wrapper").addClass("toggled");
          $('.right_menu_button').addClass('hidden');
          $('#right_menu').addClass('hidden');
        });

      // Right menu toggle
        $('.right_menu_button').click(function(e){
          e.preventDefault();
          $("#right-nav").addClass("enabled");
          $(".right-exit-menu").addClass("enabled");
          $('#left_menu_button').addClass('hidden');
        });

      // Work Page Desktop
        $('.right_menu_button_white').click(function(e){
          e.preventDefault();
          $('#right-nav').addClass('enabled');
        });

      // Journey Page Right Nav
        $('#right_menu').click(function(e){
          e.preventDefault();
          $('#right-nav').addClass('enabled');
          $('.right-exit-menu').addClass('enabled');
          $('#left_menu_button').addClass('hidden');
        });

      // exit button for both left and right menus
        $('.exit-button').click(function(e){
          e.preventDefault();
          $("#wrapper").removeClass("toggled");
          $('#right-nav').removeClass('enabled');
          $('.right-exit-menu').removeClass('enabled');
          $('#left_menu_button').removeClass('hidden');
          $('.right_menu_button').removeClass('hidden');
          $('#right_menu').removeClass('hidden');
        });

        $('.desktop_right_nav').click(function(e){
          e.preventDefault();
          $('#right-nav').removeClass('enabled');
        });



        $('.menu-open-right').click(function(e){
          e.preventDefault();
          $("#right-nav").addClass("enabled");
          $(".menu-close-right").addClass("enabled");
        });

        //Gray share buttons

        $("#share1").hover(function () {
        $(this).toggleClass("grayscale-off");
      });

        $("#share2").hover(function () {
        $(this).toggleClass("grayscale-off");
      });

        $("#share3").hover(function () {
        $(this).toggleClass("grayscale-off");
      });

        $("#share4").hover(function () {
        $(this).toggleClass("grayscale-off");
      });

      // About Company Page
        // About Willey Button
        $('#about_button').click(function(e){
          if ( $(this).attr('class') === 'ON' ) {
            return false;
          } else {
            $('.about_popup').removeClass('hidden');
            $('.mission_popup').addClass('hidden');
            $('.sustainability_popup').addClass('hidden');

            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/about.png');
            $('#mission_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/mission_bnw.png');
            $('#sustain_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/sustainability_bnw.png');

            // change bg
            $('.about_bg').removeClass('hidden');
            $('.mission_bg').addClass('hidden');
            $('.sustain_bg').addClass('hidden');
          }

          // turn this class "ON" for next click enquiry
          $(this).addClass('ON');
          $('#mission_button').removeClass('ON');
          $('#sustain_button').removeClass('ON');
        });

        // Mission Statement Button
        $('#mission_button').click(function(e){
          if ( $(this).attr('class') === 'ON' ) {
            return false;
          } else {
            // hide inactive icons
            $('.about_popup').addClass('hidden');
            $('.mission_popup').removeClass('hidden');
            $('.sustainability_popup').addClass('hidden');

            // show appropriate icons
            $('#about_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/about_bnw.png');
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/mission.png');
            $('#sustain_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/sustainability_bnw.png');

            // change bg
            $('.about_bg').addClass('hidden');
            $('.mission_bg').removeClass('hidden');
            $('.sustain_bg').addClass('hidden');
          }

          // turn this class "ON" for next click enquiry
          $(this).addClass('ON');
          $('#about_button').removeClass('ON');
          $('#sustain_button').removeClass('ON');
        });

        // Sustainability Button
        $('#sustain_button').click(function(e){
          if ( $(this).attr('class') === 'ON' ) {
            return false;
          } else {
            // hide inactive icons
            $('.about_popup').addClass('hidden');
            $('.mission_popup').addClass('hidden');
            $('.sustainability_popup').removeClass('hidden');

            // show appropriate icons
            $('#about_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/about_bnw.png');
            $('#mission_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/mission_bnw.png');
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/sustainability.png');

            // change bg
            $('.about_bg').addClass('hidden');
            $('.mission_bg').addClass('hidden');
            $('.sustain_bg').removeClass('hidden');
          }

          // turn this class "ON" for next click enquiry
          $(this).addClass('ON');
          $('#about_button').removeClass('ON');
          $('#mission_button').removeClass('ON');
        });

        var $container = $('#packery');
        // init
        $container.packery({
          itemSelector: '.item',
          gutter: 10
        });

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
