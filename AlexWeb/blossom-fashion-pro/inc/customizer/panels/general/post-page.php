<?php
/**
 * Post Page Settings
 *
 * @package Blossom_Fashion_Pro
 */

function blossom_fashion_pro_customize_register_general_post_page($wp_customize) {

	/** Posts(Blog) & Pages Settings */
	$wp_customize->add_section(
		'post_page_settings',
		array(
			'title' => __('Posts(Blog) & Pages Settings', 'blossom-fashion-pro'),
			'priority' => 50,
			'panel' => 'general_settings',
		)
	);

	/** Page Sidebar layout */
	$wp_customize->add_setting(
		'page_sidebar_layout',
		array(
			'default' => 'right-sidebar',
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_radio',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Radio_Image_Control(
			$wp_customize,
			'page_sidebar_layout',
			array(
				'section' => 'post_page_settings',
				'label' => __('Page Sidebar Layout', 'blossom-fashion-pro'),
				'description' => __('This is the general sidebar layout for pages. You can override the sidebar layout for individual page in repective page.', 'blossom-fashion-pro'),
				'choices' => array(
					'left-sidebar' => get_template_directory_uri() . '/images/2cl.png',
					'right-sidebar' => get_template_directory_uri() . '/images/2cr.png',
				),
			)
		)
	);

	/** Post Sidebar layout */
	$wp_customize->add_setting(
		'post_sidebar_layout',
		array(
			'default' => 'right-sidebar',
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_radio',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Radio_Image_Control(
			$wp_customize,
			'post_sidebar_layout',
			array(
				'section' => 'post_page_settings',
				'label' => __('Post Sidebar Layout', 'blossom-fashion-pro'),
				'description' => __('This is the general sidebar layout for posts. You can override the sidebar layout for individual post in repective post.', 'blossom-fashion-pro'),
				'choices' => array(
					'left-sidebar' => get_template_directory_uri() . '/images/2cl.png',
					'right-sidebar' => get_template_directory_uri() . '/images/2cr.png',
				),
			)
		)
	);

	/** Blog Excerpt */
	$wp_customize->add_setting(
		'ed_excerpt',
		array(
			'default' => true,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control(
			$wp_customize,
			'ed_excerpt',
			array(
				'section' => 'post_page_settings',
				'label' => __('Enable Blog Excerpt', 'blossom-fashion-pro'),
				'description' => __('Enable to show excerpt or disable to show full post content.', 'blossom-fashion-pro'),
			)
		)
	);

	/** Excerpt Length */
	$wp_customize->add_setting(
		'excerpt_length',
		array(
			'default' => 55,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_number_absint',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Slider_Control(
			$wp_customize,
			'excerpt_length',
			array(
				'section' => 'post_page_settings',
				'label' => __('Excerpt Length', 'blossom-fashion-pro'),
				'description' => __('Automatically generated excerpt length (in words).', 'blossom-fashion-pro'),
				'choices' => array(
					'min' => 10,
					'max' => 100,
					'step' => 5,
				),
			)
		)
	);

	/** Read More Text */
	$wp_customize->add_setting(
		'read_more_text',
		array(
			'default' => __('Continue Reading', 'blossom-fashion-pro'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'read_more_text',
		array(
			'type' => 'text',
			'section' => 'post_page_settings',
			'label' => __('Read More Text', 'blossom-fashion-pro'),
		)
	);

	$wp_customize->selective_refresh->add_partial('read_more_text', array(
		'selector' => '.entry-footer .btn-readmore',
		'render_callback' => 'blossom_fashion_pro_get_read_more',
	));

	/** Prefix Archive Page */
	$wp_customize->add_setting(
		'ed_prefix_archive',
		array(
			'default' => false,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control(
			$wp_customize,
			'ed_prefix_archive',
			array(
				'section' => 'post_page_settings',
				'label' => __('Hide Prefix in Archive Page', 'blossom-fashion-pro'),
				'description' => __('Enable to hide prefix in archive page.', 'blossom-fashion-pro'),
			)
		)
	);

	/** Note */
	$wp_customize->add_setting(
		'post_note_text',
		array(
			'default' => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Note_Control(
			$wp_customize,
			'post_note_text',
			array(
				'section' => 'post_page_settings',
				'description' => sprintf(__('%s These options affect your individual posts.', 'blossom-fashion-pro'), '<hr/>'),
			)
		)
	);

	/** Single Header Label */
	$wp_customize->add_setting(
		'single_header_label',
		array(
			'default' => __('You Are Reading', 'blossom-fashion-pro'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'single_header_label',
		array(
			'type' => 'text',
			'section' => 'post_page_settings',
			'label' => __('Single Header Label', 'blossom-fashion-pro'),
			'description' => __('Label in the header of single post layout one.', 'blossom-fashion-pro'),
		)
	);

	$wp_customize->selective_refresh->add_partial('single_header_label', array(
		'selector' => '.single-header .single-header-label',
		'render_callback' => 'blossom_fashion_pro_get_single_header_label',
	));

	$wp_customize->add_setting( 
		'ed_single_sticky',
		array(
			'default' => true,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( new Blossom_Fashion_Pro_Toggle_Control(
		$wp_customize,
		'ed_single_sticky',
		array(
			'section' => 'post_page_settings',
			'label' => __( 'Single Sticky Header', 'blossom-fashion-pro' ),
			'description' => __( 'Disable to remove stickiness on single header.', 'blossom-fashion-pro' ),
		) )
	);

	/** Affiliate Widget Label  */
	$wp_customize->add_setting(
		'affiliate_widget_single_label',
		array(
			'default' => __('Shop This Look', 'blossom-fashion-pro'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'affiliate_widget_single_label',
		array(
			'label' => __('Affiliate Widget Label', 'blossom-fashion-pro'),
			'description' => __('You can change the label of affiliate widget in single page from here.', 'blossom-fashion-pro'),
			'section' => 'post_page_settings',
			'type' => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial('affiliate_widget_single_label', array(
		'selector' => '.entry-footer .post-shope-holder .header .title',
		'render_callback' => 'blossom_fashion_pro_get_single_affiliate_header_label',
	));

	/** Hide Author Section */
	$wp_customize->add_setting(
		'ed_author',
		array(
			'default' => false,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control(
			$wp_customize,
			'ed_author',
			array(
				'section' => 'post_page_settings',
				'label' => __('Hide Author Section', 'blossom-fashion-pro'),
				'description' => __('Enable to hide author section below the blog post.', 'blossom-fashion-pro'),
			)
		)
	);

	/** Author Section title */
	$wp_customize->add_setting(
		'author_title',
		array(
			'default' => __('About Author', 'blossom-fashion-pro'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'author_title',
		array(
			'type' => 'text',
			'section' => 'post_page_settings',
			'label' => __('Author Section Title', 'blossom-fashion-pro'),
		)
	);

	$wp_customize->selective_refresh->add_partial('author_title', array(
		'selector' => '.author-section .title',
		'render_callback' => 'blossom_fashion_pro_get_author_title',
	));

	/** Show Related Posts */
	$wp_customize->add_setting(
		'ed_related',
		array(
			'default' => true,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control(
			$wp_customize,
			'ed_related',
			array(
				'section' => 'post_page_settings',
				'label' => __('Show Related Posts', 'blossom-fashion-pro'),
				'description' => __('Enable to show related posts in single page.', 'blossom-fashion-pro'),
			)
		)
	);

	/** Related Posts section title */
	$wp_customize->add_setting(
		'related_post_title',
		array(
			'default' => __('You may also like...', 'blossom-fashion-pro'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'related_post_title',
		array(
			'type' => 'text',
			'section' => 'post_page_settings',
			'label' => __('Related Posts Section Title', 'blossom-fashion-pro'),
			'active_callback' => 'blossom_fashion_pro_post_page_ac',
		)
	);

	$wp_customize->selective_refresh->add_partial('related_post_title', array(
		'selector' => '.related-posts .title',
		'render_callback' => 'blossom_fashion_pro_get_related_title',
	));

	/** Related Post Taxonomy */
	$wp_customize->add_setting(
		'related_taxonomy',
		array(
			'default' => 'cat',
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_radio',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Radio_Buttonset_Control(
			$wp_customize,
			'related_taxonomy',
			array(
				'section' => 'post_page_settings',
				'label' => __('Related Post Taxonomy', 'blossom-fashion-pro'),
				'description' => __('Choose Categories/Tags to display related post based on in Single Post.', 'blossom-fashion-pro'),
				'choices' => array(
					'cat' => __('Category', 'blossom-fashion-pro'),
					'tag' => __('Tags', 'blossom-fashion-pro'),
				),
				'active_callback' => 'blossom_fashion_pro_post_page_ac',
			)
		)
	);

	/** Show Popular Posts */
	$wp_customize->add_setting(
		'ed_popular',
		array(
			'default' => true,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control(
			$wp_customize,
			'ed_popular',
			array(
				'section' => 'post_page_settings',
				'label' => __('Show Popular Posts', 'blossom-fashion-pro'),
				'description' => __('Enable to show popular posts in single page. Popular posts are based on comment count.', 'blossom-fashion-pro'),
			)
		)
	);

	/** Popular Posts section title */
	$wp_customize->add_setting(
		'popular_post_title',
		array(
			'default' => __('Popular Articles...', 'blossom-fashion-pro'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'popular_post_title',
		array(
			'type' => 'text',
			'section' => 'post_page_settings',
			'label' => __('Popular Posts Section Title', 'blossom-fashion-pro'),
			'active_callback' => 'blossom_fashion_pro_post_page_ac',
		)
	);

	$wp_customize->selective_refresh->add_partial('popular_post_title', array(
		'selector' => '.popular-posts .title',
		'render_callback' => 'blossom_fashion_pro_get_popular_title',
	));

	/** Comments */
	$wp_customize->add_setting(
		'ed_comments',
		array(
			'default' => true,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control(
			$wp_customize,
			'ed_comments',
			array(
				'section' => 'post_page_settings',
				'label' => __('Show Comments', 'blossom-fashion-pro'),
				'description' => __('Enable to show Comments in Single Post/Page.', 'blossom-fashion-pro'),
			)
		)
	);

	/** Hide Category */
	$wp_customize->add_setting(
		'ed_category',
		array(
			'default' => false,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control(
			$wp_customize,
			'ed_category',
			array(
				'section' => 'post_page_settings',
				'label' => __('Hide Category', 'blossom-fashion-pro'),
				'description' => __('Enable to hide category.', 'blossom-fashion-pro'),
			)
		)
	);

	/** Hide Post Author */
	$wp_customize->add_setting(
		'ed_post_author',
		array(
			'default' => false,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control(
			$wp_customize,
			'ed_post_author',
			array(
				'section' => 'post_page_settings',
				'label' => __('Hide Post Author', 'blossom-fashion-pro'),
				'description' => __('Enable to hide post author.', 'blossom-fashion-pro'),
			)
		)
	);

	/** Hide Posted Date */
	$wp_customize->add_setting(
		'ed_post_date',
		array(
			'default' => false,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control(
			$wp_customize,
			'ed_post_date',
			array(
				'section' => 'post_page_settings',
				'label' => __('Hide Posted Date', 'blossom-fashion-pro'),
				'description' => __('Enable to hide posted date.', 'blossom-fashion-pro'),
			)
		)
	);

	/** Show Featured Image */
	$wp_customize->add_setting(
		'ed_featured_image',
		array(
			'default' => true,
			'sanitize_callback' => 'blossom_fashion_pro_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Blossom_Fashion_Pro_Toggle_Control(
			$wp_customize,
			'ed_featured_image',
			array(
				'section' => 'post_page_settings',
				'label' => __('Show Featured Image', 'blossom-fashion-pro'),
				'description' => __('Enable to show featured image in post detail (single page).', 'blossom-fashion-pro'),
				'active_callback' => 'blossom_fashion_pro_post_page_ac',
			)
		)
	);
	/** Posts(Blog) & Pages Settings Ends */

}
add_action('customize_register', 'blossom_fashion_pro_customize_register_general_post_page');

/**
 * Active Callback
 */
function blossom_fashion_pro_post_page_ac($control) {

	$ed_related = $control->manager->get_setting('ed_related')->value();
	$ed_popular = $control->manager->get_setting('ed_popular')->value();
	$single_layout = $control->manager->get_setting('single_post_layout')->value();
	$control_id = $control->id;

	if ($control_id == 'related_post_title' && $ed_related == true) {
		return true;
	}

	if ($control_id == 'related_taxonomy' && $ed_related == true) {
		return true;
	}

	if ($control_id == 'popular_post_title' && $ed_popular == true) {
		return true;
	}

	if ($control_id == 'ed_featured_image' && ($single_layout == 'one' || $single_layout == 'two' || $single_layout == 'five')) {
		return true;
	}

	return false;
}