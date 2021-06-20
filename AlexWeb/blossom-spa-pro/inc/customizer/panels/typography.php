<?php
/**
 * Typography Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_typography( $wp_customize ) {
    
    /** Typography */
    $wp_customize->add_panel(
        'typography_settings',
        array(
            'title'       => __( 'Typography', 'blossom-spa-pro' ),
            'capability'  => 'edit_theme_options',
            'priority'    => 35,
            'description' => __( 'Body and Content\'s H1 to H6 Typography settings.', 'blossom-spa-pro' ),
        )
    );   
    
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_typography' );