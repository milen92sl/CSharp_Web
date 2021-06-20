<?php
/**
 * Child Theme Support Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_child_support( $wp_customize ) {
    
    /** Shop Settings */
    $wp_customize->add_section(
        'child_support_settings',
        array(
            'title'    => __( 'Child Theme Support Settings', 'blossom-feminine-pro' ),
            'priority' => 20,
        )
    );

    /** Child Theme Description */
    $wp_customize->add_setting( 
        'child_additional_support', 
        array(
            'default'           => 'default',
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_select'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Select_Control( 
            $wp_customize,
            'child_additional_support',
            array(
                'section'     => 'child_support_settings',
                'label'       => __( 'Child Theme Style', 'blossom-feminine-pro' ),
                'description' => __( 'Select respective child theme style from the drop-down below.', 'blossom-feminine-pro' ),
                'choices'     => array(
                    'default'       => __( 'Default','blossom-feminine-pro' ),
                    'blossom_chic'  => __( 'Blossom Chic','blossom-feminine-pro' ),
                    'mommy_blog'    => __( 'Blossom Mommy Blog', 'blossom-feminine-pro' ),
                    'blossom_beauty'=> __( 'Blossom Beauty', 'blossom-feminine-pro' ),
                    'blossom_diva'  => __( 'Blossom Diva', 'blossom-feminine-pro' )  

                ),
            )
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'blossom_chic_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Note_Control( 
            $wp_customize,
            'blossom_chic_text',
            array(
                'section'     => 'child_support_settings',
                'description' => sprintf( __( 'To achieve the exact layout of "Blossom Chic" child theme please, select the %1$ssecond header layout%2$s, %3$sthird slider layout%4$s, %5$stenth home page layout%6$s respectively.', 'blossom-feminine-pro' ), '<span class="child-inner-link h-layout">', '</span>', '<span class="child-inner-link s-layout">', '</span>', '<span class="child-inner-link ho-layout">', '</span>' ),
                'active_callback' => 'blossom_feminine_pro_child_theme_support_callback',
            )
        )
    );


    /** Note */
    $wp_customize->add_setting(
        'mommy_blog_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Note_Control( 
            $wp_customize,
            'mommy_blog_text',
            array(
                'section'     => 'child_support_settings',
                'description' => sprintf( __( 'To achieve the exact layout of "Blossom Mommy Blog" child theme please, select the %1$sfirst header layout%2$s, %3$ssecond slider layout%4$s, %5$sseventh home page layout%6$s respectively.', 'blossom-feminine-pro' ), '<span class="child-inner-link h-layout">', '</span>', '<span class="child-inner-link s-layout">', '</span>', '<span class="child-inner-link ho-layout">', '</span>' ),
                'active_callback' => 'blossom_feminine_pro_child_theme_support_callback',
            )
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'blossom_beauty_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Note_Control( 
            $wp_customize,
            'blossom_beauty_text',
            array(
                'section'     => 'child_support_settings',
                'description' => sprintf( __( 'To achieve the exact layout of "Blossom Beauty" child theme please, select the %1$ssixth header layout%2$s and %3$sthird slider layout%4$s respectively.', 'blossom-feminine-pro' ), '<span class="child-inner-link h-layout">', '</span>', '<span class="child-inner-link s-layout">', '</span>' ),
                'active_callback' => 'blossom_feminine_pro_child_theme_support_callback',
            )
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'blossom_diva_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Note_Control( 
            $wp_customize,
            'blossom_diva_text',
            array(
                'section'     => 'child_support_settings',
                'description' => sprintf( __( 'To achieve the exact layout of "Blossom Diva" child theme please, select the %1$ssecond header layout%2$s, %3$sfourth slider layout%4$s, %5$stenth home page layout%6$s respectively.', 'blossom-feminine-pro' ), '<span class="child-inner-link h-layout">', '</span>', '<span class="child-inner-link s-layout">', '</span>', '<span class="child-inner-link ho-layout">', '</span>' ),
                'active_callback' => 'blossom_feminine_pro_child_theme_support_callback',
            )
        )
    );
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_child_support' );

/**
 * Active Callback
*/
function blossom_feminine_pro_child_theme_support_callback( $control ){
    
    $child_theme_support    = $control->manager->get_setting( 'child_additional_support' )->value();
    $control_id             = $control->id;
    
    if ( $control_id == 'blossom_chic_text' && $child_theme_support == 'blossom_chic' ) return true; 
    if ( $control_id == 'mommy_blog_text' && $child_theme_support == 'mommy_blog' ) return true; 
    if ( $control_id == 'blossom_beauty_text' && $child_theme_support == 'blossom_beauty' ) return true;
    if ( $control_id == 'blossom_diva_text' && $child_theme_support == 'blossom_diva' ) return true;       

    return false;
}