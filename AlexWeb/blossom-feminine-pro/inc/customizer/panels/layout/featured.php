<?php
/**
 * Featured Layout Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_layout_featured( $wp_customize ) {
    
    /** Featured Layout Settings */
    $wp_customize->add_section(
        'featured_layout_settings',
        array(
            'title'    => __( 'Featured Area Layout', 'blossom-feminine-pro' ),
            'priority' => 30,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Featured layout */
    $wp_customize->add_setting( 
        'featured_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Radio_Image_Control(
			$wp_customize,
			'featured_layout',
			array(
				'section'	  => 'featured_layout_settings',
				'label'		  => __( 'Featured Layout', 'blossom-feminine-pro' ),
				'description' => __( 'Choose the layout of the featued area in home page.', 'blossom-feminine-pro' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/featured/one.jpg',
					'two'   => get_template_directory_uri() . '/images/featured/two.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_layout_featured' );