<?php
/**
 * Blossom Spa Pro Customizer Partials
 *
 * @package Blossom_Spa_Pro
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blossom_spa_pro_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blossom_spa_pro_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if( ! function_exists( 'blossom_spa_pro_get_read_more' ) ) :
/**
 * Display blog readmore button
*/
function blossom_spa_pro_get_read_more(){
    return esc_html( get_theme_mod( 'read_more_text', __( 'Read More', 'blossom-spa-pro' ) ) );    
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_banner_title' ) ) :
/**
 * Display Banner Title
*/
function blossom_spa_pro_get_banner_title(){
    return esc_html( get_theme_mod( 'banner_title', __( 'Relaxing Is Never Easy On Your Own', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_banner_sub_title' ) ) :
/**
 * Display Banner SubTitle
*/
function blossom_spa_pro_get_banner_sub_title(){
    return wpautop( wp_kses_post( get_theme_mod( 'banner_subtitle', __( 'Come and discover your oasis. It has never been easier to take a break from stress and the harmful factors that surround you every day!', 'blossom-spa-pro' ) ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_banner_cta_one' ) ) :
/**
 * Display Banner Button Label One
*/
function blossom_spa_pro_get_banner_cta_one(){
    return esc_html( get_theme_mod( 'banner_cta1', __( 'View Services', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_banner_cta_two' ) ) :
/**
 * Display Banner Button Label Two
*/
function blossom_spa_pro_get_banner_cta_two(){
    return esc_html( get_theme_mod( 'banner_cta2', __( 'Book Now', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_popular_product_title' ) ) :
/**
 * Display Popular Products Title
*/
function blossom_spa_pro_get_popular_product_title(){
    return esc_html( get_theme_mod( 'popular_product_title', __( 'Our Most Loved Services', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_popular_product_subtitle' ) ) :
/**
 * Display Popular Products SubTitle
*/
function blossom_spa_pro_get_popular_product_subtitle(){
    return esc_html( get_theme_mod( 'popular_product_subtitle', __( 'Customers\' Favorite', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_popular_product_content' ) ) :
/**
 * Display Popular Products Content
*/
function blossom_spa_pro_get_popular_product_content(){
    return wpautop( wp_kses_post( get_theme_mod( 'popular_product_content', __( 'Show the popular products of your company here. This section can help new customers decide what procedures to try on their first visit.', 'blossom-spa-pro' ) ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_special_pricing_title' ) ) :
/**
 * Display Special Pricing Title
*/
function blossom_spa_pro_get_special_pricing_title(){
    return esc_html( get_theme_mod( 'special_pricing_title', __( 'This Week\'s Special For You', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_special_pricing_subtitle' ) ) :
/**
 * Display Special Pricing SubTitle
*/
function blossom_spa_pro_get_special_pricing_subtitle(){
    return esc_html( get_theme_mod( 'special_pricing_subtitle', __( 'Best Deals', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_special_pricing_content' ) ) :
/**
 * Display Special Pricing Content
*/
function blossom_spa_pro_get_special_pricing_content(){
    return wpautop( wp_kses_post( get_theme_mod( 'special_pricing_content', __( 'Display your deals and discounts using this section. Customers love deals, so this section is a great way of growing your business.', 'blossom-spa-pro' ) ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_special_view_all' ) ) :
/**
 * Display Special Pricing Button label
*/
function blossom_spa_pro_get_special_view_all(){
    return esc_html( get_theme_mod( 'special_view_all', __( 'View More', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_team_title' ) ) :
/**
 * Display Team Title
*/
function blossom_spa_pro_get_team_title(){
    return esc_html( get_theme_mod( 'team_title', __( 'Meet Our Experienced Team Members', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_team_subtitle' ) ) :
/**
 * Display Team SubTitle
*/
function blossom_spa_pro_get_team_subtitle(){
    return esc_html( get_theme_mod( 'team_subtitle', __( 'Over 10 Years of Experience', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_team_content' ) ) :
/**
 * Display Team Content
*/
function blossom_spa_pro_get_team_content(){
    return wpautop( wp_kses_post( get_theme_mod( 'team_content', __( 'Some of our team members have 10+ years of experience. You can introduce your team members to give a more human feeling to the company.', 'blossom-spa-pro' ) ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_blog_title' ) ) :
/**
 * Display Blog Title
*/
function blossom_spa_pro_get_blog_title(){
    return esc_html( get_theme_mod( 'blog_section_title', __( 'Read Our Recent Articles', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_blog_subtitle' ) ) :
/**
 * Display Blog SubTitle
*/
function blossom_spa_pro_get_blog_subtitle(){
    return esc_html( get_theme_mod( 'blog_section_subtitle', __( 'From Our Blog', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_blog_content' ) ) :
/**
 * Display Blog Content
*/
function blossom_spa_pro_get_blog_content(){
    return wpautop( wp_kses_post( get_theme_mod( 'blog_section_content', __( 'Show your customers that you know what you are doing by writing helpful articles related to your business. You can display your recent blog posts here. To modify this section, go to Appearance > Customize > Front Page Settings > Blog Section.', 'blossom-spa-pro' ) ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_blog_readmore' ) ) :
/**
 * Display Blog Readmore button
*/
function blossom_spa_pro_get_blog_readmore(){
    return esc_html( get_theme_mod( 'blog_readmore', __( 'Read More', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_blog_view_all' ) ) :
/**
 * Display Blog View all button
*/
function blossom_spa_pro_get_blog_view_all(){
    return esc_html( get_theme_mod( 'blog_view_all', __( 'View More', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_gallery_btn_label' ) ) :
/**
 * Display Gallery Readmore button
*/
function blossom_spa_pro_get_gallery_btn_label(){
    return esc_html( get_theme_mod( 'gallery_btn_label', __( 'SEE ALL PHOTOS', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_testimonial_title' ) ) :
/**
 * Display Testimonial Title
*/
function blossom_spa_pro_get_testimonial_title(){
    return esc_html( get_theme_mod( 'testimonial_title', __( 'Here\'s What Our Customers Think', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_testimonial_subtitle' ) ) :
/**
 * Display Testimonial SubTitle
*/
function blossom_spa_pro_get_testimonial_subtitle(){
    return esc_html( get_theme_mod( 'testimonial_subtitle', __( 'Feedbacks', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_testimonial_content' ) ) :
/**
 * Display Testimonial Content
*/
function blossom_spa_pro_get_testimonial_content(){
    return wpautop( wp_kses_post( get_theme_mod( 'testimonial_content', __( 'Our customers love us. We make sure that we make every customer happy. Showcase the feedback from your old customers to build trust with new customers using testimonials.', 'blossom-spa-pro' ) ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_product_title' ) ) :
/**
 * Display Product Title
*/
function blossom_spa_pro_get_product_title(){
    return esc_html( get_theme_mod( 'product_title', __( 'Buy The Products We Use', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_product_subtitle' ) ) :
/**
 * Display Product SubTitle
*/
function blossom_spa_pro_get_product_subtitle(){
    return esc_html( get_theme_mod( 'product_subtitle', __( 'Products We Love', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_product_content' ) ) :
/**
 * Display Product Content
*/
function blossom_spa_pro_get_product_content(){
    return wpautop( wp_kses_post( get_theme_mod( 'product_content', __( 'You can sell the products you use on your spa here.', 'blossom-spa-pro' ) ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_phone_label' ) ) :
/**
 * Header Phone Label
*/
function blossom_spa_pro_get_phone_label(){
    return esc_html( get_theme_mod( 'phone_label', __( 'Phone Number', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_phone' ) ) :
/**
 * Header Phone
*/
function blossom_spa_pro_get_phone(){
    return esc_html( get_theme_mod( 'phone', __( '+123-456-7890', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_email_label' ) ) :
/**
 * Header Email Label
*/
function blossom_spa_pro_get_email_label(){
    return esc_html( get_theme_mod( 'email_label', __( 'Email', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_email' ) ) :
/**
 * Header Email 
*/
function blossom_spa_pro_get_email(){
    return sanitize_email( get_theme_mod( 'email', __( 'mail@domain.com', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_opening_hours_label' ) ) :
/**
 * Header Opening Hours Label
*/
function blossom_spa_pro_get_opening_hours_label(){
    return esc_html( get_theme_mod( 'opening_hours_label', __( 'Opening Hours', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_opening_hours' ) ) :
/**
 * Header Opening Hours 
*/
function blossom_spa_pro_get_opening_hours(){
    return esc_html( get_theme_mod( 'opening_hours', __( 'Mon - Fri: 7AM - 7PM', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_fphone_label' ) ) :
/**
 * Footer Phone Label
*/
function blossom_spa_pro_get_fphone_label(){
    return esc_html( get_theme_mod( 'fphone_label', __( 'Phone Number', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_fphone' ) ) :
/**
 * Footer Phone
*/
function blossom_spa_pro_get_fphone(){
    return esc_html( get_theme_mod( 'fphone', __( '+123-456-7890', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_femail_label' ) ) :
/**
 * Footer Email Label
*/
function blossom_spa_pro_get_femail_label(){
    return esc_html( get_theme_mod( 'femail_label', __( 'Email', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_femail' ) ) :
/**
 * Footer Email 
*/
function blossom_spa_pro_get_femail(){
    return esc_html( get_theme_mod( 'femail', __( 'mail@domain.com', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_fopening_hours_label' ) ) :
/**
 * Footer Opening Hours Label
*/
function blossom_spa_pro_get_fopening_hours_label(){
    return esc_html( get_theme_mod( 'fopening_hours_label', __( 'Opening Hours', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_fopening_hours' ) ) :
/**
 * Footer Opening Hours 
*/
function blossom_spa_pro_get_fopening_hours(){
    return esc_html( get_theme_mod( 'fopening_hours', __( 'Mon - Fri: 7AM - 7PM', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_related_title' ) ) :
/**
 * Display Single Related Title
*/
function blossom_spa_pro_get_related_title(){
    return esc_html( get_theme_mod( 'related_post_title', __( 'Recommended Articles', 'blossom-spa-pro' ) ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_footer_copyright' ) ) :
/**
 * Footer Copyright
*/
function blossom_spa_pro_get_footer_copyright(){
    $copyright = get_theme_mod( 'footer_copyright' );
    
    echo '<div class="copyright-wrap">';
    if( $copyright ){
        echo wp_kses_post( blossom_spa_pro_apply_theme_shortcode( $copyright ) );
    }else{
        esc_html_e( '&copy; Copyright ', 'blossom-spa-pro' );
        echo date_i18n( esc_html__( 'Y', 'blossom-spa-pro' ) );
        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
        esc_html_e( ' All Rights Reserved.', 'blossom-spa-pro' );
    } 
    echo '</div>';
}
endif;

if( ! function_exists( 'blossom_spa_pro_ed_author_link' ) ) :
/**
 * Show/Hide Author link in footer
*/
function blossom_spa_pro_ed_author_link(){
    $ed_author_link = get_theme_mod( 'ed_author_link', false );
    if( ! $ed_author_link ) echo '<span class="author-link"><a href="' . esc_url( 'https://blossomthemes.com/downloads/blossom-spa-pro/' ) .'" rel="author" target="_blank">' . esc_html__( '&nbsp;Blossom Spa Pro', 'blossom-spa-pro' ) . '</a>' . esc_html__( ' by Blossom Themes.', 'blossom-spa-pro' ) . '</span>';
}
endif;

if( ! function_exists( 'blossom_spa_pro_ed_wp_link' ) ) :
/**
 * Show/Hide WordPress link in footer
*/
function blossom_spa_pro_ed_wp_link(){
    $ed_wp_link = get_theme_mod( 'ed_wp_link', false );
    if( ! $ed_wp_link ) printf( esc_html__( '%1$s &nbsp;Powered by %2$s%3$s', 'blossom-spa-pro' ), '<span class="wp-link">', '<a href="'. esc_url( __( 'https://wordpress.org/', 'blossom-spa-pro' ) ) .'" target="_blank">WordPress</a>.&nbsp;', '</span>' );
}
endif;