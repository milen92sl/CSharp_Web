<?php
/**
 * Header Six
 *
 * @package Blossom_Pin_Pro
 */
?>

<header class="site-header header-layout-six" itemscope itemtype="http://schema.org/WPHeader">
	<div class="header-t">
        <div class="container clearfix">
            <?php 
           		blossom_pin_pro_site_branding();

           		/**
                * Header AD
                * @hooked blossom_pin_pro_get_header_ad
                */
           		do_action('blossom_pin_pro_header_ad');
            ?>
        </div>
    </div> <!-- header-t -->
    <div class="header-b">
        <div class="container clearfix">
            <?php 
            	blossom_pin_pro_primary_nagivation(); 
            	blossom_pin_pro_tools();
            ?>              
        </div>
    </div> <!-- header-b -->	
</header>