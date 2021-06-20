<?php
/**
 * Appearance Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_appearance( $wp_customize ) {
    
    $wp_customize->add_panel( 
        'appearance_settings', 
        array(
            'title'       => __( 'Appearance Settings', 'blossom-spa-pro' ),
            'priority'    => 25,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Change color and body background.', 'blossom-spa-pro' ),
        ) 
    );
    
    /** Move Background Image section to appearance panel */
    $wp_customize->get_section( 'colors' )->panel                          = 'appearance_settings';
    $wp_customize->get_section( 'colors' )->priority                       = 30;
    $wp_customize->get_section( 'background_image' )->panel                = 'appearance_settings';
    $wp_customize->get_section( 'background_image' )->priority             = 35;
    $wp_customize->get_section( 'background_image' )->title                = __( 'Background', 'blossom-spa-pro' );
    $wp_customize->get_control( 'background_image' )->active_callback      = 'blossom_spa_pro_body_bg_choice';       
    $wp_customize->get_control( 'background_preset' )->active_callback     = 'blossom_spa_pro_body_bg_choice';
    $wp_customize->get_control( 'background_position' )->active_callback   = 'blossom_spa_pro_body_bg_choice';
    $wp_customize->get_control( 'background_size' )->active_callback       = 'blossom_spa_pro_body_bg_choice';
    $wp_customize->get_control( 'background_repeat' )->active_callback     = 'blossom_spa_pro_body_bg_choice';
    $wp_customize->get_control( 'background_attachment' )->active_callback = 'blossom_spa_pro_body_bg_choice';
    $wp_customize->get_control( 'background_color' )->description          = __( 'Background color of the theme.', 'blossom-spa-pro' );  
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_appearance' );