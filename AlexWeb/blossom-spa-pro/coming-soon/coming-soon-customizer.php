<?php
/**
 * Coming Soon Settings
 *
 * @package Blossom_Spa_Pro
 */

if( ! function_exists( 'blossom_spa_pro_get_coming_soon_title' ) ) :
/**
 * Display coming soon title
*/
function blossom_spa_pro_get_coming_soon_title(){
    return esc_html( get_theme_mod( 'coming_soon_title', __( 'Our Website Is Almost Ready', 'blossom-spa-pro' ) ) );    
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_coming_soon_subtitle' ) ) :
/**
 * Display coming soon subtitle
*/
function blossom_spa_pro_get_coming_soon_subtitle(){
    return wpautop( wp_kses_post( get_theme_mod( 'coming_soon_subtitle', __( 'Time left Until Launching', 'blossom-spa-pro' ) ) ) );    
}
endif;

function blossom_spa_pro_customize_register_coming_soon( $wp_customize ) {
    
    /** Coming Soon Settings */
    $wp_customize->add_section(
        'coming_soon_settings',
        array(
            'title'    => __( 'Coming Soon Settings', 'blossom-spa-pro' ),
            'priority' => 85,
            'panel'    => 'general_settings',
        )
    );
    
    /** Coming Soon */
    $wp_customize->add_setting(
        'ed_coming_soon',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Toggle_Control( 
            $wp_customize,
            'ed_coming_soon',
            array(
                'section'       => 'coming_soon_settings',
                'label'         => __( 'Enable Coming Soon Page', 'blossom-spa-pro' ),
                'description'   => __( 'Enable to show coming soon page if the site is on construction phase.', 'blossom-spa-pro' ),
            )
        )
    );

    /** Coming Soon */
    $wp_customize->add_setting(
        'ed_coming_soon_customizer',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Pro_Toggle_Control( 
            $wp_customize,
            'ed_coming_soon_customizer',
            array(
                'section'       => 'coming_soon_settings',
                'label'         => __( 'Show Coming Soon on Customizer', 'blossom-spa-pro' ),
                'description'   => __( 'Enable to show coming soon page on customizer preview.', 'blossom-spa-pro' ),
            )
        )
    );

    $wp_customize->add_setting( 'coming_soon_logo',
        array(
            'default'           => get_template_directory_uri() . '/coming-soon/coming-soon-logo.png',
            'sanitize_callback' => 'blossom_spa_pro_sanitize_image',
        )
    );
    
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( $wp_customize, 'coming_soon_logo',
            array(
                'label'         => esc_html__( 'Logo Image', 'blossom-spa-pro' ),
                'description'   => esc_html__( 'Choose logo Image of your choice.', 'blossom-spa-pro' ),
                'section'       => 'coming_soon_settings',
                'type'          => 'image',
                'active_callback' => 'blossom_spa_pro_coming_soon_ac',
            )
        )
    );

    /** Section title */
    $wp_customize->add_setting(
        'coming_soon_title',
        array(
            'default'           => __( 'Our Website Is Almost Ready', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'coming_soon_title',
        array(
            'section' => 'coming_soon_settings',
            'label'   => __( 'Coming Soon Title', 'blossom-spa-pro' ),
            'type'    => 'text',
            'active_callback' => 'blossom_spa_pro_coming_soon_ac',
        )
    );

    /** Section Subtitle */
    $wp_customize->add_setting(
        'coming_soon_subtitle',
        array(
            'default'           => __( 'Time left Until Launching', 'blossom-spa-pro' ),
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );
    
    $wp_customize->add_control(
        'coming_soon_subtitle',
        array(
            'section' => 'coming_soon_settings',
            'label'   => __( 'Coming Soon Subtitle', 'blossom-spa-pro' ),
            'type'    => 'textarea',
            'active_callback' => 'blossom_spa_pro_coming_soon_ac',
        )
    ); 

    /** Banner Timer */
    $wp_customize->add_setting(
        'coming_soon_event_timer',
        array(
            'default'           => '2020-08-20', 
            'sanitize_callback' => 'blossom_spa_pro_sanitize_date'
        )
    );
    
     $wp_customize->add_control(
        'coming_soon_event_timer',
        array(
            'label'           => __( 'Live Date', 'blossom-spa-pro' ),
            'description'     => __( 'Select the live date here.', 'blossom-spa-pro' ),
            'section'         => 'coming_soon_settings',
            'type'            => 'date',
            'active_callback' => 'blossom_spa_pro_coming_soon_ac',
        )            
    );

    $wp_customize->add_setting( 'coming_soon_background_image',
        array(
            'default'           => get_template_directory_uri() . '/coming-soon/coming-soon-bg.jpg',
            'sanitize_callback' => 'blossom_spa_pro_sanitize_image',
        )
    );
    
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( $wp_customize, 'coming_soon_background_image',
            array(
                'label'         => esc_html__( 'Background Image', 'blossom-spa-pro' ),
                'description'   => esc_html__( 'Choose background Image of your choice. Recommended size for this image is 1920px by 1080px.', 'blossom-spa-pro' ),
                'section'       => 'coming_soon_settings',
                'type'          => 'image',
                'active_callback' => 'blossom_spa_pro_coming_soon_ac',
            )
        )
    );

    /** Newsletter Shortcode */
    $wp_customize->add_setting(
        'newsletter_shortcode',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'newsletter_shortcode',
        array(
            'type'        => 'text',
            'section'     => 'coming_soon_settings',
            'label'       => __( 'Newsletter Shortcode', 'blossom-spa-pro' ),
            'description' => __( 'Enter the BlossomThemes Email Newsletters Shortcode. Ex. [BTEN id="356"]', 'blossom-spa-pro' ),
            'active_callback' => 'blossom_spa_pro_coming_soon_ac'
        )
    );    
        
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_coming_soon' );

function blossom_spa_pro_sanitize_date( $input ){    
   $date = new DateTime( $input );
   return $date->format('Y-m-d');   
}

/**
 * Active Callback for Coming Soon
*/
function blossom_spa_pro_coming_soon_ac( $control ){
    $ed_coming_soon = $control->manager->get_setting( 'ed_coming_soon' )->value();
    $ed_coming_soon_customizer = $control->manager->get_setting( 'ed_coming_soon_customizer' )->value();
    $control_id  = $control->id;
    
    if ( $control_id == 'coming_soon_logo' && ( $ed_coming_soon || $ed_coming_soon_customizer ) ) return true;
    if ( $control_id == 'coming_soon_title' && ( $ed_coming_soon || $ed_coming_soon_customizer ) ) return true;
    if ( $control_id == 'coming_soon_subtitle' && ( $ed_coming_soon || $ed_coming_soon_customizer ) ) return true;
    if ( $control_id == 'coming_soon_background_image' && ( $ed_coming_soon || $ed_coming_soon_customizer ) ) return true;
    if ( $control_id == 'coming_soon_event_timer' && ( $ed_coming_soon || $ed_coming_soon_customizer ) ) return true;
    if ( $control_id == 'newsletter_shortcode' && ( $ed_coming_soon || $ed_coming_soon_customizer ) ) return true;
    
    return false;
}

if( ! function_exists( 'blossom_spa_pro_coming_soon_newsletter' ) ) :
/**
 * Blossom Newsletter
*/
function blossom_spa_pro_coming_soon_newsletter(){
    $newsletter = get_theme_mod( 'newsletter_shortcode' );
    if( !empty( $newsletter ) ){
        echo '<div class="newsletter-section"><div class="container">';
        echo do_shortcode( $newsletter );
        echo '</div></div>';            
    }
}
endif;
add_action( 'blossom_spa_pro_coming_soon', 'blossom_spa_pro_coming_soon_newsletter', 10 );

if( ! function_exists( 'blossom_spa_pro_coming_soon_social_links' ) ) :
/**
 * Social Links
*/
function blossom_spa_pro_coming_soon_social_links(){
    blossom_spa_pro_social_links( true, false );
}
endif;
add_action( 'blossom_spa_pro_coming_soon', 'blossom_spa_pro_coming_soon_social_links', 20 );

if( ! function_exists( 'blossom_spa_pro_coming_soon_page_template' ) ) :
/** 
 * Hook to include coming soon page 
**/
function blossom_spa_pro_coming_soon_page_template( $template ) {                 
    $coming_soon            = get_theme_mod( 'ed_coming_soon', false );
    $coming_soon_customizer = get_theme_mod( 'ed_coming_soon_customizer', false );    
    $new_template           = locate_template( 'coming-soon/coming-soon.php' );
    
    if( $coming_soon_customizer && is_customize_preview() ){
        return $new_template;
    }elseif( $coming_soon && ! is_user_logged_in() ){
        return $new_template;
    }else{
        return $template;
    }
}
endif;   
add_filter( 'template_include', 'blossom_spa_pro_coming_soon_page_template', 99 );