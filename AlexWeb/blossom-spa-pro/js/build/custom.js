jQuery(document).ready(function($) {

    $('.main-navigation ul li.menu-item-has-children').prepend('<span class="submenu-toggle"><i class="fas fa-chevron-down"></i></span>');

    $('.nav-wrap .main-navigation button.toggle-btn').on('click', function(){
        $('body').addClass('menu-toggled');
    });

    $('.responsive-nav .main-navigation button.toggle-btn, .responsive-nav .main-navigation ul li a').on('click', function(){
        $('body').removeClass('menu-toggled');
    });

    $('.responsive-nav .main-navigation ul li span').on('click', function(){
        $(this).toggleClass('active');
        $(this).siblings('.responsive-nav .main-navigation ul ul').slideToggle();
    });

    $('.header-six .header-t .nav-right').clone().appendTo('.header-six .header-main .nav-wrap');
    $('.header-seven .header-t .nav-right').clone().appendTo('.header-seven .header-main .nav-wrap');

    //toggle search form
    $('.header-search > svg, .sticky-header .header-search > svg').on('click', function(){
        $('.search-form-wrap').slideDown().addClass('active');
    });

    $('.search-form-wrap .close').on('click', function(){
        $('.search-form-wrap').slideUp().removeClass('active');
    });

    //sticky header
    var headerHeight = $('.site-header').outerHeight();

    if(blossom_spa_pro_data.sticky == '1'){
        $(window).scroll(function(){
            if($(window).scrollTop() > headerHeight) {
                $('body').addClass('header-sticky');
            }else{
                $('body').removeClass('header-sticky');
            }
        });

        var stickyHeight = $('.sticky-header').outerHeight();
        $('.sticky-social .article-meta').css('top', stickyHeight);
    }
    
    var slider_auto, slider_loop, rtl;
    
    if( blossom_spa_pro_data.auto == '1' ){
        slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( blossom_spa_pro_data.loop == '1' ){
        slider_loop = true;
    }else{
        slider_loop = false;
    }
    
    if( blossom_spa_pro_data.rtl == '1' ){
        rtl = true;
    }else{
        rtl = false;
    }

    //banner slider js
    $('#banner-slider').owlCarousel({
        items: 1,
        autoplay: slider_auto,
        loop: slider_loop,
        nav: true,
        dots: true,
        rtl: rtl,
        autoplaySpeed: 800,
        autoplayTimeout: 3000,
        animateOut: blossom_spa_pro_data.animation,
    });
    
    $('.service-section.style-1 .widget_bttk_icon_text_widget').each(function(){
        $(this).find('.icon-holder').insertAfter($(this).find('.widget-title'));
    });

    var winWidth = $('.site').width();
    var containerWidth = $('.site-header .container').width();
    var tWidth = (parseInt(winWidth) - parseInt(containerWidth)) / 2;

    $('body:not(.rtl) .about-section .widget_blossomtheme_featured_page_widget .widget-featured-holder.left').css('padding-right', tWidth);
    $('.rtl .about-section .widget_blossomtheme_featured_page_widget .widget-featured-holder.left').css('padding-left', tWidth);

     $('body:not(.rtl) .about-section .widget_blossomtheme_featured_page_widget .widget-featured-holder.right').css('padding-left', tWidth);
    $('.rtl .about-section .widget_blossomtheme_featured_page_widget .widget-featured-holder.right').css('padding-right', tWidth);

    $('body:not(.rtl) .contact-section .widget_custom_html + .widget_text').css('padding-right', tWidth);
    $('.rtl .contact-section .widget_custom_html + .widget_text').css('padding-left', tWidth);

    if($(window).width() > 1024) {
        var itemCount = $('.header-seven .header-main .main-navigation .nav-menu > li').size();
        var liIndex = Math.round( itemCount / 2 ) - 1;
        $('.header-main .site-branding').insertAfter($('.header-seven .header-main .main-navigation .nav-menu > li:nth('+ liIndex +')'));
    }

    //woocommerce category dropdown
    $('.widget.woocommerce ul li.cat-parent').append('<span class="cat-toggle"><i class="fas fa-chevron-right"></i></span>');
    $('.widget.woocommerce ul li.cat-parent .cat-toggle').on('click', function(){
     $(this).siblings('ul.children').stop(true, false, true).slideToggle();
     $(this).toggleClass('active'); 
 });

    //show/hide scroll button
    $(window).scroll(function(){
        if($(window).scrollTop() >300) {
            $('.back-to-top').addClass('show');
        } else {
            $('.back-to-top').removeClass('show');
        }
    });

    //scroll window to top
    $('.back-to-top').on('click', function(){
        $('html, body').animate({
            scrollTop: 0
        }, 600);
    });

    //team slider
    var loopState;
    var teamItemCount = $('.team-section .grid').children('.widget').length;
    if(teamItemCount <= 4) {
        loopState = false;
    }else {
        loopState = true;
    }
    $('.team-section .grid').owlCarousel({
        items: 4,
        nav: true,
        dots: true,
        dotsEach: true,
        autoplay: true,
        autoplayHoverPause : true,
        loop: loopState,
        margin: 30,
        rtl: rtl,
        responsive : {
            0 : {
                items: 1,
            },
            768 : {
                items: 2,
            },
            1025 : {
                items: 3,
            },
            1200 : {
                items: 4,
            }
        }
    });

    //testimonial slider
    var testloopState;
    var testItemCount = $('.testimonial-section .grid').children('.widget').length;
    if(testItemCount == 1) {
        testloopState = false;
    }else {
        testloopState = true;
    }
    $('.testimonial-section .grid').owlCarousel({
        items: 1,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayHoverPause : true,
        loop: testloopState,
        margin: 0,
        rtl: rtl,
        responsive : {
            0 : {
                nav: false,
            },
            768 : {
                nav: true,
            }
        }
    });

    //banner slider js
    var ploopState;
    var productItemCount = $('.wc-product-section .wc-product-slider').children('.item').length;
    if(productItemCount <= 4) {
        ploopState = false;
    }else {
        ploopState = true;
    }
    $('.wc-product-slider').owlCarousel({
        items: 4,
        margin: 30,
        autoplay: true,
        autoplayHoverPause : true,
        loop: ploopState,
        nav: true,
        dots: true,
        dotsEach: true,
        autoplaySpeed: 800,
        autoplayTimeout: 3000,
        rtl: rtl,
        responsive : {
            0 : {
                items: 1,
            },
            768 : {
                items: 2,
            },
            1025 : {
                items: 3,
            },
            1200 : {
                items: 4,
            }
        }
    });

    //team widget scrollbar
    $('.widget_bttk_description_widget .bttk-team-holder-modal .description').mCustomScrollbar();

    //js for testimonial widget
    $('.widget_bttk_testimonial_widget').each(function(){
        $(this).find('.img-holder').insertBefore($(this).find('.testimonial-meta'));
    });

    //masonry js
    $('.masonry-layout .site-main').masonry({
        itemSelector: 'article',
    });
    
    
    /** Lightbox */
    if( blossom_spa_pro_data.lightbox == '1' ){        
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
    
    if( blossom_spa_pro_data.singular == 1 && blossom_spa_pro_data.front_page != 1 && blossom_spa_pro_data.drop_cap == 1 ){
        $('.entry-content p').wrapStart(1);
    }

    //post widget sticky
    if( blossom_spa_pro_data.sticky_widget == '1' ){
        $("#secondary").theiaStickySidebar({
            additionalMarginTop: 20
        });
    }

    
    /** One page Scroll */
    if( blossom_spa_pro_data.one_page == '1' && $('.home').length > 0 && $('.page').length > 0 ){        
        if( blossom_spa_pro_data.sticky == '1' ){
            MainHeight = $('.sticky-header').outerHeight();
            $('.main-navigation').onePageNav({
                currentClass: 'current-menu-item',
                changeHash: false,
                scrollSpeed: 1500,
                scrollThreshold: 0.5,
                filter: '',
                easing: 'swing',
                scrollOffset: MainHeight,     
            });
        }else{
            $('.main-navigation').onePageNav({
                currentClass: 'current-menu-item',
                changeHash: false,
                scrollSpeed: 1500,
                scrollThreshold: 0.5,
                filter: '',
                easing: 'swing',   
            }); 
        }
    }
});