<?php
/**
 * About Section
 * 
 * @package Blossom_Spa_Pro
 */
if( is_active_sidebar( 'about' ) ){ ?>
<section id="about_section" class="about-section">
    <?php dynamic_sidebar( 'about' ); ?>
</section><!-- .about-section -->
<?php
}