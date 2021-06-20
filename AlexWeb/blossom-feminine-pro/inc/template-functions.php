<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Blossom_Feminine_Pro
 */

if( ! function_exists( 'blossom_feminine_pro_doctype' ) ) :
/**
 * Doctype Declaration
*/
function blossom_feminine_pro_doctype(){
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;
add_action( 'blossom_feminine_pro_doctype', 'blossom_feminine_pro_doctype' );

if( ! function_exists( 'blossom_feminine_pro_head' ) ) :
/**
 * Before wp_head 
*/
function blossom_feminine_pro_head(){
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
}
endif;
add_action( 'blossom_feminine_pro_before_wp_head', 'blossom_feminine_pro_head' );

if( ! function_exists( 'blossom_feminine_pro_page_start' ) ) :
/**
 * Page Start
*/
function blossom_feminine_pro_page_start(){
    ?>
    <div id="page" class="site">
    <?php
}
endif;
add_action( 'blossom_feminine_pro_before_header', 'blossom_feminine_pro_page_start', 20 );

if( ! function_exists( 'blossom_feminine_pro_promotional_block' ) ) :
/**
 * Promotional Block 
*/
function blossom_feminine_pro_promotional_block(){ 
    $ed_promotional_block = get_theme_mod( 'ed_notification_bar', false );
    $notification_text    = get_theme_mod( 'notification_text', __( '30 percent Off glasses and purses with coupon code <strong>30PERCENTOFF!</strong>', 'blossom-feminine-pro' ) );
    $btn_label            = get_theme_mod( 'notification_btn_label', __( 'Get It Now', 'blossom-feminine-pro' ) );
    $btn_url              = get_theme_mod( 'notification_btn_url', '#' );
    $new_tab              = get_theme_mod( 'ed_open_new_target', false );

    
    if( $ed_promotional_block && $notification_text ){ ?>
    <div class="promotional-block">
		<div class="container">
			<div class="text-holder">
				<span>                
                <?php 
                echo wp_kses_post( $notification_text );
                if( ! $new_tab ){
                    if( $btn_label && $btn_url ) echo '<a href="' . esc_url( $btn_url ) . '" class="btn-get">' . esc_html( $btn_label ) . '</a>';
                }else{
                    if( $btn_label && $btn_url ) echo '<a href="' . esc_url( $btn_url ) . '" class="btn-get" target="_blank" >' . esc_html( $btn_label ) . '</a>';
                } ?>
                </span>
			</div>
		</div>
	</div>
    <?php    
    }
}
endif;
add_action( 'blossom_feminine_pro_header', 'blossom_feminine_pro_promotional_block', 15 );

if( ! function_exists( 'blossom_feminine_pro_header' ) ) :
/**
 * Header Start
*/
function blossom_feminine_pro_header(){ 
    $header_array = array( 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight' );
    $header = get_theme_mod( 'header_layout', 'one' );
    if( in_array( $header, $header_array ) ){            
        get_template_part( 'headers/' . $header );
    }
}
endif;
add_action( 'blossom_feminine_pro_header', 'blossom_feminine_pro_header', 20 );

if( ! function_exists( 'blossom_feminine_pro_get_header_ad' ) ) :
/**
 * Get Header AD
*/
function blossom_feminine_pro_get_header_ad(){
    $ed_header_ad  = get_theme_mod( 'ed_header_ad' );
    $ad_img        = get_theme_mod( 'header_ad' );
    $ad_link       = get_theme_mod( 'header_ad_link' );
    $target        = get_theme_mod( 'open_link_diff_tab_header', true ) ? 'target="_blank"' : '';
    $ed_ad_code    = get_theme_mod( 'ed_header_ad_code' );
    $header_adcode = get_theme_mod( 'header_ad_code' ); 
     
    if( $ad_img ){
        $image = wp_get_attachment_image_url( $ad_img, 'full' );
    }else{
        $image = false;
    }
    
    if( $ed_header_ad && ( $ad_img || ( $ed_ad_code && $header_adcode ) ) ) 
    blossom_feminine_pro_get_ad_block( $image, $ad_link, $target, $header_adcode, $ed_ad_code );
}
endif;
add_action( 'blossom_feminine_pro_header_ad', 'blossom_feminine_pro_get_header_ad' ); 

if( ! function_exists( 'blossom_feminine_pro_banner' ) ) :
/**
 * Banner Slider
*/
function blossom_feminine_pro_banner(){ 
    $ed_slider      = get_theme_mod( 'ed_slider', true );
    $slider_layout  = get_theme_mod( 'slider_layout', 'one' );            
    if( ( is_home() || is_front_page() ) && $ed_slider ) blossom_feminine_pro_get_banner_slider( $slider_layout );
}
endif;
add_action( 'blossom_feminine_pro_after_header', 'blossom_feminine_pro_banner', 15 );

if( ! function_exists( 'blossom_feminine_pro_top_bar' ) ) :
/**
 * Top Bar
*/
function blossom_feminine_pro_top_bar(){
    if( ! is_front_page() ){ ?>
    <div class="top-bar">
		<div class="container">
			<?php 
            /**
             * @hooked blossom_feminine_pro_page_header - 15
             * @hooked blossom_feminine_pro_breadcrumb  - 20
            */
            do_action( 'blossom_feminine_pro_top_bar' );
            ?>
		</div>
	</div>
    <?php
    }
}
endif;
add_action( 'blossom_feminine_pro_after_header', 'blossom_feminine_pro_top_bar', 20 );

if( ! function_exists( 'blossom_feminine_pro_page_header' ) ) :
/**
 * Page Header
*/
function blossom_feminine_pro_page_header(){ ?>
    <header class="page-header">
    <?php
        if ( is_home() && ! is_front_page() ){ 
            echo '<h1 class="page-title">';
			single_post_title();
            echo '</h1>';
        }		

        if( is_archive() ){
    		the_archive_title( '<h1 class="page-title">', '</h1>' );
    		the_archive_description( '<div class="archive-description">', '</div>' );
        }
    
        if( is_search() ){ ?>            
			<h1 class="page-title"><?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'blossom-feminine-pro' ), '<span>' . get_search_query() . '</span>' );
			?></h1>    		
        <?php
        }
    
        if( is_page() ){ 
            the_title( '<h1 class="page-title">', '</h1>' ); 
        }
        
        if( is_404() ) echo '<h1 class="page-title">' . esc_html__( '404', 'blossom-feminine-pro' ) . '</h1>'; //For 404
        ?>
    </header><!-- .page-header -->
    <?php
}
endif;
add_action( 'blossom_feminine_pro_top_bar', 'blossom_feminine_pro_page_header', 15 );

if( ! function_exists( 'blossom_feminine_pro_breadcrumb' ) ) :
/**
 * Page Header for inner pages
*/
function blossom_feminine_pro_breadcrumb(){    
    
    global $post;
    $post_page  = get_option( 'page_for_posts' ); //The ID of the page that displays posts.
    $show_front = get_option( 'show_on_front' ); //What to show on the front page    
    $home       = get_theme_mod( 'home_text', __( 'Home', 'blossom-feminine-pro' ) ); // text for the 'Home' link
    $delimiter  = get_theme_mod( 'separator', __( '/', 'blossom-feminine-pro' ) ); // delimiter between crumbs
    $before     = '<span class="current">'; // tag before the current crumb
    $after      = '</span>'; // tag after the current crumb
    
    if( get_theme_mod( 'ed_breadcrumb', true ) && ! is_front_page() ){
        
        echo '<div class="breadcrumb-wrapper" itemscope itemtype="http://schema.org/BreadcrumbList">
                <div id="crumbs" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="' . esc_url( home_url() ) . '" itemprop="item">' . esc_html( $home ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
        
        if( is_home() ){
            
            echo $before . esc_html( single_post_title( '', false ) ) . $after;
            
        }elseif( is_category() ){
            
            $thisCat = get_category( get_query_var( 'cat' ), false );
            
            if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                $p = get_post( $post_page );
                echo ' <a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item">' . esc_html( $p->post_title ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';  
            }
            
            if ( $thisCat->parent != 0 ) echo get_category_parents( $thisCat->parent, TRUE, ' <span class="separator">' . $delimiter . '</span> ' );
            echo $before .  esc_html( single_cat_title( '', false ) ) . $after;
        
        }elseif( is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) ){ //For Woocommerce archive page
        
            $current_term = $GLOBALS['wp_query']->get_queried_object();
            
            if ( wc_get_page_id( 'shop' ) ) { //Displaying Shop link in woocommerce archive page
    			$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                if ( ! $_name ) {
        			$product_post_type = get_post_type_object( 'product' );
        			$_name = $product_post_type->labels->singular_name;
        		}
                echo ' <a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item">' . esc_html( $_name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
    		}

            if( is_product_category() ){
                $ancestors = get_ancestors( $current_term->term_id, 'product_cat' );
                $ancestors = array_reverse( $ancestors );
        		foreach ( $ancestors as $ancestor ) {
        			$ancestor = get_term( $ancestor, 'product_cat' );    
        			if ( ! is_wp_error( $ancestor ) && $ancestor ) {
        				echo ' <a href="' . esc_url( get_term_link( $ancestor ) ) . '">' . esc_html( $ancestor->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
        			}
        		}
            }           
            echo $before . esc_html( $current_term->name ) . $after;
            
        }elseif( is_woocommerce_activated() && is_shop() ){ //Shop Archive page
            if ( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ) {
    			return;
    		}
    		$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
    
    		if ( ! $_name ) {
    			$product_post_type = get_post_type_object( 'product' );
    			$_name = $product_post_type->labels->singular_name;
    		}
            echo $before . esc_html( $_name ) . $after;
            
        }elseif( is_tag() ){
            
            echo $before . esc_html( single_tag_title( '', false ) ) . $after;
     
        }elseif( is_author() ){
            
            global $author;
            $userdata = get_userdata( $author );
            echo $before . esc_html( $userdata->display_name ) . $after;
     
        }elseif( is_search() ){
            
            echo $before . esc_html__( 'Search Results for "', 'blossom-feminine-pro' ) . esc_html( get_search_query() ) . esc_html__( '"', 'blossom-feminine-pro' ) . $after;
        
        }elseif( is_day() ){
            
            echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'blossom-feminine-pro' ) ) ) ) . '" itemprop="item">' . esc_html( get_the_time( __( 'Y', 'blossom-feminine-pro' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            echo '<a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'blossom-feminine-pro' ) ), get_the_time( __( 'm', 'blossom-feminine-pro' ) ) ) ) . '" itemprop="item">' . esc_html( get_the_time( __( 'F', 'blossom-feminine-pro' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            echo $before . esc_html( get_the_time( __( 'd', 'blossom-feminine-pro' ) ) ) . $after;
        
        }elseif( is_month() ){
            
            echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'blossom-feminine-pro' ) ) ) ) . '" itemprop="item">' . esc_html( get_the_time( __( 'Y', 'blossom-feminine-pro' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            echo $before . esc_html( get_the_time( __( 'F', 'blossom-feminine-pro' ) ) ) . $after;
        
        }elseif( is_year() ){
            
            echo $before . esc_html( get_the_time( __( 'Y', 'blossom-feminine-pro' ) ) ) . $after;
    
        }elseif( is_single() && !is_attachment() ){
            
            if( is_woocommerce_activated() && 'product' === get_post_type() ){ //For Woocommerce single product
        		
        		if ( wc_get_page_id( 'shop' ) ) { //Displaying Shop link in woocommerce archive page
	    			$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
	                if ( ! $_name ) {
	        			$product_post_type = get_post_type_object( 'product' );
	        			$_name = $product_post_type->labels->singular_name;
	        		}
	                echo ' <a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item">' . esc_html( $_name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
	    		}
    		
                if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
        			$main_term = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
        			$ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                    $ancestors = array_reverse( $ancestors );
            		foreach ( $ancestors as $ancestor ) {
            			$ancestor = get_term( $ancestor, 'product_cat' );    
            			if ( ! is_wp_error( $ancestor ) && $ancestor ) {
            				echo ' <a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item">' . esc_html( $ancestor->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            			}
            		}
        			echo ' <a href="' . esc_url( get_term_link( $main_term ) ) . '" itemprop="item">' . esc_html( $main_term->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
        		}
                
                echo $before . esc_html( get_the_title() ) . $after;
                
            }elseif ( get_post_type() != 'post' ){
                
                $post_type = get_post_type_object( get_post_type() );
                
                if( $post_type->has_archive == true ){// For CPT Archive Link
                   
                   // Add support for a non-standard label of 'archive_title' (special use case).
                   $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                   printf( '<a href="%1$s" itemprop="item">%2$s</a>', esc_url( get_post_type_archive_link( get_post_type() ) ), $label );
                   echo '<span class="separator">' . esc_html( $delimiter ) . '</span> ';
    
                }
                echo $before . esc_html( get_the_title() ) . $after;
                
            }else{ //For Post
                
                $cat_object       = get_the_category();
                $potential_parent = 0;
                
                if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                    $p = get_post( $post_page );
                    echo ' <a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item">' . esc_html( $p->post_title ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';  
                }
                
                if( is_array( $cat_object ) ){ //Getting category hierarchy if any
        
        			//Now try to find the deepest term of those that we know of
        			$use_term = key( $cat_object );
        			foreach( $cat_object as $key => $object )
        			{
        				//Can't use the next($cat_object) trick since order is unknown
        				if( $object->parent > 0  && ( $potential_parent === 0 || $object->parent === $potential_parent ) ){
        					$use_term = $key;
        					$potential_parent = $object->term_id;
        				}
        			}
                    
        			$cat = $cat_object[$use_term];
              
                    $cats = get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' );
                    $cats = preg_replace( "#^(.+)\s$delimiter\s$#", "$1", $cats ); //NEED TO CHECK THIS
                    echo $cats;
                }
    
                echo $before . esc_html( get_the_title() ) . $after;
                
            }
        
        }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){
            
            $post_type = get_post_type_object(get_post_type());
            if( get_query_var('paged') ){
                echo '<a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '" itemprop="item">' . esc_html( $post_type->label ) . '</a>';
                echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . sprintf( __('Page %s', 'blossom-feminine-pro'), get_query_var('paged') ) . $after;
            }else{
                echo $before . esc_html( $post_type->label ) . $after;
            }
    
        }elseif( is_attachment() ){
            
            $parent = get_post( $post->post_parent );
            $cat = get_the_category( $parent->ID ); 
            if( $cat ){
                $cat = $cat[0];
                echo get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ');
                echo '<a href="' . esc_url( get_permalink( $parent ) ) . '" itemprop="item">' . esc_html( $parent->post_title ) . '</a>' . ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            }
            echo  $before . esc_html( get_the_title() ) . $after;
        
        }elseif( is_page() && !$post->post_parent ){
            
            echo $before . esc_html( get_the_title() ) . $after;
    
        }elseif( is_page() && $post->post_parent ){
            
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            
            while( $parent_id ){
                $page = get_post( $parent_id );
                $breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '" itemprop="item">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse( $breadcrumbs );
            for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                echo $breadcrumbs[$i];
                if ( $i != count( $breadcrumbs ) - 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            }
            echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . esc_html( get_the_title() ) . $after;
        
        }elseif( is_404() ){
            echo $before . esc_html__( '404 Error - Page Not Found', 'blossom-feminine-pro' ) . $after;
        }
        
        if( get_query_var('paged') ) echo __( ' (Page', 'blossom-feminine-pro' ) . ' ' . get_query_var('paged') . __( ')', 'blossom-feminine-pro' );
        
        echo '</div></div><!-- .breadcrumb-wrapper -->';
        
    }
}
endif;
add_action( 'blossom_feminine_pro_top_bar', 'blossom_feminine_pro_breadcrumb', 20 );

if( ! function_exists( 'blossom_feminine_pro_content_start' ) ) :
/**
 * Content Start
*/
function blossom_feminine_pro_content_start(){
    $class         = is_404() ? 'error-holder' : 'row'; 
    $single_layout = get_theme_mod( 'single_post_layout', 'one' );
    $child_theme_support = get_theme_mod( 'child_additional_support', 'default' );
    
    if( is_single() && ( get_post_type() == 'post' ) ){
        if( $single_layout == 'two' ){ 
            echo '<div class="single-post-layout-two">';            	
                blossom_feminine_pro_single_post_thumbnail( $single_layout );
                echo '<div class="text-holder">';
                    blossom_feminine_pro_single_entry_header();
                echo '</div>';                
            echo '</div>';            
        }
    }

    if( $child_theme_support == 'blossom_beauty' ){
        echo '<div class="featured-area">';
            echo '<div class="container">';
                blossom_feminine_pro_featured_section();
            echo '</div>';
        echo '</div>';
    }
    ?>

    <div class="container main-content">
        <?php 
        /**
         * Page Header
         * 
         * @hooked blossom_feminine_pro_featured_section      - 15
         * @hooked blossom_feminine_pro_get_ad_before_posts   - 20
         * @hooked blossom_feminine_pro_get_ad_before_content - 25
        */
        do_action( 'blossom_feminine_pro_featured_section' );
        ?>
        <div id="content" class="site-content">
            <?php 
            if( is_single() && ( get_post_type() == 'post' ) ){
                if( $single_layout == 'four' || $single_layout == 'five' ){
                    echo '<div class="single-post-layout-' . esc_attr( $single_layout ) . '">';
    				blossom_feminine_pro_single_post_thumbnail();
                    if( $single_layout == 'five' ) blossom_feminine_pro_single_entry_header();
                    echo '</div>';                    
                }
            }
            ?>
            <div class="<?php echo esc_attr( $class ); ?>">
    <?php
}
endif;
add_action( 'blossom_feminine_pro_content', 'blossom_feminine_pro_content_start' );

if( ! function_exists( 'blossom_feminine_pro_featured_section' ) ) :
/**
 * Featured Section
*/
function blossom_feminine_pro_featured_section(){ 
    $ed_featured         = get_theme_mod( 'ed_featured_area', true );
    $featured_layout     = get_theme_mod( 'featured_layout', 'one' );
    
    if( ( is_home() || is_front_page() ) && $ed_featured ){ 
        blossom_feminine_pro_get_featured_section( $featured_layout );
    }
}
endif;
add_action( 'blossom_feminine_pro_featured_section', 'blossom_feminine_pro_featured_section', 15 );

function blossom_feminine_pro_top_newsletter(){
    $child_theme_support = get_theme_mod( 'child_additional_support', 'default' );

    if ( is_front_page() && $child_theme_support == 'blossom_diva' )  
            do_action( 'blossom_feminine_pro_newsletter' );
} 
add_action( 'blossom_feminine_pro_featured_section', 'blossom_feminine_pro_top_newsletter', 18 );

if( ! function_exists( 'blossom_feminine_pro_get_ad_before_posts' ) ) :
/**
 * Get AD before posts
*/
function blossom_feminine_pro_get_ad_before_posts(){
    $ed_ad      = get_theme_mod( 'ed_bp_archive_ad' ); //from customizer
    $ad_img     = get_theme_mod( 'bp_archive_ad' ); //from customizer
    $ad_link    = get_theme_mod( 'bp_archive_ad_link' ); //from customizer
    $target     = get_theme_mod( 'open_link_diff_tab_bp_archive', true ) ? 'target="_blank"' : '';
    $ed_ad_code = get_theme_mod( 'ed_bp_archive_ad_code' );
    $ad_code    = get_theme_mod( 'bp_archive_ad_code' ); 
     
    if( $ad_img ){
        $image = wp_get_attachment_image_url( $ad_img, 'full' );
    }else{
        $image = false;
    }
    
    if( $ed_ad && ( is_home() || is_archive() ) && ( $ad_img || ( $ed_ad_code && $ad_code ) ) ) 
    blossom_feminine_pro_get_ad_block( $image, $ad_link, $target, $ad_code, $ed_ad_code );
}
endif;
add_action( 'blossom_feminine_pro_featured_section', 'blossom_feminine_pro_get_ad_before_posts', 20 ); 

if( ! function_exists( 'blossom_feminine_pro_get_ad_before_content' ) ) :
/**
 * Get AD before single content
*/
function blossom_feminine_pro_get_ad_before_content(){
    $ed_ad      = get_theme_mod( 'ed_bc_post_ad' ); //from customizer
    $ad_img     = get_theme_mod( 'bc_post_ad' ); //from customizer
    $ad_link    = get_theme_mod( 'bc_post_ad_link' ); //from customizer
    $target     = get_theme_mod( 'open_link_diff_tab_bc_post', true ) ? 'target="_blank"' : '';
    $ed_ad_code = get_theme_mod( 'ed_bc_post_ad_code' );
    $ad_code    = get_theme_mod( 'bc_post_ad_code' ); 
     
    if( $ad_img ){
        $image = wp_get_attachment_image_url( $ad_img, 'full' );
    }else{
        $image = false;
    }
    
    if( $ed_ad && ( is_single() ) && ( $ad_img || ( $ed_ad_code && $ad_code ) ) ) 
    blossom_feminine_pro_get_ad_block( $image, $ad_link, $target, $ad_code, $ed_ad_code );
}
endif;
add_action( 'blossom_feminine_pro_featured_section', 'blossom_feminine_pro_get_ad_before_content', 25 );

if( ! function_exists( 'blossom_feminine_pro_post_thumbnail' ) ) :
/**
 * Post Featured Image
*/
function blossom_feminine_pro_post_thumbnail(){ 
    $image_size  = 'thumbnail';
    $home_layout = get_theme_mod( 'home_layout', 'one-col-right' );
    $sidebar     = blossom_feminine_pro_sidebar( true );
    $ed_featured = get_theme_mod( 'ed_featured_image', true );
    $child_theme_support = get_theme_mod( 'child_additional_support', 'default' );

    $diva_col = (  $child_theme_support == "blossom_diva") ? 'blossom-feminine-diva-home' : 'blossom-feminine-cat';
    $diva_home = (  $child_theme_support == "blossom_diva") ? 'blossom-feminine-diva-home' : 'blossom-feminine-home' ;
    
    if( is_home() ){
        if( $home_layout == 'three-col-masonry' ){
            $image_size = 'blossom-feminine-cat';
        }elseif( is_sticky() ){
            if( $home_layout == 'one-col' || $home_layout == 'one-col-alt' || $home_layout == 'one-col-small' || $home_layout == 'three-col' || $home_layout == 'three-col-inside' ){
                $image_size = 'blossom-feminine-featured';
            }else{
                $image_size = 'blossom-feminine-with-sidebar';
            }                                                             
        }elseif( $home_layout == 'three-col' || $home_layout == 'two-col-right' || $home_layout == 'two-col-left' ){
            $image_size = $diva_col;
        }elseif( $home_layout == 'one-col-small' || $home_layout == 'one-col-small-right' || $home_layout == 'one-col-small-left' ){
            $image_size = 'blossom-feminine-related';
        }elseif( $home_layout == 'two-col-inside-right' || $home_layout == 'two-col-inside-left' || $home_layout == 'three-col-inside' ){
            $image_size = $diva_home;
        }else{
            $image_size = 'blossom-feminine-blog';
        }
        echo '<div class="img-holder"><a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
        if( has_post_thumbnail() ){
            the_post_thumbnail( $image_size );    
        }else{
            blossom_feminine_pro_get_fallback_svg( $image_size );
        }
        echo '</a></div>';
    }elseif( is_archive() || is_search() ){
        $image_size = 'blossom-feminine-cat';
        echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
        if( has_post_thumbnail() ){
            the_post_thumbnail( $image_size );    
        }else{
            blossom_feminine_pro_get_fallback_svg( $image_size );
        }
        
        echo '</a>';
    }elseif( is_page() && $ed_featured ){
        $image_size = $sidebar ? 'blossom-feminine-with-sidebar' : 'blossom-feminine-featured';
        echo '<div class="post-thumbnail">';
        if( has_post_thumbnail() ){
            the_post_thumbnail( $image_size );    
        }
        echo '</div>';
    }
}
endif;
add_action( 'blossom_feminine_pro_before_entry_content', 'blossom_feminine_pro_post_thumbnail' );

if( ! function_exists( 'blossom_feminine_pro_entry_header' ) ) :
/**
 * Entry Header
*/
function blossom_feminine_pro_entry_header(){ ?>
    <header class="entry-header">
    <?php 
        $home_arr      = array( 'two-col-right', 'two-col-left', 'three-col', 'three-col-masonry', 'two-col-inside-right', 'two-col-inside-left', 'three-col-inside' );
        $home_array    = array( 'one-col-right', 'one-col-left', 'one-col', 'one-col-alt-right', 'one-col-alt-left', 'one-col-alt', 'one-col-small-right', 'one-col-small-left', 'one-col-small' );
        $home_arrr     = array( 'one-col-small-right', 'one-col-small-left', 'one-col-small' );
        $home_layout   = get_theme_mod( 'home_layout', 'one-col-right' );
        $sticky_layout = get_theme_mod( 'sticky_post_layout', 'one' );
        
        if( is_archive() || is_search() ) echo '<div class="top">'; 
        
        blossom_feminine_pro_categories();
        
        /**
         * Social sharing in archive.
        */
        if( (in_array( $home_layout, $home_arr ) || ( is_archive() && in_array( $home_layout, $home_array ) ) ) && ( ! is_sticky() || ( is_sticky() && $home_layout == 'three-col-masonry') ) ) do_action( 'blossom_feminine_pro_social_sharing' );
            
        if( is_archive() || is_search() ) echo '</div>';
        
        the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );    
        
		if( 'post' === get_post_type() && ( ( is_sticky() && in_array( $home_layout, $home_arrr ) ) || ! in_array( $home_layout, $home_arrr ) || ( is_archive() && in_array( $home_layout, $home_arrr ) ) ) ){ 
            echo '<div class="entry-meta">';
            blossom_feminine_pro_posted_by();
            blossom_feminine_pro_posted_on();
            blossom_feminine_pro_comment_count();
            /**
             * Social sharing in archive.
            */
            if( is_sticky() && $sticky_layout == 'two' && $home_layout !== 'three-col-masonry' ) do_action( 'blossom_feminine_pro_social_sharing' );
            echo '</div><!-- .entry-meta -->';		
		}
        ?>
	</header><!-- .entry-header home-->
    <?php
}
endif;
add_action( 'blossom_feminine_pro_entry_content', 'blossom_feminine_pro_entry_header', 15 );

if( ! function_exists( 'blossom_feminine_pro_social_share' ) ) :
/**
 * Social Sharing
*/
function blossom_feminine_pro_social_share(){ 
    $ed_share = get_theme_mod( 'ed_social_sharing', true );
    $shares   = get_theme_mod( 'social_share', array( 'facebook', 'twitter', 'pinterest', 'gplus' ) );
    $class    = is_single() ? 'social-share' : 'share'; 
    if( $ed_share && $shares ){
    ?>
    <div class="<?php echo esc_attr( $class ); ?>">
		<i class="fa fa-share-alt"></i><?php esc_html_e( 'Share', 'blossom-feminine-pro' ); ?>
		<div class="social-networks">
			<ul>
				<?php 
                foreach( $shares as $share ){
                    blossom_feminine_pro_get_social_share( $share );
                }
                ?>
			</ul>
		</div>
	</div>
    <?php
    }
}
endif;
add_action( 'blossom_feminine_pro_social_sharing', 'blossom_feminine_pro_social_share' );

if( ! function_exists( 'blossom_feminine_pro_entry_content' ) ) :
/**
 * Entry Content
*/
function blossom_feminine_pro_entry_content(){
    $ed_excerpt = get_theme_mod( 'ed_excerpt', true ); ?>
    
    <div class="entry-content" itemprop="text">
		<?php 
        if( is_page() ) echo '<div class="text">';
        
        if( is_page() || ! $ed_excerpt || ( get_post_format() != false ) ){
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'blossom-feminine-pro' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blossom-feminine-pro' ),
				'after'  => '</div>',
			) );
        }else{
            the_excerpt();
        }
		
        if( is_page() ) echo '</div>';
        ?>
	</div><!-- .entry-content -->      
    <?php
}
endif;
add_action( 'blossom_feminine_pro_page_entry_content', 'blossom_feminine_pro_entry_content', 15 );
add_action( 'blossom_feminine_pro_entry_content', 'blossom_feminine_pro_entry_content', 20 );

if( ! function_exists( 'blossom_feminine_pro_entry_footer' ) ) :
/**
 * Entry Footer
*/
function blossom_feminine_pro_entry_footer(){ 
    $child_theme_support = get_theme_mod( 'child_additional_support', 'default' );
    $readmore = get_theme_mod( 'read_more_text', __( 'Read More', 'blossom-feminine-pro' ) );
    $home_ar       = array( 'one-col-small-right', 'one-col-small-left', 'one-col-small' );
    $home_layout   = get_theme_mod( 'home_layout', 'one-col-right' );
    $sticky_layout = get_theme_mod( 'sticky_post_layout', 'one' ); 

    if ( $child_theme_support == "blossom_diva" ){
       $home_arr      = array( 'one-col-right', 'one-col-left', 'one-col', 'one-col-alt-right', 'one-col-alt-left', 'one-col-alt', 'two-col-right', 'two-col-left', 'three-col' ); 
   }else {
        $home_arr      = array( 'one-col-right', 'one-col-left', 'one-col', 'one-col-alt-right', 'one-col-alt-left', 'one-col-alt' ); 
   }

    ?>
    <footer class="entry-footer">
    <?php 
        if( is_home() && ( in_array( $home_layout, $home_arr ) || ( is_sticky() && $sticky_layout == 'one' && $home_layout !== 'three-col-masonry' ) ) ){
            if( $readmore ){ ?>
                <a href="<?php the_permalink(); ?>" class="btn-readmore"><?php 
                    if ( $child_theme_support == 'blossom_beauty' ){ ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 30 10">
                            <g id="arrow" transform="translate(-10)">
                                <path id="Path_16" data-name="Path 16" d="M24.5,44.974H46.613L44.866,40.5a34.908,34.908,0,0,0,9.634,5,34.908,34.908,0,0,0-9.634,5l1.746-4.474H24.5Z" transform="translate(-14.5 -40.5)"/>
                            </g>
                        </svg>
            <?php   }else{
                         echo esc_html( $readmore ); 
                    } ?>

                </a>
        <?php    
            }
            
            /**
             * Social sharing in home page
            */
            do_action( 'blossom_feminine_pro_social_sharing' );
        }
        
        if( 'post' === get_post_type() && ( in_array( $home_layout, $home_ar ) ) && ! is_sticky() && !is_archive() ){ 
            echo '<div class="entry-meta">';
            blossom_feminine_pro_posted_by();
            blossom_feminine_pro_posted_on();
            blossom_feminine_pro_comment_count();
            /**
             * Social sharing in archive.
            */
            do_action( 'blossom_feminine_pro_social_sharing' );
            echo '</div><!-- .entry-meta -->';		
		}
         
        //edit post link
        blossom_feminine_pro_edit_post_link(); 
    ?>
	</footer><!-- .entry-footer home-->
    <?php
}
endif;
add_action( 'blossom_feminine_pro_page_entry_content', 'blossom_feminine_pro_entry_footer', 20 );
add_action( 'blossom_feminine_pro_entry_content', 'blossom_feminine_pro_entry_footer', 25 );

if( ! function_exists( 'blossom_feminine_pro_get_ad_after_content' ) ) :
/**
 * Get AD after single content
*/
function blossom_feminine_pro_get_ad_after_content(){
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
    
    if( $ed_ad && ( is_single() ) && ( $ad_img || ( $ed_ad_code && $ad_code ) ) ) 
    blossom_feminine_pro_get_ad_block( $image, $ad_link, $target, $ad_code, $ed_ad_code );
}
endif;
add_action( 'blossom_feminine_pro_after_post_content', 'blossom_feminine_pro_get_ad_after_content', 10 );

if( ! function_exists( 'blossom_feminine_pro_author' ) ) :
/**
 * Author Details
*/
function blossom_feminine_pro_author(){
    $ed_author = get_theme_mod( 'ed_author' );
    if( ! $ed_author && get_the_author_meta( 'description' ) ){ ?>
    <div class="author-section">
		<div class="img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?></div>
		<div class="text-holder">
			<h2 class="title"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h2>				
			<?php echo wpautop( wp_kses_post( get_the_author_meta( 'description' ) ) ); ?>            
		</div>
	</div>
    <?php
    }
}
endif;
add_action( 'blossom_feminine_pro_after_post_content', 'blossom_feminine_pro_author', 15 );

if( ! function_exists( 'blossom_feminine_pro_navigation' ) ) :
/**
 * Post Navigation
*/
function blossom_feminine_pro_navigation(){
    if( is_single() ){ 
       $previous = get_previous_post_link(
    		'<div class="nav-previous nav-holder">%link</div>',
    		'<span class="meta-nav">' . esc_html__( 'Previous Article', 'blossom-feminine-pro' ) . '</span><span class="post-title">%title</span>',
    		false,
    		'',
    		'category'
    	);
    
    	$next = get_next_post_link(
    		'<div class="nav-next nav-holder">%link</div>',
    		'<span class="meta-nav">' . esc_html__( 'Next Article', 'blossom-feminine-pro' ) . '</span><span class="post-title">%title</span>',
    		false,
    		'',
    		'category'
    	); 
        
        if( $previous || $next ){?>            
            <nav class="navigation post-navigation" role="navigation">
    			<h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'blossom-feminine-pro' ); ?></h2>
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
                'prev_text'          => __( '<i class="fa fa-angle-left"></i>', 'blossom-feminine-pro' ),
                'next_text'          => __( '<i class="fa fa-angle-right"></i>', 'blossom-feminine-pro' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'blossom-feminine-pro' ) . ' </span>',
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
add_action( 'blossom_feminine_pro_after_post_content', 'blossom_feminine_pro_navigation', 25 );
add_action( 'blossom_feminine_pro_after_content', 'blossom_feminine_pro_navigation' );

if( ! function_exists( 'blossom_feminine_pro_related_posts' ) ) :
/**
 * Related Posts
*/
function blossom_feminine_pro_related_posts(){ 
    $ed_related_post = get_theme_mod( 'ed_related', true );
    $ed_popular_post = get_theme_mod( 'ed_popular', true );
    if( $ed_related_post ) blossom_feminine_pro_related_popular_post();
    if( $ed_popular_post ) blossom_feminine_pro_related_popular_post( false );
}
endif;
add_action( 'blossom_feminine_pro_after_post_content', 'blossom_feminine_pro_related_posts', 30 );

if( ! function_exists( 'blossom_feminine_pro_comment' ) ) :
/**
 * Comments 
*/
function blossom_feminine_pro_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
	if( get_theme_mod( 'ed_comments', true ) && ( comments_open() || get_comments_number() ) ) :
		comments_template();
	endif;
}
endif;
add_action( 'blossom_feminine_pro_after_post_content', 'blossom_feminine_pro_comment', 35 );
add_action( 'blossom_feminine_pro_after_page_content', 'blossom_feminine_pro_comment' );

if( ! function_exists( 'blossom_feminine_pro_content_end' ) ) :
/**
 * Content End
*/
function blossom_feminine_pro_content_end(){ 
    $child_theme_support = get_theme_mod( 'child_additional_support', 'default' );
    ?>
            </div><!-- .row/not-found -->
        </div><!-- #content -->
        <?php
        /**
         * After Posts AD
         * @hooked blossom_feminine_pro_get_ad_after_posts
        */
        do_action( 'blossom_feminine_pro_after_posts_ad' );
        
        /**
         * @hooked blossom_feminine_pro_newsletter 
        */
        if ( ! is_single() && !( $child_theme_support == 'blossom_diva' || $child_theme_support == 'blossom_beauty' ) )  
            do_action( 'blossom_feminine_pro_newsletter' );
        ?>
    </div><!-- .container/.main-content -->
    <?php
}
endif;
add_action( 'blossom_feminine_pro_before_footer', 'blossom_feminine_pro_content_end', 20 );

if( ! function_exists( 'blossom_feminine_pro_get_ad_after_posts' ) ) :
/**
 * Get AD after posts
*/
function blossom_feminine_pro_get_ad_after_posts(){
    $ed_ad      = get_theme_mod( 'ed_ap_archive_ad' ); //from customizer
    $ad_img     = get_theme_mod( 'ap_archive_ad' ); //from customizer
    $ad_link    = get_theme_mod( 'ap_archive_ad_link' ); //from customizer
    $target     = get_theme_mod( 'open_link_diff_tab_ap_archive', true ) ? 'target="_blank"' : '';
    $ed_ad_code = get_theme_mod( 'ed_ap_archive_ad_code' );
    $ad_code    = get_theme_mod( 'ap_archive_ad_code' ); 
     
    if( $ad_img ){
        $image = wp_get_attachment_image_url( $ad_img, 'full' );
    }else{
        $image = false;
    }
    
    if( $ed_ad && ( is_home() || is_archive() ) && ( $ad_img || ( $ed_ad_code && $ad_code ) ) ) 
    blossom_feminine_pro_get_ad_block( $image, $ad_link, $target, $ad_code, $ed_ad_code );
}
endif;
add_action( 'blossom_feminine_pro_after_posts_ad', 'blossom_feminine_pro_get_ad_after_posts' );

if( ! function_exists( 'blossom_feminine_pro_newsletter' ) ) :
/**
 * Blossom Newsletter
*/
function blossom_feminine_pro_newsletter(){
    $ed_newsletter = get_theme_mod( 'ed_newsletter', false );
    $newsletter = get_theme_mod( 'newsletter_shortcode' );
    $child_theme_support = get_theme_mod( 'child_additional_support', 'default' ); 
    if( $ed_newsletter && !empty( $newsletter ) ){
        if ( $child_theme_support == 'blossom_beauty' ) echo '<div class="newletter-section">';
        echo '<div class="content-newsletter">';
        echo do_shortcode( $newsletter );   
        echo '</div>';
        if ( $child_theme_support == 'blossom_beauty' ) echo '</div>';            
    }
}
endif;
add_action( 'blossom_feminine_pro_newsletter', 'blossom_feminine_pro_newsletter' );
add_action( 'blossom_feminine_pro_after_post_content', 'blossom_feminine_pro_newsletter', 20 );



if( ! function_exists( 'blossom_feminine_pro_instagram_gallery' ) ) :
/**
 * Instagram Gallery
*/
function blossom_feminine_pro_instagram_gallery(){
    if( is_btif_activated() ){
        $ed_instagram = get_theme_mod( 'ed_instagram', false );
        $instagram_title = get_theme_mod( 'instagram_title', __( 'FOLLOW ALONG', 'blossom-feminine-pro' ) );
        $child_theme_support = get_theme_mod( 'child_additional_support', 'default' );
        if( $ed_instagram ){
            echo '<div class="content-instagram">';
            if ( ( $child_theme_support == "blossom_beauty" || $child_theme_support == "blossom_diva" ) && $instagram_title)  echo '<span class="insta-title">' . esc_html( $instagram_title ) . '</span>';
            echo do_shortcode( '[blossomthemes_instagram_feed]' );
            echo '</div>';    
        }
    }
}
endif;
add_action( 'blossom_feminine_pro_above_footer', 'blossom_feminine_pro_instagram_gallery', 15 );

if( ! function_exists( 'blossom_feminine_pro_newsletter_beauty' ) ) :
/**
 * Newsletter
*/
function blossom_feminine_pro_newsletter_beauty(){
    $child_theme_support = get_theme_mod( 'child_additional_support', 'default' );
    if( ! is_single() && $child_theme_support == 'blossom_beauty' ) {
        blossom_feminine_pro_newsletter();
    }
}
endif;
add_action( 'blossom_feminine_pro_above_footer', 'blossom_feminine_pro_newsletter_beauty', 20 );

if( ! function_exists( 'blossom_feminine_pro_footer_start' ) ) :
/**
 * Footer Start
*/
function blossom_feminine_pro_footer_start(){
    ?>
    <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
    <?php
}
endif;
add_action( 'blossom_feminine_pro_footer', 'blossom_feminine_pro_footer_start', 20 );

if( ! function_exists( 'blossom_feminine_pro_footer_top' ) ) :
/**
 * Footer Top
*/
function blossom_feminine_pro_footer_top(){    
    $footer_sidebars = array( 'footer-one', 'footer-two', 'footer-three', 'footer-four' );
    $active_sidebars = array();
    $sidebar_count   = 0;
    
    foreach ( $footer_sidebars as $sidebar ) {
        if( is_active_sidebar( $sidebar ) ){
            array_push( $active_sidebars, $sidebar );
            $sidebar_count++ ;
        }
    } 
    
    if( $active_sidebars ){ ?>
                               
    <div class="footer-t">
		<div class="container">
			<div class="row column-<?php echo esc_attr( $sidebar_count ); ?>">
            <?php foreach( $active_sidebars as $active ){ ?>
                <div class="col">
                   <?php dynamic_sidebar( $active ); ?> 
                </div>
            <?php } ?>
            </div>
		</div>
	</div>
    <?php 
    }   
}
endif;
add_action( 'blossom_feminine_pro_footer', 'blossom_feminine_pro_footer_top', 30 );

if( ! function_exists( 'blossom_feminine_pro_footer_bottom' ) ) :
/**
 * Footer Bottom
*/
function blossom_feminine_pro_footer_bottom(){ ?>
    <div class="site-info">
		<div class="container">
			<?php
                blossom_feminine_pro_get_footer_copyright();                
                blossom_feminine_pro_ed_author_link();                
                blossom_feminine_pro_ed_wp_link();
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link();
                }
            ?>                    
		</div>
	</div>
    <?php
}
endif;
add_action( 'blossom_feminine_pro_footer', 'blossom_feminine_pro_footer_bottom', 40 );

if( ! function_exists( 'blossom_feminine_pro_footer_end' ) ) :
/**
 * Footer End 
*/
function blossom_feminine_pro_footer_end(){
    ?>
    </footer><!-- #colophon -->
    <?php
}
endif;
add_action( 'blossom_feminine_pro_footer', 'blossom_feminine_pro_footer_end', 50 );

if( ! function_exists( 'blossom_feminine_pro_back_to_top' ) ) :
/**
 * Back to top
*/
function blossom_feminine_pro_back_to_top(){ ?>
    <div id="blossom-top">
		<span><i class="fa fa-angle-up"></i><?php esc_html_e( 'TOP', 'blossom-feminine-pro' ); ?></span>
	</div>
    <?php
}
endif;
add_action( 'blossom_feminine_pro_after_footer', 'blossom_feminine_pro_back_to_top', 15 );

if( ! function_exists( 'blossom_feminine_pro_page_end' ) ) :
/**
 * Page End
*/
function blossom_feminine_pro_page_end(){
    ?>
    </div><!-- #page -->
    <?php
}
endif;
add_action( 'blossom_feminine_pro_after_footer', 'blossom_feminine_pro_page_end', 20 );

if( ! function_exists( 'blossom_feminine_pro_child_theme_action' ) ) :
/**
 * Removing or Adding action based on child theme
*/
function blossom_feminine_pro_child_theme_action(){ 
    $child_theme = get_theme_mod( 'child_additional_support', 'default' );
    if( $child_theme == 'blossom_beauty' ) {
        remove_action( 'blossom_feminine_pro_featured_section', 'blossom_feminine_pro_featured_section', 15 );
        // if( ! is_single() ) {
        //     add_action( 'blossom_feminine_pro_footer', 'blossom_feminine_pro_newsletter', 18 );
        // }
    }
}
endif;
add_action( 'init', 'blossom_feminine_pro_child_theme_action' );