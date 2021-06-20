<?php
/**
 * Blossom Recipe Pro Theme Customizer
 *
 * @package Blossom_Recipe_Pro
 */

/**
 * Requiring customizer panels & sections
*/
$blossom_recipe_pro_panels = array( 'layout', 'typography', 'general', 'ads' );
$blossom_recipe_pro_sections     = array( 'site', 'color', 'background', 'performance', 'sidebar', 'footer' );
$blossom_recipe_pro_sub_sections = array(
    'layout'     => array( 'header', 'slider', 'home', 'archive', 'general', 'pagination' ),
    'typography' => array( 'body', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ),
    'general'    => array( 'header', 'featured', 'social', 'share', 'seo', 'post-page', 'instagram', 'shop', 'misc', 'plugins' ),
    'ads'        => array( 'ads-home', 'before-content', 'after-content' ),
);

foreach( $blossom_recipe_pro_sections as $s ){
    require get_template_directory() . '/inc/customizer/sections/' . $s . '.php';
}

foreach( $blossom_recipe_pro_panels as $p ){
   require get_template_directory() . '/inc/customizer/panels/' . $p . '.php';
}

foreach( $blossom_recipe_pro_sub_sections as $k => $v ){
    foreach( $v as $w ){        
        require get_template_directory() . '/inc/customizer/panels/' . $k . '/' . $w . '.php';
    }
}

/**
 * Reset Theme Options
*/
require get_template_directory() . '/inc/customizer/customizer-reset/customizer-reset.php';

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Active Callbacks
*/
require get_template_directory() . '/inc/customizer/active-callback.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blossom_recipe_pro_customize_preview_js() {
	wp_enqueue_script( 'blossom-recipe-pro-customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), BLOSSOM_RECIPE_PRO_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'blossom_recipe_pro_customize_preview_js' );

function blossom_recipe_pro_customize_script(){
    $array = array(
        'home'    => get_home_url(),
    );
    
    wp_enqueue_style( 'blossom-recipe-pro-customize', get_template_directory_uri() . '/inc/css/customize.css', array(), BLOSSOM_RECIPE_PRO_THEME_VERSION );
    wp_enqueue_script( 'blossom-recipe-pro-customize', get_template_directory_uri() . '/inc/js/customize.js', array( 'jquery', 'customize-controls' ), BLOSSOM_RECIPE_PRO_THEME_VERSION, true );
    wp_localize_script( 'blossom-recipe-pro-customize', 'blossom_recipe_pro_cdata', $array );
}
add_action( 'customize_controls_enqueue_scripts', 'blossom_recipe_pro_customize_script' );

/*
 * Notifications in customizer
 */
require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-install-helper.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-recommend.php';