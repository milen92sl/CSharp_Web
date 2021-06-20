<?php
/**
 * General Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_general( $wp_customize ){
    
    /** General Settings */
    $wp_customize->add_panel( 
        'general_settings',
         array(
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'General Settings', 'blossom-pin-pro' ),
            'description' => __( 'Customize Banner, Featured, Social, Sharing, SEO, Post/Page, Newsletter & Instagram, Shop, Performance and Miscellaneous settings.', 'blossom-pin-pro' ),
        ) 
    );
    
    $wp_customize->get_section( 'header_image' )->panel                    = 'general_settings';
    $wp_customize->get_section( 'header_image' )->title                    = __( 'Banner Section', 'blossom-pin-pro' );
    $wp_customize->get_section( 'header_image' )->priority                 = 10;
    $wp_customize->get_control( 'header_image' )->active_callback          = 'blossom_pin_pro_banner_ac';
    $wp_customize->get_control( 'header_video' )->active_callback          = 'blossom_pin_pro_banner_ac';
    $wp_customize->get_control( 'external_header_video' )->active_callback = 'blossom_pin_pro_banner_ac';
    $wp_customize->get_section( 'header_image' )->description              = '';                                               
    $wp_customize->get_setting( 'header_image' )->transport                = 'refresh';
    $wp_customize->get_setting( 'header_video' )->transport                = 'refresh';
    $wp_customize->get_setting( 'external_header_video' )->transport       = 'refresh';
    
    /** Banner Options */
    $wp_customize->add_setting(
		'ed_banner_section',
		array(
			'default'			=> 'slider_banner',
			'sanitize_callback' => 'blossom_pin_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Pin_Pro_Select_Control(
    		$wp_customize,
    		'ed_banner_section',
    		array(
                'label'	      => __( 'Banner Options', 'blossom-pin-pro' ),
                'description' => __( 'Choose banner as static image/video or as a slider.', 'blossom-pin-pro' ),
    			'section'     => 'header_image',
    			'choices'     => array(
                    'no_banner'     => __( 'Disable Banner Section', 'blossom-pin-pro' ),
                    'static_banner' => __( 'Static/Video Banner', 'blossom-pin-pro' ),
                    'slider_banner' => __( 'Banner as Slider', 'blossom-pin-pro' ),
                ),
                'priority' => 5	
     		)            
		)
	);

    /** Title */
    $wp_customize->add_setting(
        'banner_title',
        array(
            'default' => __( 'Wondering how your peers are using social media?', 'blossom-pin-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'banner_title',
        array(
            'label' => __( 'Title', 'blossom-pin-pro' ),
            'section' => 'header_image',
            'type' => 'text',
            'active_callback' => 'blossom_pin_pro_banner_ac',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_title', array(
        'selector' => '.banner .banner-caption .banner-wrap .banner-title',
        'render_callback' => 'blossom_pin_pro_get_banner_title',
    ));

    /** Sub Title */
    $wp_customize->add_setting(
        'banner_subtitle',
        array(
            'default' => __( 'Discover how people in the community looks create pins to get their attention?', 'blossom-pin-pro' ),
            'sanitize_callback' => 'wp_kses_post',
            'transport' => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'banner_subtitle',
        array(
            'label' => __( 'Sub Title', 'blossom-pin-pro' ),
            'section' => 'header_image',
            'type' => 'textarea',
            'active_callback' => 'blossom_pin_pro_banner_ac',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_subtitle', array(
        'selector' => '.banner .banner-caption .banner-wrap .b-content',
        'render_callback' => 'blossom_pin_pro_get_banner_sub_title',
    ));

    /** Banner Label */
    $wp_customize->add_setting(
        'banner_label',
        array(
            'default' => __( 'Discover More', 'blossom-pin-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'banner_label',
        array(
            'label' => __( 'Banner Label', 'blossom-pin-pro' ),
            'section' => 'header_image',
            'type' => 'text',
            'active_callback' => 'blossom_pin_pro_banner_ac',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_label', array(
        'selector' => '.banner .banner-caption .banner-wrap .banner-link',
        'render_callback' => 'blossom_pin_pro_get_banner_label',
    ));

    /** Banner Link */
    $wp_customize->add_setting(
        'banner_link',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'banner_link',
        array(
            'label' => __( 'Banner Link', 'blossom-pin-pro' ),
            'section' => 'header_image',
            'type' => 'text',
            'active_callback' => 'blossom_pin_pro_banner_ac',
        )
    );
    
    /** Slider Content Style */
    $wp_customize->add_setting(
		'slider_type',
		array(
			'default'			=> 'latest_posts',
			'sanitize_callback' => 'blossom_pin_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Pin_Pro_Select_Control(
    		$wp_customize,
    		'slider_type',
    		array(
                'label'	  => __( 'Slider Content Style', 'blossom-pin-pro' ),
    			'section' => 'header_image',
    			'choices' => array(
                    'latest_posts' => __( 'Latest Posts', 'blossom-pin-pro' ),
                    'cat'          => __( 'Category', 'blossom-pin-pro' ),
                    'pages'        => __( 'Pages', 'blossom-pin-pro' ),
                    'custom'       => __( 'Custom', 'blossom-pin-pro' ),
                ),
                'active_callback' => 'blossom_pin_pro_banner_ac'	
     		)
		)
	);
    
    /** Slider Category */
    $wp_customize->add_setting(
		'slider_cat',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_pin_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Pin_Pro_Select_Control(
    		$wp_customize,
    		'slider_cat',
    		array(
                'label'	          => __( 'Slider Category', 'blossom-pin-pro' ),
    			'section'         => 'header_image',
    			'choices'         => blossom_pin_pro_get_categories(),
                'active_callback' => 'blossom_pin_pro_banner_ac'	
     		)
		)
	);
    
    /** No. of slides */
    $wp_customize->add_setting(
        'no_of_slides',
        array(
            'default'           => 6,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_number_absint'
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Slider_Control( 
			$wp_customize,
			'no_of_slides',
			array(
				'section'     => 'header_image',
                'label'       => __( 'Number of Slides', 'blossom-pin-pro' ),
                'description' => __( 'Choose the number of slides you want to display', 'blossom-pin-pro' ),
                'choices'	  => array(
					'min' 	=> 1,
					'max' 	=> 20,
					'step'	=> 1,
				),
                'active_callback' => 'blossom_pin_pro_banner_ac'                 
			)
		)
	);
    
    $wp_customize->add_setting(
        'number_of_slides_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Note_Control( 
            $wp_customize,
            'number_of_slides_text',
            array(
                'section'     => 'header_image',
                'description' => __( 'Please set number of slides in multiple of 3 for this layout.', 'blossom-pin-pro' ),
                'active_callback' => 'blossom_pin_pro_banner_ac' 
            )
        )
    );

    /** Slider Pages */
    $wp_customize->add_setting( 
        new Blossom_Pin_Pro_Repeater_Setting( 
            $wp_customize, 
            'slider_pages', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Blossom_Pin_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Control_Repeater(
			$wp_customize,
			'slider_pages',
			array(
				'section' => 'header_image',				
				'label'	  => __( 'Slider Pages ', 'blossom-pin-pro' ),
				'fields'  => array(
                    'page' => array(
                        'type'    => 'select',
                        'label'   => __( 'Select Page for slider', 'blossom-pin-pro' ),
                        'choices' => blossom_pin_pro_get_posts( 'page', true )
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'pages', 'blossom-pin-pro' ),
                    'field' => 'page'
                ),
                'active_callback' => 'blossom_pin_pro_banner_ac'                        
			)
		)
	);
    
    /** Add Slides */
    $wp_customize->add_setting( 
        new Blossom_Pin_Pro_Repeater_Setting( 
            $wp_customize, 
            'slider_custom', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Blossom_Pin_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),                             
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Control_Repeater(
			$wp_customize,
			'slider_custom',
			array(
				'section' => 'header_image',				
				'label'	  => __( 'Add Sliders', 'blossom-pin-pro' ),
                'fields'  => array(
                    'thumbnail' => array(
                        'type'  => 'image', 
                        'label' => __( 'Add Image', 'blossom-pin-pro' ),                
                    ),
                    'title'     => array(
                        'type'  => 'textarea',
                        'label' => __( 'Title', 'blossom-pin-pro' ),
                    ),
                    'subtitle'   => array(
                        'type'  => 'text',
                        'label' => __( 'Subtitle', 'blossom-pin-pro' ),
                    ),
                    'link'     => array(
                        'type'  => 'text',
                        'label' => __( 'Link', 'blossom-pin-pro' ),
                    ),
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'Slide', 'blossom-pin-pro' ),
                    'field' => 'title'
                ),
                'active_callback' => 'blossom_pin_pro_banner_ac'                                              
			)
		)
	);
    
    /** HR */
    $wp_customize->add_setting(
        'banner_hr',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Note_Control( 
			$wp_customize,
			'banner_hr',
			array(
				'section'	  => 'header_image',
				'description' => '<hr/>',
                'active_callback' => 'blossom_pin_pro_banner_ac'
			)
		)
    );
    
    /** Slider Auto */
    $wp_customize->add_setting(
        'slider_auto',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'slider_auto',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Auto', 'blossom-pin-pro' ),
                'description' => __( 'Enable slider auto transition.', 'blossom-pin-pro' ),
                'active_callback' => 'blossom_pin_pro_banner_ac'
			)
		)
	);
    
    /** Slider Loop */
    $wp_customize->add_setting(
        'slider_loop',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Toggle_Control( 
            $wp_customize,
            'slider_loop',
            array(
                'section'     => 'header_image',
                'label'       => __( 'Slider Loop', 'blossom-pin-pro' ),
                'description' => __( 'Enable slider loop.', 'blossom-pin-pro' ),
                'active_callback' => 'blossom_pin_pro_banner_ac'
            )
        )
    );

    /** No. of slides */
    $wp_customize->add_setting(
        'slider_speed',
        array(
            'default'           => 2000,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_number_absint'
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Slider_Control( 
            $wp_customize,
            'slider_speed',
            array(
                'section'     => 'header_image',
                'label'       => __( 'Slider Speed', 'blossom-pin-pro' ),
                'description' => __( 'Controls the speed of slider.', 'blossom-pin-pro' ),
                'choices'     => array(
                    'min'   => 1000,
                    'max'   => 7000,
                    'step'  => 100,
                ),
                'active_callback' => 'blossom_pin_pro_banner_ac'                 
            )
        )
    );
    
    /** Slider Caption */
    $wp_customize->add_setting(
        'slider_caption',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'slider_caption',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Caption', 'blossom-pin-pro' ),
                'description' => __( 'Enable slider caption.', 'blossom-pin-pro' ),
                'active_callback' => 'blossom_pin_pro_banner_ac'
			)
		)
	);
    
    /** Full Image */
    $wp_customize->add_setting(
        'slider_full_image',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'slider_full_image',
			array(
				'section'         => 'header_image',
				'label'           => __( 'Full Image', 'blossom-pin-pro' ),
                'description'     => __( 'Enable to use full size image in slider.', 'blossom-pin-pro' ),
                'active_callback' => 'blossom_pin_pro_banner_ac'
			)
		)
	);
    
    /** Slider Animation */
    $wp_customize->add_setting(
		'slider_animation',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_pin_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Pin_Pro_Select_Control(
    		$wp_customize,
    		'slider_animation',
    		array(
                'label'	      => __( 'Slider Animation', 'blossom-pin-pro' ),
                'section'     => 'header_image',
    			'choices'     => array(
                    'bounceOut'      => __( 'Bounce Out', 'blossom-pin-pro' ),
                    'bounceOutLeft'  => __( 'Bounce Out Left', 'blossom-pin-pro' ),
                    'bounceOutRight' => __( 'Bounce Out Right', 'blossom-pin-pro' ),
                    'bounceOutUp'    => __( 'Bounce Out Up', 'blossom-pin-pro' ),
                    'bounceOutDown'  => __( 'Bounce Out Down', 'blossom-pin-pro' ),
                    'fadeOut'        => __( 'Fade Out', 'blossom-pin-pro' ),
                    'fadeOutLeft'    => __( 'Fade Out Left', 'blossom-pin-pro' ),
                    'fadeOutRight'   => __( 'Fade Out Right', 'blossom-pin-pro' ),
                    'fadeOutUp'      => __( 'Fade Out Up', 'blossom-pin-pro' ),
                    'fadeOutDown'    => __( 'Fade Out Down', 'blossom-pin-pro' ),
                    'flipOutX'       => __( 'Flip OutX', 'blossom-pin-pro' ),
                    'flipOutY'       => __( 'Flip OutY', 'blossom-pin-pro' ),
                    'hinge'          => __( 'Hinge', 'blossom-pin-pro' ),
                    'pulse'          => __( 'Pulse', 'blossom-pin-pro' ),
                    'rollOut'        => __( 'Roll Out', 'blossom-pin-pro' ),
                    'rotateOut'      => __( 'Rotate Out', 'blossom-pin-pro' ),
                    'rubberBand'     => __( 'Rubber Band', 'blossom-pin-pro' ),
                    'shake'          => __( 'Shake', 'blossom-pin-pro' ),
                    ''               => __( 'Slide', 'blossom-pin-pro' ),
                    'slideOutLeft'   => __( 'Slide Out Left', 'blossom-pin-pro' ),
                    'slideOutRight'  => __( 'Slide Out Right', 'blossom-pin-pro' ),
                    'slideOutUp'     => __( 'Slide Out Up', 'blossom-pin-pro' ),
                    'slideOutDown'   => __( 'Slide Out Down', 'blossom-pin-pro' ),
                    'swing'          => __( 'Swing', 'blossom-pin-pro' ),
                    'tada'           => __( 'Tada', 'blossom-pin-pro' ),
                    'zoomOut'        => __( 'Zoom Out', 'blossom-pin-pro' ),
                    'zoomOutLeft'    => __( 'Zoom Out Left', 'blossom-pin-pro' ),
                    'zoomOutRight'   => __( 'Zoom Out Right', 'blossom-pin-pro' ),
                    'zoomOutUp'      => __( 'Zoom Out Up', 'blossom-pin-pro' ),
                    'zoomOutDown'    => __( 'Zoom Out Down', 'blossom-pin-pro' ),                    
                ),
                'active_callback' => 'blossom_pin_pro_banner_ac'                                	
     		)
		)
	);
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_general' );