<?php
/**
 * Header Layout Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_layout_header( $wp_customize ) {
    
    /** Header Layout Settings */
    $wp_customize->add_section(
        'header_layout_settings',
        array(
            'title'    => __( 'Header Layout', 'blossom-recipe-pro' ),
            'priority' => 10,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'header_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Radio_Image_Control(
			$wp_customize,
			'header_layout',
			array(
				'section'	  => 'header_layout_settings',
				'label'		  => __( 'Header Layout', 'blossom-recipe-pro' ),
				'description' => __( 'Choose the layout of the header for your site.', 'blossom-recipe-pro' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/header/one.png',
					'two'   => get_template_directory_uri() . '/images/header/two.png',
                    'three' => get_template_directory_uri() . '/images/header/three.png',
                    'four'  => get_template_directory_uri() . '/images/header/four.png',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_layout_header' );