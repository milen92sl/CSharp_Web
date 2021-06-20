<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Pin_Pro
 */
$single_layout = get_theme_mod( 'single_post_layout', 'one' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
        if( $single_layout == 'four'  ) {
            echo '<div class="entry-post-header">';
            blossom_pin_pro_single_entry_header();
            blossom_pin_pro_post_thumbnail();
            echo '</div>';
        }
        if( $single_layout == 'two' ) blossom_pin_pro_post_thumbnail();
        if( $single_layout == 'one' || $single_layout == 'two'  ) blossom_pin_pro_single_entry_header();
    ?>
    <div class="holder">

        <?php
            /**
            * @hooked blossom_pin_pro_meta_info
            */
            do_action( 'blossom_pin_pro_before_single_post_entry_content' );
        ?>
        

        <div class="post-content">
        <?php 
            if( $single_layout == 'one' ) blossom_pin_pro_post_thumbnail(); 
            /**
            * @hooked blossom_pin_pro_post_format_content - 10
            * @hooked blossom_pin_pro_entry_content - 20
            * @hooked blossom_pin_pro_entry_footer  - 25
            * @hooked blossom_pin_pro_author        - 30
            */
            do_action( 'blossom_pin_pro_single_post_entry_content' );
        ?> 
        </div> <!-- .post-content -->          
    </div> <!-- .holder -->
</article><!-- #post-<?php the_ID(); ?> -->