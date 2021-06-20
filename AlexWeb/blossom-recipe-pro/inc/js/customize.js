jQuery(document).ready(function($) {
	/* Move Front page widgets to front-page panel */
	wp.customize.section( 'sidebar-widgets-newsletter-section' ).panel( 'general_settings' );
    wp.customize.section( 'sidebar-widgets-newsletter-section' ).priority( '60' );
 
});