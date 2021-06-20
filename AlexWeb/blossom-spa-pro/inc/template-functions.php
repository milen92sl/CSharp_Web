<?php
/**
 * Blossom Spa Pro Template Functions which enhance the theme by hooking into WordPress
 *
 * @package Blossom_Spa_Pro
 */

if( ! function_exists( 'blossom_spa_pro_doctype' ) ) :
/**
 * Doctype Declaration
*/
function blossom_spa_pro_doctype(){ ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;
add_action( 'blossom_spa_pro_doctype', 'blossom_spa_pro_doctype' );

if( ! function_exists( 'blossom_spa_pro_head' ) ) :
/**
 * Before wp_head 
*/
function blossom_spa_pro_head(){ ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
}
endif;
add_action( 'blossom_spa_pro_before_wp_head', 'blossom_spa_pro_head' );

if( ! function_exists( 'blossom_spa_pro_page_start' ) ) :
/**
 * Page Start
*/
function blossom_spa_pro_page_start(){ ?>
    <div id="page" class="site">
    <?php
}
endif;
add_action( 'blossom_spa_pro_before_header', 'blossom_spa_pro_page_start', 20 );

if( ! function_exists( 'blossom_spa_pro_responsive_nav' ) ) :
/**
 * Responsive Navigation
*/
function blossom_spa_pro_responsive_nav(){ ?>
    <div class="responsive-nav">
        <?php blossom_spa_pro_primary_nagivation(); ?>
        <?php blossom_spa_pro_social_links(); ?>
        <?php blossom_spa_pro_header_contact(); ?>
    </div> <!-- .responsive-nav -->
    <?php
}
endif;
add_action( 'blossom_spa_pro_header', 'blossom_spa_pro_responsive_nav', 10 );

if( ! function_exists( 'blossom_spa_pro_search_form_wrap' ) ) :
/**
 * Responsive Navigation
*/
function blossom_spa_pro_search_form_wrap(){ 
    $header_search = get_theme_mod( 'ed_header_search', true ); 
    if( $header_search ) : ?>
        <div class="search-form-wrap">
            <div class="search-form-inner">
                <?php get_search_form(); ?>
                <span class="close"></span>
            </div>
        </div>
    <?php
    endif;
}
endif;
add_action( 'blossom_spa_pro_header', 'blossom_spa_pro_search_form_wrap', 15 );

if( ! function_exists( 'blossom_spa_pro_header' ) ) :
/**
 * Header Start
*/
function blossom_spa_pro_header(){ 

    $header_array = array( 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight' );
    $header = get_theme_mod( 'header_layout', 'one' );
    if( in_array( $header, $header_array ) ){            
        get_template_part( 'headers/' . $header );
    }
}
endif;
add_action( 'blossom_spa_pro_header', 'blossom_spa_pro_header', 20 );

if( ! function_exists( 'blossom_spa_pro_show_banner' ) ) :
/**
 * Display Banner section in Show banner when disable all section feature is enable
*/
function blossom_spa_pro_show_banner(){
    global $post;
    $disable_all_section = get_theme_mod( 'disable_all_section', false );
    $ed_banner           = get_theme_mod( 'ed_banner_section', 'slider_banner' );
    $page_on_front       = get_option( 'page_on_front');
    if( $disable_all_section && $ed_banner && $page_on_front == $post->ID )
    get_template_part( 'sections/banner' );
}
endif;
add_action( 'blossom_spa_pro_after_header', 'blossom_spa_pro_show_banner' );

if( ! function_exists( 'blossom_spa_pro_content_start' ) ) :
/**
 * Content Start
 *  
*/
function blossom_spa_pro_content_start(){       
    $home_sections  = blossom_spa_pro_get_home_sections();
    $ed_cat_single  = get_theme_mod( 'ed_category', false );
    $ed_post_date   = get_theme_mod( 'ed_post_date', false );
    $ed_post_author = get_theme_mod( 'ed_post_author', false ); 
    $single_layout  = get_theme_mod( 'single_layout', 'one' );
    $ed_prefix      = get_theme_mod( 'ed_prefix_archive', false );
    $ed_comments    = get_theme_mod( 'ed_comments', false );
    $page_id = get_option( 'page_for_posts' );
    $blog_background_image = get_the_post_thumbnail_url( $page_id, 'blossom-spa-single' );
    
    if( is_singular() ) {
        $background_image = blossom_spa_pro_singular_post_thumbnail();
    }elseif( !( is_front_page() && ! is_home() ) && $blog_background_image ){
        $background_image = $blog_background_image;
    }else{
        $background_image = get_theme_mod( 'header_background_image', get_template_directory_uri() .'/images/header-bg.jpg' );
    }

    if( ! ( is_front_page() && ! is_home() && $home_sections ) ){ //Make necessary adjust for pg template.
        echo '<div id="content" class="site-content">'; 
        if( !( is_woocommerce_activated() && is_product() ) ) : ?>
            <header class="page-header" style="background-image: url( '<?php echo esc_url( $background_image ); ?>' );">
                <div class="container">
        			<?php        
                        if ( is_home() && ! is_front_page() ){ 
                            echo '<h1 class="page-title">';
                			single_post_title();
                            echo '</h1>';
                        }
                        
                        if( is_archive() ) :
                            if( is_author() ){
                                $author_title = get_the_author_meta( 'display_name' );
                                $author_description = get_the_author_meta( 'description' ); ?>
                                <div class="author-section">
                                    <figure class="author-img"><?php echo get_avatar( get_the_author_meta( 'ID' ), 230 ); ?></figure>
                                    <div class="author-content-wrap">
                                        <?php 
                                            echo '<h3 class="author-name">' . esc_html__( 'All Posts By: ','blossom-spa-pro' ) . esc_html( $author_title ) . '</h3>';
                                            echo '<div class="author-content">' . wpautop( wp_kses_post( $author_description ) ) . '</div>';
                                            blossom_spa_pro_author_social();
                                        ?>      
                                    </div>
                                </div>
                                <?php 
                            }
                            else{
                                if( is_category() ){
                                    if( ! $ed_prefix ) echo '<span class="sub-title">'. esc_html__( 'CATEGORY','blossom-spa-pro' ) . '</span>';
                                    echo '<h1 class="page-title"><span>' . esc_html( single_cat_title( '', false ) ) . '</span></h1>';
                                }
                                elseif( is_tag() ){
                                    if( ! $ed_prefix ) echo '<span class="sub-title">'. esc_html__( 'TAGS','blossom-spa-pro' ) . '</span>';
                                    echo '<h1 class="page-title"><span>' . esc_html( single_tag_title( '', false ) ) . '</span></h1>';
                                }
                                else{
                                    the_archive_title( '<h1 class="page-title"><span>', '</span></h1>' );
                                }
                                the_archive_description( '<div class="archive-description">', '</div>' );
                            }
                        endif;
                        
                        if( is_search() ){ 
                            global $wp_query;
                            echo '<h1 class="page-title">' . esc_html__( 'SEARCH RESULTS FOR:', 'blossom-spa-pro' ) . '</h1>';
                            get_search_form();
                        }
                        
                        if( is_singular() ){
                            
                            if( is_single() ){
                                if( ! $ed_cat_single ) blossom_spa_pro_category();
                            }
                            
                            the_title( '<h1 class="page-title">', '</h1>' );
                            
                            if( 'post' === get_post_type() && is_single() && $single_layout == 'one' ){
                                echo '<div class="entry-meta">';
                                if( ! $ed_post_author ) blossom_spa_pro_posted_by();
                                if( ! $ed_post_date ) blossom_spa_pro_posted_on();
                                if( ! $ed_comments ) blossom_spa_pro_comment_count();
                                echo '</div>';
                            }

                        }
                        if( is_404() ) {
                            echo '<h1 class="page-title">' . esc_html__( 'Uh-Oh...','blossom-spa-pro' ) .'</h1>';
                        }
                        if( is_page() || is_404() ) {
                            blossom_spa_pro_breadcrumb();
                        }
                    ?>
                </div>
    		</header><!-- .page-header -->
        <?php endif; ?>
            <div class="container">
        <?php
    }
}
endif;
add_action( 'blossom_spa_pro_content', 'blossom_spa_pro_content_start' );

if( ! function_exists( 'blossom_spa_pro_posts_per_page_count' ) ):
/**
*   Counts the Number of total posts in Archive, Search and Author
*/
function blossom_spa_pro_posts_per_page_count(){
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

                printf( esc_html__( '%1$s Showing:  %2$s - %3$s of %4$s RESULTS %5$s', 'blossom-spa-pro' ), '<div class="showing-result">', absint( $start_post_number ), absint( $end_post_number ), esc_html( number_format_i18n( $wp_query->found_posts ) ), '</div>' );
            endif;
        else :
            printf( esc_html__( '%1$s Showing: %2$s RESULTS %3$s', 'blossom-spa-pro' ), '<div class="showing-result">', esc_html( number_format_i18n( $wp_query->found_posts ) ), '</div>' );
        endif;
    }
}
endif; 
add_action( 'blossom_spa_pro_before_posts_content' , 'blossom_spa_pro_posts_per_page_count', 10 );

if ( ! function_exists( 'blossom_spa_pro_figure_content' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function blossom_spa_pro_figure_content() {
    if( is_single() ) return false;
    echo '<figure class="post-thumbnail">';
        blossom_spa_pro_post_thumbnail();
        blossom_spa_pro_category();
        blossom_spa_pro_posted_by();
    echo '</figure>';

}
endif;
add_action( 'blossom_spa_pro_before_post_entry_content', 'blossom_spa_pro_figure_content', 20 );


if( ! function_exists( 'blossom_spa_pro_entry_header' ) ) :
/**
 * Entry Header
*/
function blossom_spa_pro_entry_header(){ 
    if( is_single() ) return false; ?>
    <div class="content-wrap">
        <header class="entry-header">
            <?php                 
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            
                if( 'post' === get_post_type() ){
                    echo '<div class="entry-meta">';
                    blossom_spa_pro_posted_on();
                    blossom_spa_pro_comment_count();
                    echo '</div>';
                }       
            ?>
        </header>         
    <?php    
}
endif;
add_action( 'blossom_spa_pro_post_entry_content', 'blossom_spa_pro_entry_header', 10 );

if( ! function_exists( 'blossom_spa_pro_entry_content' ) ) :
/**
 * Entry Content
*/
function blossom_spa_pro_entry_content(){ 
    $ed_excerpt = get_theme_mod( 'ed_excerpt', true ); ?>
    <div class="entry-content" itemprop="text">
		<?php
			if( is_singular() || ! $ed_excerpt || ( get_post_format() != false ) ){
                the_content();    
    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blossom-spa-pro' ),
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
add_action( 'blossom_spa_pro_page_entry_content', 'blossom_spa_pro_entry_content', 15 );
add_action( 'blossom_spa_pro_post_entry_content', 'blossom_spa_pro_entry_content', 15 );

if( ! function_exists( 'blossom_spa_pro_entry_footer' ) ) :
/**
 * Entry Footer
*/
function blossom_spa_pro_entry_footer(){ 
        $readmore = get_theme_mod( 'read_more_text', __( 'Read More', 'blossom-spa-pro' ) ); ?>
    	<footer class="entry-footer">
    		<?php
    			if( is_single() ){
    			    blossom_spa_pro_tag();
    			}

                if( is_home() || is_archive() || is_search() ){
                    echo '<a href="' . esc_url( get_the_permalink() ) . '" class="btn-readmore">' . esc_html( $readmore ) . '</a>';
                }
                
                if( get_edit_post_link() ){
                    edit_post_link(
    					sprintf(
    						wp_kses(
    							/* translators: %s: Name of current post. Only visible to screen readers */
    							__( 'Edit <span class="screen-reader-text">%s</span>', 'blossom-spa-pro' ),
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
    <?php if( is_home() ) echo '</div><!-- .content-wrap -->'; 
}
endif;
add_action( 'blossom_spa_pro_page_entry_content', 'blossom_spa_pro_entry_footer', 20 );
add_action( 'blossom_spa_pro_post_entry_content', 'blossom_spa_pro_entry_footer', 20 );

if( ! function_exists( 'blossom_spa_pro_article_share' ) ) :
/**
 * Author Section
*/
function blossom_spa_pro_article_share(){ 
    
    $ed_sharing     = get_theme_mod( 'ed_social_sharing', true );
    $social_share   = get_theme_mod( 'social_share', array( 'facebook', 'twitter', 'pinterest', 'gplus' ) );
    $single_layout  = get_theme_mod( 'single_layout', 'one' );
    $ed_post_date   = get_theme_mod( 'ed_post_date', false );
    $ed_post_author = get_theme_mod( 'ed_post_author', false );
    $ed_comments    = get_theme_mod( 'ed_comments', false );
    $ed_single_like = get_theme_mod( 'ed_single_like', true );
    
    if( is_single() && ( ( $ed_sharing && $social_share ) || $ed_single_like ) ) { ?>
        <div class="article-meta">
            <?php if( 'post' === get_post_type() && $single_layout == 'two' ){
                if( ! $ed_post_author ) blossom_spa_pro_posted_by();
                if( ! $ed_post_date ) blossom_spa_pro_posted_on();
                if( ! $ed_comments ) blossom_spa_pro_comment_count();
            }
            
            blossom_spa_pro_single_like_count();            
            blossom_spa_pro_social_share(); ?>
        </div>
    <?php
    }
}
endif;
add_action( 'blossom_spa_pro_before_post_entry_content', 'blossom_spa_pro_article_share', 10 );

if( ! function_exists( 'blossom_spa_pro_author' ) ) :
/**
 * Author Section
*/
function blossom_spa_pro_author(){ 
    $ed_author    = get_theme_mod( 'ed_author', false );
    $author_title = get_the_author();
    if( ! $ed_author && get_the_author_meta( 'description' ) ){ ?>
    <div class="author-section">
        <figure class="author-img"><?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?></figure>
        <div class="author-content-wrap">
            <?php 
                if( $author_title ) echo '<h3 class="author-name"><span>' . esc_html( $author_title ) . '</span></h3>';
                echo '<div class="author-content">' . wpautop( wp_kses_post( get_the_author_meta( 'description' ) ) ) . '</div>';
                blossom_spa_pro_author_social();
            ?>      
        </div>
    </div>
    <?php
    }
}
endif;
add_action( 'blossom_spa_pro_after_post_content', 'blossom_spa_pro_author', 15 );

if( ! function_exists( 'blossom_spa_pro_navigation' ) ) :
/**
 * Navigation
*/
function blossom_spa_pro_navigation(){
    if( is_single() ){
        $next_post = get_next_post();
        $prev_post = get_previous_post();

        if( $prev_post || $next_post ){?>            
            <nav class="post-navigation pagination" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'blossom-spa-pro' ); ?></h2>
                <div class="nav-links">
                    <?php if( $prev_post ){ ?>
                    <div class="nav-previous">
                        <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel="prev">
                            <span class="meta-nav"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 8"><defs><style>.arla{fill:#999596;}</style></defs><path class="arla" d="M16.01,11H8v2h8.01v3L22,12,16.01,8Z" transform="translate(22 16) rotate(180)"/></svg><?php esc_html_e( 'Previous Post', 'blossom-spa-pro' ); ?></span>
                            <span class="post-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></span>
                        </a>
                        <figure class="post-img">
                            <?php
                            $prev_img = get_post_thumbnail_id( $prev_post->ID );
                            if( $prev_img ){
                                $prev_url = wp_get_attachment_image_url( $prev_img, 'blossom-spa-pagination' );
                                echo '<img src="' . esc_url( $prev_url ) . '" alt="' . the_title_attribute( 'echo=0', $prev_post ) . '">';                                        
                            }else{
                                blossom_spa_pro_get_fallback_svg( 'blossom-spa-pagination' );
                            }
                            ?>
                        </figure>
                    </div>
                    <?php } ?>
                    <?php if( $next_post ){ ?>
                    <div class="nav-next">
                        <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel="next">
                            <span class="meta-nav"><?php esc_html_e( 'Next Post', 'blossom-spa-pro' ); ?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 8"><defs><style>.arra{fill:#999596;}</style></defs><path class="arra" d="M16.01,11H8v2h8.01v3L22,12,16.01,8Z" transform="translate(-8 -8)"/></svg></span>
                            <span class="post-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></span>
                        </a>
                        <figure class="post-img">
                            <?php
                            $next_img = get_post_thumbnail_id( $next_post->ID );
                            if( $next_img ){
                                $next_url = wp_get_attachment_image_url( $next_img, 'blossom-spa-pagination' );
                                echo '<img src="' . esc_url( $next_url ) . '" alt="' . the_title_attribute( 'echo=0', $next_post ) . '">';                                        
                            }else{
                                blossom_spa_pro_get_fallback_svg( 'blossom-spa-pagination' );
                            }
                            ?>
                        </figure>
                    </div>
                    <?php } ?>
                </div>
            </nav>        
            <?php
        }
    }else{
        $pagination = get_theme_mod( 'pagination_type', 'numbered' );
        
        switch( $pagination ){
            case 'default': // Default Pagination
            
            the_posts_navigation( array(
                'prev_text'          => __( '<i class="fas fa-angle-left"></i>Older posts', 'blossom-spa-pro' ),
                'next_text'          => __( 'Newer posts<i class="fas fa-angle-right"></i>', 'blossom-spa-pro' ),
                'screen_reader_text' => __( 'Posts Navigation', 'blossom-spa-pro' ),
            ) );
            
            break;
            
            case 'numbered': // Numbered Pagination
            
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous', 'blossom-spa-pro' ),
                'next_text'          => __( 'Next', 'blossom-spa-pro' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'blossom-spa-pro' ) . ' </span>',
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
add_action( 'blossom_spa_pro_after_post_content', 'blossom_spa_pro_navigation', 20 );
add_action( 'blossom_spa_pro_after_posts_content', 'blossom_spa_pro_navigation' );


if( ! function_exists( 'blossom_spa_pro_related_posts' ) ) :
/**
 * Related Posts 
*/
function blossom_spa_pro_related_posts(){ 
    $ed_related_post = get_theme_mod( 'ed_related', true );
    
    if( $ed_related_post ){
        blossom_spa_pro_get_posts_list( 'related' );    
    }
}
endif;                                                                               
add_action( 'blossom_spa_pro_after_post_content', 'blossom_spa_pro_related_posts', 25 );

if( ! function_exists( 'blossom_spa_pro_latest_posts' ) ) :
/**
 * Latest Posts
*/
function blossom_spa_pro_latest_posts(){ 
    blossom_spa_pro_get_posts_list( 'latest' );
}
endif;
add_action( 'blossom_spa_pro_latest_posts', 'blossom_spa_pro_latest_posts' );

if( ! function_exists( 'blossom_spa_pro_comment' ) ) :
/**
 * Comments Template 
*/
function blossom_spa_pro_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
	if( ! get_theme_mod( 'ed_comments', false ) && ( comments_open() || get_comments_number() ) ) :
		comments_template();
	endif;
}
endif;
add_action( 'blossom_spa_pro_after_post_content', 'blossom_spa_pro_comment', 30 );
add_action( 'blossom_spa_pro_after_page_content', 'blossom_spa_pro_comment' );

if( ! function_exists( 'blossom_spa_pro_content_end' ) ) :
/**
 * Content End
*/
function blossom_spa_pro_content_end(){ 
    $home_sections = blossom_spa_pro_get_home_sections(); 
    if( ! ( is_front_page() && ! is_home() && $home_sections ) ){ ?>            
        </div><!-- .container -->        
    </div><!-- .error-holder/site-content -->
    <?php
    }
}
endif;
add_action( 'blossom_spa_pro_before_footer', 'blossom_spa_pro_content_end', 20 );

if( ! function_exists( 'blossom_spa_pro_instagram' ) ) :
/**
 * Before Footer
*/
function blossom_spa_pro_instagram(){
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
add_action( 'blossom_spa_pro_before_footer_start', 'blossom_spa_pro_instagram', 10 );

if( ! function_exists( 'blossom_spa_pro_footer_start' ) ) :
/**
 * Footer Start
*/
function blossom_spa_pro_footer_start(){
    ?>
    <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
    <?php
}
endif;
add_action( 'blossom_spa_pro_footer', 'blossom_spa_pro_footer_start', 20 );

if( ! function_exists( 'blossom_spa_pro_footer_contact' ) ) :
/**
 * Footer Start
*/
function blossom_spa_pro_footer_contact(){ 
    
    $fphone_label = get_theme_mod( 'fphone_label', __( 'Phone', 'blossom-spa-pro' ) );
    $fphone       = get_theme_mod( 'fphone', '+123-456-7890' );
    $femail_label = get_theme_mod( 'femail_label', __( 'Email', 'blossom-spa-pro' ) );
    $femail       = get_theme_mod( 'femail', 'mail@domain.com' );
    $fopening_hours_label = get_theme_mod( 'fopening_hours_label', __( 'Opening Hours', 'blossom-spa-pro' ) );
    $fopening_hours       = get_theme_mod( 'fopening_hours', 'Mon - Fri: 7AM - 7PM' );
    
    if( !empty( $fphone_label ) || !empty( $fphone ) || !empty( $femail_label ) || !empty( $femail ) || !empty( $fopening_hours_label ) || !empty( $fopening_hours ) ) : ?>
        <div class="footer-block-wrap">
            <div class="container"> 
            <?php if( !empty( $fphone_label ) || !empty( $fphone ) ) : ?>
                <div class="footer-contact-block">
                    <div class="footer-contact-block-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><defs><style>.pha{fill:none;}.phb{fill:#ccc6c8;}</style></defs><path class="pha" d="M0,0H36V36H0Z"/><g transform="translate(4.5 4.5)"><path class="phb" d="M8.31,6a18.469,18.469,0,0,0,.675,3.885l-1.8,1.8A22.238,22.238,0,0,1,6.045,6H8.31M23.1,24.03a19.129,19.129,0,0,0,3.9.675V26.94a23.14,23.14,0,0,1-5.7-1.125l1.8-1.785M9.75,3H4.5A1.5,1.5,0,0,0,3,4.5,25.5,25.5,0,0,0,28.5,30,1.5,1.5,0,0,0,30,28.5V23.265a1.5,1.5,0,0,0-1.5-1.5,17.11,17.11,0,0,1-5.355-.855,1.259,1.259,0,0,0-.465-.075,1.537,1.537,0,0,0-1.065.435l-3.3,3.3A22.723,22.723,0,0,1,8.43,14.685l3.3-3.3a1.505,1.505,0,0,0,.375-1.53A17.041,17.041,0,0,1,11.25,4.5,1.5,1.5,0,0,0,9.75,3Z" transform="translate(-3 -3)"/></g></svg>
                        <?php if( !empty( $fphone_label ) ) echo '<span class="title fphone-label">' . esc_html( $fphone_label ) . '</span>';
                        if( !empty( $fphone ) ) echo '<p class="description fphone"><a href="tel:' . esc_attr( $fphone ) . '">' . esc_html( $fphone ) . '</a></p>'; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if( !empty( $femail_label ) || !empty( $femail ) ) : ?>
                <div class="footer-contact-block">
                    <div class="footer-contact-block-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><defs><style>.ema{fill:none;}.emb{fill:#ccc6c8;}</style></defs><path class="ema" d="M0,0H36V36H0Z"/><g transform="translate(3 2.925)"><path class="emb" d="M17,1.95a15,15,0,0,0,0,30h7.5v-3H17a12.154,12.154,0,0,1-12-12,12.154,12.154,0,0,1,12-12,12.154,12.154,0,0,1,12,12V19.1a2.425,2.425,0,0,1-2.25,2.355,2.425,2.425,0,0,1-2.25-2.355V16.95a7.5,7.5,0,1,0-2.19,5.3,5.555,5.555,0,0,0,4.44,2.2A5.269,5.269,0,0,0,32,19.1V16.95A15.005,15.005,0,0,0,17,1.95Zm0,19.5a4.5,4.5,0,1,1,4.5-4.5A4.494,4.494,0,0,1,17,21.45Z" transform="translate(-2 -1.95)"/></g></svg>
                        <?php if( !empty( $femail_label ) ) echo '<span class="title femail-label">' . esc_html( $femail_label ) . '</span>';
                        if( !empty( $femail ) ) echo '<p class="description femail"><a href="mailto:' . sanitize_email( $femail ) . '">' . sanitize_email( $femail ) . '</a></p>'; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if( !empty( $fopening_hours_label ) || !empty( $fopening_hours ) ) : ?>
                <div class="footer-contact-block">
                    <div class="footer-contact-block-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><defs><style>.clk{fill:none;}.clkb{fill:#ccc6c8;}</style></defs><g transform="translate(7 18)"><g transform="translate(-7 -18)"><path class="clk" d="M0,0H36V36H0Z"/></g><g transform="translate(-2 -13)"><path class="clkb" d="M15.5,2A13.5,13.5,0,1,0,29,15.5,13.54,13.54,0,0,0,15.5,2Zm0,24.3A10.8,10.8,0,1,1,26.3,15.5,10.814,10.814,0,0,1,15.5,26.3Z" transform="translate(-2 -2)"/><path class="clkb" d="M13.025,7H11v8.1l7.02,4.32,1.08-1.755L13.025,14.02Z" transform="translate(1.15 -0.25)"/></g></g></svg>
                        <?php if( !empty( $fopening_hours_label ) ) echo '<span class="title fopening-label">' . esc_html( $fopening_hours_label ) . '</span>';
                        if( !empty( $fopening_hours ) ) echo '<p class="description fopening">' . esc_html( $fopening_hours ) . '</p>'; ?>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div><!-- .footer-block-wrap -->    
    <?php
    endif;
}
endif;
add_action( 'blossom_spa_pro_footer', 'blossom_spa_pro_footer_contact', 25 );

if( ! function_exists( 'blossom_spa_pro_footer_top' ) ) :
/**
 * Footer Top
*/
function blossom_spa_pro_footer_top(){    
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
    			<div class="grid column-<?php echo esc_attr( $sidebar_count ); ?>">
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
add_action( 'blossom_spa_pro_footer', 'blossom_spa_pro_footer_top', 30 );

if( ! function_exists( 'blossom_spa_pro_footer_bottom' ) ) :
/**
 * Footer Bottom
*/
function blossom_spa_pro_footer_bottom(){ ?>
    <div class="footer-b">
		<div class="container">
			<div class="copyright">           
            <?php
                blossom_spa_pro_get_footer_copyright();
                blossom_spa_pro_ed_author_link();
                blossom_spa_pro_ed_wp_link();
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link();
                }
            ?>               
            </div>
            <?php blossom_spa_pro_social_links( true, false ); ?>
            <div class="back-to-top">
                <i class="fas fa-chevron-up"></i>
            </div>
		</div>
	</div>
    <?php
}
endif;
add_action( 'blossom_spa_pro_footer', 'blossom_spa_pro_footer_bottom', 40 );

if( ! function_exists( 'blossom_spa_pro_footer_end' ) ) :
/**
 * Footer End 
*/
function blossom_spa_pro_footer_end(){ ?>
    </footer><!-- #colophon -->
    <?php
}
endif;
add_action( 'blossom_spa_pro_footer', 'blossom_spa_pro_footer_end', 50 );

if( ! function_exists( 'blossom_spa_pro_page_end' ) ) :
/**
 * Page End
*/
function blossom_spa_pro_page_end(){ ?>
    </div><!-- #page -->
    <?php
}
endif;
add_action( 'blossom_spa_pro_after_footer', 'blossom_spa_pro_page_end', 20 );