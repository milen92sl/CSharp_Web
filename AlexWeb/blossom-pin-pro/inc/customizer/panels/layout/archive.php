<?php
/**
 * Archive & Search Page Layout Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_layout_archive( $wp_customize ) {
    
    /** Home Page Layout Settings */
    $wp_customize->add_section(
        'archive_layout_settings',
        array(
            'title'    => __( 'Archive Page Layout', 'blossom-pin-pro' ),
            'priority' => 40,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'archive_layout', 
        array(
            'default'           => 'archive-one',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Radio_Image_Control(
			$wp_customize,
			'archive_layout',
			array(
				'section'	  => 'archive_layout_settings',
				'label'		  => __( 'Archive Page Layout', 'blossom-pin-pro' ),
				'description' => __( 'Choose the archive & search page layout for your site.', 'blossom-pin-pro' ),
				'choices'	  => array(
                    'archive-one'   => get_template_directory_uri() . '/images/archive/one.jpg',
                    'archive-two'   => get_template_directory_uri() . '/images/archive/two.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_layout_archive' );