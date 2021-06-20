<?php
/**
 * Ad Options
 *
 * @package Blossom_Recipe_Pro
 */
 
function blossom_recipe_pro_customize_register_ad( $wp_customize ) {
    
    /** AD Settings */
    $wp_customize->add_panel( 'ad_settings', array(
        'title'       => __( 'Advertisement Settings', 'blossom-recipe-pro' ),
        'priority'    => 70,
        'capability'  => 'edit_theme_options',
        'description' => __( 'Before and After Content AD settings.', 'blossom-recipe-pro' ),
    ) );
        
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_ad' );