<?php
/**
 * Special Pricing Section
 * 
 * @package Blossom_Spa_Pro
 */

$special_pricing_title 		= get_theme_mod( 'special_pricing_title', __( 'This Week\'s Special For You', 'blossom-spa-pro' ) );
$special_pricing_subtitle 	= get_theme_mod( 'special_pricing_subtitle', __( 'Best Deals', 'blossom-spa-pro' ) );
$special_pricing_content 	= get_theme_mod( 'special_pricing_content', __( 'Display your deals and discounts using this section. Customers love deals, so this section is a great way of growing your business.', 'blossom-spa-pro' ) );
$background_image = get_theme_mod( 'special_pricing_background_image', get_template_directory_uri() .'/images/special-pricing-bg.jpg' );
$label    = get_theme_mod( 'special_view_all', __( 'View More', 'blossom-spa-pro' ) );

if( is_front_page() && is_woocommerce_activated() ){ ?>
	<section id="special_pricing_section" class="special-pricing-section">
		<div class="header-wrap" style="background-image: url( '<?php echo esc_url( $background_image ); ?>' ); background-repeat: no-repeat;">
			<div class="container">
				<?php if( !empty( $special_pricing_title ) || !empty( $special_pricing_subtitle ) || !empty( $special_pricing_content ) ) :
					if( !empty( $special_pricing_subtitle ) ) echo '<span class="sub-title">' . esc_html( $special_pricing_subtitle ) . '</span>';
					if( !empty( $special_pricing_title ) ) echo '<h2 class="section-title">' . esc_html( $special_pricing_title ) . '</h2>';
					if( !empty( $special_pricing_content ) ) echo '<div class="section-desc">' . wpautop( wp_kses_post( $special_pricing_content ) ) . '</div>';
				endif; ?>
			</div>
		</div>
		<div class="container">
			<?php blossom_spa_pro_get_special_pricing_tabs(); ?>
			<?php blossom_spa_pro_get_special_pricing_contents(); ?>
			<?php if( function_exists('is_shop') && $label && ( wc_get_page_id( 'shop' ) ) ){ ?>
	            <div class="btn-wrap">
	    			<a href="<?php the_permalink( wc_get_page_id( 'shop' ) ); ?>" class="btn-readmore"><?php echo esc_html( $label ); ?></a>
	    		</div>
	        <?php } ?>
		</div>
	</section><!-- .special-pricing-section -->
<?php }