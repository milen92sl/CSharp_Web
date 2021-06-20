<?php
/**
 * Front Page Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_frontpage( $wp_customize ) {
	
    /** Front Page Settings */
    $wp_customize->add_panel( 
        'frontpage_settings',
         array(
            'priority'    => 40,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Front Page Settings', 'blossom-spa-pro' ),
            'description' => __( 'Static Home Page settings.', 'blossom-spa-pro' ),
        ) 
    );

    $wp_customize->add_section(
        'service-three',
        array(
            'title'    => __( 'Service Three Section', 'blossom-spa-pro' ),
            'priority' => 60,
            'panel'    => 'frontpage_settings',
        )
    );

    $wp_customize->add_setting(
        'service_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Note_Control( 
            $wp_customize,
            'service_note_text',
            array(
                'section'     => 'service-three',
                'description' => __( '<hr/>', 'blossom-spa-pro' ),
            )
        )
    );

    $wp_customize->add_setting( 'service_background_image',
        array(
            'default'           => get_template_directory_uri() . '/images/service-bg.jpg',
            'sanitize_callback' => 'blossom_spa_pro_sanitize_image',
        )
    );
    
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( $wp_customize, 'service_background_image',
            array(
                'label'         => esc_html__( 'Background Image', 'blossom-spa-pro' ),
                'description'   => esc_html__( 'Choose background Image of your choice. Recommended size for this image is 1920px by 650px.', 'blossom-spa-pro' ),
                'section'       => 'service-three',
                'type'          => 'image',
            )
        )
    );

    $service_three_section = $wp_customize->get_section( 'sidebar-widgets-service-three' );
    if ( ! empty( $service_three_section ) ) {

        $service_three_section->panel     = 'frontpage_settings';
        $service_three_section->priority  = 60;
        $wp_customize->get_control( 'service_note_text' )->section  = 'sidebar-widgets-service-three';
        $wp_customize->get_control( 'service_background_image' )->section  = 'sidebar-widgets-service-three';
    }

    $wp_customize->add_setting(
        'disable_all_section',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Blossom_Spa_Pro_Toggle_Control(
            $wp_customize,
            'disable_all_section',
            array(
                'label'       => __( 'Enable to hide All Home Section', 'blossom-spa-pro' ),
                'description' => __( 'Enable to show default content of home page instead of predefined home page sections.', 'blossom-spa-pro' ),
                'section'     => 'static_front_page',
                'active_callback' => 'blossom_spa_pro_is_front_page',
            )            
        )
    );    
      
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_frontpage' );