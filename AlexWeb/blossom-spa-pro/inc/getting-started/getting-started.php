<?php
/**
 * Getting Started Page.
 *
 * @package Blossom_Spa_Pro
 */

require get_template_directory() . '/inc/getting-started/class-getting-start-plugin-helper.php';

if( ! function_exists( 'blossom_spa_pro_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function blossom_spa_pro_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
    if( 'appearance_page_blossom-spa-pro-license' != $hook ) return;

    wp_enqueue_style( 'blossom-spa-pro-getting-started', get_template_directory_uri() . '/inc/getting-started/css/getting-started.css', false, BLOSSOM_SPA_PRO_THEME_VERSION );
    
    wp_enqueue_script( 'plugin-install' );
    wp_enqueue_script( 'updates' );
    wp_enqueue_script( 'blossom-spa-pro-getting-started', get_template_directory_uri() . '/inc/getting-started/js/getting-started.js', array( 'jquery' ), BLOSSOM_SPA_PRO_THEME_VERSION, true );
    wp_enqueue_script( 'blossom-spa-pro-recommended-plugin-install', get_template_directory_uri() . '/inc/getting-started/js/recommended-plugin-install.js', array( 'jquery' ), BLOSSOM_SPA_PRO_THEME_VERSION, true );    
    wp_localize_script( 'blossom-spa-pro-recommended-plugin-install', 'blossom_spa_pro_start_page', array( 'activating' => __( 'Activating ', 'blossom-spa-pro' ) ) );
}
endif;
add_action( 'admin_enqueue_scripts', 'blossom_spa_pro_getting_started_admin_scripts' );

if( ! function_exists( 'blossom_spa_pro_call_plugin_api' ) ) :
/**
 * Plugin API
**/
function blossom_spa_pro_call_plugin_api( $plugin ) {
	include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
	$call_api = plugins_api( 
        'plugin_information', 
            array(
    		'slug'   => $plugin,
    		'fields' => array(
    			'downloaded'        => false,
    			'rating'            => false,
    			'description'       => false,
    			'short_description' => true,
    			'donate_link'       => false,
    			'tags'              => false,
    			'sections'          => true,
    			'homepage'          => true,
    			'added'             => false,
    			'last_updated'      => false,
    			'compatibility'     => false,
    			'tested'            => false,
    			'requires'          => false,
    			'downloadlink'      => false,
    			'icons'             => true
    		)
    	) 
    );
	return $call_api;
}
endif;

if( ! function_exists( 'blossom_spa_pro_check_for_icon' ) ) :
/**
 * Check For Icon 
**/
function blossom_spa_pro_check_for_icon( $arr ) {
	if( ! empty( $arr['svg'] ) ){
		$plugin_icon_url = $arr['svg'];
	}elseif( ! empty( $arr['2x'] ) ){
		$plugin_icon_url = $arr['2x'];
	}elseif( ! empty( $arr['1x'] ) ){
		$plugin_icon_url = $arr['1x'];
	}else{
		$plugin_icon_url = $arr['default'];
	}                               
	return $plugin_icon_url;
}
endif;