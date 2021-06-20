<?php
/**
 * Ad Options
 *
 * @package Blossom_Pin_Pro
 */
 
function blossom_pin_pro_customize_register_ad( $wp_customize ) {
    
    /** AD Settings */
    $wp_customize->add_panel( 'ad_settings', array(
        'title'       => __( 'Advertisement Settings', 'blossom-pin-pro' ),
        'priority'    => 70,
        'capability'  => 'edit_theme_options',
        'description' => __( 'Before and After Content AD settings.', 'blossom-pin-pro' ),
    ) );
        
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_ad' );