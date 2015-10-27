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
// function initMap() {
//   var customMapType = new google.maps.StyledMapType([
//       {
//         stylers: [
//           {hue: '#890000'},
//           {visibility: 'simplified'},
//           {gamma: 0.5},
//           {weight: 0.5}
//         ]
//       },
//       {
//         elementType: 'labels',
//         stylers: [{visibility: 'off'}]
//       },
//       {
//         featureType: 'water',
//         stylers: [{color: '#890000'}]
//       }
//     ], {
//       name: 'Custom Style'
//   });
//   var customMapTypeId = 'custom_style';

//   var map = new google.maps.Map(document.getElementById('contact_us_map'), {
//     zoom: 15,
//     panControl: false,
//     streetViewControl: false,
//     mapTypeControl: false,
//     disableDoubleClickZoom: true,
//     hidecontrols: true,
//     scrollwheel: false,
//     draggable: false,
//     zoomControl: false,
//     marker: {lat: 22.265704, lng: 114.235443},
//     center: {lat: 22.265704, lng: 114.235443},
//     mapTypeControlOptions: {
//       mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
//     }
//   });

//   map.mapTypes.set(customMapTypeId, customMapType);
//   map.setMapTypeId(customMapTypeId);
// }



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

          if ( $(window).scrollTop() >= parseInt($('#about_anchor_div').css("height"))*1.8 ) {
            $('#sustain_button').addClass('ON');
            $('#about_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/about_bnw.png');
            $('#mission_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/mission_bnw.png');
            $('#sustain_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/sustainability.png');
          } else if ( $(window).scrollTop() >= parseInt($('#about_anchor_div').css("height"))*0.8 ) {
            $('#mission_button').addClass('ON');
            $('#about_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/about_bnw.png');
            $('#mission_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/mission.png');
            $('#sustain_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/sustainability_bnw.png');
          } else {
            $('#about_button').addClass('ON');
            $('#about_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/about.png');
            $('#mission_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/mission_bnw.png');
            $('#sustain_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/sustainability_bnw.png');
          }
        });

      // Left menu toggle
        $('#left_menu_button').click(function(e){
          e.preventDefault();
          $("#wrapper").addClass("toggled");
          $('.exit-button').addClass('enabled');
          $('.right_menu_button').addClass('hidden');
          $('#right_menu').addClass('hidden');
          $("#right-nav").removeClass("enabled");
        });

      // Right menu toggle
        $('.right_menu_button').click(function(e){
          e.preventDefault();
          $("#right-nav").addClass("enabled");
          $(".right-exit-menu").addClass("enabled");
          $('.exit-button').addClass('enabled');
          $('.desktop_right_nav').addClass('enabled');
          // $('#left_menu_button').addClass('hidden');
        });

      // Work Page Desktop
        $('.right_menu_button_white').click(function(e){
          e.preventDefault();
          $('#right-nav').addClass('enabled');
          $('.desktop_right_nav').addClass('enabled');
          $(".right-exit-menu").addClass("enabled");
        });

      // Journey Page Right Nav
        $('#right_menu').click(function(e){
          e.preventDefault();
          $('#right-nav').addClass('enabled');
          $('.right-exit-menu').addClass('enabled');
          $('.exit-button').addClass('enabled');
          // $('#left_menu_button').addClass('hidden');
        });

      // exit button for both left and right menus
        $('.exit-button').click(function(e){
          e.preventDefault();
          $('.exit-button').removeClass('enabled');
          $("#wrapper").removeClass("toggled");
          $('#right-nav').removeClass('enabled');
          $('.right-exit-menu').removeClass('enabled');
          // $('#left_menu_button').removeClass('hidden');
          $('.right_menu_button').removeClass('hidden');
          $('#right_menu').removeClass('hidden');
        });

        $('.desktop_right_nav').click(function(e){
          e.preventDefault();
          $('#right-nav').removeClass('enabled');
          $('.desktop_right_nav').removeClass('enabled');
        });

        $('.menu-open-right').click(function(e){
          e.preventDefault();
          $("#right-nav").addClass("enabled");
          $(".menu-close-right").addClass("enabled");
        });

        // menu share buttons
        $('#menu_share1')
          .mouseenter(function() {
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/facebook.png');
          })
          .mouseleave(function() {
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/facebook_mono.png');
          });

        $('#menu_share2')
          .mouseenter(function() {
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/linkedin.png');
          })
          .mouseleave(function() {
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/linkedin_mono.png');
          });

        $('#menu_share3')
          .mouseenter(function() {
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/email.png');
          })
          .mouseleave(function() {
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/email_mono.png');
          });

      // About Company Page
        // About Willey Button
        $('#about_button').click(function(e){
          if ( $(this).attr('class') === 'ON' ) {
            return false;
          } else {
            // [superceeded] popup text boxes
            // $('.about_popup').removeClass('hidden');
            // $('.mission_popup').addClass('hidden');
            // $('.sustainability_popup').addClass('hidden');

            // show appropriate icons
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/about.png');
            $('#mission_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/mission_bnw.png');
            $('#sustain_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/sustainability_bnw.png');

            // [superceeded] change bg
            // $('.about_bg').removeClass('hidden');
            // $('.mission_bg').addClass('hidden');
            // $('.sustain_bg').addClass('hidden');

            // jump to textbox
            $('html,body').animate({
              scrollTop: $('#about_anchor_div').offset().top
            }, 1000);
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
            // [superceeded] popup text boxes
            // $('.about_popup').addClass('hidden');
            // $('.mission_popup').removeClass('hidden');
            // $('.sustainability_popup').addClass('hidden');

            // show appropriate icons
            $('#about_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/about_bnw.png');
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/mission.png');
            $('#sustain_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/sustainability_bnw.png');

            // [superceeded] change bg
            // $('.about_bg').addClass('hidden');
            // $('.mission_bg').removeClass('hidden');
            // $('.sustain_bg').addClass('hidden');

            // jump to textbox
            $('html,body').animate({
              scrollTop: $('#mission_anchor_div').offset().top
            }, 1000);
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
            // [superceeded] popup text boxes
            // $('.about_popup').addClass('hidden');
            // $('.mission_popup').addClass('hidden');
            // $('.sustainability_popup').removeClass('hidden');

            // show appropriate icons
            $('#about_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/about_bnw.png');
            $('#mission_button').prop('src', '/wp-content/themes/willeytheme/assets/images/icons/mission_bnw.png');
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/sustainability.png');

            // [superceeded] change bg
            // $('.about_bg').addClass('hidden');
            // $('.mission_bg').addClass('hidden');
            // $('.sustain_bg').removeClass('hidden');

            // jump to textbox
            $('html,body').animate({
              scrollTop: $('#sustain_anchor_div').offset().top
            }, 1000);
          }

          // turn this class "ON" for next click enquiry
          $(this).addClass('ON');
          $('#about_button').removeClass('ON');
          $('#mission_button').removeClass('ON');
        });

        // Work single exit buttons
        $('.single-work-exit-button')
          .mouseenter(function() {
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/close_colour.png');
          })
          .mouseleave(function() {
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/close.png');
          });

        $('#work_single_return')
          .mouseenter(function() {
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/return_colour.png');
          })
          .mouseleave(function() {
            $(this).prop('src', '/wp-content/themes/willeytheme/assets/images/icons/return.png');
          });

        // Packery
        // var $container = $('.packery');
        // // init
        // $container.packery({
        //   itemSelector: '.item',
        //   gutter: 10
        // });

        // smooth scroll right-nav
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            // console.log("target");

            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });

        // check all <a> tags on page and make current page purple
        $(document).ready(function() {
          var a = document.getElementsByTagName("A");
          for(var i=0;i<a.length;i++) {
            // console.log( a[i] );
            if( window.location === a[i].href ||
              window.location.href.split("?")[0] === a[i].href ||
              window.location.href.split("#")[0] === a[i].href ){
              $( a[i] ).addClass('current_page');
            }
          }

          // if (navigator.appVersion.indexOf("Win")!=-1 && navigator.userAgent.indexOf("Chrome") >- 1) {
          //   $(body).css("overflow-x", "hidden");
          // // } else if (navigator.appVersion.indexOf("Mac")!=-1) {

          // }

        });
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
        $(window).resize( function (){
          $('.packery').packery();
        });
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
