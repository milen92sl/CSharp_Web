<?php
/**
 * Before Posts Archive AD Options
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_ad_before_posts( $wp_customize ) {    
    
    $wp_customize->add_section( 'ad_bp_archive_settings', array(
        'title'    => __( 'Before Posts Archive AD Settings', 'blossom-feminine-pro' ),
        'priority' => 12,
        'panel'    => 'ad_settings'
    ) );
    
    /** Enable AD Before Posts */
    $wp_customize->add_setting(
        'ed_bp_archive_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_bp_archive_ad',
			array(
				'section'     => 'ad_bp_archive_settings',
				'label'       => __( 'Enable AD Before Posts', 'blossom-feminine-pro' ),
                'description' => __( 'Enable AD Before Posts in home/archive page.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Enable Before Posts AD Code */
    $wp_customize->add_setting(
        'ed_bp_archive_ad_code',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_bp_archive_ad_code',
			array(
				'section' => 'ad_bp_archive_settings',
				'label'   => __( 'Enable Before Posts AD Code', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Below Post AD Code */
    $wp_customize->add_setting(
        'bp_archive_ad_code',
        array(
            'default' => '',
        )
    );
        
    $wp_customize->add_control( 
        new Blossom_Feminine_Pro_Code_Control(
            $wp_customize, 
            'bp_archive_ad_code',
    		array(
    			'section'	  => 'ad_bp_archive_settings',
    			'label'		  => __( 'Before Posts AD Code', 'blossom-feminine-pro' ),
                'description' => __( 'Paste your Adsense, ad code here to show ads before posts in home/archive page.', 'blossom-feminine-pro' ),
    			'choices'     => array(
			        'language' => 'javascript',
			        'theme'    => 'monokai', //options are 'monokai', 'material' & 'elegant'
                    'height'   => 250,
                ), 
                'active_callback' => 'blossom_feminine_pro_adbp_ac'     		
            )
        )		
    );
    
    /** Open Link in Different Tab */
    $wp_customize->add_setting(
        'open_link_diff_tab_bp_archive',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'open_link_diff_tab_bp_archive',
			array(
				'section'         => 'ad_bp_archive_settings',
				'label'           => __( 'Open Link in Different Tab', 'blossom-feminine-pro' ),
                'active_callback' => 'blossom_feminine_pro_adbp_ac'
			)
		)
	);
    
    /** Upload Before Posts AD */
    $wp_customize->add_setting(
        'bp_archive_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'bp_archive_ad',
           array(
               'label'           => __( 'Upload Before Posts AD', 'blossom-feminine-pro' ),
               'section'         => 'ad_bp_archive_settings',
               'width'           => 920,
               'height'          => 90,
               'active_callback' => 'blossom_feminine_pro_adbp_ac'
           )
       )
    );
       
    /** Before Posts AD Link */
    $wp_customize->add_setting(
        'bp_archive_ad_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
	   'bp_archive_ad_link',
		array(
			'section'         => 'ad_bp_archive_settings',
			'label'	          => __( 'Before Posts AD Link', 'blossom-feminine-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_feminine_pro_adbp_ac'
		)		
	);
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_ad_before_posts' );   

/**
 * Active Callback
*/
function blossom_feminine_pro_adbp_ac( $control ){
    
    $ed_code     = $control->manager->get_setting( 'ed_bp_archive_ad_code' )->value();
    $control_id  = $control->id;
    
    if ( $control_id == 'bp_archive_ad_code' && $ed_code == true ) return true;
    if ( $control_id == 'open_link_diff_tab_bp_archive' && $ed_code == false ) return true;
    if ( $control_id == 'bp_archive_ad' && $ed_code == false ) return true;
    if ( $control_id == 'bp_archive_ad_link' && $ed_code == false ) return true;
    
    return false;
} 