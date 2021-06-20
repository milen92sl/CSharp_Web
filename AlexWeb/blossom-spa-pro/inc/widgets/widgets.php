<?php
/**
 * Blossom Spa Pro Widget Areas
 * 
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_widgets_init(){    
    $sidebars = array(
        'sidebar'   => array(
            'name'        => __( 'Sidebar', 'blossom-spa-pro' ),
            'id'          => 'sidebar', 
            'description' => __( 'Default Sidebar', 'blossom-spa-pro' ),
        ),
        'service' => array(
            'name'        => __( 'Service Section', 'blossom-spa-pro' ),
            'id'          => 'service', 
            'description' => __( 'Add "Text" and "Blossom: Icon Text" widget for service section.', 'blossom-spa-pro' ),
        ),
        'about' => array(
            'name'        => __( 'About Section', 'blossom-spa-pro' ),
            'id'          => 'about', 
            'description' => __( 'Add "Blossom: Featured Page Widget" for about section.', 'blossom-spa-pro' ),
        ),
        'cta' => array(
            'name'        => __( 'Call To Action Section', 'blossom-spa-pro' ),
            'id'          => 'cta', 
            'description' => __( 'Add "Blossom: Call To Action" widget for Call to Action section.', 'blossom-spa-pro' ),
        ),
        'service-two' => array(
            'name'        => __( 'Service Two Section', 'blossom-spa-pro' ),
            'id'          => 'service-two', 
            'description' => __( 'Add "Image" and "Blossom: Icon Text" widget for service section.', 'blossom-spa-pro' ),
        ),
        'service-three' => array(
            'name'        => __( 'Service Three Section', 'blossom-spa-pro' ),
            'id'          => 'service-three', 
            'description' => __( 'Add "Text" and "Blossom: Icon Text" widget for service section.', 'blossom-spa-pro' ),
        ),
        'pricing' => array(
            'name'        => __( 'Pricing Table Section', 'blossom-spa-pro' ),
            'id'          => 'pricing', 
            'description' => __( 'Add "Text" and "Blossom: Pricing Table" widget for pricing section.', 'blossom-spa-pro' ),
        ),
        'cta-two' => array(
            'name'        => __( 'Call To Action Two Section', 'blossom-spa-pro' ),
            'id'          => 'cta-two', 
            'description' => __( 'Add "Blossom: Call To Action" widget for Call to Action section.', 'blossom-spa-pro' ),
        ),
        'team' => array(
            'name'        => __( 'Team Section', 'blossom-spa-pro' ),
            'id'          => 'team', 
            'description' => __( 'Add "Blossom: Team Member" widget for team section.', 'blossom-spa-pro' ),
        ),
        'gallery' => array(
            'name'        => __( 'Gallery Section', 'blossom-spa-pro' ),
            'id'          => 'gallery', 
            'description' => __( 'Add "Text" widget for title and description, Add "Gallery" widget for gallery images.', 'blossom-spa-pro' ),
        ),
        'testimonial' => array(
            'name'        => __( 'Testimonial Section', 'blossom-spa-pro' ),
            'id'          => 'testimonial', 
            'description' => __( 'Add "Blossom: Testimonial" widget for testimonial section.', 'blossom-spa-pro' ),
        ),
        'map' => array(
            'name'        => __( 'Map Section', 'blossom-spa-pro' ),
            'id'          => 'map', 
            'description' => __( 'Add "Custom HTML" widget to add google map & Add "Text" widget ( use shortcode ) to display contact form.', 'blossom-spa-pro' ),
        ),
        'contact' => array(
            'name'        => __( 'Contact Section', 'blossom-spa-pro' ),
            'id'          => 'contact', 
            'description' => __( 'Add "Blossom: Contact Widget" for contact details & Add "Text" widget for Opening Hours details.', 'blossom-spa-pro' ),
        ),
        'template-map' => array(
            'name'        => __( 'Contact Template Map Widget', 'blossom-spa-pro' ),
            'id'          => 'template-map', 
            'description' => __( 'Add "Custom HTML" widget for contact template map section.', 'blossom-spa-pro' ),
        ),
        'contact-template' => array(
            'name'        => __( 'Contact Template Widget', 'blossom-spa-pro' ),
            'id'          => 'contact-template', 
            'description' => __( 'Add "Blossom: Contact Widget" for contact template section.', 'blossom-spa-pro' ),
        ),
        'contact-form-template' => array(
            'name'        => __( 'Contact Template Form Widget', 'blossom-spa-pro' ),
            'id'          => 'contact-form-template', 
            'description' => __( 'Add "Text" widget ( use shortcode ) to display contact form.', 'blossom-spa-pro' ),
        ),
        'service-template' => array(
            'name'        => __( 'Service Template Widget', 'blossom-spa-pro' ),
            'id'          => 'service-template', 
            'description' => __( 'Add "Blossom: Icon Text" widget for service template section.', 'blossom-spa-pro' ),
        ),
        'team-template' => array(
            'name'        => __( 'Team Template Widget', 'blossom-spa-pro' ),
            'id'          => 'team-template', 
            'description' => __( 'Add "Blossom: Team Member" widget in Team Page Template.', 'blossom-spa-pro' ),
        ),
        'pricing-template' => array(
            'name'        => __( 'Pricing Template Widget', 'blossom-spa-pro' ),
            'id'          => 'pricing-template', 
            'description' => __( 'Add "Blossom: Pricing Table" widget in Pricing Page Template.', 'blossom-spa-pro' ),
        ),
        'pricing-faq-template' => array(
            'name'        => __( 'FAQ Widget', 'blossom-spa-pro' ),
            'id'          => 'pricing-faq-template', 
            'description' => __( 'Add "Text" widget in Pricing Page Template.', 'blossom-spa-pro' ),
        ),
        'gallery-template' => array(
            'name'        => __( 'Gallery Template Widget', 'blossom-spa-pro' ),
            'id'          => 'gallery-template', 
            'description' => __( 'Add "Text" widget for title and description, Add "Gallery" widget for gallery images.', 'blossom-spa-pro' ),
        ),
        'footer-one'=> array(
            'name'        => __( 'Footer One', 'blossom-spa-pro' ),
            'id'          => 'footer-one', 
            'description' => __( 'Add footer one widgets here.', 'blossom-spa-pro' ),
        ),
        'footer-two'=> array(
            'name'        => __( 'Footer Two', 'blossom-spa-pro' ),
            'id'          => 'footer-two', 
            'description' => __( 'Add footer two widgets here.', 'blossom-spa-pro' ),
        ),
        'footer-three'=> array(
            'name'        => __( 'Footer Three', 'blossom-spa-pro' ),
            'id'          => 'footer-three', 
            'description' => __( 'Add footer three widgets here.', 'blossom-spa-pro' ),
        ),
        'footer-four'=> array(
            'name'        => __( 'Footer Four', 'blossom-spa-pro' ),
            'id'          => 'footer-four', 
            'description' => __( 'Add footer four widgets here.', 'blossom-spa-pro' ),
        )
    );
    
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
    		'name'          => esc_html( $sidebar['name'] ),
    		'id'            => esc_attr( $sidebar['id'] ),
    		'description'   => esc_html( $sidebar['description'] ),
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2 class="widget-title" itemprop="name">',
    		'after_title'   => '</h2>',
    	) );
    }
    
    /** Dynamic sidebars */
    $dynamic_sidebars = blossom_spa_pro_get_dynamnic_sidebar();
    
    foreach( $dynamic_sidebars as $k => $v ){
        if( ! empty( $v ) ){
            register_sidebar( array(
                'name'          => esc_attr( $v ),
                'id'            => esc_attr( $k ),
                'description'   => '',
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            ) );
        }
    }
}
add_action( 'widgets_init', 'blossom_spa_pro_widgets_init' );

/**
 * Widget Pricing Table
 */
require get_template_directory() . '/inc/widgets/pricing-table.php';