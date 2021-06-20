<?php
/**
 * Pagination Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_layout_pagination( $wp_customize ) {
    
    /** Pagination Settings */
    $wp_customize->add_section(
        'pagination_settings',
        array(
            'title'    => __( 'Pagination Settings', 'blossom-spa-pro' ),
            'priority' => 60,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Pagination Type */
    $wp_customize->add_setting( 
        'pagination_type', 
        array(
            'default'           => 'numbered',
            'sanitize_callback' => 'blossom_spa_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        'pagination_type',
        array(
            'type'    => 'radio',
            'section' => 'pagination_settings',
            'label'   => __( 'Pagination Type', 'blossom-spa-pro' ),
            'description' => __( 'Select pagination type.', 'blossom-spa-pro' ),
            'choices' => array(
				'default'         => __( 'Default (Next / Previous)', 'blossom-spa-pro' ),
                'numbered'        => __( 'Numbered (1 2 3 4...)', 'blossom-spa-pro' ),
                'load_more'       => __( 'AJAX (Load More Button)', 'blossom-spa-pro' ),
                'infinite_scroll' => __( 'AJAX (Auto Infinite Scroll)', 'blossom-spa-pro' ),
			)
        )
    );
    
    /** Load More Label */
    $wp_customize->add_setting(
        'load_more_label',
        array(
            'default'           => __( 'Load More Posts', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'load_more_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'Load More Label', 'blossom-spa-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_loading_ac' 
		)		
	);
    
    /** Loading Label */
    $wp_customize->add_setting(
        'loading_label',
        array(
            'default'           => __( 'Loading...', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'loading_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'Loading Label', 'blossom-spa-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_loading_ac' 
		)		
	);
    
    /** No more Label */
    $wp_customize->add_setting(
        'no_more_label',
        array(
            'default'           => __( 'No More Post', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'no_more_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'No More Label', 'blossom-spa-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_loading_ac' 
		)		
	);
    
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_layout_pagination' );