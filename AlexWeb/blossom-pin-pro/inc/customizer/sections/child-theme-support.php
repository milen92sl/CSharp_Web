<?php
/**
 * Child Theme Support Settings
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_general_child_support( $wp_customize ) {
    
    /** Shop Settings */
    $wp_customize->add_section(
        'child_support_settings',
        array(
            'title'    => __( 'Child Theme Support Settings', 'blossom-pin-pro' ),
            'priority' => 20,
        )
    );

    /** Shop Page Description */
    $wp_customize->add_setting( 
        'child_additional_support', 
        array(
            'default'           => 'default',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_select'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_pin_Pro_Select_Control( 
            $wp_customize,
            'child_additional_support',
            array(
                'section'     => 'child_support_settings',
                'label'       => __( 'Child Theme Style', 'blossom-pin-pro' ),
                'description' => __( 'Select respective child theme style from the drop-down below.', 'blossom-pin-pro' ),
                'choices'     => array(
                    'default'       => __( 'Default','blossom-pin-pro' ),
                    'blossom_pinthis'  => __( 'Blossom PinThis','blossom-pin-pro' ),  
                ),
            )
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'blossom_pinthis_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_pin_Pro_Note_Control( 
            $wp_customize,
            'blossom_pinthis_text',
            array(
                'section'     => 'child_support_settings',
                'description' => sprintf( __( 'To achieve the exact layout of "Blossom PinThis" child theme please, select the %1$sfourth header layout%2$s, %3$ssixth slider layout%4$s, %5$seighth home page layout%6$s respectively.', 'blossom-pin-pro' ), '<span class="child-inner-link h-layout">', '</span>', '<span class="child-inner-link s-layout">', '</span>', '<span class="child-inner-link ho-layout">', '</span>' ),
                'active_callback' => 'blossom_pin_pro_child_theme_support_callback',
            )
        )
    );
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_general_child_support' );

/**
 * Active Callback
*/
function blossom_pin_pro_child_theme_support_callback( $control ){
    
    $child_theme_support    = $control->manager->get_setting( 'child_additional_support' )->value();
    $control_id             = $control->id;
    
    if ( $control_id == 'blossom_pinthis_text' && $child_theme_support == 'blossom_pinthis' ) return true;

    return false;
}