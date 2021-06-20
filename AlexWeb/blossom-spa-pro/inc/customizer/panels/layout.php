<?php
/**
 * Layout Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_layout( $wp_customize ) {
    
    /** Layout Settings */
    $wp_customize->add_panel( 
        'layout_settings',
         array(
            'priority'    => 30,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Layout Settings', 'blossom-spa-pro' ),
            'description' => __( 'Change different page layout from here.', 'blossom-spa-pro' ),
        ) 
    );
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_layout' );