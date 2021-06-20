<?php
/**
 * Pagination Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_layout_pagination( $wp_customize ) {
    
    /** Pagination Settings */
    $wp_customize->add_section(
        'pagination_settings',
        array(
            'title'    => __( 'Pagination Settings', 'blossom-fashion-pro' ),
            'priority' => 60,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Pagination Type */
    $wp_customize->add_setting( 
        'pagination_type', 
        array(
            'default'           => 'numbered',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        'pagination_type',
        array(
            'type'    => 'radio',
            'section' => 'pagination_settings',
            'label'   => __( 'Pagination Type', 'blossom-fashion-pro' ),
            'description' => __( 'Select pagination type.', 'blossom-fashion-pro' ),
            'choices' => array(
				'default'         => __( 'Default (Next / Previous)', 'blossom-fashion-pro' ),
                'numbered'        => __( 'Numbered (1 2 3 4...)', 'blossom-fashion-pro' ),
                'load_more'       => __( 'AJAX (Load More Button)', 'blossom-fashion-pro' ),
                'infinite_scroll' => __( 'AJAX (Auto Infinite Scroll)', 'blossom-fashion-pro' ),
			)
        )
    );
    
    /** Load More Label */
    $wp_customize->add_setting(
        'load_more_label',
        array(
            'default'           => __( 'Load More Posts', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'load_more_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'Load More Label', 'blossom-fashion-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_fashion_pro_loading_ac' 
		)		
	);
    
    /** Loading Label */
    $wp_customize->add_setting(
        'loading_label',
        array(
            'default'           => __( 'Loading...', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'loading_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'Loading Label', 'blossom-fashion-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_fashion_pro_loading_ac' 
		)		
	);
    
    /** No more Label */
    $wp_customize->add_setting(
        'no_more_label',
        array(
            'default'           => __( 'No More Post', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'no_more_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'No More Label', 'blossom-fashion-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_fashion_pro_loading_ac' 
		)		
	);
    
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_layout_pagination' );

/**
 * Active Callback for contact phone
*/
function blossom_fashion_pro_loading_ac( $control ){
    
    $pagination_type = $control->manager->get_setting( 'pagination_type' )->value();
    
    if ( $pagination_type == 'load_more' ) return true;
    
    return false;
}