<?php
/**
 * Background Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_appearance( $wp_customize ) {
    
    /** Background */
    $wp_customize->get_section( 'background_image' )->title = __( 'Background', 'blossom-recipe-pro' );
    $wp_customize->get_section( 'background_image' )->priority = 41;
    $wp_customize->get_control( 'background_image' )->active_callback = 'blossom_recipe_pro_body_bg_choice';
    $wp_customize->get_control( 'background_preset' )->active_callback = 'blossom_recipe_pro_body_bg_choice';
    $wp_customize->get_control( 'background_position' )->active_callback = 'blossom_recipe_pro_body_bg_choice';
    $wp_customize->get_control( 'background_size' )->active_callback = 'blossom_recipe_pro_body_bg_choice';
    $wp_customize->get_control( 'background_repeat' )->active_callback = 'blossom_recipe_pro_body_bg_choice';
    $wp_customize->get_control( 'background_attachment' )->active_callback = 'blossom_recipe_pro_body_bg_choice';
    
    /** Body Background */
    $wp_customize->add_setting( 
        'body_bg', 
        array(
            'default'           => 'image',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Radio_Buttonset_Control(
			$wp_customize,
			'body_bg',
			array(
				'section'	  => 'background_image',
				'label'       => __( 'Body Background', 'blossom-recipe-pro' ),
                'description' => __( 'Choose body background as image or pattern.', 'blossom-recipe-pro' ),
				'choices'	  => array(
					'image'   => __( 'Image', 'blossom-recipe-pro' ),
                    'pattern' => __( 'Pattern', 'blossom-recipe-pro' ),
				),
                'priority'    => 5
			)
		)
	);
    
    /** Background Pattern */
    $wp_customize->add_setting( 
        'bg_pattern', array(
            'default'           => 'nobg',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Radio_Image_Control(
			$wp_customize,
			'bg_pattern',
			array(
				'section'		  => 'background_image',
				'label'			  => __( 'Background Pattern', 'blossom-recipe-pro' ),
				'description'	  => __( 'Choose from any of 64 awesome background patterns for your site background.', 'blossom-recipe-pro' ),
				'choices'         => blossom_recipe_pro_get_patterns(),
                'active_callback' => 'blossom_recipe_pro_body_bg_choice'
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_appearance' );