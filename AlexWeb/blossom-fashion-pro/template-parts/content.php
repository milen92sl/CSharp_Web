<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Fashion_Pro
 */

$home_layout    = get_theme_mod( 'home_layout', 'one' ); 
$archive_layout = get_theme_mod( 'archive_layout', 'one' );
$layout = is_home() ? $home_layout : $archive_layout;

$array_one = array( 'four', 'four-left', 'four-full', 'five', 'five-left', 'five-full', 'seven', 'seven-left', 'seven-full' );
$array_two = array( 'four', 'four-left', 'four-full', 'five', 'five-left', 'five-full', 'six', 'six-left', 'six-full', 'seven', 'seven-left', 'seven-full' );
$array_three = array( 'one', 'one-left', 'one-full', 'two', 'two-left', 'two-full', 'three', 'three-left', 'three-full' );
$array_four = array( 'three', 'three-left', 'three-full', 'four', 'four-left', 'four-full' );
$array_five = array( 'five', 'five-left', 'five-full', 'seven', 'seven-left', 'seven-full' );
$array_six = array( 'three', 'three-left', 'three-full', 'five', 'five-left', 'five-full', 'seven', 'seven-left', 'seven-full' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">
	<?php 
        if( in_array( $layout, $array_one ) ) echo '<div class="post-content">';
        if( in_array( $layout, $array_two) ) blossom_fashion_pro_post_thumbnail(); //Post Thumbnail
        if( in_array( $layout, $array_one ) ) echo '<div class="text-holder">';
        
        blossom_fashion_pro_entry_header(); //Entry Header
        if( in_array( $layout, $array_three ) ) blossom_fashion_pro_post_thumbnail(); //Post Thumbnail
        
        if( $layout == 'three' || $layout == 'three-left' || $layout == 'three-full' ) echo '<div class="post-content"><div class="post-content-holder">';
        
        blossom_fashion_pro_entry_content(); //Entry Content
        blossom_fashion_pro_entry_footer(); //Entry Footer
        
        if( $layout == 'four' || $layout == 'four-left' || $layout == 'four-full' ) echo '</div>';
        if( in_array( $layout, $array_four ) ) echo '</div>';
        
        /**
         * Affiliate Shop
        */
        if( $layout != 'seven' && $layout != 'seven-left' && $layout != 'seven-full' ) blossom_fashion_pro_get_affiliate_shop();
        
        if( in_array( $layout, $array_five ) ) echo '</div>';
        if( in_array( $layout, $array_six ) ) echo '</div>';
        
        if( $layout == 'seven' || $layout == 'seven-left' || $layout == 'seven-full' ) blossom_fashion_pro_get_affiliate_shop();
    ?>
</article><!-- #post-<?php the_ID(); ?> -->
