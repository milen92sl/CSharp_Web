<?php
/**
 * Miscellaneous Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_general_misc( $wp_customize ) {
    
    /** Miscellaneous Settings */
    $wp_customize->add_section(
        'misc_settings',
        array(
            'title'    => __( 'Misc Settings', 'blossom-fashion-pro' ),
            'priority' => 85,
            'panel'    => 'general_settings',
        )
    );
    
    /** Admin Bar */
    $wp_customize->add_setting(
        'ed_adminbar',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_adminbar',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Admin Bar', 'blossom-fashion-pro' ),
				'description'	=> __( 'Disable to hide Admin Bar in frontend when logged in.', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Lightbox */
    $wp_customize->add_setting(
        'ed_lightbox',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_lightbox',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Lightbox', 'blossom-fashion-pro' ),
				'description'	=> __( 'A lightbox is a stylized pop-up that allows your visitors to view larger versions of images without leaving the current page. You can enable or disable the lightbox here.', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Header Search */
    $wp_customize->add_setting(
        'ed_header_search',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_header_search',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Header Search', 'blossom-fashion-pro' ),
				'description'	=> __( 'Enable to display search form in header.', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Sticky Header */
    $wp_customize->add_setting(
        'ed_sticky_header',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_sticky_header',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Sticky Header', 'blossom-fashion-pro' ),
				'description'	=> __( 'Enable to stick header at top.', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Last Widget Sticky */
    $wp_customize->add_setting(
        'ed_last_widget_sticky',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_last_widget_sticky',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Last Widget Sticky', 'blossom-fashion-pro' ),
				'description'	=> __( 'Enable to stick last widget in sidebar.', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Drop Cap */
    $wp_customize->add_setting(
        'ed_drop_cap',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_drop_cap',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Drop Cap', 'blossom-fashion-pro' ),
				'description'	=> __( 'Enable to show first letter of word in post/page content in drop cap.', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Author Archive Label  */
    $wp_customize->add_setting(
        'author_archive_label',
        array(
            'default'           => __( 'All Posts By', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'author_archive_label',
        array(
            'label'       => __( 'Author Archive Label', 'blossom-fashion-pro' ),
            'description' => __( 'You can change the label in author archive page header from here.', 'blossom-fashion-pro' ),
            'section'     => 'misc_settings',
            'type'        => 'text',                                 
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'author_archive_label', array(
        'selector' => '.top-section .text-holder .author-label',
        'render_callback' => 'blossom_fashion_pro_get_author_label',
    ) );
    
    /** Search Page Label  */
    $wp_customize->add_setting(
        'search_page_label',
        array(
            'default'           => __( 'You are looking for', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'search_page_label',
        array(
            'label'       => __( 'Search Page Label', 'blossom-fashion-pro' ),
            'description' => __( 'You can change the label in search page header from here.', 'blossom-fashion-pro' ),
            'section'     => 'misc_settings',
            'type'        => 'text',                                 
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'search_page_label', array(
        'selector' => '.top-section .text-holder .search-label',
        'render_callback' => 'blossom_fashion_pro_get_search_label',
    ) );
    
    /** Affiliate Widget Label  */
    $wp_customize->add_setting(
        'affiliate_widget_label',
        array(
            'default'           => __( '#Shop This Look', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'affiliate_widget_label',
        array(
            'label'       => __( 'Affiliate Widget Label', 'blossom-fashion-pro' ),
            'description' => __( 'You can change the label of affiliate widget in archive pages from here.', 'blossom-fashion-pro' ),
            'section'     => 'misc_settings',
            'type'        => 'text',                                 
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'affiliate_widget_label', array(
        'selector' => '.post-shope-holder .header .title',
        'render_callback' => 'blossom_fashion_pro_get_affiliate_header_label',
    ) );
    
    /** Search Page Sidebar layout */
    $wp_customize->add_setting( 
        'search_page_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Radio_Image_Control(
			$wp_customize,
			'search_page_sidebar_layout',
			array(
				'section'	  => 'misc_settings',
				'label'		  => __( 'Search Page Sidebar Layout', 'blossom-fashion-pro' ),
				'description' => __( 'This is sidebar layout for search page.', 'blossom-fashion-pro' ),
				'choices'	  => array(
					'left-sidebar'  => get_template_directory_uri() . '/images/2cl.png',
                    'right-sidebar' => get_template_directory_uri() . '/images/2cr.png',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_general_misc' );