<?php
/**
 * Pricing Section
 * 
 * @package Blossom_Coach_Pro
 */
if( is_active_sidebar( 'pricing' ) ){ ?>
<section id="pricing_section" class="pricing-tbl-section">
	<div class="container">
		<div class="pricing-tbl-wrap">
			<?php dynamic_sidebar( 'pricing' ); ?>
		</div><!-- .pricing-tbl-wrap -->
	</div>
</section> <!-- .pricing-section -->
<?php
}