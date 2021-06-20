<?php
/**
 * Typography Body Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_typography_body( $wp_customize ) {
    
    /** Body Settings */
    $wp_customize->add_section(
        'body_settings',
        array(
            'title'    => __( 'Body Settings', 'blossom-feminine-pro' ),
            'priority' => 10,
            'panel'    => 'typography_settings'
        )
    );
    
    /** Primary Font */
    $wp_customize->add_setting(
		'primary_font',
		array(
			'default'			=> 'Poppins',
			'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Pro_Select_Control(
    		$wp_customize,
    		'primary_font',
    		array(
                'label'	      => __( 'Primary Font', 'blossom-feminine-pro' ),
                'description' => __( 'Primary font of the site.', 'blossom-feminine-pro' ),
    			'section'     => 'body_settings',
    			'choices'     => blossom_feminine_pro_get_all_fonts(),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',	
     		)
		)
	);
    
    /** Secondary Font */
    $wp_customize->add_setting(
		'secondary_font',
		array(
			'default'			=> 'Playfair Display',
			'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Pro_Select_Control(
    		$wp_customize,
    		'secondary_font',
    		array(
                'label'	      => __( 'Secondary Font', 'blossom-feminine-pro' ),
                'description' => __( 'Secondary font of the site.', 'blossom-feminine-pro' ),
    			'section'     => 'body_settings',
    			'choices'     => blossom_feminine_pro_get_all_fonts(),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',	
     		)
		)
	);

     /** Font Size*/
    $wp_customize->add_setting( 
        'font_size', 
        array(
            'default'           => 16,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Slider_Control( 
            $wp_customize,
            'font_size',
            array(
                'section'     => 'body_settings',
                'label'       => __( 'Font Size', 'blossom-feminine-pro' ),
                'description' => __( 'Change the font size of your site.', 'blossom-feminine-pro' ),
                'choices'     => array(
                    'min'   => 10,
                    'max'   => 50,
                    'step'  => 1,
                ),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',                 
            )
        )
    );

    /** Primary Font */
    $wp_customize->add_setting(
        'primary_font_chic',
        array(
            'default'           => 'Nunito Sans',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Select_Control(
            $wp_customize,
            'primary_font_chic',
            array(
                'label'       => __( 'Primary Font', 'blossom-feminine-pro' ),
                'description' => __( 'Primary font of the site.', 'blossom-feminine-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_feminine_pro_get_all_fonts(),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',   
            )
        )
    );
    
    /** Secondary Font */
    $wp_customize->add_setting(
        'secondary_font_chic',
        array(
            'default'           => 'Cormorant',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Select_Control(
            $wp_customize,
            'secondary_font_chic',
            array(
                'label'       => __( 'Secondary Font', 'blossom-feminine-pro' ),
                'description' => __( 'Secondary font of the site.', 'blossom-feminine-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_feminine_pro_get_all_fonts(),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',   
            )
        )
    );  

    /** Font Size*/
    $wp_customize->add_setting( 
        'font_size_chic', 
        array(
            'default'           => 16,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Slider_Control( 
            $wp_customize,
            'font_size_chic',
            array(
                'section'     => 'body_settings',
                'label'       => __( 'Font Size', 'blossom-feminine-pro' ),
                'description' => __( 'Change the font size of your site.', 'blossom-feminine-pro' ),
                'choices'     => array(
                    'min'   => 10,
                    'max'   => 50,
                    'step'  => 1,
                ),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',                
            )
        )
    );

    /** Primary Font */
    $wp_customize->add_setting(
        'primary_font_mommy',
        array(
            'default'           => 'Cabin',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Select_Control(
            $wp_customize,
            'primary_font_mommy',
            array(
                'label'       => __( 'Primary Font', 'blossom-feminine-pro' ),
                'description' => __( 'Primary font of the site.', 'blossom-feminine-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_feminine_pro_get_all_fonts(),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',   
            )
        )
    );
    
    /** Secondary Font */
    $wp_customize->add_setting(
        'secondary_font_mommy',
        array(
            'default'           => 'EB Garamond',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Select_Control(
            $wp_customize,
            'secondary_font_mommy',
            array(
                'label'       => __( 'Secondary Font', 'blossom-feminine-pro' ),
                'description' => __( 'Secondary font of the site.', 'blossom-feminine-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_feminine_pro_get_all_fonts(),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',   
            )
        )
    );  
        
    /** Font Size*/
    $wp_customize->add_setting( 
        'font_size_mommy', 
        array(
            'default'           => 18,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Slider_Control( 
			$wp_customize,
			'font_size_mommy',
			array(
				'section'	  => 'body_settings',
				'label'		  => __( 'Font Size', 'blossom-feminine-pro' ),
				'description' => __( 'Change the font size of your site.', 'blossom-feminine-pro' ),
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 50,
					'step'	=> 1,
				),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',                
			)
		)
	);

    /** Blossom Beauty Primary Font */
    $wp_customize->add_setting(
        'primary_font_beauty',
        array(
            'default'           => 'Muli',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Select_Control(
            $wp_customize,
            'primary_font_beauty',
            array(
                'label'       => __( 'Primary Font', 'blossom-feminine-pro' ),
                'description' => __( 'Primary font of the site.', 'blossom-feminine-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_feminine_pro_get_all_fonts(),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',   
            )
        )
    );
    
    /** Blossom Beauty Secondary Font */
    $wp_customize->add_setting(
        'secondary_font_beauty',
        array(
            'default'           => 'EB Garamond',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Select_Control(
            $wp_customize,
            'secondary_font_beauty',
            array(
                'label'       => __( 'Secondary Font', 'blossom-feminine-pro' ),
                'description' => __( 'Secondary font of the site.', 'blossom-feminine-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_feminine_pro_get_all_fonts(),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',   
            )
        )
    );  
        
    /** Blossom Beauty Font Size*/
    $wp_customize->add_setting( 
        'font_size_beauty', 
        array(
            'default'           => 18,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Slider_Control( 
            $wp_customize,
            'font_size_beauty',
            array(
                'section'     => 'body_settings',
                'label'       => __( 'Font Size', 'blossom-feminine-pro' ),
                'description' => __( 'Change the font size of your site.', 'blossom-feminine-pro' ),
                'choices'     => array(
                    'min'   => 10,
                    'max'   => 50,
                    'step'  => 1,
                ),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',                 
            )
        )
    );

    /** Blossom Diva Primary Font */
    $wp_customize->add_setting(
        'primary_font_diva',
        array(
            'default'           => 'Open Sans',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Select_Control(
            $wp_customize,
            'primary_font_diva',
            array(
                'label'       => __( 'Primary Font', 'blossom-feminine-pro' ),
                'description' => __( 'Primary font of the site.', 'blossom-feminine-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_feminine_pro_get_all_fonts(),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',   
            )
        )
    );
    
    /** Blossom Diva Secondary Font */
    $wp_customize->add_setting(
        'secondary_font_diva',
        array(
            'default'           => 'Suranna',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Select_Control(
            $wp_customize,
            'secondary_font_diva',
            array(
                'label'       => __( 'Secondary Font', 'blossom-feminine-pro' ),
                'description' => __( 'Secondary font of the site.', 'blossom-feminine-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_feminine_pro_get_all_fonts(),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',   
            )
        )
    );  
        
    /** Blossom Beauty Font Size*/
    $wp_customize->add_setting( 
        'font_size_diva', 
        array(
            'default'           => 16,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Slider_Control( 
            $wp_customize,
            'font_size_diva',
            array(
                'section'     => 'body_settings',
                'label'       => __( 'Font Size', 'blossom-feminine-pro' ),
                'description' => __( 'Change the font size of your site.', 'blossom-feminine-pro' ),
                'choices'     => array(
                    'min'   => 10,
                    'max'   => 50,
                    'step'  => 1,
                ),
                'active_callback' => 'blossom_feminine_pro_fonts_callback',                 
            )
        )
    );
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_typography_body' );

/**
 * Active Callback
*/
function blossom_feminine_pro_fonts_callback( $control ){
    
    $child_theme_support    = $control->manager->get_setting( 'child_additional_support' )->value();
    $control_id             = $control->id;
    
    if ( $control_id == 'primary_font' && $child_theme_support == 'default' ) return true;
    if ( $control_id == 'secondary_font' && $child_theme_support == 'default' ) return true;
    if ( $control_id == 'font_size' && $child_theme_support == 'default' ) return true;
    if ( $control_id == 'primary_font_chic' && $child_theme_support == 'blossom_chic' ) return true;
    if ( $control_id == 'secondary_font_chic' && $child_theme_support == 'blossom_chic' ) return true;
    if ( $control_id == 'font_size_chic' && $child_theme_support == 'blossom_chic' ) return true;
    if ( $control_id == 'primary_font_mommy' && $child_theme_support == 'mommy_blog' ) return true;
    if ( $control_id == 'secondary_font_mommy' && $child_theme_support == 'mommy_blog' ) return true;
    if ( $control_id == 'font_size_mommy' && $child_theme_support == 'mommy_blog' ) return true;
    if ( $control_id == 'primary_font_beauty' && $child_theme_support == 'blossom_beauty' ) return true;
    if ( $control_id == 'secondary_font_beauty' && $child_theme_support == 'blossom_beauty' ) return true;
    if ( $control_id == 'font_size_beauty' && $child_theme_support == 'blossom_beauty' ) return true;
    if ( $control_id == 'primary_font_diva' && $child_theme_support == 'blossom_diva' ) return true;
    if ( $control_id == 'secondary_font_diva' && $child_theme_support == 'blossom_diva' ) return true;
    if ( $control_id == 'font_size_diva' && $child_theme_support == 'blossom_diva' ) return true;
        
    return false;
}