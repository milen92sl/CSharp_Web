<?php
/**
 * Performance Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_general_performance( $wp_customize ) {
    
    /** Performance Settings */
    $wp_customize->add_section(
        'performance_settings',
        array(
            'title'    => __( 'Performance Settings', 'blossom-feminine-pro' ),
            'priority' => 80,
            'panel'    => 'general_settings',
        )
    );
    
    /** Lazy Load */
    $wp_customize->add_setting(
        'ed_lazy_load',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_lazy_load',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Lazy Load', 'blossom-feminine-pro' ),
				'description'	=> __( 'Enable lazy loading of featured images.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Lazy Load Content Images */
    $wp_customize->add_setting(
        'ed_lazy_load_cimage',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_lazy_load_cimage',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Lazy Load Content Images', 'blossom-feminine-pro' ),
				'description'	=> __( 'Enable lazy loading of images inside page/post content.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Defer JavaScript */
    $wp_customize->add_setting(
        'ed_defer',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_defer',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Defer JavaScript', 'blossom-feminine-pro' ),
				'description'	=> __( 'Adds "defer" attribute to sript tags to improve page download speed.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Sticky Header */
    $wp_customize->add_setting(
        'ed_ver',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_ver',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Remove ver parameters', 'blossom-feminine-pro' ),
				'description'	=> __( 'Enable to remove "ver" parameter from CSS and JS file calls.', 'blossom-feminine-pro' ),
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_general_performance' );