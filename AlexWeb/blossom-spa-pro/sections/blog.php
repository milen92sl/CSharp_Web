<?php
/**
 * Blog Section
 * 
 * @package Blossom_Spa_Pro
 */

$title    = get_theme_mod( 'blog_section_title', __( 'Read Our Recent Articles', 'blossom-spa-pro' ) );
$sub_title  = get_theme_mod( 'blog_section_subtitle', __( 'From Our Blog', 'blossom-spa-pro' ) );
$description  = get_theme_mod( 'blog_section_content', __( 'Show your customers that you know what you are doing by writing helpful articles related to your business. You can display your recent blog posts here. To modify this section, go to Appearance > Customize > Front Page Settings > Blog Section.', 'blossom-spa-pro' ) );
$readmore = get_theme_mod( 'blog_readmore', __( 'Read More', 'blossom-spa-pro' ) );
$blog     = get_option( 'page_for_posts' );
$label    = get_theme_mod( 'blog_view_all', __( 'View More', 'blossom-spa-pro' ) );

$args = array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 3,
    'ignore_sticky_posts' => true
);

$qry = new WP_Query( $args );

if( $title || $sub_title || $description || $qry->have_posts() ){ ?>

<section id="blog_section" class="recent-post-section">
	<div class="container">
        
        <?php if( $title || $sub_title || $description ){ 
            if( $sub_title ) echo '<span class="sub-title">' . esc_html( $sub_title ) . '</span>'; 
            if( $title ) echo '<h2 class="section-title">' . esc_html( $title ) . '</h2>';
            if( $description ) echo '<div class="section-desc">' . wp_kses_post( wpautop( $description ) ) . '</div>'; 
        } ?>
        
        <?php if( $qry->have_posts() ){ ?>
            <div class="grid">
    			<?php 
                while( $qry->have_posts() ){
                    $qry->the_post(); ?>
                    <article class="post">
        				<figure class="post-thumbnail">
                            <?php blossom_spa_pro_category(); ?>
                            <a href="<?php the_permalink(); ?>">
                            <?php 
                                if( has_post_thumbnail() ){
                                    the_post_thumbnail( 'blossom-spa-service', array( 'itemprop' => 'image' ) );
                                }else{
                                    blossom_spa_pro_get_fallback_svg( 'blossom-spa-service' );
                                }                            
                            ?>                        
                            </a>
                        </figure>
        				<div class="content-wrap">
        					<header class="entry-header">
        						<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="entry-meta">
                                    <?php 
                                        blossom_spa_pro_posted_on();
                                        blossom_spa_pro_comment_count(); 
                                    ?>
                                </div>
                            </header>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>                          
                            <footer class="entry-footer">
                                <a href="<?php the_permalink(); ?>" class="btn-readmore"><?php echo esc_html( $readmore ); ?></a>
                            </footer>
                        </div>
        			</article>			
        			<?php 
                }
                wp_reset_postdata();
                ?>
    		</div>
    		
            <?php if( $blog && $label ){ ?>
                <div class="btn-wrap">
        			<a href="<?php the_permalink( $blog ); ?>" class="btn-readmore"><?php echo esc_html( $label ); ?></a>
        		</div>
            <?php } ?>
        
        <?php } ?>
	</div>
</section>
<?php 
}