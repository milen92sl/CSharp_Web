<?php
/**
 * Pricing Page Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_pricing_template( $wp_customize ) {
    
    $wp_customize->add_panel( 
        'pricing_page_settings',
         array(
            'priority'    => 45,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Pricing Page Settings', 'blossom-spa-pro' ),
        ) 
    );

    $wp_customize->add_section(
        'pricing_template',
        array(
            'title'    => __( 'Pricing Template Section', 'blossom-spa-pro' ),
            'priority' => 10,
            'panel'    => 'pricing_page_settings',
        )
    );

    $wp_customize->add_setting(
        'pricing_template_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Note_Control( 
            $wp_customize,
            'pricing_template_note_text',
            array(
                'section'     => 'pricing_template',
                'description' => __( 'If the Pricing Page Template assigned page has an featured image this Background Image Will be override by the featured image of respective page. <hr/>', 'blossom-spa-pro' ),
            )
        )
    );

    $wp_customize->add_setting( 'pricing_background_image',
        array(
            'default'           => get_template_directory_uri() . '/images/header-bg.jpg',
            'sanitize_callback' => 'blossom_spa_pro_sanitize_image',
        )
    );
    
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( $wp_customize, 'pricing_background_image',
            array(
                'label'         => esc_html__( 'Background Image', 'blossom-spa-pro' ),
                'description'   => esc_html__( 'Choose background Image of your choice. Recommended size for this image is 1920px by 232px.', 'blossom-spa-pro' ),
                'section'       => 'pricing_template',
                'type'          => 'image',
            )
        )
    );

}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_pricing_template' );