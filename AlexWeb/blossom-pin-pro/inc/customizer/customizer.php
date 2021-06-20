<?php
/**
 * Blossom Pin Pro Theme Customizer
 *
 * @package Blossom_Pin_Pro
 */

/**
 * Requiring customizer panels & sections
*/
$blossom_pin_pro_panels = array( 'layout', 'typography', 'general', 'ads' );
$blossom_pin_pro_sections     = array( 'site', 'child-theme-support', 'color', 'background', 'performance', 'sidebar', 'footer' );
$blossom_pin_pro_sub_sections = array(
    'layout'     => array( 'header', 'slider', 'home', 'archive', 'post', 'general', 'pagination' ),
    'typography' => array( 'body', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ),
    'general'    => array( 'featured', 'social', 'share', 'seo', 'post-page', 'newsletter', 'instagram', 'shop', 'misc' ),
    'ads'        => array( 'header', 'home', 'before-content', 'after-content' ),
);

foreach( $blossom_pin_pro_sections as $s ){
    require get_template_directory() . '/inc/customizer/sections/' . $s . '.php';
}

foreach( $blossom_pin_pro_panels as $p ){
   require get_template_directory() . '/inc/customizer/panels/' . $p . '.php';
}

foreach( $blossom_pin_pro_sub_sections as $k => $v ){
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
function blossom_pin_pro_customize_preview_js() {
	wp_enqueue_script( 'blossom-pin-pro-customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), BLOSSOM_PIN_PRO_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'blossom_pin_pro_customize_preview_js' );

function blossom_pin_pro_customize_script(){
    
    wp_enqueue_style( 'blossom-pin-pro-customize', get_template_directory_uri() . '/inc/css/customize.css', array(), BLOSSOM_PIN_PRO_THEME_VERSION );
    wp_enqueue_script( 'blossom-pin-pro-customize', get_template_directory_uri() . '/inc/js/customize.js', array( 'jquery', 'customize-controls' ), BLOSSOM_PIN_PRO_THEME_VERSION, true );
}
add_action( 'customize_controls_enqueue_scripts', 'blossom_pin_pro_customize_script' );