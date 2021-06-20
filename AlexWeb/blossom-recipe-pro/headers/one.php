<?php
/**
 * Header One
 * 
 * @package Blossom_Recipe_Pro
 */
 
$ed_cart   = get_theme_mod( 'ed_shopping_cart', true );
$ed_search = get_theme_mod( 'ed_header_search', true ); ?>

<header id="masthead" class="site-header header-one" itemscope itemtype="http://schema.org/WPHeader">
	<div class="main-header">
		<div class="container">
			<?php if( blossom_recipe_pro_social_links( false ) ){
                echo '<div class="header-social-icons">';
                blossom_recipe_pro_social_links();
                echo '</div>';
            } ?>
            <?php if( ( is_woocommerce_activated() && $ed_cart ) || $ed_search ){ 
                echo '<div class="search-wrap">';
                if( $ed_search ) blossom_recipe_pro_form_section();
                if( is_woocommerce_activated() && $ed_cart ) blossom_recipe_pro_wc_cart_count();
                echo '</div>';
            } ?>
			<?php blossom_recipe_pro_site_branding(); ?>
		</div>
	</div><!-- .main-header -->
	<div class="nav-wrap">
		<div class="container">
			<?php blossom_recipe_pro_primary_nagivation(); ?>
		</div>
	</div>
</header>