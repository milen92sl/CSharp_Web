<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Fashion_Pro
 */

$single_layout = get_theme_mod( 'single_post_layout', 'one' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
        if( $single_layout == 'one' || $single_layout == 'three' || $single_layout == 'five' ) blossom_fashion_pro_entry_header(); 
        if( $single_layout === 'one' || $single_layout == 'five' ) blossom_fashion_pro_post_thumbnail();
        
        blossom_fashion_pro_entry_content();
        blossom_fashion_pro_entry_footer();
        
    ?>
</article><!-- #post-<?php the_ID(); ?> -->
