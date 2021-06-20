<?php
/**
 * Banner Section
 * 
 * @package Blossom_Spa_Pro
 */

$ed_banner        = get_theme_mod( 'ed_banner_section', 'slider_banner' );
$slider_type      = get_theme_mod( 'slider_type', 'latest_posts' ); 
$slider_cat       = get_theme_mod( 'slider_cat' );
$slider_pages     = get_theme_mod( 'slider_pages' );
$slider_custom    = get_theme_mod( 'slider_custom' );
$posts_per_page   = get_theme_mod( 'no_of_slides', 3 );
$ed_full_image    = get_theme_mod( 'slider_full_image', false );
$ed_caption       = get_theme_mod( 'slider_caption', true );
$banner_title     = get_theme_mod( 'banner_title', __( 'Relaxing Is Never Easy On Your Own', 'blossom-spa-pro' ) );
$banner_subtitle  = get_theme_mod( 'banner_subtitle', __( 'Come and discover your oasis. It has never been easier to take a break from stress and the harmful factors that surround you every day!', 'blossom-spa-pro' ) );
$banner_newsletter = get_theme_mod( 'banner_newsletter' );
$button1          = get_theme_mod( 'banner_cta1', __( 'View services', 'blossom-spa-pro' ) );
$button2          = get_theme_mod( 'banner_cta2', __( 'Book Now', 'blossom-spa-pro' ) );
$button1_url      = get_theme_mod( 'banner_cta1_url', '#' );
$button2_url      = get_theme_mod( 'banner_cta2_url', '#' );
$banner_caption   = get_theme_mod( 'banner_caption_layout', 'center' );
$slider_page_ids  = blossom_spa_pro_get_id_from_page( $slider_pages );
        
if( ( $ed_banner == 'static_banner' || $ed_banner == 'static_nl_banner' ) && has_custom_header() ){ ?>
    <div id="banner_section" class="site-banner<?php if( has_header_video() ) echo esc_attr( ' video-banner' ); ?>">
        <div class="item">
            <?php 
                the_custom_header_markup(); 
                if( $ed_banner == 'static_banner' && ( $banner_title || $banner_subtitle || ( $button1 && $button1_url ) || ( $button2 && $button2_url )  ) ){
                    echo '<div class="banner-caption ' . esc_attr( $banner_caption ) . '"><div class="container"><div class="banner-caption-inner">';
                    if( $banner_title ) echo '<h2 class="title">' . esc_html( $banner_title ) . '</h2>';
                    if( ! has_header_video() ){
                        if( $banner_subtitle ) echo '<div class="description">' . wp_kses_post( $banner_subtitle ) . '</div>';
                		if( $button1 || $button2 ) : ?>
                            <div class="btn-wrap">
                                <?php if( $button1 && $button1_url ) : ?>
                                    <a href="<?php echo esc_url( $button1_url ); ?>" class="btn btn-transparent">
                                        <span><?php echo esc_html( $button1 ); ?></span>
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if( $button2 && $button2_url ) : ?>
                                    <a href="<?php echo esc_url( $button2_url ); ?>" class="btn btn-green">
                                        <span><?php echo esc_html( $button2 ); ?></span>
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif;
                    }
                    echo '</div></div></div>';
                }elseif( $ed_banner == 'static_nl_banner' && $banner_newsletter ){
                    echo '<div class="banner-caption"><div class="container">';
                    echo do_shortcode( wp_kses_post( $banner_newsletter ) );
                    echo '</div></div>';
                }
            ?>
        </div>
    </div>
<?php
}elseif( $ed_banner == 'slider_banner' ){
    if( $slider_type == 'latest_posts' || $slider_type == 'cat' || $slider_type == 'pages' ){
        $image_size = $ed_full_image ? 'full' : 'blossom-spa-single';
        $args = array(
            'post_status'         => 'publish',            
            'ignore_sticky_posts' => true
        );
        
        if( $slider_type === 'cat' && $slider_cat ){
            $args['post_type']      = 'post';
            $args['cat']            = $slider_cat; 
            $args['posts_per_page'] = -1;  
        }elseif( $slider_type == 'pages' && $slider_pages && $slider_page_ids ){
            $args['post_type']      = 'page';
            $args['posts_per_page'] = -1;
            $args['post__in']       = $slider_page_ids;
            $args['orderby']        = 'post__in';
        }else{
            $args['post_type']      = 'post';
            $args['posts_per_page'] = $posts_per_page;
        }
            
        $qry = new WP_Query( $args );
        
        if( $qry->have_posts() ){ ?>
            <div id="banner_section" class="site-banner">
                <div id="banner-slider" class="owl-carousel">            
    			<?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                <div class="item">
    				<?php 
                    if( has_post_thumbnail() ){
    				    the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
    				}else{ 
    				    blossom_spa_pro_get_fallback_svg( $image_size );
                    }
                    
                    if( $ed_caption ){ ?>                        
    				<div class="banner-caption <?php echo esc_html( $banner_caption ); ?>">
    					<div class="container">
    						<div class="banner-caption-inner">
    							<?php
                                    the_title( '<h2 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );                              
                                ?>
                                <?php if( has_excerpt() ) : ?>
                                    <div class="description">
                                        <?php the_excerpt(); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if( !empty( $button1 ) || !empty( $button2 ) ) : ?>
                                    <div class="btn-wrap">
                                        <?php if( $button1 && $button1_url ) : ?>
                                            <a href="<?php echo esc_url( $button1_url ); ?>" class="btn btn-transparent">
                                                <span><?php echo esc_html( $button1 ); ?></span>
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if( $button2 && $button2_url ) : ?>
                                            <a href="<?php echo esc_url( $button2_url ); ?>" class="btn btn-green">
                                                <span><?php echo esc_html( $button2 ); ?></span>
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
    						</div>
    					</div>
    				</div>
                    <?php } ?>
    			</div>
    			<?php } ?>                        
    		</div>                
    	</div>
        <?php
        wp_reset_postdata();
        }
    
    }elseif( $slider_type == 'custom' && $slider_custom ){ 
        $image_size = 'blossom-spa-single'; ?>
        <div id="banner_section" class="site-banner">
    		<div id="banner-slider" class="owl-carousel">
    			<?php 
                foreach( $slider_custom as $slide ){ 
                    if( $slide['thumbnail'] ){ ?>
                        <div class="item">
                        <?php 
                            $image = wp_get_attachment_image_url( $slide['thumbnail'], $image_size ); ?>
    				        <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( strip_tags( $slide['title'] ) ); ?>" itemprop="image" />
                                
                            <?php if( $ed_caption && ( $slide['title'] || $slide['subtitle'] ) ){ ?>                        
                				<div class="banner-caption <?php echo esc_html( $banner_caption ); ?>">
                					<div class="container">
                						<div class="banner-caption-inner">
                							<?php
                                                if( $slide['title'] ){
                                                    echo '<h2 class="title">';
                                                    if( $slide['link'] ) echo '<a href="' . esc_url( $slide['link'] ) . '" rel="bookmark">';
                                                    echo wp_kses_post( $slide['title'] );
                                                    if( $slide['link'] ) echo '</a>';
                                                    echo '</h2>';    
                                                }
                                                if( $slide['subtitle'] ){
                                                    echo '<div class="description">';
                                                    echo esc_html( $slide['subtitle'] ); 
                                                    echo '</div>';    
                                                }

                                                if( !empty( $button1 ) || !empty( $button2 ) ) : ?>
                                                    <div class="btn-wrap">
                                                        <?php if( $button1 && $button1_url ) : ?>
                                                            <a href="<?php echo esc_url( $button1_url ); ?>" class="btn btn-transparent">
                                                                <span><?php echo esc_html( $button1 ); ?></span>
                                                                <i class="fas fa-chevron-right"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php if( $button2 && $button2_url ) : ?>
                                                            <a href="<?php echo esc_url( $button2_url ); ?>" class="btn btn-green">
                                                                <span><?php echo esc_html( $button2 ); ?></span>
                                                                <i class="fas fa-chevron-right"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; 
                                            ?>
                						</div>
                					</div>
                				</div>
                            <?php } ?>
            			</div>
        			<?php 
                    } 
                } 
                ?>                        
    		</div>            
    	</div>
        <?php
    }
}