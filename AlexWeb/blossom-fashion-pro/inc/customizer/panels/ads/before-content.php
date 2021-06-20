<?php
/**
 * Before Content AD Options
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_ad_before_content( $wp_customize ) {    
    
    $wp_customize->add_section( 'ad_bc_post_settings', array(
        'title'    => __( 'Before Content AD Settings', 'blossom-fashion-pro' ),
        'priority' => 14,
        'panel'    => 'ad_settings'
    ) );
    
    /** Enable AD Before Content */
    $wp_customize->add_setting(
        'ed_bc_post_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_bc_post_ad',
			array(
				'section'     => 'ad_bc_post_settings',
				'label'       => __( 'Enable AD Before Content', 'blossom-fashion-pro' ),
                'description' => __( 'Enable AD Before Content in single post page.', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Enable Before Content AD Code */
    $wp_customize->add_setting(
        'ed_bc_post_ad_code',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_bc_post_ad_code',
			array(
				'section' => 'ad_bc_post_settings',
				'label'   => __( 'Enable Before Content AD Code', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Before Content AD Code */
    $wp_customize->add_setting(
        'bc_post_ad_code',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_code'
        )
    );
        
    $wp_customize->add_control( 
        new Blossom_Fashion_Pro_Code_Control(
            $wp_customize, 
            'bc_post_ad_code',
    		array(
    			'section'	  => 'ad_bc_post_settings',
    			'label'		  => __( 'Before Content AD Code', 'blossom-fashion-pro' ),
                'description' => __( 'Paste your Adsense, ad code here to show ads before content in single post page.', 'blossom-fashion-pro' ),
    			'choices'     => array(
			        'language' => 'javascript',
			        'theme'    => 'monokai', //options are 'monokai', 'material' & 'elegant'
                    'height'   => 250,
                ), 
                'active_callback' => 'blossom_fashion_pro_adbc_ac'     		
            )
        )		
    );
    
    /** Open Link in Different Tab */
    $wp_customize->add_setting(
        'open_link_diff_tab_bc_post',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'open_link_diff_tab_bc_post',
			array(
				'section'         => 'ad_bc_post_settings',
				'label'           => __( 'Open Link in Different Tab', 'blossom-fashion-pro' ),
                'active_callback' => 'blossom_fashion_pro_adbc_ac'
			)
		)
	);
    
    /** Upload Before Content AD */
    $wp_customize->add_setting(
        'bc_post_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'bc_post_ad',
           array(
               'label'           => __( 'Upload Before Content AD', 'blossom-fashion-pro' ),
               'section'         => 'ad_bc_post_settings',
               'width'           => 920,
               'height'          => 90,
               'active_callback' => 'blossom_fashion_pro_adbc_ac'
           )
       )
    );
       
    /** Before Content AD Link */
    $wp_customize->add_setting(
        'bc_post_ad_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
	   'bc_post_ad_link',
		array(
			'section'         => 'ad_bc_post_settings',
			'label'	          => __( 'Before Content AD Link', 'blossom-fashion-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_fashion_pro_adbc_ac'
		)		
	);
    
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_ad_before_content' );   

/**
 * Active Callback
*/
function blossom_fashion_pro_adbc_ac( $control ){
    
    $ed_code     = $control->manager->get_setting( 'ed_bc_post_ad_code' )->value();
    $control_id  = $control->id;
    
    if ( $control_id == 'bc_post_ad_code' && $ed_code == true ) return true;
    if ( $control_id == 'open_link_diff_tab_bc_post' && $ed_code == false ) return true;
    if ( $control_id == 'bc_post_ad' && $ed_code == false ) return true;
    if ( $control_id == 'bc_post_ad_link' && $ed_code == false ) return true;
    
    return false;
} 