<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Blossom_Recipe_Pro
 */

get_header(); ?>
    
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="error-404 not-found">
            	<header class="page-header">
                    <h1><?php esc_html_e( 'Uh-Oh...', 'blossom-recipe-pro' ); ?></h1>
                </header>
                <div class="page-content">
                    <p class="error-text"><?php esc_html_e( 'The page you are looking for may have been moved, deleted, or possibly never existed.', 'blossom-recipe-pro' ); ?></p>
                    <div class="error-num"><?php esc_html_e( '404', 'blossom-recipe-pro' ); ?></div>
                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="bttn"><?php esc_html_e( 'Take me to the home page', 'blossom-recipe-pro' ); ?></a>
                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
            </section>
            <?php     
            /**
             * @see blossom_recipe_pro_latest_posts
            */
            do_action( 'blossom_recipe_pro_latest_posts' ); ?>
        </main>
    </div>
    
<?php 
get_footer();
