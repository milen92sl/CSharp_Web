<?php
/**
 * Template Name: Team Page
 *  
 * @package Blossom_Spa_Pro
 */

get_header(); ?>
    <div id="primary" class="content-area">
		<main id="main" class="site-main">
		    <?php if( is_active_sidebar( 'team-template' ) ){
		        dynamic_sidebar( 'team-template' );
		    } ?>
		</main>
	</div>
<?php   
get_footer();