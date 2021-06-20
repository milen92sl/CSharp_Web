<?php
/**
 * Header Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_general_header( $wp_customize ) {
    
    /** Header Settings */
    $wp_customize->add_section(
        'header_settings',
        array(
            'title'    => __( 'Header Settings', 'blossom-recipe-pro' ),
            'priority' => 25,
            'panel'    => 'general_settings',
        )
    );

    /** Header Search */
    $wp_customize->add_setting(
        'ed_header_search',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_header_search',
			array(
				'section'		=> 'header_settings',
				'label'			=> __( 'Header Search', 'blossom-recipe-pro' ),
				'description'	=> __( 'Enable to display search form in header.', 'blossom-recipe-pro' ),
			)
		)
	);
    
    /** Sticky Header */
    $wp_customize->add_setting(
        'ed_sticky_header',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_sticky_header',
			array(
				'section'		=> 'header_settings',
				'label'			=> __( 'Sticky Header', 'blossom-recipe-pro' ),
				'description'	=> __( 'Enable to stick header at top.', 'blossom-recipe-pro' ),
			)
		)
	);
    
    /** Enable Newsletter Section */
    $wp_customize->add_setting( 
        'ed_header_newsletter', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Recipe_Pro_Toggle_Control( 
            $wp_customize,
            'ed_header_newsletter',
            array(
                'section'     => 'header_settings',
                'label'       => __( 'Header Newsletter Section', 'blossom-recipe-pro' ),
                'description' => __( 'Enable to show Newsletter Section', 'blossom-recipe-pro' ),
            )
        )
    );

    /** Newsletter Shortcode */
    $wp_customize->add_setting(
        'header_newsletter_shortcode',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'header_newsletter_shortcode',
        array(
            'type'        => 'text',
            'section'     => 'header_settings',
            'label'       => __( 'Newsletter Shortcode', 'blossom-recipe-pro' ),
            'description' => __( 'Enter the BlossomThemes Email Newsletters Shortcode. Ex. [BTEN id="356"]', 'blossom-recipe-pro' ),
            'active_callback' => 'blossom_recipe_pro_header_newsletter_callback',
        )
    );
        
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_general_header' );