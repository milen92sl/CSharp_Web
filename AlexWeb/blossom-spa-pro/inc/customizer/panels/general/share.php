<?php
/**
 * Social Sharing Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_general_sharing( $wp_customize ) {
	
    /** Social Sharing */
    $wp_customize->add_section(
        'social_sharing',
        array(
            'title'    => __( 'Social Sharing', 'blossom-spa-pro' ),
            'priority' => 31,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Sharing Buttons */
    $wp_customize->add_setting(
        'ed_social_sharing',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_social_sharing',
			array(
				'section'     => 'social_sharing',
				'label'       => __( 'Enable Social Sharing Buttons', 'blossom-spa-pro' ),
                'description' => __( 'Enable or disable social sharing buttons on archive and single posts.', 'blossom-spa-pro' ),
			)
		)
	);
    
    /** Enable Social Sharing Buttons */
    $wp_customize->add_setting(
        'ed_og_tags',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_og_tags',
			array(
				'section'     => 'social_sharing',
				'label'       => __( 'Enable Open Graph Meta Tags', 'blossom-spa-pro' ),
                'description' => __( 'Disable this option if you\'re using Jetpack, Yoast or other plugin to maintain Open Graph meta tags.', 'blossom-spa-pro' ),
			)
		)
	);
    
    /** Social Sharing Buttons */
    $wp_customize->add_setting(
		'social_share', 
		array(
			'default' => array( 'facebook', 'twitter', 'pinterest', 'gplus' ),
			'sanitize_callback' => 'blossom_spa_pro_sanitize_sortable',						
		)
	);

	$wp_customize->add_control(
		new Blossom_Spa_Pro_Sortable_Control(
			$wp_customize,
			'social_share',
			array(
				'section'     => 'social_sharing',
				'label'       => __( 'Social Sharing Buttons', 'blossom-spa-pro' ),
				'description' => __( 'Sort or toggle social sharing buttons.', 'blossom-spa-pro' ),
				'choices'     => array(
            		'facebook'  => __( 'Facebook', 'blossom-spa-pro' ),
            		'twitter'   => __( 'Twitter', 'blossom-spa-pro' ),
            		'linkedin'  => __( 'Linkedin', 'blossom-spa-pro' ),
            		'pinterest' => __( 'Pinterest', 'blossom-spa-pro' ),
            		'email'     => __( 'Email', 'blossom-spa-pro' ),
                    'reddit'    => __( 'Reddit', 'blossom-spa-pro' ),
                    'tumblr'    => __( 'Tumblr', 'blossom-spa-pro' ),
                    'digg'      => __( 'Digg', 'blossom-spa-pro' ),
                    'weibo'     => __( 'Weibo', 'blossom-spa-pro' ),
                    'xing'      => __( 'Xing', 'blossom-spa-pro' ),
                    'vk'        => __( 'VK', 'blossom-spa-pro' ),
                    'pocket'    => __( 'GetPocket', 'blossom-spa-pro' ),             
            	),
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_general_sharing' );