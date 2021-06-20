<?php
/**
 * Newsletter Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_general_newsletter( $wp_customize ) {    
  
    /** Newsletter Settings */
    $wp_customize->add_section(
        'newsletter_settings',
        array(
            'title'    => __( 'Newsletter Settings', 'blossom-feminine-pro' ),
            'priority' => 60,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Newsletter Section */
    $wp_customize->add_setting( 
        'ed_newsletter', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_newsletter',
			array(
				'section'     => 'newsletter_settings',
				'label'	      => __( 'Newsletter Section', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to show Newsletter Section', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Newsletter Shortcode */
    $wp_customize->add_setting(
        'newsletter_shortcode',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'newsletter_shortcode',
        array(
            'type'        => 'text',
            'section'     => 'newsletter_settings',
            'label'       => __( 'Newsletter Shortcode', 'blossom-feminine-pro' ),
            'description' => __( 'Enter the BlossomThemes Email Newsletters Shortcode. Ex. [BTEN id="356"]', 'blossom-feminine-pro' ),
        )
    );
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_general_newsletter' );