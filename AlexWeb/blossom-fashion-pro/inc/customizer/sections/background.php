<?php
/**
 * Background Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_appearance( $wp_customize ) {
    
    /** Background */
    $wp_customize->add_section(
        'bg_settings',
        array(
            'title'    => __( 'Background', 'blossom-fashion-pro' ),
            'priority' => 40,
        )
    );
    
    /** Body Background */
    $wp_customize->add_setting( 
        'body_bg', 
        array(
            'default'           => 'image',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Radio_Buttonset_Control(
			$wp_customize,
			'body_bg',
			array(
				'section'	  => 'bg_settings',
				'label'       => __( 'Body Background', 'blossom-fashion-pro' ),
                'description' => __( 'Choose body background as image or pattern.', 'blossom-fashion-pro' ),
				'choices'	  => array(
					'image'   => __( 'Image', 'blossom-fashion-pro' ),
                    'pattern' => __( 'Pattern', 'blossom-fashion-pro' ),
				)
			)
		)
	);
    
    /** Background Image */
    $wp_customize->add_setting(
        'bg_image',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_image',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'bg_image',
           array(
               'label'           => __( 'Background Image', 'blossom-fashion-pro' ),
               'description'     => __( 'Upload your own custom background image or pattern.', 'blossom-fashion-pro' ),
               'section'         => 'bg_settings',
               'active_callback' => 'blossom_fashion_pro_body_bg_choice'               
           )
       )
    );    
    
    /** Background Pattern */
    $wp_customize->add_setting( 
        'bg_pattern', array(
            'default'           => 'nobg',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Radio_Image_Control(
			$wp_customize,
			'bg_pattern',
			array(
				'section'		  => 'bg_settings',
				'label'			  => __( 'Background Pattern', 'blossom-fashion-pro' ),
				'description'	  => __( 'Choose from any of 63 awesome background patterns for your site background.', 'blossom-fashion-pro' ),
				'choices'         => blossom_fashion_pro_get_patterns(),
                'active_callback' => 'blossom_fashion_pro_body_bg_choice'
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_appearance' );

/**
 * Active Callback for Body Background
*/
function blossom_fashion_pro_body_bg_choice( $control ){
    
    $body_bg    = $control->manager->get_setting( 'body_bg' )->value();
    $control_id = $control->id;
         
    if ( $control_id == 'bg_image' && $body_bg == 'image' ) return true;
    if ( $control_id == 'bg_pattern' && $body_bg == 'pattern' ) return true;
    
    return false;
}