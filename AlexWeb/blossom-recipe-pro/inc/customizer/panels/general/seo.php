<?php
/**
 * SEO Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_general_seo( $wp_customize ) {
    
    /** SEO Settings */
    $wp_customize->add_section(
        'seo_settings',
        array(
            'title'    => __( 'SEO Settings', 'blossom-recipe-pro' ),
            'priority' => 40,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_post_update_date', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_post_update_date',
			array(
				'section'     => 'seo_settings',
				'label'	      => __( 'Enable Last Update Post Date', 'blossom-recipe-pro' ),
                'description' => __( 'Enable to show last updated post date on listing as well as in single post.', 'blossom-recipe-pro' ),
			)
		)
	);
  
    /** SEO Settings Ends */
    
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_general_seo' );