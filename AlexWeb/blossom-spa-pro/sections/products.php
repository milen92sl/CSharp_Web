<?php
/**
 * Products Section
 * 
 * @package Blossom_Spa_Pro
 */

$product_title 		= get_theme_mod( 'product_title', __( 'Buy The Products We Use', 'blossom-spa-pro' ) );
$product_subtitle 	= get_theme_mod( 'product_subtitle', __( 'Products We Love', 'blossom-spa-pro' ) );
$product_content 	= get_theme_mod( 'product_content', __( 'You can sell the products you use on your spa here.', 'blossom-spa-pro' ) );
$no_of_products 	= get_theme_mod( 'no_of_products', 8 );

if( is_front_page() && is_woocommerce_activated() ){ ?>
	<section id="products_section" class="wc-product-section">
		<div class="container">
			<?php 
	        $args = array(
	            'post_type'      => 'product',
	            'post_status'    => 'publish',
	            'posts_per_page' => $no_of_products,
	        );
	        
	        $qry = new WP_Query( $args );

			if( $qry->have_posts() || !empty( $product_title ) || !empty( $product_subtitle ) || !empty( $product_content ) ) :
				if( !empty( $product_subtitle ) ) echo '<span class="sub-title">' . esc_html( $product_subtitle ) . '</span>';
				if( !empty( $product_title ) ) echo '<h2 class="section-title">' . esc_html( $product_title ) . '</h2>';
				if( !empty( $product_content ) ) echo '<div class="section-desc">' . wpautop( wp_kses_post( $product_content ) ) . '</div>';
            	
	            if( $qry->have_posts() ){ ?> 
		            <div class="grid">
		                <div class="wc-product-slider owl-carousel">
		                <?php
		                    while( $qry->have_posts() ){
		                        $qry->the_post(); global $product; ?>
		                        <div class="item">
		                        	<?php
		                                $stock = get_post_meta( get_the_ID(), '_stock_status', true );
		                                
		                                if( $stock == 'outofstock' ){
		                                    echo '<span class="outofstock">' . esc_html__( 'Sold Out', 'blossom-spa-pro' ) . '</span>';
		                                }else{
		                                    woocommerce_show_product_sale_flash();    
		                                }
	                                ?>	                            
		                            <div class="product-image">
		                                <a href="<?php the_permalink(); ?>" rel="bookmark">
		                                    <?php 
		                                    if( has_post_thumbnail() ){
		                                        the_post_thumbnail( 'blossom-spa-shop-two' );    
		                                    }else{
		                                        blossom_spa_pro_get_fallback_svg( 'blossom-spa-shop-two' );
		                                    }
		                                    ?>
		                                </a>
		                                <?php
	                                        if( $product->is_type( 'simple' ) && $stock == 'instock' ){ ?>
	                                            <a href="javascript:void(0);" rel="bookmark" class="btn-add-to-cart btn-simple" id="<?php the_ID(); ?>"><?php esc_html_e( 'Add to Cart', 'blossom-spa-pro' ); ?></a> 
	                                        <?php
	                                        }else{ ?>
	                                            <a href="<?php the_permalink(); ?>" rel="bookmark" class="btn-add-to-cart btn-viewdetail"><?php esc_html_e( 'View Details', 'blossom-spa-pro' ); ?></a>
	                                        <?php
	                                        }                                      
	                                    ?>
	                                    <a href="<?php the_permalink(); ?>" rel="bookmark" class="btn-add-to-cart btn-view-detail"><i class="fas fa-eye"></i></a>
		                            </div>
	                                
	                                <?php                            
		                            woocommerce_template_single_rating(); //rating                                  
		                            the_title( '<h3>', '</h3>' ); 
		                            woocommerce_template_single_price(); //price                                
		                            
		                        ?>
		                        </div>
		                        <?php
		                    }
		                    ?>
		                </div>
		            </div>
	                <?php
	                wp_reset_postdata();
	            }
	        endif; ?>
    	</div>
	</section> <!-- .wc-product-section -->
<?php } ?>
