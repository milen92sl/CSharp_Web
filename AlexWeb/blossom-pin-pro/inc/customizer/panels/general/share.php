<?php
/**
 * Social Sharing Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_general_sharing( $wp_customize ) {
    
    /** Social Sharing */
    $wp_customize->add_section(
        'social_sharing',
        array(
            'title'    => __( 'Social Sharing', 'blossom-pin-pro' ),
            'priority' => 31,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Sharing Buttons */
    $wp_customize->add_setting(
        'ed_social_sharing',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Toggle_Control( 
            $wp_customize,
            'ed_social_sharing',
            array(
                'section'     => 'social_sharing',
                'label'       => __( 'Enable Social Sharing Buttons', 'blossom-pin-pro' ),
                'description' => __( 'Enable or disable social sharing buttons on archive and single posts.', 'blossom-pin-pro' ),
            )
        )
    );

    /** Enable Open Graph Meta Tags */
    $wp_customize->add_setting(
        'ed_og_tags',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Toggle_Control( 
            $wp_customize,
            'ed_og_tags',
            array(
                'section'           => 'social_sharing',
                'label'             => __( 'Enable Open Graph Meta Tags', 'blossom-pin-pro' ),
                'description'       => __( 'Disable this option if you\'re using Jetpack, Yoast or other plugin to maintain Open Graph meta tags.', 'blossom-pin-pro' ),
                'active_callback'   => 'blossom_pin_pro_social_share_ac',
            )           
        )
    );
    /** Enable Normal Social Sharing Buttons */
    $wp_customize->add_setting(
        'ed_normal_share',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Toggle_Control( 
            $wp_customize,
            'ed_normal_share',
            array(
                'section'           => 'social_sharing',
                'label'             => __( 'Enable Normal Social Share', 'blossom-pin-pro' ),
                'description'       => __( 'Disable this option if you want to hide social share option below the post title. Only available in Single Post Layout One, Two & Three.', 'blossom-pin-pro' ),
                'active_callback'   => 'blossom_pin_pro_social_share_ac',
            )           
        )
    );
    /** Enable Sticky Social Sharing */
    $wp_customize->add_setting(
        'ed_sticky_social',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Toggle_Control( 
            $wp_customize,
            'ed_sticky_social',
            array(
                'section'           => 'social_sharing',
                'label'             => __( 'Enable Sticky Social Share', 'blossom-pin-pro' ),
                'description'       => __( 'Disable this option if you want to hide sticky social share icons.', 'blossom-pin-pro' ),
                'active_callback'   => 'blossom_pin_pro_social_share_ac',
            )
        )
    );
    /** Social Sharing Buttons */
    $wp_customize->add_setting(
        'social_share', 
        array(
            'default' => array( 'facebook', 'twitter', 'pinterest', 'gplus' ),
            'sanitize_callback' => 'blossom_pin_pro_sanitize_sortable',                     
        )
    );

    $wp_customize->add_control(
        new Blossom_Pin_Pro_Sortable_Control(
            $wp_customize,
            'social_share',
            array(
                'section'     => 'social_sharing',
                'label'       => __( 'Social Sharing Buttons', 'blossom-pin-pro' ),
                'description' => __( 'Sort or toggle social sharing buttons.', 'blossom-pin-pro' ),
                'choices'     => array(
                    'facebook'  => __( 'Facebook', 'blossom-pin-pro' ),
                    'twitter'   => __( 'Twitter', 'blossom-pin-pro' ),
                    'linkedin'  => __( 'LinkedIn', 'blossom-pin-pro' ),
                    'pinterest' => __( 'Pinterest', 'blossom-pin-pro' ),
                    'email'     => __( 'Email', 'blossom-pin-pro' ),
                    'gplus'     => __( 'Google Plus', 'blossom-pin-pro' ),
                    'reddit'    => __( 'Reddit', 'blossom-pin-pro' ),
                    'tumblr'    => __( 'Tumblr', 'blossom-pin-pro' ),
                    'digg'      => __( 'Digg', 'blossom-pin-pro' ),
                    'weibo'     => __( 'Weibo', 'blossom-pin-pro' ),
                    'xing'      => __( 'Xing', 'blossom-pin-pro' ),
                    'vk'        => __( 'VK', 'blossom-pin-pro' ),
                    'pocket'    => __( 'GetPocket', 'blossom-pin-pro' ),            
                ),
                'active_callback' => 'blossom_pin_pro_social_share_ac',
            )            
        )
    );
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_general_sharing' );
