<?php
/**
 * Social Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_general_social( $wp_customize ) {
    
    /** Social Media Settings */
    $wp_customize->add_section(
        'social_media_settings',
        array(
            'title'    => __( 'Social Media Settings', 'blossom-feminine-pro' ),
            'priority' => 30,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_social_links', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_social_links',
			array(
				'section'     => 'social_media_settings',
				'label'	      => __( 'Enable Social Links', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to show social links at header.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    $wp_customize->add_setting( 
        new Blossom_Feminine_Pro_Repeater_Setting( 
            $wp_customize, 
            'social_links', 
            array(
                'default' => array(
                    array(
                        'font' => 'fa fa-facebook',
                        'link' => 'https://www.facebook.com/',                        
                    ),
                    array(
                        'font' => 'fa fa-twitter',
                        'link' => 'https://twitter.com/',
                    ),
                    array(
                        'font' => 'fa fa-youtube-play',
                        'link' => 'https://www.youtube.com/',
                    ),
                    array(
                        'font' => 'fa fa-instagram',
                        'link' => 'https://www.instagram.com/',
                    ),
                    array(
                        'font' => 'fa fa-google-plus',
                        'link' => 'https://plus.google.com',
                    ),
                    array(
                        'font' => 'fa fa-odnoklassniki',
                        'link' => 'https://ok.ru/',
                    ),
                    array(
                        'font' => 'fa fa-vk',
                        'link' => 'https://vk.com/',
                    ),
                    array(
                        'font' => 'fa fa-xing',
                        'link' => 'https://www.xing.com/',
                    )
                ),
                'sanitize_callback' => array( 'Blossom_Feminine_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Control_Repeater(
			$wp_customize,
			'social_links',
			array(
				'section' => 'social_media_settings',				
				'label'	  => __( 'Social Links', 'blossom-feminine-pro' ),
				'fields'  => array(
                    'font' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'blossom-feminine-pro' ),
                        'description' => __( 'Example: fa-bell', 'blossom-feminine-pro' ),
                    ),
                    'link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Link', 'blossom-feminine-pro' ),
                        'description' => __( 'Example: http://facebook.com', 'blossom-feminine-pro' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'links', 'blossom-feminine-pro' ),
                    'field' => 'link'
                )                        
			)
		)
	);
    /** Social Media Settings Ends */
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_general_social' );