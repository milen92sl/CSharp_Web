<?php
/**
 * Header One
 * 
 * @package Blossom_Feminine_Pro 
*/

$ed_cart = get_theme_mod( 'ed_cart', true );
?>
<header id="masthead" class="site-header wow fadeIn" data-wow-delay="0.1s" itemscope itemtype="http://schema.org/WPHeader">
    
	<div class="header-holder">
        <div class="header-t">
    		<div class="container">			
                <?php blossom_feminine_pro_get_secondary_nav(); ?>            
    			<div class="right">
        			<div class="tools">
                        <?php
                            blossom_feminine_pro_get_search_form();
                            if( is_woocommerce_activated() && $ed_cart ) blossom_feminine_pro_wc_cart_count();    
                        ?>
                    </div>
                    <?php blossom_feminine_pro_social_links(); ?>                
    			</div>            
    		</div>
    	</div><!-- .header-t -->
        
    	<div class="header-m">
    		<div class="container" itemscope itemtype="http://schema.org/Organization">
    			<?php blossom_feminine_pro_get_site_title_description(); ?>
    		</div>
    	</div><!-- .header-m -->
    </div>
    <div class="sticky-holder"></div>
	<div class="header-b">
		<div class="container">
			 <?php blossom_feminine_pro_get_primary_nav(); ?>               
		</div>
	</div><!-- .header-b -->
    
</header><!-- #masthead -->