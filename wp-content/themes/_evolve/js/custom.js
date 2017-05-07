/**
 * File custom.js.
 *
 */
(function ($) {

    // Menu flotante
    $(window).scroll(function() {
        if ($(document).scrollTop() > 50) {
            $('#site-navigation').addClass('shrink');
        } else {
            $('#site-navigation').removeClass('shrink');
        }
    });

    // Hover en Submenu
    /*
    $('.dropdown').click(function(e) {
        //alert('alerted');
        e.preventDefault();// prevent the default anchor functionality
    });

    $('.dropdown').hover(function(){
        $('.dropdown-toggle', this).trigger('click');
    });
    */

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });




    $(document).ready(function(){
        $(".chat-icon,.plus").click(function(){
            $(".person_info").fadeToggle();
            $('.plus').fadeToggle();
        });
    });




    // ScrollReveal
    //window.sr = ScrollReveal();

    // Efecto en hot-icons
    $( ".rent-icon, .buy-icon, .learn-icon" ).hover(function() {
        $( this ).parent(".col").toggleClass( "link-darken" );
        //$( this ).fadeOut( 100 );
        //$( this ).fadeIn( 500 );
    });

    // Carousel
    $("#home-carousel").bootslider({
        // snap to item
	snapToItem: true

        // CSS selectors for next / prev links
	//next: false,
	//previous: false
    });

    $( "#courses-carousel" ).bootslider({
        snapToItem: true,
        next:  "#coursesnext",
        previous: "#coursesprevious"
    });

    $( "#instructors-carousel" ).bootslider({
        snapToItem: true,
        next:  '#instructorsnext',
        previous: '#instructorsprevious'
    });

    // hover instagram photos
    var observer = new MutationObserver(function (mutations, me) {
        // `mutations` is an array of mutations that occurred
        // `me` is the MutationObserver instance
        //var canvas = document.getElementById('my-canvas');
        //if (canvas) {
        //  handleCanvas(canvas);
        //  me.disconnect(); // stop observing
        //  return;
        //}
        $('#sb_instagram .sbi_photo_wrap').each(function(){
            //$( this ).append( $( "<span></span>" ) );

            $( this ).hover(
                function(){
                    $(this).children('.sbi_photo').css("background-color","rgba(0,0,0,1)");
                    $( this ).append( "<div class=\"instagram-overlay\"><span></span></div>" );

                    //$(this).css({ marginTop: '60px', display: 'inline-block' });
                    //jQuery(this).fadeTo(200,0.85)
                },
                function(){
                    $(this).children('.sbi_photo').css("background-color","");
                    $( this ).find( ".instagram-overlay" ).remove();

                    //$( this ).find( "span:last" ).remove();
                    //jQuery(this).stop().fadeTo(500,1)
            });
            /*
            .sbi_photo_wrap .sbi_photo
             */
            me.disconnect(); // stop observing
        });
    });

    // start observing
    observer.observe(document, {
      childList: true,
      subtree: true
    });

    // Down Indicator
    //$('.rev_slider_wrapper').append( "<span class=\"btn-down\">Scroll</span>" );

    /*
    $(".btn-down").each(function(){
        var gt = $(this);
        var scrollTop = 0;
        //gt.hide();

        $(window).scroll(function(){
            if ($(window).height() < $("body").height()) {
                if ( $(window).scrollTop() >= ($("body").height() - $(window).height()) )
                    gt.addClass("hide");
                else
                    gt.removeClass("hide");
            }
        });

        $(window).bind("resize load", function(){
            if ($(window).height() < $("body").height()) {

                if ( $(window).scrollTop() >= ($("body").height() - $(window).height()) )
                    gt.addClass("hide");
                else
                    gt.removeClass("hide");

            }
        });
    });
    */

    // Top Indicator
    $("#btn-top").each(function(){
        var gt = $(this);
        var scrollTop = 0;
        //gt.hide();
        $(window).scroll(function(){
                scrollTop = $(window).scrollTop();
                if(scrollTop >= 170) gt.addClass("show");
                else gt.removeClass("show");
        });

        $(window).bind("resize load", function(){
                if($(window).height() < $("body").height() && scrollTop >= 170) gt.addClass("show");
                else gt.removeClass("show");
        });
    });

    $("#btn-top a").click(function(){
	$("body,html").animate({scrollTop:0},800);
	return false;
    });

    // Woocommerce
    //$( ".woocommerce .woocommerce-ordering select" ).wrap( "<span class=\"select-wrapper\"></span>" );
    //$( ".variations_form select, .woocommerce-ordering select" ).wrap( "<span class=\"select-wrapper\"></span>" );
    $( ".woocommerce-ordering select" ).wrap( "<span class=\"select-wrapper\"></span>" );

    $('<div class="quantity-nav"><div class="quantity-button quantity-up fa fa-angle-up">&nbsp;</div><div class="quantity-button quantity-down fa fa-angle-down">&nbsp;</div></div>').insertAfter('.quantity input');
    $('.quantity').each(function() {
        var spinner = $(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        //max = input.attr('max');
        max = 99;

        btnUp.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
    });

}(jQuery));

(function(){

    var config = {
      viewFactor : 0.15,
      duration   : 800,
      distance   : "0px",
      scale      : 0.8,
    }

    window.sr = new ScrollReveal(config);

    var hero = {
        origin   : "top",
        distance : "24px",
        duration : 1500,
        scale    : 1.05
      }

      var intro = {
        origin   : "bottom",
        distance : "64px",
        duration : 900,
        delay    : 1500,
        scale    : 1
      }

      var github = {
        origin   : "top",
        distance : "32px",
        duration : 600,
        delay    : 1800,
        scale    : 0
      }

      var block = {
        reset: true,
        viewOffset: { top: 64 }
      }

    sr.reveal(".scrollreveal", block);
    sr.reveal("#sb_instagram", block);

})()
