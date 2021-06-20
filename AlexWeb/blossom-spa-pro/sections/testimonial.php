<?php
/**
 * Testimonial Section
 * 
 * @package Blossom_Spa_Pro
 */

$testimonial_title 	= get_theme_mod( 'testimonial_title', __( 'Here\'s What Our Customers Think', 'blossom-spa-pro' ) );
$testimonial_subtitle 	= get_theme_mod( 'testimonial_subtitle', __( 'Feedbacks', 'blossom-spa-pro' ) );
$testimonial_content 	= get_theme_mod( 'testimonial_content', __( 'Our customers love us. We make sure that we make every customer happy. Showcase the feedback from your old customers to build trust with new customers using testimonials.', 'blossom-spa-pro' ) );

if( is_active_sidebar( 'testimonial' ) || !empty( $testimonial_title ) || !empty( $testimonial_subtitle ) || !empty( $testimonial_content ) ){ ?>
<section id="testimonial_section" class="testimonial-section">
	<div class="container">
		<?php if( !empty( $testimonial_title ) || !empty( $testimonial_subtitle ) || !empty( $testimonial_content ) ) :
			if( !empty( $testimonial_subtitle ) ) echo '<span class="sub-title">' . esc_html( $testimonial_subtitle ) . '</span>';
			if( !empty( $testimonial_title ) ) echo '<h2 class="section-title">' . esc_html( $testimonial_title ) . '</h2>';
			if( !empty( $testimonial_content ) ) echo '<div class="section-desc">' . wpautop( wp_kses_post( $testimonial_content ) ) . '</div>';
		endif;
		if( is_active_sidebar( 'testimonial' ) ) : ?>
			<div class="grid owl-carousel">
	    		<?php dynamic_sidebar( 'testimonial' ); ?>
	    	</div>
	    <?php endif;?>
    </div>
</section> <!-- .testimonial-section -->
<?php
}