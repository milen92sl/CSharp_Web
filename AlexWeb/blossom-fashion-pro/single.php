<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blossom_Fashion_Pro
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
        
        <?php
        /**
         * @hooked blossom_fashion_pro_navigation           - 15
         * @hooked blossom_fashion_pro_get_ad_after_content - 20 
         * @hooked blossom_fashion_pro_author               - 25
         * @hooked blossom_fashion_pro_newsletter           - 30
         * @hooked blossom_fashion_pro_related_posts        - 35
         * @hooked blossom_fashion_pro_popular_posts        - 40
         * @hooked blossom_fashion_pro_comment              - 45
        */
        do_action( 'blossom_fashion_pro_after_post_content' );
        ?>
        
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
