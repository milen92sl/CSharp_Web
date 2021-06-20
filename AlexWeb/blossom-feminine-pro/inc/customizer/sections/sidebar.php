<?php
/**
 * Appearance Settings
 *
 * @package Blossom_Feminine_Pro
 */
 
function blossom_feminine_pro_customize_register_sidebar( $wp_customize ) {
    
    $wp_customize->add_section( 'sidebar_settings', array(
        'title'       => __( 'Sidebar Settings', 'blossom-feminine-pro' ),
        'priority'    => 65,
        'capability'  => 'edit_theme_options',
        'description' => __( 'Add custom sidebars. You need to save the changes and reload the customizer to use the sidebars in the dropdowns below.
You can add content to the sidebars in Appearance->Widgets.', 'blossom-feminine-pro' ),
    ) );
    
    /** Custom Sidebars */
    $wp_customize->add_setting( 
        new Blossom_Feminine_Pro_Repeater_Setting( 
            $wp_customize, 
            'sidebar', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Blossom_Feminine_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),                             
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Control_Repeater(
			$wp_customize,
			'sidebar',
			array(
				'section' => 'sidebar_settings',				
				'label'	  => __( 'Add Sidebars', 'blossom-feminine-pro' ),
                'fields'  => array(
                    'name' => array(
                        'type'         => 'text',
                        'label'        => __( 'Name', 'blossom-feminine-pro' ),
                        'description'  => __( 'Example: Homepage Sidebar', 'blossom-feminine-pro' ),
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'sidebar', 'blossom-feminine-pro' ),
                    'field' => 'name'
                )                                              
			)
		)
	);
    
    /** Home Page */
    $wp_customize->add_setting(
		'home_page_sidebar',
		array(
			'default'			=> 'sidebar',
			'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Pro_Select_Control(
    		$wp_customize,
    		'home_page_sidebar',
    		array(
                'label'	      => __( 'Home Page Sidebar', 'blossom-feminine-pro' ),
                'description' => __( 'Select a sidebar for the home page.', 'blossom-feminine-pro' ),
    			'section'     => 'sidebar_settings',
    			'choices'     => blossom_feminine_pro_get_dynamnic_sidebar( false, true ),	
     		)
		)
	);
    
    /** Single Page */
    $wp_customize->add_setting(
		'single_page_sidebar',
		array(
			'default'			=> 'sidebar',
			'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Pro_Select_Control(
    		$wp_customize,
    		'single_page_sidebar',
    		array(
                'label'	      => __( 'Single Page Sidebar', 'blossom-feminine-pro' ),
                'description' => __( 'Select a sidebar for the single pages. If a page has a custom sidebar set, it will override this.', 'blossom-feminine-pro' ),
    			'section'     => 'sidebar_settings',
    			'choices'     => blossom_feminine_pro_get_dynamnic_sidebar( true, true ),	
     		)
		)
	);
    
    /** Single Post */
    $wp_customize->add_setting(
		'single_post_sidebar',
		array(
			'default'			=> 'sidebar',
			'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Feminine_Pro_Select_Control(
    		$wp_customize,
    		'single_post_sidebar',
    		array(
                'label'	      => __( 'Single Post Sidebar', 'blossom-feminine-pro' ),
                'description' => __( 'Select a sidebar for the single posts. If a post has a custom sidebar set, it will override this.', 'blossom-feminine-pro' ),
    			'section'     => 'sidebar_settings',
    			'choices'     => blossom_feminine_pro_get_dynamnic_sidebar( true, true ),	
     		)
		)
	);  
    /** Sidebar Settings Ends */
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_sidebar' );