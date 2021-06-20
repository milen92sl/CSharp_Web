<?php
/**
 * Typography H4 Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_typography_h4( $wp_customize ) {
    
    /** Body Settings */
    $wp_customize->add_section(
        'h4_settings',
        array(
            'title'    => __( 'H4 Settings (Content)', 'blossom-fashion-pro' ),
            'priority' => 25,
            'panel'    => 'typography_settings'
        )
    );
    
    /** H4 Font */
    $wp_customize->add_setting( 
        'h4_font', 
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
            'h4_font', 
            array(
                'label'   => __( 'H4 Font', 'blossom-fashion-pro' ),
                'section' => 'h4_settings',
            ) 
        ) 
    );
        
    /** Font Size*/
    $wp_customize->add_setting( 
        'h4_font_size', 
        array(
            'default'           => 28,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Slider_Control( 
			$wp_customize,
			'h4_font_size',
			array(
				'section' => 'h4_settings',
				'label'	  => __( 'H4 Font Size', 'blossom-fashion-pro' ),
                'choices' => array(
					'min' 	=> 10,
					'max' 	=> 75,
					'step'	=> 1,
				)                 
			)
		)
	);
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_typography_h4' );