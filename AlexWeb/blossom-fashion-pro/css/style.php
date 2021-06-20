<?php
/**
 * Dynamic Styles
 * 
 * @package Blossom_Fashion_Pro
*/

function blossom_fashion_pro_dynamic_css(){

	$child_theme_support    = get_theme_mod( 'child_additional_support', 'default' );

	if( $child_theme_support == 'fashion_stylist' ) {
        $primary_font    = get_theme_mod( 'primary_font_stylist', 'Montserrat' );
	    $primary_fonts   = blossom_fashion_pro_get_fonts( $primary_font, 'regular' );
	    $secondary_font  = get_theme_mod( 'secondary_font_stylist', 'Cormorant Garamond' );
	    $secondary_fonts = blossom_fashion_pro_get_fonts( $secondary_font, 'regular' );
	    $primary_color    = get_theme_mod( 'primary_color_stylist', '#ea4e59' );
    }elseif( $child_theme_support == 'fashion_lifestyle' ){
	    $primary_font    = get_theme_mod( 'primary_font_lifestyle', 'Nunito Sans' );
        $primary_fonts   = blossom_fashion_pro_get_fonts( $primary_font, 'regular' );
        $secondary_font  = get_theme_mod( 'secondary_font_lifestyle', 'Cormorant' );
        $secondary_fonts = blossom_fashion_pro_get_fonts( $secondary_font, 'regular' );
        $primary_color   = get_theme_mod( 'primary_color_lifestyle', '#60c5ba' );
    }elseif($child_theme_support == 'fashion_icon') {
    	$primary_font    = get_theme_mod( 'primary_font_icon', 'Nunito Sans' );
	    $primary_fonts   = blossom_fashion_pro_get_fonts( $primary_font, 'regular' );
	    $secondary_font  = get_theme_mod( 'secondary_font_icon', 'Marcellus' );
	    $secondary_fonts = blossom_fashion_pro_get_fonts( $secondary_font, 'regular' );
	    $primary_color    = get_theme_mod( 'primary_color_icon', '#ed5485' );
    }else{
    	$primary_font    = get_theme_mod( 'primary_font', 'Montserrat' );
	    $primary_fonts   = blossom_fashion_pro_get_fonts( $primary_font, 'regular' );
	    $secondary_font  = get_theme_mod( 'secondary_font', 'Cormorant Garamond' );
	    $secondary_fonts = blossom_fashion_pro_get_fonts( $secondary_font, 'regular' );
	    $primary_color    = get_theme_mod( 'primary_color', '#f1d3d3' );
    }
    
    if ( $child_theme_support == 'fashion_lifestyle' || $child_theme_support == 'fashion_icon' ){
    	$font_size       = get_theme_mod( 'font_size_lifestyle', 18 );
    }else{
    	$font_size       = get_theme_mod( 'font_size', 16 );
    }
    
    
    $site_title_font      = get_theme_mod( 'site_title_font', array( 'font-family'=>'Rufina', 'variant'=>'regular' ) );
    $site_title_fonts     = blossom_fashion_pro_get_fonts( $site_title_font['font-family'], $site_title_font['variant'] );
    $site_title_font_size = get_theme_mod( 'site_title_font_size', 120 );
    
    $h1_font      = get_theme_mod( 'h1_font', array( 'font-family'=>'Cormorant Garamond', 'variant'=>'regular') );
    $h1_fonts     = blossom_fashion_pro_get_fonts( $h1_font['font-family'], $h1_font['variant'] );
    $h1_font_size = get_theme_mod( 'h1_font_size', 46 );
    
    $h2_font      = get_theme_mod( 'h2_font', array('font-family'=>'Cormorant Garamond', 'variant'=>'regular') );
    $h2_fonts     = blossom_fashion_pro_get_fonts( $h2_font['font-family'], $h2_font['variant'] );
    $h2_font_size = get_theme_mod( 'h2_font_size', 40 );
    
    $h3_font      = get_theme_mod( 'h3_font', array('font-family'=>'Cormorant Garamond', 'variant'=>'regular') );
    $h3_fonts     = blossom_fashion_pro_get_fonts( $h3_font['font-family'], $h3_font['variant'] );
    $h3_font_size = get_theme_mod( 'h3_font_size', 33 );
    
    $h4_font      = get_theme_mod( 'h4_font', array('font-family'=>'Cormorant Garamond', 'variant'=>'regular') );
    $h4_fonts     = blossom_fashion_pro_get_fonts( $h4_font['font-family'], $h4_font['variant'] );
    $h4_font_size = get_theme_mod( 'h4_font_size', 28 );
    
    $h5_font      = get_theme_mod( 'h5_font', array('font-family'=>'Cormorant Garamond', 'variant'=>'regular') );
    $h5_fonts     = blossom_fashion_pro_get_fonts( $h5_font['font-family'], $h5_font['variant'] );
    $h5_font_size = get_theme_mod( 'h5_font_size', 20 );
    
    $h6_font      = get_theme_mod( 'h6_font', array('font-family'=>'Cormorant Garamond', 'variant'=>'regular') );
    $h6_fonts     = blossom_fashion_pro_get_fonts( $h6_font['font-family'], $h6_font['variant'] );
    $h6_font_size = get_theme_mod( 'h6_font_size', 20 );
    
    
    $site_title_color = get_theme_mod( 'site_title_color', '#111111' );
    $btn_bg_color     = get_theme_mod( 'btn_bg_color', '#111111' );
    $header_bg_color  = get_theme_mod( 'header_bg_color', '#111111' );
    $footer_bg_color  = get_theme_mod( 'footer_bg_color', '#111111' );
    $bg_color         = get_theme_mod( 'bg_color', '#ffffff' );
    $body_bg          = get_theme_mod( 'body_bg', 'image' );
    $bg_image         = get_theme_mod( 'bg_image' );
    $bg_pattern       = get_theme_mod( 'bg_pattern', 'nobg' );
     
    $rgb = blossom_fashion_pro_hex2rgb( blossom_fashion_pro_sanitize_hex_color( $primary_color ) );
    
    $image = '';
    if( $body_bg == 'image' && $bg_image ){
        $image = $bg_image;    
    }elseif( $body_bg == 'pattern' && $bg_pattern != 'nobg' ){
        $image = get_template_directory_uri() . '/images/patterns/' . $bg_pattern . '.png';
    }
     
    echo "<style type='text/css' media='all'>"; ?>

    .content-newsletter .blossomthemes-email-newsletter-wrapper.bg-img:after,
    .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper:after{
        <?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.8);'; ?>
    }
    
    /*Typography*/

    body,
    button,
    input,
    select,
    optgroup,
    textarea{
        font-family : <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
        font-size   : <?php echo absint( $font_size ); ?>px;        
    }
    
    body{
        background: url(<?php echo esc_url( $image ); ?>) <?php echo blossom_fashion_pro_sanitize_hex_color( $bg_color ); ?>;
    }
    
    .site-title{
        font-size   : <?php echo absint( $site_title_font_size ); ?>px;
        font-family : <?php echo wp_kses_post( $site_title_fonts['font'] ); ?>;
        font-weight : <?php echo esc_attr( $site_title_fonts['weight'] ); ?>;
        font-style  : <?php echo esc_attr( $site_title_fonts['style'] ); ?>;
    }

    .site-title a{
		color: <?php echo blossom_fashion_pro_sanitize_hex_color( $site_title_color ); ?>;
	}

    /*Color Scheme*/
    a,
    .site-header .social-networks li a:hover,
    .site-header .social-networks li a:focus,
    .site-title a:hover,
    .site-title a:focus,
    .banner .text-holder .cat-links a:hover,
	.banner .text-holder .cat-links a:focus,
	.shop-section .shop-slider .item h3 a:hover,
	.shop-section .shop-slider .item h3 a:focus,
	#primary .post .entry-header .cat-links a:hover,
	#primary .post .entry-header .cat-links a:focus,
	#primary .post .entry-header .entry-meta a:hover,
	#primary .post .entry-header .entry-meta a:focus,
	#primary .post .entry-footer .social-networks li a:hover,
	#primary .post .entry-footer .social-networks li a:focus,
	.search #primary article .entry-footer .social-networks li a:hover,
 	.search #primary article .entry-footer .social-networks li a:focus, 
	.widget ul li a:hover, .widget ul li a:focus,
	.widget_bttk_author_bio .author-bio-socicons ul li a:hover,
	.widget_bttk_author_bio .author-bio-socicons ul li a:focus,
	.widget_bttk_popular_post ul li .entry-header .entry-title a:hover,
	.widget_bttk_popular_post ul li .entry-header .entry-title a:focus,
	.widget_bttk_pro_recent_post ul li .entry-header .entry-title a:hover,
	.widget_bttk_pro_recent_post ul li .entry-header .entry-title a:focus,
	.widget_bttk_popular_post ul li .entry-header .entry-meta a:hover,
	.widget_bttk_popular_post ul li .entry-header .entry-meta a:focus,
	.widget_bttk_pro_recent_post ul li .entry-header .entry-meta a:hover,
	.widget_bttk_pro_recent_post ul li .entry-header .entry-meta a:focus,
	.bottom-shop-section .bottom-shop-slider .item .product-category a:hover,
	.bottom-shop-section .bottom-shop-slider .item .product-category a:focus,
	.bottom-shop-section .bottom-shop-slider .item h3 a:hover,
	.bottom-shop-section .bottom-shop-slider .item h3 a:focus,
	.instagram-section .header .title a:hover,
	.instagram-section .header .title a:focus,
	.site-footer .widget ul li a:hover,
	.site-footer .widget ul li a:focus,
	.site-footer .widget_bttk_popular_post ul li .entry-header .entry-title a:hover,
	.site-footer .widget_bttk_pro_recent_post ul li .entry-header .entry-title a:hover,
	.site-footer .widget_bttk_popular_post ul li .entry-header .entry-title a:focus,
	.site-footer .widget_bttk_pro_recent_post ul li .entry-header .entry-title a:focus,
	.single .single-header .site-title:hover,
	.single .single-header .site-title:focus,
	.single .single-header .right .social-share .social-networks li a:hover,
	.single .single-header .right .social-share .social-networks li a:focus,
	.comments-area .comment-body .fn a:hover,
	.comments-area .comment-body .fn a:focus,
	.comments-area .comment-body .comment-metadata a:hover,
	.comments-area .comment-body .comment-metadata a:focus,
	.page-template-contact .contact-details .contact-info-holder .col .icon-holder,
	.page-template-contact .contact-details .contact-info-holder .col .text-holder h3 a:hover,
	.page-template-contact .contact-details .contact-info-holder .col .text-holder h3 a:focus,
	.page-template-contact .contact-details .contact-info-holder .col .social-networks li a:hover,
	.page-template-contact .contact-details .contact-info-holder .col .social-networks li a:focus,
	.widget_bttk_posts_category_slider_widget .carousel-title .title a:hover,
	.widget_bttk_posts_category_slider_widget .carousel-title .title a:focus,
    .portfolio-sorting .button:hover,
    .portfolio-sorting .button:focus,
    .portfolio-sorting .button.is-checked,
    .portfolio-item .portfolio-cat a:hover,
    .portfolio-item .portfolio-cat a:focus,
    .entry-header .portfolio-cat a:hover,
    .entry-header .portfolio-cat a:focus,
    .single-blossom-portfolio .post-navigation .nav-previous a:hover,
    .single-blossom-portfolio .post-navigation .nav-previous a:focus,
    .single-blossom-portfolio .post-navigation .nav-next a:hover,
    .single-blossom-portfolio .post-navigation .nav-next a:focus, 
    .single-post-layout-four .single-post-header-holder .entry-header .cat-links a:hover, 
    .single-post-layout-four .single-post-header-holder .entry-header .entry-meta a:hover, .single-post-layout-four .single-post-header-holder .entry-header .entry-meta a:focus{
		color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	.site-header .tools .cart .number,
	.shop-section .header .title:after,
	.header-two .header-t,
	.header-six .header-t,
	.header-eight .header-t,
	.shop-section .shop-slider .item .product-image .btn-add-to-cart:hover,
	.shop-section .shop-slider .item .product-image .btn-add-to-cart:focus,
	.widget .widget-title:before,
	.widget .widget-title:after,
	.widget_calendar caption,
	.widget_bttk_popular_post .style-two li:after,
	.widget_bttk_popular_post .style-three li:after,
	.widget_bttk_pro_recent_post .style-two li:after,
	.widget_bttk_pro_recent_post .style-three li:after,
	.instagram-section .header .title:before,
	.instagram-section .header .title:after,
	#primary .post .entry-content .pull-left:after,
	#primary .page .entry-content .pull-left:after,
	#primary .post .entry-content .pull-right:after,
	#primary .page .entry-content .pull-right:after,
	.page-template-contact .contact-details .contact-info-holder h2:after,
	.main-navigation ul li:after,
	#primary .post .btn-readmore:hover,
	#primary .post .btn-readmore:focus,
	.posts-navigation .nav-previous a:hover, 
	.posts-navigation .nav-previous a:focus,
	.posts-navigation .nav-next a:hover, 
	.posts-navigation .nav-next a:focus,
	#load-posts a:hover, 
	#load-posts a:focus,
	#primary .post .entry-content .highlight, 
	#primary .page .entry-content .highlight{
		background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	.header-seven .header-t{
		background: <?php echo blossom_fashion_pro_sanitize_hex_color( $header_bg_color ); ?>;
	}

	.banner .text-holder .cat-links a,
	#primary .post .entry-header .cat-links a,
	.widget_bttk_popular_post .style-two li .entry-header .cat-links a,
	.widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a,
	.widget_bttk_popular_post .style-three li .entry-header .cat-links a,
	.widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a,
	.page-header span,
	.page-template-contact .top-section .section-header span,
	.widget_bttk_posts_category_slider_widget .carousel-title .cat-links a,
    .portfolio-item .portfolio-cat a,
    .entry-header .portfolio-cat a, 
    .single-post-layout-four .single-post-header-holder .entry-header .cat-links a{
		border-bottom-color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	.banner .text-holder .title a,
	.header-four .main-navigation ul li a,
	.header-four .main-navigation ul ul li a,
	#primary .post .entry-header .entry-title a,
    .portfolio-item .portfolio-img-title a{
		background-image: linear-gradient(180deg, transparent 96%, <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?> 0);
	}

	.widget_bttk_social_links ul li a:hover,
	.widget_bttk_social_links ul li a:focus{
		border-color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	@media only screen and (min-width: 1025px){
		.header-three .main-navigation ul li a:hover,
		.header-three .main-navigation ul li a:focus,
		.header-three .main-navigation ul li:hover > a,
		.header-three .main-navigation ul li:focus > a,
		.header-three .main-navigation ul .current-menu-item > a,
		.header-three .main-navigation ul .current-menu-ancestor > a,
		.header-three .main-navigation ul .current_page_item > a,
		.header-three .main-navigation ul .current_page_ancestor > a,
		.header-seven .main-navigation ul li a:hover,
		.header-seven .main-navigation ul li a:focus,
		.header-seven .main-navigation ul .current-menu-item > a,
		.header-seven .main-navigation ul .current-menu-ancestor > a,
		.header-seven .main-navigation ul .current_page_item > a,
		.header-seven .main-navigation ul .current_page_ancestor > a{
			background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		}
		
	}

	@media only screen and (max-width: 1024px){
		.main-navigation ul li a{
			background-image: linear-gradient(180deg, transparent 96%, <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?> 0);
		}
	}

	/*button color scheme*/
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"]{
		background: <?php echo blossom_fashion_pro_sanitize_hex_color( $btn_bg_color ); ?>;
		border-color: <?php echo blossom_fashion_pro_sanitize_hex_color( $btn_bg_color ); ?>;
	}

	.widget_bttk_image_text_widget ul li .btn-readmore{
		background: <?php echo blossom_fashion_pro_sanitize_hex_color( $btn_bg_color ); ?>;
	}

	button:hover, input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	button:focus, input[type="button"]:focus,
	input[type="reset"]:focus,
	input[type="submit"]:focus{
		background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		border-color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	#primary .post .btn-readmore,
	.widget_bttk_author_bio .text-holder .readmore{
		background: <?php echo blossom_fashion_pro_sanitize_hex_color( $btn_bg_color ); ?>;
	}

	/*Footer Color Scheme*/
	.site-footer{
		background: <?php echo blossom_fashion_pro_sanitize_hex_color( $footer_bg_color ); ?>;
	}

	/*Typography*/
	.main-navigation ul,
	.banner .text-holder .title,
	.top-section .newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3,
	.shop-section .header .title,
	#primary .post .entry-header .entry-title,
	#primary .post .post-shope-holder .header .title,
	.widget_bttk_author_bio .title-holder,
	.widget_bttk_popular_post ul li .entry-header .entry-title,
	.widget_bttk_pro_recent_post ul li .entry-header .entry-title,
	.widget-area .widget_blossomthemes_email_newsletter_widget .text-holder h3,
	.bottom-shop-section .bottom-shop-slider .item h3,
	.page-title,
	#primary .post .entry-content blockquote,
	#primary .page .entry-content blockquote,
	#primary .post .entry-content .dropcap,
	#primary .page .entry-content .dropcap,
	#primary .post .entry-content .pull-left,
	#primary .page .entry-content .pull-left,
	#primary .post .entry-content .pull-right,
	#primary .page .entry-content .pull-right,
	.author-section .text-holder .title,
	.single .newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3,
	.related-posts .title, .popular-posts .title,
	.comments-area .comments-title,
	.comments-area .comment-reply-title,
	.single .single-header .title-holder .post-title,
	.widget_bttk_posts_category_slider_widget .carousel-title .title,
    .portfolio-text-holder .portfolio-img-title,
    .portfolio-holder .entry-header .entry-title,
    .related-portfolio-title, 
    .search #primary .page .entry-header .entry-title, 
    .header-five .form-holder .search-form input[type="search"], 
    .single-post-layout-two .post-header-holder .entry-header .entry-title{
		font-family: <?php echo wp_kses_post( $secondary_fonts['font'] ); ?>;
	}

	#primary .post .entry-content h1,
    #primary .page .entry-content h1{
        font-family: <?php echo $h1_fonts['font']; ?>;
        font-size: <?php echo absint( $h1_font_size ); ?>px;        
    }
    
    #primary .post .entry-content h2,
    #primary .page .entry-content h2{
        font-family: <?php echo $h2_fonts['font']; ?>;
        font-size: <?php echo absint( $h2_font_size ); ?>px;
    }
    
    #primary .post .entry-content h3,
    #primary .page .entry-content h3{
        font-family: <?php echo $h3_fonts['font']; ?>;
        font-size: <?php echo absint( $h3_font_size ); ?>px;
    }
    
    #primary .post .entry-content h4,
    #primary .page .entry-content h4{
        font-family: <?php echo $h4_fonts['font']; ?>;
        font-size: <?php echo absint( $h4_font_size ); ?>px;
    }
    
    #primary .post .entry-content h5,
    #primary .page .entry-content h5{
        font-family: <?php echo $h5_fonts['font']; ?>;
        font-size: <?php echo absint( $h5_font_size ); ?>px;
    }
    
    #primary .post .entry-content h6,
    #primary .page .entry-content h6{
        font-family: <?php echo $h6_fonts['font']; ?>;
        font-size: <?php echo absint( $h6_font_size ); ?>px;
    }
    
    <?php if( is_woocommerce_activated() ) { ?>
    	.woocommerce ul.products li.product .add_to_cart_button,
    	.woocommerce ul.products li.product .ajax_add_to_cart,
    	.woocommerce ul.products li.product .product_type_external,
    	.woocommerce #secondary .widget_price_filter .price_slider_amount .button,
    	.woocommerce div.product form.cart .single_add_to_cart_button,
    	.woocommerce div.product .cart .single_add_to_cart_button.alt,
    	.woocommerce div.product .entry-summary .variations_form .single_variation_wrap .button,
    	.woocommerce .woocommerce-message .button,
    	.woocommerce #secondary .widget_shopping_cart .buttons .button,
    	.woocommerce-cart #primary .page .entry-content table.shop_table td.actions .coupon input[type="submit"],
    	.woocommerce-cart #primary .page .entry-content .cart_totals .checkout-button,
    	.woocommerce-checkout .woocommerce form.woocommerce-form-login input.button,
    	.woocommerce-checkout .woocommerce form.checkout_coupon input.button,
    	.woocommerce form.lost_reset_password input.button,
    	.woocommerce .return-to-shop .button,
    	.woocommerce #payment #place_order,
    	.woocommerce-page #payment #place_order{
			background: <?php echo blossom_fashion_pro_sanitize_hex_color( $btn_bg_color ); ?>;
    	}

    	.woocommerce #secondary .widget_price_filter .ui-slider .ui-slider-range,
    	.woocommerce ul.products li.product .add_to_cart_button:hover,
    	.woocommerce ul.products li.product .add_to_cart_button:focus,
    	.woocommerce ul.products li.product .product_type_external:hover,
    	.woocommerce ul.products li.product .product_type_external:focus,
    	.woocommerce ul.products li.product .ajax_add_to_cart:hover,
    	.woocommerce ul.products li.product .ajax_add_to_cart:focus,
    	.woocommerce #secondary .widget_shopping_cart .buttons .button:hover,
    	.woocommerce #secondary .widget_shopping_cart .buttons .button:focus,
    	.woocommerce #secondary .widget_price_filter .price_slider_amount .button:hover,
    	.woocommerce #secondary .widget_price_filter .price_slider_amount .button:focus,
    	.woocommerce div.product .entry-summary .variations_form .single_variation_wrap .button:hover,
    	.woocommerce div.product .entry-summary .variations_form .single_variation_wrap .button:focus,
    	.woocommerce .woocommerce-message .button:hover,
    	.woocommerce .woocommerce-message .button:focus,
    	.woocommerce-cart #primary .page .entry-content table.shop_table td.actions .coupon input[type="submit"]:hover,
    	.woocommerce-cart #primary .page .entry-content table.shop_table td.actions .coupon input[type="submit"]:focus,
    	.woocommerce-cart #primary .page .entry-content .cart_totals .checkout-button:hover,
    	.woocommerce-cart #primary .page .entry-content .cart_totals .checkout-button:focus,
    	.woocommerce-checkout .woocommerce form.woocommerce-form-login input.button:hover,
    	.woocommerce-checkout .woocommerce form.woocommerce-form-login input.button:focus,
    	.woocommerce-checkout .woocommerce form.checkout_coupon input.button:hover,
    	.woocommerce-checkout .woocommerce form.checkout_coupon input.button:focus,
    	.woocommerce form.lost_reset_password input.button:hover,
    	.woocommerce form.lost_reset_password input.button:focus,
    	.woocommerce .return-to-shop .button:hover,
    	.woocommerce .return-to-shop .button:focus,
    	.woocommerce #payment #place_order:hover,
    	.woocommerce-page #payment #place_order:focus{
			background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
    	}

    	.woocommerce #secondary .widget .product_list_widget li .product-title:hover,
    	.woocommerce #secondary .widget .product_list_widget li .product-title:focus,
    	.woocommerce div.product .entry-summary .product_meta .posted_in a:hover,
    	.woocommerce div.product .entry-summary .product_meta .posted_in a:focus,
    	.woocommerce div.product .entry-summary .product_meta .tagged_as a:hover,
    	.woocommerce div.product .entry-summary .product_meta .tagged_as a:focus{
			color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
    	}

    	.woocommerce #review_form #respond .form-submit input{
			background: <?php echo blossom_fashion_pro_sanitize_hex_color( $btn_bg_color ); ?>;
			border-color: <?php echo blossom_fashion_pro_sanitize_hex_color( $btn_bg_color ); ?>;
    	}

    	.woocommerce-cart #primary .page .entry-content table.shop_table td.actions .button{
			border-color: <?php echo blossom_fashion_pro_sanitize_hex_color( $btn_bg_color ); ?>;
			color: <?php echo blossom_fashion_pro_sanitize_hex_color( $btn_bg_color ); ?>;
    	}

    	.woocommerce-cart #primary .page .entry-content table.shop_table td.actions .button:hover,
    	.woocommerce-cart #primary .page .entry-content table.shop_table td.actions .button:focus{
			background: <?php echo blossom_fashion_pro_sanitize_hex_color( $btn_bg_color ); ?>;
    	}

    	.woocommerce-checkout .woocommerce .woocommerce-info{
			background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
    	}

    	.woocommerce div.product .product_title,
    	.woocommerce div.product .woocommerce-tabs .panel h2{
			font-family: <?php echo wp_kses_post( $secondary_fonts['font'] ); ?>;
    	}

    	.woocommerce div.product form.cart .single_add_to_cart_button:hover,
    	.woocommerce div.product form.cart .single_add_to_cart_button:focus,
    	.woocommerce div.product .cart .single_add_to_cart_button.alt:hover,
    	.woocommerce div.product .cart .single_add_to_cart_button.alt:focus,
    	.woocommerce ul.products li.product .added_to_cart:hover,
    	.woocommerce ul.products li.product .added_to_cart:focus{
			background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
    	}
            
    <?php } ?>   

    <?php if( $child_theme_support == 'fashion_lifestyle' ) { ?> 
		
		body, button, input, select, optgroup, textarea {
			font-weight: normal;
		}
		.banner .text-holder .title a:hover, .header-four .main-navigation ul li a:hover, .header-four .main-navigation ul ul li a:hover, #primary .post .entry-header .entry-title a:hover, .portfolio-item .portfolio-img-title a:hover {
			transition: all 0.3s ease-in-out;
		}
		.banner .text-holder .title a:hover, .header-four .main-navigation ul li a:hover, .header-four .main-navigation ul ul li a:hover, #primary .post .entry-header .entry-title a:hover, .portfolio-item .portfolio-img-title a:hover {
			background: none;
			color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		}
		/* Site Structure */
		.container {
			max-width: 1170px;
		}
		/*#primary {
			width: calc(100% - 330px);
		}

		#secondary {
			width: 330px;
		}*/
		/* Header */
		/* Site Branding */
		.header-eight .header-t {
			background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		}
		.site-header.header-eight .site-branding {
			line-height: 1;
			text-align: center;
		}
		/* Header Eight */
		.header-eight .main-header {
			padding: 4rem 0;
		}
		.header-eight .header-t {
			padding: 15px 0;
		}
		.header-eight .main-navigation ul li:after {
			/* 	background: transparent */
		}
		.header-eight + .top-bar {
			border-top: 1px solid #e5e5e5;
		}
		.site-header .header-t .search-form input[type="submit"] {
			margin-top: 3px;
			height: auto;
		}

		.logged-in .header-eight .header-t .form-holder {
			top: 32px;
		}
		.header-eight .header-t .form-holder {
			position: fixed;
			width: 100%;
			height: 100%;
			background: rgba(255, 255, 255, 0.98);
			top: 0;
			left: 0;
			z-index: 2;
			display: none;
		}
		.header-eight .header-t .form-holder {
			display: none;
		}
		.header-eight .header-t .right {
			float: right;
		}
		.header-eight .header-t .right .tools {
			-webkit-transform: translateY(0);
			transform: translateY(0);
		}
		.header-eight .header-t .right > div {
			margin-left: 20px;
		}
		.header-eight .header-t .right .separator {
			float: right;
			margin-left: 20px;
			width: 1px;
			height: 20px;
			background: rgba(0, 0, 0, 0.1);
			margin-top: 4px;
		}
		.header-eight .header-t .right .tools .cart {
			margin-left: 20px;
			padding-left: 0;
			border-left: 0;
			-webkit-transition: ease 0.2s;
			transition: ease 0.2s;
		}
		.header-eight .header-t .right .tools .form-section {
			float: right;
			color: #111;
		}
		.header-eight .header-t .right > div:last-child {
			margin-left: 0;
			padding-left: 0;
			border-left: 0;
		}
		.header-eight .header-t .right .social-networks-holder {
			float: right;
		}
		.header-eight .header-t .right > div {
			margin-left: 20px;
		}
		/* Header Navigation */
		.main-navigation ul {
			font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
		}
		.header-eight .main-navigation ul > li {
			margin: 0 50px 0 0;
		}
		.main-navigation ul li a {
			font-size: 13px;
			text-transform: uppercase;
			letter-spacing: 0.15em;
		}
		.header-eight .main-navigation ul li a {
			font-size: 13px;
			line-height: 1.85em;
			text-transform: uppercase;
			letter-spacing: 0.15em;
			color: #ffffffc9;
		}
		.header-eight .main-navigation ul li a:hover {
			color: #ffffff;
		}
		.header-eight .main-navigation ul .menu-item-has-children:before {
			background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="%23fff" d="M151.5 347.8L3.5 201c-4.7-4.7-4.7-12.3 0-17l19.8-19.8c4.7-4.7 12.3-4.7 17 0L160 282.7l119.7-118.5c4.7-4.7 12.3-4.7 17 0l19.8 19.8c4.7 4.7 4.7 12.3 0 17l-148 146.8c-4.7 4.7-12.3 4.7-17 0z"></path></svg>');
		}
		/* Header Navigation Sub Menu */
		.main-navigation ul ul {
			background-color: #111;
			padding-top: 0;
			font-size: 13px;
		}
		.main-navigation ul ul li {
			border: 0;
			margin-right: 0;
		}
		.main-navigation ul ul li a {
			background: #111;
			border-bottom: 1px solid rgba(255,255,255,0.2);
			text-transform: none;
			letter-spacing: normal;
			color: #fff;
		}
		.main-navigation ul ul li a:hover,
		.main-navigation ul ul .menu-item-has-children:hover:before {
			color: #fff;
		}
		.main-navigation ul ul li a:hover, 
		.main-navigation ul ul li a:focus, 
		.main-navigation ul ul li:hover > a, 
		.main-navigation ul ul li:focus > a, 
		.main-navigation ul ul .current-menu-item > a, 
		.main-navigation ul ul .current-menu-ancestor > a, 
		.main-navigation ul ul .current_page_item > a, 
		.main-navigation ul ul .current_page_ancestor > a {
			background: #333;
			color: #fff;
		}

		/* Header Social Networks */
		.site-header.header-eight .social-networks li a, 
		.site-header.header-two .social-networks li a, 
		.header-eight .header-t .right .tools .form-section, 
		.header-two .header-t .right .tools .form-section, 
		.header-two .header-t .right .tools .cart, 
		.header-six .header-t .secondary-nav ul li a, 
		.site-header.header-six .social-networks li a, 
		.header-six .header-t .right .tools .cart, 
		.header-six .header-t .right .tools .form-section {
			color: #ffffffc9;
		}
		.header-six .header-t .secondary-nav ul li a {
			color: #666;
		}
		.site-header.header-eight .social-networks li a:hover, 
		.header-two .header-t .right .social-networks li a:hover, 
		.header-two .header-t .right .social-networks li a:focus, 
		.header-eight .header-t .right .tools .form-section:hover, 
		.header-two .header-t .right .tools .form-section #btn-search:hover, 
		.header-two .header-t .right .tools .form-section #btn-search:focus, 
		.header-two .header-t .right .tools .cart:hover, 
		.header-two .header-t .right .tools .cart:focus, 
		.header-six .header-t .secondary-nav ul li a:hover, .header-six .header-t .secondary-nav ul li a:focus, .header-six .header-t .secondary-nav ul li:hover > a, .header-six .header-t .secondary-nav ul li:focus > a, .header-six .header-t .secondary-nav ul .current-menu-item > a, .header-six .header-t .secondary-nav ul .current-menu-ancestor > a, .header-six .header-t .secondary-nav ul .current_page_item > a, .header-six .header-t .secondary-nav ul .current_page_ancestor > a, 
		.header-six .header-t .right .social-networks li a:hover, 
		.header-six .header-t .right .social-networks li a:focus, 
		.header-six .header-t .right .tools .cart:hover, 
		.header-six .header-t .right .tools .cart:focus, 
		.header-six .header-t .right .tools .form-section #btn-search:hover, 
		.header-six .header-t .right .tools .form-section #btn-search:focus{
			color: #fff;
		}

		.header-eight .header-t .right .separator, 
		.header-two .header-t .right .separator, 
		.header-six .header-t .right .separator {
			background-color: rgba(255,255,255,0.2);
		}

		.header-two .header-t .right .tools .cart .number, 
		.header-six .header-t .right .tools .cart .number {
		    background: #333;
		}
		
		.header-eight .header-t .form-holder .btn-close-form {
			position: absolute;
			top: 48px;
			right: 40px;
			width: 20px;
			height: 20px;
			cursor: pointer;
			z-index: 1;
		}
		.header-eight .header-t .form-holder .btn-close-form span {
			width: 20px;
			height: 2px;
			background: #323338;
			-webkit-transform: rotate(45deg);
			transform: rotate(45deg);
			position: relative;
			display: block;
			margin: 8px 0 0;
		}
		.header-eight .header-t .form-holder .btn-close-form span:after {
			position: absolute;
			top: 0;
			right: 0;
			width: 20px;
			height: 2px;
			background: #323338;
			-webkit-transform: rotate(90deg);
			transform: rotate(90deg);
			content: '';
		}
		.header-eight .header-t .form-holder .search-form {
			max-width: 700px;
			width: 100%;
			padding: 0 15px 10px;
			position: absolute;
			top: 50%;
			left: 50%;
			border-bottom: 1px solid rgba(0, 0, 0, 0.1);
			-webkit-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
		}
		.header-eight .header-t .form-holder .search-form label {
			float: left;
			width: 85%;
		}
		.header-eight .header-t .form-holder .search-form input[type="search"] {
			border: 0;
			border-radius: 0;
			width: 100%;
			margin: 0;
			padding: 0;
			background: none;
			font-size: 42px;
			line-height: 1.2em;
			color: #b5b5b5;
			font-weight: 600;
			font-family: <?php echo wp_kses_post( $secondary_fonts['font'] ); ?>, serif;
		}
		.header-eight .header-t .form-holder .search-form input[type="submit"] {
			float: right;
		}
		.header-eight .header-t .right .tools .form-section svg {
			cursor: pointer;
			-webkit-transition: ease 0.2s;
			transition: ease 0.2s;
		}
		.site-header.header-eight .tools .cart {
			color:#ffffffc9;
		}
		.site-header.header-eight .tools .cart:hover{
			color: #fff;
		}
		.site-header.header-eight .tools .cart .number {
			top: -12px;
			width: 20px;
			height: 20px;
			line-height: 20px;
			font-size: 12px;
		}
		.header-eight .header-t .right .tools .cart .number {
			background-color: #111;
		}

		/* Main Slider */
		/*.banner.banner-layout-one .banner-text,
		.banner.banner-layout-five .banner-text,
		.banner.banner-layout-seven .banner-text {
			bottom: 30px;
		}*/
		.banner .text-holder {
			/* background: #fff; */
			padding: 3rem;
		}
		.banner .text-holder .title {
			font-weight: 600;
		}
		.banner .text-holder .cat-links {
			margin-bottom: 0.75rem;
		}
		.banner .text-holder .cat-links a {
			background: #111;
			border: 0;
			margin: 3px;
			padding: 0.5em 1em;
			font-size: 12px;
			font-weight: 700;
			letter-spacing: 0.15em;
			line-height: 1em;
			color: #fff;
			transition: all 0.3s ease-in-out;
		}
		#primary .post .entry-header .cat-links a:hover {
			color: #fff;
		}
		.banner .text-holder .cat-links a:hover {
			background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
			color: #fff;
		}

		.header-seven .header-t .right .tools .cart .number {
			background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		}

		.header-seven .main-navigation ul ul li a:hover, .header-seven .main-navigation ul ul li a:focus, .header-seven .main-navigation ul ul li:hover > a, .header-seven .main-navigation ul ul li:focus > a, .header-seven .main-navigation ul ul .current-menu-item > a, .header-seven .main-navigation ul ul .current-menu-ancestor > a, .header-seven .main-navigation ul ul .current_page_item > a, .header-seven .main-navigation ul ul .current_page_ancestor > a {
			background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
			color: #fff;
		}

		/* Featured Section */
		.featured-section .img-holder .text-holder {
			font-size: 12px;
			width: calc(100% - 80px);
			padding: 0.75em 1.5em;
			font-weight: 700;
			top: 65%;
			/* bottom: 30px; */
			left: 50%;
			transition: all 0.3s ease-in-out;
			transform: translate(-50%, 0);
		}
		.featured-section .img-holder:hover .text-holder {
			top: 50%;
			/* bottom: 50%; */
			/* left: 50%; */
			/* transition: transform 0.3s ease-in-out; */
			transform: translate(-50%, -50%);
		}

		/* Newsletter */
		.widget-area .widget_blossomthemes_email_newsletter_widget .text-holder {
		    background: url(images/img-newsletter.png) no-repeat 50% 0;
		}
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper {
			flex-flow: column;
		}
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper .text-holder {
			flex-flow: column;
			margin: 0;
			text-align: center;
		}
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3 {
			display: block;
			margin: 0;
			float: none;
			line-height: 1em;
		}
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper .text-holder span {
			display: block;
			border: 0;
			margin: 0.5rem 0 1.5rem;
			padding: 0;
			width: auto;
		}
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"] {
			height: 50px;
			line-height: 48px;
		}
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"] {
			height: 50px;
			font-size: 12px;
			font-weight: 700;
			line-height: 1em;
			letter-spacing: 0.15em;
			text-transform: uppercase;
		}
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper {
			padding: 3rem 1.5rem;
		}
		@media only screen and (max-width: 1440px){
			.top-section .newsletter .blossomthemes-email-newsletter-wrapper {
				padding: 3rem 1.5rem;
			}
		}


		/* Post Styles */
		#primary .post .entry-header {
		 	margin-bottom: 1rem;
		}

		/* Category */
		#primary .post .entry-header .cat-links {
		 	display: inline-block;
		 	margin-bottom: .75rem;
		}

		#primary .post .entry-header .cat-links a:first-child {
		 	margin-left: 0;
		}

		/* Title */
		#primary .post .entry-header .entry-title, #primary .post.first-post .entry-header .entry-title {
		 	font-size: 30px;
		 	font-weight: 700;
		}

		/* Content */
		.page-content, .entry-content, .entry-summary {
		 	margin-top: 1rem;
		}

		/* Post Image */

		/* Post Button */
		#primary .post .btn-readmore {
		 	background-color: transparent !important;
		 	position: relative;
		 	padding: 1.15rem 2rem;

		 	text-transform: uppercase;
		 	font-size: 13px;
		 	font-weight: 700;
		 	line-height: 1;
		 	letter-spacing: 0.15em;
		 	color: #111;
		 	border: 1px solid #111;
		 	overflow: hidden;
		}
		#primary .post .btn-readmore:after {
		 	content: '';
		 	background-color: #111;
		 	position: absolute;
		 	bottom: 0;
		 	left: 0;
		 	width: 100%;
		 	height: 3px;
		 	-webkit-transition: all .3s ease .2s;
		 	-moz-transition: all .3s ease .2s;
		 	transition: all .3s ease .2s;
		}
		#primary .post .btn-readmore:hover:after {
		 	bottom: -3px;
		 	animation: animateLine .1s .3s forwards;
		 	-webkit-transition: all .2s ease;
		 	-moz-transition: all .2s ease;
		 	transition: all .2s ease;
		}
		#primary .post .btn-readmore:before {
		 	position: absolute;
		 	display: block;
		 	width: 100%;
		 	top: 0;
		 	left: 0;
		 	-webkit-transform: translateY(75%);
		 	-moz-transform: translateY(75%);
		 	transform: translateY(75%);
		 	-webkit-transition: -webkit-transform .4s;
		 	-moz-transition: -moz-transform .4s;
		 	transition: transform .4s;
		 	height: 150%;
		 	background: #111;
		 	content: '';
		}
		#primary .post .btn-readmore:hover:before {
		 	-webkit-transform: translateY(-100%);
		 	-moz-transform: translateY(-100%);
		 	transform: translateY(-100%);
		}

		@keyframes animateLine {
		 	0% {
		 		bottom: -3px
		 	}

		 	100% {
		 		bottom: 0
		 	}
		}

		@keyframes colorForward {
		 	0%,100% {
		 		color: inherit
		 	}

		 	50% {
		 		color: #fff
		 	}
		}

		@keyframes colorBackward {
		 	0%,100% {
		 		color: inherit
		 	}

		 	50% {
		 		color: #fff
		 	}
		}


		/* Widget Styles */
		.widget ul {
		 	font-size: 16px;
		}
		.widget_bttk_popular_post .style-two li .entry-header,
		.widget_bttk_pro_recent_post .style-two li .entry-header {
		 	overflow: visible;
		}
		.widget_bttk_popular_post .style-two li .post-thumbnail, .widget_bttk_pro_recent_post .style-two li .post-thumbnail {
		 	margin-bottom: 0.8rem;
		}
		.widget_bttk_popular_post .style-two li .entry-header .cat-links, .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links, .widget_bttk_popular_post .style-three li .entry-header .cat-links, .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links {
		 	display: block;
		 	margin-bottom: 0.5rem;
		 	font-size: 12px;
		 	line-height: 1rem;
		}
		.banner .text-holder .cat-links a,
		#primary .post .entry-header .cat-links a,
		.widget_bttk_popular_post .style-two li .entry-header .cat-links a,
		.widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a,
		.widget_bttk_popular_post .style-three li .entry-header .cat-links a,
		.widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a,
		.page-header span,
		.page-template-contact .top-section .section-header span,
		.widget_bttk_posts_category_slider_widget .carousel-title .cat-links a,
		.portfolio-item .portfolio-cat a,
		.entry-header .portfolio-cat a, 
		.single-post-layout-four .single-post-header-holder .entry-header .cat-links a {
		 	background: #f6f4f3;
		 	display: inline-block;
		 	border: none;
		 	padding: 0.65em 1em;
		 	font-size: 12px;
		 	font-weight: 700;
		 	line-height: 1em;
		 	letter-spacing: 0.15em;
		 	color: #111;
		 	transition: all 0.3s ease-in-out;
		}
		.widget_bttk_popular_post .style-two li .entry-header .cat-links a,
		.widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a,
		.widget_bttk_popular_post .style-three li .entry-header .cat-links a,
		.widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a {
		 	margin: 3px 3px;
		}
		.banner .text-holder .cat-links a:hover, #primary .post .entry-header .cat-links a:hover, .widget_bttk_popular_post .style-two li .entry-header .cat-links a:hover, .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a:hover, .widget_bttk_popular_post .style-three li .entry-header .cat-links a:hover, .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a:hover, .page-header span, .widget_bttk_posts_category_slider_widget .carousel-title .cat-links a:hover, .portfolio-item .portfolio-cat a:hover, .entry-header .portfolio-cat a:hover, 
		.single-post-layout-four .single-post-header-holder .entry-header .cat-links a:hover {
		 	background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		 	color: #fff;
		}
		.widget_bttk_popular_post ul li .entry-header .entry-title,
		.widget_bttk_pro_recent_post ul li .entry-header .entry-title {
		 	font-family: Nunito Sans;
		 	font-size: 1rem;
		}
		.widget_bttk_popular_post .style-two li:after, .widget_bttk_popular_post .style-three li:after, 
		widget_bttk_pro_recent_post .style-two li:after, .widget_bttk_pro_recent_post .style-three li:after {
		 	background-color: #111;
		 	color: #fff;
		}
		.widget_bttk_author_bio .text-holder .readmore:hover, .widget_bttk_author_bio .text-holder .readmore:focus {
		 	background-color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		}

		/* Widget Title */
		.widget .widget-title {
		 	display: block;
		 	background: #f6f4f3;
		 	color: #111;
		 	margin-bottom: 1.25rem;
		 	padding: 1.25rem 1.5rem;
		 	font-size: 13px;
		 	line-height: 1.5;
		 	font-weight: 700;
		 	letter-spacing: 0.25em;
		}
		#secondary .widget_blossomtheme_companion_cta_widget .widget-title {
		 	color: #111;
		}
		.widget .widget-title:before,
		.widget .widget-title:after {
		 	display: none;
		 	background-color: #fad3cf;
		 	width: 15px;
		 	height: 2px;
		}

		/* About Widget */
		.widget_bttk_author_bio {
		 	position: relative;
		 	border: 0;
		 	z-index: 0;
		}
		.widget_bttk_author_bio:after {
		 	content: '';
		 	position: absolute;
		 	bottom: 0;
		 	left: 0;
		 	width: 100%;
		 	height: calc(100% - 26px);
		 	border: 1px solid #e5e5e5;
		 	z-index: -1;
		}
		.widget_bttk_author_bio .widget-title {
		 	top: 0;
		}

		/* Calendar Widget */
		.widget_calendar caption {
		 	background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		 	padding: 1.25rem 1.5rem;
		 	font-size: 13px;
		 	font-weight: 700;
		 	letter-spacing: 0.25em;
		 	color: #fff;
		}

		/* Newsletter */
		.widget-area .widget_blossomthemes_email_newsletter_widget form input[type="submit"] {
		 	height: 50px;
		 	font-size: 12px;
		 	font-weight: 700;
		 	letter-spacing: 0.15em;
		 	text-transform: uppercase;
		}

		/* Custom Category */
		.widget_bttk_custom_categories ul li .cat-title {
		 	font-size: 12px;
		 	font-weight: 700;
		 	letter-spacing: 0.15em;
		 	text-transform: uppercase;
		}


		/* Footer */

		footer .widget .widget-title {
		 	background: none;
		 	position: relative;
		 	padding: 0 0 0.8rem 0;
		 	color: #fff;
		 	text-align: left;
		}
		.site-footer .widget .widget-title:before,
		.site-footer .widget .widget-title:after {
		 	background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		}
		footer .widget .widget-title:before {
		 	content: '';
		 	display: block;
		 	position: absolute;
		 	top: auto;
		 	bottom: 0;
		 	left: 0;
		 	width: 57px;
		 	height: 2px;
		}


		/* Shop */
		.shop-section .shop-slider .item .product-image .btn-add-to-cart {
		 	font-size: 12px;
		 	font-weight: 700;
		 	letter-spacing: 0.15em;
		}
		.shop-section .shop-slider .item .product-image .btn-add-to-cart:hover {
		 	color: #fff;
		}

		/* Scroll Top */
		#blossom-top {
		 	transition: all 0.3s ease-in-out;
		}
		#blossom-top:hover {
		 	background-color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		}

		/* Pagination */
		.pagination .page-numbers {
		 	padding: 0;
		 	width: 50px;
		 	height: 50px;
		 	line-height: 50px;
		}
		.pagination .page-numbers.current {
		 	line-height: 46px;
		}
		.pagination .next:after,
		.pagination .next:before,
		.pagination .prev:after,
		.pagination .prev:before {
		 	top: 50%;
		 	margin: 0;
		 	transform: translateY(-50%);
		}
		#primary .post {
		 	border-bottom: 1px solid #e5e5e5;
		 	padding-bottom: 65px;
		}

		/* Bottom Shop Section */
		.bottom-shop-section .bottom-shop-slider .item h3 {
		 	font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
		 	font-size: 16px;
		 	font-weight: 600;
		}

		/* Single Post */
		.single-post-layout-two .post-header-holder .entry-header .entry-title {
		 	font-size: 50px;
		}
		.single-post-layout-two .post-header-holder .entry-header .cat-links a,
		.single #primary .post .entry-footer .tags a, #primary .page .entry-footer .tags a {
		 	background: #f6f4f3;
		 	display: inline-block;
		 	border: none;
		 	padding: 0.65em 1em;
		 	font-size: 12px;
		 	font-weight: 700;
		 	line-height: 1em;
		 	letter-spacing: 0.15em;
		 	text-transform: uppercase;
		 	color: #111;
		 	transition: all 0.3s ease-in-out;
		}
		.single-post-layout-two .post-header-holder .entry-header .cat-links a:hover,
		.single #primary .post .entry-footer .tags a:hover, #primary .page .entry-footer .tags a:hover {
		 	background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		 	color: #fff;
		}
		.single-post-layout-two .post-header-holder .entry-header .entry-meta a:hover {
		 	color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		}
		#primary .post .entry-header .cat-links a {
		 	margin: 3px;
		}
		button, input[type="button"], input[type="reset"], input[type="submit"] {
		 	height: 50px;
		 	font-size: 12px;
		 	font-weight: 700;
		 	letter-spacing: 0.12em;
		 	text-transform: uppercase;
		}

		/* Pro Style Sheet */

		/* Banner Layout */
		/* Banner Layout Two */
		.banner-layout-five .text-holder .btn-more,
		.banner-layout-three .text-holder .btn-more,
		.banner-layout-four .text-holder .btn-more {
		 	font-size: 12px;
		 	font-weight: 700;
		 	text-transform: uppercase;
		}
		.banner-layout-five img {
		 	opacity: 0.4;
		}
		.banner-layout-five .active img {
		 	opacity: 1;
		}
		.banner.banner-layout-five img {
		 	width: 100%;
		 	vertical-align: top;
		 	height: 760px;
		 	-o-object-fit: cover;
		 	object-fit: cover;
		}
		.banner-layout-five .owl-prev {
		 	width: 120px;
		 	height: 100px;
		 	left: 234px;
		}
		.banner-layout-five .owl-next {
		 	width: 120px;
		 	height: 100px;
		 	right: 234px;
		}
		.widget_bttk_posts_category_slider_widget .owl-theme .owl-nav [class*="owl-"]:hover, 
		.widget_bttk_posts_category_slider_widget .owl-theme .owl-nav [class*="owl-"]:focus {
		 	background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		}

		.top-section .newsletter .blossomthemes-email-newsletter-wrapper form {
		 	padding-bottom: 40px;
		}
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"] + label {
		    position: absolute;
		    bottom: 0;
		    left: 0;
		    font-size: 0.888em;
		}

		.widget.woocommerce .woocommerce-product-search {
		    border: 1px solid #eee;
		    padding: 10px 15px;
		    background: #fff;
		    border-radius: 0;
		}

		.widget.woocommerce .woocommerce-product-search:after {
		    content: '';
		    display: block;
		    clear: both;
		}

		.widget.woocommerce .woocommerce-product-search input[type="search"] {
		    width: 90%;
		    float: left;
		    border: 0;
		    padding: 0;
		    margin: 0;
		    float: left;
		    font-weight: 400;
		}

		.widget.woocommerce .woocommerce-product-search button[type="submit"] {
		    float: right;
		    background: url(images/bg-search.png) no-repeat;
		    width: 18px;
		    height: 17px;
		    font-size: 0;
		    line-height: 0;
		    margin: 6px 0 0;
		    padding: 0;
		    border: 0;
		}


		 /* Single Post Layout */
		.single-post-layout-three .top-bar + .site-content {
		 	padding-top: 2rem;
		}

		@media screen and (max-width: 1440px) {
		 	.banner.banner-layout-five img {
		 		height: 650px;
		 	}
		}
		@media only screen and (min-width: 1025px) {

			.header-eight .main-navigation {
				float: left;
			}
			.header-eight .main-navigation ul li:after {
				top: auto;
				bottom: -2px;
				height: 3px;
				z-index: -1;
				-webkit-transition: all .2s cubic-bezier(.43,.1,0,.82);
				-moz-transition: all .2s cubic-bezier(.43,.1,0,.82);
				transition: all .2s cubic-bezier(.43,.1,0,.82);
			}
			.header-eight .main-navigation ul li:hover:after {
				height: 3px;
			}

			.header-three .main-navigation ul ul li a:hover, .header-three .main-navigation ul ul li a:focus, .header-three .main-navigation ul ul li:hover > a, .header-three .main-navigation ul ul li:focus > a, .header-three .main-navigation ul ul .current-menu-item > a, .header-three .main-navigation ul ul .current-menu-ancestor > a, .header-three .main-navigation ul ul .current_page_item > a, .header-three .main-navigation ul ul .current_page_ancestor > a {
				color: #333;
			}
			.main-navigation ul ul {
				background-color: transparent;
				padding-top: 10px;
			}
			.header-eight .main-navigation ul ul {
				padding-top: 0;
			}
			.header-eight .main-navigation ul .menu-item-has-children li:before {
				position: absolute;
				top: 50%;
				right: 10px;
				margin-top: -5px;
				width: 10px;
				height: 10px;
				line-height: 10px;
				text-align: center;
			}
			.main-navigation ul .menu-item-has-children:before {
				top: 1px;
				line-height: 1em;
			}
			.header-two .header-t .secondary-nav ul li a {
			    color: rgba(255,255,255,0.7);
			}

			.header-two .header-t .secondary-nav ul li a:hover, .header-two .header-t .secondary-nav ul li a:focus, .header-two .header-t .secondary-nav ul li:hover > a, .header-two .header-t .secondary-nav ul li:focus > a, .header-two .header-t .secondary-nav ul .current-menu-item > a, .header-two .header-t .secondary-nav ul .current-menu-ancestor > a, .header-two .header-t .secondary-nav ul .current_page_item > a, .header-two .header-t .secondary-nav ul .current_page_ancestor > a {
				color: #fff;
			}

			.header-seven .main-navigation ul ul .menu-item-has-children::before {
				top: 18px;
			}
		}
		@media only screen and (max-width: 1199px){
		 	.banner-layout-five .owl-prev{left: 150px;}

		 	.banner-layout-five .owl-next{right: 150px;} {
		 		flex-direction: column;
		 		-webkit-box-orient: horizontal;
		 		-webkit-box-direction: normal;
		 		-ms-flex-direction: column;
		 	}

		 	
		}
		@media only screen and (max-width: 1024px){
		 	.header-eight #toggle-button {
		 		color: #ffffffc9;
		 	}
		 	.header-eight #toggle-button:hover {
		 		color: #fff;
		 	}
		 	.header-eight #toggle-button span, 
		 	.header-eight #toggle-button span::before, 
		 	.header-eight #toggle-button span::after {
		 		background: #ffffffc9;
		 	}
		 	.header-eight #toggle-button:hover span, 
		 	.header-eight #toggle-button:hover span::before, 
		 	.header-eight #toggle-button:hover span::after {
		 		background: #fff;
		 	}
		 	.header-eight .main-navigation ul > li {
		 		margin-right: 0;
		 	}
		 	.header-eight .main-navigation ul li a {
		 		color: #111;
		 		background-image: none;
		 	}
		 	.header-eight .main-navigation ul ul {
		 		background: none;
		 	}
		 	.header-eight .main-navigation ul ul li a {
		 		width: 100%;
		 		background: none;
		 		border-bottom-color: rgba(0,0,0,0.1);
		 		padding-bottom: 10px;
		 		text-transform: none;
		 	}

		 	.header-eight .main-navigation ul ul li:last-child > a {
		 		border-bottom: none;
		 		padding-bottom: 0;
		 	}
		 	.header-eight .main-navigation ul li a:hover, 
		 	.header-two .header-t .secondary-nav ul li a:hover, .header-two .header-t .secondary-nav ul li a:focus, .header-two .header-t .secondary-nav ul li:hover > a, .header-two .header-t .secondary-nav ul li:focus > a, .header-two .header-t .secondary-nav ul .current-menu-item > a, .header-two .header-t .secondary-nav ul .current-menu-ancestor > a, .header-two .header-t .secondary-nav ul .current_page_item > a, .header-two .header-t .secondary-nav ul .current_page_ancestor > a, .header-six .header-t .secondary-nav ul li a:hover, .header-six .header-t .secondary-nav ul li a:focus, .header-six .header-t .secondary-nav ul li:hover > a, .header-six .header-t .secondary-nav ul li:focus > a, .header-six .header-t .secondary-nav ul .current-menu-item > a, .header-six .header-t .secondary-nav ul .current-menu-ancestor > a, .header-six .header-t .secondary-nav ul .current_page_item > a, .header-six .header-t .secondary-nav ul .current_page_ancestor > a {
		 		color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		 	}

		 	.header-seven .main-navigation ul ul li a:hover, .header-seven .main-navigation ul ul li a:focus, .header-seven .main-navigation ul ul li:hover > a, .header-seven .main-navigation ul ul li:focus > a, .header-seven .main-navigation ul ul .current-menu-item > a, .header-seven .main-navigation ul ul .current-menu-ancestor > a, .header-seven .main-navigation ul ul .current_page_item > a, .header-seven .main-navigation ul ul .current_page_ancestor > a {
			 	background: none;
			 	color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
			 }

			.main-navigation ul ul {
			    background: none;
			}

			.main-navigation ul ul li a {
			    background: none;
			    border-bottom-color: rgba(0,0,0,0.1);
			    width: 100%;
			    color: #333;
			}

			.main-navigation ul ul li:last-child > a, 
			.header-four .main-navigation ul ul li a {
				border-bottom: none;
			}

			.main-navigation ul ul li a:hover, .main-navigation ul ul li a:focus, .main-navigation ul ul li:hover > a, .main-navigation ul ul li:focus > a, .main-navigation ul ul .current-menu-item > a, .main-navigation ul ul .current-menu-ancestor > a, .main-navigation ul ul .current_page_item > a, .main-navigation ul ul .current_page_ancestor > a {
			    background: none;
			    color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
			}

			.header-two #secondary-toggle-button, .header-six #secondary-toggle-button {
			    color: #fff;
			}

			.header-two #secondary-toggle-button span, .header-six #secondary-toggle-button span, 
			.header-two #secondary-toggle-button span:before, .header-two #secondary-toggle-button span:after, .header-six #secondary-toggle-button span:before, .header-six #secondary-toggle-button span:after {
			    background: #fff;
			}

		 	.banner.banner-layout-five img {
		 		height: 388px;
		 		-o-object-fit: cover;
		 		object-fit: cover;
		 	}
		 	.banner-layout-five .owl-prev{
		 		left: 50px;
		 	}

		 	.banner-layout-five .owl-next{
		 		right: 50px;
		 	}
		 	#primary, 
		 	#secondary {
		 		width: 100%;
		 	}

		}

		@media screen and (max-width: 767px) {
		 	.header-eight .main-header {
		 		padding-top: 1.5rem;
		 		padding-bottom: 1.5rem;
		 	}
		 	.banner.banner-layout-five img {
		 		height: 375px;
		 	}
		 	#primary .post .entry-header .entry-title, 
		 	#primary .post.first-post .entry-header .entry-title {
		 		font-size: 28px;
		 	}
		}
		
    <?php } ?>

    <?php if( $child_theme_support == 'fashion_stylist' ) { ?>
    	/* Common Styles */
		body, button, input, select, optgroup, textarea {
			font-weight: normal;
		}
		.banner .text-holder .title a:hover, .header-four .main-navigation ul li a:hover, .header-four .main-navigation ul ul li a:hover, #primary .post .entry-header .entry-title a:hover, .portfolio-item .portfolio-img-title a:hover {
			transition: all 0.3s ease-in-out;
		}
		#primary .post .btn-readmore, .widget_bttk_author_bio .text-holder .readmore {
			border-radius: 5px;
			font-size: 11px;
			font-weight: 600;
			letter-spacing: 0.15em;
			text-transform: uppercase;
		}

		/* Site Structure */
		.container {
			max-width: 1170px;
		}

		#primary {
			width: calc(100% - 330px);
		}

		#secondary {
			width: 330px;
		}

		/* Site Header */
		.site-header.header-three .site-title {
			font-size: <?php echo absint( $site_title_font_size ); ?>px;
		}
		.site-header.header-three + .banner.banner-layout-two,
		.site-header.header-three + .banner.banner-layout-four,
		.site-header.header-three + .banner.banner-layout-five,
		.site-header.header-three + .banner.banner-layout-six,
		.site-header.header-three + .banner.banner-layout-seven {
		    margin-top: 2rem;
		}
		.site-header .header-t .search-form input[type="submit"] {
			height: auto;
		}
		/* Site Header Layout Three */
		.site-header.header-three .navigation-holder {
		    border-bottom: 1px solid #e5e5e5;
		}

		.site-header .navigation-holder .form-section {
		    padding-left: 0;
		    border-left: none;
		    margin-left: 15px;
		}

		/* Main Navigation */
		.main-navigation ul {
		    font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
		    font-size: 14px;
		    text-transform: uppercase;
		}
		.main-navigation ul ul {
		    font-size: 14px;
		    text-transform: none;
		}
		.header-three .main-navigation .menu > li.menu-item-has-children a,
		.header-seven .main-navigation .menu > li.menu-item-has-children a {
			padding-right: 50px;
		}
		.header-three .main-navigation .menu > li.menu-item-has-children:before,
		.header-seven .main-navigation .menu > li.menu-item-has-children:before {
		    top: 50%;
		    right: 30px;
		    width: 15px;
		    margin-top: 0;
		    height: 20px;
		    line-height: 10px;
		    -webkit-transform: translateY(-50%);
		    -moz-transform: translateY(-50%);
		    transform: translateY(-50%);
		}

		.main-navigation ul.menu > .menu-item-has-children:hover:before{
			background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="%23fff" d="M151.5 347.8L3.5 201c-4.7-4.7-4.7-12.3 0-17l19.8-19.8c4.7-4.7 12.3-4.7 17 0L160 282.7l119.7-118.5c4.7-4.7 12.3-4.7 17 0l19.8 19.8c4.7 4.7 4.7 12.3 0 17l-148 146.8c-4.7 4.7-12.3 4.7-17 0z"></path></svg>');
		}
		.header-three .main-navigation .menu > .current-menu-item:before,
		.header-three .main-navigation .menu > .current-menu-ancestor:before,
		.header-three .main-navigation .menu > .current-menu-item > a,
		.header-three .main-navigation .menu > .current-menu-ancestor > a,
		.header-three .main-navigation .menu > li:hover:before,
		.header-three .main-navigation .menu > li:hover > a,
		.header-seven .main-navigation .menu > .current-menu-item:before,
		.header-seven .main-navigation .menu > .current-menu-ancestor:before,
		.header-seven .main-navigation .menu > .current-menu-item > a,
		.header-seven .main-navigation .menu > .current-menu-ancestor > a,
		.header-seven .main-navigation .menu > li:hover:before,
		.header-seven .main-navigation .menu > li:hover > a {
			color: #fff;
		}

		/* Cart */
		.site-header .tools .cart .number {
			color: #fff;
		}
		.site-header.header-two .tools .cart .number,
		.site-header.header-six .tools .cart .number,
		.site-header.header-eight .tools .cart .number {
			color: #111;
		}

		.header-three .navigation-holder .form-section #btn-search:hover {
			color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		}

		/* Banner / Slider */
		.text-holder .btn-more {
			border-radius: 5px;
			font-size: 11px;
			font-weight: 600;
			text-transform: uppercase;
			transition: all 0.3s ease;
		}

		/* Featured Section */
		.featured-section .img-holder img {
			border-radius: 5px;
		}
		.featured-section .img-holder .text-holder {
			top: 65%;
			left: 50%;
			border-radius: 5px;
			padding: 0;
		    width: calc(100% - 80px);
		    height: 50px;
			font-size: 11px;
		    font-weight: 600;
		    line-height: 50px;
			transition: all 0.3s ease-in-out;
			transform: translate(-50%, 0);
		}
		.featured-section .img-holder:hover .text-holder {
			top: 50%;
			transform: translate(-50%, -50%);
		}

		/* Newsletter */
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper {
			flex-flow: column;
			border-radius: 5px;
		}
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper .text-holder {
			flex-flow: column;
			margin: 0;
			text-align: center;
		}
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3 {
			display: block;
			float: none;
			margin: 0;
			line-height: 1em;
			font-style: normal;
		}
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper .text-holder span {
			display: block;
			border: 0;
			margin: 0.5rem 0 1.5rem;
			padding: 0;
			width: auto;
		}
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"] {
			border-radius: 5px;
			height: 50px;
			line-height: 48px;
		}
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"] {
			border-radius: 5px;
			height: 50px;
			font-size: 11px;
			font-weight: 600;
			letter-spacing: 0.15em;
			text-transform: uppercase;
		}
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper {
			padding: 3rem 1.5rem;
		}
		@media only screen and (max-width: 1440px){
			.top-section .newsletter .blossomthemes-email-newsletter-wrapper {
				padding: 3rem 1.5rem;
			}
		}

		/* Shop Section */
		.shop-section .shop-slider .item .product-image img {
			border-radius: 5px;
		}
		.shop-section .shop-slider .item .product-image .btn-add-to-cart {
			border-radius: 5px;
			padding: 0 20px;
			height: 50px;
			font-size: 11px;
			line-height: 50px;
			font-weight: 600;
			letter-spacing: 0.15em;
		}
		.shop-section .shop-slider .item .product-image .btn-add-to-cart:hover {
			color: #fff;
		}


		/* Post Styles */
		.homepage-layout-five #primary .post:not(.affiliate) .post-content {
			align-items: center;
		}
		.homepage-layout-five #primary .post .entry-header {
		    margin-bottom: 0.8rem;
		}
		.page-content, .entry-content, .entry-summary {
		    margin-top: 0.8rem;
		}
		#primary .post .entry-header .entry-title {
		    font-size: 30px;
		}
		#primary .post .entry-header .entry-title a:hover {
			color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		}

		/* Post Image */
		#primary .post .post-thumbnail img {
			border-radius: 5px;
		}
		.homepage-layout-five #primary .post .post-thumbnail {
			max-width: 45%;
		}


		/* Category Link */
		#primary .post .entry-header .cat-links {
		    margin-bottom: 0.5rem
		}
		.banner .text-holder .cat-links a,
		#primary .post .entry-header .cat-links a,
		.widget_bttk_popular_post .style-two li .entry-header .cat-links a,
		.widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a,
		.widget_bttk_popular_post .style-three li .entry-header .cat-links a,
		.widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a,
		.page-header span,
		.page-template-contact .top-section .section-header span,
		.widget_bttk_posts_category_slider_widget .carousel-title .cat-links a,
		.portfolio-item .portfolio-cat a,
		.entry-header .portfolio-cat a, 
		.single-post-layout-four .single-post-header-holder .entry-header .cat-links a {
		    <?php echo 'background-color: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
			border: none;
			border-radius: 3px;
		    margin: 3px;
		    padding: 0.75em 1em;
		    font-size: 11px;
		    font-weight: 600;
		    letter-spacing: 0.15em;
		    line-height: 1;
		    color: #111;
		    transition: all 0.3s ease;
		}
		.banner .text-holder .cat-links a:hover,
		#primary .post .entry-header .cat-links a:hover,
		.widget_bttk_popular_post .style-two li .entry-header .cat-links a:hover,
		.widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a:hover,
		.widget_bttk_popular_post .style-three li .entry-header .cat-links a:hover,
		.widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a:hover,
		.widget_bttk_posts_category_slider_widget .carousel-title .cat-links a:hover,
		.portfolio-item .portfolio-cat a:hover,
		.entry-header .portfolio-cat a:hover, 
		.single-post-layout-four .single-post-header-holder .entry-header .cat-links a:hover {
		    background-color:<?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		    color: #fff;
		}

		/* Post Shop */
		#primary .post .post-shope-holder {
			border-radius: 5px;
		}
		.homepage-layout-five #primary .post .post-shope-holder {
		    margin-top: 2.5rem;
		    padding-bottom: 0;
		}
		#primary .post .post-shope-holder .header {
		    min-width: 200px;
		}
		#primary .post .post-shope-holder .header .title {
		    font-size: 16px;
		    font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
		}

		/* Widget Styles */
		.widget_bttk_popular_post .style-two li:after,
		.widget_bttk_popular_post .style-three li:after,
		.widget_bttk_pro_recent_post .style-two li:after,
		.widget_bttk_pro_recent_post .style-three li:after {
			border-radius: 3px;
			padding: 0;
			width: 20px;
			height: 20px;
			line-height: 20px;
			font-size: 11px;
			font-weight: 600;
			text-align: center;
			color: #fff;
		}
		.widget_bttk_popular_post .style-two li .entry-header,
		.widget_bttk_pro_recent_post .style-two li .entry-header {
			overflow: visible;
		}

		.widget:not(.widget_bttk_author_bio) .widget-title {
			margin-bottom: 1.5rem;
			font-size: 0.9rem;
			left: auto;
			transform: none;
			padding-right: 65px;
		}
		.widget:not(.widget_bttk_author_bio) .widget-title:before {
			display: none;
		}
		.widget:not(.widget_bttk_author_bio) .widget-title:after {
			<?php echo 'background-color: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
			left: auto;
			right: 0;
			width: 57px;
			height: 2px;
		}
		.widget.widget_bttk_author_bio .widget-title::before,
		.widget.widget_bttk_author_bio .widget-title:after {
			<?php echo 'background-color: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
			height: 2px;
		}

		/* Post Thumbnail */
		.post-thumbnail img {
			border-radius: 5px;
		}

		/* Post Title */
		.widget_bttk_popular_post ul li .entry-header .entry-title,
		.widget_bttk_pro_recent_post ul li .entry-header .entry-title {
			font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
			font-size: 0.9rem;
			font-weight: 600;
		}

		/* Custom Categories Widget */
		.widget_bttk_custom_categories ul li {
			border-radius: 5px;
		}
		.widget_bttk_custom_categories ul li .cat-title {
			border-radius: 5px;
			font-size: 11px;
			font-weight: 600;
			letter-spacing: 0.15em;
		}

		/* Newsletter Widget */
		.widget-area .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper {
			border-radius: 5px;
		}
		.widget-area .widget_blossomthemes_email_newsletter_widget form input[type="text"],
		.widget-area .widget_blossomthemes_email_newsletter_widget form input[type="submit"] {
			border-radius: 5px;
		}
		.widget-area .widget_blossomthemes_email_newsletter_widget form input[type="submit"] {
			height: 50px;
			font-size: 11px;
			font-weight: 600;
			letter-spacing: 0.15em;
			text-transform: uppercase;
		}

		/* Calendar Widget */
		.widget_calendar caption {
			border-radius: 5px 5px 0 0;
			background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
			padding: 1.25rem 1.5rem;
			font-size: 0.9rem;
			font-weight: 600;
			letter-spacing: 0.25em;
			color: #fff;
		}

		/* Single Post */
		.single-post-layout-two .post-header-holder .entry-header .entry-title {
			font-size: 50px;
		}
		.single-post-layout-two .post-header-holder .entry-header .cat-links a,
		.single #primary .post .entry-footer .tags a, #primary .page .entry-footer .tags a {
			<?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
		    display: inline-block;
			border: none;
			border-radius: 5px;
		    padding: 0.65em 1em;
		    font-size: 11px;
		    font-weight: 600;
		    line-height: 1em;
			letter-spacing: 0.15em;
			text-transform: uppercase;
		    color: #111;
		    transition: all 0.3s ease-in-out;
		}
		.single-post-layout-two .post-header-holder .entry-header .cat-links a:hover,
		.single #primary .post .entry-footer .tags a:hover, #primary .page .entry-footer .tags a:hover {
			background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
			color: #fff;
		}
		.single-post-layout-two .post-header-holder .entry-header .entry-meta a:hover {
			color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		}
		#primary .post .entry-header .cat-links a {
			margin: 3px;
		}
		button, input[type="button"], input[type="reset"], input[type="submit"] {
			border-radius: 5px;
			height: 50px;
			font-size: 11px;
			font-weight: 600;
			letter-spacing: 0.15em;
			text-transform: uppercase;
		}
		.single #primary .post .entry-footer .tags {
			margin-top: 3rem;
		}
		.single #primary .post .entry-footer {
			margin-bottom: 90px;
		}

		/* Single Newsletter */
		.single .newsletter .blossomthemes-email-newsletter-wrapper {
			border-radius: 5px;
		}
		.single .newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3 {
			font-size: 36px;
			font-style: normal;
		}
		.single .newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"] {
			border-radius: 5px;
			height: 50px;
		}
		.single .newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"] {
			font-size: 11px;
			font-weight: 600;
			letter-spacing: 0.15em;
		}


		/* Scroll Top */
		#blossom-top {
			border-radius: 5px;
			transition: all 0.3s ease-in-out;
		}
		#blossom-top:hover {
			background-color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		}

		/* Pagination */
		.pagination .page-numbers {
			padding: 0;
			width: 50px;
			height: 50px;
			line-height: 50px;
			font-weight: 600;
		}
		.screen-reader-text {
			font-size: 14px;
		}
		.pagination .page-numbers.current {
			border-radius: 5px;
			line-height: 46px;
		}
		.pagination .next:after,
		.pagination .next:before,
		.pagination .prev:after,
		.pagination .prev:before {
			top: 50%;
			margin: 0;
			transform: translateY(-50%);
		}
		#primary .post {
		    border-bottom: 1px solid #e5e5e5;
		    padding-bottom: 65px;
		}

		/* Bottom Shop Section */
		.bottom-shop-section .header {
			border-radius: 5px;
		}
		.bottom-shop-section .bottom-shop-slider .item h3 {
			font-family: "Nunito Sans";
			font-size: 16px;
			font-weight: 600;
		}
		.bottom-shop-section .bottom-shop-slider .item img {
			border-radius: 5px;
		}

		/* Instagram Section */
		.instagram-section ul img {
			border-radius: 5px;
		}


		/* Pro Style Sheet */

		/* Header Styles */
		.site-title {
			margin-bottom: 1rem;
			font-size: 60px;
		}

		/* Header Five */
		.header-five .site-title {
			margin-bottom: 0.8rem;
			font-size: 40px;
		}

		/* Header Six */
		.header-six .site-title {
			margin-bottom: 0.8rem;
			font-size: 40px;
		}

		/* Header Seven */
		.header-seven .main-header .container {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.header-seven .site-title {
			margin-bottom: 0.8rem;
			font-size: 40px;
		}
		.header-seven .header-t .right .tools .cart .number {
			background-color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
			color: #fff;
		}

		@media screen and (max-width: 1199px) {
			.container {
				max-width: 970px;
			}
		}

		@media only screen and (min-width: 1025px) {
			.header-seven .main-navigation {
				margin-top: 0;
				justify-content: flex-end;
				order: 2;
			}
		}

		@media screen and (max-width: 1024px) {
			.container {
				max-width: 720px;
			}

			#primary {
				width: 100%;
			}

			#secondary {
				width: 100%;
			}

			.homepage-layout-five #primary .post .post-thumbnail {
			    max-width: 100%;
			}

			.header-three .main-navigation .menu > li.menu-item-has-children a, .header-seven .main-navigation .menu > li.menu-item-has-children a {
			    padding-right: 0;
			}

			.header-three .main-navigation .menu > .current-menu-item:before,
			.header-three .main-navigation .menu > .current-menu-ancestor:before,
			.header-three .main-navigation .menu > .current-menu-item > a,
			.header-three .main-navigation .menu > .current-menu-ancestor > a,
			.header-three .main-navigation .menu > li:hover:before,
			.header-three .main-navigation .menu > li:hover > a,
			.header-seven .main-navigation .menu > .current-menu-item:before,
			.header-seven .main-navigation .menu > .current-menu-ancestor:before,
			.header-seven .main-navigation .menu > .current-menu-item > a,
			.header-seven .main-navigation .menu > .current-menu-ancestor > a,
			.header-seven .main-navigation .menu > li:hover:before,
			.header-seven .main-navigation .menu > li:hover > a {
				color: #111;
			}

			.main-navigation ul li a {
			    background-image: linear-gradient(180deg, transparent 93%, <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?> 0);
			}
		}

		@media screen and (max-width: 767px) {
			.container {
				max-width: 100%;
			}

			#primary .post .entry-footer .social-networks li {
			    margin-top: 10px;
			}
		}

		/* Header Eight */
		.header-eight .site-title {
			margin-bottom: 1rem
		}

		/* Banner Layout */
		/* Banner Layout Two / Three */
		.banner-layout-two .text-holder .btn-more,
		.banner-layout-three .text-holder .btn-more,
		.banner-layout-four .text-holder .btn-more {
			font-size: 11px;
			font-weight: 600;
			text-transform: uppercase;
		}

		/* Banner Layout Five */
		.banner.banner-layout-six .text-holder .title {
			font-size: 24px;
		}
		.banner.banner-layout-six .text-holder .cat-links {
			margin-bottom: 0.5rem;
		}

		/* Banner Layout Six/ Seven */
		.banner.banner-layout-seven img,
		.banner.banner-layout-seven img {
			border-radius: 5px;
		}

		/* Single Post Layout */
		.single-post-layout-three .top-bar + .site-content {
			padding-top: 2rem;
		}
    <?php } ?>

    <?php if( $child_theme_support == 'fashion_icon' ) { ?>

    /* Common Styles */
	body, button, input, select, optgroup, textarea {
		font-weight: normal;
	}
	.banner .text-holder .title a:hover, .header-four .main-navigation ul li a:hover, .header-four .main-navigation ul ul li a:hover, #primary .post .entry-header .entry-title a:hover, .portfolio-item .portfolio-img-title a:hover {
		transition: all 0.3s ease-in-out;
	}
	#primary .post .btn-readmore, .widget_bttk_author_bio .text-holder .readmore {
	    background-color: #111;
		border-radius: 5px;
		font-size: 12px;
		font-weight: 700;
		letter-spacing: 0.15em;
	    text-transform: uppercase;
	    color: #fff;
	}
	#primary .post .btn-readmore::before,
	#primary .post .btn-readmore::after,
	.widget_bttk_author_bio .text-holder .readmore::before,
	.widget_bttk_author_bio .text-holder .readmore::after {
	    display: none;
	}
	#primary .post .btn-readmore:hover,
	.widget_bttk_author_bio .text-holder .readmore:hover {
	    background-color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?> ;
	    border-color: transparent;
	}

	.woocommerce-cart #primary .page .entry-content table.shop_table td.product-name a:hover, 
	.woocommerce-cart #primary .page .entry-content table.shop_table td.product-name a:focus {
		color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?> ;
	}
	.single-post-layout-two .post-header-holder .entry-header .cat-links a:hover, .single #primary .post .entry-footer .tags a:hover, #primary .page .entry-footer .tags a:hover {
		background: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?> ;
	}

	.widget_calendar table tbody td a {
		<?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
	}

	/* Site Structure */
	.container {
		max-width: 1170px;
	}

	#primary {
		width: calc(100% - 330px);
	}

	#secondary {
		width: 330px;
	}

	/* Site Header */
	.site-header.header-three .site-title {
		font-size: 120px;
	}
	.site-header .header-t .search-form input[type="submit"] {
		height: auto;
	}
	/* Site Header Layout Three */
	.site-header.header-three .navigation-holder {
	    border-bottom: 1px solid #e5e5e5;
	}

	.banner .text-holder .title,
	.top-section .newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3,
	.shop-section .header .title,
	#primary .post .entry-header .entry-title,
	#primary .post .post-shope-holder .header .title,
	.widget_bttk_author_bio .title-holder,
	.widget_bttk_popular_post ul li .entry-header .entry-title,
	.widget_bttk_pro_recent_post ul li .entry-header .entry-title,
	.widget-area .widget_blossomthemes_email_newsletter_widget .text-holder h3,
	.bottom-shop-section .bottom-shop-slider .item h3,
	.page-title,
	#primary .post .entry-content blockquote,
	#primary .page .entry-content blockquote,
	#primary .post .entry-content .dropcap,
	#primary .page .entry-content .dropcap,
	#primary .post .entry-content .pull-left,
	#primary .page .entry-content .pull-left,
	#primary .post .entry-content .pull-right,
	#primary .page .entry-content .pull-right,
	.author-section .text-holder .title,
	.single .newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3,
	.related-posts .title, .popular-posts .title,
	.comments-area .comments-title,
	.comments-area .comment-reply-title,
	.single .single-header .title-holder .post-title,
    .portfolio-text-holder .portfolio-img-title,
    .portfolio-holder .entry-header .entry-title,
    .related-portfolio-title,
    .archive #primary .post .entry-header .entry-title, 
    .search #primary .search-post .entry-header .entry-title, 
    .archive #primary .post-count, 
    .search #primary .post-count,
    .search .top-section .search-form input[type="search"],
    .header-two .form-holder .search-form input[type="search"],
    .archive.author .top-section .text-holder .author-title,
    .widget_bttk_posts_category_slider_widget .carousel-title .title, 
    .error-holder .text-holder h2,
    .error-holder .recent-posts .post .entry-header .entry-title,
    .error-holder .recent-posts .title, 
    .single-post-layout-two .post-header-holder .entry-header .entry-title{
		font-family: <?php echo wp_kses_post( $secondary_fonts['font'] ); ?>;
	}

	/* Main Navigation */
	.main-navigation ul {
	    font-family : <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
	    font-size: 14px;
	    text-transform: uppercase;
	}
	.main-navigation ul ul {
	    font-size: 14px;
	    text-transform: none;
	}

	@media only screen and (min-width: 1025px) {
	    .main-navigation ul .menu-item-has-children:before {
	        top: 1px;
	        line-height: unset;
	    }
	}

	/* Cart */
	.site-header .tools .cart .number {
		color: #fff;
	}
	.site-header.header-two .tools .cart .number,
	.site-header.header-six .tools .cart .number,
	.site-header.header-eight .tools .cart .number {
		color: #111;
	}

	/* Banner / Slider */
	.text-holder .btn-more {
		border-radius: 5px;
		font-size: 12px;
		font-weight: 700;
		text-transform: uppercase;
		transition: all 0.3s ease;
	}

	/* Featured Section */
	.featured-section .img-holder img {
		border-radius: 5px;
	}
	.featured-section .img-holder .text-holder {
		top: 65%;
		left: 50%;
		border-radius: 5px;
		padding: 0;
	    width: calc(100% - 80px);
	    height: 50px;
		font-size: 12px;
	    font-weight: 700;
	    line-height: 50px;
		transition: all 0.3s ease-in-out;
		transform: translate(-50%, 0);
	}
	.featured-section .img-holder:hover .text-holder {
	    background-color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
	    top: 50%;
	    color: #fff;
		transform: translate(-50%, -50%);
	}

	/* Newsletter */
	.top-section .newsletter .blossomthemes-email-newsletter-wrapper {
		flex-flow: column;
		border-radius: 5px;
	}
	.top-section .newsletter .blossomthemes-email-newsletter-wrapper .text-holder {
		flex-flow: column;
		margin: 0;
		text-align: center;
	}
	.top-section .newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3 {
		display: block;
		float: none;
		margin: 0;
		line-height: 1em;
		font-style: normal;
	}
	.top-section .newsletter .blossomthemes-email-newsletter-wrapper .text-holder span {
		display: block;
		border: 0;
		margin: 0.5rem 0 1.5rem;
		padding: 0;
		width: auto;
	}
	.top-section .newsletter .blossomthemes-email-newsletter-wrapper form {
	    padding-bottom: 0;
	}
	.top-section .newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"] {
		border-radius: 5px;
		height: 50px;
		line-height: 48px;
	}
	.top-section .newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"] {
		border-radius: 5px;
		height: 50px;
		font-size: 12px;
		font-weight: 700;
		letter-spacing: 0.15em;
		text-transform: uppercase;
	}
	.top-section .newsletter .blossomthemes-email-newsletter-wrapper {
		padding: 3rem 1.5rem;
	}
	@media only screen and (max-width: 1440px){
		.top-section .newsletter .blossomthemes-email-newsletter-wrapper {
			padding: 3rem 1.5rem;
		}
	}

	/* Shop Section */
	.shop-section .shop-slider .item .product-image img {
		border-radius: 5px;
	}
	.shop-section .shop-slider .item .product-image .btn-add-to-cart {
		border-radius: 5px;
		padding: 0 20px;
		height: 50px;
		font-size: 12px;
		line-height: 50px;
		font-weight: 700;
		letter-spacing: 0.15em;
	}
	.shop-section .shop-slider .item .product-image .btn-add-to-cart:hover {
		color: #fff;
	}


	/* Post Styles */
	.homepage-layout-three #primary .post:not(.affiliate) .post-content {
	    align-items: center;
	}
	.homepage-layout-three #primary .post .post-content {
	    align-items: flex-start;
	    margin-top: 1.5rem;
	}
	.page-content, .entry-content, .entry-summary {
	    margin-top: 0.8rem;
	}
	.homepage-layout-three #primary .post .entry-header {
	    margin-bottom: 1.5rem;
	}
	.homepage-layout-three #primary .post .entry-header .entry-title {
	    margin-bottom: 0.8rem;
	}
	#primary .post .entry-header .entry-title a:hover, 
	.search #primary .page .entry-header .entry-title a:hover, 
	.single-post-layout-four .single-post-header-holder .entry-header .entry-meta a:hover, .single-post-layout-four .single-post-header-holder .entry-header .entry-meta a:focus {
		color:  <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	/* Post Shop */
	.homepage-layout-three #primary .post .post-content .post-shope-holder {
	    margin-top: 1rem;
	}

	/* Post Image */
	#primary .post .post-thumbnail img {
		border-radius: 5px;
	}


	/* Category Link */
	#primary .post .entry-header .cat-links {
	    margin-bottom: 0.5rem
	}
	.banner .text-holder .cat-links a,
	#primary .post .entry-header .cat-links a,
	.widget_bttk_popular_post .style-two li .entry-header .cat-links a,
	.widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a,
	.widget_bttk_popular_post .style-three li .entry-header .cat-links a,
	.widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a,
	.page-header span,
	.page-template-contact .top-section .section-header span,
	.widget_bttk_posts_category_slider_widget .carousel-title .cat-links a,
	.portfolio-item .portfolio-cat a,
	.entry-header .portfolio-cat a, 
		.error-holder .recent-posts .post .entry-header .cat-links a, 
		.single-post-layout-four .single-post-header-holder .entry-header .cat-links a {
	    <?php echo 'background-color: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
		border: none;
		border-radius: 3px;
	    margin: 3px;
	    padding: 0.75em 1em;
	    font-size: 12px;
	    font-weight: 700;
	    letter-spacing: 0.15em;
	    line-height: 1;
	    color: #111;
	    transition: all 0.3s ease;
	}
	.banner .text-holder .cat-links a:hover,
	#primary .post .entry-header .cat-links a:hover,
	.widget_bttk_popular_post .style-two li .entry-header .cat-links a:hover,
	.widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a:hover,
	.widget_bttk_popular_post .style-three li .entry-header .cat-links a:hover,
	.widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a:hover,
	.widget_bttk_posts_category_slider_widget .carousel-title .cat-links a:hover,
	.portfolio-item .portfolio-cat a:hover,
	.entry-header .portfolio-cat a:hover, 
		.error-holder .recent-posts .post .entry-header .cat-links a:hover, 
		.single-post-layout-four .single-post-header-holder .entry-header .cat-links a:hover {
	    background-color: <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
	    color: #fff;
	}

	/* Post Shop */
	#primary .post .post-shope-holder {
		border-radius: 5px;
	}
	.homepage-layout-three #primary .post .post-shope-holder {
	    margin-top: 2.5rem;
	    padding-bottom: 0;
	}
	#primary .post .post-shope-holder .header {
	    min-width: 200px;
	}
	#primary .post .post-shope-holder .header .title {
	    font-size: 16px;
	    font-family : <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
	}

	/* Widget Styles */
	.widget_bttk_popular_post .style-two li:after,
	.widget_bttk_popular_post .style-three li:after,
	.widget_bttk_pro_recent_post .style-two li:after,
	.widget_bttk_pro_recent_post .style-three li:after {
		border-radius: 3px;
		padding: 0;
		width: 20px;
		height: 20px;
		line-height: 20px;
		font-size: 12px;
		font-weight: 700;
		text-align: center;
		color: #fff;
	}
	.widget_bttk_popular_post .style-two li .entry-header,
	.widget_bttk_pro_recent_post .style-two li .entry-header {
		overflow: visible;
	}

	.widget .widget-title {
	    background-color: #000;
	    border-radius: 5px;
	    padding: 1rem 1.5rem;
	    color: #fff;
	}

	.widget:not(.widget_bttk_author_bio) .widget-title {
		margin-bottom: 1.5rem;
		font-size: 0.9rem;
		left: auto;
		transform: none;
	}
	.widget:not(.widget_bttk_author_bio) .widget-title:before {
		display: none;
	}
	.widget:not(.widget_bttk_author_bio) .widget-title:after {
		<?php echo 'background-color: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
		left: 120%;
		right: auto;
		width: 57px;
		height: 2px;
	}
	.widget.widget_bttk_author_bio .widget-title::before,
	.widget.widget_bttk_author_bio .widget-title:after {
		<?php echo 'background-color: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
		height: 2px;
	}

	/* Post Thumbnail */
	.post-thumbnail img {
		border-radius: 5px;
	}

	/* Post Title */
	.widget_bttk_popular_post ul li .entry-header .entry-title,
	.widget_bttk_pro_recent_post ul li .entry-header .entry-title {
		font-family : <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
		font-size: 0.9rem;
		font-weight: 700;
	}

	/* Custom Categories Widget */
	.widget_bttk_custom_categories ul li {
		border-radius: 5px;
	}
	.widget_bttk_custom_categories ul li .cat-title {
		border-radius: 5px;
		font-size: 12px;
		font-weight: 700;
		letter-spacing: 0.15em;
	}

	/* Newsletter Widget */
	.widget-area .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper {
		border-radius: 5px;
	}
	.widget-area .widget_blossomthemes_email_newsletter_widget form input[type="text"],
	.widget-area .widget_blossomthemes_email_newsletter_widget form input[type="submit"] {
		border-radius: 5px;
	}
	.widget-area .widget_blossomthemes_email_newsletter_widget form input[type="submit"] {
		height: 50px;
		font-size: 12px;
		font-weight: 700;
		letter-spacing: 0.15em;
		text-transform: uppercase;
	}

	/* Calendar Widget */
	.widget_calendar caption {
		border-radius: 5px 5px 0 0;
		background:  <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		padding: 1.25rem 1.5rem;
		font-size: 0.9rem;
		font-weight: 700;
		letter-spacing: 0.25em;
		color: #fff;
	}

	/* Single Post */
	.single-post-layout-two .post-header-holder .entry-header .entry-title {
		font-size: 50px;
	}
	.single-post-layout-two .post-header-holder .entry-header .cat-links a,
	.single #primary .post .entry-footer .tags a, #primary .page .entry-footer .tags a {
		<?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
	    display: inline-block;
		border: none;
		border-radius: 5px;
	    padding: 0.65em 1em;
	    font-size: 12px;
	    font-weight: 700;
	    line-height: 1em;
		letter-spacing: 0.15em;
		text-transform: uppercase;
	    color: #111;
	    transition: all 0.3s ease-in-out;
	}
	.single-post-layout-two .post-header-holder .entry-header .cat-links a:hover,
	.single #primary .post .entry-footer .tags a:hover, 
	#primary .page .entry-footer .tags a:hover {
		background:  <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		color: #fff;
	}
	.banner .text-holder .title a, .header-four .main-navigation ul li a, 
	.header-four .main-navigation ul ul li a, 
	#primary .post .entry-header .entry-title a, 
	.portfolio-item .portfolio-img-title a, 
	.search #primary .page .entry-header .entry-title a{
		background-image: none;
	}
	.single-post-layout-two .post-header-holder .entry-header .entry-meta a:hover, 
	.banner .text-holder .title a:hover {
		color:  <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
	}
	#primary .post .entry-header .cat-links a {
		margin: 3px;
	}
	button, input[type="button"], input[type="reset"], input[type="submit"] {
		border-radius: 5px;
		height: 50px;
		font-size: 12px;
		font-weight: 700;
		letter-spacing: 0.15em;
		text-transform: uppercase;
	}
	.single #primary .post .entry-footer .tags {
		margin-top: 2rem;
	}

	/* Single Newsletter */
	.single .newsletter .blossomthemes-email-newsletter-wrapper {
		border-radius: 5px;
	}
	.single .newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3 {
		font-size: 36px;
		font-style: normal;
	}
	.single .newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"] {
		border-radius: 5px;
		height: 50px;
	}
	.single .newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"] {
		font-size: 12px;
		font-weight: 700;
		letter-spacing: 0.15em;
	}


	/* Scroll Top */
	#blossom-top {
		border-radius: 5px;
		transition: all 0.3s ease-in-out;
	}
	#blossom-top:hover {
		background-color:  <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	/* Pagination */
	.pagination .page-numbers {
		padding: 0;
		width: 50px;
		height: 50px;
		line-height: 50px;
		font-weight: 700;
	}
	.screen-reader-text {
		font-size: 14px;
	}
	.pagination .page-numbers.current {
		border-radius: 5px;
		line-height: 46px;
	}
	.pagination .next:after,
	.pagination .next:before,
	.pagination .prev:after,
	.pagination .prev:before {
		top: 50%;
		margin: 0;
		transform: translateY(-50%);
	}
	#primary .post {
	    border-bottom: 1px solid #e5e5e5;
	    padding-bottom: 65px;
	}

	/* Bottom Shop Section */
	.bottom-shop-section .header {
		border-radius: 5px;
	}
	.bottom-shop-section .bottom-shop-slider .item h3 {
		font-family: "Nunito Sans";
		font-size: 16px;
		font-weight: 700;
	}
	.bottom-shop-section .bottom-shop-slider .item img {
		border-radius: 5px;
	}

	/* Instagram Section */
	.instagram-section ul img {
		border-radius: 5px;
	}


	/* Pro Style Sheet */

	/* Header Styles */
	.site-title {
		margin-bottom: 1rem;
		font-size: 60px;
	}

	/* Header Five */
	.header-five .site-title {
		margin-bottom: 0.8rem;
		font-size: 40px;
	}

	/* Header Six */
	.header-six .site-title {
		margin-bottom: 0.8rem;
		font-size: 40px;
	}

	/* Header Seven */
	.header-seven .main-header .container {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.header-seven .site-title {
		margin-bottom: 0.8rem;
		font-size: 40px;
	}
	.header-seven .header-t .right .tools .cart .number, #primary .post .btn-readmore:hover, 
	#primary .post .btn-readmore:focus {
		background-color:  <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
		color: #fff;
	}
	.error-holder .text-holder .btn-home:hover, .error-holder .text-holder .btn-home:focus {
		background:  <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
	}
	.error-holder .recent-posts .post .entry-header .entry-title a:hover, .error-holder .recent-posts .post .entry-header .entry-title a:focus {
		color:  <?php echo blossom_fashion_pro_sanitize_hex_color( $primary_color ); ?>;
	}
	.archive #primary .post-count, .search #primary .post-count {
		font-style: normal;
	}
	@media only screen and (min-width: 1025px) {
		.header-seven .main-navigation {
			margin-top: 0;
			justify-content: flex-end;
			order: 2;
		}
	}

	/* Header Eight */
	.header-eight .site-title {
		margin-bottom: 1rem
	}

	/* Banner Layout */
	/* Banner Layout Two / Three */
	.banner-layout-two .text-holder .btn-more,
	.banner-layout-three .text-holder .btn-more,
	.banner-layout-four .text-holder .btn-more {
		font-size: 12px;
		font-weight: 700;
		text-transform: uppercase;
	}

	/* Banner Layout Five */
	.banner.banner-layout-six .text-holder .title {
		font-size: 24px;
	}
	.banner.banner-layout-six .text-holder .cat-links {
		margin-bottom: 0.5rem;
	}

	/* Banner Layout Six/ Seven */
	.banner.banner-layout-six img,
	.banner.banner-layout-seven img {
		border-radius: 5px;
	}

	/* Single Post Layout */
	.single-post-layout-three .top-bar + .site-content {
		padding-top: 2rem;
	}
	
	/* Single Post Highlight */
	#primary .post .entry-content .highlight, 
	#primary .page .entry-content .highlight{
		color: #fff;
	}

	.widget .widget-title {
		display: block;
	}

	.widget .widget-title::before, 
	.widget .widget-title::after {
		display: none;
	}

	@media screen and (max-width: 1600px) {
		.header-two {
		    padding-left: 40px;
		    padding-right: 40px;
		}

		.header-two .site-branding {
			width: 25%;
		}

		.header-two .main-navigation {
			width: 65%
		}

		.main-navigation ul li {
		    margin-left: 20px;
		    margin-right: 20px;
		}

		.header-two .right {
			width: 10%;
		}
	}

	@media screen and (max-width: 1199px) {
		.header-two .site-branding {
			width: 20%;
		}

		.header-two .site-title {
			font-size: 40px;
		}

		.header-two .main-navigation {
			width: 70%;
		}

		.main-navigation ul {
			font-size: 12px;
		}

		.main-navigation ul .menu-item-has-children::before {
		    width: 10px;
		}

	}

	@media screen and (max-width: 1024px) {
		.header-two .site-branding {
		    width: 70%;
		}

		.header-two .right {
		    width: 30%;
		}

		.header-two .main-navigation {
			width: 320px;
		}

		.main-navigation ul {
			padding-top: 40px;
			font-size: 14px;
		}

		.main-navigation ul ul {
			padding-top: 0;
		}

		.main-navigation ul li {
			margin-left: 0;
			margin-right: 0;
		}

		#primary, #secondary {
		    width: 100%;
		}

		.homepage-layout-two #primary .post .entry-header .entry-title {
			font-size: 38px;
		}

	}

	@media screen and (max-width: 767px) {
		.header-two .site-branding {
		    float: none;
		    width: 100%;
		    text-align: center;
		}

		.header-two .right:before, 
		.header-two .right:after {
			content: "";
			display: table;
		}

		.header-two .right:after {
			clear: both;
		}

		.header-two .right {
		    float: none;
		    width: 100%;
		}

		.header-two #toggle-button {
		    margin-left: 0;
		}

		.homepage-layout-two #primary .post .entry-header .entry-title {
			font-size: 28px;
		}
	}


    <?php } ?>
           
    <?php echo "</style>";
}
add_action( 'wp_head', 'blossom_fashion_pro_dynamic_css', 99 );

/**
 * Function for sanitizing Hex color 
 */
function blossom_fashion_pro_sanitize_hex_color( $color ){
	if ( '' === $color )
		return '';

    // 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;
}

/**
 * convert hex to rgb
 * @link http://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
*/
function blossom_fashion_pro_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}
