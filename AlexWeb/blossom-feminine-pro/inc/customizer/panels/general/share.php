<?php
/**
 * General Social Sharing Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_general_sharing( $wp_customize ) {
	
    /** Social Sharing */
    $wp_customize->add_section(
        'social_sharing',
        array(
            'title'    => __( 'Social Sharing', 'blossom-feminine-pro' ),
            'priority' => 31,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Sharing Buttons */
    $wp_customize->add_setting(
        'ed_social_sharing',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_social_sharing',
			array(
				'section'     => 'social_sharing',
				'label'       => __( 'Enable Social Sharing Buttons', 'blossom-feminine-pro' ),
                'description' => __( 'Enable or disable social sharing buttons on archive and single posts.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Enable Social Sharing Buttons */
    $wp_customize->add_setting(
        'ed_og_tags',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Toggle_Control( 
            $wp_customize,
            'ed_og_tags',
            array(
                'section'     => 'social_sharing',
                'label'       => __( 'Enable Open Graph Meta Tags', 'blossom-feminine-pro' ),
                'description' => __( 'Disable this option if you\'re using Jetpack, Yoast or other plugin to maintain Open Graph meta tags.', 'blossom-feminine-pro' ),
            )
        )
    );
    
    /** Social Sharing Buttons */
    $wp_customize->add_setting(
		'social_share', 
		array(
			'default' => array( 'facebook', 'twitter', 'pinterest', 'gplus' ),
			'sanitize_callback' => 'blossom_feminine_pro_sanitize_sortable',						
		)
	);

	$wp_customize->add_control(
		new Rara_Control_Sortable(
			$wp_customize,
			'social_share',
			array(
				'section'     => 'social_sharing',
				'label'       => __( 'Social Sharing Buttons', 'blossom-feminine-pro' ),
				'description' => __( 'Sort or toggle social sharing buttons.', 'blossom-feminine-pro' ),
				'choices'     => array(
            		'facebook'  => __( 'Facebook', 'blossom-feminine-pro' ),
            		'twitter'   => __( 'Twitter', 'blossom-feminine-pro' ),
            		'linkedIn'  => __( 'LinkedIn', 'blossom-feminine-pro' ),
            		'pinterest' => __( 'Pinterest', 'blossom-feminine-pro' ),
            		'email'     => __( 'Email', 'blossom-feminine-pro' ),
            		'gplus'     => __( 'Google Plus', 'blossom-feminine-pro' ),
                    'reddit'    => __( 'Reddit', 'blossom-feminine-pro' ), 
                    'tumblr'    => __( 'Tumblr', 'blossom-feminine-pro' ),
                    'digg'      => __( 'Digg', 'blossom-feminine-pro' ),
                    'weibo'     => __( 'Weibo', 'blossom-feminine-pro' ),
                    'xing'      => __( 'Xing', 'blossom-feminine-pro' ),
                    'vk'        => __( 'VK', 'blossom-feminine-pro' ),
                    'pocket'    => __( 'GetPocket', 'blossom-feminine-pro' ),
            	),
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_general_sharing' );