<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blossom_Feminine_Pro
 */

$layout = get_theme_mod( 'single_post_layout', 'one' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
    
    <?php
        if( $layout == 'three' ) echo '<div class="single-post-layout-three">';
        if( $layout == 'one' || $layout == 'three' ) blossom_feminine_pro_single_post_thumbnail( $layout );
        if( $layout == 'three' ) blossom_feminine_pro_single_entry_header();
        if( $layout == 'three' ) echo '</div>';
    ?>
    
    <div class="text-holder">        
        <?php
            if( $layout == 'one' || $layout == 'four' ) blossom_feminine_pro_single_entry_header();
            blossom_feminine_pro_single_entry_content();
            blossom_feminine_pro_single_entry_footer();      
        ?>
    </div><!-- .text-holder -->
    
</article><!-- #post-<?php the_ID(); ?> -->