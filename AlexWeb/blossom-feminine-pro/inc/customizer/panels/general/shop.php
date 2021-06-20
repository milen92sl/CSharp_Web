<?php
/**
 * Social Settings
 *
 * @package Blossom_Feminine_Pro
 */

function blossom_feminine_pro_customize_register_general_shop( $wp_customize ) {
    
    /** Shop Settings */
    $wp_customize->add_section(
        'shop_settings',
        array(
            'title'    => __( 'Shop Settings', 'blossom-feminine-pro' ),
            'priority' => 80,
            'panel'    => 'general_settings',
            'active_callback' => 'is_woocommerce_activated'
        )
    );

    /** Shop Page Description */
    $wp_customize->add_setting( 
        'shop_archive_description', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_feminine_pro_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Feminine_Pro_Toggle_Control( 
            $wp_customize,
            'shop_archive_description',
            array(
                'section'     => 'shop_settings',
                'label'       => __( 'Shop Page Description', 'blossom-feminine-pro' ),
                'description' => __( 'Enable to show Shop Page Description.', 'blossom-feminine-pro' ),
            )
        )
    );

    $wp_customize->add_setting( 
        'archive_description_content', 
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_textarea_field'
        ) 
    );
    
    $wp_customize->add_control(
        'archive_description_content',
        array(
            'section'     => 'shop_settings',
            'label'       => __( 'Description For Shop Page', 'blossom-feminine-pro' ),
            'description' => __( 'Write new description for Shop Page to overwrite the default description.', 'blossom-feminine-pro' ),
            'type'        => 'textarea',
            'active_callback' => 'blossom_feminine_pro_shop_page_description_ac'
        )
    );
    /** Shop Settings Ends */
    
}
add_action( 'customize_register', 'blossom_feminine_pro_customize_register_general_shop' );

/**
 * Active Callback
*/
function blossom_feminine_pro_shop_page_description_ac( $control ){
    
    $shop_archive_description   = $control->manager->get_setting( 'shop_archive_description' )->value();
    $control_id    = $control->id;
    
    if ( $control_id == 'archive_description_content' && $shop_archive_description ) return true;
        
    return false;
}