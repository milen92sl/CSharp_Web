<?php
/**
 * Notification Bar Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_general_notification( $wp_customize ) {
    
    /** Notification Bar Settings */
    $wp_customize->add_section(
        'notification_settings',
        array(
            'title'    => __( 'Notification Bar Settings', 'blossom-feminine-pro' ),
            'priority' => 5,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Notification Bar */
    $wp_customize->add_setting( 
        'ed_notification_bar', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_notification_bar',
			array(
				'section'     => 'notification_settings',
				'label'	      => __( 'Enable Notification Bar', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to show notification bar on top of header.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Notification Text */
    $wp_customize->add_setting( 
        'notification_text', 
        array(
            'default'           => __( '30 percent Off glasses and purses with coupon code <strong>30PERCENTOFF!</strong>', 'blossom-feminine-pro' ), 
            'sanitize_callback' => 'wp_kses_post'
        ) 
    );
    
    $wp_customize->add_control(
		'notification_text',
		array(
			'section'     => 'notification_settings',
			'label'	      => __( 'Notification Text', 'blossom-feminine-pro' ),
            'description' => __( 'Please add the notification text here.', 'blossom-feminine-pro' ),
            'type'        => 'textarea',
		)	
	);
    
    /** Notification Button Label */
    $wp_customize->add_setting(
        'notification_btn_label',
        array(
            'default'           => __( 'Get It Now', 'blossom-feminine-pro' ),
            'sanitize_callback' => 'sanitize_text_field' 
        )
    );
    
    $wp_customize->add_control(
        'notification_btn_label',
        array(
            'type'    => 'text',
            'section' => 'notification_settings',
            'label'   => __( 'Notification Button Label', 'blossom-feminine-pro' ),
        )
    );
    
    /** Notification Button Link */
    $wp_customize->add_setting(
        'notification_btn_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw' 
        )
    );
    
    $wp_customize->add_control(
        'notification_btn_url',
        array(
            'type'    => 'text',
            'section' => 'notification_settings',
            'label'   => __( 'Notification Button Link', 'blossom-feminine-pro' ),
        )
    );    

    /** Enable Notification Bar */
    $wp_customize->add_setting( 
        'ed_open_new_target', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Toggle_Control( 
            $wp_customize,
            'ed_open_new_target',
            array(
                'section'     => 'notification_settings',
                'label'       => __( 'Enable to open in new window', 'blossom-feminine-pro' ),
                'description' => __( 'Enable/Disable to show the url to go in next window', 'blossom-feminine-pro' ),
            )
        )
    );
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_general_notification' );