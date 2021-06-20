<?php
/**
 * Pagination Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_layout_pagination( $wp_customize ) {
    
    /** Pagination Settings */
    $wp_customize->add_section(
        'pagination_settings',
        array(
            'title'    => __( 'Pagination Settings', 'blossom-pin-pro' ),
            'priority' => 60,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Pagination Type */
    $wp_customize->add_setting( 
        'pagination_type', 
        array(
            'default'           => 'numbered',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        'pagination_type',
        array(
            'type'    => 'radio',
            'section' => 'pagination_settings',
            'label'   => __( 'Pagination Type', 'blossom-pin-pro' ),
            'description' => __( 'Select pagination type.', 'blossom-pin-pro' ),
            'choices' => array(
				'default'         => __( 'Default (Next / Previous)', 'blossom-pin-pro' ),
                'numbered'        => __( 'Numbered (1 2 3 4...)', 'blossom-pin-pro' ),
                'load_more'       => __( 'AJAX (Load More Button)', 'blossom-pin-pro' ),
                'infinite_scroll' => __( 'AJAX (Auto Infinite Scroll)', 'blossom-pin-pro' ),
			)
        )
    );
    
    /** Load More Label */
    $wp_customize->add_setting(
        'load_more_label',
        array(
            'default'           => __( 'Load More Posts', 'blossom-pin-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'load_more_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'Load More Label', 'blossom-pin-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_pin_pro_loading_ac' 
		)		
	);
    
    /** Loading Label */
    $wp_customize->add_setting(
        'loading_label',
        array(
            'default'           => __( 'Loading...', 'blossom-pin-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'loading_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'Loading Label', 'blossom-pin-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_pin_pro_loading_ac' 
		)		
	);
    
    /** No more Label */
    $wp_customize->add_setting(
        'no_more_label',
        array(
            'default'           => __( 'No More Post', 'blossom-pin-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'no_more_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'No More Label', 'blossom-pin-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_pin_pro_loading_ac' 
		)		
	);
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_layout_pagination' );