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
        
      // Left menu toggle
        $('#left_menu').click(function(e){
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });

        $('.menu-close').click(function(e){
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });


      // Right menu toggle
        $('#right_menu').click(function(e){
          e.preventDefault();
          $("#right-nav").addClass("enabled");
          $(".menu-close-right").addClass("enabled");
        });

        $('.menu-close-right').click(function(e){
          e.preventDefault();
          $("#right-nav").removeClass("enabled");
          $(".menu-close-right").removeClass("enabled");
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
          }
          $(this).addClass('ON');
          $('#mission_button').removeClass('ON');
          $('#sustain_button').removeClass('ON');
        });

        // Mission Statement Button
        $('#mission_button').click(function(e){
          if ( $(this).attr('class') === 'ON' ) {
            return false;
          } else {
            $('.about_popup').addClass('hidden');
            $('.mission_popup').removeClass('hidden');
            $('.sustainability_popup').addClass('hidden');

            $('#about_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/about_bnw.png');
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/mission.png');
            $('#sustain_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/sustainability_bnw.png');
          }
          $(this).addClass('ON');
          $('#about_button').removeClass('ON');
          $('#sustain_button').removeClass('ON');
        });

        // Sustainability Button
        $('#sustain_button').click(function(e){
          if ( $(this).attr('class') === 'ON' ) {
            return false;
          } else {
            $('.about_popup').addClass('hidden');
            $('.mission_popup').addClass('hidden');
            $('.sustainability_popup').removeClass('hidden');

            $('#about_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/about_bnw.png');
            $('#mission_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/mission_bnw.png');
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/sustainability.png');
          }
          $(this).addClass('ON');
          $('#about_button').removeClass('ON');
          $('#mission_button').removeClass('ON');
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
