<?php
/**
 * Post Page Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_general_post_page( $wp_customize ) {
    
    /** Posts(Blog) & Pages Settings */
    $wp_customize->add_section(
        'post_page_settings',
        array(
            'title'    => __( 'Posts(Blog) & Pages Settings', 'blossom-pin-pro' ),
            'priority' => 50,
            'panel'    => 'general_settings',
        )
    );
    
    /** Prefix Archive Page */
    $wp_customize->add_setting( 
        'ed_prefix_archive', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_prefix_archive',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Prefix in Archive Page', 'blossom-pin-pro' ),
                'description' => __( 'Enable to hide prefix in archive page.', 'blossom-pin-pro' ),
			)
		)
	);
        
    /** Blog Excerpt */
    $wp_customize->add_setting( 
        'ed_excerpt', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_excerpt',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Enable Blog Excerpt', 'blossom-pin-pro' ),
                'description' => __( 'Enable to show excerpt or disable to show full post content.', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Excerpt Length */
    $wp_customize->add_setting( 
        'excerpt_length', 
        array(
            'default'           => 55,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Slider_Control( 
			$wp_customize,
			'excerpt_length',
			array(
				'section'	  => 'post_page_settings',
				'label'		  => __( 'Excerpt Length', 'blossom-pin-pro' ),
				'description' => __( 'Automatically generated excerpt length (in words).', 'blossom-pin-pro' ),
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 100,
					'step'	=> 5,
				),
                'active_callback' => 'blossom_pin_pro_blog_excerpt',                 
			)
		)
	);
    
    /** Read More Text */
    $wp_customize->add_setting(
        'read_more_text',
        array(
            'default'           => __( 'Read More', 'blossom-pin-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'read_more_text',
        array(
            'type'    => 'text',
            'section' => 'post_page_settings',
            'label'   => __( 'Read More Text', 'blossom-pin-pro' ),
            'active_callback' => 'blossom_pin_pro_blog_excerpt',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'read_more_text', array(
        'selector' => '.entry-footer .read-more',
        'render_callback' => 'blossom_pin_pro_get_read_more',
    ) );
    
    /** Note */
    $wp_customize->add_setting(
        'post_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Note_Control( 
			$wp_customize,
			'post_note_text',
			array(
				'section'	  => 'post_page_settings',
                'description' => sprintf( __( '%s These options affect your individual posts.', 'blossom-pin-pro' ), '<hr/>' ),
			)
		)
    );

    /** Show Featured Image */
    $wp_customize->add_setting( 
        'ed_featured_image', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Toggle_Control( 
            $wp_customize,
            'ed_featured_image',
            array(
                'section'         => 'post_page_settings',
                'label'           => __( 'Show Featured Image', 'blossom-pin-pro' ),
                'description'     => __( 'Enable to show featured image in post detail (single post).', 'blossom-pin-pro' ),
                'active_callback' => 'blossom_pin_pro_post_page_ac'
            )
        )
    );

     /** Hide Category */
    $wp_customize->add_setting( 
        'ed_category', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Toggle_Control( 
            $wp_customize,
            'ed_category',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Hide Category', 'blossom-pin-pro' ),
                'description' => __( 'Enable to hide category.', 'blossom-pin-pro' ),
            )
        )
    );
    
    /** Hide Post Author */
    $wp_customize->add_setting(
        'ed_post_author',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Toggle_Control(
            $wp_customize,
            'ed_post_author',
            array(
                'section'           => 'post_page_settings',
                'label'             => __( 'Hide Post Author', 'blossom-pin-pro'),
                'description'       => __( 'Enable to hide the single post author.', 'blossom-pin-pro'),
            )
        )
    );

    /** Enable Time Ago Format */
    $wp_customize->add_setting(
        'ed_time_ago',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox'
        )
    );  

    $wp_customize->add_control(
        new Blossom_Pin_Pro_Toggle_Control(
            $wp_customize,
            'ed_time_ago',
            array(
                'section'       => 'post_page_settings',
                'label'         => __('Enable Time ago format', 'blossom-pin-pro'),
                'description'   => __('Enable to use time ago date format.', 'blossom-pin-pro'),
            )
        )
    );

    /** Hide Posted Date */
    $wp_customize->add_setting( 
        'ed_post_date', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Toggle_Control( 
            $wp_customize,
            'ed_post_date',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Hide Posted Date', 'blossom-pin-pro' ),
                'description' => __( 'Enable to hide posted date.', 'blossom-pin-pro' ),
            )
        )
    );
      
    /** Hide Author Box*/
    $wp_customize->add_setting( 
        'ed_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_author',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Author Section', 'blossom-pin-pro' ),
                'description' => __( 'Enable to hide author section located below the post.', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Show Related Posts */
    $wp_customize->add_setting( 
        'ed_related', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_related',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Show Related Posts', 'blossom-pin-pro' ),
                'description' => __( 'Enable to show related posts in single page.', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Related Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => __( 'Recommended Articles', 'blossom-pin-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'            => 'text',
            'section'         => 'post_page_settings',
            'label'           => __( 'Related Posts Section Title', 'blossom-pin-pro' ),
            'active_callback' => 'blossom_pin_pro_post_page_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector' => '.recommended-post .section-title',
        'render_callback' => 'blossom_pin_pro_get_related_title',
    ) );
    
    /** Related Post Taxonomy */    
    $wp_customize->add_setting( 
        'related_taxonomy', 
        array(
            'default'           => 'cat',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Radio_Buttonset_Control(
			$wp_customize,
			'related_taxonomy',
			array(
				'section'	  => 'post_page_settings',
				'label'       => __( 'Related Post Taxonomy', 'blossom-pin-pro' ),
                'description' => __( 'Choose Categories/Tags to display related post based on in Single Post.', 'blossom-pin-pro' ),
				'choices'	  => array(
					'cat'   => __( 'Category', 'blossom-pin-pro' ),
                    'tag'   => __( 'Tags', 'blossom-pin-pro' ),
				),
                'active_callback' => 'blossom_pin_pro_post_page_ac'
			)
		)
	);
    
    /** Comments */
    $wp_customize->add_setting(
        'ed_comments',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_comments',
			array(
				'section'     => 'post_page_settings',
				'label'       => __( 'Show Comments', 'blossom-pin-pro' ),
                'description' => __( 'Enable to show Comments in Single Post/Page.', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Sticky Header */
    $wp_customize->add_setting(
        'ed_sticky_single_header',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Pin_Pro_Toggle_Control( 
            $wp_customize,
            'ed_sticky_single_header',
            array(
                'section'       => 'post_page_settings',
                'label'         => __( 'Single Sticky Header', 'blossom-pin-pro' ),
                'description'   => __( 'Disable to hide header at top in single posts.', 'blossom-pin-pro' ),
            )
        )
    );
   
    /** Posts(Blog) & Pages Settings Ends */
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_general_post_page' );