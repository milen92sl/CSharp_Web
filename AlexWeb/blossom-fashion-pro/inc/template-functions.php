<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Blossom_Fashion
 */

if( ! function_exists( 'blossom_fashion_pro_doctype' ) ) :
/**
 * Doctype Declaration
*/
function blossom_fashion_pro_doctype(){
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;
add_action( 'blossom_fashion_pro_doctype', 'blossom_fashion_pro_doctype' );

if( ! function_exists( 'blossom_fashion_pro_head' ) ) :
/**
 * Before wp_head 
*/
function blossom_fashion_pro_head(){
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
}
endif;
add_action( 'blossom_fashion_pro_before_wp_head', 'blossom_fashion_pro_head' );

if( ! function_exists( 'blossom_fashion_pro_page_start' ) ) :
/**
 * Page Start
*/
function blossom_fashion_pro_page_start(){
    ?>
    <div id="page" class="site">
    <?php
}
endif;
add_action( 'blossom_fashion_pro_before_header', 'blossom_fashion_pro_page_start', 20 );

if( ! function_exists( 'blossom_fashion_pro_single_header' ) ) :
/**
 * Single Header for Layout One
*/
function blossom_fashion_pro_single_header(){
    $ed_sharing    = get_theme_mod( 'ed_social_sharing', true );
    $social_share  = get_theme_mod( 'social_share', array( 'facebook', 'twitter', 'pinterest', 'gplus' ) );
    $header_label  = get_theme_mod( 'single_header_label', __( 'You Are Reading', 'blossom-fashion-pro' ) );
    
    if( is_single() && get_post_type() != 'product' ){ ?>
        <div class="single-header">
    		<div class="container">
    			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title" rel="home"><?php bloginfo( 'name' ); ?></a>
    			<div class="title-holder">
    				<?php
                        if( $header_label ) echo '<span class="single-header-label">' . esc_html( $header_label ) . '</span>';
                        the_title( '<h2 class="post-title">', '</h2>' );
                    ?>
    			</div>
                
                <div class="right">
    				<?php if( $ed_sharing && $social_share ){ ?>
                    <div class="social-share">
    					<ul class="social-networks">
                        <?php
                            foreach( $social_share as $share ){
                                blossom_fashion_pro_get_social_share( $share );
                            }
                        ?>
    					</ul>
    				</div>
                    <?php } 
                        blossom_fashion_pro_single_like_count();
                    ?>    				
    			</div>                
    		</div>
    	</div>
        <?php        
    }    
}
endif;
add_action( 'blossom_fashion_pro_header', 'blossom_fashion_pro_single_header', 15 );

if( ! function_exists( 'blossom_fashion_pro_header' ) ) :
/**
 * Header Start
*/
function blossom_fashion_pro_header(){ 
    $header_array = array( 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight' );
    $header = get_theme_mod( 'header_layout', 'one' );
    if( in_array( $header, $header_array ) ){            
        get_template_part( 'headers/' . $header );
    }
}
endif;
add_action( 'blossom_fashion_pro_header', 'blossom_fashion_pro_header', 20 );

if( ! function_exists( 'blossom_fashion_pro_banner' ) ) :
/**
 * Banner Section 
*/
function blossom_fashion_pro_banner(){    
    $slider_layout = get_theme_mod( 'slider_layout', 'one' );
    if( is_front_page() || is_home() ) blossom_fashion_pro_get_banner( $slider_layout );    
}
endif;
add_action( 'blossom_fashion_pro_after_header', 'blossom_fashion_pro_banner', 15 );

if( ! function_exists( 'blossom_fashion_pro_top_section' ) ) :
/**
 * Top Section
*/
function blossom_fashion_pro_top_section(){
    $ed_featured         = get_theme_mod( 'ed_featured_area', true );
    $featured_type       = get_theme_mod( 'featured_type', 'page' );
    $featured_page_one   = get_theme_mod( 'featured_content_one' );
    $featured_page_two   = get_theme_mod( 'featured_content_two' );
    $featured_page_three = get_theme_mod( 'featured_content_three' );
    $featured_pages      = array( $featured_page_one, $featured_page_two, $featured_page_three );
    $featured_pages      = array_diff( array_unique( $featured_pages), array( '' ) );
    $featured_custom     = get_theme_mod( 'featured_custom' );
    $ed_newsletter       = get_theme_mod( 'ed_newsletter', false );
    $newsletter          = get_theme_mod( 'newsletter_shortcode' );
    
    $args = array(
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'post__in'       => $featured_pages,
        'orderby'        => 'post__in'   
    );
    
    $qry = new WP_Query( $args );
                        
    if( is_front_page() && ( ( $ed_featured && ( $featured_type == 'page' && $featured_pages && $qry->have_posts() ) || ( $featured_type == 'custom' && $featured_custom ) ) || ( is_btnw_activated() && $ed_newsletter && has_shortcode( $newsletter, 'BTEN' ) ) ) ){ ?>
        <div class="top-section">
    		<div class="container">
    			<?php 
                if( $ed_featured ){
                    if( $featured_type == 'page' && $featured_pages && $qry->have_posts() ){ ?>
                        <div class="featured-section">
            				<div class="grid">
            					<?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                                <div class="grid-item">
            						<div class="img-holder">
            							<a href="<?php the_permalink(); ?>">
                                        <?php 
                                            if( has_post_thumbnail() ){
                                                the_post_thumbnail( 'blossom-fashion-featured' );
                                            }else{
                                                blossom_fashion_pro_fallback_image( 'blossom-fashion-featured' );
                                            }
                                        ?>
                                        </a>
            							<?php the_title( '<div class="text-holder">', '</div>' ); ?>
            						</div>
            					</div>
            					<?php } ?>
            				</div>
            			</div>
                        <?php
                        wp_reset_postdata();                                   
                    }elseif( $featured_type == 'custom' && $featured_custom ){ ?>
                        <div class="featured-section">
            				<div class="grid">
            					<?php foreach( $featured_custom as $feature ){ ?>
                                <div class="grid-item">
            						<div class="img-holder">
            							<?php
                                        $open_tab = ( get_theme_mod( 'ed_open_tab', false ) ) ? 'target="_blank"' : '';
                                        if( $feature['link'] ) echo '<a href="' . esc_url( $feature['link'] ) . '"' . $open_tab . '>';
                                        if( $feature['thumbnail'] ){
                                            $image = wp_get_attachment_image_url( $feature['thumbnail'], 'blossom-fashion-featured' );
                                            echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $feature['title'] ) . '">';
                                        }else{
                                            blossom_fashion_pro_fallback_image( 'blossom-fashion-featured' );
                                        }
                                        if( $feature['link'] ) echo '</a>'; 
                                        if( $feature['title'] ) echo '<div class="text-holder">' . esc_html( $feature['title'] ) . '</div>';
                                        ?>
            						</div>
            					</div>
            					<?php } ?>
            				</div>
            			</div>
                        <?php
                    } 
                }
                if( is_btnw_activated() && $ed_newsletter && has_shortcode( $newsletter, 'BTEN' ) ) blossom_fashion_pro_newsletter();
                ?>
    		</div>
    	</div>
        <?php
    }    
}
endif;
add_action( 'blossom_fashion_pro_after_header', 'blossom_fashion_pro_top_section', 20 );

if( ! function_exists( 'blossom_fashion_pro_shop_section' ) ) :
/**
 * Shop Section
*/
function blossom_fashion_pro_shop_section(){ 
    $ed_shop_section = get_theme_mod( 'ed_top_shop_section', false );
    $section_title   = get_theme_mod( 'shop_section_title', __( 'Welcome to our Shop!', 'blossom-fashion-pro' ) );
    $section_content = get_theme_mod( 'shop_section_content', __( 'This option can be change from Customize > General Settings > Shop settings.', 'blossom-fashion-pro' ) );
    $number_of_posts = get_theme_mod( 'no_of_products', 8 );
    
    if( is_front_page() && is_woocommerce_activated() && $ed_shop_section ){ 
        
        $args = array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => $number_of_posts
        );
        
        $qry = new WP_Query( $args );
        
        if( $qry->have_posts() || $section_title || $section_content ){ ?>
        <div class="shop-section">
            <div class="container">
            <?php if( $section_title || $section_content ){ ?>
            <section class="header">
                <?php
                    if( $section_title ) echo '<h2 class="title">' . esc_html( $section_title ) . '</h2>';
                    if( $section_content ) echo '<div class="content">' . wpautop( wp_kses_post( $section_content ) ) . '</div>';
                ?>
            </section>
            <?php } ?>
            
            <?php
                if( $qry->have_posts() ){ ?> 
                    <div class="shop-slider owl-carousel">
                    <?php
                        while( $qry->have_posts() ){
                            $qry->the_post(); global $product; ?>
                            <div class="item">
                            <?php
                                $stock = get_post_meta( get_the_ID(), '_stock_status', true );
                                
                                if( $stock == 'outofstock' ){
                                    echo '<span class="outofstock">' . esc_html__( 'Sold Out', 'blossom-fashion-pro' ) . '</span>';
                                }else{
                                    woocommerce_show_product_sale_flash();    
                                }
                                ?>
                                
                                <div class="product-image">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                                        <?php 
                                        if( has_post_thumbnail() ){
                                            the_post_thumbnail( 'blossom-fashion-shop' );    
                                        }else{
                                            blossom_fashion_pro_fallback_image( 'blossom-fashion-shop' );
                                        }
                                        ?>
                                    </a>
                                    <?php
                                        if( $product->is_type( 'simple' ) && $stock == 'instock' ){ ?>
                                            <a href="javascript:void(0);" rel="bookmark" class="btn-add-to-cart btn-simple" id="<?php the_ID(); ?>"><?php esc_html_e( 'Add to Cart', 'blossom-fashion-pro' ); ?></a> 
                                        <?php
                                        }else{ ?>
                                            <a href="<?php the_permalink(); ?>" rel="bookmark" class="btn-add-to-cart"><?php esc_html_e( 'View Details', 'blossom-fashion-pro' ); ?></a>
                                        <?php
                                        }                                      
                                    ?>
                                </div>
                                
                                <?php
                                
                                the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); 
                                
                                woocommerce_template_single_price(); //price
                                woocommerce_template_single_rating(); //rating                                
                            ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                    wp_reset_postdata();
                }
            ?>
            </div>
        </div>
        <?php
        }
    }
}
endif;
add_action( 'blossom_fashion_pro_after_header', 'blossom_fashion_pro_shop_section', 25 );

if( ! function_exists( 'blossom_fashion_pro_top_author_section' ) ) :
/**
 * Top Section for Author Archive
*/
function blossom_fashion_pro_top_author_section(){
    $author_label = get_theme_mod( 'author_archive_label', __( 'All Posts By', 'blossom-fashion-pro' ) );
    if( is_author() ){ ?>
        <div class="top-section">
    		<div class="container">
    			<div class="img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?></div>
    			<div class="text-holder">
    				<?php if( $author_label ) echo '<span class="author-label">'. esc_html( $author_label ). '</span>'; ?>
    				<h1 class="author-title"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h1>
                    <?php blossom_fashion_pro_author_social(); ?>
    			</div>
    		</div>
    	</div>
        <?php
    }    
}
endif;
add_action( 'blossom_fashion_pro_after_header', 'blossom_fashion_pro_top_author_section', 30 );

if( ! function_exists( 'blossom_fashion_pro_top_search_section' ) ) :
/**
 * Top Section for Search Page
*/
function blossom_fashion_pro_top_search_section(){
    $search_label = get_theme_mod( 'search_page_label', __( 'You are looking for', 'blossom-fashion-pro' ) );
    if( is_search() ){ ?>
        <div class="top-section">
    		<div class="container">
    			<div class="text-holder">
    				<?php 
                        if( $search_label ) echo '<span class="search-label">' . esc_html( $search_label ) . '</span>';
                        get_search_form(); 
                    ?>
    			</div>
    		</div>
    	</div>
        <?php
    }    
}
endif;
add_action( 'blossom_fashion_pro_after_header', 'blossom_fashion_pro_top_search_section', 35 );

if( ! function_exists( 'blossom_fashion_pro_top_bar' ) ) :
/**
 * Top bar for single page and post
*/
function blossom_fashion_pro_top_bar(){
    if( is_singular() && ! is_front_page() ){ ?>
        <div class="top-bar">
    		<div class="container">
            <?php
                //Breadcrumb
                blossom_fashion_pro_breadcrumb();
                
                if( is_single() && ( get_post_type() == 'post' ) ){
                    //AD before single content
                    blossom_fashion_pro_get_ad_before_content();
                }
            ?>
    		</div>
    	</div>   
        <?php 
    }    
}
endif;
add_action( 'blossom_fashion_pro_after_header', 'blossom_fashion_pro_top_bar', 40 );

if( ! function_exists( 'blossom_fashion_pro_content_start' ) ) :
/**
 * Content Start
*/
function blossom_fashion_pro_content_start(){
    $single_layout = get_theme_mod( 'single_post_layout', 'one' );
    $ed_featured   = get_theme_mod( 'ed_featured_image', true );
    $ed_cat_single = get_theme_mod( 'ed_category', false );
    $image_size    = ( $single_layout == 'three' ) ? 'blossom-fashion-slider' : 'blossom-fashion-fullwidth';
       
    if( ! is_page_template( 'contact.php' ) ){
        echo is_404() ? '<div class="error-holder">' : '<div id="content" class="site-content">'; 
        
        if( is_single() && $single_layout == 'three' && ( get_post_type() == 'post' ) ){ ?>
            <div class="post-thumbnail-holder">
                <div class="post-thumbnail">
    			<?php 
                    if( has_post_thumbnail() ){ /** This layout needs featured image all time. */
                        the_post_thumbnail( $image_size );        			  
        			}else{
        			     blossom_fashion_pro_fallback_image( $image_size ); 
        			}
                ?>                
                </div>
    		</div>
            <?php
        }
        ?>
        
        <div class="container">
        <?php
        /**
         * Page Header for category archive & single page.        
        */                                                        
        blossom_fashion_pro_page_header();
        
        if( is_single() && ( $single_layout == 'two' || $single_layout == 'four' ) && ( get_post_type() == 'post' ) ){ 
            $class = ( $single_layout == 'two' ) ? 'post-header-holder' : 'single-post-header-holder'; ?>
            <div class="<?php echo esc_attr( $class ); ?>">
    			<header class="entry-header">
                    <?php 
                        if( $single_layout == 'four' ) echo '<div class="header-holder">'; 
                        if( ! $ed_cat_single ) blossom_fashion_pro_category();
                        the_title( '<h1 class="entry-title">', '</h1>' );
                        blossom_fashion_pro_entry_meta();
                        if( $single_layout == 'four' ) echo '</div>'; 
                    ?>
    			</header>
    			<div class="post-thumbnail">
                <?php 
                    if( $single_layout == 'two' ){
                        if( has_post_thumbnail() && $ed_featured ){
                            the_post_thumbnail( $image_size );                        
                        }
                    }elseif( $single_layout == 'four' ){
                        if( has_post_thumbnail() ){
                            the_post_thumbnail( $image_size );                        
                        }else{
                            blossom_fashion_pro_fallback_image( $image_size ); 
                        }
                    }
                ?>
                </div>
    		</div>
            <?php
        }
            
        if( ! is_404() ) echo '<div class="row">';
    }
}
endif;
add_action( 'blossom_fashion_pro_content', 'blossom_fashion_pro_content_start' );

if( ! function_exists( 'blossom_fashion_pro_post_count' ) ) :
/**
 * Post counts in search and archive page.
*/
function blossom_fashion_pro_post_count(){
    global $wp_query;
    printf( esc_html__( '%1$sShowing %2$s %3$s Result(s)%4$s', 'blossom-fashion-pro' ), '<span class="post-count">', '<strong>', $wp_query->found_posts, '</strong></span>' );        
}
endif;
add_action( 'blossom_fashion_pro_before_posts_content', 'blossom_fashion_pro_post_count' );

if( ! function_exists( 'blossom_fashion_pro_entry_header' ) ) :
/**
 * Entry Header
*/
function blossom_fashion_pro_entry_header(){ ?>
    <header class="entry-header">
		<?php 
            $ed_cat_single = get_theme_mod( 'ed_category', false );
                        
            if( is_single() ){
                if( ! $ed_cat_single ) blossom_fashion_pro_category();
            }else{
                blossom_fashion_pro_category();    
            }
            
            if ( is_singular() ) :
    			the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
    		else :
    			the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    		endif; 
        
            blossom_fashion_pro_entry_meta();		
		?>
	</header>         
    <?php    
}
endif;
add_action( 'blossom_fashion_pro_entry_content', 'blossom_fashion_pro_entry_header', 10 );

if ( ! function_exists( 'blossom_fashion_pro_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function blossom_fashion_pro_post_thumbnail() {
	global $wp_query;
    $image_size     = 'thumbnail';
    $ed_featured    = get_theme_mod( 'ed_featured_image', true );
    $sidebar        = blossom_fashion_pro_sidebar( true );
    $home_layout    = get_theme_mod( 'home_layout', 'one' );
    $archive_layout = get_theme_mod( 'archive_layout', 'one' );
    $layout         = is_home() ? $home_layout : $archive_layout;
    $single_layout  = get_theme_mod( 'single_post_layout', 'one' );
    
    if( is_home() || is_archive() ){
        if( ( ( $layout == 'one' || $layout == 'one-left' ) && $wp_query->current_post == 0 ) || $layout == 'two' || $layout == 'two-left' || $layout == 'three' || $layout == 'three-left' ){                
            $image_size = ( ! $sidebar ) ? 'blossom-fashion-fullwidth' : 'blossom-fashion-with-sidebar';
        }elseif( ( $layout == 'one-full' && $wp_query->current_post == 0 ) || $layout == 'two-full' || $layout == 'three-full' ){
            $image_size = 'blossom-fashion-fullwidth';
        }elseif( $layout == 'four' || $layout == 'four-left' || $layout == 'four-full' ){
            $image_size = 'blossom-fashion-blog-four';
        }elseif( $layout == 'five' || $layout == 'five-left' || $layout == 'five-full' ){
            $image_size = 'blossom-fashion-blog-five';
        }elseif( $layout == 'seven' || $layout == 'seven-left' || $layout == 'seven-full' ){
            $image_size = 'blossom-fashion-blog-archive';
        }else{
            $image_size = 'blossom-fashion-blog-home';    
        }
        echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
        if( has_post_thumbnail() ){                        
            the_post_thumbnail( $image_size );    
        }else{
            blossom_fashion_pro_fallback_image( $image_size );
        }        
        echo '</a>';
    }elseif( is_search() ){
        echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
        if( has_post_thumbnail() ){
            the_post_thumbnail( 'blossom-fashion-blog-archive' );    
        }else{
            blossom_fashion_pro_fallback_image( $image_size ); 
        }
        echo '</a>';
    }elseif( is_singular() ){
        if( has_post_thumbnail() ){
            echo '<div class="post-thumbnail">';                                                                        
            if( is_single() ){
                if( $single_layout == 'one' ){
                    $image_size = ( ! $sidebar ) ? 'blossom-fashion-fullwidth' : 'blossom-fashion-with-sidebar';
                }elseif( $single_layout == 'five' ){
                    $image_size = 'blossom-fashion-with-sidebar';
                }
                if( $ed_featured ) the_post_thumbnail( $image_size );
            }else{
                $image_size = ( ! $sidebar ) ? 'blossom-fashion-fullwidth' : 'blossom-fashion-with-sidebar';
                the_post_thumbnail( $image_size );
            }
            echo '</div>';
        }
    }
}
endif;
add_action( 'blossom_fashion_pro_before_page_entry_content', 'blossom_fashion_pro_post_thumbnail' );
add_action( 'blossom_fashion_pro_before_entry_content', 'blossom_fashion_pro_post_thumbnail' );

if( ! function_exists( 'blossom_fashion_pro_entry_content' ) ) :
/**
 * Entry Content
*/
function blossom_fashion_pro_entry_content(){ 
    $ed_excerpt = get_theme_mod( 'ed_excerpt', true ); ?>
    <div class="entry-content" itemprop="text">
		<?php
			if( is_singular() || ! $ed_excerpt || ( get_post_format() != false ) ){
                the_content();
    
    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blossom-fashion-pro' ),
    				'after'  => '</div>',
    			) );
            }else{
                the_excerpt();
            }
		?>
	</div><!-- .entry-content -->
    <?php
}
endif;
add_action( 'blossom_fashion_pro_page_entry_content', 'blossom_fashion_pro_entry_content', 15 );
add_action( 'blossom_fashion_pro_entry_content', 'blossom_fashion_pro_entry_content', 15 );

if( ! function_exists( 'blossom_fashion_pro_entry_footer' ) ) :
/**
 * Entry Footer
*/
function blossom_fashion_pro_entry_footer(){ 
    $readmore     = get_theme_mod( 'read_more_text', __( 'Continue Reading', 'blossom-fashion-pro' ) );
    $ed_sharing   = get_theme_mod( 'ed_social_sharing', true );
    $social_share = get_theme_mod( 'social_share', array( 'facebook', 'twitter', 'pinterest', 'gplus' ) ); ?>
    
	<footer class="entry-footer">
		<?php
			if( is_single() ){
                blossom_fashion_pro_get_affiliate_shop();
			    blossom_fashion_pro_tag();
			}
            
            if( is_home() || is_archive() || is_search() ){
                if( $readmore ) echo '<a href="' . esc_url( get_the_permalink() ) . '" class="btn-readmore">' . esc_html( $readmore ) . '</a>';
                
                if( $ed_sharing && $social_share ){ ?>
                <div class="social-share">
    				<ul class="social-networks">
    					<?php 
                            foreach( $social_share as $share ){
                                blossom_fashion_pro_get_social_share( $share );
                            }
                        ?>
    				</ul>
    			</div>
                <?php    
                }
            }
            
            if( get_edit_post_link() ){
                edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'blossom-fashion-pro' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
            }
		?>
	</footer><!-- .entry-footer -->
	<?php 
}
endif;
add_action( 'blossom_fashion_pro_page_entry_content', 'blossom_fashion_pro_entry_footer', 20 );
add_action( 'blossom_fashion_pro_entry_content', 'blossom_fashion_pro_entry_footer', 20 );

if( ! function_exists( 'blossom_fashion_pro_navigation' ) ) :
/**
 * Navigation
*/
function blossom_fashion_pro_navigation(){
    if( is_single() ){
        $previous = get_previous_post_link(
    		'<div class="nav-previous nav-holder">%link</div>',
    		'<span class="meta-nav">' . esc_html__( 'Previous Article', 'blossom-fashion-pro' ) . '</span><span class="post-title">%title</span>',
    		false,
    		'',
    		'category'
    	);
    
    	$next = get_next_post_link(
    		'<div class="nav-next nav-holder">%link</div>',
    		'<span class="meta-nav">' . esc_html__( 'Next Article', 'blossom-fashion-pro' ) . '</span><span class="post-title">%title</span>',
    		false,
    		'',
    		'category'
    	); 
        
        if( $previous || $next ){?>            
            <nav class="navigation post-navigation" role="navigation">
    			<h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'blossom-fashion-pro' ); ?></h2>
    			<div class="nav-links">
    				<?php
                        if( $previous ) echo $previous;
                        if( $next ) echo $next;
                    ?>
    			</div>
    		</nav>        
            <?php
        }
    }else{
        $pagination = get_theme_mod( 'pagination_type', 'numbered' );
        
        switch( $pagination ){
            case 'default': // Default Pagination
            
            the_posts_navigation();
            
            break;
            
            case 'numbered': // Numbered Pagination
            
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous', 'blossom-fashion-pro' ),
                'next_text'          => __( 'Next', 'blossom-fashion-pro' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'blossom-fashion-pro' ) . ' </span>',
            ) );
            
            break;
            
            case 'load_more': // Load More Button
            case 'infinite_scroll': // Auto Infinite Scroll
            
            echo '<div class="pagination"></div>';
            
            break;
            
            default:
            
            the_posts_navigation();
            
            break;
        }
        
    }
}
endif;
add_action( 'blossom_fashion_pro_after_post_content', 'blossom_fashion_pro_navigation', 15 );
add_action( 'blossom_fashion_pro_after_posts_content', 'blossom_fashion_pro_navigation' );

if( ! function_exists( 'blossom_fashion_pro_get_ad_after_content' ) ) :
/**
 * Get AD after single content
*/
function blossom_fashion_pro_get_ad_after_content(){
    $ed_ad      = get_theme_mod( 'ed_ac_post_ad' ); //from customizer
    $ad_img     = get_theme_mod( 'ac_post_ad' ); //from customizer
    $ad_link    = get_theme_mod( 'ac_post_ad_link' ); //from customizer
    $target     = get_theme_mod( 'open_link_diff_tab_ac_post', true ) ? 'target="_blank"' : '';
    $ed_ad_code = get_theme_mod( 'ed_ac_post_ad_code' );
    $ad_code    = get_theme_mod( 'ac_post_ad_code' ); 
     
    if( $ad_img ){
        $image = wp_get_attachment_image_url( $ad_img, 'full' );
    }else{
        $image = false;
    }
    
    if( $ed_ad && ( $ad_img || ( $ed_ad_code && $ad_code ) ) ) 
    blossom_fashion_pro_get_ad_block( $image, $ad_link, $target, $ad_code, $ed_ad_code );
}
endif;
add_action( 'blossom_fashion_pro_after_post_content', 'blossom_fashion_pro_get_ad_after_content', 20 ); 

if( ! function_exists( 'blossom_fashion_pro_author' ) ) :
/**
 * Author Section
*/
function blossom_fashion_pro_author(){ 
    $ed_author    = get_theme_mod( 'ed_author' );
    $author_title = get_theme_mod( 'author_title', __( 'About Author', 'blossom-fashion-pro' ) );
    if( ! $ed_author && get_the_author_meta( 'description' ) ){ ?>
    <div class="author-section">
		<div class="img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 95 ); ?></div>
		<div class="text-holder">
			<?php 
                if( $author_title ) echo '<h2 class="title">' . esc_html( $author_title ) . '</h2>';
                echo wpautop( wp_kses_post( get_the_author_meta( 'description' ) ) );
                blossom_fashion_pro_author_social();
            ?>		
		</div>
	</div>
    <?php
    }
}
endif;
add_action( 'blossom_fashion_pro_after_post_content', 'blossom_fashion_pro_author', 25 );

if( ! function_exists( 'blossom_fashion_pro_newsletter' ) ) :
/**
 * Newsletter
*/
function blossom_fashion_pro_newsletter(){ 
    $ed_newsletter = get_theme_mod( 'ed_newsletter', false );
    $newsletter    = get_theme_mod( 'newsletter_shortcode' );
    if( is_btnw_activated() && $ed_newsletter && has_shortcode( $newsletter, 'BTEN' ) ){ ?>
        <div class="newsletter">
            <?php echo do_shortcode( $newsletter ); ?>
        </div>
        <?php
    }
}
endif;
add_action( 'blossom_fashion_pro_after_post_content', 'blossom_fashion_pro_newsletter', 30 );

if( ! function_exists( 'blossom_fashion_pro_related_posts' ) ) :
/**
 * Related Posts 
*/
function blossom_fashion_pro_related_posts(){ 
    global $post;
    $ed_related_post = get_theme_mod( 'ed_related', true );
    $related_title   = get_theme_mod( 'related_post_title', __( 'You may also like...', 'blossom-fashion-pro' ) );
    $related_tax     = get_theme_mod( 'related_taxonomy', 'cat' );
    
    if( $ed_related_post ){
        $args = array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'posts_per_page'        => 3,
            'ignore_sticky_posts'   => true,
            'post__not_in'          => array( $post->ID ),
            'orderby'               => 'rand'
        );
        
        if( $related_tax == 'cat' ){
            $cats = get_the_category( $post->ID );        
            if( $cats ){
                $c = array();
                foreach( $cats as $cat ){
                    $c[] = $cat->term_id; 
                }
                $args['category__in'] = $c;
            }
        }elseif( $related_tax == 'tag' ){
            $tags = get_the_tags( $post->ID );
            if( $tags ){
                $t = array();
                foreach( $tags as $tag ){
                    $t[] = $tag->term_id;
                }
                $args['tag__in'] = $t;  
            }
        }
        
        $qry = new WP_Query( $args );
        
        if( $qry->have_posts() ){ ?>
        <div class="related-posts">
    		<?php if( $related_title ) echo '<h2 class="title">' . esc_html( $related_title ) . '</h2>'; ?>
    		<div class="grid">
    			<?php 
                while( $qry->have_posts() ){ 
                    $qry->the_post(); ?>
                    <article class="post">        				
        				<a href="<?php the_permalink(); ?>" class="post-thumbnail">
                            <?php
                                if( has_post_thumbnail() ){
                                    the_post_thumbnail( 'blossom-fashion-popular' );
                                }else{ 
                                    blossom_fashion_pro_fallback_image( 'blossom-fashion-popular' ); 
                                }
                            ?>
                        </a>
                        <header class="entry-header">
        					<?php
                                blossom_fashion_pro_category();
                                the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); 
                            ?>
        				</header>
        			</article>
        			<?php 
                }
                wp_reset_postdata();  
                ?>
    		</div>
    	</div>
        <?php
        }
    }
}
endif;                                                                               
add_action( 'blossom_fashion_pro_after_post_content', 'blossom_fashion_pro_related_posts', 35 );

if( ! function_exists( 'blossom_fashion_pro_popular_posts' ) ) :
/**
 * Popular Posts
*/
function blossom_fashion_pro_popular_posts(){ 
    global $post;
    $ed_popular_post = get_theme_mod( 'ed_popular', true );
    $popular_title   = get_theme_mod( 'popular_post_title', __( 'Popular Articles...', 'blossom-fashion-pro' ) );
    if( $ed_popular_post ){ 
        $args = array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'posts_per_page'        => 6,
            'ignore_sticky_posts'   => true,
            'post__not_in'          => array( $post->ID ),
            'orderby'               => 'comment_count'
        );
        
        $qry = new WP_Query( $args );
        
        if( $qry->have_posts() ){ ?>
        <div class="popular-posts">
    		<?php if( $popular_title ) echo '<h2 class="title">' . esc_html( $popular_title ) . '</h2>'; ?>
            <div class="grid">
    			<?php 
                while( $qry->have_posts() ){
                    $qry->the_post(); ?>
                    <article class="post">
        				<a href="<?php the_permalink(); ?>" class="post-thumbnail">
                            <?php
                                if( has_post_thumbnail() ){
                                    the_post_thumbnail( 'blossom-fashion-popular' );
                                }else{ 
                                    blossom_fashion_pro_fallback_image( 'blossom-fashion-popular' ); 
                                }
                            ?>
                        </a>
        				<header class="entry-header">
        					<?php
                                blossom_fashion_pro_category();
                                the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); 
                            ?>
        				</header>
        			</article>
        			<?php 
                }
                wp_reset_postdata();  
                ?>
    			
    		</div>
    	</div>
        <?php
        }
    }
}
endif;
add_action( 'blossom_fashion_pro_after_post_content', 'blossom_fashion_pro_popular_posts', 40 );

if( ! function_exists( 'blossom_fashion_pro_comment' ) ) :
/**
 * Comments Template 
*/
function blossom_fashion_pro_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
	if( get_theme_mod( 'ed_comments', true ) && ( comments_open() || get_comments_number() ) ) :
		comments_template();
	endif;
}
endif;
add_action( 'blossom_fashion_pro_after_post_content', 'blossom_fashion_pro_comment', 45 );
add_action( 'blossom_fashion_pro_after_page_content', 'blossom_fashion_pro_comment' );

if( ! function_exists( 'blossom_fashion_pro_contact_top_section' ) ) :
/**
 * Contact Top Section
*/
function blossom_fashion_pro_contact_top_section(){ 
    $title = get_theme_mod( 'contact_title', __( 'Contact Me', 'blossom-fashion-pro' ) );
    $content = get_theme_mod( 'contact_content', __( 'The contact page is just for demonstration purpose. Please DON\'T contact us via the contact form. For any questions or support, contact us on our support forum.', 'blossom-fashion-pro' ) );
    $form = get_theme_mod( 'contact_form' );
    
    if( $title || $content || $form ){ ?>
    <div class="top-section">
		<div class="container">
			<?php 
            if( $title || $content ){
                echo '<header class="section-header">';
                echo '<span class="title">' . esc_html( $title ) . '</span>';
                echo '<h2 class="content">' . wp_kses_post( $content ) . '</h2>';
    			echo '</header>';
            }
            
            if( $form ) echo '<div class="form-holder">' . do_shortcode( $form ) . '</div>';
            ?>
			
		</div>
	</div>
    <?php
    }
}
endif;
add_action( 'blossom_fashion_pro_contact_page', 'blossom_fashion_pro_contact_top_section', 15 );

if( ! function_exists( 'blossom_fashion_pro_contact_details' ) ) :
/**
 * Contact Details
*/
function blossom_fashion_pro_contact_details(){ 
    $ed_map          = get_theme_mod( 'ed_google_map', false ); 
    $ed_details      = get_theme_mod( 'ed_contact_details', true );
    $title           = get_theme_mod( 'info_title', __( 'Get In Touch', 'blossom-fashion-pro' ) );
    $content         = get_theme_mod( 'info_content', __( 'You can get in touch with me directly at hello@domain.com. I am also available for freelance. Interested in collaboration? Get in touch', 'blossom-fashion-pro' ) );
    $contact_phone   = get_theme_mod( 'contact_phone', __( '+080 555 44 11', 'blossom-fashion-pro' ) );
    $phone_label     = get_theme_mod( 'contact_phone_label', __( 'Contact us by telephone', 'blossom-fashion-pro' ) );
    $contact_email   = get_theme_mod( 'contact_email', __( 'mail@domain.com', 'blossom-fashion-pro' ) );
    $email_label     = get_theme_mod( 'email_label', __( 'Write us a message', 'blossom-fashion-pro' ) );
    $contact_address = get_theme_mod( 'contact_address', __( '123 New York, NY 60606', 'blossom-fashion-pro' ) );
    $address_label   = get_theme_mod( 'location_label', __( 'Our address', 'blossom-fashion-pro' ) );
    $ed_social       = get_theme_mod( 'ed_contact_social', true );
    $social_label    = get_theme_mod( 'social_links_label', __( 'Get Social', 'blossom-fashion-pro' ) );
    
    if( $ed_map || $ed_details ){ ?>
    <div class="contact-details">

		<?php 
            if( $ed_map ) echo '<div id="map-canvas" class="map-holder"></div>';
        
            if( $ed_details && ( $title || $content || $contact_phone || $phone_label || $contact_email || $email_label || $contact_address || $address_label || $ed_social ) ){ ?>
        		<div class="contact-info-holder">
        			<?php
                        if( $title ) echo '<h2 class="title">' . esc_html( $title ) . '</h2>';
                        if( $content ) echo '<div class="content">' . wpautop( wp_kses_post( $content ) ) . '</div>';
                    
                        if( $contact_phone || $phone_label || $contact_email || $email_label || $contact_address || $address_label || $ed_social ){ ?>
                            <div class="grid">
                				<?php if( $contact_phone ){ ?>
                                <div class="col">
                					<div class="icon-holder"><i class="fa fa-phone"></i></div>
                					<div class="text-holder">
                						<h3><a href="<?php echo esc_url( 'tel:' . preg_replace( '/\D/', '', $contact_phone ) );?>" class="phone"><?php echo esc_html( $contact_phone );?></a></h3>
                						<?php if( $phone_label ) echo '<span class="phone-label">' . esc_html( $phone_label ) . '</span>'; ?>
                					</div>
                				</div>
                				<?php } ?>
                                <?php if( $contact_email ){ ?>
                                <div class="col">
                					<div class="icon-holder"><i class="fa fa-envelope-o"></i></div>
                					<div class="text-holder">
                						<h3><a href="<?php echo esc_url( 'mailto:' . sanitize_email( $contact_email ) );?>" class="email"><?php echo esc_html( $contact_email );?></a></h3>
                						<?php if( $email_label ) echo '<span class="email-label">' . esc_html( $email_label ) . '</span>'; ?>
                					</div>
                				</div>
                				<?php } ?>
                                <?php if( $contact_address ){ ?>
                                <div class="col">
                					<div class="icon-holder"><i class="fa fa-map-marker"></i></div>
                					<div class="text-holder">
                						<address><?php echo wp_kses_post( $contact_address ); ?></address>
                						<?php if( $address_label ) echo '<span class="address-label">' . esc_html( $address_label ) . '</span>'; ?>
                					</div>
                				</div>
                				<?php } ?>
                                <?php if( $ed_social ){ ?>
                                <div class="col">
                					<div class="icon-holder"><i class="fa fa-share-alt"></i></div>
                					<div class="text-holder">
                						<?php 
                                            if( $social_label ) echo '<h3 class="social-label">' . esc_html( $social_label ) . '</h3>';
                                            blossom_fashion_pro_social_links(); 
                                        ?>
                					</div>
                				</div>
                                <?php } ?>
                			</div>
                        <?php
                        }
                   ?>                    
        		</div>
            <?php 
        }
        ?>
	</div>
    <?php
    }
}
endif;
add_action( 'blossom_fashion_pro_contact_page', 'blossom_fashion_pro_contact_details', 20 );

if( ! function_exists( 'blossom_fashion_pro_content_end' ) ) :
/**
 * Content End
*/
function blossom_fashion_pro_content_end(){ 
    if( ! is_page_template( 'contact.php' ) ){        
        if( ! is_404() ) echo '</div><!-- .row -->'; ?>            
        </div><!-- .container/ -->        
    </div><!-- .error-holder/site-content -->
    <?php
    }
}
endif;
add_action( 'blossom_fashion_pro_before_footer', 'blossom_fashion_pro_content_end', 20 );

if( ! function_exists( 'blossom_fashion_pro_bottom_shop_section' ) ) :
/**
 * Bottom Shop Section
*/
function blossom_fashion_pro_bottom_shop_section(){ 
    $ed_bottom_shop = get_theme_mod( 'ed_bottom_shop_section', false );
    $section_title  = get_theme_mod( 'bottom_shop_section_title', __( 'Shop My Closet', 'blossom-fashion-pro' ) );
    $product_cat    = get_theme_mod( 'product_cat' );
    $shop_type      = get_theme_mod( 'woo_affiliate', 'woocommerce' );
    $affiliate_code = get_theme_mod( 'affiliate_code' );
    
    if( $ed_bottom_shop &&  is_woocommerce_activated() && ( is_front_page() || is_single() || is_page_template( 'contact.php' ) ) ){
        
        if( $shop_type == 'woocommerce' || $shop_type == 'affiliate' ){ ?>
            <div class="bottom-shop-section">
                <div class="container">
                <?php if( $section_title ){ ?>
                <section class="header">
                    <?php
                        if( $section_title ) echo '<h2 class="title">' . esc_html( $section_title ) . '</h2>';
                    ?>
                </section>
                <?php } ?>
                
                <?php
                if( $shop_type == 'woocommerce' ){
                    $args = array(
                        'post_type'      => 'product',
                        'post_status'    => 'publish',
                        'posts_per_page' => -1,
                        'product_cat'    => $product_cat
                    );
                    
                    $qry = new WP_Query( $args );
                
                    if( $qry->have_posts() ){ ?> 
                        <div class="bottom-shop-slider owl-carousel">
                        <?php
                            while( $qry->have_posts() ){
                                $qry->the_post(); 
                                $terms = get_the_terms( get_the_ID(), 'product_cat' );
                                $i = 0; ?>
                                <div class="item">
                                    <?php
                                        echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
                                        the_post_thumbnail( 'medium' );
                                        echo '</a>';
                                        
                                        echo '<div class="product-category">';
                                        foreach( $terms as $term ){
                                            $i++;
                                            echo '<a href="' . esc_url( get_term_link( $term->term_id ) ) . '">' . esc_html( $term->name ) . '</a>';
                                            if( $i < count( $terms ) ){
                                                esc_html_e( ', ', 'blossom-fashion-pro' );
                                            }
                                        }
                                        echo '</div>';
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
                }elseif( $shop_type == 'affiliate' ){ 
                    if( $affiliate_code ){ 
                        echo '<div class="post-shope-holder">';
                        echo htmlspecialchars_decode( stripslashes( $affiliate_code ) );
                        echo '</div>';
                    }   
                }
                ?>
                </div>
            </div>
        <?php
        }
    }
}
endif;
add_action( 'blossom_fashion_pro_footer', 'blossom_fashion_pro_bottom_shop_section', 10 );

if( ! function_exists( 'blossom_fashion_pro_instagram_section' ) ) :
/**
 * Bottom Shop Section
*/
function blossom_fashion_pro_instagram_section(){ 
    if( is_btif_activated() && ( is_front_page() || is_single() || is_page_template( 'contact.php' ) ) ){
        $ed_instagram = get_theme_mod( 'ed_instagram', false );
        $options = get_option( 'blossomthemes_instagram_feed_settings', true );
        $instaUrl = 'https://www.instagram.com/' . $options['username'];
        
        if( $ed_instagram ){
            echo '<div class="instagram-section">';
            echo '<section class="header"><h2 class="title"><i class="fa fa-instagram"></i>';
            echo '<a href="' . esc_url( $instaUrl ) . '" target="_blank" rel="nofollow">' . esc_html__( 'Follow @ Instagram', 'blossom-fashion-pro' ) . '</a>';
            echo '</h2></section>';
            echo do_shortcode( '[blossomthemes_instagram_feed]' );
            echo '</div>';    
        }
    }
}
endif;
add_action( 'blossom_fashion_pro_footer', 'blossom_fashion_pro_instagram_section', 15 );

if( ! function_exists( 'blossom_fashion_pro_footer_start' ) ) :
/**
 * Footer Start
*/
function blossom_fashion_pro_footer_start(){
    ?>
    <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
    <?php
}
endif;
add_action( 'blossom_fashion_pro_footer', 'blossom_fashion_pro_footer_start', 20 );

if( ! function_exists( 'blossom_fashion_pro_footer_top' ) ) :
/**
 * Footer Top
*/
function blossom_fashion_pro_footer_top(){    
    if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) || is_active_sidebar( 'footer-four' ) ){
    ?>
    <div class="footer-t">
		<div class="container">
			<div class="grid">
            <?php if( is_active_sidebar( 'footer-one' ) ){ ?>
				<div class="col">
				   <?php dynamic_sidebar( 'footer-one' ); ?>	
				</div>
            <?php } ?>
			
            <?php if( is_active_sidebar( 'footer-two' ) ){ ?>
                <div class="col">
				   <?php dynamic_sidebar( 'footer-two' ); ?>	
				</div>
            <?php } ?>
            
            <?php if( is_active_sidebar( 'footer-three' ) ){ ?>
                <div class="col">
				   <?php dynamic_sidebar( 'footer-three' ); ?>	
				</div>
            <?php } ?>
            
            <?php if( is_active_sidebar( 'footer-four' ) ){ ?>
                <div class="col">
				   <?php dynamic_sidebar( 'footer-four' ); ?>	
				</div>
            <?php } ?>
            </div>
		</div>
	</div>
    <?php 
    }   
}
endif;
add_action( 'blossom_fashion_pro_footer', 'blossom_fashion_pro_footer_top', 30 );

if( ! function_exists( 'blossom_fashion_pro_footer_bottom' ) ) :
/**
 * Footer Bottom
*/
function blossom_fashion_pro_footer_bottom(){ ?>
    <div class="footer-b">
		<div class="container">
			<div class="site-info">            
            <?php
                blossom_fashion_pro_get_footer_copyright();
                blossom_fashion_pro_ed_author_link();
                blossom_fashion_pro_ed_wp_link();
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link();
                }
            ?>               
            </div>
		</div>
	</div>
    <?php
}
endif;
add_action( 'blossom_fashion_pro_footer', 'blossom_fashion_pro_footer_bottom', 40 );

if( ! function_exists( 'blossom_fashion_pro_footer_end' ) ) :
/**
 * Footer End 
*/
function blossom_fashion_pro_footer_end(){
    ?>
    </footer><!-- #colophon -->
    <?php
}
endif;
add_action( 'blossom_fashion_pro_footer', 'blossom_fashion_pro_footer_end', 50 );

if( ! function_exists( 'blossom_fashion_pro_back_to_top' ) ) :
/**
 * Back to top
*/
function blossom_fashion_pro_back_to_top(){ ?>
    <div id="blossom-top">
		<span><i class="fa fa-long-arrow-up"></i></span>
	</div>
    <?php
}
endif;
add_action( 'blossom_fashion_pro_after_footer', 'blossom_fashion_pro_back_to_top', 15 );

if( ! function_exists( 'blossom_fashion_pro_page_end' ) ) :
/**
 * Page End
*/
function blossom_fashion_pro_page_end(){
    ?>
    </div><!-- #page -->
    <?php
}
endif;
add_action( 'blossom_fashion_pro_after_footer', 'blossom_fashion_pro_page_end', 20 );