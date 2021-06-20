<?php
/**
 * Layout Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_layout( $wp_customize ) {
    
    /** Layout Settings */
    $wp_customize->add_panel( 
        'layout_settings',
         array(
            'priority'    => 45,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Layout Settings', 'blossom-feminine-pro' ),
            'description' => __( 'Change different page layout from here.', 'blossom-feminine-pro' ),
        ) 
    );
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_layout' );