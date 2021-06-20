<?php
/**
 * Header Four
 *
 * @package Blossom_Pin_Pro
 */
$ed_header_search = get_theme_mod( 'ed_header_search', true );
?>

<header class="site-header header-layout-four" itemscope itemtype="http://schema.org/WPHeader">
	<div class="container">
	    <div class="header-t">
	        <?php 
	        	if( blossom_pin_pro_social_links( false, false ) ){
	                echo '<span class="separator"></span>';
	                blossom_pin_pro_social_links( true, false );
	            }
	            blossom_pin_pro_site_branding();
	            if( $ed_header_search ) {
	            	get_search_form();
	        	} 
	        ?>
	    </div> <!-- header-t -->
	</div>
    <div class="header-b">
        <?php blossom_pin_pro_primary_nagivation(); ?>    
    </div> <!-- header-b -->
</header>