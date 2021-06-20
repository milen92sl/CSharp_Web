<?php
/**
 * Archive & Search Page Layout Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_layout_archive( $wp_customize ) {
    
    /** Archive & Search Page Layout Settings */
    $wp_customize->add_section(
        'archive_layout_settings',
        array(
            'title'    => __( 'Archive Page Layout', 'blossom-recipe-pro' ),
            'priority' => 50,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'archive_layout', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Radio_Image_Control(
			$wp_customize,
			'archive_layout',
			array(
				'section'	  => 'archive_layout_settings',
				'label'		  => __( 'Archive Page Layout', 'blossom-recipe-pro' ),
				'description' => __( 'Choose the archive page layout for your site.', 'blossom-recipe-pro' ),
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
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_layout_archive' );