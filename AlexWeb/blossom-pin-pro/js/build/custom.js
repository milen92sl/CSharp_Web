jQuery(document).ready(function($) {

    var slider_auto, slider_loop, rtl;

    if (blossom_pin_pro_data.rtl == '1') {
        rtl = true;
    } else {
        rtl = false;
    }

    if (blossom_pin_pro_data.auto == '1') {
        slider_auto = true;
    } else {
        slider_auto = false;
    }

    if (blossom_pin_pro_data.loop == '1') {
        slider_loop = true;
    } else {
        slider_loop = false;
    }

    //banner slider
    $('.banner-slider.banner-layout-one').owlCarousel({
        loop: slider_loop,
        autoplay: slider_auto,
        margin: 8,
        nav: true,
        dots: false,
        lazyload: true,
        thumbs: false,
        rtl: rtl,
        navText: ['<svg xmlns="http://www.w3.org/2000/svg" viewBox="-19991 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-20326.6 -12200.8)"/></svg> ', ' <svg xmlns="http://www.w3.org/2000/svg" viewBox="-18147 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-17793.4 -11413.2) rotate(180)"/></svg> '],
        responsive: {
            0: {
                items: 1,
                margin: 0
            },
            600: {
                items: 2
            },
            768: {
                items: 3
            },
            1200: {
                items: 4
            },
            1400: {
                items: 5
            }
        },
        animateOut: blossom_pin_pro_data.animation,
        autoplaySpeed : 700,
        autoplayTimeout : blossom_pin_pro_data.speed,
    });

    $('.banner-layout-two').owlCarousel({
        loop: slider_loop,
        autoplay: slider_auto,
        margin: 0,
        nav: true,
        dots: false,
        rtl: rtl,
        items: 1,
        thumbs: true,
        thumbImage: true,
        thumbContainerClass: 'owl-thumbs',
        thumbItemClass: 'owl-thumb-item',
        navText: ['<svg xmlns="http://www.w3.org/2000/svg" viewBox="-19991 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-20326.6 -12200.8)"/></svg> ', ' <svg xmlns="http://www.w3.org/2000/svg" viewBox="-18147 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-17793.4 -11413.2) rotate(180)"/></svg> '],
        animateOut: blossom_pin_pro_data.animation,
        autoplaySpeed : 700,
        autoplayTimeout : blossom_pin_pro_data.speed,
    });

    $('.banner-layout-three').owlCarousel({
        loop: slider_loop,
        autoplay: slider_auto,
        margin: 0,
        nav: true,
        dots: false,
        rtl: rtl,
        items: 1,
        thumbs: false,
        navText: ['<svg xmlns="http://www.w3.org/2000/svg" viewBox="-19991 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-20326.6 -12200.8)"/></svg> ', ' <svg xmlns="http://www.w3.org/2000/svg" viewBox="-18147 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-17793.4 -11413.2) rotate(180)"/></svg> '],
        animateOut: blossom_pin_pro_data.animation,
        autoplaySpeed : 700,
        autoplayTimeout : blossom_pin_pro_data.speed,
    });

    $('.banner-layout-four').owlCarousel({
        loop: slider_loop,
        autoplay: slider_auto,
        margin: 0,
        nav: true,
        dots: false,
        rtl: rtl,
        items: 1,
        thumbs: false,
        navText: ['<svg xmlns="http://www.w3.org/2000/svg" viewBox="-19991 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-20326.6 -12200.8)"/></svg> ', ' <svg xmlns="http://www.w3.org/2000/svg" viewBox="-18147 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-17793.4 -11413.2) rotate(180)"/></svg> '],
        autoplaySpeed : 700,
        autoplayTimeout : blossom_pin_pro_data.speed,
    });

    $('.banner-layout-five').owlCarousel({
        loop: slider_loop,
        autoplay: slider_auto,
        margin: 8,
        nav: true,
        dots: true,
        rtl: rtl,
        items: 4,
        dotsEach: true,
        thumbs: false,
        navText: ['<svg xmlns="http://www.w3.org/2000/svg" viewBox="-19991 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-20326.6 -12200.8)"/></svg> ', ' <svg xmlns="http://www.w3.org/2000/svg" viewBox="-18147 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-17793.4 -11413.2) rotate(180)"/></svg> '],
        autoplaySpeed : 700,
        autoplayTimeout : blossom_pin_pro_data.speed,
        responsive: {
            0: {
                items: 1,
                margin: 0
            },
            600: {
                items: 2
            },
            768: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });

    $('.banner-layout-six').owlCarousel({
        loop: slider_loop,
        autoplay: slider_auto,
        margin: 50,
        nav: true,
        dots: false,
        rtl: rtl,
        items: 1,
        thumbs: false,
        stagePadding: 300,
        navText: ['<svg xmlns="http://www.w3.org/2000/svg" viewBox="-19991 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-20326.6 -12200.8)"/></svg> ', ' <svg xmlns="http://www.w3.org/2000/svg" viewBox="-18147 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-17793.4 -11413.2) rotate(180)"/></svg> '],
        animateOut: blossom_pin_pro_data.animation,
        autoplaySpeed : 700,
        autoplayTimeout : blossom_pin_pro_data.speed,
        responsive:{
            0: {
                stagePadding: 0,
                margin: 0
            },
            768: {
                stagePadding: 100,
                margin: 20
            },
            1200: {
                stagePadding: 200,
                margin: 40
            },
            1400: {
                stagePadding: 300,
                margin: 50
            }

        }
    });

    $('.banner-layout-seven').owlCarousel({
        loop: slider_loop,
        autoplay: slider_auto,
        margin: 0,
        nav: true,
        dots: false,
        rtl: rtl,
        items: 1,
        thumbs: false,
        navText: ['<svg xmlns="http://www.w3.org/2000/svg" viewBox="-19991 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-20326.6 -12200.8)"/></svg> ', ' <svg xmlns="http://www.w3.org/2000/svg" viewBox="-18147 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-17793.4 -11413.2) rotate(180)"/></svg> '],
        animateOut: blossom_pin_pro_data.animation,
        autoplaySpeed : 700,
        autoplayTimeout : blossom_pin_pro_data.speed,
    });

    $('.banner-layout-eight').owlCarousel({
        loop: slider_loop,
        autoplay: slider_auto,
        nav: true,
        dots: false,
        rtl: rtl,
        items: 1,
        margin: 8,
        thumbs: false,
        navText: ['<svg xmlns="http://www.w3.org/2000/svg" viewBox="-19991 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-20326.6 -12200.8)"/></svg> ', ' <svg xmlns="http://www.w3.org/2000/svg" viewBox="-18147 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-17793.4 -11413.2) rotate(180)"/></svg> '],
        autoplaySpeed : 700,
        autoplayTimeout : blossom_pin_pro_data.speed,
        responsive:{
            768: {
                stagePadding: 20

            },
            1200: {
                stagePadding: 150
            },
            1400: {
                stagePadding: 235
            }
        }
    });

    $('.format-gallery .owl-carousel, .post-wrapper .owl-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        margin: 0,
        nav: true,
        dots: false,
        rtl: rtl,
        items: 1,
        thumbs: false,
        navText: ['<svg xmlns="http://www.w3.org/2000/svg" viewBox="-19991 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-20326.6 -12200.8)"/></svg> ', ' <svg xmlns="http://www.w3.org/2000/svg" viewBox="-18147 -11813 18 12"><path id="path" class="cls-1" d="M353.6,392.8v2H339.4l3.6,3.6-1.4,1.4-6-6,6-6,1.4,1.4-3.6,3.6Z" transform="translate(-17793.4 -11413.2) rotate(180)"/></svg> '],
    });

    //Home Page Masonry
    var $this = $('.blog:not(.no-post) #primary .site-main');
    $this.imagesLoaded(function() {
        $this.masonry({
            itemSelector: '.blog #primary .post'
        });
    });

    // Search Form
    var winWidth = $(window).width();
    if (winWidth > 1024) {
        $('.site-header .tools .search-icon').click(function() {
            var headerHeight = $('.site-header').outerHeight();
            $('.search-form-holder').css('top', headerHeight);
            $('body').toggleClass('form-open');
        });
    }

    // search form for mobile version
    if (winWidth < 1025) {
        $('.mobile-site-header .tools .search-icon').click(function() {
            var mobileHeaderHeight = $('.mobile-site-header').outerHeight();
            $('.search-form-holder').css('top', mobileHeaderHeight);
            $('body').toggleClass('form-open');
        });
    }

    // for not single post scrolling header
    if (blossom_pin_pro_data.single != '1' && blossom_pin_pro_data.sticky_header == '1') {

        if (winWidth > 1024) {
            $(window).scroll(function() {
                var headerHeight = $('.site-header').outerHeight();
                if ($(this).scrollTop() > headerHeight) {
                    $('body').addClass("ed-sticky-header");
                } else {
                    $('body').removeClass("ed-sticky-header");
                }
            });
        }
    }

    //for single post scrolling header
    if (winWidth > 1024) {
        $(window).scroll(function() {
            var headerHeight = $('.site-header').outerHeight();
            if ($(this).scrollTop() > headerHeight) {
                $('.single .single-header').addClass("show");
            } else {
                $('.single .single-header').removeClass("show");
            }
        });
    }
    if (blossom_pin_pro_data.single == '1' && blossom_pin_pro_data.sticky_single_header == '1') {
        // When the user scrolls the page, execute myFunction 
        var totalheight = $('.recommended-post').innerHeight() + $('.comment-section').innerHeight() + $('.instagram-section').innerHeight() + $('.newsletter-section').innerHeight() + $('.site-footer').innerHeight();

        window.onscroll = function() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight - parseInt(totalheight);
            var scrolled = (winScroll / height) * 100;

            document.getElementById("myBar").style.width = scrolled + "%";
        };
    }

    //primary mobile menu
    if (winWidth < 1025) {
        $('.mobile-menu').prepend('<div class="btn-close-menu"><span></span></div>');
        $('#site-navigation ul li.menu-item-has-children').append('<div class="arrow-holder"><span class="fas fa-angle-down"></span></div>');
        $('#site-navigation ul li .arrow-holder').click(function() {
            $(this).prev().slideToggle();
            $(this).toggleClass('active');
        });

        $('#toggle-button').click(function() {
            // $('.main-navigation').toggleClass('open');
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

    //match height
    $('.blog.layout-five #primary .post').matchHeight();
    $('.blog.layout-five-right-sidebar #primary .post').matchHeight();
    $('.blog.layout-five-left-sidebar #primary .post').matchHeight();
    $('.blog.layout-six #primary .post').matchHeight();
    $('.blog.layout-six-right-sidebar #primary .post').matchHeight();
    $('.blog.layout-six-right-sidebar #primary .post').matchHeight();
    $('.blog.layout-six-left-sidebar #primary .post').matchHeight();

    /** Lightbox */
    if( blossom_pin_pro_data.lightbox == '1' ){        
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
    $.fn.wrapStart = function(numWords) {
        var node = this.contents().filter(function() {
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
    if (($('.post-template-default').length > 0 || ($('.page-template-default').length > 0 && $('.home').length == 0)) && blossom_pin_pro_data.drop_cap == 1) {
        $('.entry-content p').wrapStart(1);
    }
    
    // Script for back to top
    $(window).scroll(function(){
        if($(this).scrollTop() > 300){
          $('.back-to-top').fadeIn();
        }else{
          $('.back-to-top').fadeOut();
        }
    });

    $(".back-to-top").click(function(){
        $('html,body').animate({scrollTop:0},600);
    });

    //post widget sticky
    if( blossom_pin_pro_data.sticky_widget == '1' ){
        $("#secondary").theiaStickySidebar({
            additionalMarginTop: 20
        });
    }

    $(".single #primary .post .holder .meta-info").theiaStickySidebar({
        additionalMarginTop: 20
    });

    $(".insta-icon").prependTo(".profile-link");
});
