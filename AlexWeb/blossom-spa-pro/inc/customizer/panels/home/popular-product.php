<?php
/**
 * Popular Procedures Section
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_frontpage_popular_product( $wp_customize ){

    /** Popular Procedures Section */
    $wp_customize->add_section(
        'popular_product_section',
        array(
            'title'    => __( 'Popular Procedures Section', 'blossom-spa-pro' ),
            'priority' => 30,
            'panel'    => 'frontpage_settings',
            'active_callback' => 'blossom_spa_pro_popular_product_active'
        )
    );

    /** Popular Procedures Title  */
    $wp_customize->add_setting(
        'popular_product_title',
        array(
            'default'           => __( 'Our Most Loved Services', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'popular_product_title',
        array(
            'label'           => __( 'Popular Procedures Section Title', 'blossom-spa-pro' ),
            'description'     => __( 'Add title for popular product section.', 'blossom-spa-pro' ),
            'section'         => 'popular_product_section',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'popular_product_title', array(
        'selector' => '.service-price-section .container h2.section-title',
        'render_callback' => 'blossom_spa_pro_get_popular_product_title',
    ) );
    
    /** Popular Procedures Subtitle  */
    $wp_customize->add_setting(
        'popular_product_subtitle',
        array(
            'default'           => __( 'Customers\' Favorite', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'popular_product_subtitle',
        array(
            'label'           => __( 'Popular Procedures Section Subtitle', 'blossom-spa-pro' ),
            'description'     => __( 'Add subtitle for popular product section.', 'blossom-spa-pro' ),
            'section'         => 'popular_product_section',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'popular_product_subtitle', array(
        'selector' => '.service-price-section .container span.sub-title',
        'render_callback' => 'blossom_spa_pro_get_popular_product_subtitle',
    ) );

    /** Popular Procedures Content  */
    $wp_customize->add_setting(
        'popular_product_content',
        array(
            'default'           => __( 'Show the popular procedures of your company here. This section can help new customers decide what procedures to try on their first visit.', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'popular_product_content',
        array(
            'label'           => __( 'Popular Procedures Section Description', 'blossom-spa-pro' ),
            'description'     => __( 'Add description for popular product section.', 'blossom-spa-pro' ),
            'section'         => 'popular_product_section',
            'type'            => 'textarea',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'popular_product_content', array(
        'selector' => '.service-price-section .container .section-desc',
        'render_callback' => 'blossom_spa_pro_get_popular_product_content',
    ) );

    /** Popular Procedures Pages */
    $wp_customize->add_setting( 
        new Blossom_Spa_Pro_Repeater_Setting( 
            $wp_customize, 
            'popular_procedures_pages', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Blossom_Spa_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Control_Repeater(
            $wp_customize,
            'popular_procedures_pages',
            array(
                'section' => 'popular_product_section',                
                'label'   => __( 'Popular Procedures Pages', 'blossom-spa-pro' ),
                'fields'  => array(
                    'page' => array(
                        'type'    => 'select',
                        'label'   => __( 'Select Page for popular procedures', 'blossom-spa-pro' ),
                        'choices' => blossom_spa_pro_get_posts( 'page', true )
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'pages', 'blossom-spa-pro' ),
                    'field' => 'page'
                ),
                'choices'   => array(
                    'limit' => 4
                )                        
            )
        )
    );
    /** Popular Procedures Section Ends */  

}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_frontpage_popular_product' );