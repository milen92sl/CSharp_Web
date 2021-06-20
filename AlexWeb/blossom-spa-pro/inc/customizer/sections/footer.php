<?php
/**
 * Footer Setting
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_footer( $wp_customize ) {
    
    $wp_customize->add_section(
        'footer_settings',
        array(
            'title'      => __( 'Footer Settings', 'blossom-spa-pro' ),
            'priority'   => 199,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Phone */
    $wp_customize->add_setting(
        'fphone_label',
        array(
            'default'           => __( 'Phone Number', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'fphone_label',
        array(
            'type'    => 'text',
            'section' => 'footer_settings',
            'label'   => __( 'Phone Label', 'blossom-spa-pro' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'fphone_label', array(
        'selector' => '.footer-block-wrap .footer-contact-block .footer-contact-block-inner span.fphone-label',
        'render_callback' => 'blossom_spa_pro_get_fphone_label',
    ) );
    
    $wp_customize->add_setting(
        'fphone',
        array(
            'default'           => __( '+123-456-7890', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'fphone',
        array(
            'type'    => 'text',
            'section' => 'footer_settings',
            'label'   => __( 'Phone', 'blossom-spa-pro' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'fphone', array(
        'selector' => '.footer-block-wrap .footer-contact-block .footer-contact-block-inner p.fphone',
        'render_callback' => 'blossom_spa_pro_get_fphone',
    ) );
    
    /** Email */

    $wp_customize->add_setting(
        'femail_label',
        array(
            'default'           => __( 'Email', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'femail_label',
        array(
            'type'    => 'text',
            'section' => 'footer_settings',
            'label'   => __( 'Email Label', 'blossom-spa-pro' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'femail_label', array(
        'selector' => '.footer-block-wrap .footer-contact-block .footer-contact-block-inner span.femail-label',
        'render_callback' => 'blossom_spa_pro_get_femail_label',
    ) );

    $wp_customize->add_setting(
        'femail',
        array(
            'default'           => __( 'mail@domain.com', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_email',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'femail',
        array(
            'type'    => 'text',
            'section' => 'footer_settings',
            'label'   => __( 'Email', 'blossom-spa-pro' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'femail', array(
        'selector' => '.footer-block-wrap .footer-contact-block .footer-contact-block-inner p.femail',
        'render_callback' => 'blossom_spa_pro_get_femail',
    ) );

    /** Email */

    $wp_customize->add_setting(
        'fopening_hours_label',
        array(
            'default'           => __( 'Opening Hours', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'fopening_hours_label',
        array(
            'type'    => 'text',
            'section' => 'footer_settings',
            'label'   => __( 'Opening Hours Label', 'blossom-spa-pro' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'fopening_hours_label', array(
        'selector' => '.footer-block-wrap .footer-contact-block .footer-contact-block-inner span.fopening-label',
        'render_callback' => 'blossom_spa_pro_get_fopening_hours_label',
    ) );

    $wp_customize->add_setting(
        'fopening_hours',
        array(
            'default'           => __( 'Mon - Fri: 7AM - 7PM', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'fopening_hours',
        array(
            'type'    => 'text',
            'section' => 'footer_settings',
            'label'   => __( 'Opening Hours', 'blossom-spa-pro' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'fopening_hours', array(
        'selector' => '.footer-block-wrap .footer-contact-block .footer-contact-block-inner p.fopening',
        'render_callback' => 'blossom_spa_pro_get_fopening_hours',
    ) );

    /** Note */
    $wp_customize->add_setting(
        'footer_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Note_Control( 
            $wp_customize,
            'footer_note_text',
            array(
                'section'     => 'footer_settings',
                'description' => sprintf( __( '%s', 'blossom-spa-pro' ), '<hr/>' ),
            )
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
            'label'       => __( 'Footer Copyright Text', 'blossom-spa-pro' ),
            'description' => __( 'You can change footer copyright and use your own custom text from here. Use [the-year] shortcode to display current year & [the-site-link] shortcode to display site link.', 'blossom-spa-pro' ),
            'section'     => 'footer_settings',
            'type'        => 'textarea',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
        'selector' => '.site-footer .footer-b .container .copyright .copyright-wrap',
        'render_callback' => 'blossom_spa_pro_get_footer_copyright',
    ) );
    
    /** Hide Author Link */
    $wp_customize->add_setting(
        'ed_author_link',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_author_link',
			array(
				'section' => 'footer_settings',
				'label'	  => __( 'Hide Author Link', 'blossom-spa-pro' ),
			)
		)
	);
    
    $wp_customize->selective_refresh->add_partial( 'ed_author_link', array(
        'selector' => '.site-footer .footer-b .container .author-link',
        'render_callback' => 'blossom_spa_pro_ed_author_link',
    ) );
    
    /** Hide WordPress Link */
    $wp_customize->add_setting(
        'ed_wp_link',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_wp_link',
			array(
				'section' => 'footer_settings',
				'label'	  => __( 'Hide WordPress Link', 'blossom-spa-pro' ),
			)
		)
	);
    
    $wp_customize->selective_refresh->add_partial( 'ed_wp_link', array(
        'selector' => '.site-footer .footer-b .container .wp-link',
        'render_callback' => 'blossom_spa_pro_ed_wp_link',
    ) );
        
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_footer' );