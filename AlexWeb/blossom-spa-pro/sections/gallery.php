<?php
/**
 * Gallery Section
 * 
 * @package Blossom_Spa_Pro
 */

$view_all_label = get_theme_mod( 'gallery_btn_label', __( 'SEE ALL PHOTOS', 'blossom-spa-pro' ) );
$view_all_url   = get_theme_mod( 'gallery_btn_url', '#' );

if( is_active_sidebar( 'gallery' ) ) { ?>

<section id="gallery_section" class="gallery-section">
	<div class="container">
		<?php 
		dynamic_sidebar( 'gallery' );
    	
    	if( $view_all_url && $view_all_label ){
			echo '<a href="'. esc_url( $view_all_url ) .'" class="btn-readmore">'. esc_html( $view_all_label ) .'</a>';
		} ?>
    </div>
</section> <!-- .gallery-section -->
<?php
}