<?php
/**
 * Background Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_appearance( $wp_customize ) {
    
    /** Background Color*/
    $wp_customize->get_control( 'background_color' )->section       = 'background_image';
    $wp_customize->get_control( 'background_color' )->priority       = 4;
    $wp_customize->get_control( 'background_color' )->description = __( 'Background color of the theme.', 'blossom-pin-pro' );
    /** Background */
    $wp_customize->get_section( 'background_image' )->title = __( 'Background', 'blossom-pin-pro' );
    $wp_customize->get_section( 'background_image' )->priority = 41;
    $wp_customize->get_control( 'background_image' )->active_callback = 'blossom_pin_pro_body_bg_choice';
    $wp_customize->get_control( 'background_preset' )->active_callback = 'blossom_pin_pro_body_bg_choice';
    $wp_customize->get_control( 'background_position' )->active_callback = 'blossom_pin_pro_body_bg_choice';
    $wp_customize->get_control( 'background_size' )->active_callback = 'blossom_pin_pro_body_bg_choice';
    $wp_customize->get_control( 'background_repeat' )->active_callback = 'blossom_pin_pro_body_bg_choice';
    $wp_customize->get_control( 'background_attachment' )->active_callback = 'blossom_pin_pro_body_bg_choice';
    
    /** Header Background Setting */
    $wp_customize->add_setting(
        'header_bg_image',
        array(
            'default' => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_image'
        )
    );
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'header_bg_image',
           array(
               'label'           => __( 'Header Background Image', 'blossom-pin-pro' ),
               'description'     => __( 'Upload your own custom header background image.', 'blossom-pin-pro' ),
               'section'         => 'background_image',
               'priority'        => 4,
               'active_callback' => 'blossom_pin_pro_header_bg_image_ac'               
           )
       )
    );   

    /** Body Background */
    $wp_customize->add_setting( 
        'body_bg', 
        array(
            'default'           => 'image',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Radio_Buttonset_Control(
			$wp_customize,
			'body_bg',
			array(
				'section'	  => 'background_image',
				'label'       => __( 'Body Background', 'blossom-pin-pro' ),
                'description' => __( 'Choose body background as image or pattern.', 'blossom-pin-pro' ),
				'choices'	  => array(
					'image'   => __( 'Image', 'blossom-pin-pro' ),
                    'pattern' => __( 'Pattern', 'blossom-pin-pro' ),
				),
                'priority'    => 5
			)
		)
	);
    
    /** Background Pattern */
    $wp_customize->add_setting( 
        'bg_pattern', array(
            'default'           => 'nobg',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Radio_Image_Control(
			$wp_customize,
			'bg_pattern',
			array(
				'section'		  => 'background_image',
				'label'			  => __( 'Background Pattern', 'blossom-pin-pro' ),
				'description'	  => __( 'Choose from any of 64 awesome background patterns for your site background.', 'blossom-pin-pro' ),
				'choices'         => blossom_pin_pro_get_patterns(),
                'active_callback' => 'blossom_pin_pro_body_bg_choice'
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_appearance' );