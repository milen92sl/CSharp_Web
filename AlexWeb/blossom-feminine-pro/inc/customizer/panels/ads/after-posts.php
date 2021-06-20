<?php
/**
 * After Posts AD Options
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_ad_after_posts( $wp_customize ) {    
    
    $wp_customize->add_section( 'ad_ap_archive_settings', array(
        'title'       => __( 'After Posts Archive AD Settings', 'blossom-feminine-pro' ),
        'priority'    => 13,
        'panel'       => 'ad_settings'
    ) );
    
    /** Enable AD After Posts */
    $wp_customize->add_setting(
        'ed_ap_archive_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_ap_archive_ad',
			array(
				'section'     => 'ad_ap_archive_settings',
				'label'       => __( 'Enable AD After Posts', 'blossom-feminine-pro' ),
                'description' => __( 'Enable AD After Posts in home/archive page.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Enable After Posts AD Code */
    $wp_customize->add_setting(
        'ed_ap_archive_ad_code',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_ap_archive_ad_code',
			array(
				'section' => 'ad_ap_archive_settings',
				'label'   => __( 'Enable After Posts AD Code', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** After Posts AD Code */
    $wp_customize->add_setting(
        'ap_archive_ad_code',
        array(
            'default' => '',
        )
    );
        
    $wp_customize->add_control( 
        new Blossom_Feminine_Pro_Code_Control(
            $wp_customize, 
            'ap_archive_ad_code',
    		array(
    			'section'	  => 'ad_ap_archive_settings',
    			'label'		  => __( 'After Posts AD Code', 'blossom-feminine-pro' ),
                'description' => __( 'Paste your Adsense, ad code here to show ads after posts in home/archive page.', 'blossom-feminine-pro' ),
    			'choices'     => array(
			        'language' => 'javascript',
			        'theme'    => 'monokai', //options are 'monokai', 'material' & 'elegant'
                    'height'   => 250,
                ), 
                'active_callback' => 'blossom_feminine_pro_adap_ac'     		
            )
        )		
    );
    
    /** Open Link in Different Tab */
    $wp_customize->add_setting(
        'open_link_diff_tab_ap_archive',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'open_link_diff_tab_ap_archive',
			array(
				'section'         => 'ad_ap_archive_settings',
				'label'           => __( 'Open Link in Different Tab', 'blossom-feminine-pro' ),
                'active_callback' => 'blossom_feminine_pro_adap_ac'
			)
		)
	);
        
    /** Upload After Posts AD */
    $wp_customize->add_setting(
        'ap_archive_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'ap_archive_ad',
           array(
               'label'           => __( 'Upload After Posts AD', 'blossom-feminine-pro' ),
               'section'         => 'ad_ap_archive_settings',
               'width'           => 920,
               'height'          => 90,
               'active_callback' => 'blossom_feminine_pro_adap_ac'
           )
       )
    );
       
    /** After Posts AD Link */
    $wp_customize->add_setting(
        'ap_archive_ad_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
	   'ap_archive_ad_link',
		array(
			'section'         => 'ad_ap_archive_settings',
			'label'	          => __( 'After Posts AD Link', 'blossom-feminine-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_feminine_pro_adap_ac'
		)		
	);
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_ad_after_posts' );    

/**
 * Active Callback
*/
function blossom_feminine_pro_adap_ac( $control ){
    
    $ed_code     = $control->manager->get_setting( 'ed_ap_archive_ad_code' )->value();
    $control_id  = $control->id;
    
    if ( $control_id == 'ap_archive_ad_code' && $ed_code == true ) return true;
    if ( $control_id == 'open_link_diff_tab_ap_archive' && $ed_code == false ) return true;
    if ( $control_id == 'ap_archive_ad' && $ed_code == false ) return true;
    if ( $control_id == 'ap_archive_ad_link' && $ed_code == false ) return true;
    
    return false;
}