<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Blossom_Spa_Pro
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<p class="error-text"><?php esc_html_e( 'The page you are looking for may have been moved, deleted, or possibly never existed.', 'blossom-spa-pro' ); ?></p>
				<div class="error-num"><?php esc_html_e( '404','blossom-spa-pro' ); ?></div>
				<a class="bttn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Take me to the home page', 'blossom-spa-pro' ); ?></a>
				<?php get_search_form(); ?>
			</section><!-- .error-404 -->
			<?php
		    /**
		     * @see blossom_spa_pro_latest_posts
		    */
		    do_action( 'blossom_spa_pro_latest_posts' ); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
    
    <?php    
get_footer();
