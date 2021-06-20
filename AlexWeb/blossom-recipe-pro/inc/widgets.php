<?php
/**
 * Blossom Recipe Pro Widget Areas
 * 
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_widgets_init(){    
    $sidebars = array(
        'sidebar'   => array(
            'name'        => __( 'Sidebar', 'blossom-recipe-pro' ),
            'id'          => 'sidebar', 
            'description' => __( 'Default Sidebar', 'blossom-recipe-pro' ),
        ),
        'newsletter-section'   => array(
            'name'        => __( 'Newsletter Section', 'blossom-recipe-pro' ),
            'id'          => 'newsletter-section', 
            'description' => __( 'Add "BlossomThemes: Email Newsletter Widget" for newsletter section.', 'blossom-recipe-pro' ),
        ),
        'footer-one'=> array(
            'name'        => __( 'Footer One', 'blossom-recipe-pro' ),
            'id'          => 'footer-one', 
            'description' => __( 'Add footer one widgets here.', 'blossom-recipe-pro' ),
        ),
        'footer-two'=> array(
            'name'        => __( 'Footer Two', 'blossom-recipe-pro' ),
            'id'          => 'footer-two', 
            'description' => __( 'Add footer two widgets here.', 'blossom-recipe-pro' ),
        ),
        'footer-three'=> array(
            'name'        => __( 'Footer Three', 'blossom-recipe-pro' ),
            'id'          => 'footer-three', 
            'description' => __( 'Add footer three widgets here.', 'blossom-recipe-pro' ),
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
    $dynamic_sidebars = blossom_recipe_pro_get_dynamnic_sidebar();
    
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
add_action( 'widgets_init', 'blossom_recipe_pro_widgets_init' );