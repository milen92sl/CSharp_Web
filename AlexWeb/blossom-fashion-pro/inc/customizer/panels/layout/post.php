<?php
/**
 * Post Page Layout Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_layout_post_page( $wp_customize ) {
    
    /** Home Page Layout Settings */
    $wp_customize->add_section(
        'post_page_layout_settings',
        array(
            'title'    => __( 'Single Post Layout', 'blossom-fashion-pro' ),
            'priority' => 50,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'single_post_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Radio_Image_Control(
			$wp_customize,
			'single_post_layout',
			array(
				'section'	  => 'post_page_layout_settings',
				'label'		  => __( 'Single Page Layout', 'blossom-fashion-pro' ),
				'description' => __( 'Choose the layout of the single post page.', 'blossom-fashion-pro' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/single/one.jpg',
					'two'   => get_template_directory_uri() . '/images/single/two.jpg',
                    'three' => get_template_directory_uri() . '/images/single/three.jpg',
					'four'  => get_template_directory_uri() . '/images/single/four.jpg',
                    'five'  => get_template_directory_uri() . '/images/single/five.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_layout_post_page' );