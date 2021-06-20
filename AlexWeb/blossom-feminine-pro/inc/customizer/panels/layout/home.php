<?php
/**
 * Home Page Layout Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_layout_home( $wp_customize ) {
    
    /** Home Page Layout Settings */
    $wp_customize->add_section(
        'home_layout_settings',
        array(
            'title'    => __( 'Home Page Layout', 'blossom-feminine-pro' ),
            'priority' => 40,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'home_layout', 
        array(
            'default'           => 'one-col-right',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Radio_Image_Control(
			$wp_customize,
			'home_layout',
			array(
				'section'	  => 'home_layout_settings',
				'label'		  => __( 'Home Page Layout', 'blossom-feminine-pro' ),
				'description' => __( 'Choose the home page layout for your site.', 'blossom-feminine-pro' ),
				'choices'	  => array(
                    'one-col-right'        => get_template_directory_uri() . '/images/home/one-col-right.jpg',
                    'one-col-left'         => get_template_directory_uri() . '/images/home/one-col-left.jpg',
                    'one-col'              => get_template_directory_uri() . '/images/home/one-col.jpg',
                    'one-col-alt-right'    => get_template_directory_uri() . '/images/home/one-col-zigzag-right.jpg',
                    'one-col-alt-left'     => get_template_directory_uri() . '/images/home/one-col-zigzag-left.jpg',
                    'one-col-alt'          => get_template_directory_uri() . '/images/home/one-col-zigzag.jpg',
                    'one-col-small-right'  => get_template_directory_uri() . '/images/home/one-col-small-right.jpg',
                    'one-col-small-left'   => get_template_directory_uri() . '/images/home/one-col-small-left.jpg',
                    'one-col-small'        => get_template_directory_uri() . '/images/home/one-col-small.jpg',                    
                    'two-col-right'        => get_template_directory_uri() . '/images/home/two-col-right.jpg',                    
                    'two-col-left'         => get_template_directory_uri() . '/images/home/two-col-left.jpg',
                    'three-col'            => get_template_directory_uri() . '/images/home/three-col.jpg',
					'three-col-masonry'    => get_template_directory_uri() . '/images/home/three-col-masonry.jpg',                    
                    'two-col-inside-right' => get_template_directory_uri() . '/images/home/two-col-inside-right.jpg',
                    'two-col-inside-left'  => get_template_directory_uri() . '/images/home/two-col-inside-left.jpg',
                    'three-col-inside'     => get_template_directory_uri() . '/images/home/three-col-inside.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_layout_home' );