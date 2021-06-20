<?php
/**
 * Blog Section
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_frontpage_blog( $wp_customize ){

    /** Blog Section */
    $wp_customize->add_section(
        'blog_section',
        array(
            'title'    => __( 'Blog Section', 'blossom-spa-pro' ),
            'priority' => 100,
            'panel'    => 'frontpage_settings',
            'active_callback' => 'blossom_spa_pro_blog_active'
        )
    );

    /** Blog title */
    $wp_customize->add_setting(
        'blog_section_title',
        array(
            'default'           => __( 'Read Our Recent Articles', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'blog_section_title',
        array(
            'section' => 'blog_section',
            'label'   => __( 'Blog Title', 'blossom-spa-pro' ),
            'type'    => 'text',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'blog_section_title', array(
        'selector' => '.recent-post-section .container h2.section-title',
        'render_callback' => 'blossom_spa_pro_get_blog_title',
    ) );

    /** Blog Subtitle */
    $wp_customize->add_setting(
        'blog_section_subtitle',
        array(
            'default'           => __( 'From Our Blog', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'blog_section_subtitle',
        array(
            'section' => 'blog_section',
            'label'   => __( 'Blog Subtitle', 'blossom-spa-pro' ),
            'type'    => 'text',
        )
    ); 

    $wp_customize->selective_refresh->add_partial( 'blog_section_subtitle', array(
        'selector' => '.recent-post-section .container span.sub-title',
        'render_callback' => 'blossom_spa_pro_get_blog_subtitle',
    ) );

    /** Blog description */
    $wp_customize->add_setting(
        'blog_section_content',
        array(
            'default'           => __( 'Show your customers that you know what you are doing by writing helpful articles related to your business. You can display your recent blog posts here. To modify this section, go to Appearance > Customize > Front Page Settings > Blog Section.', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'blog_section_content',
        array(
            'section' => 'blog_section',
            'label'   => __( 'Blog Description', 'blossom-spa-pro' ),
            'type'    => 'textarea',
        )
    ); 

    $wp_customize->selective_refresh->add_partial( 'blog_section_content', array(
        'selector' => '.recent-post-section .container .section-desc',
        'render_callback' => 'blossom_spa_pro_get_blog_content',
    ) );
    
    /** Readmore Label */
    $wp_customize->add_setting(
        'blog_readmore',
        array(
            'default'           => __( 'Read More', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'blog_readmore',
        array(
            'label'           => __( 'Readmore Label', 'blossom-spa-pro' ),
            'section'         => 'blog_section',
            'type'            => 'text',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'blog_readmore', array(
        'selector' => '.recent-post-section .container .grid .entry-footer .btn-readmore',
        'render_callback' => 'blossom_spa_pro_get_blog_readmore',
    ) ); 
    
    /** View All Label */
    $wp_customize->add_setting(
        'blog_view_all',
        array(
            'default'           => __( 'View More', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'blog_view_all',
        array(
            'label'           => __( 'View All Label', 'blossom-spa-pro' ),
            'section'         => 'blog_section',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_blog_view_all_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'blog_view_all', array(
        'selector' => '.recent-post-section .container .btn-wrap .btn-readmore',
        'render_callback' => 'blossom_spa_pro_get_blog_view_all',
    ) ); 
    /** Blog Section Ends */  

}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_frontpage_blog' );