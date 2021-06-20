<?php
/**
 * Template Name: Contact Page
 *
 * @package Blossom_Fashion_Pro
 */

get_header(); 

    /**
     * Contact Page Hook
     * 
     * @hooked blossom_fashion_pro_contact_top_section - 15
     * @hooked blossom_fashion_pro_contact_details     - 20
    */
    do_action( 'blossom_fashion_pro_contact_page' );
    
get_footer();