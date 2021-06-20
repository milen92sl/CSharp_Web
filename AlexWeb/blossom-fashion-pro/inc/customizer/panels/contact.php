<?php
/**
 * Contact Page Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_contact( $wp_customize ) {
    
    $wp_customize->add_panel( 'contact_page_setting', array(
        'title'    => __( 'Contact Page Settings', 'blossom-fashion-pro' ),
        'priority' => 62,
        'capability' => 'edit_theme_options',
    ) );
        
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_contact' );