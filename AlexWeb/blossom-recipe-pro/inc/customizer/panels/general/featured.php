<?php
/**
 * Featured Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_general_featured( $wp_customize ) {
    
    /** Featured Area Settings */
    $wp_customize->add_section(
        'featured_area_settings',
        array(
            'title'    => __( 'Featured Area Settings', 'blossom-recipe-pro' ),
            'priority' => 20,
            'panel'    => 'general_settings',
        )
    );

    /** Enable Featured Area */
    $wp_customize->add_setting( 
        'ed_featured_area', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_featured_area',
			array(
				'section'     => 'featured_area_settings',
				'label'	      => __( 'Enable Featured Area', 'blossom-recipe-pro' ),
                'description' => __( 'Enable to show Featured Area in home page.', 'blossom-recipe-pro' ),
			)
		)
	);
    
    $wp_customize->add_setting( 
        'tab_type', 
        array(
            'default'           => 'featured',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Recipe_Pro_Radio_Buttonset_Control(
            $wp_customize,
            'tab_type',
            array(
                'section'     => 'featured_area_settings',
                'label'       => __( 'Tabs', 'blossom-recipe-pro' ),
                'description' => __( 'Choose tabs for its section settings.', 'blossom-recipe-pro' ),
                'choices'     => array(
                    'featured'  => __( 'Featured', 'blossom-recipe-pro' ),
                    'popular'   => __( 'Popular', 'blossom-recipe-pro' ),
                    'latest'    => __( 'Latest', 'blossom-recipe-pro' ),
                ),
                'active_callback' => 'blossom_recipe_pro_featured_ac'
            )
        )
    );

    /** Featured Section Type Taxonomy */    
    $wp_customize->add_setting( 
        'featured_type', 
        array(
            'default'           => 'post',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Radio_Buttonset_Control(
			$wp_customize,
			'featured_type',
			array(
				'section'	  => 'featured_area_settings',
				'label'       => __( 'Featured Content Type', 'blossom-recipe-pro' ),
                'description' => __( 'Choose featured content type.', 'blossom-recipe-pro' ),
				'choices'	  => blossom_recipe_pro_featured_options(),
                'active_callback' => 'blossom_recipe_pro_featured_ac'
			)
		)
	);
    
    /** Featured Content One */
    $wp_customize->add_setting(
		'featured_post_one',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Recipe_Pro_Select_Control(
    		$wp_customize,
    		'featured_post_one',
    		array(
                'label'	          => __( 'Featured Post One', 'blossom-recipe-pro' ),
    			'section'         => 'featured_area_settings',
    			'choices'         => blossom_recipe_pro_get_posts(),	
                'active_callback' => 'blossom_recipe_pro_featured_ac'
     		)
		)
	);
    
    /** Featured Post Two */
    $wp_customize->add_setting(
		'featured_post_two',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Recipe_Pro_Select_Control(
    		$wp_customize,
    		'featured_post_two',
    		array(
                'label'	          => __( 'Featured Post Two', 'blossom-recipe-pro' ),
    			'section'         => 'featured_area_settings',
    			'choices'         => blossom_recipe_pro_get_posts(),
                'active_callback' => 'blossom_recipe_pro_featured_ac'	
     		)
		)
	);
    
    /** Featured Post Three */
    $wp_customize->add_setting(
		'featured_post_three',
		array(
			'default'			=> '',
			'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Recipe_Pro_Select_Control(
    		$wp_customize,
    		'featured_post_three',
    		array(
                'label'	          => __( 'Featured Post Three', 'blossom-recipe-pro' ),
    			'section'         => 'featured_area_settings',
    			'choices'         => blossom_recipe_pro_get_posts(),	
                'active_callback' => 'blossom_recipe_pro_featured_ac'
     		)
		)
	);

    /** Featured Post Four */
    $wp_customize->add_setting(
        'featured_post_four',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Pro_Select_Control(
            $wp_customize,
            'featured_post_four',
            array(
                'label'           => __( 'Featured Post Four', 'blossom-recipe-pro' ),
                'section'         => 'featured_area_settings',
                'choices'         => blossom_recipe_pro_get_posts(),    
                'active_callback' => 'blossom_recipe_pro_featured_ac'
            )
        )
    );

    if ( is_brm_activated() ) {
        /** Featured Recipe One */
        $wp_customize->add_setting(
            'featured_recipe_one',
            array(
                'default'           => '',
                'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
            )
        );

        $wp_customize->add_control(
            new Blossom_Recipe_Pro_Select_Control(
                $wp_customize,
                'featured_recipe_one',
                array(
                    'label'           => __( 'Featured Recipe One', 'blossom-recipe-pro' ),
                    'section'         => 'featured_area_settings',
                    'choices'         => blossom_recipe_pro_get_posts( 'blossom-recipe' ),    
                    'active_callback' => 'blossom_recipe_pro_featured_ac'
                )
            )
        );
        
        /** Featured Recipe Two */
        $wp_customize->add_setting(
            'featured_recipe_two',
            array(
                'default'           => '',
                'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
            )
        );

        $wp_customize->add_control(
            new Blossom_Recipe_Pro_Select_Control(
                $wp_customize,
                'featured_recipe_two',
                array(
                    'label'           => __( 'Featured Recipe Two', 'blossom-recipe-pro' ),
                    'section'         => 'featured_area_settings',
                    'choices'         => blossom_recipe_pro_get_posts( 'blossom-recipe' ),
                    'active_callback' => 'blossom_recipe_pro_featured_ac'   
                )
            )
        );
        
        /** Featured Recipe Three */
        $wp_customize->add_setting(
            'featured_recipe_three',
            array(
                'default'           => '',
                'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
            )
        );

        $wp_customize->add_control(
            new Blossom_Recipe_Pro_Select_Control(
                $wp_customize,
                'featured_recipe_three',
                array(
                    'label'           => __( 'Featured Recipe Three', 'blossom-recipe-pro' ),
                    'section'         => 'featured_area_settings',
                    'choices'         => blossom_recipe_pro_get_posts( 'blossom-recipe' ),    
                    'active_callback' => 'blossom_recipe_pro_featured_ac'
                )
            )
        );

        /** Featured Recipe Four */
        $wp_customize->add_setting(
            'featured_recipe_four',
            array(
                'default'           => '',
                'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
            )
        );

        $wp_customize->add_control(
            new Blossom_Recipe_Pro_Select_Control(
                $wp_customize,
                'featured_recipe_four',
                array(
                    'label'           => __( 'Featured Recipe Four', 'blossom-recipe-pro' ),
                    'section'         => 'featured_area_settings',
                    'choices'         => blossom_recipe_pro_get_posts( 'blossom-recipe' ),    
                    'active_callback' => 'blossom_recipe_pro_featured_ac'
                )
            )
        );
    }
    /** Add Featured Content */
    $wp_customize->add_setting( 
        new Blossom_Recipe_Pro_Repeater_Setting( 
            $wp_customize, 
            'featured_custom', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Blossom_Recipe_Pro_Repeater_Setting', 'sanitize_repeater_setting' ),                             
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Control_Repeater(
			$wp_customize,
			'featured_custom',
			array(
				'section' => 'featured_area_settings',				
				'label'	  => __( 'Add featured content', 'blossom-recipe-pro' ),
                'fields'  => array(
                    'thumbnail' => array(
                        'type'  => 'image', 
                        'label' => __( 'Add Image', 'blossom-recipe-pro' ),                
                    ),
                    'title'     => array(
                        'type'  => 'text',
                        'label' => __( 'Title', 'blossom-recipe-pro' ),
                    ),
                    'link'     => array(
                        'type'  => 'text',
                        'label' => __( 'Link', 'blossom-recipe-pro' ),
                    ),
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => __( 'featured content', 'blossom-recipe-pro' ),
                    'field' => 'title'
                ),
                'choices'   => array(
                    'limit' => 4 
                ),
                'active_callback' => 'blossom_recipe_pro_featured_ac'                                              
			)
		)
	);

    /** Featured Section Type */    
    $wp_customize->add_setting( 
        'popular_type', 
        array(
            'default'           => 'post',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Recipe_Pro_Radio_Buttonset_Control(
            $wp_customize,
            'popular_type',
            array(
                'section'     => 'featured_area_settings',
                'label'       => __( 'Choose Posttype', 'blossom-recipe-pro' ),
                'description' => __( 'Choose popular content type.', 'blossom-recipe-pro' ),
                'choices'     => blossom_recipe_pro_popular_options(),
                'active_callback' => 'blossom_recipe_pro_featured_ac'
            )
        )
    );

    $wp_customize->add_setting( 
        'popular_content_type', 
        array(
            'default'           => 'view_count',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Recipe_Pro_Radio_Buttonset_Control(
            $wp_customize,
            'popular_content_type',
            array(
                'section'     => 'featured_area_settings',
                'label'       => __( 'Show Popular From', 'blossom-recipe-pro' ),
                'description' => __( 'Choose popular content type from.', 'blossom-recipe-pro' ),
                'choices'     => array(
                    'view_count'    => __( 'Views Count', 'blossom-recipe-pro' ),
                    'comment_count' => __( 'Comments Count', 'blossom-recipe-pro' ),
                ),
                'active_callback' => 'blossom_recipe_pro_featured_ac'
            )
        )
    );

    /** Latest Section Type */    
    $wp_customize->add_setting( 
        'latest_type', 
        array(
            'default'           => 'post',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Recipe_Pro_Radio_Buttonset_Control(
            $wp_customize,
            'latest_type',
            array(
                'section'     => 'featured_area_settings',
                'label'       => __( 'Latest Content Type', 'blossom-recipe-pro' ),
                'description' => __( 'Choose latest content type from.', 'blossom-recipe-pro' ),
                'choices'     => blossom_recipe_pro_featured_latest_options(),
                'active_callback' => 'blossom_recipe_pro_featured_ac'
            )
        )
    );

    /** Featured Area Settings Ends */
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_general_featured' );

if ( ! function_exists( 'blossom_recipe_pro_featured_latest_options' ) ) :
    /**
     * @return array Content type options
     */
    function blossom_recipe_pro_featured_latest_options() {
        $latest_options = array(
            'post' => __( 'Latest Posts', 'blossom-recipe-pro' ),
        );
        if ( is_brm_activated() ) {
            $latest_options = array_merge( $latest_options, array( 'blossom-recipe' => __( 'Latest Recipes','blossom-recipe-pro' ) ) );
        }
        $output = apply_filters( 'blossom_recipe_pro_featured_latest_options', $latest_options );
        return $output;
    }
endif;

if ( ! function_exists( 'blossom_recipe_pro_featured_options' ) ) :
    /**
     * @return array Content type options
     */
    function blossom_recipe_pro_featured_options() {
        $featured_options = array(
            'post'   => __( 'Post', 'blossom-recipe-pro' ),
            'custom' => __( 'Custom', 'blossom-recipe-pro' ),
        );
        if ( is_brm_activated() ) {
            $featured_options = array_merge( $featured_options, array( 'recipe' => __( 'Recipe','blossom-recipe-pro' ) ) );
        }
        $output = apply_filters( 'blossom_recipe_pro_featured_options', $featured_options );
        return $output;
    }
endif;

if ( ! function_exists( 'blossom_recipe_pro_popular_options' ) ) :
    /**
     * @return array Content type options
     */
    function blossom_recipe_pro_popular_options() {
        $popular_options = array(
            'post' => __( 'Post', 'blossom-recipe-pro' ),
        );
        if ( is_brm_activated() ) {
            $popular_options = array_merge( $popular_options, array( 'blossom-recipe' => __( 'Recipe','blossom-recipe-pro' ) ) );
        }
        $output = apply_filters( 'blossom_recipe_pro_popular_options', $popular_options );
        return $output;
    }
endif;