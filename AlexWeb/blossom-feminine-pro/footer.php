<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blossom_Feminine_Pro
 */
    /**
     * After Content
     * 
     * @hooked blossom_feminine_pro_content_end - 20
    */
    do_action( 'blossom_feminine_pro_before_footer' );

    /**
     * After Content
     * 
     * @hooked blossom_feminine_pro_instagram_gallery - 15
     * @hooked blossom_feminine_pro_newsletter_beauty - 20
    */
    do_action( 'blossom_feminine_pro_above_footer' );
    

    /**
     * Footer
     * 
     * @hooked blossom_feminine_pro_footer_start  - 20
     * @hooked blossom_feminine_pro_footer_top    - 30
     * @hooked blossom_feminine_pro_footer_bottom - 40
     * @hooked blossom_feminine_pro_footer_end    - 50
    */
    do_action( 'blossom_feminine_pro_footer' );
    
    /**
     * After Footer
     * 
     * @hooked blossom_feminine_pro_back_to_top - 15
     * @hooked blossom_feminine_pro_page_end    - 20
    */
    do_action( 'blossom_feminine_pro_after_footer' );
    
    wp_footer(); ?>

</body>
</html>
