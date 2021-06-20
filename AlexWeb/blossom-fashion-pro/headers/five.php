<?php
/**
 * Header Five
 *
 * @package Blossom_Fashion
 */

$ed_cart   = get_theme_mod( 'ed_shopping_cart', true );
$ed_search = get_theme_mod( 'ed_header_search', true ); ?>

<div class="sticky-holder"></div>
<header class="site-header header-five" itemscope itemtype="http://schema.org/WPHeader">
	<?php
        blossom_fashion_pro_site_branding();
        blossom_fashion_pro_primary_nagivation( false );
    ?>
    
	<div class="form-holder">
		<div class="btn-close-form"><span></span></div>
        <?php get_search_form(); ?>
	</div>
    
	<div class="right">
		<?php blossom_fashion_pro_toggle(); ?>
		<?php if( ( is_woocommerce_activated() && $ed_cart ) || $ed_search ){ ?>
        <div class="tools">
			<?php
                if( is_woocommerce_activated() && $ed_cart ) blossom_fashion_pro_wc_cart_count();
                if( $ed_search ) blossom_fashion_pro_form_section();
            ?>
		</div>
		<?php } 
        
        if( ( ( is_woocommerce_activated() && $ed_cart ) || $ed_search ) && blossom_fashion_pro_social_links( false ) ) echo '<span class="separator"></span>';
        
        if( blossom_fashion_pro_social_links( false ) ){ ?>
        <div class="social-networks-holder">
			<?php blossom_fashion_pro_social_links(); ?>
		</div>
        <?php } ?>
	</div>
</header>