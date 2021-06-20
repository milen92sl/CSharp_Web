<?php
/**
 * Miscellaneous Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_general_misc( $wp_customize ) {
    
    /** Miscellaneous Settings */
    $wp_customize->add_section(
        'misc_settings',
        array(
            'title'    => __( 'Misc Settings', 'blossom-spa-pro' ),
            'priority' => 85,
            'panel'    => 'general_settings',
        )
    );
    
    /** Admin Bar */
    $wp_customize->add_setting(
        'ed_adminbar',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_adminbar',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Admin Bar', 'blossom-spa-pro' ),
				'description'	=> __( 'Disable to hide Admin Bar in frontend when logged in.', 'blossom-spa-pro' ),
			)
		)
	);
    
    /** Lightbox */
    $wp_customize->add_setting(
        'ed_lightbox',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_lightbox',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Lightbox', 'blossom-spa-pro' ),
				'description'	=> __( 'A lightbox is a stylized pop-up that allows your visitors to view larger versions of images without leaving the current page. You can enable or disable the lightbox here.', 'blossom-spa-pro' ),
			)
		)
	);
       
    /** Last Widget Sticky */
    $wp_customize->add_setting(
        'ed_last_widget_sticky',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_last_widget_sticky',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Last Widget Sticky', 'blossom-spa-pro' ),
				'description'	=> __( 'Enable to stick last widget in sidebar.', 'blossom-spa-pro' ),
			)
		)
	);
    
    /** Drop Cap */
    $wp_customize->add_setting(
        'ed_drop_cap',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_drop_cap',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Drop Cap', 'blossom-spa-pro' ),
				'description'	=> __( 'Enable to show first letter of word in post/page content in drop cap.', 'blossom-spa-pro' ),
			)
		)
	);

    /** Shop Page Description */
    $wp_customize->add_setting( 
        'ed_shop_archive_description', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Toggle_Control( 
            $wp_customize,
            'ed_shop_archive_description',
            array(
                'section'         => 'misc_settings',
                'label'           => __( 'Shop Page Description', 'blossom-spa-pro' ),
                'description'     => __( 'Enable to show Shop Page Description.', 'blossom-spa-pro' ),
                'active_callback' => 'is_woocommerce_activated'
            )
        )
    );
    
    /** $shop_archive_description */
    $wp_customize->add_setting( 
        'shop_archive_description', 
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post'
        ) 
    );
    
    $wp_customize->add_control(
        'shop_archive_description',
        array(
            'section'         => 'misc_settings',
            'label'           => __( 'Description For Shop Page', 'blossom-spa-pro' ),
            'description'     => __( 'Write new description for Shop Page to overwrite the default description.', 'blossom-spa-pro' ),
            'type'            => 'textarea',
            'active_callback' => 'blossom_spa_pro_shop_description_ac'
        )
    );
        
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_general_misc' );