<?php
/**
 * Blossom Spa Pro Standalone Functions.
 *
 * @package Blossom_Spa_Pro
 */

if ( ! function_exists( 'blossom_spa_pro_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function blossom_spa_pro_posted_on( $related = false ) {
	$ed_updated_post_date = get_theme_mod( 'ed_post_update_date', true );
    $single_layout  = get_theme_mod( 'single_layout', 'one' );
    $on = ( is_single() && $single_layout == 'two' && !$related ) ? __( 'ON', 'blossom-spa-pro' ) : '';
    
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) && !( is_front_page() && ! is_home() ) ) {
		if( $ed_updated_post_date ){
            $time_string = '<time class="entry-date published updated" datetime="%3$s" itemprop="dateModified">%4$s</time></time><time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
            $on = ( is_single() && $single_layout == 'two' && !$related ) ? __( 'UPDATED ON', 'blossom-spa-pro' ) : '';		  
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
    
    $posted_on = sprintf( '%1$s', $on .'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );
	
	echo '<span class="posted-on">';
    
    if( !( is_single() && $single_layout == 'two' ) || $related ) :
        echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><defs><style>.clk{fill:none;}.clkb{fill:#ccc6c8;}</style></defs><g transform="translate(7 18)"><g transform="translate(-7 -18)"><path class="clk" d="M0,0H36V36H0Z"/></g><g transform="translate(-2 -13)"><path class="clkb" d="M15.5,2A13.5,13.5,0,1,0,29,15.5,13.54,13.54,0,0,0,15.5,2Zm0,24.3A10.8,10.8,0,1,1,26.3,15.5,10.814,10.814,0,0,1,15.5,26.3Z" transform="translate(-2 -2)"/><path class="clkb" d="M13.025,7H11v8.1l7.02,4.32,1.08-1.755L13.025,14.02Z" transform="translate(1.15 -0.25)"/></g></g>
        </svg>';
    endif;

    echo $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'blossom_spa_pro_posted_by' ) ) :
/**
 * Prints HTML with meta information for the current author.
 */
function blossom_spa_pro_posted_by() {
    global $post;
    $single_layout  = get_theme_mod( 'single_layout', 'one' );
    $author_name    = ( is_single() ) ? get_the_author_meta( 'display_name', $post->post_author ) : get_the_author();
    $author_url     = ( is_single() ) ? get_author_posts_url( get_the_author_meta( 'ID', $post->post_author ) ) : get_author_posts_url( get_the_author_meta( 'ID' ) );
    $byline_text    = ( is_single() && $single_layout == 'two' ) ? esc_html__( 'BY', 'blossom-spa-pro') : '';
	$byline         = sprintf( '%s', '<span class="author" itemprop="name">'. $byline_text .'<a class="url fn n" href="' . esc_url( $author_url ) . '" itemprop="url">' . esc_html( $author_name ) . '</a></span>' 
    );
    if( is_home() || is_archive() || is_search() ) echo '<div class="author-like-wrap">';
    
    echo '<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person">';
    
    if( is_single() && $single_layout == 'two' ) :
        echo '<span class="author-img">'. get_avatar( get_the_author_meta( 'ID' ), 120 ) . '</span>';
    else:
        echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19"><defs><style>.auta{fill:none;}.auta,.autb{stroke:rgba(0,0,0,0);}.autb{fill:#ccc6c8;}</style></defs><g transform="translate(0.5 0.5)"><path class="auta" d="M0,0H18V18H0Z"></path><g transform="translate(1.5 1.5)"><path class="autb" d="M9.5,2A7.5,7.5,0,1,0,17,9.5,7.5,7.5,0,0,0,9.5,2ZM5.8,14.21c.322-.675,2.287-1.335,3.7-1.335s3.382.66,3.7,1.335a5.944,5.944,0,0,1-7.395,0Zm8.468-1.088c-1.073-1.3-3.675-1.747-4.77-1.747s-3.7.443-4.77,1.747a6,6,0,1,1,9.54,0Z" transform="translate(-2 -2)"></path><path class="autb" d="M11.125,6A2.625,2.625,0,1,0,13.75,8.625,2.618,2.618,0,0,0,11.125,6Zm0,3.75A1.125,1.125,0,1,1,12.25,8.625,1.123,1.123,0,0,1,11.125,9.75Z" transform="translate(-3.625 -3)"></path></g></g></svg>';
    endif;

    echo $byline . '</span>';
    
    if( is_home() || is_archive() ) blossom_spa_pro_like_count();
    if( is_home() || is_archive() || is_search() ) echo '</div>';
    
}
endif;

if( ! function_exists( 'blossom_spa_pro_comment_count' ) ) :
/**
 * Comment Count
*/
function blossom_spa_pro_comment_count(){
    $single_layout  = get_theme_mod( 'single_layout', 'one' );
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        
        echo '<span class="comment-box">';
		
        if( !( is_single() && $single_layout == 'two' ) ) :
            echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.943 15.465"><defs><style>.co{fill:none;stroke:#ccc6c8;stroke-width:1.3px;}</style></defs><path class="co" d="M15.425,11.636H12.584v2.03L9.2,11.636H1.218A1.213,1.213,0,0,1,0,10.419v-9.2A1.213,1.213,0,0,1,1.218,0H15.425a1.213,1.213,0,0,1,1.218,1.218v9.2A1.213,1.213,0,0,1,15.425,11.636Z" transform="translate(0.65 0.65)"></path></svg>';
        endif;
		
        comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'No Comment<span class="screen-reader-text"> on %s</span>', 'blossom-spa-pro' ),
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

if ( ! function_exists( 'blossom_spa_pro_category' ) ) :
/**
 * Prints categories
 */
function blossom_spa_pro_category(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ' ', 'blossom-spa-pro' ) );
		if ( $categories_list ) {
			echo '<span class="category" itemprop="about">' . $categories_list . '</span>';
		}
	}elseif( 'blossom-portfolio' === get_post_type() ) {
        $term_list = get_the_term_list( get_the_ID(), 'blossom_portfolio_categories' );
        if( $term_list ) echo '<span class="category">' . $term_list . '</span>';
    }
}
endif;

if ( ! function_exists( 'blossom_spa_pro_tag' ) ) :
/**
 * Prints tags
 */
function blossom_spa_pro_tag(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'blossom-spa-pro' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="cat-tags" itemprop="about">' . esc_html__( '%1$sTags:%2$s %3$s', 'blossom-spa-pro' ) . '</span>', '<h5>', '</h5>', $tags_list );
		}
	}
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_posts_list' ) ) :
/**
 * Returns Latest, Related & Popular Posts
*/
function blossom_spa_pro_get_posts_list( $status ){
    global $post;
    
    $args = array(
        'post_type'           => 'post',
        'posts_status'        => 'publish',
        'ignore_sticky_posts' => true
    );
    
    switch( $status ){
        case 'latest':        
        $args['posts_per_page'] = 3;
        $title                  = __( 'Recommended Articles', 'blossom-spa-pro' );
        $class                  = ' recent-posts';
        $image_size             = 'blossom-spa-related';
        break;
        
        case 'related':
        $args['posts_per_page'] = 3;
        $args['post__not_in']   = array( $post->ID );
        $args['orderby']        = 'rand';
        $title                  = get_theme_mod( 'related_post_title', __( 'Recommended Articles', 'blossom-spa-pro' ) );
        $class                  = ' related-posts';
        $image_size             = 'blossom-spa-related';
        $related_tax            = get_theme_mod( 'related_taxonomy', 'cat' );
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
        break;        
    }
    
    $qry = new WP_Query( $args );
    
    if( $qry->have_posts() ){ ?>    
        <div class="additional-post<?php echo esc_attr( $class ); ?>">
    		<?php 
            if( $title ) echo '<h3 class="post-title"><span>' . esc_html( $title ) . '</span></h3>'; ?>
            <div class="article-wrap">
    			<?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                    <article class="post">
        				<figure class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                    if( has_post_thumbnail() ){
                                        the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                                    }else{ 
                                        blossom_spa_pro_get_fallback_svg( $image_size );
                                    }
                                ?>
                            </a>
                        </figure>
        				<header class="entry-header">
                            <div class="entry-meta">
                                <?php blossom_spa_pro_posted_on( true ); ?>
                            </div>
        					<?php
                                the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                            ?>                        
        				</header>
        			</article>
    			<?php }?>
            </div>    		
    	</div>
        <?php
        wp_reset_postdata();
    }
}
endif;

if( ! function_exists( 'blossom_spa_pro_site_branding' ) ) :
/**
 * Site Branding
*/
function blossom_spa_pro_site_branding(){  
    $site_title       = get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    $header_text      = get_theme_mod( 'header_text', 1 );
    $second_logo      = get_theme_mod( 'secondary_logo' ) ? get_theme_mod( 'secondary_logo' ) : get_theme_mod( 'custom_logo' );
    
    if( has_custom_logo() || $site_title || $site_description || $header_text ) :
        if( has_custom_logo() && ( $site_title || $site_description ) && $header_text ) {
            $branding_class = ' has-logo-text';
        }else{
            $branding_class = '';
        }?>
        <div class="site-branding<?php echo esc_attr( $branding_class ); ?>" itemscope itemtype="http://schema.org/Organization">
            <?php 
            if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                the_custom_logo();
                echo '<a class="second-custom-logo-link" href="' . esc_url( home_url( '/' ) ) . '" rel="home" itemprop="url">' . wp_get_attachment_image( $second_logo, 'full', false, array( 'class' => 'second-custom-logo', 'alt' => $site_title ) ) . '</a>';
                
            } 
            if( $site_title || $site_description ) :
                if( $branding_class ) echo '<div class="site-title-wrap">';
                if( is_front_page() ){ ?>
                    <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php 
                }else{ ?>
                    <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
                <?php }
                
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ){ ?>
                    <p class="site-description" itemprop="description"><?php echo $description; ?></p>
                <?php
                }
                if( $branding_class ) echo '</div>';
            endif;

            ?>
        </div>    
    <?php
    endif;
}
endif;

if( ! function_exists( 'blossom_spa_pro_header_contact' ) ) :
/**
 * Site Branding
*/
function blossom_spa_pro_header_contact( $echo = true, $layout = true ){ 
    
    $phone_label = get_theme_mod( 'phone_label', __( 'Phone', 'blossom-spa-pro' ) );
    $phone       = get_theme_mod( 'phone', '+123-456-7890' );
    $email_label = get_theme_mod( 'email_label', __( 'Email', 'blossom-spa-pro' ) );
    $email       = get_theme_mod( 'email', 'mail@domain.com' );
    $opening_hours_label = get_theme_mod( 'opening_hours_label', __( 'Opening Hours', 'blossom-spa-pro' ) );
    $opening_hours       = get_theme_mod( 'opening_hours', 'Mon - Fri: 7AM - 7PM' );
    
    if( $echo && ( !empty( $phone_label ) || !empty( $phone ) || !empty( $email_label ) || !empty( $email ) || !empty( $opening_hours_label ) || !empty( $opening_hours ) ) ) : ?>
        <div class="header-contact"> 
            <?php if( !empty( $phone_label ) || !empty( $phone ) ) : ?>
                <div class="contact-block">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><defs><style>.pha{fill:none;}.phb{fill:#ccc6c8;}</style></defs><path class="pha" d="M0,0H36V36H0Z"/><g transform="translate(4.5 4.5)"><path class="phb" d="M8.31,6a18.469,18.469,0,0,0,.675,3.885l-1.8,1.8A22.238,22.238,0,0,1,6.045,6H8.31M23.1,24.03a19.129,19.129,0,0,0,3.9.675V26.94a23.14,23.14,0,0,1-5.7-1.125l1.8-1.785M9.75,3H4.5A1.5,1.5,0,0,0,3,4.5,25.5,25.5,0,0,0,28.5,30,1.5,1.5,0,0,0,30,28.5V23.265a1.5,1.5,0,0,0-1.5-1.5,17.11,17.11,0,0,1-5.355-.855,1.259,1.259,0,0,0-.465-.075,1.537,1.537,0,0,0-1.065.435l-3.3,3.3A22.723,22.723,0,0,1,8.43,14.685l3.3-3.3a1.505,1.505,0,0,0,.375-1.53A17.041,17.041,0,0,1,11.25,4.5,1.5,1.5,0,0,0,9.75,3Z" transform="translate(-3 -3)"/></g></svg>
                    <?php if( $phone_label && $layout ) echo '<span class="title hphone-label">' . esc_html( $phone_label ) . '</span>';
                    if( !empty( $phone ) ) echo '<p class="content hphone"><a href="tel:' . esc_attr( $phone ) . '">' . esc_html( $phone ) . '</a></p>'; ?>
                </div>
            <?php endif; ?>

            <?php if( !empty( $email_label ) || !empty( $email ) ) : ?>
                <div class="contact-block">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><defs><style>.ema{fill:none;}.emb{fill:#ccc6c8;}</style></defs><path class="ema" d="M0,0H36V36H0Z"/><g transform="translate(3 2.925)"><path class="emb" d="M17,1.95a15,15,0,0,0,0,30h7.5v-3H17a12.154,12.154,0,0,1-12-12,12.154,12.154,0,0,1,12-12,12.154,12.154,0,0,1,12,12V19.1a2.425,2.425,0,0,1-2.25,2.355,2.425,2.425,0,0,1-2.25-2.355V16.95a7.5,7.5,0,1,0-2.19,5.3,5.555,5.555,0,0,0,4.44,2.2A5.269,5.269,0,0,0,32,19.1V16.95A15.005,15.005,0,0,0,17,1.95Zm0,19.5a4.5,4.5,0,1,1,4.5-4.5A4.494,4.494,0,0,1,17,21.45Z" transform="translate(-2 -1.95)"/></g></svg>
                    <?php if( $email_label && $layout ) echo '<span class="title hemail-label">' . esc_html( $email_label ) . '</span>';
                    if( !empty( $email ) ) echo '<p class="content hemail"><a href="mailto:' . sanitize_email( $email ) . '">' . sanitize_email( $email ) . '</a></p>'; ?>
                </div>
            <?php endif; ?>
            
            <?php if( !empty( $opening_hours_label ) || !empty( $opening_hours ) ) : ?>
                <div class="contact-block">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><defs><style>.clk{fill:none;}.clkb{fill:#ccc6c8;}</style></defs><g transform="translate(7 18)"><g transform="translate(-7 -18)"><path class="clk" d="M0,0H36V36H0Z"/></g><g transform="translate(-2 -13)"><path class="clkb" d="M15.5,2A13.5,13.5,0,1,0,29,15.5,13.54,13.54,0,0,0,15.5,2Zm0,24.3A10.8,10.8,0,1,1,26.3,15.5,10.814,10.814,0,0,1,15.5,26.3Z" transform="translate(-2 -2)"/><path class="clkb" d="M13.025,7H11v8.1l7.02,4.32,1.08-1.755L13.025,14.02Z" transform="translate(1.15 -0.25)"/></g></g></svg>
                    <?php if( $opening_hours_label && $layout ) echo '<span class="title hopening-label">' . esc_html( $opening_hours_label ) . '</span>';
                    if( !empty( $opening_hours ) ) echo '<p class="content hopening">' . esc_html( $opening_hours ) . '</p>'; ?>
                </div>
            <?php endif; ?>
    	</div><!-- .header-contact -->    
    <?php
    elseif ( !empty( $phone_label ) || !empty( $phone ) || !empty( $email_label ) || !empty( $email ) || !empty( $opening_hours_label ) || !empty( $opening_hours ) ) :
        return true;
    else :
        return false;
    endif;
}
endif;

if( ! function_exists( 'blossom_spa_pro_social_links' ) ) :
/**
 * Social Links 
*/
function blossom_spa_pro_social_links( $echo = true, $show_on = true ){ 
    $defaults = array(
        array(
            'font' => 'fab fa-facebook-f',
            'link' => 'https://www.facebook.com/',                        
        ),
        array(
            'font' => 'fab fa-twitter',
            'link' => 'https://twitter.com/',
        ),
        array(
            'font' => 'fab fa-youtube',
            'link' => 'https://www.youtube.com/',
        ),
        array(
            'font' => 'fab fa-instagram',
            'link' => 'https://www.instagram.com/',
        ),
        array(
            'font' => 'fab fa-google-plus-g',
            'link' => 'https://plus.google.com',
        ),
        array(
            'font' => 'fab fa-odnoklassniki',
            'link' => 'https://ok.ru/',
        ),
        array(
            'font' => 'fab fa-vk',
            'link' => 'https://vk.com/',
        ),
        array(
            'font' => 'fab fa-xing',
            'link' => 'https://www.xing.com/',
        )
    );
    $social_links = get_theme_mod( 'social_links', $defaults );
    $ed_social    = get_theme_mod( 'ed_social_links', true );
    $show         = ( $show_on ) ? 'header' : 'footer'; 
    
    if( $ed_social && $social_links && $echo ){ ?>
    <div class="<?php echo esc_attr( $show ); ?>-social">
        <ul class="social-list">
        	<?php 
            foreach( $social_links as $link ){
        	   if( $link['link'] ){ ?>
                <li>
                    <a href="<?php echo esc_url( $link['link'] ); ?>" target="_blank" rel="nofollow noopener">
                        <i class="<?php echo esc_attr( $link['font'] ); ?>"></i>
                    </a>
                </li>    	   
                <?php
                } 
            } 
            ?>
    	</ul>
    </div>
    <?php    
    }elseif( $ed_social && $social_links ){
        return true;
    }else{
        return false;
    }
    ?>
    <?php                                
}
endif;

if( ! function_exists( 'blossom_spa_pro_header_search' ) ) :
/**
 * Header Search
*/
function blossom_spa_pro_header_search( $echo = true ) { 
    $header_search = get_theme_mod( 'ed_header_search', true );
    if( $echo && $header_search ) : ?>
        <div class="header-search">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><defs><style>.sea{fill:#fff;}</style></defs><path class="sea" d="M16,14.591,12.679,11.27a6.89,6.89,0,0,0,1.409-4.226A7,7,0,0,0,7.044,0,7,7,0,0,0,0,7.044a7,7,0,0,0,7.044,7.044,6.89,6.89,0,0,0,4.226-1.409L14.591,16ZM2.013,7.044A4.983,4.983,0,0,1,7.044,2.013a4.983,4.983,0,0,1,5.031,5.031,4.983,4.983,0,0,1-5.031,5.031A4.983,4.983,0,0,1,2.013,7.044Z"/></svg>
        </div>
    <?php 
    elseif( $header_search ) :
        return true;
    else :
        return false;
    endif;
}
endif;

if( ! function_exists( 'blossom_spa_pro_sticky_header' ) ) :
/**
 * Header Search
*/
function blossom_spa_pro_sticky_header() { 
    $ed_sticky_header = get_theme_mod( 'ed_sticky_header', false );
    if( $ed_sticky_header ) : ?>
        <div class="sticky-header">
            <?php blossom_spa_pro_site_branding(); ?>
            <?php blossom_spa_pro_primary_nagivation(); ?>
            <div class="nav-right">
                <div class="header-social">
                    <?php blossom_spa_pro_social_links(); ?>
                </div><!-- .header-social -->
                <?php blossom_spa_pro_header_search(); ?>
            </div><!-- .nav-right -->
        </div><!-- .sticky-header -->
    <?php endif;
}
endif;

if( ! function_exists( 'blossom_spa_pro_form_section' ) ) :
/**
 * Form Icon
*/
function blossom_spa_pro_form_section(){ ?>
    <div class="form-section">
		<span id="btn-search" class="fas fa-search"></span>
	</div>
    <?php
}
endif;

if( ! function_exists( 'blossom_spa_pro_primary_nagivation' ) ) :
/**
 * Primary Navigation.
*/
function blossom_spa_pro_primary_nagivation(){ 
    $enabled_section = array();
    $ed_one_page     = get_theme_mod( 'ed_one_page', false );
    $ed_home_link    = get_theme_mod( 'ed_home_link', true );
    $home_sections   = get_theme_mod( 'front_sort', array( 'service', 'about', 'popular_product', 'cta', 'service_two', 'special_pricing', 'service_three', 'pricing', 'cta_two', 'team', 'blog', 'gallery', 'testimonial', 'products', 'contact' ) );
    
    $label_home             = get_theme_mod( 'label_home', __( 'Home', 'blossom-spa-pro' ) );
    $label_service          = get_theme_mod( 'label_service', __( 'Service', 'blossom-spa-pro' ) );
    $label_about            = get_theme_mod( 'label_about', __( 'About', 'blossom-spa-pro' ) );
    $label_popular_product  = get_theme_mod( 'label_popular_product', __( 'Popular', 'blossom-spa-pro' ) );
    $label_cta              = get_theme_mod( 'label_cta', __( 'CTA', 'blossom-spa-pro' ) );
    $label_service_two      = get_theme_mod( 'label_service_two', __( 'Service2', 'blossom-spa-pro' ) );
    $label_special_pricing  = get_theme_mod( 'label_special_pricing', __( 'Special', 'blossom-spa-pro' ) );
    $label_service_three    = get_theme_mod( 'label_service_three', __( 'Service3', 'blossom-spa-pro' ) );
    $label_pricing          = get_theme_mod( 'label_pricing', __( 'Pricing', 'blossom-spa-pro' ) );
    $label_cta_two          = get_theme_mod( 'label_cta_two', __( 'CTA2', 'blossom-spa-pro' ) );
    $label_team             = get_theme_mod( 'label_team', __( 'Team', 'blossom-spa-pro' ) );
    $label_blog             = get_theme_mod( 'label_blog', __( 'Blog', 'blossom-spa-pro' ) );
    $label_gallery          = get_theme_mod( 'label_gallery', __( 'Gallery', 'blossom-spa-pro' ) );
    $label_testimonial      = get_theme_mod( 'label_testimonial', __( 'Testimonial', 'blossom-spa-pro' ) );
    $label_products         = get_theme_mod( 'label_products', __( 'Products', 'blossom-spa-pro' ) );
    $label_contact          = get_theme_mod( 'label_contact', __( 'Contact', 'blossom-spa-pro' ) );
    
    $menu_label = array();
    if( ! empty( $label_service ) ) $menu_label['service'] = $label_service;
    if( ! empty( $label_about ) ) $menu_label['about'] = $label_about;
    if( ! empty( $label_popular_product ) ) $menu_label['popular_product'] = $label_popular_product;
    if( ! empty( $label_cta ) ) $menu_label['cta'] = $label_cta;
    if( ! empty( $label_service_two ) ) $menu_label['service_two'] = $label_service_two;
    if( ! empty( $label_special_pricing ) ) $menu_label['special_pricing'] = $label_special_pricing;
    if( ! empty( $label_service_three ) ) $menu_label['service_three'] = $label_service_three;
    if( ! empty( $label_pricing ) ) $menu_label['pricing'] = $label_pricing;
    if( ! empty( $label_cta_two ) ) $menu_label['cta_two'] = $label_cta_two;
    if( ! empty( $label_testimonial ) ) $menu_label['testimonial'] = $label_testimonial;
    if( ! empty( $label_team ) ) $menu_label['team'] = $label_team;
    if( ! empty( $label_blog ) ) $menu_label['blog'] = $label_blog;
    if( ! empty( $label_gallery ) ) $menu_label['gallery'] = $label_gallery;
    if( ! empty( $label_products ) ) $menu_label['products'] = $label_products;
    if( ! empty( $label_contact ) ) $menu_label['contact'] = $label_contact;
    
    foreach( $home_sections as $section ){
        if( array_key_exists( $section, $menu_label ) ){
            $enabled_section[] = array(
                'id'    => $section . '_section',
                'label' => $menu_label[$section],
            );
        }
    }
    
    if( $ed_one_page && ( 'page' == get_option( 'show_on_front' ) ) && $enabled_section ){ ?>
        <nav id="site-navigation" class="main-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <button class="toggle-btn">
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
            </button>
            <ul class="nav-menu">
                <?php if( $ed_home_link ){ ?>
                    <li class="<?php if( is_front_page() ) echo esc_attr( 'current-menu-item' ); ?>"><a href="<?php echo esc_url( home_url( '#banner_section' ) ); ?>"><?php echo esc_html( $label_home ); ?></a></li>
                <?php }
                foreach( $enabled_section as $section ){ 
                    if( $section['label'] ){ ?>
                        <li><a href="<?php echo esc_url( home_url( '#' . esc_attr( $section['id'] ) ) ); ?>"><?php echo esc_html( $section['label'] );?></a></li>                        
                    <?php 
                    } 
                }
            ?>
            </ul>
        </nav>
        <?php
    }else{
    ?>
    	<nav id="site-navigation" class="main-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <button class="toggle-btn">
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
            </button>
    		<?php
    			wp_nav_menu( array(
    				'theme_location' => 'primary',
    				'menu_id'        => 'primary-menu',
                    'menu_class'     => 'nav-menu',
                    'fallback_cb'    => 'blossom_spa_pro_primary_menu_fallback',
    			) );
    		?>
    	</nav><!-- #site-navigation -->
    <?php
    }
}
endif;

if( ! function_exists( 'blossom_spa_pro_primary_menu_fallback' ) ) :
/**
 * Fallback for primary menu
*/
function blossom_spa_pro_primary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="primary-menu" class="menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'blossom-spa-pro' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'blossom_spa_pro_secondary_navigation' ) ) :
/**
 * Secondary Navigation
*/
function blossom_spa_pro_secondary_navigation(){ ?>
    <div id="secondary-toggle-button">
        <span></span><?php esc_html_e( 'Menu', 'blossom-spa-pro' ); ?>
    </div>
	<nav class="secondary-nav">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'secondary',
				'menu_id'        => 'secondary-menu',
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => 'blossom_spa_pro_secondary_menu_fallback',
			) );
		?>
	</nav>
    <?php
}
endif;

if( ! function_exists( 'blossom_spa_pro_secondary_menu_fallback' ) ) :
/**
 * Fallback for secondary menu
*/
function blossom_spa_pro_secondary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="secondary-menu" class="menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'blossom-spa-pro' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'blossom_spa_pro_breadcrumb' ) ) :
/**
 * Breadcrumbs
*/
function blossom_spa_pro_breadcrumb(){ 
    global $post;
    $post_page  = get_option( 'page_for_posts' ); //The ID of the page that displays posts.
    $show_front = get_option( 'show_on_front' ); //What to show on the front page    
    $home       = get_theme_mod( 'home_text', __( 'Home', 'blossom-spa-pro' ) ); // text for the 'Home' link
    $delimiter  = '<span class="separator"><i class="fas fa-angle-right"></i></span>';
    $before     = '<span class="current">'; // tag before the current crumb
    $after      = '</span>'; // tag after the current crumb
    
    if( get_theme_mod( 'ed_breadcrumb', true ) ){
        
        echo '<div class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                <div id="crumbs" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="' . esc_url( home_url() ) . '" itemprop="item">' . esc_html( $home ) . '</a> ' . $delimiter;
        
        if( is_home() ){
            
            echo $before . esc_html( single_post_title( '', false ) ) . $after;
            
        }elseif( is_category() ){
            
            $thisCat = get_category( get_query_var( 'cat' ), false );
            
            if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                $p = get_post( $post_page );
                echo ' <a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item">' . esc_html( $p->post_title ) . '</a> ' . $delimiter;  
            }
            
            if ( $thisCat->parent != 0 ) echo get_category_parents( $thisCat->parent, TRUE, $delimiter );
            echo $before .  esc_html( single_cat_title( '', false ) ) . $after;
        
        }elseif( is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) ){ //For Woocommerce archive page
        
            $current_term = $GLOBALS['wp_query']->get_queried_object();
            
            if ( wc_get_page_id( 'shop' ) ) { //Displaying Shop link in woocommerce archive page
    			$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                if ( ! $_name ) {
        			$product_post_type = get_post_type_object( 'product' );
        			$_name = $product_post_type->labels->singular_name;
        		}
                echo ' <a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item">' . esc_html( $_name ) . '</a> ' . $delimiter;
    		}

            if( is_product_category() ){
                $ancestors = get_ancestors( $current_term->term_id, 'product_cat' );
                $ancestors = array_reverse( $ancestors );
        		foreach ( $ancestors as $ancestor ) {
        			$ancestor = get_term( $ancestor, 'product_cat' );    
        			if ( ! is_wp_error( $ancestor ) && $ancestor ) {
        				echo ' <a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item">' . esc_html( $ancestor->name ) . '</a> ' . $delimiter;
        			}
        		}
            }           
            echo $before . esc_html( $current_term->name ) . $after;
            
        }elseif( is_woocommerce_activated() && is_shop() ){ //Shop Archive page
            if ( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ) {
    			return;
    		}
    		$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
    
    		if ( ! $_name ) {
    			$product_post_type = get_post_type_object( 'product' );
    			$_name = $product_post_type->labels->singular_name;
    		}
            echo $before . esc_html( $_name ) . $after;
            
        }elseif( is_tag() ){
            
            echo $before . esc_html( single_tag_title( '', false ) ) . $after;
     
        }elseif( is_author() ){
            
            global $author;
            $userdata = get_userdata( $author );
            echo $before . esc_html( $userdata->display_name ) . $after;
     
        }elseif( is_search() ){
            
            echo $before . esc_html__( 'Search Results for "', 'blossom-spa-pro' ) . esc_html( get_search_query() ) . esc_html__( '"', 'blossom-spa-pro' ) . $after;
        
        }elseif( is_day() ){
            
            echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'blossom-spa-pro' ) ) ) ) . '" itemprop="item">' . esc_html( get_the_time( __( 'Y', 'blossom-spa-pro' ) ) ) . '</a> ' . $delimiter;
            echo '<a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'blossom-spa-pro' ) ), get_the_time( __( 'm', 'blossom-spa-pro' ) ) ) ) . '" itemprop="item">' . esc_html( get_the_time( __( 'F', 'blossom-spa-pro' ) ) ) . '</a> ' . $delimiter;
            echo $before . esc_html( get_the_time( __( 'd', 'blossom-spa-pro' ) ) ) . $after;
        
        }elseif( is_month() ){
            
            echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'blossom-spa-pro' ) ) ) ) . '" itemprop="item">' . esc_html( get_the_time( __( 'Y', 'blossom-spa-pro' ) ) ) . '</a> ' . $delimiter;
            echo $before . esc_html( get_the_time( __( 'F', 'blossom-spa-pro' ) ) ) . $after;
        
        }elseif( is_year() ){
            
            echo $before . esc_html( get_the_time( __( 'Y', 'blossom-spa-pro' ) ) ) . $after;
    
        }elseif( is_single() && !is_attachment() ){
            
            if( is_woocommerce_activated() && 'product' === get_post_type() ){ //For Woocommerce single product
        		
        		if ( wc_get_page_id( 'shop' ) ) { //Displaying Shop link in woocommerce archive page
	    			$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
	                if ( ! $_name ) {
	        			$product_post_type = get_post_type_object( 'product' );
	        			$_name = $product_post_type->labels->singular_name;
	        		}
	                echo ' <a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item">' . esc_html( $_name ) . '</a> ' . $delimiter;
	    		}
    		
                if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
        			$main_term = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
        			$ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                    $ancestors = array_reverse( $ancestors );
            		foreach ( $ancestors as $ancestor ) {
            			$ancestor = get_term( $ancestor, 'product_cat' );    
            			if ( ! is_wp_error( $ancestor ) && $ancestor ) {
            				echo ' <a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item">' . esc_html( $ancestor->name ) . '</a> ' . $delimiter;
            			}
            		}
        			echo ' <a href="' . esc_url( get_term_link( $main_term ) ) . '" itemprop="item">' . esc_html( $main_term->name ) . '</a> ' . $delimiter;
        		}
                
                echo $before . esc_html( get_the_title() ) . $after;
                
            }elseif( get_post_type() != 'post' ){
                
                $post_type = get_post_type_object( get_post_type() );
                
                if( $post_type->has_archive == true ){// For CPT Archive Link
                   
                   // Add support for a non-standard label of 'archive_title' (special use case).
                   $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                   printf( '<a href="%1$s" itemprop="item">%2$s</a>', esc_url( get_post_type_archive_link( get_post_type() ) ), $label );
                   echo $delimiter;
    
                }
                echo $before . esc_html( get_the_title() ) . $after;
                
            }else{ //For Post
                
                $cat_object       = get_the_category();
                $potential_parent = 0;
                
                if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                    $p = get_post( $post_page );
                    echo ' <a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item">' . esc_html( $p->post_title ) . '</a> ' . $delimiter;  
                }
                
                if( $cat_object ){ //Getting category hierarchy if any
        
        			//Now try to find the deepest term of those that we know of
        			$use_term = key( $cat_object );
        			foreach( $cat_object as $key => $object )
        			{
        				//Can't use the next($cat_object) trick since order is unknown
        				if( $object->parent > 0  && ( $potential_parent === 0 || $object->parent === $potential_parent ) ){
        					$use_term = $key;
        					$potential_parent = $object->term_id;
        				}
        			}
                    
        			$cat = $cat_object[$use_term];
              
                    $cats = get_category_parents( $cat, TRUE, $delimiter );
                    $cats = preg_replace( "#^(.+)\s$delimiter\s$#", "$1", $cats ); //NEED TO CHECK THIS
                    echo $cats;
                }
    
                echo $before . esc_html( get_the_title() ) . $after;
                
            }
        
        }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){
            
            $post_type = get_post_type_object(get_post_type());
            if( get_query_var('paged') ){
                echo '<a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '" itemprop="item">' . esc_html( $post_type->label ) . '</a>';
                echo $delimiter . $before . sprintf( __('Page %s', 'blossom-spa-pro'), get_query_var('paged') ) . $after;
            }else{
                echo $before . esc_html( $post_type->label ) . $after;
            }
    
        }elseif( is_attachment() ){
            
            $parent = get_post( $post->post_parent );
            $cat = get_the_category( $parent->ID ); 
            if( $cat ){
                $cat = $cat[0];
                echo get_category_parents( $cat, TRUE, $delimiter );
                echo '<a href="' . esc_url( get_permalink( $parent ) ) . '" itemprop="item">' . esc_html( $parent->post_title ) . '</a>' . ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            }
            echo  $before . esc_html( get_the_title() ) . $after;
        
        }elseif( is_page() && !$post->post_parent ){
            
            echo $before . esc_html( get_the_title() ) . $after;
    
        }elseif( is_page() && $post->post_parent ){
            
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            
            while( $parent_id ){
                $page = get_post( $parent_id );
                $breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '" itemprop="item">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse( $breadcrumbs );
            for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                echo $breadcrumbs[$i];
                if ( $i != count( $breadcrumbs ) - 1 ) echo $delimiter;
            }
            echo $delimiter . $before . esc_html( get_the_title() ) . $after;
        
        }elseif( is_404() ){
            echo $before . esc_html__( '404 Error', 'blossom-spa-pro' ) . $after;
        }
        
        if( get_query_var('paged') ) echo __( ' (Page', 'blossom-spa-pro' ) . ' ' . get_query_var('paged') . __( ')', 'blossom-spa-pro' );
        
        echo '</div></div><!-- .breadcrumb-wrapper -->';
        
    }                
}
endif;

if( ! function_exists( 'blossom_spa_pro_theme_comment' ) ) :
/**
 * Callback function for Comment List *
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
function blossom_spa_pro_theme_comment( $comment, $args, $depth ){
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
    <article id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
	<?php endif; ?>
    	
        <footer class="comment-meta">
            <div class="comment-author vcard">
        	    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); 
                printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s <span class="says">says:</span></b>', 'blossom-spa-pro' ), get_comment_author_link() ); ?>
            </div><!-- .comment-author vcard -->
            <div class="comment-metadata commentmetadata">
                <a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
                    <time itemprop="commentTime" datetime="<?php echo esc_attr( get_gmt_from_date( get_comment_date() . get_comment_time(), 'Y-m-d H:i:s' ) ); ?>"><?php printf( esc_html__( '%1$s at %2$s', 'blossom-spa-pro' ), get_comment_date(),  get_comment_time() ); ?></time>
                </a>
            </div>
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'blossom-spa-pro' ); ?></em>
                <br />
            <?php endif; ?>
        </footer>
        <div class="comment-content" itemprop="commentText"><?php comment_text(); ?></div>        
        <div class="reply">
            <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>
        
	<?php if ( 'div' != $args['style'] ) : ?>
    </article><!-- .comment-body -->
	<?php endif; ?>
    
<?php
}
endif;

if( ! function_exists( 'blossom_spa_pro_sidebar' ) ) :
/**
 * Return sidebar layouts for pages/posts
*/
function blossom_spa_pro_sidebar( $class = false ){
    global $post;
    $return      = false;
    $layout      = get_theme_mod( 'layout_style', 'right-sidebar' ); //Default Layout Style for Styling Settings
    
    if( ( is_front_page() && is_home() ) || is_home() ){ //blog/home page
         
        $home_sidebar = get_theme_mod( 'home_page_sidebar', 'sidebar' );

        if( $layout == 'no-sidebar' ){
            $return = $class ? 'full-width' : false;
        }elseif( is_active_sidebar( $home_sidebar ) ){
            if( $class ){
                if( $layout == 'right-sidebar' ) $return = 'rightsidebar';
                if( $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                $return = $home_sidebar;
            }
        }else{
            $return = $class ? 'full-width' : false; //Fullwidth
        }
    }
    
    if( is_archive() ){
        //archive page
        $archive_sidebar = get_theme_mod( 'archive_page_sidebar', 'sidebar' );
        $cat_sidebar     = get_theme_mod( 'cat_archive_page_sidebar', 'default-sidebar' );
        $tag_sidebar     = get_theme_mod( 'tag_archive_page_sidebar', 'default-sidebar' );
        $date_sidebar    = get_theme_mod( 'date_archive_page_sidebar', 'default-sidebar' );
        $author_sidebar  = get_theme_mod( 'author_archive_page_sidebar', 'default-sidebar' ); 
        $archive_layout  = get_theme_mod( 'archive_layout', 'one' );
        
        if( is_category() ){            
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( $cat_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $cat_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $cat_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }                
        }elseif( is_tag() ){            
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( ( $tag_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $tag_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $tag_sidebar;
                }           
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }            
        }elseif( is_author() ){            
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( ( $author_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $author_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $author_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }            
        }elseif( is_date() ){            
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( ( $date_sidebar == 'default-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }elseif( is_active_sidebar( $date_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $date_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }
        }elseif( is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() ) ){ //For Woocommerce            
            if( $layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( is_active_sidebar( 'shop-sidebar' ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar';
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }       
        }else{
            if( is_active_sidebar( $archive_sidebar ) ){
                if( $class ){
                    if( $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                    if( $layout == 'left-sidebar' ) $return = 'leftsidebar'; //With Sidebar
                }else{
                    $return = $archive_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }                      
        }        
    }
    
    if( is_singular() ){         
        $post_sidebar = get_theme_mod( 'single_post_sidebar', 'sidebar' ); //Global sidebar for single post from customizer
        $page_sidebar = get_theme_mod( 'single_page_sidebar', 'sidebar' ); //Global Sidebar for single page from customizer
        $page_layout  = get_theme_mod( 'page_sidebar_layout', 'right-sidebar' ); //Global Layout/Position for Pages
        $post_layout  = get_theme_mod( 'post_sidebar_layout', 'right-sidebar' ); //Global Layout/Position for Posts        
        
        /**
         * Individual post/page layout
        */
        if( get_post_meta( $post->ID, '_blossom_spa_pro_sidebar_layout', true ) ){
            $sidebar_layout = get_post_meta( $post->ID, '_blossom_spa_pro_sidebar_layout', true );
        }else{
            $sidebar_layout = 'default-sidebar';
        }
        
        /**
         * Individual post/page sidebar
        */     
        if( get_post_meta( $post->ID, '_blossom_spa_pro_sidebar', true ) ){
            $single_sidebar = get_post_meta( $post->ID, '_blossom_spa_pro_sidebar', true );
        }else{
            $single_sidebar = 'default-sidebar';
        }
        
        if( is_page() ){
            $template = array( 'templates/contact.php', 'templates/service.php', 'templates/pricing.php', 'templates/team.php', 'templates/gallery.php', 'templates/blossom-portfolio.php' );
            if( is_page_template( $template ) ) {
                $return = $class ? 'full-width' : false;
            }elseif( $sidebar_layout == 'no-sidebar' || ( $sidebar_layout == 'default-sidebar' && $page_layout == 'no-sidebar' ) ){
                $return = $class ? 'full-width' : false;
            }elseif( $sidebar_layout == 'centered' || ( $sidebar_layout == 'default-sidebar' && $page_layout == 'centered' ) ){
                $return = $class ? 'full-width centered' : false;
            }elseif( $single_sidebar == 'default-sidebar' && is_active_sidebar( $page_sidebar ) ){
                if( $class ){
                    if( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) $return = 'rightsidebar';
                    if( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) $return = 'leftsidebar';
                }else{
                    $return = $page_sidebar;
                }
            }elseif( is_active_sidebar( $single_sidebar ) ){
                if( $class ){
                    if( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) $return = 'rightsidebar';
                    if( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) $return = 'leftsidebar';
                }else{
                    $return = $single_sidebar;
                }
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }
        }
        
        if( is_single() ){
            if( 'blossom-portfolio' === get_post_type() ){ //For Portfolio Post Type
                $return = $class ? 'full-width' : false; //Fullwidth
            }elseif( 'product' === get_post_type() ){ //For Product Post Type
                if( $post_layout == 'no-sidebar' || $post_layout == 'centered' ){
                    $return = $class ? 'full-width' : false; //Fullwidth
                }elseif( is_active_sidebar( 'shop-sidebar' ) ){
                    if( $class ){
                        if( $post_layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                        if( $post_layout == 'left-sidebar' ) $return = 'leftsidebar';
                    }
                }else{
                    $return = $class ? 'full-width' : false; //Fullwidth
                }
            }elseif( 'post' === get_post_type() ){ //For default post type
                if( $sidebar_layout == 'no-sidebar' || ( $sidebar_layout == 'default-sidebar' && $post_layout == 'no-sidebar' ) ){
                    $return = $class ? 'full-width' : false;
                }elseif( $sidebar_layout == 'centered' || ( $sidebar_layout == 'default-sidebar' && $post_layout == 'centered' ) ){
                    $return = $class ? 'full-width centered' : false;
                }elseif( $single_sidebar == 'default-sidebar' && is_active_sidebar( $post_sidebar ) ){
                    if( $class ){
                        if( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) $return = 'rightsidebar';
                        if( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) $return = 'leftsidebar';
                    }else{
                        $return = $post_sidebar;
                    }
                }elseif( is_active_sidebar( $single_sidebar ) ){
                    if( $class ){
                        if( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) $return = 'rightsidebar';
                        if( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) $return = 'leftsidebar';
                    }else{
                        $return = $single_sidebar;
                    }
                }else{
                    $return = $class ? 'full-width' : false; //Fullwidth
                }
            }else{ //Custom Post Type
                if( $post_layout == 'no-sidebar' ){
                    $return = $class ? 'full-width' : false;
                }elseif( $post_layout == 'centered' ){
                    $return = $class ? 'full-width centered' : false;
                }elseif( is_active_sidebar( $post_sidebar ) ){
                    if( $class ){
                        if( $post_layout == 'right-sidebar' ) $return = 'rightsidebar';
                        if( $post_layout == 'left-sidebar' ) $return = 'leftsidebar';
                    }else{
                        $return = $post_sidebar;
                    }
                }else{
                    $return = $class ? 'full-width' : false; //Fullwidth
                }
            }
        }
    } 
        
    if( is_search() ){
        $search_sidebar = get_theme_mod( 'search_page_sidebar', 'sidebar' );       
        
        if( $layout == 'no-sidebar' ){
            $return = $class ? 'full-width' : false;
        }elseif( is_active_sidebar( $search_sidebar ) ){
            if( $class ){
                if( $layout == 'right-sidebar' ) $return = 'rightsidebar';
                if( $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                $return = $search_sidebar;
            }
        }else{
            $return = $class ? 'full-width' : false; //Fullwidth
        }        
    }
      
    return $return; 
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_posts' ) ) :
/**
 * Fuction to list Custom Post Type
*/
function blossom_spa_pro_get_posts( $post_type = 'post', $slug = false ){    
    $args = array(
    	'posts_per_page'   => -1,
    	'post_type'        => $post_type,
    	'post_status'      => 'publish',
    	'suppress_filters' => true 
    );
    $posts_array = get_posts( $args );
    
    // Initate an empty array
    $post_options = array();
    $post_options[''] = __( ' -- Choose -- ', 'blossom-spa-pro' );
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

if( ! function_exists( 'blossom_spa_pro_get_categories' ) ) :
/**
 * Function to list post categories in customizer options
*/
function blossom_spa_pro_get_categories( $select = true, $taxonomy = 'category', $slug = false ){    
    /* Option list of all categories */
    $categories = array();
    
    $args = array( 
        'hide_empty' => false,
        'taxonomy'   => $taxonomy 
    );
    
    $catlists = get_terms( $args );
    if( $select ) $categories[''] = __( 'Choose Category', 'blossom-spa-pro' );
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

if( ! function_exists( 'blossom_spa_pro_get_id_from_page' ) ) :
/**
 * Get page ids from page name.
*/
function blossom_spa_pro_get_id_from_page( $slider_pages ){
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

if( ! function_exists( 'blossom_spa_pro_get_patterns' ) ) :
/**
 * Function to list Custom Pattern
*/
function blossom_spa_pro_get_patterns(){
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

if( ! function_exists( 'blossom_spa_pro_get_dynamnic_sidebar' ) ) :
/**
 * Function to list dynamic sidebar
*/
function blossom_spa_pro_get_dynamnic_sidebar( $nosidebar = false, $sidebar = false, $default = false ){
    $sidebar_arr = array();
    $sidebars = get_theme_mod( 'sidebar' );
    
    if( $default ) $sidebar_arr['default-sidebar'] = __( 'Default Sidebar', 'blossom-spa-pro' );
    if( $sidebar ) $sidebar_arr['sidebar'] = __( 'Sidebar', 'blossom-spa-pro' );
    
    if( $sidebars ){        
        foreach( $sidebars as $sidebar ){            
            $id = $sidebar['name'] ? sanitize_title( $sidebar['name'] ) : 'blossom-spa-pro-sidebar-one';
            $sidebar_arr[$id] = $sidebar['name'];
        }
    }
    
    if( $nosidebar ) $sidebar_arr['no-sidebar'] = __( 'No Sidebar', 'blossom-spa-pro' );
    
    return $sidebar_arr;
}
endif;

if( ! function_exists( 'blossom_spa_pro_create_post' ) ) :
/**
 * A function used to programmatically create a post and assign a page template in WordPress. 
 *
 * @link https://tommcfarlin.com/programmatically-create-a-post-in-wordpress/
 * @link https://tommcfarlin.com/programmatically-set-a-wordpress-template/
 */
function blossom_spa_pro_create_post( $title, $slug, $template ){

	// Setup the author, page
	$author_id = 1;
    
    // Look for the page by the specified title. Set the ID to -1 if it doesn't exist.
    // Otherwise, set it to the page's ID.
    $page = get_page_by_title( $title, OBJECT, 'page' );
    $page_id = ( null == $page ) ? -1 : $page->ID;
    
	// If the page doesn't already exist, then create it
	if( $page_id == -1 ){

		// Set the post ID so that we know the post was created successfully
		$post_id = wp_insert_post(
			array(
				'comment_status' =>	'closed',
				'ping_status'	 =>	'closed',
				'post_author'	 =>	$author_id,
				'post_name'		 =>	$slug,
				'post_title'	 =>	$title,
				'post_status'	 =>	'publish',
				'post_type'		 =>	'page'
			)
		);
        
        if( $post_id ) update_post_meta( $post_id, '_wp_page_template', $template );

	// Otherwise, we'll stop
	}else{
	   update_post_meta( $page_id, '_wp_page_template', $template );
	} // end if

} // end programmatically_create_post
endif;

if( ! function_exists( 'blossom_spa_pro_get_page_template_url' ) ) :
/**
 * Returns page template url if not found returns home page url
*/
function blossom_spa_pro_get_page_template_url( $page_template ){
    $args = array(
        'meta_key'   => '_wp_page_template',
        'meta_value' => $page_template,
        'post_type'  => 'page',
        'fields'     => 'ids',
    );
    
    $posts_array = get_posts( $args );
    
    $url = ( $posts_array ) ? get_permalink( $posts_array[0] ) : get_home_url();
    return $url;    
}
endif;

if( ! function_exists( 'blossom_spa_pro_author_social' ) ) :
/**
 * Author Social Links
*/
function blossom_spa_pro_author_social(){
    $id      = get_the_author_meta( 'ID' );
    $socials = get_user_meta( $id, '_blossom_spa_pro_user_social_icons', true );
    $fonts   = array(
        'facebook'     => 'fab fa-facebook-f', 
        'twitter'      => 'fab fa-twitter',
        'instagram'    => 'fab fa-instagram',
        'snapchat'     => 'fab fa-snapchat',
        'pinterest'    => 'fab fa-pinterest',
        'linkedin'     => 'fab fa-linkedin-in',
        'google-plus'  => 'fab fa-google-plus',
        'youtube'      => 'fab fa-youtube'
    );

    if( $socials ){
        echo '<div class="author-social"><ul class="social-list">';
        foreach( $socials as $key => $link ){            
            if( $link ) echo '<li><a href="' . esc_url( $link ) . '" target="_blank" rel="nofollow noopener" title="' . esc_attr( $key ) . '"><span><i class="' . esc_attr( $fonts[$key] ) . '"></i></span></a></li>';
        }
        echo '</ul></div>';
    }
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_real_ip_address' )):
/**
 * Get the actual ip address 
*/
function blossom_spa_pro_get_real_ip_address(){
    if( getenv( 'HTTP_CLIENT_IP' ) ){
        $ip = getenv( 'HTTP_CLIENT_IP' );
    }elseif( getenv( 'HTTP_X_FORWARDED_FOR' ) ){
        $ip = getenv('HTTP_X_FORWARDED_FOR' );
    }elseif( getenv( 'HTTP_X_FORWARDED' ) ){
        $ip = getenv( 'HTTP_X_FORWARDED' );
    }elseif( getenv( 'HTTP_FORWARDED_FOR' ) ){
        $ip = getenv( 'HTTP_FORWARDED_FOR' );
    }elseif( getenv( 'HTTP_FORWARDED' ) ){
        $ip = getenv( 'HTTP_FORWARDED' );
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    
    return $ip;
}
endif;

if( ! function_exists( 'blossom_spa_pro_likes_can' ) ) :
/**
 * Check if the current IP already liked the content or not.
 */
function blossom_spa_pro_likes_can( $id = 0 ) {
    // Return early if $id is not set.
    if( ! $id ){
        return false;
    }
    
    $ip_list = ( $ip = get_post_meta( $id, '_blossom_spa_pro_post_like_ip', true ) ) ? $ip  : array();

    if( ( $ip_list == '' ) || ( is_array( $ip_list ) && ! in_array( blossom_spa_pro_get_real_ip_address(), $ip_list ) ) ){
        return true;
    }

    return false;
}
endif;

if( ! function_exists( 'blossom_spa_pro_like_count' ) ) :
/**
 * Prints like count of post
*/
function blossom_spa_pro_like_count(){
    $ed_blog_like = get_theme_mod( 'ed_blog_like', true );
    if( $ed_blog_like ) :
        global $post;
        $likes_count = get_post_meta( $post->ID, '_blossom_spa_pro_post_like', true );
        $class = ( ! $likes_count ) ? 'like' : 'liked';
        $icon  = ( ! $likes_count ) ? 'far fa-heart' : 'fas fa-heart';
        $add_structure  = ( ! $likes_count ) ? '<a href="javascript:void(0);">' : '<span class="liked-icon">';
        $add_structure_end  = ( ! $likes_count ) ? '</a>' : '</span>';
        echo '<div class="bsp_ajax_like" id="like-' . esc_attr( $post->ID ) . '"><span class="favourite ' . esc_attr( $class ) . '">' . $add_structure . '<i class="' . esc_attr( $icon ) . '"></i>' . $add_structure_end . '<span class="fav-count">' . absint( $likes_count ) . '</span></span></div>';
    endif;
}
endif;

if( ! function_exists( 'blossom_spa_pro_single_like_count' ) ) :
/**
 * Prints like count of post
*/
function blossom_spa_pro_single_like_count(){
    $ed_single_like = get_theme_mod( 'ed_single_like', true );
    if( $ed_single_like ) :
        global $post;
        $likes_count = get_post_meta( $post->ID, '_blossom_spa_pro_post_like', true );
        $class = ( ! $likes_count ) ? 'like' : 'liked';
        $icon  = ( ! $likes_count ) ? 'far fa-heart' : 'fas fa-heart';
        $add_structure  = ( ! $likes_count ) ? '<a href="javascript:void(0);">' : '<span class="liked-icon">';
        $add_structure_end  = ( ! $likes_count ) ? '</a>' : '</span>';
        echo '<div class="bsp_single_ajax_like" id="singlelike-' . esc_attr( $post->ID ) . '"><span class="favourite single-like ' . esc_attr( $class ) . '"><span class="fav-count">' . absint( $likes_count ) . '</span>' . $add_structure . '<i class="' . esc_attr( $icon ) . '"></i>' . $add_structure_end . '</span></div>';
    endif;
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_home_sections' ) ) :
/**
 * Returns Home Sections 
*/
function blossom_spa_pro_get_home_sections(){
    $ed_banner     = get_theme_mod( 'ed_banner_section', 'slider_banner' );
    $home_sections = get_theme_mod( 'front_sort', array( 'service', 'about', 'popular_product', 'cta', 'service_two', 'special_pricing', 'service_three', 'pricing', 'cta_two', 'team', 'blog', 'gallery', 'testimonial', 'products', 'contact' ) );
    $disable_all_section = get_theme_mod( 'disable_all_section', false );
    
    $enabled_section = array();
    
    if( $ed_banner == 'static_banner' || $ed_banner == 'slider_banner' || $ed_banner == 'static_nl_banner' ) array_push( $enabled_section, 'banner' );
    
    foreach( $home_sections as $v ){
        array_push( $enabled_section, $v );
    }

    if( $disable_all_section ) {
        $enabled_section = array();
    } 
    
    return apply_filters( 'blossom_spa_pro_home_sections', $enabled_section );
}
endif;

if( ! function_exists( 'blossom_spa_pro_escape_text_tags' ) ) :
/**
 * Remove new line tags from string
 *
 * @param $text
 * @return string
 */
function blossom_spa_pro_escape_text_tags( $text ) {
    return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_image_sizes' ) ) :
/**
 * Get information about available image sizes
 */
function blossom_spa_pro_get_image_sizes( $size = '' ) {
 
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

if ( ! function_exists( 'blossom_spa_pro_get_fallback_svg' ) ) :    
/**
 * Get Fallback SVG
*/
function blossom_spa_pro_get_fallback_svg( $post_thumbnail ) {
    if( ! $post_thumbnail ){
        return;
    }
    
    $image_size = blossom_spa_pro_get_image_sizes( $post_thumbnail );
     
    if( $image_size ){ ?>
        <div class="svg-holder">
             <svg class="fallback-svg" width="<?php echo esc_attr( $image_size['width'] ); ?>" height="<?php echo esc_attr( $image_size['height'] ); ?>" viewBox="0 0 <?php echo esc_attr( $image_size['width'] ); ?> <?php echo esc_attr( $image_size['height'] ); ?>" preserveAspectRatio="none">
                    <rect width="<?php echo esc_attr( $image_size['width'] ); ?>" height="<?php echo esc_attr( $image_size['height'] ); ?>" style="fill:#f2f2f2;"></rect>
            </svg>
        </div>
        <?php
    }
}
endif;

if ( ! function_exists( 'blossom_spa_pro_apply_theme_shortcode' ) ) :
/**
 * Footer Shortcode
*/
function blossom_spa_pro_apply_theme_shortcode( $string ) {
    if ( empty( $string ) ) {
        return $string;
    }
    $search = array( '[the-year]', '[the-site-link]' );
    $replace = array(
        date_i18n( esc_html__( 'Y', 'blossom-spa-pro' ) ),
        '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>',
    );
    $string = str_replace( $search, $replace, $string );
    return $string;
}
endif;

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
/**
 * Query WooCommerce activation
 */
function is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}

/**
 * Check if Contact Form 7 Plugin is installed
*/
function is_cf7_activated(){
    return class_exists( 'WPCF7' ) ? true : false;
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

if ( ! function_exists( 'blossom_spa_pro_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function blossom_spa_pro_post_thumbnail() {
    global $wp_query;
    $image_size  = 'thumbnail';
    $sidebar     = blossom_spa_pro_sidebar();
    
    if( is_front_page() && is_home() ){
        echo '<a href="' . esc_url( get_permalink() ) . '">';
        $image_size = blossom_spa_pro_blog_layout_image_size();
        if( has_post_thumbnail() ){                        
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        }else{
            blossom_spa_pro_get_fallback_svg( $image_size );
        }        
        echo '</a>';
    }elseif( is_home() ){        
        echo '<a href="' . esc_url( get_permalink() ) . '">';
        $image_size = blossom_spa_pro_blog_layout_image_size();
        if( has_post_thumbnail() ){                        
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        }else{
            blossom_spa_pro_get_fallback_svg( $image_size );    
        }        
        echo '</a>';
    }elseif( is_archive() || is_search() ){
        echo '<a href="' . esc_url( get_permalink() ) . '">';
        $image_size = blossom_spa_pro_blog_layout_image_size();
        if( has_post_thumbnail() ){
            the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
        }else{
            blossom_spa_pro_get_fallback_svg( $image_size );
        }
        echo '</a>';
    }
}
endif;

if ( ! function_exists( 'blossom_spa_pro_singular_post_thumbnail' ) ) :
/**
 * Blog Layout Image Size
*/
function blossom_spa_pro_singular_post_thumbnail() {
    $return = '';
    $ed_featured = get_theme_mod( 'ed_featured_image', true );    

    if( is_singular() ){
        $image_size = 'blossom-spa-single';
        if( is_single() ){
            if( $ed_featured ) $return .= get_the_post_thumbnail_url( '', $image_size );
        }elseif( is_page_template( 'templates/contact.php' ) ){
            $background_image = get_theme_mod( 'contact_background_image', get_template_directory_uri() .'/images/header-bg.jpg' );
            if( has_post_thumbnail() ) :
                $return .= get_the_post_thumbnail_url( '', $image_size );
            else:
                $return .= $background_image;
            endif;
        }elseif( is_page_template( 'templates/service.php' ) ){
            $background_image = get_theme_mod( 'service_template_background_image', get_template_directory_uri() .'/images/header-bg.jpg' );
            if( has_post_thumbnail() ) :
                $return .= get_the_post_thumbnail_url( '', $image_size );
            else:
                $return .= $background_image;
            endif;
        }elseif( is_page_template( 'templates/team.php' ) ){
            $background_image = get_theme_mod( 'team_background_image', get_template_directory_uri() .'/images/header-bg.jpg' );
            if( has_post_thumbnail() ) :
                $return .= get_the_post_thumbnail_url( '', $image_size );
            else:
                $return .= $background_image;
            endif;
        }elseif( is_page_template( 'templates/pricing.php' ) ){
            $background_image = get_theme_mod( 'pricing_background_image', get_template_directory_uri() .'/images/header-bg.jpg' );
            if( has_post_thumbnail() ) :
                $return .= get_the_post_thumbnail_url( '', $image_size );
            else:
                $return .= $background_image;
            endif;
        }elseif( is_page_template( 'templates/gallery.php' ) ){
            $background_image = get_theme_mod( 'gallery_background_image', get_template_directory_uri() .'/images/header-bg.jpg' );
            if( has_post_thumbnail() ) :
                $return .= get_the_post_thumbnail_url( '', $image_size );
            else:
                $return .= $background_image;
            endif;
        }elseif( is_page_template( 'templates/blossom-portfolio.php' ) ){
            $background_image = get_template_directory_uri() .'/images/header-bg.jpg';
            if( has_post_thumbnail() ) :
                $return .= get_the_post_thumbnail_url( '', $image_size );
            else:
                $return .= $background_image;
            endif;
        }else{
            $return .= get_the_post_thumbnail_url( '', $image_size );
        }
    }

    return $return;
}
endif;

if ( ! function_exists( 'blossom_spa_pro_blog_layout_image_size' ) ) :
/**
 * Blog Layout Image Size
*/
function blossom_spa_pro_blog_layout_image_size() {
    global $wp_query;
    $blog_layout  = get_theme_mod( 'blog_page_layout', 'list-layout' );
    $sidebar      = blossom_spa_pro_sidebar();

    if( $blog_layout == 'list-layout') { 
        $image_size = 'blossom-spa-blog-list';
    }elseif( $blog_layout == 'list-with-feat-post-layout' ){ 
        if( $wp_query->current_post == 0 && ! $sidebar ) {
            $image_size = 'blossom-spa-blog-classic-full';
        }elseif( $wp_query->current_post == 0 && $sidebar ){
            $image_size = 'blossom-spa-blog-classic';
        }else{
            $image_size = 'blossom-spa-blog-list';
        }
    }elseif( $blog_layout == 'classic-layout' ) {
        $image_size = ( $sidebar ) ? 'blossom-spa-blog-classic' : 'blossom-spa-blog-classic-full';    
    }elseif($blog_layout == 'grid-layout' || $blog_layout == 'masonry-layout' ){ 
        $image_size = 'blossom-spa-blog-classic';
    }else{
        $image_size = 'blossom-spa-blog-list';
    }

    return $image_size;
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_special_pricing_tabs' ) ) :
/**
 * Query for Special Pricing Tabs
*/
function  blossom_spa_pro_get_special_pricing_tabs(){

    if( taxonomy_exists( 'product_cat' ) ){
        $show_parent_only = get_theme_mod( 'ed_product_parent' );            
        $args = array(
            'taxonomy'      => 'product_cat',
            'orderby'       => 'name', 
            'order'         => 'ASC',
        ); 
        
        if( $show_parent_only ){
            $args['parent'] = 0;
        } 

        $terms = get_terms( $args );
        if( $terms ){
            $index = 1;
            $first_category = '';
            echo '<div class="tab-btn-wrap">';            
            foreach( $terms as $t ){
                $class_active = ( $index == 1 ) ? ' active' : '';
                echo '<button data-id="'. esc_attr( $t->slug ) . '" class="tab-'. absint( $index ) .' tab-btn' . esc_attr( $class_active )  . '">' . esc_html( $t->name ) . '</button>';
                if( $index == 1 ) $first_category = $t->slug;
                $index++;
            }
            echo '</div>';
            echo '<div class="tab-content-wrap">';            
            blossom_spa_pro_get_special_pricing_contents( $first_category );
            echo '</div>';
        }
    }
}
endif;

if( ! function_exists( 'blossom_spa_pro_get_special_pricing_contents' ) ) :
/**
 * Query for Special Pricing Tabs
*/
function blossom_spa_pro_get_special_pricing_contents( $cat = '' ){

    if( taxonomy_exists( 'product_cat' ) ){
        $args = array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $cat,
                ),
            ),
            'posts_per_page' => 6,
        );
        
        $qry = new WP_Query( $args );
     
        if( $qry->have_posts() ) : ?> 
            <div data-id="<?php echo esc_attr( $cat ); ?>" class="tab-1-content tab-content active <?php echo esc_attr( $cat ); ?>">
                <div class="tabs-product">
                    <?php
                    while( $qry->have_posts() ){
                        $qry->the_post(); global $product; ?>
                        <div class="item">                              
                            <div class="product-image">
                                <a href="<?php the_permalink(); ?>" rel="bookmark">
                                    <?php 
                                    if( has_post_thumbnail() ){
                                        the_post_thumbnail( 'blossom-spa-special' );    
                                    }else{
                                        blossom_spa_pro_get_fallback_svg( 'blossom-spa-special' );
                                    }
                                    ?>
                                </a>
                            </div>
                            <div class="product-content">
                                <?php                            
                                    the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); 
                                    woocommerce_template_single_excerpt(); //excerpt  
                                ?>
                            </div>                              
                            <?php woocommerce_template_single_price(); //price ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            wp_reset_postdata();
        endif;
    }
}
endif;