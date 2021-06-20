jQuery(document).ready(function($) {

    var winWidth = $(window).width();
    var slider_auto, slider_loop, rtl;
    
    if( blossom_recipe_pro_data.auto == '1' ){
        slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( blossom_recipe_pro_data.loop == '1' ){
        slider_loop = true;
    }else{
        slider_loop = false;
    }
    
    if( blossom_recipe_pro_data.rtl == '1' ){
        rtl = true;
    }else{
        rtl = false;
    }
    
    //banner slider js
    $(".slider-one .banner-slider").owlCarousel({
        items:3,
        margin: 20,
        loop: slider_loop,
        dots: false,
        nav: true,
        autoplay: slider_auto,
        smartSpeed: 500,
        rtl:rtl,
        lazyLoad   : true,
        animateOut: blossom_recipe_pro_data.animation,
        autoplayTimeout : blossom_recipe_pro_data.speed,
        responsive : {
            0 : {
                items: 1,
            },
            768 : {
                items: 2,
            }, 
            1025 : {
                items: 3,
            }
        }
    });

    //banner slider three
    $(".slider-three .banner-slider").owlCarousel({
        items:1,
        margin: 0,
        loop: slider_loop,
        dots: false,
        nav: true,
        autoplay: slider_auto,
        smartSpeed: 500,
        lazyLoad   : true,
        rtl:rtl,
        animateOut: blossom_recipe_pro_data.animation,
        autoplayTimeout : blossom_recipe_pro_data.speed,
    });

    //banner slider six
    $(".slider-four .banner-slider").owlCarousel({
        items:5,
        margin: 15,
        loop: slider_loop,
        dots: false,
        nav: true,
        autoplay: slider_auto,
        smartSpeed: 500,
        rtl:rtl,
        lazyLoad   : true,
        animateOut: blossom_recipe_pro_data.animation,
        autoplayTimeout : blossom_recipe_pro_data.speed,
        responsive : {
            0 : {
                items: 1,
            },
            641 : {
                items: 2,
            }, 
            981 : {
                items: 3,
            }, 
            1171 : {
                items: 4,
            },
            1211 : {
                items: 5,
            }
        }
    });
    
    var stickyBarHeight = $('.sticky-t-bar .sticky-bar-content').innerHeight();
    $('.site-header').css('padding-top', stickyBarHeight);
    $('.sticky-t-bar').addClass('active');
    $('.sticky-t-bar .sticky-bar-content').show();
    $('.sticky-t-bar .close').click(function(){
        if($('.sticky-t-bar').hasClass('active')){
            $('.sticky-t-bar').removeClass('active');
            $('.sticky-t-bar .sticky-bar-content').stop(true, false, true).slideUp();
            $('.site-header').css('padding-top', 0);
        }else{
            $('.sticky-t-bar').addClass('active');
            $('.sticky-t-bar .sticky-bar-content').stop(true, false, true).slideDown();
            $('.site-header').css('padding-top', stickyBarHeight);
        }
    });

    if( blossom_recipe_pro_data.sticky == '1' ){
        var headerHeight = $('.site-header').outerHeight();
        $(window).scroll(function(){
            if($(this).scrollTop() > headerHeight){
                $('.sticky-header').addClass('sticky');
            }else {
                $('.sticky-header').removeClass('sticky');
            }

            if($(this).scrollTop() > 30){
                $('.sticky-t-bar').removeClass('active');
                $('.sticky-t-bar .sticky-bar-content').stop(true, false, true).slideUp();
                $('.site-header').css('padding-top', 0);
            }
        });
    }

    var siteWidth = $('.site').width();
    var CbgWidth = parseInt(winWidth) - parseInt(siteWidth);
    var finalCbgWidth = parseInt(CbgWidth) / 2;
    $('.custom-background .sticky-t-bar span.close').css('right', finalCbgWidth);

    //search toggle js
    $('.header-search > span.search-btn').click(function(){
        $(this).siblings('.header-search-form').addClass('active');
        $('body').addClass('search-active');
    });
    $('.header-search-form span.close' && '.header-search-form').click(function(){
        $(this).parent('.header-search-form').removeClass('active');
        $('body').removeClass('search-active');
    });

    $('.header-search-form .search-form').click(function(e){
        e.stopPropagation();
    });

    //main navigation
    $('.main-navigation ul li.menu-item-has-children').prepend('<span class="submenu-toggle"><i class="fas fa-chevron-down"></i></span>');
    if($(window).width() <= 1024) {
        $('.main-navigation').prepend('<span class="close"></span>');
        $('.main-navigation .sub-menu').hide();
        $('.main-navigation .toggle-button').click(function(){
            $(this).parent('.main-navigation').addClass('menu-toggled');
        });
        $('.main-navigation .close').click(function(){
            $(this).parent('.main-navigation').removeClass('menu-toggled');
        });
        $('.main-navigation ul li .submenu-toggle').click(function(){
            $(this).parent('li.menu-item-has-children').toggleClass('active');
            $(this).siblings('.sub-menu').slideToggle();
        });
    }

    //show/hide scroll button
    $(window).scroll(function(){
        if($(window).scrollTop() >300) {
            $('#back-to-top').addClass('show');
        } else {
            $('#back-to-top').removeClass('show');
        }
    });

    //scroll window to top
    $('#back-to-top').on('click', function(){
        $('html, body').animate({
            scrollTop: 0
        }, 600);
    });

    //add span in widget title
    $('#secondary .widget .widget-title, .site-footer .widget .widget-title').wrapInner('<span></span>');

    //post share toggle
    $('figure.post-thumbnail .share-icon').click(function(e){
        $(this).parent('.post-share').toggleClass('active');
        e.stopPropagation();
    });

    $('figure.post-thumbnail .social-icon-list').click(function(){
        e.stopPropagation();
    });

    $(window).click(function(){
        $('.post-share').removeClass('active');
    });

    //tab js
    var contentHeight = $('.tab-content').outerHeight();
    $('.tab-section .tab-content-wrap').css('height', contentHeight);
    $('.tab-btn').click(function(){
        var divId = $(this).attr('id');
        $('.tab-btn').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').stop(true, false, true);
        $('.tab-content').removeClass('active');
        $('#'+divId+'-content').stop(true, false, true).addClass('active');

    });

    //two col grid masonry
    var $grid = $('.two-col-grid .article-group').imagesLoaded( function() {
      $grid.masonry({
        itemSelector: '.article-wrap',
        percentPosition: true,
    });
  });
    
    /** Lightbox */
    if( blossom_recipe_pro_data.lightbox == '1' ){        
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
    if( ( $('.post-template-default').length > 0 || $('.page-template-default').length > 0 ) && blossom_recipe_pro_data.drop_cap == 1 ){
        $('.entry-content p').wrapStart(1);
    }

    //post widget sticky
    if( blossom_recipe_pro_data.sticky_widget == '1' ){
        $("#secondary").theiaStickySidebar({
            additionalMarginTop: 20
        });
    }

});