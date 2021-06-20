<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package Blossom_Recipe_Pro
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://blossomthemes.com', // Site where EDD is hosted
		'item_name'      => 'Blossom Recipe Pro', // Name of theme
		'theme_slug'     => 'blossom-recipe-pro', // Theme slug
		'version'        => '2.0.3', // The current version of this theme
		'author'         => 'Blossom Themes', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => '', // Optional, allows for a custom license renewal link
		'beta'           => false, // Optional, set to true to opt into beta versions
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Getting Started', 'blossom-recipe-pro' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'blossom-recipe-pro' ),
		'license-key'               => __( 'License Key', 'blossom-recipe-pro' ),
		'license-action'            => __( 'License Action', 'blossom-recipe-pro' ),
		'deactivate-license'        => __( 'Deactivate License', 'blossom-recipe-pro' ),
		'activate-license'          => __( 'Activate License', 'blossom-recipe-pro' ),
		'status-unknown'            => __( 'License status is unknown.', 'blossom-recipe-pro' ),
		'renew'                     => __( 'Renew?', 'blossom-recipe-pro' ),
		'unlimited'                 => __( 'unlimited', 'blossom-recipe-pro' ),
		'license-key-is-active'     => __( 'License key is active.', 'blossom-recipe-pro' ),
		'expires%s'                 => __( 'Expires %s.', 'blossom-recipe-pro' ),
		'expires-never'             => __( 'Lifetime License.', 'blossom-recipe-pro' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'blossom-recipe-pro' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'blossom-recipe-pro' ),
		'license-key-expired'       => __( 'License key has expired.', 'blossom-recipe-pro' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'blossom-recipe-pro' ),
		'license-is-inactive'       => __( 'License is inactive.', 'blossom-recipe-pro' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'blossom-recipe-pro' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'blossom-recipe-pro' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'blossom-recipe-pro' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'blossom-recipe-pro' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4$s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'blossom-recipe-pro' ),
	)

);