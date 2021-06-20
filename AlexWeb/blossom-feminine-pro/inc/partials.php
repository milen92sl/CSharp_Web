<?php
/**
 * Partials for Selective Refresh
 * 
 * @package Blossom_Feminine_Pro
 */
 
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blossom_feminine_pro_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blossom_feminine_pro_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if( ! function_exists( 'blossom_feminine_pro_get_footer_copyright' ) ) :
/**
 * Prints footer copyright
*/
function blossom_feminine_pro_get_footer_copyright(){
    $copyright = get_theme_mod( 'footer_copyright' );
    echo '<span class="copyright">';
    if( $copyright ){
        echo wp_kses_post( $copyright );
    }else{        
        echo date_i18n( esc_html__( 'Y', 'blossom-feminine-pro' ) );
        esc_html_e( ' Copyright ', 'blossom-feminine-pro' ); 
        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';    
    }    
    echo '</span>';
}
endif;

if( ! function_exists( 'blossom_feminine_pro_get_read_more' ) ) :
/**
 * Display blog readmore button
*/
function blossom_feminine_pro_get_read_more(){
    return get_theme_mod( 'read_more_text', __( 'Read More', 'blossom-feminine-pro' ) );    
}
endif;

if( ! function_exists( 'blossom_feminine_pro_get_related_title' ) ) :
/**
 * Display related post title
*/
function blossom_feminine_pro_get_related_title(){
    return get_theme_mod( 'related_post_title', __( 'You may also like...', 'blossom-feminine-pro' ) );
}
endif;

if( ! function_exists( 'blossom_feminine_pro_get_popular_title' ) ) :
/**
 * Display popular post title
*/
function blossom_feminine_pro_get_popular_title(){
    return get_theme_mod( 'popoular_post_title', __( 'Popular Articles...', 'blossom-feminine-pro' ) );
}
endif;

if( ! function_exists( 'blossom_feminine_pro_ed_author_link' ) ) :
/**
 * Show/Hide Author link in footer
*/
function blossom_feminine_pro_ed_author_link(){
    $ed_author_link = get_theme_mod( 'ed_author_link' );
    if( ! $ed_author_link ) echo '<span class="author-link"><a href="' . esc_url( 'https://blossomthemes.com/downloads/blossom-feminine-pro/' ) .'" rel="author" target="_blank">' . esc_html__( ' Blossom Feminine', 'blossom-feminine-pro' ) . '</a>' . esc_html__( ' by Blossom Themes.', 'blossom-feminine-pro' ) . '</span>';
}
endif;

if( ! function_exists( 'blossom_feminine_pro_ed_wp_link' ) ) :
/**
 * Show/Hide WordPress link in footer
*/
function blossom_feminine_pro_ed_wp_link(){
    $ed_wp_link = get_theme_mod( 'ed_wp_link' );
    if( ! $ed_wp_link ) printf( esc_html__( '%1$s Powered by %2$s%3$s', 'blossom-feminine-pro' ), '<span class="wp-link">', '<a href="'. esc_url( __( 'https://wordpress.org/', 'blossom-feminine-pro' ) ) .'" target="_blank">WordPress</a>.', '</span>' );
}
endif;