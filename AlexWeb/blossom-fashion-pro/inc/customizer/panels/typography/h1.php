<?php
/**
 * Typography H1 Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_typography_h1( $wp_customize ) {
    
    /** Body Settings */
    $wp_customize->add_section(
        'h1_settings',
        array(
            'title'    => __( 'H1 Settings (Content)', 'blossom-fashion-pro' ),
            'priority' => 15,
            'panel'    => 'typography_settings'
        )
    );
    
    /** H1 Font */
    $wp_customize->add_setting( 
        'h1_font', 
        array(
            'default' => array(                                			
                'font-family' => 'Cormorant Garamond',
                'variant'     => 'regular',
            ),
            'sanitize_callback' => array( 'Blossom_Fashion_Pro_Fonts', 'sanitize_typography' )
        ) 
    );

	$wp_customize->add_control( 
        new Blossom_Fashion_Pro_Typography_Control( 
            $wp_customize, 
            'h1_font', 
            array(
                'label'   => __( 'H1 Font', 'blossom-fashion-pro' ),
                'section' => 'h1_settings',
            ) 
        ) 
    );
        
    /** Font Size*/
    $wp_customize->add_setting( 
        'h1_font_size', 
        array(
            'default'           => 46,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Slider_Control( 
			$wp_customize,
			'h1_font_size',
			array(
				'section' => 'h1_settings',
				'label'	  => __( 'H1 Font Size', 'blossom-fashion-pro' ),
                'choices' => array(
					'min' 	=> 10,
					'max' 	=> 75,
					'step'	=> 1,
				)                 
			)
		)
	);
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_typography_h1' );