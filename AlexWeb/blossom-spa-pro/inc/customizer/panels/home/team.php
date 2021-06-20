<?php
/**
 * Team Section
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_frontpage_team( $wp_customize ){
    
    /** Team Section */
    $wp_customize->add_section(
        'team',
        array(
            'title'    => __( 'Team Section', 'blossom-spa-pro' ),
            'priority' => 90,
            'panel'    => 'frontpage_settings',
        )
    );

    $wp_customize->add_setting(
        'team_note_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Note_Control( 
            $wp_customize,
            'team_note_text',
            array(
                'section'     => 'team',
                'description' => __( '<hr/>', 'blossom-spa-pro' ),
            )
        )
    );
    
    /** About Section Menu Label  */
    $wp_customize->add_setting(
        'team_title',
        array(
            'default'           => __( 'Meet Our Experienced Team Members', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'team_title',
        array(
            'label'           => __( 'Team Section Title', 'blossom-spa-pro' ),
            'description'     => __( 'Add title for team section.', 'blossom-spa-pro' ),
            'section'         => 'team',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'team_title', array(
        'selector' => '.team-section .container h2.section-title',
        'render_callback' => 'blossom_spa_pro_get_team_title',
    ) );
    
    /** Team Subtitle  */
    $wp_customize->add_setting(
        'team_subtitle',
        array(
            'default'           => __( 'Over 10 Years of Experience', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'team_subtitle',
        array(
            'label'           => __( 'Team Section Subtitle', 'blossom-spa-pro' ),
            'description'     => __( 'Add subtitle for team section.', 'blossom-spa-pro' ),
            'section'         => 'team',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'team_subtitle', array(
        'selector' => '.team-section .container span.sub-title',
        'render_callback' => 'blossom_spa_pro_get_team_subtitle',
    ) );

    /** Team Content  */
    $wp_customize->add_setting(
        'team_content',
        array(
            'default'           => __( 'Some of our team members have 10+ years of experience. You can introduce your team members to give a more human feeling to the company.', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'team_content',
        array(
            'label'           => __( 'Team Section Description', 'blossom-spa-pro' ),
            'description'     => __( 'Add description for team section.', 'blossom-spa-pro' ),
            'section'         => 'team',
            'type'            => 'textarea',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'team_content', array(
        'selector' => '.team-section .container .section-desc',
        'render_callback' => 'blossom_spa_pro_get_team_content',
    ) );

    $team_section = $wp_customize->get_section( 'sidebar-widgets-team' );
    if ( ! empty( $team_section ) ) {

        $team_section->panel     = 'frontpage_settings';
        $team_section->priority  = 90;
        $wp_customize->get_control( 'team_note_text' )->section  = 'sidebar-widgets-team';
        $wp_customize->get_control( 'team_title' )->section  = 'sidebar-widgets-team';
        $wp_customize->get_control( 'team_subtitle' )->section  = 'sidebar-widgets-team';
        $wp_customize->get_control( 'team_content' )->section  = 'sidebar-widgets-team';
    }     
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_frontpage_team' );