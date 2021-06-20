<?php
/**
 * Home Page Layout Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_layout_home( $wp_customize ) {
    
    /** Home Page Layout Settings */
    $wp_customize->add_section(
        'home_layout_settings',
        array(
            'title'    => __( 'Home Page Layout', 'blossom-fashion-pro' ),
            'priority' => 40,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'home_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Radio_Image_Control(
			$wp_customize,
			'home_layout',
			array(
				'section'	  => 'home_layout_settings',
				'label'		  => __( 'Home Page Layout', 'blossom-fashion-pro' ),
				'description' => __( 'Choose the home page layout for your site.', 'blossom-fashion-pro' ),
				'choices'	  => array(
                    'one'        => get_template_directory_uri() . '/images/home/one.jpg',
                    'one-left'   => get_template_directory_uri() . '/images/home/one-left.jpg',
                    'one-full'   => get_template_directory_uri() . '/images/home/one-full.jpg',
                    'two'        => get_template_directory_uri() . '/images/home/two.jpg',
                    'two-left'   => get_template_directory_uri() . '/images/home/two-left.jpg',
                    'two-full'   => get_template_directory_uri() . '/images/home/two-full.jpg',
                    'three'      => get_template_directory_uri() . '/images/home/three.jpg',
                    'three-left' => get_template_directory_uri() . '/images/home/three-left.jpg',
                    'three-full' => get_template_directory_uri() . '/images/home/three-full.jpg',
                    'four'       => get_template_directory_uri() . '/images/home/four.jpg',
                    'four-left'  => get_template_directory_uri() . '/images/home/four-left.jpg',
                    'four-full'  => get_template_directory_uri() . '/images/home/four-full.jpg',
                    'five'       => get_template_directory_uri() . '/images/home/five.jpg',
                    'five-left'  => get_template_directory_uri() . '/images/home/five-left.jpg',
                    'five-full'  => get_template_directory_uri() . '/images/home/five-full.jpg',
                    'six'        => get_template_directory_uri() . '/images/home/six.jpg',
                    'six-left'   => get_template_directory_uri() . '/images/home/six-left.jpg',
                    'six-full'   => get_template_directory_uri() . '/images/home/six-full.jpg',
                    'seven'      => get_template_directory_uri() . '/images/home/seven.jpg',
                    'seven-left' => get_template_directory_uri() . '/images/home/seven-left.jpg',
                    'seven-full' => get_template_directory_uri() . '/images/home/seven-full.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_layout_home' );