/*! .isOnScreen() returns bool */
if (blossom_pin_pro_ajax.rtl == '1') {
    rtl = true;
} else {
    rtl = false;
}

jQuery.fn.isOnScreen = function(){
	
	var win = jQuery(window);
	
	var viewport = {
		top : win.scrollTop(),
		left : win.scrollLeft()
	};
	viewport.right = viewport.left + win.width();
	viewport.bottom = viewport.top + win.height();
	
	var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
	
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	
};

jQuery(document).ready(function($) {
    
    if (typeof blossom_pin_pro_ajax !== 'undefined') {
        
        //Start Ajax Pagination
        
        var pageNum = parseInt(blossom_pin_pro_ajax.startPage) + 1;
        var max = parseInt(blossom_pin_pro_ajax.maxPages);
        var nextLink = blossom_pin_pro_ajax.nextLink;
        var autoLoad = blossom_pin_pro_ajax.autoLoad;
        
        if ( autoLoad == 'load_more' ) {
            // Insert the "Load More Posts" link.
            $('.pagination')
                .before('<div class="pagination_holder" style="display: none;"></div>')                
                .after('<div id="load-posts"><a href="javascript:void(0);"><i class="fas fa-sync-alt"></i>' + blossom_pin_pro_ajax.loadmore + '</a></div>');
            if (pageNum == max+1) {
                $('#load-posts a').html('<i class="fas fa-ban"></i>'+blossom_pin_pro_ajax.nomore).addClass('disabled');
            }
            $('.search-no-results #load-posts').css('display', 'none');
            
            $('#load-posts a').click(function() {
                if(pageNum <= max && !$(this).hasClass('loading')) {
                    $(this).html('<i class="fas fa-sync-alt fa-spin"></i>'+blossom_pin_pro_ajax.loading).addClass('loading');

                    $('.pagination_holder').load(nextLink + ' .latest_post', function() {
                        // Update page number and nextLink.
                        pageNum++;
                        var new_url = nextLink;
                        nextLink = nextLink.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2'+ pageNum);
                        
                        //Temporary hold the post from pagination and append it to #main
                        var load_html = $('.pagination_holder').html(); 
                        $('.pagination_holder').html('');                                 
                        
                        if( $('.blog').length > 0 || $('.search').length > 0 || $('.archive').length > 0 ){
                            // Make jQuery object from HTML string
                            var $moreBlocks = $( load_html ).filter('article.latest_post');                        
                            // Append new blocks to container
                            $('.site-main').append( $moreBlocks ).imagesLoaded(function(){
                                // Have Masonry position new blocks
                                $('.site-main').masonry( 'appended', $moreBlocks );
                            });
                        }else{
                            $('.site-main article:last').after(load_html); // just simply append content without massonry
                        }
                                                
                        var $this = $('.site-main').find('.entry-content').find('div');
                        if( $this.hasClass('tiled-gallery') ){
                            $.getScript(blossom_pin_pro_ajax.plugin_url + "/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.js");                    
                        }

                        var $post_thumbnail = $('.post-thumbnail').children();
                        if( $post_thumbnail.hasClass('owl-carousel') ){
                            $('.format-gallery .owl-carousel').owlCarousel({
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
                        }
                        
                        if(pageNum <= max) {
                            $('#load-posts a').html('<i class="fas fa-sync-alt"></i>'+blossom_pin_pro_ajax.loadmore).removeClass('loading');
                        } else {
                            $('#load-posts a').html('<i class="fas fa-ban"></i>'+blossom_pin_pro_ajax.nomore).addClass('disabled').removeClass('loading');
                        }
                    });
                    
                } else {
                    //
                }

                return false;
            });
            $('.pagination').remove();
        }else if( autoLoad == 'infinite_scroll' ) {
            // autoload
            
            // Placeholder
            $('.pagination').before('<div class="pagination_holder" style="display: none;"></div><div class="ajax-loader"></div>');
                
            var loading_posts = false;
            var last_post = false;
            
            if( $('.blog').length > 0 || $('.search').length > 0 || $('.archive').length > 0 ){
            
            $(window).scroll(function() {
                if (!loading_posts && !last_post) {
                    var lastPostVisible = $('.latest_post').last().isOnScreen();
                    if (lastPostVisible) {
                        if(pageNum <= max) {
                            loading_posts = true;
                            $('.ajax-loader').addClass('loader');
                            $('.pagination_holder').load(nextLink + ' .latest_post', function() {
                                // Update page number and nextLink.
                                pageNum++;
                                var new_url = nextLink;
                                
                                loading_posts = false;
                                nextLink = nextLink.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2'+ pageNum); 
                                
                                //Temporary hold the post from pagination and append it to #main
                                var load_html = $('.pagination_holder').html(); 
                                $('.pagination_holder').html('');                                 
                                
                                if( $('.blog').length > 0 || $('.search').length > 0 || $('.archive').length > 0 ){
                                    // Make jQuery object from HTML string
                                    var $moreBlocks = $( load_html ).filter('article.latest_post');                        
                                    // Append new blocks to container
                                    $('.site-main').append( $moreBlocks ).imagesLoaded(function(){
                                        // Have Masonry position new blocks
                                        $('.site-main').masonry( 'appended', $moreBlocks );
                                    });
                                }else{
                                    $('.site-main article:last').after(load_html); // just simply append content without massonry
                                }
                                
                                var $this = $('.site-main').find('.entry-content').find('div');
                                if( $this.hasClass('tiled-gallery') ){
                                    $.getScript(blossom_pin_pro_ajax.plugin_url + "/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.js");                    
                                }
                                var $post_thumbnail = $('.post-thumbnail').children();
                                if( $post_thumbnail.hasClass('owl-carousel') ){
                                    $('.format-gallery .owl-carousel').owlCarousel({
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
                                }
                                                        
                            });
                            
                        } else {
                            // no more posts
                            last_post = true;
                            $('.ajax-loader').removeClass( 'loader' );

                        }
                    }
                }
            });
            
            }
            
        $('.pagination').remove();    
        } 
        // End Ajax Pagination
        
        /** Ajax call for post like */
        $('body.home').on( 'click', '.bpp_ajax_like', function(){
            var $container = $(this); 
            id = $container.attr('id').split('-').pop();
            var diffClass   = $container.children().attr('class');
            var splitClass  = diffClass.split(' ');
            var loadAgain   = splitClass[1];
            if( loadAgain === 'like' ) {
                $.ajax({
                    type :'post',
                    url  : blossom_pin_pro_ajax.url, 
                    data : {  'action' : 'blossom_pin_pro_post_like', 'id' : id },
                    beforeSend: function() {
                        $container.addClass('loading');
                    },
                    success: function(data) {
                        $('#like-${id}').children().removeClass('like').addClass('liked');
                    }
                }).done(function() {
                    $container.removeClass('loading');
                });
            }      
        });

        /** Ajax call for single post like */
        $('.single').on( 'click', '.bpp_single_ajax_like', function(){
            var $container = $(this); 
            id = $container.data('id').split('-').pop();
            var diffClass   = $container.children().attr('class');
            var splitClass  = diffClass.split(' ');
            var loadAgain   = splitClass[2];
            if( loadAgain === 'like' ) {
                $.ajax({
                    type :'post',
                    url  : blossom_pin_pro_ajax.url, 
                    data : {  'action' : 'blossom_pin_pro_post_like', 'id' : id },
                    beforeSend: function() {
                        $('.bpp_single_ajax_like').addClass('loading');
                    },
                    success: function( data ) {
                        if( data ) { 
                            $('.bpp_single_ajax_like').html( data ); 
                        }                    
                    }
                }).done(function() {
                    $('.bpp_single_ajax_like').removeClass('loading');
                });
            }      
        });

    }    
});