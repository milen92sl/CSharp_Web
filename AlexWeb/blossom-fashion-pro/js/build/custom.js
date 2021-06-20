jQuery(document).ready(function($) {

    var slider_auto, slider_loop, rtl, header_layout, winWidth;
    
    if( blossom_fashion_pro_data.auto == '1' ){
        slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( blossom_fashion_pro_data.loop == '1' ){
        slider_loop = true;
    }else{
        slider_loop = false;
    }
    
    if( blossom_fashion_pro_data.rtl == '1' ){
        rtl = true;
    }else{
        rtl = false;
    }
    
    // banner slider
    $('#banner-slider').owlCarousel({
        loop       : slider_loop,
        margin     : 0,
        nav        : true,
        items      : 1,
        dots       : true,
        autoplay   : slider_auto,
        navText    : '',
        rtl        : rtl,
        lazyLoad   : true,
        animateOut : blossom_fashion_pro_data.animation,
        autoplayTimeout : blossom_fashion_pro_data.speed,
    });
    
    $('#banner-slider-five').owlCarousel({
        loop       : slider_loop,
        nav        : true,
        items      : 1,
        dots       : true,
        autoplay   : slider_auto,
        animateOut : '',
        navText    : '',
        center     : true,
        rtl        : rtl,
        lazyLoad   : true,
        autoplayTimeout : blossom_fashion_pro_data.speed,
        responsive : {
            1200: {
                margin: 80,
                stagePadding: 234,
            },
            1025: {
                margin: 50,
                stagePadding: 150,
            },
            768: {
                margin: 20,
                stagePadding: 50
            }
        }
    });

    $('#banner-slider-six').owlCarousel({
        loop       : slider_loop,
        nav        : true,
        dots       : true,
        autoplay   : slider_auto,
        animateOut : '',
        navText    : '',
        rtl        : rtl,
        lazyLoad   : true,
        autoplayTimeout : blossom_fashion_pro_data.speed,
        responsive : {
            1440: {
                margin: 40,
                items: 4
            },
            1025: {
                items: 3,
                margin: 40,
            },
            768: {
                items: 2,
                margin: 20
            },
            0: {
                items: 1,
                margin: 0
            }
        }
    });
    
    // Shop Section slider
    $('.shop-slider').owlCarousel({
       nav       : false,
       dots      : true,
       rtl       : rtl,
       lazyLoad  : true, 
       mouseDrag : false,
       responsive: {
           0:{
               items: 1,
               margin: 15
           },
           768:{
               items: 3,
               margin: 15
           },
           1200:{
               items: 4,
               margin: 15
           },
           1440:{
               margin: 40,
               items: 4
           }
       }
   });

    // Bottom shop slider
    $('.bottom-shop-slider').owlCarousel({
        dots      : false,
        nav       : true,
        rtl       : rtl,
        lazyLoad  : true,
        responsive: {
            0: {
                items: 1,
                margin: 0
            },
            768:{
                items: 3,
                margin: 20
            },
            1025: {
                items: 4,
                margin: 22
            },
            1200:{
                items: 5,
                margin: 22
            }
        }
    });

    // instagram slider
    $('.instagram-section .popup-gallery').addClass('owl-carousel');
    $('.instagram-section .popup-gallery').owlCarousel({
        nav          : true,
        dots         : false,
        stagePadding : 180,
        loop         : true,
        rtl          : rtl,
        lazyLoad     : true,
        responsive   : {
            0:{
                items: 1,
                margin: 20,
                stagePadding: 60
            },
            768:{
                items: 2,
                margin: 20,
                stagePadding: 100
            },
            1025:{
                items: 4,
                margin: 20,
                stagePadding: 100
            },
            1300:{
                items: 6,
                margin: 20,
                stagePadding: 180
            }

        }
    });   
    
    
    winWidth = $(window).width();
    header_layout = blossom_fashion_pro_data.h_layout;
    if( header_layout == 'four' || winWidth < 1025 ) {
        $('#site-navigation').prepend('<div class="btn-close-menu"><span></span></div>');
        $('#site-navigation ul li.menu-item-has-children').append('<span><i class="fa fa-angle-down"></i></span>');
        $('#site-navigation ul li span').click(function() {
            $(this).prev().slideToggle();
            $(this).toggleClass('active');
        });

        $('#toggle-button').click(function() {
            $('.main-navigation').toggleClass('open');
            $('body').toggleClass('menu-open');
        });

        $('.btn-close-menu').click(function() {
            $('body').removeClass('menu-open');
            $('.main-navigation').removeClass('open');
        });

        $('.overlay').click(function() {
            $('body').removeClass('menu-open');
            $('.main-navigation').removeClass('open');
        });

        $('#toggle-button').click(function(event) {
            event.stopPropagation();
        });

        $('#site-navigation').click(function(event) {
            event.stopPropagation();
        });
    }

    //secondary mobile menu
    //secondary menu
    if( winWidth < 1025 ){
        $('.secondary-nav ul li.menu-item-has-children').append('<span><i class="fa fa-angle-down"></i></span>');
        $('.secondary-nav ul li span').click(function(){
            $(this).prev().slideToggle();
            $(this).toggleClass('active');
        });

        $('#secondary-toggle-button').click(function(){
            $('.secondary-nav').slideToggle();
            $(this).toggleClass('close');
        });
    }
        
    //Header Search form show/hide
    $('.site-header .form-section').click(function(event){
        event.stopPropagation();
    });
     
    $("#btn-search").click(function() {
        $(".site-header .form-holder").show("fast");
        $('body').addClass('search-active');
    });
     
    $('.btn-close-form').click(function(){
        $('.site-header .navigation-holder .form-holder').hide("fast");
        $('body').removeClass('search-active');
        $('.header-five .form-holder').hide("fast");
        $('.header-six .header-t .form-holder').hide("fast");
        $('.header-eight .header-t .form-holder').hide("fast");
    });

    $('.btn-close-form').click(function(){
        $('.header-two .header-t .form-holder').hide("fast");
    });
    
    if( blossom_fashion_pro_data.single_sticky == '1' ){
        //for single post scrolling header
        $(window).scroll(function() {
            if( $(this).scrollTop() > 200 ){
                $('.single .single-header').addClass("show");
            }else{
                $('.single .single-header').removeClass("show");
            }
        });
    }
    
    // Script for back to top
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('#blossom-top').fadeIn();
        } else {
            $('#blossom-top').fadeOut();
        }
    });

    $("#blossom-top").click(function() {
        $('html,body').animate({ scrollTop: 0 }, 600);
    });
    
    /** Lightbox */
    if( blossom_fashion_pro_data.lightbox == '1' ){
        
        $("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif'],[data-fancybox]").fancybox({
            buttons: [
            "zoom",
            //"share",
            "slideShow",
            "fullScreen",
            //"download",
            //"thumbs",
            "close"
            ]
        });
        
    }
    
    /**
    * First Letter of word to Drop Cap
    * https://stackoverflow.com/questions/5458605/first-word-selector 
    * https://paulund.co.uk/capitalize-first-letter-string-javascript
    */
    $.fn.wrapStart = function (numWords) { 
        var node = this.contents().filter(function () { 
                return this.nodeType == 3; 
            }).first(),
            text = node.text(),
            first = text.split(" ", numWords).join(" ");
            firstLetter = first.charAt(0);
            finale = '<span class="dropcap">' + firstLetter + '</span>' + first.slice(1);
            
        if (!node.length)
            return;
    
        node[0].nodeValue = text.slice(first.length);        
        node.before(finale);        
    };
    if( blossom_fashion_pro_data.singular == 1 && blossom_fashion_pro_data.drop_cap == 1 ){
        $('.entry-content p').wrapStart(1);
    }
    
    /** Sticky Header */
    if( blossom_fashion_pro_data.sticky == '1' && blossom_fashion_pro_data.single != '1' ){
        var mns = "sticky-menu";
        holder = $('.header-holder');
        navhol = ( header_layout == 'six' || header_layout == 'seven' ) ? $('.main-header') : $('.navigation-holder');
        
        hdr = holder.outerHeight();
        nav = navhol.outerHeight();
        
        if( header_layout == 'four' ){                
            holder.addClass(mns);
            $('.sticky-holder').height(hdr);                
        }else if( header_layout == 'five' ){
            $('.site-header').addClass(mns);
            var ht = $('.site-header').outerHeight();
            $('.sticky-holder').height(ht);   
        }else if( header_layout == 'eight' ){
            holder.addClass(mns);
            $('.sticky-holder').height(hdr);
        }else{
            $(window).scroll(function(){                
                if( $(this).scrollTop() > hdr ) {
                    navhol.addClass(mns); 
                    $('.sticky-holder').height(nav);
                }else{
                    navhol.removeClass(mns);
                    $('.sticky-holder').height(0);
                }                                      
            });
        }
    }
    
    //Sticky widget
    if( blossom_fashion_pro_data.sticky_widget == '1' && winWidth > 1024 ){
        $("#secondary").stick_in_parent({
            offset_top: 60,
        });
    }

    //js for next/prev btn in single
     var headerHeight = $('.site-header').height();   

     "use strict";
 
     var top = !1,
         bottom = !0;
     $(".site-header").waypoint(function(direction) {
         "down" == direction ? (bottom = !1, top || $(".single .post-navigation .nav-holder").show()) : (bottom = !0, $(".single .post-navigation .nav-holder").hide());
     }, {
         offset: -headerHeight
     }), $(".site-footer, .instagram-section, .bottom-shop-section").waypoint(function(direction) {
         "down" == direction ? (top = !0, $(".single .post-navigation .nav-holder").hide()) : (top = !1, bottom || $(".single .post-navigation .nav-holder").show());
     }, {
         offset: "100%"
     });
    
});