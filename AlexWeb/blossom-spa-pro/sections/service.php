<?php
/**
 * Services Section
 * 
 * @package Blossom_Spa_Pro
 */
if( is_active_sidebar( 'service' ) ){ ?>
<section id="service_section" class="service-section style-1">
	<div class="container">
		<div class="grid">
	    	<?php dynamic_sidebar( 'service' ); ?>
	    </div>
	</div>
</section> <!-- .service-section -->
<?php
}