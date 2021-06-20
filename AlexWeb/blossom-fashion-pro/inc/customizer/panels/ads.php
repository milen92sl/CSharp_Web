<?php
/**
 * Ad Options
 *
 * @package Blossom_Fashion_Pro
 */
 
function blossom_fashion_pro_customize_register_ad( $wp_customize ) {
    
    /** AD Settings */
    $wp_customize->add_panel( 'ad_settings', array(
        'title'      => __( 'Advertisement Settings', 'blossom-fashion-pro' ),
        'priority'   => 70,
        'capability' => 'edit_theme_options',
    ) );
        
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_ad' );