<?php
/**
 * Dynamic Styles
 * 
 * @package Blossom_Feminine_Pro
*/

function blossom_feminine_pro_dynamic_css(){
    
    $child_theme_support    = get_theme_mod( 'child_additional_support', 'default' );

    if( $child_theme_support == 'blossom_chic' ) {
        $primary_font    = get_theme_mod( 'primary_font_chic', 'Nunito Sans' );
        $primary_fonts   = blossom_feminine_pro_get_fonts( $primary_font, 'regular' );
        $secondary_font  = get_theme_mod( 'secondary_font_chic', 'Cormorant' );
        $secondary_fonts = blossom_feminine_pro_get_fonts( $secondary_font, 'regular' );
        $primary_color   = get_theme_mod( 'primary_color_chic', '#f69581' );
        $secondary_color = get_theme_mod( 'secondary_color_chic', '#feeae3' ); 
        $font_size       = get_theme_mod( 'font_size_chic', 16 );      
    }elseif( $child_theme_support == 'mommy_blog' ){
        $primary_font    = get_theme_mod( 'primary_font_mommy', 'Cabin' );
        $primary_fonts   = blossom_feminine_pro_get_fonts( $primary_font, 'regular' );
        $secondary_font  = get_theme_mod( 'secondary_font_mommy', 'EB Garamond' );
        $secondary_fonts = blossom_feminine_pro_get_fonts( $secondary_font, 'regular' );
        $primary_color      = get_theme_mod( 'primary_color_mommy', '#78c0a8' );
        $font_size       = get_theme_mod( 'font_size_mommy', 18 );  
    }elseif( $child_theme_support == 'blossom_beauty' ){
        $primary_font    = get_theme_mod( 'primary_font_beauty', 'Muli' );
        $primary_fonts   = blossom_feminine_pro_get_fonts( $primary_font, 'regular' );
        $secondary_font  = get_theme_mod( 'secondary_font_beauty', 'EB Garamond' );
        $secondary_fonts = blossom_feminine_pro_get_fonts( $secondary_font, 'regular' );
        $primary_color      = get_theme_mod( 'primary_color_beauty', '#d8bbb5' );
        $font_size       = get_theme_mod( 'font_size_beauty', 18 );  
    }elseif( $child_theme_support == 'blossom_diva' ){
        $primary_font    = get_theme_mod( 'primary_font_diva', 'Open Sans' );
        $primary_fonts   = blossom_feminine_pro_get_fonts( $primary_font, 'regular' );
        $secondary_font  = get_theme_mod( 'secondary_font_diva', 'Suranna' );
        $secondary_fonts = blossom_feminine_pro_get_fonts( $secondary_font, 'regular' );
        $primary_color      = get_theme_mod( 'primary_color_diva', '#ef5285' );
        $font_size       = get_theme_mod( 'font_size_diva', 16 );  
    }else{
        $primary_font    = get_theme_mod( 'primary_font', 'Poppins' );
        $primary_fonts   = blossom_feminine_pro_get_fonts( $primary_font, 'regular' );
        $secondary_font  = get_theme_mod( 'secondary_font', 'Playfair Display' );
        $secondary_fonts = blossom_feminine_pro_get_fonts( $secondary_font, 'regular' );
        $primary_color   = get_theme_mod( 'primary_color', '#f3c9dd' );
        $font_size       = get_theme_mod( 'font_size', 16 );  
    }

    $line_height     = get_theme_mod( 'line_height', 27 );
    
    $site_title_font      = get_theme_mod( 'site_title_font', array( 'font-family'=>'Playfair Display', 'variant'=>'700italic' ) );
    $site_title_fonts     = blossom_feminine_pro_get_fonts( $site_title_font['font-family'], $site_title_font['variant'] );
    $site_title_font_size = get_theme_mod( 'site_title_font_size', 60 );
    
    $h1_font      = get_theme_mod( 'h1_font', array( 'font-family'=>'Playfair Display', 'variant'=>'regular') );
    $h1_fonts     = blossom_feminine_pro_get_fonts( $h1_font['font-family'], $h1_font['variant'] );
    $h1_font_size = get_theme_mod( 'h1_font_size', 48 );
    $h1_line_ht   = get_theme_mod( 'h1_line_height', 58 );
    
    $h2_font      = get_theme_mod( 'h2_font', array('font-family'=>'Playfair Display', 'variant'=>'regular') );
    $h2_fonts     = blossom_feminine_pro_get_fonts( $h2_font['font-family'], $h2_font['variant'] );
    $h2_font_size = get_theme_mod( 'h2_font_size', 40 );
    $h2_line_ht   = get_theme_mod( 'h2_line_height', 48 );
    
    $h3_font      = get_theme_mod( 'h3_font', array('font-family'=>'Playfair Display', 'variant'=>'regular') );
    $h3_fonts     = blossom_feminine_pro_get_fonts( $h3_font['font-family'], $h3_font['variant'] );
    $h3_font_size = get_theme_mod( 'h3_font_size', 32 );
    $h3_line_ht   = get_theme_mod( 'h3_line_height', 38 );
    
    $h4_font      = get_theme_mod( 'h4_font', array('font-family'=>'Playfair Display', 'variant'=>'regular') );
    $h4_fonts     = blossom_feminine_pro_get_fonts( $h4_font['font-family'], $h4_font['variant'] );
    $h4_font_size = get_theme_mod( 'h4_font_size', 28 );
    $h4_line_ht   = get_theme_mod( 'h4_line_height', 34 );
    
    $h5_font      = get_theme_mod( 'h5_font', array('font-family'=>'Playfair Display', 'variant'=>'regular') );
    $h5_fonts     = blossom_feminine_pro_get_fonts( $h5_font['font-family'], $h5_font['variant'] );
    $h5_font_size = get_theme_mod( 'h5_font_size', 24 );
    $h5_line_ht   = get_theme_mod( 'h5_line_height', 29 );
    
    $h6_font      = get_theme_mod( 'h6_font', array('font-family'=>'Playfair Display', 'variant'=>'regular') );
    $h6_fonts     = blossom_feminine_pro_get_fonts( $h6_font['font-family'], $h6_font['variant'] );
    $h6_font_size = get_theme_mod( 'h6_font_size', 22 );
    $h6_line_ht   = get_theme_mod( 'h6_line_height', 26 );
    
    $btn_bg_color    = get_theme_mod( 'btn_bg_color', '#111111' );
    $header_bg_color = get_theme_mod( 'header_bg_color', '#111111' );
    $footer_bg_color = get_theme_mod( 'footer_bg_color', '#181818' );
    $bg_color        = get_theme_mod( 'bg_color', '#ffffff' );
    $body_bg         = get_theme_mod( 'body_bg', 'image' );
    $bg_image        = get_theme_mod( 'bg_image' );
    $bg_pattern      = get_theme_mod( 'bg_pattern', 'nobg' );
    
    $rgb = blossom_feminine_pro_hex2rgb( blossom_feminine_pro_sanitize_hex_color( $primary_color ) );
    
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
        background: url(<?php echo esc_url( $image ); ?>) <?php echo blossom_feminine_pro_sanitize_hex_color( $bg_color ); ?>;
    }
    
    .site-title{
        font-size   : <?php echo absint( $site_title_font_size ); ?>px;
        font-family : <?php echo wp_kses_post( $site_title_fonts['font'] ); ?>;
        font-weight : <?php echo esc_attr( $site_title_fonts['weight'] ); ?>;
        font-style  : <?php echo esc_attr( $site_title_fonts['style'] ); ?>;
    }

    .banner .banner-text .title,
    #primary .sticky .text-holder .entry-header .entry-title,
    #primary .post .text-holder .entry-header .entry-title,
    .author-section .text-holder .title,
    .post-navigation .nav-links .nav-previous .post-title,
    .post-navigation .nav-links .nav-next .post-title,
    .related-post .post .text-holder .entry-title,
    .comments-area .comments-title,
    .comments-area .comment-body .fn,
    .comments-area .comment-reply-title,
    .page-header .page-title,
    #primary .post .entry-content blockquote,
    #primary .page .entry-content blockquote,
    #primary .post .entry-content .pull-left,
    #primary .page .entry-content .pull-left,
    #primary .post .entry-content .pull-right,
    #primary .page .entry-content .pull-right,
    #primary .post .entry-content h1,
    #primary .page .entry-content h1,
    #primary .post .entry-content h2,
    #primary .page .entry-content h2,
    #primary .post .entry-content h3,
    #primary .page .entry-content h3,
    #primary .post .entry-content h4,
    #primary .page .entry-content h4,
    #primary .post .entry-content h5,
    #primary .page .entry-content h5,
    #primary .post .entry-content h6,
    #primary .page .entry-content h6,
    .search #primary .search-post .text-holder .entry-header .entry-title,
    .error-holder .page-content h2,
    .category-layout-two .col .text-holder span,
    .banner-layout-two .grid-item .text-holder .title,
    .banner-layout-four .text-holder .title,
    .related-post .post .text-holder .entry-title,
    .popular-post .post .text-holder .entry-title,
    .single-post-layout-two .entry-header .entry-title,
    .single-post-layout-three .entry-header .entry-title,
    .single-post-layout-five .entry-header .entry-title,
    .widget_bttk_author_bio .title-holder,
    .widget_bttk_popular_post ul li .entry-header .entry-title,
    .widget_bttk_pro_recent_post ul li .entry-header .entry-title,
    .widget_bttk_posts_category_slider_widget .carousel-title .title,
    .widget .blossomthemes-email-newsletter-wrapper .text-holder h3,
    #load-posts a,
    .content-newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3,
    #secondary .widget_bttk_description_widget .text-holder .name,
    #secondary .widget_bttk_testimonial_widget .text-holder .name,
    .portfolio-text-holder .portfolio-img-title,
    .portfolio-holder .entry-header .entry-title,
    .single-blossom-portfolio .post-navigation .nav-previous a,
    .single-blossom-portfolio .post-navigation .nav-next a,
    .related-portfolio-title,
    #primary .sticky .text-holder .entry-header .entry-title, 
    #primary .post .text-holder .entry-header .entry-title, 
    .archive .blossom-portfolio .entry-header .entry-title{
        font-family: <?php echo wp_kses_post( $secondary_fonts['font'] ); ?>;
    }    
     
    #primary .post .entry-content h1,
    #primary .page .entry-content h1{
        font-family: <?php echo wp_kses_post( $h1_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h1_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h1_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h1_fonts['style'] ); ?>;        
    }
    
    #primary .post .entry-content h2,
    #primary .page .entry-content h2{
        font-family: <?php echo wp_kses_post( $h2_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h2_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h2_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h2_fonts['style'] ); ?>;
    }
    
    #primary .post .entry-content h3,
    #primary .page .entry-content h3{
        font-family: <?php echo wp_kses_post( $h3_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h3_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h3_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h3_fonts['style'] ); ?>;
    }
    
    #primary .post .entry-content h4,
    #primary .page .entry-content h4{
        font-family: <?php echo wp_kses_post( $h4_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h4_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h4_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h4_fonts['style'] ); ?>;
    }
    
    #primary .post .entry-content h5,
    #primary .page .entry-content h5{
        font-family: <?php echo wp_kses_post( $h5_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h5_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h5_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h5_fonts['style'] ); ?>;
    }
    
    #primary .post .entry-content h6,
    #primary .page .entry-content h6{
        font-family: <?php echo wp_kses_post( $h6_fonts['font'] ); ?>;
        font-size: <?php echo absint( $h6_font_size ); ?>px;
        font-weight: <?php echo esc_attr( $h6_fonts['weight'] ); ?>;
        font-style: <?php echo esc_attr( $h6_fonts['style'] ); ?>;
    }
    
    /* primary color */
    a{
    	color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    
    a:hover,
    a:focus{
    	color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }

    .secondary-nav ul li a:hover,
    .secondary-nav ul li a:focus,
    .secondary-nav ul li:hover > a,
    .secondary-nav ul li:focus > a,
    .secondary-nav .current_page_item > a,
    .secondary-nav .current-menu-item > a,
    .secondary-nav .current_page_ancestor > a,
    .secondary-nav .current-menu-ancestor > a,
    .header-t .social-networks li a:hover,
    .header-t .social-networks li a:focus,
    .main-navigation ul li a:hover,
    .main-navigation ul li a:focus,
    .main-navigation ul li:hover > a,
    .main-navigation ul li:focus > a,
    .main-navigation .current_page_item > a,
    .main-navigation .current-menu-item > a,
    .main-navigation .current_page_ancestor > a,
    .main-navigation .current-menu-ancestor > a,
    .banner .banner-text .cat-links a:hover,
    .banner .banner-text .cat-links a:focus,
    .banner .banner-text .title a:hover,
    .banner .banner-text .title a:focus,
    #primary .post .text-holder .entry-header .entry-title a:hover,
    #primary .post .text-holder .entry-header .entry-title a:focus,
    .widget ul li a:hover,
    .widget ul li a:focus,
    .site-footer .widget ul li a:hover,
    .site-footer .widget ul li a:focus,
    #crumbs a:hover,
    #crumbs a:focus,
    .related-post .post .text-holder .cat-links a:hover,
    .related-post .post .text-holder .cat-links a:focus,
    .related-post .post .text-holder .entry-title a:hover,
    .related-post .post .text-holder .entry-title a:focus,
    .comments-area .comment-body .comment-metadata a:hover,
    .comments-area .comment-body .comment-metadata a:focus,
    .search #primary .search-post .text-holder .entry-header .entry-title a:hover,
    .search #primary .search-post .text-holder .entry-header .entry-title a:focus,
    .site-title a:hover,
    .site-title a:focus,
    .banner .banner-text .category a:hover,
    .banner .banner-text .category a:focus,
    .widget_bttk_popular_post ul li .entry-header .entry-meta a:hover,
	.widget_bttk_popular_post ul li .entry-header .entry-meta a:focus,
	.widget_bttk_pro_recent_post ul li .entry-header .entry-meta a:hover,
	.widget_bttk_pro_recent_post ul li .entry-header .entry-meta a:focus,
	.widget_bttk_popular_post .style-two li .entry-header .cat-links a,
	.widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a,
	.widget_bttk_popular_post .style-three li .entry-header .cat-links a,
	.widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a,
	.widget_bttk_posts_category_slider_widget .carousel-title .title a:hover,
	.widget_bttk_posts_category_slider_widget .carousel-title .title a:focus,
	.header-layout-two .header-b .social-networks li a:hover,
	.header-layout-two .header-b .social-networks li a:focus,
	.header-layout-three .header-b .main-navigation .current_page_item > a,
	.header-layout-three .header-b .main-navigation .current-menu-item > a,
	.header-layout-three .header-b .main-navigation .current_page_ancestor > a,
	.header-layout-three .header-b .main-navigation .current-menu-ancestor > a,
	.header-layout-three .header-b .main-navigation ul li a:hover,
	.header-layout-three .header-b .main-navigation ul li a:focus,
	.header-layout-three .header-b .main-navigation ul li:hover > a,
	.header-layout-three .header-b .main-navigation ul li:focus > a,
	.header-layout-three .header-b .social-networks li a:hover,
	.header-layout-three .header-b .social-networks li a:focus,
	.header-layout-three.header-layout-seven .header-b .main-navigation ul ul li a:hover,
	.header-layout-three.header-layout-seven .header-b .main-navigation ul ul li a:focus,
	.header-layout-three.header-layout-seven .header-b .main-navigation ul ul li:hover > a,
	.header-layout-three.header-layout-seven .header-b .main-navigation ul ul li:focus > a,
	.header-layout-three.header-layout-seven .header-b .main-navigation ul ul .current_page_item > a,
	.header-layout-three.header-layout-seven .header-b .main-navigation ul ul .current-menu-item > a,
	.header-layout-three.header-layout-seven .header-b .main-navigation ul ul .current_page_ancestor > a,
	.header-layout-three.header-layout-seven .header-b .main-navigation ul ul .current-menu-ancestor > a,
	.header-layout-eight .site-branding .site-title a,
	.banner-layout-two .grid-item .text-holder .category a:hover,
	.banner-layout-two .grid-item .text-holder .category a:focus,
	.banner-layout-two .grid-item .text-holder .title a:hover,
	.banner-layout-two .grid-item .text-holder .title a:focus,
	.banner-layout-four .text-holder .category a:hover,
	.banner-layout-four .text-holder .category a:focus,
	.banner-layout-four .text-holder .title a:hover,
	.banner-layout-four .text-holder .title a:focus,
	.category-layout-two .col .text-holder .learn-more,
    #primary .post.sticky.sticky-layout-two .text-holder .entry-header .entry-title a:hover,
    #primary .post.sticky.sticky-layout-two .text-holder .entry-header .entry-title a:focus,
    .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-title a:hover,
    .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-title a:focus,
    .blog.blog-layout-five #primary .post.sticky-layout-one .text-holder .entry-header .cat-links a,
    .blog.blog-layout-five #primary .post.sticky-layout-one .text-holder .entry-header .entry-title a:hover,
    .blog.blog-layout-five #primary .post.sticky-layout-one .text-holder .entry-header .entry-title a:focus,
    .popular-post .post .text-holder .cat-links a:hover,
    .popular-post .post .text-holder .cat-links a:focus,
    .popular-post .post .text-holder .entry-title a:hover,
    .popular-post .post .text-holder .entry-title a:focus,
    .comments-area .comment-body .fn a:hover,
    .comments-area .comment-body .fn a:focus,
    .single-post-layout-two .entry-header .cat-links a:hover,
    .single-post-layout-two .entry-header .cat-links a:focus,
    .single-post-layout-three .entry-header .cat-links a:hover,
    .single-post-layout-three .entry-header .cat-links a:focus,
    .single-post-layout-five .entry-header .cat-links a:hover,
    .single-post-layout-five .entry-header .cat-links a:focus,
    .portfolio-sorting .button:hover,
    .portfolio-sorting .button:focus,
    .portfolio-sorting .button.is-checked,
    .portfolio-item .portfolio-img-title a:hover,
    .portfolio-item .portfolio-img-title a:focus,
    .portfolio-item .portfolio-cat a:hover,
    .portfolio-item .portfolio-cat a:focus,
    .entry-header .portfolio-cat a:hover,
    .entry-header .portfolio-cat a:focus,
    #primary .post .text-holder .entry-footer .share .social-networks li a:hover,
    #primary .post .text-holder .entry-footer .share .social-networks li a:focus,
    .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-meta a:hover,
    #primary .post.sticky.sticky-layout-two .text-holder .entry-header .entry-meta a:hover, 
    .archive .blossom-portfolio .entry-header .entry-title a:hover, 
    .archive .blossom-portfolio .entry-header .entry-title a:focus, 
    .archive #primary .post .text-holder .entry-header .top .share .social-networks li a:hover, .archive #primary .post .text-holder .entry-header .top .share .social-networks li a:focus, .archive .blossom-portfolio .entry-header .top .social-networks li a:hover, .archive .blossom-portfolio .entry-header .top .social-networks li a:focus{
        color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }

    @media only screen and (max-width: 1024px){
        .header-layout-three.header-layout-seven .header-b .main-navigation .current_page_item > a,
        .header-layout-three.header-layout-seven .header-b .main-navigation .current-menu-item > a,
        .header-layout-three.header-layout-seven .header-b .main-navigation .current_page_ancestor > a,
        .header-layout-three.header-layout-seven .header-b .main-navigation .current-menu-ancestor > a,
        .header-layout-seven.header-layout-three .header-b .main-navigation ul li a:hover,
        .header-layout-seven.header-layout-three .header-b .main-navigation ul li a:focus,
        .header-layout-seven.header-layout-three .header-b .main-navigation ul li:hover > a,
        .header-layout-seven.header-layout-three .header-b .main-navigation ul li:focus > a{
            color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        }
    }

    @media only screen and (max-width: 767px){
        #primary .post.sticky.sticky-layout-two .text-holder .entry-header .cat-links a{
            color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        }

    }

    .category-section .col .img-holder .text-holder,
    .pagination a,
    .category-section .col .img-holder:hover .text-holder,
    .posts-navigation .nav-links .nav-previous a:hover, 
    .posts-navigation .nav-links .nav-next a:hover, 
    .posts-navigation .nav-links .nav-previous a:focus, 
    .posts-navigation .nav-links .nav-next a:focus{
        border-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }

    .category-section .col .img-holder .text-holder span,
    #primary .post .text-holder .entry-footer .btn-readmore:hover,
    #primary .post .text-holder .entry-footer .btn-readmore:focus,
    .pagination a:hover,
    .pagination a:focus,
    .widget_calendar caption,
    .widget_calendar table tbody td a,
    .widget_tag_cloud .tagcloud a:hover,
    .widget_tag_cloud .tagcloud a:focus,
    #blossom-top,
    .single #primary .post .entry-footer .tags a:hover,
    .single #primary .post .entry-footer .tags a:focus,
    .error-holder .page-content a:hover,
    .error-holder .page-content a:focus,
    .widget_bttk_custom_categories ul li a:hover .post-count,
	.widget_bttk_custom_categories ul li a:hover:focus .post-count,
	.widget_bttk_social_links ul li a:hover,
	.widget_bttk_social_links ul li a:focus,
    .posts-navigation .nav-links .nav-previous a:hover,
    .posts-navigation .nav-links .nav-next a:hover,
    .posts-navigation .nav-links .nav-previous a:focus,
    .posts-navigation .nav-links .nav-next a:focus,
    #load-posts a,
    .header-layout-three.header-layout-seven .header-b,
    .content-instagram ul li .instagram-meta .like,
    .content-instagram ul li .instagram-meta .comment,
    .single #primary .post .text-holder .entry-content .social-share .social-networks ul li a:hover,
    .single #primary .post .text-holder .entry-content .social-share .social-networks ul li a:focus,
    .header-t .tools .cart .count,
    .woocommerce ul.products li.product .added_to_cart:hover,
    .woocommerce ul.products li.product .added_to_cart:focus,
    .widget_bttk_author_bio .readmore:hover, 
    .widget_bttk_author_bio .readmore:focus,
    #secondary .widget_blossomtheme_companion_cta_widget .btn-cta:hover,
    #secondary .widget_blossomtheme_companion_cta_widget .btn-cta:focus,
    #secondary .widget_blossomtheme_featured_page_widget .text-holder .btn-readmore:hover,
    #secondary .widget_blossomtheme_featured_page_widget .text-holder .btn-readmore:focus,
    #secondary .widget_bttk_icon_text_widget .text-holder .btn-readmore:hover,
    #secondary .widget_bttk_icon_text_widget .text-holder .btn-readmore:focus,
    .widget_bttk_image_text_widget ul li .btn-readmore:hover,
    .widget_bttk_image_text_widget ul li .btn-readmore:focus,
    .promotional-block,
    .pagination .nav-links .current,
    #primary .post .entry-content .highlight, 
    #primary .page .entry-content .highlight{
        background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .share .social-networks li:hover a path{
        fill: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    .pagination .current,
    .post-navigation .nav-links .nav-previous a:hover,
    .post-navigation .nav-links .nav-next a:hover,
    .post-navigation .nav-links .nav-previous a:focus,
    .post-navigation .nav-links .nav-next a:focus{
        background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        border-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }

    #primary .post .entry-content blockquote,
    #primary .page .entry-content blockquote{
        border-bottom-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        border-top-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }

    #primary .post .entry-content .pull-left,
    #primary .page .entry-content .pull-left,
    #primary .post .entry-content .pull-right,
    #primary .page .entry-content .pull-right{border-left-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;}

    .error-holder .page-content h2{
        text-shadow: 6px 6px 0 <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    
    .category-layout-two .col .text-holder .holder{
        <?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.4);'; ?>
    }

    #primary .post .text-holder .entry-footer .btn-readmore,
    .banner .owl-nav .owl-prev,
    .banner .owl-nav .owl-next{
        background: <?php echo blossom_feminine_pro_sanitize_hex_color( $btn_bg_color ); ?>;
    }

    .header-t,
    .header-layout-three .header-b{
        background: <?php echo blossom_feminine_pro_sanitize_hex_color( $header_bg_color ); ?>;
    }

    .site-footer .footer-t{
        background: <?php echo blossom_feminine_pro_sanitize_hex_color( $footer_bg_color ); ?>;
    }
    .owl-theme .owl-nav [class*=owl-]:hover{
         background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?> !important;
    }
    
    <?php if( is_woocommerce_activated() ) { ?>
        .woocommerce ul.products li.product .add_to_cart_button:hover,
		.woocommerce ul.products li.product .add_to_cart_button:focus,
		.woocommerce ul.products li.product .product_type_external:hover,
		.woocommerce ul.products li.product .product_type_external:focus,
		.woocommerce nav.woocommerce-pagination ul li a:hover,
		.woocommerce nav.woocommerce-pagination ul li a:focus,
		.woocommerce #secondary .widget_shopping_cart .buttons .button:hover,
		.woocommerce #secondary .widget_shopping_cart .buttons .button:focus,
		.woocommerce #secondary .widget_price_filter .price_slider_amount .button:hover,
		.woocommerce #secondary .widget_price_filter .price_slider_amount .button:focus,
		.woocommerce #secondary .widget_price_filter .ui-slider .ui-slider-range,
		.woocommerce div.product form.cart .single_add_to_cart_button:hover,
		.woocommerce div.product form.cart .single_add_to_cart_button:focus,
		.woocommerce div.product .cart .single_add_to_cart_button.alt:hover,
		.woocommerce div.product .cart .single_add_to_cart_button.alt:focus,
		.woocommerce .woocommerce-message .button:hover,
		.woocommerce .woocommerce-message .button:focus,
		.woocommerce-cart #primary .page .entry-content .cart_totals .checkout-button:hover,
		.woocommerce-cart #primary .page .entry-content .cart_totals .checkout-button:focus,
		.woocommerce-checkout .woocommerce .woocommerce-info,
        .header-layout-two .header-b .tools .cart .count,
        .header-layout-three .header-b .tools .cart .count,
        .header-layout-five .header-b .tools .cart .count,
        .header-layout-six .header-b .tools .cart .count{
			background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
		}

		.woocommerce nav.woocommerce-pagination ul li a{
			border-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
		}

		.woocommerce nav.woocommerce-pagination ul li span.current{
			background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
			border-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
		}

		.woocommerce div.product .entry-summary .product_meta .posted_in a:hover,
		.woocommerce div.product .entry-summary .product_meta .posted_in a:focus,
		.woocommerce div.product .entry-summary .product_meta .tagged_as a:hover,
		.woocommerce div.product .entry-summary .product_meta .tagged_as a:focus{
			color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
		}
            
    <?php } ?>  

    <?php if( $child_theme_support == 'blossom_chic') { ?>
        body {
            line-height: 1.65em;
        }

        /* Promotional Block */
        .promotional-block {
            background-color: #111;
            color: #fff;
        }
        .promotional-block .btn-get {
            background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.15em;
            color: #fff;
        }
        .promotional-block .btn-get:after {
            top: 1px;
            right: 1px;
            bottom: 1px;
            left: 1px;
            border-color: #111;
        }

        /* Site Structure */
        .container {
            max-width: 1170px;
        }
        .single-post .main-content {
            margin-top: 2rem;
        }
        .main-content {
            margin-top: 4rem;
        }

        /* Main Content */
        .blog.blog-layout-three .site-main {
            grid-gap: 30px;
        }

        #primary {
            width: calc(100% - 330px);
        }
        #secondary {
            width: 330px;
        }

        /* Header */
        .header-m {
            padding: 3rem 0;
        }

        /* Main Navigation */
        .main-navigation ul li {
            margin: 0 15px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.075em;
        }
        .main-navigation ul li:first-child {
            margin-left: 0;
        }
        .main-navigation ul li a {
            display: inline-block;
        }
        .main-navigation ul li.menu-item-has-children:after {
            margin-left: 5px;
            position: relative;
            right: 0;
            top: 2px;            
            display: inline-block;
        }

        /* Sub Menu */
        .main-navigation ul .sub-menu li {
            position: relative;
            border-bottom: 1px solid #eee;
            margin: 0;
            padding: 0;
            line-height: 1.6em;
            text-transform: none;
            letter-spacing: normal;
        }
        .main-navigation ul .sub-menu li:last-child {
            border: 0;
            margin-bottom: 0;
        }
        .main-navigation ul ul li a {
            border: 0;
            margin: 0;
            padding: 10px 15px;
        }
        .main-navigation ul ul li.menu-item-has-children:after {
            position: absolute;
        }

        .main-navigation ul ul li.menu-item-has-children:after{
            top: 13px;
        }

        .main-navigation ul ul li:last-child > a {
            padding: 10px 15px;
        }

        /* Header Social Links */
        .header-layout-two .header-b .social-networks li {
            margin-left: 15px;
        }

        /* Header Shop Cart */
        .header-layout-two .header-b .tools .cart .count {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
            width: 20px;
            height: 20px;
            line-height: 20px;
            font-weight: 700;
            top: -12px
        }

        /* Banner / Slider */
        .banner-text .cat-links {
            display: block;
            margin-bottom: 0.75em;
        }
        .banner-text .cat-links a, 
        .single-post-layout-two .entry-header .cat-links a, 
        .single-post-layout-three .entry-header .cat-links a, 
        .single-post-layout-five .entry-header .cat-links a {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $secondary_color ); ?>;
            border-radius: 3px;
            margin-bottom: 0.5em !important;
            padding: 0.35em 1em;
            font-size: 12px;
            line-height: 1em;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            text-decoration: none;
            font-weight: 700;
            color: #111;
            transition: all 0.2s ease-in-out;
        }
        .banner .banner-text .cat-links a:hover, 
        .single-post-layout-two .entry-header .cat-links a:hover, 
        .single-post-layout-three .entry-header .cat-links a:hover, 
        .single-post-layout-five .entry-header .cat-links a:hover {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }
        .banner .banner-text {
            bottom: 80px;
        }
        .banner .banner-text .title {
            margin-bottom: 0;
        }
        .slider-layout-one .owl-item:after, .slider-layout-three .owl-item:after {
            background-image: linear-gradient(180deg, rgba(0,0,0,0) 60%, rgba(0,0,0,0.5) 100%);
        }

        /* Slider Navigation */
        .banner .owl-nav .owl-prev, .banner .owl-nav .owl-next {
            background-color: #111;
            transition: all 0.2s ease-in-out;
        }
        .banner .owl-nav .owl-prev:hover, .banner .owl-nav .owl-next:hover {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        }

        /* Category Layout */
        .category-section .col .img-holder .text-holder {
            border-color: #fff;
        }

        .category-section .col .img-holder .text-holder span {
            background-color: #fff;
            font-size: 0.67em;
            font-weight: 700;
            letter-spacing: 0.2em;
            color: #111;
            transition: all 0.3s ease-out;
        }
        .category-section .col .img-holder:hover .text-holder {
            border-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $secondary_color ); ?>;
        }
        .category-section .col .img-holder:hover .text-holder span {
            background: <?php echo blossom_feminine_pro_sanitize_hex_color( $secondary_color ); ?>;
        }
        .category-section {
            margin: 4rem 0;
        }

        /* Post Styles */
        /* Sticky Post */
        #primary .post.sticky {
            margin-bottom: 60px;
        }
        .blog.blog-layout-three #primary .post.sticky {
        margin-bottom: 2rem;
        }
        #primary .post.sticky .text-holder .entry-header .entry-meta {
            margin-bottom: 1rem;
        }

        .blog-layout-three #primary .post .text-holder .entry-header {
            margin-top: 1.75rem;
        }
        #primary .post .text-holder .entry-header .cat-links {
            margin-bottom: .75rem;
        }
        #primary .post .text-holder .entry-header .cat-links a {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $secondary_color ); ?>;
            border-radius: 3px;
            margin-bottom: 0.5em !important;
            margin-right: 0.15em;
            padding: 0.35em 0.75em;
            font-size: 12px;
            line-height: 1em;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            text-decoration: none;
            font-weight: 700;
            color: #111;
            transition: all 0.2s ease-out;
        }
        #primary .post .text-holder .entry-header .cat-links a:hover {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
            text-decoration: none;
        }

        /* Post Share */
        .blog.blog-layout-three #primary .post .text-holder .entry-header .share {
            margin-top: 0;
            margin-bottom: 0.75rem;
            padding: 0;
        }

        /* Post Image */
        .blog.blog-layout-three #primary :not(.sticky).post .img-holder {
            max-width: 100%;
        }
        .blog.blog-layout-three #primary .post .text-holder .entry-header .share .social-networks ul li a:hover, .blog.blog-layout-three #primary .post .text-holder .entry-header .share .social-networks ul li a:focus {
            color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        }

        /* Post Title */
        #primary .post .text-holder .entry-header .entry-title, 
        .archive .blossom-portfolio .entry-header .entry-title {
            letter-spacing: -0.025em;
            margin-bottom: 0.5rem;
        }

        /* Post Meta */
        #primary .post .text-holder .entry-header .entry-meta a:hover {
            color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            text-decoration: none;
        }
        
        #primary .post .text-holder .entry-footer .btn-readmore {
            background-color: #111;
            font-size: 12px;
            font-weight: 700;
            line-height: 1em;
            padding: 1.5em 2.25em;
            border-radius: 0;
            letter-spacing: 0.2em;
        }
        #primary .post .text-holder .entry-footer .btn-readmore:after {
            border-radius: 0;
        }
        .header-layout-two .header-b .tools .cart a span {
            color: #111;
        }


        /* Pagination */
        .navigation.pagination .nav-links .page-numbers {
            width: 3rem;
            height: 3rem;
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            padding: 0;
            line-height: 3rem;
        }
        .pagination .current {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $secondary_color ); ?>;
            border-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $secondary_color ); ?>;
            color: #111;
        }
        .pagination a {
            border-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $secondary_color ); ?>;
        }

        /* Sidebar */
        #secondary {
            font-size: 16px;
        }

        /* Widget Styles */
        .widget .widget-title {
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            letter-spacing: 0.2em;
            background: <?php echo blossom_feminine_pro_sanitize_hex_color( $secondary_color ); ?>;
            padding: 20px;
            margin-bottom: 2em;
        }
        .widget .widget-title:after {
            display: none;
        }
        .widget ul li {
            margin-bottom: 0.5em;
            padding-bottom: 0.5em;
            line-height: 1.5em;
        }
        .widget ul li .entry-header .entry-title,
        .widget_bttk_posts_category_slider_widget .carousel-title .title {
            font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
            font-weight: 700;
            margin: 0 0 0.35em 0;
        }
        .widget_bttk_popular_post .style-two li, .widget_bttk_pro_recent_post .style-two li, .widget_bttk_popular_post .style-three li, .widget_bttk_pro_recent_post .style-three li {
            padding-bottom: 0;
            margin-bottom: 1.5rem;
        }
        .widget_bttk_popular_post .style-two li:last-child, .widget_bttk_pro_recent_post .style-two li:last-child, .widget_bttk_popular_post .style-three li:last-child, .widget_bttk_pro_recent_post .style-three li:last-child {
            margin-bottom: 0;
        }
        .widget_bttk_popular_post .style-two li .entry-header .cat-links, .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links, .widget_bttk_popular_post .style-three li .entry-header .cat-links, .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links {
            margin-bottom: 0.5rem;
        }
        .widget_bttk_popular_post .style-two li .entry-header .cat-links a, .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a, .widget_bttk_popular_post .style-three li .entry-header .cat-links a, .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a, .widget_bttk_posts_category_slider_widget .carousel-title .cat-links a {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $secondary_color ); ?>;
            display: inline-block;
            padding: 0.35em 0.7em;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            color: #111;
            border-radius: 3px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            text-decoration: none !important;
            transition: all 0.2s ease-in-out;
        }
        .widget_bttk_popular_post .style-two li .entry-header .cat-links a:hover, .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a:hover, .widget_bttk_popular_post .style-three li .entry-header .cat-links a:hover, .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a:hover, .widget_bttk_posts_category_slider_widget .carousel-title .cat-links a:hover {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }
        .widget_bttk_popular_post ul li .entry-header .entry-title {
            font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
            font-weight: 700;
        }

        /* About Widget */
        .widget_bttk_author_bio .text-holder {
            padding: 30px;
        }
        .widget_bttk_popular_post ul li .entry-header .entry-title {
            font-size: 16px;
        }
        .widget_bttk_author_bio .title-holder {
            margin-bottom: 0.75rem;
            font-size: 1.25rem;
            font-weight: 700;
            font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
        }

        /* Category Widget */
        .widget.widget_bttk_custom_categories ul li {
            padding-bottom: 0;
        }
        .widget_bttk_custom_categories ul li .cat-title {
            padding-top: 0;
            line-height: 48px;
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.15em;
        }

        /* Newsletter */
        .content-newsletter .blossomthemes-email-newsletter-wrapper {
            flex-flow: column wrap;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper.bg-img:after, .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper:after {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            opacity: 0.9;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper .text-holder {
            max-width: 700px;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3, .content-newsletter .blossomthemes-email-newsletter-wrapper .text-holder span {
            color: #fff;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"] {
            height : 48px;
            line-height: 46px;
            padding: 0 0.75em;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"] {
            width: auto;
            padding: 0 2.25em;
            height: 48px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.2em;
            line-height: 48px;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"]:hover, .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"]:focus {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $secondary_color ); ?>;
            border-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $secondary_color ); ?>;
        }

        /* Instagram */
        .content-instagram .profile-link {
            background-color: #111;
            padding: 2em 3em;
            font-size: 12px;
            font-weight: 700;
            line-height: 1em;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: #fff;
        }
        .content-instagram ul li .instagram-meta .like, .content-instagram ul li .instagram-meta .comment{
            background-color: rgba(0,0,0,0.7);
            font-size: 12px;
            padding: 0.35em 1em;
            border-radius: 3px;
        }
        .content-instagram ul li .instagram-meta .like i, .content-instagram ul li .instagram-meta .comment i {
            font-size: 16px;
            margin-right: 4px;
        }
        .content-instagram ul li .instagram-meta .like:before, .content-instagram ul li .instagram-meta .comment:before {
            border-color: transparent;
        }
        #secondary .widget_btif_instagram_widget ul li .instagram-meta {
            background: transparent;
            top: 50%;
            transform: translatey(-50%);
        }
        #secondary .widget_btif_instagram_widget ul li .instagram-meta span {
            background: rgba(0,0,0,0.7);
            display: block;
            border-radius: 3px;
            margin: 0.35rem 0;
            padding: 0.35em 0.7em;
            font-size: 12px;
            font-weight: 700;
            text-align: center;
        }
        #secondary .widget_btif_instagram_widget ul li .instagram-meta i {
            float: none;
            margin-right: 5px;
            font-size: 14px;
        }
        #secondary .profile-link.customize-unpreviewable {
            margin: 0.5rem 1.5rem 0;
            text-align: center;
            display: block;
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            padding: .75em 1em;
            border-radius: 3px;
            line-height: 1em;
            color: #fff;
            text-decoration: none;
        }

        /* Social Link */
        .widget_bttk_social_links ul li {
            margin: 0 2px 5px;
            padding: 0;
        }
        .widget_bttk_social_links ul li a {
            width: 56px;
            height: 56px;
        }


        /* Footer */
        .site-footer .footer-t {
            font-size: 16px;
        }

        /* Footer Widget Styles */
        .site-footer .widget:last-child {
            margin-bottom: 0;
        }
        .site-footer .widget .widget-title {
            background-color: rgba(255,255,255,0.05);
            background: transparent;
            padding: 0;
            margin-bottom: 1.5rem;
        }
        .widget_bttk_popular_post ul li .entry-header .entry-title {
            line-height: 1.25em;
        }


        /* Single Post Styles */
        #primary .post .entry-content .highlight, #primary .page .entry-content .highlight {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }
        button, input[type="button"], input[type="reset"], input[type="submit"] {
            padding: 1.5em 2.25em;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            letter-spacing: 0.2em;
        }
        button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, button:focus, input[type="button"]:focus, input[type="reset"]:focus, input[type="submit"]:focus {
            border-color: transparent;
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }


        /* Category Post Slider Navigation */
        .widget_bttk_posts_category_slider_widget .owl-theme .owl-prev:hover, .widget_bttk_posts_category_slider_widget .owl-theme .owl-prev:focus, .widget_bttk_posts_category_slider_widget .owl-theme .owl-next:hover, .widget_bttk_posts_category_slider_widget .owl-theme .owl-next:focus {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        }

        /* Additional Styles for Other Pro Elements */

        /* Category Layout 2 */
        .category-layout-two .col .text-holder .holder {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $secondary_color ); ?>;
        }
        .category-layout-two .col .text-holder span {
            margin-bottom: 0;
        }

        /* Sticky Post 2 */
        #primary .post.sticky.sticky-layout-two .text-holder {
            background: linear-gradient(180deg, rgba(0,0,0,0) 30%, rgba(0,0,0,0.35) 100%);
        }
        #primary .post.sticky.sticky-layout-two .text-holder .entry-header .cat-links a {
            color: #111;
        }
        #primary .post.sticky.sticky-layout-two .text-holder .entry-header .cat-links a:hover {
            color: #fff;
        }
        #primary .sticky .text-holder .entry-header .entry-title {
            margin-bottom: 0.5rem !important;
        }
        #primary .post.sticky.sticky-layout-two .text-holder .entry-header .entry-meta {
            margin-bottom: 0;
        }
        <!-- #primary .post.sticky.sticky-layout-two .text-holder .entry-header .entry-meta a:hover {
            color: #f69581;
        } -->

        /* Blog Layout Default */
        .blog-layout-four #primary :not(.sticky).post .img-holder {
            margin-right: 2.5rem;
            max-width: 40%;
        }
        @media only screen and (max-width: 767px) {
            #primary .post.sticky.sticky-layout-two .text-holder {
                background: none;   
            }
            .blog.blog-layout-four #primary :not(.sticky).post .img-holder {
                max-width: 100%;
                margin-right: 0px;
            }
             .blog.blog-layout-four #primary :not(.sticky).post .img-holder img{
                width: 100%
            }
        }
        #primary .related-post .post .img-holder, 
        #primary .popular-post .post .img-holder {
            max-width: 100%;
            margin: 0;
        }
        #primary .post .text-holder .entry-header {
            margin-top: 0;
        }

        /* Blog Layout Four */
        .blog.blog-layout-four #primary .post .text-holder .entry-header .cat-links {
            margin-bottom: 0.75rem;
        }
        .blog.blog-layout-four #primary .post .text-holder .entry-header .entry-title {
            margin-bottom: 0.75rem;
        }

        /* Blog Layout Five */
        .blog.blog-layout-five #primary .site-main {
            grid-column-gap: 30px;
        }
        .blog.blog-layout-five #primary .post.sticky-layout-two .text-holder {
            padding-bottom: 30px;
        }
        .blog.blog-layout-five #primary :not(.sticky).post {
            margin-bottom: 2rem;
        }
        .blog.blog-layout-five #primary .post:after {
            background: linear-gradient(180deg, rgba(0,0,0,0) 30%, rgba(0,0,0,0.5) 100%);
        }
        .blog.blog-layout-five #primary :not(.sticky).post .img-holder {
            max-width: 100%;
        }
        .blog.blog-layout-five #primary .post .text-holder .entry-header .cat-links a {
            Color: #111;
        }
        .blog.blog-layout-five #primary .post .text-holder .entry-header .cat-links a:hover {
            color: #fff;
        }
        .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-title {
            margin-bottom: 0.5rem;
        }
        .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-meta a:hover {
            color: #f69581;
        }

        /* Slider Layout Two / Four */
        .slider-layout-two .text-holder .cat-links, .slider-layout-four .text-holder .cat-links {
            display: block;
            margin-bottom: 0.75rem;
        }
        .slider-layout-two .text-holder .cat-links a, .slider-layout-four .text-holder .cat-links a {
              background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $secondary_color ); ?>;
            border-radius: 3px;
            margin-bottom: 0.5em !important;
            padding: 0.35em 1em;
            font-size: 12px;
            line-height: 1em;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            text-decoration: none;
            font-weight: 700;
            color: #111;
            transition: all 0.2s ease-in-out;
        }
        .slider-layout-four .text-holder .cat-links a:hover, .slider-layout-two .text-holder .cat-links a:hover {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }

        @media only screen and (max-width: 1440px){

            .blog.blog-layout-two #primary .post .text-holder .entry-header{margin: 17px 0 0;}

        }

        @media only screen and (max-width: 1024px){
            
            .main-navigation ul li:first-child {
                margin-left: 15px;
            }
            .main-navigation ul ul li:first-child {
                margin-left: 0;
            }
            .main-navigation ul li a {
                display: block;
            }
            .main-navigation ul li.menu-item-has-children::after {
                display: none;
            }
            .main-navigation ul ul li a, 
            .main-navigation ul ul li:last-child > a {
                padding-left: 0;
                padding-right: 0;
            }
            .banner-layout-two .owl-nav .owl-next,
            .banner-layout-two .owl-nav .owl-prev{top: 67%;}

            .blog.blog-layout-two .site-main{grid-gap: 30px;}

            .blog.blog-layout-two #primary .post:not(.sticky) .text-holder .entry-header .entry-title{
                font-size: 22px;
                line-height: 1.454em;
            }

            .blog.full-width.blog-layout-two .site-main{
                grid-template-columns: repeat(2, 1fr);
            }

            .blog.full-width.blog-layout-two #primary .post.sticky,
            .blog.full-width.blog-layout-two .pagination{
                grid-column: 1 / span 2;
            }

            .blog.full-width.blog-layout-two.masonry #primary .post{
                width: 50%;
                padding: 0 15px;
            }

            .blog.full-width.blog-layout-two.masonry #primary .js-masonry{
                grid-column: 1 / span 2;
            }

            .blog.full-width.blog-layout-two.masonry #primary .site-main{grid-gap: 0;}

            .blog.full-width.blog-layout-two.masonry #primary .js-masonry{
                margin: 0 -15px;
            }

            .blog.full-width.blog-layout-two.masonry #primary .js-masonry .post{width: 50%;}

            .header-layout-two .header-b .main-navigation > div{max-width: 670px;}
            #primary, #secondary {
                width: 100%;
            }
        }

        @media only screen and (max-width: 767px){
            .blog.full-width.blog-layout-two .site-main{grid-gap: 30px;}
            .blog.full-width.blog-layout-two.masonry #primary .post{width: 100%;}
            #primary .post:not(.sticky) .img-holder {
                width: 100%;
                margin-right: 0;
            }
            #primary :not(.sticky).post .img-holder {
                margin-right: 0;
                max-width: 100%;
            }
        }

        @media only screen and (max-width: 600px){

            .blog.blog-layout-two #primary .post{
                grid-column: 1 / span 2;
            }

            .blog.full-width.blog-layout-two.masonry #primary .js-masonry .post{width: 100%;}
        }
    <?php } ?>  

    <?php if( $child_theme_support == 'mommy_blog') { ?>
    .promotional-block {
            background-color: #111;
            color: #fff;
        }
        .promotional-block .btn-get {
            background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.15em;
            color: #fff;
        }
        .promotional-block .btn-get:after {
            top: 1px;
            right: 1px;
            bottom: 1px;
            left: 1px;
            border-color: #111;
        }
        .header-t .tools .cart .count{
            color: #fff;
        }
        /* Site Structure */
        .container {
            max-width: 1170px;
        }
        .single-post .main-content {
            margin-top: 2rem;
        }
        .main-content {
            margin-top: 4rem;
        }

        /* Main Content */
        #primary {
            width: calc(100% - 330px);
        }

        #secondary {
            width: 330px;
        }

        /* Header */
        .header-m {
            padding: 3rem 0;
        }

        /* Main Navigation */
        .main-navigation ul li {
            margin: 0 15px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.075em;
        }
        .main-navigation ul li:first-child {
            margin-left: 0;
        }
        .main-navigation ul li a {
            display: inline-block;
        }
        .main-navigation ul li.menu-item-has-children:after {
            margin-left: 5px;
            position: relative;
            right: 0;
            display: inline-block
        }

        .main-navigation ul li.menu-item-has-children:after{
            top: 3px;
        }

        /* Sub Menu */
        .main-navigation ul .sub-menu li {
            position: relative;
            border-bottom: 1px solid #eee;
            margin: 0 15px 10px;
            padding: 0 8px 8px 0;
            line-height: 1.6em;
            text-transform: none;
            letter-spacing: normal;
        }
        .main-navigation ul .sub-menu li:last-child {
            border: 0;
            margin-bottom: 0;
            padding: 0;
        }
        .main-navigation ul ul li a {
            border: 0;
            margin: 0;
            padding: 0;
        }
        .main-navigation ul ul li.menu-item-has-children:after {
            position: absolute;
            right: 0;
        }

        /* Header Shop Cart */
        .header-holder .tools .cart .count {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
            width: 20px;
            height: 20px;
            line-height: 20px;
            font-weight: 700;
            top: -12px
        }
        /* Banner / Slider */
        .banner-layout-two {
            margin-top: 30px;
        }
        .banner-layout-two #banner-slider .owl-item:after{
            background: none;
        }
        .banner-layout-two .grid-holder {
            display: grid;
            grid-template-columns: 1fr 1fr 30px 1fr;
            grid-row-gap: 30px;
        }
        .banner-layout-two .grid-holder .grid-item:first-child {
            grid-column-start: 1;
            grid-column-end: 3;
            grid-row-start: 1;
            grid-row-end: 3;
        }
        .banner-layout-two .grid-item:first-child .text-holder .title {
            font-size: 40px;
            line-height: 1.208em;
        }

        .banner-layout-two .grid-item .text-holder .title a{
            color: #fff;
        }
        .banner-layout-two .grid-item .text-holder .title a:hover{
            text-decoration: none;
            transition: linear 0.2s;
        }
        .banner-layout-two .grid-item {
            position: relative;
        }
        .banner-layout-two .grid-holder .grid-item::before{
            display: none;
        }
        .owl-carousel .owl-item img {
            display: block;
            width: 100%;
        }
        .banner-layout-two img {
            height: auto;
        }
        .banner-layout-two .grid-holder .grid-item:nth-child(2) {
            grid-column-start: 4;
            grid-column-end: 5;
            grid-row-start: 1;
            grid-row-end: 2;
        }
        .banner-layout-two .grid-holder .grid-item:nth-child(3) {
            grid-column-start: 4;
            grid-column-end: 5;
            grid-row-start: 2;
            grid-row-end: 3;
        }
        .banner-layout-two .grid-item .text-holder {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            padding: 90px 30px 0;
            background: linear-gradient(to bottom, rgba(253,253,253,0) 0%,rgba(239,239,239,0.02) 6%,rgba(221,221,221,0.03) 11%,rgba(201,201,201,0.05) 16%,rgba(185,185,185,0.06) 20%,rgba(164,164,164,0.08) 25%,rgba(71,71,71,0.17) 45%,rgba(75,75,75,0.19) 46%,rgba(79,79,79,0.2) 47%,rgba(78,78,78,0.22) 48%,rgba(84,84,84,0.23) 49%,rgba(83,83,83,0.25) 50%,rgba(84,84,84,0.26) 51%,rgba(83,83,83,0.29) 53%,rgba(83,83,83,0.31) 54%,rgba(82,82,82,0.33) 55%,rgba(80,80,80,0.35) 56%,rgba(71,71,71,0.39) 58%,rgba(63,63,63,0.43) 60%,rgba(39,39,39,0.52) 65%,rgba(18,18,18,0.6) 70%,rgba(9,9,9,0.62) 72%,rgba(0,0,0,0.66) 75%,rgba(0,0,0,0.69) 78%,rgba(0,0,0,0.77) 88%,rgba(0,0,0,0.81) 100%);
            color: #fffl
        }
        .banner-text .cat-links {
            display: block;
            margin-bottom: 0.75em;
        }
        .banner .banner-text .cat-links a{
            color: #000;
        }
        .banner .banner-text .cat-links a:hover{
            color: #fff;
        }
        .banner-layout-two .grid-item .text-holder .title {
            font-size: 28px;
            line-height: 1.214em;
            color: #fff;
            font-family: <?php echo wp_kses_post( $secondary_fonts['font'] ); ?>;
            font-weight: 700;

        }
        .banner-text .cat-links a {
            background-color: #F2F7F6;
            border-radius: 3px;
            margin-bottom: 0.5em !important;
            padding: 0.35em 1em;
            font-size: 12px;
            line-height: 1em;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            text-decoration: none;
            font-weight: 700;
            color: #111;
            transition: all 0.2s ease-in-out;
        }
        .banner .banner-text .cat-links a:hover {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }
        .banner .banner-text {
            bottom: 80px;
        }
        .banner .banner-text .title {
            margin-bottom: 0;
        }
        .slider-layout-one .owl-item:after, .slider-layout-three .owl-item:after {
            background-image: linear-gradient(180deg, rgba(0,0,0,0) 60%, rgba(0,0,0,0.5) 100%);
        }

        .category-section .col .img-holder:hover .text-holder{
                border-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        }

        /* Slider Navigation */
        .banner .owl-nav .owl-prev, .banner .owl-nav .owl-next {
            background-color: #111;
            transition: all 0.2s ease-in-out;
        }
        .banner .owl-nav .owl-prev:hover, .banner .owl-nav .owl-next:hover {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        }

        /* Category Layout */
        .category-section .col .img-holder .text-holder {
            border-color: #fff;
            transition: all 0.2s ease-in-out;
            width: 80%;                             
        }


        .category-section .col .img-holder .text-holder span {
            background-color: #fff;
            font-size: 0.67em;
            font-weight: 700;
            letter-spacing: 0.2em;
            color: #111;
            transition: all 0.3s ease-out;
            padding: 12px;
            text-align: center;
        }
        .category-section .col .img-holder:hover .text-holder span {
            background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }
        .category-section {
            margin: 4rem 0;
        }

        .blog.blog-layout-four #primary .post{
            margin: 0 0 30px;
        }
        #primary .post.sticky, .blog.blog-layout-four #primary .post.sticky{
            margin: 0 0 60px;
        }
        .blog.blog-layout-four #primary :(.sticky).post .img-holder{
            width: auto;
            margin-right: 30px;
        }

        .blog.blog-layout-four #primary .post .text-holder .entry-header .entry-title{
            font-size: 30px;
            line-height: 1.208em;
            margin: 0 0 15px;
        }
        .blog.blog-layout-four #primary .post.sticky .text-holder .entry-header .entry-title{
            font-size: 44px;
        }

        .blog.blog-layout-four #primary .post .text-holder .entry-header .cat-links{margin: 0 0 0.75rem;}

        .blog.blog-layout-four #primary .post .text-holder{position: relative;}

        .blog.blog-layout-four #primary .post.sticky.sticky-layout-two .text-holder{position: absolute;}

        .blog.blog-layout-four #primary .post .text-holder p{margin: 0 0 15px;}

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .share{
            float: none;
            display: inline-block;
            color: #666;
            margin: 0 0 0 15px;
            cursor: pointer;
            position: relative;
            padding: 0 0 10px;
        }

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta a:hover{
            text-decoration: none;
        }

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .share > svg{
            color: #111;
            margin-right: 5px;
        }

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .share .social-networks{
            position: absolute;
            top: 24px;
            right: 0;
            display: none;
        }

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .share:hover .social-networks,
        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .share:focus .social-networks{display: block;}

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .share .social-networks:before{
            position: absolute;
            top: -5px;
            right: 35px;
            width: 12px;
            height: 12px;
            background: #f5f5f5;
            border: 1px solid #eee;
            content: '';
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .share .social-networks ul{
            margin: 0;
            padding: 13px 7px 10px 9px;
            list-style: none;
            font-size: 14px;
            line-height: 1.142em;
            background: #f5f5f5;
            border: 1px solid #eee;
            display: flex;
            position: relative;
        }

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .share .social-networks li{
            display: inline-block;
            margin: 0 4px;
        }

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .share .social-networks li a{
            color: #333;
            -webkit-transition: linear 0.1s;
            -moz-transition: linear 0.1s;
            transition: linear 0.1s;
        }

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .share .social-networks li a:hover,
        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .share .social-networks li a:focus{
            text-decoration: none;
            color: #f3c9dd;
        }

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta{
            font-size: 14px;
            line-height: 21px;
            color: #999;
            margin: 0 0 17px;
        }

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta{
            margin: 0 0 22px;
        }

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .byline{margin-right: 5px;}

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .comments{margin: 0 0 0 15px;}

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .comments svg{
            margin-right: 9px;
            color: #111;
        }

        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta a{
            color: #666;
            -webkit-transition: linear 0.1s;
            -moz-transition: linear 0.1s;
            transition: linear 0.1s;
        }

        /* Sticky Post */
        #primary .post.sticky {
            margin-bottom: 60px;
        }

        #primary .post.sticky .text-holder .entry-header .entry-meta {
            margin-bottom: 1rem;
        }

        #primary .post .text-holder .entry-header .cat-links {
            margin-bottom: .75rem;
        }
        #primary .post .text-holder .entry-header .cat-links a, .single-post-layout-two .entry-header .cat-links a,.single-post-layout-three .entry-header .cat-links a, .single-post-layout-five .entry-header .cat-links a {
            background-color: #F2F7F6;
            border-radius: 3px;
            margin-bottom: 0.5em !important;
            margin-right: 0.15em;
            padding: 0.35em 0.75em;
            font-size: 12px;
            line-height: 1em;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            text-decoration: none;
            font-weight: 700;
            color: #111;
            transition: all 0.2s ease-out;
        }
        #primary .post .text-holder .entry-header .cat-links a:hover, .single-post-layout-two .entry-header .cat-links a:hover, .single-post-layout-three .entry-header .cat-links a:hover, .single-post-layout-five .entry-header .cat-links a:hover{
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
            text-decoration: none;
        }

        /* Post Title */
        #primary .post .text-holder .entry-header .entry-title {
            letter-spacing: -0.025em;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 24px;
        }
        /* Post Meta */
        #primary .post .text-holder .entry-header .entry-meta a:hover, .blog.blog-layout-five #primary .post .text-holder .entry-header .cat-links a, .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta a:hover, .single-post-layout-two .entry-header .entry-meta a:hover, .single-post-layout-three .entry-header .entry-meta a:hover, .single-post-layout-five .entry-header .entry-meta a:hover {
            color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            text-decoration: none;
        }
        
        #primary .post .text-holder .entry-footer .btn-readmore {
            background-color: #111;
            font-size: 12px;
            font-weight: 700;
            line-height: 1em;
            padding: 1.5em 2.25em;
            border-radius: 0;
            letter-spacing: 0.2em;
        }
        #primary .post .text-holder .entry-footer .btn-readmore:after {
            border-radius: 0;
        }
        /* Pagination */
        .navigation.pagination .nav-links .page-numbers {
            width: 3rem;
            height: 3rem;
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            padding: 0;
            line-height: 3rem;
        }
        span.page-numbers.current{
            color: #fff;
        }
        .pagination .current {
            background-color: #F2F7F6;
            border-color: #F2F7F6;
            color: #111;
        }
        .pagination a {
            border-color: #F2F7F6;
        }

        /* Sidebar */
        #secondary {
            font-size: 16px;
        }

        /* Widget Styles */
        .widget .widget-title {
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            letter-spacing: 0.2em;
            background: #F2F7F6;
            padding: 20px;
            margin-bottom: 2em;
        }
        .widget .widget-title:after {
            display: none;
        }
        .widget ul li {
            margin-bottom: 0.5em;
            padding-bottom: 0.5em;
            line-height: 1.5em;
        }
        .widget ul li .entry-header .entry-title,
        .widget_bttk_posts_category_slider_widget .carousel-title .title {
            font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>
            font-weight: 700;
            margin: 0 0 0.35em 0;
        }
        .widget_bttk_popular_post .style-two li, .widget_bttk_pro_recent_post .style-two li, .widget_bttk_popular_post .style-three li, .widget_bttk_pro_recent_post .style-three li {
            padding-bottom: 0;
            margin-bottom: 1.5rem;
        }
        .widget_bttk_popular_post .style-two li:last-child, .widget_bttk_pro_recent_post .style-two li:last-child, .widget_bttk_popular_post .style-three li:last-child, .widget_bttk_pro_recent_post .style-three li:last-child {
            margin-bottom: 0;
        }
        .widget_bttk_popular_post .style-two li .entry-header .cat-links, .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links, .widget_bttk_popular_post .style-three li .entry-header .cat-links, .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links {
            margin-bottom: 0.5rem;
        }
        .widget_bttk_popular_post .style-two li .entry-header .cat-links a, .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a, .widget_bttk_popular_post .style-three li .entry-header .cat-links a, .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a, .widget_bttk_posts_category_slider_widget .carousel-title .cat-links a {
            background-color: #F2F7F6;
            display: inline-block;
            padding: 0.35em 0.7em;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            color: #111;
            border-radius: 3px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            text-decoration: none !important;
            transition: all 0.2s ease-in-out;
        }
        .widget_bttk_popular_post .style-two li .entry-header .cat-links a:hover, .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a:hover, .widget_bttk_popular_post .style-three li .entry-header .cat-links a:hover, .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a:hover, .widget_bttk_posts_category_slider_widget .carousel-title .cat-links a:hover {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }
        .widget_bttk_popular_post ul li .entry-header .entry-title {
            font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>
            font-weight: 700;
        }

        /* About Widget */
        .widget_bttk_author_bio .text-holder {
            padding: 30px;
        }
        .widget_bttk_popular_post ul li .entry-header .entry-title {
            font-size: 16px;
        }
        .widget_bttk_author_bio .title-holder {
            margin-bottom: 0.75rem;
            font-size: 1.25rem;
            font-weight: 700;
            font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>
        }

        /* Category Widget */
        .widget.widget_bttk_custom_categories ul li {
            padding-bottom: 0;
        }
        .widget_bttk_custom_categories ul li .cat-title {
            padding-top: 0;
            line-height: 48px;
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.15em;
        }
        .widget_bttk_custom_categories ul li a:hover .post-count, .widget_bttk_custom_categories ul li a:hover:focus .post-count{
            color: #fff;
        }
        /* Newsletter */
        .content-newsletter .blossomthemes-email-newsletter-wrapper {
            flex-flow: column wrap;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper.bg-img:after, .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper:after {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            opacity: 0.9;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper .text-holder {
            max-width: 700px;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper .text-holder h3{
            font-size: 28px;
            margin-bottom: 10px;
        }
        .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper .text-holder{
            margin-bottom: 10px;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3, .content-newsletter .blossomthemes-email-newsletter-wrapper .text-holder span {
            color: #fff;
            margin-bottom: 10px;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"] {
            height : 48px;
            line-height: 46px;
            padding: 0 0.75em;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"] {
            width: auto;
            padding: 0 2.25em;
            height: 48px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.2em;
            line-height: 48px;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"]:hover, .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"]:focus {
            background-color: #F2F7F6;
            border-color: #F2F7F6;
        }

        /* Instagram */
        .content-instagram .profile-link {
            background-color: #111;
            padding: 2em 3em;
            font-size: 12px;
            font-weight: 700;
            line-height: 1em;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: #fff;
        }
        .content-instagram ul li .instagram-meta .like, .content-instagram ul li .instagram-meta .comment{
            background-color: rgba(0,0,0,0.7);
            font-size: 12px;
            padding: 0.35em 1em;
            border-radius: 3px;
        }
        .content-instagram ul li .instagram-meta .like i, .content-instagram ul li .instagram-meta .comment i {
            font-size: 16px;
            margin-right: 4px;
        }
        .content-instagram ul li .instagram-meta .like:before, .content-instagram ul li .instagram-meta .comment:before {
            border-color: transparent;
        }
        #secondary .widget_btif_instagram_widget ul li .instagram-meta {
            background: transparent;
            top: 50%;
            transform: translatey(-50%);
        }
        #secondary .widget_btif_instagram_widget ul li .instagram-meta span {
            background: rgba(0,0,0,0.7);
            display: block;
            border-radius: 3px;
            margin: 0.35rem 0;
            padding: 0.35em 0.7em;
            font-size: 12px;
            font-weight: 700;
            text-align: center;
        }
        #secondary .widget_btif_instagram_widget ul li .instagram-meta i {
            float: none;
            margin-right: 5px;
            font-size: 14px;
        }
        #secondary .profile-link.customize-unpreviewable {
            margin: 0.5rem 1.5rem 0;
            text-align: center;
            display: block;
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            padding: .75em 1em;
            border-radius: 3px;
            line-height: 1em;
            color: #fff;
            text-decoration: none;
        }

        /* Social Link */
        .widget_bttk_social_links ul li {
            margin: 0 2px 5px;
            padding: 0;
        }
        .widget_bttk_social_links ul li a {
            width: 56px;
            height: 56px;
        }


        /* Footer */
        .site-footer .footer-t {
            font-size: 16px;
        }

        /* Footer Widget Styles */
        .site-footer .widget:last-child {
            margin-bottom: 0;
        }
        .site-footer .widget .widget-title {
            background-color: rgba(255,255,255,0.05);
            background: transparent;
            padding: 0;
            margin-bottom: 1.5rem;
        }
        .widget_bttk_popular_post ul li .entry-header .entry-title {
            line-height: 1.25em;
        }


        /* Single Post Styles */
        #primary .post .entry-content .highlight, #primary .page .entry-content .highlight, .widget_calendar caption {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }
        button, input[type="button"], input[type="reset"], input[type="submit"] {
            padding: 1.5em 2.25em;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            letter-spacing: 0.2em;
        }
        button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, button:focus, input[type="button"]:focus, input[type="reset"]:focus, input[type="submit"]:focus {
            border-color: transparent;
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }


        /* Category Post Slider Navigation */
        .widget_bttk_posts_category_slider_widget .owl-theme .owl-prev:hover, .widget_bttk_posts_category_slider_widget .owl-theme .owl-prev:focus, .widget_bttk_posts_category_slider_widget .owl-theme .owl-next:hover, .widget_bttk_posts_category_slider_widget .owl-theme .owl-next:focus {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        }

        /** CTA Widget */
        #secondary .widget_blossomtheme_companion_cta_widget .blossomtheme-cta-container, #secondary .widget_blossomtheme_companion_cta_widget .widget-title{
            color: #000;
        }

        /* Additional Styles for Other Pro Elements */

        /* Category Layout 2 */
        .category-layout-two .col .text-holder .holder {
            background-color: #F2F7F6;
        }
        .category-layout-two .col .text-holder span {
            margin-bottom: 0;
        }

        /* Sticky Post 2 */
        #primary .post.sticky.sticky-layout-two .text-holder {
            background: linear-gradient(180deg, rgba(0,0,0,0) 30%, rgba(0,0,0,0.8) 100%);
        }
        #primary .post.sticky.sticky-layout-two .text-holder .entry-header .cat-links a {
            color: #111;
        }
        #primary .post.sticky.sticky-layout-two .text-holder .entry-header .cat-links a:hover {
            color: #fff;
        }
        #primary .sticky .text-holder .entry-header .entry-title {
            margin-bottom: 0.5rem !important;
            font-size: 44px;
        }
        #primary .post.sticky.sticky-layout-two .text-holder .entry-header .entry-meta {
            margin-bottom: 0;
        }
        
        .blog.blog-layout-four #primary .post.sticky {
            margin-bottom: 4rem;
        }


        /* Blog Layout Default */
        .blog-layout-four #primary :not(.sticky).post .img-holder {
            margin-right: 2.5rem;
            max-width: 40%;
        }
        #primary .post .text-holder .entry-header {
            margin-top: 0;
        }

        /* Blog Layout Two */
        .banner-layout-two .grid-item .text-holder .title {
            font-weight: 500;
        }





        /* Slider Layout Two / Four */
        .banner-layout-two .grid-holder .grid-item::before {
            content: '';
            background: linear-gradient(180deg, rgba(0,0,0,0) 60%, rgba(0,0,0,0.6) 100%);
            background: rgba(0,0,0,0.5);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        .banner-layout-two .grid-item .text-holder {
            z-index: 2;
        }
        .slider-layout-two .text-holder .cat-links, .slider-layout-four .text-holder .cat-links {
            display: block;
            margin-bottom: 0.75rem;
        }
        .slider-layout-two .text-holder .cat-links a, .slider-layout-four .text-holder .cat-links a {
              background-color: #F2F7F6;
            border-radius: 3px;
            margin-bottom: 0.5em !important;
            padding: 0.35em 1em;
            font-size: 12px;
            line-height: 1em;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            text-decoration: none;
            font-weight: 700;
            color: #111;
            transition: all 0.2s ease-in-out;
        }
        .slider-layout-four .text-holder .cat-links a:hover, .slider-layout-two .text-holder .cat-links a:hover {
            background-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
            color: #fff;
        }
        .slider-layout-two .owl-nav .owl-prev{
            left: -90px;
        }
        .slider-layout-two .owl-nav .owl-next{
            right: -90px;
        }

        /* Single Post */
        #primary .related-post :not(.sticky).post .img-holder,
        #primary .popular-post :not(.sticky).post .img-holder {
            max-width: 100%;
        }

        .blog.blog-layout-three #primary .post .img-holder {
            margin-bottom: 10px;
        }

        .blog.blog-layout-five #primary .post.sticky-layout-one .text-holder .entry-header .cat-links a:hover, .blog.blog-layout-five #primary .post .text-holder .entry-header .cat-links a:hover{
                color: #fff;
        }
    
        

        @media only screen and (max-width: 1590px) {
            .banner-layout-two .owl-nav .owl-prev {
                left: 0;
            }
            .banner-layout-two .owl-nav .owl-next {
                right: 0;
            }
        }
        @media screen and (max-width: 1199px) {
            .banner-layout-two .grid-item:first-child .text-holder .title {
                font-size: 38px;
                line-height: 48px;
                line-height: 1.263em;
            }

            .banner-layout-two .grid-item .text-holder .title {
                font-size: 20px;
                line-height: 28px;
                line-height: 1.4em;
            }

            .site-footer .footer-t .col {
                margin-top: 60px;
            }

            .site-footer .footer-t .col:first-child, 
            .site-footer .footer-t .col:nth-child(2) {
                margin-top: 0;
            }

        }

        @media screen and (max-width: 1024px) {
            #primary, #secondary {
                width: 100%;
            }

            .main-navigation ul li {
                display: block;
                margin: 0;
                padding: 0;
                overflow: hidden;
            }

            .main-navigation ul li a {
                color: #666;
                padding: 10px 0;
                border-bottom: 1px solid #eee;
                position: relative;
                display: block;
            }

            .main-navigation ul li.menu-item-has-children::after {
                display: none;
            }

            .main-navigation ul .sub-menu li {
                margin: 0;
            }

            .main-navigation ul ul li a {
                padding: 10px 0;
            }

            .banner-layout-two .grid-holder {
                grid-template-columns: repeat(4, 1fr);
                grid-gap: 10px;
            }

            .banner-layout-two .grid-holder .grid-item:first-child {
                grid-column-start: 1;
                grid-column-end: 5;
                grid-row-start: 1;
                grid-row-end: 2;
            }

            .banner-layout-two .grid-holder .grid-item:nth-child(2) {
                grid-column-start: 1;
                grid-column-end: 3;
                grid-row-start: 2;
                grid-row-end: 3;
            }

            .banner-layout-two .grid-holder .grid-item:nth-child(3) {
                grid-column-start: 3;
                grid-column-end: 5;
                grid-row-start: 2;
                grid-row-end: 3;
            }
        }

        @media screen and (max-width: 767px) {
            .blog.blog-layout-four #primary :not(.sticky).post .img-holder {
                max-width: 100%;
                margin-right: 0px;
            }


            .blog.blog-layout-four #primary :not(.sticky).post .img-holder img{
                width: 100%;
            } 
            #primary .post, .blog.blog-layout-two #primary :not(.sticky).post {
                display: flex;
            }

            #primary :not(.sticky).post .img-holder {
                max-width: 40%;
            }
            .blog.blog-layout-three #primary .post .img-holder {
                margin-bottom: 0px;
            }

            .site-footer .footer-t .col:nth-child(2) {
                margin-top: 60px;
            }

        }

        @media screen and (max-width: 600px) {
            .banner-layout-two .grid-holder {
                grid-template-columns: 1fr;
            }

            .banner-layout-two .grid-holder .grid-item:nth-child(2) {
                grid-column-start: 1;
                grid-column-end: 5;
                grid-row-start: 2;
                grid-row-end: 3;
            }

            .banner-layout-two .grid-holder .grid-item:nth-child(3) {
                grid-column-start: 1;
                grid-column-end: 5;
                grid-row-start: 3;
                grid-row-end: 4;
            }

            .banner-layout-two .grid-item:first-child .text-holder {
                padding-left: 15px;
                padding-right: 15px;
            }

            .banner-layout-two .grid-item:first-child .text-holder .title {
                font-size: 20px;
                line-height: 28px;
                line-height: 1.4em;
            }
        }

        @media screen and (max-width: 480px) {
           #primary .post, .blog.blog-layout-two #primary :not(.sticky).post {
                display: block;
                margin-right: 0px;
            }

            .blog.blog-layout-four #primary :not(.sticky).post .img-holder {
                max-width: 100%;
                margin-bottom: 30px;
            }

            #primary :not(.sticky).post .img-holder, .blog.blog-layout-two #primary :not(.sticky).post .img-holder{
                max-width: 100%;
                margin-right: 0px;
            } 
        }


    <?php } ?>

<?php if( $child_theme_support == "blossom_beauty" ) { ?>

    .container {
        max-width: 1170px;
        padding: 0 15px;
    }
    .single-post .main-content {
        margin-top: 2rem;
    }
    .main-content {
        margin-top: 80px;
    }
    #primary {
        width: calc(100% - 330px);
    }
    #secondary {
        width: 330px;
    }
    /* Header */
    .header-m {
        padding: 3rem 0;
    }
    .banner .owl-nav .owl-prev,
    .banner .owl-nav .owl-next{
        border-radius: 100%;
        height:50px;
        width: 50px;
    }
    .slider-layout-three img{
        opacity: 0.5;
    }
    .slider-layout-three .active img{
        opacity: 1;
    }
    .main-navigation ul li{
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 700;   
    }
    .main-navigation ul ul li a{
        font-size: 12px;
    }
    .secondary-nav ul li a{
        font-size: 14px;
        font-weight: 600;
        padding: 11px 0;
    }
    .secondary-nav ul{
        line-height: unset;
    }
    .header-t .social-networks{
        font-size: 15px;
        margin-top: 5px;
    }
    .header-t .right{
        margin: 11px 0;
    }
    .svg-inline--fa{
        width: 15px;
    }
    .header-t .tools{
        padding-left: 14px;
    }
    .banner .banner-text .title{
        font-size: 56px;
        font-weight: 400;
        margin-bottom: 0;
    }
    .banner.banner-layout-three .banner-text{
        width: 100%;
        max-width: unset;
        padding: 0 100px;
        bottom: 0;
        margin-bottom: 60px;
    }

    #banner-slider .owl-item:after{
        background: -webkit-gradient(linear,left top,left bottom,from(hsla(0,0%,100%,0)),to(rgba(0,0,0,.3)));
        background: linear-gradient(180deg,hsla(0,0%,100%,0),rgba(0,0,0,.3));
    }
    .featured-area{
        background: #E5EAEB;
    }
    .category-section.category-layout-two .col .img-holder:after{
        display: none;
    }
    .category-section.category-layout-two .col .img-holder:hover img, .category-section .col .img-holder:focus img{
        transform: none;
    }
    .category-section{
        padding:100px 0;
        margin-bottom: 80px;
    }
    .category-section .col .img-holder{
        overflow: hidden;
    }
    .category-section.category-layout-two .col .img-holder .text-holder{
        top: 100%;
    }
    .category-section .col .img-holder .text-holder,
    .category-layout-two .col .text-holder{
        width: 86.48%;
        padding:2px;
        border-color: rgba(0,0,0, 0.5);
    }
    .category-section .col .img-holder .text-holder span{
        padding:22px;
        font-size: 14px;
        font-weight: bold;
        line-height: 1;
        text-align: center;
        background: rgba(0,0,0, 0.5);
    }
    .category-section .col .img-holder:hover .text-holder,
    .category-section .col .img-holder:hover .text-holder span{
        transition: all 0.3s ease-in-out;
    }
    .category-layout-two .col .text-holder{
        box-shadow: none;
        margin: -32px 24px 0;
        border: 1px solid #121212;
        background: transparent;
    }
    .category-layout-two .col .text-holder .holder{
        padding: 0;
        background: #121212;
    }
    .category-layout-two .col .text-holder .holder span{
        line-height: 1;
        font-size: 14px;
        padding: 22px;
        font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
        font-weight: bold;
        margin-bottom: 0;
        text-transform: uppercase;
        color: #fff;
    }
    .pagination a,
    .category-section .col .img-holder:hover .text-holder span,
    .category-layout-two .col:hover .text-holder .holder{
        background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        transition: all 0.3s ease-in-out;
    }
    .category-layout-two .col:hover .text-holder{
        border-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        transition: all 0.3s ease-in-out;
    }
    #primary .post .text-holder .entry-header .cat-links,
    #primary .post.sticky .text-holder .entry-header .cat-links{
        text-align: center;
    }
    #primary .post .text-holder .entry-header .cat-links a,
    .widget_bttk_popular_post .style-two li .entry-header .cat-links a, 
    .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a,
    .widget_bttk_popular_post .style-three li .entry-header .cat-links a, 
    .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a,
    .banner .banner-text .cat-links a,
    .widget_bttk_popular_post .style-two li .entry-header .cat-links a, 
    .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a, 
    .widget_bttk_popular_post .style-three li .entry-header .cat-links a, 
    .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a, 
    .widget_bttk_posts_category_slider_widget .carousel-title .cat-links a,
    .slider-layout-two .cat-links a,
    .banner-layout-four .text-holder .cat-links a{
        padding: 5px 10px;
        <?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
        color: #121212;
        text-transform: uppercase;
        font-size: 11px;
        font-weight: bold;
        letter-spacing: 0.15em;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 2px;
        line-height: 1;
     }
     .banner .banner-text .cat-links a,
     .slider-layout-two .cat-links a,
     .banner-layout-four .text-holder .cat-links a,
     #primary .post.sticky.sticky-layout-two .text-holder .entry-header .cat-links a{
        background: #fff;
        margin-right: 2px;
     }
     #primary .post.sticky.sticky-layout-two .text-holder .entry-header .cat-links a{
        color: #121212;
    }
     .archive #primary .post .text-holder .entry-header .cat-links {
        float: none;
    }
     #primary .post .text-holder .entry-header .cat-links a:hover,
     #primary .post .text-holder .entry-header .cat-links a:focus,
     .widget_bttk_popular_post .style-two li .entry-header .cat-links a:hover, 
     .widget_bttk_popular_post .style-two li .entry-header .cat-links a:focus,
    .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a:hover,
    .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a:focus,
    .widget_bttk_popular_post .style-three li .entry-header .cat-links a:hover,
    .widget_bttk_popular_post .style-three li .entry-header .cat-links a:focus,
    .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a:hover,
    .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a:focus,
    .banner .banner-text .cat-links a:hover,
    .banner .banner-text .cat-links a:focus,
    .widget_bttk_popular_post .style-two li .entry-header .cat-links a:hover,
    .widget_bttk_popular_post .style-two li .entry-header .cat-links a:focus,
    .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a:hover, 
    .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a:focus,
    .widget_bttk_popular_post .style-three li .entry-header .cat-links a:hover, 
    .widget_bttk_popular_post .style-three li .entry-header .cat-links a:focus,
    .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a:hover, 
    .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a:focus,
    .widget_bttk_posts_category_slider_widget .carousel-title .cat-links a:hover,
    .widget_bttk_posts_category_slider_widget .carousel-title .cat-links a:focus,
    .slider-layout-two .cat-links a:hover,
    .slider-layout-two .cat-links a:focus,
    .banner-layout-four .text-holder .cat-links a:hover,
    .banner-layout-four .text-holder .cat-links a:focus,
    #primary .post.sticky.sticky-layout-two .text-holder .entry-header .cat-links a:hover,
    #primary .post.sticky.sticky-layout-two .text-holder .entry-header .cat-links a:focus{
        text-decoration: none;
        color: #fff;
        transition: all 0.2s ease-in-out;
        background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
     #primary .post .text-holder .entry-header .entry-title, 
     .archive .blossom-portfolio .entry-header .entry-title,
     #primary .sticky .text-holder .entry-header .entry-title,
     #primary .post .text-holder .entry-header .entry-title{
        font-weight: 400;
        font-size: 40px;
        color: #121212;
        text-align: center;
        line-height: 1.25em;
     }
     #primary .sticky .text-holder .entry-header .entry-title,{
        line-height: 1.25em;
     }
     #primary .sticky .text-holder .entry-header .entry-title,
     #primary .post .text-holder .entry-header .entry-title, 
     .archive .blossom-portfolio .entry-header .entry-title{
        margin-bottom: 15px;
     }
     #primary .post.sticky .text-holder .entry-header .entry-meta{
        margin-bottom: 25px;
     }
     #primary .post.sticky .text-holder .entry-header .entry-meta,
     #primary .post .text-holder .entry-header .entry-meta{
        text-align: center;
     }
     #primary .post .text-holder .entry-header .entry-meta a{
        color: #121212;
     }
     #primary .post .text-holder .entry-header .entry-meta a:hover{
        text-decoration: none;
     }
     .home #primary .post .text-holder .entry-content,
     .blog #primary .post .text-holder .entry-content,
     footer.entry-footer{
        text-align: center;
     }
     .home #primary .post:not(.sticky) .img-holder,  
     .blog #primary .post:not(.sticky) .img-holder{
        width: 320px;
        height: 320px;
        margin-right: 50px;
     }
     #primary .post .text-holder .entry-footer .btn-readmore{
        float: none;
     }
     #primary .post .text-holder .entry-footer .btn-readmore,
     #primary .post .text-holder .entry-footer .btn-readmore:hover,
     #primary .post .text-holder .entry-footer .btn-readmore:focus{
        background: transparent !important;
     }
     #primary .post .text-holder .entry-footer .btn-readmore:hover svg path,
     #primary .post .text-holder .entry-footer .btn-readmore:focus svg path{
        transition: all 0.3s ease-in-out;
     }
     #primary .post .text-holder .entry-header .entry-meta .comments svg {
        margin-right: 7px;
        vertical-align: middle;
    }
    #primary .post.sticky{
        margin:0;
    }
    .home #primary .post, 
    .blog #primary .post{
        margin: 0;
        padding: 45px 0;
        border-bottom:1px solid #EEEEEE;
        align-items: center;
    }
    #primary .post.sticky{
        padding-top: 0;
    }
    .blog.blog-layout-four #primary .post .img-holder {
        margin-right: 30px;
    }
    .blog:not(.full-width).blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .byline{
        display: none;
    }
    #primary .post .text-holder .entry-footer .share{
        margin-top: 5px;
    }
    .blog.blog-layout-four #primary .post .text-holder .entry-header,
    .blog.blog-layout-four #primary .post{
        margin: 0;
    }
    #primary .post .text-holder .entry-header .entry-title a, 
    .archive .blossom-portfolio .entry-header .entry-title a,
    #primary .post .text-holder .entry-header .entry-meta a{
        color: #121212;
    }
    .blog.blog-layout-three #primary .post .text-holder .entry-header .cat-links{
        float: none;
        margin-bottom: 0;
    }
    #primary .post .text-holder .entry-footer .btn-readmore{
        padding: 5px;
    }
    .blog.blog-layout-three #primary .post{
        padding: 0;
    }
    .blog.blog-layout-three #primary .post .img-holder,
    .blog.blog-layout-five #primary .post .img-holder{
        margin-right: 0;
        width: 100%;
        height: auto;
    }
    .blog.blog-layout-three #primary .post .text-holder .entry-header .share{
        float: none;
        text-align: center;
    }
    .blog.blog-layout-three #primary .post .text-holder .entry-header .share .social-networks{
        right: 130px;
    }
    .blog.blog-layout-three #primary .post .text-holder .entry-header .entry-meta .byline{
        display: none;
    }
    .blog.blog-layout-five #primary .post.sticky .text-holder .entry-header .cat-links{
        float: none;
        text-align: center;
    }
    .blog.blog-layout-five #primary .post.sticky-layout-one .text-holder .entry-header .cat-links a,
    .blog.blog-layout-five #primary .post .text-holder .entry-header .cat-links a{
        color: #121212;
    }
    .blog.blog-layout-five #primary .post.sticky-layout-one .text-holder .entry-header .cat-links a:hover{
        color: #fff;
    }
    .blog.blog-layout-five #primary .post:not(.sticky) .text-holder .entry-header .cat-links a{
        background: #fff;
    }
    .blog.blog-layout-five #primary .post .text-holder .entry-header .cat-links a:hover{
        background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        color: #fff;
    }
    .blog.blog-layout-five #primary .post .text-holder .entry-header .share{
        padding-top: 5px;
    }
    .blog.blog-layout-five #primary .post .text-holder .entry-header .share .social-networks{
        top: 30px;
    }
    .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-meta .comments svg path,
    #primary .post.sticky.sticky-layout-two .text-holder .entry-header .entry-meta span.comments span.comments svg path,
    .single-post-layout-two .entry-header .entry-meta .comments svg path,
    .single-post-layout-three .entry-header .entry-meta .comments svg path,
    .single-post-layout-five .entry-header .entry-meta .comments svg path{
        fill: rgba( 255, 255, 255, 0.7 );
    }
    #primary .post.sticky.sticky-layout-two .text-holder .entry-header .entry-meta .share,
    #primary .post.sticky.sticky-layout-two .text-holder .entry-header .entry-meta .comments svg{
        color: unset;
    }
    .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-meta .share .social-networks svg path{
        fill: #333;
    }
    
    .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-meta .share svg:hover path{
        fill: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    .blog.blog-layout-five #primary .post .text-holder{
        padding: 0 25px;
    }
    .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-meta .comments{
        margin:unset;
    }
    .blog.blog-layout-five #primary .post{
        padding: 0;
        margin-bottom: 30px;
    }
    .blog.blog-layout-five #primary .post.sticky{
        margin-bottom: 30px;
    }
    .blog.blog-layout-five #primary .site-main{
        grid-column-gap: 30px;
    }
    .blog.blog-layout-five #primary .post.sticky-layout-one .text-holder .entry-footer .btn-readmore {
        display: inline-block;
    }
    #primary .post.sticky .text-holder .entry-header .entry-meta span a{
        margin-right: 10px;
    }
    .single-post-layout-two .entry-header .entry-meta .comments svg,
    .single-post-layout-three .entry-header .entry-meta .comments svg,
    .single-post-layout-five .entry-header .entry-meta .comments svg{
        vertical-align: middle;
    }
    .single-post-layout-two .entry-header .entry-meta span:hover a,
    .single-post-layout-three .entry-header .entry-meta span:hover a,
    .single-post-layout-five .entry-header .entry-meta span:hover a{
        text-decoration: none;
        color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    .single-post-layout-two .entry-header .entry-title,
    .single-post-layout-three .entry-header .entry-title,
    .single-post-layout-five .entry-header .entry-title{
        font-weight: 400;
    }
    #blossom-top{
        border-radius: 100%;
    }
    #blossom-top:after{
        border: none;
    }
    .pagination{
        margin-top: 45px;
    }
    .pagination a{
        background: transparent;
    }
    .pagination .current:after, 
    .pagination a:after{
        border:none;
        top:50%;
        left:50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);

    }
    .pagination .current, 
    .pagination a{
        font-weight: 800;
        font-size: 16px;
        height: 48px;
        border:2px solid <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        margin-right: 10px;
        line-height: 2.65em;
    }

    #primary .post.sticky.sticky-layout-two{
        padding: 0;
        margin-bottom: 45px;
    }
    #primary .sticky .img-holder{
        margin: 0 !important;
    }

    .banner .owl-nav .owl-prev:after,
    .banner .owl-nav .owl-next:after{
        height: 25px;
    }
    .banner .owl-nav .owl-next:hover,
    .banner .owl-nav .owl-next:focus,
    .banner .owl-nav .owl-prev:hover,
    .banner .owl-nav .owl-prev:focus,
    .widget_bttk_author_bio .author-socicons li:hover,
    .widget_bttk_author_bio .author-socicons li:focus{
        background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }

    .pagination a{
        <?php echo 'border-color: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
    }

    .archive #primary .post .text-holder .entry-header .top .share, 
    .archive .blossom-portfolio .entry-header .top .share{
        float: none;
        text-align: center;
    }

    .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"]{
        width: 230px;
    }

    .home:not(.full-width) #primary .post .text-holder .entry-header .entry-meta .byline,
    .blog:not(.full-width) #primary .post .text-holder .entry-header .entry-meta .byline {
        display: none;
    }

    .widget_bttk_popular_post .style-two li .entry-header .cat-links a, .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a, .widget_bttk_popular_post .style-three li .entry-header .cat-links a, .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a, .widget_bttk_posts_category_slider_widget .carousel-title .cat-links a {
    display: inline-block;
        line-height: 1;
    }
    .widget .widget-title{
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.2em;
        text-align: left;
    }
    .widget .widget-title:after{
        width: 100%;
    }
    .widget_bttk_popular_post ul li .entry-header .entry-title, 
    .widget_bttk_pro_recent_post ul li .entry-header .entry-title,
    .widget ul li,
    .widget_bttk_posts_category_slider_widget .carousel-title .title{
        font-size: 16px;
        line-height: 1.5em;
        font-weight: 600;
    }
    .widget_bttk_custom_categories ul li a:hover .post-count{
        font-weight: 700;
    }
    .widget_bttk_author_bio .text-holder{
        padding: 20px 0 0;
        border:none;
    }
    .widget_bttk_author_bio .title-holder{
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 11px;
    }
    .widget_bttk_author_bio .author-socicons {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-gap: 8px;
        border-top: none;
    }
    .widget_bttk_author_bio .author-socicons li{
        margin: 0;
        border: 2px solid rgba( 216, 187, 181, 0.3 );
        height: 40px;
        width: 40px;
        padding-top: 7px;
        cursor: pointer;
        <?php echo 'border-color: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
    }
    .widget_bttk_author_bio .author-socicons li:last-child{
        border-bottom: 2px solid rgba( 216, 187, 181, 0.3 );
    }
    .widget_bttk_author_bio .author-socicons li:hover a{
        color: #fff;
    }
    .widget_bttk_author_bio .text-signature{
        margin-bottom: 20px;
    }
    #secondary .widget_blossomtheme_companion_cta_widget .btn-cta,
    #secondary .widget_blossomtheme_featured_page_widget .text-holder .btn-readmore {
        font-size: 14px;
    }
    #secondary .widget_blossomtheme_companion_cta_widget .btn-cta:after,
    #secondary .widget_blossomtheme_featured_page_widget .text-holder .btn-readmore:after,
    #blossom-top:after{
        border: none;
    }
    #blossom-top{
        border-radius: 100%;
    }
    .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper {
        padding: 20px 40px;
    }

    .widget_bttk_pro_recent_post ul li .entry-header .entry-title, .widget_bttk_posts_category_slider_widget .carousel-title .title, .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper .text-holder h3, #secondary .widget_bttk_testimonial_widget .text-holder .name, #secondary .widget_bttk_description_widget .text-holder .name, .site-footer .widget_bttk_description_widget .text-holder .name, .site-footer .widget_bttk_testimonial_widget .text-holder .name, .widget_bttk_popular_post ul li .entry-header .entry-title, .widget_bttk_author_bio .title-holder{
        font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
    }

    #primary .post .text-holder .entry-footer .btn-readmore:hover svg path,
    #primary .post .text-holder .entry-footer .btn-readmore:focus svg path{
        fill: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    #primary .post .text-holder .entry-header .entry-meta a:hover,
    #primary .post .text-holder .entry-header .entry-meta a:focus{
        color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }

    .newsletter-section{
        background: #E5EAEB;
    }
    .content-newsletter .blossomthemes-email-newsletter-wrapper.bg-img:before{
        border: none;
    }
    .content-newsletter,
    .single .content-newsletter{
        margin: 0;
    }
    .content-newsletter .blossomthemes-email-newsletter-wrapper{
        padding: 80px 0 87px;
        display: grid;
        justify-content: center;
        text-align: center;
    }
    .content-newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3{
        font-size: 40px;
        line-height: 1.25em;
        font-weight: 400;
        margin-bottom: 15px;
    }
    .content-newsletter .blossomthemes-email-newsletter-wrapper .text-holder{
        width: unset;
        margin: 0 0 40px;
    }
    .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"]{
        width: 280px;
        padding: 16px;
        font-size: 14px;
        margin: 0 0 20px;
    }
    .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"]{
        padding: 15px 50px;
        font-weight: 700;
        font-size: 14px;
        width: unset;
        letter-spacing: 0.1em;
    }
    .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"]{
        margin-right: 20px;
    }
    .content-newsletter .blossomthemes-email-newsletter-wrapper label{
        position: absolute;
        left: 0;
        bottom: -20px;
        font-size: 14px;
        color: #999596;
    }
    input[type="checkbox"], 
    input[type="radio"] {
        vertical-align: middle;
    }
    ::placeholder{
        color: #999596;
    }
    .single .content-newsletter .blossomthemes-email-newsletter-wrapper{
        padding: 40px;
    }
    
    .widget.widget_blossomthemes_email_newsletter_widget label{
        font-size: 14px;
        line-height: 1.29em;
        margin-bottom: 10px;
        display: block;
        font-weight: 400;
    }
    .blossomthemes-email-newsletter-wrapper form input[type="text"], 
    .blossomthemes-email-newsletter-wrapper form input[type="email"], 
    .blossomthemes-email-newsletter-wrapper form input[type="submit"]{
        font-size: 14px;
    }
    .related-post .post {
        float: left;
        width: 33.3333%;
        padding: 0 15px;
    }
    .related-post .post .text-holder .cat-links a{
        font-size: 14px;
        font-weight: 600;
    }
    button:hover, input[type="button"]:hover, 
    input[type="reset"]:hover, 
    input[type="submit"]:hover, 
    button:focus, 
    input[type="button"]:focus, 
    input[type="reset"]:focus, 
    input[type="submit"]:focus{
        color: #fff;
    }

    .content-instagram{
        padding:60px 0 118px;
        <?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
        margin: 0;
    }
    .content-instagram .insta-title{
        position: absolute;
        top: -12px;
        left: 50%;
        z-index: 1;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        font-size: 40px;
        line-height: 1.25em;
        text-transform: uppercase;
        font-family: <?php echo wp_kses_post( $secondary_fonts['font'] ); ?>;
    }
    .content-instagram ul{
        grid-gap: 0;
    }
    .content-instagram ul li img{
        height: auto;
    }
    .content-instagram .profile-link{
        background: transparent;
        padding:0 0 60px;
        top: 100%;
        font-weight: 600;
        line-height: 1.14em;
        bottom: -7.7%;
        top: unset;
    }
    .content-instagram .profile-link .insta-icon{
        display: none;
    }

    .single #primary .related-post .post {
        width: 100%;
    }

    .single .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"] {
        width: 200px;
    }
    .header-layout-three:not(.header-layout-seven) .main-navigation ul li.menu-item-has-children:after{
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="%23fff" d="M151.5 347.8L3.5 201c-4.7-4.7-4.7-12.3 0-17l19.8-19.8c4.7-4.7 12.3-4.7 17 0L160 282.7l119.7-118.5c4.7-4.7 12.3-4.7 17 0l19.8 19.8c4.7 4.7 4.7 12.3 0 17l-148 146.8c-4.7 4.7-12.3 4.7-17 0z"></path></svg>')
    }
    .banner-layout-two .grid-item:first-child .text-holder .title{
        font-weight: 400;
        font-size: 56px;
    }
    .banner-layout-two .grid-item .text-holder .title a,
    .banner-layout-four .text-holder .title{
        font-weight: 400;
    }
    .archive #primary .post .text-holder .entry-header .entry-meta .byline{
        display: none;
    }
    .archive .site-main .entry-footer .entry-meta .comments svg path,
    #primary .post .text-holder .entry-header .entry-meta .comments svg path,
    .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .comments svg path{
        fill: #999;
    }
    .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .comments svg{
       vertical-align: middle;
    }
    .blog.blog-layout-four #primary .post .text-holder .entry-header .entry-title{
        font-size: 40px;
    }
    .blog.blog-layout-three #primary .post .text-holder .entry-header .entry-title{
        font-size: 30px;
    }
    .page-header .page-title{
        font-weight: 400;
    }
    .blog-layout-three.masonry #primary .post{
        border-bottom: none;
    }
    @media only screen and (max-width: 1440px){
        .single .content-newsletter .blossomthemes-email-newsletter-wrapper{
            padding: 40px;
        }
    }

    @media only screen and (max-width: 1199px){
        .banner .banner-text .title {
            font-size: 36px;
            line-height: 1.222em;
            margin-bottom: 0;
        }
        .banner-layout-three .owl-nav .owl-prev{
            left: 60px;
        }

        .banner-layout-three .owl-nav .owl-next{
            right: 60px;
        }
        .banner-layout-two .grid-item .text-holder .title{
            font-size: 25px;
        }
        .banner-layout-two .grid-item:first-child .text-holder .title{
            font-size: 38px;
        }
    }

    @media only screen and (max-width: 1024px){
        .container {
            max-width: 670px;
        }
        #primary, #secondary {
            width: 100%;
        }
        .single .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"] {
            width: 190px;
            margin-right: 10px;
        }
        .single .content-newsletter .blossomthemes-email-newsletter-wrapper {
            padding: 40px 20px;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper{
            padding:40px 40px 60px;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"]{
            width: 200px;
        }
        .banner-layout-two,
        .banner-layout-four {
            margin-bottom: 30px;
        }
        .category-layout-two .col .text-holder{
            margin: -32px 13px 0;
        }
        #primary .post .text-holder .entry-header .entry-meta .byline, 
        #primary .post .text-holder .entry-header .entry-meta .posted-on .text-on {
            display: inline-block;
        }
        #primary .post .text-holder .entry-header .entry-meta span > span, 
        .archive .site-main .entry-footer .entry-meta > span > span{
            margin-right: 5px;
        }
        .home #primary .post .text-holder .entry-header .entry-meta .byline,
        .blog #primary .post .text-holder .entry-header .entry-meta .byline,
        .blog.blog-layout-four #primary .post .text-holder .entry-footer .entry-meta .byline{
            display: none;
        }
        .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-title{
            font-size: 40px;
        }
    }
    @media only screen and (max-width: 767px){
        .container{
            width: 100%;
            max-width: 100%;
        }
        .home #primary .post:not(.sticky) .img-holder, .blog #primary .post:not(.sticky) .img-holder, .archive .blossom-portfolio .post-thumbnail{
            width: 100%;
            height: auto;
            margin-right: 0;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper label{
            display: inline-block;
            position: unset;
        }
        .single .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"],
        .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"],
        .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"]{
            width: 100%;
        }

        .content-instagram{
            padding: 20px 0 70px;
        }
        .content-instagram .insta-title{
            font-size: 20px;
            top: -5px;
        }
        .content-instagram .profile-link{
            padding-bottom: 15px;
            width: 100%;
            text-align: center;
            bottom: 0;
        }
        #blossom-top{
            width: 50px;
            height: 50px;
        }
        .banner .banner-text .title {
            font-size: 24px;
            line-height: 1.208em;
        }
        .banner.banner-layout-two .banner-text{
            padding: 0;
        }
        .banner-layout-two .grid-item:first-child .text-holder .title{
            font-size: 25px;
        }
        .banner.banner-layout-three .banner-text{
            padding: 0;
        }
        .category-layout-two .col .text-holder{
            margin: -32px 24px 0;
        }
        #primary .post .text-holder .entry-header .entry-meta .byline,
        .entry-header .entry-meta .byline {
            display: none;
        }
        .single-post-layout-two .entry-header .entry-title,
        .single-post-layout-two .entry-header .entry-title, 
        .single-post-layout-three .entry-header .entry-title, 
        .single-post-layout-five .entry-header .entry-title{
            font-size: 25px;
        }
        .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-meta .comments svg path, #primary .post.sticky.sticky-layout-two .text-holder .entry-header .entry-meta span.comments span.comments svg path, .single-post-layout-two .entry-header .entry-meta .comments svg path, .single-post-layout-three .entry-header .entry-meta .comments svg path, .single-post-layout-five .entry-header .entry-meta .comments svg path,
        #primary .post .text-holder .entry-header .entry-meta .comments svg, 
        .archive .site-main .entry-footer .entry-meta .comments svg{
            fill: #999;
        }
        .blog.blog-layout-five #primary .post:not(.sticky) .text-holder .entry-header .cat-links{
            text-align: center;
            float: none;
            margin-top: 10px;
        }
        .blog.blog-layout-five #primary .post:not(.sticky) .text-holder .entry-header .cat-links a{
           <?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?> 
        }
        .blog.blog-layout-five #primary .post:not(.sticky) .text-holder .entry-header .cat-links a:hover{
           background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        }
        .blog.blog-layout-five #primary .post .text-holder .entry-header .share,
        .blog.blog-layout-five #primary .post .text-holder .entry-header .share > svg{
            color: #999;
            float: none;
            text-align: center;
        }
        .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-title{
            font-size: 35px;
        }
    }

<?php } ?>

<?php if( $child_theme_support == "blossom_diva" ) { ?>
    .container {
        max-width: 1170px;
        padding: 0 15px;
    }
    .single-post .main-content {
        margin-top: 2rem;
    }
    .main-content {
        margin-top: 80px;
    }

    #primary {
        width: calc(100% - 330px);
    }

    #secondary {
        width: 330px;
    }
    .content-instagram{
        padding:60px 0 118px;
        margin: 0;
        background: #E5EAEB;
    }
    .content-instagram .insta-title{
        position: absolute;
        top: -12px;
        left: 50%;
        z-index: 1;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        font-size: 40px;
        line-height: 1.25em;
        text-transform: uppercase;
         font-family : <?php echo wp_kses_post( $secondary_fonts['font'] ); ?>;
    }
    .content-instagram ul{
        grid-gap: 0;
    }
    .content-instagram ul li img{
        height: auto;
    }
    .content-instagram .profile-link{
        background: transparent;
        padding:0 0 60px;
        top: 100%;
        font-weight: 600;
        line-height: 1.14em;
        bottom: -7.7%;
        top: unset;
    }
    .content-instagram .profile-link .insta-icon{
        display: none;
    }
    .content-instagram ul li .instagram-meta span {
        border-radius: 10px;
    }
    .content-instagram ul li .instagram-meta span svg{
        margin-right: 4px;
    }
    .content-instagram ul li .instagram-meta span::before{
        display: none;
    }
    .content-newsletter{
        margin-bottom: 80px;
    }
    .content-newsletter .blossomthemes-email-newsletter-wrapper{
        padding: 50px 40px 60px;
        display: flex;
        align-items: center;
    }

    .content-newsletter .blossomthemes-email-newsletter-wrapper .text-holder h3{
        font-size: 30px;
        line-height: 1.667em;
        font-weight: 400;
        margin-bottom: 0;
    }
    .home .content-newsletter .blossomthemes-email-newsletter-wrapper .text-holder{
        width: 34%;
        margin: 0 89px 0 0;
    }
    .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"]{
        width: 200px;
        padding: 16px;
        font-size: 14px;
        margin: 0 0 10px;   
    }
    .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"]{
        padding: 15px 25px;
        font-weight: 700;
        font-size: 14px;
        width: unset;
        letter-spacing: 0.1em;
    }
    .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"]{
        margin-right: 15px;
    }
    .content-newsletter .blossomthemes-email-newsletter-wrapper label{
        position: absolute;
        left: 0;
        bottom: -20px;
        font-size: 14px;
        color: #999596;
    }
    .category-section.category-layout-two .col .img-holder:after{
        display: none;
    }
    .category-section.category-layout-two .col .img-holder:hover img, .category-section .col .img-holder:focus img{
        transform: none;
    }
    .category-section{
        margin-bottom: 80px;
    }
    .category-section .col .img-holder{
        overflow: hidden;
    }
    .category-section.category-layout-two .col .img-holder .text-holder{
        top: 100%;
    }
    .category-section .col .img-holder .text-holder,
    .category-layout-two .col .text-holder{
        width: 86.48%;
        padding:2px;
        border-color: rgba(0,0,0, 0.5);
    }
    .category-section .col .img-holder .text-holder span{
        padding:22px;
        font-size: 14px;
        font-weight: bold;
        line-height: 1;
        text-align: center;
        background: rgba(0,0,0, 0.5);
    }
    .category-section .col .img-holder:hover .text-holder,
    .category-section .col .img-holder:hover .text-holder span,
    .category-section.category-layout-two .col .text-holder .holder span {
        transition: all 0.3s ease-in-out;
    }
    .category-layout-two .col .text-holder{
        box-shadow: none;
        margin: -32px 24px 0;
        border: 1px solid #121212;
        background: transparent;
    }
    .category-layout-two .col .text-holder .holder{
        padding: 0;
        background: #121212;
    }
    .category-layout-two .col .text-holder .holder span{
        line-height: 1;
        font-size: 14px;
        padding: 22px;
        font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
        font-weight: bold;
        margin-bottom: 0;
        text-transform: uppercase;
        color: #fff;
    }
    .category-section.category-layout-two .col:hover .text-holder{
        border-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    .category-section .col .img-holder:hover .text-holder span,
    .category-section.category-layout-two .col:hover .text-holder .holder span{
        background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    .banner .banner-text .cat-links a,
    #primary .post .text-holder .entry-header .cat-links a,
    .related-post .post .text-holder .cat-links a,
    .banner-layout-two .grid-item .text-holder .cat-links a,
    .banner-layout-four .text-holder .cat-links a,
    .single-post-layout-two .entry-header .cat-links a,
    .single-post-layout-three .entry-header .cat-links a,
    .single-post-layout-five .entry-header .cat-links a{
        text-transform: uppercase;
        font-size: 11px;
        font-weight: bold;
        letter-spacing: 1px;
        color: #fff;
        padding: 5px 10px;
        border: 1px solid currentColor;
        margin-bottom: 4px;
        display: inline-block;
        line-height: 1;
        transition: all .3s;
    }
    .banner .cat-links a:hover,
    .banner .cat-links a:focus,
    .banner-layout-two .grid-item .text-holder .cat-links a:hover,
    .banner-layout-two .grid-item .text-holder .cat-links a:focus,
    .single-post-layout-two .entry-header .cat-links a:hover,
    .single-post-layout-two .entry-header .cat-links a:focus,
    .single-post-layout-three .entry-header .cat-links a:hover,
    .single-post-layout-three .entry-header .cat-links a:focus,
    .single-post-layout-five .entry-header .cat-links a:focus,
    .single-post-layout-five .entry-header .cat-links a:hover{
        color: #fff;
        background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        border-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    .banner .banner-text .cat-links a:hover{
        color: #fff;
    }
    .banner .cat-links a:hover,
    #primary .post .text-holder .entry-header .cat-links a:hover,
    .related-post .post .text-holder .cat-links a:hover{
        text-decoration: none;
    }
    #primary .post .text-holder .entry-header .cat-links a{
        color:<?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        border: 1px solid currentColor;
        transition: all .3s;
    }
    #primary .post.sticky.sticky-layout-two .text-holder .entry-header .cat-links a:hover{
        border-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    #primary .post .text-holder .entry-header .cat-links a:hover{
        text-decoration: none;
        background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        color: #fff; 
    }
    .related-post .post .text-holder .cat-links a{
        font-size: 8px;
        padding: 3px 5px;
    }
    .banner .banner-text .title {
        font-weight: 400;
        line-height: 1.25em;
        margin-top: 20px;
    }
    #primary .post .text-holder .entry-footer .btn-readmore{
        position: relative;
        float: none;
        background: transparent;
        color:<?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        padding: 0;
        font-size: 14px;
        font-weight: 600;
    }
    #primary .post .text-holder .entry-footer .btn-readmore:hover{
        color: #999;
    }
    #primary .post .text-holder .entry-footer .btn-readmore:hover, #primary .post .text-holder .entry-footer .btn-readmore:focus{
        background: none;
        text-decoration: none;
    }
    #primary .post .text-holder .entry-footer .btn-readmore::after{
        content: "";
        background-image: url('data:image/svg+xml; utf8, <svg xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 30 10"><g id="arrow" transform="translate(-10)"><path fill="<?php echo blossom_feminine_pro_hash_to_percent23( blossom_feminine_pro_sanitize_hex_color( $primary_color ) ); ?>" d="M24.5,44.974H46.613L44.866,40.5a34.908,34.908,0,0,0,9.634,5,34.908,34.908,0,0,0-9.634,5l1.746-4.474H24.5Z" transform="translate(-14.5 -40.5)"></path></g></svg>');
        background-repeat: no-repeat;
        width: 35px;
        height: 30px;
        position: absolute;
        top: 5px;
        left: 95px;
        display:block;
        opacity:1;
        border:none;
    }
    #primary .post .text-holder .entry-footer .btn-readmore:hover::after{
        content: "";
        background-image: url('data:image/svg+xml; utf8, <svg xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 30 10"><g id="arrow" transform="translate(-10)"><path fill="%23999999" d="M24.5,44.974H46.613L44.866,40.5a34.908,34.908,0,0,0,9.634,5,34.908,34.908,0,0,0-9.634,5l1.746-4.474H24.5Z" transform="translate(-14.5 -40.5)"></path></g></svg>');
    }

    #primary .post .text-holder .entry-footer .edit-link {
        margin-left: 50px;
        display: inline-block;
    }
    #primary .post .text-holder .entry-footer .share{
        margin-top: 0;
    }

    /** Pagination */
    .pagination .current:after, .pagination a:after{
        display: none;
    }
    .pagination .current,
    .pagination a{
        font-size: 16px;
        font-weight: 600;
        border:2px solid <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    /** Goto Top */
    #blossom-top{
        border-radius: 50%;
    }
    #blossom-top:after{
        display: none;
    }
    /**Owl Carousel */
    .owl-carousel .owl-nav .owl-prev, 
    .owl-carousel .owl-nav .owl-next, 
    .owl-carousel .owl-dot{
        border-radius: 50%;
        transition: all .2s;
    }
    .owl-carousel .owl-nav .owl-prev:hover, 
    .owl-carousel .owl-nav .owl-next:hover{
        background:<?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    /**Widgets */
    .widget_bttk_popular_post .style-two li .entry-header .cat-links a, .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a, .widget_bttk_popular_post .style-three li .entry-header .cat-links a, .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a, .widget_bttk_posts_category_slider_widget .carousel-title .cat-links a {
        display: inline-block;
        line-height: 1;
    }
    .widget .widget-title{
        font-size: 12px;
        font-weight: bold;
        letter-spacing: 0.2em;
        text-align: center;
        padding: 22px 0;
        background: #121212;
        color: #fff;
    }
    .widget .widget-title:after{
        display: none;
    }
    .widget_bttk_popular_post ul li .entry-header .entry-title, 
    .widget_bttk_pro_recent_post ul li .entry-header .entry-title,
    .widget ul li,
    .widget_bttk_posts_category_slider_widget .carousel-title .title{
        font-size: 16px;
        line-height: 1.5em;
        font-weight: 600;
        font-family: <?php echo wp_kses_post( $primary_fonts['font'] ); ?>;
    }
    .widget_bttk_custom_categories ul li a:hover .post-count{
        font-weight: 700;
    }
    .widget_bttk_author_bio .text-holder{
        padding: 20px 0 0;
        border:none;
    }
    .widget_bttk_author_bio .title-holder{
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 11px;
    }
    .widget_bttk_author_bio .author-socicons {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-gap: 8px;
        border-top: none;
    }
    .widget_bttk_author_bio .author-socicons li{
        margin: 0;
        <?php echo 'border:2px solid rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
        height: 40px;
        width: 40px;
        padding-top: 7px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .widget_bttk_author_bio .author-socicons li:hover{
        background: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    .widget_bttk_author_bio .author-socicons li:last-child{
        <?php echo 'border-bottom: 2px solid rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.3);'; ?>
    }
    .widget_bttk_author_bio .author-socicons li:hover a{
        color: #fff;
    }
    .widget_bttk_author_bio .text-signature{
        margin-bottom: 20px;
    }
    #secondary .widget_blossomtheme_companion_cta_widget .btn-cta,
    #secondary .widget_blossomtheme_featured_page_widget .text-holder .btn-readmore{
        font-size: 14px;
    }
    #secondary .widget_blossomtheme_companion_cta_widget .btn-cta:after,
    #secondary .widget_blossomtheme_featured_page_widget .text-holder .btn-readmore:after,
    #blossom-top:after{
        border: none;
    }
    .widget.widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper .subscribe-inner-wrap .text {
        font-size: 12px;
    }
    #blossom-top{
        border-radius: 100%;
    }
    .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper {
        padding: 20px 40px;
    }
    .widget_bttk_popular_post .style-two li .entry-header .cat-links a, 
    .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a, 
    .widget_bttk_popular_post .style-three li .entry-header .cat-links a, 
    .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a, 
    .widget_bttk_posts_category_slider_widget .carousel-title .cat-links a{
        text-transform: uppercase;
        font-size: 11px;
        font-weight: bold;
        letter-spacing: 1px;
        color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        padding: 5px 10px;
        border: 1px solid currentColor;
        margin-bottom: 4px;
        display: inline-block;
        line-height: 1;
        transition: all .3s;
    }
    .widget_bttk_popular_post .style-two li .entry-header .cat-links a:hover, 
    .widget_bttk_pro_recent_post .style-two li .entry-header .cat-links a:hover, 
    .widget_bttk_popular_post .style-three li .entry-header .cat-links a:hover, 
    .widget_bttk_pro_recent_post .style-three li .entry-header .cat-links a:hover, 
    .widget_bttk_posts_category_slider_widget .carousel-title .cat-links a:hover{
        text-decoration: none;
        background:<?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        color: #fff; 
    }

    .footer-t .widget .widget-title{
        background: transparent;
    }

    /**Navigation Menu */
    .main-navigation ul {
        padding: 10px 0;
    }
    .main-navigation ul li a {
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 600;
    }

    /** Slider Layout */
    .banner-layout-two .grid-item:first-child .text-holder .title,
    .banner-layout-two .grid-item .text-holder .title,
    .banner-layout-four .text-holder .title{
        font-weight: normal;
    }
    .banner-layout-two .grid-item .text-holder .title a,
    .banner-layout-four .text-holder .title a{
        display:block;
        margin-top: 15px;
    }
    .banner-layout-four .text-holder .title{
        font-size: 40px;
    }
    .banner-layout-four .text-holder{
        text-align: center;
    }

    /** HomePage Layouts */
    .home #primary .post .text-holder,
    .blog #primary .post .text-holder {
        text-align: center;
        align-self: center;
    }
    #primary .post:not(.sticky) .img-holder{
        max-width: 370px;
        align-self: center;
    }
    #primary .post .text-holder .entry-header{
        margin-top: 0;
    }
    #primary .post:not(.sticky) .text-holder .entry-header .entry-title, .archive .blossom-portfolio .entry-header .entry-title, .search #primary .search-post .text-holder .entry-header .entry-title {
        font-size: 30px;
        margin-bottom: 10px;
        font-weight: normal;
    }
    #primary .sticky .text-holder .entry-header .entry-title{
        font-weight: normal;
    }
    #primary .sticky .text-holder .entry-header .entry-title a{
        display: block;
    }
    .blog #primary .post .text-holder .entry-header .entry-meta .comments, 
    .archive .site-main .entry-footer .entry-meta .comments{
        display: none;
    }
    #primary .post .text-holder .entry-header .entry-meta .author a, #primary .post .text-holder .entry-header .entry-meta .posted-on a {
        color: #121212;
        font-weight: 600;
    }
    #primary .post .text-holder .entry-header .entry-meta .text-on{
        font-style: italic;
    }
    .blog.blog-layout-three #primary .post .text-holder .entry-header .cat-links,
    .blog.blog-layout-three #primary .post .text-holder .entry-header .share{
        float: none;
    }
    .blog.blog-layout-three #primary .post .text-holder .entry-header .cat-links a{
        margin-right: 5px;
    }
    .blog.blog-layout-three .site-main {
        grid-row-gap: 60px;
        grid-column-gap: 40px;
    }
    .blog.blog-layout-three #primary .post .img-holder{
        margin-bottom: 30px;
    }
    .blog.blog-layout-three #primary .post .text-holder .entry-header .share .social-networks{
        right: 135px;
    }
    .blog.blog-layout-three #primary .post .text-holder .entry-header .entry-title{
        font-size: 30px;
    }
    .blog.blog-layout-three #primary .post .text-holder .entry-footer .btn-readmore{
        display: inline;
    }
    .blog.blog-layout-five #primary .site-main{
        grid-column-gap: 40px;
    }
    .blog.blog-layout-five #primary .post .text-holder .entry-header .cat-links a:hover{
        color: #fff;
        border-color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
    }
    .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-title,
    .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-meta{
        text-align: left;
    }
    .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-meta,
    .blog #primary .post .text-holder .entry-header .entry-meta{
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
        flex-wrap: wrap;

    }
    .blog #primary .post .text-holder .entry-header .entry-meta{
        justify-content: center;
    }
    .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-meta a{
        color: #fff;
    }
    #primary .post .text-holder .entry-header .entry-meta span{
        font-style: italic;
    }
     #primary .post .text-holder .entry-header .entry-meta span a{
        font-style: normal;
    }
    .blog.blog-layout-five #primary .post.sticky-layout-two .text-holder .entry-header .share{
        margin-right: 10px;
    }
    .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-title{
        font-size: 30px;
    }

    /** Single Post */
    .single #primary .post .text-holder .entry-header{
        text-align: center;
    }
    .single #primary .post .text-holder .entry-header .entry-meta,
    .single-post-layout-three .entry-header .entry-meta,
    .single-post-layout-two .entry-header .entry-meta,
    .single-post-layout-five .entry-header .entry-meta {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        flex-wrap: wrap;
    }
    .single #primary .post .text-holder .entry-header .entry-meta .comments,
    .single-post-layout-three .entry-header .entry-meta .comments,
    .single-post-layout-two .entry-header .entry-meta .comments,
    .single-post-layout-five .entry-header .entry-meta .comments {
        order: -1;
    }
    .single #primary .post .text-holder .entry-header .entry-title{
        font-size: 44px;
    }
    .single #primary .post .text-holder .entry-header .entry-meta .posted-on,
    .single-post-layout-five .entry-header .entry-meta .posted-on,
    .single-post-layout-three .entry-meta .posted-on,
    .single-post-layout-two .entry-header .entry-meta .posted-on{
        margin-right: 15px;
    }
    .single-post-layout-two .entry-header .entry-title,
    .single-post-layout-three .entry-header .entry-title,
    .single-post-layout-five .entry-header .entry-title{
        font-weight: 400;
    }
    .single-post-layout-three .entry-meta span, 
    .single-post-layout-two .entry-header .entry-meta span,
    .single-post-layout-five .entry-header .entry-meta span{
        font-style: italic;
    }
    .single-post-layout-three .entry-header .entry-meta span a,
    .single-post-layout-two .entry-header .entry-meta span a,
    .single-post-layout-five .entry-header .entry-meta span a {
        font-style:normal;
        color: #fff;
    }
    .single-post-layout-three .entry-header .entry-meta,
    .single-post-layout-five .entry-header .entry-meta{
        justify-content: flex-end;
    }

    #primary .sticky .text-holder .entry-header .entry-meta .share{
        margin-right: 15px !important;
    }
    /** Responsiveness */
    @media only screen and (max-width: 1199px){
        .home .content-newsletter .blossomthemes-email-newsletter-wrapper .text-holder{
            width: 100%;
            text-align: center;
            margin: 0 0 30px;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"] {
            width: auto;
        }
        .blog.blog-layout-five #primary .post .img-holder {
            max-width:unset;
        }
    }

    @media only screen and (max-width: 1024px){
        #primary .post .text-holder .entry-header .entry-meta .byline, #primary .post .text-holder .entry-header .entry-meta .posted-on .text-on {
           display: inline-block;
           margin-right: 3px;
        }
        #secondary {
            margin-top: 0;
        }
    }
    @media only screen and (max-width: 991px){
        .container {
            max-width: 670px;
        }
        #primary, #secondary {
            width: 100%;
        }
        .banner.banner-layout-two .banner-text .title{
            font-size: 30px;
        }
        .related-post .post .text-holder .entry-title,
        .popular-post .post .text-holder .entry-title{
            font-size: 24px;
        }
    }
    @media only screen and (max-width: 767px) {
        .main-content {
            margin-top: 50px;
        }
        .category-section .col {
            width: 100%;
            margin-bottom: 50px;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="text"],
        .content-newsletter .blossomthemes-email-newsletter-wrapper form input[type="submit"]{
            width: 100%;
        }
        .content-newsletter .blossomthemes-email-newsletter-wrapper label{
            bottom:-28%;
        }
        .content-newsletter{
            margin-bottom: 50px;
        }
        .related-post .post .text-holder .cat-links a{
            font-size: 11px;
        }

        .author-section{
            text-align: center;
        }
        .author-section .img-holder{
            width: 100%;
            margin-right: 0;
        }
        #blossom-top{
            width: 50px;
            height: 50px;
        }
        .widget_bttk_author_bio .author-socicons{
            display: block;
        }
        .category-section {
            margin-bottom: 70px;
        }
        .error-holder .page-content h2{
            line-height: 1;
            margin: 30px 0;
        }
        #primary .post:not(.sticky) .img-holder{
            max-width: 100%;
            width: 100%;
            text-align: center;
        }

        #primary .post.sticky.sticky-layout-two .text-holder{
            margin-top: 15px;
        }
        .blog.blog-layout-five #primary .post .text-holder .entry-header .entry-meta a{
            color: #111;
        }
        .blog.blog-layout-five #primary .post .text-holder .entry-header .cat-links a{
            color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        }
        .blog.blog-layout-five #primary .post .text-holder .entry-header .share, .blog.blog-layout-five #primary .post .text-holder .entry-header .share svg{
            color: #333;
        }
        .blog.blog-layout-five #primary .post .text-holder{
            z-index: 0;
        }
       .single-post-layout-three .entry-header .entry-meta span a, 
       .single-post-layout-two .entry-header .entry-meta span a, 
       .single-post-layout-five .entry-header .entry-meta span a{
            color: #121212;
        }
        .single-post-layout-two .entry-header .cat-links a,
        .single-post-layout-three .entry-header .cat-links a, 
        .single-post-layout-five .entry-header .cat-links a {
            color: <?php echo blossom_feminine_pro_sanitize_hex_color( $primary_color ); ?>;
        }
    }
    @media only screen and (max-width: 640px){

        .main-content,
        .content-newsletter{
            margin-bottom: 30px;
        }
        .content-instagram .insta-title{
            top: -6px;
            font-size: 22px;
        }
    }

<?php } ?>

    <?php echo "</style>";
}
add_action( 'wp_head', 'blossom_feminine_pro_dynamic_css', 99 );

/**
 * Function for sanitizing Hex color 
 */
function blossom_feminine_pro_sanitize_hex_color( $color ){
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
function blossom_feminine_pro_hex2rgb($hex) {
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
function blossom_feminine_pro_hash_to_percent23( $color_code ){
    $color_code = str_replace( "#", "%23", $color_code );
    return $color_code;
}
