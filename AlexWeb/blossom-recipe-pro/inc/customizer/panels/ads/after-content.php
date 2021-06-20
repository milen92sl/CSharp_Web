<?php
/**
 * After Content AD Options
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_ad_after_content( $wp_customize ) {    
    
    $wp_customize->add_section( 'ad_ac_post_settings', array(
        'title'       => __( 'After Content AD Settings', 'blossom-recipe-pro' ),
        'priority'    => 15,
        'panel'       => 'ad_settings'
    ) );
    
    /** Enable AD Below Post Title */
    $wp_customize->add_setting(
        'ed_ac_post_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_ac_post_ad',
			array(
				'section'     => 'ad_ac_post_settings',
				'label'       => __( 'Enable AD After Content', 'blossom-recipe-pro' ),
                'description' => __( 'Enable AD After Content in single post page.', 'blossom-recipe-pro' ),
			)
		)
	);
    
    /** Enable After Content AD Code */
    $wp_customize->add_setting(
        'ed_ac_post_ad_code',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_ac_post_ad_code',
			array(
				'section' => 'ad_ac_post_settings',
				'label'   => __( 'Enable After Content AD Code', 'blossom-recipe-pro' ),
			)
		)
	);
    
    /** After Content AD Code */
    $wp_customize->add_setting(
        'ac_post_ad_code',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_code'
        )
    );
        
    $wp_customize->add_control( 
        new Blossom_Recipe_Pro_Code_Control(
            $wp_customize, 
            'ac_post_ad_code',
    		array(
    			'section'	  => 'ad_ac_post_settings',
    			'label'		  => __( 'After Content AD Code', 'blossom-recipe-pro' ),
                'description' => __( 'Paste your Adsense, ad code here to show ads after content in single post page.', 'blossom-recipe-pro' ),
    			'choices'     => array(
			        'language' => 'javascript',
			        'theme'    => 'monokai', //options are 'monokai', 'material' & 'elegant'
                    'height'   => 250,
                ), 
                'active_callback' => 'blossom_recipe_pro_adac_ac'     		
            )
        )		
    );
    
    /** Open Link in Different Tab */
    $wp_customize->add_setting(
        'open_link_diff_tab_ac_post',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'open_link_diff_tab_ac_post',
			array(
				'section'         => 'ad_ac_post_settings',
				'label'           => __( 'Open Link in Different Tab', 'blossom-recipe-pro' ),
                'active_callback' => 'blossom_recipe_pro_adac_ac'
			)
		)
	);
        
    /** Upload After Content AD */
    $wp_customize->add_setting(
        'ac_post_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'ac_post_ad',
           array(
               'label'           => __( 'Upload After Content AD', 'blossom-recipe-pro' ),
               'section'         => 'ad_ac_post_settings',
               'width'           => 728,
               'height'          => 90,
               'active_callback' => 'blossom_recipe_pro_adac_ac'
           )
       )
    );
       
    /** After Cotnent AD Link */
    $wp_customize->add_setting(
        'ac_post_ad_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
	   'ac_post_ad_link',
		array(
			'section'         => 'ad_ac_post_settings',
			'label'	          => __( 'After Content AD Link', 'blossom-recipe-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_recipe_pro_adac_ac'
		)		
	);
    
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_ad_after_content' );