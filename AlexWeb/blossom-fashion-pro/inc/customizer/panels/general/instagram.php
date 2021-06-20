<?php
/**
 * Instagram Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_general_instagram($wp_customize) {

	/** Instagram Settings */
	$wp_customize->add_section(
		'instagram_settings',
		array(
			'title' => __('Instagram Settings', 'blossom-fashion-pro'),
			'priority' => 70,
			'panel' => 'general_settings',
		)
	);

	if (is_btif_activated()) {
		/** Enable Instagram Section */
		$wp_customize->add_setting(
			'ed_instagram',
			array(
				'default' => false,
				'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Blossom_Fashion_Pro_Toggle_Control(
				$wp_customize,
				'ed_instagram',
				array(
					'section' => 'instagram_settings',
					'label' => __('Instagram Section', 'blossom-fashion-pro'),
					'description' => __('Enable to show Instagram Section', 'blossom-fashion-pro'),
				)
			)
		);

		/** Note */
		$wp_customize->add_setting(
			'instagram_text',
			array(
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			new Blossom_Fashion_Pro_Note_Control(
				$wp_customize,
				'instagram_text',
				array(
					'section' => 'instagram_settings',
					'description' => sprintf(__('You can change the settings of BlossomThemes Instagram Feed %1$sfrom here%2$s.', 'blossom-fashion-pro'), '<a href="' . admin_url('admin.php?page=class-blossomthemes-instagram-feed-admin.php') . '" target="_blank">', '</a>'),
				)
			)
		);
	} else {
		$wp_customize->add_setting(
			'instagram_text',
			array(
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			new Blossom_Fashion_Pro_Plugin_Recommend_Control(
				$wp_customize,
				'instagram_text',
				array(
					'section' => 'instagram_settings',
					'capability' => 'install_plugins',
					'plugin_slug' => 'blossomthemes-instagram-feed',
					'description' => sprintf(__('Please install and activate the recommended plugin %1$sBlossomThemes Instagram Feed%2$s.', 'blossom-fashion-pro'), '<strong>', '</strong>'),
				)
			)
		);
	}

}
add_action('customize_register', 'blossom_fashion_pro_customize_register_general_instagram');