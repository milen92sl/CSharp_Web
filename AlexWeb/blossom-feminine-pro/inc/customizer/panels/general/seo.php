<?php
/**
 * SEO Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_general_seo( $wp_customize ) {
    
    /** SEO Settings */
    $wp_customize->add_section(
        'seo_settings',
        array(
            'title'    => __( 'SEO Settings', 'blossom-feminine-pro' ),
            'priority' => 40,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_post_update_date', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_post_update_date',
			array(
				'section'     => 'seo_settings',
				'label'	      => __( 'Enable Last Update Post Date', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to show last updated post date on listing as well as in single post.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_breadcrumb', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_breadcrumb',
			array(
				'section'     => 'seo_settings',
				'label'	      => __( 'Enable Breadcrumb', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to show breadcrumb in inner pages.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Breadcrumb Home Text */
    $wp_customize->add_setting(
        'home_text',
        array(
            'default'           => __( 'Home', 'blossom-feminine-pro' ),
            'sanitize_callback' => 'sanitize_text_field' 
        )
    );
    
    $wp_customize->add_control(
        'home_text',
        array(
            'type'    => 'text',
            'section' => 'seo_settings',
            'label'   => __( 'Breadcrumb Home Text', 'blossom-feminine-pro' ),
        )
    );
    
    /** Breadcrumb Separator */
    $wp_customize->add_setting(
        'separator',
        array(
            'default'           => __( '/', 'blossom-feminine-pro' ),
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        'separator',
        array(
            'type'    => 'text',
            'section' => 'seo_settings',
            'label'   => __( 'Breadcrumb Separator', 'blossom-feminine-pro' ),
        )
    );    
    /** SEO Settings Ends */
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_general_seo' );