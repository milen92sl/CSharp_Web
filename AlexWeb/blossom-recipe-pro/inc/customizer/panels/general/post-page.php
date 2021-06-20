<?php
/**
 * Post Page Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_general_post_page( $wp_customize ) {
    
    /** Posts(Blog) & Pages Settings */
    $wp_customize->add_section(
        'post_page_settings',
        array(
            'title'    => __( 'Posts(Blog) & Pages Settings', 'blossom-recipe-pro' ),
            'priority' => 50,
            'panel'    => 'general_settings',
        )
    );
    
    /** Prefix Archive Page */
    $wp_customize->add_setting( 
        'ed_prefix_archive', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_prefix_archive',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Prefix in Archive Page', 'blossom-recipe-pro' ),
                'description' => __( 'Enable to hide prefix in archive page.', 'blossom-recipe-pro' ),
			)
		)
	);

    /** Blog like */
    $wp_customize->add_setting(
        'ed_blog_like',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Recipe_Pro_Toggle_Control( 
            $wp_customize,
            'ed_blog_like',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Show Like Button In Blog', 'blossom-recipe-pro' ),
                'description' => __( 'Enable to show like button in Blog.', 'blossom-recipe-pro' ),
            )
        )
    );
        
    /** Blog Excerpt */
    $wp_customize->add_setting( 
        'ed_excerpt', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_excerpt',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Enable Blog Excerpt', 'blossom-recipe-pro' ),
                'description' => __( 'Enable to show excerpt or disable to show full post content.', 'blossom-recipe-pro' ),
			)
		)
	);
    
    /** Excerpt Length */
    $wp_customize->add_setting( 
        'excerpt_length', 
        array(
            'default'           => 55,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Slider_Control( 
			$wp_customize,
			'excerpt_length',
			array(
				'section'	  => 'post_page_settings',
				'label'		  => __( 'Excerpt Length', 'blossom-recipe-pro' ),
				'description' => __( 'Automatically generated excerpt length (in words).', 'blossom-recipe-pro' ),
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
            'default'           => __( 'Read More', 'blossom-recipe-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'read_more_text',
        array(
            'type'    => 'text',
            'section' => 'post_page_settings',
            'label'   => __( 'Read More Text', 'blossom-recipe-pro' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'read_more_text', array(
        'selector' => '.entry-footer .btn-link',
        'render_callback' => 'blossom_recipe_pro_get_read_more',
    ) );

    if( is_brm_activated() ) {
        /** Show Related Posts */
        $wp_customize->add_setting( 
            'ed_related_blog', 
            array(
                'default'           => false,
                'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
            new Blossom_Recipe_Pro_Toggle_Control( 
                $wp_customize,
                'ed_related_blog',
                array(
                    'section'     => 'post_page_settings',
                    'label'       => __( 'Show Related Recipe Posts in Blog', 'blossom-recipe-pro' ),
                    'description' => __( 'Enable to show related recipe posts in blog, it only shows for blossom recipe post types.', 'blossom-recipe-pro' ),
                )
            )
        );
        
        /** Related Posts section title */
        $wp_customize->add_setting(
            'related_post_blog_title',
            array(
                'default'           => __( 'You may also like', 'blossom-recipe-pro' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage' 
            )
        );
        
        $wp_customize->add_control(
            'related_post_blog_title',
            array(
                'type'            => 'text',
                'section'         => 'post_page_settings',
                'label'           => __( 'Related Recipe Posts Title', 'blossom-recipe-pro' ),
                'active_callback' => 'blossom_recipe_pro_post_page_ac'
            )
        );
        
        $wp_customize->selective_refresh->add_partial( 'related_post_blog_title', array(
            'selector' => '.related-articles .related-title',
            'render_callback' => 'blossom_recipe_pro_get_related_post_blog_title',
        ) );
        
        /** Related Post Taxonomy */    
        $wp_customize->add_setting( 
            'related_blog_taxonomy', 
            array(
                'default'           => 'recipe-category',
                'sanitize_callback' => 'blossom_recipe_pro_sanitize_radio'
            ) 
        );
        
        $wp_customize->add_control(
            new Blossom_Recipe_Pro_Radio_Buttonset_Control(
                $wp_customize,
                'related_blog_taxonomy',
                array(
                    'section'     => 'post_page_settings',
                    'label'       => __( 'Related Taxonomy', 'blossom-recipe-pro' ),
                    'description' => __( 'Choose Categories/Tags to display related post based on in blog for blossom recipe post types only.', 'blossom-recipe-pro' ),
                    'choices'     => array(
                        'recipe-category'       => __( 'Recipe Category', 'blossom-recipe-pro' ),
                        'recipe-cuisine'        => __( 'Recipe Cuisine', 'blossom-recipe-pro' ),
                        'recipe-cooking-method' => __( 'Recipe Cooking Method', 'blossom-recipe-pro' ),
                        'recipe-tag'            => __( 'Recipe Tags', 'blossom-recipe-pro' ),
                    ),
                    'active_callback' => 'blossom_recipe_pro_post_page_ac'
                )
            )
        );
    }
    
    /** Note */
    $wp_customize->add_setting(
        'post_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Recipe_Pro_Note_Control( 
			$wp_customize,
			'post_note_text',
			array(
				'section'	  => 'post_page_settings',
                'description' => sprintf( __( '%s These options affect your individual posts.', 'blossom-recipe-pro' ), '<hr/>' ),
			)
		)
    );
    
    /** Hide Author Section */
    $wp_customize->add_setting( 
        'ed_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_author',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Author Section', 'blossom-recipe-pro' ),
                'description' => __( 'Enable to hide author section.', 'blossom-recipe-pro' ),
			)
		)
	);
    
    /** Author Section title */
    $wp_customize->add_setting(
        'author_title',
        array(
            'default'           => __( 'About Author', 'blossom-recipe-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'author_title',
        array(
            'type'    => 'text',
            'section' => 'post_page_settings',
            'label'   => __( 'Author Section Title', 'blossom-recipe-pro' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'author_title', array(
        'selector' => '.author-profile .author-name .author-title',
        'render_callback' => 'blossom_recipe_pro_get_author_title',
    ) );

    if( is_btnw_activated() ){
        
        /** Enable Newsletter Section */
        $wp_customize->add_setting( 
            'ed_single_newsletter', 
            array(
                'default'           => false,
                'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox'
            ) 
        );
        
        $wp_customize->add_control(
            new Blossom_Recipe_Pro_Toggle_Control( 
                $wp_customize,
                'ed_single_newsletter',
                array(
                    'section'     => 'post_page_settings',
                    'label'       => __( 'Single Newsletter Section', 'blossom-recipe-pro' ),
                    'description' => __( 'Enable to show Newsletter Section', 'blossom-recipe-pro' ),
                )
            )
        );
    
        /** Newsletter Shortcode */
        $wp_customize->add_setting(
            'single_newsletter_shortcode',
            array(
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
            )
        );
        
        $wp_customize->add_control(
            'single_newsletter_shortcode',
            array(
                'type'        => 'text',
                'section'     => 'post_page_settings',
                'label'       => __( 'Newsletter Shortcode', 'blossom-recipe-pro' ),
                'description' => __( 'Enter the BlossomThemes Email Newsletters Shortcode. Ex. [BTEN id="356"]', 'blossom-recipe-pro' ),
            )
        ); 
    } else {
        $wp_customize->add_setting(
            'single_newsletter_recommend',
            array(
                'sanitize_callback' => 'wp_kses_post',
            )
        );

        $wp_customize->add_control(
            new Blossom_Recipe_Pro_Plugin_Recommend_Control(
                $wp_customize,
                'single_newsletter_recommend',
                array(
                    'section'     => 'post_page_settings',
                    'label'       => __( 'Newsletter Shortcode', 'blossom-recipe-pro' ),
                    'capability'  => 'install_plugins',
                    'plugin_slug' => 'blossomthemes-email-newsletter',//This is the slug of recommended plugin.
                    'description' => sprintf( __( 'Please install and activate the recommended plugin %1$sBlossomThemes Email Newsletter%2$s. After that option related with this section will be visible.', 'blossom-recipe-pro' ), '<strong>', '</strong>' ),
                )
            )
        );
    }
    
    /** Show Related Posts */
    $wp_customize->add_setting( 
        'ed_related', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_related',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Show Related Posts', 'blossom-recipe-pro' ),
                'description' => __( 'Enable to show related posts in single page.', 'blossom-recipe-pro' ),
			)
		)
	);
    
    /** Related Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => __( 'You may also like...', 'blossom-recipe-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'            => 'text',
            'section'         => 'post_page_settings',
            'label'           => __( 'Related Posts Section Title', 'blossom-recipe-pro' ),
            'active_callback' => 'blossom_recipe_pro_post_page_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector' => '.related-articles .related-title',
        'render_callback' => 'blossom_recipe_pro_get_related_title',
    ) );
    
    /** Related Post Taxonomy */    
    $wp_customize->add_setting( 
        'related_taxonomy', 
        array(
            'default'           => 'cat',
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Radio_Buttonset_Control(
			$wp_customize,
			'related_taxonomy',
			array(
				'section'	  => 'post_page_settings',
				'label'       => __( 'Related Post Taxonomy', 'blossom-recipe-pro' ),
                'description' => __( 'Choose Categories/Tags to display related post based on in Single Post.', 'blossom-recipe-pro' ),
				'choices'	  => array(
					'cat'   => __( 'Category', 'blossom-recipe-pro' ),
                    'tag'   => __( 'Tags', 'blossom-recipe-pro' ),
				),
                'active_callback' => 'blossom_recipe_pro_post_page_ac'
			)
		)
	);
    
    /** Single like */
    $wp_customize->add_setting(
        'ed_single_like',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Recipe_Pro_Toggle_Control( 
            $wp_customize,
            'ed_single_like',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Show Like Button In Single', 'blossom-recipe-pro' ),
                'description' => __( 'Enable to show like button in Single Post/Page.', 'blossom-recipe-pro' ),
            )
        )
    );

    /** Post Views */
    $wp_customize->add_setting(
        'ed_single_post_views',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Recipe_Pro_Toggle_Control( 
            $wp_customize,
            'ed_single_post_views',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Hide Post Views in Single', 'blossom-recipe-pro' ),
                'description' => __( 'Enable to Hide post views in Single Post/Page.', 'blossom-recipe-pro' ),
            )
        )
    );

    /** Comments */
    $wp_customize->add_setting(
        'ed_comments',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_comments',
			array(
				'section'     => 'post_page_settings',
				'label'       => __( 'Show Comments', 'blossom-recipe-pro' ),
                'description' => __( 'Enable to show Comments in Single Post/Page.', 'blossom-recipe-pro' ),
			)
		)
	);
    
    /** Hide Category */
    $wp_customize->add_setting( 
        'ed_category', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_category',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Category', 'blossom-recipe-pro' ),
                'description' => __( 'Enable to hide category.', 'blossom-recipe-pro' ),
			)
		)
	);
    
    /** Hide Post Author */
    $wp_customize->add_setting( 
        'ed_post_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_post_author',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Post Author', 'blossom-recipe-pro' ),
                'description' => __( 'Enable to hide post author.', 'blossom-recipe-pro' ),
			)
		)
	);
    
    /** Hide Posted Date */
    $wp_customize->add_setting( 
        'ed_post_date', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_post_date',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Posted Date', 'blossom-recipe-pro' ),
                'description' => __( 'Enable to hide posted date.', 'blossom-recipe-pro' ),
			)
		)
	);
    
    /** Show Featured Image */
    $wp_customize->add_setting( 
        'ed_featured_image', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Toggle_Control( 
			$wp_customize,
			'ed_featured_image',
			array(
				'section'         => 'post_page_settings',
				'label'	          => __( 'Show Featured Image', 'blossom-recipe-pro' ),
                'description'     => __( 'Enable to show featured image in post detail (single post).', 'blossom-recipe-pro' ),
                'active_callback' => 'blossom_recipe_pro_post_page_ac'
			)
		)
	);
    /** Posts(Blog) & Pages Settings Ends */
    
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_general_post_page' );