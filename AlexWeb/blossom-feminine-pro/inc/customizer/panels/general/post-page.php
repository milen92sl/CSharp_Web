<?php
/**
 * Post Page Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_general_post_page( $wp_customize ) {
    
    /** Posts(Blog) & Pages Settings */
    $wp_customize->add_section(
        'post_page_settings',
        array(
            'title'    => __( 'Posts(Blog) & Pages Settings', 'blossom-feminine-pro' ),
            'priority' => 50,
            'panel'    => 'general_settings',
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'page_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Radio_Image_Control(
			$wp_customize,
			'page_sidebar_layout',
			array(
				'section'	  => 'post_page_settings',
				'label'		  => __( 'Page Sidebar Layout', 'blossom-feminine-pro' ),
				'description' => __( 'This is the general sidebar layout for pages. You can override the sidebar layout for individual page in repective page.', 'blossom-feminine-pro' ),
				'choices'	  => array(
					'left-sidebar'  => get_template_directory_uri() . '/images/2cl.png',
                    'right-sidebar' => get_template_directory_uri() . '/images/2cr.png',
				)
			)
		)
	);
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'post_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Radio_Image_Control(
			$wp_customize,
			'post_sidebar_layout',
			array(
				'section'	  => 'post_page_settings',
				'label'		  => __( 'Post Sidebar Layout', 'blossom-feminine-pro' ),
				'description' => __( 'This is the general sidebar layout for posts. You can override the sidebar layout for individual post in repective post.', 'blossom-feminine-pro' ),
				'choices'	  => array(
					'left-sidebar'  => get_template_directory_uri() . '/images/2cl.png',
                    'right-sidebar' => get_template_directory_uri() . '/images/2cr.png',
				)
			)
		)
	);
    
    /** Blog Excerpt */
    $wp_customize->add_setting( 
        'ed_excerpt', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_excerpt',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Enable Blog Excerpt', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to show excerpt or disable to show full post content.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Excerpt Length */
    $wp_customize->add_setting( 
        'excerpt_length', 
        array(
            'default'           => 55,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Slider_Control( 
			$wp_customize,
			'excerpt_length',
			array(
				'section'	  => 'post_page_settings',
				'label'		  => __( 'Excerpt Length', 'blossom-feminine-pro' ),
				'description' => __( 'Automatically generated excerpt length (in words).', 'blossom-feminine-pro' ),
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
            'default'           => __( 'Read More', 'blossom-feminine-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'read_more_text',
        array(
            'type'    => 'text',
            'section' => 'post_page_settings',
            'label'   => __( 'Read More Text', 'blossom-feminine-pro' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'read_more_text', array(
        'selector' => '.entry-footer .btn-readmore',
        'render_callback' => 'blossom_feminine_pro_get_read_more',
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
        new Blossom_Feminine_Pro_Note_Control( 
			$wp_customize,
			'post_note_text',
			array(
				'section'	  => 'post_page_settings',
                'description' => sprintf( __( '%s These options affect your individual posts.', 'blossom-feminine-pro' ), '<hr/>' ),
			)
		)
    );

    /** Hide Author */
    $wp_customize->add_setting( 
        'ed_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Toggle_Control( 
            $wp_customize,
            'ed_author',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Hide Author Section', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to hide author section below the blog post.', 'blossom-feminine-pro' ),
            )
        )
    );
    
    /** Show Related Posts */
    $wp_customize->add_setting( 
        'ed_related', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_related',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Show Related Posts', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to show related posts in single page.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Related Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => __( 'You may also like...', 'blossom-feminine-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'            => 'text',
            'section'         => 'post_page_settings',
            'label'           => __( 'Related Posts Section Title', 'blossom-feminine-pro' ),
            'active_callback' => 'blossom_feminine_pro_post_page_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector' => '.related-post .title',
        'render_callback' => 'blossom_feminine_pro_get_related_title',
    ) );
    
    /** Related Post Taxonomy */    
    $wp_customize->add_setting( 
        'related_taxonomy', 
        array(
            'default'           => 'cat',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Radio_Buttonset_Control(
			$wp_customize,
			'related_taxonomy',
			array(
				'section'	  => 'post_page_settings',
				'label'       => __( 'Related Post Taxonomy', 'blossom-feminine-pro' ),
                'description' => __( 'Choose Categories/Tags to display related post based on in Single Post.', 'blossom-feminine-pro' ),
				'choices'	  => array(
					'cat'   => __( 'Category', 'blossom-feminine-pro' ),
                    'tag'   => __( 'Tags', 'blossom-feminine-pro' ),
				),
                'active_callback' => 'blossom_feminine_pro_post_page_ac'
			)
		)
	);
    
    /** Show Popular Posts */
    $wp_customize->add_setting( 
        'ed_popular', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_popular',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Show Popular Posts', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to show popular posts in single page. Popular posts are based on comment count.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Popular Posts section title */
    $wp_customize->add_setting(
        'popoular_post_title',
        array(
            'default'           => __( 'Popular Articles...', 'blossom-feminine-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'popoular_post_title',
        array(
            'type'            => 'text',
            'section'         => 'post_page_settings',
            'label'           => __( 'Popular Posts Section Title', 'blossom-feminine-pro' ),
            'active_callback' => 'blossom_feminine_pro_post_page_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'popoular_post_title', array(
        'selector' => '.popular-post .title',
        'render_callback' => 'blossom_feminine_pro_get_popular_title',
    ) );
    
    /** Comments */
    $wp_customize->add_setting(
        'ed_comments',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_comments',
			array(
				'section'     => 'post_page_settings',
				'label'       => __( 'Show Comments', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to show Comments in Single Post/Page.', 'blossom-feminine-pro' ),
			)
		)
	);  
   
    /** Hide Category */
    $wp_customize->add_setting( 
        'ed_category', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_category',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Category', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to hide category.', 'blossom-feminine-pro' ),
			)
		)
	);
    
     /** Hide Post Author */
    $wp_customize->add_setting( 
        'ed_post_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Toggle_Control( 
            $wp_customize,
            'ed_post_author',
            array(
                'section'     => 'post_page_settings',
                'label'       => __( 'Hide Post Author', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to hide post author.', 'blossom-feminine-pro' ),
            )
        )
    );
        
    /** Hide Posted Date */
    $wp_customize->add_setting( 
        'ed_post_date', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_post_date',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Posted Date', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to hide posted date.', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Show Featured Image */
    $wp_customize->add_setting( 
        'ed_featured_image', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_featured_image',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Show Featured Image', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to show featured image in post detail (single page).', 'blossom-feminine-pro' ),
			)
		)
	);
    
    /** Prefix Archive Page */
    $wp_customize->add_setting( 
        'ed_prefix_archive', 
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Feminine_Pro_Toggle_Control( 
			$wp_customize,
			'ed_prefix_archive',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Prefix in Archive Page', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to hide prefix in archive page.', 'blossom-feminine-pro' ),
			)
		)
	);
    /** Posts(Blog) & Pages Settings Ends */
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_general_post_page' );

/**
 * Active Callback
*/
function blossom_feminine_pro_post_page_ac( $control ){
    
    $ed_related = $control->manager->get_setting( 'ed_related' )->value();
    $ed_popular = $control->manager->get_setting( 'ed_popular' )->value();
    $control_id = $control->id;
    
    if ( $control_id == 'related_post_title' && $ed_related == true ) return true;
    if ( $control_id == 'related_taxonomy' && $ed_related == true ) return true;
    if ( $control_id == 'popoular_post_title' && $ed_popular == true ) return true;
    
    return false;
}