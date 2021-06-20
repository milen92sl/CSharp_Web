<?php
/**
 * Popular Products Section
 * 
 * @package Blossom_Spa_Pro
 */

$popular_product_title 	= get_theme_mod( 'popular_product_title', __( 'Popular Procedures', 'blossom-spa-pro' ) );
$popular_product_subtitle 	= get_theme_mod( 'popular_product_subtitle', __( 'View Our', 'blossom-spa-pro' ) );
$popular_product_content 	= get_theme_mod( 'popular_product_content', __( 'Come and discover your oasis. It has never been easier to take a break from stress and the harmful factors that surround you every day!', 'blossom-spa-pro' ) );
$popular_procedures_pages   = get_theme_mod( 'popular_procedures_pages' );
$popular_procedures_ids 	= blossom_spa_pro_get_id_from_page( $popular_procedures_pages );

if( $popular_procedures_ids || !empty( $popular_product_title ) || !empty( $popular_product_subtitle ) || !empty( $popular_product_content ) ){ ?>
	<section id="popular_product_section" class="service-price-section">
		<div class="container">
			<?php 
			
			if( !empty( $popular_product_title ) || !empty( $popular_product_subtitle ) || !empty( $popular_product_content ) ) :
				if( !empty( $popular_product_subtitle ) ) echo '<span class="sub-title">' . esc_html( $popular_product_subtitle ) . '</span>';
				if( !empty( $popular_product_title ) ) echo '<h2 class="section-title">' . esc_html( $popular_product_title ) . '</h2>';
				if( !empty( $popular_product_content ) ) echo '<div class="section-desc">' . wpautop( wp_kses_post( $popular_product_content ) ) . '</div>';
			endif;

	        if( $popular_procedures_ids ){
		        $args = array(
	            	'post_status'         => 'publish',            
	            	'ignore_sticky_posts' => true,
	            	'post_type'      	  => 'page',
		            'posts_per_page' 	  => 4,
		            'post__in'       	  => $popular_procedures_ids,
		            'orderby'        	  => 'post__in',
		        );
	        	$qry = new WP_Query( $args );
	            if( $qry->have_posts() ){ ?> 
	                <div class="shop-popular">
	                <?php
	                    while( $qry->have_posts() ){
	                        $qry->the_post(); ?>
	                        <div class="item">	                            
	                            <div class="product-image">
	                                <a href="<?php the_permalink(); ?>" rel="bookmark">
	                                    <?php 
	                                    if( has_post_thumbnail() ){
	                                        the_post_thumbnail( 'blossom-spa-shop' );    
	                                    }else{
	                                        blossom_spa_pro_get_fallback_svg( 'blossom-spa-shop' );
	                                    }
	                                    ?>
	                                </a>
	                            	<a href="<?php the_permalink(); ?>" rel="bookmark" class="btn-readmore"><?php esc_html_e( 'Learn More', 'blossom-spa-pro' ); ?></a>
	                            </div>
	                            <?php                            
	                            the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); 
	                        ?>
	                        </div>
	                        <?php
	                    }
	                    ?>
	                </div>
	                <?php
	                wp_reset_postdata();
	            }
	        }
	        ?>
    	</div>
	</section> <!-- .popular-section -->
<?php } ?>
