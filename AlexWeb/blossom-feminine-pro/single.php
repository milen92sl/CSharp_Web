<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blossom_Feminine_Pro
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			/**
             * @hooked blossom_feminine_pro_get_ad_after_content - 10
             * @hooked blossom_feminine_pro_author               - 15
             * @hooked blossom_feminine_pro_newsletter           - 20
             * @hooked blossom_feminine_pro_navigation           - 25
             * @hooked blossom_feminine_pro_related_posts        - 30
             * @hooked blossom_feminine_pro_comment              - 35
            */
            do_action( 'blossom_feminine_pro_after_post_content' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
