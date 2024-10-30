/**
 * Package: Catch Dark
 * Author: Catch Plugins
 * Year: 2020
 */
(function ($) {
  "use strict";

  $(window).on("load", function () {
    $("input[name='catch_dark_mode_options[preset]']").on("change", function (e) {
      // console.log(e.target.value);
      if (e.target.value === "custom") {
        $("tr.custom").each(function () {
          $(this).removeAttr("style");
        });
      } else {
        $("tr.custom").each(function () {
          $(this).css("display", "none");
        });
      }
    });
  });

  jQuery(document).ready(function ($) {
    // Tabs
    $(".catchp_widget_settings .nav-tab-wrapper a").on("click", function (e) {
      e.preventDefault();

      if (!$(this).hasClass("ui-state-active")) {
        $(".nav-tab").removeClass("nav-tab-active");
        $(".wpcatchtab").removeClass("active").fadeOut(0);

        $(this).addClass("nav-tab-active");

        var anchorAttr = $(this).attr("href");

        $(anchorAttr).addClass("active").fadeOut(0).fadeIn(500);
      }
    });
  });

  // jQuery Match Height init for sidebar spots
  $(document).ready(function () {
    $(
      ".catchp-sidebar-spot .sidebar-spot-inner, .col-2 .catchp-lists li, .col-3 .catchp-lists li"
    ).matchHeight();
  });
  // jQuery UI Tooltip initializaion
  $(document).ready(function () {
    $(".tooltip").tooltip();
  });
})(jQuery);


jQuery(document).ready(function($){
  	/* CPT switch */
    $( '.ctp-switch' ).on( 'click', function() {
      let main_control = $( this )

      main_control.parent().parent().toggleClass( 'active inactive' );
      /* var loader = $( this ).parent().next();
      
      loader.show();
          
      var main_control = $( this );
      var data = {
          'action'      : 'ctp_switch',
          'value'       : this.checked,
          'option_name' : main_control.attr( 'rel' )
      };

      $.post( ajaxurl, data, function( response ) {
          response = $.trim( response );

          if ( '1' == response ) {
              main_control.parent().parent().addClass( 'active' );
              main_control.parent().parent().removeClass( 'inactive' );
          } else if( '0' == response ) {
              main_control.parent().parent().addClass( 'inactive' );
              main_control.parent().parent().removeClass( 'active' );
          } else {
              alert( response );
          }
          loader.hide();
      }); */
  });
  /* CPT switch End */
})