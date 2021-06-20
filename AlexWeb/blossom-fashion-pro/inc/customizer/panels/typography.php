<?php
/**
 * Typography Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_typography( $wp_customize ) {
    
    /** Typography */
    $wp_customize->add_panel(
        'typography_settings',
        array(
            'title'      => __( 'Typography', 'blossom-fashion-pro' ),
            'capability' => 'edit_theme_options',
            'priority'   => 55,
        )
    );   
    
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_typography' );