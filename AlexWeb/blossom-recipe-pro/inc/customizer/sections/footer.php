<?php
/**
 * Footer Setting
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_footer( $wp_customize ) {
    
    $wp_customize->add_section(
        'footer_settings',
        array(
            'title'      => __( 'Footer Settings', 'blossom-recipe-pro' ),
            'priority'   => 199,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Footer Copyright */
    $wp_customize->add_setting(
        'footer_copyright',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'footer_copyright',
        array(
            'label'       => __( 'Footer Copyright Text', 'blossom-recipe-pro' ),
            'description' => __( 'You can change footer copyright and use your own custom text from here. Use [the-year] shortcode to display current year & [the-site-link] shortcode to display site link.', 'blossom-recipe-pro' ),
            'section'     => 'footer_settings',
            'type'        => 'textarea',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
        'selector' => '.bottom-footer .copyright .copyright-text',
        'render_callback' => 'blossom_recipe_pro_get_footer_copyright',
    ) );
    
    /** Hide Author Link */
    $wp_customize->add_setting(
        'ed_author_link',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_author_link',
			array(
				'section' => 'footer_settings',
				'label'	  => __( 'Hide Author Link', 'blossom-recipe-pro' ),
			)
		)
	);
    
    $wp_customize->selective_refresh->add_partial( 'ed_author_link', array(
        'selector' => '.bottom-footer .copyright .author-link',
        'render_callback' => 'blossom_recipe_pro_ed_author_link',
    ) );
    
    /** Hide WordPress Link */
    $wp_customize->add_setting(
        'ed_wp_link',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_wp_link',
			array(
				'section' => 'footer_settings',
				'label'	  => __( 'Hide WordPress Link', 'blossom-recipe-pro' ),
			)
		)
	);
    
    $wp_customize->selective_refresh->add_partial( 'ed_wp_link', array(
        'selector' => '.bottom-footer .copyright .wp-link',
        'render_callback' => 'blossom_recipe_pro_ed_wp_link',
    ) );
        
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_footer' );