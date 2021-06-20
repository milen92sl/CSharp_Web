<?php
/**
 * One Page Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_frontpage_onepage( $wp_customize ){
    
    /** Sort Front Page Section */
    $wp_customize->add_section(
        'one_page_settings',
        array(
            'title'    => __( 'One Page Settings', 'blossom-spa-pro' ),
            'priority' => 160,
            'panel'    => 'frontpage_settings',
        )
    );
    
    /** Blog Options */
    $wp_customize->add_setting(
        'ed_one_page',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Blossom_Spa_Pro_Toggle_Control(
            $wp_customize,
            'ed_one_page',
            array(
                'label'       => __( 'Enable Section Menu', 'blossom-spa-pro' ),
                'description' => __( 'Enable to make home page one page scrolling with section menu.', 'blossom-spa-pro' ),
                'section'     => 'one_page_settings',
            )            
        )
    );
    
    /** Blog Options */
    $wp_customize->add_setting(
        'ed_home_link',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Blossom_Spa_Pro_Toggle_Control(
            $wp_customize,
            'ed_home_link',
            array(
                'label'           => __( 'Home Link', 'blossom-spa-pro' ),
                'description'     => __( 'Enable to display "Home" link in section menu.', 'blossom-spa-pro' ),
                'section'         => 'one_page_settings',
                'active_callback' => 'blossom_spa_pro_header_ac'
            )            
        )
    );
    
    /** Home Section Menu Label  */
    $wp_customize->add_setting(
        'label_home',
        array(
            'default'           => __( 'Home', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_home',
        array(
            'label'           => __( 'Home Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );

    /** Service Section Menu Label  */
    $wp_customize->add_setting(
        'label_service',
        array(
            'default'           => __( 'Service', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_service',
        array(
            'label'           => __( 'Service Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );

    /** About Section Menu Label  */
    $wp_customize->add_setting(
        'label_about',
        array(
            'default'           => __( 'About', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_about',
        array(
            'label'           => __( 'About Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );
    
    /** Popular Product Section Menu Label  */
    $wp_customize->add_setting(
        'label_popular_product',
        array(
            'default'           => __( 'Popular', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_popular_product',
        array(
            'label'           => __( 'Popular Product Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );

    
    /** CTA Section Menu Label  */
    $wp_customize->add_setting(
        'label_cta',
        array(
            'default'           => __( 'CTA', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_cta',
        array(
            'label'           => __( 'CTA Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );

    /** Service Two Section Menu Label  */
    $wp_customize->add_setting(
        'label_service_two',
        array(
            'default'           => __( 'Service2', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_service_two',
        array(
            'label'           => __( 'Service Two Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );

    /** Special Pricing Section Menu Label  */
    $wp_customize->add_setting(
        'label_special_pricing',
        array(
            'default'           => __( 'Special', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_special_pricing',
        array(
            'label'           => __( 'Special Pricing Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );

    /** Service Three Section Menu Label  */
    $wp_customize->add_setting(
        'label_service_three',
        array(
            'default'           => __( 'Service3', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_service_three',
        array(
            'label'           => __( 'Service Three Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );
    
    /** Pricing Table Section Menu Label  */
    $wp_customize->add_setting(
        'label_pricing',
        array(
            'default'           => __( 'Pricing', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_pricing',
        array(
            'label'           => __( 'Pricing Table Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );

    /** CTA Two Section Menu Label  */
    $wp_customize->add_setting(
        'label_cta_two',
        array(
            'default'           => __( 'CTA2', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_cta_two',
        array(
            'label'           => __( 'CTA Two Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );

    /** Team Section Menu Label  */
    $wp_customize->add_setting(
        'label_team',
        array(
            'default'           => __( 'Team', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_team',
        array(
            'label'           => __( 'Team Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );
    
    /** Blog Section Menu Label  */
    $wp_customize->add_setting(
        'label_blog',
        array(
            'default'           => __( 'Blog', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_blog',
        array(
            'label'           => __( 'Blog Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );
    
    /** Gallery Section Menu Label  */
    $wp_customize->add_setting(
        'label_gallery',
        array(
            'default'           => __( 'Gallery', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_gallery',
        array(
            'label'           => __( 'Gallery Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );

    /** Testimonial Section Menu Label  */
    $wp_customize->add_setting(
        'label_testimonial',
        array(
            'default'           => __( 'Testimonial', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_testimonial',
        array(
            'label'           => __( 'Testimonial Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );

    /** Products Section Menu Label  */
    $wp_customize->add_setting(
        'label_products',
        array(
            'default'           => __( 'Products', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_products',
        array(
            'label'           => __( 'Products Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );
    
    /** Contact Section Menu Label  */
    $wp_customize->add_setting(
        'label_contact',
        array(
            'default'           => __( 'Contact', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'label_contact',
        array(
            'label'           => __( 'Contact Section Menu Label', 'blossom-spa-pro' ),
            'description'     => __( 'Left blank to hide the section in the menu.', 'blossom-spa-pro' ),
            'section'         => 'one_page_settings',
            'type'            => 'text',
            'active_callback' => 'blossom_spa_pro_header_ac'
        )
    );
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_frontpage_onepage' );