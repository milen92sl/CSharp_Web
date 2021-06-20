<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blossom_Recipe_Pro
 */

get_header(); ?>

	<div id="primary" class="content-area">
	   <main id="main" class="site-main">
            <div class="article-group">
        		<?php
        		while ( have_posts() ) : the_post();

        			get_template_part( 'template-parts/content', get_post_type() );

        		endwhile; // End of the loop.
        		
                /**
                 * @hooked blossom_recipe_pro_get_ad_after_content - 5  
                 * @hooked blossom_recipe_pro_author               - 10
                 * @hooked blossom_recipe_pro_newsletter           - 15
                 * @hooked blossom_recipe_pro_navigation           - 20
                 * @hooked blossom_recipe_pro_related_posts        - 30
                 * @hooked blossom_recipe_pro_comment              - 35
                */
                do_action( 'blossom_recipe_pro_after_post_content' );
                ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
