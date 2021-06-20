<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blossom_Spa_Pro
 */

$ed_sharing     = get_theme_mod( 'ed_social_sharing', true );
$social_share   = get_theme_mod( 'social_share', array( 'facebook', 'twitter', 'pinterest', 'gplus' ) );
$ed_single_like = get_theme_mod( 'ed_single_like', true );
if( ( $ed_sharing && $social_share ) || $ed_single_like ) :
    $add_sticky_class = ' sticky-social';
else:
    $add_sticky_class = '';
endif;
    
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main<?php echo esc_attr( $add_sticky_class ); ?>">
            <?php 
    		while ( have_posts() ) : the_post();

    			get_template_part( 'template-parts/content', get_post_type() );

    		endwhile; // End of the loop.
    		?>
        </main><!-- #main -->        

        <?php
            /**
             * @hooked blossom_spa_pro_author               - 15
             * @hooked blossom_spa_pro_navigation           - 20
             * @hooked blossom_spa_pro_related_posts        - 25 
             * @hooked blossom_spa_pro_comment              - 30
            */
            do_action( 'blossom_spa_pro_after_post_content' );
        ?>
    </div><!-- #primary -->
<?php
get_sidebar();
get_footer();
