<?php
/**
 * Appearance Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_appearance( $wp_customize ) {
    
    /** Appearance Settings */
    $wp_customize->add_panel( 
        'appearance_settings',
         array(
            'priority'    => 50,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Appearance Settings', 'blossom-feminine-pro' ),
            'description' => __( 'Customize Typography, Header Image & Background Image', 'blossom-feminine-pro' ),
        ) 
    );
    
    /** Move Header Image section to appearance panel */
    $wp_customize->get_section( 'header_image' )->panel    = 'appearance_settings';
    $wp_customize->get_section( 'header_image' )->priority = 20;
    $wp_customize->get_section( 'header_image' )->active_callback = 'blossom_feminine_pro_header_img_ac';
    $wp_customize->remove_control( 'header_textcolor' );
    
    /** Background */
    $wp_customize->add_section(
        'bg_settings',
        array(
            'title'    => __( 'Background', 'blossom-feminine-pro' ),
            'priority' => 40,
            'panel'    => 'appearance_settings',
        )
    );
    
    /** Body Background */
    $wp_customize->add_setting( 
        'body_bg', 
        array(
            'default'           => 'image',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Radio_Buttonset_Control(
			$wp_customize,
			'body_bg',
			array(
				'section'	  => 'bg_settings',
				'label'       => __( 'Body Background', 'blossom-feminine-pro' ),
                'description' => __( 'Choose body background as image or pattern.', 'blossom-feminine-pro' ),
				'choices'	  => array(
					'image'   => __( 'Image', 'blossom-feminine-pro' ),
                    'pattern' => __( 'Pattern', 'blossom-feminine-pro' ),
				)
			)
		)
	);
    
    /** Background Image */
    $wp_customize->add_setting(
        'bg_image',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'bg_image',
           array(
               'label'           => __( 'Background Image', 'blossom-feminine-pro' ),
               'description'     => __( 'Upload your own custom background image or pattern.', 'blossom-feminine-pro' ),
               'section'         => 'bg_settings',
               'active_callback' => 'blossom_feminine_pro_body_bg_choice'               
           )
       )
    );    
    
    /** Background Pattern */
    $wp_customize->add_setting( 
        'bg_pattern', array(
            'default'           => 'nobg',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Radio_Image_Control(
			$wp_customize,
			'bg_pattern',
			array(
				'section'		  => 'bg_settings',
				'label'			  => __( 'Background Pattern', 'blossom-feminine-pro' ),
				'description'	  => __( 'Choose from any of 63 awesome background patterns for your site background.', 'blossom-feminine-pro' ),
				'choices'         => blossom_feminine_pro_get_patterns(),
                'active_callback' => 'blossom_feminine_pro_body_bg_choice'
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_appearance' );

/**
 * Active Callback for Body Background
*/
function blossom_feminine_pro_body_bg_choice( $control ){
    
    $body_bg    = $control->manager->get_setting( 'body_bg' )->value();
    $control_id = $control->id;
         
    if ( $control_id == 'bg_image' && $body_bg == 'image' ) return true;
    if ( $control_id == 'bg_pattern' && $body_bg == 'pattern' ) return true;
    
    return false;
}

function blossom_feminine_pro_header_img_ac( $control ){
    
    $header_layout = $control->manager->get_setting( 'header_layout' )->value();
         
    if ( $header_layout == 'eight' ) return true;
    
    return false;
}