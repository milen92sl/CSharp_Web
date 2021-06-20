<?php
/**
 * Child Theme Settings
 *
 *@package Blossom_Fashion_Pro
*/

function blossom_fashion_pro_customize_register_general_child_support( $wp_customize ) {

	/** Child Support Settings */
    $wp_customize->add_section(
        'child_support_settings',
        array(
            'title'    => __( 'Child Theme Support Settings', 'blossom-fashion-pro' ),
            'priority' => 45,
        )
    );

    /** Child Support Description */
    $wp_customize->add_setting( 
        'child_additional_support', 
        array(
            'default'           => 'default',
            'sanitize_callback' => 'blossom_fashion_pro_sanitize_select'
        ) 
    );

    $wp_customize->add_control(
        new Blossom_Fashion_Pro_Select_Control( 
            $wp_customize,
            'child_additional_support',
            array(
                'section'     => 'child_support_settings',
                'label'       => __( 'Child Theme Style', 'blossom-fashion-pro' ),
                'description' => __( 'Select respective child theme style from the drop-down below.', 'blossom-fashion-pro' ),
                'choices'     => array(
                    'default'            => __( 'Default','blossom-fashion-pro' ),
                    'fashion_lifestyle'  => __( 'Fashion Lifestyle','blossom-fashion-pro' ),  
                    'fashion_stylist'    => __( 'Fashion Stylist','blossom-fashion-pro' ),
                    'fashion_icon'    => __( 'Fashion Icon','blossom-fashion-pro' ),

                ),
            )
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'fashion_lifestyle_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Fashion_Pro_Note_Control( 
            $wp_customize,
            'fashion_lifestyle_text',
            array(
                'section'     => 'child_support_settings',
                'description' => sprintf(__( 'To achieve the exact layout of "Fashion Lifestyle" child theme please, select the %1$seighth header layout%2$s, %3$sfifth slider layout%4$s, %5$stenth home page layout%6$s respectively.', 'blossom-fashion-pro' ), '<span class="child-inner-link h-layout">', '</span>', '<span class="child-inner-link s-layout">', '</span>', '<span class="child-inner-link ho-layout">', '</span>' ),
                'active_callback' => 'blossom_fashion_pro_child_theme_support_callback',
            )
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'fashion_stylist_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Fashion_Pro_Note_Control( 
            $wp_customize,
            'fashion_stylist_text',
            array(
                'section'     => 'child_support_settings',
                'description' => sprintf(__( 'To achieve the exact layout of "Fashion Stylist" child theme please, select the %1$sthird header layout%2$s, %3$ssixth slider layout%4$s, %5$sthirteen home page layout%6$s respectively.', 'blossom-fashion-pro' ), '<span class="child-inner-link h-layout">', '</span>', '<span class="child-inner-link s-layout">', '</span>', '<span class="child-inner-link ho-layout">', '</span>' ),
                'active_callback' => 'blossom_fashion_pro_child_theme_support_callback',
            )
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'fashion_icon_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Fashion_Pro_Note_Control( 
            $wp_customize,
            'fashion_icon_text',
            array(
                'section'     => 'child_support_settings',
                'description' => sprintf(__( 'To achieve the exact layout of "Fashion Icon" child theme please, select the %1$sfifth header layout%2$s, %3$sfirst slider layout%4$s, %5$sseventh home page layout%6$s respectively.', 'blossom-fashion-pro' ), '<span class="child-inner-link h-layout">', '</span>', '<span class="child-inner-link s-layout">', '</span>', '<span class="child-inner-link ho-layout">', '</span>' ),
                'active_callback' => 'blossom_fashion_pro_child_theme_support_callback',
            )
        )
    );

}
add_action( 'customize_register', 'blossom_fashion_pro_customize_register_general_child_support' );

/**
 * Active Callback
*/
function blossom_fashion_pro_child_theme_support_callback( $control ){
    
    $child_theme_support    = $control->manager->get_setting( 'child_additional_support' )->value();
    $control_id             = $control->id;
    
    if ( $control_id == 'fashion_lifestyle_text' && $child_theme_support == 'fashion_lifestyle' ) return true;        
    if ( $control_id == 'fashion_stylist_text' && $child_theme_support == 'fashion_stylist' ) return true;   
     if ( $control_id == 'fashion_icon_text' && $child_theme_support == 'fashion_icon' ) return true;     
    return false;
}