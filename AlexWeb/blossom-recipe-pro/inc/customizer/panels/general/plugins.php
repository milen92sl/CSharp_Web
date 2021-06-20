<?php
/**
 * Override plugins post types and description
 *
 */
function blossom_recipe_pro_customize_register_general_plugins( $wp_customize ){

    /** Plugins Section */
    $wp_customize->add_section(
        'plugins_section',
        array(
            'title'    => __( 'Recipe Archives Settings', 'blossom-recipe-pro' ),
            'priority' => 200,
            'panel'    => 'general_settings',
        )
    );

    /** Blog title */
    $wp_customize->add_setting(
        'recipe_display_title',
        array(
            'default'           => __( 'Blossom Recipes', 'blossom-recipe-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'recipe_display_title',
        array(
            'section' => 'plugins_section',
            'label'   => __( 'Archive Recipes Title', 'blossom-recipe-pro' ),
            'description'   => __( 'To hide the title please keep the field empty.', 'blossom-recipe-pro' ),
            'type'    => 'text',
            'active_callback'   => 'is_brm_activated',
        )
    );

    /** Blog title */
    $wp_customize->add_setting(
        'recipe_display_description',
        array(
            'default'           => __( 'Blossom Recipes Post Type', 'blossom-recipe-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'recipe_display_description',
        array(
            'section' => 'plugins_section',
            'label'   => __( 'Archive Recipes Description', 'blossom-recipe-pro' ),
            'description'   => __( 'To hide the description please keep the field empty.', 'blossom-recipe-pro' ),
            'type'    => 'textarea',
            'active_callback'   => 'is_brm_activated',
        )
    );     

}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_general_plugins' );