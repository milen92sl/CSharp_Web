<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Recipe_Pro
 */

?>
<div class="article-wrap latest_post">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); if( ! is_single() ) echo ' itemscope itemtype="https://schema.org/Blog"'; ?>>
    	<?php 
            /**
             * @hooked blossom_recipe_pro_post_thumbnail - 15
            */
            do_action( 'blossom_recipe_pro_before_post_entry_content' );
            
            if( ! is_single() ) echo '<div class="article-content-wrap">';
            
            /**
             * @hooked blossom_recipe_pro_entry_header   - 10 
             * @hooked blossom_recipe_pro_entry_content - 15
             * @hooked blossom_recipe_pro_entry_footer  - 20
            */
            do_action( 'blossom_recipe_pro_post_entry_content' );

            if( ! is_single() ) echo '</div>';

        ?>
    </article><!-- #post-<?php the_ID(); ?> -->
    
    <?php if( is_brm_activated() && 'blossom-recipe' === get_post_type() ) blossom_recipe_pro_related_posts_on_blog(); ?>
</div>
