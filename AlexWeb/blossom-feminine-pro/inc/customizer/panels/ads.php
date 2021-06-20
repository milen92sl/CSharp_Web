<?php
/**
 * Ad Options
 *
 * @package Blossom_Feminine_Pro
 */
 
function blossom_feminine_pro_customize_register_ad( $wp_customize ) {
    
    /** AD Settings */
    $wp_customize->add_panel( 'ad_settings', array(
        'title'      => __( 'Advertisement Settings', 'blossom-feminine-pro' ),
        'priority'   => 70,
        'capability' => 'edit_theme_options',
    ) );
        
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_ad' );