<?php
/**
 * Featured Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_general_featured( $wp_customize ) {
    
    /** Featured Area Settings */
    $wp_customize->add_section(
        'featured_area_settings',
        array(
            'title'    => __( 'Featured Area Settings', 'blossom-fashion-pro' ),
            'priority' => 20,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Featured Area */
    $wp_customize->add_setting( 
        'ed_featured_area', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_featured_area',
			array(
				'section'     => 'featured_area_settings',
				'label'	      => __( 'Enable Featured Area', 'blossom-fashion-pro' ),
                'description' => __( 'Enable to show Featured Area in home page.', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Related Post Taxonomy */    
    $wp_customize->add_setting( 
        'featured_type', 
        array(
            'default'           => 'page',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Radio_Buttonset_Control(
			$wp_customize,
			'featured_type',
			array(
				'section'	  => 'featured_area_settings',
				'label'       => __( 'Featured Content Type', 'blossom-fashion-pro' ),
                'description' => __( 'Choose featured content type.', 'blossom-fashion-pro' ),
				'choices'	  => array(
					'page'   => __( 'Page', 'blossom-fashion-pro' ),
                    'custom' => __( 'Custom', 'blossom-fashion-pro' ),
				),
			)
		)
	);
    
    /** Featured Content One */
    $wp_customize->add_setting(
		'featured_content_one',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Select_Control(
    		$wp_customize,
    		'featured_content_one',
    		array(
                'label'	          => __( 'Featured Content One', 'blossom-fashion-pro' ),
    			'section'         => 'featured_area_settings',
    			'choices'         => blossom_fashion_pro_get_posts( 'page' ),	
                'active_callback' => 'blossom_fashion_pro_featured_ac'
     		)
		)
	);
    
    /** Featured Content Two */
    $wp_customize->add_setting(
		'featured_content_two',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Select_Control(
    		$wp_customize,
    		'featured_content_two',
    		array(
                'label'	          => __( 'Featured Content Two', 'blossom-fashion-pro' ),
    			'section'         => 'featured_area_settings',
    			'choices'         => blossom_fashion_pro_get_posts( 'page' ),
                'active_callback' => 'blossom_fashion_pro_featured_ac'	
     		)
		)
	);
    
    /** Featured Content Three */
    $wp_customize->add_setting(
		'featured_content_three',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Select_Control(
    		$wp_customize,
    		'featured_content_three',
    		array(
                'label'	          => __( 'Featured Content Three', 'blossom-fashion-pro' ),
    			'section'         => 'featured_area_settings',
    			'choices'         => blossom_fashion_pro_get_posts( 'page' ),	
                'active_callback' => 'blossom_fashion_pro_featured_ac'
     		)
		)
	);
    
    /** Enable Featured Area */
    $wp_customize->add_setting( 
        'ed_open_tab', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Fashion_Pro_Toggle_Control( 
            $wp_customize,
            'ed_open_tab',
            array(
                'section'     => 'featured_area_settings',
                'label'       => __( 'Open in New Window', 'blossom-fashion-pro' ),
                'description' => __( 'Enable to open tab in new window.', 'blossom-fashion-pro' ),
                'active_callback' => 'blossom_fashion_pro_featured_ac'    
            )
        )
    );

    /** Add Featured Content */
    $wp_customize->add_setting( 
        new Blossom_Fashion_Pro_Repeater_Setting( 
            $wp_customize, 
            'featured_custom', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Blossom_Fashion_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),                             
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Control_Repeater(
			$wp_customize,
			'featured_custom',
			array(
				'section' => 'featured_area_settings',				
				'label'	  => __( 'Add featured content', 'blossom-fashion-pro' ),
                'fields'  => array(
                    'thumbnail' => array(
                        'type'  => 'image', 
                        'label' => __( 'Add Image', 'blossom-fashion-pro' ),                
                    ),
                    'title'     => array(
                        'type'  => 'text',
                        'label' => __( 'Title', 'blossom-fashion-pro' ),
                    ),
                    'link'     => array(
                        'type'  => 'text',
                        'label' => __( 'Link', 'blossom-fashion-pro' ),
                    ),
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'featured content', 'blossom-fashion-pro' ),
                    'field' => 'title'
                ),
                'choices'   => array(
                    'limit' => 3
                ),
                'active_callback' => 'blossom_fashion_pro_featured_ac'                                              
			)
		)
	);
    /** Featured Area Settings Ends */
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_general_featured' );

/**
 * Active Callback
*/
function blossom_fashion_pro_featured_ac( $control ){
    
    $featured_type   = $control->manager->get_setting( 'featured_type' )->value();
    $control_id      = $control->id;
    
    if ( $control_id == 'featured_content_one' && $featured_type == 'page' ) return true;
    if ( $control_id == 'featured_content_two' && $featured_type == 'page' ) return true;
    if ( $control_id == 'featured_content_three' && $featured_type == 'page' ) return true;
    if ( $control_id == 'featured_custom' && $featured_type == 'custom' ) return true;
    if ( $control_id == 'ed_open_tab' && $featured_type == 'custom' ) return true;
    
    return false;
}