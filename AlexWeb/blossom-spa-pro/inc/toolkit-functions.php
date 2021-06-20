<?php
/**
 * Toolkit Filters
 *
 * @package Blossom_Spa_Pro
 */

if( ! function_exists( 'blossom_spa_pro_default_cta_color' ) ) :
    function blossom_spa_pro_default_cta_color(){
        return '#9cbe9c';
    }
endif;
add_filter( 'bttk_cta_bg_color', 'blossom_spa_pro_default_cta_color' );

if( ! function_exists( 'blossom_spa_pro_bttk_img_alignment' ) ) :
    function blossom_spa_pro_bttk_img_alignment(){
        $array = array(
            'left'  => esc_html__( 'Left', 'blossom-spa-pro' ),
            'right' => esc_html__( 'Right', 'blossom-spa-pro' ),
        );
        return $array; 
    }
endif;
add_filter( 'bttk_img_alignment', 'blossom_spa_pro_bttk_img_alignment' );

if( ! function_exists( 'blossom_spa_pro_default_cta_button_alignent' ) ) :
    function blossom_spa_pro_default_cta_button_alignent(){
        $array = array(
            'right'     => esc_html__( 'Right', 'blossom-spa-pro' ),
            'left'      => esc_html__( 'Left', 'blossom-spa-pro' ),
            'centered'  => esc_html__( 'Centered', 'blossom-spa-pro' ),
        );
        return $array; 
    }
endif;
add_filter( 'blossomthemes_cta_button_alignment', 'blossom_spa_pro_default_cta_button_alignent' );

if( ! function_exists( 'blossom_spa_pro_default_icon_text_image_size' ) ) :
    function blossom_spa_pro_default_icon_text_image_size(){
        return 'blossom-spa-service';
    }
endif;
add_filter( 'bttk_icon_img_size', 'blossom_spa_pro_default_icon_text_image_size' );

if( ! function_exists( 'blossom_spa_pro_default_team_member_image_size' ) ) :
    function blossom_spa_pro_default_team_member_image_size(){
        return 'blossom-spa-team';
    }
endif;
add_filter( 'bttk_team_member_icon_img_size', 'blossom_spa_pro_default_team_member_image_size' );

if( ! function_exists( 'blossom_spa_pro_newsletter_bg_image_size' ) ) :
    function blossom_spa_pro_newsletter_bg_image_size(){
        return 'full';
    }
endif;
add_filter( 'bt_newsletter_img_size', 'blossom_spa_pro_newsletter_bg_image_size' );

if( ! function_exists( 'blossom_spa_pro_ad_image' ) ) :
    function blossom_spa_pro_ad_image(){
        return 'full';
    }
endif;
add_filter( 'bttk_ad_img_size', 'blossom_spa_pro_ad_image' );

if( ! function_exists( 'blossom_spa_pro_newsletter_bg_color' ) ) :
    function blossom_spa_pro_newsletter_bg_color(){
        return '#ff91a4';
    }
endif;
add_filter( 'bt_newsletter_bg_color_setting', 'blossom_spa_pro_newsletter_bg_color' );

if( ! function_exists( 'blossom_spa_pro_author_image' ) ) :
   function blossom_spa_pro_author_image(){
       return 'blossom-spa-blog-list';
   }
endif;
add_filter( 'author_bio_img_size', 'blossom_spa_pro_author_image' );

if( ! function_exists( 'blossom_spa_pro_defer_js_files' ) ) :
    function blossom_spa_pro_defer_js_files(){
        $defer_js = get_theme_mod( 'ed_defer', false );

        return ( $defer_js ) ? false : true;

    }
endif;
add_filter( 'bttk_public_assets_enqueue', 'blossom_spa_pro_defer_js_files' );

if( ! function_exists( 'blossom_spa_pro_featured_page_widget_filter' ) ) :
/**
 * Filter for Featured page widget
*/
function blossom_spa_pro_featured_page_widget_filter( $html, $args, $instance ){ 
    $read_more         = !empty( $instance['readmore'] ) ? $instance['readmore'] : __( 'Read More', 'blossom-spa-pro' );      
    $show_feat_img     = !empty( $instance['show_feat_img'] ) ? $instance['show_feat_img'] : '' ;  
    $show_page_content = !empty( $instance['show_page_content'] ) ? $instance['show_page_content'] : '' ;        
    $show_readmore     = !empty( $instance['show_readmore'] ) ? $instance['show_readmore'] : '' ;        
    $page_list         = !empty( $instance['page_list'] ) ? $instance['page_list'] : 1 ;
    $image_alignment   = !empty( $instance['image_alignment'] ) ? $instance['image_alignment'] : 'left' ;
    if( !isset( $page_list ) || $page_list == '' ) return;
    
    $post_no = get_post($page_list); 
    
    $target = 'target="_blank"';
    if( isset($instance['target']) && $instance['target']!='' )
    {
        $target = 'target="_self"';
    }
    
    if( $post_no ){
        setup_postdata( $post_no );
        ob_start(); ?>
        <div class="widget-featured-holder <?php echo esc_attr($image_alignment);?>">
            <div class="featured-holder-wrap">                    
                <?php
                    echo is_page_template( 'templates/about.php' ) ? '<h1 class="widget-title">' : $args['before_title']; //Done for SEO
                    echo esc_html( $post_no->post_title );
                    echo is_page_template( 'templates/about.php' ) ? '</h1>' : $args['after_title'];
                ?>
                <?php if( has_post_thumbnail( $post_no ) && $show_feat_img ){ ?>
                <div class="img-holder">
                    <a <?php echo $target;?> href="<?php the_permalink( $post_no ); ?>">
                        <?php 
                        $featured_img_size = apply_filters( 'featured_img_size', 'full' );
                        echo get_the_post_thumbnail( $post_no, $featured_img_size ); ?>
                    </a>
                </div>
                <?php } ?>
                <div class="text-holder">
                    <div class="featured_page_content">
                        <?php 
                        if( isset( $show_page_content ) && $show_page_content!='' ){
                            echo apply_filters( 'the_content', $post_no->post_content );                                
                        }else{
                            echo apply_filters( 'the_excerpt', get_the_excerpt( $post_no ) );                                
                        }
                        
                        if( isset( $show_readmore ) && $show_readmore!='' ){ ?>
                            <a href="<?php the_permalink( $post_no ); ?>" <?php echo $target;?> class="btn-readmore"><?php echo esc_html( $read_more );?></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>                    
            </div>
        </div>                    
        <?php    
        $html = ob_get_clean();
        wp_reset_postdata();
        return $html;
    }
}
endif;
add_filter( 'blossom_featured_page_widget_filter', 'blossom_spa_pro_featured_page_widget_filter', 10, 3 );

if( ! function_exists( 'blossom_spa_pro_add_subtitle_on_text_widget' ) ) :
/**
 * Add Subtitle In Text Widget
*/
function blossom_spa_pro_add_subtitle_on_text_widget( $widget, $return, $instance ) {
    
    if ( 'text' == $widget->id_base ) {
 
        $subtitle = isset( $instance['subtitle'] ) ? $instance['subtitle'] : '';
        ?>
            <p>
                <label for="<?php echo esc_attr( $widget->get_field_id('subtitle') ); ?>">
                    <?php esc_html_e( 'Subtitle', 'blossom-spa-pro' ); ?>
                </label>
                <input class="text" type="text" id="<?php echo esc_attr( $widget->get_field_id('subtitle') ); ?>" name="<?php echo esc_attr( $widget->get_field_name('subtitle') ); ?>" value="<?php echo isset( $subtitle ) ? esc_html( $subtitle ) : ''; ?>" />
            </p>
        <?php
    }
}
endif;
add_filter( 'in_widget_form', 'blossom_spa_pro_add_subtitle_on_text_widget', 10, 3 );

if( ! function_exists( 'blossom_spa_pro_save_subtitle_on_text_widget' ) ) :
/**
 * Add Subtitle In Text Widget
*/
function blossom_spa_pro_save_subtitle_on_text_widget( $instance, $new_instance, $old_instance, $widget ) {
 
    if ( 'text' == $widget->id_base && !empty( $instance['text'] ) ) {
        $instance['subtitle'] = !empty( $new_instance['subtitle'] ) ? $new_instance['subtitle'] : '';
    } 
    return $instance;
}
endif;
add_filter( 'widget_update_callback', 'blossom_spa_pro_save_subtitle_on_text_widget', 10, 4 );

if( ! function_exists( 'blossom_spa_pro_dynamic_sidebar_params_on_text_widget' ) ) :
/**
 * Add Subtitle In Text Widget
*/
function blossom_spa_pro_dynamic_sidebar_params_on_text_widget( $params ){
    
    global $wp_registered_widgets;
    $widget_id  = $params[0]['widget_id'];
    $widget_obj = $wp_registered_widgets[$widget_id];
    $widget_opt = get_option($widget_obj['callback'][0]->option_name);
    $widget_num = $widget_obj['params'][0]['number'];
    if ( isset( $widget_opt[$widget_num]['subtitle'] ) ) {
        $params[0]['before_title'] = '<span class="sub-title">' . esc_html( $widget_opt[$widget_num]['subtitle'] ) . '</span>' . $params[0]['before_title'];
    }
    return $params;
}
endif;
add_filter('dynamic_sidebar_params', 'blossom_spa_pro_dynamic_sidebar_params_on_text_widget');

if( ! function_exists( 'blossom_spa_pro_add_subtitle_on_featured_page' ) ) :
/**
 * Add Subtitle In Featured Page Widget
*/
function blossom_spa_pro_add_subtitle_on_featured_page( $widget, $return, $instance ) {
    
    if ( 'blossomtheme_featured_page_widget' == $widget->id_base ) {
 
        $featured_subtitle = isset( $instance['featured_subtitle'] ) ? $instance['featured_subtitle'] : '';
        ?>
            <p>
                <label for="<?php echo esc_attr( $widget->get_field_id('featured_subtitle') ); ?>">
                    <?php esc_html_e( 'Subtitle', 'blossom-spa-pro' ); ?>
                </label>
                <input class="text" type="text" id="<?php echo esc_attr( $widget->get_field_id('featured_subtitle') ); ?>" name="<?php echo esc_attr( $widget->get_field_name('featured_subtitle') ); ?>" value="<?php echo isset( $featured_subtitle ) ? esc_html( $featured_subtitle ) : ''; ?>" />
            </p>
        <?php
    }
}
endif;
add_filter( 'in_widget_form', 'blossom_spa_pro_add_subtitle_on_featured_page', 10, 3 );

if( ! function_exists( 'blossom_spa_pro_save_subtitle_on_featured_page' ) ) :
/**
 * Add Subtitle In Featured Page Widget
*/
function blossom_spa_pro_save_subtitle_on_featured_page( $instance, $new_instance, $old_instance, $widget ) {
 
    if ( 'blossomtheme_featured_page_widget' == $widget->id_base && !empty( $new_instance['featured_subtitle'] ) ) {
        $instance['featured_subtitle'] = !empty( $new_instance['featured_subtitle'] ) ? $new_instance['featured_subtitle'] : '';
    } 
    return $instance;
}
endif;
add_filter( 'widget_update_callback', 'blossom_spa_pro_save_subtitle_on_featured_page', 10, 4 );

if( ! function_exists( 'blossom_spa_pro_dynamic_sidebar_params_on_featured_page' ) ) :
/**
 * Add Subtitle In Featured Page Widget
*/
function blossom_spa_pro_dynamic_sidebar_params_on_featured_page( $params ){
    
    global $wp_registered_widgets;
    $widget_id  = $params[0]['widget_id'];
    $widget_obj = $wp_registered_widgets[$widget_id];
    $widget_opt = get_option($widget_obj['callback'][0]->option_name);
    $widget_num = $widget_obj['params'][0]['number'];
    if ( isset( $widget_opt[$widget_num]['featured_subtitle'] ) ) {
        $params[0]['before_title'] = '<span class="sub-title">'. esc_html( $widget_opt[$widget_num]['featured_subtitle'] ) . '</span>' . $params[0]['before_title'];
    }
    return $params;
}
endif;
add_filter( 'dynamic_sidebar_params', 'blossom_spa_pro_dynamic_sidebar_params_on_featured_page' );