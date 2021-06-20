/*! .isOnScreen() returns bool */
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
    
    if (typeof blossom_spa_pro_ajax !== 'undefined') {
        
        //Start Ajax Pagination
        
        var pageNum = parseInt(blossom_spa_pro_ajax.startPage) + 1;
        var max = parseInt(blossom_spa_pro_ajax.maxPages);
        var nextLink = blossom_spa_pro_ajax.nextLink;
        var autoLoad = blossom_spa_pro_ajax.autoLoad;
        
        if ( autoLoad == 'load_more' ) {
            if( $('.blog').length > 0 || $('.search').length > 0 || $('.archive').length > 0 ){
                // Insert the "Load More Posts" link.
                $('.pagination')
                    .before('<div class="pagination_holder" style="display: none;"></div>')                
                    .after('<div id="load-posts"><a href="javascript:void(0);"><i class="fas fa-sync-alt"></i>' + blossom_spa_pro_ajax.loadmore + '</a></div>');
                if (pageNum == max+1) {
                    $('#load-posts a').html('<i class="fas fa-ban"></i>'+blossom_spa_pro_ajax.nomore).addClass('disabled');
                }
                $('#load-posts a').click(function() {
                    if(pageNum <= max && !$(this).hasClass('loading')) {
                        $(this).html('<i class="fas fa-sync-alt fa-spin"></i>'+blossom_spa_pro_ajax.loading).addClass('loading');

                        $('.pagination_holder').load(nextLink + ' .latest_post', function() {
                            // Update page number and nextLink.
                            pageNum++;
                            var new_url = nextLink;
                            nextLink = nextLink.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2'+ pageNum);
                            
                            //Temporary hold the post from pagination and append it to #main
                            var load_html = $('.pagination_holder').html(); 
                            $('.pagination_holder').html('');                                 
                            
                            if( blossom_spa_pro_ajax.masonry === 'masonry-layout' ){
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
                                $.getScript(blossom_spa_pro_ajax.plugin_url + "/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.js");                    
                            }
                            
                            if(pageNum <= max) {
                                $('#load-posts a').html('<i class="fas fa-sync-alt"></i>'+blossom_spa_pro_ajax.loadmore).removeClass('loading');
                            } else {
                                $('#load-posts a').html('<i class="fas fa-ban"></i>'+blossom_spa_pro_ajax.nomore).addClass('disabled').removeClass('loading');
                            }
                        });
                        
                    } else {
                        // no more posts
                    }

                    return false;
                });
                $('.pagination').remove();
            }
        }else if( autoLoad == 'infinite_scroll' ) {
            // autoload
            
            // Placeholder
            $('.pagination').before('<div class="pagination_holder" style="display: none;"></div>');
                
            var loading_posts = false;
            var last_post = false;
            
            if( $('.blog').length > 0 || $('.search').length > 0 || $('.archive').length > 0 ){
            
            $(window).scroll(function() {
                if (!loading_posts && !last_post) {
                    var lastPostVisible = $('.latest_post').last().isOnScreen();
                    if (lastPostVisible) {
                        if(pageNum <= max) {
                            loading_posts = true;
                            
                            $('.pagination_holder').load(nextLink + ' .latest_post', function() {
                                // Update page number and nextLink.
                                pageNum++;
                                var new_url = nextLink;
                                
                                loading_posts = false;
                                nextLink = nextLink.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2'+ pageNum); 
                                
                                //Temporary hold the post from pagination and append it to #main
                                var load_html = $('.pagination_holder').html(); 
                                $('.pagination_holder').html('');                                 
                                
                                if( blossom_spa_pro_ajax.masonry === 'masonry-layout' ){
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
                                    $.getScript(blossom_spa_pro_ajax.plugin_url + "/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.js");                    
                                }                                
                            });
                            
                        } else {
                            // no more posts
                            last_post = true;
                        }
                    }
                }
            });
            
            }
            
        $('.pagination').remove();    
        } 
        // End Ajax Pagination
        
        // Ajax for Add to Cart
        $('body').on( 'click', '.btn-simple', function(){       
            $(this).addClass('adding-cart');
            var product_id = $(this).attr('id');
            $.ajax ({
                url     : blossom_spa_pro_ajax.url,  
                type    : 'post',
                data    : 'action=blossom_spa_pro_add_cart_single&product_id=' + product_id,    
                success : function(results){
                    $('#'+product_id).replaceWith(results);
                }
            });
        });

        /** Ajax call for post like */
        $('body').on( 'click', '.bsp_ajax_like', function(){
            var $container = $(this); 
            id = $container.attr('id').split('-').pop(); 
            var diffClass   = $container.children().attr('class');
            var splitClass  = diffClass.split(' ');
            var loadAgain   = splitClass[1];
            
            if( loadAgain === 'like' ) {
                $.ajax({
        			type :'post',
                    url  : blossom_spa_pro_ajax.url, 
        			data : {  'action' : 'blossom_spa_pro_post_like', 'id' : id },
        			beforeSend: function() {
                        $container.addClass('loading');
                    },
                    success: function( data ) {
                        if( data ) {
                            $('#like-'+id).html( data ); 
                        }                    
                    }
                }).done(function() {
                    $container.removeClass('loading');
                });
            }      
        });

        /** Ajax call for single post like */
        $('.single').on( 'click', '.bsp_single_ajax_like', function(){
            var $container = $(this); 
            id = $container.attr('id').split('-').pop();
            var diffClass   = $container.children().attr('class');
            var splitClass  = diffClass.split(' ');
            var loadAgain   = splitClass[2];
            if( loadAgain === 'like' ) {
                $.ajax({
                    type :'post',
                    url  : blossom_spa_pro_ajax.url, 
                    data : {  'action' : 'blossom_spa_pro_post_like_single', 'id' : id },
                    beforeSend: function() {
                        $container.addClass('loading');
                    },
                    success: function( data ) {
                        if( data ) {
                            $('#singlelike-'+id).html( data ); 
                        }                    
                    }
                }).done(function() {
                    $container.removeClass('loading');
                });
            }      
        });
        
        // ajax for special pricing section                
        $i = 0;
        var myarray = [];                
        $('.tab-btn').click(function(){            
            
            var data_id = $(this).attr('data-id');
            var first_data_id = $('button.tab-btn:eq(0)').attr('data-id');
            var diffClass = $(this).attr('class');
            var splitClass = diffClass.split(' ');
            var tabClass = splitClass[0];

            $('.tab-btn').removeClass('active');
            $(this).addClass('active');
            $('.tab-content').removeClass('active');
            $('.'+tabClass+'-content').addClass('active');
            
            if( myarray.indexOf(data_id) != -1 )  return;
            myarray[$i] = data_id;            
            if( $i == 0 ) {
                $i++;
                myarray.unshift( first_data_id );
            }
            $i++;
            
            $.ajax({
                type : "post",
                url : blossom_spa_pro_ajax.url, // AJAX handler
                data : {action: "blossom_spa_pro_special_pricing_ajax_handler", data_id : data_id, data_class : tabClass }, //send post_id and nonce back to above main php function
                beforeSend : function() {
                    $('.tab-content').addClass( 'loading' );
                    $('.tab-content:last-child').siblings().removeClass( 'loading' );
                },

                success : function( response ){
                    if( response ) { 
                        $('.tab-content-wrap').append( response );
                    }
                }
            }).done( function() {
                $('.tab-content').removeClass( 'loading' );
            });
        });
    }    
});