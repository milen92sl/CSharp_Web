<?php
/**
 * Header Three
 *
 * @package Blossom_Pin_Pro
 */
$ed_header_search = get_theme_mod( 'ed_header_search', true );
?>

<header class="site-header header-layout-three" itemscope itemtype="http://schema.org/WPHeader">
	 <div class="header-t">
        <div class="container">                                
            <?php 
            if( blossom_pin_pro_social_links( false, false ) ){
                blossom_pin_pro_social_links( true, false );
            }
            blossom_pin_pro_primary_nagivation();
            if( $ed_header_search ) {
                get_search_form();
            } 
            ?>
        </div>
    </div> <!-- .header-t -->
    <div class="header-b">
        <div class="container">
            <?php blossom_pin_pro_site_branding(); ?>
        </div>
    </div><!-- .header-b -->
</header>