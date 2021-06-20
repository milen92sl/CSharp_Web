<?php
/**
 * Active Callback
 * 
 * @package Blossom_Pin_Pro
*/

function blossom_pin_pro_header_bg_image_ac( $control ){
    $header_layout = $control->manager->get_setting( 'header_layout' )->value();
    $control_id    = $control->id;

    if ( $header_layout == 'two' ) return true;
    
    return false;
}

/**
 * Active Callback for Banner Slider
*/
function blossom_pin_pro_banner_ac( $control ){
    $banner        = $control->manager->get_setting( 'ed_banner_section' )->value();
    $slider_type   = $control->manager->get_setting( 'slider_type' )->value();
    $slider_layout = $control->manager->get_setting( 'slider_layout' )->value();
    $control_id    = $control->id;

    if ( $banner == 'static_banner' && ( $control_id == 'header_image' || $control_id == 'header_video' || $control_id == 'external_header_video') ) return true;

    if ( $control_id == 'banner_title' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'banner_subtitle' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'banner_label' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'banner_link' && $banner == 'static_banner' ) return true;

    if ( $banner == 'slider_banner' && ( 
        $control_id == 'slider_type' || 
        $control_id == 'slider_auto' ||  
        $control_id == 'slider_loop' || 
        $control_id == 'slider_speed' || 
        ( $control_id == 'slider_cat' && $slider_type == 'cat') || 
        ( $control_id == 'no_of_slides' && $slider_type == 'latest_posts' ) || 
        ( $control_id == 'slider_pages' && $slider_type == 'pages' ) || 
        ( $control_id == 'slider_custom' && $slider_type == 'custom' ) || 
        ( $control_id == 'slider_full_image' && $slider_layout == 'one' ) || 
        ( $control_id == 'slider_animation' && ( $slider_layout == 'two' || $slider_layout == 'three' || $slider_layout == 'six' || $slider_layout == 'seven' ) ) 
        || $control_id == 'banner_hr' ||  
        ( $control_id == 'number_of_slides_text' && ( $slider_layout == 'four' || $slider_layout == 'eight' ) ) 
    ) ) return true;
    
    return false;
}

/**
 * Active Callback for Body Background
*/
function blossom_pin_pro_body_bg_choice( $control ){
    
    $body_bg    = $control->manager->get_setting( 'body_bg' )->value();
    $control_id = $control->id;
         
    if ( $control_id == 'background_image' && $body_bg == 'image' ) return true;
    if ( $control_id == 'background_preset' && $body_bg == 'image' ) return true;
    if ( $control_id == 'background_position' && $body_bg == 'image' ) return true;
    if ( $control_id == 'background_size' && $body_bg == 'image' ) return true;
    if ( $control_id == 'background_repeat' && $body_bg == 'image' ) return true;
    if ( $control_id == 'background_attachment' && $body_bg == 'image' ) return true;
    if ( $control_id == 'bg_pattern' && $body_bg == 'pattern' ) return true;
    
    return false;
}

/**
 * Active Callback for Social Share in General Settings
*/
function blossom_pin_pro_social_share_ac( $control ){
    $social_share = $control->manager->get_setting( 'ed_social_sharing' )->value();
    $control_id = $control->id;

    if ( $social_share == true && ( 
         $control_id == 'ed_og_tags' || 
         $control_id == 'ed_normal_share' || 
         $control_id == 'ed_sticky_social' || 
         $control_id == 'social_share' 
    ) ) return true;

    return false;
}
/**
 * Active Callback for before content AD
*/
function blossom_pin_pro_adbc_ac( $control ){
    
    $ed_code     = $control->manager->get_setting( 'ed_bc_post_ad_code' )->value();
    $control_id  = $control->id;

    if ( $ed_code == true && $control_id == 'bc_post_ad_code' ) return true;
    if ( $ed_code == false && (
         $control_id == 'open_link_diff_tab_bc_post' ||
         $control_id == 'bc_post_ad' ||
         $control_id == 'bc_post_ad_link'
    ) ) return true;
    
    return false;
}

/**
 * Active Callback for after content AD
*/
function blossom_pin_pro_adac_ac( $control ){
    
    $ed_code     = $control->manager->get_setting( 'ed_ac_post_ad_code' )->value();
    $control_id  = $control->id;
    
    if ( $control_id == 'ac_post_ad_code' && $ed_code == true ) return true;
    if ( $ed_code == false && (
         $control_id == 'open_link_diff_tab_ac_post' ||
         $control_id == 'ac_post_ad' ||
         $control_id == 'ac_post_ad_link'
    ) ) return true;
    
    return false;
}

/**
 * Active Callback for map marker
*/
function blossom_pin_pro_google_map_ac( $control ){
    
    $ed_marker  = $control->manager->get_setting( 'ed_map_marker' )->value();
    
    if ( $ed_marker == true ) return true;
    
    return false;
}

/**
 * Active Callback for post/page
*/
function blossom_pin_pro_post_page_ac( $control ){
    
    $ed_related    = $control->manager->get_setting( 'ed_related' )->value();
    $single_layout = $control->manager->get_setting( 'single_post_layout' )->value();
    $control_id    = $control->id;


    
    if ( $ed_related == true && (
         $control_id == 'related_post_title' ||
         $control_id == 'related_taxonomy'
    ) )  return true;
    if ( $control_id == 'ed_featured_image' ) return true;
    
    return false;
}

/**
 * Active Callback for featuerd content
*/
function blossom_pin_pro_featured_ac( $control ){
    
    $featured_type   = $control->manager->get_setting( 'featured_type' )->value();
    $control_id      = $control->id;
    
    if ( $featured_type == 'page' && ( 
         $control_id == 'featured_content_one' || 
         $control_id == 'featured_content_two' ||
         $control_id == 'featured_content_three'
    ) ) return true;
    if ( $control_id == 'featured_custom' && $featured_type == 'custom' ) return true;
    
    return false;
}

/**
 * Active Callback for pagination
*/
function blossom_pin_pro_loading_ac( $control ){
    
    $pagination_type = $control->manager->get_setting( 'pagination_type' )->value();
    
    if ( $pagination_type == 'load_more' ) return true;
    
    return false;
}

/**
 * Active Callback for Shop page description
*/
function blossom_pin_pro_shop_description_ac( $control ){
    $ed_shop_archive_desc = $control->manager->get_setting( 'ed_shop_archive_description' )->value();
    $control_id = $control->id;
    
    if( $control_id == 'shop_archive_description' && $ed_shop_archive_desc == true && is_woocommerce_activated() ) return true;
    
    return false;
}

/**
 * Active Callback for Shop page description
*/
function blossom_pin_pro_blog_excerpt( $control ){
    $ed_excerpt = $control->manager->get_setting( 'ed_excerpt' )->value();
    $control_id = $control->id;
    
    if( $control_id == 'excerpt_length' && $ed_excerpt ) return true;
    if( $control_id == 'read_more_text' && $ed_excerpt ) return true;
    
    return false;
}

/**
 * Active Callback for note control 
*/
function blossom_pin_pro_header_layout_two( $control ){
    $header_layout = $control->manager->get_setting( 'header_layout' )->value();
    $control_id = $control->id;
    
    if( $control_id == 'header_layout_two_note' && $header_layout == 'two' ) return true;
    
    return false;
}