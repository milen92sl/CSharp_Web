<?php
/**
 * Template Name: Service Page
 * 
 * @package Blossom_Spa_Pro
 */

get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php if( is_active_sidebar( 'service-template' ) ){
                dynamic_sidebar( 'service-template' );
            } ?>
        </main>
    </div>
<?php
get_footer();