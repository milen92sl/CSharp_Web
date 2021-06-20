<?php
/**
 * Contact Section
 * 
 * @package Blossom_Spa_Pro
 */

if( is_active_sidebar( 'map' ) || is_active_sidebar( 'contact' ) ) { ?>
	<section id="contact_section" class="contact-section">
		<?php dynamic_sidebar( 'map' ); ?>
		<div class="contact-details-wrap">
			<?php dynamic_sidebar( 'contact' ); ?>
		</div>
	</section>
<?php }