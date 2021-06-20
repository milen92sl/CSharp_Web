<?php
/**
 * General Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_general( $wp_customize ){
    
    /** General Settings */
    $wp_customize->add_panel( 
        'general_settings',
         array(
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'General Settings', 'blossom-feminine-pro' ),
            'description' => __( 'Customize Slider, Featured, Social, SEO, Post/Page, Newsletter & Instagram settings.', 'blossom-feminine-pro' ),
        ) 
    );  
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_general' );