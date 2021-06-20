<?php
/**
 * Color Setting
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_color( $wp_customize ) {
    
    /** Color Setting*/
    $wp_customize->add_section(
        'color_settings',
        array(
            'title'      => __( 'Colors', 'blossom-feminine-pro' ),
            'priority'   => 40,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color', 
        array(
            'default'           => '#f3c9dd',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color', 
            array(
                'label'       => __( 'Primary Color', 'blossom-feminine-pro' ),
                'description' => __( 'Primary color of the theme.', 'blossom-feminine-pro' ),
                'section'     => 'color_settings',
                'active_callback' => 'blossom_feminine_pro_colors_callback',
            )
        )
    );

    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color_chic', 
        array(
            'default'           => '#f69581',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color_chic', 
            array(
                'label'       => __( 'Primary Color', 'blossom-feminine-pro' ),
                'description' => __( 'Primary color of the theme.', 'blossom-feminine-pro' ),
                'section'     => 'color_settings',
                'active_callback' => 'blossom_feminine_pro_colors_callback',
            )
        )
    );

    /** Secondary Color*/
    $wp_customize->add_setting( 
        'secondary_color_chic', 
        array(
            'default'           => '#feeae3',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'secondary_color_chic', 
            array(
                'label'       => __( 'Secondary Color', 'blossom-feminine-pro' ),
                'description' => __( 'Secondary color of the theme.', 'blossom-feminine-pro' ),
                'section'     => 'color_settings',
                'active_callback' => 'blossom_feminine_pro_colors_callback',
            )
        )
    );

    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color_mommy', 
        array(
            'default'           => '#78c0a8',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color_mommy', 
            array(
                'label'       => __( 'Primary Color', 'blossom-feminine-pro' ),
                'description' => __( 'Primary color of the theme.', 'blossom-feminine-pro' ),
                'section'     => 'color_settings',
                'active_callback' => 'blossom_feminine_pro_colors_callback',
            )
        )
    );

    /** Blossom Beauty Primary Color*/
    $wp_customize->add_setting( 
        'primary_color_beauty', 
        array(
            'default'           => '#d8bbb5',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color_beauty', 
            array(
                'label'       => __( 'Primary Color', 'blossom-feminine-pro' ),
                'description' => __( 'Primary color of the theme.', 'blossom-feminine-pro' ),
                'section'     => 'color_settings',
                'active_callback' => 'blossom_feminine_pro_colors_callback',
            )
        )
    );

    /** Blossom Diva Primary Color*/
    $wp_customize->add_setting( 
        'primary_color_diva', 
        array(
            'default'           => '#ef5285',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color_diva', 
            array(
                'label'       => __( 'Primary Color', 'blossom-feminine-pro' ),
                'description' => __( 'Primary color of the theme.', 'blossom-feminine-pro' ),
                'section'     => 'color_settings',
                'active_callback' => 'blossom_feminine_pro_colors_callback',
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
                'label'       => __( 'Background Color', 'blossom-feminine-pro' ),
                'description' => __( 'Background color of the theme.', 'blossom-feminine-pro' ),
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
                'label'       => __( 'Button Background Color', 'blossom-feminine-pro' ),
                'description' => __( 'Button Background color of the theme.', 'blossom-feminine-pro' ),
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
                'label'       => __( 'Header Background Color', 'blossom-feminine-pro' ),
                'description' => __( 'Header Background color of the theme.', 'blossom-feminine-pro' ),
                'section'     => 'color_settings',
            )
        )
    );
    
    /** Footer Background Color*/
    $wp_customize->add_setting( 
        'footer_bg_color', 
        array(
            'default'           => '#181818',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'footer_bg_color', 
            array(
                'label'       => __( 'Footer Background Color', 'blossom-feminine-pro' ),
                'description' => __( 'Footer Background color of the theme.', 'blossom-feminine-pro' ),
                'section'     => 'color_settings',
            )
        )
    );
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_color' );

/**
 * Active Callback
*/
function blossom_feminine_pro_colors_callback( $control ){
    
    $child_theme_support    = $control->manager->get_setting( 'child_additional_support' )->value();
    $control_id             = $control->id;
    
    if ( $control_id == 'primary_color' && $child_theme_support == 'default' ) return true;
    if ( $control_id == 'primary_color_chic' && $child_theme_support == 'blossom_chic' ) return true;
    if ( $control_id == 'primary_color_mommy' && $child_theme_support == 'mommy_blog' ) return true;
    if ( $control_id == 'secondary_color_chic' && $child_theme_support == 'blossom_chic' ) return true;
    if ( $control_id == 'primary_color_beauty' && $child_theme_support == 'blossom_beauty' ) return true;
    if ( $control_id == 'primary_color_diva' && $child_theme_support == 'blossom_diva' ) return true;


        
    return false;
}