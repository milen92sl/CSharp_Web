<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Pin_Pro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

        /**
         * Post Thumbnail
         * @hooked blossom_pin_pro_single_page_header - 15
         * @hooked blossom_pin_pro_post_thumbnail -20
        */
        do_action( 'blossom_pin_pro_before_page_entry_content' );
    
        /**
         * Entry Content
         * 
         * @hooked blossom_pin_pro_entry_content - 15
         * @hooked blossom_pin_pro_entry_footer  - 20
        */
        do_action( 'blossom_pin_pro_page_entry_content' );    
    ?>
</article><!-- #post-<?php the_ID(); ?> -->
