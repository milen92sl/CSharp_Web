<?php
/**
 * Blossom Spa Pro Dynamic Styles
 * 
 * @package Blossom_Spa_Pro
*/

function blossom_spa_pro_dynamic_css(){
    
    $primary_font    = get_theme_mod( 'primary_font', 'Nunito Sans' );
    $primary_fonts   = blossom_spa_pro_get_fonts( $primary_font, 'regular' );
    $secondary_font  = get_theme_mod( 'secondary_font', 'Marcellus' );
    $secondary_fonts = blossom_spa_pro_get_fonts( $secondary_font, 'regular' );
    $font_size       = get_theme_mod( 'font_size', 18 );
    
    $site_title_font      = get_theme_mod( 'site_title_font', array( 'font-family'=>'Marcellus', 'variant'=>'regular' ) );
    $site_title_fonts     = blossom_spa_pro_get_fonts( $site_title_font['font-family'], $site_title_font['variant'] );
    $site_title_font_size = get_theme_mod( 'site_title_font_size', 30 );
    
    $h1_font      = get_theme_mod( 'h1_font', array( 'font-family'=>'Nunito Sans', 'variant'=>'700') );
    $h1_fonts     = blossom_spa_pro_get_fonts( $h1_font['font-family'], $h1_font['variant'] );
    $h1_font_size = get_theme_mod( 'h1_font_size', 49 );
    
    $h2_font      = get_theme_mod( 'h2_font', array('font-family'=>'Nunito Sans', 'variant'=>'700') );
    $h2_fonts     = blossom_spa_pro_get_fonts( $h2_font['font-family'], $h2_font['variant'] );
    $h2_font_size = get_theme_mod( 'h2_font_size', 39 );
    
    $h3_font      = get_theme_mod( 'h3_font', array('font-family'=>'Nunito Sans', 'variant'=>'700') );
    $h3_fonts     = blossom_spa_pro_get_fonts( $h3_font['font-family'], $h3_font['variant'] );
    $h3_font_size = get_theme_mod( 'h3_font_size', 31 );
    
    $h4_font      = get_theme_mod( 'h4_font', array('font-family'=>'Nunito Sans', 'variant'=>'700') );
    $h4_fonts     = blossom_spa_pro_get_fonts( $h4_font['font-family'], $h4_font['variant'] );
    $h4_font_size = get_theme_mod( 'h4_font_size', 25 );
    
    $h5_font      = get_theme_mod( 'h5_font', array('font-family'=>'Nunito Sans', 'variant'=>'700') );
    $h5_fonts     = blossom_spa_pro_get_fonts( $h5_font['font-family'], $h5_font['variant'] );
    $h5_font_size = get_theme_mod( 'h5_font_size', 20 );
    
    $h6_font      = get_theme_mod( 'h6_font', array('font-family'=>'Nunito Sans', 'variant'=>'700') );
    $h6_fonts     = blossom_spa_pro_get_fonts( $h6_font['font-family'], $h6_font['variant'] );
    $h6_font_size = get_theme_mod( 'h6_font_size', 16 );
    
    $primary_color    = get_theme_mod( 'primary_color', '#9cbe9c' );
    $site_title_color = get_theme_mod( 'site_title_color', '#111111' );
    $body_bg          = get_theme_mod( 'body_bg', 'image' );
    $bg_pattern       = get_theme_mod( 'bg_pattern', 'nobg' );
    
    $rgb = blossom_spa_pro_hex2rgb( blossom_spa_pro_sanitize_hex_color( $primary_color ) );
    
    $image = '';
    
    
     
    echo "<style type='text/css' media='all'>"; ?>
    
    <?php
    if( $body_bg == 'pattern' && $bg_pattern != 'nobg' ){
        $image = get_template_directory_uri() . '/images/patterns/' . $bg_pattern . '.png';
        echo 'body{ background: url(' . esc_url( $image ) . '); }';
    }
    ?> 
    
    .content-newsletter .blossomthemes-email-newsletter-wrapper.bg-img:after,
    .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper:after{
        <?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.8);'; ?>
    }
    
    /*Typography*/

    body{
        font-family : <?php echo esc_html( $primary_fonts['font'] ); ?>;
        font-size   : <?php echo absint( $font_size ); ?>px;        
    }
    
    .site-branding .site-title{
        font-size   : <?php echo absint( $site_title_font_size ); ?>px;
        font-family : <?php echo esc_html( $site_title_fonts['font'] ); ?>;
        font-weight : <?php echo esc_html( $site_title_fonts['weight'] ); ?>;
        font-style  : <?php echo esc_html( $site_title_fonts['style'] ); ?>;
    }
    
    .site-title a{
		color: <?php echo blossom_spa_pro_sanitize_hex_color( $site_title_color ); ?>;
	}

	/*Fonts*/
	button,
    input,
    select,
    optgroup,
    textarea, 
	.post-navigation a .meta-nav, section.faq-text-section .widget_text .widget-title, 
	.search .page-header .page-title {
		font-family : <?php echo esc_html( $primary_fonts['font'] ); ?>;
	}

	#primary .post .entry-content h1,
    #primary .page .entry-content h1{
        font-family: <?php echo esc_html( $h1_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h1_font_size ); ?>px;        
    }
    
    #primary .post .entry-content h2,
    #primary .page .entry-content h2{
        font-family: <?php echo esc_html( $h2_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h2_font_size ); ?>px;
    }
    
    #primary .post .entry-content h3,
    #primary .page .entry-content h3{
        font-family: <?php echo esc_html( $h3_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h3_font_size ); ?>px;
    }
    
    #primary .post .entry-content h4,
    #primary .page .entry-content h4{
        font-family: <?php echo esc_html( $h4_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h4_font_size ); ?>px;
    }
    
    #primary .post .entry-content h5,
    #primary .page .entry-content h5{
        font-family: <?php echo esc_html( $h5_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h5_font_size ); ?>px;
    }
    
    #primary .post .entry-content h6,
    #primary .page .entry-content h6{
        font-family: <?php echo esc_html( $h6_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h6_font_size ); ?>px;
    }

	.section-title, section[class*="-section"] .widget_text .widget-title, 
	.page-header .page-title, .widget .widget-title, .comments-area .comments-title, 
	.comment-respond .comment-reply-title, .post-navigation .nav-previous a, .post-navigation .nav-next a, .site-banner .banner-caption .title, 
	.about-section .widget_blossomtheme_featured_page_widget .widget-title, .shop-popular .item h3, 
	.pricing-tbl-header .title, .recent-post-section .grid article .content-wrap .entry-title, 
	.gallery-img .text-holder .gal-title, .wc-product-section .wc-product-slider .item h3, 
	.contact-details-wrap .widget .widget-title, section.contact-section .contact-details-wrap .widget .widget-title, 
	.instagram-section .profile-link, .widget_recent_entries ul li, .widget_recent_entries ul li::before, 
	.widget_bttk_description_widget .name, .widget_bttk_icon_text_widget .widget-title, 
	.widget_blossomtheme_companion_cta_widget .blossomtheme-cta-container .widget-title, 
	.site-main article .content-wrap .entry-title, .search .site-content .search-form .search-field, 
	.additional-post .post-title, .additional-post article .entry-title, .author-section .author-content-wrap .author-name, 
	.widget_bttk_author_bio .title-holder, .widget_bttk_popular_post ul li .entry-header .entry-title, 
	.widget_bttk_pro_recent_post ul li .entry-header .entry-title, 
	.widget_bttk_posts_category_slider_widget .carousel-title .title, 
	.widget_blossomthemes_email_newsletter_widget .text-holder h3, 
	.portfolio-text-holder .portfolio-img-title, .portfolio-holder .entry-header .entry-title {
		font-family : <?php echo esc_html( $secondary_fonts['font'] ); ?>;
	}
    
    /*Color Scheme*/
    button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"], 
	a.btn-readmore, a.btn-cta, 
	a.btn, a.btn.btn-transparent:hover, 
	.cat-tags a:hover, 
	.navigation.pagination .page-numbers:not(.dots):hover, .navigation.pagination .page-numbers.current:not(.dots), 
	.posts-navigation .nav-links a:hover, #load-posts a.loading, #load-posts a:hover, 
	#load-posts a.disabled, .back-to-top:hover, .nav-wrap, 
	.main-navigation ul ul li:hover > a, 
	.main-navigation ul ul li.current-menu-item > a, 
	.main-navigation ul ul li.current_page_items a, .search-form-wrap, 
	.header-two .main-navigation ul li a:after, .header-three .header-t, 
	.header-three .main-navigation ul li a:after, 
	.header-four .main-navigation ul li:hover > a:after, 
	.header-four .main-navigation ul li.current-menu-item > a:after, 
	.header-four .main-navigation ul li.current_page_items a:after, 
	.header-six .header-t, .header-seven .header-t, 
	.header-six .header-main .main-navigation ul ul li:hover > a, 
	.header-six .header-main .main-navigation ul ul li.current-menu-item > a, 
	.header-six .header-main .main-navigation ul ul li.current_page_item > a, 
	.header-seven .main-navigation ul li a:after, 
	header.site-header.header-eight, 
	.header-eight .nav-wrap .main-navigation ul ul li:hover > a, 
	.header-eight .nav-wrap .main-navigation ul ul li.current-menu-item > a, 
	.header-eight .nav-wrap .main-navigation ul ul li.current_page_item > a, 
	.sticky-header, .service-section.style-1 .widget_bttk_icon_text_widget .rtc-itw-inner-holder a.btn-readmore:hover, 
	.recent-post-section .grid article a.btn-readmore:hover, 
	.page-template-service .site-main .widget_bttk_icon_text_widget a.btn-readmore:hover, 
	.shop-popular .product-image a.btn-readmore:hover, 
	.service-section.style-3 .widget_bttk_icon_text_widget:hover .icon-holder, 
	.special-pricing-section .tab-btn-wrap .tab-btn:hover, 
	.special-pricing-section .tab-btn-wrap .tab-btn.active, 
	.featured .pricing-tbl-header, span.category a:hover, .wc-product-section .wc-product-slider .item .onsale, 
	ul.social-networks li a:hover, .footer-social ul.social-list li a:hover, 
	.widget_calendar table caption, .widget_bttk_description_widget .bttk-team-holder-modal, 
	.site-main article .content-wrap a.btn-readmore:hover, .error404 .error-404 .bttn, 
	.author-section .author-social ul li a:hover span, 
	.single .content-area .favourite a:hover, .single .content-area .article-share ul li a:hover, 
	.widget_bttk_author_bio .readmore, .widget_bttk_author_bio ul li a:hover, 
	.widget_bttk_custom_categories ul li a:hover .post-count, 
	.widget_bttk_image_text_widget ul li .btn-readmore:hover, 
	.widget_bttk_posts_category_slider_widget .carousel-title .cat-links a:hover, 
	.widget_bttk_posts_category_slider_widget .owl-theme .owl-dots .owl-dot span:hover, 
	.widget_bttk_posts_category_slider_widget .owl-theme .owl-dots .owl-dot.active span, 
	.widget_bttk_posts_category_slider_widget .owl-theme .owl-nav [class*="owl-"], .header-sticky .header-three .nav-wrap, 
	.header-sticky .header-five .nav-wrap, .header-sticky .header-eight .nav-wrap, .responsive-nav, 
	.owl-carousel .owl-dots .owl-dot.active span, 
	.widget_bttk_posts_category_slider_widget .owl-theme .owl-nav [class*="owl-"]:hover, 
	.edit-link a, .portfolio-sorting .button.is-checked, .portfolio-sorting .button:hover, 
	.widget .tagcloud a, .owl-carousel .owl-dots .owl-dot:hover span {
		background: <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	.comment-respond .comment-form p.comment-form-cookies-consent input[type="checkbox"]:checked + label::before, 
	.service-section.style-1 .widget_bttk_icon_text_widget .rtc-itw-inner-holder a.btn-readmore::before, 
	.recent-post-section .grid article a.btn-readmore::before, 
	.page-template-service .site-main .widget_bttk_icon_text_widget a.btn-readmore:before, 
	.shop-popular .product-image a.btn-readmore:before, 
	.wc-product-section .wc-product-slider .item .btn-add-to-cart:hover, 
	.widget_search .search-form .search-submit:hover, 
	.site-main article .content-wrap a.btn-readmore::before, 
	.error404 .error-404 .search-form .search-submit:hover {
		background-color: <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	a, a:hover, button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover, 
	a.btn-readmore:hover, .btn-cta:hover, 
	a.btn:hover, a.btn.btn-transparent, 
	.sub-title, .entry-meta > span a:hover, 
	.cat-tags h5, .widget ul li a:hover, 
	.comment-author a:hover, 
	.comment-metadata a:hover, 
	.comment-body .reply .comment-reply-link:hover, 
	.comment-respond .comment-reply-title a:hover, 
	.post-navigation a:hover > .post-title, .header-two .header-social .social-list li a:hover, 
	.header-four .header-social .social-list li a:hover, 
	.header-five .header-social .social-list li a:hover, .header-eight .header-t .social-list li a:hover, 
	.site-banner .banner-caption .title a:hover, .site-banner .banner-caption .btn-wrap a.btn.btn-transparent:hover, 
	.shop-popular .item h3 a:hover, .shop-popular .item .price, 
	.tab-content-wrap .tabs-product .item h3 a:hover, .tab-content-wrap .tabs-product .item p.price, 
	.recent-post-section .grid article .content-wrap .entry-title a:hover, 
	.wc-product-section .wc-product-slider .item .price, 
	.contact-details-wrap .widget .widget-title, 
	section.contact-section .contact-details-wrap .widget .widget-title, 
	.contact-info ul.contact-list li a:hover, .contact-details-wrap table tr td:nth-child(2n), 
	.footer-b .copyright a:hover, .site-footer .widget ul li a:hover, .widget_pages ul li.current_page_item > a, 
	.widget_pages ul li.current-menu-item > a, .widget_recent_entries ul li::before, .widget_recent_entries ul li a:hover, 
	.widget_calendar table th, .widget_calendar table tr td a, .widget_bttk_icon_text_widget .icon-holder, 
	.author-like-wrap > span a:hover, .author-like-wrap .bsp_ajax_like a:hover, .entry-title a:hover, 
	.error404 .error-404 .error-num, .error404 .error-404 .bttn:hover, 
	.single .page-header .entry-meta > span a:hover, 
	.single.style2 .content-area .article-meta .byline .author a:hover, 
	.single.style2 .content-area .article-meta > span.posted-on a:hover, 
	.single.style2 .content-area .article-meta span.comment-box a:hover, 
	.widget_bttk_author_bio .readmore:hover, 
	.widget_bttk_popular_post ul li .entry-header .entry-title a:hover, 
	.widget_bttk_pro_recent_post ul li .entry-header .entry-title a:hover, 
	.widget_bttk_popular_post ul li .entry-header .entry-meta a:hover, 
	.widget_bttk_pro_recent_post ul li .entry-header .entry-meta a:hover, 
	.widget_bttk_posts_category_slider_widget .carousel-title .title a:hover, 
	.widget_bttk_description_widget .social-profile li a, 
	.widget_blossomtheme_companion_cta_widget .text a.btn-cta, 
	.edit-link a:hover, .portfolio-item a:hover, .entry-header .portfolio-cat a:hover, 
	.widget .tagcloud a:hover {
		color: <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	.header-two .header-contact .contact-block svg path.phb, 
	.header-two .header-contact .contact-block svg path.emb, 
	.header-two .header-contact .contact-block svg path.clkb, 
	.header-three .header-search:hover > svg path.sea, 
	.header-four .header-search:hover > svg path.sea, 
	.featured .pricing-tbl-img span.upper-overlay path.upb {
		fill: <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"], 
	a.btn-readmore, a.btn-cta, 
	a.btn, 
	.comment-respond .comment-form p.comment-form-cookies-consent input[type="checkbox"]:checked + label::before, 
	.navigation.pagination .page-numbers:not(.dots):hover, .navigation.pagination .page-numbers.current:not(.dots), 
	.posts-navigation .nav-links a:hover, #load-posts a.loading, #load-posts a:hover, #load-posts a.disabled, 
	.site-banner .owl-carousel .owl-dots .owl-dot.active span, 
	.site-banner .owl-carousel .owl-dots .owl-dot:hover span, 
	.service-section.style-1 .widget_bttk_icon_text_widget .rtc-itw-inner-holder a.btn-readmore:hover, 
	.recent-post-section .grid article a.btn-readmore:hover, 
	.page-template-service .site-main .widget_bttk_icon_text_widget a.btn-readmore:hover, 
	.shop-popular .product-image a.btn-readmore:hover, 
	.service-section.style-3 .widget_bttk_icon_text_widget:hover .icon-holder, 
	.owl-carousel .owl-dots .owl-dot span, .contact-details-wrap, ul.social-networks li a:hover, 
	.widget_bttk_testimonial_widget .bttk-testimonial-inner-holder::before, 
	#secondary .widget_bttk_icon_text_widget .icon-holder, 
	.site-footer .widget_bttk_icon_text_widget .icon-holder, 
	.site-main article .content-wrap a.btn-readmore:hover, .error404 .error-404 .bttn, 
	.author-section .author-social ul li a:hover span, 
	.single .content-area .favourite a:hover, 
	.single .content-area .article-share ul li a:hover, 
	.widget_bttk_author_bio .readmore, .widget_bttk_author_bio ul li a:hover, 
	.edit-link a, .widget .tagcloud a {
		border-color: <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>;
	}

    q, .pricing-tbl-tag:before {
	    border-left-color: <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	.header-eight .nav-wrap .main-navigation ul li:hover > a, 
	.header-eight .nav-wrap .main-navigation ul li.current-menu-item > a, 
	.header-eight .nav-wrap .main-navigation ul li.current_page_item > a {
		border-bottom-color: <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	.coming-soon-template .blossomthemes-email-newsletter-wrapper form label input[type="checkbox"]:checked + span.check-mark {
		background-color: <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?> !important;
		border-color: <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?> !important;
	}

	.owl-carousel .owl-nav [class*="owl-"], 
	.owl-carousel .owl-nav [class*="owl-"].disabled {
		background: <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
	}

	.owl-carousel .owl-nav [class*="owl-"]:hover {
	    background: <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5);'; ?>
	}

	<!-- .nav-wrap .header-search:hover, 
	.header-eight .nav-wrap .main-navigation .toggle-btn:hover {
		background: <?php //echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.15);'; ?>
	} -->

	.flashy-overlay .flashy-close, 
	.flashy-overlay .flashy-prev, 
	.flashy-overlay .flashy-next {
		background-color: <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5);'; ?>
	}

	.flashy-overlay .flashy-prev:hover, .flashy-overlay .flashy-next:hover, .flashy-overlay .flashy-close:hover {
	    background-color: <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.75);'; ?>
	}

	section.service-section.style-1, .service-price-section, section.team-section, .gallery-section, 
	.wc-product-section, section.service-section.style-2 {
		background: <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.05);'; ?>
	}

	.service-section.style-2 .widget_bttk_icon_text_widget {
		border-right-color: <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.2);'; ?>
		border-bottom-color: <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.2);'; ?>
	}

	.service-section.style-2 .widget_bttk_icon_text_widget .icon-holder, 
	.back-to-top, blockquote::before, 
	.single .content-area .favourite a, .single .content-area .favourite .liked-icon {
		border-color: <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5);'; ?>
	}

	.service-section.style-3 .widget_bttk_icon_text_widget .icon-holder::before {
		border-color: <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.15);'; ?>
	}

	.service-section.style-1 .widget_bttk_icon_text_widget:hover, .recent-post-section .grid article:hover, 
	.site-main article:hover .content-wrap, 
	.page-template-service .site-main .widget_bttk_icon_text_widget:hover .rtc-itw-inner-holder .text-holder {
		border-bottom-color: <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5);'; ?>
	}

	.widget .widget-title::after {
		background: -webkit-linear-gradient(to right, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent 50%);
		background: -moz-linear-gradient(to right, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent 50%);
		background: -ms-linear-gradient(to right, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent 50%);
		background: -o-linear-gradient(to right, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent 50%);
		background: linear-gradient(to right, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent 50%);
	}

	.additional-post .post-title span::after, 
	.comments-area .comments-title span:after, 
	.comment-respond .comment-reply-title span::after, 
	.author-section .author-content-wrap .author-name span::after {
		background: -webkit-linear-gradient(to right, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent);
		background: -moz-linear-gradient(to right, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent);
		background: -ms-linear-gradient(to right, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent);
		background: -o-linear-gradient(to right, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent);
		background: linear-gradient(to right, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent);
	}

	.contact-details-wrap .widget .widget-title:after, 
	section.contact-section .contact-details-wrap .widget .widget-title:after {
		background: -webkit-linear-gradient(to right, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent);
		background: -moz-linear-gradient(to right, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent);
		background: -ms-linear-gradient(to right, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent);
		background: -o-linear-gradient(to right, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent);
		background: linear-gradient(to right, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent);
	}

	.form-block .section-title:after {
		background: -webkit-linear-gradient(to right, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent 50%);
		background: -moz-linear-gradient(to right, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent 50%);
		background: -ms-linear-gradient(to right, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent 50%);
		background: -o-linear-gradient(to right, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent 50%);
		background: linear-gradient(to right, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent 50%);
	}

	a.btn-readmore:hover:before, .btn-cta:hover:before, 
	a.btn-readmore:hover:after, .btn-cta:hover:after {
		background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="<?php echo blossom_spa_pro_hash_to_percent23( blossom_spa_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M187.8 264.5L41 412.5c-4.7 4.7-12.3 4.7-17 0L4.2 392.7c-4.7-4.7-4.7-12.3 0-17L122.7 256 4.2 136.3c-4.7-4.7-4.7-12.3 0-17L24 99.5c4.7-4.7 12.3-4.7 17 0l146.8 148c4.7 4.7 4.7 12.3 0 17z" class=""></path></svg>');	
	}

	.widget_blossomtheme_companion_cta_widget .text a.btn-cta:after {
		background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="<?php echo blossom_spa_pro_hash_to_percent23( blossom_spa_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M187.8 264.5L41 412.5c-4.7 4.7-12.3 4.7-17 0L4.2 392.7c-4.7-4.7-4.7-12.3 0-17L122.7 256 4.2 136.3c-4.7-4.7-4.7-12.3 0-17L24 99.5c4.7-4.7 12.3-4.7 17 0l146.8 148c4.7 4.7 4.7 12.3 0 17z" class=""></path></svg>');
	}

	.wc-product-section .wc-product-slider .item .btn-add-to-cart {
		background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 22"><path fill="<?php echo blossom_spa_pro_hash_to_percent23( blossom_spa_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M15.55,13a1.991,1.991,0,0,0,1.75-1.03l3.58-6.49A1,1,0,0,0,20.01,4H5.21L4.27,2H1V4H3l3.6,7.59L5.25,14.03A2,2,0,0,0,7,17H19V15H7l1.1-2ZM6.16,6H18.31l-2.76,5H8.53Z"/><path fill="<?php echo blossom_spa_pro_hash_to_percent23( blossom_spa_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M7,18a2,2,0,1,0,2,2A2,2,0,0,0,7,18Z"/><path fill="<?php echo blossom_spa_pro_hash_to_percent23( blossom_spa_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M17,18a2,2,0,1,0,2,2A2,2,0,0,0,17,18Z"/></svg>');
	}

	.widget_bttk_author_bio .readmore:hover::after {
		background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="<?php echo blossom_spa_pro_hash_to_percent23( blossom_spa_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M187.8 264.5L41 412.5c-4.7 4.7-12.3 4.7-17 0L4.2 392.7c-4.7-4.7-4.7-12.3 0-17L122.7 256 4.2 136.3c-4.7-4.7-4.7-12.3 0-17L24 99.5c4.7-4.7 12.3-4.7 17 0l146.8 148c4.7 4.7 4.7 12.3 0 17z" class=""></path></svg>');
	}

	.widget_bttk_testimonial_widget .bttk-testimonial-inner-holder::before, 
	blockquote::before {
		background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 24"><path fill="<?php echo blossom_spa_pro_hash_to_percent23( blossom_spa_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M33.54,28.5a8,8,0,1,1-8.04,8,16,16,0,0,1,16-16A15.724,15.724,0,0,0,33.54,28.5Zm-12.04,8a8,8,0,0,1-16,0h0a16,16,0,0,1,16-16,15.724,15.724,0,0,0-7.96,8A7.989,7.989,0,0,1,21.5,36.5Z" transform="translate(-5.5 -20.5)"/></svg>');
	}

	.gallery-section .widget_media_gallery .gallery-item a::after {
		background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="<?php echo blossom_spa_pro_hash_to_percent23( blossom_spa_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M368 224H224V80c0-8.84-7.16-16-16-16h-32c-8.84 0-16 7.16-16 16v144H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h144v144c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V288h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z"></path></svg>');
	}

	@media screen and (max-width: 1024px) {
		.header-two .header-main .nav-wrap, .header-four .header-main .nav-wrap, 
		.header-three .nav-wrap .container, .header-five .nav-wrap .container, 
		.header-seven .nav-wrap {
			background: <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>;
		}
	}
	
	<?php if( is_rtl() ) : ?>
	.widget .widget-title::after {
		background: -webkit-linear-gradient(to left, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent 50%);
		background: -moz-linear-gradient(to left, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent 50%);
		background: -ms-linear-gradient(to left, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent 50%);
		background: -o-linear-gradient(to left, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent 50%);
		background: linear-gradient(to left, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent 50%);
	}

	.additional-post .post-title span::after, 
	.comments-area .comments-title span:after, 
	.comment-respond .comment-reply-title span::after, 
	.author-section .author-content-wrap .author-name span::after {
		background: -webkit-linear-gradient(to left, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent);
		background: -moz-linear-gradient(to left, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent);
		background: -ms-linear-gradient(to left, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent);
		background: -o-linear-gradient(to left, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent);
		background: linear-gradient(to left, <?php echo 'rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.5)'; ?>, transparent);
	}

	.contact-details-wrap .widget .widget-title:after, 
	section.contact-section .contact-details-wrap .widget .widget-title:after {
		background: -webkit-linear-gradient(to left, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent);
		background: -moz-linear-gradient(to left, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent);
		background: -ms-linear-gradient(to left, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent);
		background: -o-linear-gradient(to left, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent);
		background: linear-gradient(to left, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent);
	}

	.form-block .section-title:after {
		background: -webkit-linear-gradient(to left, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent 50%);
		background: -moz-linear-gradient(to left, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent 50%);
		background: -ms-linear-gradient(to left, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent 50%);
		background: -o-linear-gradient(to left, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent 50%);
		background: linear-gradient(to left, <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>, transparent 50%);
	}
	<?php endif; ?>
    
    <?php if( is_woocommerce_activated() ) { ?>
        .woocommerce ul.products li.product .price ins,
		.woocommerce div.product p.price ins,
		.woocommerce div.product span.price ins, 
		.woocommerce nav.woocommerce-pagination ul li a:hover,
 		.woocommerce nav.woocommerce-pagination ul li a:focus, 
 		.woocommerce div.product .entry-summary .woocommerce-product-rating .woocommerce-review-link:hover,
 		.woocommerce div.product .entry-summary .woocommerce-product-rating .woocommerce-review-link:focus, 
 		.woocommerce div.product .entry-summary .product_meta .posted_in a:hover,
		 .woocommerce div.product .entry-summary .product_meta .posted_in a:focus,
		 .woocommerce div.product .entry-summary .product_meta .tagged_as a:hover,
		 .woocommerce div.product .entry-summary .product_meta .tagged_as a:focus, 
		 .woocommerce-cart #primary .page .entry-content table.shop_table td.product-name a:hover,
 		.woocommerce-cart #primary .page .entry-content table.shop_table td.product-name a:focus, 
 		.widget.woocommerce ul li a:hover, .woocommerce #secondary .widget_price_filter .price_slider_amount .button:hover,
 		.woocommerce #secondary .widget_price_filter .price_slider_amount .button:focus, 
 		.widget.woocommerce ul li.cat-parent .cat-toggle:hover, 
 		.woocommerce.widget .product_list_widget li .product-title:hover,
 		.woocommerce.widget .product_list_widget li .product-title:focus, 
 		.woocommerce.widget .product_list_widget li ins,
 		.woocommerce.widget .product_list_widget li ins .amount, 
 		.woocommerce ul.products li.product .price ins, .woocommerce div.product p.price ins, .woocommerce div.product span.price ins,
 		.woocommerce div.product .entry-summary .product_meta .posted_in a:hover, .woocommerce div.product .entry-summary .product_meta .posted_in a:focus, .woocommerce div.product .entry-summary .product_meta .tagged_as a:hover, .woocommerce div.product .entry-summary .product_meta .tagged_as a:focus, 
 		.woocommerce div.product .entry-summary .woocommerce-product-rating .woocommerce-review-link:hover, .woocommerce div.product .entry-summary .woocommerce-product-rating .woocommerce-review-link:focus, 
 		.woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus {
			color: <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>;
		}

		.woocommerce ul.products li.product .added_to_cart:hover,
 		.woocommerce ul.products li.product .added_to_cart:focus, 
 		.woocommerce ul.products li.product .add_to_cart_button:hover,
		 .woocommerce ul.products li.product .add_to_cart_button:focus,
		 .woocommerce ul.products li.product .product_type_external:hover,
		 .woocommerce ul.products li.product .product_type_external:focus,
		 .woocommerce ul.products li.product .ajax_add_to_cart:hover,
		 .woocommerce ul.products li.product .ajax_add_to_cart:focus, 
		 .woocommerce ul.products li.product .button.loading,
 		.woocommerce-page ul.products li.product .button.loading, 
 		.woocommerce nav.woocommerce-pagination ul li span.current, 
 		.woocommerce div.product .entry-summary .variations_form .single_variation_wrap .button:hover,
 		.woocommerce div.product .entry-summary .variations_form .single_variation_wrap .button:focus, 
 		.woocommerce div.product form.cart .single_add_to_cart_button:hover,
		 .woocommerce div.product form.cart .single_add_to_cart_button:focus,
		 .woocommerce div.product .cart .single_add_to_cart_button.alt:hover,
		 .woocommerce div.product .cart .single_add_to_cart_button.alt:focus, 
		 .woocommerce-cart #primary .page .entry-content table.shop_table td.actions .coupon input[type="submit"]:hover,
 		.woocommerce-cart #primary .page .entry-content table.shop_table td.actions .coupon input[type="submit"]:focus, 
 		.woocommerce-cart #primary .page .entry-content .cart_totals .checkout-button:hover,
 		.woocommerce-cart #primary .page .entry-content .cart_totals .checkout-button:focus, 
 		.woocommerce-checkout .woocommerce .woocommerce-info, 
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
		 .woocommerce #respond input#submit:hover, 
		 .woocommerce #respond input#submit:focus, 
		 .woocommerce a.button:hover, 
		 .woocommerce a.button:focus, 
		 .woocommerce button.button:hover, 
		 .woocommerce button.button:focus, 
		 .woocommerce input.button:hover, 
		 .woocommerce input.button:focus, 
		 .woocommerce #secondary .widget_shopping_cart .buttons .button:hover,
 		.woocommerce #secondary .widget_shopping_cart .buttons .button:focus, 
 		.woocommerce #secondary .widget_price_filter .ui-slider .ui-slider-range, 
 		.woocommerce #secondary .widget_price_filter .price_slider_amount .button,  
 		.woocommerce .woocommerce-message .button:hover,
 		.woocommerce .woocommerce-message .button:focus, 
 		.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover {
	 		background: <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>;
	 	}

	 	.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item.chosen a::before, 
 		.widget.widget_layered_nav_filters ul li.chosen a:before, 
 		.woocommerce-product-search button[type="submit"]:hover {
	 		background-color: <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>;
	 	}

	 	.woocommerce nav.woocommerce-pagination ul li a:hover,
 		.woocommerce nav.woocommerce-pagination ul li a:focus, 
 		.woocommerce nav.woocommerce-pagination ul li span.current, 
 		.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item a:hover:before, 
 		.widget.widget_layered_nav_filters ul li a:hover:before, 
 		.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item.chosen a::before, 
 		.widget.widget_layered_nav_filters ul li.chosen a:before, 
 		.woocommerce #secondary .widget_price_filter .ui-slider .ui-slider-handle, 
 		.woocommerce #secondary .widget_price_filter .price_slider_amount .button {
	 		border-color: <?php echo blossom_spa_pro_sanitize_hex_color( $primary_color ); ?>;
	 	}

	 	.woocommerce div.product .product_title, 
	 	.woocommerce div.product .woocommerce-tabs .panel h2 {
		 	font-family : <?php echo esc_html( $primary_fonts['font'] ); ?>;
		 }

		 .woocommerce.widget_shopping_cart ul li a, 
		 .woocommerce.widget .product_list_widget li .product-title, 
		 .woocommerce-order-details .woocommerce-order-details__title, 
		.woocommerce-order-received .woocommerce-column__title, 
		.woocommerce-customer-details .woocommerce-column__title {
		 	font-family : <?php echo esc_html( $secondary_fonts['font'] ); ?>;
		}
    <?php } ?>
           
    <?php echo "</style>";
}
add_action( 'wp_head', 'blossom_spa_pro_dynamic_css', 99 );

/**
 * Function for sanitizing Hex color 
 */
function blossom_spa_pro_sanitize_hex_color( $color ){
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
function blossom_spa_pro_hex2rgb($hex) {
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

/**
 * Convert '#' to '%23'
*/
function blossom_spa_pro_hash_to_percent23( $color_code ){
    $color_code = str_replace( "#", "%23", $color_code );
    return $color_code;
}