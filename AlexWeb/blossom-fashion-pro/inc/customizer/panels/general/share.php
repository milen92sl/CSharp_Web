<?php
/**
 * Social Sharing Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_general_sharing($wp_customize) {

	/** Social Sharing */
	$wp_customize->add_section(
		'social_sharing',
		array(
			'title' => __('Social Sharing', 'blossom-fashion-pro'),
			'priority' => 31,
			'panel' => 'general_settings',
		)
	);

	/** Enable Social Sharing Buttons */
	$wp_customize->add_setting(
		'ed_social_sharing',
		array(
			'default' => true,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control(
			$wp_customize,
			'ed_social_sharing',
			array(
				'section' => 'social_sharing',
				'label' => __('Enable Social Sharing Buttons', 'blossom-fashion-pro'),
				'description' => __('Enable or disable social sharing buttons on archive and single posts.', 'blossom-fashion-pro'),
			)
		)
	);

	/** Enable Social Sharing Buttons */
	$wp_customize->add_setting(
		'ed_og_tags',
		array(
			'default' => true,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control(
			$wp_customize,
			'ed_og_tags',
			array(
				'section' => 'social_sharing',
				'label' => __('Enable Open Graph Meta Tags', 'blossom-fashion-pro'),
				'description' => __('Disable this option if you\'re using Jetpack, Yoast or other plugin to maintain Open Graph meta tags.', 'blossom-fashion-pro'),
			)
		)
	);

	/** Social Sharing Buttons */
	$wp_customize->add_setting(
		'social_share',
		array(
			'default' => array('facebook', 'twitter', 'pinterest', 'gplus'),
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_sortable',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Control_Sortable(
			$wp_customize,
			'social_share',
			array(
				'section' => 'social_sharing',
				'label' => __('Social Sharing Buttons', 'blossom-fashion-pro'),
				'description' => __('Sort or toggle social sharing buttons.', 'blossom-fashion-pro'),
				'choices' => array(
					'facebook' => __('Facebook', 'blossom-fashion-pro'),
					'twitter' => __('Twitter', 'blossom-fashion-pro'),
					'linkedin' => __('LinkedIn', 'blossom-fashion-pro'),
					'pinterest' => __('Pinterest', 'blossom-fashion-pro'),
					'email' => __('Email', 'blossom-fashion-pro'),
					'gplus' => __('Google Plus', 'blossom-fashion-pro'),
					'reddit' => __('Reddit', 'blossom-fashion-pro'),
					'tumblr' => __('Tumblr', 'blossom-fashion-pro'),
					'digg' => __('Digg', 'blossom-fashion-pro'),
					'weibo' => __('Weibo', 'blossom-fashion-pro'),
					'xing' => __('Xing', 'blossom-fashion-pro'),
					'vk' => __('VK', 'blossom-fashion-pro'),
					'pocket' => __('GetPocket', 'blossom-fashion-pro'),
				),
			)
		)
	);

}
add_action('customize_register', 'blossom_fashion_pro_customize_register_general_sharing');