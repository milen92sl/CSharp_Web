<?php
/**
 * Social Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_general_social( $wp_customize ) {
    
    /** Social Media Settings */
    $wp_customize->add_section(
        'social_media_settings',
        array(
            'title'    => __( 'Social Media Settings', 'blossom-spa-pro' ),
            'priority' => 30,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_social_links', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_social_links',
			array(
				'section'     => 'social_media_settings',
				'label'	      => __( 'Enable Social Links', 'blossom-spa-pro' ),
                'description' => __( 'Enable to show social links at header and in footer.', 'blossom-spa-pro' ),
			)
		)
	);
    
    $wp_customize->add_setting( 
        new Blossom_Spa_Pro_Repeater_Setting( 
            $wp_customize, 
            'social_links', 
            array(
                'default' => array(
                    array(
                        'font' => 'fab fa-facebook-f',
                        'link' => 'https://www.facebook.com/',                        
                    ),
                    array(
                        'font' => 'fab fa-twitter',
                        'link' => 'https://twitter.com/',
                    ),
                    array(
                        'font' => 'fab fa-youtube',
                        'link' => 'https://www.youtube.com/',
                    ),
                    array(
                        'font' => 'fab fa-instagram',
                        'link' => 'https://www.instagram.com/',
                    ),
                    array(
                        'font' => 'fab fa-google-plus-g',
                        'link' => 'https://plus.google.com',
                    ),
                    array(
                        'font' => 'fab fa-odnoklassniki',
                        'link' => 'https://ok.ru/',
                    ),
                    array(
                        'font' => 'fab fa-vk',
                        'link' => 'https://vk.com/',
                    ),
                    array(
                        'font' => 'fab fa-xing',
                        'link' => 'https://www.xing.com/',
                    )
                ),
                'sanitize_callback' => array( 'Blossom_Spa_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Control_Repeater(
			$wp_customize,
			'social_links',
			array(
				'section' => 'social_media_settings',				
				'label'	  => __( 'Social Links', 'blossom-spa-pro' ),
				'fields'  => array(
                    'font' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'blossom-spa-pro' ),
                        'description' => __( 'Example: fab fa-facebook-f', 'blossom-spa-pro' ),
                    ),
                    'link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Link', 'blossom-spa-pro' ),
                        'description' => __( 'Example: https://facebook.com', 'blossom-spa-pro' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'links', 'blossom-spa-pro' ),
                    'field' => 'link'
                )                        
			)
		)
	);
    /** Social Media Settings Ends */
    
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_general_social' );