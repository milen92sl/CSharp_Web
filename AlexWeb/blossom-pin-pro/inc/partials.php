<?php
/**
 * Blossom Pin Pro Customizer Partials
 *
 * @package Blossom_Pin_Pro
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blossom_pin_pro_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blossom_pin_pro_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if( ! function_exists( 'blossom_pin_pro_get_banner_title' ) ) :
/**
 * Get Banner Title
*/
function blossom_pin_pro_get_banner_title(){
    return esc_html( get_theme_mod( 'banner_title', __( 'Wondering how your peers are using social media?', 'blossom-pin-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_banner_sub_title' ) ) :
/**
 * Get Banner Sub Title
*/
function blossom_pin_pro_get_banner_sub_title(){
    return wpautop( wp_kses_post( get_theme_mod( 'banner_subtitle', __( 'Discover how people in the community looks create pins to get their attention?', 'blossom-pin-pro' ) ) ) );
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_banner_label' ) ) :
/**
 * Get Banner Label
*/
function blossom_pin_pro_get_banner_label(){
    return esc_html( get_theme_mod( 'banner_label', __( 'Discover More', 'blossom-pin-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_shop_content' ) ) :
/**
 * Display blog readmore button
*/
function blossom_pin_pro_get_shop_content(){
    return esc_html( get_theme_mod( 'shop_section_content', __( 'This option can be change from Customize > General Settings > Shop settings.', 'blossom-pin-pro' ) ) );    
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_read_more' ) ) :
/**
 * Display blog readmore button
*/
function blossom_pin_pro_get_read_more(){
    return esc_html( get_theme_mod( 'read_more_text', __( 'Read More', 'blossom-pin-pro' ) ) );    
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_related_title' ) ) :
/**
 * Display blog readmore button
*/
function blossom_pin_pro_get_related_title(){
    return esc_html( get_theme_mod( 'related_post_title', __( 'Recommended Articles', 'blossom-pin-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_footer_copyright' ) ) :
/**
 * Footer Copyright
*/
function blossom_pin_pro_get_footer_copyright(){
    $copyright = get_theme_mod( 'footer_copyright' );
    echo '<span class="copyright">';
    if( $copyright ){
        echo wp_kses_post( blossom_pin_pro_apply_theme_shortcode( $copyright ) );
    }else{
        esc_html_e( '&copy; Copyright ', 'blossom-pin-pro' );
        echo date_i18n( esc_html__( 'Y', 'blossom-pin-pro' ) );
        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
        esc_html_e( 'All Rights Reserved. ', 'blossom-pin-pro' );
    }
    echo '</span>'; 
}
endif;

if( ! function_exists( 'blossom_pin_pro_ed_author_link' ) ) :
/**
 * Show/Hide Author link in footer
*/
function blossom_pin_pro_ed_author_link(){
    $ed_author_link = get_theme_mod( 'ed_author_link', false );

    if( ! $ed_author_link ) echo '<span class="author-link"><a href="' . esc_url( 'https://blossomthemes.com/downloads/blossom-pin-pro/' ) .'" rel="author" target="_blank">' . esc_html__( ' Blossom Pin Pro', 'blossom-pin-pro' ) . '</a>' . esc_html__( ' by Blossom Themes.', 'blossom-pin-pro' ) . '</span>';
}
endif;

if( ! function_exists( 'blossom_pin_pro_ed_wp_link' ) ) :
/**
 * Show/Hide WordPress link in footer
*/
function blossom_pin_pro_ed_wp_link(){
    $ed_wp_link = get_theme_mod( 'ed_wp_link', false );
    if( ! $ed_wp_link ) printf( esc_html__( '%1$s Powered by %2$s%3$s', 'blossom-pin-pro' ), '<span class="wp-link">', '<a href="'. esc_url( __( 'https://wordpress.org/', 'blossom-pin-pro' ) ) .'" target="_blank">WordPress</a>.', '</span>' );
}
endif;


if( ! function_exists( 'blossom_pin_pro_get_social_title' ) ) :
function blossom_pin_pro_get_social_title(){
    return esc_html( get_theme_mod( 'social_title', __( 'Follow Blossom Pin', 'blossom-pin-pro' ) ) );
}
endif;