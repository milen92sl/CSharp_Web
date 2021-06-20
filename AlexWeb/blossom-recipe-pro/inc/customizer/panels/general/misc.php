<?php
/**
 * Miscellaneous Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_general_misc( $wp_customize ) {
    
    /** Miscellaneous Settings */
    $wp_customize->add_section(
        'misc_settings',
        array(
            'title'    => __( 'Misc Settings', 'blossom-recipe-pro' ),
            'priority' => 85,
            'panel'    => 'general_settings',
        )
    );
    
    /** Admin Bar */
    $wp_customize->add_setting(
        'ed_adminbar',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_adminbar',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Admin Bar', 'blossom-recipe-pro' ),
				'description'	=> __( 'Disable to hide Admin Bar in frontend when logged in.', 'blossom-recipe-pro' ),
			)
		)
	);
    
    /** Lightbox */
    $wp_customize->add_setting(
        'ed_lightbox',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_lightbox',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Lightbox', 'blossom-recipe-pro' ),
				'description'	=> __( 'A lightbox is a stylized pop-up that allows your visitors to view larger versions of images without leaving the current page. You can enable or disable the lightbox here.', 'blossom-recipe-pro' ),
			)
		)
	);
        
    /** Last Widget Sticky */
    $wp_customize->add_setting(
        'ed_last_widget_sticky',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_last_widget_sticky',
			array(
				'section'		=> 'misc_settings',
				'label'			=> __( 'Last Widget Sticky', 'blossom-recipe-pro' ),
				'description'	=> __( 'Enable to stick last widget in sidebar.', 'blossom-recipe-pro' ),
			)
		)
	);
    
    /** Drop Cap */
    $wp_customize->add_setting(
        'ed_drop_cap',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Recipe_Pro_Toggle_Control( 
            $wp_customize,
            'ed_drop_cap',
            array(
                'section'       => 'misc_settings',
                'label'         => __( 'Drop Cap', 'blossom-recipe-pro' ),
                'description'   => __( 'Enable to show first letter of word in post/page content in drop cap.', 'blossom-recipe-pro' ),
            )
        )
    );

    if( is_brm_activated() ) {
        /** Show Recipe Posts */
        $wp_customize->add_setting(
            'show_recipe_only',
            array(
                'default'           => false,
                'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
            )
        );
        
        $wp_customize->add_control(
            new Blossom_Recipe_Pro_Toggle_Control( 
                $wp_customize,
                'show_recipe_only',
                array(
                    'section'       => 'misc_settings',
                    'label'         => __( 'Show Recipe Posts', 'blossom-recipe-pro' ),
                    'description'   => __( 'Enable to show only blossom recipes posts on blog.', 'blossom-recipe-pro' ),
                )
            )
        );
    }
        
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_general_misc' );