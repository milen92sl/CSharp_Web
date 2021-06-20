<?php
/**
 * Typography Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_typography( $wp_customize ) {
    
    /** Typography */
    $wp_customize->add_panel(
        'typography_settings',
        array(
            'title'       => __( 'Typography', 'blossom-recipe-pro' ),
            'capability'  => 'edit_theme_options',
            'priority'    => 55,
            'description' => __( 'Body and Content\'s H1 to H6 Typography settings.', 'blossom-recipe-pro' ),
        )
    );   
    
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_typography' );