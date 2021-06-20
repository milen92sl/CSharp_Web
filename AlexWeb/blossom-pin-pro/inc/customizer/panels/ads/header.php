<?php
/**
 * Header AD Options
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_ad_header( $wp_customize ) {    
    
    $wp_customize->add_section( 'ad_header_settings', array(
        'title'    => __( 'Header AD Settings', 'blossom-pin-pro' ),
        'priority' => 10,
        'panel'    => 'ad_settings',
        'active_callback' => 'blossom_pin_pro_header_ac'
    ) );
    
    /** Enable Header AD */
    $wp_customize->add_setting(
        'ed_header_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_header_ad',
			array(
				'section'     => 'ad_header_settings',
				'label'       => __( 'Enable Header AD', 'blossom-pin-pro' ),
                'description' => __( 'Enable Header AD for header layout seven.', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Enable Header AD Code */
    $wp_customize->add_setting(
        'ed_header_ad_code',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_header_ad_code',
			array(
				'section' => 'ad_header_settings',
				'label'   => __( 'Enable Header AD Code', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Header AD Code */
    $wp_customize->add_setting(
        'header_ad_code',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_code'
        )
    );
        
    $wp_customize->add_control( 
        new Blossom_pin_Pro_Code_Control(
            $wp_customize, 
            'header_ad_code',
    		array(
    			'section'	  => 'ad_header_settings',
    			'label'		  => __( 'Header AD Code', 'blossom-pin-pro' ),
                'description' => __( 'Paste your Adsense, ad code here to show ads in the Header.', 'blossom-pin-pro' ),
    			'choices'     => array(
			        'language' => 'javascript',
			        'theme'    => 'elegant', //options are 'monokai', 'material' & 'elegant'
                    'height'   => 250,
                ), 
                'active_callback' => 'blossom_pin_pro_header_ad_ac'     		
            )
        )		
    );
    
    /** Open Link in Different Tab */
    $wp_customize->add_setting(
        'open_link_diff_tab_header',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'open_link_diff_tab_header',
			array(
				'section'         => 'ad_header_settings',
				'label'           => __( 'Open Link in Different Tab', 'blossom-pin-pro' ),
                'active_callback' => 'blossom_pin_pro_header_ad_ac'
			)
		)
	);
    
    /** Upload Header AD */
    $wp_customize->add_setting(
        'header_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'header_ad',
           array(
               'label'           => __( 'Upload Header AD', 'blossom-pin-pro' ),
               'section'         => 'ad_header_settings',
               'width'           => 728,
               'height'          => 90,
               'active_callback' => 'blossom_pin_pro_header_ad_ac'
           )
       )
    );
       
    /** Header AD Link */
    $wp_customize->add_setting(
        'header_ad_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
	   'header_ad_link',
		array(
			'section'         => 'ad_header_settings',
			'label'	          => __( 'Header AD Link', 'blossom-pin-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_pin_pro_header_ad_ac'
		)		
	);
        
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_ad_header' );    

/**
 * Active Callback
*/
function blossom_pin_pro_header_ad_ac( $control ){
    
    $ed_code       = $control->manager->get_setting( 'ed_header_ad_code' )->value();
    
    $control_id    = $control->id;
    
    if ( $control_id == 'header_ad_code' && $ed_code == true ) return true;
    if ( $control_id == 'open_link_diff_tab_header' && $ed_code == false ) return true;
    if ( $control_id == 'header_ad' && $ed_code == false ) return true;
    if ( $control_id == 'header_ad_link' && $ed_code == false ) return true;
    
    
    return false;
}

function blossom_pin_pro_header_ac( $control ){
    $header_layout = $control->manager->get_setting( 'header_layout' )->value();
    if( $header_layout == 'five' || $header_layout == 'six') return true;
    
    return false; 
}