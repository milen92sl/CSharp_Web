<?php
/**
 * Header One
 *
 * @package Blossom_Fashion
 */
 
$ed_cart   = get_theme_mod( 'ed_shopping_cart', true );
$ed_search = get_theme_mod( 'ed_header_search', true ); ?>

<header class="site-header" itemscope itemtype="http://schema.org/WPHeader">
	<div class="header-holder">
		<div class="header-t">
			<div class="container">
				<div class="row">
					<?php if( $ed_search ){ ?>
                    <div class="col">
						<?php get_search_form(); ?>
					</div>
                    <?php } ?>
                    <div class="col">
						<?php blossom_fashion_pro_site_branding(); ?>
					</div>
					<div class="col">
						<div class="tools">
							<?php 
                            if( blossom_fashion_pro_social_links( false ) || ( is_woocommerce_activated() && $ed_cart ) ){
                                if( is_woocommerce_activated() && $ed_cart ) blossom_fashion_pro_wc_cart_count();
                                if( is_woocommerce_activated() && $ed_cart && blossom_fashion_pro_social_links( false ) ) echo '<span class="separator"></span>';
                                blossom_fashion_pro_social_links();
                            }                                    
                            ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="sticky-holder"></div>
	<div class="navigation-holder">
		<div class="container">
			<?php blossom_fashion_pro_primary_nagivation(); ?>
            <div class="form-holder">
                <div class="btn-close-form"><span></span></div>
                <?php get_search_form(); ?>
            </div>
			<div class="tools">
				<?php 
                blossom_fashion_pro_form_section();
                if( blossom_fashion_pro_social_links( false ) || ( is_woocommerce_activated() && $ed_cart ) ){
                    if( is_woocommerce_activated() && $ed_cart ) blossom_fashion_pro_wc_cart_count();
                    if( is_woocommerce_activated() && $ed_cart && blossom_fashion_pro_social_links( false ) ) echo '<span class="separator"></span>';
                    blossom_fashion_pro_social_links();
                }                                    
                ?>
			</div>
		</div>
	</div>
</header>