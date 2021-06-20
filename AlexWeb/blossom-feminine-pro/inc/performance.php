<?php
/**
 * Performance Related Functions
 *
 * @package Blossom_Feminine_Pro
 */

if( ! function_exists( 'blossom_feminine_pro_image_lazy_load_attr' ) ) :
/**
 * Add data-layzr attribute to featured image ( for lazy load )
 *
 * @param array $attr
 * @param WP_Post $attachment
 * @param string|array $size
 *
 * @return array
 */
function blossom_feminine_pro_image_lazy_load_attr( $attr, $attachment, $size ) {
	$ed_lazyload = get_theme_mod( 'ed_lazy_load', true );
    
    if( is_admin() || is_feed() || ( function_exists ('is_cart') && is_cart() ) || is_page_template( 'templates/blossom-portfolio.php' ) ) return $attr;
	
    if( $ed_lazyload ){
		$attr['data-layzr'] = $attr['src'];
		$attr['src'] = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
		if ( isset( $attr['srcset'] ) ) {
			$attr['data-layzr-srcset'] = $attr['srcset'];
			$attr['srcset'] = '';
		}
	}

	return $attr;
}
endif;
add_filter( 'wp_get_attachment_image_attributes', 'blossom_feminine_pro_image_lazy_load_attr', 10, 3 );

if( ! function_exists( 'blossom_feminine_pro_content_image_lazy_load_attr' ) ) :
/**
 * Add data-layzr attribute to post content images ( for lazy load )
 *
 * @param string $content
 * @return string
 */
function blossom_feminine_pro_content_image_lazy_load_attr( $content ) {
	$ed_lazyload_content = get_theme_mod( 'ed_lazy_load_cimage', true );
	
    if ( $ed_lazyload_content && ! empty( $content ) ) {
		$content = preg_replace_callback(
			'/<img([^>]+?)src=[\'"]?([^\'"\s>]+)[\'"]?([^>]*)>/',
			'blossom_feminine_pro_content_image_lazy_load_attr_callback',
			$content
		);
	}

	return $content;
}
endif;
add_filter( 'the_content', 'blossom_feminine_pro_content_image_lazy_load_attr' );

if( ! function_exists( 'blossom_feminine_pro_content_image_lazy_load_attr_callback' ) ) :
/**
 * Callback to move src to data-src and replace it with a 1x1 tranparent image.
 *
 * @param $matches
 * @return string
 */
function blossom_feminine_pro_content_image_lazy_load_attr_callback( $matches ) {
	$transparent_img = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
	if ( preg_match( '/ data-lazy *= *"false" */', $matches[0] ) ) {
		return '<img' . $matches[1] . 'src="' . $matches[2] . '"' . $matches[3] . '>';
	} else {
		return '<img' . $matches[1] . 'src="' . $transparent_img . '" data-layzr="' . $matches[2] . '"' . str_replace( 'srcset=', 'data-layzr-srcset=', $matches[3]). '>';
	}
}
endif;

if ( ! function_exists( 'blossom_feminine_pro_js_async_attr' ) ) :
/**
 * 
*/
function blossom_feminine_pro_js_async_attr( $tag ){
	
	if( is_admin() ) return $tag;

	$async_files = apply_filters( 'blossom_feminine_pro_js_async_files', array( 
		get_template_directory_uri() . '/js/ajax.min.js',
		get_template_directory_uri() . '/js/custom.min.js',		
		get_template_directory_uri() . '/js/layzr.min.js',
        get_template_directory_uri() . '/js/owl.carousel.min.js',
        get_template_directory_uri() . '/js/sticky-kit.min.js',	
	) );
	
	$add_async = false;
	foreach( $async_files as $file ){
		if( strpos( $tag, $file ) !== false ){
			$add_async = true;
			break;
		}
	}

	if( $add_async && get_theme_mod( 'ed_defer', true ) ) $tag = str_replace( ' src', ' defer="defer" src', $tag );

	return $tag;
}
endif;
add_filter( 'script_loader_tag', 'blossom_feminine_pro_js_async_attr', 10 );

if ( ! function_exists( 'blossom_feminine_pro_remove_script_version' ) ) :
/**
 * Remove Script/Style version parameter
*/
function blossom_feminine_pro_remove_script_version( $src ){
	
	if ( is_admin() )
		return $src;
    
    if( get_theme_mod( 'ed_ver', true ) ){
        $parts = explode( '?ver', $src );
        return $parts[0];
    }else{
        return $src;
    }	
}
endif;
add_filter( 'script_loader_src', 'blossom_feminine_pro_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'blossom_feminine_pro_remove_script_version', 15, 1 );