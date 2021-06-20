jQuery(document).ready(function($){    
    
    var slider_auto, slider_loop, rtl, mrtl, stagePad;
    
    //Header Search form show/hide
    $('html').click(function() {
        $('.site-header .form-holder').slideUp();
    });

    $('.site-header .form-section').click(function(event) {
        event.stopPropagation();
    });
    $("#btn-search").click(function() {
        $(".site-header .form-holder").slideToggle();
        return false;
    });

    /** Variables from Customizer for Slider settings */
    if( bfp_data.auto == '1' ){
        slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( bfp_data.loop == '1' ){
        slider_loop = true;
    }else{
        slider_loop = false;
    }
    
    if( bfp_data.rtl == '1' ){
        rtl = true;
        mrtl = false;
    }else{
        rtl = false;
        mrtl = true;
    }
    
    //banner slider
    $('.slider-layout-one').owlCarousel({
        loop       : slider_loop,
        margin     : 0,
        nav        : true,
        items      : 1,
        dots       : false,
        autoplay   : slider_auto,
        animateOut : bfp_data.animation,
        autoplayTimeout : bfp_data.speed,
        rtl        : rtl
    });

    //banner layout two
    $('.slider-layout-two').owlCarousel({
        loop       : slider_loop,
        margin     : 30,
        nav        : true,
        items      : 1,
        dots       : false,
        autoplay   : slider_auto,
        animateOut : bfp_data.animation,
        autoplayTimeout : bfp_data.speed,
        rtl        : rtl
    });

    //banner layout three
    $('.slider-layout-three').owlCarousel({
        loop       : slider_loop,
        nav        : true,
        items      : 1,
        dots       : false,
        autoplay   : slider_auto,
        autoplayTimeout : bfp_data.speed,
        rtl        : rtl,
        responsive : {
            1200: {
                margin: 130,
                stagePadding: 215
            },
            1025: {
                margin: 50,
                stagePadding: 85
            },
            768: {
                margin: 5,
                stagePadding: 85
            },
            0: {
                margin: 10,
                stagePadding: 30
            }
        }
    });

    //banner layout four
    $('.slider-layout-four').owlCarousel({
        loop         : slider_loop,
        margin       : 30,
        nav          : true,
        dots         : false,
        autoplay     : slider_auto,
        autoplayTimeout : bfp_data.speed,
        stagePadding : 150,
        rtl          : rtl,
        responsive   : {
            1200: {
                items: 3
            },
            1025: {
                items: 2
            },
            768: {
                items: 2,
                stagePadding: 50
            },
            0: {
                items: 1,
                margin: 10,
                stagePadding: 10
            }
        }
    });

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

    //match height
    $('.post-navigation .nav-links .nav-holder').matchHeight();
    $('.archive #primary .post').matchHeight();

    //Responsive menu
    var winWidth = $(window).width();
    if (winWidth < 1025) {
        $('#site-navigation ul li.menu-item-has-children').append('<span><i class="fa fa-angle-down"></i></span>');
        $('#site-navigation ul li span').click(function() {
            $(this).prev().slideToggle();
            $(this).toggleClass('active');
        });

        $('#primary-toggle-button').click(function() {
            $('.main-navigation').slideToggle();
        });
    }

    //secondary menu
    if (winWidth < 768) {
        $('.secondary-nav ul li.menu-item-has-children').append('<span><i class="fa fa-angle-down"></i></span>');
        $('.secondary-nav ul li span').click(function() {
            $(this).prev().slideToggle();
            $(this).toggleClass('active');
        });

        $('#secondary-toggle-button').click(function() {
            $('.secondary-nav').slideToggle();
        });
    }

    //sticky kit
    if( winWidth > 767 ){
        $(".single #primary .post .text-holder .entry-content .social-share").stick_in_parent({
            offset_top: 60,
        });
    }

    //Sticky widget
    var sticky_widget; 
    if( bfp_data.sticky_widget == '1' && winWidth > 1024 ){
        $("#secondary").stick_in_parent({
            offset_top: 60,
        });
    }

    //wow
    new WOW().init();

    /** Masonry */
    if( ( $('.blog').length > 0 ) && ( $('.masonry').length > 0 ) ){
        var $this = $('.blog-layout-three .js-masonry');
        $this.imagesLoaded(function(){ 
            $this.masonry({
                itemSelector: '.post',
                isOriginLeft: mrtl
            }); 
        });
    }
    
    /** Lightbox */
    if( bfp_data.lightbox == '1' ){
        
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
    
    /** Sticky Header */
    var header_layout = bfp_data.header;
    
    if( bfp_data.sticky == '1' ){
        var mns = "sticky-menu";
        holder = $('.header-holder');
        navhol = $('.header-b');
        
        hdr = holder.outerHeight();
        nav = navhol.outerHeight();
        
        if( header_layout == 'four' ){                
            navhol.addClass(mns);
            $('.sticky-holder').height(nav);                
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

    //calculate height 
    var promoHeight = $('.promotional-block').outerHeight();
    $('.promotional-block + .header-layout-four .sticky-menu').css('top', promoHeight);
    $(window).scroll(function(){
        if($(this).scrollTop() > 10){
            $('.promotional-block + .header-layout-four .sticky-menu').css('top', 0);
        }else{
            $('.promotional-block + .header-layout-four .sticky-menu').css('top', promoHeight);
        }
    });
    
});