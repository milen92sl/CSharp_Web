<?php
/**
 * Home Page Layout Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_layout_home( $wp_customize ) {
    
    /** Home Page Layout Settings */
    $wp_customize->add_section(
        'home_layout_settings',
        array(
            'title'    => __( 'Home Page Layout', 'blossom-pin-pro' ),
            'priority' => 40,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'home_layout', 
        array(
            'default'           => 'layout-one',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Radio_Image_Control(
			$wp_customize,
			'home_layout',
			array(
				'section'	  => 'home_layout_settings',
				'label'		  => __( 'Home Page Layout', 'blossom-pin-pro' ),
				'description' => __( 'Choose the home page layout for your site.', 'blossom-pin-pro' ),
				'choices'	  => array(
                    'layout-one'                => get_template_directory_uri() . '/images/home/one-full.jpg',
                    'layout-one-right-sidebar'  => get_template_directory_uri() . '/images/home/one-right.jpg',
                    'layout-one-left-sidebar'   => get_template_directory_uri() . '/images/home/one-left.jpg',
                    'layout-two'                => get_template_directory_uri() . '/images/home/two-full.jpg',
                    'layout-two-right-sidebar'  => get_template_directory_uri() . '/images/home/two-right.jpg',
                    'layout-two-left-sidebar'   => get_template_directory_uri() . '/images/home/two-left.jpg',
                    'layout-three'              => get_template_directory_uri() . '/images/home/three-full.jpg',
                    'layout-three-right-sidebar'=> get_template_directory_uri() . '/images/home/three-right.jpg',
                    'layout-three-left-sidebar' => get_template_directory_uri() . '/images/home/three-left.jpg',
                    'layout-four'               => get_template_directory_uri() . '/images/home/four-full.jpg',
                    'layout-four-right-sidebar' => get_template_directory_uri() . '/images/home/four-right.jpg',
                    'layout-four-left-sidebar'  => get_template_directory_uri() . '/images/home/four-left.jpg',
                    'layout-five'               => get_template_directory_uri() . '/images/home/five-full.jpg',
                    'layout-five-right-sidebar' => get_template_directory_uri() . '/images/home/five-right.jpg',
                    'layout-five-left-sidebar'  => get_template_directory_uri() . '/images/home/five-left.jpg',
                    'layout-six'                => get_template_directory_uri() . '/images/home/six-full.jpg',
                    'layout-six-right-sidebar'  => get_template_directory_uri() . '/images/home/six-right.jpg',
                    'layout-six-left-sidebar'   => get_template_directory_uri() . '/images/home/six-left.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_layout_home' );