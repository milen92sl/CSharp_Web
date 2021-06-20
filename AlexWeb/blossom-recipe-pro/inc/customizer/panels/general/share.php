<?php
/**
 * Social Sharing Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_general_sharing( $wp_customize ) {
	
    /** Social Sharing */
    $wp_customize->add_section(
        'social_sharing',
        array(
            'title'    => __( 'Social Sharing', 'blossom-recipe-pro' ),
            'priority' => 31,
            'panel'    => 'general_settings',
        )
    );
    
    /** Enable Social Sharing Buttons */
    $wp_customize->add_setting(
        'ed_social_sharing',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_social_sharing',
			array(
				'section'     => 'social_sharing',
				'label'       => __( 'Enable Social Sharing Buttons', 'blossom-recipe-pro' ),
                'description' => __( 'Enable or disable social sharing buttons on archive and single posts.', 'blossom-recipe-pro' ),
			)
		)
	);
    
    /** Enable Social Sharing Buttons */
    $wp_customize->add_setting(
        'ed_og_tags',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_og_tags',
			array(
				'section'     => 'social_sharing',
				'label'       => __( 'Enable Open Graph Meta Tags', 'blossom-recipe-pro' ),
                'description' => __( 'Disable this option if you\'re using Jetpack, Yoast or other plugin to maintain Open Graph meta tags.', 'blossom-recipe-pro' ),
			)
		)
	);

    /** Social Share Text */
    $wp_customize->add_setting(
        'social_share_title',
        array(
            'default'           => __( 'Share', 'blossom-recipe-pro' ),
            'sanitize_callback' => 'sanitize_text_field', 
        )
    );
    
    $wp_customize->add_control(
        'social_share_title',
        array(
            'type'    => 'text',
            'section' => 'social_sharing',
            'label'   => __( 'Social Share Title', 'blossom-recipe-pro' ),
            'description' => __( 'Add title for social share.', 'blossom-recipe-pro' ),
        )
    );
    
    /** Social Sharing Buttons */
    $wp_customize->add_setting(
		'social_share', 
		array(
			'default' => array( 'facebook', 'twitter', 'pinterest', 'linkedin' ),
			'sanitize_callback' => 'blossom_recipe_pro_sanitize_sortable',						
		)
	);

	$wp_customize->add_control(
		new Blossom_Recipe_Pro_Sortable_Control(
			$wp_customize,
			'social_share',
			array(
				'section'     => 'social_sharing',
				'label'       => __( 'Social Sharing Buttons', 'blossom-recipe-pro' ),
				'description' => __( 'Sort or toggle social sharing buttons.', 'blossom-recipe-pro' ),
				'choices'     => array(
            		'facebook'  => __( 'Facebook', 'blossom-recipe-pro' ),
            		'twitter'   => __( 'Twitter', 'blossom-recipe-pro' ),
                    'pinterest' => __( 'Pinterest', 'blossom-recipe-pro' ),
            		'linkedin'  => __( 'Linkedin', 'blossom-recipe-pro' ),            		
            		'email'     => __( 'Email', 'blossom-recipe-pro' ),
            		'reddit'    => __( 'Reddit', 'blossom-recipe-pro' ),
                    'tumblr'    => __( 'Tumblr', 'blossom-recipe-pro' ),
                    'digg'      => __( 'Digg', 'blossom-recipe-pro' ),
                    'weibo'     => __( 'Weibo', 'blossom-recipe-pro' ),
                    'xing'      => __( 'Xing', 'blossom-recipe-pro' ),
                    'vk'        => __( 'VK', 'blossom-recipe-pro' ),
                    'pocket'    => __( 'GetPocket', 'blossom-recipe-pro' ),            
            	),
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_general_sharing' );