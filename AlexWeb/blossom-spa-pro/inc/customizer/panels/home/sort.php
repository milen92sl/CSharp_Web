<?php
/**
 * Sort front Page Settings
 *
 * @package Blossom_Spa_Pro
 */

function blossom_spa_pro_customize_register_frontpage_sort( $wp_customize ){
    
    /** Sort Front Page Section */
    $wp_customize->add_section(
        'sort_front_page_settings',
        array(
            'title'    => __( 'Sort Front Page Section', 'blossom-spa-pro' ),
            'priority' => 150,
            'panel'    => 'frontpage_settings',
        )
    );
    
    /** Sort Front Page Section Section */
    $wp_customize->add_setting(
		'front_sort', 
		array(
			'default' => array( 'service', 'about', 'popular_product', 'cta', 'service_two', 'special_pricing', 'service_three', 'pricing', 'cta_two', 'team', 'blog', 'gallery', 'testimonial', 'products', 'contact' ),
			'sanitize_callback' => 'blossom_spa_pro_sanitize_sortable',						
		)
	);

	$wp_customize->add_control(
		new Blossom_Spa_Pro_Sortable_Control(
			$wp_customize,
			'front_sort',
			array(
				'section'     => 'sort_front_page_settings',
				'label'       => __( 'Sort Sections', 'blossom-spa-pro' ),
				'description' => __( 'Sort or toggle front page sections.', 'blossom-spa-pro' ),
				'choices'     => array(
                    'service'           => __( 'Service Section', 'blossom-spa-pro' ),
                    'about'             => __( 'About Section', 'blossom-spa-pro' ),
            		'popular_product'   => __( 'Popular Product Section', 'blossom-spa-pro' ),
                    'cta'               => __( 'Call To Action Section', 'blossom-spa-pro' ),
                    'service_two'       => __( 'Service Two Section', 'blossom-spa-pro' ),
                    'special_pricing'   => __( 'Special Pricing Section', 'blossom-spa-pro' ),
                    'service_three'     => __( 'Service Three Section', 'blossom-spa-pro' ),
                    'pricing'           => __( 'Pricing Section', 'blossom-spa-pro' ),
                    'cta_two'           => __( 'Call To Action Two Section', 'blossom-spa-pro' ),
                    'team'              => __( 'Team Section', 'blossom-spa-pro' ),
                    'blog'              => __( 'Blog Section', 'blossom-spa-pro' ),
                    'gallery'           => __( 'Gallery Section', 'blossom-spa-pro' ),
                    'testimonial'       => __( 'Testimonial Section', 'blossom-spa-pro' ),
                    'products'          => __( 'Products Section', 'blossom-spa-pro' ),
                    'contact'           => __( 'Contact Section', 'blossom-spa-pro' ),
            	),
			)
		)
	);
    
}
add_action( 'customize_register', 'blossom_spa_pro_customize_register_frontpage_sort' );