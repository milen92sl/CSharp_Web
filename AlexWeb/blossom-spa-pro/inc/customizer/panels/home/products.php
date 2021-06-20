<?php
/**
 * Products Section
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_frontpage_products( $wp_customize ){

    /** Popular Products Section */
    $wp_customize->add_section(
        'product_section',
        array(
            'title'    => __( 'Products Section', 'blossom-spa-pro' ),
            'priority' => 130,
            'panel'    => 'frontpage_settings',
        )
    );

    /** Popular Products Title  */
    $wp_customize->add_setting(
        'product_title',
        array(
            'default'           => __( 'Buy The Products We Use', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'product_title',
        array(
            'label'           => __( 'Product Section Title', 'blossom-spa-pro' ),
            'description'     => __( 'Add title for product section.', 'blossom-spa-pro' ),
            'section'         => 'product_section',
            'active_callback' => 'is_woocommerce_activated',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'product_title', array(
        'selector' => '.wc-product-section .container h2.section-title',
        'render_callback' => 'blossom_spa_pro_get_product_title',
    ) );

    /** Popular Products Subtitle  */
    $wp_customize->add_setting(
        'product_subtitle',
        array(
            'default'           => __( 'Products We Love', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'product_subtitle',
        array(
            'label'           => __( 'Product Section Subtitle', 'blossom-spa-pro' ),
            'description'     => __( 'Add subtitle for product section.', 'blossom-spa-pro' ),
            'section'         => 'product_section',
            'active_callback' => 'is_woocommerce_activated',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'product_subtitle', array(
        'selector' => '.wc-product-section .container span.sub-title',
        'render_callback' => 'blossom_spa_pro_get_product_subtitle',
    ) );

    /** Popular Products Content  */
    $wp_customize->add_setting(
        'product_content',
        array(
            'default'           => __( 'You can sell the products you use on your spa here.', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'product_content',
        array(
            'label'           => __( 'Product Section Description', 'blossom-spa-pro' ),
            'description'     => __( 'Add description for product section.', 'blossom-spa-pro' ),
            'section'         => 'product_section',
            'type'            => 'textarea',
            'active_callback' => 'is_woocommerce_activated',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'product_content', array(
        'selector' => '.wc-product-section .container .section-desc',
        'render_callback' => 'blossom_spa_pro_get_product_content',
    ) );

    /** No. of Products */
    $wp_customize->add_setting(
        'no_of_products',
        array(
            'default' => 8,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_number_absint',
        )
    );

    $wp_customize->add_control(
        new Blossom_Spa_Pro_Slider_Control(
            $wp_customize,
            'no_of_products',
            array(
                'section'       => 'product_section',
                'label'         => __('Number of Products', 'blossom-spa-pro'),
                'description'   => __('Choose the number of products you want to display', 'blossom-spa-pro'),
                'choices'       => array(
                    'min'   => 4,
                    'max'   => 12,
                    'step'  => 1,
                ),
                'active_callback' => 'is_woocommerce_activated',
            )
        )
    );

    /** Popular Products Section Ends */  

}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_frontpage_products' );