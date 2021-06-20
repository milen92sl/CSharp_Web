<?php
/**
 * Blossom Feminine Theme Customizer
 *
 * @package Blossom_Feminine_Pro
 */

/**
 * Requiring customizer panels & sections
*/
$blossom_feminine_pro_panels = array( 'layout', 'appearance', 'typography', 'general', 'ads' );
$blossom_feminine_pro_sections     = array( 'site', 'color', 'sidebar', 'footer', 'child-theme-support' );
$blossom_feminine_pro_sub_sections = array(
    'layout'     => array( 'header', 'slider', 'featured', 'sticky', 'home', 'post', 'pagination' ),
    'typography' => array( 'body', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ),
    'general'    => array( 'notification', 'slider', 'featured', 'social', 'share', 'seo', 'post-page', 'performance', 'newsletter', 'instagram', 'misc', 'shop' ),
    'ads'        => array( 'header', 'before-posts', 'after-posts', 'before-content', 'after-content' ),
);

foreach( $blossom_feminine_pro_sections as $s ){
    require get_template_directory() . '/inc/customizer/sections/' . $s . '.php';
}

foreach( $blossom_feminine_pro_panels as $p ){
   require get_template_directory() . '/inc/customizer/panels/' . $p . '.php';
}

foreach( $blossom_feminine_pro_sub_sections as $k => $v ){
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
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blossom_feminine_pro_customize_preview_js() {
	wp_enqueue_script( 'blossom-feminine-pro-customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blossom_feminine_pro_customize_preview_js' );

function blossom_feminine_pro_customize_control_js(){
    wp_enqueue_style( 'blossom-feminine-pro-customize', get_template_directory_uri() . '/inc/css/customize.css' );
    wp_enqueue_script( 'blossom-feminine-pro-customize', get_template_directory_uri() . '/inc/js/customize.js', array( 'jquery', 'customize-controls' ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'blossom_feminine_pro_customize_control_js' );

/*
 * Notifications in customizer
 */
require get_template_directory() . '/inc/customizer-plugin-recommend/customizer-notice/class-customizer-notice.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-install-helper.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-recommend.php';
