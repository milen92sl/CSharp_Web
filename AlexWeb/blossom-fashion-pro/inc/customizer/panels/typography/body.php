<?php
/**
 * Typography Body Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_typography_body( $wp_customize ) {
    
    /** Body Settings */
    $wp_customize->add_section(
        'body_settings',
        array(
            'title'    => __( 'Body Settings', 'blossom-fashion-pro' ),
            'priority' => 10,
            'panel'    => 'typography_settings'
        )
    );
    
    /** Primary Font */
    $wp_customize->add_setting(
		'primary_font',
		array(
			'default'			=> 'Montserrat',
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Select_Control(
    		$wp_customize,
    		'primary_font',
    		array(
                'label'	      => __( 'Primary Font', 'blossom-fashion-pro' ),
                'description' => __( 'Primary font of the site.', 'blossom-fashion-pro' ),
    			'section'     => 'body_settings',
    			'choices'     => blossom_fashion_pro_get_all_fonts(),	
                'active_callback' => 'blossom_fashion_pro_fonts_callback',
     		)
		)
	);
    
    /** Secondary Font */
    $wp_customize->add_setting(
		'secondary_font',
		array(
			'default'			=> 'Cormorant Garamond',
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Select_Control(
    		$wp_customize,
    		'secondary_font',
    		array(
                'label'	      => __( 'Secondary Font', 'blossom-fashion-pro' ),
                'description' => __( 'Secondary font of the site.', 'blossom-fashion-pro' ),
    			'section'     => 'body_settings',
    			'choices'     => blossom_fashion_pro_get_all_fonts(),
                'active_callback' => 'blossom_fashion_pro_fonts_callback',	
     		)
		)
	); 

    /** Fashion Lifestyle */
    /** Primary Font */
    $wp_customize->add_setting(
        'primary_font_lifestyle',
        array(
            'default'           => 'Nunito Sans',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Fashion_Pro_Select_Control(
            $wp_customize,
            'primary_font_lifestyle',
            array(
                'label'       => __( 'Primary Font', 'blossom-fashion-pro' ),
                'description' => __( 'Primary font of the site.', 'blossom-fashion-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_fashion_pro_get_all_fonts(),
                'active_callback' => 'blossom_fashion_pro_fonts_callback',
            )
        )
    );
    
    /** Secondary Font */
    $wp_customize->add_setting(
        'secondary_font_lifestyle',
        array(
            'default'           => 'Cormorant',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Fashion_Pro_Select_Control(
            $wp_customize,
            'secondary_font_lifestyle',
            array(
                'label'       => __( 'Secondary Font', 'blossom-fashion-pro' ),
                'description' => __( 'Secondary font of the site.', 'blossom-fashion-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_fashion_pro_get_all_fonts(),
                'active_callback' => 'blossom_fashion_pro_fonts_callback',
            )
        )
    );

    /** Font Size*/
    $wp_customize->add_setting( 
        'font_size_lifestyle', 
        array(
            'default'           => 18,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Fashion_Pro_Slider_Control( 
            $wp_customize,
            'font_size_lifestyle',
            array(
                'section'     => 'body_settings',
                'label'       => __( 'Font Size', 'blossom-fashion-pro' ),
                'description' => __( 'Change the font size of your site.', 'blossom-fashion-pro' ),
                'choices'     => array(
                    'min'   => 10,
                    'max'   => 50,
                    'step'  => 1,
                ),
                'active_callback' => 'blossom_fashion_pro_fonts_callback',                
            )
        )
    );

    /** Fashion Stylist */
    /** Primary Font */
    $wp_customize->add_setting(
        'primary_font_stylist',
        array(
            'default'           => 'Montserrat',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Fashion_Pro_Select_Control(
            $wp_customize,
            'primary_font_stylist',
            array(
                'label'       => __( 'Primary Font', 'blossom-fashion-pro' ),
                'description' => __( 'Primary font of the site.', 'blossom-fashion-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_fashion_pro_get_all_fonts(),
                'active_callback' => 'blossom_fashion_pro_fonts_callback',
            )
        )
    );
    
    /** Secondary Font */
    $wp_customize->add_setting(
        'secondary_font_stylist',
        array(
            'default'           => 'Cormorant Garamond',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Fashion_Pro_Select_Control(
            $wp_customize,
            'secondary_font_stylist',
            array(
                'label'       => __( 'Secondary Font', 'blossom-fashion-pro' ),
                'description' => __( 'Secondary font of the site.', 'blossom-fashion-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_fashion_pro_get_all_fonts(),
                'active_callback' => 'blossom_fashion_pro_fonts_callback',
            )
        )
    );   

    // FASHION ICON
    /** Primary Font */
    $wp_customize->add_setting(
        'primary_font_icon',
        array(
            'default'           => 'Nunito Sans',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Fashion_Pro_Select_Control(
            $wp_customize,
            'primary_font_icon',
            array(
                'label'       => __( 'Primary Font', 'blossom-fashion-pro' ),
                'description' => __( 'Primary font of the site.', 'blossom-fashion-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_fashion_pro_get_all_fonts(),
                'active_callback' => 'blossom_fashion_pro_fonts_callback',
            )
        )
    );
    
    /** Secondary Font */
    $wp_customize->add_setting(
        'secondary_font_icon',
        array(
            'default'           => 'Marcellus',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Fashion_Pro_Select_Control(
            $wp_customize,
            'secondary_font_icon',
            array(
                'label'       => __( 'Secondary Font', 'blossom-fashion-pro' ),
                'description' => __( 'Secondary font of the site.', 'blossom-fashion-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_fashion_pro_get_all_fonts(),
                'active_callback' => 'blossom_fashion_pro_fonts_callback',
            )
        )
    );   
        
    /** Font Size*/
    $wp_customize->add_setting( 
        'font_size', 
        array(
            'default'           => 16,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Slider_Control( 
			$wp_customize,
			'font_size',
			array(
				'section'	  => 'body_settings',
				'label'		  => __( 'Font Size', 'blossom-fashion-pro' ),
				'description' => __( 'Change the font size of your site.', 'blossom-fashion-pro' ),
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 50,
					'step'	=> 1,
				),
                'active_callback' => 'blossom_fashion_pro_fonts_callback',                 
			)
		)
	);
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_typography_body' );

function blossom_fashion_pro_fonts_callback( $control ){
    $child_theme_support    = $control->manager->get_setting( 'child_additional_support' )->value();
    $control_id             = $control->id;

    if ( $control_id == 'primary_font' && $child_theme_support == 'default' ) return true;
    if ( $control_id == 'secondary_font' && $child_theme_support == 'default' ) return true;
    if ( $control_id == 'font_size' && ( $child_theme_support == 'default'  || $child_theme_support == 'fashion_stylist' ) ) return true;

    if ( $control_id == 'primary_font_lifestyle' && $child_theme_support == 'fashion_lifestyle' ) return true;
    if ( $control_id == 'secondary_font_lifestyle' && $child_theme_support == 'fashion_lifestyle' ) return true;
    if ( $control_id == 'primary_font_stylist' && $child_theme_support == 'fashion_stylist' ) return true;
    if ( $control_id == 'secondary_font_stylist' && $child_theme_support == 'fashion_stylist' ) return true;
     if ( $control_id == 'primary_font_icon' && $child_theme_support == 'fashion_icon' ) return true;
    if ( $control_id == 'secondary_font_icon' && $child_theme_support == 'fashion_icon' ) return true;

    if ( $control_id == 'font_size_lifestyle' && ( $child_theme_support == 'fashion_icon' || $child_theme_support  == 'fashion_lifestyle' ) ) return true;

        
    return false;
}