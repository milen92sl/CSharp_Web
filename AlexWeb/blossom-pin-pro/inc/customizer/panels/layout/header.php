<?php
/**
 * Header Layout Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_layout_header( $wp_customize ) {
    
    /** Header Layout Settings */
    $wp_customize->add_section(
        'header_layout_settings',
        array(
            'title'    => __( 'Header Layout', 'blossom-pin-pro' ),
            'priority' => 10,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'header_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Radio_Image_Control(
			$wp_customize,
			'header_layout',
			array(
				'section'	  => 'header_layout_settings',
				'label'		  => __( 'Header Layout', 'blossom-pin-pro' ),
				'description' => __( 'Choose the layout of the header for your site.', 'blossom-pin-pro' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/header/one.jpg',
					'two'   => get_template_directory_uri() . '/images/header/two.jpg',
                    'three' => get_template_directory_uri() . '/images/header/three.jpg',
                    'four'  => get_template_directory_uri() . '/images/header/four.jpg',
                    'five'  => get_template_directory_uri() . '/images/header/five.jpg',
                    'six'   => get_template_directory_uri() . '/images/header/six.jpg',
				)
			)
		)
	);

    /** Note */
    $wp_customize->add_setting(
        'header_layout_two_note',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Note_Control( 
            $wp_customize,
            'header_layout_two_note',
            array(
                'section'     => 'header_layout_settings',
                'description' => sprintf(__( 'To set the background image for this header layout we have an option as Header Background Image, Click %1$sHere%2$s to go directly to that option.', 'blossom-pin-pro' ), '<span class="header-layout-link header_layout_two_note">', '</span>' ),
                'active_callback'  => 'blossom_pin_pro_header_layout_two',
            )
        )
    );
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_layout_header' );

