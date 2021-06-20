<?php
/**
 * Template Name: Gallery Page
 * 
 * @package Blossom_Spa_Pro
 */

get_header();

if( is_active_sidebar( 'gallery-template' ) ) { ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="gallery-section">
				<div class="container">
					<?php dynamic_sidebar( 'gallery-template' ); ?>
				</div>
			</section> <!-- .gallery-section -->
		</main>
	</div>
<?php }

get_footer();