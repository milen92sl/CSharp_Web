<?php
/**
 * Blossom Pin Pro Standalone Functions.
 *
 * @package Blossom_Pin_Pro
 */

if ( ! function_exists( 'blossom_pin_pro_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function blossom_pin_pro_posted_on() {
    $ed_updated_post_date = get_theme_mod( 'ed_post_update_date', true );
    $ed_time_ago = get_theme_mod ( 'ed_time_ago', false );
    
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        if( $ed_updated_post_date ){
            $time_string = '<time class="entry-date published updated" datetime="%3$s" itemprop="dateModified">%4$s</time></time><time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';         
        }else{
            $time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';  
        }        
    }else{
       $time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';   
    }

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( 'c' ) ),
        esc_html( get_the_modified_date() )
    );

    if( $ed_time_ago ) {
        $time_string = sprintf( _x( '%s ago', '%s = human-readable time difference', 'blossom-pin-pro' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ) ;
    }
    
    
    $posted_on = sprintf( '%1$s', '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );
    
    echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;


if ( ! function_exists( 'blossom_pin_pro_posted_by' ) ) :
/**
 * Prints HTML with meta information for the current author.
 */
function blossom_pin_pro_posted_by() {
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'blossom-pin-pro' ),
		'<span itemprop="name"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" itemprop="url">' . esc_html( get_the_author() ) . '</a></span>' 
    );
	echo '<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person">' . $byline . '</span>';
}
endif;

if( ! function_exists( 'blossom_pin_pro_comment_count' ) ) :
/**
 * Comment Count
*/
function blossom_pin_pro_comment_count(){
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments">';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'blossom-pin-pro' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}    
}
endif;

if ( ! function_exists( 'blossom_pin_pro_category' ) ) :
/**
 * Prints categories
 */
function blossom_pin_pro_category(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ' ','blossom-pin-pro' ) );
		if ( $categories_list ) {
			echo '<span class="category" itemprop="about">' . $categories_list . '</span>';
		}
	}
}
endif;

if ( ! function_exists( 'blossom_pin_pro_tag' ) ) :
/**
 * Prints tags
 */
function blossom_pin_pro_tag(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'blossom-pin-pro' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<div class="tags" itemprop="about">' . esc_html__( '%1$sTags:%2$s %3$s', 'blossom-pin-pro' ) . '</div>', '<span>', '</span>', $tags_list );
		}
	}
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_posts_list' ) ) :
/**
 * Returns Latest, Related & Popular Posts
*/
function blossom_pin_pro_get_posts_list( $status ){
    global $post;
    
    $args = array(
        'post_type'           => 'post',
        'posts_status'        => 'publish',
        'ignore_sticky_posts' => true
    );
    
    switch( $status ){
        case 'latest':        
        $args['posts_per_page'] = 3;
        $title                  = __( 'Recommended Articles', 'blossom-pin-pro' );
        $class                  = 'recommended-post';
        $image_size             = 'blossom-pin-related';
        break;
        
        case 'related':
        $args['posts_per_page'] = 3;
        $args['post__not_in']   = array( $post->ID );
        $args['orderby']        = 'rand';
        $title                  = get_theme_mod( 'related_post_title', __( 'Recommended Articles', 'blossom-pin-pro' ) );
        $class                  = 'recommended-post';
        $image_size             = 'blossom-pin-related';        
        $cats                   = get_the_category( $post->ID );        
        if( $cats ){
            $c = array();
            foreach( $cats as $cat ){
                $c[] = $cat->term_id; 
            }
            $args['category__in'] = $c;
        }        
        break;        
    }
    
    $qry = new WP_Query( $args );
    
    if( $qry->have_posts() ){ ?>    
        <section class="<?php echo esc_attr( $class ); ?>">
            <div class="container">
                <header class="section-header">
                    <?php if( $title ) echo '<h2 class="section-title">' . esc_html( $title ) . '</h2>'; ?>
                </header>    
                <div class="post-wrapper">          
                <?php while( $qry->have_posts() ){ $qry->the_post(); ?>                
                    <article class="post">
                        <div class="holder">
                            <div class="top">
                                <?php blossom_pin_pro_post_format_content( true ); ?>
                                <header class="entry-header">
                                <?php
                                    blossom_pin_pro_category();                                   
                                    the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                                ?>                        
                                </header>                                
                            </div> <!-- .top -->
                            <div class="bottom">
                                <?php blossom_pin_pro_posted_on(); ?>
                            </div> <!-- .bottom --> 
                    </div> <!-- .holder -->
                    </article>            
                <?php } ?>
                </div><!-- .post-wrapper -->
           </div> <!-- .container -->
        </section>
        <?php
        wp_reset_postdata();
    }
}
endif;

if( ! function_exists( 'blossom_pin_pro_site_branding' ) ) :
/**
 * Site Branding
*/
function blossom_pin_pro_site_branding(){
    $site_title       = get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    $header_text      = get_theme_mod( 'header_text', 1 );
    if( has_custom_logo() || $site_title || $site_description || $header_text ) :
        if( has_custom_logo() && ( $site_title || $site_description ) && $header_text ) {
            $branding_class = ' has-logo-text';
        }else{
            $branding_class = '';
        } ?>
        <div class="site-branding<?php echo esc_attr( $branding_class ); ?>" itemscope itemtype="http://schema.org/Organization">
            <?php 
            if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                the_custom_logo();
            } 
            if( $site_title || $site_description ) :
                if( $branding_class ) echo '<div class="site-title-wrap">';
                if( is_front_page() ){ ?>
                    <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
            		<?php 
                }else{ ?>
                    <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
                <?php
                }
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ){ ?>
                    <p class="site-description" itemprop="description"><?php echo $description; ?></p>
                <?php
                }
                if( $branding_class ) echo '</div>';
            endif;
            ?>
	   </div>    
    <?php
    endif;
}
endif;

if( ! function_exists( 'blossom_pin_pro_social_links' ) ) :
/**
 * Social Links 
*/
function blossom_pin_pro_social_links( $echo = true, $show_title = false ){ 
    $defaults = array(
        array(
            'font' => 'fab fa-facebook-f',
            'link' => 'https://www.facebook.com/',                        
        ),
        array(
            'font' => 'fab fa-twitter',
            'link' => 'https://twitter.com/',
        ),
        array(
            'font' => 'fab fa-youtube',
            'link' => 'https://www.youtube.com/',
        ),
        array(
            'font' => 'fab fa-instagram',
            'link' => 'https://www.instagram.com/',
        ),
        array(
            'font' => 'fab fa-google-plus-g',
            'link' => 'https://plus.google.com',
        ),
        array(
            'font' => 'fab fa-odnoklassniki',
            'link' => 'https://ok.ru/',
        ),
        array(
            'font' => 'fab fa-vk',
            'link' => 'https://vk.com/',
        ),
        array(
            'font' => 'fab fa-xing',
            'link' => 'https://www.xing.com/',
        )
    );
    $social_links = get_theme_mod( 'social_links', $defaults );
    $social_title = get_theme_mod( 'social_title', __( 'Follow Blossom Pin','blossom-pin-pro') );
    $ed_social    = get_theme_mod( 'ed_social_links', true ); 
    
    if( $ed_social && $social_links && $echo ){ ?>
    <div class="social-networks">
        <?php if( $show_title && !empty( $social_title ) ) echo '<span class="title">' . esc_html( $social_title ) . '</span>'; ?>
        <ul>
        	<?php 
            foreach( $social_links as $link ){
        	   if( $link['link'] ){ ?>
                <li>
                    <a href="<?php echo esc_url( $link['link'] ); ?>" target="_blank" rel="nofollow noopener">
                        <i class="<?php echo esc_attr( $link['font'] ); ?>"></i>
                    </a>
                </li>    	   
                <?php
                } 
            } 
            ?>
    	</ul>
    </div>
    <?php    
    }elseif( $ed_social && $social_links ){
        return true;
    }else{
        return false;
    }
    ?>
    <?php                                
}
endif;

if( ! function_exists( 'blossom_pin_pro_form_section' ) ) :
/**
 * Form Icon
*/
function blossom_pin_pro_form_section(){ ?>
    <div class="form-section">
		<span id="btn-search" class="fas fa-search"></span>
	</div>
    <?php
}
endif;

if( ! function_exists( 'blossom_pin_pro_primary_nagivation' ) ) :
/**
 * Primary Navigation.
*/
function blossom_pin_pro_primary_nagivation(){ ?>
    <div class="overlay"></div>
	<nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
                'fallback_cb'    => 'blossom_pin_pro_primary_menu_fallback',
			) );
		?>
	</nav><!-- #site-navigation -->
    <?php
}
endif;

if( ! function_exists('blossom_pin_pro_tools')):
    function blossom_pin_pro_tools() { 
        $ed_header_search = get_theme_mod( 'ed_header_search', true );
        if( $ed_header_search || blossom_pin_pro_social_links( false, false ) ) { ?>
            <div class="tools">
                <?php if( $ed_header_search ) { ?>
                    <div class="search-icon">
                        <svg class="open-icon" xmlns="http://www.w3.org/2000/svg" viewBox="-18214 -12091 18 18"><path id="Path_99" data-name="Path 99" d="M18,16.415l-3.736-3.736a7.751,7.751,0,0,0,1.585-4.755A7.876,7.876,0,0,0,7.925,0,7.876,7.876,0,0,0,0,7.925a7.876,7.876,0,0,0,7.925,7.925,7.751,7.751,0,0,0,4.755-1.585L16.415,18ZM2.264,7.925a5.605,5.605,0,0,1,5.66-5.66,5.605,5.605,0,0,1,5.66,5.66,5.605,5.605,0,0,1-5.66,5.66A5.605,5.605,0,0,1,2.264,7.925Z" transform="translate(-18214 -12091)"/></svg>
                        <svg class="close-icon" xmlns="http://www.w3.org/2000/svg" viewBox="10906 13031 18 18"><path id="Close" d="M23,6.813,21.187,5,14,12.187,6.813,5,5,6.813,12.187,14,5,21.187,6.813,23,14,15.813,21.187,23,23,21.187,15.813,14Z" transform="translate(10901 13026)"/></svg>
                    </div>
                <?php }
                if( $ed_header_search && blossom_pin_pro_social_links( false, false ) ) {
                    echo '<span class="separator"></span>';
                }
                if( blossom_pin_pro_social_links( false, false ) ){
                    blossom_pin_pro_social_links( true, false );
                } ?>
            </div>
        <?php 
        }
    }
endif;

if( ! function_exists( 'blossom_pin_pro_primary_menu_fallback' ) ) :
/**
 * Fallback for primary menu
*/
function blossom_pin_pro_primary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="primary-menu" class="menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'blossom-pin-pro' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'blossom_pin_pro_secondary_navigation' ) ) :
/**
 * Secondary Navigation
*/
function blossom_pin_pro_secondary_navigation(){ ?>
	<nav class="footer-nav">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'secondary',
				'menu_id'        => 'secondary-menu',
                'fallback_cb'    => 'blossom_pin_pro_secondary_menu_fallback',
			) );
		?>
	</nav>
    <?php
}
endif;

if( ! function_exists( 'blossom_pin_pro_secondary_menu_fallback' ) ) :
/**
 * Fallback for secondary menu
*/
function blossom_pin_pro_secondary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="secondary-menu" class="menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'blossom-pin-pro' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_banner' ) ) :
/**
 * Prints Banner Section
 * 
 * @todo MAKE NECESSARY CHANGES AS THEME REQUIRES
*/
function blossom_pin_pro_get_banner( $slider_layout = 'one' ){
    $ed_banner      = get_theme_mod( 'ed_banner_section', 'slider_banner' );
    $slider_type    = get_theme_mod( 'slider_type', 'latest_posts' ); 
    $slider_cat     = get_theme_mod( 'slider_cat' );
    $slider_pages   = get_theme_mod( 'slider_pages' );
    $slider_custom  = get_theme_mod( 'slider_custom' );
    $posts_per_page = get_theme_mod( 'no_of_slides', 6 );
    $ed_full_image  = get_theme_mod( 'slider_full_image', false );
    $ed_caption     = get_theme_mod( 'slider_caption', true );
    $size_detect    = new Blossom_Pin_Pro_Mobile_Detect;
    $add_class = ( $slider_layout == 'one' ) ? 'banner-slider ' : '';

    $banner_title      = get_theme_mod( 'banner_title', __( 'Wondering how your peers are using social media?', 'blossom-pin-pro' ) );
    $banner_subtitle   = get_theme_mod( 'banner_subtitle', __( 'Discover how people in the community looks create pins to get their attention?', 'blossom-pin-pro' ) );
    $banner_label      = get_theme_mod( 'banner_label', __( 'Discover More', 'blossom-pin-pro' ) );
    $banner_link       = get_theme_mod( 'banner_link', '#' ); 
    
    if( $slider_layout == 'one' ){
        $image_size = 'blossom-pin-slider';
    }elseif( $slider_layout == 'two' ){
        $image_size = $ed_full_image ? 'full' : 'blossom-pin-slider-two';
    }elseif( $slider_layout == 'three' ){
        $image_size = 'blossom-pin-slider-three';
    }elseif( $slider_layout == 'four' ){
        $image_size = 'blossom-pin-slider-four';
    }elseif( $slider_layout == 'five' ){
        $image_size = 'blossom-pin-slider-five';
    }elseif( $slider_layout == 'six' ){
        $image_size = 'blossom-pin-slider-six';
    }elseif( $slider_layout == 'seven' ){
        $image_size = $ed_full_image ? 'full' : 'blossom-pin-slider-two';
    }elseif( $slider_layout == 'eight' ){
        $image_size = 'blossom-pin-slider-four';
    }else{
        $image_size = 'blossom-pin-slider';
    }
    if( $ed_banner == 'static_banner' && has_custom_header() ){ ?>
        <div class="banner<?php if( has_header_video() ) echo esc_attr( ' video-banner' ); ?>">
            <?php the_custom_header_markup();
            if( $ed_banner == 'static_banner' && ( $banner_title || $banner_subtitle || ( $banner_label && $banner_link ) ) ){
                echo '<div class="banner-caption"><div class="wrapper"><div class="banner-wrap">';
                if( $banner_title ) echo '<h2 class="banner-title">' . esc_html( $banner_title ) . '</h2>';
                if( $banner_subtitle ) echo '<div class="banner-content b-content">' . wpautop( wp_kses_post( $banner_subtitle ) ) . '</div>';
                if( $banner_label && $banner_link ) echo '<a href="' . esc_url( $banner_link ) . '" class="banner-link">' . esc_html( $banner_label ) . '</a>';
                echo '</div></div></div>';
            } ?>
        </div>
        <?php
    }elseif( $ed_banner == 'slider_banner' ){
        if( $slider_type == 'latest_posts' || $slider_type == 'cat' || $slider_type == 'pages' ){
        
            $args = array(
                'post_status'         => 'publish',            
                'ignore_sticky_posts' => true
            );
            
            if( $slider_type === 'cat' && $slider_cat ){
                $args['post_type']      = 'post';
                $args['cat']            = $slider_cat; 
                $args['posts_per_page'] = -1;  
            }elseif( $slider_type == 'pages' && $slider_pages ){
                $args['post_type']      = 'page';
                $args['posts_per_page'] = -1;
                $args['post__in']       = blossom_pin_pro_get_id_from_page( $slider_pages );
                $args['orderby']        = 'post__in';
            }else{
                $args['post_type']      = 'post';
                $args['posts_per_page'] = $posts_per_page;
            }
                
            $qry = new WP_Query( $args );
            if( $qry->have_posts() ){
            if( $slider_layout == 'three' || $slider_layout == 'four' || $slider_layout == 'five' ) echo '<div class="container">'; ?>
            <div class="<?php echo esc_attr( $add_class ); ?>banner-layout-<?php echo esc_attr( $slider_layout ); ?> owl-carousel">
                <?php if( ( $slider_layout == 'four' || $slider_layout == 'eight' ) && !( $size_detect->isMobile() && !$size_detect->isTablet() ) ) :
                    blossom_pin_pro_banner_slider_layout_four( $qry, $image_size, $ed_caption );
                else :  ?>
                    <?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                    <div class="item">
                        <?php 
                        if( has_post_thumbnail() ){
                            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
                        }
                        
                        if( $ed_caption ){ ?>                        
                        <div class="text-holder">
                            <?php 
                                if( $slider_layout == 'seven' ) echo '<div class="holder">';
                                blossom_pin_pro_category();
                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                if( $slider_layout == 'seven' ) echo '</div>';
                            ?>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } 
                endif; ?>                        
            </div>
            <?php if( $slider_layout == 'three' || $slider_layout == 'four' || $slider_layout == 'five' ) echo '</div>';
            wp_reset_postdata();
            }
        
        }elseif( $slider_type == 'custom' && $slider_custom ){ ?>
        	<?php if( $slider_layout == 'three' || $slider_layout == 'four' || $slider_layout == 'five' ) echo '<div class="container">'; ?>
            <div class="<?php echo esc_attr( $add_class ); ?>banner-layout-<?php echo esc_attr( $slider_layout ); ?> owl-carousel">
        		<?php 
                if( ( $slider_layout == 'four' || $slider_layout == 'eight' ) && !( $size_detect->isMobile() && !$size_detect->isTablet() ) ) :
                    blossom_pin_pro_banner_slider_layout_four_custom( $slider_custom, $image_size, $ed_caption );
                else :
                    foreach( $slider_custom as $slide ){ 
                        if( $slide['thumbnail'] || $slide['title'] || $slide['subtitle'] ){ ?>
                        <div class="item">
            				<?php 
                            if( $slide['thumbnail'] ){
            				    $image = wp_get_attachment_image_url( $slide['thumbnail'], $image_size ); ?>
        				        <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $slide['title'] );?>" itemprop="image" />
                                <?php
            				}
                            
                            if( $ed_caption ){ ?>                        
        						<div class="text-holder">
        							<?php
                                        if( $slider_layout == 'seven' ) echo '<div class="holder">';
                                        if( $slide['subtitle'] ){
                                            echo '<span class="category">';
                                            echo ( $slide['link'] ) ? '<a href="' . esc_url( $slide['link'] ) . '">' : '<span>';
                                            echo esc_html( $slide['subtitle'] ); 
                                            echo ( $slide['link'] ) ? '</a>' : '</span>';
                                            echo '</span>';    
                                        } 
                                        if( $slide['title'] ){
                                            echo '<h2 class="entry-title">';
                                            echo ( $slide['link'] ) ? '<a href="' . esc_url( $slide['link'] ) . '" rel="bookmark">' : '<span>';
                                            echo wp_kses_post( $slide['title'] );
                                            echo ( $slide['link'] ) ? '</a>' : '</span>';
                                            echo '</h2>';    
                                        }
                                        if( $slider_layout == 'seven' ) echo '</div>';
                                    ?>
        						</div>
                            <?php } ?>
            			</div>
            			<?php 
                        }
                    } 
                endif; 
                ?>                        
        	</div>
            <?php if( $slider_layout == 'three' || $slider_layout == 'four' || $slider_layout == 'five' ) echo '</div>';
        }            
    } 
}
endif;

if( ! function_exists( 'blossom_pin_pro_theme_comment' ) ) :
/**
 * Callback function for Comment List
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
function blossom_pin_pro_theme_comment( $comment, $args, $depth ){
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
	<?php endif; ?>
    	
        <footer class="comment-meta">
            <div class="comment-author vcard">
        	   <?php if ( $args['avatar_size'] != 0 ) blossom_pin_pro_gravatar( $comment, $args['avatar_size'] ); ?>
        	</div><!-- .comment-author vcard -->
        </footer>
        
        <div class="text-holder">
        	<div class="top">
                <div class="left">
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'blossom-pin-pro' ); ?></em>
                		<br />
                	<?php endif; ?>
                    <?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s</b> <span class="says">says:</span>', 'blossom-pin-pro' ), get_comment_author_link() ); ?>
                	<div class="comment-metadata commentmetadata">
                        <?php esc_html_e( 'Posted on', 'blossom-pin-pro' );?>
                        <a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
                    		<time itemprop="commentTime" datetime="<?php echo esc_attr( get_gmt_from_date( get_comment_date() . get_comment_time(), 'Y-m-d H:i:s' ) ); ?>"><?php printf( esc_html__( '%1$s at %2$s', 'blossom-pin-pro' ), get_comment_date(),  get_comment_time() ); ?></time>
                        </a>
                	</div>
                </div>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            	</div>
            </div>            
            <div class="comment-content" itemprop="commentText"><?php comment_text(); ?></div>        
        </div><!-- .text-holder -->
        
	<?php if ( 'div' != $args['style'] ) : ?>
    </div><!-- .comment-body -->
	<?php endif; ?>
    
<?php
}
endif;

if( ! function_exists( 'blossom_pin_pro_sidebar' ) ) :
/**
 * Return sidebar layouts for pages/posts
*/
function blossom_pin_pro_sidebar( $class = false ){
    global $post;
    $return      = false;
    $layout      = get_theme_mod( 'layout_style', 'right-sidebar' ); //Default Layout Style for Styling Settings
    $array_one   = array( 'layout-one', 'layout-two', 'layout-three', 'layout-four', 'layout-five', 'layout-six' );
    $array_two   = array( 'layout-one-right-sidebar', 'layout-two-right-sidebar', 'layout-three-right-sidebar', 'layout-four-right-sidebar', 'layout-five-right-sidebar', 'layout-six-right-sidebar' );
    $array_three = array( 'layout-one-left-sidebar', 'layout-two-left-sidebar', 'layout-three-left-sidebar', 'layout-four-left-sidebar', 'layout-five-left-sidebar', 'layout-six-left-sidebar' );
    
    if( ( is_front_page() && is_home() ) || is_home() ){ 
        
        $home_sidebar = get_theme_mod( 'home_page_sidebar', 'sidebar' );
        $home_layout  = get_theme_mod( 'home_layout', 'layout-one' );
        
        if( in_array( $home_layout, $array_one ) ){  
            $return = $class ? $home_layout : false; //Fullwidth        
        }elseif( is_active_sidebar( $home_sidebar ) ){
            if( $class ){                
                if( in_array( $home_layout, $array_two ) ) $return = $home_layout; 
                if( in_array( $home_layout, $array_three ) ) $return = $home_layout;                
            }else{
                $return = $home_sidebar; //With Sidebar
            }
        }else{
            $return = $class ? 'layout-one' : false; //Fullwidth
        }        
    }
    
    if( is_archive() ){
        //archive page
        $archive_sidebar = get_theme_mod( 'archive_page_sidebar', 'sidebar' );
        $cat_sidebar     = get_theme_mod( 'cat_archive_page_sidebar', 'default-sidebar' );
        $tag_sidebar     = get_theme_mod( 'tag_archive_page_sidebar', 'default-sidebar' );
        $date_sidebar    = get_theme_mod( 'date_archive_page_sidebar', 'default-sidebar' );
        $author_sidebar  = get_theme_mod( 'author_archive_page_sidebar', 'default-sidebar' ); 
        
        if( is_category() ){            
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( $cat_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $cat_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $cat_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }                
        }elseif( is_tag() ){            
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( ( $tag_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $tag_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $tag_sidebar;
                }           
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }            
        }elseif( is_author() ){            
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( ( $author_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $author_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $author_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }            
        }elseif( is_date() ){            
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( ( $date_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $date_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $date_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }
        }elseif( is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() ) ){ //For Woocommerce            
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( is_active_sidebar( 'shop-sidebar' ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar';
                }else{
                    $return = 'shop-sidebar';
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }       
        }else{
            if( is_active_sidebar( $archive_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }                      
        }        
    }
    
    if( is_singular() ){         
        $post_sidebar = get_theme_mod( 'single_post_sidebar', 'sidebar' ); //Global sidebar for single post from customizer
        $page_sidebar = get_theme_mod( 'single_page_sidebar', 'sidebar' ); //Global Sidebar for single page from customizer
        $page_layout  = get_theme_mod( 'page_sidebar_layout', 'right-sidebar' ); //Global Layout/Position for Pages
        $post_layout  = get_theme_mod( 'post_sidebar_layout', 'right-sidebar' ); //Global Layout/Position for Posts        
        
        /**
         * Individual post/page layout
        */
        if( get_post_meta( $post->ID, '_blossom_pin_pro_sidebar_layout', true ) ){
            $sidebar_layout = get_post_meta( $post->ID, '_blossom_pin_pro_sidebar_layout', true );
        }else{
            $sidebar_layout = 'default-sidebar';
        }
        
        /**
         * Individual post/page sidebar
        */     
        if( get_post_meta( $post->ID, '_blossom_pin_pro_sidebar', true ) ){
            $single_sidebar = get_post_meta( $post->ID, '_blossom_pin_pro_sidebar', true );
        }else{
            $single_sidebar = 'default-sidebar';
        }
        
        if( is_page() ){
            if( is_page_template( 'templates/blossom-portfolio.php' ) ){
                $return = $class ? 'full-width centered' : false;
            }elseif( $sidebar_layout == 'centered' || ( $sidebar_layout == 'default-sidebar' && $page_layout == 'centered' ) ){
                $return = $class ? 'full-width centered' : false;
            }elseif( $single_sidebar == 'default-sidebar' && is_active_sidebar( $page_sidebar ) ){
                if( $class ){
                    if( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) $return = 'rightsidebar';
                    if( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) $return = 'leftsidebar';
                }else{
                    $return = $page_sidebar;
                }
            }elseif( is_active_sidebar( $single_sidebar ) ){
                if( $class ){
                    if( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) $return = 'rightsidebar';
                    if( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) $return = 'leftsidebar';
                }else{
                    $return = $single_sidebar;
                }
            }else{
                $return = $class ? 'full-width centered' : false; //Fullwidth
            }
        }
        
        if( is_single() ){
            if( 'product' === get_post_type() ){ //For Product Post Type
                if( $post_layout == 'centered' ){
                    $return = $class ? 'full-width centered' : false; //Fullwidth
                }elseif( is_active_sidebar( 'shop-sidebar' ) ){
                    if( $class ){
                        if( $post_layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                        if( $post_layout == 'left-sidebar' ) $return = 'leftsidebar';
                    }else {
                        $return = 'shop-sidebar';
                    }
                }else{
                    $return = $class ? 'full-width centered' : false; //Fullwidth
                }
            }elseif( 'post' === get_post_type() ){ //For default post type
                if( $sidebar_layout == 'centered' || ( $sidebar_layout == 'default-sidebar' && $post_layout == 'centered' ) ){
                    $return = $class ? 'full-width centered' : false;
                }elseif( $single_sidebar == 'default-sidebar' && is_active_sidebar( $post_sidebar ) ){
                    if( $class ){
                        if( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) $return = 'rightsidebar';
                        if( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) $return = 'leftsidebar';
                    }else{
                        $return = $post_sidebar;
                    }
                }elseif( is_active_sidebar( $single_sidebar ) ){
                    if( $class ){
                        if( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) $return = 'rightsidebar';
                        if( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) $return = 'leftsidebar';
                    }else{
                        $return = $single_sidebar;
                    }
                }else{
                    $return = $class ? 'full-width centered' : false; //Fullwidth
                }
            }else{ //Custom Post Type
                if( $post_layout == 'centered' ){
                    $return = $class ? 'full-width centered' : false;
                }elseif( is_active_sidebar( $post_sidebar ) ){
                    if( $class ){
                        if( $post_layout == 'right-sidebar' ) $return = 'rightsidebar';
                        if( $post_layout == 'left-sidebar' ) $return = 'leftsidebar';
                    }else{
                        $return = $post_sidebar;
                    }
                }else{
                    $return = $class ? 'full-width centered' : false; //Fullwidth
                }
            }
        }
    } 
        
    if( is_search() ){
        $search_sidebar = get_theme_mod( 'search_page_sidebar', 'sidebar' );       
        
        if( $layout == 'no-sidebar' ){
            $return = $class ? 'full-width' : false;
        }elseif( is_active_sidebar( $search_sidebar ) ){
            if( $class ){
                if( $layout == 'right-sidebar' ) $return = 'rightsidebar';
                if( $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                $return = $search_sidebar;
            }
        }else{
            $return = $class ? 'full-width' : false; //Fullwidth
        }        
    }
      
    return $return; 
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_posts' ) ) :
/**
 * Fuction to list Custom Post Type
*/
function blossom_pin_pro_get_posts( $post_type = 'post', $slug = false ){    
    $args = array(
    	'posts_per_page'   => -1,
    	'post_type'        => $post_type,
    	'post_status'      => 'publish',
    	'suppress_filters' => true 
    );
    $posts_array = get_posts( $args );
    
    // Initate an empty array
    $post_options = array();
    $post_options[''] = __( ' -- Choose -- ', 'blossom-pin-pro' );
    if ( ! empty( $posts_array ) ) {
        foreach ( $posts_array as $posts ) {
            if( $slug ){
                $post_options[ $posts->post_title ] = $posts->post_title;
            }else{
                $post_options[ $posts->ID ] = $posts->post_title;    
            }
        }
    }
    return $post_options;
    wp_reset_postdata();
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_categories' ) ) :
/**
 * Function to list post categories in customizer options
*/
function blossom_pin_pro_get_categories( $select = true, $taxonomy = 'category', $slug = false ){    
    /* Option list of all categories */
    $categories = array();
    
    $args = array( 
        'hide_empty' => false,
        'taxonomy'   => $taxonomy 
    );
    
    $catlists = get_terms( $args );
    if( $select ) $categories[''] = __( 'Choose Category', 'blossom-pin-pro' );
    foreach( $catlists as $category ){
        if( $slug ){
            $categories[$category->slug] = $category->name;
        }else{
            $categories[$category->term_id] = $category->name;    
        }        
    }
    
    return $categories;
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_id_from_page' ) ) :
/**
 * Get page ids from page name.
*/
function blossom_pin_pro_get_id_from_page( $slider_pages ){
    if( $slider_pages ){
        $ids = array();
        foreach( $slider_pages as $p ){
             if( !empty( $p['page'] ) ){
                $page_ids = get_page_by_title( $p['page'] );
                $ids[] = $page_ids->ID;
             }
        }   
        return $ids;
    }else{
        return false;
    }
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_patterns' ) ) :
/**
 * Function to list Custom Pattern
*/
function blossom_pin_pro_get_patterns(){
    $patterns = array();
    $patterns['nobg'] = get_template_directory_uri() . '/images/patterns_thumb/' . 'nobg.png';
    for( $i=0; $i<38; $i++ ){
        $patterns['pattern'.$i] = get_template_directory_uri() . '/images/patterns_thumb/' . 'pattern' . $i .'.png';
    }
    for( $j=1; $j<26; $j++ ){
        $patterns['hbg'.$j] = get_template_directory_uri() . '/images/patterns_thumb/' . 'hbg' . $j . '.png';
    }
    return $patterns;
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_dynamnic_sidebar' ) ) :
/**
 * Function to list dynamic sidebar
*/
function blossom_pin_pro_get_dynamnic_sidebar( $nosidebar = false, $sidebar = false, $default = false ){
    $sidebar_arr = array();
    $sidebars = get_theme_mod( 'sidebar' );
    
    if( $default ) $sidebar_arr['default-sidebar'] = __( 'Default Sidebar', 'blossom-pin-pro' );
    if( $sidebar ) $sidebar_arr['sidebar'] = __( 'Sidebar', 'blossom-pin-pro' );
    
    if( $sidebars ){        
        foreach( $sidebars as $sidebar ){            
            $id = $sidebar['name'] ? sanitize_title( $sidebar['name'] ) : 'blossom-pin-pro-sidebar-one';
            $sidebar_arr[$id] = $sidebar['name'];
        }
    }
    
    if( $nosidebar ) $sidebar_arr['no-sidebar'] = __( 'No Sidebar', 'blossom-pin-pro' );
    
    return $sidebar_arr;
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_page_template_url' ) ) :
/**
 * Returns page template url if not found returns home page url
*/
function blossom_pin_pro_get_page_template_url( $page_template ){
    $args = array(
        'meta_key'   => '_wp_page_template',
        'meta_value' => $page_template,
        'post_type'  => 'page',
        'fields'     => 'ids',
    );
    
    $posts_array = get_posts( $args );
    
    $url = ( $posts_array ) ? get_permalink( $posts_array[0] ) : get_home_url();
    return $url;    
}
endif;

if( ! function_exists( 'blossom_pin_pro_author_social' ) ) :
/**
 * Author Social Links
*/
function blossom_pin_pro_author_social(){
    $id      = get_the_author_meta( 'ID' );
    $socials = get_user_meta( $id, '_blossom_pin_pro_user_social_icons', true );
    $fonts   = array(
        'facebook'     => 'fab fa-facebook-f', 
        'twitter'      => 'fab fa-twitter',
        'instagram'    => 'fab fa-instagram',
        'snapchat'     => 'fab fa-snapchat',
        'pinterest'    => 'fab fa-pinterest',
        'linkedin'     => 'fab fa-linkedin-in',
        'google-plus'  => 'fab fa-google-plus',
        'youtube'      => 'fab fa-youtube'
    );
    
    if( $socials ){
        echo '<ul class="social-networks">';
        foreach( $socials as $key => $link ){
            $add = ( $key == 'youtube' ) ? '-play' : '';
            if( $link ) echo '<li><a href="' . esc_url( $link ) . '" target="_blank" rel="nofollow noopener"><i class="' . esc_attr( $fonts[$key] ) . '"></i></a></li>';
        }
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_real_ip_address' )):
/**
 * Get the actual ip address 
*/
function blossom_pin_pro_get_real_ip_address(){
    if( getenv( 'HTTP_CLIENT_IP' ) ){
        $ip = getenv( 'HTTP_CLIENT_IP' );
    }elseif( getenv( 'HTTP_X_FORWARDED_FOR' ) ){
        $ip = getenv('HTTP_X_FORWARDED_FOR' );
    }elseif( getenv( 'HTTP_X_FORWARDED' ) ){
        $ip = getenv( 'HTTP_X_FORWARDED' );
    }elseif( getenv( 'HTTP_FORWARDED_FOR' ) ){
        $ip = getenv( 'HTTP_FORWARDED_FOR' );
    }elseif( getenv( 'HTTP_FORWARDED' ) ){
        $ip = getenv( 'HTTP_FORWARDED' );
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    
    return $ip;
}
endif;

if( ! function_exists( 'blossom_pin_pro_likes_can' ) ) :
/**
 * Check if the current IP already liked the content or not.
 */
function blossom_pin_pro_likes_can( $id = 0 ) {
    // Return early if $id is not set.
    if( ! $id ){
        return false;
    }
    
    $ip_list = ( $ip = get_post_meta( $id, '_blossom_pin_pro_post_like_ip', true ) ) ? $ip  : array();

    if( ( $ip_list == '' ) || ( is_array( $ip_list ) && ! in_array( blossom_pin_pro_get_real_ip_address(), $ip_list ) ) ){
        return true;
    }

    return false;
}
endif;

if( ! function_exists( 'blossom_pin_pro_like_count' ) ) :
/**
 * Prints like count of post
*/
function blossom_pin_pro_like_count(){
    $ed_post_like = get_theme_mod( 'ed_post_like', true );
    if( $ed_post_like ) :
        global $post;
        $class = blossom_pin_pro_likes_can( $post->ID ) ? 'like' : 'liked';
        echo '<div class="bpp_ajax_like" id="like-' . esc_attr( $post->ID ) . '"><div class="btn-like ' . esc_attr( $class ) . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-19337 -11164 16 14.667"><path id="love" class="cls-1" d="M8,3.29C6.674-.309,0,.225,0,5.669c0,2.712,2.04,6.321,8,10,5.96-3.677,8-7.286,8-10,0-5.412-6.667-6-8-2.379Z" transform="translate(-19337 -11165)"/></svg></div></div>';
    endif;
}
endif;

if( ! function_exists( 'blossom_pin_pro_single_like_count' ) ) :
/**
 * Prints like count of post
*/
function blossom_pin_pro_single_like_count(){
    $ed_post_like = get_theme_mod( 'ed_post_like', true );
    if( $ed_post_like ) :
        global $post;
        $class = blossom_pin_pro_likes_can( $post->ID ) ? 'like' : 'liked';
        echo '<div class="bpp_single_ajax_like" data-id="singlelike-' . esc_attr( $post->ID ) . '"><div class="btn-like single-like ' . esc_attr( $class ) . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-19337 -11164 16 14.667"><path id="love" class="cls-1" d="M8,3.29C6.674-.309,0,.225,0,5.669c0,2.712,2.04,6.321,8,10,5.96-3.677,8-7.286,8-10,0-5.412-6.667-6-8-2.379Z" transform="translate(-19337 -11165)"/></svg><span class="post-like-count">' . blossom_pin_pro_get_like_count( $post->ID ) . '</span></div></div>';
    endif;
}
endif;

if( ! function_exists( 'blossom_pin_pro_get_like_count' ) ) :
/**
 * Return post like count
*/
function blossom_pin_pro_get_like_count( $post_id ){
    $count = get_post_meta( $post_id, '_blossom_pin_pro_post_like', true );
    if( $count ){
        return $count;
    }else{
        return 0;
    }   
}
endif;


if( ! function_exists( 'blossom_pin_pro_get_ad_block' ) ) :
/**
 * Get AD before single content
*/
function blossom_pin_pro_get_ad_block(  $image, $link = false, $target, $adcode = false, $ed_adcode ){
    $home_layout  = get_theme_mod( 'home_layout', 'layout-one' );
    if( is_home() && ( $home_layout == 'layout-four' || $home_layout == 'layout-four-right-sidebar' || $home_layout == 'layout-four-left-sidebar' ) ){
        $ad_structure       = '<div class="post-thumbnail">';
        $ad_structure_end   = '</div>';
    }else{
        $ad_structure       = '<div class="holder"><div class="top">';
        $ad_structure_end   = '</div></div>';
    }

    if( is_single() ) {?>
        <div class="single-promotional-section">
            <div class="container">
                <?php
                    if ( $ed_adcode && $adcode ) {
                        echo $adcode;
                    }elseif( $image && ! $ed_adcode ) {
                        if( $link ) echo '<a href="' . esc_url( $link ) . '" ' . $target . '>' ?>
                            <img src="<?php echo esc_url( $image ); ?>" alt="advertisement" /> 
                    <?php if( $link ) echo '</a>';
                    } 
                ?> 
            </div>
        </div>
    <?php
    }elseif( $ed_adcode && $adcode ){ ?>
        <article id="ad-post-<?php the_ID(); ?>" class="post type-post status-publish format-standard has-post-thumbnail hentry latest_post advert" itemscope itemtype="https://schema.org/Blog">
            <?php  
                echo $ad_structure;
                echo $adcode;
                echo $ad_structure_end; 
            ?>
        </article>
    <?php 
    }elseif( $image && ! $ed_adcode ){ ?>
        <article id="ad-post-<?php the_ID(); ?>" class="post type-post status-publish format-standard has-post-thumbnail hentry latest_post advert" itemscope itemtype="https://schema.org/Blog">
            <?php echo $ad_structure;
            if( $link ) echo '<a href="' . esc_url( $link ) . '"' . $target . '>'; ?>
                <img src="<?php echo esc_url( $image ); ?>" />
            <?php if( $link ) echo '</a>';
            echo $ad_structure_end; ?>
        </article>
        <?php 
    }  
}
endif;

if( ! function_exists( 'blossom_pin_pro_escape_text_tags' ) ) :
/**
 * Remove new line tags from string
 *
 * @param $text
 * @return string
 */
function blossom_pin_pro_escape_text_tags( $text ) {
    return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
}
endif;

if( ! function_exists( 'blossom_pin_pro_fallback_image' ) ) :
/**
 * Prints Fallback Images
*/
function blossom_pin_pro_fallback_image( $image_size, $id = 0 ){
    $placeholder = get_template_directory_uri() . '/images/fallback/' . $image_size . '.jpg';
    if( get_theme_mod( 'ed_lazy_load', false ) ){
		$placeholder_src = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
		$layzr_attr = ' data-layzr="'.esc_attr( $placeholder ).'"';
	} else {
		$placeholder_src = $placeholder;
		$layzr_attr = '';
	}
    echo '<img src="' . esc_url( $placeholder_src ) . '" alt="' . esc_attr( get_the_title( $id ) ) . '"' . $layzr_attr . ' itemprop="image"/>';
}
endif;

if ( ! function_exists( 'blossom_pin_pro_apply_theme_shortcode' ) ) :
/**
 * Footer Shortcode
*/
function blossom_pin_pro_apply_theme_shortcode( $string ) {
    if ( empty( $string ) ) {
        return $string;
    }
    $search = array( '[the-year]', '[the-site-link]' );
    $replace = array(
        date_i18n( esc_html__( 'Y', 'blossom-pin-pro' ) ),
        '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>',
    );
    $string = str_replace( $search, $replace, $string );
    return $string;
}
endif;

/**
 * Is Blossom Theme Toolkit active or not
*/
function is_bttk_activated(){
    return class_exists( 'Blossomthemes_Toolkit' ) ? true : false;
}

/**
 * Is BlossomThemes Email Newsletters active or not
*/
function is_btnw_activated(){
    return class_exists( 'Blossomthemes_Email_Newsletter' ) ? true : false;        
}

/**
 * Is BlossomThemes Instagram Feed active or not
*/
function is_btif_activated(){
    return class_exists( 'Blossomthemes_Instagram_Feed' ) ? true : false;
}

/**
 * Query WooCommerce activation
 */
function is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}

/**
 * Check if Contact Form 7 Plugin is installed
*/
function is_cf7_activated(){
    return class_exists( 'WPCF7' ) ? true : false;
}

/**
 * Query Jetpack activation
*/
function is_jetpack_activated( $gallery = false ){
	if( $gallery ){
        return ( class_exists( 'jetpack' ) && Jetpack::is_module_active( 'tiled-gallery' ) ) ? true : false;
	}else{
        return class_exists( 'jetpack' ) ? true : false;
    }           
}

if ( ! function_exists( 'blossom_pin_pro_blog_layout_four' ) ) :
/**
 * Blog Layout Four
*/
function blossom_pin_pro_blog_layout_four() {
    $readmore = get_theme_mod( 'read_more_text', __( 'Read more', 'blossom-pin-pro' ) ); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">
        <?php blossom_pin_pro_post_format_content(); ?>
        <div class="text-holder">
            <header class="entry-header">
            <?php 
                blossom_pin_pro_category();
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            ?>
            </header>
            <?php blossom_pin_pro_entry_content(); ?>
            <footer class="entry-footer">
                <?php                    
                    echo '<a href="' . esc_url( get_the_permalink() ) . '" class="read-more">' . esc_html( $readmore ) . '</a>';
                    
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
        </div><!-- .text-holder -->  
    </article><!-- #post-<?php the_ID(); ?> -->
<?php }
endif;

if ( ! function_exists( 'blossom_pin_pro_blog_layout_image_size' ) ) :
/**
 * Blog Layout Image Size
*/
function blossom_pin_pro_blog_layout_image_size( $layout_four = false ) {
    $home_layout  = get_theme_mod( 'home_layout', 'layout-one' );
    
    if( $home_layout == 'layout-one' || $home_layout == 'layout-one-right-sidebar' || $home_layout == 'layout-one-left-sidebar' || $home_layout == 'layout-two' || $home_layout == 'layout-two-right-sidebar' || $home_layout == 'layout-two-left-sidebar' ) { 
        $image_size = 'full';
    }elseif( $home_layout == 'layout-three' || $home_layout == 'layout-three-right-sidebar' || $home_layout == 'layout-three-left-sidebar' ){ 
        $image_size = 'blossom-pin-blog-layout-three';
    }elseif( $home_layout == 'layout-four' || $home_layout == 'layout-four-right-sidebar' || $home_layout == 'layout-four-left-sidebar' ){ 
        $image_size = ( $layout_four ) ? 'full' : 'blossom-pin-blog-layout-four';
    }elseif( $home_layout == 'layout-five' || $home_layout == 'layout-five-right-sidebar' || $home_layout == 'layout-five-left-sidebar' || $home_layout == 'layout-six' || $home_layout == 'layout-six-right-sidebar' || $home_layout == 'layout-six-left-sidebar' ){
        $image_size = 'blossom-pin-blog-layout-five';
    }else{
        $image_size = 'full';
    }

    return $image_size;
}
endif;

if( ! function_exists( 'blossom_pin_pro_single_entry_header' ) ):
/**
 * Single Post Entry Header
 */
function blossom_pin_pro_single_entry_header(){ 
    $ed_cat_single = get_theme_mod( 'ed_category', false );
    $ed_normal_share = get_theme_mod( 'ed_normal_share', true );
    $single_layout = get_theme_mod( 'single_post_layout', 'one' ); 

    if( is_single() && !( is_woocommerce_activated() && is_product() )  ):
     ?>
    <header class="post-entry-header">
        <?php if( !$ed_cat_single) {?>
        <span class="category">
            <?php blossom_pin_pro_category(); ?>
        </span>
        <?php } ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php if( $ed_normal_share && ( $single_layout == 'one' || $single_layout == 'two' || $single_layout == 'three'  ) ) {
            blossom_pin_pro_social_share( '', true ); 
        } ?>                
    </header>
<?php 
    endif;
}
endif;

if ( ! function_exists( 'blossom_pin_pro_single_image_size' ) ) :
/**
 * Blog Layout Image Size
*/
function blossom_pin_pro_single_image_size() {
    $single_layout = get_theme_mod( 'single_post_layout', 'one' );
    
    if( $single_layout == 'one' || $single_layout == 'four' ) { 
        $image_size = 'blossom-pin-single-layout-one';
    }elseif( $single_layout == 'two' ){ 
        $image_size = 'blossom-pin-single-layout-two';
    }elseif( $single_layout == 'three' || $single_layout == 'six' ){ 
        $image_size = 'blossom-pin-single-layout-three';
    }elseif( $single_layout == 'five' ){ 
        $image_size = 'blossom-pin-single-layout-five';
    }else{
        $image_size = 'blossom-pin-single-layout-one';
    }

    return $image_size;
}
endif;

if ( ! function_exists( 'blossom_pin_pro_wp_get_attachment_meta' ) ) :
/**
 * Returns Attachment Ids
*/
function blossom_pin_pro_wp_get_attachment_meta( $attachment_id ) {
    $attachment = get_post( $attachment_id );
    return array(
        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink( $attachment->ID ),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}
endif;

if ( ! function_exists( 'blossom_pin_pro_banner_slider_layout_four' ) ) :
/**
 * Returns Attachment Ids
*/
function blossom_pin_pro_banner_slider_layout_four( $qry, $image_size, $ed_caption ) { 

    $slider_type    = get_theme_mod( 'slider_type', 'latest_posts' );
    $posts_per_page = get_theme_mod( 'no_of_slides', 6 );
    $count = ( $slider_type == 'latest_posts' ) ? $posts_per_page : $qry->found_posts;
    $count = $count - ( $count % 3 );
    $index = 1;
    ?>
    <div class="item">
        <?php while( $qry->have_posts() ){ $qry->the_post(); ?>
        <div class="holder">
            <?php 
            if( has_post_thumbnail() ){
                the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
            }
            
            if( $ed_caption ){ ?>                        
            <div class="text-holder">
                <?php
                    blossom_pin_pro_category();
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                ?>
            </div>
            <?php } ?>
        </div>
        <?php 
        $count--; 
        
        if( $index % 3 == 0 && $count > 0 ){
            echo '</div><div class="item">';
        }elseif( $count == 0 ){
            break;
        }
        $index++; 
        } ?>
    </div>
<?php }
endif;

if ( ! function_exists( 'blossom_pin_pro_banner_slider_layout_four_custom' ) ) :
/**
 * Returns Attachment Ids
*/
function blossom_pin_pro_banner_slider_layout_four_custom( $slider_custom, $image_size, $ed_caption ) { 

    $count = count( $slider_custom );
    $count = $count - ( $count % 3 );
    $index = 1;
    ?>
    <div class="item">
        <?php foreach( $slider_custom as $slide ){ 
            if( $slide['thumbnail'] || $slide['title'] || $slide['subtitle'] ){ ?>
            <div class="holder">
                <?php 
                if( $slide['thumbnail'] ){
                    $image = wp_get_attachment_image_url( $slide['thumbnail'], $image_size ); ?>
                    <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $slide['title'] );?>" itemprop="image" />
                    <?php
                }
                
                if( $ed_caption ){ ?>                        
                    <div class="text-holder">
                        <?php
                            if( $slide['subtitle'] ){
                                echo '<span class="category">';
                                echo ( $slide['link'] ) ? '<a href="' . esc_url( $slide['link'] ) . '">' : '<span>';
                                echo esc_html( $slide['subtitle'] ); 
                                echo ( $slide['link'] ) ? '</a>' : '</span>';
                                echo '</span>';    
                            } 
                            if( $slide['title'] ){
                                echo '<h2 class="entry-title">';
                                echo ( $slide['link'] ) ? '<a href="' . esc_url( $slide['link'] ) . '" rel="bookmark">' : '<span>';
                                echo wp_kses_post( $slide['title'] );
                                echo ( $slide['link'] ) ? '</a>' : '</span>';
                                echo '</h2>';    
                            }
                        ?>
                    </div>
                <?php } ?>
            </div>
            <?php }
            $count--; 
            
            if( $index % 3 == 0 && $count > 0 ){
                echo '</div><div class="item">';
            }elseif( $count == 0 ){
                break;
            }
            $index++;
        } ?>
    </div>
<?php
}
endif;

if( ! function_exists( 'blossom_pin_pro_post_format_image' ) ) :
/**
 * Get Post Format Image
*/
function blossom_pin_pro_post_format_image( $show ){
    global $post;
    $custom_image = get_post_meta( $post->ID, '_bpp_format_custom_image', true );
    $archive_layout = get_theme_mod( 'archive_layout', 'archive-one' );

    if ( '' != $custom_image ) {
        if ( is_home() ) { 
            $thumbnail_size = blossom_pin_pro_blog_layout_image_size( true );
        } elseif( is_archive() || is_search() ) {
            $thumbnail_size = 'full';
        } elseif( is_single() ) {
            $thumbnail_size = blossom_pin_pro_single_image_size();
        } else {
            $thumbnail_size = 'thumbnail';
        }

        $image_meta        = wp_get_attachment_image_url( $custom_image, $thumbnail_size );
        $attachment_meta   = blossom_pin_pro_wp_get_attachment_meta( $custom_image );
        $attachment_alt    = ! empty( $attachment_meta['alt'] ) ? $attachment_meta['alt'] : '';

        if ( $image_meta ) :
            echo ( $show == true ) ? '<div class="post-thumbnail">' : '<div class="single_post_image">';
            if( $show == true ) echo '<a href="'. esc_url( get_permalink() ) .'" itemprop = "image">';
            echo '<img src="'. esc_url( $image_meta ).'" alt="'. esc_attr( $attachment_alt ) .'">';
            if( $show == true ) echo '</a>';
            if( $show == true ) blossom_pin_pro_like_count();
            echo '</div>';
        endif; 
    } elseif( ! is_single() ) {
        blossom_pin_pro_post_thumbnail();
    }
}
endif;

if( ! function_exists( 'blossom_pin_pro_post_format_video' ) ) :
/**
 * Get Post Format Video
*/
function blossom_pin_pro_post_format_video( $show ){
    global $post;
    if ( get_post_meta( $post->ID, '_bpp_format_video_embed', true ) != '' ) {
        $url = get_post_meta( get_the_ID(), '_bpp_format_video_embed', true );
        $embed_code = wp_oembed_get( $url );
        echo ( $show == true ) ? '<div class="post-thumbnail"><div class="blog_post_video">' : '<div class="single_post_video">';
            echo $embed_code;
            if( $show == true ) blossom_pin_pro_like_count();
        echo ( $show == true ) ? '</div></div>' : '</div>';
    } elseif( ! is_single() ) {
        blossom_pin_pro_post_thumbnail();
    }
}
endif;

if( ! function_exists( 'blossom_pin_pro_post_format_gallery' ) ) :
/**
 * Get Post Format Gallery
*/
function blossom_pin_pro_post_format_gallery( $show ){
    global $post;
    $gallery_ids = get_post_meta( $post->ID, '_bpp_format_custom_gallery', true );
    $image_size  = ( $show == true ) ? blossom_pin_pro_blog_layout_image_size( false ) : blossom_pin_pro_single_image_size();

    if( ! empty( $gallery_ids ) ) {            

        echo ( $show == true ) ? '<div class="post-thumbnail"><div id="gallery'. esc_attr( $post->ID ).'" class="owl-carousel">' : '<div id="gallery-single" class="owl-carousel">';
        foreach ( $gallery_ids as $image_id ) {
            
            $attachment_meta        = blossom_pin_pro_wp_get_attachment_meta( $image_id );
            $attachment_alt         = ! empty( $attachment_meta['alt'] ) ? $attachment_meta['alt'] : '';
            if( $show == true ) echo '<a href="' . esc_url( get_the_permalink() ) .'">'; ?>
                <img alt="<?php echo esc_attr( $attachment_alt ); ?>"
                     src="<?php echo esc_url( wp_get_attachment_image_url( $image_id, $image_size ) ); ?>">
            <?php if( $show == true ) echo '</a>';
        }
        if( $show == true ) echo '</div>';
        if( $show == true ) blossom_pin_pro_like_count();
        echo '</div>';
    } elseif( ! is_single() ) {
        blossom_pin_pro_post_thumbnail();
    }
}
endif;

if( ! function_exists( 'blossom_pin_pro_post_format_audio' ) ) :
/**
 * Get Post Format Audio
*/
function blossom_pin_pro_post_format_audio( $show ){
    global $post;
    $sound_url = get_post_meta( $post->ID, '_bpp_format_audio_embed', true );
    $bpp_frame_tag = 'i' . 'frame';

    if( ! empty( $sound_url ) ) {
        echo ( $show == true ) ? '<div class="post-thumbnail">' : '<div class="single_post_audio">';
        if ( strpos( $sound_url, $bpp_frame_tag ) != false) {
            echo balanceTags( $sound_url );
        } elseif ( strpos( $sound_url, "webm" ) || strpos( $sound_url, ".ogv" ) || strpos( $sound_url, ".mp4" ) || strpos( $sound_url, ".m4v" ) || strpos( $sound_url, ".wmv" ) || strpos( $sound_url, ".mov" ) || strpos( $sound_url, ".qt" ) || strpos( $sound_url, ".flv" ) || strpos($sound_url, ".mp3") || strpos($sound_url, ".m4a") || strpos($sound_url, ".m4b") || strpos($sound_url, ".ogg") || strpos($sound_url, ".oga" ) || strpos( $sound_url, ".wma" ) || strpos( $sound_url, ".wav" ) ) {
            echo do_shortcode('[audio src="' . esc_url( $sound_url ) . '" width=100][/audio]');
        } elseif ( strpos( $sound_url, "soundcloud.com" ) ) {
            ?>
            <<?php echo esc_attr( $bpp_frame_tag ); ?> height="166" style="overflow:hidden;border:none;width:100%" src="https://w.soundcloud.com/player/?url=<?php echo esc_url( $sound_url ); ?>"></<?php echo esc_attr( $bpp_frame_tag ); ?>>
            <?php
        }
        if( $show == true ) blossom_pin_pro_like_count();
        echo '</div>';
    } elseif( ! is_single() ) {
        blossom_pin_pro_post_thumbnail();
    }
}
endif;

if( ! function_exists( 'blossom_pin_pro_post_format_quote' ) ) :
/**
 * Get Post Format Quote
*/
function blossom_pin_pro_post_format_quote( $show ){
    global $post;
    $quote_author_name    = get_post_meta( $post->ID, '_bpp_format_quote_source_name', true );
    $quote_author_content = get_post_meta( $post->ID, '_bpp_format_quote_source_content', true );

    if ( $quote_author_name || $quote_author_content ) {  
        echo ( $show == true ) ? '<div class="post-thumbnail">' : '<div class="single_post_quote">';
            if( $show == true ) { 
                $image_size = blossom_pin_pro_blog_layout_image_size( false );                        
                $quote_image = get_the_post_thumbnail_url( '', $image_size );    
                ?>
                <a href="<?php the_permalink(); ?>" style="background-image:url( '<?php echo esc_url( $quote_image ); ?>' ); background-repeat:no-repeat; background-size: cover">
            <?php } ?>
                <div class="blockquote-holder">
                    <blockquote>
                        <?php 
                            if ( $quote_author_content ) echo wpautop( wp_kses_post( $quote_author_content ) );

                            if ( $quote_author_name ) {                                
                                echo '<cite>-'. esc_html( $quote_author_name ) .'</cite>';
                            }
                        ?>
                    </blockquote>
                </div>
            <?php if( $show == true ) echo '</a>';
            if( $show == true ) blossom_pin_pro_like_count();
        echo '</div>';
    } elseif( ! is_single() ) {
        blossom_pin_pro_post_thumbnail();
    }
}
endif;

