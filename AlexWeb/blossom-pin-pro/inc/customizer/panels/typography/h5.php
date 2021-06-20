<?php
/**
 * Typography H5 Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_typography_h5( $wp_customize ) {
    
    /** Body Settings */
    $wp_customize->add_section(
        'h5_settings',
        array(
            'title'    => __( 'H5 Settings (Content)', 'blossom-pin-pro' ),
            'priority' => 30,
            'panel'    => 'typography_settings'
        )
    );
    
    /** H5 Font */
    $wp_customize->add_setting( 
        'h5_font', 
        array(
            'default' => array(                                			
                'font-family' => 'Nunito',
                'variant'     => '700',
            ),
            'sanitize_callback' => array( 'Blossom_Pin_Pro_Fonts', 'sanitize_typography' )
        ) 
    );

	$wp_customize->add_control( 
        new Blossom_Pin_Pro_Typography_Control( 
            $wp_customize, 
            'h5_font', 
            array(
                'label'   => __( 'H5 Font', 'blossom-pin-pro' ),
                'section' => 'h5_settings',
            ) 
        ) 
    );
        
    /** Font Size*/
    $wp_customize->add_setting( 
        'h5_font_size', 
        array(
            'default'           => 20,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Slider_Control( 
			$wp_customize,
			'h5_font_size',
			array(
				'section' => 'h5_settings',
				'label'	  => __( 'H5 Font Size', 'blossom-pin-pro' ),
                'choices' => array(
					'min' 	=> 10,
					'max' 	=> 75,
					'step'	=> 1,
				)                 
			)
		)
	);
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_typography_h5' );