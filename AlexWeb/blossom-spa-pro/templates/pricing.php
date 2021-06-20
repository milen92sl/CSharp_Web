<?php
/**
 * Template Name: Pricing Page
 *  
 * @package Blossom_Spa_Pro
 */

get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php if( is_active_sidebar( 'pricing-template' ) ){
                echo '<div class="pricing-tbl-wrap">';
                dynamic_sidebar( 'pricing-template' );
                echo '</div>';
            } ?>
            <?php if( is_active_sidebar( 'pricing-faq-template' ) ){
                echo '<section class="faq-text-section">';
                dynamic_sidebar( 'pricing-faq-template' );
                echo '</section>';
            } ?>
        </main>
    </div>
<?php      
get_footer();