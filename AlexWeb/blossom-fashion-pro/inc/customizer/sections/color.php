<?php
/**
 * Color Setting
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_color( $wp_customize ) {
    
    /** Color Setting*/
    $wp_customize->add_section(
        'color_settings',
        array(
            'title'      => __( 'Colors', 'blossom-fashion-pro' ),
            'priority'   => 40,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color', 
        array(
            'default'           => '#f1d3d3',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color', 
            array(
                'label'       => __( 'Primary Color', 'blossom-fashion-pro' ),
                'description' => __( 'Primary color of the theme.', 'blossom-fashion-pro' ),
                'section'     => 'color_settings',
                'active_callback' => 'blossom_fashion_pro_colors_callback',
            )
        )
    );
    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color_lifestyle', 
        array(
            'default'           => '#60c5ba',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color_lifestyle', 
            array(
                'label'       => __( 'Primary Color', 'blossom-fashion-pro' ),
                'description' => __( 'Primary color of the theme.', 'blossom-fashion-pro' ),
                'section'     => 'color_settings',
                'active_callback' => 'blossom_fashion_pro_colors_callback',
            )
        )
    );

    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color_stylist', 
        array(
            'default'           => '#ea4e59',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color_stylist', 
            array(
                'label'       => __( 'Primary Color', 'blossom-fashion-pro' ),
                'description' => __( 'Primary color of the theme.', 'blossom-fashion-pro' ),
                'section'     => 'color_settings',
                'active_callback' => 'blossom_fashion_pro_colors_callback',
            )
        )
    );

    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color_icon', 
        array(
            'default'           => '#ed5485',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color_icon', 
            array(
                'label'       => __( 'Primary Color', 'blossom-fashion-pro' ),
                'description' => __( 'Primary color of the theme.', 'blossom-fashion-pro' ),
                'section'     => 'color_settings',
                'active_callback' => 'blossom_fashion_pro_colors_callback',
            )
        )
    );
    
    /** Background Color*/
    $wp_customize->add_setting( 
        'bg_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'bg_color', 
            array(
                'label'       => __( 'Background Color', 'blossom-fashion-pro' ),
                'description' => __( 'Background color of the theme.', 'blossom-fashion-pro' ),
                'section'     => 'color_settings',
            )
        )
    );
    
    /** Button Background Color*/
    $wp_customize->add_setting( 
        'btn_bg_color', 
        array(
            'default'           => '#111111',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'btn_bg_color', 
            array(
                'label'       => __( 'Button Background Color', 'blossom-fashion-pro' ),
                'description' => __( 'Button Background color of the theme.', 'blossom-fashion-pro' ),
                'section'     => 'color_settings',
            )
        )
    );
    
    /** Header Background Color*/
    $wp_customize->add_setting( 
        'header_bg_color', 
        array(
            'default'           => '#111111',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'header_bg_color', 
            array(
                'label'           => __( 'Header Background Color', 'blossom-fashion-pro' ),
                'description'     => __( 'Header Background color of the theme for Header Layout Seven.', 'blossom-fashion-pro' ),
                'section'         => 'color_settings',
                'active_callback' => 'blossom_fashion_pro_header_color_ac'
            )
        )
    );
    
    /** Footer Background Color*/
    $wp_customize->add_setting( 
        'footer_bg_color', 
        array(
            'default'           => '#111111',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'footer_bg_color', 
            array(
                'label'       => __( 'Footer Background Color', 'blossom-fashion-pro' ),
                'description' => __( 'Footer Background color of the theme.', 'blossom-fashion-pro' ),
                'section'     => 'color_settings',
            )
        )
    );
    
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_color' );

/**
 * Active Callback
*/
function blossom_fashion_pro_header_color_ac( $control ){
    
    $header_layout = $control->manager->get_setting( 'header_layout' )->value();
    $control_id    = $control->id;
    
    if( $control_id == 'header_bg_color' && $header_layout == 'seven' ) return true;
    
    return false;
}

function blossom_fashion_pro_colors_callback( $control ){
    
    $child_theme_support    = $control->manager->get_setting( 'child_additional_support' )->value();
    $control_id             = $control->id;
    
    if ( $control_id == 'primary_color' && $child_theme_support == 'default' ) return true;
    if ( $control_id == 'primary_color_lifestyle' && $child_theme_support == 'fashion_lifestyle' ) return true;
    if ( $control_id == 'primary_color_stylist' && $child_theme_support == 'fashion_stylist' ) return true;
    if ( $control_id == 'primary_color_icon' && $child_theme_support == 'fashion_icon' ) return true;

        
    return false;
}