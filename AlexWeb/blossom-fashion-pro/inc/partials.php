<?php
/**
 * Customizer Partials
 *
 * @package Blossom_Fashion_Pro
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blossom_fashion_pro_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blossom_fashion_pro_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if( ! function_exists( 'blossom_fashion_pro_get_slider_readmore' ) ) :
/**
 * Slider Readmore
*/
function blossom_fashion_pro_get_slider_readmore(){
    return get_theme_mod( 'slider_readmore', __( 'Continue Reading', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_get_shop_title' ) ) :
/**
 * Display blog readmore button
*/
function blossom_fashion_pro_get_shop_title(){
    return get_theme_mod( 'shop_section_title', __( 'Welcome to our Shop!', 'blossom-fashion-pro' ) );    
}
endif;

if( ! function_exists( 'blossom_fashion_pro_get_shop_content' ) ) :
/**
 * Display blog readmore button
*/
function blossom_fashion_pro_get_shop_content(){
    return get_theme_mod( 'shop_section_content', __( 'This option can be change from Customize > General Settings > Shop settings.', 'blossom-fashion-pro' ) );    
}
endif;

if( ! function_exists( 'blossom_fashion_pro_get_read_more' ) ) :
/**
 * Display blog readmore button
*/
function blossom_fashion_pro_get_read_more(){
    return get_theme_mod( 'read_more_text', __( 'Continue Reading', 'blossom-fashion-pro' ) );    
}
endif;

if( ! function_exists( 'blossom_fashion_pro_get_author_label' ) ) :
/**
 * Author Label
*/
function blossom_fashion_pro_get_author_label(){
    return get_theme_mod( 'author_archive_label', __( 'All Posts By', 'blossom-fashion-pro' ) );    
}
endif;

if( ! function_exists( 'blossom_fashion_pro_get_search_label' ) ) :
/**
 * Search Label
*/
function blossom_fashion_pro_get_search_label(){
    return get_theme_mod( 'search_page_label', __( 'You are looking for', 'blossom-fashion-pro' ) );    
}
endif;

if( ! function_exists( 'blossom_fashion_pro_get_affiliate_header_label' ) ) :
/**
 * Single Affiliate Header label
*/
function blossom_fashion_pro_get_affiliate_header_label(){
    return get_theme_mod( 'affiliate_widget_label', __( '#Shop This Look', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_get_single_header_label' ) ) :
/**
 * Single Header label
*/
function blossom_fashion_pro_get_single_header_label(){
    return get_theme_mod( 'single_header_label', __( 'You Are Reading', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_get_single_affiliate_header_label' ) ) :
/**
 * Single Affiliate Header label
*/
function blossom_fashion_pro_get_single_affiliate_header_label(){
    return get_theme_mod( 'affiliate_widget_single_label', __( 'Shop This Look', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_get_author_title' ) ) :
/**
 * Display blog readmore button
*/
function blossom_fashion_pro_get_author_title(){
    return get_theme_mod( 'author_title', __( 'About Author', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_get_related_title' ) ) :
/**
 * Display blog readmore button
*/
function blossom_fashion_pro_get_related_title(){
    return get_theme_mod( 'related_post_title', __( 'You may also like...', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_get_popular_title' ) ) :
/**
 * Display blog readmore button
*/
function blossom_fashion_pro_get_popular_title(){
    return get_theme_mod( 'popular_post_title', __( 'Popular Articles...', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_get_bottom_shop_title' ) ) :
/**
 * Display blog readmore button
*/
function blossom_fashion_pro_get_bottom_shop_title(){
    return get_theme_mod( 'bottom_shop_section_title', __( 'Shop My Closet', 'blossom-fashion-pro' ) );    
}
endif;

if( ! function_exists( 'blossom_fashion_pro_get_footer_copyright' ) ) :
/**
 * Footer Copyright
*/
function blossom_fashion_pro_get_footer_copyright(){
    $copyright = get_theme_mod( 'footer_copyright' );
    echo '<span class="copyright">';
    if( $copyright ){
        echo wp_kses_post( $copyright );
    }else{
        esc_html_e( '&copy; Copyright ', 'blossom-fashion-pro' );
        echo date_i18n( esc_html__( 'Y', 'blossom-fashion-pro' ) );
        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
        esc_html_e( 'All Rights Reserved. ', 'blossom-fashion-pro' );
    }
    echo '</span>'; 
}
endif;

if( ! function_exists( 'blossom_fashion_pro_ed_author_link' ) ) :
/**
 * Show/Hide Author link in footer
*/
function blossom_fashion_pro_ed_author_link(){
    $ed_author_link = get_theme_mod( 'ed_author_link' );
    if( ! $ed_author_link ) echo '<span class="author-link">' . esc_html__( ' Blossom Fashion by ', 'blossom-fashion-pro' ) . '<a href="' . esc_url( 'https://blossomthemes.com/downloads/blossom-fashion-pro' ) .'" rel="author" target="_blank">' . esc_html__( ' Blossom Themes ', 'blossom-fashion-pro' ) . '</a></span>';
}
endif;

if( ! function_exists( 'blossom_fashion_pro_ed_wp_link' ) ) :
/**
 * Show/Hide WordPress link in footer
*/
function blossom_fashion_pro_ed_wp_link(){
    $ed_wp_link = get_theme_mod( 'ed_wp_link' );
    if( ! $ed_wp_link ) printf( esc_html__( '%1$s Powered by %2$s%3$s', 'blossom-fashion-pro' ), '<span class="wp-link">', '<a href="'. esc_url( __( 'https://wordpress.org/', 'blossom-fashion-pro' ) ) .'" target="_blank">WordPress</a>.', '</span>' );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_contact_title' ) ) :
/**
 * Contact Title
*/
function blossom_fashion_pro_contact_title(){
    return get_theme_mod( 'contact_title', __( 'Contact Me', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_contact_content' ) ) :
/**
 * Contact Content
*/
function blossom_fashion_pro_contact_content(){
    return get_theme_mod( 'contact_content', __( 'The contact page is just for demonstration purpose. Please DON\'T contact us via the contact form. For any questions or support, contact us on our support forum.', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_contact_info_title' ) ) :
/**
 * Contact Info Title
*/
function blossom_fashion_pro_contact_info_title(){
    return get_theme_mod( 'info_title', __( 'Get In Touch', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_contact_info_content' ) ) :
/**
 * Contact Info Content
*/
function blossom_fashion_pro_contact_info_content(){
    return get_theme_mod( 'info_content', __( 'You can get in touch with me directly at hello@domain.com. I am also available for freelance. Interested in collaboration? Get in touch', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_contact_phone' ) ) :
/**
 * Contact Phone
*/
function blossom_fashion_pro_contact_phone(){
    return get_theme_mod( 'contact_phone', __( '+080 555 44 11', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_contact_phone_label' ) ) :
/**
 * Contact Phone Label
*/
function blossom_fashion_pro_contact_phone_label(){
    return get_theme_mod( 'contact_phone_label', __( 'Contact us by telephone', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_contact_email' ) ) :
/**
 * Contact Email
*/
function blossom_fashion_pro_contact_email(){
    return get_theme_mod( 'contact_email', __( 'mail@domain.com', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_contact_email_label' ) ) :
/**
 * Contact Email Label
*/
function blossom_fashion_pro_contact_email_label(){
    return get_theme_mod( 'email_label', __( 'Write us a message', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_contact_address' ) ) :
/**
 * Contact Address
*/
function blossom_fashion_pro_contact_address(){
    return get_theme_mod( 'contact_address', __( '123 New York, NY 60606', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_contact_address_label' ) ) :
/**
 * Contact Address Label
*/
function blossom_fashion_pro_contact_address_label(){
    return get_theme_mod( 'location_label', __( 'Our address', 'blossom-fashion-pro' ) );
}
endif;

if( ! function_exists( 'blossom_fashion_pro_contact_social_label' ) ) :
/**
 * Social Label
*/
function blossom_fashion_pro_contact_social_label(){
    return get_theme_mod( 'social_links_label', __( 'Get Social', 'blossom-fashion-pro' ) );
}
endif;