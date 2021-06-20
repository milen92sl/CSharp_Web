<?php
/**
 * Performance Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_general_performance( $wp_customize ) {
    
    /** Performance Settings */
    $wp_customize->add_section(
        'performance_settings',
        array(
            'title'      => __( 'Performance Settings', 'blossom-pin-pro' ),
            'priority'   => 80,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Lazy Load */
    $wp_customize->add_setting(
        'ed_lazy_load',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_lazy_load',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Lazy Load', 'blossom-pin-pro' ),
				'description'	=> __( 'Enable lazy loading of featured images.', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Lazy Load Content Images */
    $wp_customize->add_setting(
        'ed_lazy_load_cimage',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_lazy_load_cimage',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Lazy Load Content Images', 'blossom-pin-pro' ),
				'description'	=> __( 'Enable lazy loading of images inside page/post content.', 'blossom-pin-pro' ),
			)
		)
	);

    /** Lazy Load Gravatar */
    $wp_customize->add_setting(
        'ed_lazyload_gravatar',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Toggle_Control( 
            $wp_customize,
            'ed_lazyload_gravatar',
            array(
                'section'       => 'performance_settings',
                'label'         => __( 'Lazy Load Gravatar', 'blossom-pin-pro' ),
                'description'   => __( 'Enable lazy loading of gravatar image.', 'blossom-pin-pro' ),
            )
        )
    );
    
    /** Defer JavaScript */
    $wp_customize->add_setting(
        'ed_defer',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_defer',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Defer JavaScript', 'blossom-pin-pro' ),
				'description'	=> __( 'Adds "defer" attribute to script tags to improve page download speed.', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Sticky Header */
    $wp_customize->add_setting(
        'ed_ver',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_ver',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Remove ver parameters', 'blossom-pin-pro' ),
				'description'	=> __( 'Enable to remove "ver" parameter from CSS and JS file calls.', 'blossom-pin-pro' ),
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_general_performance' );