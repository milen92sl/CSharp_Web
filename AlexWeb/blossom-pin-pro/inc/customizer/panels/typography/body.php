<?php
/**
 * Typography Body Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_typography_body( $wp_customize ) {
    
    /** Body Settings */
    $wp_customize->add_section(
        'body_settings',
        array(
            'title'    => __( 'Body Settings', 'blossom-pin-pro' ),
            'priority' => 10,
            'panel'    => 'typography_settings'
        )
    );
    
    /** Primary Font */
    $wp_customize->add_setting(
		'primary_font',
		array(
			'default'			=> 'Nunito',
			'sanitize_callback' => 'blossom_pin_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Pin_Pro_Select_Control(
    		$wp_customize,
    		'primary_font',
    		array(
                'label'	      => __( 'Primary Font', 'blossom-pin-pro' ),
                'description' => __( 'Primary font of the site.', 'blossom-pin-pro' ),
    			'section'     => 'body_settings',
    			'choices'     => blossom_pin_pro_get_all_fonts(),
                'active_callback' => 'blossom_pin_pro_theme_fonts_callback',	
     		)
		)
	);
    
    /** Secondary Font */
    $wp_customize->add_setting(
		'secondary_font',
		array(
			'default'			=> 'Cormorant Garamond',
			'sanitize_callback' => 'blossom_pin_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Pin_Pro_Select_Control(
    		$wp_customize,
    		'secondary_font',
    		array(
                'label'	      => __( 'Secondary Font', 'blossom-pin-pro' ),
                'description' => __( 'Secondary font of the site.', 'blossom-pin-pro' ),
    			'section'     => 'body_settings',
    			'choices'     => blossom_pin_pro_get_all_fonts(),
                'active_callback' => 'blossom_pin_pro_theme_fonts_callback',	
     		)
		)
	);

    /** Primary Font */
    $wp_customize->add_setting(
        'primary_font_pinthis',
        array(
            'default'           => 'Nunito Sans',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Pin_Pro_Select_Control(
            $wp_customize,
            'primary_font_pinthis',
            array(
                'label'       => __( 'Primary Font', 'blossom-pin-pro' ),
                'description' => __( 'Primary font of the site.', 'blossom-pin-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_pin_pro_get_all_fonts(),
                'active_callback' => 'blossom_pin_pro_theme_fonts_callback',   
            )
        )
    );
    
    /** Secondary Font */
    $wp_customize->add_setting(
        'secondary_font_pinthis',
        array(
            'default'           => 'Spectral',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Pin_Pro_Select_Control(
            $wp_customize,
            'secondary_font_pinthis',
            array(
                'label'       => __( 'Secondary Font', 'blossom-pin-pro' ),
                'description' => __( 'Secondary font of the site.', 'blossom-pin-pro' ),
                'section'     => 'body_settings',
                'choices'     => blossom_pin_pro_get_all_fonts(),
                'active_callback' => 'blossom_pin_pro_theme_fonts_callback',   
            )
        )
    );  
        
    /** Font Size*/
    $wp_customize->add_setting( 
        'font_size', 
        array(
            'default'           => 18,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Slider_Control( 
			$wp_customize,
			'font_size',
			array(
				'section'	  => 'body_settings',
				'label'		  => __( 'Font Size', 'blossom-pin-pro' ),
				'description' => __( 'Change the font size of your site.', 'blossom-pin-pro' ),
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 50,
					'step'	=> 1,
				)                 
			)
		)
	);
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_typography_body' );

/**
 * Active Callback
*/
function blossom_pin_pro_theme_fonts_callback( $control ){
    
    $child_theme_support    = $control->manager->get_setting( 'child_additional_support' )->value();
    $control_id             = $control->id;
    
    if ( $control_id == 'primary_font' && $child_theme_support == 'default' ) return true;
    if ( $control_id == 'secondary_font' && $child_theme_support == 'default' ) return true;
    if ( $control_id == 'primary_font_pinthis' && $child_theme_support == 'blossom_pinthis' ) return true;
    if ( $control_id == 'secondary_font_pinthis' && $child_theme_support == 'blossom_pinthis' ) return true;

    return false;
}