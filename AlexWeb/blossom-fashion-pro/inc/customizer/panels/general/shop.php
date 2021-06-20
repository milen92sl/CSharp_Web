<?php
/**
 * Shop Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_general_shop($wp_customize) {

	/** Shop Settings */
	$wp_customize->add_section(
		'shop_settings',
		array(
			'title' => __('Shop Settings', 'blossom-fashion-pro'),
			'priority' => 75,
			'panel' => 'general_settings',
		)
	);

	if (is_woocommerce_activated()) {
		/** Shop Section */
		$wp_customize->add_setting(
			'ed_shopping_cart',
			array(
				'default' => true,
				'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Blossom_Fashion_Pro_Toggle_Control(
				$wp_customize,
				'ed_shopping_cart',
				array(
					'section' => 'shop_settings',
					'label' => __('Shopping Cart', 'blossom-fashion-pro'),
					'description' => __('Enable to show Shopping cart in the header.', 'blossom-fashion-pro'),
				)
			)
		);

		/** Shop Section */
		$wp_customize->add_setting(
			'ed_top_shop_section',
			array(
				'default' => false,
				'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Blossom_Fashion_Pro_Toggle_Control(
				$wp_customize,
				'ed_top_shop_section',
				array(
					'section' => 'shop_settings',
					'label' => __('Shop Section', 'blossom-fashion-pro'),
					'description' => __('Enable to show Shop Section below Featured Section', 'blossom-fashion-pro'),
				)
			)
		);

		/** Related Post Taxonomy */
		$wp_customize->add_setting(
			'shop_bg',
			array(
				'default' => 'dark',
				'sanitize_callback' => 'blossom_fashion_pro_sanitize_radio',
			)
		);

		$wp_customize->add_control(
			new Blossom_Fashion_Pro_Radio_Buttonset_Control(
				$wp_customize,
				'shop_bg',
				array(
					'section' => 'shop_settings',
					'label' => __('Shop Background', 'blossom-fashion-pro'),
					'description' => __('Choose background of shop section.', 'blossom-fashion-pro'),
					'choices' => array(
						'dark' => __('Dark', 'blossom-fashion-pro'),
						'light' => __('Light', 'blossom-fashion-pro'),
					),
				)
			)
		);

		/** Shop Section Title */
		$wp_customize->add_setting(
			'shop_section_title',
			array(
				'default' => __('Welcome to our Shop!', 'blossom-fashion-pro'),
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'shop_section_title',
			array(
				'type' => 'text',
				'section' => 'shop_settings',
				'label' => __('Shop Section Title', 'blossom-fashion-pro'),
			)
		);

		$wp_customize->selective_refresh->add_partial('shop_section_title', array(
			'selector' => '.shop-section .title',
			'render_callback' => 'blossom_fashion_pro_get_shop_title',
		));

		/** Shop Section Content */
		$wp_customize->add_setting(
			'shop_section_content',
			array(
				'default' => __('This option can be change from Customize > General Settings > Shop settings.', 'blossom-fashion-pro'),
				'sanitize_callback' => 'wp_kses_post',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'shop_section_content',
			array(
				'type' => 'text',
				'section' => 'shop_settings',
				'label' => __('Shop Section Content', 'blossom-fashion-pro'),
			)
		);

		$wp_customize->selective_refresh->add_partial('shop_section_content', array(
			'selector' => '.shop-section .content',
			'render_callback' => 'blossom_fashion_pro_get_shop_content',
		));

		/** No. of Products */
		$wp_customize->add_setting(
			'no_of_products',
			array(
				'default' => 8,
				'sanitize_callback' => 'blossom_fashion_pro_sanitize_number_absint',
			)
		);

		$wp_customize->add_control(
			new Blossom_Fashion_Pro_Slider_Control(
				$wp_customize,
				'no_of_products',
				array(
					'section' => 'shop_settings',
					'label' => __('Number of Products', 'blossom-fashion-pro'),
					'description' => __('Choose the number of products you want to display', 'blossom-fashion-pro'),
					'choices' => array(
						'min' => 4,
						'max' => 12,
						'step' => 1,
					),
				)
			)
		);

	} else {
		/** Note */
		$wp_customize->add_setting(
			'shop_text',
			array(
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			new Blossom_Fashion_Pro_Note_Control(
				$wp_customize,
				'shop_text',
				array(
					'section' => 'shop_settings',
					'description' => sprintf(__('Please install and activate the recommended plugin %1$sWoocommerce%2$s. After that option related with this section will be visible.', 'blossom-fashion-pro'), '<a href="' . admin_url('themes.php?page=tgmpa-install-plugins') . '" target="_blank">', '</a>'),
				)
			)
		);
	}
	/** HR */
	$wp_customize->add_setting(
		'hr',
		array(
			'default' => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Note_Control(
			$wp_customize,
			'hr',
			array(
				'section' => 'shop_settings',
				'description' => '<hr/>',
			)
		)
	);

	/** Shop Section */
	$wp_customize->add_setting(
		'ed_bottom_shop_section',
		array(
			'default' => false,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control(
			$wp_customize,
			'ed_bottom_shop_section',
			array(
				'section' => 'shop_settings',
				'label' => __('Bottom Shop Section', 'blossom-fashion-pro'),
				'description' => __('Enable to show Shop Section below Blog Posts.', 'blossom-fashion-pro'),
			)
		)
	);

	/** Shop Section Title */
	$wp_customize->add_setting(
		'bottom_shop_section_title',
		array(
			'default' => __('Shop My Closet', 'blossom-fashion-pro'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'bottom_shop_section_title',
		array(
			'type' => 'text',
			'section' => 'shop_settings',
			'label' => __('Bottom Shop Section Title', 'blossom-fashion-pro'),
		)
	);

	$wp_customize->selective_refresh->add_partial('bottom_shop_section_title', array(
		'selector' => '.bottom-shop-section .title',
		'render_callback' => 'blossom_fashion_pro_get_bottom_shop_title',
	));

	/** Related Post Taxonomy */
	$wp_customize->add_setting(
		'woo_affiliate',
		array(
			'default' => 'woocommerce',
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_radio',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Radio_Buttonset_Control(
			$wp_customize,
			'woo_affiliate',
			array(
				'section' => 'shop_settings',
				'label' => __('Woocommerce / Affiliate Code', 'blossom-fashion-pro'),
				'description' => __('Choose Woocommerce/Affilate code to display bottom shop section.', 'blossom-fashion-pro'),
				'choices' => array(
					'woocommerce' => __('Woocommerce', 'blossom-fashion-pro'),
					'affiliate' => __('Affiliate', 'blossom-fashion-pro'),
				),
			)
		)
	);

	/** Affiliate Code */
	$wp_customize->add_setting(
		'affiliate_code',
		array(
			'default' => '',
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_code',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Code_Control(
			$wp_customize,
			'affiliate_code',
			array(
				'section' => 'shop_settings',
				'label' => __('Affiliate Code', 'blossom-fashion-pro'),
				'description' => __('Paste your affiliate code to show in bottom shop section.', 'blossom-fashion-pro'),
				'choices' => array(
					'language' => 'javascript',
					'theme' => 'monokai', //options are 'monokai', 'material' & 'elegant'
					'height' => 250,
				),
				'active_callback' => 'blossom_fashion_pro_affiliate_shop_ac',
			)
		)
	);

	if (is_woocommerce_activated()) {

		/** Slider Category */
		$wp_customize->add_setting(
			'product_cat',
			array(
				'default' => '',
				'sanitize_callback' => 'blossom_fashion_pro_sanitize_select',
			)
		);

		$wp_customize->add_control(
			new Blossom_Fashion_Pro_Select_Control(
				$wp_customize,
				'product_cat',
				array(
					'label' => __('Product Category', 'blossom-fashion-pro'),
					'section' => 'shop_settings',
					'choices' => blossom_fashion_pro_get_categories(true, 'product_cat', true),
					'active_callback' => 'blossom_fashion_pro_affiliate_shop_ac',
				)
			)
		);

		/** HR */
		$wp_customize->add_setting(
			'hr1',
			array(
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			new Blossom_Fashion_Pro_Note_Control(
				$wp_customize,
				'hr1',
				array(
					'section' => 'shop_settings',
					'description' => '<hr/>',
				)
			)
		);

		/** Shop Page Description */
		$wp_customize->add_setting(
			'shop_archive_description',
			array(
				'default' => true,
				'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Blossom_Fashion_Pro_Toggle_Control(
				$wp_customize,
				'shop_archive_description',
				array(
					'section' => 'shop_settings',
					'label' => __('Shop Page Description', 'blossom-fashion-pro'),
					'description' => __('Enable to show Shop Page Description.', 'blossom-fashion-pro'),
				)
			)
		);

		$wp_customize->add_setting(
			'archive_description_content',
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		);

		$wp_customize->add_control(
			'archive_description_content',
			array(
				'section' => 'shop_settings',
				'label' => __('Description For Shop Page', 'blossom-fashion-pro'),
				'description' => __('Write new description for Shop Page to overwrite the default description.', 'blossom-fashion-pro'),
				'type' => 'textarea',
				'active_callback' => 'blossom_fashion_pro_shop_page_description_ac',
			)
		);

	} else {
		$wp_customize->add_setting(
			'shop_text',
			array(
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			new Blossom_Fashion_Pro_Plugin_Recommend_Control(
				$wp_customize,
				'shop_text',
				array(
					'section' => 'shop_settings',
					'capability' => 'install_plugins',
					'plugin_slug' => 'woocommerce',
					'description' => sprintf(__('Please install and activate the recommended plugin %1$sWooCommerce%2$s.', 'blossom-fashion-pro'), '<strong>', '</strong>'),
				)
			)
		);
	}

}
add_action('customize_register', 'blossom_fashion_pro_customize_register_general_shop');

/**
 * Active Callback
 */
function blossom_fashion_pro_affiliate_shop_ac($control) {

	$ed_affiliate = $control->manager->get_setting('woo_affiliate')->value();
	$control_id = $control->id;

	if ($control_id == 'product_cat' && $ed_affiliate == 'woocommerce') {
		return true;
	}

	if ($control_id == 'shop_text' && $ed_affiliate == 'woocommerce') {
		return true;
	}

	if ($control_id == 'affiliate_code' && $ed_affiliate == 'affiliate') {
		return true;
	}

	return false;
}

/**
 * Active Callback
 */
function blossom_fashion_pro_shop_page_description_ac($control) {

	$shop_archive_description = $control->manager->get_setting('shop_archive_description')->value();
	$control_id = $control->id;

	if ($control_id == 'archive_description_content' && $shop_archive_description) {
		return true;
	}

	return false;
}