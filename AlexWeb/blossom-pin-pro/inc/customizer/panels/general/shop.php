<?php
/**
 * Shop Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_general_shop( $wp_customize ) {
    
    /** Shop Settings */
    $wp_customize->add_section(
        'shop_settings',
        array(
            'title'    => __( 'Shop Settings', 'blossom-pin-pro' ),
            'priority' => 75,
            'panel'    => 'general_settings',
        )
    );
    
    /** Shop Page Description */
    $wp_customize->add_setting( 
        'ed_shop_archive_description', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Toggle_Control( 
            $wp_customize,
            'ed_shop_archive_description',
            array(
                'section'         => 'shop_settings',
                'label'           => __( 'Shop Page Description', 'blossom-pin-pro' ),
                'description'     => __( 'Enable to show Shop Page Description.', 'blossom-pin-pro' ),
                'active_callback' => 'is_woocommerce_activated'
            )
        )
    );
    
    /** $shop_archive_description */
    $wp_customize->add_setting( 
        'shop_archive_description', 
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post'
        ) 
    );
    
    $wp_customize->add_control(
        'shop_archive_description',
        array(
            'section'         => 'shop_settings',
            'label'           => __( 'Description For Shop Page', 'blossom-pin-pro' ),
            'description'     => __( 'Write new description for Shop Page to overwrite the default description.', 'blossom-pin-pro' ),
            'type'            => 'textarea',
            'active_callback' => 'blossom_pin_pro_shop_description_ac'
        )
    );
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_general_shop' );