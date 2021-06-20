<?php
/**
 * Blossom Spa Pro Theme Customizer
 *
 * @package Blossom_Spa_Pro
 */

/**
 * Requiring customizer panels & sections
*/
$blossom_spa_pro_panels       = array( 'appearance', 'layout', 'typography', 'home', 'service', 'contact', 'pricing', 'team', 'gallery', 'general' );
$blossom_spa_pro_sections     = array( 'site', 'footer' );
$blossom_spa_pro_sub_sections = array(
    'appearance' => array( 'background', 'color' ),
    'layout'     => array( 'header', 'single', 'blog', 'general', 'pagination' ),
    'typography' => array( 'body', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ),
    'home'       => array( 'banner', 'special-pricing', 'popular-product', 'team', 'blog', 'gallery', 'testimonial', 'products', 'sort', 'onepage' ),
    'general'    => array( 'performance', 'sidebar', 'header', 'social', 'share', 'seo', 'post-page', 'instagram', 'misc' ),    
);

foreach( $blossom_spa_pro_sections as $s ){
    require get_template_directory() . '/inc/customizer/sections/' . $s . '.php';
}

foreach( $blossom_spa_pro_panels as $p ){
   require get_template_directory() . '/inc/customizer/panels/' . $p . '.php';
}

foreach( $blossom_spa_pro_sub_sections as $k => $v ){
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
function blossom_spa_pro_customize_preview_js() {
	wp_enqueue_script( 'blossom-spa-pro-customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), BLOSSOM_SPA_PRO_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'blossom_spa_pro_customize_preview_js' );

function blossom_spa_pro_customize_script(){
    $array = array(
        'home'    => get_home_url(),
        'service' => blossom_spa_pro_get_page_template_url( 'templates/service.php' ),
        'contact' => blossom_spa_pro_get_page_template_url( 'templates/contact.php' ),
        'pricing' => blossom_spa_pro_get_page_template_url( 'templates/pricing.php' ),
        'team'    => blossom_spa_pro_get_page_template_url( 'templates/team.php' ),
        'gallery' => blossom_spa_pro_get_page_template_url( 'templates/gallery.php' ),
    );
    wp_enqueue_style( 'blossom-spa-pro-customize', get_template_directory_uri() . '/inc/css/customize.css', array(), BLOSSOM_SPA_PRO_THEME_VERSION );
    wp_enqueue_script( 'blossom-spa-pro-customize', get_template_directory_uri() . '/inc/js/customize.js', array( 'jquery', 'customize-controls' ), BLOSSOM_SPA_PRO_THEME_VERSION, true );
    wp_localize_script( 'blossom-spa-pro-customize', 'blossom_spa_pro_cdata', $array );
}
add_action( 'customize_controls_enqueue_scripts', 'blossom_spa_pro_customize_script' );

/*
 * Notifications in customizer
 */
require get_template_directory() . '/inc/customizer-plugin-recommend/customizer-notice/class-customizer-notice.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-install-helper.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-recommend.php';

$config_customizer = array(
	'recommended_plugins' => array(
		//change the slug for respective plugin recomendation
        'blossomthemes-toolkit' => array(
			'recommended' => true,
			'description' => sprintf(
				/* translators: %s: plugin name */
				esc_html__( 'If you want to take full advantage of the features this theme has to offer, please install and activate %s plugin.', 'blossom-spa-pro' ), '<strong>BlossomThemes Toolkit</strong>'
			),
		),
	),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'blossom-spa-pro' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'blossom-spa-pro' ),
	'activate_button_label'     => esc_html__( 'Activate', 'blossom-spa-pro' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'blossom-spa-pro' ),
);
Blossom_Spa_Pro_Customizer_Notice::init( apply_filters( 'blossom_spa_pro_customizer_notice_array', $config_customizer ) );