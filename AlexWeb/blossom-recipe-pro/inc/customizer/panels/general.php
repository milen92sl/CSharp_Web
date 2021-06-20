<?php
/**
 * General Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_general( $wp_customize ){
    
    /** General Settings */
    $wp_customize->add_panel( 
        'general_settings',
         array(
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'General Settings', 'blossom-recipe-pro' ),
            'description' => __( 'Customize Banner, Featured, Social, Sharing, SEO, Post/Page, Newsletter & Instagram, Shop, Performance and Miscellaneous settings.', 'blossom-recipe-pro' ),
        ) 
    );
    
    $wp_customize->get_section( 'header_image' )->panel                    = 'general_settings';
    $wp_customize->get_section( 'header_image' )->title                    = __( 'Banner Section', 'blossom-recipe-pro' );
    $wp_customize->get_section( 'header_image' )->priority                 = 10;
    $wp_customize->get_control( 'header_image' )->active_callback          = 'blossom_recipe_pro_banner_ac';
    $wp_customize->get_control( 'header_video' )->active_callback          = 'blossom_recipe_pro_banner_ac';
    $wp_customize->get_control( 'external_header_video' )->active_callback = 'blossom_recipe_pro_banner_ac';
    $wp_customize->get_section( 'header_image' )->description              = '';                                               
    $wp_customize->get_setting( 'header_image' )->transport                = 'refresh';
    $wp_customize->get_setting( 'header_video' )->transport                = 'refresh';
    $wp_customize->get_setting( 'external_header_video' )->transport       = 'refresh';
    
    /** Banner Options */
    $wp_customize->add_setting(
		'ed_banner_section',
		array(
			'default'			=> 'slider_banner',
			'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Recipe_Pro_Select_Control(
    		$wp_customize,
    		'ed_banner_section',
    		array(
                'label'	      => __( 'Banner Options', 'blossom-recipe-pro' ),
                'description' => __( 'Choose banner as static image/video or as a slider.', 'blossom-recipe-pro' ),
    			'section'     => 'header_image',
    			'choices'     => array(
                    'no_banner'     => __( 'Disable Banner Section', 'blossom-recipe-pro' ),
                    'static_banner' => __( 'Static/Video Banner', 'blossom-recipe-pro' ),
                    'slider_banner' => __( 'Banner as Slider', 'blossom-recipe-pro' ),
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
			'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Recipe_Pro_Select_Control(
    		$wp_customize,
    		'slider_type',
    		array(
                'label'	  => __( 'Slider Content Style', 'blossom-recipe-pro' ),
    			'section' => 'header_image',
    			'choices' => blossom_recipe_pro_slider_options(),
                'active_callback' => 'blossom_recipe_pro_banner_ac'	
     		)
		)
	);
    
    /** Slider Category */
    $wp_customize->add_setting(
		'slider_cat',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Recipe_Pro_Select_Control(
    		$wp_customize,
    		'slider_cat',
    		array(
                'label'	          => __( 'Slider Category', 'blossom-recipe-pro' ),
    			'section'         => 'header_image',
    			'choices'         => blossom_recipe_pro_get_categories(),
                'active_callback' => 'blossom_recipe_pro_banner_ac'	
     		)
		)
	);

    if ( is_brm_activated() ) {
        /** Slider Category */
        $wp_customize->add_setting(
            'slider_recipe_cat',
            array(
                'default'           => '',
                'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
            )
        );

        $wp_customize->add_control(
            new Blossom_Recipe_Pro_Select_Control(
                $wp_customize,
                'slider_recipe_cat',
                array(
                    'label'           => __( 'Slider Recipe Category', 'blossom-recipe-pro' ),
                    'section'         => 'header_image',
                    'choices'         => blossom_recipe_pro_get_categories( true, 'recipe-category' ),
                    'active_callback' => 'blossom_recipe_pro_banner_ac', 
                )
            )
        );
    }
    
    /** No. of slides */
    $wp_customize->add_setting(
        'no_of_slides',
        array(
            'default'           => 5,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_number_absint'
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Slider_Control( 
			$wp_customize,
			'no_of_slides',
			array(
				'section'     => 'header_image',
                'label'       => __( 'Number of Slides', 'blossom-recipe-pro' ),
                'description' => __( 'Choose the number of slides you want to display', 'blossom-recipe-pro' ),
                'choices'	  => array(
					'min' 	=> 1,
					'max' 	=> 20,
					'step'	=> 1,
				),
                'active_callback' => 'blossom_recipe_pro_banner_ac'                 
			)
		)
	);
        
    /** Slider Pages */
    $wp_customize->add_setting( 
        new Blossom_Recipe_Pro_Repeater_Setting( 
            $wp_customize, 
            'slider_pages', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Blossom_Recipe_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Control_Repeater(
			$wp_customize,
			'slider_pages',
			array(
				'section' => 'header_image',				
				'label'	  => __( 'Slider Pages ', 'blossom-recipe-pro' ),
				'fields'  => array(
                    'page' => array(
                        'type'    => 'select',
                        'label'   => __( 'Select Page for slider', 'blossom-recipe-pro' ),
                        'choices' => blossom_recipe_pro_get_posts( 'page', true )
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'pages', 'blossom-recipe-pro' ),
                    'field' => 'page'
                ),
                'active_callback' => 'blossom_recipe_pro_banner_ac'                        
			)
		)
	);
    
    /** Add Slides */
    $wp_customize->add_setting( 
        new Blossom_Recipe_Pro_Repeater_Setting( 
            $wp_customize, 
            'slider_custom', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Blossom_Recipe_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),                             
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Control_Repeater(
			$wp_customize,
			'slider_custom',
			array(
				'section' => 'header_image',				
				'label'	  => __( 'Add Sliders', 'blossom-recipe-pro' ),
                'fields'  => array(
                    'thumbnail' => array(
                        'type'  => 'image', 
                        'label' => __( 'Add Image', 'blossom-recipe-pro' ),                
                    ),
                    'title'     => array(
                        'type'  => 'textarea',
                        'label' => __( 'Title', 'blossom-recipe-pro' ),
                    ),
                    'subtitle'   => array(
                        'type'  => 'text',
                        'label' => __( 'Subtitle', 'blossom-recipe-pro' ),
                    ),
                    'link'     => array(
                        'type'  => 'text',
                        'label' => __( 'Link', 'blossom-recipe-pro' ),
                    ),
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'Slide', 'blossom-recipe-pro' ),
                    'field' => 'title'
                ),
                'active_callback' => 'blossom_recipe_pro_banner_ac'                                              
			)
		)
	);

    /** Repetitive Posts */
    $wp_customize->add_setting(
        'include_repetitive_posts',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Recipe_Pro_Toggle_Control( 
            $wp_customize,
            'include_repetitive_posts',
            array(
                'section'       => 'header_image',
                'label'         => __( 'Include Repetitive Posts', 'blossom-recipe-pro' ),
                'description'   => __( 'Enable to add posts included in slider in blog page too.', 'blossom-recipe-pro' ),
                'active_callback' => 'blossom_recipe_pro_banner_ac'
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
        new Blossom_Recipe_Pro_Note_Control( 
			$wp_customize,
			'banner_hr',
			array(
				'section'	  => 'header_image',
				'description' => '<hr/>',
                'active_callback' => 'blossom_recipe_pro_banner_ac'
			)
		)
    );
    
    /** Slider Auto */
    $wp_customize->add_setting(
        'slider_auto',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'slider_auto',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Auto', 'blossom-recipe-pro' ),
                'description' => __( 'Enable slider auto transition.', 'blossom-recipe-pro' ),
                'active_callback' => 'blossom_recipe_pro_banner_ac'
			)
		)
	);
    
    /** Slider Loop */
    $wp_customize->add_setting(
        'slider_loop',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'slider_loop',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Loop', 'blossom-recipe-pro' ),
                'description' => __( 'Enable slider loop.', 'blossom-recipe-pro' ),
                'active_callback' => 'blossom_recipe_pro_banner_ac'
			)
		)
	);
    
    /** Slider Caption */
    $wp_customize->add_setting(
        'slider_caption',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'slider_caption',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Caption', 'blossom-recipe-pro' ),
                'description' => __( 'Enable slider caption.', 'blossom-recipe-pro' ),
                'active_callback' => 'blossom_recipe_pro_banner_ac'
			)
		)
	);

    $wp_customize->add_setting( 
        'slider_caption_layout', 
        array(
            'default'           => 'center',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Recipe_Pro_Radio_Buttonset_Control(
            $wp_customize,
            'slider_caption_layout',
            array(
                'section'     => 'header_image',
                'label'       => __( 'Banner Caption Layout', 'blossom-recipe-pro' ),
                'description' => __( 'Choose layout for banner caption.', 'blossom-recipe-pro' ),
                'choices'     => array(
                    'left'      => __( 'Left', 'blossom-recipe-pro' ),
                    'center'    => __( 'Center', 'blossom-recipe-pro' ),
                    'right'     => __( 'Right', 'blossom-recipe-pro' ),
                ),
                'active_callback' => 'blossom_recipe_pro_banner_ac'
            )
        )
    );

    /** No. of slides */
    $wp_customize->add_setting(
        'slider_speed',
        array(
            'default'           => 2000,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_number_absint'
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Recipe_Pro_Slider_Control( 
            $wp_customize,
            'slider_speed',
            array(
                'section'     => 'header_image',
                'label'       => __( 'Slider Speed', 'blossom-recipe-pro' ),
                'description' => __( 'Controls the speed of slider.', 'blossom-recipe-pro' ),
                'choices'     => array(
                    'min'   => 1000,
                    'max'   => 7000,
                    'step'  => 100,
                ),
                'active_callback' => 'blossom_recipe_pro_banner_ac'                 
            )
        )
    );
    
    /** Slider Animation */
    $wp_customize->add_setting(
		'slider_animation',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Recipe_Pro_Select_Control(
    		$wp_customize,
    		'slider_animation',
    		array(
                'label'	      => __( 'Slider Animation', 'blossom-recipe-pro' ),
                'section'     => 'header_image',
    			'choices'     => array(
                    'bounceOut'      => __( 'Bounce Out', 'blossom-recipe-pro' ),
                    'bounceOutLeft'  => __( 'Bounce Out Left', 'blossom-recipe-pro' ),
                    'bounceOutRight' => __( 'Bounce Out Right', 'blossom-recipe-pro' ),
                    'bounceOutUp'    => __( 'Bounce Out Up', 'blossom-recipe-pro' ),
                    'bounceOutDown'  => __( 'Bounce Out Down', 'blossom-recipe-pro' ),
                    'fadeOut'        => __( 'Fade Out', 'blossom-recipe-pro' ),
                    'fadeOutLeft'    => __( 'Fade Out Left', 'blossom-recipe-pro' ),
                    'fadeOutRight'   => __( 'Fade Out Right', 'blossom-recipe-pro' ),
                    'fadeOutUp'      => __( 'Fade Out Up', 'blossom-recipe-pro' ),
                    'fadeOutDown'    => __( 'Fade Out Down', 'blossom-recipe-pro' ),
                    'flipOutX'       => __( 'Flip OutX', 'blossom-recipe-pro' ),
                    'flipOutY'       => __( 'Flip OutY', 'blossom-recipe-pro' ),
                    'hinge'          => __( 'Hinge', 'blossom-recipe-pro' ),
                    'pulse'          => __( 'Pulse', 'blossom-recipe-pro' ),
                    'rollOut'        => __( 'Roll Out', 'blossom-recipe-pro' ),
                    'rotateOut'      => __( 'Rotate Out', 'blossom-recipe-pro' ),
                    'rubberBand'     => __( 'Rubber Band', 'blossom-recipe-pro' ),
                    'shake'          => __( 'Shake', 'blossom-recipe-pro' ),
                    ''               => __( 'Slide', 'blossom-recipe-pro' ),
                    'slideOutLeft'   => __( 'Slide Out Left', 'blossom-recipe-pro' ),
                    'slideOutRight'  => __( 'Slide Out Right', 'blossom-recipe-pro' ),
                    'slideOutUp'     => __( 'Slide Out Up', 'blossom-recipe-pro' ),
                    'slideOutDown'   => __( 'Slide Out Down', 'blossom-recipe-pro' ),
                    'swing'          => __( 'Swing', 'blossom-recipe-pro' ),
                    'tada'           => __( 'Tada', 'blossom-recipe-pro' ),
                    'zoomOut'        => __( 'Zoom Out', 'blossom-recipe-pro' ),
                    'zoomOutLeft'    => __( 'Zoom Out Left', 'blossom-recipe-pro' ),
                    'zoomOutRight'   => __( 'Zoom Out Right', 'blossom-recipe-pro' ),
                    'zoomOutUp'      => __( 'Zoom Out Up', 'blossom-recipe-pro' ),
                    'zoomOutDown'    => __( 'Zoom Out Down', 'blossom-recipe-pro' ),                    
                ),
                'active_callback' => 'blossom_recipe_pro_banner_ac'                                	
     		)
		)
	);
    
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_general' );

if ( ! function_exists( 'blossom_recipe_pro_slider_options' ) ) :
    /**
     * @return array Content type options
     */
    function blossom_recipe_pro_slider_options() {
        $slider_options = array(
            'latest_posts' => __( 'Latest Posts', 'blossom-recipe-pro' ),
            'cat'          => __( 'Category', 'blossom-recipe-pro' ),
            'pages'        => __( 'Pages', 'blossom-recipe-pro' ),
            'custom'       => __( 'Custom', 'blossom-recipe-pro' ),
        );
        if ( is_brm_activated() ) {
            $slider_options = array_merge( $slider_options, array( 'latest_recipes' => __( 'Latest Recipes','blossom-recipe-pro' ), 'cat_recipes' => __( 'Recipes Category','blossom-recipe-pro' ) ) );
        }
        $output = apply_filters( 'blossom_recipe_pro_slider_options', $slider_options );
        return $output;
    }
endif;