<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Blossom_Pin_Pro
 */

get_header(); ?>
    <div class="error-wrapper">
        <div class="container">
            <div class="error-holder">
                <h1><?php esc_html_e( 'Uh-Oh...', 'blossom-pin-pro' ); ?></h1>
                <div class="error-content">
                    <p><?php esc_html_e( 'The page you are looking for may have been moved, deleted, or possibly never existed.', 'blossom-pin-pro' ); ?></p>
                </div>
                <h3><?php esc_html_e( '404', 'blossom-pin-pro' ); ?></h3>
                <div class="btn-home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Take me to the home page', 'blossom-pin-pro' ); ?></a></div>
                <?php get_search_form(); ?>
            </div> <!-- .error-holder -->
        </div> <!-- .container -->
    </div> <!-- .error-wrapper -->
    <?php
    /**
     * @see blossom_pin_pro_latest_posts
    */
    do_action( 'blossom_pin_pro_latest_posts' );

get_footer();