<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Spa_Pro
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); if( ! is_single() ) echo ' itemscope itemtype="https://schema.org/Blog"'; ?>>
	<?php 

        /**
         * @hooked blossom_spa_pro_article_share - 10
         * @hooked blossom_spa_pro_figure_content - 20
        */
        do_action( 'blossom_spa_pro_before_post_entry_content' );
    
        /**
         * @hooked blossom_spa_pro_entry_header   - 10 
         * @hooked blossom_spa_pro_entry_content - 15
         * @hooked blossom_spa_pro_entry_footer  - 20
        */
        do_action( 'blossom_spa_pro_post_entry_content' );
    ?>
</article><!-- #post-<?php the_ID(); ?> -->
