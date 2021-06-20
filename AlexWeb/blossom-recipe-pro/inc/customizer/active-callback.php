<?php
/**
 * Active Callback
 * 
 * @package Blossom_Recipe_Pro
*/

/**
 * Active Callback for Banner Slider
*/
function blossom_recipe_pro_banner_ac( $control ){
    $banner        = $control->manager->get_setting( 'ed_banner_section' )->value();
    $slider_type   = $control->manager->get_setting( 'slider_type' )->value();
    $slider_layout = $control->manager->get_setting( 'slider_layout' )->value();
    $control_id    = $control->id;
    
    if ( $control_id == 'header_image' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'header_video' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'external_header_video' && $banner == 'static_banner' ) return true;
    
    if ( $control_id == 'slider_type' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'include_repetitive_posts' && $banner == 'slider_banner' && ( $slider_type == 'latest_posts' || $slider_type == 'cat' ) ) return true;
    if ( $control_id == 'slider_auto' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'slider_loop' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'slider_speed' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'slider_caption' && $banner == 'slider_banner' ) return true;              
    if ( $control_id == 'slider_cat' && $banner == 'slider_banner' && $slider_type == 'cat' ) return true;
    if ( $control_id == 'no_of_slides' && $banner == 'slider_banner' && ( $slider_type == 'latest_posts' || $slider_type == 'latest_recipes' ) && $slider_layout != 'two' ) return true;
    if ( $control_id == 'slider_pages' && $banner == 'slider_banner' && $slider_type == 'pages' ) return true;
    if ( $control_id == 'slider_custom' && $banner == 'slider_banner' && $slider_type == 'custom' ) return true;

    if ( $control_id == 'slider_recipe_cat' && $banner == 'slider_banner' && $slider_type == 'cat_recipes' ) return true;
    if ( $control_id == 'slider_animation' && $banner == 'slider_banner' && $slider_layout == 'three' ) return true;
    if ( $control_id == 'slider_caption_layout' && $banner == 'slider_banner' && $slider_layout == 'three' ) return true;
    if ( $control_id == 'banner_hr' && $banner == 'slider_banner' ) return true;
    
    return false;
}

/**
 * Active Callback for Body Background
*/
function blossom_recipe_pro_body_bg_choice( $control ){
    
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
 * Active Callback for before content AD
*/
function blossom_recipe_pro_adhome_ac( $control ){
    
    $ed_code     = $control->manager->get_setting( 'ed_home_post_ad_code' )->value();
    $control_id  = $control->id;
    
    if ( $control_id == 'home_post_ad_code' && $ed_code == true ) return true;
    if ( $control_id == 'open_link_diff_tab_home_post' && $ed_code == false ) return true;
    if ( $control_id == 'home_post_ad' && $ed_code == false ) return true;
    if ( $control_id == 'home_post_ad_link' && $ed_code == false ) return true;
    
    return false;
} 

/**
 * Active Callback for before content AD
*/
function blossom_recipe_pro_adbc_ac( $control ){
    
    $ed_code     = $control->manager->get_setting( 'ed_bc_post_ad_code' )->value();
    $control_id  = $control->id;
    
    if ( $control_id == 'bc_post_ad_code' && $ed_code == true ) return true;
    if ( $control_id == 'open_link_diff_tab_bc_post' && $ed_code == false ) return true;
    if ( $control_id == 'bc_post_ad' && $ed_code == false ) return true;
    if ( $control_id == 'bc_post_ad_link' && $ed_code == false ) return true;
    
    return false;
} 

/**
 * Active Callback for after content AD
*/
function blossom_recipe_pro_adac_ac( $control ){
    
    $ed_code     = $control->manager->get_setting( 'ed_ac_post_ad_code' )->value();
    $control_id  = $control->id;
    
    if ( $control_id == 'ac_post_ad_code' && $ed_code == true ) return true;
    if ( $control_id == 'open_link_diff_tab_ac_post' && $ed_code == false ) return true;
    if ( $control_id == 'ac_post_ad' && $ed_code == false ) return true;
    if ( $control_id == 'ac_post_ad_link' && $ed_code == false ) return true;
    
    return false;
}


/**
 * Active Callback for post/page
*/
function blossom_recipe_pro_post_page_ac( $control ){
    
    $ed_related    = $control->manager->get_setting( 'ed_related' )->value();
    $control_id    = $control->id;
    
    if( is_brm_activated() ) {
        $ed_related_blog    = $control->manager->get_setting( 'ed_related_blog' )->value();
        if ( $control_id == 'related_post_blog_title' && $ed_related_blog == true ) return true;
        if ( $control_id == 'related_blog_taxonomy' && $ed_related_blog == true ) return true;
    }

    if ( $control_id == 'related_post_title' && $ed_related == true ) return true;
    if ( $control_id == 'related_taxonomy' && $ed_related == true ) return true;
    
    return false;
}

/**
 * Active Callback for featuerd content
*/
function blossom_recipe_pro_featured_ac( $control ){
    
    $ed_featured_area   = $control->manager->get_setting( 'ed_featured_area' )->value();
    $tab_type   = $control->manager->get_setting( 'tab_type' )->value();
    $featured_type   = $control->manager->get_setting( 'featured_type' )->value();
    $control_id      = $control->id;
    
    if ( $control_id == 'tab_type' && $ed_featured_area ) return true;
    if ( $control_id == 'featured_type' && $ed_featured_area && $tab_type == 'featured' ) return true;
    if ( $control_id == 'featured_post_one' && $ed_featured_area && $tab_type == 'featured' && $featured_type == 'post' ) return true;
    if ( $control_id == 'featured_post_two' && $ed_featured_area && $tab_type == 'featured' && $featured_type == 'post' ) return true;
    if ( $control_id == 'featured_post_three' && $ed_featured_area && $tab_type == 'featured' && $featured_type == 'post' ) return true;
    if ( $control_id == 'featured_post_four' && $ed_featured_area && $tab_type == 'featured' && $featured_type == 'post' ) return true;
    if ( $control_id == 'featured_recipe_one' && $ed_featured_area && $tab_type == 'featured' && $featured_type == 'recipe' ) return true;
    if ( $control_id == 'featured_recipe_two' && $ed_featured_area && $tab_type == 'featured' && $featured_type == 'recipe' ) return true;
    if ( $control_id == 'featured_recipe_three' && $ed_featured_area && $tab_type == 'featured' && $featured_type == 'recipe' ) return true;
    if ( $control_id == 'featured_recipe_four' && $ed_featured_area && $tab_type == 'featured' && $featured_type == 'recipe' ) return true;
    if ( $control_id == 'featured_custom' && $ed_featured_area && $tab_type == 'featured' && $featured_type == 'custom' ) return true;
    if ( $control_id == 'popular_type' && $ed_featured_area && $tab_type == 'popular' ) return true;
    if ( $control_id == 'popular_content_type' && $ed_featured_area && $tab_type == 'popular' ) return true;
    if ( $control_id == 'latest_type' && $ed_featured_area && $tab_type == 'latest' ) return true;
    
    return false;
}

/**
 * Active Callback for pagination
*/
function blossom_recipe_pro_loading_ac( $control ){
    
    $pagination_type = $control->manager->get_setting( 'pagination_type' )->value();
    
    if ( $pagination_type == 'load_more' ) return true;
    
    return false;
}

/**
 * Active Callback for Shop page description
*/
function blossom_recipe_pro_shop_description_ac( $control ){
    $ed_shop_archive_desc = $control->manager->get_setting( 'ed_shop_archive_description' )->value();
    $control_id = $control->id;
    
    if( $control_id == 'shop_archive_description' && $ed_shop_archive_desc == true && is_woocommerce_activated() ) return true;
    
    return false;
}

/**
 * Active Callback for Header Newsletter
*/
function blossom_recipe_pro_header_newsletter_callback( $control ){
    $ed_header_newsletter = $control->manager->get_setting( 'ed_header_newsletter' )->value();
    $control_id = $control->id;
    
    if( $control_id == 'header_newsletter_shortcode' && $ed_header_newsletter ) return true;
    
    return false;
}