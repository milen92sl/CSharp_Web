<?php
/**
 * Toolkit Filters
 *
 * @package Blossom_Pin_Pro
 */

if( ! function_exists( 'blossom_pin_pro_featured_page_img_align' ) ) :
    function blossom_pin_pro_featured_page_img_align(){
        $array = array(
            'right' => esc_html__( 'Right', 'blossom-pin-pro' ),
        );
        return $array;    
    }
    endif;
add_filter( 'bttk_img_alignment', 'blossom_pin_pro_featured_page_img_align' );

if( ! function_exists( 'blossom_pin_pro_default_cta_color' ) ) :
    function blossom_pin_pro_default_cta_color(){
        return '#ff91a4';
    }
endif;
add_filter( 'bttk_cta_bg_color', 'blossom_pin_pro_default_cta_color' );

if( ! function_exists( 'blossom_pin_pro_portfolio_single_image' )  ) :
    function blossom_pin_pro_portfolio_single_image(){
        return 'full';
    }
endif;
add_filter( 'bttk_single_portfolio_image', 'blossom_pin_pro_portfolio_single_image' );

if( ! function_exists( 'blossom_pin_pro_portfolio_related_image' ) ) :
    function blossom_pin_pro_portfolio_related_image(){
        return 'blossom-pin-related';
    }
endif;
add_filter( 'bttk_related_portfolio_image', 'blossom_pin_pro_portfolio_related_image' );

if( ! function_exists( 'blossom_pin_pro_portfolio_header' ) ) :
    function blossom_pin_pro_portfolio_header(){
        global $post;
        echo '<header class="page-header"><h1 class="page-title">' . esc_html( $post->post_title ) . '</h1></header>';
    }
endif;
add_action( 'bttk_before_portfolios', 'blossom_pin_pro_portfolio_header' );

if( ! function_exists( 'blossom_pin_pro_newsletter_bg_image_size' ) ) :
    function blossom_pin_pro_newsletter_bg_image_size(){
        return 'full';
    }
endif;
add_filter( 'bt_newsletter_img_size', 'blossom_pin_pro_newsletter_bg_image_size' );

if( ! function_exists( 'blossom_pin_pro_ad_image' ) ) :
    function blossom_pin_pro_ad_image(){
        return 'full';
    }
endif;
add_filter( 'bttk_ad_img_size', 'blossom_pin_pro_ad_image' );

if( ! function_exists( 'blossom_pin_pro_newsletter_bg_color' ) ) :
    function blossom_pin_pro_newsletter_bg_color(){
        return '#ff91a4';
    }
endif;
add_filter( 'bt_newsletter_bg_color_setting', 'blossom_pin_pro_newsletter_bg_color' );

if( ! function_exists( 'blossom_pin_pro_defer_js_files' ) ) :
    function blossom_pin_pro_defer_js_files(){
        $defer_js = get_theme_mod( 'ed_defer', false );

        return ( $defer_js ) ? false : true;

    }
endif;
add_filter( 'bttk_public_assets_enqueue', 'blossom_pin_pro_defer_js_files' );

if( ! function_exists( 'blossom_pin_pro_author_image' ) ) :
    function blossom_pin_pro_author_image(){
       return 'blossom-pin-related';
    }
endif;
add_filter( 'author_bio_img_size', 'blossom_pin_pro_author_image' );