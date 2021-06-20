<?php
/**
 * Slider Layout Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_layout_slider( $wp_customize ) {
    
    /** Slider Layout Settings */
    $wp_customize->add_section(
        'slider_layout_settings',
        array(
            'title'    => __( 'Slider Layout', 'blossom-pin-pro' ),
            'priority' => 20,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'slider_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Radio_Image_Control(
			$wp_customize,
			'slider_layout',
			array(
				'section'	  => 'slider_layout_settings',
				'label'		  => __( 'Slider Layout', 'blossom-pin-pro' ),
				'description' => __( 'Choose the layout of the slider for your site.', 'blossom-pin-pro' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/slider/one.jpg',
					'two'   => get_template_directory_uri() . '/images/slider/two.jpg',
                    'three' => get_template_directory_uri() . '/images/slider/three.jpg',
                    'four'  => get_template_directory_uri() . '/images/slider/four.jpg',
                    'five'  => get_template_directory_uri() . '/images/slider/five.jpg',
                    'six'   => get_template_directory_uri() . '/images/slider/six.jpg',
                    'seven' => get_template_directory_uri() . '/images/slider/seven.jpg',
                    'eight' => get_template_directory_uri() . '/images/slider/eight.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_layout_slider' );