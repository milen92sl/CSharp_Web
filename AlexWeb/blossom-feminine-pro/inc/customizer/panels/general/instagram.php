<?php
/**
 * Instagram Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_general_instagram( $wp_customize ) {
    
    /** Instagram Settings */
    $wp_customize->add_section(
        'instagram_settings',
        array(
            'title'    => __( 'Instagram Settings', 'blossom-feminine-pro' ),
            'priority' => 70,
            'panel'    => 'general_settings',
        )
    );
    
    if( is_btif_activated() ){
        /** Enable Instagram Section */
        $wp_customize->add_setting( 
            'ed_instagram', 
            array(
                'default'           => false,
                'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
    		new Blossom_Feminine_Pro_Toggle_Control( 
    			$wp_customize,
    			'ed_instagram',
    			array(
    				'section'     => 'instagram_settings',
    				'label'	      => __( 'Instagram Section', 'blossom-feminine-pro' ),
                    'description' => __( 'Enable to show Instagram Section', 'blossom-feminine-pro' ),
    			)
    		)
    	);
        
        /** Note */
        $wp_customize->add_setting(
            'instagram_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Blossom_Feminine_Pro_Note_Control( 
    			$wp_customize,
    			'instagram_text',
    			array(
    				'section'	  => 'instagram_settings',
    				'description' => sprintf( __( 'You can change the setting BlossomThemes Instagram Feed %1$sfrom here%2$s.', 'blossom-feminine-pro' ), '<a href="' . admin_url( 'admin.php?page=class-blossomthemes-instagram-feed-admin.php' ) . '" target="_blank">', '</a>' )
    			)
    		)
        );        
    }else{
        /** Note */
        $wp_customize->add_setting(
            'instagram_text',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post' 
            )
        );
        
        $wp_customize->add_control(
            new Blossom_Feminine_Pro_Plugin_Recommend_Control( 
    			$wp_customize,
    			'instagram_text',
    			array(
    				'section'	  => 'instagram_settings',
                    'label' => __( 'BlossomThemes Instagram Feed', 'blossom-feminine-pro'),
                    'capability' => 'install_plugins',
                    'plugin_slug' => 'blossomthemes-instagram-feed',
                    'description' => sprintf(__('Please install and activate the recommended plugin %1$sBlossomThemes Instagram Feed%2$s. After that option related with this section will be visible.', 'blossom-feminine-pro'), '<strong>', '</strong>'),  				
    			)
    		)
        );
    }

    /** Instagram Title */
    $wp_customize->add_setting(
        'instagram_title',
        array(
            'default'           => __( 'FOLLOW ALONG', 'blossom-feminine-pro' ),
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'instagram_title',
        array(
            'label'       => __( 'Instagram Section Title', 'blossom-feminine-pro' ),
            'section'     => 'instagram_settings',
            'active_callback' => 'blossom_feminine_pro_instagram_callback',
        )
    );
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_general_instagram' );

/**
 * Active Callback
*/
function blossom_feminine_pro_instagram_callback( $control ){
    
    $child_theme_support    = $control->manager->get_setting( 'child_additional_support' )->value();
    $control_id             = $control->id;
    
    if ( $control_id == 'instagram_title' && $child_theme_support == 'blossom_beauty' ) return true;
    if ( $control_id == 'instagram_title' && $child_theme_support == 'blossom_diva' ) return true;
        
    return false;
}