<?php
/**
 * Blossom Recipe Pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blossom_Recipe_Pro
 */

//define theme version
if ( ! defined( 'BLOSSOM_RECIPE_PRO_THEME_VERSION' ) && ! defined( 'BLOSSOM_RECIPE_PRO_THEME_NAME' ) ) {
	$theme_data = wp_get_theme();	
	define ( 'BLOSSOM_RECIPE_PRO_THEME_VERSION', $theme_data->get( 'Version' ) );
	define ( 'BLOSSOM_RECIPE_PRO_THEME_NAME', $theme_data->get( 'Name' ) );
}

/**
 * Custom Functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Standalone Functions.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Template Functions.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom functions for selective refresh.
 */
require get_template_directory() . '/inc/partials.php';

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox/metabox.php';

/**
 * User Metabox
 */
require get_template_directory() . '/inc/metabox/user-metabox.php';

/**
 * Social Sharing
 */
require get_template_directory() . '/inc/social-sharing.php';

/**
 * Typography Functions
 */
require get_template_directory() . '/inc/typography.php';

/**
 * Dynamic Styles
 */
require get_template_directory() . '/css/style.php';

/**
 * Performance
*/
require get_template_directory() . '/inc/performance.php';

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Getting Started
*/
require get_template_directory() . '/inc/getting-started/getting-started.php';

/**
 * Theme Updater
*/
require get_template_directory() . '/updater/theme-updater.php';

/**
 * Demo Import
*/
require get_template_directory() . '/inc/import-hooks.php';

/**
 * Toolkit Filters
*/
if( is_bttk_activated() ) {
	require get_template_directory() . '/inc/toolkit-functions.php';
}

/**
 * Add theme compatibility function for woocommerce if active
*/
if( is_woocommerce_activated() ){
    require get_template_directory() . '/inc/woocommerce-functions.php';    
}