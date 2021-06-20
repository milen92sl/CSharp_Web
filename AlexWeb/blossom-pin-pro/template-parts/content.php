<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blossom_Pin_Pro
 */
$home_layout  = get_theme_mod( 'home_layout', 'layout-one' );
$archive_layout = get_theme_mod( 'archive_layout', 'archive-one' );

if( is_home() && ( $home_layout == 'layout-four' || $home_layout == 'layout-four-right-sidebar' || $home_layout == 'layout-four-left-sidebar' ) ){
    blossom_pin_pro_blog_layout_four();
} 
else{ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">
        <?php if( ! ( ( is_archive() || is_search() ) && ( $archive_layout == 'archive-one' ) ) ) : ?>
        <div class="holder">
            <div class="top">
        <?php endif;  
        /**
         * @hooked blossom_pin_pro_post_format_content - 10
         * @hooked blossom_pin_pro_entry_header - 20
        */
        do_action( 'blossom_pin_pro_before_post_entry_content' );
        
        /**
         * @hooked blossom_pin_pro_entry_content - 15
         * @hooked blossom_pin_pro_entry_footer  - 20
         * @hooked blossom_pin_pro_get_ad_after_content - 25
        */
        do_action( 'blossom_pin_pro_post_entry_content' );
        
        if( ! ( ( is_archive() || is_search() ) && ( $archive_layout == 'archive-one' ) ) ) : ?>
            </div><!-- .top -->
            <div class="bottom">
                <?php blossom_pin_pro_posted_on();
                blossom_pin_pro_social_share( false, false, true ); ?>
            </div><!-- .bottom -->
        </div> <!-- .holder -->
        <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php }