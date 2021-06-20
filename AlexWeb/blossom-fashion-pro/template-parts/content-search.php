<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Fashion_Pro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">
	
    <?php 
        /**
         * @hooked blossom_fashion_pro_post_thumbnail
        */
        do_action( 'blossom_fashion_pro_before_entry_content' );
    ?>
    
    <div class="text-holder">
    <?php    
        /**
         * @hooked blossom_fashion_pro_entry_header  - 10
         * @hooked blossom_fashion_pro_entry_content - 15
         * @hooked blossom_fashion_pro_entry_footer  - 20
        */
        do_action( 'blossom_fashion_pro_entry_content' );
    ?>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
