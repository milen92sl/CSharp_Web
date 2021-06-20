<?php
/**
 * Miscellaneous Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_general_misc( $wp_customize ) {
    
    /** Miscellaneous Settings */
    $wp_customize->add_section(
        'misc_settings',
        array(
            'title'    => __( 'Misc Settings', 'blossom-feminine-pro' ),
            'priority' => 75,
            'panel'    => 'general_settings',
        )
    );
    
    /** Admin Bar */
    $wp_customize->add_setting(
        'ed_adminbar',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_adminbar',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Admin Bar', 'blossom-feminine-pro' ),
				'description'	=> __( 'Disable to hide Admin Bar in frontend when logged in.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Lightbox */
    $wp_customize->add_setting(
        'ed_lightbox',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_lightbox',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Lightbox', 'blossom-feminine-pro' ),
				'description'	=> __( 'A lightbox is a stylized pop-up that allows your visitors to view larger versions of images without leaving the current page. You can enable or disable the lightbox here.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Header Search */
    $wp_customize->add_setting(
        'ed_header_search',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_header_search',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Header Search', 'blossom-feminine-pro' ),
				'description'	=> __( 'Enable to display search form in header.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** WooCommerce Cart */
    $wp_customize->add_setting(
        'ed_cart',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_cart',
			array(
				'section'		  => 'misc_settings',
				'label'			  => __( 'Woocommerce Cart', 'blossom-feminine-pro' ),
				'description'	  => __( 'Enable to show cart icon along search icon in header.', 'blossom-feminine-pro' ),
                'active_callback' => 'is_woocommerce_activated'
			)
		)
	);
    
    /** Sticky Header */
    $wp_customize->add_setting(
        'ed_sticky_header',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_sticky_header',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Sticky Header', 'blossom-feminine-pro' ),
				'description'	=> __( 'Enable to stick header at top.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Last Widget Sticky */
    $wp_customize->add_setting(
        'ed_last_widget_sticky',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_last_widget_sticky',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Last Widget Sticky', 'blossom-feminine-pro' ),
				'description'	=> __( 'Enable to stick last widget in sidebar.', 'blossom-feminine-pro' ),
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_general_misc' );