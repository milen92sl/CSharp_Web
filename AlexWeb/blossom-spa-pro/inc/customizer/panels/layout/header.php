<?php
/**
 * Header Layout Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_layout_header( $wp_customize ) {
    
    /** Header Layout Settings */
    $wp_customize->add_section(
        'header_layout_settings',
        array(
            'title'    => __( 'Header Layout', 'blossom-spa-pro' ),
            'priority' => 10,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'header_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_spa_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Radio_Image_Control(
			$wp_customize,
			'header_layout',
			array(
				'section'	  => 'header_layout_settings',
				'label'		  => __( 'Header Layout', 'blossom-spa-pro' ),
				'description' => __( 'Choose the layout of the header for your site.', 'blossom-spa-pro' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/header/one.jpg',
					'two'   => get_template_directory_uri() . '/images/header/two.jpg',
                    'three' => get_template_directory_uri() . '/images/header/three.jpg',
                    'four'  => get_template_directory_uri() . '/images/header/four.jpg',
                    'five'  => get_template_directory_uri() . '/images/header/five.jpg',
                    'six'   => get_template_directory_uri() . '/images/header/six.jpg',
                    'seven' => get_template_directory_uri() . '/images/header/seven.jpg',
                    'eight' => get_template_directory_uri() . '/images/header/eight.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_layout_header' );