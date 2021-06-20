<?php
/**
 * Contact Page Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_contact_map( $wp_customize ) {
    
    /** Google Map Settings */
    $wp_customize->add_section(
        'google_map_settings',
        array(
            'title'    => __( 'Google Map Settings', 'blossom-fashion-pro' ),
            'priority' => 20,
            'panel'    => 'contact_page_setting',
        )
    );
    
    /** Enable Google Map */
    $wp_customize->add_setting(
        'ed_google_map',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_google_map',
			array(
				'section'	  => 'google_map_settings',
				'label'		  => __( 'Enable Google Map', 'blossom-fashion-pro' ),
				'description' => __( 'If disabled the featured image of the page will be displayed if set.', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Enable Scrolling Wheel */
    $wp_customize->add_setting(
        'ed_map_scroll',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_map_scroll',
			array(
				'section'	  => 'google_map_settings',
				'label'		  => __( 'Enable Scrolling Wheel', 'blossom-fashion-pro' ),
				'description' => __( 'Zoom map on Scrolling.', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Enable Map Controls */
    $wp_customize->add_setting(
        'ed_map_controls',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_map_controls',
			array(
				'section'	  => 'google_map_settings',
				'label'		  => __( 'Enable Map Controls', 'blossom-fashion-pro' ),
				'description' => __( 'Controls icons that appears above Map.', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Enable Map Marker */
    $wp_customize->add_setting(
        'ed_map_marker',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control( 
			$wp_customize,
			'ed_map_marker',
			array(
				'section'	  => 'google_map_settings',
				'label'		  => __( 'Enable Map Marker', 'blossom-fashion-pro' ),
				'description' => __( 'Marker icons that appears above Map.', 'blossom-fashion-pro' ),
			)
		)
	);
    
    /** Marker Title  */
    $wp_customize->add_setting(
        'marker_title',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'marker_title',
        array(
            'label'       => __( 'Marker Title', 'blossom-fashion-pro' ),
            'description' => __( 'Enter the Marker Title.', 'blossom-fashion-pro' ),
            'section'     => 'google_map_settings',
            'type'        => 'text',
            'active_callback' => 'blossom_fashion_pro_google_map_ac'                        
        )
    );
    
    /** Google Map API Key  */
    $wp_customize->add_setting(
        'map_api',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'map_api',
        array(
            'label'       => __( 'Google Map API Key', 'blossom-fashion-pro' ),
            'description' => sprintf( __( 'Enter the google map api key here. You can get API key from %1$shere.%2$s', 'blossom-fashion-pro' ), '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">', '</a>' ),
            'section'     => 'google_map_settings',
            'type'        => 'text',                        
        )
    );
    
    /** Latitude  */
    $wp_customize->add_setting(
        'latitude',
        array(
            'default'           => 27.7204766,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_number_floatval',
        )
    );
    
    $wp_customize->add_control(
        'latitude',
        array(
            'label'       => __( 'Latitude', 'blossom-fashion-pro' ),
            'description' => __( 'Enter the Latitude of your location.', 'blossom-fashion-pro' ),
            'section'     => 'google_map_settings',
            'type'        => 'number',                        
        )
    );
    
    /** Longitude  */
    $wp_customize->add_setting(
        'longitude',
        array(
            'default'           => 85.3389148,
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_number_floatval',
        )
    );
    
    $wp_customize->add_control(
        'longitude',
        array(
            'label'       => __( 'Longitude', 'blossom-fashion-pro' ),
            'description' => __( 'Enter the Longitude of your location.', 'blossom-fashion-pro' ),
            'section'     => 'google_map_settings',
            'type'        => 'number',                        
        )
    );
    
    /** Zoom Level */
    $wp_customize->add_setting(
		'map_zoom',
		array(
			'default'			=> 17,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
		)
	);
    
    $wp_customize->add_control(
		new Blossom_Fashion_Pro_Slider_Control( 
			$wp_customize,
			'map_zoom',
			array(
				'section' => 'google_map_settings',
				'label'	  => __( 'Zoom Level', 'blossom-fashion-pro' ),
				'choices' => array(
					'min' 	=> 1,
					'max' 	=> 19,
					'step'	=> 1,
				)
			)
		)
	);
        
}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_contact_map' );

/**
 * Active Callback for map marker
*/
function blossom_fashion_pro_google_map_ac( $control ){
    
    $ed_marker  = $control->manager->get_setting( 'ed_map_marker' )->value();
    
    if ( $ed_marker == true ) return true;
    
    return false;
}