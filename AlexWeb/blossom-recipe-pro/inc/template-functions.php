<?php
/**
 * Blossom Recipe Pro Template Functions which enhance the theme by hooking into WordPress
 *
 * @package Blossom_Recipe_Pro
 */

if( ! function_exists( 'blossom_recipe_pro_doctype' ) ) :
/**
 * Doctype Declaration
*/
function blossom_recipe_pro_doctype(){ ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;
add_action( 'blossom_recipe_pro_doctype', 'blossom_recipe_pro_doctype' );

if( ! function_exists( 'blossom_recipe_pro_head' ) ) :
/**
 * Before wp_head 
*/
function blossom_recipe_pro_head(){ ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
}
endif;
add_action( 'blossom_recipe_pro_before_wp_head', 'blossom_recipe_pro_head' );

if( ! function_exists( 'blossom_recipe_pro_header_search' ) ) :
/**
 * Page Start
*/
function blossom_recipe_pro_header_search(){ ?>
    <div class="header-search-form">
        <?php get_search_form(); ?>
        <span class="close"></span>
    </div>
    <?php
}
endif;
add_action( 'blossom_recipe_pro_before_header', 'blossom_recipe_pro_header_search', 10 );

if( ! function_exists( 'blossom_recipe_pro_page_start' ) ) :
/**
 * Page Start
*/
function blossom_recipe_pro_page_start(){ ?>
    <div id="page" class="site">
    <?php
}
endif;
add_action( 'blossom_recipe_pro_before_header', 'blossom_recipe_pro_page_start', 20 );

if( ! function_exists( 'blossom_recipe_pro_sticky_newsletter' ) ) :
/**
 * Page Start
*/
function blossom_recipe_pro_sticky_newsletter(){
    $ed_newsletter = get_theme_mod( 'ed_header_newsletter', true );
    $newsletter    = get_theme_mod( 'header_newsletter_shortcode' );
    if( $ed_newsletter && $newsletter ){ ?>
        <div class="sticky-t-bar">
            <span class="close"></span>
            <div class="sticky-bar-content">
                <div class="container">
                    <?php echo do_shortcode( $newsletter ); ?>
                </div>
            </div>
        </div>
        <?php
    }
}
endif;
add_action( 'blossom_recipe_pro_before_header', 'blossom_recipe_pro_sticky_newsletter', 30 );

if( ! function_exists( 'blossom_recipe_pro_sticky_header' ) ) :

    function blossom_recipe_pro_sticky_header(){
        ?>
        <div class="sticky-header">
            <div class="container">
                <?php blossom_recipe_pro_site_branding(); ?>
                <?php blossom_recipe_pro_primary_nagivation(); ?>
            </div>
        </div>
        <?php
    }
endif;

add_action( 'blossom_recipe_pro_before_header', 'blossom_recipe_pro_sticky_header', 35 );

if( ! function_exists( 'blossom_recipe_pro_header' ) ) :
/**
 * Header Start
*/
function blossom_recipe_pro_header(){ 

    $header_array = array( 'one', 'two', 'three', 'four' );
    $header = get_theme_mod( 'header_layout', 'one' );
    if( in_array( $header, $header_array ) ){            
        get_template_part( 'headers/' . $header );
    }
}
endif;
add_action( 'blossom_recipe_pro_header', 'blossom_recipe_pro_header', 20 );

if( ! function_exists( 'blossom_recipe_pro_banner' ) ) :
/**
 * Banner Section 
*/
function blossom_recipe_pro_banner(){
    $slider_layout = get_theme_mod( 'slider_layout', 'one' );
    if( is_front_page() || is_home() ) blossom_recipe_pro_get_banner( $slider_layout );   
}
endif;
add_action( 'blossom_recipe_pro_after_header', 'blossom_recipe_pro_banner', 15 );

if( ! function_exists( 'blossom_recipe_pro_top_section' ) ) :
/**
 * Top Section
 * 
*/
function blossom_recipe_pro_top_section(){
    if( is_front_page() || is_home() ) {
        $ed_featured         = get_theme_mod( 'ed_featured_area', true );
        $featured_type       = get_theme_mod( 'featured_type', 'post' );
        $featured_post_one   = get_theme_mod( 'featured_post_one' );
        $featured_post_two   = get_theme_mod( 'featured_post_two' );
        $featured_post_three = get_theme_mod( 'featured_post_three' );
        $featured_post_four  = get_theme_mod( 'featured_post_four' );
        $featured_posts      = array( $featured_post_one, $featured_post_two, $featured_post_three, $featured_post_four );
        $featured_posts      = array_diff( array_unique( $featured_posts), array( '' ) );
        $featured_recipe_one = get_theme_mod( 'featured_recipe_one' );
        $featured_recipe_two = get_theme_mod( 'featured_recipe_two' );
        $featured_recipe_three = get_theme_mod( 'featured_recipe_three' );
        $featured_recipe_four  = get_theme_mod( 'featured_recipe_four' );
        $featured_recipes    = array( $featured_recipe_one, $featured_recipe_two, $featured_recipe_three, $featured_recipe_four );
        $featured_recipes    = array_diff( array_unique( $featured_recipes), array( '' ) );
        $featured_custom     = get_theme_mod( 'featured_custom' );
        
        $args = array(
            'post_status'    => 'publish',
            'posts_per_page' => -1,
        );

        if( $featured_type == 'post' ){
            $args['post__in'] = $featured_posts;
            $args['orderby']  = 'post__in'; 
        }elseif( $featured_type == 'recipe' ){
            $args['post_type'] = 'blossom-recipe';
            $args['post__in']  = $featured_recipes;
            $args['orderby']   = 'post__in'; 
        }
        $qry = new WP_Query( $args ); 
        
        if( $ed_featured ) : ?>
                            
            <div class="tab-section">
                <div class="container">
                    <ul class="tab-group">
                        <li id="tab-1" class="tab-btn active"><?php esc_html_e( 'Featured','blossom-recipe-pro' ); ?></li>
                        <li id="tab-2" class="tab-btn"><?php esc_html_e( 'Popular','blossom-recipe-pro' ); ?></li>
                        <li id="tab-3" class="tab-btn"><?php esc_html_e( 'Latest','blossom-recipe-pro' ); ?></li>
                    </ul>
                    <div class="tab-content-wrap">
                    <?php 
                    if( ( $featured_type == 'post' && $qry->have_posts() ) || ( is_brm_activated() && $featured_type == 'recipe' && $featured_recipes && $qry->have_posts() ) || ( $featured_type == 'custom' && $featured_custom ) ){
                        if( $featured_type == 'post' && $qry->have_posts() ){ ?>
                            <div id="tab-1-content" class="tab-content active">
                				<?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                                    <div class="item-block">
            							<a href="<?php the_permalink(); ?>">
                                        <?php 
                                            if( has_post_thumbnail() ){
                                                the_post_thumbnail( 'blossom-recipe-slider', array( 'itemprop' => 'image' ) );
                                            }else{
                                                blossom_recipe_pro_get_fallback_svg( 'blossom-recipe-slider' );
                                            }
                                        ?>
                                        </a>
                                        <?php the_title( '<h3 class="item-title"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                    </div>
                				<?php } ?>
                			</div>
                            <?php
                            wp_reset_postdata();                                   
                        }elseif( is_brm_activated() && $featured_type == 'recipe' && $featured_recipes && $qry->have_posts() ){ ?>
                            <div id="tab-1-content" class="tab-content active">
                                <?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                                    <div class="item-block">
                                        <a href="<?php the_permalink(); ?>">
                                        <?php 
                                            if( has_post_thumbnail() ){
                                                the_post_thumbnail( 'blossom-recipe-slider', array( 'itemprop' => 'image' ) );
                                            }else{
                                                blossom_recipe_pro_get_fallback_svg( 'blossom-recipe-slider' );
                                            }
                                        ?>
                                        </a>
                                        <?php the_title( '<h3 class="item-title"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php
                            wp_reset_postdata();                                   
                        }elseif( $featured_type == 'custom' && $featured_custom ){ ?>
                            <div id="tab-1-content" class="tab-content active">
                				<?php foreach( $featured_custom as $feature ){ ?>
                                    <div class="item-block">
            							<?php
                                        if( $feature['link'] ) echo '<a href="' . esc_url( $feature['link'] ) . '">';
                                        if( $feature['thumbnail'] ){
                                            $image = wp_get_attachment_image_url( $feature['thumbnail'], 'blossom-recipe-slider' );
                                            echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $feature['title'] ) . '" itemprop="image">';
                                        }else{
                                            blossom_recipe_pro_get_fallback_svg( 'blossom-recipe-slider' );
                                        }
                                        if( $feature['link'] ) echo '</a>'; 
                                        if( $feature['title'] ) {
                                            echo '<div class="item-title">';
                                            if( $feature['link'] ) echo '<a href="' . esc_url( $feature['link'] ) . '">';
                                            echo esc_html( $feature['title'] );
                                            if( $feature['link'] ) echo '</a>'; 
                                            echo '</div>'; 
                                        }
                                        ?>
                					</div>
                				<?php } ?>
                			</div>
                            <?php
                        } 
                    } ?>
                    </div>   
                </div>
            </div>
        <?php endif;
    }
}
endif;
add_action( 'blossom_recipe_pro_after_header', 'blossom_recipe_pro_top_section', 20 );

if( ! function_exists( 'blossom_recipe_pro_top_bar' ) ) :
/**
 * Top bar for single page and post
 * 
*/
function blossom_recipe_pro_top_bar(){
    if( is_singular() && ! is_front_page() ){ ?>
        <div class="top-bar">
            <div class="container">
            <?php                
                if( is_single() && get_post_type() != 'product' ){
                    //AD before single content
                    blossom_recipe_pro_get_ad_before_content();
                }
            ?>
            </div>
        </div>   
        <?php 
    }    
}
endif;
add_action( 'blossom_recipe_pro_after_header', 'blossom_recipe_pro_top_bar', 30 );

if( ! function_exists( 'blossom_recipe_pro_advert_section' ) ) :
/**
 * Advertisement section
 * 
*/
function blossom_recipe_pro_advert_section(){
    if( is_front_page() || is_home() ){ 
        $ed_ad      = get_theme_mod( 'ed_home_post_ad' ); //from customizer
        $ad_img     = get_theme_mod( 'home_post_ad' ); //from customizer
        $ad_link    = get_theme_mod( 'home_post_ad_link' ); //from customizer
        $target     = get_theme_mod( 'open_link_diff_tab_home_post', true ) ? 'target="_blank"' : '';
        $ed_ad_code = get_theme_mod( 'ed_home_post_ad_code' );
        $ad_code    = get_theme_mod( 'home_post_ad_code' ); 
         
        if( $ad_img ){
            $image = wp_get_attachment_image_url( $ad_img, 'full' );
        }else{
            $image = false;
        }
        
        if( $ed_ad && ( $ad_img || ( $ed_ad_code && $ad_code ) ) ) 
        blossom_recipe_pro_get_ad_block( $image, $ad_link, $target, $ad_code, $ed_ad_code ); 
    }    
}
endif;
add_action( 'blossom_recipe_pro_after_header', 'blossom_recipe_pro_advert_section', 40 );

if( ! function_exists( 'blossom_recipe_pro_content_start' ) ) :
/**
 * Content Start
 *   
*/
function blossom_recipe_pro_content_start(){
    $ed_prefix      = get_theme_mod( 'ed_prefix_archive', false ); ?>
    <div id="content" class="site-content">
        <header class="page-header">
            <div class="container">
    			<?php
                    
                    if( is_archive() ) :
                        if( is_author() ){
                            $author_title = get_the_author_meta( 'display_name' ); ?>
                            <div class="container">
                                <figure class="author-img"><?php echo blossom_recipe_pro_gravatar( get_the_author_meta( 'ID' ), 120 ); ?></figure>
                                <div class="author-info-wrap">
                                    <?php 
                                        echo '<h1 class="name">' . esc_html__( 'All Posts By ','blossom-recipe-pro' ) . '<span class="vcard">' . esc_html( $author_title ) . '</span></h1>';
                                        blossom_recipe_pro_author_social();
                                    ?>      
                                </div>
                            </div>    
                            <?php 
                        }else{
                            the_archive_title();
                        }
                        the_archive_description( '<div class="archive-description">', '</div>' );
                    endif;
                    
                    if( is_search() ){ 
                        echo '<h1 class="page-title">' . esc_html__( 'You Are Looking For', 'blossom-recipe-pro' ) . '</h1>';
                        get_search_form();
                    }
                ?>
            </div>
		</header>
        <div class="container">
        <?php
}
endif;
add_action( 'blossom_recipe_pro_content', 'blossom_recipe_pro_content_start' );

if( ! function_exists( 'blossom_recipe_pro_posts_per_page_count' ) ):
/**
*   Counts the Number of total posts in Archive, Search and Author
*/
function blossom_recipe_pro_posts_per_page_count(){
    global $wp_query;
    if( is_archive() || is_search() && $wp_query->found_posts > 0 ) {
        printf( esc_html__( '%1$s Showing %2$s %3$s Result(s) %4$s', 'blossom-recipe-pro' ), '<span class="showing-results">', '<span class="result-count">', esc_html( number_format_i18n( $wp_query->found_posts ) ), '</span></span>' );
    }
}
endif; 
add_action( 'blossom_recipe_pro_before_posts_content' , 'blossom_recipe_pro_posts_per_page_count', 10 );

if ( ! function_exists( 'blossom_recipe_pro_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function blossom_recipe_pro_post_thumbnail() {
    global $wp_query;
    $image_size  = 'thumbnail';
    $ed_featured = get_theme_mod( 'ed_featured_image', true );
    $sidebar     = blossom_recipe_pro_sidebar();
    
    if( is_home() ){
        $image_size = blossom_recipe_pro_blog_layout_image_size();        
        echo '<figure class="post-thumbnail"><a href="' . esc_url( get_permalink() ) . '">';
        if( has_post_thumbnail() ){                        
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        }else{
            blossom_recipe_pro_get_fallback_svg( $image_size );    
        }        
        echo '</a>';
        blossom_recipe_pro_social_share();
        echo '</figure>';
    }elseif( is_archive() || is_search() ){
        $image_size = blossom_recipe_pro_archive_layout_image_size();
        echo '<figure class="post-thumbnail"><a href="' . esc_url( get_permalink() ) . '">';
        if( has_post_thumbnail() ){
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        }else{
            blossom_recipe_pro_get_fallback_svg( $image_size );
        }
        echo '</a>';
        blossom_recipe_pro_social_share();
        echo '</figure>';
    }elseif( is_singular() ){
        $image_size = ( $sidebar ) ? 'blossom-recipe-blog' : 'blossom-recipe-blog-one';
        if( has_post_thumbnail() ) {
            if( is_single() ){
                if( $ed_featured ) {
                    echo '<figure class="post-thumbnail">';
                    the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                    echo '</figure>';
                }
            }else{
                echo '<figure class="post-thumbnail">';
                the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                echo '</figure>';
            }
        }
    }
}
endif;
add_action( 'blossom_recipe_pro_before_page_entry_content', 'blossom_recipe_pro_post_thumbnail' );
add_action( 'blossom_recipe_pro_before_post_entry_content', 'blossom_recipe_pro_post_thumbnail', 15 );

if( ! function_exists( 'blossom_recipe_pro_entry_header' ) ) :
/**
 * Entry Header
*/
function blossom_recipe_pro_entry_header(){ ?>
    <header class="entry-header">
		<?php 
            $ed_cat_single  = get_theme_mod( 'ed_category', false );
            $ed_post_date   = get_theme_mod( 'ed_post_date', false );
            $ed_post_author = get_theme_mod( 'ed_post_author', false );
            $ed_post_views  = get_theme_mod( 'ed_single_post_views', false );
            $post_id        = get_the_ID();
            
            if( is_single() ){
                if( ! $ed_cat_single ) blossom_recipe_pro_category();
            }else{
                blossom_recipe_pro_category();    
            }
            
            if ( is_singular() ) :
    			the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
    		else :
    			the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    		endif; 
        
            if( 'post' === get_post_type() || ( is_brm_activated() && 'blossom-recipe' === get_post_type() ) ){
                echo '<div class="entry-meta">';
                if( is_single() ){
                    if( ! $ed_post_author ) blossom_recipe_pro_posted_by();
                    if( ! $ed_post_date ) blossom_recipe_pro_posted_on();
                    blossom_recipe_pro_single_like_count();
                    if( ! $ed_post_views ) blossom_recipe_pro_post_views( $post_id );
                    blossom_recipe_pro_social_share();
                }else{
                    blossom_recipe_pro_posted_on();
                    blossom_recipe_pro_like_count();
                    blossom_recipe_pro_post_views( $post_id );
                }
                echo '</div>';
            }		
		?>
	</header>         
    <?php    
}
endif;
add_action( 'blossom_recipe_pro_post_entry_content', 'blossom_recipe_pro_entry_header', 10 );

if( ! function_exists( 'blossom_recipe_pro_entry_content' ) ) :
/**
 * Entry Content
*/
function blossom_recipe_pro_entry_content(){ 
    $ed_excerpt = get_theme_mod( 'ed_excerpt', true );
    $excerpt_length = get_theme_mod( 'excerpt_length', 55 ); ?>
    <div class="entry-content" itemprop="text">
		<?php
			if( is_singular() || ! $ed_excerpt || ( get_post_format() != false ) ){
                the_content();    
    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blossom-recipe-pro' ),
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
add_action( 'blossom_recipe_pro_page_entry_content', 'blossom_recipe_pro_entry_content', 15 );
add_action( 'blossom_recipe_pro_post_entry_content', 'blossom_recipe_pro_entry_content', 15 );

if( ! function_exists( 'blossom_recipe_pro_entry_footer' ) ) :
/**
 * Entry Footer
*/
function blossom_recipe_pro_entry_footer(){ 
    $readmore = get_theme_mod( 'read_more_text', __( 'Read More', 'blossom-recipe-pro' ) ); ?>
	<footer class="entry-footer">
		<?php
			if( is_single() ){
			    blossom_recipe_pro_tag();
                blossom_recipe_pro_social_share();
			}
            
            if( is_front_page() || is_home() ){
                echo '<a href="' . esc_url( get_the_permalink() ) . '" class="btn-link">' . esc_html( $readmore ) . '</a>';    
            }
            
            if( is_brm_activated() && 'blossom-recipe' === get_post_type() ) {
                $recipe_details = get_post_meta( get_the_ID(), 'br_recipe', true ); 
                if( $recipe_details['details']['total_time'] || $recipe_details['details']['difficulty_level'] ) {
                    echo '<div class="read-time-wrap">';
                    if( $recipe_details['details']['total_time'] ) echo '<span class="read-time"><i class="fas fa-clock"></i>' . esc_html( $recipe_details['details']['total_time'] ) . esc_html( ' Minutes', 'blossom-recipe-pro' ) . '</span>';
                    if( $recipe_details['details']['difficulty_level'] ) echo '<span class="deficulty"><i class="fas fa-tachometer-alt"></i>' . esc_html( $recipe_details['details']['difficulty_level'] ) . '</span>';
                    echo'</div>';
                }
            }

            if( get_edit_post_link() ){
                edit_post_link(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Edit <span class="screen-reader-text">%s</span>', 'blossom-recipe-pro' ),
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
add_action( 'blossom_recipe_pro_page_entry_content', 'blossom_recipe_pro_entry_footer', 20 );
add_action( 'blossom_recipe_pro_post_entry_content', 'blossom_recipe_pro_entry_footer', 20 );

if( ! function_exists( 'blossom_recipe_pro_author' ) ) :
/**
 * Author Section
*/
function blossom_recipe_pro_author(){ 
    $ed_author    = get_theme_mod( 'ed_author', false );
    $author_name = get_the_author_meta( 'display_name' );
    $author_description = get_the_author_meta( 'description' );
    $author_title = get_theme_mod( 'author_title', __( 'About', 'blossom-recipe-pro' ) );
    if( ! $ed_author && $author_name && $author_description ) { ?>
        <div class="author-profile">
            <div class="author-img"><?php echo blossom_recipe_pro_gravatar( get_the_author_meta( 'ID' ), 100 ); ?></div>
            <div class="author-content-wrap">
                <?php 
                    if( $author_name ) echo '<h2 class="author-name"><span class="author-title">' . esc_html( $author_title ) . '</span><span class="vcard">' . esc_html( $author_name ) . '</h2>';
                    if( $author_description ) echo '<div class="author-desc">' . wpautop( wp_kses_post( $author_description ) ) . '</div>';
                    blossom_recipe_pro_author_social();
                ?>      
            </div>
        </div>
    <?php
    }
}
endif;
add_action( 'blossom_recipe_pro_after_post_content', 'blossom_recipe_pro_author', 10 );

if( ! function_exists( 'blossom_recipe_pro_newsletter' ) ) :
/**
 * Newsletter
*/
function blossom_recipe_pro_newsletter(){ 
    if( is_active_sidebar( 'newsletter-section' ) ) {
        echo '<div class="newsletter-section"><div class="container">';
        dynamic_sidebar( 'newsletter-section' );   
        echo '</div></div>';            
    }
}
endif;
add_action( 'blossom_recipe_pro_after_post_content', 'blossom_recipe_pro_newsletter', 15 );

if( ! function_exists( 'blossom_recipe_pro_navigation' ) ) :
/**
 * Navigation
*/
function blossom_recipe_pro_navigation(){
    if( is_single() ){
        $next_post = get_next_post();
        $prev_post = get_previous_post(); 
        
        if( $prev_post || $next_post ){?>            
            <nav class="navigation post-navigation pagination" role="navigation">
    			<h2 class="screen-reader-text"><?php esc_html_e( 'Post Navigation', 'blossom-recipe-pro' ); ?></h2>
    			<div class="nav-links">
    				<?php if( $prev_post ){ ?>
                    <div class="nav-previous">
                        <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel="prev">
                            <span class="meta-nav"><i class="fas fa-chevron-left"></i></span>
                            <figure class="post-img">
                                <?php
                                $prev_img = get_post_thumbnail_id( $prev_post->ID );
                                if( $prev_img ){
                                    $prev_url = wp_get_attachment_image_url( $prev_img, 'thumbnail' );
                                    echo '<img src="' . esc_url( $prev_url ) . '" alt="' . the_title_attribute( 'echo=0', $prev_post ) . '">';                                        
                                }else{
                                    blossom_recipe_pro_get_fallback_svg( 'thumbnail' );
                                }
                                ?>
                            </figure>
                            <span class="post-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></span>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if( $next_post ){ ?>
                    <div class="nav-next">
                        <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel="next">
                            <span class="meta-nav"><i class="fas fa-chevron-right"></i></span>
                            <figure class="post-img">
                                <?php
                                $next_img = get_post_thumbnail_id( $next_post->ID );
                                if( $next_img ){
                                    $next_url = wp_get_attachment_image_url( $next_img, 'thumbnail' );
                                    echo '<img src="' . esc_url( $next_url ) . '" alt="' . the_title_attribute( 'echo=0', $next_post ) . '">';                                        
                                }else{
                                    blossom_recipe_pro_get_fallback_svg( 'thumbnail' );
                                }
                                ?>
                            </figure>
                            <span class="post-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></span>
                        </a>
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
            
            the_posts_navigation();
            
            break;
            
            case 'numbered': // Numbered Pagination
            
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous', 'blossom-recipe-pro' ),
                'next_text'          => __( 'Next', 'blossom-recipe-pro' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'blossom-recipe-pro' ) . ' </span>',
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
add_action( 'blossom_recipe_pro_after_post_content', 'blossom_recipe_pro_navigation', 20 );
add_action( 'blossom_recipe_pro_after_posts_content', 'blossom_recipe_pro_navigation' );

if( ! function_exists( 'blossom_recipe_pro_get_ad_after_content' ) ) :
/**
 * Get AD after single content
*/
function blossom_recipe_pro_get_ad_after_content(){
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
    blossom_recipe_pro_get_ad_block( $image, $ad_link, $target, $ad_code, $ed_ad_code );
}
endif;
add_action( 'blossom_recipe_pro_after_post_content', 'blossom_recipe_pro_get_ad_after_content', 5 ); 

if( ! function_exists( 'blossom_recipe_pro_related_posts' ) ) :
/**
 * Related Posts 
*/
function blossom_recipe_pro_related_posts(){ 
    $ed_related_post = get_theme_mod( 'ed_related', true );
    
    if( $ed_related_post ){
        blossom_recipe_pro_get_posts_list( 'related' );    
    }
}
endif;                                                                               
add_action( 'blossom_recipe_pro_after_post_content', 'blossom_recipe_pro_related_posts', 30 );

if( ! function_exists( 'blossom_recipe_pro_latest_posts' ) ) :
/**
 * Latest Posts
*/
function blossom_recipe_pro_latest_posts(){ 
    blossom_recipe_pro_get_posts_list( 'latest' );
}
endif;
add_action( 'blossom_recipe_pro_latest_posts', 'blossom_recipe_pro_latest_posts' );

if( ! function_exists( 'blossom_recipe_pro_related_posts_on_blog' ) ) :
/**
 * Related Posts On Blog
*/
function blossom_recipe_pro_related_posts_on_blog(){ 
    $ed_related_blog = get_theme_mod( 'ed_related_blog', false );
    
    if( $ed_related_blog ){
        blossom_recipe_pro_get_posts_list( 'related-blog' );
    }
}
endif;

if( ! function_exists( 'blossom_recipe_pro_comment' ) ) :
/**
 * Comments Template 
*/
function blossom_recipe_pro_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
	if( get_theme_mod( 'ed_comments', true ) && ( comments_open() || get_comments_number() ) ) :
		comments_template();
	endif;
}
endif;
add_action( 'blossom_recipe_pro_after_post_content', 'blossom_recipe_pro_comment', 35 );
add_action( 'blossom_recipe_pro_after_page_content', 'blossom_recipe_pro_comment' );

if( ! function_exists( 'blossom_recipe_pro_content_end' ) ) :
/**
 * Content End
*/
function blossom_recipe_pro_content_end(){ ?>            
        </div><!-- .container -->        
    </div><!-- .site-content -->
<?php
}
endif;
add_action( 'blossom_recipe_pro_before_footer', 'blossom_recipe_pro_content_end', 20 );

if( ! function_exists( 'blossom_recipe_pro_newsletter_section' ) ) :
/**
 * Blossom Newsletter
*/
function blossom_recipe_pro_newsletter_section(){
    if( is_active_sidebar( 'newsletter-section' ) && !is_single() ) {
        echo '<div class="newsletter-section"><div class="container">';
        dynamic_sidebar( 'newsletter-section' );   
        echo '</div></div>';            
    }
}
endif;
add_action( 'blossom_recipe_pro_before_footer_start', 'blossom_recipe_pro_newsletter_section', 10 );

if( ! function_exists( 'blossom_recipe_pro_instagram_section' ) ) :
/**
 * Blossom Instagram
*/
function blossom_recipe_pro_instagram_section(){ 
    if( is_btif_activated() && ( is_front_page() || is_single() ) ){
        $ed_instagram = get_theme_mod( 'ed_instagram', false );        
        if( $ed_instagram ){
            echo '<div class="instagram-section">';
            echo do_shortcode( '[blossomthemes_instagram_feed]' );
            echo '</div>';    
        }
    }
}
endif;
add_action( 'blossom_recipe_pro_before_footer_start', 'blossom_recipe_pro_instagram_section', 20 );

if( ! function_exists( 'blossom_recipe_pro_footer_start' ) ) :
/**
 * Footer Start
*/
function blossom_recipe_pro_footer_start(){
    ?>
    <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
    <?php
}
endif;
add_action( 'blossom_recipe_pro_footer', 'blossom_recipe_pro_footer_start', 20 );

if( ! function_exists( 'blossom_recipe_pro_footer_top' ) ) :
/**
 * Footer Top
*/
function blossom_recipe_pro_footer_top(){    
    $footer_sidebars = array( 'footer-one', 'footer-two', 'footer-three' );
    $active_sidebars = array();
    $sidebar_count   = 0;
    
    foreach ( $footer_sidebars as $sidebar ) {
        if( is_active_sidebar( $sidebar ) ){
            array_push( $active_sidebars, $sidebar );
            $sidebar_count++ ;
        }
    }
                 
    if( $active_sidebars ){ ?>
        <div class="top-footer">
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
add_action( 'blossom_recipe_pro_footer', 'blossom_recipe_pro_footer_top', 30 );

if( ! function_exists( 'blossom_recipe_pro_footer_bottom' ) ) :
/**
 * Footer Bottom
*/
function blossom_recipe_pro_footer_bottom(){ ?>
    <div class="bottom-footer">
		<div class="container">
			<div class="copyright">            
            <?php
                blossom_recipe_pro_get_footer_copyright();
                blossom_recipe_pro_ed_author_link();
                blossom_recipe_pro_ed_wp_link();
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
add_action( 'blossom_recipe_pro_footer', 'blossom_recipe_pro_footer_bottom', 40 );

if( ! function_exists( 'blossom_recipe_pro_footer_end' ) ) :
/**
 * Footer End 
*/
function blossom_recipe_pro_footer_end(){ ?>
    </footer><!-- #colophon -->
    <?php
}
endif;
add_action( 'blossom_recipe_pro_footer', 'blossom_recipe_pro_footer_end', 50 );

if( ! function_exists( 'blossom_recipe_pro_back_to_top' ) ) :
/**
 * Back to top
*/
function blossom_recipe_pro_back_to_top(){ ?>
    <div id="back-to-top">
		<span><i class="fas fa-long-arrow-alt-up"></i></span>
	</div>
    <?php
}
endif;
add_action( 'blossom_recipe_pro_after_footer', 'blossom_recipe_pro_back_to_top', 15 );

if( ! function_exists( 'blossom_recipe_pro_page_end' ) ) :
/**
 * Page End
*/
function blossom_recipe_pro_page_end(){ ?>
    </div><!-- #page -->
    <?php
}
endif;
add_action( 'blossom_recipe_pro_after_footer', 'blossom_recipe_pro_page_end', 20 );