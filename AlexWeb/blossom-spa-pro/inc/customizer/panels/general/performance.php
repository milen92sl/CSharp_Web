<?php
/**
 * Performance Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_general_performance( $wp_customize ) {
    
    /** Performance Settings */
    $wp_customize->add_section(
        'performance_settings',
        array(
            'title'    => __( 'Performance Settings', 'blossom-spa-pro' ),
            'priority' => 60,
            'panel'    => 'general_settings',
        )
    );
    
    /** Lazy Load */
    $wp_customize->add_setting(
        'ed_lazy_load',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_lazy_load',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Lazy Load', 'blossom-spa-pro' ),
				'description'	=> __( 'Enable lazy loading of featured images.', 'blossom-spa-pro' ),
			)
		)
	);
    
    /** Lazy Load Content Images */
    $wp_customize->add_setting(
        'ed_lazy_load_cimage',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_lazy_load_cimage',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Lazy Load Content Images', 'blossom-spa-pro' ),
				'description'	=> __( 'Enable lazy loading of images inside page/post content.', 'blossom-spa-pro' ),
			)
		)
	);
    
    /** Defer JavaScript */
    $wp_customize->add_setting(
        'ed_defer',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_defer',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Defer JavaScript', 'blossom-spa-pro' ),
				'description'	=> __( 'Adds "defer" attribute to sript tags to improve page download speed.', 'blossom-spa-pro' ),
			)
		)
	);
    
    /** Sticky Header */
    $wp_customize->add_setting(
        'ed_ver',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_ver',
			array(
				'section'		=> 'performance_settings',
				'label'			=> __( 'Remove ver parameters', 'blossom-spa-pro' ),
				'description'	=> __( 'Enable to remove "ver" parameter from CSS and JS file calls.', 'blossom-spa-pro' ),
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_general_performance' );