<?php
/**
 * Special Pricing Section
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_frontpage_special_pricing( $wp_customize ){

    /** Special Pricing Section */
    $wp_customize->add_section(
        'special_pricing_section',
        array(
            'title'    => __( 'Special Pricing Section', 'blossom-spa-pro' ),
            'priority' => 50,
            'panel'    => 'frontpage_settings',
            'active_callback' => 'blossom_spa_pro_special_pricing_active'
        )
    );

    /** Special Pricing Title  */
    $wp_customize->add_setting(
        'special_pricing_title',
        array(
            'default'           => __( 'This Week\'s Special For You', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'special_pricing_title',
        array(
            'label'           => __( 'Special Pricing Section Title', 'blossom-spa-pro' ),
            'description'     => __( 'Add title for special pricing section.', 'blossom-spa-pro' ),
            'section'         => 'special_pricing_section',
            'active_callback' => 'is_woocommerce_activated',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'special_pricing_title', array(
        'selector' => '.special-pricing-section .container h2.section-title',
        'render_callback' => 'blossom_spa_pro_get_special_pricing_title',
    ) );
    
    /** Special Pricing Subtitle  */
    $wp_customize->add_setting(
        'special_pricing_subtitle',
        array(
            'default'           => __( 'Best Deals', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'special_pricing_subtitle',
        array(
            'label'           => __( 'Special Pricing Section Subtitle', 'blossom-spa-pro' ),
            'description'     => __( 'Add subtitle for special pricing section.', 'blossom-spa-pro' ),
            'section'         => 'special_pricing_section',
            'active_callback' => 'is_woocommerce_activated',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'special_pricing_subtitle', array(
        'selector' => '.special-pricing-section .container span.sub-title',
        'render_callback' => 'blossom_spa_pro_get_special_pricing_subtitle',
    ) );

    /** Special Pricing Content  */
    $wp_customize->add_setting(
        'special_pricing_content',
        array(
            'default'           => __( 'Display your deals and discounts using this section. Customers love deals, so this section is a great way of growing your business.', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'special_pricing_content',
        array(
            'label'           => __( 'Special Pricing Section Description', 'blossom-spa-pro' ),
            'description'     => __( 'Add description for special pricing section.', 'blossom-spa-pro' ),
            'section'         => 'special_pricing_section',
            'type'            => 'textarea',
            'active_callback' => 'is_woocommerce_activated',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'special_pricing_content', array(
        'selector' => '.special-pricing-section .container .section-desc',
        'render_callback' => 'blossom_spa_pro_get_special_pricing_content',
    ) );
    
    $wp_customize->add_setting( 'special_pricing_background_image',
        array(
            'default'           => get_template_directory_uri() . '/images/special-pricing-bg.jpg',
            'sanitize_callback' => 'blossom_spa_pro_sanitize_image',
        )
    );
    
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( $wp_customize, 'special_pricing_background_image',
            array(
                'label'         => esc_html__( 'Background Image', 'blossom-spa-pro' ),
                'description'   => esc_html__( 'Choose background Image of your choice. Recommended size for this image is 1920px by 650px.', 'blossom-spa-pro' ),
                'section'       => 'special_pricing_section',
                'type'          => 'image',
            )
        )
    );

    /**  */
    $wp_customize->add_setting( 
        'ed_product_parent', 
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Toggle_Control( 
            $wp_customize,
            'ed_product_parent',
            array(
                'section'     => 'special_pricing_section',
                'label'       => __( 'Disable Child Categories', 'blossom-spa-pro' ),
                'description' => __( 'Enable to show top parent categories only in special pricing section.', 'blossom-spa-pro' ),
                'active_callback' => 'is_woocommerce_activated',
            )
        )
    );

    /** Popular Products View All  */
    $wp_customize->add_setting(
        'special_view_all',
        array(
            'default'           => __( 'View More', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'special_view_all',
        array(
            'label'           => __( 'Special Pricing Button Label', 'blossom-spa-pro' ),
            'description'     => __( 'Add view more label for special pricing section.', 'blossom-spa-pro' ),
            'section'         => 'special_pricing_section',
            'active_callback' => 'is_woocommerce_activated',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'special_view_all', array(
        'selector' => '.special-pricing-section .container .btn-wrap .btn-readmore',
        'render_callback' => 'blossom_spa_pro_get_special_view_all',
    ) );

    /** Special Pricing Section Ends */  

}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_frontpage_special_pricing' );