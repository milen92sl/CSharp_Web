<?php
/**
 * Service Three Section
 * 
 * @package Blossom_Spa_Pro
 */
$background_image = get_theme_mod( 'service_background_image', get_template_directory_uri() .'/images/service-bg.jpg' );

if( is_active_sidebar( 'service-three' ) ){ ?>
<section id="service_three_section" class="service-section style-3" style="background-image: url( '<?php echo esc_url( $background_image ); ?>' ); background-repeat: no-repeat;">
	<div class="container">
		<div class="grid">
	    	<?php dynamic_sidebar( 'service-three' ); ?>
	    </div>
    </div>
</section> <!-- .service-section -->
<?php
}