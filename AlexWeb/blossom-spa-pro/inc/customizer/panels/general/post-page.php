<?php
/**
 * Post Page Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_general_post_page( $wp_customize ) {
    
    /** Posts(Blog) & Pages Settings */
    $wp_customize->add_section(
        'post_page_settings',
        array(
            'title'    => __( 'Posts(Blog) & Pages Settings', 'blossom-spa-pro' ),
            'priority' => 50,
            'panel'    => 'general_settings',
        )
    );
    
    /** Prefix Archive Page */
    $wp_customize->add_setting( 
        'ed_prefix_archive', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_prefix_archive',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Prefix in Archive Page', 'blossom-spa-pro' ),
                'description' => __( 'Enable to hide prefix in archive page.', 'blossom-spa-pro' ),
			)
		)
	);

    /** Single like */
    $wp_customize->add_setting(
        'ed_blog_like',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Toggle_Control( 
            $wp_customize,
            'ed_blog_like',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Show Like Button In Blog', 'blossom-spa-pro' ),
                'description' => __( 'Enable to show like button in Blog.', 'blossom-spa-pro' ),
            )
        )
    );
    
    /** Blog Excerpt */
    $wp_customize->add_setting( 
        'ed_excerpt', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_excerpt',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Enable Blog Excerpt', 'blossom-spa-pro' ),
                'description' => __( 'Enable to show excerpt or disable to show full post content.', 'blossom-spa-pro' ),
			)
		)
	);
    
    /** Excerpt Length */
    $wp_customize->add_setting( 
        'excerpt_length', 
        array(
            'default'           => 30,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Slider_Control( 
			$wp_customize,
			'excerpt_length',
			array(
				'section'	  => 'post_page_settings',
				'label'		  => __( 'Excerpt Length', 'blossom-spa-pro' ),
				'description' => __( 'Automatically generated excerpt length (in words).', 'blossom-spa-pro' ),
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 100,
					'step'	=> 5,
				)                 
			)
		)
	);
    
    /** Read More Text */
    $wp_customize->add_setting(
        'read_more_text',
        array(
            'default'           => __( 'Read More', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'read_more_text',
        array(
            'type'    => 'text',
            'section' => 'post_page_settings',
            'label'   => __( 'Read More Text', 'blossom-spa-pro' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'read_more_text', array(
        'selector' => '.entry-footer .btn-readmore',
        'render_callback' => 'blossom_spa_pro_get_read_more',
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
        new Blossom_Spa_Pro_Note_Control( 
			$wp_customize,
			'post_note_text',
			array(
				'section'	  => 'post_page_settings',
                'description' => sprintf( __( '%s These options affect your individual posts.', 'blossom-spa-pro' ), '<hr/>' ),
			)
		)
    );
    
    /** Hide Author Section */
    $wp_customize->add_setting( 
        'ed_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_author',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Author Section', 'blossom-spa-pro' ),
                'description' => __( 'Enable to hide author section.', 'blossom-spa-pro' ),
			)
		)
	);
    
    /** Show Related Posts */
    $wp_customize->add_setting( 
        'ed_related', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_related',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Show Related Posts', 'blossom-spa-pro' ),
                'description' => __( 'Enable to show related posts in single page.', 'blossom-spa-pro' ),
			)
		)
	);
    
    /** Related Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => __( 'Recommended Articles', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'            => 'text',
            'section'         => 'post_page_settings',
            'label'           => __( 'Related Posts Section Title', 'blossom-spa-pro' ),
            'active_callback' => 'blossom_spa_pro_post_page_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector' => '.related-posts .post-title span',
        'render_callback' => 'blossom_spa_pro_get_related_title',
    ) );
    
    /** Related Post Taxonomy */    
    $wp_customize->add_setting( 
        'related_taxonomy', 
        array(
            'default'           => 'cat',
            'sanitize_callback' => 'blossom_spa_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Radio_Buttonset_Control(
			$wp_customize,
			'related_taxonomy',
			array(
				'section'	  => 'post_page_settings',
				'label'       => __( 'Related Post Taxonomy', 'blossom-spa-pro' ),
                'description' => __( 'Choose Categories/Tags to display related post based on in Single Post.', 'blossom-spa-pro' ),
				'choices'	  => array(
					'cat'   => __( 'Category', 'blossom-spa-pro' ),
                    'tag'   => __( 'Tags', 'blossom-spa-pro' ),
				),
                'active_callback' => 'blossom_spa_pro_post_page_ac'
			)
		)
	);
    
    /** Single like */
    $wp_customize->add_setting(
        'ed_single_like',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Toggle_Control( 
            $wp_customize,
            'ed_single_like',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Show Like Button In Single', 'blossom-spa-pro' ),
                'description' => __( 'Enable to show like button in Single Post/Page.', 'blossom-spa-pro' ),
            )
        )
    );

    /** Comments */
    $wp_customize->add_setting(
        'ed_comments',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_comments',
			array(
				'section'     => 'post_page_settings',
				'label'       => __( 'Hide Comments', 'blossom-spa-pro' ),
                'description' => __( 'Enable to hide Comments in Single Post/Page.', 'blossom-spa-pro' ),
			)
		)
	);
    
    /** Hide Category */
    $wp_customize->add_setting( 
        'ed_category', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_category',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Category', 'blossom-spa-pro' ),
                'description' => __( 'Enable to hide category.', 'blossom-spa-pro' ),
			)
		)
	);
    
    /** Hide Post Author */
    $wp_customize->add_setting( 
        'ed_post_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_post_author',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Post Author', 'blossom-spa-pro' ),
                'description' => __( 'Enable to hide post author.', 'blossom-spa-pro' ),
			)
		)
	);
    
    /** Hide Posted Date */
    $wp_customize->add_setting( 
        'ed_post_date', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_post_date',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Posted Date', 'blossom-spa-pro' ),
                'description' => __( 'Enable to hide posted date.', 'blossom-spa-pro' ),
			)
		)
	);
    
    /** Show Featured Image */
    $wp_customize->add_setting( 
        'ed_featured_image', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Spa_Pro_Toggle_Control( 
			$wp_customize,
			'ed_featured_image',
			array(
				'section'         => 'post_page_settings',
				'label'	          => __( 'Show Featured Image', 'blossom-spa-pro' ),
                'description'     => __( 'Enable to show featured image in post detail (single post).', 'blossom-spa-pro' ),
                'active_callback' => 'blossom_spa_pro_post_page_ac'
			)
		)
	);
    /** Posts(Blog) & Pages Settings Ends */
    
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_general_post_page' );