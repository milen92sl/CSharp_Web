<?php
/**
 * Header Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_general_header( $wp_customize ) {
    
    /** Header Settings */
    $wp_customize->add_section(
        'header_settings',
        array(
            'title'    => __( 'Header Settings', 'blossom-spa-pro' ),
            'priority' => 20,
            'panel'    => 'general_settings',
        )
    );
    
    /** Sticky Header */
    $wp_customize->add_setting(
        'ed_sticky_header',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Toggle_Control( 
            $wp_customize,
            'ed_sticky_header',
            array(
                'section'       => 'header_settings',
                'label'         => __( 'Sticky Header', 'blossom-spa-pro' ),
                'description'   => __( 'Enable to stick header at top.', 'blossom-spa-pro' ),
            )
        )
    );

    /** Enable Header Search */
    $wp_customize->add_setting( 
        'ed_header_search', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_header_search',
			array(
				'section'     => 'header_settings',
				'label'	      => __( 'Enable Header Search', 'blossom-spa-pro' ),
                'description' => __( 'Enable to show Search button in header.', 'blossom-spa-pro' ),
			)
		)
	);
        
    /** Phone */
    $wp_customize->add_setting(
        'phone_label',
        array(
            'default'           => __( 'Phone Number', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'

        )
    );
    
    $wp_customize->add_control(
        'phone_label',
        array(
            'type'    => 'text',
            'section' => 'header_settings',
            'label'   => __( 'Phone Label', 'blossom-spa-pro' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'phone_label', array(
        'selector' => '.header-contact .contact-block span.hphone-label',
        'render_callback' => 'blossom_spa_pro_get_phone_label',
    ) );
    
    $wp_customize->add_setting(
        'phone',
        array(
            'default'           => __( '+123-456-7890', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'phone',
        array(
            'type'    => 'text',
            'section' => 'header_settings',
            'label'   => __( 'Phone', 'blossom-spa-pro' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'phone', array(
        'selector' => '.header-contact .contact-block p.hphone',
        'render_callback' => 'blossom_spa_pro_get_phone',
    ) );
    /** Email */

    $wp_customize->add_setting(
        'email_label',
        array(
            'default'           => __( 'Email', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'email_label',
        array(
            'type'    => 'text',
            'section' => 'header_settings',
            'label'   => __( 'Email Label', 'blossom-spa-pro' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'email_label', array(
        'selector' => '.header-contact .contact-block span.hemail-label',
        'render_callback' => 'blossom_spa_pro_get_email_label',
    ) );

    $wp_customize->add_setting(
        'email',
        array(
            'default'           => __( 'mail@domain.com', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_email',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'email',
        array(
            'type'    => 'text',
            'section' => 'header_settings',
            'label'   => __( 'Email', 'blossom-spa-pro' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'email', array(
        'selector' => '.header-contact .contact-block p.hemail',
        'render_callback' => 'blossom_spa_pro_get_email',
    ) );

    /** Email */

    $wp_customize->add_setting(
        'opening_hours_label',
        array(
            'default'           => __( 'Opening Hours', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'opening_hours_label',
        array(
            'type'    => 'text',
            'section' => 'header_settings',
            'label'   => __( 'Opening Hours Label', 'blossom-spa-pro' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'opening_hours_label', array(
        'selector' => '.header-contact .contact-block span.hopening-label',
        'render_callback' => 'blossom_spa_pro_get_opening_hours_label',
    ) );

    $wp_customize->add_setting(
        'opening_hours',
        array(
            'default'           => __( 'Mon - Fri: 7AM - 7PM', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'opening_hours',
        array(
            'type'    => 'text',
            'section' => 'header_settings',
            'label'   => __( 'Opening Hours', 'blossom-spa-pro' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'opening_hours', array(
        'selector' => '.header-contact .contact-block p.hopening',
        'render_callback' => 'blossom_spa_pro_get_opening_hours',
    ) );

    $wp_customize->add_setting( 'header_background_image',
        array(
            'default'           => get_template_directory_uri() . '/images/header-bg.jpg',
            'sanitize_callback' => 'blossom_spa_pro_sanitize_image',
        )
    );
    
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( $wp_customize, 'header_background_image',
            array(
                'label'         => esc_html__( 'Background Image', 'blossom-spa-pro' ),
                'description'   => esc_html__( 'Choose background Image of your choice. Recommended size for this image is 1920px by 232px. This effect on blog, archive & search pages.', 'blossom-spa-pro' ),
                'section'       => 'header_settings',
                'type'          => 'image',
            )
        )
    );

    /** Header Settings Ends */
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_general_header' );