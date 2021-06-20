<?php
/**
 * Color Setting
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_color( $wp_customize ) {
    
    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color', 
        array(
            'default'           => '#f15641',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color', 
            array(
                'label'       => __( 'Primary Color', 'blossom-recipe-pro' ),
                'description' => __( 'Primary color of the theme.', 'blossom-recipe-pro' ),
                'section'     => 'colors',
                'priority'    => 5,
            )
        )
    );
    
    /** Background Color*/
    $wp_customize->get_control( 'background_color' )->description = __( 'Background color of the theme.', 'blossom-recipe-pro' );
   
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_color' );