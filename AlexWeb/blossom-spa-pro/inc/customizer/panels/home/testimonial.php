<?php
/**
 * Testimonial Section
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_frontpage_testimonial( $wp_customize ){
    
    /** Testimonial Section */
    $wp_customize->add_section(
        'testimonial',
        array(
            'title'    => __( 'Testimonial Section', 'blossom-spa-pro' ),
            'priority' => 120,
            'panel'    => 'frontpage_settings',
        )
    );

    $wp_customize->add_setting(
        'testimonial_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Note_Control( 
            $wp_customize,
            'testimonial_note_text',
            array(
                'section'     => 'testimonial',
                'description' => __( '<hr/>', 'blossom-spa-pro' ),
            )
        )
    );
    
    /** Testimonial Title  */
    $wp_customize->add_setting(
        'testimonial_title',
        array(
            'default'           => __( 'Here\'s What Our Customers Think', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'testimonial_title',
        array(
            'label'           => __( 'Testimonial Section Title', 'blossom-spa-pro' ),
            'description'     => __( 'Add title for testimonial section.', 'blossom-spa-pro' ),
            'section'         => 'testimonial',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'testimonial_title', array(
        'selector' => '.testimonial-section .container h2.section-title',
        'render_callback' => 'blossom_spa_pro_get_testimonial_title',
    ) );
    
    /** Testimonial Subtitle  */
    $wp_customize->add_setting(
        'testimonial_subtitle',
        array(
            'default'           => __( 'Feedbacks', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'testimonial_subtitle',
        array(
            'label'           => __( 'Testimonial Section Subtitle', 'blossom-spa-pro' ),
            'description'     => __( 'Add subtitle for testimonial section.', 'blossom-spa-pro' ),
            'section'         => 'testimonial',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'testimonial_subtitle', array(
        'selector' => '.testimonial-section .container span.sub-title',
        'render_callback' => 'blossom_spa_pro_get_testimonial_subtitle',
    ) );

    /** Testimonial Content  */
    $wp_customize->add_setting(
        'testimonial_content',
        array(
            'default'           => __( 'Our customers love us. We make sure that we make every customer happy. Showcase the feedback from your old customers to build trust with new customers using testimonials.', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'testimonial_content',
        array(
            'label'           => __( 'Testimonial Section Description', 'blossom-spa-pro' ),
            'description'     => __( 'Add description for testimonial section.', 'blossom-spa-pro' ),
            'section'         => 'testimonial',
            'type'            => 'textarea',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'testimonial_content', array(
        'selector' => '.testimonial-section .container .section-desc',
        'render_callback' => 'blossom_spa_pro_get_testimonial_content',
    ) );

    $testimonial_section = $wp_customize->get_section( 'sidebar-widgets-testimonial' );
    if ( ! empty( $testimonial_section ) ) {

        $testimonial_section->panel     = 'frontpage_settings';
        $testimonial_section->priority  = 120;
        $wp_customize->get_control( 'testimonial_note_text' )->section  = 'sidebar-widgets-testimonial';
        $wp_customize->get_control( 'testimonial_title' )->section  = 'sidebar-widgets-testimonial';
        $wp_customize->get_control( 'testimonial_subtitle' )->section  = 'sidebar-widgets-testimonial';
        $wp_customize->get_control( 'testimonial_content' )->section  = 'sidebar-widgets-testimonial';
    }     
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_frontpage_testimonial' );