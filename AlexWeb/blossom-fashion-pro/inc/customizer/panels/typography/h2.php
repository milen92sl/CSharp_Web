<?php
/**
 * Typography H2 Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_typography_h2( $wp_customize ) {
    
    /** Body Settings */
    $wp_customize->add_section(
        'h2_settings',
        array(
            'title'    => __( 'H2 Settings (Content)', 'blossom-fashion-pro' ),
            'priority' => 20,
            'panel'    => 'typography_settings'
        )
    );
    
    /** H2 Font */
    $wp_customize->add_setting( 
        'h2_font', 
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
            'h2_font', 
            array(
                'label'   => __( 'H2 Font', 'blossom-fashion-pro' ),
                'section' => 'h2_settings',
            ) 
        ) 
    );
        
    /** Font Size*/
    $wp_customize->add_setting( 
        'h2_font_size', 
        array(
            'default'           => 40,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Slider_Control( 
			$wp_customize,
			'h2_font_size',
			array(
				'section' => 'h2_settings',
				'label'	  => __( 'H2 Font Size', 'blossom-fashion-pro' ),
                'choices' => array(
					'min' 	=> 10,
					'max' 	=> 75,
					'step'	=> 1,
				)                 
			)
		)
	);
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_typography_h2' );