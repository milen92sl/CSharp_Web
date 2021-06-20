<?php
/**
 * Blossom Fashion Theme Customizer
 *
 * @package Blossom_Fashion_Pro
 */

/**
 * Requiring customizer panels & sections
 */
$blossom_fashion_pro_panels = array('layout', 'typography', 'general', 'contact', 'ads');
$blossom_fashion_pro_sections = array('site', 'color', 'background', 'child-theme-support', 'sidebar', 'footer');
$blossom_fashion_pro_sub_sections = array(
	'layout' => array('header', 'slider', 'home', 'archive', 'post', 'pagination'),
	'typography' => array('body', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'),
	'general' => array('featured', 'social', 'share', 'seo', 'post-page', 'newsletter', 'instagram', 'shop', 'performance', 'misc' ),
	'contact' => array('form', 'map', 'info'),
	'ads' => array('before-content', 'after-content'),
);

foreach ($blossom_fashion_pro_sections as $s) {
	require get_template_directory() . '/inc/customizer/sections/' . $s . '.php';
}

foreach ($blossom_fashion_pro_panels as $p) {
	require get_template_directory() . '/inc/customizer/panels/' . $p . '.php';
}

foreach ($blossom_fashion_pro_sub_sections as $k => $v) {
	foreach ($v as $w) {
		require get_template_directory() . '/inc/customizer/panels/' . $k . '/' . $w . '.php';
	}
}

/**
 * Reset Theme Options
 */
require get_template_directory() . '/inc/customizer/customizer-reset/customizer-reset.php';

/**
 * Sanitization Functions
 */
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blossom_fashion_pro_customize_preview_js() {
	wp_enqueue_script('blossom-fashion-customizer', get_template_directory_uri() . '/inc/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'blossom_fashion_pro_customize_preview_js');

function blossom_fashion_pro_customize_control_js(){
    wp_enqueue_script( 'blossom-fashion-customize', get_template_directory_uri() . '/inc/js/customize.js', array( 'jquery', 'customize-controls' ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'blossom_fashion_pro_customize_control_js' );

function blossom_fashion_pro_customize_script() {
	wp_enqueue_style('blossom-fashion-customize', get_template_directory_uri() . '/inc/css/customize.css', array(), BLOSSOM_FASHION_PRO_THEME_VERSION);
}
add_action('customize_controls_enqueue_scripts', 'blossom_fashion_pro_customize_script');

/*
 * Notifications in customizer
 */
require get_template_directory() . '/inc/customizer-plugin-recommend/customizer-notice/class-customizer-notice.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-install-helper.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-recommend.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/section-notice/class-section-notice.php';

$config_customizer = array(
	'recommended_plugins' => array(
		'blossomthemes-toolkit' => array(
			'recommended' => true,
			'description' => sprintf(
				/* translators: %s: plugin name */
				esc_html__('If you want to take full advantage of the features this theme has to offer, please install and activate %s plugin.', 'blossom-fashion-pro'), '<strong>BlossomThemes Toolkit</strong>'
			),
		),
	),
	'recommended_plugins_title' => esc_html__('Recommended Plugin', 'blossom-fashion-pro'),
	'install_button_label' => esc_html__('Install and Activate', 'blossom-fashion-pro'),
	'activate_button_label' => esc_html__('Activate', 'blossom-fashion-pro'),
	'deactivate_button_label' => esc_html__('Deactivate', 'blossom-fashion-pro'),
);
Blossom_Fashion_Pro_Customizer_Notice::init(apply_filters('blossom_fashion_pro_customizer_notice_array', $config_customizer));

Blossom_Fashion_Pro_Customizer_Section::get_instance();