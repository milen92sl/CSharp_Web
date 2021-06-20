<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blossom_Feminine_Pro
 */

    /**
     * Doctype Hook
     * 
     * @hooked blossom_feminine_pro_doctype
    */
    do_action( 'blossom_feminine_pro_doctype' );   
?>
<head itemscope itemtype="http://schema.org/WebSite">

<?php 
    
    /**
     * Before wp_head
     * 
     * @hooked blossom_feminine_pro_head
    */
    do_action( 'blossom_feminine_pro_before_wp_head' );
    
    wp_head(); 
?>

</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	
<?php
    /**
     * Before Header
     * 
     * @hooked blossom_feminine_pro_page_start - 20 
    */
    do_action( 'blossom_feminine_pro_before_header' );
    
    /**
     * Header
     * 
     * @hooked blossom_feminine_pro_promotional_block - 15
     * @hooked blossom_feminine_pro_header            - 20     
    */
    do_action( 'blossom_feminine_pro_header' );
    
    /**
     * Before Content
     * 
     * @hooked blossom_feminine_pro_banner  - 15
     * @hooked blossom_feminine_pro_top_bar - 20
    */
    do_action( 'blossom_feminine_pro_after_header' );
    
    /**
     * Content
     * 
     * @hooked blossom_feminine_pro_content_start
    */
    do_action( 'blossom_feminine_pro_content' );