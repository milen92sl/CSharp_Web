<?php
/**
 * Miscellaneous Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_general_misc( $wp_customize ) {
    
    /** Miscellaneous Settings */
    $wp_customize->add_section(
        'misc_settings',
        array(
            'title'    => __( 'Misc Settings', 'blossom-pin-pro' ),
            'priority' => 85,
            'panel'    => 'general_settings',
        )
    );
    
    /** Admin Bar */
    $wp_customize->add_setting(
        'ed_adminbar',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_adminbar',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Admin Bar', 'blossom-pin-pro' ),
				'description'	=> __( 'Disable to hide Admin Bar in frontend when logged in.', 'blossom-pin-pro' ),
			)
		)
	);
     /** Post Like Button */
    $wp_customize->add_setting(
        'ed_post_like',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Toggle_Control( 
            $wp_customize,
            'ed_post_like',
            array(
                'section'       => 'misc_settings',
                'label'         => __( 'Post Like', 'blossom-pin-pro' ),
                'description'   => __( 'Disable to hide Post Like on home page and single post.', 'blossom-pin-pro' ),
            )
        )
    );
    
    /** Lightbox */
    $wp_customize->add_setting(
        'ed_lightbox',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_lightbox',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Lightbox', 'blossom-pin-pro' ),
				'description'	=> __( 'A lightbox is a stylized pop-up that allows your visitors to view larger versions of images without leaving the current page. You can enable or disable the lightbox here.', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Header Search */
    $wp_customize->add_setting(
        'ed_header_search',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_header_search',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Header Search', 'blossom-pin-pro' ),
				'description'	=> __( 'Enable to display search form in header.', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Sticky Header */
    $wp_customize->add_setting(
        'ed_sticky_header',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_sticky_header',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Sticky Header', 'blossom-pin-pro' ),
				'description'	=> __( 'Enable to stick header at top.', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Last Widget Sticky */
    $wp_customize->add_setting(
        'ed_last_widget_sticky',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_last_widget_sticky',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Last Widget Sticky', 'blossom-pin-pro' ),
				'description'	=> __( 'Enable to stick last widget in sidebar.', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Drop Cap */
    $wp_customize->add_setting(
        'ed_drop_cap',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_drop_cap',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Drop Cap', 'blossom-pin-pro' ),
				'description'	=> __( 'Enable to show first letter of word in post/page content in drop cap.', 'blossom-pin-pro' ),
			)
		)
	);
        
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_general_misc' );