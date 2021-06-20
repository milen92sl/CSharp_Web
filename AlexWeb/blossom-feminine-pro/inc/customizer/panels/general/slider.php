<?php
/**
 * Slider Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_general_slider( $wp_customize ) {
    
    /** Slider Settings */
    $wp_customize->add_section(
        'slider_settings',
        array(
            'title'    => __( 'Slider Settings', 'blossom-feminine-pro' ),
            'priority' => 10,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Slider */
    $wp_customize->add_setting( 
        'ed_slider', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_slider',
			array(
				'section' => 'slider_settings',
				'label'	  => __( 'Enable Slider', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Slider Content Style */
    $wp_customize->add_setting(
		'slider_type',
		array(
			'default'			=> 'latest_posts',
			'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Pro_Select_Control(
    		$wp_customize,
    		'slider_type',
    		array(
                'label'	  => __( 'Slider Content Style', 'blossom-feminine-pro' ),
    			'section' => 'slider_settings',
    			'choices' => array(
                    'latest_posts' => __( 'Latest Posts', 'blossom-feminine-pro' ),
                    'cat'          => __( 'Category', 'blossom-feminine-pro' ),
                    'pages'        => __( 'Pages', 'blossom-feminine-pro' ),
                    'custom'       => __( 'Custom', 'blossom-feminine-pro' ),
                ),	
     		)
		)
	);
    
    /** Slider Category */
    $wp_customize->add_setting(
		'slider_cat',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Pro_Select_Control(
    		$wp_customize,
    		'slider_cat',
    		array(
                'label'	          => __( 'Slider Category', 'blossom-feminine-pro' ),
    			'section'         => 'slider_settings',
    			'choices'         => blossom_feminine_pro_get_categories(),
                'active_callback' => 'blossom_feminine_pro_banner_ac'	
     		)
		)
	);
    
    /** No. of slides */
    $wp_customize->add_setting(
        'no_of_slides',
        array(
            'default'           => 3,
            'sanitize_callback' => 'absint'
        )
    );
    
    $wp_customize->add_control(
        'no_of_slides',
        array(
            'type'        => 'number',
            'section'     => 'slider_settings',
            'label'       => __( 'Number of Slides', 'blossom-feminine-pro' ),
            'description' => __( 'Choose the number of slides you want to display', 'blossom-feminine-pro' ),
            'input_attrs' => array(
                'min' => 1,
                'max' => 20,
            ),
            'active_callback' => 'blossom_feminine_pro_banner_ac'
        )
    );
    
    /** Slider Pages */
    $wp_customize->add_setting( 
        new Blossom_Feminine_Pro_Repeater_Setting( 
            $wp_customize, 
            'slider_pages', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Blossom_Feminine_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Control_Repeater(
			$wp_customize,
			'slider_pages',
			array(
				'section' => 'slider_settings',				
				'label'	  => __( 'Slider Pages ', 'blossom-feminine-pro' ),
				'fields'  => array(
                    'page' => array(
                        'type'    => 'select',
                        'label'   => __( 'Select Page for slider', 'blossom-feminine-pro' ),
                        'choices' => blossom_feminine_pro_get_posts( 'page', true )
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'pages', 'blossom-feminine-pro' ),
                    'field' => 'page'
                ),
                'active_callback' => 'blossom_feminine_pro_banner_ac'                        
			)
		)
	);
    
    /** Add Slides */
    $wp_customize->add_setting( 
        new Blossom_Feminine_Pro_Repeater_Setting( 
            $wp_customize, 
            'slider_custom', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Blossom_Feminine_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),                             
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Control_Repeater(
			$wp_customize,
			'slider_custom',
			array(
				'section' => 'slider_settings',				
				'label'	  => __( 'Add Sliders', 'blossom-feminine-pro' ),
                'fields'  => array(
                    'thumbnail' => array(
                        'type'  => 'image', 
                        'label' => __( 'Add Image', 'blossom-feminine-pro' ),                
                    ),
                    'title'     => array(
                        'type'  => 'textarea',
                        'label' => __( 'Title', 'blossom-feminine-pro' ),
                    ),
                    'subtitle'   => array(
                        'type'  => 'text',
                        'label' => __( 'Subtitle', 'blossom-feminine-pro' ),
                    ),
                    'link'     => array(
                        'type'  => 'text',
                        'label' => __( 'Link', 'blossom-feminine-pro' ),
                    ),
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'Slide', 'blossom-feminine-pro' ),
                    'field' => 'title'
                ),
                'active_callback' => 'blossom_feminine_pro_banner_ac'                                              
			)
		)
	);
    
    /** Repetitive Posts */
    $wp_customize->add_setting(
        'include_repetitive_posts',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Toggle_Control( 
            $wp_customize,
            'include_repetitive_posts',
            array(
                'section'       => 'slider_settings',
                'label'         => __( 'Include Repetitive Posts', 'blossom-feminine-pro' ),
                'description'   => __( 'Enable to add posts included in slider in blog page too.', 'blossom-feminine-pro' ),
                'active_callback' => 'blossom_feminine_pro_banner_ac'
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
        new Blossom_Feminine_Pro_Note_Control( 
			$wp_customize,
			'hr',
			array(
				'section'	  => 'slider_settings',
				'description' => '<hr/>',
			)
		)
    );
    
    /** Slider Auto */
    $wp_customize->add_setting(
        'slider_auto',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'slider_auto',
			array(
				'section'     => 'slider_settings',
				'label'       => __( 'Slider Auto', 'blossom-feminine-pro' ),
                'description' => __( 'Enable slider auto transition.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Slider Loop */
    $wp_customize->add_setting(
        'slider_loop',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'slider_loop',
			array(
				'section'     => 'slider_settings',
				'label'       => __( 'Slider Loop', 'blossom-feminine-pro' ),
                'description' => __( 'Enable slider loop.', 'blossom-feminine-pro' ),
			)
		)
	);

    /** No. of slides */
    $wp_customize->add_setting(
        'slider_speed',
        array(
            'default'           => 2000,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_number_absint'
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Slider_Control( 
            $wp_customize,
            'slider_speed',
            array(
                'section'     => 'slider_settings',
                'label'       => __( 'Slider Speed', 'blossom-feminine-pro' ),
                'description' => __( 'Controls the speed of slider.', 'blossom-feminine-pro' ),
                'choices'     => array(
                    'min'   => 1000,
                    'max'   => 7000,
                    'step'  => 100,
                ),                 
            )
        )
    );
    
    /** Slider Caption */
    $wp_customize->add_setting(
        'slider_caption',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'slider_caption',
			array(
				'section'     => 'slider_settings',
				'label'       => __( 'Slider Caption', 'blossom-feminine-pro' ),
                'description' => __( 'Enable slider caption.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Full Image */
    $wp_customize->add_setting(
        'slider_full_image',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'slider_full_image',
			array(
				'section'         => 'slider_settings',
				'label'           => __( 'Full Image', 'blossom-feminine-pro' ),
                'description'     => __( 'Enable to use full size image in slider.', 'blossom-feminine-pro' ),
                'active_callback' => 'blossom_feminine_pro_banner_ac'
			)
		)
	);
    
    /** Slider Animation */
    $wp_customize->add_setting(
		'slider_animation',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Pro_Select_Control(
    		$wp_customize,
    		'slider_animation',
    		array(
                'label'	      => __( 'Slider Animation', 'blossom-feminine-pro' ),
                'section'     => 'slider_settings',
    			'choices'     => array(
                    'bounceOut'      => __( 'Bounce Out', 'blossom-feminine-pro' ),
                    'bounceOutLeft'  => __( 'Bounce Out Left', 'blossom-feminine-pro' ),
                    'bounceOutRight' => __( 'Bounce Out Right', 'blossom-feminine-pro' ),
                    'bounceOutUp'    => __( 'Bounce Out Up', 'blossom-feminine-pro' ),
                    'bounceOutDown'  => __( 'Bounce Out Down', 'blossom-feminine-pro' ),
                    'fadeOut'        => __( 'Fade Out', 'blossom-feminine-pro' ),
                    'fadeOutLeft'    => __( 'Fade Out Left', 'blossom-feminine-pro' ),
                    'fadeOutRight'   => __( 'Fade Out Right', 'blossom-feminine-pro' ),
                    'fadeOutUp'      => __( 'Fade Out Up', 'blossom-feminine-pro' ),
                    'fadeOutDown'    => __( 'Fade Out Down', 'blossom-feminine-pro' ),
                    'flipOutX'       => __( 'Flip OutX', 'blossom-feminine-pro' ),
                    'flipOutY'       => __( 'Flip OutY', 'blossom-feminine-pro' ),
                    'hinge'          => __( 'Hinge', 'blossom-feminine-pro' ),
                    'pulse'          => __( 'Pulse', 'blossom-feminine-pro' ),
                    'rollOut'        => __( 'Roll Out', 'blossom-feminine-pro' ),
                    'rotateOut'      => __( 'Rotate Out', 'blossom-feminine-pro' ),
                    'rubberBand'     => __( 'Rubber Band', 'blossom-feminine-pro' ),
                    'shake'          => __( 'Shake', 'blossom-feminine-pro' ),
                    ''               => __( 'Slide', 'blossom-feminine-pro' ),
                    'slideOutLeft'   => __( 'Slide Out Left', 'blossom-feminine-pro' ),
                    'slideOutRight'  => __( 'Slide Out Right', 'blossom-feminine-pro' ),
                    'slideOutUp'     => __( 'Slide Out Up', 'blossom-feminine-pro' ),
                    'slideOutDown'   => __( 'Slide Out Down', 'blossom-feminine-pro' ),
                    'swing'          => __( 'Swing', 'blossom-feminine-pro' ),
                    'tada'           => __( 'Tada', 'blossom-feminine-pro' ),
                    'zoomOut'        => __( 'Zoom Out', 'blossom-feminine-pro' ),
                    'zoomOutLeft'    => __( 'Zoom Out Left', 'blossom-feminine-pro' ),
                    'zoomOutRight'   => __( 'Zoom Out Right', 'blossom-feminine-pro' ),
                    'zoomOutUp'      => __( 'Zoom Out Up', 'blossom-feminine-pro' ),
                    'zoomOutDown'    => __( 'Zoom Out Down', 'blossom-feminine-pro' ),                    
                ),
                'active_callback' => 'blossom_feminine_pro_banner_ac'                                	
     		)
		)
	);
    /** Slider Settings Ends */
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_general_slider' );

/**
 * Active Callback
*/
function blossom_feminine_pro_banner_ac( $control ){
    
    $slider_type   = $control->manager->get_setting( 'slider_type' )->value();
    $slider_layout = $control->manager->get_setting( 'slider_layout' )->value();
    $control_id    = $control->id;
    
    if ( $control_id == 'slider_cat' && $slider_type == 'cat' ) return true;
    if ( $control_id == 'no_of_slides' && $slider_type == 'latest_posts' ) return true;
    if ( $control_id == 'slider_pages' && $slider_type == 'pages' ) return true;
    if ( $control_id == 'slider_custom' && $slider_type == 'custom' ) return true;
    if ( $control_id == 'slider_full_image' && $slider_layout == 'one' ) return true;
    if ( $control_id == 'slider_animation' && ( $slider_layout == 'one' || $slider_layout == 'two' ) ) return true;
    if ( $control_id == 'include_repetitive_posts' && ( $slider_type == 'latest_posts' || $slider_type == 'cat' ) ) return true;
    
    return false;
}