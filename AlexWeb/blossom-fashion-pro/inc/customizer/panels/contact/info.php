<?php
/**
 * Contact Page Address Option.
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_contact_info( $wp_customize ) {
    
    /** Contact Page Settings */
    $wp_customize->add_section( 
        'contact_detail_settings',
         array(        
            'title'    => __( 'Contact Details Settings', 'blossom-fashion-pro' ),
            'panel'    => 'contact_page_setting',
            'priority' => 30,            
        ) 
    );
    
    /** Enable Contact Details */
    $wp_customize->add_setting(
        'ed_contact_details',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_contact_details',
			array(
				'section'	  => 'contact_detail_settings',
				'label'		  => __( 'Enable Contact Details', 'blossom-fashion-pro' ),
				'description' => __( 'Enable to show contact details.', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Info Title  */
    $wp_customize->add_setting(
        'info_title',
        array(
            'default'           => __( 'Get In Touch', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'info_title',
        array(
            'label'       => __( 'Info Title', 'blossom-fashion-pro' ),
            'section'     => 'contact_detail_settings',
            'type'        => 'text',                                 
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'info_title', array(
        'selector' => '.contact-details .contact-info-holder .title',
        'render_callback' => 'blossom_fashion_pro_contact_info_title',
    ) );
    
    /** Info Content  */
    $wp_customize->add_setting(
        'info_content',
        array(
            'default'           => __( 'You can get in touch with me directly at hello@domain.com. I am also available for freelance. Interested in collaboration? Get in touch', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'info_content',
        array(
            'label'       => __( 'Info Content', 'blossom-fashion-pro' ),
            'section'     => 'contact_detail_settings',
            'type'        => 'textarea',                                 
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'info_content', array(
        'selector' => '.contact-details .contact-info-holder .content',
        'render_callback' => 'blossom_fashion_pro_contact_info_content',
    ) );
    
    /** Contact Phone  */
    $wp_customize->add_setting(
        'contact_phone',
        array(
            'default'           => __( '+080 555 44 11', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'contact_phone',
        array(
            'label'       => __( 'Contact Phone', 'blossom-fashion-pro' ),
            'description' => __( 'Enter the contact phone.', 'blossom-fashion-pro' ),
            'section'     => 'contact_detail_settings',
            'type'        => 'text',                               
        )
    );
    
     $wp_customize->selective_refresh->add_partial( 'contact_phone', array(
        'selector' => '.contact-details .contact-info-holder .grid .col .phone',
        'render_callback' => 'blossom_fashion_pro_contact_phone',
    ) );
    
    /** Phone Label */
    $wp_customize->add_setting(
        'contact_phone_label',
        array(
            'default'           => __( 'Contact us by telephone', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'contact_phone_label',
        array(
            'label'   => __( 'Phone Label', 'blossom-fashion-pro' ),
            'section' => 'contact_detail_settings',
            'type'    => 'text',                               
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'contact_phone_label', array(
        'selector' => '.contact-details .contact-info-holder .grid .col .phone-label',
        'render_callback' => 'blossom_fashion_pro_contact_phone_label',
    ) );
    
    /** Contact Email  */
    $wp_customize->add_setting(
        'contact_email',
        array(
            'default'           => __( 'mail@domain.com', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'contact_email',
        array(
            'label'       => __( 'Contact Email', 'blossom-fashion-pro' ),
            'description' => __( 'Enter the contact email.', 'blossom-fashion-pro' ),
            'section'     => 'contact_detail_settings',
            'type'        => 'text',                                    
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'contact_email', array(
        'selector' => '.contact-details .contact-info-holder .grid .col .email',
        'render_callback' => 'blossom_fashion_pro_contact_email',
    ) );
    
    /** Email Label */
    $wp_customize->add_setting(
        'email_label',
        array(
            'default'           => __( 'Write us a message', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'email_label',
        array(
            'label'   => __( 'Email Label', 'blossom-fashion-pro' ),
            'section' => 'contact_detail_settings',
            'type'    => 'text',                               
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'email_label', array(
        'selector' => '.contact-details .contact-info-holder .grid .col .email-label',
        'render_callback' => 'blossom_fashion_pro_contact_email_label',
    ) );
    
    /** Contact Address  */
    $wp_customize->add_setting(
        'contact_address',
        array(
            'default'           => __( '123 New York, NY 60606', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'contact_address',
        array(
            'label'       => __( 'Contact Address', 'blossom-fashion-pro' ),
            'description' => __( 'Enter the contact address.', 'blossom-fashion-pro' ),
            'section'     => 'contact_detail_settings',
            'type'        => 'textarea',                                    
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'contact_address', array(
        'selector' => '.contact-details .contact-info-holder .grid .col address',
        'render_callback' => 'blossom_fashion_pro_contact_address',
    ) );
    
    /** Address Label */
    $wp_customize->add_setting(
        'location_label',
        array(
            'default'           => __( 'Our address', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'location_label',
        array(
            'label'   => __( 'Address Label', 'blossom-fashion-pro' ),
            'section' => 'contact_detail_settings',
            'type'    => 'text',                               
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'location_label', array(
        'selector' => '.contact-details .contact-info-holder .grid .col .address-label',
        'render_callback' => 'blossom_fashion_pro_contact_address_label',
    ) );
    
    /** Enable Social Links */
    $wp_customize->add_setting(
        'ed_contact_social',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_contact_social',
			array(
				'section'	  => 'contact_detail_settings',
				'label'		  => __( 'Enable Social Links', 'blossom-fashion-pro' ),
				'description' => __( 'Enable to show social links. Each individual social links can be set from social settings.', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Social Links Label */
    $wp_customize->add_setting(
        'social_links_label',
        array(
            'default'           => __( 'Get Social', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'social_links_label',
        array(
            'label'           => __( 'Social Links Label', 'blossom-fashion-pro' ),
            'section'         => 'contact_detail_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_fashion_pro_contact_social_ac'                                
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'social_links_label', array(
        'selector' => '.contact-details .contact-info-holder .grid .col .social-label',
        'render_callback' => 'blossom_fashion_pro_contact_social_label',
    ) );
    
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_contact_info' );

/**
 * Active Callback for map marker
*/
function blossom_fashion_pro_contact_social_ac( $control ){
    
    $ed_social = $control->manager->get_setting( 'ed_contact_social' )->value();
    
    if ( $ed_social == true ) return true;
    
    return false;
}