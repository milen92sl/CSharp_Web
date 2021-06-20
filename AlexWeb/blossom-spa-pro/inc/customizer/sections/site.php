<?php
/**
 * Site Title Setting
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register( $wp_customize ) {
	
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'background_color' )->transport = 'refresh';
    $wp_customize->get_setting( 'background_image' )->transport = 'refresh';
	
	if( isset( $wp_customize->selective_refresh ) ){
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'blossom_spa_pro_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'blossom_spa_pro_customize_partial_blogdescription',
		) );
	}
    
    /** Secondary Logo */
    $wp_customize->add_setting( 
        'secondary_logo', 
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_spa_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control( 
        new WP_Customize_Cropped_Image_Control( 
            $wp_customize, 
            'secondary_logo', 
            array(
                'section'     => 'title_tagline',
                'label'       => __( 'Second Logo', 'blossom-spa-pro' ),
                'description' => __( 'This Logo is used when sticky header is used.', 'blossom-spa-pro' ),
                'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
                'flex_height' => true, // Require the resulting image to be exactly as tall as the height attribute (default).
                'width'       => 70,
                'height'      => 70,
                'priority'    => 8,
            ) 
        ) 
    );    
    /** Secondary Logo Ends */
    
    /** Site Title Font */
    $wp_customize->add_setting( 
        'site_title_font', 
        array(
            'default' => array(                                			
                'font-family' => 'Marcellus',
                'variant'     => 'regular',
            ),
            'sanitize_callback' => array( 'Blossom_Spa_Pro_Fonts', 'sanitize_typography' )
        ) 
    );

	$wp_customize->add_control( 
        new Blossom_Spa_Pro_Typography_Control( 
            $wp_customize, 
            'site_title_font', 
            array(
                'label'       => __( 'Site Title Font', 'blossom-spa-pro' ),
                'description' => __( 'Site title and tagline font.', 'blossom-spa-pro' ),
                'section'     => 'title_tagline',
                'priority'    => 60, 
            ) 
        ) 
    );
    
    /** Site Title Font Size*/
    $wp_customize->add_setting( 
        'site_title_font_size', 
        array(
            'default'           => 30,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Slider_Control( 
			$wp_customize,
			'site_title_font_size',
			array(
				'section'	  => 'title_tagline',
				'label'		  => __( 'Site Title Font Size', 'blossom-spa-pro' ),
				'description' => __( 'Change the font size of your site title.', 'blossom-spa-pro' ),
                'priority'    => 65,
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 200,
					'step'	=> 1,
				)                 
			)
		)
	);
    
    /** Site Title Color*/
    $wp_customize->add_setting( 
        'site_title_color', 
        array(
            'default'           => '#111111',
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'site_title_color', 
            array(
                'label'       => __( 'Site Title Color', 'blossom-spa-pro' ),
                'description' => __( 'Site Title color of the theme.', 'blossom-spa-pro' ),
                'section'     => 'title_tagline',
                'priority'    => 66,
            )
        )
    );
    
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register' );