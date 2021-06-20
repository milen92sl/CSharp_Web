<?php
/**
 * Header Four
 *
 * @package Blossom_Recipe_Pro
 */

$ed_cart   = get_theme_mod( 'ed_shopping_cart', true );
$ed_search = get_theme_mod( 'ed_header_search', true ); ?>

<header id="masthead" class="site-header header-four" itemscope itemtype="http://schema.org/WPHeader">
	<?php if( blossom_recipe_pro_social_links( false ) || ( is_woocommerce_activated() && $ed_cart ) || $ed_search ) : ?>
		<div class="header-t">
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
			</div>
		</div>
	<?php endif; ?>
	<div class="main-header">
		<div class="container">
			<?php blossom_recipe_pro_site_branding(); ?>
			<?php blossom_recipe_pro_primary_nagivation(); ?>
		</div>
	</div><!-- .main-header -->
</header>