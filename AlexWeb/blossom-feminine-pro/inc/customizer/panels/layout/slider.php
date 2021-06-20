<?php
/**
 * Slider Layout Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_layout_slider( $wp_customize ) {
    
    /** Slider Layout Settings */
    $wp_customize->add_section(
        'slider_layout_settings',
        array(
            'title'    => __( 'Slider Layout', 'blossom-feminine-pro' ),
            'priority' => 20,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'slider_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Radio_Image_Control(
			$wp_customize,
			'slider_layout',
			array(
				'section'	  => 'slider_layout_settings',
				'label'		  => __( 'Slider Layout', 'blossom-feminine-pro' ),
				'description' => __( 'Choose the layout of the slider for your site.', 'blossom-feminine-pro' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/slider/one.jpg',
					'two'   => get_template_directory_uri() . '/images/slider/two.jpg',
                    'three' => get_template_directory_uri() . '/images/slider/three.jpg',
                    'four'  => get_template_directory_uri() . '/images/slider/four.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_layout_slider' );