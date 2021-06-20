<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blossom_Pin_Pro
 */
    /**
     * Doctype Hook
     * 
     * @hooked blossom_pin_pro_doctype
    */
    do_action( 'blossom_pin_pro_doctype' );
?>
<head itemscope itemtype="http://schema.org/WebSite">
	<?php 
    /**
     * Before wp_head
     * 
     * @hooked blossom_pin_pro_head
    */
    do_action( 'blossom_pin_pro_before_wp_head' );
    
    wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<?php
    /**
     * Before Header
     * 
     * @hooked blossom_pin_pro_page_start - 20 
    */
    do_action( 'blossom_pin_pro_before_header' );
    
    /**
     * Header
     * @hooked blossom_pin_pro_single_sticky_menu - 5  
     * @hooked blossom_pin_pro_mobile_menu - 10     
     * @hooked blossom_pin_pro_header - 20
     * @hooked blossom_pin_pro_get_ad_before_content - 30     
    */
    do_action( 'blossom_pin_pro_header' );
    
    /**
     * Before Content
     * 
     * @hooked blossom_pin_pro_banner             - 15
     * @hooked blossom_pin_pro_featured_section   - 20
    */
    do_action( 'blossom_pin_pro_after_header' );
    
    /**
     * Content
     * 
     * @hooked blossom_pin_pro_content_start - 10
     * @hooked blossom_pin_pro_content - 20
    */
    do_action( 'blossom_pin_pro_content' );