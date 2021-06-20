<?php
/**
 * Slider Layout Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_layout_slider( $wp_customize ) {
    
    /** Slider Layout Settings */
    $wp_customize->add_section(
        'slider_layout_settings',
        array(
            'title'    => __( 'Slider Layout', 'blossom-recipe-pro' ),
            'priority' => 20,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'slider_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Radio_Image_Control(
			$wp_customize,
			'slider_layout',
			array(
				'section'	  => 'slider_layout_settings',
				'label'		  => __( 'Slider Layout', 'blossom-recipe-pro' ),
				'description' => __( 'Choose the layout of the slider for your site.', 'blossom-recipe-pro' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/slider/one.png',
					'two'   => get_template_directory_uri() . '/images/slider/two.png',
                    'three' => get_template_directory_uri() . '/images/slider/three.png',
                    'four'  => get_template_directory_uri() . '/images/slider/four.png',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_layout_slider' );