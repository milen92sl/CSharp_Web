<?php
/**
 * Blossom Feminine Pro Theme Customizer
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register( $wp_customize ) {
	
    /** Add postMessage support for site title and description */
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
    if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'blossom_feminine_pro_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'blossom_feminine_pro_customize_partial_blogdescription',
		) );
	}
    
    /** Site Title Font */
    $wp_customize->add_setting( 
        'site_title_font', 
        array(
            'default' => array(                                			
                'font-family' => 'Playfair Display',
                'variant'     => '700italic',
            ),
            'sanitize_callback' => array( 'Blossom_Feminine_Pro_Fonts', 'sanitize_typography' )
        ) 
    );

	$wp_customize->add_control( 
        new Blossom_Feminine_Pro_Typography_Control( 
            $wp_customize, 
            'site_title_font', 
            array(
                'label'       => __( 'Site Title Font', 'blossom-feminine-pro' ),
                'description' => __( 'Site title and tagline font.', 'blossom-feminine-pro' ),
                'section'     => 'title_tagline',
                'priority'    => 60, 
            ) 
        ) 
    );
    
    /** Site Title Font Size*/
    $wp_customize->add_setting( 
        'site_title_font_size', 
        array(
            'default'           => 60,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Slider_Control( 
			$wp_customize,
			'site_title_font_size',
			array(
				'section'	  => 'title_tagline',
				'label'		  => __( 'Site Title Font Size', 'blossom-feminine-pro' ),
				'description' => __( 'Change the font size of your site title.', 'blossom-feminine-pro' ),
                'priority'    => 65,
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 100,
					'step'	=> 1,
				)                 
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register' );