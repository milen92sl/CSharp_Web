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
    
    if (typeof blossom_recipe_pro_ajax !== 'undefined') {
        
        //Start Ajax Pagination
        
        var pageNum = parseInt(blossom_recipe_pro_ajax.startPage) + 1;
        var max = parseInt(blossom_recipe_pro_ajax.maxPages);
        var nextLink = blossom_recipe_pro_ajax.nextLink;
        var autoLoad = blossom_recipe_pro_ajax.autoLoad;
        
        if ( autoLoad == 'load_more' ) {
            // Insert the "Load More Posts" link.
            $('.pagination')
                .before('<div class="pagination_holder" style="display: none;"></div>')                
                .after('<div id="load-posts"><a href="javascript:void(0);"><i class="fas fa-sync-alt"></i>' + blossom_recipe_pro_ajax.loadmore + '</a></div>');
            if (pageNum == max+1) {
                $('#load-posts a').html('<i class="fas fa-ban"></i>'+blossom_recipe_pro_ajax.nomore).addClass('disabled');
            }
            $('#load-posts a').click(function() {
                if(pageNum <= max && !$(this).hasClass('loading')) {
                    $(this).html('<i class="fas fa-sync-alt fa-spin"></i>'+blossom_recipe_pro_ajax.loading).addClass('loading');

                    $('.pagination_holder').load(nextLink + ' .latest_post', function() {
                        // Update page number and nextLink.
                        pageNum++;
                        var new_url = nextLink;
                        nextLink = nextLink.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2'+ pageNum);
                        
                        //Temporary hold the post from pagination and append it to #main
                        var load_html = $('.pagination_holder').html(); 
                        $('.pagination_holder').html('');                                 
                        
                        if( blossom_recipe_pro_ajax.masonry === 'two' || blossom_recipe_pro_ajax.masonry === 'two-left' || blossom_recipe_pro_ajax.masonry === 'two-full' ){
                            // Make jQuery object from HTML string
                            var $moreBlocks = $( load_html ).filter('div.article-wrap.latest_post');                        
                            // Append new blocks to container
                            $('.site-main .article-group').append( $moreBlocks ).imagesLoaded(function(){
                                // Have Masonry position new blocks
                                $('.site-main .article-group').masonry( 'appended', $moreBlocks );
                            });
                        }else{
                            $('.site-main div.article-wrap:last').after(load_html); // just simply append content without masonry
                        }
                                                
                        var $this = $('.site-main').find('.entry-content').find('div');
                        if( $this.hasClass('tiled-gallery') ){
                            $.getScript(blossom_recipe_pro_ajax.plugin_url + "/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.js");                    
                        }
                        
                        if(pageNum <= max) {
                            $('#load-posts a').html('<i class="fas fa-sync-alt"></i>'+blossom_recipe_pro_ajax.loadmore).removeClass('loading');
                        } else {
                            $('#load-posts a').html('<i class="fas fa-ban"></i>'+blossom_recipe_pro_ajax.nomore).addClass('disabled').removeClass('loading');
                        }
                    });
                    
                } else {
                    // no more posts
                }

                return false;
            });
            $('.pagination').remove();
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
                                
                                if( blossom_recipe_pro_ajax.masonry === 'two' || blossom_recipe_pro_ajax.masonry === 'two-left' || blossom_recipe_pro_ajax.masonry === 'two-full' ){
                                    // Make jQuery object from HTML string
                                    var $moreBlocks = $( load_html ).filter('div.article-wrap.latest_post');                        
                                    // Append new blocks to container
                                    $('.site-main .article-group').append( $moreBlocks ).imagesLoaded(function(){
                                        // Have Masonry position new blocks
                                        $('.site-main .article-group').masonry( 'appended', $moreBlocks );
                                    });
                                }else{
                                    $('.site-main div.article-wrap:last').after(load_html); // just simply append content without masonry
                                }
                                
                                var $this = $('.site-main').find('.entry-content').find('div');
                                if( $this.hasClass('tiled-gallery') ){
                                    $.getScript(blossom_recipe_pro_ajax.plugin_url + "/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.js");                    
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
                url     : blossom_recipe_pro_ajax.url,  
                type    : 'post',
                data    : 'action=blossom_recipe_pro_add_cart_single&product_id=' + product_id,    
                success : function(results){
                    $('#'+product_id).replaceWith(results);
                }
            }).done(function(){
                var cart = $('#cart-'+product_id).val();
                $('.cart .number').html(cart);    	   
            });
        });
        
        /** Ajax call for post like */
        $('body').on( 'click', '.brp_ajax_like', function(){
            var $container = $(this); 
            id = $container.attr('id').split('-').pop(); 
            var diffClass   = $container.children().attr('class');
            var splitClass  = diffClass.split(' ');
            var loadAgain   = splitClass[1];
            
            if( loadAgain === 'like' ) {
                $.ajax({
                    type :'post',
                    url  : blossom_recipe_pro_ajax.url, 
                    data : {  'action' : 'blossom_recipe_pro_post_like', 'id' : id },
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
        $('.single').on( 'click', '.brp_single_ajax_like', function(){
            var $container = $(this); 
            id = $container.attr('id').split('-').pop();
            var diffClass   = $container.children().attr('class');
            var splitClass  = diffClass.split(' ');
            var loadAgain   = splitClass[2];
            if( loadAgain === 'like' ) {
                $.ajax({
                    type :'post',
                    url  : blossom_recipe_pro_ajax.url, 
                    data : {  'action' : 'blossom_recipe_pro_post_like', 'id' : id },
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

        // ajax for featured section                
        $i = 0;
        var myarray = [];                
        $('.tab-btn').click(function(){            
            var data_id = $(this).attr('id');
            if( myarray.indexOf(data_id) != -1 )  return;
            myarray[$i] = data_id;            
            if( $i == 0 ) {
                $i++;
                myarray.unshift( data_id );
            }
            $i++;
            
            $.ajax({
                type : "post",
                url : blossom_recipe_pro_ajax.url, // AJAX handler
                data : {action: "blossom_recipe_pro_featured_section_ajax_handler", data_id : data_id, }, //send post_id and nonce back to above main php function
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