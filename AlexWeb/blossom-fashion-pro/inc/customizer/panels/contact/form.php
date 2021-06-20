<?php
/**
 * Contact Form Address Option.
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_contact_form( $wp_customize ) {
    
    /** Contact Page Settings */
    $wp_customize->add_section( 
        'contact_form_settings',
         array(        
            'title'    => __( 'Contact Form Settings', 'blossom-fashion-pro' ),
            'panel'    => 'contact_page_setting',
            'priority' => 10,            
        ) 
    );
    
    /** Title  */
    $wp_customize->add_setting(
        'contact_title',
        array(
            'default'           => __( 'Contact Me', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'contact_title',
        array(
            'label'       => __( 'Title', 'blossom-fashion-pro' ),
            'section'     => 'contact_form_settings',
            'type'        => 'text',                                 
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'contact_title', array(
        'selector' => '.top-section .section-header .title',
        'render_callback' => 'blossom_fashion_pro_contact_title',
    ) );
    
    /** Content  */
    $wp_customize->add_setting(
        'contact_content',
        array(
            'default'           => __( 'The contact page is just for demonstration purpose. Please DON\'T contact us via the contact form. For any questions or support, contact us on our support forum.', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'contact_content',
        array(
            'label'       => __( 'Content', 'blossom-fashion-pro' ),
            'section'     => 'contact_form_settings',
            'type'        => 'textarea',                                 
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'contact_content', array(
        'selector' => '.top-section .section-header .content',
        'render_callback' => 'blossom_fashion_pro_contact_content',
    ) );
    
    if( is_cf7_activated() ){
        /** Contact Form  */
        $wp_customize->add_setting(
            'contact_form',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
            )
        );
        
        $wp_customize->add_control(
            'contact_form',
            array(
                'label'       => __( 'Contact Form', 'blossom-fashion-pro' ),
                'description' => __( 'Enter the Contact Form 7 Shortcode. Ex. [contact-form-7 id="186" title="Contact form 1"]', 'blossom-fashion-pro' ),
                'section'     => 'contact_form_settings',
                'type'        => 'text',                                    
            )
        );
    }else{
        $wp_customize->add_setting(
    		'contact_note',
    		array(
    			'sanitize_callback' => 'wp_kses_post'
    		)
    	);
    
    	$wp_customize->add_control(
    		new Blossom_Fashion_Pro_Note_Control( 
    			$wp_customize,
    			'contact_note',
    			array(
    				'section'     => 'contact_form_settings', 
                    'label'       => __( 'Contact Form', 'blossom-fashion-pro' ),   				
                    'description' => sprintf( __( 'Please add contact form 7 shortcode after installing and activating the %1$sContact Form 7%2$s.', 'blossom-fashion-pro' ), '<a href="' . admin_url( 'themes.php?page=tgmpa-install-plugins' ) . '" target="_blank">', '</a>' ),
    			)
    		)
       );                        
    }
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_contact_form' );