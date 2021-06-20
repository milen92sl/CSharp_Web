<?php
/**
 * Contact Page Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_contact( $wp_customize ) {
    
    $wp_customize->add_panel( 
        'contact_page_setting', 
        array(
            'title'       => __( 'Contact Page Settings', 'blossom-spa-pro' ),
            'priority'    => 45,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Contact Form, Google Map and Contact Details settings.', 'blossom-spa-pro' ),
        ) 
    );

    $wp_customize->add_section(
        'contact_template',
        array(
            'title'    => __( 'Contact Template Section', 'blossom-spa-pro' ),
            'priority' => 10,
            'panel'    => 'contact_page_setting',
        )
    );

    $wp_customize->add_setting(
        'contact_template_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Note_Control( 
            $wp_customize,
            'contact_template_note_text',
            array(
                'section'     => 'contact_template',
                'description' => __( 'If the Contact Page Template assigned page has an featured image this Background Image Will be override by the featured image of respective page. <hr/>', 'blossom-spa-pro' ),
            )
        )
    );

    $wp_customize->add_setting( 'contact_background_image',
        array(
            'default'           => get_template_directory_uri() . '/images/header-bg.jpg',
            'sanitize_callback' => 'blossom_spa_pro_sanitize_image',
        )
    );
    
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( $wp_customize, 'contact_background_image',
            array(
                'label'         => esc_html__( 'Background Image', 'blossom-spa-pro' ),
                'description'   => esc_html__( 'Choose background Image of your choice. Recommended size for this image is 1920px by 232px.', 'blossom-spa-pro' ),
                'section'       => 'contact_template',
                'type'          => 'image',
            )
        )
    );
        
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_contact' );