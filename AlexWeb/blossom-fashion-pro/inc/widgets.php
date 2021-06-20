<?php
/**
 * Widget Areas
 *
 * @package Blossom_Fashion_Pro
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blossom_fashion_pro_widgets_init(){    
    $sidebars = array(
        'sidebar'   => array(
            'name'        => __( 'Sidebar', 'blossom-fashion-pro' ),
            'id'          => 'sidebar', 
            'description' => __( 'Default Sidebar', 'blossom-fashion-pro' ),
        ),
        'footer-one'=> array(
            'name'        => __( 'Footer One', 'blossom-fashion-pro' ),
            'id'          => 'footer-one', 
            'description' => __( 'Add footer one widgets here.', 'blossom-fashion-pro' ),
        ),
        'footer-two'=> array(
            'name'        => __( 'Footer Two', 'blossom-fashion-pro' ),
            'id'          => 'footer-two', 
            'description' => __( 'Add footer two widgets here.', 'blossom-fashion-pro' ),
        ),
        'footer-three'=> array(
            'name'        => __( 'Footer Three', 'blossom-fashion-pro' ),
            'id'          => 'footer-three', 
            'description' => __( 'Add footer three widgets here.', 'blossom-fashion-pro' ),
        ),
        'footer-four'=> array(
            'name'        => __( 'Footer Four', 'blossom-fashion-pro' ),
            'id'          => 'footer-four', 
            'description' => __( 'Add footer four widgets here.', 'blossom-fashion-pro' ),
        )
    );
    
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
    		'name'          => esc_html( $sidebar['name'] ),
    		'id'            => esc_attr( $sidebar['id'] ),
    		'description'   => esc_html( $sidebar['description'] ),
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2 class="widget-title">',
    		'after_title'   => '</h2>',
    	) );
    }
    
    /** Dynamic sidebars */
    $dynamic_sidebars = blossom_fashion_pro_get_dynamnic_sidebar();
    
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
add_action( 'widgets_init', 'blossom_fashion_pro_widgets_init' );