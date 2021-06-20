<?php
/**
 * Toolkit Filters
 *
 * @package Blossom_Fashion_Pro
 */
 
if( ! function_exists( 'blossom_fashion_pro_portfolio_single_image' )  ) :
    function blossom_fashion_pro_portfolio_single_image(){
        return 'blossom-fashion-fullwidth';
    }
endif;
add_filter( 'bttk_single_portfolio_image', 'blossom_fashion_pro_portfolio_single_image' );

if( ! function_exists( 'blossom_fashion_pro_portfolio_related_image' ) ) :
    function blossom_fashion_pro_portfolio_related_image(){
        return 'blossom-fashion-blog-home';
    }
endif;
add_filter( 'bttk_related_portfolio_image', 'blossom_fashion_pro_portfolio_related_image' );

if( ! function_exists( 'blossom_fashion_pro_ad_image' ) ) :
    function blossom_fashion_pro_ad_image(){
        return 'full';
    }
endif;
add_filter( 'bttk_ad_img_size', 'blossom_fashion_pro_ad_image' );

if( ! function_exists( 'blossom_fashion_pro_newsletter_bg_color' ) ) :
    function blossom_fashion_pro_newsletter_bg_color(){
    	
    	$child_theme_support    = get_theme_mod( 'child_additional_support', 'default' );
    	if( $child_theme_support == 'fashion_lifestyle' ) {
    		$return = '#60c5ba';
    	}elseif( $child_theme_support == 'fashion_stylist' ) {
    		$return = '#ea4e59';
    	}else{
    		$return = '#f1d3d3';
    	}
        return $return;
    }
endif;
add_filter( 'bt_newsletter_bg_color_setting', 'blossom_fashion_pro_newsletter_bg_color' );