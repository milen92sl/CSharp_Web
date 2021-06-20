<?php
/**
 * Blossom Pin Pro Template Functions which enhance the theme by hooking into WordPress
 *
 * @package Blossom_Pin_Pro
 */

if( ! function_exists( 'blossom_pin_pro_doctype' ) ) :
/**
 * Doctype Declaration
*/
function blossom_pin_pro_doctype(){ ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;
add_action( 'blossom_pin_pro_doctype', 'blossom_pin_pro_doctype' );

if( ! function_exists( 'blossom_pin_pro_head' ) ) :
/**
 * Before wp_head 
*/
function blossom_pin_pro_head(){ ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
}
endif;
add_action( 'blossom_pin_pro_before_wp_head', 'blossom_pin_pro_head' );

if( ! function_exists( 'blossom_pin_pro_page_start' ) ) :
/**
 * Page Start
*/
function blossom_pin_pro_page_start(){ ?>
    <div id="page" class="site">
    <?php
}
endif;
add_action( 'blossom_pin_pro_before_header', 'blossom_pin_pro_page_start', 20 );

if( ! function_exists( 'blossom_pin_pro_single_sticky_menu' ) ) :
/**
 * Page Start
*/
function blossom_pin_pro_single_sticky_menu(){
    $ed_sticky_single_header = get_theme_mod( 'ed_sticky_single_header', true );
    if( is_single() && $ed_sticky_single_header ) : ?>
        <div class="single-header">
            <?php blossom_pin_pro_site_branding(); ?>
            <div class="title-holder">
                <span><?php esc_html_e( 'You are reading','blossom-pin-pro' ); ?></span>
                <h2 class="post-title"><?php the_title(); ?></h2>
            </div>
            <?php if( blossom_pin_pro_social_links( false, false ) ){
                blossom_pin_pro_social_links( true, false );
            } ?>
            <div class="progress-container">
                <div class="progress-bar" id="myBar"></div>
            </div>
        </div>
        <?php
    endif;
}
endif;
add_action( 'blossom_pin_pro_before_header', 'blossom_pin_pro_single_sticky_menu', 5 );

if( ! function_exists( 'blossom_pin_pro_mobile_menu' ) ) :
/**
 * Page Start
*/
function blossom_pin_pro_mobile_menu(){ ?>
    <div class="mobile-header">
        <div class="mobile-site-header">
            <div id="toggle-button">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="mobile-menu">
                <nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'fallback_cb'    => 'blossom_pin_pro_primary_menu_fallback',
                    ) ); ?>
                </nav> 
                
                <?php if( blossom_pin_pro_social_links( false, false ) ){
                    echo '<span class="separator"></span>';
                    blossom_pin_pro_social_links( true, false );
                } ?>
            </div>
            <?php blossom_pin_pro_site_branding(); ?>
            <div class="tools">
                <div class="search-icon">
                    <svg class="open-icon" xmlns="http://www.w3.org/2000/svg" viewBox="-18214 -12091 18 18"><path id="Path_99" data-name="Path 99" d="M18,16.415l-3.736-3.736a7.751,7.751,0,0,0,1.585-4.755A7.876,7.876,0,0,0,7.925,0,7.876,7.876,0,0,0,0,7.925a7.876,7.876,0,0,0,7.925,7.925,7.751,7.751,0,0,0,4.755-1.585L16.415,18ZM2.264,7.925a5.605,5.605,0,0,1,5.66-5.66,5.605,5.605,0,0,1,5.66,5.66,5.605,5.605,0,0,1-5.66,5.66A5.605,5.605,0,0,1,2.264,7.925Z" transform="translate(-18214 -12091)"/></svg>
                    <svg class="close-icon" xmlns="http://www.w3.org/2000/svg" viewBox="10906 13031 18 18"><path id="Close" d="M23,6.813,21.187,5,14,12.187,6.813,5,5,6.813,12.187,14,5,21.187,6.813,23,14,15.813,21.187,23,23,21.187,15.813,14Z" transform="translate(10901 13026)"/></svg>
                </div>
            </div>
        </div>
    </div>
    <?php
}
endif;
add_action( 'blossom_pin_pro_header', 'blossom_pin_pro_mobile_menu', 10 );

if( ! function_exists( 'blossom_pin_pro_header' ) ) :
/**
 * Header Start
*/
function blossom_pin_pro_header(){ 
    $header_array = array( 'one', 'two', 'three', 'four', 'five', 'six');
    $header = get_theme_mod( 'header_layout', 'one' );
    if( in_array( $header, $header_array ) ){            
        get_template_part( 'headers/' . $header );
    }
}
endif;
add_action( 'blossom_pin_pro_header', 'blossom_pin_pro_header', 20 );

if( ! function_exists( 'blossom_pin_pro_get_header_ad' ) ) :
/**
 * Get Header AD
*/
function blossom_bin_pro_get_header_ad(){
    $ed_header_ad  = get_theme_mod( 'ed_header_ad' );
    $ad_img        = get_theme_mod( 'header_ad' );
    $ad_link       = get_theme_mod( 'header_ad_link' );
    $target        = get_theme_mod( 'open_link_diff_tab_header', true ) ? 'target="_blank"' : '';
    $ed_ad_code    = get_theme_mod( 'ed_header_ad_code' );
    $header_adcode = get_theme_mod( 'header_ad_code' ); 
     
    $ed_header_ad  = get_theme_mod( 'ed_header_ad' );
    $ad_img        = get_theme_mod( 'header_ad' );
    $ad_link       = get_theme_mod( 'header_ad_link' );
    $target        = get_theme_mod( 'open_link_diff_tab_header', true ) ? 'target="_blank"' : '';
    $ed_ad_code    = get_theme_mod( 'ed_header_ad_code' );
    $header_adcode = get_theme_mod( 'header_ad_code' ); 
     
    if($ed_header_ad){ ?> 
        <div class="promotional-section">
            <?php
                if( $ad_img ){
                    $image = wp_get_attachment_image_url( $ad_img, 'full' );
                }else{
                    $image = false;
                }                
                if( $ed_header_ad && ( $ad_img || ( $ed_ad_code && $header_adcode ) ) ) 
                blossom_pin_pro_get_ad_block( $image, $ad_link, $target, $header_adcode, $ed_ad_code );
                ?>
        </div>
    <?php
    }
}
endif;
add_action( 'blossom_pin_pro_header_ad', 'blossom_bin_pro_get_header_ad' ); 

if( ! function_exists( 'blossom_pin_pro_banner' ) ) :
/**
 * Banner Section 
*/
function blossom_pin_pro_banner(){
    $slider_layout = get_theme_mod( 'slider_layout', 'one' );
    if( is_front_page() || is_home() ) blossom_pin_pro_get_banner( $slider_layout );   
}
endif;
add_action( 'blossom_pin_pro_after_header', 'blossom_pin_pro_banner', 15 );

if( ! function_exists( 'blossom_pin_pro_featured_section' ) ) :
/**
 * Top Section
 * 
*/
function blossom_pin_pro_featured_section(){
    $ed_featured         = get_theme_mod( 'ed_featured_area', true );
    $featured_type       = get_theme_mod( 'featured_type', 'page' );
    $featured_page_one   = get_theme_mod( 'featured_content_one' );
    $featured_page_two   = get_theme_mod( 'featured_content_two' );
    $featured_page_three = get_theme_mod( 'featured_content_three' );
    $featured_pages      = array( $featured_page_one, $featured_page_two, $featured_page_three );
    $featured_pages      = array_diff( array_unique( $featured_pages), array( '' ) );
    $featured_custom     = get_theme_mod( 'featured_custom' );
    
    $args = array(
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'post__in'       => $featured_pages,
        'orderby'        => 'post__in'   
    );
    
    $qry = new WP_Query( $args );
                        
    if( ( is_home() || is_front_page() ) && ( $ed_featured && ( $featured_type == 'page' && $featured_pages && $qry->have_posts() ) || ( $featured_type == 'custom' && $featured_custom ) ) ){ ?>
        <div class="featured-section">
    		<div class="container">
    			<?php 
                if( $ed_featured ){
                    if( $featured_type == 'page' && $featured_pages && $qry->have_posts() ){ ?>
        				<div class="row">
        					<?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                            <div class="col">
        						<div class="img-holder">
        							<a href="<?php the_permalink(); ?>">
                                    <?php 
                                        if( has_post_thumbnail() ){
                                            the_post_thumbnail( 'blossom-pin-related', array( 'itemprop' => 'image' ) );
                                        }
                                    ?>                                   
        							<?php the_title( '<div class="text-holder">', '</div>' ); ?>
                                    </a>
        						</div>
        					</div>
        					<?php } ?>
        				</div>
                        <?php
                        wp_reset_postdata();                                   
                    }elseif( $featured_type == 'custom' && $featured_custom ){ ?>
        				<div class="row">
        					<?php foreach( $featured_custom as $feature ){ ?>
                            <div class="col">
        						<div class="img-holder">
        							<?php
                                    if( $feature['link'] ) echo '<a href="' . esc_url( $feature['link'] ) . '">';
                                    if( $feature['thumbnail'] ){
                                        $image = wp_get_attachment_image_url( $feature['thumbnail'], 'blossom-pin-related' );
                                        echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $feature['title'] ) . '" itemprop="image">';
                                    }
                                    if( $feature['title'] ) echo '<div class="text-holder">' . esc_html( $feature['title'] ) . '</div>';
                                    if( $feature['link'] ) echo '</a>'; 
                                    ?>
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
endif;
add_action( 'blossom_pin_pro_after_header', 'blossom_pin_pro_featured_section', 20 );

if( ! function_exists( 'blossom_pin_pro_get_ad_before_content' ) ) :
/**
 * Get AD before single content
*/
function blossom_pin_pro_get_ad_before_content(){
    $ed_bc_post_ad = get_theme_mod( 'ed_bc_post_ad', '' );
    $ad_img = get_theme_mod ( 'bc_post_ad', '' );
    $ad_link = get_theme_mod( 'bc_post_ad_link', '' );
    $ed_ad_code = get_theme_mod( 'ed_bc_post_ad_code', '' );
    $target     = get_theme_mod( 'open_link_diff_tab_bc_post', true ) ? 'target="_blank"' : '';
    $ad_code = get_theme_mod( 'bc_post_ad_code', '' );
     
    if( $ad_img ){
        $image = wp_get_attachment_image_url( $ad_img, 'full' ) ;
    }else{
        $image = false;
    }
    
    if( $ed_bc_post_ad && is_single() && ( is_woocommerce_activated() && !is_product() ) && ( $ad_img || ( $ed_ad_code && $ad_code ) ) ) 
    blossom_pin_pro_get_ad_block( $image, $ad_link, $target, $ad_code, $ed_ad_code );
}
endif;
add_action( 'blossom_pin_pro_header', 'blossom_pin_pro_get_ad_before_content', 30 );

if( ! function_exists( 'blossom_pin_pro_content_start' ) ) :
/**
 * Content Start  
*/
function blossom_pin_pro_content_start(){
    $single_layout = get_theme_mod( 'single_post_layout', 'one' );

    if( !is_404() ){ 
        if( ( is_single() && !( is_woocommerce_activated() && is_product() ) ) && ( $single_layout == 'five' || $single_layout == 'six' ) ) {
            if( $single_layout == 'six' ) echo '<div class="post-top"><div class="container">';
            echo '<div class="entry-post-header">';
            blossom_pin_pro_single_entry_header();
            blossom_pin_pro_post_thumbnail();
            echo '</div>';
            if( $single_layout == 'six' ) echo '</div></div>';
        }
        ?>
        <div id="content" class="site-content">   
            <div class="container">
    <?php }     
}
endif;
add_action( 'blossom_pin_pro_content', 'blossom_pin_pro_content_start', 10 );

if( ! function_exists( 'blossom_pin_pro_content' ) ) :
/**
 * Content Start  
*/
function blossom_pin_pro_content(){
    $add_class = is_search() ? 'search-result-' : '';
    $single_layout = get_theme_mod( 'single_post_layout', 'one' );
    $ed_bc_post_ad = get_theme_mod( 'ed_bc_post_ad', '' );
    
    global $wp_query;

    if( !is_404() ){                    
        if( ( is_single() && !( is_woocommerce_activated() && is_product() ) ) && $single_layout == 'three'  ) {
            echo '<div class="entry-post-header">';
            blossom_pin_pro_single_entry_header();
            blossom_pin_pro_post_thumbnail();
            echo '</div>';
            echo '<div class="container">';
        }
        ?>
        <div id="primary" class="content-area">
        <?php if( is_archive() || is_search() ) { ?>
            <div class="<?php echo esc_attr( $add_class ); ?>page-header">
                <?php        
                if( is_archive() ){ 
                    if( is_author() ){ 
                        blossom_pin_pro_author();
                    }else{ 
                        the_archive_title();
                        the_archive_description( '<div class="archive-description">', '</div>' );
                    }          
                } 
                if( is_search() && ( $wp_query->found_posts > 0 ) ){ ?>
                    <span class="label"><?php esc_html_e('SEARCH RESULT FOR:', 'blossom-pin-pro'); ?></span>
                    <?php get_search_form(); ?>
                <?php } ?>
            </div>
            <?php   
        }
        /**
        * @hooked blossom_pin_pro_search_per_page_count  - 15
        */
        do_action( 'blossom_pin_pro_before_posts_content' );
    }     
}
endif;
add_action( 'blossom_pin_pro_content', 'blossom_pin_pro_content', 20 );

if( ! function_exists( 'blossom_pin_pro_search_per_page_count' ) ):
/**
*   Counts the Number of total posts in Archive, Search and Author
*/
function blossom_pin_pro_search_per_page_count(){
    $pagination = get_theme_mod( 'pagination_type','numbered' );
    global $wp_query;
    if( is_archive() || is_search() && $wp_query->found_posts > 0 ) {
        if( $pagination != 'infinite_scroll' && $pagination != 'load_more' ) :
            $posts_per_page = get_option( 'posts_per_page' );
            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
            $start_post_number = 0;
            $end_post_number   = 0;

            if( $wp_query->found_posts > 0 && !( is_woocommerce_activated() && is_shop() ) ):                
                $start_post_number = 1;
                if( $wp_query->found_posts < $posts_per_page  ) {
                    $end_post_number = $wp_query->found_posts;
                }else{
                    $end_post_number = $posts_per_page;
                }

                if( $paged > 1 ){
                    $start_post_number = $posts_per_page * ( $paged - 1 ) + 1;
                    if( $wp_query->found_posts < ( $posts_per_page * $paged )  ) {
                        $end_post_number = $wp_query->found_posts;
                    }else{
                        $end_post_number = $paged * $posts_per_page;
                    }
                }

                printf( esc_html__( '%1$s Showing:  %2$s - %3$s of %4$s RESULTS %5$s', 'blossom-pin-pro' ), '<span class="search-per-page-count">', absint( $start_post_number ), absint( $end_post_number ), esc_html( number_format_i18n( $wp_query->found_posts ) ), '</span>' );
            endif;
        else :
            printf( esc_html__( '%1$s Showing: %2$s RESULTS %3$s', 'blossom-pin-pro' ), '<span class="search-per-page-count">', esc_html( number_format_i18n( $wp_query->found_posts ) ), '</span>' );
        endif;
    }
}
endif; 
add_action( 'blossom_pin_pro_before_posts_content' , 'blossom_pin_pro_search_per_page_count', 15 );

if( ! function_exists( 'blossom_pin_pro_single_page_header' ) ):
/**
 * Displays a header on Single Page
 *
 */
function blossom_pin_pro_single_page_header(){
    global $post;
    
    $page_on_front = get_option( 'page_on_front' );
    if( ! ( $post->ID == $page_on_front ) ){
    ?>
    <div class="single-page-header">
        <h1 class="single-page-title"><?php the_title(); ?></h1>
    </div>
    <?php
    }
}
endif;
add_action( 'blossom_pin_pro_before_page_entry_content', 'blossom_pin_pro_single_page_header', 15 );

if( ! function_exists( 'blossom_pin_pro_meta_info' ) ):
/**
 * Single Post Meta Information
 *
 */
function blossom_pin_pro_meta_info(){
    $ed_post_date = get_theme_mod( 'ed_post_date' , false );
    $ed_post_author = get_theme_mod( 'ed_post_author', false );
    $ed_sticky_social = get_theme_mod ( 'ed_sticky_social', true );
    $ed_comments = get_theme_mod( 'ed_comments', true );
    ?>
        <div class="meta-info">
            <div class="entry-meta">               
                <?php
                if( ! $ed_post_author ) blossom_pin_pro_posted_by();
                if( is_single() ){
                    if( ! $ed_post_date ) blossom_pin_pro_posted_on();
                } 
                if( $ed_comments ) blossom_pin_pro_comment_count(); ?>
            </div>
            <?php if( $ed_sticky_social ) blossom_pin_pro_social_share(); ?>
        </div>
<?php
}
endif;
add_action( 'blossom_pin_pro_before_single_post_entry_content', 'blossom_pin_pro_meta_info' );

if ( ! function_exists( 'blossom_pin_pro_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function blossom_pin_pro_post_thumbnail() {
    global $wp_query;
    $image_size  = 'thumbnail';
    $ed_featured = get_theme_mod( 'ed_featured_image', true );
    $archive_layout = get_theme_mod( 'archive_layout', 'archive-one' );
    
    if( is_home() ){ 
        $image_size = blossom_pin_pro_blog_layout_image_size( false );
        if( has_post_thumbnail() ){                        
            echo '<div class="post-thumbnail">';
            echo '<a href="' . esc_url( get_permalink() ) . '">';
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
            echo '</a>';
            blossom_pin_pro_like_count();
            echo '</div>';
        } 
        
    }elseif( is_archive() || is_search() ){
        if( has_post_thumbnail() ){
            $image_size = ( $archive_layout == 'archive-two' ) ? 'full' : 'blossom-pin-archive';
            echo '<div class="post-thumbnail"><a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
            echo '</a>';
            blossom_pin_pro_like_count();    
            echo '</div>';
        }
    }elseif( is_singular() ){
        if( is_single() ){
            $image_size = blossom_pin_pro_single_image_size();
            echo '<div class="post-thumbnail">';
                if( $ed_featured ) {
                    the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                }
            echo '</div>';
        }else{
            echo '<div class="post-thumbnail">';
            the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) );
            echo '</div>';
        }
    }
}
endif;
add_action( 'blossom_pin_pro_before_page_entry_content', 'blossom_pin_pro_post_thumbnail', 20 );

if( ! function_exists( 'blossom_pin_pro_entry_header' ) ) :
/**
 * Entry Header
*/
function blossom_pin_pro_entry_header(){ 
    $archive_layout = get_theme_mod( 'archive_layout', 'archive-one' );

    if( ( is_archive() || is_search() ) && ( $archive_layout == 'archive-one' ) ){
        echo '<div class="text-holder">';
    } ?>
    <header class="entry-header">
        <?php 
            blossom_pin_pro_category();

            if( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif; 
        ?>
    </header>    
<?php
}
endif;
add_action( 'blossom_pin_pro_before_post_entry_content', 'blossom_pin_pro_entry_header', 20 );

if( ! function_exists( 'blossom_pin_pro_entry_content' ) ) :
/**
 * Entry Content
*/
function blossom_pin_pro_entry_content(){ 
    $ed_excerpt = get_theme_mod( 'ed_excerpt', true ); ?>
    <div class="entry-content" itemprop="text">
        <?php
            if( is_singular() || ! $ed_excerpt ){
                the_content();    
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blossom-pin-pro' ),
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
add_action( 'blossom_pin_pro_page_entry_content', 'blossom_pin_pro_entry_content', 15 );
add_action( 'blossom_pin_pro_post_entry_content', 'blossom_pin_pro_entry_content', 15 );
add_action( 'blossom_pin_pro_single_post_entry_content', 'blossom_pin_pro_entry_content', 20 );


if( ! function_exists( 'blossom_pin_pro_entry_footer' ) ) :
/**
 * Entry Footer
*/
function blossom_pin_pro_entry_footer(){ 
    $ed_excerpt = get_theme_mod( 'ed_excerpt', true );
    $readmore = get_theme_mod( 'read_more_text', __( 'Read more', 'blossom-pin-pro' ) );
    $archive_layout = get_theme_mod( 'archive_layout', 'archive-one' ); ?>
    <footer class="entry-footer">
        <?php
            if( is_single() ){
                blossom_pin_pro_tag();
            }
            
            if( ( is_front_page() || is_home() ) && $ed_excerpt ){
                echo '<a href="' . esc_url( get_the_permalink() ) . '" class="read-more">' . esc_html( $readmore ) . '</a>';    
            }            
            
            if( ( is_archive() || is_search() ) && ( $archive_layout == 'archive-one' ) ) blossom_pin_pro_posted_on();
            
            if( get_edit_post_link() ){
                edit_post_link(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Edit <span class="screen-reader-text">%s</span>', 'blossom-pin-pro' ),
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

    <?php if( ( is_archive() || is_search() ) && ( $archive_layout == 'archive-one' ) ){
        echo '</div><!-- .text-holder -->';
    }
}
endif;
add_action( 'blossom_pin_pro_post_entry_content', 'blossom_pin_pro_entry_footer', 20 );
add_action( 'blossom_pin_pro_page_entry_content', 'blossom_pin_pro_entry_footer', 20 );
add_action( 'blossom_pin_pro_single_post_entry_content', 'blossom_pin_pro_entry_footer', 25 );

if( ! function_exists( 'blossom_pin_pro_navigation' ) ) :
/**
 * Navigation
*/
function blossom_pin_pro_navigation(){
    if( is_single() ){
        $previous = get_previous_post_link(
    		'<div class="nav-previous nav-holder">%link</div>',
    		'<span class="meta-nav">' . esc_html__( 'Previous Article', 'blossom-pin-pro' ) . '</span><span class="post-title">%title</span>',
    		false,
    		'',
    		'category'
    	);
    
    	$next = get_next_post_link(
    		'<div class="nav-next nav-holder">%link</div>',
    		'<span class="meta-nav">' . esc_html__( 'Next Article', 'blossom-pin-pro' ) . '</span><span class="post-title">%title</span>',
    		false,
    		'',
    		'category'
    	); 
        
        if( $previous || $next ){?>            
            <nav class="navigation post-navigation" role="navigation">
    			<h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'blossom-pin-pro' ); ?></h2>
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
                'prev_text'          => __( 'Previous', 'blossom-pin-pro' ),
                'next_text'          => __( 'Next', 'blossom-pin-pro' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'blossom-pin-pro' ) . ' </span>',
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
add_action( 'blossom_pin_pro_after_post_content', 'blossom_pin_pro_navigation' );
add_action( 'blossom_pin_pro_after_posts_content', 'blossom_pin_pro_navigation' );

if( ! function_exists( 'blossom_pin_pro_get_ad_after_content' ) ) :
/**
 * Get AD after single content
*/
function blossom_pin_pro_get_ad_after_content(){
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

    if( $ed_ad && is_single() && ( is_woocommerce_activated() && !is_product() ) && ( $ad_img || ( $ed_ad_code && $ad_code ) ) ) 
    blossom_pin_pro_get_ad_block( $image, $ad_link, $target, $ad_code, $ed_ad_code );
}
endif;
add_action ( 'blossom_pin_pro_post_entry_content', 'blossom_pin_pro_get_ad_after_content', 25);
add_action( 'blossom_pin_pro_single_post_entry_content', 'blossom_pin_pro_get_ad_after_content', 30 );

if( ! function_exists( 'blossom_pin_pro_author' ) ) :
/**
 * Author Section
*/
function blossom_pin_pro_author(){ 
    $ed_author    = get_theme_mod( 'ed_author', false );
    $author_title = get_the_author_meta( 'display_name' );
    $author_decription = get_the_author_meta( 'description' );
    $add_author_class = is_single() ? 'section' : 'info';
    if( ( is_single() && ! $ed_author && $author_title && $author_decription ) || is_author() ){ ?>
    <div class="author-<?php echo esc_attr( $add_author_class ); ?>">
        <div class="img-holder"><?php blossom_pin_pro_gravatar( get_the_author_meta( 'ID' ), 120 ); ?></div>
        <div class="text-holder">
            <?php 
                echo '<h3>' . esc_html__( 'Written by','blossom-pin-pro' ) . '</h3>';
                echo '<h2 class="author-name">' . esc_html( $author_title ) . '</h2>';
                if( !empty( $author_decription ) ) echo '<div class="author-info-content">' . wpautop( wp_kses_post( $author_decription ) ) . '</div>';
                blossom_pin_pro_author_social();
            ?>      
        </div>
    </div>
    <?php
    }
}
endif;
add_action( 'blossom_pin_pro_single_post_entry_content', 'blossom_pin_pro_author', 35 );

if( ! function_exists( 'blossom_pin_pro_instagram' ) ) :
/**
 * Before Footer
*/
function blossom_pin_pro_instagram(){
    if( is_btif_activated() ){
        $ed_instagram = get_theme_mod( 'ed_instagram', false );
        if( $ed_instagram ){
            echo '<div class="instagram-section">';
            echo do_shortcode( '[blossomthemes_instagram_feed]' );
            echo '</div>';    
        }
    }
}
endif;
add_action( 'blossom_pin_pro_before_footer_start', 'blossom_pin_pro_instagram', 10 );

if( ! function_exists( 'blossom_pin_pro_newsletter' ) ) :
/**
 * Blossom Newsletter
*/
function blossom_pin_pro_newsletter(){
    $ed_newsletter = get_theme_mod( 'ed_newsletter', false );
    $newsletter = get_theme_mod( 'newsletter_shortcode' );
    if( $ed_newsletter && !empty( $newsletter ) ){
        echo '<div class="newsletter-section"><div class="container">';
        echo do_shortcode( $newsletter );
        blossom_pin_pro_social_links( true, true );   
        echo '</div></div>';            
    }
}
endif;
add_action( 'blossom_pin_pro_before_footer_start', 'blossom_pin_pro_newsletter', 20 );

if( ! function_exists( 'blossom_pin_pro_related_posts' ) ) :
/**
 * Related Posts 
*/
function blossom_pin_pro_related_posts(){ 
    $ed_related_post = get_theme_mod( 'ed_related', true );    
    if( $ed_related_post ){
        blossom_pin_pro_get_posts_list( 'related' );    
    }
}
endif;                                                                               
add_action( 'blossom_pin_pro_before_single_footer', 'blossom_pin_pro_related_posts', 30 );

if( ! function_exists( 'blossom_pin_pro_latest_posts' ) ) :
/**
 * Latest Posts
*/
function blossom_pin_pro_latest_posts(){ 
    blossom_pin_pro_get_posts_list( 'latest' );
}
endif;
add_action( 'blossom_pin_pro_latest_posts', 'blossom_pin_pro_latest_posts' );

if( ! function_exists( 'blossom_pin_pro_comment' ) ) :
/**
 * Comments Template 
*/
function blossom_pin_pro_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
	if( get_theme_mod( 'ed_comments', true ) && ( comments_open() || get_comments_number() ) ) :
		comments_template();
	endif;
}
endif;
add_action( 'blossom_pin_pro_before_single_footer', 'blossom_pin_pro_comment', 40 );
add_action( 'blossom_pin_pro_after_page_content', 'blossom_pin_pro_comment' );

if( ! function_exists( 'blossom_pin_pro_content_end' ) ) :
/**
 * Content End
*/
function blossom_pin_pro_content_end(){ 
    $single_layout = get_theme_mod( 'single_post_layout', 'one' );
    if( !is_404() ) {
        if( $single_layout == 'three' ) echo '</div><!-- .container -->'; ?>            
            </div><!-- .container -->        
        </div><!-- .site-content -->
    <?php
    }
}
endif;
add_action( 'blossom_pin_pro_before_footer', 'blossom_pin_pro_content_end', 20 );
add_action( 'blossom_pin_pro_before_single_footer', 'blossom_pin_pro_content_end', 15 );

if( ! function_exists( 'blossom_pin_pro_footer_start' ) ) :
/**
 * Footer Start
*/
function blossom_pin_pro_footer_start(){
    ?>
    <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
    <?php
}
endif;
add_action( 'blossom_pin_pro_footer', 'blossom_pin_pro_footer_start', 20 );

if( ! function_exists( 'blossom_pin_pro_footer_top' ) ) :
/**
 * Footer Top
*/
function blossom_pin_pro_footer_top(){    
    $footer_sidebars = array( 'footer-one', 'footer-two', 'footer-three' );
    $active_sidebars = array();
    $sidebar_count   = 0;

    foreach ( $footer_sidebars as $footer_sidebar ) {
        if( is_active_sidebar( $footer_sidebar ) ){
            array_push( $active_sidebars, $footer_sidebar );
            $sidebar_count++ ;
        }
    }

    if( ! empty( $active_sidebars ) ){ ?>

        <div class="footer-t">
            <div class="container">
                <div class="col-<?php echo esc_attr( $sidebar_count ); ?> grid">
                    <?php 
                    foreach( $active_sidebars as $active_footer_sidebar ){
                        if( is_active_sidebar( $active_footer_sidebar ) ){
                            echo '<div class="col">';
                            dynamic_sidebar( $active_footer_sidebar );
                            echo '</div>';
                        }
                    } 
                    ?>
                </div>
            </div><!-- .container -->
        </div><!-- .footer-t -->
    <?php }   
}
endif;
add_action( 'blossom_pin_pro_footer', 'blossom_pin_pro_footer_top', 30 );

if( ! function_exists( 'blossom_pin_pro_footer_bottom' ) ) :
/**
 * Footer Bottom
*/
function blossom_pin_pro_footer_bottom(){ ?>
    <div class="footer-b">
		<div class="container">
			<div class="site-info">            
            <?php
                blossom_pin_pro_get_footer_copyright();
                blossom_pin_pro_ed_author_link();
                blossom_pin_pro_ed_wp_link();
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link();
                }
            ?>               
            </div>
            <?php blossom_pin_pro_secondary_navigation(); ?>
		</div>
	</div>
    <?php
}
endif;
add_action( 'blossom_pin_pro_footer', 'blossom_pin_pro_footer_bottom', 40 );

if( ! function_exists( 'blossom_pin_pro_back_to_top' ) ):
/**
* Back to Top 
*/
function blossom_pin_pro_back_to_top() { ?>
    <div class="back-to-top">
        <span><i class="fas fa-long-arrow-alt-up"></i></span>
    </div>
    <?php
}
endif;
add_action( 'blossom_pin_pro_footer', 'blossom_pin_pro_back_to_top', 50);

if( ! function_exists( 'blossom_pin_pro_footer_end' ) ) :
/**
 * Footer End 
*/
function blossom_pin_pro_footer_end(){ ?>
    </footer><!-- #colophon -->
    <?php
}
endif;
add_action( 'blossom_pin_pro_footer', 'blossom_pin_pro_footer_end', 60 );

if( ! function_exists( 'blossom_pin_pro_page_end' ) ) :
/**
 * Page End
*/
function blossom_pin_pro_page_end(){ ?>
    </div><!-- #page -->
    <?php
}
endif;
add_action( 'blossom_pin_pro_after_footer', 'blossom_pin_pro_page_end', 20 );

if( ! function_exists( 'blossom_pin_pro_after_page_end' ) ) :
/**
 * Page End
*/
function blossom_pin_pro_after_page_end(){ 
    echo '<div class="search-form-holder">';
        get_search_form(); 
    echo '</div>'; ?>
    
    <div class="overlay"></div>
    <?php
}
endif;
add_action( 'blossom_pin_pro_after_footer', 'blossom_pin_pro_after_page_end', 30 );

if ( ! function_exists( 'blossom_pin_pro_post_format_content' ) ) :
    /**
     * Prints post format meta content
     */
    function blossom_pin_pro_post_format_content( $related = false ) {
        if( is_home() || is_search() || is_archive() ) {
            $on_page = true;
        }elseif( is_single() ){
            $on_page = false;
        } 

        if ( get_post_format() == "image" ) {
            blossom_pin_pro_post_format_image( $on_page );
            // echo $on_page;
        } elseif ( get_post_format() == "video" ) {            
            blossom_pin_pro_post_format_video( $on_page );            
        } elseif ( get_post_format() == "gallery" ) {
            blossom_pin_pro_post_format_gallery( $on_page );
        } elseif ( get_post_format() == "audio" ) {
            blossom_pin_pro_post_format_audio( $on_page );
        } elseif ( get_post_format() == "quote" ) {
            blossom_pin_pro_post_format_quote( $on_page );
        } elseif ( $on_page ) {
            blossom_pin_pro_post_thumbnail();
        } elseif ( !$on_page && $related ) {
            blossom_pin_pro_post_thumbnail();
        }
    }
endif;
add_action( 'blossom_pin_pro_before_post_entry_content', 'blossom_pin_pro_post_format_content', 10 );
add_action( 'blossom_pin_pro_single_post_entry_content', 'blossom_pin_pro_post_format_content', 10 );