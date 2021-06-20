<?php
/**
 * General Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_general( $wp_customize ){
    
    /** General Settings */
    $wp_customize->add_panel( 
        'general_settings',
         array(
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'General Settings', 'blossom-fashion-pro' ),
            'description' => __( 'Customize Slider, Featured, Social, SEO, Post/Page, Newsletter & Instagram settings.', 'blossom-fashion-pro' ),
        ) 
    );
    
    $wp_customize->get_section( 'header_image' )->panel    = 'general_settings';
    $wp_customize->get_section( 'header_image' )->title    = __( 'Banner Section', 'blossom-fashion-pro' );
    $wp_customize->get_section( 'header_image' )->priority = 10;
    $wp_customize->get_control( 'header_image' )->active_callback = 'blossom_fashion_pro_banner_ac';
    $wp_customize->get_control( 'header_video' )->active_callback = 'blossom_fashion_pro_banner_ac';
    $wp_customize->get_control( 'external_header_video' )->active_callback = 'blossom_fashion_pro_banner_ac';
    $wp_customize->get_section( 'header_image' )->description = '';                                               
    $wp_customize->get_setting( 'header_image' )->transport = 'refresh';
    $wp_customize->get_setting( 'header_video' )->transport = 'refresh';
    $wp_customize->get_setting( 'external_header_video' )->transport = 'refresh';
    
    /** Banner Options */
    $wp_customize->add_setting(
		'ed_banner_section',
		array(
			'default'			=> 'slider_banner',
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Select_Control(
    		$wp_customize,
    		'ed_banner_section',
    		array(
                'label'	      => __( 'Banner Options', 'blossom-fashion-pro' ),
                'description' => __( 'Choose banner as static image/video or as a slider.', 'blossom-fashion-pro' ),
    			'section'     => 'header_image',
    			'choices'     => array(
                    'no_banner'     => __( 'Disable Banner Section', 'blossom-fashion-pro' ),
                    'static_banner' => __( 'Static/Video Banner', 'blossom-fashion-pro' ),
                    'slider_banner' => __( 'Banner as Slider', 'blossom-fashion-pro' ),
                ),
                'priority' => 5	
     		)            
		)
	);
    
    /** Slider Content Style */
    $wp_customize->add_setting(
		'slider_type',
		array(
			'default'			=> 'latest_posts',
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Select_Control(
    		$wp_customize,
    		'slider_type',
    		array(
                'label'	  => __( 'Slider Content Style', 'blossom-fashion-pro' ),
    			'section' => 'header_image',
    			'choices' => array(
                    'latest_posts' => __( 'Latest Posts', 'blossom-fashion-pro' ),
                    'cat'          => __( 'Category', 'blossom-fashion-pro' ),
                    'pages'        => __( 'Pages', 'blossom-fashion-pro' ),
                    'custom'       => __( 'Custom', 'blossom-fashion-pro' ),
                ),
                'active_callback' => 'blossom_fashion_pro_banner_ac'	
     		)
		)
	);
    
    /** Slider Category */
    $wp_customize->add_setting(
		'slider_cat',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Select_Control(
    		$wp_customize,
    		'slider_cat',
    		array(
                'label'	          => __( 'Slider Category', 'blossom-fashion-pro' ),
    			'section'         => 'header_image',
    			'choices'         => blossom_fashion_pro_get_categories(),
                'active_callback' => 'blossom_fashion_pro_banner_ac'	
     		)
		)
	);
    
    /** No. of slides */
    $wp_customize->add_setting(
        'no_of_slides',
        array(
            'default'           => 3,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_number_absint'
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Slider_Control( 
			$wp_customize,
			'no_of_slides',
			array(
				'section'     => 'header_image',
                'label'       => __( 'Number of Slides', 'blossom-fashion-pro' ),
                'description' => __( 'Choose the number of slides you want to display', 'blossom-fashion-pro' ),
                'choices'	  => array(
					'min' 	=> 1,
					'max' 	=> 20,
					'step'	=> 1,
				),
                'active_callback' => 'blossom_fashion_pro_banner_ac'                 
			)
		)
	);
        
    /** Slider Pages */
    $wp_customize->add_setting( 
        new Blossom_Fashion_Pro_Repeater_Setting( 
            $wp_customize, 
            'slider_pages', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Blossom_Fashion_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Control_Repeater(
			$wp_customize,
			'slider_pages',
			array(
				'section' => 'header_image',				
				'label'	  => __( 'Slider Pages ', 'blossom-fashion-pro' ),
				'fields'  => array(
                    'page' => array(
                        'type'    => 'select',
                        'label'   => __( 'Select Page for slider', 'blossom-fashion-pro' ),
                        'choices' => blossom_fashion_pro_get_posts( 'page', true )
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'pages', 'blossom-fashion-pro' ),
                    'field' => 'page'
                ),
                'active_callback' => 'blossom_fashion_pro_banner_ac'                        
			)
		)
	);
    
    /** Add Slides */
    $wp_customize->add_setting( 
        new Blossom_Fashion_Pro_Repeater_Setting( 
            $wp_customize, 
            'slider_custom', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Blossom_Fashion_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),                             
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Control_Repeater(
			$wp_customize,
			'slider_custom',
			array(
				'section' => 'header_image',				
				'label'	  => __( 'Add Sliders', 'blossom-fashion-pro' ),
                'fields'  => array(
                    'thumbnail' => array(
                        'type'  => 'image', 
                        'label' => __( 'Add Image', 'blossom-fashion-pro' ),                
                    ),
                    'title'     => array(
                        'type'  => 'textarea',
                        'label' => __( 'Title', 'blossom-fashion-pro' ),
                    ),
                    'subtitle'   => array(
                        'type'  => 'text',
                        'label' => __( 'Subtitle', 'blossom-fashion-pro' ),
                    ),
                    'link'     => array(
                        'type'  => 'text',
                        'label' => __( 'Link', 'blossom-fashion-pro' ),
                    ),
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'Slide', 'blossom-fashion-pro' ),
                    'field' => 'title'
                ),
                'active_callback' => 'blossom_fashion_pro_banner_ac'                                              
			)
		)
	);

    /** Repetitive Posts */
    $wp_customize->add_setting(
        'include_repetitive_posts',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Fashion_Pro_Toggle_Control( 
            $wp_customize,
            'include_repetitive_posts',
            array(
                'section'       => 'header_image',
                'label'         => __( 'Include Repetitive Posts', 'blossom-fashion-pro' ),
                'description'   => __( 'Enable to add posts included in slider in blog page too.', 'blossom-fashion-pro' ),
                'active_callback' => 'blossom_fashion_pro_banner_ac'
            )
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
        new Blossom_Fashion_Pro_Note_Control( 
			$wp_customize,
			'hr',
			array(
				'section'	  => 'header_image',
				'description' => '<hr/>',
			)
		)
    );
    
    /** Slider Auto */
    $wp_customize->add_setting(
        'slider_auto',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'slider_auto',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Auto', 'blossom-fashion-pro' ),
                'description' => __( 'Enable slider auto transition.', 'blossom-fashion-pro' ),
                'active_callback' => 'blossom_fashion_pro_banner_ac'
			)
		)
	);
    
    /** Slider Loop */
    $wp_customize->add_setting(
        'slider_loop',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'slider_loop',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Loop', 'blossom-fashion-pro' ),
                'description' => __( 'Enable slider loop.', 'blossom-fashion-pro' ),
                'active_callback' => 'blossom_fashion_pro_banner_ac'
			)
		)
	);
    
    /** No. of slides */
    $wp_customize->add_setting(
        'slider_speed',
        array(
            'default'           => 2000,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_number_absint'
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Fashion_Pro_Slider_Control( 
            $wp_customize,
            'slider_speed',
            array(
                'section'     => 'header_image',
                'label'       => __( 'Slider Speed', 'blossom-fashion-pro' ),
                'description' => __( 'Controls the speed of slider.', 'blossom-fashion-pro' ),
                'choices'     => array(
                    'min'   => 1000,
                    'max'   => 7000,
                    'step'  => 100,
                ),
                'active_callback' => 'blossom_fashion_pro_banner_ac'                 
            )
        )
    );

    /** Slider Caption */
    $wp_customize->add_setting(
        'slider_caption',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'slider_caption',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Caption', 'blossom-fashion-pro' ),
                'description' => __( 'Enable slider caption.', 'blossom-fashion-pro' ),
                'active_callback' => 'blossom_fashion_pro_banner_ac'
			)
		)
	);
    
    /** Full Image */
    $wp_customize->add_setting(
        'slider_full_image',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'slider_full_image',
			array(
				'section'         => 'header_image',
				'label'           => __( 'Full Image', 'blossom-fashion-pro' ),
                'description'     => __( 'Enable to use full size image in slider.', 'blossom-fashion-pro' ),
                'active_callback' => 'blossom_fashion_pro_banner_ac'
			)
		)
	);
    
    /** Slider Animation */
    $wp_customize->add_setting(
		'slider_animation',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Select_Control(
    		$wp_customize,
    		'slider_animation',
    		array(
                'label'	      => __( 'Slider Animation', 'blossom-fashion-pro' ),
                'section'     => 'header_image',
    			'choices'     => array(
                    'bounceOut'      => __( 'Bounce Out', 'blossom-fashion-pro' ),
                    'bounceOutLeft'  => __( 'Bounce Out Left', 'blossom-fashion-pro' ),
                    'bounceOutRight' => __( 'Bounce Out Right', 'blossom-fashion-pro' ),
                    'bounceOutUp'    => __( 'Bounce Out Up', 'blossom-fashion-pro' ),
                    'bounceOutDown'  => __( 'Bounce Out Down', 'blossom-fashion-pro' ),
                    'fadeOut'        => __( 'Fade Out', 'blossom-fashion-pro' ),
                    'fadeOutLeft'    => __( 'Fade Out Left', 'blossom-fashion-pro' ),
                    'fadeOutRight'   => __( 'Fade Out Right', 'blossom-fashion-pro' ),
                    'fadeOutUp'      => __( 'Fade Out Up', 'blossom-fashion-pro' ),
                    'fadeOutDown'    => __( 'Fade Out Down', 'blossom-fashion-pro' ),
                    'flipOutX'       => __( 'Flip OutX', 'blossom-fashion-pro' ),
                    'flipOutY'       => __( 'Flip OutY', 'blossom-fashion-pro' ),
                    'hinge'          => __( 'Hinge', 'blossom-fashion-pro' ),
                    'pulse'          => __( 'Pulse', 'blossom-fashion-pro' ),
                    'rollOut'        => __( 'Roll Out', 'blossom-fashion-pro' ),
                    'rotateOut'      => __( 'Rotate Out', 'blossom-fashion-pro' ),
                    'rubberBand'     => __( 'Rubber Band', 'blossom-fashion-pro' ),
                    'shake'          => __( 'Shake', 'blossom-fashion-pro' ),
                    ''               => __( 'Slide', 'blossom-fashion-pro' ),
                    'slideOutLeft'   => __( 'Slide Out Left', 'blossom-fashion-pro' ),
                    'slideOutRight'  => __( 'Slide Out Right', 'blossom-fashion-pro' ),
                    'slideOutUp'     => __( 'Slide Out Up', 'blossom-fashion-pro' ),
                    'slideOutDown'   => __( 'Slide Out Down', 'blossom-fashion-pro' ),
                    'swing'          => __( 'Swing', 'blossom-fashion-pro' ),
                    'tada'           => __( 'Tada', 'blossom-fashion-pro' ),
                    'zoomOut'        => __( 'Zoom Out', 'blossom-fashion-pro' ),
                    'zoomOutLeft'    => __( 'Zoom Out Left', 'blossom-fashion-pro' ),
                    'zoomOutRight'   => __( 'Zoom Out Right', 'blossom-fashion-pro' ),
                    'zoomOutUp'      => __( 'Zoom Out Up', 'blossom-fashion-pro' ),
                    'zoomOutDown'    => __( 'Zoom Out Down', 'blossom-fashion-pro' ),                    
                ),
                'active_callback' => 'blossom_fashion_pro_banner_ac'                                	
     		)
		)
	);
    
    /** Readmore Text */
    $wp_customize->add_setting(
        'slider_readmore',
        array(
            'default'           => __( 'Continue Reading', 'blossom-fashion-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'slider_readmore',
        array(
            'type'            => 'text',
            'section'         => 'header_image',
            'label'           => __( 'Slider Readmore', 'blossom-fashion-pro' ),
            'active_callback' => 'blossom_fashion_pro_banner_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'slider_readmore', array(
        'selector' => '.banner .banner-text .btn-more',
        'render_callback' => 'blossom_fashion_pro_get_slider_readmore',
    ) );
    
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_general' );

/**
 * Active Callback
*/
function blossom_fashion_pro_banner_ac( $control ){
    $banner        = $control->manager->get_setting( 'ed_banner_section' )->value();
    $slider_type   = $control->manager->get_setting( 'slider_type' )->value();
    $slider_layout = $control->manager->get_setting( 'slider_layout' )->value();
    $control_id    = $control->id;
    
    if ( $control_id == 'header_image' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'header_video' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'external_header_video' && $banner == 'static_banner' ) return true;
    
    if ( $control_id == 'slider_type' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'include_repetitive_posts' && $banner == 'slider_banner' && ( $slider_type == 'latest_posts' || $slider_type == 'cat' ) ) return true;
    if ( $control_id == 'slider_auto' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'slider_loop' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'slider_speed' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'slider_caption' && $banner == 'slider_banner' ) return true;          
    if ( $control_id == 'slider_readmore' && $banner == 'slider_banner' && ( $slider_layout == 'two' || $slider_layout == 'three' || $slider_layout == 'four' ) ) return true;    
    if ( $control_id == 'slider_cat' && $banner == 'slider_banner' && $slider_type == 'cat' ) return true;
    if ( $control_id == 'no_of_slides' && $banner == 'slider_banner' && $slider_type == 'latest_posts' ) return true;
    if ( $control_id == 'slider_pages' && $banner == 'slider_banner' && $slider_type == 'pages' ) return true;
    if ( $control_id == 'slider_custom' && $banner == 'slider_banner' && $slider_type == 'custom' ) return true;
    if ( $control_id == 'slider_full_image' && $banner == 'slider_banner' && $slider_layout == 'one' ) return true;
    if ( $control_id == 'slider_animation' && $banner == 'slider_banner' && ( $slider_layout == 'one' || $slider_layout == 'two' || $slider_layout == 'three' || $slider_layout == 'four' || $slider_layout == 'seven' ) ) return true;
    
    return false;
}