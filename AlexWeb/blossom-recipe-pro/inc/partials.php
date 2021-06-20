<?php
/**
 * Blossom Recipe Pro Customizer Partials
 *
 * @package Blossom_Recipe_Pro
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blossom_recipe_pro_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blossom_recipe_pro_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if( ! function_exists( 'blossom_recipe_pro_get_read_more' ) ) :
/**
 * Display blog readmore button
*/
function blossom_recipe_pro_get_read_more(){
    return esc_html( get_theme_mod( 'read_more_text', __( 'Read More', 'blossom-recipe-pro' ) ) );    
}
endif;

if( ! function_exists( 'blossom_recipe_pro_get_author_title' ) ) :
/**
 * Display about author title
*/
function blossom_recipe_pro_get_author_title(){
    return esc_html( get_theme_mod( 'author_title', __( 'About Author', 'blossom-recipe-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_recipe_pro_get_related_title' ) ) :
/**
 * Display single related title
*/
function blossom_recipe_pro_get_related_title(){
    return esc_html( get_theme_mod( 'related_post_title', __( 'You may also like...', 'blossom-recipe-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_recipe_pro_get_related_post_blog_title' ) ) :
/**
 * Display blog related title
*/
function blossom_recipe_pro_get_related_post_blog_title(){
    return esc_html( get_theme_mod( 'related_post_blog_title', __( 'You may also like', 'blossom-recipe-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_recipe_pro_get_footer_copyright' ) ) :
/**
 * Footer Copyright
*/
function blossom_recipe_pro_get_footer_copyright(){
    $copyright = get_theme_mod( 'footer_copyright' );
    echo '<span class="copyright-text">';
    if( $copyright ){
        echo wp_kses_post( blossom_recipe_pro_apply_theme_shortcode( $copyright ) );
    }else{
        esc_html_e( '&copy; Copyright ', 'blossom-recipe-pro' );
        echo date_i18n( esc_html__( 'Y', 'blossom-recipe-pro' ) );
        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
        esc_html_e( 'All Rights Reserved. ', 'blossom-recipe-pro' );
    }
    echo '</span>'; 
}
endif;

if( ! function_exists( 'blossom_recipe_pro_ed_author_link' ) ) :
/**
 * Show/Hide Author link in footer
*/
function blossom_recipe_pro_ed_author_link(){
    $ed_author_link = get_theme_mod( 'ed_author_link', false );
    if( ! $ed_author_link ) echo '<span class="author-link"><a href="' . esc_url( 'https://blossomthemes.com/downloads/blossom-recipe-pro/' ) .'" rel="author" target="_blank">' . esc_html__( ' Blossom Recipe Pro', 'blossom-recipe-pro' ) . '</a>' . esc_html__( ' by Blossom Themes.', 'blossom-recipe-pro' ) . '</span>';
}
endif;

if( ! function_exists( 'blossom_recipe_pro_ed_wp_link' ) ) :
/**
 * Show/Hide WordPress link in footer
*/
function blossom_recipe_pro_ed_wp_link(){
    $ed_wp_link = get_theme_mod( 'ed_wp_link', false );
    if( ! $ed_wp_link ) printf( esc_html__( '%1$s Powered by %2$s%3$s', 'blossom-recipe-pro' ), '<span class="wp-link">', '<a href="'. esc_url( __( 'https://wordpress.org/', 'blossom-recipe-pro' ) ) .'" target="_blank">WordPress</a>. ', '</span>' );
}
endif;