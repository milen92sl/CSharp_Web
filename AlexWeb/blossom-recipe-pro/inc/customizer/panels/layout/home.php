<?php
/**
 * Home Page Layout Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_layout_home( $wp_customize ) {
    
    /** Home Page Layout Settings */
    $wp_customize->add_section(
        'home_layout_settings',
        array(
            'title'    => __( 'Home Page Layout', 'blossom-recipe-pro' ),
            'priority' => 40,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'home_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Radio_Image_Control(
			$wp_customize,
			'home_layout',
			array(
				'section'	  => 'home_layout_settings',
				'label'		  => __( 'Home Page Layout', 'blossom-recipe-pro' ),
				'description' => __( 'Choose the home page layout for your site.', 'blossom-recipe-pro' ),
				'choices'	  => array(
                    'one'        => get_template_directory_uri() . '/images/home/one.png',
                    'one-left'   => get_template_directory_uri() . '/images/home/one-left.png',
                    'one-full'   => get_template_directory_uri() . '/images/home/one-full.png',
                    'two'        => get_template_directory_uri() . '/images/home/two.png',
                    'two-left'   => get_template_directory_uri() . '/images/home/two-left.png',
                    'two-full'   => get_template_directory_uri() . '/images/home/two-full.png',
                    'three'      => get_template_directory_uri() . '/images/home/three.png',
                    'three-left' => get_template_directory_uri() . '/images/home/three-left.png',
                    'three-full' => get_template_directory_uri() . '/images/home/three-full.png',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_layout_home' );