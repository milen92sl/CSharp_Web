<?php
/**
 * Color Setting
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_color( $wp_customize ) {
    
    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color', 
        array(
            'default'           => '#ff91a4',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color', 
            array(
                'label'       => __( 'Primary Color', 'blossom-pin-pro' ),
                'description' => __( 'Primary color of the theme.', 'blossom-pin-pro' ),
                'section'     => 'colors',
                'priority'    => 5,
                'active_callback' => 'blossom_pin_pro_theme_colors_callback',
            )
        )
    );

    /** Primary Color Pinthis*/
    $wp_customize->add_setting( 
        'primary_color_pinthis', 
        array(
            'default'           => '#e7475e',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color_pinthis', 
            array(
                'label'       => __( 'Primary Color', 'blossom-pin-pro' ),
                'description' => __( 'Primary color of the theme.', 'blossom-pin-pro' ),
                'section'     => 'colors',
                'priority'    => 5,
                'active_callback' => 'blossom_pin_pro_theme_colors_callback',
            )
        )
    );
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_color' );


/**
 * Active Callback
*/
function blossom_pin_pro_theme_colors_callback( $control ){
    
    $child_theme_support    = $control->manager->get_setting( 'child_additional_support' )->value();
    $control_id             = $control->id;
    
    if ( $control_id == 'primary_color' && $child_theme_support == 'default' ) return true;
    if ( $control_id == 'primary_color_pinthis' && $child_theme_support == 'blossom_pinthis' ) return true;

    return false;
}