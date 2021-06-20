<?php
/**
 * Layout Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_layout( $wp_customize ) {
    
    /** Layout Settings */
    $wp_customize->add_panel( 
        'layout_settings',
         array(
            'priority'    => 45,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Layout Settings', 'blossom-recipe-pro' ),
            'description' => __( 'Change different page layout from here.', 'blossom-recipe-pro' ),
        ) 
    );
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_layout' );