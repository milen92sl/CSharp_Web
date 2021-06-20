<?php
/**
 * Banner Section
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_frontpage_banner( $wp_customize ) {
	
    $wp_customize->get_section( 'header_image' )->panel                    = 'frontpage_settings';
    $wp_customize->get_section( 'header_image' )->title                    = __( 'Banner Section', 'blossom-spa-pro' );
    $wp_customize->get_section( 'header_image' )->priority                 = 10;
    $wp_customize->get_control( 'header_image' )->active_callback          = 'blossom_spa_pro_banner_ac';
    $wp_customize->get_control( 'header_video' )->active_callback          = 'blossom_spa_pro_banner_ac';
    $wp_customize->get_control( 'external_header_video' )->active_callback = 'blossom_spa_pro_banner_ac';
    $wp_customize->get_section( 'header_image' )->description              = '';                                               
    $wp_customize->get_setting( 'header_image' )->transport                = 'refresh';
    $wp_customize->get_setting( 'header_video' )->transport                = 'refresh';
    $wp_customize->get_setting( 'external_header_video' )->transport       = 'refresh';
    
    /** Banner Options */
    $wp_customize->add_setting(
		'ed_banner_section',
		array(
			'default'			=> 'slider_banner',
			'sanitize_callback' => 'blossom_spa_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Spa_Pro_Select_Control(
    		$wp_customize,
    		'ed_banner_section',
    		array(
                'label'	      => __( 'Banner Options', 'blossom-spa-pro' ),
                'description' => __( 'Choose banner as static image/video or as a slider.', 'blossom-spa-pro' ),
    			'section'     => 'header_image',
    			'choices'     => array(
                    'no_banner'        => __( 'Disable Banner Section', 'blossom-spa-pro' ),
                    'static_banner'    => __( 'Static/Video CTA Banner', 'blossom-spa-pro' ),
                    'static_nl_banner' => __( 'Static/Video Newsletter Banner', 'blossom-spa-pro' ),
                    'slider_banner'    => __( 'Banner as Slider', 'blossom-spa-pro' ),
                ),
                'priority' => 5	
     		)            
		)
	);
    
    /** Title */
    $wp_customize->add_setting(
        'banner_title',
        array(
            'default'           => __( 'Relaxing Is Never Easy On Your Own', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_title',
        array(
            'label'           => __( 'Title', 'blossom-spa-pro' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_banner_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'banner_title', array(
        'selector' => '.site-banner .banner-caption-inner h2.title',
        'render_callback' => 'blossom_spa_pro_get_banner_title',
    ) );
    
    /** Sub Title */
    $wp_customize->add_setting(
        'banner_subtitle',
        array(
            'default'           => __( 'Come and discover your oasis. It has never been easier to take a break from stress and the harmful factors that surround you every day!', 'blossom-spa-pro' ),
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_subtitle',
        array(
            'label'           => __( 'Sub Title', 'blossom-spa-pro' ),
            'section'         => 'header_image',
            'type'            => 'textarea',
            'active_callback' => 'blossom_spa_pro_banner_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'banner_subtitle', array(
        'selector' => '.site-banner .banner-caption-inner .description',
        'render_callback' => 'blossom_spa_pro_get_banner_sub_title',
    ) );
        
    /** Banner Newsletter */
    $wp_customize->add_setting(
        'banner_newsletter',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'banner_newsletter',
        array(
            'label'           => __( 'Banner Newsletter', 'blossom-spa-pro' ),
            'description'     => __( 'Enter the shortcode for Newsletter', 'blossom-spa-pro' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_banner_ac'
        )
    );
    
    /** Slider Content Style */
    $wp_customize->add_setting(
		'slider_type',
		array(
			'default'			=> 'latest_posts',
			'sanitize_callback' => 'blossom_spa_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Spa_Pro_Select_Control(
    		$wp_customize,
    		'slider_type',
    		array(
                'label'	  => __( 'Slider Content Style', 'blossom-spa-pro' ),
    			'section' => 'header_image',
    			'choices' => array(
                    'latest_posts' => __( 'Latest Posts', 'blossom-spa-pro' ),
                    'cat'          => __( 'Category', 'blossom-spa-pro' ),
                    'pages'        => __( 'Pages', 'blossom-spa-pro' ),
                    'custom'       => __( 'Custom', 'blossom-spa-pro' ),
                ),
                'active_callback' => 'blossom_spa_pro_banner_ac'	
     		)
		)
	);
    
    /** Slider Category */
    $wp_customize->add_setting(
		'slider_cat',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_spa_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Spa_Pro_Select_Control(
    		$wp_customize,
    		'slider_cat',
    		array(
                'label'	          => __( 'Slider Category', 'blossom-spa-pro' ),
    			'section'         => 'header_image',
    			'choices'         => blossom_spa_pro_get_categories(),
                'active_callback' => 'blossom_spa_pro_banner_ac'	
     		)
		)
	);
    
    /** No. of slides */
    $wp_customize->add_setting(
        'no_of_slides',
        array(
            'default'           => 3,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_number_absint'
        )
    );

    $wp_customize->add_control(
        new Blossom_Spa_Pro_Slider_Control( 
            $wp_customize,
            'no_of_slides',
            array(
                'section'     => 'header_image',
                'label'       => __( 'Number of Slides', 'blossom-spa-pro' ),
                'description' => __( 'Choose the number of slides you want to display', 'blossom-spa-pro' ),
                'choices'     => array(
                    'min'   => 1,
                    'max'   => 20,
                    'step'  => 1,
                ),
                'active_callback' => 'blossom_spa_pro_banner_ac'                 
            )
        )
    );
        
    /** Slider Pages */
    $wp_customize->add_setting( 
        new Blossom_Spa_Pro_Repeater_Setting( 
            $wp_customize, 
            'slider_pages', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Blossom_Spa_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Control_Repeater(
			$wp_customize,
			'slider_pages',
			array(
				'section' => 'header_image',				
				'label'	  => __( 'Slider Pages ', 'blossom-spa-pro' ),
				'fields'  => array(
                    'page' => array(
                        'type'    => 'select',
                        'label'   => __( 'Select Page for slider', 'blossom-spa-pro' ),
                        'choices' => blossom_spa_pro_get_posts( 'page', true )
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'pages', 'blossom-spa-pro' ),
                    'field' => 'page'
                ),
                'active_callback' => 'blossom_spa_pro_banner_ac'                        
			)
		)
	);
    
    /** Add Slides */
    $wp_customize->add_setting( 
        new Blossom_Spa_Pro_Repeater_Setting( 
            $wp_customize, 
            'slider_custom', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Blossom_Spa_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),                             
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Control_Repeater(
			$wp_customize,
			'slider_custom',
			array(
				'section' => 'header_image',				
				'label'	  => __( 'Add Sliders', 'blossom-spa-pro' ),
                'fields'  => array(
                    'thumbnail' => array(
                        'type'  => 'image', 
                        'label' => __( 'Add Image', 'blossom-spa-pro' ),                
                    ),
                    'title'     => array(
                        'type'  => 'textarea',
                        'label' => __( 'Title', 'blossom-spa-pro' ),
                    ),
                    'subtitle'   => array(
                        'type'  => 'text',
                        'label' => __( 'Subtitle', 'blossom-spa-pro' ),
                    ),
                    'link'     => array(
                        'type'  => 'text',
                        'label' => __( 'Link', 'blossom-spa-pro' ),
                    ),
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'Slide', 'blossom-spa-pro' ),
                    'field' => 'title'
                ),
                'active_callback' => 'blossom_spa_pro_banner_ac'                                              
			)
		)
	);

    /** Repetitive Posts */
    $wp_customize->add_setting(
        'include_repetitive_posts',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Toggle_Control( 
            $wp_customize,
            'include_repetitive_posts',
            array(
                'section'       => 'header_image',
                'label'         => __( 'Include Repetitive Posts', 'blossom-spa-pro' ),
                'description'   => __( 'Enable to add posts included in slider in blog page too.', 'blossom-spa-pro' ),
                'active_callback' => 'blossom_spa_pro_banner_ac'
            )
        )
    );
    
    $wp_customize->add_setting( 
        'banner_caption_layout', 
        array(
            'default'           => 'center',
            'sanitize_callback' => 'blossom_spa_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Radio_Buttonset_Control(
            $wp_customize,
            'banner_caption_layout',
            array(
                'section'     => 'header_image',
                'label'       => __( 'Banner Caption Layout', 'blossom-spa-pro' ),
                'description' => __( 'Choose layout for banner caption.', 'blossom-spa-pro' ),
                'choices'     => array(
                    'left'      => __( 'Left', 'blossom-spa-pro' ),
                    'center'    => __( 'Center', 'blossom-spa-pro' ),
                    'right'     => __( 'Right', 'blossom-spa-pro' ),
                ),
                'active_callback' => 'blossom_spa_pro_banner_ac' 
            )
        )
    );

    /** Banner Label */
    $wp_customize->add_setting(
        'banner_cta1',
        array(
            'default'           => __( 'View Services', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_cta1',
        array(
            'label'           => __( 'Banner Button One Label', 'blossom-spa-pro' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_banner_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'banner_cta1', array(
        'selector' => '.site-banner .banner-caption-inner .btn-wrap .btn-transparent span',
        'render_callback' => 'blossom_spa_pro_get_banner_cta_one',
    ) );

    /** Banner Link */
    $wp_customize->add_setting(
        'banner_cta1_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'banner_cta1_url',
        array(
            'label'           => __( 'Banner Button One Link', 'blossom-spa-pro' ),
            'section'         => 'header_image',
            'type'            => 'url',
            'active_callback' => 'blossom_spa_pro_banner_ac'
        )
    );

    /** Banner Label */
    $wp_customize->add_setting(
        'banner_cta2',
        array(
            'default'           => __( 'Book Now', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_cta2',
        array(
            'label'           => __( 'Banner Button Two Label', 'blossom-spa-pro' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_cta2', array(
        'selector' => '.site-banner .banner-caption-inner .btn-wrap .btn-green span',
        'render_callback' => 'blossom_spa_pro_get_banner_cta_two',
    ) );
    
    /** Banner Link */
    $wp_customize->add_setting(
        'banner_cta2_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'banner_cta2_url',
        array(
            'label'           => __( 'Banner Button Two Link', 'blossom-spa-pro' ),
            'section'         => 'header_image',
            'type'            => 'url',
            'active_callback' => 'blossom_spa_pro_banner_ac'
        )
    );


    /** HR */
    $wp_customize->add_setting(
        'hr',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Note_Control( 
			$wp_customize,
			'hr',
			array(
				'section'	  => 'header_image',
				'description' => '<hr/>',
                'active_callback' => 'blossom_spa_pro_banner_ac'
			)
		)
    ); 
    
    /** Slider Auto */
    $wp_customize->add_setting(
        'slider_auto',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'slider_auto',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Auto', 'blossom-spa-pro' ),
                'description' => __( 'Enable slider auto transition.', 'blossom-spa-pro' ),
                'active_callback' => 'blossom_spa_pro_banner_ac'
			)
		)
	);
    
    /** Slider Loop */
    $wp_customize->add_setting(
        'slider_loop',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'slider_loop',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Loop', 'blossom-spa-pro' ),
                'description' => __( 'Enable slider loop.', 'blossom-spa-pro' ),
                'active_callback' => 'blossom_spa_pro_banner_ac'
			)
		)
	);
    
    /** Slider Caption */
    $wp_customize->add_setting(
        'slider_caption',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'slider_caption',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Caption', 'blossom-spa-pro' ),
                'description' => __( 'Enable slider caption.', 'blossom-spa-pro' ),
                'active_callback' => 'blossom_spa_pro_banner_ac'
			)
		)
	);
    
    /** Full Image */
    $wp_customize->add_setting(
        'slider_full_image',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'slider_full_image',
			array(
				'section'         => 'header_image',
				'label'           => __( 'Full Image', 'blossom-spa-pro' ),
                'description'     => __( 'Enable to use full size image in slider.', 'blossom-spa-pro' ),
                'active_callback' => 'blossom_spa_pro_banner_ac'
			)
		)
	);
    
    /** Slider Animation */
    $wp_customize->add_setting(
		'slider_animation',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_spa_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Spa_Pro_Select_Control(
    		$wp_customize,
    		'slider_animation',
    		array(
                'label'	      => __( 'Slider Animation', 'blossom-spa-pro' ),
                'section'     => 'header_image',
    			'choices'     => array(
                    'bounceOut'      => __( 'Bounce Out', 'blossom-spa-pro' ),
                    'bounceOutLeft'  => __( 'Bounce Out Left', 'blossom-spa-pro' ),
                    'bounceOutRight' => __( 'Bounce Out Right', 'blossom-spa-pro' ),
                    'bounceOutUp'    => __( 'Bounce Out Up', 'blossom-spa-pro' ),
                    'bounceOutDown'  => __( 'Bounce Out Down', 'blossom-spa-pro' ),
                    'fadeOut'        => __( 'Fade Out', 'blossom-spa-pro' ),
                    'fadeOutLeft'    => __( 'Fade Out Left', 'blossom-spa-pro' ),
                    'fadeOutRight'   => __( 'Fade Out Right', 'blossom-spa-pro' ),
                    'fadeOutUp'      => __( 'Fade Out Up', 'blossom-spa-pro' ),
                    'fadeOutDown'    => __( 'Fade Out Down', 'blossom-spa-pro' ),
                    'flipOutX'       => __( 'Flip OutX', 'blossom-spa-pro' ),
                    'flipOutY'       => __( 'Flip OutY', 'blossom-spa-pro' ),
                    'hinge'          => __( 'Hinge', 'blossom-spa-pro' ),
                    'pulse'          => __( 'Pulse', 'blossom-spa-pro' ),
                    'rollOut'        => __( 'Roll Out', 'blossom-spa-pro' ),
                    'rotateOut'      => __( 'Rotate Out', 'blossom-spa-pro' ),
                    'rubberBand'     => __( 'Rubber Band', 'blossom-spa-pro' ),
                    'shake'          => __( 'Shake', 'blossom-spa-pro' ),
                    ''               => __( 'Slide', 'blossom-spa-pro' ),
                    'slideOutLeft'   => __( 'Slide Out Left', 'blossom-spa-pro' ),
                    'slideOutRight'  => __( 'Slide Out Right', 'blossom-spa-pro' ),
                    'slideOutUp'     => __( 'Slide Out Up', 'blossom-spa-pro' ),
                    'slideOutDown'   => __( 'Slide Out Down', 'blossom-spa-pro' ),
                    'swing'          => __( 'Swing', 'blossom-spa-pro' ),
                    'tada'           => __( 'Tada', 'blossom-spa-pro' ),
                    'zoomOut'        => __( 'Zoom Out', 'blossom-spa-pro' ),
                    'zoomOutLeft'    => __( 'Zoom Out Left', 'blossom-spa-pro' ),
                    'zoomOutRight'   => __( 'Zoom Out Right', 'blossom-spa-pro' ),
                    'zoomOutUp'      => __( 'Zoom Out Up', 'blossom-spa-pro' ),
                    'zoomOutDown'    => __( 'Zoom Out Down', 'blossom-spa-pro' ),                    
                ),
                'active_callback' => 'blossom_spa_pro_banner_ac'                                	
     		)
		)
	);

    /** Slider Settings Ends */  
      
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_frontpage_banner' );