<?php
/**
 * Header Seven
 *
 * @package Blossom_Fashion
 */

$ed_cart   = get_theme_mod( 'ed_shopping_cart', true );
$ed_search = get_theme_mod( 'ed_header_search', true ); ?>

<header class="site-header header-six header-seven" itemscope itemtype="http://schema.org/WPHeader">
	<div class="header-holder">
		<div class="header-t">
			<div class="container">
				<?php blossom_fashion_pro_secondary_navigation(); ?>
				<div class="form-holder">
					<div class="btn-close-form"><span></span></div>
                    <?php get_search_form(); ?>
				</div>
				<?php if( blossom_fashion_pro_social_links( false ) || ( is_woocommerce_activated() && $ed_cart ) || $ed_search ){ ?>
                <div class="right">
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
                <?php } ?>
			</div>
		</div>
	</div>
    <div class="sticky-holder"></div>
	<div class="main-header">
		<div class="container">
			<?php
                blossom_fashion_pro_site_branding();
                blossom_fashion_pro_primary_nagivation();
            ?>
		</div>
	</div>
</header>