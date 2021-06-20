<?php
/**
 * Newsletter Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_general_newsletter($wp_customize) {

	/** Newsletter Settings */
	$wp_customize->add_section(
		'newsletter_settings',
		array(
			'title' => __('Newsletter Settings', 'blossom-fashion-pro'),
			'priority' => 60,
			'panel' => 'general_settings',
		)
	);

	if (is_btnw_activated()) {
		/** Enable Newsletter Section */
		$wp_customize->add_setting(
			'ed_newsletter',
			array(
				'default' => false,
				'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Blossom_Fashion_Pro_Toggle_Control(
				$wp_customize,
				'ed_newsletter',
				array(
					'section' => 'newsletter_settings',
					'label' => __('Newsletter Section', 'blossom-fashion-pro'),
					'description' => __('Enable to show Newsletter Section', 'blossom-fashion-pro'),
				)
			)
		);

		/** Newsletter Shortcode */
		$wp_customize->add_setting(
			'newsletter_shortcode',
			array(
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			'newsletter_shortcode',
			array(
				'type' => 'text',
				'section' => 'newsletter_settings',
				'label' => __('Newsletter Shortcode', 'blossom-fashion-pro'),
				'description' => __('Enter the BlossomThemes Email Newsletters Shortcode. Ex. [BTEN id="356"]', 'blossom-fashion-pro'),
			)
		);

	} else {
		$wp_customize->add_setting(
			'newsletter_text',
			array(
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			new Blossom_Fashion_Pro_Plugin_Recommend_Control(
				$wp_customize,
				'newsletter_text',
				array(
					'section' => 'newsletter_settings',
					'label' => __('Newsletter Shortcode', 'blossom-fashion-pro'),
					'capability' => 'install_plugins',
					'plugin_slug' => 'blossomthemes-email-newsletter',
					'description' => sprintf(__('Please install and activate the recommended plugin %1$sBlossomThemes Email Newsletter%2$s.', 'blossom-fashion-pro'), '<strong>', '</strong>'),
				)
			)
		);
	}
}
add_action('customize_register', 'blossom_fashion_pro_customize_register_general_newsletter');