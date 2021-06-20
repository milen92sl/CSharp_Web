<?php
/**
 * Header Eight
 * 
 * @package Blossom_Feminine_Pro 
*/

$bg      = get_header_image() ? ' style="background-image:url(' . esc_url( get_header_image() ) . ')"' : '';
$ed_cart = get_theme_mod( 'ed_cart', true );
?>

<header class="site-header header-layout-three header-layout-seven header-layout-eight" itemscope itemtype="http://schema.org/WPHeader">
	<div class="header-holder">
        <div class="header-m"<?php echo $bg; ?>>
    		<div class="container">
    			<div class="site-branding" itemscope itemtype="http://schema.org/Organization">
    				<?php blossom_feminine_pro_get_site_title_description(); ?>
    			</div>
    		</div>
    	</div>
    </div>
	<div class="sticky-holder"></div>
    <div class="header-b">
		<div class="container">
			<?php blossom_feminine_pro_get_primary_nav(); ?>
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
	</div>
</header>