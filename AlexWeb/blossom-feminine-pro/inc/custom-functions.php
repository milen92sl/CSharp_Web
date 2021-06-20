<?php
/**
 * Custom functions
 *
 * @package Blossom_Feminine_Pro
 */

/**
 * Show/Hide Admin Bar in frontend.
*/
if( ! get_theme_mod( 'ed_adminbar', true ) ) add_filter( 'show_admin_bar', '__return_false' );

if ( ! function_exists( 'blossom_feminine_pro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blossom_feminine_pro_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Blossom Feminine Pro, use a find and replace
	 * to change 'blossom-feminine-pro' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'blossom-feminine-pro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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
		'primary'   => esc_html__( 'Primary', 'blossom-feminine-pro' ),
        'secondary' => esc_html__( 'Secondary', 'blossom-feminine-pro' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array( 'header-text' => array( 'site-title', 'site-description' ) ) );
    
    /**
     * Set up the WordPress core custom header feature.
     */
    add_theme_support( 'custom-header', apply_filters( 'blossom_feminine_pro_custom_header_args', array(
		'default-image' => '',
		'width'         => 1920,
		'height'        => 180,
        'header-text'   => false
	) ) );
    
    /** Images sizes */
    add_image_size( 'blossom-feminine-slider', 1920, 650, true );
    add_image_size( 'blossom-feminine-slider-two-big', 920, 650, true );
    add_image_size( 'blossom-feminine-slider-two', 460, 310, true );
    add_image_size( 'blossom-feminine-slider-four', 500, 650, true );
    add_image_size( 'blossom-feminine-featured', 1410, 600, true );
    add_image_size( 'blossom-feminine-with-sidebar', 1020, 600, true );
    add_image_size( 'blossom-feminine-single-two', 1920, 450, true );
    add_image_size( 'blossom-feminine-blog', 435, 435, true );
    add_image_size( 'blossom-feminine-cat', 450, 300, true );
    add_image_size( 'blossom-feminine-home', 480, 300, true );
    add_image_size( 'blossom-feminine-related', 320, 200, true );
    add_image_size( 'blossom-feminine-diva-home',370, 491, true );
    add_image_size( 'blossom-feminine-schema', 600, 60 );

    
    if ( defined( 'JETPACK__VERSION' ) ){
        // Add theme support for Responsive Videos.
        add_theme_support( 'jetpack-responsive-videos' );
    }

    // Add excerpt support for pages
    add_post_type_support( 'page', 'excerpt' );
}
endif;
add_action( 'after_setup_theme', 'blossom_feminine_pro_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blossom_feminine_pro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blossom_feminine_pro_content_width', 1020 );
}
add_action( 'after_setup_theme', 'blossom_feminine_pro_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function blossom_feminine_pro_scripts() {
	// Use minified libraries if SCRIPT_DEBUG is false
    $build       = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix      = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
    $home_layout = get_theme_mod( 'home_layout', 'one-col-right' );
    
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/css' . $build . '/owl.carousel' . $suffix . '.css', array(), '2.2.1' );
    wp_enqueue_style( 'animate', get_template_directory_uri(). '/css' . $build . '/animate' . $suffix . '.css', array(), '3.5.2' );    
    wp_enqueue_style( 'blossom-feminine-pro-google-fonts', blossom_feminine_pro_fonts_url(), array(), null );
    wp_enqueue_style( 'blossom-feminine-pro-style', get_stylesheet_uri(), array(), BLOSSOM_FEMININE_PRO_THEME_VERSION );
    
    if( is_woocommerce_activated() )
    wp_enqueue_style( 'blossom-feminine-pro-woocommerce', get_template_directory_uri(). '/css' . $build . '/woocommerce' . $suffix . '.css', array(), BLOSSOM_FEMININE_PRO_THEME_VERSION );
    
    if( get_theme_mod( 'ed_lazy_load', true ) || get_theme_mod( 'ed_lazy_load_cimage', true ) )
    wp_enqueue_script( 'layzr', get_template_directory_uri() . '/js/layzr.min.js', array('jquery'), '2.0.4', true );
    
    //Fancy Box
    if( get_theme_mod( 'ed_lightbox' ) ){
        wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/css' . $build . '/jquery.fancybox' . $suffix . '.css', array(), '3.5.2' );
        wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri() . '/js' . $build . '/jquery.fancybox' . $suffix . '.js', array('jquery'), '3.5.2', true );
    }
    
    if( $home_layout == 'three-col-masonry' )
    wp_enqueue_script( 'masonry' );
    
    wp_enqueue_script( 'all', get_template_directory_uri() . '/js' . $build . '/all' . $suffix . '.js', array( 'jquery' ), '5.6.3', true );
    wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/js' . $build . '/v4-shims' . $suffix . '.js', array( 'jquery' ), '5.6.3', true );
	wp_enqueue_script( 'sticky-kit', get_template_directory_uri() . '/js' . $build . '/sticky-kit' . $suffix . '.js', array(), '1.1.3', true );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array( 'jquery' ), '2.2.1', true );
	wp_enqueue_script( 'jquery-matchHeight', get_template_directory_uri() . '/js' . $build . '/jquery.matchHeight' . $suffix . '.js', array( 'jquery' ), '0.7.2', true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/js' . $build . '/wow' . $suffix . '.js', array( 'jquery' ), '1.1.3', true );
    wp_enqueue_script( 'blossom-feminine-pro-custom', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array( 'jquery' ), BLOSSOM_FEMININE_PRO_THEME_VERSION, true );
    
    $array = array(
		'lightbox'      => esc_attr( get_theme_mod( 'ed_lightbox') ),
        'auto'          => esc_attr( get_theme_mod( 'slider_auto', true ) ),
		'loop'          => esc_attr( get_theme_mod( 'slider_loop', true ) ),
        'speed'         => get_theme_mod( 'slider_speed', 2000 ),
        'animation'     => esc_attr( get_theme_mod( 'slider_animation' ) ),
        'child'         => esc_attr( get_theme_mod( 'child_additional_support', 'default' ) ),
        'sticky'        => esc_attr( get_theme_mod( 'ed_sticky_header' ) ),
        'sticky_widget' => esc_attr( get_theme_mod( 'ed_last_widget_sticky' ) ),
        'header'        => get_theme_mod( 'header_layout', 'one' ),
        'url'           => admin_url( 'admin-ajax.php' ),
        'rtl'           => is_rtl(),
	);
    wp_localize_script( 'blossom-feminine-pro-custom', 'bfp_data', $array );
    
    $pagination = get_theme_mod( 'pagination_type', 'numbered' );
    $loadmore   = get_theme_mod( 'load_more_label', __( 'Load More Posts', 'blossom-feminine-pro' ) );
    $loading    = get_theme_mod( 'loading_label', __( 'Loading...', 'blossom-feminine-pro' ) );
    $nomore     = get_theme_mod( 'no_more_label', __( 'No More Post', 'blossom-feminine-pro' ) );
    
    if( $pagination == 'load_more' || $pagination == 'infinite_scroll' ){
        
        // Add parameters for the JS
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
        
        wp_enqueue_script( 'blossom-feminine-pro-ajax', get_template_directory_uri() . '/js' . $build . '/ajax' . $suffix . '.js', array('jquery'), BLOSSOM_FEMININE_PRO_THEME_VERSION, true );
        
        wp_localize_script( 
            'blossom-feminine-pro-ajax', 
            'bfp_ajax',
            array(
                'url'        => admin_url( 'admin-ajax.php' ),
                'startPage'  => $paged,
                'maxPages'   => $max,
                'nextLink'   => next_posts( $max, false ),
                'autoLoad'   => $pagination,
                'loadmore'   => $loadmore,
                'loading'    => $loading,
                'nomore'     => $nomore,
                'layouts'    => $home_layout,
                'plugin_url' => plugins_url(),                
             )
        );
        
        if ( is_jetpack_activated( true ) ) {
            wp_enqueue_style( 'tiled-gallery', plugins_url() . '/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.css' );            
        }
    }
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blossom_feminine_pro_scripts' );

if( ! function_exists( 'blossom_feminine_pro_admin_scripts' ) ) :
/**
 * Enqueue admin scripts and styles.
*/
function blossom_feminine_pro_admin_scripts(){
    wp_enqueue_style( 'blossom-feminine-pro-admin', get_template_directory_uri() . '/inc/css/admin.css', '', BLOSSOM_FEMININE_PRO_THEME_VERSION );
}
endif; 
add_action( 'admin_enqueue_scripts', 'blossom_feminine_pro_admin_scripts' );

if( ! function_exists( 'blossom_feminine_pro_body_classes' ) ) :
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blossom_feminine_pro_body_classes( $classes ) {
	
    $bg_color   = get_theme_mod( 'bg_color', '#ffffff' );
    $bg_image   = get_theme_mod( 'bg_image' );
    $bg_pattern = get_theme_mod( 'bg_pattern', 'nobg' );
    $bg         = get_theme_mod( 'body_bg', 'image' );
    
    // Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
    
    // Adds a class for custom background Color
    if( $bg_color != '#ffffff' ){
        $classes[] = 'custom-background-color custom-background';
    }
    
    // Adds a class for custom background Color
    if( ( $bg == 'image' && $bg_image ) || (  $bg == 'pattern' && $bg_pattern != 'nobg' ) ){
        $classes[] = 'custom-background-image custom-background';
    }
    
    if( is_search() && ! is_post_type_archive( 'product' ) ){
        $classes[] = 'search-result-page';   
    }

    $classes[] = blossom_feminine_pro_sidebar( false, true );
    
	return $classes;
}
endif;
add_filter( 'body_class', 'blossom_feminine_pro_body_classes' );

if( ! function_exists( 'blossom_feminine_pro_post_classes' ) ) :
/**
 * Add custom classes to the array of post classes.
*/
function blossom_feminine_pro_post_classes( $classes ){
    $sticky_layout = get_theme_mod( 'sticky_post_layout', 'one' );
    $home_layout   = get_theme_mod( 'home_layout', 'one-col-right' );
    
    if( is_home() ){
        $classes[] = 'wow fadeIn';
    }
    
    if( $home_layout !== 'three-col-masonry' ){
        if( is_sticky() ){
            if( $sticky_layout == 'one' ){
                $classes[] = 'sticky-layout-one';
            }elseif( $sticky_layout == 'two' ){
                $classes[] = 'sticky-layout-two';
            }
        }
    }
    
    if( is_search() ){
        $classes[] = 'search-post';
    }
    
    $classes[] = 'latest_post';
    
    return $classes;
}
endif;
add_filter( 'post_class', 'blossom_feminine_pro_post_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function blossom_feminine_pro_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blossom_feminine_pro_pingback_header' );

if ( ! function_exists( 'blossom_feminine_pro_excerpt_more' ) ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function blossom_feminine_pro_excerpt_more($more) {
	 return is_admin() ? $more : ' &hellip; ';
}

endif;
add_filter( 'excerpt_more', 'blossom_feminine_pro_excerpt_more' );

if ( ! function_exists( 'blossom_feminine_pro_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function blossom_feminine_pro_excerpt_length( $length ) {
	$excerpt_length = get_theme_mod( 'excerpt_length', 55 );
    return is_admin() ? $length : absint( $excerpt_length );    
}
endif;
add_filter( 'excerpt_length', 'blossom_feminine_pro_excerpt_length', 999 );

if( ! function_exists( 'blossom_feminine_pro_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function blossom_feminine_pro_change_comment_form_default_fields( $fields ){
    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><label for="author">' . esc_html__( 'Name', 'blossom-feminine-pro' ) . '<span class="required">*</span></label><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'blossom-feminine-pro' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'blossom-feminine-pro' ) . '<span class="required">*</span></label><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'blossom-feminine-pro' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><label for="url">' . esc_html__( 'Website', 'blossom-feminine-pro' ) . '</label><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'blossom-feminine-pro' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;
    
}
endif;
add_filter( 'comment_form_default_fields', 'blossom_feminine_pro_change_comment_form_default_fields' );

if( ! function_exists( 'blossom_feminine_pro_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function blossom_feminine_pro_change_comment_form_defaults( $defaults ){
    
    $defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'blossom-feminine-pro' ) . '</label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'blossom-feminine-pro' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
    
    return $defaults;
    
}
endif;
add_filter( 'comment_form_defaults', 'blossom_feminine_pro_change_comment_form_defaults' );

if( ! function_exists( 'blossom_feminine_pro_exclude_cat' ) ) :
/**
 * Exclude post with Category from blog and archive page. 
*/
function blossom_feminine_pro_exclude_cat( $query ){
    $ed_slider      = get_theme_mod( 'ed_slider', true );
    $slider_type    = get_theme_mod( 'slider_type', 'latest_posts' );
    $slider_cat     = get_theme_mod( 'slider_cat' );
    $posts_per_page = get_theme_mod( 'no_of_slides', 3 );
    $repetitive_posts = get_theme_mod( 'include_repetitive_posts', false );
    
    if( ! is_admin() && $query->is_main_query() && $query->is_home() && $ed_slider && !$repetitive_posts ){
        if( $slider_type === 'cat' && $slider_cat  ){
            if( $query->is_home() || $query->is_archive() ) {
    			$query->set( 'category__not_in', array( $slider_cat ) );
    		}
        }elseif( $slider_type === 'latest_posts' ){
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
add_filter( 'pre_get_posts', 'blossom_feminine_pro_exclude_cat' );

if( ! function_exists( 'blossom_feminine_pro_get_the_archive_title' ) ) :
/**
 * Filter Archive Title
*/
function blossom_feminine_pro_get_the_archive_title( $title ){
    
    $ed_prefix = get_theme_mod( 'ed_prefix_archive', false );
    
    if( is_post_type_archive( 'product' ) ){
        $title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
    }elseif( $ed_prefix ){
        if( is_category() ){
            $title = single_cat_title( '', false );
        }elseif ( is_tag() ){
            $title = single_tag_title( '', false );
        }elseif( is_author() ){
            $title = '<span class="vcard">' . get_the_author() . '</span>';
        }elseif ( is_year() ) {
            $title = get_the_date( __( 'Y', 'blossom-feminine-pro' ) );
        }elseif ( is_month() ) {
            $title = get_the_date( __( 'F Y', 'blossom-feminine-pro' ) );
        }elseif ( is_day() ) {
            $title = get_the_date( __( 'F j, Y', 'blossom-feminine-pro' ) );
        }elseif ( is_post_type_archive() && ! is_post_type_archive( 'product' ) ) {
            $title = post_type_archive_title( '', false );            
        }elseif ( is_tax() ) {
            $tax = get_taxonomy( get_queried_object()->taxonomy );
            $title = single_term_title( '', false );
        }
    }   
    return $title;
}
endif;
add_filter( 'get_the_archive_title', 'blossom_feminine_pro_get_the_archive_title' );

if( ! function_exists( 'blossom_feminine_pro_remove_archive_description' ) ) :
    /**
     * filter the_archive_description & get_the_archive_description to show post type archive
     * @param  string $description original description
     * @return string post type description if on post type archive
     */
    function blossom_feminine_pro_remove_archive_description( $description ){
        $shop_archive_description = get_theme_mod( 'shop_archive_description', true );
        $archive_description      = get_theme_mod( 'archive_description_content' );
        if( is_post_type_archive( 'product' ) ) {
            if( ! $shop_archive_description ){
                $description = '';
            }else{
                if( $archive_description ) $description = $archive_description;
            }
        }
        return wpautop( wp_kses_post( $description ) );
    }
endif;
add_filter( 'get_the_archive_description', 'blossom_feminine_pro_remove_archive_description' );

if( ! function_exists( 'blossom_feminine_pro_allowed_social_protocols' ) ) :
/**
 * List of allowed social protocols in HTML attributes.
 * @param  array $protocols Array of allowed protocols.
 * @return array
 */
function blossom_feminine_pro_allowed_social_protocols( $protocols ) {
    $social_protocols = array(
        'skype'
    );
    return array_merge( $protocols, $social_protocols );    
}
endif;
add_filter( 'kses_allowed_protocols' , 'blossom_feminine_pro_allowed_social_protocols' );

if( ! function_exists( 'blossom_feminine_pro_migrate_free_option' ) ) :
/**
 * Function to migrate free theme option to pro theme
*/
function blossom_feminine_pro_migrate_free_option(){
    
    $fresh = get_option( '_blossom_feminine_pro_fresh_install' ); //flag to check if it is first switch
    
    if( ! $fresh ){        
        $options = get_option( 'theme_mods_blossom-feminine' );
        
        if( $options ){
            foreach( $options as $option => $value ){
                if( $option !== 'sidebars_widgets' ){
                    set_theme_mod( $option, $value );
                }    
            }
            
        }
        update_option( '_blossom_feminine_pro_fresh_install', true );  
    }
}
endif;
add_action( 'after_switch_theme', 'blossom_feminine_pro_migrate_free_option' );

if( ! function_exists( 'blossom_feminine_pro_single_post_schema' ) ) :
/**
 * Single Post Schema
 *
 * @return string
 */
function blossom_feminine_pro_single_post_schema() {
    if ( is_singular( 'post' ) ) {
        global $post;
        $custom_logo_id = get_theme_mod( 'custom_logo' );

        $site_logo   = wp_get_attachment_image_src( $custom_logo_id , 'blossom-feminine-schema' );
        $images      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $excerpt     = blossom_feminine_pro_escape_text_tags( $post->post_excerpt );
        $content     = $excerpt === "" ? mb_substr( blossom_feminine_pro_escape_text_tags( $post->post_content ), 0, 110 ) : $excerpt;
        $schema_type = ! empty( $custom_logo_id ) && has_post_thumbnail( $post->ID ) ? "BlogPosting" : "Blog";

        $args = array(
            "@context"  => "http://schema.org",
            "@type"     => $schema_type,
            "mainEntityOfPage" => array(
                "@type" => "WebPage",
                "@id"   => get_permalink( $post->ID )
            ),
            "headline"  => ( function_exists( '_wp_render_title_tag' ) ? wp_get_document_title() : wp_title( '', false, 'right' ) ),
            "image"     => array(
                "@type"  => "ImageObject",
                "url"    => $images[0],
                "width"  => $images[1],
                "height" => $images[2]
            ),
            "datePublished" => get_the_time( DATE_ISO8601, $post->ID ),
            "dateModified"  => get_post_modified_time(  DATE_ISO8601, __return_false(), $post->ID ),
            "author"        => array(
                "@type"     => "Person",
                "name"      => blossom_feminine_pro_escape_text_tags( get_the_author_meta( 'display_name', $post->post_author ) )
            ),
            "publisher" => array(
                "@type"       => "Organization",
                "name"        => get_bloginfo( 'name' ),
                "description" => get_bloginfo( 'description' ),
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
                "name"        => get_bloginfo( 'name' ),
                "description" => get_bloginfo( 'description' ),
                "logo"        => array(
                    "@type"   => "ImageObject",
                    "url"     => $site_logo[0],
                    "width"   => $site_logo[1],
                    "height"  => $site_logo[2]
                )
            );
        endif;

        echo '<script type="application/ld+json">' , PHP_EOL;
        echo wp_json_encode( $args, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) , PHP_EOL;
        echo '</script>' , PHP_EOL;
    }
}
endif;
add_action( 'wp_head', 'blossom_feminine_pro_single_post_schema' );

if( ! function_exists( 'blossom_feminine_pro_get_comment_author_link' ) ) :
    /**
     * Filter to modify comment author link
     * @link https://developer.wordpress.org/reference/functions/get_comment_author_link/
     */
    function blossom_feminine_pro_get_comment_author_link( $return, $author, $comment_ID ){
        $comment = get_comment( $comment_ID );
        $url     = get_comment_author_url( $comment );
        $author  = get_comment_author( $comment );
     
        if ( empty( $url ) || 'http://' == $url )
            $return = '<span itemprop="name">'. esc_html( $author ) .'</span>';
        else
            $return = "<span itemprop='name'><a href='$url' rel='external nofollow' class='url' itemprop='url'>$author</a></span>";

        return $return;
    }
endif;
add_filter( 'get_comment_author_link', 'blossom_feminine_pro_get_comment_author_link', 10, 3 );

if( ! function_exists( 'blossom_feminine_pro_activate_notice' ) ) :
/**
* Theme activation notice.
* 
*/
function blossom_feminine_pro_activate_notice() {
    global $current_user;
    $theme_list   = wp_get_theme( 'blossom-feminine-pro' );
    $add_license = get_option( 'blossom-feminine-pro_license_key' );
    $current_screen = get_current_screen();    
    $activate_license = get_option( 'blossom-feminine-pro_license_key_status' );   
    if( $theme_list->exists() && ( empty( $add_license ) || $activate_license == 'invalid' || $activate_license == 'inactive' ) && $current_screen->base != 'appearance_page_blossom-feminine-pro-license' ) { ?>
        <div class="notice notice-info is-dismissible">
            <p><?php esc_html_e( 'Activate Theme License ( Blossom Feminine Pro ) to enjoy the full benefits of using the theme. We\'re sorry about this extra step but we built the activation to prevent mass piracy of our themes. This allows us to better serve our paying customers. An active theme comes with free updates, top notch support and guaranteed latest WordPress support.', 'blossom-feminine-pro' ); ?>
            </p>
            <p>
                <span style="color:red;"><?php esc_html_e( 'Please Activate Theme License!', 'blossom-feminine-pro' ); ?></span> - <a href="<?php echo esc_url( 'themes.php?page=blossom-feminine-pro-license' ); ?>"><u><?php esc_html_e( 'Click here to enter your license key', 'blossom-feminine-pro' ); ?></u></a> - <?php esc_html_e( 'if there is an error, please contact us at ', 'blossom-feminine-pro' ); ?><a href="mailto:support@blossomthemes.com" target="_blank">support@blossomthemes.com</a> - <a href="<?php echo esc_url( 'https://blossomthemes.com/active-theme-license/' ); ?>" target="_blank"><u><?php esc_html_e( 'How to activate the theme license.', 'blossom-feminine-pro' ); ?></u></a>
            </p> 
        </div>  
        <?php
    }
}
endif;
add_action( 'admin_notices', 'blossom_feminine_pro_activate_notice' );

if( ! function_exists( 'blossom_feminine_pro_redirect_on_activation' ) ) :
/**
 * Redirect to Getting Started page on theme activation
 *
 */
function blossom_feminine_pro_redirect_on_activation() {
    global $pagenow;

    if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
        wp_redirect( admin_url( "themes.php?page=blossom-feminine-pro-license" ) );
    }
}
endif;
add_action( 'admin_init', 'blossom_feminine_pro_redirect_on_activation' );

if( ! function_exists( 'blossom_feminine_pro_filter_post_gallery' ) ) :
/**
 * Filter the output of the gallery. 
*/ 
function blossom_feminine_pro_filter_post_gallery( $output, $attr, $instance ){
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
add_filter( 'post_gallery', 'blossom_feminine_pro_filter_post_gallery', 10, 3 );