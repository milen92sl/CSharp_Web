<?php
/**
 * Team Section
 * 
 * @package Blossom_Spa_Pro
 */
$team_title 	= get_theme_mod( 'team_title', __( 'Meet Our Experienced Team Members', 'blossom-spa-pro' ) );
$team_subtitle 	= get_theme_mod( 'team_subtitle', __( 'Over 10 Years of Experience', 'blossom-spa-pro' ) );
$team_content 	= get_theme_mod( 'team_content', __( 'Some of our team members have 10+ years of experience. You can introduce your team members to give a more human feeling to the company.', 'blossom-spa-pro' ) );

if( is_active_sidebar( 'team' ) || !empty( $team_title ) || !empty( $team_subtitle ) || !empty( $team_content ) ){ ?>
<section id="team_section" class="team-section">
	<div class="container">
		<?php if( !empty( $team_title ) || !empty( $team_subtitle ) || !empty( $team_content ) ) :
			if( !empty( $team_subtitle ) ) echo '<span class="sub-title">' . esc_html( $team_subtitle ) . '</span>';
			if( !empty( $team_title ) ) echo '<h2 class="section-title">' . esc_html( $team_title ) . '</h2>';
			if( !empty( $team_content ) ) echo '<div class="section-desc">' . wpautop( wp_kses_post( $team_content ) ) . '</div>';
		endif;
		if( is_active_sidebar( 'team' ) ) : ?>
			<div class="grid owl-carousel">
		    	<?php dynamic_sidebar( 'team' ); ?>
		    </div>
		<?php endif; ?>
	</div>
</section> <!-- .team-section -->
<?php
}