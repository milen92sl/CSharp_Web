<?php
/**
 * Toolkit Filters
 *
 * @package Blossom_Recipe_Pro
 */

if( ! function_exists( 'blossom_recipe_pro_default_cta_color' ) ) :
    function blossom_recipe_pro_default_cta_color(){
        return '#9cbe9c';
    }
endif;
add_filter( 'bttk_cta_bg_color', 'blossom_recipe_pro_default_cta_color' );

if( ! function_exists( 'blossom_recipe_pro_default_team_member_image_size' ) ) :
    function blossom_recipe_pro_default_team_member_image_size(){
        return 'full';
    }
endif;
add_filter( 'bttk_team_member_icon_img_size', 'blossom_recipe_pro_default_team_member_image_size' );

if( ! function_exists( 'blossom_recipe_pro_newsletter_bg_image_size' ) ) :
    function blossom_recipe_pro_newsletter_bg_image_size(){
        return 'full';
    }
endif;
add_filter( 'bt_newsletter_img_size', 'blossom_recipe_pro_newsletter_bg_image_size' );

if( ! function_exists( 'blossom_recipe_pro_ad_image' ) ) :
    function blossom_recipe_pro_ad_image(){
        return 'full';
    }
endif;
add_filter( 'bttk_ad_img_size', 'blossom_recipe_pro_ad_image' );

if( ! function_exists( 'blossom_recipe_pro_newsletter_bg_color' ) ) :
    function blossom_recipe_pro_newsletter_bg_color(){
        return '#56cc9d';
    }
endif;
add_filter( 'bt_newsletter_bg_color_setting', 'blossom_recipe_pro_newsletter_bg_color' );

if( ! function_exists( 'blossom_recipe_pro_author_image' ) ) :
   function blossom_recipe_pro_author_image(){
       return 'blossom-recipe-blog';
   }
endif;
add_filter( 'author_bio_img_size', 'blossom_recipe_pro_author_image' );

if( ! function_exists( 'blossom_recipe_pro_defer_js_files' ) ) :
    function blossom_recipe_pro_defer_js_files(){
        $defer_js = get_theme_mod( 'ed_defer', false );

        return ( $defer_js ) ? false : true;

    }
endif;
add_filter( 'bttk_public_assets_enqueue', 'blossom_recipe_pro_defer_js_files' );

if( ! function_exists( 'blossom_recipe_pro_archives_image_size' ) ) :
    function blossom_recipe_pro_archives_image_size(){
        $image_size = blossom_recipe_pro_archive_layout_image_size();
        return $image_size;
    }
endif;
add_filter( 'brm_archive_img_size', 'blossom_recipe_pro_archives_image_size' );

if( ! function_exists( 'blossom_recipe_pro_single_image_size' ) ) :
    function blossom_recipe_pro_single_image_size(){
        $sidebar     = blossom_recipe_pro_sidebar();
        $image_size = ( $sidebar ) ? 'blossom-recipe-blog' : 'blossom-recipe-blog-one';
        return $image_size;
    }
endif;
add_filter( 'br_feat_img_size', 'blossom_recipe_pro_single_image_size' );

if( ! function_exists( 'blossom_recipe_pro_rename_archive_labels' ) ) :
/**
 * Modify registered post type menu label
 * 
 * @param string $post_type Registered post type name. 
 * @param array $args Array of post type parameters.
 */
function blossom_recipe_pro_rename_archive_labels( $post_type, $args ) {
    global $wp_post_types;
    if ( 'blossom-recipe' === $post_type ) {
        $args->labels->name   = get_theme_mod( 'recipe_display_title', __( 'Blossom Recipes', 'blossom-recipe-pro' ) );
        $args->description    = get_theme_mod( 'recipe_display_description', __( 'Blossom Recipes Post Type', 'blossom-recipe-pro' ) );
    }
}
endif;
add_action( 'registered_post_type', 'blossom_recipe_pro_rename_archive_labels', 10, 2 );