<?php
/**
 * Home AD Options
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_ad_home( $wp_customize ) {    
    
    $wp_customize->add_section( 'ad_home_settings', array(
        'title'    => __( 'Home(Blog) AD Settings', 'blossom-pin-pro' ),
        'priority' => 15,
        'panel'    => 'ad_settings',
    ) );
    
    /** Enable Home AD */
    $wp_customize->add_setting(
        'ed_home_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_home_ad',
			array(
				'section'     => 'ad_home_settings',
				'label'       => __( 'Enable Home AD', 'blossom-pin-pro' ),
                'description' => __( 'Enable Home AD for blog home page.', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Enable Home AD Code */
    $wp_customize->add_setting(
        'ed_home_ad_code',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_home_ad_code',
			array(
				'section' => 'ad_home_settings',
				'label'   => __( 'Enable Home AD Code', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Open Link in Different Tab */
    $wp_customize->add_setting(
        'open_link_diff_tab_home',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'open_link_diff_tab_home',
			array(
				'section'         => 'ad_home_settings',
				'label'           => __( 'Open Link in Different Tab', 'blossom-pin-pro' ),
                'active_callback' => 'blossom_pin_pro_home_ad_ac'
			)
		)
	);
    
    /** Start displaying the home AD after nth post. */
    $wp_customize->add_setting( 
        'after_n_post', 
        array(
            'default'           => 3,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Slider_Control( 
			$wp_customize,
			'after_n_post',
			array(
				'section' => 'ad_home_settings',
				'label'	  => __( 'Display the home AD after every n post.', 'blossom-pin-pro' ),
				'choices' => array(
					'min' 	=> 1,
					'max' 	=> 5,
					'step'	=> 1,
				)                 
			)
		)
	);
    
    /** Repeat the ad for n times. */
    $wp_customize->add_setting( 
        'repeat_n_times', 
        array(
            'default'           => 3,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Slider_Control( 
			$wp_customize,
			'repeat_n_times',
			array(
				'section' => 'ad_home_settings',
				'label'	  => __( 'Repeat the home AD for n times.', 'blossom-pin-pro' ),
				'choices' => array(
					'min'  => 1,
					'max'  => 3,
					'step' => 1,
				),
                'active_callback' => 'blossom_pin_pro_home_ad_ac'                 
			)
		)
	);
    
    /** HR */
    $wp_customize->add_setting(
        'home_ad_hr',
        array(
            'default'   => '',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    
    $wp_customize->add_control( 
        new Blossom_Pin_Pro_Note_Control(
            $wp_customize, 
            'home_ad_hr',
    		array(
    			'section'	  => 'ad_home_settings',    			
                'description' => '<hr/>',
            )
        )		
    );
    /** HR */
    
    /** Home AD Code */
    $wp_customize->add_setting(
        'home_ad_code',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_code'
        )
    );
        
    $wp_customize->add_control( 
        new Blossom_pin_Pro_Code_Control(
            $wp_customize, 
            'home_ad_code',
    		array(
    			'section'	  => 'ad_home_settings',
    			'label'		  => __( 'Home AD Code', 'blossom-pin-pro' ),
                'description' => __( 'Paste your Adsense, ad code here to show ads in the Home Page.', 'blossom-pin-pro' ),
    			'choices'     => array(
			        'language' => 'javascript',
			        'theme'    => 'elegant', //options are 'monokai', 'material' & 'elegant'
                    'height'   => 250,
                ), 
                'active_callback' => 'blossom_pin_pro_home_ad_ac'     		
            )
        )		
    );
    
    /** Upload Home AD One */
    $wp_customize->add_setting(
        'home_ad_one',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'home_ad_one',
           array(
               'label'           => __( 'Upload Home AD One', 'blossom-pin-pro' ),
               'section'         => 'ad_home_settings',
               'width'           => 768,
               'height'          => 960,
               'flex_width'      => true, 
               'flex_height'     => true,
               'active_callback' => 'blossom_pin_pro_home_ad_ac'
           )
       )
    );
       
    /** Home AD One Link */
    $wp_customize->add_setting(
        'home_ad_one_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
	   'home_ad_one_link',
		array(
			'section'         => 'ad_home_settings',
			'label'	          => __( 'Home AD One Link', 'blossom-pin-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_pin_pro_home_ad_ac'
		)		
	);
    
    /** Upload Home AD Two */
    $wp_customize->add_setting(
        'home_ad_two',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'home_ad_two',
           array(
               'label'           => __( 'Upload Home AD Two', 'blossom-pin-pro' ),
               'section'         => 'ad_home_settings',
               'width'           => 768,
               'height'          => 960,
               'flex_width'      => true, 
               'flex_height'     => true,
               'active_callback' => 'blossom_pin_pro_home_ad_ac'
           )
       )
    );
       
    /** Home AD Two Link */
    $wp_customize->add_setting(
        'home_ad_two_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
	   'home_ad_two_link',
		array(
			'section'         => 'ad_home_settings',
			'label'	          => __( 'Home AD Two Link', 'blossom-pin-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_pin_pro_home_ad_ac'
		)		
	);
    
    /** Upload Home AD Three */
    $wp_customize->add_setting(
        'home_ad_three',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'home_ad_three',
           array(
               'label'           => __( 'Upload Home AD Three', 'blossom-pin-pro' ),
               'section'         => 'ad_home_settings',
               'width'           => 768,
               'height'          => 960,
               'flex_width'      => true, 
               'flex_height'     => true,
               'active_callback' => 'blossom_pin_pro_home_ad_ac'
           )
       )
    );
       
    /** Home AD Three Link */
    $wp_customize->add_setting(
        'home_ad_three_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
	   'home_ad_three_link',
		array(
			'section'         => 'ad_home_settings',
			'label'	          => __( 'Home AD Three Link', 'blossom-pin-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_pin_pro_home_ad_ac'
		)		
	);
        
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_ad_home' );    

/**
 * Active Callback
*/
function blossom_pin_pro_home_ad_ac( $control ){
    
    $ed_code    = $control->manager->get_setting( 'ed_home_ad_code' )->value();    
    $control_id = $control->id;
    
    if ( $control_id == 'home_ad_code' && $ed_code == true ) return true;
    if ( $control_id == 'repeat_n_times' && $ed_code == true ) return true;
    if ( $control_id == 'open_link_diff_tab_home' && $ed_code == false ) return true;
    if ( $control_id == 'home_ad_one' && $ed_code == false ) return true;
    if ( $control_id == 'home_ad_one_link' && $ed_code == false ) return true;
    if ( $control_id == 'home_ad_two' && $ed_code == false ) return true;
    if ( $control_id == 'home_ad_two_link' && $ed_code == false ) return true;
    if ( $control_id == 'home_ad_three' && $ed_code == false ) return true;
    if ( $control_id == 'home_ad_three_link' && $ed_code == false ) return true;    
    
    return false;
}