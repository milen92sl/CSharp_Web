<?php
/**
 * Header Layout Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_layout_header( $wp_customize ) {
    
    /** Header Layout Settings */
    $wp_customize->add_section(
        'header_layout_settings',
        array(
            'title'    => __( 'Header Layout', 'blossom-fashion-pro' ),
            'priority' => 10,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'header_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Radio_Image_Control(
			$wp_customize,
			'header_layout',
			array(
				'section'	  => 'header_layout_settings',
				'label'		  => __( 'Header Layout', 'blossom-fashion-pro' ),
				'description' => __( 'Choose the layout of the header for your site.', 'blossom-fashion-pro' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/header/one.png',
					'two'   => get_template_directory_uri() . '/images/header/two.png',
                    'three' => get_template_directory_uri() . '/images/header/three.png',
                    'four'  => get_template_directory_uri() . '/images/header/four.png',
                    'five'  => get_template_directory_uri() . '/images/header/five.png',
                    'six'   => get_template_directory_uri() . '/images/header/six.png',
                    'seven' => get_template_directory_uri() . '/images/header/seven.png',
                    'eight' => get_template_directory_uri() . '/images/header/eight.png',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_layout_header' );