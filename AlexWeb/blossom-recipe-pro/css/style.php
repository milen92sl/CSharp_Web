<?php
/**
 * Blossom Recipe Pro Dynamic Styles
 * 
 * @package Blossom_Recipe_Pro
*/

function blossom_recipe_pro_dynamic_css(){
    
    $primary_font    = get_theme_mod( 'primary_font', 'Nunito Sans' );
    $primary_fonts   = blossom_recipe_pro_get_fonts( $primary_font, 'regular' );
    $secondary_font  = get_theme_mod( 'secondary_font', 'Marcellus' );
    $secondary_fonts = blossom_recipe_pro_get_fonts( $secondary_font, 'regular' );
    $font_size       = get_theme_mod( 'font_size', 18 );
    
    $site_title_font      = get_theme_mod( 'site_title_font', array( 'font-family'=>'Marcellus', 'variant'=>'regular' ) );
    $site_title_fonts     = blossom_recipe_pro_get_fonts( $site_title_font['font-family'], $site_title_font['variant'] );
    $site_title_font_size = get_theme_mod( 'site_title_font_size', 36 );
    
    $h1_font      = get_theme_mod( 'h1_font', array( 'font-family'=>'Marcellus', 'variant'=>'regular') );
    $h1_fonts     = blossom_recipe_pro_get_fonts( $h1_font['font-family'], $h1_font['variant'] );
    $h1_font_size = get_theme_mod( 'h1_font_size', 40 );
    
    $h2_font      = get_theme_mod( 'h2_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );
    $h2_fonts     = blossom_recipe_pro_get_fonts( $h2_font['font-family'], $h2_font['variant'] );
    $h2_font_size = get_theme_mod( 'h2_font_size', 36 );
    
    $h3_font      = get_theme_mod( 'h3_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );
    $h3_fonts     = blossom_recipe_pro_get_fonts( $h3_font['font-family'], $h3_font['variant'] );
    $h3_font_size = get_theme_mod( 'h3_font_size', 30 );
    
    $h4_font      = get_theme_mod( 'h4_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );
    $h4_fonts     = blossom_recipe_pro_get_fonts( $h4_font['font-family'], $h4_font['variant'] );
    $h4_font_size = get_theme_mod( 'h4_font_size', 24 );
    
    $h5_font      = get_theme_mod( 'h5_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );
    $h5_fonts     = blossom_recipe_pro_get_fonts( $h5_font['font-family'], $h5_font['variant'] );
    $h5_font_size = get_theme_mod( 'h5_font_size', 20 );
    
    $h6_font      = get_theme_mod( 'h6_font', array('font-family'=>'Marcellus', 'variant'=>'regular') );
    $h6_fonts     = blossom_recipe_pro_get_fonts( $h6_font['font-family'], $h6_font['variant'] );
    $h6_font_size = get_theme_mod( 'h6_font_size', 18 );
    
    $primary_color    = get_theme_mod( 'primary_color', '#f15641' );
    $site_title_color = get_theme_mod( 'site_title_color', '#111111' );
    $body_bg          = get_theme_mod( 'body_bg', 'image' );
    $bg_pattern       = get_theme_mod( 'bg_pattern', 'nobg' );
    
    $rgb = blossom_recipe_pro_hex2rgb( blossom_recipe_pro_sanitize_hex_color( $primary_color ) );
    
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
        font-family : <?php echo esc_html( $primary_fonts['font'] ); ?>;
        font-size   : <?php echo absint( $font_size ); ?>px;        
    }
    
    <?php 
    if( $body_bg == 'pattern' && $bg_pattern != 'nobg' ){ ?>
        body.custom-background {
            background: url(<?php echo esc_url( $image ); ?>);
        }
        <?php 
    } 
    ?>
    
    .site-branding .site-title{
        font-size   : <?php echo absint( $site_title_font_size ); ?>px;
        font-family : <?php echo esc_html( $site_title_fonts['font'] ); ?>;
        font-weight : <?php echo esc_html( $site_title_fonts['weight'] ); ?>;
        font-style  : <?php echo esc_html( $site_title_fonts['style'] ); ?>;
    }
    
    .site-branding .site-title a{
		color: <?php echo blossom_recipe_pro_sanitize_hex_color( $site_title_color ); ?>;
	}

	#primary article .entry-content h1{
        font-family: <?php echo esc_html( $h1_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h1_font_size ); ?>px;        
    }
    
    #primary article .entry-content h2{
        font-family: <?php echo esc_html( $h2_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h2_font_size ); ?>px;
    }
    
    #primary article .entry-content h3{
        font-family: <?php echo esc_html( $h3_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h3_font_size ); ?>px;
    }
    
    #primary article .entry-content h4{
        font-family: <?php echo esc_html( $h4_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h4_font_size ); ?>px;
    }
    
    #primary article .entry-content h5{
        font-family: <?php echo esc_html( $h5_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h5_font_size ); ?>px;
    }
    
    #primary article .entry-content h6{
        font-family: <?php echo esc_html( $h6_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h6_font_size ); ?>px;
    }

    .article-group .related-articles .related-title, 
    .sticky-bar-content .blossomthemes-email-newsletter-wrapper .text-holder h3, 
    .error-404 .page-header .page-title, 
    .widget_bttk_icon_text_widget .rtc-itw-inner-holder .widget-title, 
    .widget_blossomthemes_stat_counter_widget .blossomthemes-sc-holder .widget-title, 
    .widget .blossomthemes-email-newsletter-wrapper form input[type="submit"], 
    .sticky-bar-content .blossomthemes-email-newsletter-wrapper form input[type="submit"], 
    .woocommerce div.product .product_title, 
    .woocommerce div.product .woocommerce-tabs .panel h2 {
	    font-family : <?php echo esc_html( $primary_fonts['font'] ); ?>;
	}

	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"], 
	.dropcap, 
	.bttn, .bttn:visited, 
	.comment-body b.fn, 
	.comment-body .reply .comment-reply-link, 
	.single .navigation .nav-links, 
	.search-form > label, 
	.single .related-articles .related-title, 
	.site-banner .banner-caption .banner-title, 
	.tab-content .item-block .item-title, 
	.entry-header .entry-title, 
	.newsletter-section .widget_blossomthemes_email_newsletter_widget .text-holder h3, 
	.widget-title, 
	.widget_bttk_posts_category_slider_widget .carousel-title .title, 
	.widget_brm_recipe_categories_slider .item .carousel-title .title, 
	.page-header .page-title, 
	.single .author-content-wrap .author-name, 
	.comments-area .comments-title, .comment-respond .comment-reply-title, 
	#primary article .entry-content .recipe-tags h4, 
	.recipe-cooking-method-holder .item .child-title, 
	.recipe-cuisine-holder .item .child-title, 
	.recipe-category-holder .item .child-title, 
	#primary #br-recipe-notes h4, 
	.recipe-cooking-method-holder .recipe-archive-wrap .recipe-title, 
	.recipe-cuisine-holder .recipe-archive-wrap .recipe-title, 
	.recipe-category-holder .recipe-archive-wrap .recipe-title, 
	.archive[class*="tax-recipe-"] .site-main .recipe-title, 
	.author-info-wrap .name, 
	#primary #br-recipe-ingredients h4, #primary #br-recipe-instructions h4, 
	.br-instructions-list-wrap .br_instructions_heading, 
	.woocommerce.widget .product_list_widget li .product-title, 
	.woocommerce ul.products li.product .woocommerce-loop-category__title, 
	.woocommerce ul.products li.product .woocommerce-loop-product__title, 
	.woocommerce ul.products li.product h3, 
	.woocommerce div.product .up-sells > h2, 
	.woocommerce div.product .related > h2 {
		font-family : <?php echo esc_html( $secondary_fonts['font'] ); ?>;
	}
    
    /*Color Scheme*/
   
   	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"], 
	.bttn, .bttn:visited, 
	.widget-area .widget .widget-title span::after, 
	.site-footer .widget .widget-title span::after, 
	.post-edit-link:hover, 
	.post-edit-link:focus, 
	.post-edit-link:active, 
	.btn-readmore, 
	#back-to-top:hover, 
	.comment-respond .comment-reply-title a:hover, 
	a.page-numbers:hover,
	span.page-numbers.current, 
	.posts-navigation .nav-links div[class*="nav-"] a:hover, 
	#load-posts a.loading, 
	#load-posts a:hover, 
	#load-posts a.disabled, 
	.sticky-t-bar span.close, 
	.sticky-bar-content, 
	.header-search-form .close:hover:before, 
	.header-search-form .close:hover:after, 
	.shopping-cart .cart-count, 
	.owl-carousel .owl-nav button[class*='owl-']:hover, 
	.tab-group .tab-btn:hover, 
	.tab-group .tab-btn.active, 
	.author-info-wrap .social-icon-list a:hover, 
	.single .article-wrap .article-share ul li a:hover, 
	.widget_bttk_author_bio .readmore, 
	.widget_bttk_author_bio .author-bio-socicons a:hover, 
	.widget_bttk_contact_social_links .social-networks li a:hover, 
	.widget_bttk_posts_category_slider_widget .owl-carousel .owl-dots .owl-dot:hover span, 
	.widget_bttk_posts_category_slider_widget .owl-carousel .owl-dots .owl-dot.active span, 
	.widget_bttk_social_links ul li a:hover, 
	.widget_bttk_description_widget .social-profile li a:hover,
	.widget_calendar caption, 
	.tagcloud a:hover, 
	.recipe-cooking-method-holder .item a, 
	.recipe-cuisine-holder .item a, 
	.recipe-category-holder .item a, 
	.ingredient-progressbar-bar .ui-progressbar-value, 
	.instruction-progressbar-bar .ui-progressbar-value, 
	.br-instructions-list-wrap input[type="checkbox"]:checked + label::before, 
	.blossom-recipe-print .br_recipe_print_button, 
	.site-footer .widget_bttk_contact_social_links .social-networks li a:hover, 
	.widget_brm_recipe_categories_slider .owl-theme .owl-dots .owl-dot:hover span, 
	.widget_brm_recipe_categories_slider .owl-theme .owl-dots .owl-dot.active span, 
	.single-blossom-recipe .site-main .article-share li a:hover {
		background: <?php echo blossom_recipe_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	blockquote:before, 
	q:before, q:after, 
	.sticky-bar-content .blossomthemes-email-newsletter-wrapper form input[type="submit"]:hover, 
	.blossomthemes-email-newsletter-wrapper form label input[type="checkbox"]:checked + .check-mark, 
	.search-form .search-submit, .search-form .search-submit:hover, 
	input[type="checkbox"]:checked + label::before, 
	.widget_brm_recipe_categories_slider .owl-theme .owl-nav [class*="owl-"]:hover {
		background-color: <?php echo blossom_recipe_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"], 
	.bttn, .bttn:visited, 
	.post-edit-link, 
	.btn-readmore, 
	.comment-respond .comment-reply-title a:hover, 
	.posts-navigation .nav-links div[class*="nav-"] a:hover, 
	#load-posts a.loading, 
	#load-posts a:hover, 
	#load-posts a.disabled, 
	.blossomthemes-email-newsletter-wrapper form label input[type="checkbox"]:checked + .check-mark, 
	.widget_bttk_author_bio .readmore, 
	.widget_bttk_posts_category_slider_widget .owl-carousel .owl-dots .owl-dot span::before, 
	.tagcloud a, 
	input[type="checkbox"]:checked + label::before, 
	.blossom-recipe-print .br_recipe_print_button, 
	.site-footer .widget_bttk_contact_social_links .social-networks li a:hover, 
	.widget_brm_recipe_categories_slider .owl-theme .owl-dots .owl-dot span:before {
		border-color: <?php echo blossom_recipe_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	span.category a:hover, 
	.single .author-profile .author-social a:hover span, 
	.widget_brm_recent_recipe ul li .cat-links a:hover, 
	.widget_brm_popular_recipe ul li .cat-links a:hover {
	    border-bottom-color: <?php echo blossom_recipe_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	.comments-area .bypostauthor > div > .comment-body {
		border-left-color: <?php echo blossom_recipe_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	.tab-group .tab-btn:hover:before, 
	.tab-group .tab-btn.active:before {
		border-top-color: <?php echo blossom_recipe_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	a, a:hover, 
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover, 
	.dropcap, 
	.bttn:hover, 
	.entry-title a:hover,
	.entry-meta span a:hover,  
	.post-edit-link, 
	.btn-link, .btn-link:visited, 
	article figure.post-thumbnail .social-icon-list a:hover, 
	span.category a, 
	.widget ul li a:hover, 
	.site-footer .widget ul li a:hover, 
	.btn-readmore:hover, 
	.comment-body .comment-awaiting-moderation, 
	.comment-body .reply .comment-reply-link, 
	.breadcrumb-wrapper a:hover, 
	.breadcrumb-wrapper .current, 
	.social-icon-list li a:hover, 
	.header-search > .search-btn:hover, 
	.shopping-cart a:hover svg, 
	.main-navigation ul li:hover > a, 
	.main-navigation ul li.current-menu-item > a, 
	.main-navigation ul li.current_page_item > a, 
	.main-navigation ul ul li:hover > a, 
	.main-navigation ul ul li.current-menu-item > a, 
	.main-navigation ul ul li.current_page_item > a, 
	.slider-two .banner-caption .banner-title a:hover, 
	.site-banner.slider-three .banner-caption .banner-title a:hover, 
	.site-banner.slider-four .banner-caption .banner-title a:hover, 
	.site-footer .widget ul li .entry-meta span a:hover, 
	.site-footer .widget ul li .entry-header .cat-links a:hover, 
	.bottom-footer .copyright a:hover, 
	.error404 .error-num, 
	.latest-articles .entry-title a:hover, 
	.related-articles .entry-title a:hover, 
	body[class*="-col-grid"] .related-articles .entry-title a:hover, 
	body.list-view .related-articles .entry-title a:hover, 
	.author-info-wrap .name .vcard, 
	.single .author-content-wrap .author-name span.vcard, 
	.single .author-profile .author-social a:hover, 
	.widget_bttk_author_bio .readmore:hover, 
	.widget_blossomtheme_companion_cta_widget .btn-cta:hover, 
	.widget_bttk_contact_social_links .contact-list li a:hover, 
	.site-footer .widget_bttk_contact_social_links .contact-list li a:hover, 
	.widget_bttk_icon_text_widget .rtc-itw-inner-holder .icon-holder, 
	.widget_bttk_popular_post ul li .entry-header .entry-meta > span a:hover, 
	.widget_bttk_pro_recent_post ul li .entry-header .entry-meta > span a:hover, 
	.site-footer .widget_bttk_popular_post ul li .entry-header .entry-meta > span a:hover, 
	.site-footer .widget_bttk_pro_recent_post ul li .entry-header .entry-meta > span a:hover, 
	.widget_bttk_posts_category_slider_widget .carousel-title a:hover, 
	.widget_blossomthemes_stat_counter_widget .blossomthemes-sc-holder .icon-holder, 
	#br_ingredients_counter .ingredient_checked, 
	#br_instructions_counter .instructions_checked, 
	.blossom-recipe-print .br_recipe_print_button:hover, 
	.one-col-grid .site-main .recipe-archive-wrap #br-recipe-category-links > div a:hover, 
	.archive[class*="tax-recipe-"] .site-main .recipe-title a:hover, 
	.one-col-grid.post-type-archive-blossom-recipe .site-main .recipe-title a:hover, 
	.widget_brm_recipe_categories_slider .owl-item .cat-links a:hover, 
	.widget_brm_recipe_categories_slider .owl-item .carousel-title .title a:hover, 
	.widget_brm_recent_recipe ul li .cat-links a, 
	.widget_brm_popular_recipe ul li .cat-links a, 
	.widget_brm_recipe_categories_slider .item .carousel-title a:hover, 
	.btn-link, .btn-link:visited, .readmore-btn .more-button {
		color: <?php echo blossom_recipe_pro_sanitize_hex_color( $primary_color ); ?>;
	}

	table tbody tr:nth-child(odd), 
	.page-numbers, 
	.author-info-wrap .social-icon-list a, 
	.single .article-wrap .article-share ul li a, 
	.widget_bttk_author_bio .author-bio-socicons a, 
	.widget_bttk_contact_social_links .contact-list li svg, 
	.widget_bttk_contact_social_links .social-networks li a, 
	.widget_bttk_posts_category_slider_widget .owl-carousel .owl-dots .owl-dot span, 
	.widget_bttk_social_links ul li a, 
	.widget_bttk_description_widget .social-profile li a, 
	.widget_archive ul li::before, 
	.widget_categories ul li::before, 
	.widget_pages ul li::before, 
	.widget_meta ul li::before, 
	.widget_recent_comments ul li::before, 
	.widget_recent_entries ul li::before, 
	.widget_nav_menu ul li::before, 
	.widget_brm_recipe_categories_slider .owl-theme .owl-dots .owl-dot span, 
	.single-blossom-recipe .site-main .article-share li a {
	    <?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.15);'; ?>
	}

	.comments-area .bypostauthor > div > .comment-body, 
	.tab-section, 
	.widget_calendar table tr td#today, 
	#br-recipe-ingredients {
		<?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.1);'; ?>
	}

	.widget_bttk_custom_categories ul li .post-count, 
	.widget_bttk_image_text_widget ul li .btn-readmore {
		<?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.7);'; ?>
	}

	.widget_bttk_custom_categories ul li a:hover .post-count, 
	.widget_bttk_custom_categories ul li a:hover:focus .post-count, 
	.widget_bttk_image_text_widget ul li .btn-readmore:hover {
		<?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.85);'; ?>
	}

	.widget_bttk_image_text_widget ul li .btn-readmore {
		<?php echo 'border-color: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.7);'; ?>
	}

	.widget_bttk_image_text_widget ul li .btn-readmore:hover {
		<?php echo 'border-color: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.85);'; ?>
	}

	blockquote, q, 
	blockquote:after {
		<?php echo 'border-top-color: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.15);'; ?>
	}

	blockquote, q {
		<?php echo 'border-bottom-color: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.15);'; ?>
	}

	.btn-link::after, .readmore-btn .more-button::after {
	    background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="<?php echo blossom_recipe_pro_hash_to_percent23( blossom_recipe_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"></path></svg>');
	}

	.btn-link:after {
 		background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="<?php echo blossom_recipe_pro_hash_to_percent23( blossom_recipe_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"></path></svg>');
	}

	.comment-body .reply .comment-reply-link:before {
	    background-image: url('data:image/svg+xml;utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="<?php echo blossom_recipe_pro_hash_to_percent23( blossom_recipe_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M136.309 189.836L312.313 37.851C327.72 24.546 352 35.348 352 56.015v82.763c129.182 10.231 224 52.212 224 183.548 0 61.441-39.582 122.309-83.333 154.132-13.653 9.931-33.111-2.533-28.077-18.631 38.512-123.162-3.922-169.482-112.59-182.015v84.175c0 20.701-24.3 31.453-39.687 18.164L136.309 226.164c-11.071-9.561-11.086-26.753 0-36.328zm-128 36.328L184.313 378.15C199.7 391.439 224 380.687 224 359.986v-15.818l-108.606-93.785A55.96 55.96 0 0 1 96 207.998a55.953 55.953 0 0 1 19.393-42.38L224 71.832V56.015c0-20.667-24.28-31.469-39.687-18.164L8.309 189.836c-11.086 9.575-11.071 26.767 0 36.328z"></path></svg>');
	}

	.page-numbers.prev:before,
	.page-numbers.next:before {
	    background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="<?php echo blossom_recipe_pro_hash_to_percent23( blossom_recipe_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"></path></svg>');
	}

	.page-numbers.prev:before {
	    background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="<?php echo blossom_recipe_pro_hash_to_percent23( blossom_recipe_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>');
	}

	.sticky-bar-content .blossomthemes-email-newsletter-wrapper form label input[type="checkbox"]:checked + .check-mark {
	    background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="<?php echo blossom_recipe_pro_hash_to_percent23( blossom_recipe_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>');
	}

	.blossom-recipe-print .br_recipe_print_button:hover::before {
	    background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="<?php echo blossom_recipe_pro_hash_to_percent23( blossom_recipe_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M448 192V77.25c0-8.49-3.37-16.62-9.37-22.63L393.37 9.37c-6-6-14.14-9.37-22.63-9.37H96C78.33 0 64 14.33 64 32v160c-35.35 0-64 28.65-64 64v112c0 8.84 7.16 16 16 16h48v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h48c8.84 0 16-7.16 16-16V256c0-35.35-28.65-64-64-64zm-64 256H128v-96h256v96zm0-224H128V64h192v48c0 8.84 7.16 16 16 16h48v96zm48 72c-13.25 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24z"></path></svg>');
	}

	@media screen and (max-width: 1024px) {
		.main-navigation .toggle-button:hover {
			color: <?php echo blossom_recipe_pro_sanitize_hex_color( $primary_color ); ?>;
		}

		.main-navigation .toggle-button:hover .toggle-bar,  
	    .main-navigation .toggle-button:hover .toggle-bar:nth-child(2):before, 
	    .main-navigation .toggle-button:hover .toggle-bar:nth-child(2):after, 
	    .main-navigation .close:hover, 
	    .main-navigation .close::before, 
    	.main-navigation .close::after {
	        background: <?php echo blossom_recipe_pro_sanitize_hex_color( $primary_color ); ?>;
	    }
	}
    
    <?php if( is_woocommerce_activated() ) { ?>
         
		.woocommerce ul.products li.product .price ins,
		.woocommerce div.product p.price ins,
		.woocommerce div.product span.price ins, 
		.woocommerce div.product .entry-summary .woocommerce-product-rating .woocommerce-review-link:hover,
 		.woocommerce div.product .entry-summary .woocommerce-product-rating .woocommerce-review-link:focus, 
 		.woocommerce div.product .entry-summary .product_meta .posted_in a:hover,
		.woocommerce div.product .entry-summary .product_meta .posted_in a:focus,
		.woocommerce div.product .entry-summary .product_meta .tagged_as a:hover,
		.woocommerce div.product .entry-summary .product_meta .tagged_as a:focus, 
		.woocommerce-cart #primary .page .entry-content table.shop_table td.product-name a:hover,
 		.woocommerce-cart #primary .page .entry-content table.shop_table td.product-name a:focus, 
 		.widget.woocommerce ul li a:hover, 
 		#secondary .widget_price_filter .price_slider_amount .button:hover,
 		#secondary .widget_price_filter .price_slider_amount .button:focus, 
 		.widget.woocommerce ul li.cat-parent .cat-toggle:hover, 
 		.woocommerce.widget .product_list_widget li .product-title:hover,
 		.woocommerce.widget .product_list_widget li .product-title:focus, 
 		.woocommerce.widget .product_list_widget li ins,
 		.woocommerce.widget .product_list_widget li ins .amount{
		 	color: <?php echo blossom_recipe_pro_sanitize_hex_color( $primary_color ); ?>;
		 }

		.woocommerce ul.products li.product .added_to_cart:hover,
 		.woocommerce ul.products li.product .added_to_cart:focus, 
 		.woocommerce ul.products li.product .add_to_cart_button:hover,
		.woocommerce ul.products li.product .add_to_cart_button:focus,
		.woocommerce ul.products li.product .product_type_external:hover,
		.woocommerce ul.products li.product .product_type_external:focus,
		.woocommerce ul.products li.product .ajax_add_to_cart:hover,
		.woocommerce ul.products li.product .ajax_add_to_cart:focus, 
		.woocommerce ul.products li.product .product_type_grouped:hover, 
		.woocommerce ul.products li.product .product_type_grouped:focus, 
		.woocommerce ul.products li.product .product_type_variable:hover, 
		.woocommerce ul.products li.product .product_type_variable:focus, 
		.woocommerce ul.products li.product .button.loading,
 		.woocommerce-page ul.products li.product .button.loading, 
 		.woocommerce nav.woocommerce-pagination ul li a:hover,
 		.woocommerce nav.woocommerce-pagination ul li a:focus, 
 		.woocommerce nav.woocommerce-pagination ul li span.current, 
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
		.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, 
 		.woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover, 
 		#secondary .widget_shopping_cart .buttons .button:hover,
 		#secondary .widget_shopping_cart .buttons .button:focus, 
 		#secondary .widget_price_filter .ui-slider .ui-slider-range, 
 		#secondary .widget_price_filter .price_slider_amount .button {
			background: <?php echo blossom_recipe_pro_sanitize_hex_color( $primary_color ); ?>;
		 }

		.woocommerce .woocommerce-product-search button[type="submit"], 
		.woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item.chosen a::before, 
 		.widget.widget_layered_nav_filters ul li.chosen a:before {
		 	background-color: <?php echo blossom_recipe_pro_sanitize_hex_color( $primary_color ); ?>;
		}

		.woocommerce nav.woocommerce-pagination ul li span.current, 
		.woocommerce.widget_product_categories ul li a:hover:before, 
 		.widget.widget_layered_nav_filters ul li a:hover:before, 
 		.woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item.chosen a::before, 
 		.widget.widget_layered_nav_filters ul li.chosen a:before, 
 		#secondary .widget_price_filter .ui-slider .ui-slider-handle, 
 		#secondary .widget_price_filter .price_slider_amount .button {
			border-color: <?php echo blossom_recipe_pro_sanitize_hex_color( $primary_color ); ?>; 
		}

    <?php } ?>
           
    <?php echo "</style>";
}
add_action( 'wp_head', 'blossom_recipe_pro_dynamic_css', 99 );

/**
 * Function for sanitizing Hex color 
 */
function blossom_recipe_pro_sanitize_hex_color( $color ){
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
function blossom_recipe_pro_hex2rgb($hex) {
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
function blossom_recipe_pro_hash_to_percent23( $color_code ){
    $color_code = str_replace( "#", "%23", $color_code );
    return $color_code;
}