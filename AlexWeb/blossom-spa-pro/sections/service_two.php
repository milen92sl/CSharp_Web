<?php
/**
 * Service Two Section
 * 
 * @package Blossom_Spa_Pro
 */
if( is_active_sidebar( 'service-two' ) ){ ?>
<section id="service_two_section" class="service-section style-2">
	<div class="grid">
    	<?php dynamic_sidebar( 'service-two' ); ?>
    </div>
</section> <!-- .service-section -->
<?php
}