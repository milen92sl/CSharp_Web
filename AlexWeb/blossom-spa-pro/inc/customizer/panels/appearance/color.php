<?php
/**
 * Color Setting
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_color( $wp_customize ) {
    
    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color', 
        array(
            'default'           => '#9cbe9c',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color', 
            array(
                'label'       => __( 'Primary Color', 'blossom-spa-pro' ),
                'description' => __( 'Primary color of the theme.', 'blossom-spa-pro' ),
                'section'     => 'colors',
                'priority'    => 5,
            )
        )
    );
    
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_color' );