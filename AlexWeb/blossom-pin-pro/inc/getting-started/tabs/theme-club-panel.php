<?php
/**
 * Themeclub Panel.
 *
 * @package Blossom_Pin_Pro
 */
?>
<!-- More themes -->
<div id="themes-panel" class="panel-left">
	<div class="theme-intro">
		<div class="theme-intro-left">
			<p><?php printf( __( 'For just a few bucks more, you can enjoy all our current themes, new theme releases, theme updates, and premium email support. Join the Theme Club at just %1$s$89 for the Yearly Access%2$s and only %1$s$199 for Lifetime Access%2$s.', 'blossom-pin-pro' ), '<strong>', '</strong>' ); ?></p>
		</div>
		<div class="theme-intro-right">
			<a class="button-primary club-button" href="<?php echo esc_url( 'https://blossomthemes.com/theme-club/' ); ?>" target="_blank"><?php esc_html_e( 'Learn about the Theme Club', 'blossom-pin-pro' ); ?>
                <i class="fas fa-arrow-right"></i>
            </a>
		</div>
	</div>

	<div class="theme-list">
	<?php
    	// @todo cache this after all the dust has settled
    	$themes_list = wp_remote_get( 'https://blossomthemes.com/feed/themes' );
    
    	if ( ! is_wp_error( $themes_list ) && 200 === wp_remote_retrieve_response_code( $themes_list ) ){    
    		echo wp_remote_retrieve_body( $themes_list );
    	} else {
    		$themes_link = 'https://blossomthemes.com/theme-club/';
    		printf( __( 'This theme feed seems to be temporarily down. Please check back later, or visit our <a href="%s" target="_blank">Themes Club page on Blossom Themes</a>.', 'blossom-pin-pro' ), esc_url( $themes_link ) );
    	} 
     ?>
	</div><!-- .theme-list -->
</div><!-- .panel-left updates -->