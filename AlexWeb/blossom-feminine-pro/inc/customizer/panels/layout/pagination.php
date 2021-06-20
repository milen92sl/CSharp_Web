<?php
/**
 * Pagination Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_layout_pagination( $wp_customize ) {
    
    /** Pagination Settings */
    $wp_customize->add_section(
        'pagination_settings',
        array(
            'title'    => __( 'Pagination Settings', 'blossom-feminine-pro' ),
            'priority' => 60,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Pagination Type */
    $wp_customize->add_setting( 
        'pagination_type', 
        array(
            'default'           => 'numbered',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        'pagination_type',
        array(
            'type'    => 'radio',
            'section' => 'pagination_settings',
            'label'   => __( 'Pagination Type', 'blossom-feminine-pro' ),
            'description' => __( 'Select pagination type.', 'blossom-feminine-pro' ),
            'choices' => array(
				'default'         => __( 'Default (Next / Previous)', 'blossom-feminine-pro' ),
                'numbered'        => __( 'Numbered (1 2 3 4...)', 'blossom-feminine-pro' ),
                'load_more'       => __( 'AJAX (Load More Button)', 'blossom-feminine-pro' ),
                'infinite_scroll' => __( 'AJAX (Auto Infinite Scroll)', 'blossom-feminine-pro' ),
			)
        )
    );
    
    /** Load More Label */
    $wp_customize->add_setting(
        'load_more_label',
        array(
            'default'           => __( 'Load More Posts', 'blossom-feminine-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'load_more_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'Load More Label', 'blossom-feminine-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_feminine_pro_loading_ac' 
		)		
	);
    
    /** Loading Label */
    $wp_customize->add_setting(
        'loading_label',
        array(
            'default'           => __( 'Loading...', 'blossom-feminine-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'loading_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'Loading Label', 'blossom-feminine-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_feminine_pro_loading_ac' 
		)		
	);
    
    /** No more Label */
    $wp_customize->add_setting(
        'no_more_label',
        array(
            'default'           => __( 'No More Post', 'blossom-feminine-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
	   'no_more_label',
		array(
			'section'         => 'pagination_settings',
			'label'	          => __( 'No More Label', 'blossom-feminine-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_feminine_pro_loading_ac' 
		)		
	);
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_layout_pagination' );

/**
 * Active Callback for contact phone
*/
function blossom_feminine_pro_loading_ac( $control ){
    
    $pagination_type = $control->manager->get_setting( 'pagination_type' )->value();
    
    if ( $pagination_type == 'load_more' ) return true;
    
    return false;
}