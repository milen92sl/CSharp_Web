<?php
/**
 * CTA Section
 * 
 * @package Blossom_Spa_Pro
 */
if( is_active_sidebar( 'cta-two' ) ){ ?>
<section id="cta_two_section" class="cta-section">
    <?php dynamic_sidebar( 'cta-two' ); ?>
</section> <!-- .bg-cta-section -->
<?php
}