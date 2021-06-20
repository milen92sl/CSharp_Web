<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blossom_Feminine_Pro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <?php
        /**
         * Post Thumbnail
         * 
         * @hooked blossom_feminine_pro_post_thumbnail
        */
        do_action( 'blossom_feminine_pro_before_entry_content' );
    ?>
    
    <div class="text-holder">
	   <?php
            /**
             * Entry Content
             * 
             * @hooked blossom_feminine_pro_entry_content - 15
             * @hooked blossom_feminine_pro_entry_footer  - 20
            */
            do_action( 'blossom_feminine_pro_page_entry_content' );        
        ?>
    </div><!-- .text-holder -->
</article><!-- #post-<?php the_ID(); ?> -->
