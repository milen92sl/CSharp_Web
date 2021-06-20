<?php
/**
 * Home Page Gallery Section Options
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_frontpage_gallery( $wp_customize ) {

    /** Gallery Section */
    $wp_customize->add_section(
        'gallery',
        array(
            'title' => __( 'Gallery Section', 'blossom-spa-pro' ),
            'priority' => 110,
            'panel' => 'frontpage_settings',
        )
    );

    $wp_customize->add_setting(
        'gallery_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Note_Control( 
            $wp_customize,
            'gallery_note_text',
            array(
                'section'     => 'gallery',
                'description' => __( '<hr/>', 'blossom-spa-pro' ),
            )
        )
    );

    /** Button Label */
    $wp_customize->add_setting(
        'gallery_btn_label',
        array(
            'default'           =>  __( 'SEE ALL PHOTOS', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'gallery_btn_label',
        array(
            'label'    => __( 'Button Label', 'blossom-spa-pro' ),
            'section'  => 'gallery',
            'type'     => 'text',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'gallery_btn_label', array(
        'selector' => '.gallery-section .container a.btn-readmore',
        'render_callback' => 'blossom_spa_pro_get_gallery_btn_label',
    ) );

    /** Button Url */
    $wp_customize->add_setting(
        'gallery_btn_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'gallery_btn_url',
        array(
            'label'           => __( 'Button URL', 'blossom-spa-pro' ),
            'section'         => 'gallery',
            'type'            => 'url',
        )
    );

    $gallery_section = $wp_customize->get_section( 'sidebar-widgets-gallery' );
    if ( ! empty( $gallery_section ) ) {

        $gallery_section->panel     = 'frontpage_settings';
        $gallery_section->priority  = 110;
        $wp_customize->get_control( 'gallery_note_text' )->section  = 'sidebar-widgets-gallery';
        $wp_customize->get_control( 'gallery_btn_label' )->section  = 'sidebar-widgets-gallery';
        $wp_customize->get_control( 'gallery_btn_url' )->section  = 'sidebar-widgets-gallery';
    }
    /** Gallery Section Ends */  
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_frontpage_gallery' );