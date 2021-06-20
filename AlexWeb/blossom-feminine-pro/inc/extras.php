<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Blossom_Feminine_Pro
 */

if ( ! function_exists( 'blossom_feminine_pro_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function blossom_feminine_pro_posted_on() {
	$ed_updated_post_date = get_theme_mod( 'ed_post_update_date', true );
    $on = __( 'on ', 'blossom-feminine-pro' );
    
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        if( $ed_updated_post_date ){
            $time_string = '<time class="entry-date published updated" datetime="%3$s" itemprop="dateModified">%4$s</time><time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
            $on = __( 'updated on ', 'blossom-feminine-pro' );        
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

	$posted_on = sprintf(		
		'<span class="text-on">%1$s</span>%2$s',
        esc_html( $on ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
    echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'blossom_feminine_pro_posted_by' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function blossom_feminine_pro_posted_by() {
    global $post;
    $layout = get_theme_mod( 'single_post_layout', 'one' );

    if( $layout == 'two' || $layout == 'five' ) {
        $author_name = get_the_author_meta( 'display_name', $post->post_author );
        $author_url  = get_author_posts_url( get_the_author_meta( 'ID', $post->post_author ) );
    }else{
        $author_name = get_the_author();
        $author_url  = get_author_posts_url( get_the_author_meta( 'ID' ) );
    }
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'blossom-feminine-pro' ),
		'<span class="author vcard" itemprop="name"><a class="url fn n" href="' . esc_url( $author_url ) . '">' . esc_html( $author_name ) . '</a></span>'
	);
	echo '<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'blossom_feminine_pro_comment_count' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function blossom_feminine_pro_comment_count() {
    $child_theme_support = get_theme_mod( 'child_additional_support', 'default' );
    $comment = ( $child_theme_support == 'blossom_beauty' ) ? '<span class="comments"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
        <path id="comment" data-name="comment" d="M15.5,2H3.5A1.5,1.5,0,0,0,2,3.5V17l3-3H15.5A1.5,1.5,0,0,0,17,12.5v-9A1.5,1.5,0,0,0,15.5,2Zm0,10.5H5L3.5,14V3.5h12Z" transform="translate(-2 -2)"/>
        </svg>' : '<i class="fa fa-comment"></i>';
	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments">'. $comment ;
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'blossom-feminine-pro' ),
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

if ( ! function_exists( 'blossom_feminine_pro_categories' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function blossom_feminine_pro_categories() {
    $child_theme_support    = get_theme_mod( 'child_additional_support', 'default' );
	// Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {
	    if ( $child_theme_support == 'default' ) {
    		/* translators: used between list items, there is a space after the comma */
    		$categories_list = get_the_category_list( esc_html__( ', ', 'blossom-feminine-pro' ) );
    		if ( $categories_list ) {
    			echo '<span class="cat-links" itemprop="about">' . $categories_list . '</span>';
    		}
        }else{
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( ' ', 'blossom-feminine-pro' ) );
            if ( $categories_list ) {
                echo '<span class="cat-links" itemprop="about">' . $categories_list . '</span>';
            }
        }
	}		
}
endif;

if ( ! function_exists( 'blossom_feminine_pro_tags' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function blossom_feminine_pro_tags() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'blossom-feminine-pro' ) );
		if ( $tags_list ) {
			echo '<span class="tags">' . $tags_list . '</span>';
		}
	}
}
endif;

if ( ! function_exists( 'blossom_feminine_pro_edit_post_link' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function blossom_feminine_pro_edit_post_link() {
	if ( get_edit_post_link() ){
        edit_post_link(
    		sprintf(
    			wp_kses(
    				/* translators: %s: Name of current post. Only visible to screen readers */
    				__( 'Edit <span class="screen-reader-text">%s</span>', 'blossom-feminine-pro' ),
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
}
endif;

if( ! function_exists( 'blossom_feminine_pro_sidebar' ) ) :
/**
 * Return sidebar layouts for pages/posts
*/
function blossom_feminine_pro_sidebar( $sidebar = false, $class = false ){
    global $post;
    $return = false;
    
    if( ( is_front_page() && is_home() ) || is_home() ){
        //blog/home page 
        $home_sidebar = get_theme_mod( 'home_page_sidebar', 'sidebar' );
        $home_layout  = get_theme_mod( 'home_layout', 'one-col-right' );
        
        if( $home_layout == 'one-col' ){
            if( $sidebar ) $return = false; // Fullwidth
            if( $class ) $return = 'full-width';
        }elseif( $home_layout == 'one-col-alt' || $home_layout == 'three-col' || $home_layout == 'three-col-masonry' || $home_layout == 'one-col-small' || $home_layout == 'three-col-inside' ){  
            if( $sidebar ) $return = false; // Fullwidth
            if( $class ){
                if( $home_layout == 'one-col-alt' ) $return = 'blog-layout-two full-width'; 
                if( $home_layout == 'three-col' ) $return = 'blog-layout-three full-width'; 
                if( $home_layout == 'three-col-masonry' ) $return = 'blog-layout-three full-width masonry'; 
                if( $home_layout == 'one-col-small' ) $return = 'blog-layout-four full-width'; 
                if( $home_layout == 'three-col-inside' ) $return = 'blog-layout-five full-width';        
            }           
        }elseif( is_active_sidebar( $home_sidebar ) ){
            if( $sidebar ) $return = $home_sidebar; //With Sidebar
            if( $class ){                
                if( $home_layout == 'one-col-right' ) $return = 'rightsidebar'; 
                if( $home_layout == 'one-col-alt-right' ) $return = 'blog-layout-two rightsidebar';
                if( $home_layout == 'two-col-right' ) $return = 'blog-layout-three rightsidebar';
                if( $home_layout == 'one-col-small-right' ) $return = 'blog-layout-four rightsidebar';
                if( $home_layout == 'two-col-inside-right' ) $return = 'blog-layout-five rightsidebar';
                if( $home_layout == 'one-col-left' ) $return = 'leftsidebar'; 
                if( $home_layout == 'one-col-alt-left' ) $return = 'blog-layout-two leftsidebar';
                if( $home_layout == 'two-col-left' ) $return = 'blog-layout-three leftsidebar';
                if( $home_layout == 'one-col-small-left' ) $return = 'blog-layout-four leftsidebar';
                if( $home_layout == 'two-col-inside-left' ) $return = 'blog-layout-five leftsidebar';
            }
        }else{
            if( $sidebar ) $return = false; // Fullwidth
            if( $class ){  
                if( $home_layout == 'one-col-right' || $home_layout == 'one-col-left' ) $return = 'full-width';               
                if( $home_layout == 'one-col-alt-right' || $home_layout == 'one-col-alt-left' ) $return = 'blog-layout-two full-width';
                if( $home_layout == 'two-col-right' || $home_layout == 'two-col-left' ) $return = 'blog-layout-three full-width';
                if( $home_layout == 'one-col-small-right' || $home_layout == 'one-col-small-left' ) $return = 'blog-layout-four full-width';
                if( $home_layout == 'two-col-inside-right' || $home_layout == 'two-col-inside-left' ) $return = 'blog-layout-five full-width';
            }
        }        
    }
    
    if( is_archive() && is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() ) ){
        if( is_active_sidebar( 'shop-sidebar' ) ){
            if( $class ) $return = 'rightsidebar'; //With Sidebar
        }else{
            if( $class ) $return = 'full-width';
        }        
    }
    
    if( is_singular() ){
        $post_sidebar = get_theme_mod( 'single_post_sidebar', 'sidebar' );
        $page_sidebar = get_theme_mod( 'single_page_sidebar', 'sidebar' );
        $page_layout  = get_theme_mod( 'page_sidebar_layout', 'right-sidebar' ); //Default Layout Style for Pages
        $post_layout  = get_theme_mod( 'post_sidebar_layout', 'right-sidebar' ); //Default Layout Style for Posts
        
        if( get_post_meta( $post->ID, '_sidebar_layout', true ) ){
            $sidebar_layout = get_post_meta( $post->ID, '_sidebar_layout', true );
        }else{
            $sidebar_layout = 'default-sidebar';
        }
        
        if( get_post_meta( $post->ID, '_bfp_sidebar', true ) ){
            $single_sidebar = get_post_meta( $post->ID, '_bfp_sidebar', true );
        }else{
            $single_sidebar = 'default-sidebar';
        }
        
        if( is_page() ){
            
            if( is_page_template( 'templates/blossom-portfolio.php' ) ) {
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( ( $single_sidebar == 'no-sidebar' ) || ( ( $single_sidebar == 'default-sidebar' ) && ( $page_sidebar == 'no-sidebar' ) ) ){
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( $single_sidebar == 'default-sidebar' && $page_sidebar != 'no-sidebar' && is_active_sidebar( $page_sidebar ) ){
                if( $sidebar ) $return = $page_sidebar;
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
            }elseif( is_active_sidebar( $single_sidebar ) ){
                if( $sidebar ) $return = $single_sidebar;
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
            }else{
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }
        }
        
        if( is_single() ){
            
            if( 'blossom-portfolio' === get_post_type() ){ //For Portfolio Post Type
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( is_woocommerce_activated() && 'product' === get_post_type() ){
                if( is_active_sidebar( 'shop-sidebar' ) ){
                    if( $class && $post_layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $class && $post_layout == 'left-sidebar' ) $return = 'leftsidebar';
                }else{
                    if( $class ) $return = 'full-width';
                }
            }elseif( ( $single_sidebar == 'no-sidebar' ) || ( ( $single_sidebar == 'default-sidebar' ) && ( $post_sidebar == 'no-sidebar' ) ) ){
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( $single_sidebar == 'default-sidebar' && $post_sidebar != 'no-sidebar' && is_active_sidebar( $post_sidebar ) ){
                if( $sidebar ) $return = $post_sidebar;
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
            }elseif( is_active_sidebar( $single_sidebar ) ){
                if( $sidebar ) $return = $single_sidebar;
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
            }else{
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }
        }
    }
    
    return $return; 
}
endif;

if( ! function_exists( 'blossom_feminine_pro_primary_menu_fallback' ) ) :
/**
 * Fallback for primary menu
*/
function blossom_feminine_pro_primary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="primary-menu" class="menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'blossom-feminine-pro' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'blossom_feminine_pro_secondary_menu_fallback' ) ) :
/**
 * Fallback for secondary menu
*/
function blossom_feminine_pro_secondary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="secondary-menu" class="menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'blossom-feminine-pro' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'blossom_feminine_pro_theme_comment' ) ) :
/**
 * Callback function for Comment List *
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
function blossom_feminine_pro_theme_comment( $comment, $args, $depth ){
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
        	   <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        	</div><!-- .comment-author vcard -->
        </footer>
        
        <div class="text-holder">
        	<div class="top">
                <div class="left">
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'blossom-feminine-pro' ); ?></em>
                		<br />
                	<?php endif; ?>
                    <?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s</b> <span class="says">says:</span>', 'blossom-feminine-pro' ), get_comment_author_link() ); ?>
                	<div class="comment-metadata commentmetadata">
                        <?php esc_html_e( 'Posted on', 'blossom-feminine-pro' );?>
                        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                    		<time itemprop="commentTime" datetime="<?php echo esc_attr( get_gmt_from_date( get_comment_date() . get_comment_time(), 'Y-m-d H:i:s' ) ); ?>"><?php printf( esc_html__( '%1$s at %2$s', 'blossom-feminine-pro' ), get_comment_date(),  get_comment_time() ); ?></time>
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

if( ! function_exists( 'blossom_feminine_pro_get_posts' ) ) :
/**
 * Fuction to list Custom Post Type
*/
function blossom_feminine_pro_get_posts( $post_type = 'post', $slug = false ){
    
    $args = array(
    	'posts_per_page'   => -1,
    	'post_type'        => $post_type,
    	'post_status'      => 'publish',
    	'suppress_filters' => true 
    );
    $posts_array = get_posts( $args );
    
    // Initate an empty array
    $post_options = array();
    $post_options[''] = __( ' -- Choose -- ', 'blossom-feminine-pro' );
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

if( ! function_exists( 'blossom_feminine_pro_get_categories' ) ) :
/**
 * Function to list post categories in customizer options
*/
function blossom_feminine_pro_get_categories( $select = true, $taxonomy = 'category', $slug = false ){
    
    /* Option list of all categories */
    $categories = array();
    
    $args = array( 
        'hide_empty' => false,
        'taxonomy'   => $taxonomy 
    );
    
    $catlists = get_terms( $args );
    if( $select ) $categories[''] = __( 'Choose Category', 'blossom-feminine-pro' );
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

if( ! function_exists( 'blossom_feminine_pro_social_links' ) ) :
/**
 * Prints social links in header
*/
function blossom_feminine_pro_social_links(){
    $defaults = array(
        array(
            'font' => 'fa fa-facebook',
            'link' => 'https://www.facebook.com/',                        
        ),
        array(
            'font' => 'fa fa-twitter',
            'link' => 'https://twitter.com/',
        ),
        array(
            'font' => 'fa fa-youtube-play',
            'link' => 'https://www.youtube.com/',
        ),
        array(
            'font' => 'fa fa-instagram',
            'link' => 'https://www.instagram.com/',
        ),
        array(
            'font' => 'fa fa-google-plus',
            'link' => 'https://plus.google.com',
        ),
        array(
            'font' => 'fa fa-odnoklassniki',
            'link' => 'https://ok.ru/',
        ),
        array(
            'font' => 'fa fa-vk',
            'link' => 'https://vk.com/',
        ),
        array(
            'font' => 'fa fa-xing',
            'link' => 'https://www.xing.com/',
        )
    );
    $social_links = get_theme_mod( 'social_links', $defaults );
    $ed_social    = get_theme_mod( 'ed_social_links', true ); 
    
    if( $ed_social && $social_links ){ ?>
    <ul class="social-networks">
    	<?php foreach( $social_links as $link ){ ?>
            <li><a href="<?php echo esc_url( $link['link'] ); ?>" target="_blank" rel="nofollow"><i class="<?php echo esc_attr( $link['font'] ); ?>"></i></a></li>    	   
    	<?php } ?>
	</ul>
    <?php    
    }
}
endif;

if( ! function_exists( 'blossom_feminine_pro_get_banner_slider' ) ) :
/**
 * Prints Banner Slider
 * 
 * @param $layout slider layout
*/
function blossom_feminine_pro_get_banner_slider( $layout = 'one' ){
    
    $slider_type    = get_theme_mod( 'slider_type', 'latest_posts' );
    $slider_cat     = get_theme_mod( 'slider_cat' );
    $slider_pages   = get_theme_mod( 'slider_pages' );
    $slider_custom  = get_theme_mod( 'slider_custom' );
    $posts_per_page = get_theme_mod( 'no_of_slides', 3 );
    $ed_full_image  = get_theme_mod( 'slider_full_image' );
    $ed_caption     = get_theme_mod( 'slider_caption', true );
    
    $text = ( $layout == 'four' || $layout == 'two' ) ? 'text-holder' : 'banner-text';
    $item = ( $layout == 'two' ) ? 'grid-item' : 'item';
        
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
            $args['post__in']       = blossom_feminine_pro_get_id_from_page( $slider_pages );
            $args['orderby']        = 'post__in';
        }else{
            $args['post_type']      = 'post';
            $args['posts_per_page'] = $posts_per_page;
        }
        
        $qry = new WP_Query( $args );
        
        if( $qry->have_posts() ){ ?>
            <div class="banner banner-layout-<?php echo esc_attr( $layout ); ?>">
        		<?php if( $layout == 'two' ) echo '<div class="container">'; ?>
                <div class="owl-carousel slider-layout-<?php echo esc_attr( $layout ); ?>">		
                    <?php if( $layout == 'two' ) echo '<div class="item"><div class="grid-holder">'; ?>
                    <?php while( $qry->have_posts() ){ $qry->the_post(); ?>            	
                        <div class="<?php echo esc_attr( $item ); if( $qry->current_post % 3 == 0 ) echo ' image-size' ;?>">
            				<?php 
                                if( $layout == 'two' ){
                                    $image_size = ( $qry->current_post % 3 == 0 ) ? 'blossom-feminine-slider-two-big' : 'blossom-feminine-slider-two';
                                }elseif( $layout == 'four' ){
                                    $image_size = 'blossom-feminine-slider-four';
                                }elseif( $layout == 'one' ){
                                    $image_size = $ed_full_image ? 'full' : 'blossom-feminine-slider';
                                }else{
                                    $image_size = 'blossom-feminine-slider';
                                }
                                
                                if( has_post_thumbnail() ){
                				    the_post_thumbnail( $image_size );    
                				}else{
                				    blossom_feminine_pro_get_fallback_svg( $image_size );
                				}
                                
                                if( $ed_caption ){ ?> 
                				<div class="<?php echo esc_attr( $text ); ?>">
                					<?php
                                        blossom_feminine_pro_categories();
                                        the_title( '<h2 class="title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
                                    ?>
                				</div>
                                <?php 
                                } 
                            ?>
            			</div>
                    <?php if( $layout == 'two' && ( $qry->current_post % 3 == 2 ) && ( $qry->current_post + 1 < $qry->post_count ) ) echo '</div></div><div class="item"><div class="grid-holder">'; ?>
        			<?php } ?>
                    <?php if( $layout == 'two' ) echo '</div></div>'; ?>
        		</div>
                <?php if( $layout == 'two' ) echo '</div>'; ?>
        	</div>
        <?php
        wp_reset_postdata();
        }
    
    }elseif( $slider_type == 'custom' && $slider_custom ){ $i = 0; ?>        
        <div class="banner banner-layout-<?php echo esc_attr( $layout ); ?>">
    		<?php if( $layout == 'two' ) echo '<div class="container">'; ?>
            <div class="owl-carousel slider-layout-<?php echo esc_attr( $layout ); ?>">		
                <?php 
                if( $layout == 'two' ) echo '<div class="item"><div class="grid-holder">'; 
                foreach( $slider_custom as $slide ){ 
                    if( $slide['thumbnail'] || $slide['title'] || $slide['subtitle'] ){ ?>            	
                    <div class="<?php echo esc_attr( $item );?>">
        				<?php 
                            if( $layout == 'two' ){
                                $image_size = ( $i % 3 == 0 ) ? 'blossom-feminine-slider-two-big' : 'blossom-feminine-slider-two';
                            }elseif( $layout == 'four' ){
                                $image_size = 'blossom-feminine-slider-four';
                            }elseif( $layout == 'one' ){
                                $image_size = $ed_full_image ? 'full' : 'blossom-feminine-slider';
                            }else{
                                $image_size = 'blossom-feminine-slider';
                            }
                            
                            if( $slide['thumbnail'] ){ 
                                $image = wp_get_attachment_image_url( $slide['thumbnail'], $image_size ); ?>
            				    <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $slide['title'] );?>" />
            				    <?php 
                            }else{
            				    blossom_feminine_pro_get_fallback_svg( $image_size );                               
            				}
                        
                            if( $ed_caption ){ ?> 
            				<div class="<?php echo esc_attr( $text ); ?>">
            					<?php 
                                    if( $slide['subtitle'] ){
                                        echo '<span class="category">';
                                        if( $slide['link'] ) echo '<a href="' . esc_url( $slide['link'] ) . '">';
                                        echo esc_html( $slide['subtitle'] ); 
                                        if( $slide['link'] ) echo '</a>';
                                        echo '</span>';    
                                    } 
                                    if( $slide['title'] ){
                                        echo '<h2 class="title">';
                                        if( $slide['link'] ) echo '<a href="' . esc_url( $slide['link'] ) . '">';
                                        echo wp_kses_post( $slide['title'] );
                                        if( $slide['link'] ) echo '</a>';
                                        echo '</h2>';    
                                    } 
                                ?>                            
            				</div>
                            <?php 
                            }
                        ?>
        			</div>
                    <?php
                    } 
                    if( $layout == 'two' && ( $i == 2 ) && ( $i + 1 < count( $slider_custom ) ) ) echo '</div></div><div class="item"><div class="grid-holder">';                      
                    $i++; 
                } 
                ?>
                <?php if( $layout == 'two' ) echo '</div></div>'; ?>
    		</div>
            <?php if( $layout == 'two' ) echo '</div>'; ?>
    	</div>
        <?php
    }
}
endif;

if( ! function_exists( 'blossom_feminine_pro_get_featured_section' ) ) :
/**
 * Prints Featured Section
 * @param $layout Featured Layout
*/
function blossom_feminine_pro_get_featured_section( $layout = 'one' ){
    
    $featured_type       = get_theme_mod( 'featured_type', 'page' );
    $featured_page_one   = get_theme_mod( 'featured_content_one' );
    $featured_page_two   = get_theme_mod( 'featured_content_two' );
    $featured_page_three = get_theme_mod( 'featured_content_three' );
    $featured_custom     = get_theme_mod( 'featured_custom' );
    $featured_pages      = array( $featured_page_one, $featured_page_two, $featured_page_three );
    $featured_pages      = array_diff( array_unique( $featured_pages), array( '' ) );
    
    if( $featured_type == 'page' && $featured_pages ){ 
        $args = array(
            'post_type'      => 'page',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'post__in'       => $featured_pages,
            'orderby'        => 'post__in'   
        );
        
        $qry = new WP_Query( $args );
        
        if( $qry->have_posts() ){ ?>
            <div class="category-section wow fadeIn<?php if( $layout == 'two' ) echo ' category-layout-two'; ?>" data-wow-delay="0.1s">
        		<div class="row">
        			<?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                    <div class="col">
        				<a href="<?php the_permalink(); ?>" class="img-holder">
       					<?php 
                            if( has_post_thumbnail() ){
                                the_post_thumbnail( 'blossom-feminine-cat' );
                            }else{
                                blossom_feminine_pro_get_fallback_svg( 'blossom-feminine-cat' );
                            }
                            
                            if( $layout == 'two' ){
                                echo '</a>';
                                echo '<div class="text-holder"><div class="holder">';
     							echo '<span>' . blossom_feminine_pro_get_featured_title( get_the_title() ) . '</span>';
     							echo '</div></div>';    
                            }else{
                                the_title( '<div class="text-holder"><span>', '</span></div>' );
                                echo '</a>';    
                            }  
                            ?> 
        				
        			</div>
        			<?php } ?>
        		</div>
        	</div>
            <?php
            wp_reset_postdata();
        }
    }elseif( $featured_type == 'custom' && $featured_custom ){ ?>
        <div class="category-section wow fadeIn<?php if( $layout == 'two' ) echo ' category-layout-two'; ?>" data-wow-delay="0.1s">
    		<div class="row">
    			<?php foreach( $featured_custom as $feature ){ 
                    if( $feature['thumbnail'] || $feature['title'] || $feature['subtitle'] ){?>
                <div class="col">    				
   					<?php 
                        $open_tab = ( get_theme_mod( 'ed_open_tab', false ) ) ? 'target="_blank"' : '';
                        if( $feature['link'] ) :
                            echo '<a href="' . esc_url( $feature['link'] ) . '"' . $open_tab . ' class="img-holder">' ;
                        else:
                            echo '<div class="img-holder">';
                        endif;
                        if( $feature['thumbnail'] ){
                            $image = wp_get_attachment_image_url( $feature['thumbnail'], 'blossom-feminine-cat' );
                            echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $feature['title'] ) . '">';
                        }else{
                            blossom_feminine_pro_get_fallback_svg( 'blossom-feminine-cat' );
                        }
                        
                        if( $layout == 'two' ){
                            if( $feature['link'] ) :
                                echo '</a>';
                            else:
                                echo '</div>';
                            endif;
                            if( $feature['title'] || $feature['subtitle'] ){
                                echo '<div class="text-holder"><div class="holder">';
 							    if( $feature['title'] ) echo '<span>' . blossom_feminine_pro_get_featured_title( $feature['title'] ) . '</span>';
 							    if( $feature['subtitle'] ){ 
                                    if( $feature['link'] ) echo '<a href="' . esc_url( $feature['link'] ) . '"' . $open_tab . ' class="learn-more">';
                                    echo esc_html( $feature['subtitle'] );
                                    if( $feature['link'] ) echo '</a>';
                                }
                                echo '</div></div>';
                            }                                
                        }else{
                            if( $feature['title'] ) echo '<div class="text-holder"><span>' . esc_html( $feature['title'] ) . '</span></div>';
                            if( $feature['link'] ) :
                                echo '</a>';
                            else:
                                echo '</div>';
                            endif;   
                        }  
                        ?> 
    				
    			</div>
    			<?php } } ?>
    		</div>
    	</div>
        <?php
    }    
}
endif;

if( ! function_exists( 'blossom_feminine_pro_get_id_from_page' ) ) :
/**
 * Get page ids from page name.
*/
function blossom_feminine_pro_get_id_from_page( $slider_pages ){
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

if( ! function_exists( 'blossom_feminine_pro_get_featured_title' ) ) :
/**
 * Returns strings adding <em> tag in the last word if more than two words 
*/
function blossom_feminine_pro_get_featured_title( $title ){
    $string = explode( ' ', $title ); //change title string into array
    if( count( $string ) > 1 ){
        $end = array_pop( $string ); // get last item and remove it from $string array
        $end = '<em>' . $end . '</em>';
        array_push( $string, $end ); //finally append modified end item to the end of string array    
        return $final = implode( ' ', $string ); //at last return title with appended <em> tag in last word.
    }else{
        return $title;
    }
}
endif;

if( ! function_exists( 'blossom_feminine_pro_get_primary_nav' ) ) :
/**
 * Prints Primary Navigation markup
*/
function blossom_feminine_pro_get_primary_nav(){ ?>
    <div id="primary-toggle-button"><i class="fa fa-bars"></i><?php esc_html_e( 'Navigation', 'blossom-feminine-pro' ); ?></div>
	<nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
                'fallback_cb'    => 'blossom_feminine_pro_primary_menu_fallback',
			) );
		?>
	</nav><!-- #site-navigation -->
    <?php
}
endif;

if( ! function_exists( 'blossom_feminine_pro_get_secondary_nav' ) ) :
/**
 * Prints Secondary Navigation markup
*/
function blossom_feminine_pro_get_secondary_nav(){ ?>
    <div id="secondary-toggle-button"><i class="fa fa-bars"></i></div>				
    <nav id="secondary-navigation" class="secondary-nav" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'secondary',
				'menu_id'        => 'secondary-menu',
                'fallback_cb'    => 'blossom_feminine_pro_secondary_menu_fallback',
			) );
		?>
	</nav><!-- #secondary-navigation -->
    <?php
}
endif;

if( ! function_exists( 'blossom_feminine_pro_get_search_form' ) ) :
/**
 * Prints Header Search form markup
*/
function blossom_feminine_pro_get_search_form(){ 
    $ed_header_search = get_theme_mod( 'ed_header_search', true ); 
    if( $ed_header_search ){ ?>
        <div class="form-section">
    		<span id="btn-search"><i class="fa fa-search"></i></span>
    		<div class="form-holder">
    			<?php get_search_form(); ?>
    		</div>
    	</div>
        <?php
    }
}
endif;

if( ! function_exists( 'blossom_feminine_pro_get_site_title_description' ) ) :
/**
 * Prints Site Title and Description markup
*/
function blossom_feminine_pro_get_site_title_description(){
    the_custom_logo(); 
    if( is_front_page() ){ ?>
        <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
        <?php 
    }else{ ?>
        <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
    <?php
    }
    $description = get_bloginfo( 'description', 'display' );
    if ( $description || is_customize_preview() ){ ?>
        <p class="site-description" itemprop="description"><?php echo esc_html( $description ); ?></p>
    <?php
    }
}
endif;

if( ! function_exists( 'blossom_feminine_pro_get_patterns' ) ) :
/**
 * Function to list Custom Pattern
*/
function blossom_feminine_pro_get_patterns(){
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

if( ! function_exists( 'blossom_feminine_pro_get_dynamnic_sidebar' ) ) :
/**
 * Function to list dynamic sidebar
*/
function blossom_feminine_pro_get_dynamnic_sidebar( $nosidebar = false, $sidebar = false, $default = false ){
    $sidebar_arr = array();
    $sidebars = get_theme_mod( 'sidebar' );
    
    if( $default ) $sidebar_arr['default-sidebar'] = __( 'Default Sidebar', 'blossom-feminine-pro' );
    if( $sidebar ) $sidebar_arr['sidebar'] = __( 'Sidebar', 'blossom-feminine-pro' );
    
    if( $sidebars ){        
        foreach( $sidebars as $sidebar ){            
            $id = $sidebar['name'] ? sanitize_title( $sidebar['name'] ) : 'rara-sidebar-one';
            $sidebar_arr[$id] = $sidebar['name'];
        }
    }
    
    if( $nosidebar ) $sidebar_arr['no-sidebar'] = __( 'No Sidebar', 'blossom-feminine-pro' );
    
    return $sidebar_arr;
}
endif;

if( ! function_exists( 'blossom_feminine_pro_get_all_fonts' ) ) :
/**
 * Return Web safe font and google font
*/
function blossom_feminine_pro_get_all_fonts(){
    $google = array();        
    $standard = array(
		'georgia-serif'       => __( 'Georgia', 'blossom-feminine-pro' ),
        'palatino-serif'      => __( 'Palatino Linotype, Book Antiqua, Palatino', 'blossom-feminine-pro' ),
        'times-serif'         => __( 'Times New Roman, Times', 'blossom-feminine-pro' ),
        'arial-helvetica'     => __( 'Arial, Helvetica', 'blossom-feminine-pro' ),
        'arial-gadget'        => __( 'Arial Black, Gadget', 'blossom-feminine-pro' ),
		'comic-cursive'       => __( 'Comic Sans MS, cursive', 'blossom-feminine-pro' ),
		'impact-charcoal'     => __( 'Impact, Charcoal', 'blossom-feminine-pro' ),
        'lucida'              => __( 'Lucida Sans Unicode, Lucida Grande', 'blossom-feminine-pro' ),
        'tahoma-geneva'       => __( 'Tahoma, Geneva', 'blossom-feminine-pro' ),
		'trebuchet-helvetica' => __( 'Trebuchet MS, Helvetica', 'blossom-feminine-pro' ),
		'verdana-geneva'      => __( 'Verdana, Geneva', 'blossom-feminine-pro' ),
        'courier'             => __( 'Courier New, Courier', 'blossom-feminine-pro' ),
        'lucida-monaco'       => __( 'Lucida Console, Monaco', 'blossom-feminine-pro' ),
	);
    
    $fonts = include wp_normalize_path( get_template_directory() . '/inc/custom-controls/typography/webfonts.php' );
    
    foreach( $fonts['items'] as $font ){
        $google[$font['family']] = $font['family'];
    }
    $all_fonts = array_merge( $standard, $google );
    return $all_fonts; 
}
endif;

if( ! function_exists( 'blossom_feminine_pro_single_post_thumbnail' ) ) :
/**
 * Return Single Thumbnail
*/
function blossom_feminine_pro_single_post_thumbnail( $layout = false ){
    $ed_featured = get_theme_mod( 'ed_featured_image', true );    
    $sidebar     = blossom_feminine_pro_sidebar( true );
    
    if( $layout == 'one' || $layout == 'three' ){
        $image = $sidebar ? 'blossom-feminine-with-sidebar' : 'blossom-feminine-featured';    
    }elseif( $layout == 'two' ){
        $image = 'blossom-feminine-single-two';
    }else{
        $image = 'blossom-feminine-featured';
    }
    
    if( $ed_featured ){
        echo '<div class="post-thumbnail">';
        if( has_post_thumbnail() ){
            the_post_thumbnail( $image );    
        }else{
            blossom_feminine_pro_get_fallback_svg( $image );
        }
        echo '</div>';    
    }    
}
endif;

if( ! function_exists( 'blossom_feminine_pro_single_entry_header' ) ) :
/**
 * Return Single Entry Header
*/
function blossom_feminine_pro_single_entry_header(){ ?>
    <header class="entry-header">
    <?php 
        $ed_cat_single = get_theme_mod( 'ed_category', false );
        $ed_post_date  = get_theme_mod( 'ed_post_date', false );
        $ed_post_author = get_theme_mod( 'ed_post_author', false );
        
        if( ! $ed_cat_single ) blossom_feminine_pro_categories();
        
        the_title( '<h1 class="entry-title">', '</h1>' );
        
		if ( 'post' === get_post_type() ){ 
            echo '<div class="entry-meta">';
            if( ! $ed_post_author) blossom_feminine_pro_posted_by();
            if( ! $ed_post_date ) blossom_feminine_pro_posted_on();
            blossom_feminine_pro_comment_count();	
            echo '</div><!-- .entry-meta -->';		
		}
        ?>
	</header><!-- .entry-header home-->
    <?php        
}
endif;

if( ! function_exists( 'blossom_feminine_pro_single_entry_content' ) ) :
/**
 * Return Single Entry Content
*/
function blossom_feminine_pro_single_entry_content(){
    $ed_excerpt = get_theme_mod( 'ed_excerpt', true ); ?>
    
    <div class="entry-content">
        <?php 
            if( get_post_type() == 'post' ) do_action( 'blossom_feminine_pro_social_sharing' ); /** single post social share.*/
        ?>
        <div class="text">
		
        <?php         
        if( is_singular() || ! $ed_excerpt || ( get_post_format() != false ) ){
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
        ?>
        
        </div>
	</div><!-- .entry-content -->      
    <?php
}
endif;

if( ! function_exists( 'blossom_feminine_pro_single_entry_footer' ) ) :
/**
 * Return Single Entry Footer
*/
function blossom_feminine_pro_single_entry_footer(){ ?>
    <footer class="entry-footer">
    <?php
        //Tags in single page
        blossom_feminine_pro_tags();
        //edit post link
        blossom_feminine_pro_edit_post_link(); 
    ?>
	</footer><!-- .entry-footer home-->
    <?php    
}
endif;

if( ! function_exists( 'blossom_feminine_pro_related_popular_post' ) ) :
/**
 * Prints Related and Popular Posts in single page
 * @param $related true
*/
function blossom_feminine_pro_related_popular_post( $related = true ){
    global $post;
    $related_title = get_theme_mod( 'related_post_title', __( 'You may also like...', 'blossom-feminine-pro' ) );
    $popular_title = get_theme_mod( 'popoular_post_title', __( 'Popular Articles...', 'blossom-feminine-pro' ) );
    $related_tax   = get_theme_mod( 'related_taxonomy', 'cat' );
    $class         = $related ? 'related-post' : 'popular-post';
    
    $args = array(
        'post_type'             => 'post',
        'post_status'           => 'publish',
        'posts_per_page'        => 6,
        'ignore_sticky_posts'   => true,
        'post__not_in'          => array( $post->ID ),
        
    );
    
    if( $related ){
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
        $args['orderby'] = 'rand';
    }else{
        $args['orderby'] = 'comment_count';
    }
    
    $qry = new WP_Query( $args );
    
    if( $qry->have_posts() ){ ?>
    <div class="<?php echo esc_attr( $class ); ?>">
		<?php 
            if( $related ){
                if( $related_title ) echo '<h2 class="title">' . esc_html( $related_title ) . '</h2>';
            }else{
                if( $popular_title ) echo '<h2 class="title">' . esc_html( $popular_title ) . '</h2>';
            } 
        ?>
		<div class="row">
			<?php 
            while( $qry->have_posts() ){ 
                $qry->the_post(); ?>
                <div class="post">
    				<div class="img-holder">
    					<a href="<?php the_permalink(); ?>">
                        <?php
                            if( has_post_thumbnail() ){
                                the_post_thumbnail( 'blossom-feminine-related' );
                            }else{
                                blossom_feminine_pro_get_fallback_svg( 'blossom-feminine-related' );
                            }
                        ?>
                        </a>
    					<div class="text-holder">
    						<?php
                                blossom_feminine_pro_categories();
                                the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); 
                            ?>
    					</div>
    				</div>
    			</div>
    			<?php 
            }
            wp_reset_postdata();  
            ?>
		</div>
	</div>
    <?php
    }
}
endif;

if( ! function_exists( 'blossom_feminine_pro_get_social_share' ) ) :
/**
 * Get list of social sharing icons
 * http://www.sharelinkgenerator.com/
 * 
*/
function blossom_feminine_pro_get_social_share( $share ){
    global $post;
    
    switch( $share ){
        case 'facebook':
        echo '<li><a href="' . esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink( $post->ID ) ) . '" rel="nofollow" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
        
        break;
        
        case 'twitter':
        echo '<li><a href="' . esc_url( 'https://twitter.com/home?status=' . get_the_title( $post->ID ) ) . '&nbsp;' . get_the_permalink( $post->ID ) . '" rel="nofollow" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
        
        break;
        
        case 'linkedIn':
        echo '<li><a href="' . esc_url( 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID ) ) . '" rel="nofollow" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>';
        
        break;
        
        case 'pinterest':
        echo '<li><a href="' . esc_url( 'https://pinterest.com/pin/create/button/?url=' . get_the_permalink( $post->ID ) . '&description=' . get_the_title( $post->ID )  ) . '" rel="nofollow" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>';
        
        break;
        
        case 'email':
        echo '<li><a href="' . esc_url( 'mailto:?Subject=' . get_the_title( $post->ID ) . '&Body=' . get_the_permalink( $post->ID ) ) . '" rel="nofollow" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>';
        
        break;
        
        case 'gplus':
        echo '<li><a href="' . esc_url( 'https://plus.google.com/share?url=' . get_the_permalink( $post->ID ) ) . '" rel="nofollow" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>';
        
        break;        
              
        case 'reddit':
        echo '<li><a href="' . esc_url( 'http://www.reddit.com/submit?url=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID ) ) . '" rel="nofollow" target="_blank"><i class="fa fa-reddit" aria-hidden="true"></i></a></li>';
        
        break; 

        case 'tumblr':
        echo '<li> <a href=" ' . esc_url ( 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID) ). ' " rel="nofollow" target="_blank"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>';      
        
        break; 

        case 'digg':
        echo '<li> <a href=" ' . esc_url ( 'http://digg.com/submit?url=' . get_the_permalink( $post->ID ) ). ' " rel="nofollow" target="_blank"><i class="fa fa-digg" aria-hidden="true"></i></a></li>';      
        
        break;

        case 'weibo':
        echo '<li> <a href=" ' . esc_url ( 'https://service.weibo.com/share/share.php?url=' . get_the_permalink( $post->ID ) ). ' " rel="nofollow" target="_blank"><i class="fa fa-weibo" aria-hidden="true"></i></a></li>';      
        
        break;

        case 'xing':
        echo '<li> <a href=" ' . esc_url ( 'https://www.xing.com/app/user?op=share&url=' . get_the_permalink( $post->ID ) ). ' " rel="nofollow" target="_blank"><i class="fa fa-xing" aria-hidden="true"></i></a></li>';      
        
        break;

        case 'vk':
        echo '<li> <a href=" ' . esc_url ( 'http://vk.com/share.php?url=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID) ). ' " rel="nofollow" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a></li>';      
        
        break; 

        case 'pocket':
        echo '<li> <a href=" ' . esc_url ( 'https://getpocket.com/edit?url=' . get_the_permalink( $post->ID ) . '&title=' . get_the_title( $post->ID) ). ' " rel="nofollow" target="_blank"><i class="fa fa-get-pocket" aria-hidden="true"></i></a></li>';      
        
        break;  
    }
}
endif;

/**
 * Display AD block
 * 
 * @param $image     - Ad Image file
 * @param $link      - Ad Link
 * @param $target    - Link target
 * @param $adcode    - Adsence Adcode
 * @param $ed_adcode - Enable/disable Adcode
*/
function blossom_feminine_pro_get_ad_block( $image, $link = false, $target, $adcode = false, $ed_adcode ){
    ?>
    <div class="advertise">
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
    <?php    
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

/**
 * Query WooCommerce activation
 */
function is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}

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

if( ! function_exists( 'blossom_feminine_pro_escape_text_tags' ) ) :
    /**
     * Remove new line tags from string
     *
     * @param $text
     *
     * @return string
     */
    function blossom_feminine_pro_escape_text_tags( $text ) {
        return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
    }
endif;

if( ! function_exists( 'blossom_feminine_pro_get_image_sizes' ) ) :
/**
 * Get information about available image sizes
 */
function blossom_feminine_pro_get_image_sizes( $size = '' ) {
 
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

if ( ! function_exists( 'blossom_feminine_pro_get_fallback_svg' ) ) :    
/**
 * Get Fallback SVG
*/
function blossom_feminine_pro_get_fallback_svg( $post_thumbnail ) {
    if( ! $post_thumbnail ){
        return;
    }
    
    $image_size = blossom_feminine_pro_get_image_sizes( $post_thumbnail );
     
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