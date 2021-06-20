<?php
/**
 * Blossom Pin Pro Dynamic Styles
 * 
 * @package Blossom_Pin_Pro
*/

function blossom_pin_pro_dynamic_css(){

    $child_theme_support    = get_theme_mod( 'child_additional_support', 'default' );

    if( $child_theme_support == 'blossom_pinthis' ){
        $primary_font    = get_theme_mod( 'primary_font_pinthis', 'Nunito Sans' );
        $primary_fonts   = blossom_pin_pro_get_fonts( $primary_font, 'regular' );
        $secondary_font  = get_theme_mod( 'secondary_font_pinthis', 'Spectral' );
        $secondary_fonts = blossom_pin_pro_get_fonts( $secondary_font, 'regular' );
        $primary_color   = get_theme_mod( 'primary_color_pinthis', '#e7475e' );  
    }else{
        $primary_font    = get_theme_mod( 'primary_font', 'Nunito' );
        $primary_fonts   = blossom_pin_pro_get_fonts( $primary_font, 'regular' );
        $secondary_font  = get_theme_mod( 'secondary_font', 'Cormorant Garamond' );
        $secondary_fonts = blossom_pin_pro_get_fonts( $secondary_font, 'regular' );
        $primary_color   = get_theme_mod( 'primary_color', '#ff91a4' );  
    }
    
    $font_size       = get_theme_mod( 'font_size', 18 );
    
    $site_title_font      = get_theme_mod( 'site_title_font', array( 'font-family'=>'Cormorant Garamond', 'variant'=>'regular' ) );
    $site_title_fonts     = blossom_pin_pro_get_fonts( $site_title_font['font-family'], $site_title_font['variant'] );
    $site_title_font_size = get_theme_mod( 'site_title_font_size', 36 );
    
    $h1_font      = get_theme_mod( 'h1_font', array( 'font-family'=>'Nunito', 'variant'=>'700') );
    $h1_fonts     = blossom_pin_pro_get_fonts( $h1_font['font-family'], $h1_font['variant'] );
    $h1_font_size = get_theme_mod( 'h1_font_size', 49 );
    
    $h2_font      = get_theme_mod( 'h2_font', array('font-family'=>'Nunito', 'variant'=>'700') );
    $h2_fonts     = blossom_pin_pro_get_fonts( $h2_font['font-family'], $h2_font['variant'] );
    $h2_font_size = get_theme_mod( 'h2_font_size', 39 );
    
    $h3_font      = get_theme_mod( 'h3_font', array('font-family'=>'Nunito', 'variant'=>'700') );
    $h3_fonts     = blossom_pin_pro_get_fonts( $h3_font['font-family'], $h3_font['variant'] );
    $h3_font_size = get_theme_mod( 'h3_font_size', 31 );
    
    $h4_font      = get_theme_mod( 'h4_font', array('font-family'=>'Nunito', 'variant'=>'700') );
    $h4_fonts     = blossom_pin_pro_get_fonts( $h4_font['font-family'], $h4_font['variant'] );
    $h4_font_size = get_theme_mod( 'h4_font_size', 25 );
    
    $h5_font      = get_theme_mod( 'h5_font', array('font-family'=>'Nunito', 'variant'=>'700') );
    $h5_fonts     = blossom_pin_pro_get_fonts( $h5_font['font-family'], $h5_font['variant'] );
    $h5_font_size = get_theme_mod( 'h5_font_size', 20 );
    
    $h6_font      = get_theme_mod( 'h6_font', array('font-family'=>'Nunito', 'variant'=>'700') );
    $h6_fonts     = blossom_pin_pro_get_fonts( $h6_font['font-family'], $h6_font['variant'] );
    $h6_font_size = get_theme_mod( 'h6_font_size', 16 );
    
    $site_title_color = get_theme_mod( 'site_title_color', '#000000' );
    $btn_bg_color     = get_theme_mod( 'btn_bg_color', '#000000' );
    $body_bg          = get_theme_mod( 'body_bg', 'image' );
    $bg_pattern       = get_theme_mod( 'bg_pattern', 'nobg' );
    
    $rgb = blossom_pin_pro_hex2rgb( blossom_pin_pro_sanitize_hex_color( $primary_color ) );
    
    $image = '';
    
    if( $body_bg == 'pattern' && $bg_pattern != 'nobg' ){
        $image = get_template_directory_uri() . '/images/patterns/' . $bg_pattern . '.png';
    }
     
    echo "<style type='text/css' media='all'>"; ?>


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
    
    <?php 
    if( $body_bg == 'pattern' ){ ?>
        body.custom-background {
            background: url(<?php echo esc_url( $image ); ?>);
        }
        <?php 
    } 
    ?>
    
    .site-header .site-branding .site-title,
    .single-header .site-branding .site-title{
        font-family : <?php echo wp_kses_post( $site_title_fonts['font'] ); ?>;
        font-weight : <?php echo esc_html( $site_title_fonts['weight'] ); ?>;
        font-style  : <?php echo esc_html( $site_title_fonts['style'] ); ?>;
        font-size   : <?php echo esc_html( $site_title_font_size ); ?>px;
    }

    .mobile-header .mobile-site-header .site-branding .site-title{
        font-family : <?php echo wp_kses_post( $site_title_fonts['font'] ); ?>;
        font-weight : <?php echo esc_html( $site_title_fonts['weight'] ); ?>;
        font-style  : <?php echo esc_html( $site_title_fonts['style'] ); ?>;
    }

    .site-header .site-branding .site-title a{
        color: <?php echo blossom_pin_pro_sanitize_hex_color( $site_title_color ); ?>;
    }

    .newsletter-section .blossomthemes-email-newsletter-wrapper .text-holder h3,
    .newsletter-section .blossomthemes-email-newsletter-wrapper.bg-img .text-holder h3{
        font-family : <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
    }
    
    /*Color Scheme*/
    a,
    .main-navigation ul li a:hover,
    .main-navigation ul li a:focus,
    .main-navigation ul .current-menu-item > a,
    .main-navigation ul li:hover > a,
    .main-navigation ul li:focus > a,
    .banner-slider .item .text-holder .entry-title a:hover,
    .banner-slider .item .text-holder .entry-title a:focus,
    .blog #primary .post .entry-header .entry-title a:hover,
    .blog #primary .post .entry-header .entry-title a:focus,
    .widget_bttk_popular_post ul li .entry-header .entry-title a:hover,
    .widget_bttk_pro_recent_post ul li .entry-header .entry-title a:hover,
    .widget_bttk_popular_post ul li .entry-header .entry-title a:focus,
    .widget_bttk_pro_recent_post ul li .entry-header .entry-title a:focus,
    .widget_bttk_popular_post ul li .entry-header .entry-meta a:hover,
    .widget_bttk_pro_recent_post ul li .entry-header .entry-meta a:hover,
    .widget_bttk_popular_post ul li .entry-header .entry-meta a:focus,
    .widget_bttk_pro_recent_post ul li .entry-header .entry-meta a:focus,
    .widget_bttk_popular_post .style-two li .entry-header .cat-links a:hover,
    .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a:hover,
    .widget_bttk_popular_post .style-three li .entry-header .cat-links a:hover,
    .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a:hover,
    .widget_bttk_popular_post .style-two li .entry-header .cat-links a:focus,
    .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a:focus,
    .widget_bttk_popular_post .style-three li .entry-header .cat-links a:focus,
    .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a:focus,
    .widget_recent_entries ul li:before,
    .widget_recent_entries ul li a:hover,
    .widget_recent_entries ul li a:focus,
    .widget_recent_comments ul li:before,
    .widget_bttk_posts_category_slider_widget .carousel-title .title a:hover,
    .widget_bttk_posts_category_slider_widget .carousel-title .title a:focus,
    .widget_bttk_posts_category_slider_widget .carousel-title .cat-links a:hover,
    .widget_bttk_posts_category_slider_widget .carousel-title .cat-links a:focus,
    .site-footer .footer-b .footer-nav ul li a:hover,
    .site-footer .footer-b .footer-nav ul li a:focus,
    .single #primary .post .holder .meta-info .entry-meta a:hover,
    .single #primary .post .holder .meta-info .entry-meta a:focus,
    .recommended-post .post .entry-header .entry-title a:hover,
    .recommended-post .post .entry-header .entry-title a:focus,
    .search #primary .search-post .entry-header .entry-title a:hover,
    .archive #primary .post .entry-header .entry-title a:hover,
    .search #primary .search-post .entry-header .entry-title a:focus,
    .archive #primary .post .entry-header .entry-title a:focus,
    .instagram-section .profile-link:hover, .instagram-section .profile-link:focus,
    .site-header .site-branding .site-title a:hover,
    .site-header .site-branding .site-title a:focus,
    .mobile-header .mobile-site-header .site-branding .site-title a:hover,
    .mobile-header .mobile-site-header .site-branding .site-title a:focus,
    .single-blossom-portfolio .post-navigation .nav-previous a:hover,
    .single-blossom-portfolio .post-navigation .nav-previous a:focus,
    .single-blossom-portfolio .post-navigation .nav-next a:hover,
    .single-blossom-portfolio .post-navigation .nav-next a:focus,
    .single .navigation a:hover .post-title,
    .single .navigation a:focus .post-title,
    .site-header .social-networks ul li a:hover,
    .site-header .social-networks ul li a:focus,
    .header-layout-three .main-navigation ul li a:hover, .main-navigation ul li a:focus,
    .header-layout-three .main-navigation ul .current-menu-item > a,
    .header-layout-three .main-navigation ul li:hover > a,
    .header-layout-three .main-navigation ul li:focus > a,
    .header-layout-five .main-navigation ul li a:hover,
    .header-layout-five .main-navigation ul li a:focus,
    .header-layout-five .main-navigation ul li:hover > a,
    .header-layout-five .main-navigation ul li:focus > a,
    .header-layout-five .main-navigation ul .current-menu-item > a,
    .header-layout-five .main-navigation ul .current-menu-ancestor > a,
    .header-layout-five .main-navigation ul .current_page_item > a,
    .header-layout-five .main-navigation ul .current_page_ancestor > a,
    .banner-layout-two .text-holder .entry-title a:hover,
    .banner-layout-two .text-holder .entry-title a:focus,
    .banner-layout-three .text-holder .entry-title a:hover,
    .banner-layout-three .text-holder .entry-title a:focus,
    .banner-layout-four .text-holder .entry-title a:hover,
    .banner-layout-four .text-holder .entry-title a:focus,
    .banner-layout-five .text-holder .entry-title a:hover,
    .banner-layout-five .text-holder .entry-title a:focus,
    .banner-layout-six .text-holder .entry-title a:hover,
    .banner-layout-six .text-holder .entry-title a:focus,
    .banner-layout-seven .text-holder .entry-title a:hover,
    .banner-layout-seven .text-holder .entry-title a:focus,
    .banner-layout-eight .text-holder .entry-title a:hover,
    .banner-layout-eight .text-holder .entry-title a:focus,
    .newsletter-section .social-networks ul li a:hover,
    .newsletter-section .social-networks ul li a:focus,
    .comments-area .comment-body .text-holder .top .comment-metadata a:hover,
    .comments-area .comment-body .text-holder .top .comment-metadata a:focus,
    .single-header .social-networks ul li a:hover,
    .single-header .social-networks ul li a:focus,
    .blog #primary .post .entry-footer .edit-link a:hover,
    .blog #primary .post .entry-footer .edit-link a:focus,
    .edit-link a:hover,
    .edit-link a:focus,
    .single-header .site-title a:hover,
    .single-header .site-title a:focus,
    .widget_bttk_author_bio .author-bio-socicons .author-socicons li a:hover,
    .widget_bttk_author_bio .author-bio-socicons .author-socicons li a:focus,
    .widget_bttk_contact_social_links .social-networks li a:hover,
    .widget_bttk_contact_social_links .social-networks li a:focus,
    .widget_bttk_social_links ul li a:hover,
    .widget_bttk_social_links ul li a:focus,
    .widget_bttk_description_widget .social-profile li a:hover,
    .widget_bttk_description_widget .social-profile li a:focus,
    .blog #primary .post .bottom .posted-on a:hover,
    .blog #primary .post .bottom .posted-on a:focus,
    .recommended-post .post .bottom .posted-on a:hover,
    .recommended-post .post .bottom .posted-on a:focus, 
    .comments-area .comment-body .text-holder .reply a:hover, 
    .comments-area .comment-body .text-holder .reply a:focus, 
    .error-wrapper .error-holder h3, 
    .archive #primary .site-main .top .read-more:hover, 
    .archive #primary .site-main .top .read-more:focus, 
    .search #primary .site-main .top .read-more:hover, 
    .search #primary .site-main .top .read-more:focus, 
    .archive #primary .post .top .entry-footer .edit-link a:hover, 
    .archive #primary .post .top .entry-footer .edit-link a:focus, 
    .search #primary .post .top .entry-footer .edit-link a:hover, 
    .search #primary .post .top .entry-footer .edit-link a:focus, 
    .archive #primary .site-main .bottom .posted-on a:hover, 
    .archive #primary .site-main .bottom .posted-on a:focus, 
    .search #primary .site-main .bottom .posted-on a:hover, 
    .search #primary .site-main .bottom .posted-on a:focus{
        color: <?php echo blossom_pin_pro_sanitize_hex_color( $primary_color ); ?>;
    }

    .comments-area .comment-body .text-holder .reply a:hover svg, 
    .comments-area .comment-body .text-holder .reply a:focus svg {
        fill: <?php echo blossom_pin_pro_sanitize_hex_color( $primary_color ); ?>;
    }

    .blog #primary .post .entry-footer .edit-link a:hover,
    .blog #primary .post .entry-footer .edit-link a:focus,
    .edit-link a:hover,
    .edit-link a:focus, 
    .archive #primary .site-main .top .read-more:hover, 
    .archive #primary .site-main .top .read-more:focus, 
    .search #primary .site-main .top .read-more:hover, 
    .search #primary .site-main .top .read-more:focus, 
    .archive #primary .post .top .entry-footer .edit-link a:hover, 
    .archive #primary .post .top .entry-footer .edit-link a:focus, 
    .search #primary .post .top .entry-footer .edit-link a:hover, 
    .search #primary .post .top .entry-footer .edit-link a:focus{
        border-bottom-color: <?php echo blossom_pin_pro_sanitize_hex_color( $primary_color ); ?>;
    }

    .blog #primary .post .entry-header .category a,
    .widget .widget-title::after,
    .widget_bttk_custom_categories ul li a:hover .post-count,
    .widget_bttk_custom_categories ul li a:focus .post-count,
    .widget_blossomtheme_companion_cta_widget .text-holder .button-wrap .btn-cta,
    .widget_blossomtheme_featured_page_widget .text-holder .btn-readmore:hover,
    .widget_blossomtheme_featured_page_widget .text-holder .btn-readmore:focus,
    .widget_bttk_icon_text_widget .text-holder .btn-readmore:hover,
    .widget_bttk_icon_text_widget .text-holder .btn-readmore:focus,
    .widget_bttk_image_text_widget ul li .btn-readmore:hover,
    .widget_bttk_image_text_widget ul li .btn-readmore:focus,
    .newsletter-section,
    .single .post-entry-header .category a,
    .single #primary .post .holder .meta-info .entry-meta .byline:after,
    .recommended-post .post .entry-header .category a,
    .search #primary .search-post .entry-header .category a,
    .archive #primary .post .entry-header .category a,
    .banner-slider .item .text-holder .category a,
    .back-to-top,
    .banner-layout-two .text-holder .category a,
    .banner-slider .item,
    .banner-layout-two .item,
    .banner-layout-three .text-holder .category a,
    .banner-layout-three .item,
    .banner-layout-four .text-holder .category a,
    .banner-layout-four .holder,
    .banner-layout-five .text-holder .category a,
    .banner-layout-five .item,
    .banner-layout-six .text-holder .category a,
    .banner-layout-six .item,
    .banner-layout-seven .text-holder .category a,
    .banner-layout-seven .item,
    .banner-layout-eight .text-holder .category a,
    .banner-layout-eight .holder,
    .featured-section .col .img-holder,
    .featured-section .col .img-holder:hover .text-holder,
    .featured-section .col .img-holder:focus .text-holder,
    .widget_bttk_author_bio .readmore:hover,
    .widget_bttk_author_bio .readmore:focus,
    .single-header .progress-bar,
    #load-posts a:hover,
    #load-posts a:focus,
    .single-layout-four #primary .post .entry-post-header .post-thumbnail,
    .single-layout-five .entry-post-header,
    .single-layout-six .entry-post-header,
    .banner-slider .item .text-holder .category span,
    .banner-layout-two .text-holder .category span,
    .banner-layout-three .text-holder .category span,
    .banner-layout-four .text-holder .category span,
    .banner-layout-five .text-holder .category span,
    .banner-layout-six .text-holder .category span,
    .banner-layout-seven .text-holder .category span,
    .banner-layout-eight .text-holder .category span,
    .banner .banner-caption .banner-link:hover,
    .banner .banner-caption .banner-link:focus,
    .single #primary .post .entry-footer .tags a{
        background: <?php echo blossom_pin_pro_sanitize_hex_color( $primary_color ); ?>;
    }

    .blog #primary .post .entry-footer .read-more:hover,
    .blog #primary .post .entry-footer .read-more:focus{
        border-bottom-color: <?php echo blossom_pin_pro_sanitize_hex_color( $primary_color ); ?>;
        color: <?php echo blossom_pin_pro_sanitize_hex_color( $primary_color ); ?>;
    }

    button:hover,
    input[type="button"]:hover,
    input[type="reset"]:hover,
    input[type="submit"]:hover,
    button:focus,
    input[type="button"]:focus,
    input[type="reset"]:focus,
    input[type="submit"]:focus, 
    .error-wrapper .error-holder .btn-home a:hover, 
    .error-wrapper .error-holder .btn-home a:focus{
        background: <?php echo blossom_pin_pro_sanitize_hex_color( $primary_color ); ?>;
        border-color: <?php echo blossom_pin_pro_sanitize_hex_color( $primary_color ); ?>;
    }

    .blog #primary .format-quote .post-thumbnail .blockquote-holder,
    .archive .format-quote .post-thumbnail .blockquote-holder,
    .search .format-quote .post-thumbnail .blockquote-holder{
        background: <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.8)'; ?>;
    }

    .widget_recent_entries ul li::before, .widget_recent_comments ul li::before {
        color: <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.2)'; ?>;
    }

    /* Button Color scheme */

    .widget_bttk_author_bio .readmore,
    .widget_blossomtheme_featured_page_widget .text-holder .btn-readmore,
    .widget_bttk_icon_text_widget .text-holder .btn-readmore,
    .widget_bttk_image_text_widget ul li .btn-readmore{
        background: <?php echo blossom_pin_pro_sanitize_hex_color( $btn_bg_color ); ?>;
    }

    button,
    input[type="button"],
    input[type="reset"],
    input[type="submit"]{
        background: <?php echo blossom_pin_pro_sanitize_hex_color( $btn_bg_color ); ?>;
        border-color: <?php echo blossom_pin_pro_sanitize_hex_color( $btn_bg_color ); ?>;
    }

    /*Typography*/
    .banner-slider .item .text-holder .entry-title,
    .blog #primary .post .entry-header .entry-title,
    .widget_bttk_popular_post ul li .entry-header .entry-title,
    .widget_bttk_pro_recent_post ul li .entry-header .entry-title,
    .blossomthemes-email-newsletter-wrapper.bg-img .text-holder h3,
    .widget_recent_entries ul li a,
    .widget_bttk_posts_category_slider_widget .carousel-title .title,
    .widget_recent_comments ul li a,
    .single .post-entry-header .entry-title,
    .recommended-post .post .entry-header .entry-title,
    #primary .post .entry-content .pull-left,
    #primary .page .entry-content .pull-left,
    #primary .post .entry-content .pull-right,
    #primary .page .entry-content .pull-right,
    .single-header .title-holder .post-title,
    .search #primary .search-post .entry-header .entry-title,
    .archive #primary .post .entry-header .entry-title,
    .banner-layout-two .text-holder .entry-title,
    .banner-layout-three .text-holder .entry-title,
    .banner-layout-four .text-holder .entry-title,
    .banner-layout-five .text-holder .entry-title,
    .banner-layout-six .text-holder .entry-title,
    .banner-layout-seven .text-holder .entry-title,
    .banner-layout-eight .text-holder .entry-title,
    .blog #primary .format-quote .post-thumbnail .blockquote-holder,
    .blog.layout-four #primary .post .entry-header .entry-title,
    .blog.layout-four-right-sidebar #primary .post .entry-header .entry-title,
    .blog.layout-four-left-sidebar #primary .post .entry-header .entry-title,
    #primary .post .entry-content blockquote,
    #primary .page .entry-content blockquote,
    .single .navigation .post-title,
    .banner .banner-caption .banner-title,
    .archive .format-quote .post-thumbnail .blockquote-holder,
    .search .format-quote .post-thumbnail .blockquote-holder{
        font-family : <?php echo wp_kses_post( $secondary_fonts['font'] ); ?>;
    }

    #primary .post .entry-content blockquote cite,
    #primary .page .entry-content blockquote cite{
        font-family : <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
    }

    #primary .post .entry-content h1,
    #primary .page .entry-content h1{
        font-family: <?php echo wp_kses_post( $h1_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h1_font_size ); ?>px;
    }

    #primary .post .entry-content h2,
    #primary .page .entry-content h2{
        font-family: <?php echo wp_kses_post( $h2_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h2_font_size ); ?>px;
    }

    #primary .post .entry-content h3,
    #primary .page .entry-content h3{
        font-family: <?php echo wp_kses_post( $h3_fonts['font'] ); ?>;
        font-w
        font-size: <?php echo absint( $h3_font_size ); ?>px;
    }

    #primary .post .entry-content h4,
    #primary .page .entry-content h4{
        font-family: <?php echo wp_kses_post( $h4_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h4_font_size ); ?>px;
    }

    #primary .post .entry-content h5,
    #primary .page .entry-content h5{
        font-family: <?php echo wp_kses_post( $h5_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h5_font_size ); ?>px;
    }

    #primary .post .entry-content h6,
    #primary .page .entry-content h6{
        font-family: <?php echo wp_kses_post( $h6_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h6_font_size ); ?>px;
    }

    @media only screen and (max-width: 1024px){
        .mobile-menu .main-navigation ul li:hover svg,
        .mobile-menu .main-navigation ul li:focus svg,
        .mobile-menu .main-navigation ul ul li a:hover,
        .mobile-menu .main-navigation ul ul li a:focus,
        .mobile-menu .main-navigation ul ul li:hover > a,
        .mobile-menu .main-navigation ul ul li:focus > a,
        .mobile-menu .social-networks ul li a:hover,
        .mobile-menu .social-networks ul li a:focus{
            color: <?php echo blossom_pin_pro_sanitize_hex_color( $primary_color ); ?>;
        }
    }


    <?php if( is_woocommerce_activated() ) { ?>
           .woocommerce ul.products li.product .add_to_cart_button:hover,
            .woocommerce ul.products li.product .add_to_cart_button:focus,
            .woocommerce ul.products li.product .product_type_external:hover,
            .woocommerce ul.products li.product .product_type_external:focus,
            .woocommerce ul.products li.product .ajax_add_to_cart:hover,
            .woocommerce ul.products li.product .ajax_add_to_cart:focus,
            .woocommerce #secondary .widget_price_filter .ui-slider .ui-slider-range,
            .woocommerce #secondary .widget_price_filter .price_slider_amount .button:hover,
            .woocommerce #secondary .widget_price_filter .price_slider_amount .button:focus,
            .woocommerce div.product form.cart .single_add_to_cart_button:hover,
            .woocommerce div.product form.cart .single_add_to_cart_button:focus,
            .woocommerce div.product .cart .single_add_to_cart_button.alt:hover,
            .woocommerce div.product .cart .single_add_to_cart_button.alt:focus,
            .woocommerce .woocommerce-message .button:hover,
            .woocommerce .woocommerce-message .button:focus,
            .woocommerce #secondary .widget_shopping_cart .buttons .button:hover,
            .woocommerce #secondary .widget_shopping_cart .buttons .button:focus,
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
            .woocommerce-page #payment #place_order:focus, 
            .woocommerce ul.products li.product .added_to_cart:hover,
            .woocommerce ul.products li.product .added_to_cart:focus, 
            .woocommerce ul.products li.product .add_to_cart_button:hover,
            .woocommerce ul.products li.product .add_to_cart_button:focus,
            .woocommerce ul.products li.product .product_type_external:hover,
            .woocommerce ul.products li.product .product_type_external:focus,
            .woocommerce ul.products li.product .ajax_add_to_cart:hover,
            .woocommerce ul.products li.product .ajax_add_to_cart:focus, 
            .woocommerce div.product .entry-summary .variations_form .single_variation_wrap .button:hover,
            .woocommerce div.product .entry-summary .variations_form .single_variation_wrap .button:focus, 
            .woocommerce div.product form.cart .single_add_to_cart_button:hover,
            .woocommerce div.product form.cart .single_add_to_cart_button:focus,
            .woocommerce div.product .cart .single_add_to_cart_button.alt:hover,
            .woocommerce div.product .cart .single_add_to_cart_button.alt:focus, 
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
            .woocommerce-page #payment #place_order:focus, 
            .woocommerce #secondary .widget_shopping_cart .buttons .button:hover,
            .woocommerce #secondary .widget_shopping_cart .buttons .button:focus, 
            .woocommerce #secondary .widget_price_filter .price_slider_amount .button:hover,
            .woocommerce #secondary .widget_price_filter .price_slider_amount .button:focus{
                background: <?php echo blossom_pin_pro_sanitize_hex_color( $primary_color ); ?>;
            }

            .woocommerce #secondary .widget .product_list_widget li .product-title:hover,
            .woocommerce #secondary .widget .product_list_widget li .product-title:focus,
            .woocommerce div.product .entry-summary .product_meta .posted_in a:hover,
            .woocommerce div.product .entry-summary .product_meta .posted_in a:focus,
            .woocommerce div.product .entry-summary .product_meta .tagged_as a:hover,
            .woocommerce div.product .entry-summary .product_meta .tagged_as a:focus, 
            .woocommerce-cart #primary .page .entry-content table.shop_table td.product-name a:hover, .woocommerce-cart #primary .page .entry-content table.shop_table td.product-name a:focus{
                color: <?php echo blossom_pin_pro_sanitize_hex_color( $primary_color ); ?>;
            }
    <?php } ?>

    <?php if( $child_theme_support == 'blossom_pinthis' ) : ?>

        *, *:before, *:after {
            box-sizing: border-box;
        }
        body {
            color: #333333;
        }
        .site,
        .single .site-content,
        .page .site-content,
        .comment-section {
            background-color: #fff;
        }

        /* Header Three */
        .header-layout-three .header-b {
            padding: 50px 0;
            border-bottom: 1px solid #EBEBEB;
        }

        /* Header Five */
        .header-layout-five .site-branding {
            margin-top: 0;
        }

        /* Header */
        .header-layout-four {
            background-color: #fff;
            border-bottom: 1px solid #EBEBEB;
        }
        .single-post .header-layout-three,
        .single-post .header-layout-four,
        .single-blossom-portfolio .header-layout-three,
        .single-blossom-portfolio .header-layout-four {
            background: #fff;
        }
        .header-layout-four .header-t {
            padding: 50px 0;
        }
        .header-layout-four .header-b {
            border-top: 1px solid #EBEBEB;
            padding: 15px 0;
        }
        .ed-sticky-header .site-branding .custom-logo-link img {
            max-height: 50px;
            width: auto;
        }

        /* Single Header */
        .single-header.show .custom-logo-link img {
            width: auto;
            max-height: 50px;
        }

        /* Main Navigation */
        .main-navigation ul {
            font-size: 0.875rem;
            letter-spacing: 0.15em;
        }
        .main-navigation ul ul {
            padding-top: 0;
            letter-spacing: normal;
            text-transform: none;
        }
        .main-navigation ul ul .menu-item-has-children>a:after {
            right: 10px;
        }

        /* Banner Section */
        .banner-layout-six {
            padding-top: 48px;
        }
        [class*=banner-layout-] .text-holder .category {
            line-height: 1;
            margin-bottom: 0;
        }

        [class*=banner-layout-] .text-holder .category a,
        [class*=banner-layout-] .text-holder .category span {
            margin: 0 3px 3px 0;
            padding: 6px 8px;
            font-size: 0.625rem;
            line-height: 1;
        }
        [class*=banner-layout-] .text-holder .entry-title {
            line-height: 1.25;
        }


        /* Featured Section */
        .featured-section .col .img-holder {
            background-color: #fff;
            padding: 10px;
            transition: all 0.3s ease-in-out;
        }
        .featured-section .col .img-holder:hover {
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.05), 0 4px 4px rgba(0, 0, 0, 0.05), 0 8px 8px rgba(0, 0, 0, 0.05), 0 16px 16px rgba(0, 0, 0, 0.05), 0 32px 32px rgba(0, 0, 0, 0.05), 0 64px 64px rgba(0, 0, 0, 0.05);
            transform: translateY(-3px);
        }
        .featured-section .col .text-holder {
            padding: 0 16px;
            height: 50px;
            font-size: 0.75rem;
            line-height: 50px;
            color: #000;
            transition: all 0.3s ease-in-out;
        }


        /* Site Structure */
        .blog.layout-three-right-sidebar #primary {
            padding-right: 64px;
            width: calc(100% - 330px);
        }
        .blog.layout-three-right-sidebar #secondary {
            padding: 0;
            width: 330px;
        }

        .blog.layout-three-right-sidebar #secondary a {
            /* color: #000; */
        }
        .blog.layout-three-right-sidebar #secondary a:hover {
            color: <?php echo blossom_pin_pro_sanitize_hex_color( $primary_color ); ?>;
        }

        /* Main Content */

        /* Blog Post */
        .blog #primary .post {
            margin-bottom: 64px;
        }
        .blog #primary .post .holder {
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
        }
        .blog #primary .post .top {
            padding: 16px 16px 24px 16px;
        }
        .blog #primary .post .post-thumbnail {
            margin-bottom: 0;
        }
        .blog #primary .post .entry-header {
            margin-top: 1.5rem;
        }
        .blog #primary .post .entry-header:first-child {
            margin-top: 0;
        }
        .blog #primary .post .entry-header .category {
            margin-bottom: 0.5rem;
        }
        .blog #primary .post .entry-header .category a {
            margin: 0 3px 3px 0;
            padding: 6px 8px;
            font-size: 0.625rem;
            line-height: 1;
        }
        .blog #primary .post .entry-header .entry-title {
            margin-bottom: 0.5rem;
            font-size: 2.25rem;
        }
        .blog #primary .post .entry-content {
            margin-bottom: 1.125rem;
            font-size: 1.125rem;
        }
        .blog #primary .post .entry-content p:last-child {
            margin-bottom: 0;
        }
        .blog #primary .post .entry-footer .read-more {
            font-size: 0.875rem;
        }
        .blog #primary .post .bottom .posted-on {
            font-size: 0.625rem;
        }


        /* Newsletter / Social Icon Section */
        .newsletter-section .blossomthemes-email-newsletter-wrapper .text-holder h3,
        .newsletter-section .blossomthemes-email-newsletter-wrapper.bg-img .text-holder h3,
        .newsletter-section .social-networks .title {
            margin-bottom: 0.75rem;
        }


        /* Widgets */
        .widget ul li {
            margin-bottom: 1rem;
        }
        .widget_recent_entries ul li,
        .widget_recent_comments ul li {
            margin-bottom: 1.25rem;
        }
        .widget_recent_entries ul li:before,
        .widget_recent_comments ul li:before {
            font-family: "spectral";
            color: rgba(351, 69, 91, 0.2);
        }
        .widget_bttk_popular_post ul li .entry-header .entry-meta,
        .widget_bttk_pro_recent_post ul li .entry-header .entry-meta,
        .widget_bttk_popular_post .style-two li .entry-header .cat-links,
        .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links,
        .widget_bttk_popular_post .style-three li .entry-header .cat-links,
        .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links {
            font-size: 0.625rem;
            color: #B1B1B2;
        }
        .widget_bttk_popular_post ul li .entry-header .entry-title a,
        .widget_bttk_pro_recent_post ul li .entry-header .entry-title a,
        .widget.widget_recent_comments li a,
        .widget.widget_meta a,
        .widget.widget_categories li a,
        .widget.widget_archive li a {
            color: #000;
            transition: all 0.3s ease-in-out;
        }

        /* About Author Widget */
        .widget_bttk_author_bio .text-holder .author-bio-content {
            font-size: 1rem;
        }
        #secondary .widget_bttk_author_bio .text-holder a.readmore:hover {
            color: #fff;
        }

        /* Newsletter Widget */
        .blossomthemes-email-newsletter-wrapper,
        .blossomthemes-email-newsletter-wrapper.bg-img:after {
            border-radius: 8px;
        }
        .blossomthemes-email-newsletter-wrapper.bg-img .text-holder span {
            font-size: 1rem;
        }
        .blossomthemes-email-newsletter-wrapper.bg-img .text-holder {
            margin-bottom: 1rem;
        }
        .blossomthemes-email-newsletter-wrapper form input[type="submit"]:hover {
            background-color: #000;
            border-color: transparent;
            color: #fff;
        }

        /* Blossom Categories */
        .widget_bttk_custom_categories ul li a {
            height: 48px;
            line-height: 48px;
        }
        .widget_bttk_custom_categories ul li .cat-title {
            font-size: 0.875rem;
            margin: 0 0 0 16px;
            line-height: 48px;
        }

        /* Single Post */
        .single .post-entry-header .category a {
            margin: 0 3px 3px 0;
            padding: 6px 8px;
            font-size: 0.625rem;
            line-height: 1;
        }

        /* Single Post Promotional Section */
        .single-promotional-section img {
            display: block;
            margin: 0 auto;
        }

        /* Single Post Navigation */
        .single .navigation .post-title {
            font-size: 1rem;
        }

        /* Recommended Articles */
        .recommended-post .post-wrapper {
            display: flex;
            flex-wrap: wrap
        }
        .recommended-post .post {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
        }
        .recommended-post .post .holder {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .recommended-post .post .top {
            flex-grow: 1;
            padding: 16px 16px 24px 16px;
        }
        .recommended-post .post .single_post_image {
            margin-bottom: 0.75rem;
        }
        .recommended-post .post .single_post_image img {
            display: block;
        }
        .recommended-post .post .entry-header .category {
            margin-bottom: 0.5rem;
        }
        .recommended-post .post .entry-header .category a {
            margin: 0 3px 3px 0;
            padding: 6px 8px;
            font-size: 0.625rem;
            line-height: 1;
        }
        .recommended-post .post .entry-header .entry-title {
            margin-bottom: 0;
        }

        /* Instagram Section */
        .instagram-section {
            border-top: 1px solid #EBEBEB;  
        }

        /* Portfolio Page */
        .portfolio-item img,
        .portfolio-item .portfolio-text-holder {
            border-radius: 12px;
        }
        .portfolio-item .portfolio-cat a {
            background: #e7475e;
            margin: 0 3px 8px 0;
            border-radius: 3px;
            padding: 6px 8px;
            font-size: 0.625rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            line-height: 1;
        }
        .portfolio-item .portfolio-cat a:last-child {
            padding-right: 8px;
        }
        .related-portfolio {
            margin-bottom: 80px;
        }

        .site-footer .footer-t .widget:last-child {
            margin-bottom: 0;
        }

        .comments-area {
            margin-bottom: 0;
        }

        .comment-form p:last-child { 
            margin-bottom: 0;
        }

        .comment-respond {
            margin-top: 0;
        }

        @media only screen and (min-width: 1025px) {
            .header-layout-four .main-navigation ul ul {
                background: #fff;
            }
        }

        @media screen and (max-width: 1024px) {
            .blog.layout-three-right-sidebar #primary {
                width: 100%;
                padding-right: 0;
            }
            .blog.layout-three-right-sidebar #secondary {
                width: 100%;
            }
        }

        @media screen and (max-width: 767px) {
            .blog #primary .post .entry-header .entry-title {
                font-size: 1.25rem;
            }
        }

    <?php endif; ?>
           
    <?php echo "</style>";
}
add_action( 'wp_head', 'blossom_pin_pro_dynamic_css', 99 );

/**
 * Function for sanitizing Hex color 
 */
function blossom_pin_pro_sanitize_hex_color( $color ){
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
function blossom_pin_pro_hex2rgb($hex) {
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
