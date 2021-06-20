<?php
/**
 * Typography Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_typography( $wp_customize ) {
    
    /** Typography */
    $wp_customize->add_panel(
        'typography_settings',
        array(
            'title'       => __( 'Typography', 'blossom-pin-pro' ),
            'capability'  => 'edit_theme_options',
            'priority'    => 55,
            'description' => __( 'Body and Content\'s H1 to H6 Typography settings.', 'blossom-pin-pro' ),
        )
    );   
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_typography' );