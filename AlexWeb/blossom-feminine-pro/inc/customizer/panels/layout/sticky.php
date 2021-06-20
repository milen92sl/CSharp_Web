<?php
/**
 * Sticky Post Layout Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_layout_sticky( $wp_customize ) {
    
    /** Sticky Post Settings */
    $wp_customize->add_section(
        'sticky_post_layout_settings',
        array(
            'title'    => __( 'Sticky Post Layout', 'blossom-feminine-pro' ),
            'priority' => 35,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'sticky_post_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Radio_Image_Control(
			$wp_customize,
			'sticky_post_layout',
			array(
				'section'	  => 'sticky_post_layout_settings',
				'label'		  => __( 'Sticky Post Layout', 'blossom-feminine-pro' ),
				'description' => __( 'Choose the layout for sticky post in home page.', 'blossom-feminine-pro' ),
				'choices'	  => array(
					'one'   => get_template_directory_uri() . '/images/sticky/one.jpg',
					'two'   => get_template_directory_uri() . '/images/sticky/two.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_layout_sticky' );