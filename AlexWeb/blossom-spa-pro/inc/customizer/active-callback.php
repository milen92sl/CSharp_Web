<?php
/**
 * Active Callback
 * 
 * @package Blossom_Spa_Pro
*/

/**
 * Active Callback for Banner Slider
*/
function blossom_spa_pro_banner_ac( $control ){
    $banner      = $control->manager->get_setting( 'ed_banner_section' )->value();
    $slider_type = $control->manager->get_setting( 'slider_type' )->value();
    $header_video = $control->manager->get_setting( 'header_video' )->value();
    $external_header_video = $control->manager->get_setting( 'external_header_video' )->value();
    $control_id  = $control->id;
    
    if ( $control_id == 'header_image' && ( $banner == 'static_banner' || $banner == 'static_nl_banner' ) ) return true;
    if ( $control_id == 'header_video' && ( $banner == 'static_banner' || $banner == 'static_nl_banner' ) ) return true;
    if ( $control_id == 'external_header_video' && ( $banner == 'static_banner' || $banner == 'static_nl_banner' ) ) return true;
    if ( $control_id == 'banner_title' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'banner_subtitle' && $banner == 'static_banner' && !( $header_video || $external_header_video ) ) return true;
    if ( $control_id == 'banner_caption_layout' && $banner != 'no_banner' && $banner != 'static_nl_banner' ) return true;
    if ( $control_id == 'banner_cta1' && $banner != 'no_banner' && $banner != 'static_nl_banner' && !( $header_video || $external_header_video ) ) return true;
    if ( $control_id == 'banner_cta1_url' && $banner != 'no_banner' && $banner != 'static_nl_banner' && !( $header_video || $external_header_video ) ) return true;
    if ( $control_id == 'banner_cta2' && $banner != 'no_banner' && $banner != 'static_nl_banner' && !( $header_video || $external_header_video ) ) return true;
    if ( $control_id == 'banner_cta2_url' && $banner != 'no_banner' && $banner != 'static_nl_banner' && !( $header_video || $external_header_video ) ) return true;
    if ( $control_id == 'banner_newsletter' && $banner == 'static_nl_banner' ) return true;
    
    if ( $control_id == 'include_repetitive_posts' && $banner == 'slider_banner' && ( $slider_type == 'latest_posts' || $slider_type == 'cat' ) ) return true;
    if ( $control_id == 'slider_type' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'slider_auto' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'slider_loop' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'slider_caption' && $banner == 'slider_banner' ) return true;              
    if ( $control_id == 'slider_cat' && $banner == 'slider_banner' && $slider_type == 'cat' ) return true;
    if ( $control_id == 'no_of_slides' && $banner == 'slider_banner' && $slider_type == 'latest_posts' ) return true;
    if ( $control_id == 'slider_pages' && $banner == 'slider_banner' && $slider_type == 'pages' ) return true;
    if ( $control_id == 'slider_custom' && $banner == 'slider_banner' && $slider_type == 'custom' ) return true;
    if ( $control_id == 'slider_full_image' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'slider_animation' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'hr' && $banner == 'slider_banner' ) return true;
    
    return false;
}

/**
 * Active Callback
*/
function blossom_spa_pro_header_ac( $control ){
    
    $ed_one_page = $control->manager->get_setting( 'ed_one_page' )->value();
    $control_id  = $control->id;
    
    if ( $control_id == 'ed_home_link' && $ed_one_page == true ) return true; 
    if ( $control_id == 'label_home' && $ed_one_page == true ) return true; 
    if ( $control_id == 'label_service' && $ed_one_page == true ) return true; 
    if ( $control_id == 'label_about' && $ed_one_page == true ) return true; 
    if ( $control_id == 'label_popular_product' && is_woocommerce_activated() && $ed_one_page == true ) return true; 
    if ( $control_id == 'label_cta' && $ed_one_page == true ) return true; 
    if ( $control_id == 'label_service_two' && $ed_one_page == true ) return true; 
    if ( $control_id == 'label_special_pricing' && is_woocommerce_activated() && $ed_one_page == true ) return true; 
    if ( $control_id == 'label_service_three' && $ed_one_page == true ) return true; 
    if ( $control_id == 'label_pricing' && $ed_one_page == true ) return true; 
    if ( $control_id == 'label_cta_two' && $ed_one_page == true ) return true; 
    if ( $control_id == 'label_team' && $ed_one_page == true ) return true;  
    if ( $control_id == 'label_blog' && $ed_one_page == true ) return true;
    if ( $control_id == 'label_gallery' && $ed_one_page == true ) return true;   
    if ( $control_id == 'label_testimonial' && $ed_one_page == true ) return true;
    if ( $control_id == 'label_products' && is_woocommerce_activated() && $ed_one_page == true ) return true;   
    if ( $control_id == 'label_contact' && $ed_one_page == true ) return true;   
    
    return false;
}

/**
 * Active Callback for Blog View All Button
*/
function blossom_spa_pro_blog_view_all_ac(){
    $blog = get_option( 'page_for_posts' );
    if( $blog ) return true;
    
    return false; 
}

/**
 * Active Callback for Blog Active
*/
function blossom_spa_pro_blog_active(){
    $home_sections   = get_theme_mod( 'front_sort', array( 'service', 'about', 'popular_product', 'cta', 'service_two', 'special_pricing', 'service_three', 'pricing', 'cta_two', 'team', 'blog', 'gallery', 'testimonial', 'products', 'contact' ) );
    if( in_array( 'blog', $home_sections ) ) return true;

    return false;
}

/**
 * Active Callback for Popular Product Active
*/
function blossom_spa_pro_popular_product_active(){
    $home_sections   = get_theme_mod( 'front_sort', array( 'service', 'about', 'popular_product', 'cta', 'service_two', 'special_pricing', 'service_three', 'pricing', 'cta_two', 'team', 'blog', 'gallery', 'testimonial', 'products', 'contact' ) );
    if( in_array( 'popular_product', $home_sections ) ) return true;

    return false;
}

/**
 * Active Callback for Special Pricing Active
*/
function blossom_spa_pro_special_pricing_active(){
    $home_sections   = get_theme_mod( 'front_sort', array( 'service', 'about', 'popular_product', 'cta', 'service_two', 'special_pricing', 'service_three', 'pricing', 'cta_two', 'team', 'blog', 'gallery', 'testimonial', 'products', 'contact' ) );
    if( in_array( 'special_pricing', $home_sections ) ) return true;

    return false;
}

/**
 * Active Callback for Body Background
*/
function blossom_spa_pro_body_bg_choice( $control ){
    
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
 * Active Callback for map marker
*/
function blossom_spa_pro_google_map_ac( $control ){
    
    $ed_marker  = $control->manager->get_setting( 'ed_map_marker' )->value();
    
    if ( $ed_marker == true ) return true;
    
    return false;
}

/**
 * Active Callback for social link in contact page
*/
function blossom_spa_pro_contact_social_ac( $control ){
    
    $ed_social = $control->manager->get_setting( 'ed_contact_social' )->value();
    
    if ( $ed_social == true ) return true;
    
    return false;
}

/**
 * Active Callback for post/page
*/
function blossom_spa_pro_post_page_ac( $control ){
    
    $ed_related = $control->manager->get_setting( 'ed_related' )->value();
    $control_id = $control->id;
    
    if ( $control_id == 'related_post_title' && $ed_related == true ) return true;
    if ( $control_id == 'related_taxonomy' && $ed_related == true ) return true;
    if ( $control_id == 'ed_featured_image' ) return true;
    
    return false;
}

/**
 * Active Callback for pagination
*/
function blossom_spa_pro_loading_ac( $control ){
    
    $pagination_type = $control->manager->get_setting( 'pagination_type' )->value();
    
    if ( $pagination_type == 'load_more' ) return true;
    
    return false;
}

/**
 * Active Callback for Shop page description
*/
function blossom_spa_pro_shop_description_ac( $control ){
    $ed_shop_archive_desc = $control->manager->get_setting( 'ed_shop_archive_description' )->value();
    $control_id = $control->id;
    
    if( $control_id == 'shop_archive_description' && $ed_shop_archive_desc == true && is_woocommerce_activated() ) return true;
    
    return false;
}

/**
 * Active Callback for static front page
*/
function blossom_spa_pro_is_front_page( $control ){
    if ( is_front_page() && is_home() ) {
        return false;
    } elseif ( is_front_page() ) {
        return true;
    } elseif ( is_home() ) {
        return false;
    }
}