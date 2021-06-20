<?php
/**
 * Single Layout Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_layout_single( $wp_customize ) {
    
    /** Single Post Layout Settings */
    $wp_customize->add_section(
        'single_layout_settings',
        array(
            'title'    => __( 'Single Post Layout', 'blossom-spa-pro' ),
            'priority' => 15,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'single_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_spa_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Radio_Image_Control(
			$wp_customize,
			'single_layout',
			array(
				'section'	  => 'single_layout_settings',
				'label'		  => __( 'Single Layout', 'blossom-spa-pro' ),
				'description' => __( 'Choose the layout for single layout of your site.', 'blossom-spa-pro' ),
				'choices'	  => array(
                    'one'   => get_template_directory_uri() . '/images/single/one.jpg',
                    'two'   => get_template_directory_uri() . '/images/single/two.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_layout_single' );