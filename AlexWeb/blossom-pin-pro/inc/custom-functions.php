<?php
/**
 * Blossom Pin Pro Custom functions and definitions
 *
 * @package Blossom_Pin_Pro
 */

/**
 * Show/Hide Admin Bar in frontend.
*/
if( ! get_theme_mod( 'ed_adminbar', true ) ) add_filter( 'show_admin_bar', '__return_false' );

if ( ! function_exists( 'blossom_pin_pro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blossom_pin_pro_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Blossom Pin Pro, use a find and replace
	 * to change 'blossom-pin-pro' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'blossom-pin-pro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

    // Add theme support for post formats
    add_theme_support( 'post-formats', array( 'image', 'video', 'gallery', 'audio', 'quote' ) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary', 'blossom-pin-pro' ),
        'secondary' => esc_html__( 'Secondary', 'blossom-pin-pro' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-list',
		'gallery',
		'caption',
	) );
    
    // Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'blossom_pin_pro_custom_background_args', array(
		'default-color' => 'ffffff'
	) ) );
    
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array( 
        'width'       => 250,
        'height'      => 70,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );
    
    /**
     * Add support for custom header.
    */
    add_theme_support( 'custom-header', apply_filters( 'blossom_pin_pro_custom_header_args', array(
		'default-image' => '',
        'video'         => true,
		'width'         => 1903,
		'height'        => 660,
		'header-text'   => false
	) ) );
 
    /**
     * Add Custom Images sizes.
    */    
    add_image_size( 'blossom-pin-schema', 600, 60 );
    add_image_size( 'blossom-pin-slider', 375, 450, true );
    add_image_size( 'blossom-pin-slider-two', 1903, 660, true );
    add_image_size( 'blossom-pin-slider-three', 1186, 585, true );
    add_image_size( 'blossom-pin-slider-four', 787, 588, true );
    add_image_size( 'blossom-pin-slider-five', 291, 585, true );
    add_image_size( 'blossom-pin-slider-six', 1303, 650, true );
    add_image_size( 'blossom-pin-archive', 224, 280, true );
    add_image_size( 'blossom-pin-related', 374, 249, true );
    add_image_size( 'blossom-pin-blog-layout-three', 1200, 1500, true );
    add_image_size( 'blossom-pin-blog-layout-four', 357, 536, true );
    add_image_size( 'blossom-pin-blog-layout-five', 352, 440, true );
    add_image_size( 'blossom-pin-single-layout-one', 802, 1002, true );
    add_image_size( 'blossom-pin-single-layout-two', 802, 534, true );
    add_image_size( 'blossom-pin-single-layout-three', 1186, 585, true );
    add_image_size( 'blossom-pin-single-layout-five', 1903, 595, true );
    
    // Add theme support for Responsive Videos.
    add_theme_support( 'jetpack-responsive-videos' );

    // Add excerpt support for pages
    add_post_type_support( 'page', 'excerpt' );
}
endif;
add_action( 'after_setup_theme', 'blossom_pin_pro_setup' );

if( ! function_exists( 'blossom_pin_pro_content_width' ) ) :
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blossom_pin_pro_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'blossom_pin_pro_content_width', 790 );
}
endif;
add_action( 'after_setup_theme', 'blossom_pin_pro_content_width', 0 );

if( ! function_exists( 'blossom_pin_pro_template_redirect_content_width' ) ) :
/**
* Adjust content_width value according to template.
*
* @return void
*/
function blossom_pin_pro_template_redirect_content_width(){
    $sidebar = blossom_pin_pro_sidebar();
    if( $sidebar ){    
        $GLOBALS['content_width'] = 790;       
    }else{
        $GLOBALS['content_width'] = 1216;
    }
}
endif;
add_action( 'template_redirect', 'blossom_pin_pro_template_redirect_content_width' );

if( ! function_exists( 'blossom_pin_pro_scripts' ) ) :
/**
 * Enqueue scripts and styles.
 */
function blossom_pin_pro_scripts() {
	// Use minified libraries if SCRIPT_DEBUG is false
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
    $slider_layout = get_theme_mod( 'slider_layout', 'one' );
    
    if( is_woocommerce_activated() )
    wp_enqueue_style( 'blossom-pin-pro-woocommerce', get_template_directory_uri(). '/css' . $build . '/woocommerce' . $suffix . '.css', array(), BLOSSOM_PIN_PRO_THEME_VERSION );
    
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/css' . $build . '/owl.carousel' . $suffix . '.css', array(), '2.2.1' );
    wp_enqueue_style( 'animate', get_template_directory_uri(). '/css' . $build . '/animate' . $suffix . '.css', array(), '3.5.2' );
    wp_enqueue_style( 'blossom-pin-pro-google-fonts', blossom_pin_pro_fonts_url(), array(), null );
    wp_enqueue_style( 'blossom-pin-pro', get_stylesheet_uri(), array(), BLOSSOM_PIN_PRO_THEME_VERSION );
    
    if( get_theme_mod( 'ed_lazy_load', false ) || get_theme_mod( 'ed_lazy_load_cimage', false ) )
    wp_enqueue_script( 'layzr', get_template_directory_uri() . '/js' . $build . '/layzr' . $suffix . '.js', array('jquery'), '2.0.4', true );
    
    //Fancy Box
    if( get_theme_mod( 'ed_lightbox', false ) ){
        wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/css' . $build . '/jquery.fancybox' . $suffix . '.css', array(), '3.5.2' );
        wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri() . '/js' . $build . '/jquery.fancybox' . $suffix . '.js', array('jquery'), '3.5.2', true );
    }
    
    wp_enqueue_script( 'all', get_template_directory_uri() . '/js' . $build . '/all' . $suffix . '.js', array( 'jquery' ), '5.6.3', true );
    wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/js' . $build . '/v4-shims' . $suffix . '.js', array( 'jquery' ), '5.6.3', true );
    wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js' . $build . '/theia-sticky-sidebar' . $suffix . '.js', array( 'jquery' ), '1.7.0', true );
    wp_enqueue_script( 'jquery-matchHeight', get_template_directory_uri() . '/js' . $build . '/jquery.matchHeight' . $suffix . '.js', array( 'jquery' ), '1.1.3', true );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array( 'jquery' ), '2.2.1', true );
    if( is_home() && $slider_layout == 'two' ) {
        wp_enqueue_script( 'owl-carousel2-thumbs', get_template_directory_uri() . '/js' . $build . '/owl.carousel2.thumbs' . $suffix . '.js', array( 'jquery', 'owl-carousel' ), '0.1.8', true );
    }
	wp_enqueue_script( 'blossom-pin-pro', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array( 'jquery', 'masonry' ), BLOSSOM_PIN_PRO_THEME_VERSION, true );
    
    $array = array( 
        'rtl'           => is_rtl(),
        'auto'          => get_theme_mod( 'slider_auto', true ),
        'loop'          => get_theme_mod( 'slider_loop', true ),
		'speed'         => get_theme_mod( 'slider_speed', 2000 ),
        'animation'     => get_theme_mod( 'slider_animation' ),
        'single'        => is_single(),
        'sticky_single_header' => get_theme_mod( 'ed_sticky_single_header', true ),
        'sticky_header' => get_theme_mod( 'ed_sticky_header', false ),
        'lightbox'      => get_theme_mod( 'ed_lightbox', false ),
        'drop_cap'      => get_theme_mod( 'ed_drop_cap', true ),
        'sticky_widget' => get_theme_mod( 'ed_last_widget_sticky', false ),
    );
    
    wp_localize_script( 'blossom-pin-pro', 'blossom_pin_pro_data', $array );
    
    $pagination = get_theme_mod( 'pagination_type', 'numbered' );
    $loadmore   = get_theme_mod( 'load_more_label', __( 'Load More Posts', 'blossom-pin-pro' ) );
    $loading    = get_theme_mod( 'loading_label', __( 'Loading...', 'blossom-pin-pro' ) );
    $nomore     = get_theme_mod( 'nomore_post_label', __( 'No More Post', 'blossom-pin-pro' ) );
       
    // Add parameters for the JS
    global $wp_query;
    $max = $wp_query->max_num_pages;
    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    
    wp_enqueue_script( 'blossom-pin-pro-ajax', get_template_directory_uri() . '/js' . $build . '/ajax' . $suffix . '.js', array('jquery'), BLOSSOM_PIN_PRO_THEME_VERSION, true );
    
    wp_localize_script( 
        'blossom-pin-pro-ajax', 
        'blossom_pin_pro_ajax',
        array(
            'rtl'        => is_rtl(),
            'url'        => admin_url( 'admin-ajax.php' ),
            'startPage'  => $paged,
            'maxPages'   => $max,
            'nextLink'   => next_posts( $max, false ),
            'autoLoad'   => $pagination,
            'loadmore'   => $loadmore,
            'loading'    => $loading,
            'nomore'     => $nomore,
            'plugin_url' => plugins_url(),                
         )
    );
    
    if ( is_jetpack_activated( true ) ) {
        wp_enqueue_style( 'tiled-gallery', plugins_url() . '/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.css' );            
    }
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif;
add_action( 'wp_enqueue_scripts', 'blossom_pin_pro_scripts' );

if( ! function_exists( 'blossom_pin_pro_admin_scripts' ) ) :
/**
 * Enqueue admin scripts and styles.
*/
function blossom_pin_pro_admin_scripts( $hook_suffix ){
    wp_enqueue_style( 'blossom-pin-pro-admin', get_template_directory_uri() . '/inc/css/admin.css', '', BLOSSOM_PIN_PRO_THEME_VERSION );

    wp_enqueue_script( 'blossom-pin-pro-admin', get_template_directory_uri() . '/inc/js/admin.js', '', BLOSSOM_PIN_PRO_THEME_VERSION, true );
}
endif; 
add_action( 'admin_enqueue_scripts', 'blossom_pin_pro_admin_scripts' );

if( ! function_exists( 'blossom_pin_pro_body_classes' ) ) :
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blossom_pin_pro_body_classes( $classes ) {
    global $wp_query;
    $bg_pattern = get_theme_mod( 'bg_pattern', 'nobg' );
    $bg         = get_theme_mod( 'body_bg', 'image' );
    $single_layout = get_theme_mod( 'single_post_layout', 'one' );
    $archive_layout = get_theme_mod( 'archive_layout', 'archive-one' );
    
    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    if ( $wp_query->found_posts == 0 ) {
        $classes[] = 'no-post';
    }
    
    // Adds a class of custom-background-image to sites with a custom background image.
	if( $bg == 'pattern' && $bg_pattern != 'nobg' ){
		$classes[] = 'custom-background-image custom-background';
	}
    
    if( $bg == 'image' && get_background_image() ) {
		$classes[] = 'custom-background-image';
	}
    
    // Adds a class of custom-background-color to sites with a custom background color.
    if( get_background_color() != 'ffffff' ) {
		$classes[] = 'custom-background-color';
	}
    
    if( is_single() ){
        $classes[] = 'single-layout-' . $single_layout;
    }

    if( is_archive() || is_search() ){
        $classes[] = $archive_layout;
    }

    $classes[] = blossom_pin_pro_sidebar( true );
    
	return $classes;
}
endif;
add_filter( 'body_class', 'blossom_pin_pro_body_classes' );

if( ! function_exists( 'blossom_pin_pro_post_classes' ) ) :
/**
 * Add custom classes to the array of post classes.
*/
function blossom_pin_pro_post_classes( $classes ){
    
    if( is_search() || is_archive()){
        $classes[] = 'search-post';
    }
    
    $classes[] = 'latest_post';
    
    return $classes;
}
endif;
add_filter( 'post_class', 'blossom_pin_pro_post_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function blossom_pin_pro_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blossom_pin_pro_pingback_header' );

if( ! function_exists( 'blossom_pin_pro_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function blossom_pin_pro_change_comment_form_default_fields( $fields ){    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'blossom-pin-pro' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'blossom-pin-pro' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'blossom-pin-pro' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;    
}
endif;
add_filter( 'comment_form_default_fields', 'blossom_pin_pro_change_comment_form_default_fields' );

if( ! function_exists( 'blossom_pin_pro_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function blossom_pin_pro_change_comment_form_defaults( $defaults ){    
    $defaults['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'blossom-pin-pro' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
    
    return $defaults;    
}
endif;
add_filter( 'comment_form_defaults', 'blossom_pin_pro_change_comment_form_defaults' );

if ( ! function_exists( 'blossom_pin_pro_excerpt_more' ) ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function blossom_pin_pro_excerpt_more( $more ) {
	return is_admin() ? $more : ' &hellip; ';
}

endif;
add_filter( 'excerpt_more', 'blossom_pin_pro_excerpt_more' );

if ( ! function_exists( 'blossom_pin_pro_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function blossom_pin_pro_excerpt_length( $length ) {
	$excerpt_length = get_theme_mod( 'excerpt_length', 55 );
    return is_admin() ? $length : absint( $excerpt_length );    
}
endif;
add_filter( 'excerpt_length', 'blossom_pin_pro_excerpt_length', 999 );

if( ! function_exists( 'blossom_pin_pro_exclude_cat' ) ) :
/**
 * Exclude post with Category from blog and archive page. 
*/
function blossom_pin_pro_exclude_cat( $query ){

    $ed_banner      = get_theme_mod( 'ed_banner_section', 'slider_banner' );
    $slider_type    = get_theme_mod( 'slider_type', 'latest_posts' );
    $slider_cat     = get_theme_mod( 'slider_cat' );
    $posts_per_page = get_theme_mod( 'no_of_slides', 6 );
    
    if( ! is_admin() && $query->is_main_query() && $query->is_home() && $ed_banner == 'slider_banner' ){
        if( $slider_type === 'cat' && $slider_cat  ){            
 			$query->set( 'category__not_in', array( $slider_cat ) );    		
        }elseif( $slider_type == 'latest_posts' ){
            $args = array(
                'post_type'           => 'post',
                'post_status'         => 'publish',
                'posts_per_page'      => $posts_per_page,
                'ignore_sticky_posts' => true
            );
            $latest = get_posts( $args );
            $excludes = array();
            foreach( $latest as $l ){
                array_push( $excludes, $l->ID );
            }
            $query->set( 'post__not_in', $excludes );
        }  
    }      
}
endif;
add_filter( 'pre_get_posts', 'blossom_pin_pro_exclude_cat' );

if( ! function_exists( 'blossom_pin_pro_get_the_archive_title' ) ) :
/**
 * Filter Archive Title
*/
function blossom_pin_pro_get_the_archive_title( $title ){
    
    $ed_prefix = get_theme_mod( 'ed_prefix_archive', false );

    if( is_category() ){
        if( $ed_prefix ){
             $title = '<h1 class="pate-title">' .single_cat_title( '', false ). '</h1>';
                               
        }else{
            $title = sprintf( __( '%1$s Category %2$s %3$s', 'blossom-pin-pro'), '<span class="label">','</span>', '<h1 class="pate-title">' .single_cat_title( '', false ). '</h1>') ;
        }     
    }elseif( is_tag() ){
        if( $ed_prefix ){
             $title = '<h1 class="pate-title">' .single_cat_title( '', false ). '</h1>';
                               
        }else{
            $title = sprintf( __( '%1$s Tag %2$s %3$s', 'blossom-pin-pro'), '<span class="label">','</span>', '<h1 class="pate-title">' .single_cat_title( '', false ). '</h1>') ;
        }
    }elseif( is_year() ){
       if( $ed_prefix ){
             $title = '<h1 class="pate-title">' . get_the_date( _x( 'Y', 'yearly archives date format', 'blossom-pin-pro' ) ) . '</h1>';
                               
        }else{
            $title = sprintf( __( '%1$s Year %2$s %3$s', 'blossom-pin-pro'), '<span class="label">','</span>', '<h1 class="pate-title">' . get_the_date( _x( 'Y', 'yearly archives date format', 'blossom-pin-pro' ) ) . '</h1>') ;
        }
    }elseif( is_month() ){
        if( $ed_prefix ){
             $title = '<h1 class="pate-title">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'blossom-pin-pro' ) ) . '</h1>';
                               
        }else{
            $title = sprintf( __( '%1$s Month %2$s %3$s', 'blossom-pin-pro'), '<span class="label">','</span>', '<h1 class="pate-title">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'blossom-pin-pro' ) ) . '</h1>') ;
        }
    }elseif( is_day() ){
        if( $ed_prefix ){
             $title = '<h1 class="pate-title">' . get_the_date( _x( 'F j, Y', 'daily archives date format', 'blossom-pin-pro' ) ) . '</h1>';
                               
        }else{
            $title = sprintf( __( '%1$s Day %2$s %3$s', 'blossom-pin-pro'), '<span class="label">','</span>', '<h1 class="pate-title">' . get_the_date( _x( 'F j, Y', 'daily archives date format', 'blossom-pin-pro' ) ) .  '</h1>') ;
        }
    }elseif( is_post_type_archive() ) {
        if( $ed_prefix ){
             $title = '<h1 class="pate-title">'  . post_type_archive_title( '', false ) . '</h1>';
                               
        }else{
            $title = sprintf( __( '%1$s Archives %2$s %3$s', 'blossom-pin-pro'), '<span class="label">','</span>', '<h1 class="pate-title">'  . post_type_archive_title( '', false ) . '</h1>') ;
        }
    }elseif( is_tax() ) {
        $tax = get_taxonomy( get_queried_object()->taxonomy );
        if( $ed_prefix ){
             $title = '<h1 class="pate-title">' . single_term_title( '', false ) . '</h1>';
                               
        }else{
            $title = sprintf( __( '%1$s: %2$s', 'blossom-pin-pro' ), '<span>' . $tax->labels->singular_name . '</span>', '<h1 class="pate-title">' . single_term_title( '', false ) . '</h1>' );
        }
    }else {
        $title = sprintf( __( '%1$sArchives%2$s', 'blossom-pin-pro' ), '<h1 class="pate-title">', '</h1>' );
    }
    if( is_post_type_archive( 'product' ) ){
        $title = sprintf( __( '%1$s%2$s%3$s', 'blossom-pin-pro' ), '<h1 class="pate-title">', get_the_title( get_option( 'woocommerce_shop_page_id' ) ), '</h1>' );
    }

    return $title;
    
}
endif;
add_filter( 'get_the_archive_title', 'blossom_pin_pro_get_the_archive_title' );

if( ! function_exists( 'blossom_pin_pro_remove_archive_description' ) ) :
/**
 * filter the_archive_description & get_the_archive_description to show post type archive
 * @param  string $description original description
 * @return string post type description if on post type archive
 */
function blossom_pin_pro_remove_archive_description( $description ){
    $ed_shop_archive_description = get_theme_mod( 'ed_shop_archive_description', false );
    $shop_archive_description    = get_theme_mod( 'shop_archive_description' );
    if( is_post_type_archive( 'product' ) ) {
        if( ! $ed_shop_archive_description ){
            $description = '';
        }else{
            if( $shop_archive_description ) $description = $shop_archive_description;
        }
    }
    return wpautop( wp_kses_post( $description ) );
}
endif;
add_filter( 'get_the_archive_description', 'blossom_pin_pro_remove_archive_description' );

if( ! function_exists( 'blossom_pin_pro_post_like_cb' ) ) :
/**
 * Ajax Callback for post like
*/
function blossom_pin_pro_post_like_cb(){
    $post_id = intval( $_POST['id'] );    
    $likes   = ( $count = get_post_meta( $post_id, '_blossom_pin_pro_post_like', true ) ) ? $count : 0;
    $ip_list = ( $ip = get_post_meta( $post_id, '_blossom_pin_pro_post_like_ip', true ) ) ? $ip : array();
    
    if( blossom_pin_pro_likes_can( $post_id ) ){
        $likes     = $likes + 1;
        $ip_list[] = blossom_pin_pro_get_real_ip_address();
        
        update_post_meta( $post_id, '_blossom_pin_pro_post_like', $likes );
        update_post_meta( $post_id, '_blossom_pin_pro_post_like_ip', $ip_list );

        echo '<div class="btn-like liked"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-19337 -11164 16 14.667"><path fill="#da222e" id="love" class="cls-1" d="M8,3.29C6.674-.309,0,.225,0,5.669c0,2.712,2.04,6.321,8,10,5.96-3.677,8-7.286,8-10,0-5.412-6.667-6-8-2.379Z" transform="translate(-19337 -11165)"/></svg><span class="post-like-count">' . absint( $likes ) . '</span></div>';
    }

    //echo blossom_pin_pro_get_like_count( $post_id );
    wp_die(); // this is required to terminate immediately and return a proper response               
}
endif;
add_action( 'wp_ajax_blossom_pin_pro_post_like', 'blossom_pin_pro_post_like_cb' );
add_action( 'wp_ajax_nopriv_blossom_pin_pro_post_like', 'blossom_pin_pro_post_like_cb' );

if( ! function_exists( 'blossom_pin_pro_allowed_social_protocols' ) ) :
/**
 * List of allowed social protocols in HTML attributes.
 * @param  array $protocols Array of allowed protocols.
 * @return array
 */
function blossom_pin_pro_allowed_social_protocols( $protocols ) {
    $social_protocols = array(
        'skype'
    );
    return array_merge( $protocols, $social_protocols );    
}
endif;
add_filter( 'kses_allowed_protocols' , 'blossom_pin_pro_allowed_social_protocols' );

if( ! function_exists( 'blossom_pin_pro_migrate_free_option' ) ) :
/**
 * Function to migrate free theme option to pro theme
*/
function blossom_pin_pro_migrate_free_option(){    
    $fresh = get_option( '_blossom_pin_pro_fresh_install' ); //flag to check if it is first switch
   
    if( ! $fresh ){        
        $options = get_option( 'theme_mods_blossom-pin-pro' ); //@todo Need to change this to free theme's theme mode
        
        if( $options ){
            //migrate free theme option to pro
            foreach( $options as $option => $value ){
                if( $option !== 'sidebars_widgets' ){
                    set_theme_mod( $option, $value );
                }    
            }         
        }        
        update_option( '_blossom_pin_pro_fresh_install', true );  
    }
}
endif;
add_action( 'after_switch_theme', 'blossom_pin_pro_migrate_free_option' );

if( ! function_exists( 'blossom_pin_pro_single_post_schema' ) ) :
/**
 * Single Post Schema
 *
 * @return string
 */
function blossom_pin_pro_single_post_schema() {
    if ( is_singular( 'post' ) ) {
        global $post;
        $custom_logo_id = get_theme_mod( 'custom_logo' );

        $site_logo   = wp_get_attachment_image_src( $custom_logo_id , 'blossom-pin-schema' );
        $images      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $excerpt     = blossom_pin_pro_escape_text_tags( $post->post_excerpt );
        $content     = $excerpt === "" ? mb_substr( blossom_pin_pro_escape_text_tags( $post->post_content ), 0, 110 ) : $excerpt;
        $schema_type = ! empty( $custom_logo_id ) && has_post_thumbnail( $post->ID ) ? "BlogPosting" : "Blog";

        $args = array(
            "@context"  => "http://schema.org",
            "@type"     => $schema_type,
            "mainEntityOfPage" => array(
                "@type" => "WebPage",
                "@id"   => esc_url( get_permalink( $post->ID ) )
            ),
            "headline"  => esc_html( get_the_title( $post->ID ) ),
            "image"     => array(
                "@type"  => "ImageObject",
                "url"    => $images[0],
                "width"  => $images[1],
                "height" => $images[2]
            ),
            "datePublished" => esc_html( get_the_time( DATE_ISO8601, $post->ID ) ),
            "dateModified"  => esc_html( get_post_modified_time(  DATE_ISO8601, __return_false(), $post->ID ) ),
            "author"        => array(
                "@type"     => "Person",
                "name"      => blossom_pin_pro_escape_text_tags( get_the_author_meta( 'display_name', $post->post_author ) )
            ),
            "publisher" => array(
                "@type"       => "Organization",
                "name"        => esc_html( get_bloginfo( 'name' ) ),
                "description" => wp_kses_post( get_bloginfo( 'description' ) ),
                "logo"        => array(
                    "@type"   => "ImageObject",
                    "url"     => $site_logo[0],
                    "width"   => $site_logo[1],
                    "height"  => $site_logo[2]
                )
            ),
            "description" => ( class_exists('WPSEO_Meta') ? WPSEO_Meta::get_value( 'metadesc' ) : $content )
        );

        if ( has_post_thumbnail( $post->ID ) ) :
            $args['image'] = array(
                "@type"  => "ImageObject",
                "url"    => $images[0],
                "width"  => $images[1],
                "height" => $images[2]
            );
        endif;

        if ( ! empty( $custom_logo_id ) ) :
            $args['publisher'] = array(
                "@type"       => "Organization",
                "name"        => esc_html( get_bloginfo( 'name' ) ),
                "description" => wp_kses_post( get_bloginfo( 'description' ) ),
                "logo"        => array(
                    "@type"   => "ImageObject",
                    "url"     => $site_logo[0],
                    "width"   => $site_logo[1],
                    "height"  => $site_logo[2]
                )
            );
        endif;

        echo '<script type="application/ld+json">';
        if ( version_compare( PHP_VERSION, '5.4.0' , '>=' ) ) {
            echo wp_json_encode( $args, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
        } else {
            echo wp_json_encode( $args );
        }
        echo '</script>';
    }
}
endif;
add_action( 'wp_head', 'blossom_pin_pro_single_post_schema' );

if( ! function_exists( 'blossom_pin_pro_get_comment_author_link' ) ) :
/**
 * Filter to modify comment author link
 * @link https://developer.wordpress.org/reference/functions/get_comment_author_link/
 */
function blossom_pin_pro_get_comment_author_link( $return, $author, $comment_ID ){
    $comment = get_comment( $comment_ID );
    $url     = get_comment_author_url( $comment );
    $author  = get_comment_author( $comment );
 
    if ( empty( $url ) || 'http://' == $url )
        $return = '<span itemprop="name">'. esc_html( $author ) .'</span>';
    else
        $return = '<span itemprop="name"><a href=' . esc_url( $url ) . ' rel="external nofollow noopener" class="url" itemprop="url">' . esc_html( $author ) . '</a></span>';

    return $return;
}
endif;
add_filter( 'get_comment_author_link', 'blossom_pin_pro_get_comment_author_link', 10, 3 );

if( ! function_exists( 'blossom_pin_pro_search_form' ) ) :
/**
 * Search Form
*/
function blossom_pin_pro_search_form(){ 
    $placeholder = is_search() ? '' : _x( 'What are you looking for&hellip;', 'placeholder', 'blossom-pin-pro' );
    $form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '"><label class="screen-reader-text">' . esc_html__( 'Looking for Something?', 'blossom-pin-pro' ) . '</label><label for="submit-field"><span>' . esc_html__( 'Search anything and hit enter.', 'blossom-pin-pro' ) . '</span><input type="search" class="search-field" placeholder="' . esc_attr( $placeholder ) . '" value="' . esc_attr( get_search_query() ) . '" name="s" /></label><input type="submit" class="search-submit" value="'. esc_attr_x( 'Search', 'submit button', 'blossom-pin-pro' ) .'" /></form>';
 
    return $form;
}
endif;
add_filter( 'get_search_form', 'blossom_pin_pro_search_form' );

if( ! function_exists( 'blossom_pin_pro_custom_comment_reply_link' ) ):
/**
 * Filter to modify comment reply link
 * @link https://developer.wordpress.org/reference/functions/comment_reply_link/
 */
function blossom_pin_pro_custom_comment_reply_link( $link ){
    $link = str_replace( 'Reply', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="-19391 18231 18 15"><path id="path" d="M934,147.2a11.941,11.941,0,0,1,7.5,3.7,16.063,16.063,0,0,1,3.5,7.3c-2.4-3.4-6.1-5.1-11-5.1v4.1l-7-7,7-7Z" transform="translate(-20318 18087.801)"/></svg>Reply ', $link );
    return $link;
}
endif;
add_filter( 'comment_reply_link', 'blossom_pin_pro_custom_comment_reply_link' );

if( ! function_exists( 'blossom_pin_pro_home_ads' ) ) :
/**
 * Prints Home Page ADs
*/
function blossom_pin_pro_home_ads(){
    $ed_ad          = get_theme_mod( 'ed_home_ad' );
    $target         = get_theme_mod( 'open_link_diff_tab_home', true ) ? 'target="_blank"' : '';
    $ed_ad_code     = get_theme_mod( 'ed_home_ad_code' );
    $ad_code        = get_theme_mod( 'home_ad_code' ); 
    $after_n_post   = get_theme_mod( 'after_n_post', 3 );
    $repeat_n_times = get_theme_mod( 'repeat_n_times', 3 );
    $ad_img_one     = get_theme_mod( 'home_ad_one' ); 
    $ad_link_one    = get_theme_mod( 'home_ad_one_link' );
    $ad_img_two     = get_theme_mod( 'home_ad_two' ); 
    $ad_link_two    = get_theme_mod( 'home_ad_two_link' );
    $ad_img_three   = get_theme_mod( 'home_ad_three' ); 
    $ad_link_three  = get_theme_mod( 'home_ad_three_link' );
    
    if( $ad_img_one ){
        $image_one = wp_get_attachment_image_url( $ad_img_one, 'full' );
    }else{
        $image_one = false;
    }
    
    if( $ad_img_two ){
        $image_two = wp_get_attachment_image_url( $ad_img_two, 'full' );
    }else{
        $image_two = false;
    }
    
    if( $ad_img_three ){
        $image_three = wp_get_attachment_image_url( $ad_img_three, 'full' );
    }else{
        $image_three = false;
    }
    
    static $count     = 0;
	static $repeated  = 0;
    static $img_count = 0;
    
    if( $ed_ad ){
        if( $ed_ad_code && $ad_code ){ //AD Code
            if( ( $count % $after_n_post == 0 ) && ( $count > 0 ) && ( $repeated < $repeat_n_times ) ){
                blossom_pin_pro_get_ad_block( false, false, false, $ad_code, $ed_ad_code );
                $repeated ++;    
            }
        }else{ //AD Image
            if( ( $count % $after_n_post == 0 ) && ( $count > 0 ) ){
                $img_count ++;                
                if( $img_count == 1 ){
                    blossom_pin_pro_get_ad_block( $image_one, $ad_link_one, $target, false, false );
                }
                if( $img_count == 2 ){
                    blossom_pin_pro_get_ad_block( $image_two, $ad_link_two, $target, false, false );
                }
                if( $img_count == 3 ){
                    blossom_pin_pro_get_ad_block( $image_three, $ad_link_three, $target, false, false );
                }            
            }
        }
        $count ++;
    }
}
endif;

if( ! function_exists( 'blossom_pin_pro_loop_start' ) ) :
/**
 * Injecting home page AD inside loop 
*/
function blossom_pin_pro_loop_start( $query ){
    if( is_home() && $query->is_main_query() ){
        add_action( 'the_post', 'blossom_pin_pro_home_ads' );
        add_action( 'loop_end', 'blossom_pin_pro_loop_end' );
    }else{
        remove_action( 'the_post', 'blossom_pin_pro_home_ads', 10 );
    }    
}
endif;
add_action( 'loop_start', 'blossom_pin_pro_loop_start' );

if( ! function_exists( 'blossom_pin_pro_loop_end' ) ) :
/**
 * Remove home page Ad from the loop 
*/
function blossom_pin_pro_loop_end(){
    remove_action( 'the_post', 'blossom_pin_pro_home_ads', 10 );
}
endif;

if( ! function_exists( 'blossom_pin_pro_activate_notice' ) ) :
/**
* Theme activation notice.
* @since 2.0.0
*/
function blossom_pin_pro_activate_notice() {
    global $current_user;
    $theme_list         = wp_get_theme( 'blossom-pin-pro' );
    $add_license        = get_option( 'blossom-pin-pro_license_key' );
    $current_screen     = get_current_screen();    
    $activate_license   = get_option( 'blossom-pin-pro_license_key_status' );
    $statuses           = array( 'invalid', 'inactive', 'expired', 'disabled', 'site_inactive' );

    if( $theme_list->exists() && ( empty( $add_license ) || in_array( $activate_license, $statuses ) ) && $current_screen->base != 'appearance_page_blossom-pin-pro-license' ) { ?>
        <div class="notice notice-info is-dismissible">
            <p><?php esc_html_e( 'Activate Theme License ( Blossom Pin Pro ) to enjoy the full benefits of using the theme. We\'re sorry about this extra step but we built the activation to prevent mass piracy of our themes. This allows us to better serve our paying customers. An active theme comes with free updates, top notch support and guaranteed latest WordPress support.', 'blossom-pin-pro' ); ?>
            </p>
            <p>
                <span style="color:red;"><?php esc_html_e( 'Please Activate Theme License!', 'blossom-pin-pro' ); ?></span> - <a href="<?php echo esc_url( 'themes.php?page=blossom-pin-pro-license' ); ?>"><u><?php esc_html_e( 'Click here to enter your license key', 'blossom-pin-pro' ); ?></u></a> - <?php esc_html_e( 'if there is an error, please contact us at ', 'blossom-pin-pro' ); ?><a href="mailto:support@blossomthemes.com" target="_blank">support@blossomthemes.com</a> - <a href="<?php echo esc_url( 'https://blossomthemes.com/active-theme-license/' ); ?>" target="_blank"><u><?php esc_html_e( 'How to activate the theme license', 'blossom-pin-pro' ); ?></u></a>.
            </p> 
        </div>  
        <?php
    }
}
endif;
add_action( 'admin_notices', 'blossom_pin_pro_activate_notice' );

if( ! function_exists( 'blossom_pin_pro_redirect_on_activation' ) ) :
/**
 * Redirect to Getting Started page on theme activation
 *
 */
function blossom_pin_pro_redirect_on_activation() {
    global $pagenow;

    if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
        wp_redirect( admin_url( "themes.php?page=blossom-pin-pro-license" ) );
    }
}
endif;
add_action( 'admin_init', 'blossom_pin_pro_redirect_on_activation' );

if( ! function_exists( 'blossom_pin_pro_filter_post_gallery' ) ) :
/**
 * Filter the output of the gallery. 
*/ 
function blossom_pin_pro_filter_post_gallery( $output, $attr, $instance ){
    global $post, $wp_locale;

    $html5 = current_theme_supports( 'html5', 'gallery' );
    $atts = shortcode_atts( array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post ? $post->ID : 0,
        'itemtag'    => $html5 ? 'figure'     : 'dl',
        'icontag'    => $html5 ? 'div'        : 'dt',
        'captiontag' => $html5 ? 'figcaption' : 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => '',
        'link'       => ''
    ), $attr, 'gallery' );
    
    $id = intval( $atts['id'] );
    
    if ( ! empty( $atts['include'] ) ) {
        $_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    
        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( ! empty( $atts['exclude'] ) ) {
        $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    } else {
        $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    }
    
    if ( empty( $attachments ) ) {
        return '';
    }
    
    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment ) {
            $output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
        }
        return $output;
    }
    
    $itemtag = tag_escape( $atts['itemtag'] );
    $captiontag = tag_escape( $atts['captiontag'] );
    $icontag = tag_escape( $atts['icontag'] );
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) ) {
        $itemtag = 'dl';
    }
    if ( ! isset( $valid_tags[ $captiontag ] ) ) {
        $captiontag = 'dd';
    }
    if ( ! isset( $valid_tags[ $icontag ] ) ) {
        $icontag = 'dt';
    }
    
    $columns = intval( $atts['columns'] );
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';
    
    $selector = "gallery-{$instance}";
    
    $gallery_style = '';
    
    /**
     * Filter whether to print default gallery styles.
     *
     * @since 3.1.0
     *
     * @param bool $print Whether to print default gallery styles.
     *                    Defaults to false if the theme supports HTML5 galleries.
     *                    Otherwise, defaults to true.
     */
    if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
        $gallery_style = "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
                margin-top: 10px;
                text-align: center;
                width: {$itemwidth}%;
            }
            #{$selector} img {
                border: 2px solid #cfcfcf;
            }
            #{$selector} .gallery-caption {
                margin-left: 0;
            }
            /* see gallery_shortcode() in wp-includes/media.php */
        </style>\n\t\t";
    }
    
    $size_class = sanitize_html_class( $atts['size'] );
    $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    
    /**
     * Filter the default gallery shortcode CSS styles.
     *
     * @since 2.5.0
     *
     * @param string $gallery_style Default CSS styles and opening HTML div container
     *                              for the gallery shortcode output.
     */
    $output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );
    
    $i = 0; 
    foreach ( $attachments as $id => $attachment ) {
            
        $attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
        if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
            //$image_output = wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr ); // for attachment url 
            $image_output = "<a href='" . wp_get_attachment_url( $id ) . "' data-fancybox='group{$columns}' data-caption='" . esc_attr( $attachment->post_excerpt ) . "'>";
            $image_output .= wp_get_attachment_image( $id, $atts['size'], false, $attr );
            $image_output .= "</a>";
        } elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
            $image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
        } else {
            $image_output = wp_get_attachment_link( $id, $atts['size'], true, false, false, $attr ); //for attachment page
        }
        $image_meta  = wp_get_attachment_metadata( $id );
    
        $orientation = '';
        if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
            $orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
        }
        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "
            <{$icontag} class='gallery-icon {$orientation}'>
                $image_output
            </{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='wp-caption-text gallery-caption' id='$selector-$id'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
            $output .= '<br style="clear: both" />';
        }
    }
    
    if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
        $output .= "
            <br style='clear: both' />";
    }
    
    $output .= "
        </div>\n";
    
    return $output;
}
endif;
add_filter( 'post_gallery', 'blossom_pin_pro_filter_post_gallery', 10, 3 );