<?php
/**
 * Blossom Recipe Pro Standalone Functions.
 *
 * @package Blossom_Recipe_Pro
 */

if ( ! function_exists( 'blossom_recipe_pro_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function blossom_recipe_pro_posted_on() {
	$ed_updated_post_date = get_theme_mod( 'ed_post_update_date', true );
    $on = __( 'on ', 'blossom-recipe-pro' );

    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		if( $ed_updated_post_date ){
            $time_string = '<time class="entry-date published updated" datetime="%3$s" itemprop="dateModified">%4$s</time><time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
            $on = __( 'updated on ', 'blossom-recipe-pro' );		  
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
    
    if( is_single() ) {
        $posted_on = sprintf( '%1$s %2$s', esc_html( $on ), '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );
    }else{
        $posted_on = sprintf( '%1$s', '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );
    }
	
	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'blossom_recipe_pro_posted_by' ) ) :
/**
 * Prints HTML with meta information for the current author.
 */
function blossom_recipe_pro_posted_by() {
	$byline = sprintf( '%s',
		'<span itemprop="name"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" itemprop="url">' . esc_html( get_the_author() ) . '</a></span>' 
    );
	echo '<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person">' . $byline . '</span>';
}
endif;

if( ! function_exists( 'blossom_recipe_pro_comment_count' ) ) :
/**
 * Comment Count
*/
function blossom_recipe_pro_comment_count(){
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments"><i class="far fa-comment"></i>';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'blossom-recipe-pro' ),
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

if ( ! function_exists( 'blossom_recipe_pro_category' ) ) :
/**
 * Prints categories
 */
function blossom_recipe_pro_category(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ' ', 'blossom-recipe-pro' ) );
		if ( $categories_list ) {
			echo '<span class="category" itemprop="about">' . $categories_list . '</span>';
		}
	}elseif( is_brm_activated() && 'blossom-recipe' === get_post_type() ){
        $categories_list = get_the_term_list( '', 'recipe-category' );
        if ( $categories_list ) {
            echo '<span class="category" itemprop="about">' . $categories_list . '</span>';
        }
    }
}
endif;

if ( ! function_exists( 'blossom_recipe_pro_tag' ) ) :
/**
 * Prints tags
 */
function blossom_recipe_pro_tag(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'blossom-recipe-pro' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<div class="tags" itemprop="about">' . esc_html__( '%1$sTags:%2$s %3$s', 'blossom-recipe-pro' ) . '</div>', '<span>', '</span>', $tags_list );
		}
	}
}
endif;

if( ! function_exists( 'blossom_recipe_pro_get_posts_list' ) ) :
/**
 * Returns Latest, Related & Popular Posts
*/
function blossom_recipe_pro_get_posts_list( $status ){
    global $post;
    $sidebar = blossom_recipe_pro_sidebar( true );
    $args = array(
        'posts_status'        => 'publish',
        'ignore_sticky_posts' => true
    );
    
    switch( $status ){
        case 'latest':        
        $args['post_type']      = 'post';
        $args['posts_per_page'] = 4;
        $title                  = __( 'Latest Posts', 'blossom-recipe-pro' );
        $class                  = 'latest';
        $image_size             = 'blossom-recipe-slider';
        break;

        case 'related-blog':        
        $args['post_type']      = 'blossom-recipe';
        $args['posts_per_page'] = 3;
        $args['post__not_in']   = array( $post->ID );
        $args['orderby']        = 'rand';
        $title                  = get_theme_mod( 'related_post_blog_title', __( 'You may also like', 'blossom-recipe-pro' ) );
        $class                  = 'related';
        $image_size             = 'blossom-recipe-blog-list';
        $related_tax            = get_theme_mod( 'related_blog_taxonomy', 'recipe-category' );
        if( $related_tax ){
            $cats = get_the_terms( $post->ID, $related_tax );
            if( !$cats ) return false;       
            $c = array();
            foreach( $cats as $cat ){
                $c[] = $cat->term_id; 
            }
            $args['tax_query']    = array( array( 'taxonomy' => $related_tax, 'terms' => $c ) );
        }
        break;
        
        case 'related':
        $args['post_type']      = 'post';
        $args['posts_per_page'] = ( $sidebar == 'full-width' ) ? 4 : 6;
        $args['post__not_in']   = array( $post->ID );
        $args['orderby']        = 'rand';
        $title                  = get_theme_mod( 'related_post_title', __( 'You may also like...', 'blossom-recipe-pro' ) );
        $class                  = 'related';
        $image_size             = 'blossom-recipe-slider';
        $related_tax            = get_theme_mod( 'related_taxonomy', 'cat' );
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
        break;        
    }

    $qry = new WP_Query( $args );
    
    if( $qry->have_posts() ){ ?>    
        <div class="<?php echo esc_attr( $class ); ?>-articles">
    		<?php 
            if( $title ) echo '<h3 class="' . esc_attr( $class ) . '-title">' . esc_html( $title ) . '</h3>'; ?>
            <div class="block-wrap">
    			<?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                <div class="article-block">
    				<figure class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                            <?php
                                if( has_post_thumbnail() ){
                                    the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                                }else{ 
                                    blossom_recipe_pro_get_fallback_svg( $image_size );
                                }
                            ?>
                        </a>
                    </figure>    
    				<header class="entry-header">
    					<?php
                            the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                        ?>                        
    				</header>
    			</div>
                <?php } ?>
            </div>                
    	</div>
        <?php
        wp_reset_postdata();
    }
}
endif;

if( ! function_exists( 'blossom_recipe_pro_site_branding' ) ) :
/**
 * Site Branding
*/
function blossom_recipe_pro_site_branding(){ 
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
                echo '<div class="site-title-wrap">';
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
                echo '</div>';
            endif;
            ?>
    	</div>    
    <?php
    endif;
}
endif;

if( ! function_exists( 'blossom_recipe_pro_social_links' ) ) :
/**
 * Social Links 
*/
function blossom_recipe_pro_social_links( $echo = true ){ 
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
    $ed_social    = get_theme_mod( 'ed_social_links', true ); 
    
    if( $ed_social && $social_links && $echo ){ ?>
    <ul class="social-icon-list">
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

if( ! function_exists( 'blossom_recipe_pro_form_section' ) ) :
/**
 * Form Icon
*/
function blossom_recipe_pro_form_section(){ ?>
    <div class="header-search">
        <span class="search-btn"><i class="fas fa-search"></i></span>
    </div>
    <?php
}
endif;

if( ! function_exists( 'blossom_recipe_pro_primary_nagivation' ) ) :
/**
 * Primary Navigation.
*/
function blossom_recipe_pro_primary_nagivation(){ ?>
	<nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<button class="toggle-button">
            <span class="toggle-bar"></span>
            <span class="toggle-bar"></span>
            <span class="toggle-bar"></span>
        </button>
        <?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => 'blossom_recipe_pro_primary_menu_fallback',
			) );
		?>
	</nav><!-- #site-navigation -->
    <?php
}
endif;

if( ! function_exists( 'blossom_recipe_pro_primary_menu_fallback' ) ) :
/**
 * Fallback for primary menu
*/
function blossom_recipe_pro_primary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="primary-menu" class="nav-menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'blossom-recipe-pro' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'blossom_recipe_pro_secondary_navigation' ) ) :
/**
 * Secondary Navigation
*/
function blossom_recipe_pro_secondary_navigation(){ ?>
    <div id="secondary-toggle-button">
        <span></span><?php esc_html_e( 'Menu', 'blossom-recipe-pro' ); ?>
    </div>
	<nav class="secondary-nav">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'secondary',
				'menu_id'        => 'secondary-menu',
                'fallback_cb'    => 'blossom_recipe_pro_secondary_menu_fallback',
			) );
		?>
	</nav>
    <?php
}
endif;

if( ! function_exists( 'blossom_recipe_pro_secondary_menu_fallback' ) ) :
/**
 * Fallback for secondary menu
*/
function blossom_recipe_pro_secondary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="secondary-menu" class="menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'blossom-recipe-pro' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'blossom_recipe_pro_get_banner' ) ) :
/**
 * Prints Banner Section
 * 
*/
function blossom_recipe_pro_get_banner( $slider_layout = 'one' ){
    $ed_banner      = get_theme_mod( 'ed_banner_section', 'slider_banner' );
    $slider_type    = get_theme_mod( 'slider_type', 'latest_posts' ); 
    $slider_cat     = get_theme_mod( 'slider_cat' );
    $slider_recipe_cat = get_theme_mod( 'slider_recipe_cat' );
    $slider_pages   = get_theme_mod( 'slider_pages' );
    $slider_custom  = get_theme_mod( 'slider_custom' );
    $posts_per_page = ( $slider_layout == 'two' ) ? 5 : get_theme_mod( 'no_of_slides', 5 );
    $ed_caption     = get_theme_mod( 'slider_caption', true );
    $caption_layout = get_theme_mod( 'slider_caption_layout', 'center' );
    $add_carousel_class = ( $slider_layout == 'two' ) ? '' : ' owl-carousel';
    
    if( $slider_layout == 'three' ){
        $image_size = 'blossom-recipe-slider-three';
    }elseif( $slider_layout == 'two' ){
        $image_size = 'blossom-recipe-slider-two';
    }else{
        $image_size = 'blossom-recipe-slider';
    }
    
    if( $ed_banner == 'static_banner' && has_custom_header() ){ ?>
        <div class="banner<?php if( has_header_video() ) echo esc_attr( ' video-banner' ); ?>">
            <?php the_custom_header_markup(); ?>
        </div>
        <?php
    }elseif( $ed_banner == 'slider_banner' ){
        if( $slider_type == 'latest_posts' || $slider_type == 'cat' || $slider_type == 'pages' || ( is_brm_activated() && ( $slider_type == 'latest_recipes' || $slider_type == 'cat_recipes' ) ) ){
        
            $args = array(
                'post_status'         => 'publish',            
                'ignore_sticky_posts' => true
            );
            if( $slider_type == 'cat_recipes' && $slider_recipe_cat ) {
                $args['post_type']      = 'blossom-recipe';
                $args['tax_query']      = array( array( 'taxonomy' => 'recipe-category', 'terms' => $slider_recipe_cat ) ); 
                $args['posts_per_page'] = -1;
            }elseif( $slider_type == 'latest_recipes' ){
                $args['post_type']      = 'blossom-recipe';
                $args['posts_per_page'] = $posts_per_page;          
            }elseif( $slider_type === 'cat' && $slider_cat ){
                $args['post_type']      = 'post';
                $args['cat']            = $slider_cat; 
                $args['posts_per_page'] = -1;  
            }elseif( $slider_type == 'pages' && $slider_pages ){
                $args['post_type']      = 'page';
                $args['posts_per_page'] = -1;
                $args['post__in']       = blossom_recipe_pro_get_id_from_page( $slider_pages );
                $args['orderby']        = 'post__in';
            }else{
                $args['post_type']      = 'post';
                $args['posts_per_page'] = $posts_per_page;
            }
                
            $qry = new WP_Query( $args );
        
            if( $qry->have_posts() ){ ?>
            <div class="site-banner slider-<?php echo esc_attr( $slider_layout ); ?>">
        		<div class="container">
                    <div class="banner-slider<?php echo esc_attr( $add_carousel_class ); ?>">
            			<?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                        <div class="slider-item">
                            <a href="<?php the_permalink(); ?>">
                            <?php  
                                if( has_post_thumbnail() ){
                				    the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
                				}else{ 
                				    blossom_recipe_pro_get_fallback_svg( $image_size );
                                }
                                
                                if( $slider_layout != 'one' ) echo '</a>';
                                if( $ed_caption ){ ?>                        
                                    <div class="banner-caption <?php if( $slider_layout == 'three' ) echo esc_attr( $caption_layout ); ?>">
                                        <?php if( $slider_layout != 'one' ) blossom_recipe_pro_category();

                                        if( $slider_layout == 'one' ) {
                                            the_title( '<h3 class="banner-title">', '</h3>' );
                                        }else{
                                            the_title( '<h3 class="banner-title"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                                        }
                                        ?>
                                    </div>
                                <?php } 
                            if( $slider_layout == 'one' ) echo '</a>'; ?>
            			</div>
            			<?php } ?>                        
            		</div>
                </div>
        	</div>
            <?php
            wp_reset_postdata();
            }
        
        }elseif( $slider_type == 'custom' && $slider_custom ){ ?>
            <div class="site-banner slider-<?php echo esc_attr( $slider_layout ); ?>">
        		<div class="container">
                    <div class="banner-slider<?php echo esc_attr( $add_carousel_class ); ?>">
            			<?php 
                        foreach( $slider_custom as $slide ){ 
                            if( $slide['thumbnail'] ){ ?>
                                <div class="slider-item">
                				<?php
                                    if( $slide['link'] ) echo '<a href="' . esc_url( $slide['link'] ) . '">';
                				    $image = wp_get_attachment_image_url( $slide['thumbnail'], $image_size ); ?>
            				        <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( strip_tags( $slide['title'] ) );?>" itemprop="image" />
                                    <?php if( $slider_layout != 'one' && $slide['link'] ) echo '</a>';
                                    if( $ed_caption && ( $slide['title'] || $slide['subtitle'] ) ){ ?>                        
                        				<div class="banner-caption <?php if( $slider_layout == 'three' ) echo esc_attr( $caption_layout ); ?>">
                							<?php
                                                if( $slide['subtitle'] && $slider_layout != 'one' ){
                                                    echo '<span class="category">';
                                                    if( $slide['link'] ) echo '<a href="' . esc_url( $slide['link'] ) . '">';
                                                    echo esc_html( $slide['subtitle'] ); 
                                                    if( $slide['link'] ) echo '</a>';
                                                    echo '</span>';    
                                                } 
                                                if( $slide['title'] ){
                                                    echo '<h3 class="banner-title">';
                                                    if( $slide['link'] ) echo '<a href="' . esc_url( $slide['link'] ) . '" rel="bookmark">';
                                                    echo wp_kses_post( $slide['title'] );
                                                    if( $slide['link'] ) echo '</a>';
                                                    echo '</h3>';    
                                                }
                                            ?>     
                        				</div>
                                    <?php }
                                    if( $slider_layout == 'one' && $slide['link'] ) echo '</a>'; ?>
                    			</div>
                			<?php 
                            } 
                        } 
                        ?>                        
            		</div>
                </div>
        	</div>
            <?php
        }            
    } 
}
endif;

if( ! function_exists( 'blossom_recipe_pro_theme_comment' ) ) :
/**
 * Callback function for Comment List *
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
function blossom_recipe_pro_theme_comment( $comment, $args, $depth ){
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
    <div id="div-comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/UserComments">
	<?php endif; ?>
    	<article class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
            	   <?php if ( $args['avatar_size'] != 0 ) echo blossom_recipe_pro_gravatar( $comment, $args['avatar_size'] ); ?>
                   <?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s</b> <span class="says">says:</span>', 'blossom-recipe-pro' ), get_comment_author_link() ); ?>
            	</div><!-- .comment-author vcard -->
                <div class="comment-metadata commentmetadata">
                    <a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
                        <time itemprop="commentTime" datetime="<?php echo esc_attr( get_gmt_from_date( get_comment_date() . get_comment_time(), 'Y-m-d H:i:s' ) ); ?>"><?php printf( esc_html__( '%1$s at %2$s', 'blossom-recipe-pro' ), get_comment_date(),  get_comment_time() ); ?></time>
                    </a>
                </div>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'blossom-recipe-pro' ); ?></p>
                    <br />
                <?php endif; ?>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </footer>            
            <div class="comment-content" itemprop="commentText"><?php comment_text(); ?></div>    
        </article>
        
	<?php if ( 'div' != $args['style'] ) : ?>
    </div><!-- .comment-body -->
	<?php endif; ?>
<?php
}
endif;

if( ! function_exists( 'blossom_recipe_pro_sidebar' ) ) :
/**
 * Return sidebar layouts for pages/posts
*/
function blossom_recipe_pro_sidebar( $class = false ){
    global $post;
    $return      = false;
    $layout      = get_theme_mod( 'layout_style', 'right-sidebar' ); //Default Layout Style for Styling Settings
    $array_one   = array( 'one-full', 'two-full', 'three-full' );
    $array_two   = array( 'one', 'two', 'three' );
    $array_three = array( 'one-left', 'two-left', 'three-left' );
    
    if( ( is_front_page() && is_home() ) || is_home() ){ //blog/home page
                                                            
        $home_sidebar = get_theme_mod( 'home_page_sidebar', 'sidebar' );
        $home_layout  = get_theme_mod( 'home_layout', 'one' );
        
        if( in_array( $home_layout, $array_one ) ){  
            $return = $class ? 'full-width' : false; //Fullwidth        
        }elseif( is_active_sidebar( $home_sidebar ) ){
            if( $class ){                
                if( in_array( $home_layout, $array_two ) ) $return = 'rightsidebar'; 
                if( in_array( $home_layout, $array_three ) ) $return = 'leftsidebar';                
            }else{
                $return = $home_sidebar; //With Sidebar
            }
        }else{
            $return = $class ? 'full-width' : false; //Fullwidth
        }        
    }
    
    if( is_archive() ){
        //archive page
        $archive_sidebar = get_theme_mod( 'archive_page_sidebar', 'sidebar' );
        $cat_sidebar     = get_theme_mod( 'cat_archive_page_sidebar', 'default-sidebar' );
        $tag_sidebar     = get_theme_mod( 'tag_archive_page_sidebar', 'default-sidebar' );
        $date_sidebar    = get_theme_mod( 'date_archive_page_sidebar', 'default-sidebar' );
        $author_sidebar  = get_theme_mod( 'author_archive_page_sidebar', 'default-sidebar' ); 
        $archive_layout  = get_theme_mod( 'archive_layout', 'one' );
        
        if( is_category() ){            
            if( in_array( $archive_layout, $array_one ) ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( $cat_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ){
                if( $class ){
                    if( in_array( $archive_layout, $array_two ) ) $return = 'rightsidebar'; //With Sidebar
                    if( in_array( $archive_layout, $array_three ) ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $cat_sidebar ) ){
                if( $class ){
                    if( in_array( $archive_layout, $array_two ) ) $return = 'rightsidebar'; //With Sidebar
                    if( in_array( $archive_layout, $array_three ) ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $cat_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }                
        }elseif( is_tag() ){            
            if( in_array( $archive_layout, $array_one ) ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( ( $tag_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $class ){
                    if( in_array( $archive_layout, $array_two ) ) $return = 'rightsidebar'; //With Sidebar
                    if( in_array( $archive_layout, $array_three ) ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $tag_sidebar ) ){
                if( $class ){
                    if( in_array( $archive_layout, $array_two ) ) $return = 'rightsidebar'; //With Sidebar
                    if( in_array( $archive_layout, $array_three ) ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $tag_sidebar;
                }           
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }            
        }elseif( is_author() ){            
            if( in_array( $archive_layout, $array_one ) ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( ( $author_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $class ){
                    if( in_array( $archive_layout, $array_two ) ) $return = 'rightsidebar'; //With Sidebar
                    if( in_array( $archive_layout, $array_three ) ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $author_sidebar ) ){
                if( $class ){
                    if( in_array( $archive_layout, $array_two ) ) $return = 'rightsidebar'; //With Sidebar
                    if( in_array( $archive_layout, $array_three ) ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $author_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }            
        }elseif( is_date() ){            
            if( in_array( $archive_layout, $array_one ) ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( ( $date_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $class ){
                    if( in_array( $archive_layout, $array_two ) ) $return = 'rightsidebar'; //With Sidebar
                    if( in_array( $archive_layout, $array_three ) ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $date_sidebar ) ){
                if( $class ){
                    if( in_array( $archive_layout, $array_two ) ) $return = 'rightsidebar'; //With Sidebar
                    if( in_array( $archive_layout, $array_three ) ) $return = 'leftsidebar'; //With Sidebar
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
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }       
        }elseif( is_post_type_archive( 'blossom-recipe' ) || is_tax( 'recipe-category' ) || is_tax( 'recipe-cuisine' ) || is_tax( 'recipe-cooking-method' ) ){            
            if( in_array( $archive_layout, $array_one ) ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( ( $date_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $class ){
                    if( in_array( $archive_layout, $array_two ) ) $return = 'rightsidebar'; //With Sidebar
                    if( in_array( $archive_layout, $array_three ) ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }
        }else{
            if( is_active_sidebar( $archive_sidebar ) ){
                if( $class ){
                    if( in_array( $archive_layout, $array_two ) ) $return = 'rightsidebar'; //With Sidebar
                    if( in_array( $archive_layout, $array_three ) ) $return = 'leftsidebar'; //With Sidebar
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
        if( get_post_meta( $post->ID, '_blossom_recipe_pro_sidebar_layout', true ) ){
            $sidebar_layout = get_post_meta( $post->ID, '_blossom_recipe_pro_sidebar_layout', true );
        }else{
            $sidebar_layout = 'default-sidebar';
        }
        
        /**
         * Individual post/page sidebar
        */     
        if( get_post_meta( $post->ID, '_blossom_recipe_pro_sidebar', true ) ){
            $single_sidebar = get_post_meta( $post->ID, '_blossom_recipe_pro_sidebar', true );
        }else{
            $single_sidebar = 'default-sidebar';
        }
        
        if( is_page() ){
            $template = array( 'templates/template-recipe-category.php', 'templates/template-recipe-cooking-method.php', 'templates/template-recipe-cuisine.php', 'templates/blossom-portfolio.php' );
            if( is_page_template( $template ) ){
                $return = $class ? 'full-width' : false;
            }elseif( $sidebar_layout == 'no-sidebar' || ( $sidebar_layout == 'default-sidebar' && $page_layout == 'no-sidebar' ) ){
                $return = $class ? 'full-width' : false;
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
                $return = $class ? 'full-width' : false; //Fullwidth
            }
        }
        
        if( is_single() ){
            if( 'product' === get_post_type() ){ //For Product Post Type
                if( $post_layout == 'no-sidebar' || $post_layout == 'centered' ){
                    $return = $class ? 'full-width' : false; //Fullwidth
                }elseif( is_active_sidebar( 'shop-sidebar' ) ){
                    if( $class ){
                        if( $post_layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                        if( $post_layout == 'left-sidebar' ) $return = 'leftsidebar';
                    }
                }else{
                    $return = $class ? 'full-width' : false; //Fullwidth
                }
            }elseif( 'post' === get_post_type() ){ //For default post type
                if( $sidebar_layout == 'no-sidebar' || ( $sidebar_layout == 'default-sidebar' && $post_layout == 'no-sidebar' ) ){
                    $return = $class ? 'full-width' : false;
                }elseif( $sidebar_layout == 'centered' || ( $sidebar_layout == 'default-sidebar' && $post_layout == 'centered' ) ){
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
                    $return = $class ? 'full-width' : false; //Fullwidth
                }
            }else{ //Custom Post Type
                if( $post_layout == 'no-sidebar' ){
                    $return = $class ? 'full-width' : false;
                }elseif( $post_layout == 'centered' ){
                    $return = $class ? 'full-width centered' : false;
                }elseif( is_active_sidebar( $post_sidebar ) ){
                    if( $class ){
                        if( $post_layout == 'right-sidebar' ) $return = 'rightsidebar';
                        if( $post_layout == 'left-sidebar' ) $return = 'leftsidebar';
                    }else{
                        $return = $post_sidebar;
                    }
                }else{
                    $return = $class ? 'full-width' : false; //Fullwidth
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

    if( is_404() ){
        $return = $class ? 'full-width' : false; //Fullwidth        
    }
      
    return $return; 
}
endif;

if( ! function_exists( 'blossom_recipe_pro_get_posts' ) ) :
/**
 * Fuction to list Custom Post Type
*/
function blossom_recipe_pro_get_posts( $post_type = 'post', $slug = false ){    
    $args = array(
    	'posts_per_page'   => -1,
    	'post_type'        => $post_type,
    	'post_status'      => 'publish',
    	'suppress_filters' => true 
    );
    $posts_array = get_posts( $args );
    
    // Initate an empty array
    $post_options = array();
    $post_options[''] = __( ' -- Choose -- ', 'blossom-recipe-pro' );
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

if( ! function_exists( 'blossom_recipe_pro_get_id_from_page' ) ) :
/**
 * Get page ids from page name.
*/
function blossom_recipe_pro_get_id_from_page( $slider_pages ){
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


if( ! function_exists( 'blossom_recipe_pro_get_categories' ) ) :
/**
 * Function to list post categories in customizer options
*/
function blossom_recipe_pro_get_categories( $select = true, $taxonomy = 'category', $slug = false ){    
    /* Option list of all categories */
    $categories = array();
    
    $args = array( 
        'hide_empty' => false,
        'taxonomy'   => $taxonomy 
    );
    
    $catlists = get_terms( $args );
    if( $select ) $categories[''] = __( 'Choose Category', 'blossom-recipe-pro' );
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

if( ! function_exists( 'blossom_recipe_pro_get_patterns' ) ) :
/**
 * Function to list Custom Pattern
*/
function blossom_recipe_pro_get_patterns(){
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

if( ! function_exists( 'blossom_recipe_pro_get_dynamnic_sidebar' ) ) :
/**
 * Function to list dynamic sidebar
*/
function blossom_recipe_pro_get_dynamnic_sidebar( $nosidebar = false, $sidebar = false, $default = false ){
    $sidebar_arr = array();
    $sidebars = get_theme_mod( 'sidebar' );
    
    if( $default ) $sidebar_arr['default-sidebar'] = __( 'Default Sidebar', 'blossom-recipe-pro' );
    if( $sidebar ) $sidebar_arr['sidebar'] = __( 'Sidebar', 'blossom-recipe-pro' );
    
    if( $sidebars ){        
        foreach( $sidebars as $sidebar ){            
            $id = $sidebar['name'] ? sanitize_title( $sidebar['name'] ) : 'blossom-recipe-pro-sidebar-one';
            $sidebar_arr[$id] = $sidebar['name'];
        }
    }
    
    if( $nosidebar ) $sidebar_arr['no-sidebar'] = __( 'No Sidebar', 'blossom-recipe-pro' );
    
    return $sidebar_arr;
}
endif;

if( ! function_exists( 'blossom_recipe_pro_create_post' ) ) :
/**
 * A function used to programmatically create a post and assign a page template in WordPress. 
 *
 * @link https://tommcfarlin.com/programmatically-create-a-post-in-wordpress/
 * @link https://tommcfarlin.com/programmatically-set-a-wordpress-template/
 */
function blossom_recipe_pro_create_post( $title, $slug, $template ){

	// Setup the author, page
	$author_id = 1;
    
    // Look for the page by the specified title. Set the ID to -1 if it doesn't exist.
    // Otherwise, set it to the page's ID.
    $page = get_page_by_title( $title, OBJECT, 'page' );
    $page_id = ( null == $page ) ? -1 : $page->ID;
    
	// If the page doesn't already exist, then create it
	if( $page_id == -1 ){

		// Set the post ID so that we know the post was created successfully
		$post_id = wp_insert_post(
			array(
				'comment_status' =>	'closed',
				'ping_status'	 =>	'closed',
				'post_author'	 =>	$author_id,
				'post_name'		 =>	$slug,
				'post_title'	 =>	$title,
				'post_status'	 =>	'publish',
				'post_type'		 =>	'page'
			)
		);
        
        if( $post_id ) update_post_meta( $post_id, '_wp_page_template', $template );

	// Otherwise, we'll stop
	}else{
	   update_post_meta( $page_id, '_wp_page_template', $template );
	} // end if

} // end programmatically_create_post
endif;

if( ! function_exists( 'blossom_recipe_pro_author_social' ) ) :
/**
 * Author Social Links
*/
function blossom_recipe_pro_author_social(){
    $id      = get_the_author_meta( 'ID' );
    $socials = get_user_meta( $id, '_blossom_recipe_pro_user_social_icons', true );
    $fonts   = array(
        'facebook'     => 'fab fa-facebook-f', 
        'twitter'      => 'fab fa-twitter',
        'instagram'    => 'fab fa-instagram',
        'snapchat'     => 'fab fa-snapchat',
        'pinterest'    => 'fab fa-pinterest',
        'linkedin'     => 'fab fa-linkedin-in',
        'youtube'      => 'fab fa-youtube'
    );
    
    if( $socials ){
        echo ( is_single() ) ? '<div class="author-social">' : '<ul class="social-icon-list">';
        foreach( $socials as $key => $link ){
            $add = ( $key == 'youtube' ) ? '-play' : '';
            if( $link ) { 
                if( ! is_single() ) echo '<li>';
                echo '<a href="' . esc_url( $link ) . '" target="_blank" rel="nofollow noopener"><i class="' . esc_attr( $fonts[$key] ) . '"></i>';
                if( is_single() ) echo '<span>' . esc_html( $key ) . '</span>';
                echo '</a>'; 
                if( ! is_single() ) echo '</li>'; 
            }
        }
        echo ( is_single() ) ? '</div>' : '</ul>';
    }
}
endif;

if( ! function_exists( 'blossom_recipe_pro_get_real_ip_address' )):
/**
 * Get the actual ip address 
*/
function blossom_recipe_pro_get_real_ip_address(){
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

if( ! function_exists( 'blossom_recipe_pro_likes_can' ) ) :
/**
 * Check if the current IP already liked the content or not.
 */
function blossom_recipe_pro_likes_can( $id = 0 ) {
    // Return early if $id is not set.
    if( ! $id ){
        return false;
    }
    
    $ip_list = ( $ip = get_post_meta( $id, '_blossom_recipe_pro_post_like_ip', true ) ) ? $ip  : array();

    if( ( $ip_list == '' ) || ( is_array( $ip_list ) && ! in_array( blossom_recipe_pro_get_real_ip_address(), $ip_list ) ) ){
        return true;
    }

    return false;
}
endif;

if( ! function_exists( 'blossom_recipe_pro_like_count' ) ) :
/**
 * Prints like count of post
*/
function blossom_recipe_pro_like_count(){
    $ed_blog_like = get_theme_mod( 'ed_blog_like', true );
    if( $ed_blog_like ) :
        global $post;
        $likes_count = get_post_meta( $post->ID, '_blossom_recipe_pro_post_like', true );
        $class = ( ! $likes_count ) ? 'like' : 'liked';
        $add_structure  = ( ! $likes_count ) ? '<a href="javascript:void(0);">' : '<span class="liked-icon">';
        $add_structure_end  = ( ! $likes_count ) ? '</a>' : '</span>';
        echo '<div class="brp_ajax_like" id="like-' . esc_attr( $post->ID ) . '"><span class="favourite ' . esc_attr( $class ) . '">' . $add_structure . '<i class="fas fa-heart"></i>' . $add_structure_end . '<span class="fav-count">' . absint( $likes_count ) . esc_html__( ' Loves','blossom-recipe-pro' ) . '</span></span></div>';
    endif;
}
endif;

if( ! function_exists( 'blossom_recipe_pro_single_like_count' ) ) :
/**
 * Prints like count of post
*/
function blossom_recipe_pro_single_like_count(){
    $ed_single_like = get_theme_mod( 'ed_single_like', true );
    if( $ed_single_like ) :
        global $post;
        $likes_count = get_post_meta( $post->ID, '_blossom_recipe_pro_post_like', true );
        $class = ( ! $likes_count ) ? 'like' : 'liked';
        $add_structure  = ( ! $likes_count ) ? '<a href="javascript:void(0);">' : '<span class="liked-icon">';
        $add_structure_end  = ( ! $likes_count ) ? '</a>' : '</span>';
        echo '<div class="brp_single_ajax_like" id="singlelike-' . esc_attr( $post->ID ) . '"><span class="favourite single-like ' . esc_attr( $class ) . '">' . $add_structure . '<i class="fas fa-heart"></i>' . $add_structure_end . '<span class="fav-count">' . absint( $likes_count ) . esc_html__( ' Loves','blossom-recipe-pro' ) . '</span></span></div>';
    endif;
}
endif;

if( ! function_exists( 'blossom_recipe_pro_post_views' ) ) :
/**
 * Return post like count
*/
function blossom_recipe_pro_post_views( $post_id ){ ?>
    <span class="post-view">
        <i class="fas fa-eye"></i>
        <?php echo blossom_recipe_pro_get_views( $post_id ); ?>
    </span>
<?php }
endif;

if( ! function_exists( 'blossom_recipe_pro_get_ad_block' ) ) :
/**
 * Display AD block
 * 
 * @param $image     - Ad Image file
 * @param $link      - Ad Link
 * @param $target    - Link target
 * @param $adcode    - Adsence Adcode
 * @param $ed_adcode - Enable/disable Adcode
*/
function blossom_recipe_pro_get_ad_block( $image, $link = false, $target, $adcode = false, $ed_adcode ){
    ?>
    <div class="advertise-section">
        <div class="container">
    		<?php if( is_front_page() || is_home() ) {
                $advert_title = get_theme_mod( 'home_post_ad_title', __( 'Advertisement','blossom-recipe-pro' ) );
                echo '<h1 class="section-title"><span>' . esc_html( $advert_title ) . '</span></h1>';
            } ?>
            <?php 
                if( $ed_adcode && $adcode ){
                    echo $adcode; 
        		}elseif( $image && ! $ed_adcode ){
                    if( $link ) echo '<a href="' . esc_url( $link ) . '"' . $target . '>'; ?>
                        <img src="<?php echo esc_url( $image ); ?>" />
                    <?php 
                    if( $link ) echo '</a>'; 
                }
            ?>
        </div>		
	</div>
    <?php    
}
endif;

if( ! function_exists( 'blossom_recipe_pro_get_ad_before_content' ) ) :
/**
 * Get AD before single content
*/
function blossom_recipe_pro_get_ad_before_content(){
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
    
    if( $ed_ad && ( $ad_img || ( $ed_ad_code && $ad_code ) ) ) 
    blossom_recipe_pro_get_ad_block( $image, $ad_link, $target, $ad_code, $ed_ad_code );
}
endif;

if( ! function_exists( 'blossom_recipe_pro_escape_text_tags' ) ) :
/**
 * Remove new line tags from string
 *
 * @param $text
 * @return string
 */
function blossom_recipe_pro_escape_text_tags( $text ) {
    return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
}
endif;

if( ! function_exists( 'blossom_recipe_pro_get_image_sizes' ) ) :
/**
 * Get information about available image sizes
 */
function blossom_recipe_pro_get_image_sizes( $size = '' ) {
 
    global $_wp_additional_image_sizes;
 
    $sizes = array();
    $get_intermediate_image_sizes = get_intermediate_image_sizes();
 
    // Create the full array with sizes and crop info
    foreach( $get_intermediate_image_sizes as $_size ) {
        if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
            $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
            $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
            $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );
        } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
            $sizes[ $_size ] = array( 
                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
            );
        }
    } 
    // Get only 1 size if found
    if ( $size ) {
        if( isset( $sizes[ $size ] ) ) {
            return $sizes[ $size ];
        } else {
            return false;
        }
    }
    return $sizes;
}
endif;

if ( ! function_exists( 'blossom_recipe_pro_get_fallback_svg' ) ) :    
/**
 * Get Fallback SVG
*/
function blossom_recipe_pro_get_fallback_svg( $post_thumbnail ) {
    if( ! $post_thumbnail ){
        return;
    }
    
    $image_size = blossom_recipe_pro_get_image_sizes( $post_thumbnail );
     
    if( $image_size ){ ?>
        <div class="svg-holder">
             <svg class="fallback-svg" viewBox="0 0 <?php echo esc_attr( $image_size['width'] ); ?> <?php echo esc_attr( $image_size['height'] ); ?>" preserveAspectRatio="none">
                    <rect width="<?php echo esc_attr( $image_size['width'] ); ?>" height="<?php echo esc_attr( $image_size['height'] ); ?>" style="fill:#f2f2f2;"></rect>
            </svg>
        </div>
        <?php
    }
}
endif;

if ( ! function_exists( 'blossom_recipe_pro_apply_theme_shortcode' ) ) :
/**
 * Footer Shortcode
*/
function blossom_recipe_pro_apply_theme_shortcode( $string ) {
    if ( empty( $string ) ) {
        return $string;
    }
    $search = array( '[the-year]', '[the-site-link]' );
    $replace = array(
        date_i18n( esc_html__( 'Y', 'blossom-recipe-pro' ) ),
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
 * Check if Blossom Recipe Maker Plugin is installed
*/
function is_brm_activated(){
    return class_exists( 'Blossom_Recipe_Maker' ) ? true : false;
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

if ( ! function_exists( 'blossom_recipe_pro_get_views' ) ) :
/**
 * Function to get the post view count 
 */
function blossom_recipe_pro_get_views( $post_id ){
    $count_key = '_blossom_recipe_pro_view_count';
    $count = get_post_meta( $post_id, $count_key, true );
    if( $count == '' ){        
        return __( '0 View', 'blossom-recipe-pro' );
    }elseif( $count <= 1 ){
        return $count. __(' View', 'blossom-recipe-pro' );
    }else{
        return $count. __(' Views', 'blossom-recipe-pro' );    
    }    
}
endif;

if ( ! function_exists( 'blossom_recipe_pro_blog_layout_image_size' ) ) :
/**
 * Blog Layout Image Size
*/
function blossom_recipe_pro_blog_layout_image_size() {
    $blog_layout  = get_theme_mod( 'home_layout', 'one' );
    
    if( $blog_layout == 'one' || $blog_layout == 'one-left' ) { 
        $image_size = 'blossom-recipe-blog';
    }elseif( $blog_layout == 'one-full' ){ 
        $image_size = 'blossom-recipe-blog-one';
    }elseif( $blog_layout == 'two' || $blog_layout == 'two-left' || $blog_layout == 'three' || $blog_layout == 'three-left' ){ 
        $image_size = 'blossom-recipe-blog-grid';
    }elseif( $blog_layout == 'two-full' ){ 
        $image_size = 'blossom-recipe-slider-two';
    }elseif( $blog_layout == 'three-full' ){ 
        $image_size = 'blossom-recipe-blog-list';
    }else{
        $image_size = 'blossom-recipe-blog';
    }

    return $image_size;
}
endif;

if ( ! function_exists( 'blossom_recipe_pro_archive_layout_image_size' ) ) :
/**
 * Blog Layout Image Size
*/
function blossom_recipe_pro_archive_layout_image_size() {
    $archive_layout  = get_theme_mod( 'archive_layout', 'one' );
    
    if( $archive_layout == 'one' || $archive_layout == 'one-left' ) { 
        $image_size = 'blossom-recipe-blog';
    }elseif( $archive_layout == 'one-full' ){ 
        $image_size = 'blossom-recipe-blog-one';
    }elseif( $archive_layout == 'two' || $archive_layout == 'two-left' || $archive_layout == 'three' || $archive_layout == 'three-left' ){ 
        $image_size = 'blossom-recipe-blog-grid';
    }elseif( $archive_layout == 'two-full' ){ 
        $image_size = 'blossom-recipe-slider-two';
    }elseif( $archive_layout == 'three-full' ){ 
        $image_size = 'blossom-recipe-blog-list';
    }else{
        $image_size = 'blossom-recipe-blog';
    }

    return $image_size;
}
endif;