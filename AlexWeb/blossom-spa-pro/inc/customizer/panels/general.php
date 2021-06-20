<?php
/**
 * General Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_general( $wp_customize ){
    
    /** General Settings */
    $wp_customize->add_panel( 
        'general_settings',
         array(
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'General Settings', 'blossom-spa-pro' ),
            'description' => __( 'Customize Header, Social, Sharing, SEO, Post/Page, Newsletter, Performance and Miscellaneous settings.', 'blossom-spa-pro' ),
        ) 
    );
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_general' );