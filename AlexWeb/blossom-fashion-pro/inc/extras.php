<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Blossom_Fashion_Pro
 */

if (!function_exists('blossom_fashion_pro_posted_on')):
/**
 * Post-date/time
 */
function blossom_fashion_pro_posted_on() {
	$ed_updated_post_date = get_theme_mod('ed_post_update_date', true);
	$on = __('on ', 'blossom-fashion-pro');

	if (get_the_time('U') !== get_the_modified_time('U')) {
		if ($ed_updated_post_date) {
			$time_string = '<time class="entry-date published updated" datetime="%3$s" itemprop="dateModified">%4$s</time></time><time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
			$on = __('updated on ', 'blossom-fashion-pro');
		} else {
			$time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';
		}
	} else {
		$time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';
	}

	$time_string = sprintf($time_string,
		esc_attr(get_the_date('c')),
		esc_html(get_the_date()),
		esc_attr(get_the_modified_date('c')),
		esc_html(get_the_modified_date())
	);

	$posted_on = sprintf('%1$s %2$s', esc_html($on), '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
);

	echo '<span class="posted-on">' . $posted_on . '</span>';
}
endif;

if (!function_exists('blossom_fashion_pro_posted_by')):
/**
 * Posted By
 */
function blossom_fashion_pro_posted_by() {

	global $post;
	$layout = get_theme_mod('single_post_layout', 'one');

	if ($layout == 'two' || $layout == 'four') {
		$author_name = get_the_author_meta('display_name', $post->post_author);
		$author_url = get_author_posts_url(get_the_author_meta('ID', $post->post_author));
	} else {
		$author_name = get_the_author();
		$author_url = get_author_posts_url(get_the_author_meta('ID'));
	}

	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x('by %s', 'post author', 'blossom-fashion-pro'),
		'<span itemprop="name"><a class="url fn n" href="' . esc_url($author_url) . '" itemprop="url">' . esc_html($author_name) . '</a></span>'
	);
	echo '<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person">' . $byline . '</span>';
}
endif;

if (!function_exists('blossom_fashion_pro_comment_count')):
/**
 * Comment Count
 */
function blossom_fashion_pro_comment_count() {
	if (!post_password_required() && (comments_open() || get_comments_number())) {
		echo '<span class="comments"><i class="fa fa-comment-o"></i>';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'blossom-fashion-pro'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}
}
endif;

if (!function_exists('blossom_fashion_pro_category')):
/**
 * Prints categories
 */
function blossom_fashion_pro_category() {
	$child_theme_support    = get_theme_mod( 'child_additional_support', 'default' );
		// Hide category and tag text for pages.
	if ('post' === get_post_type()) {
		/* translators: used between list items, there is a space after the comma */

		if ( $child_theme_support == 'default' ) {
			$categories_list = get_the_category_list(esc_html__(', ', 'blossom-fashion-pro'));
		}else{
			$categories_list = get_the_category_list(esc_html__(' ', 'blossom-fashion-pro'));

		}		
		
		if ($categories_list) {
			echo '<span class="cat-links" itemprop="about">' . $categories_list . '</span>';
		}
	}
}
endif;

if (!function_exists('blossom_fashion_pro_tag')):
/**
 * Prints tags
 */
function blossom_fashion_pro_tag() {
		// Hide category and tag text for pages.
	if ('post' === get_post_type()) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list('', esc_html_x(' ', 'list item separator', 'blossom-fashion-pro'));
		if ($tags_list) {
			/* translators: 1: list of tags. */
			printf('<div class="tags" itemprop="about">' . esc_html__('%1$sTags:%2$s %3$s', 'blossom-fashion-pro') . '</div>', '<span>', '</span>', $tags_list);
		}
	}
}
endif;

if (!function_exists('blossom_fashion_pro_entry_meta')):
/**
 * Entry Meta
 */
function blossom_fashion_pro_entry_meta() {
	$ed_post_date = get_theme_mod('ed_post_date', false);
	$ed_post_author = get_theme_mod('ed_post_author', false);
	if ('post' === get_post_type()) {
		echo '<div class="entry-meta">';
		if (!$ed_post_author) {
			blossom_fashion_pro_posted_by();
		}

		if (is_single()) {
			if (!$ed_post_date) {
				blossom_fashion_pro_posted_on();
			}

		} else {
			blossom_fashion_pro_posted_on();
		}
		blossom_fashion_pro_comment_count();

		if (is_single()) {
			blossom_fashion_pro_single_like_count();
		} else {
			blossom_fashion_pro_like_count();
		}
		echo '</div>';
	}
}
endif;

if (!function_exists('blossom_fashion_pro_latest_posts')):
/**
 * Latest Posts
 */
function blossom_fashion_pro_latest_posts() {
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 4,
		'posts_status' => 'publish',
		'ignore_sticky_posts' => true,
	);

	$qry = new WP_Query($args);

	if ($qry->have_posts()) {
		?>
		<div class="recent-posts">
			<h2 class="title"><?php esc_html_e('Latest Posts', 'blossom-fashion-pro');?></h2>
			<div class="grid">
				<?php while ($qry->have_posts()) {
					$qry->the_post();?>
					<article class="post">
						<a href="<?php the_permalink();?>" class="post-thumbnail">
							<?php
							if (has_post_thumbnail()) {
								the_post_thumbnail('blossom-fashion-related');
							} else {
								blossom_fashion_pro_fallback_image('blossom-fashion-related');
							}
							?>
						</a>
						<header class="entry-header">
							<?php
							blossom_fashion_pro_category();
							the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
							?>
						</header>
					</article>
				<?php }?>
			</div>
		</div>
		<?php
		wp_reset_postdata();
	}
}
endif;

if (!function_exists('blossom_fashion_pro_form_section')):
/**
 * Form Icon
 */
function blossom_fashion_pro_form_section() {?>
	<div class="form-section">
		<span id="btn-search"><i class="fa fa-search"></i></span>
	</div>
	<?php
}
endif;

if (!function_exists('blossom_fashion_pro_site_branding')):
/**
 * Site Branding
 */
function blossom_fashion_pro_site_branding() {
	?>
	<div class="site-branding" itemscope itemtype="http://schema.org/Organization">
		<?php
		if (function_exists('has_custom_logo') && has_custom_logo()) {
			the_custom_logo();
		}?>
		<div class="site-title-wrap">		
		
		<?php
		if( is_front_page() ){ ?>
            <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
		    <?php 
        }else{ ?>
            <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
        <?php 
        } 
		$description = get_bloginfo('description', 'display');
		if ($description || is_customize_preview()) {?>
			<p class="site-description" itemprop="description"><?php echo $description; ?></p>
			<?php
		}
		?>
		</div>
	</div>
	<?php
}
endif;

if (!function_exists('blossom_fashion_pro_primary_nagivation')):
/**
 * Primary Navigation.
 */
function blossom_fashion_pro_primary_nagivation($toggle = true, $nav = false) {
	?>
	<div class="overlay"></div>
	<?php
	if ($toggle) {
		blossom_fashion_pro_toggle();
	}

	if ($nav) {
		blossom_fashion_pro_nav_toggle();
	}

	?>
	<nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<?php
		wp_nav_menu(array(
			'theme_location' => 'primary',
			'menu_id' => 'primary-menu',
			'fallback_cb' => 'blossom_fashion_pro_primary_menu_fallback',
		));
		?>
	</nav><!-- #site-navigation -->
	<?php
}
endif;

if (!function_exists('blossom_fashion_pro_nav_toggle')):
/**
 * Nav Icon Toggle
 */
function blossom_fashion_pro_nav_toggle() {
	?>
	<div id="toggle-button">
		<i class="fa fa-navicon"></i>
	</div>
	<?php
}
endif;

if (!function_exists('blossom_fashion_pro_toggle')):
/**
 * Navigation Toggle Btn
 */
function blossom_fashion_pro_toggle() {?>
	<div id="toggle-button">
		<span></span><?php esc_html_e('Menu', 'blossom-fashion-pro');?>
	</div>
	<?php
}
endif;

if (!function_exists('blossom_fashion_pro_primary_menu_fallback')):
/**
 * Fallback for primary menu
 */
function blossom_fashion_pro_primary_menu_fallback() {
	if (current_user_can('manage_options')) {
		echo '<ul id="primary-menu" class="menu">';
		echo '<li><a href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__('Click here to add a menu', 'blossom-fashion-pro') . '</a></li>';
		echo '</ul>';
	}
}
endif;

if (!function_exists('blossom_fashion_pro_secondary_navigation')):
/**
 * Secondary Navigation
 */
function blossom_fashion_pro_secondary_navigation() {
	?>
	<div id="secondary-toggle-button">
		<span></span><?php esc_html_e('Menu', 'blossom-fashion-pro');?>
	</div>
	<nav class="secondary-nav">
		<?php
		wp_nav_menu(array(
			'theme_location' => 'secondary',
			'menu_id' => 'secondary-menu',
			'fallback_cb' => 'blossom_fashion_pro_secondary_menu_fallback',
		));
		?>
	</nav>
	<?php
}
endif;

if (!function_exists('blossom_fashion_pro_secondary_menu_fallback')):
/**
 * Fallback for secondary menu
 */
function blossom_fashion_pro_secondary_menu_fallback() {
	if (current_user_can('manage_options')) {
		echo '<ul id="secondary-menu" class="menu">';
		echo '<li><a href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__('Click here to add a menu', 'blossom-fashion-pro') . '</a></li>';
		echo '</ul>';
	}
}
endif;

if (!function_exists('blossom_fashion_pro_social_links')):
/**
 * Social Links
 */
function blossom_fashion_pro_social_links($echo = true) {
	$defaults = array(
		array(
			'font' => 'fa fa-facebook',
			'link' => 'https://www.facebook.com/',
		),
		array(
			'font' => 'fa fa-twitter',
			'link' => 'https://twitter.com/',
		),
		array(
			'font' => 'fa fa-youtube-play',
			'link' => 'https://www.youtube.com/',
		),
		array(
			'font' => 'fa fa-instagram',
			'link' => 'https://www.instagram.com/',
		),
		array(
			'font' => 'fa fa-google-plus-circle',
			'link' => 'https://plus.google.com',
		),
		array(
			'font' => 'fa fa-odnoklassniki',
			'link' => 'https://ok.ru/',
		),
		array(
			'font' => 'fa fa-vk',
			'link' => 'https://vk.com/',
		),
		array(
			'font' => 'fa fa-xing',
			'link' => 'https://www.xing.com/',
		),
	);
	$social_links = get_theme_mod('social_links', $defaults);
	$ed_social = get_theme_mod('ed_social_links', true);

	if ($ed_social && $social_links && $echo) {
		?>
		<ul class="social-networks">
			<?php
			foreach ($social_links as $link) {
				if ($link['link']) {?>
					<li><a href="<?php echo esc_url($link['link']); ?>" target="_blank" rel="nofollow"><i class="<?php echo esc_attr($link['font']); ?>"></i></a></li>
					<?php
				}
			}
			?>
		</ul>
		<?php
	} elseif ($ed_social && $social_links) {
		return true;
	} else {
		return false;
	}
	?>
	<?php
}
endif;

if (!function_exists('blossom_fashion_pro_breadcrumb')):
/**
 * Breadcrumbs
 */
function blossom_fashion_pro_breadcrumb() {
	global $post;
		$post_page = get_option('page_for_posts'); //The ID of the page that displays posts.
		$show_front = get_option('show_on_front'); //What to show on the front page
		$home = get_theme_mod('home_text', __('Home', 'blossom-fashion-pro')); // text for the 'Home' link
		$delimiter = '<span class="separator"><i class="fa fa-angle-right"></i></span>';
		$before = '<span class="current">'; // tag before the current crumb
		$after = '</span>'; // tag after the current crumb

		if (get_theme_mod('ed_breadcrumb', true)) {

			echo '<div class="breadcrumb-wrapper" itemscope itemtype="http://schema.org/BreadcrumbList">
			<div id="crumbs" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
			<a href="' . esc_url(home_url()) . '" itemprop="item">' . esc_html($home) . '</a> ' . $delimiter;

			if (is_home()) {

				echo $before . esc_html(single_post_title('', false)) . $after;

			} elseif (is_category()) {

				$thisCat = get_category(get_query_var('cat'), false);

				if ($show_front === 'page' && $post_page) {
				//If static blog post page is set
					$p = get_post($post_page);
					echo ' <a href="' . esc_url(get_permalink($post_page)) . '" itemprop="item">' . esc_html($p->post_title) . '</a> ' . $delimiter;
				}

				if ($thisCat->parent != 0) {
					echo get_category_parents($thisCat->parent, TRUE, $delimiter);
				}

				echo $before . esc_html(single_cat_title('', false)) . $after;

			} elseif (is_woocommerce_activated() && (is_product_category() || is_product_tag())) {
			//For Woocommerce archive page

				$current_term = $GLOBALS['wp_query']->get_queried_object();

				if (wc_get_page_id('shop')) {
				//Displaying Shop link in woocommerce archive page
					$_name = wc_get_page_id('shop') ? get_the_title(wc_get_page_id('shop')) : '';
					if (!$_name) {
						$product_post_type = get_post_type_object('product');
						$_name = $product_post_type->labels->singular_name;
					}
					echo ' <a href="' . esc_url(get_permalink(wc_get_page_id('shop'))) . '" itemprop="item">' . esc_html($_name) . '</a> ' . $delimiter;
				}

				if (is_product_category()) {
					$ancestors = get_ancestors($current_term->term_id, 'product_cat');
					$ancestors = array_reverse($ancestors);
					foreach ($ancestors as $ancestor) {
						$ancestor = get_term($ancestor, 'product_cat');
						if (!is_wp_error($ancestor) && $ancestor) {
							echo ' <a href="' . esc_url(get_term_link($ancestor)) . '" itemprop="item">' . esc_html($ancestor->name) . '</a> ' . $delimiter;
						}
					}
				}
				echo $before . esc_html($current_term->name) . $after;

			} elseif (is_woocommerce_activated() && is_shop()) {
			//Shop Archive page
				if (get_option('page_on_front') == wc_get_page_id('shop')) {
					return;
				}
				$_name = wc_get_page_id('shop') ? get_the_title(wc_get_page_id('shop')) : '';

				if (!$_name) {
					$product_post_type = get_post_type_object('product');
					$_name = $product_post_type->labels->singular_name;
				}
				echo $before . esc_html($_name) . $after;

			} elseif (is_tag()) {

				echo $before . esc_html(single_tag_title('', false)) . $after;

			} elseif (is_author()) {

				global $author;
				$userdata = get_userdata($author);
				echo $before . esc_html($userdata->display_name) . $after;

			} elseif (is_search()) {

				echo $before . esc_html__('Search Results for "', 'blossom-fashion-pro') . esc_html(get_search_query()) . esc_html__('"', 'blossom-fashion-pro') . $after;

			} elseif (is_day()) {

				echo '<a href="' . esc_url(get_year_link(get_the_time(__('Y', 'blossom-fashion-pro')))) . '" itemprop="item">' . esc_html(get_the_time(__('Y', 'blossom-fashion-pro'))) . '</a> ' . $delimiter;
				echo '<a href="' . esc_url(get_month_link(get_the_time(__('Y', 'blossom-fashion-pro')), get_the_time(__('m', 'blossom-fashion-pro')))) . '" itemprop="item">' . esc_html(get_the_time(__('F', 'blossom-fashion-pro'))) . '</a> ' . $delimiter;
				echo $before . esc_html(get_the_time(__('d', 'blossom-fashion-pro'))) . $after;

			} elseif (is_month()) {

				echo '<a href="' . esc_url(get_year_link(get_the_time(__('Y', 'blossom-fashion-pro')))) . '" itemprop="item">' . esc_html(get_the_time(__('Y', 'blossom-fashion-pro'))) . '</a> ' . $delimiter;
				echo $before . esc_html(get_the_time(__('F', 'blossom-fashion-pro'))) . $after;

			} elseif (is_year()) {

				echo $before . esc_html(get_the_time(__('Y', 'blossom-fashion-pro'))) . $after;

			} elseif (is_single() && !is_attachment()) {

				if (is_woocommerce_activated() && 'product' === get_post_type()) {
				//For Woocommerce single product

					if (wc_get_page_id('shop')) {
					//Displaying Shop link in woocommerce archive page
						$_name = wc_get_page_id('shop') ? get_the_title(wc_get_page_id('shop')) : '';
						if (!$_name) {
							$product_post_type = get_post_type_object('product');
							$_name = $product_post_type->labels->singular_name;
						}
						echo ' <a href="' . esc_url(get_permalink(wc_get_page_id('shop'))) . '" itemprop="item">' . esc_html($_name) . '</a> ' . $delimiter;
					}

					if ($terms = wc_get_product_terms($post->ID, 'product_cat', array('orderby' => 'parent', 'order' => 'DESC'))) {
						$main_term = apply_filters('woocommerce_breadcrumb_main_term', $terms[0], $terms);
						$ancestors = get_ancestors($main_term->term_id, 'product_cat');
						$ancestors = array_reverse($ancestors);
						foreach ($ancestors as $ancestor) {
							$ancestor = get_term($ancestor, 'product_cat');
							if (!is_wp_error($ancestor) && $ancestor) {
								echo ' <a href="' . esc_url(get_term_link($ancestor)) . '" itemprop="item">' . esc_html($ancestor->name) . '</a> ' . $delimiter;
							}
						}
						echo ' <a href="' . esc_url(get_term_link($main_term)) . '" itemprop="item">' . esc_html($main_term->name) . '</a> ' . $delimiter;
					}

					echo $before . esc_html(get_the_title()) . $after;

				} elseif (get_post_type() != 'post') {

					$post_type = get_post_type_object(get_post_type());

					if ($post_type->has_archive == true) {
// For CPT Archive Link

					// Add support for a non-standard label of 'archive_title' (special use case).
						$label = !empty($post_type->labels->archive_title) ? $post_type->labels->archive_title : $post_type->labels->name;
						printf('<a href="%1$s" itemprop="item">%2$s</a>', esc_url(get_post_type_archive_link(get_post_type())), $label);
						echo $delimiter;

					}
					echo $before . esc_html(get_the_title()) . $after;

				} else {
				//For Post

					$cat_object = get_the_category();
					$potential_parent = 0;

					if ($show_front === 'page' && $post_page) {
					//If static blog post page is set
						$p = get_post($post_page);
						echo ' <a href="' . esc_url(get_permalink($post_page)) . '" itemprop="item">' . esc_html($p->post_title) . '</a> ' . $delimiter;
					}

					if ($cat_object) {
					//Getting category hierarchy if any

					//Now try to find the deepest term of those that we know of
						$use_term = key($cat_object);
						foreach ($cat_object as $key => $object) {
						//Can't use the next($cat_object) trick since order is unknown
							if ($object->parent > 0 && ($potential_parent === 0 || $object->parent === $potential_parent)) {
								$use_term = $key;
								$potential_parent = $object->term_id;
							}
						}

						$cat = $cat_object[$use_term];

						$cats = get_category_parents($cat, TRUE, $delimiter);
					$cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats); //NEED TO CHECK THIS
					echo $cats;
				}

				echo $before . esc_html(get_the_title()) . $after;

			}

		} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {

			$post_type = get_post_type_object(get_post_type());
			if (get_query_var('paged')) {
				echo '<a href="' . esc_url(get_post_type_archive_link($post_type->name)) . '" itemprop="item">' . esc_html($post_type->label) . '</a>';
				echo $delimiter . $before . sprintf(__('Page %s', 'blossom-fashion-pro'), get_query_var('paged')) . $after;
			} else {
				echo $before . esc_html($post_type->label) . $after;
			}

		} elseif (is_attachment()) {

			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID);
			if ($cat) {
				$cat = $cat[0];
				echo get_category_parents($cat, TRUE, $delimiter);
				echo '<a href="' . esc_url(get_permalink($parent)) . '" itemprop="item">' . esc_html($parent->post_title) . '</a>' . ' <span class="separator">' . esc_html($delimiter) . '</span> ';
			}
			echo $before . esc_html(get_the_title()) . $after;

		} elseif (is_page() && !$post->post_parent) {

			echo $before . esc_html(get_the_title()) . $after;

		} elseif (is_page() && $post->post_parent) {

			$parent_id = $post->post_parent;
			$breadcrumbs = array();

			while ($parent_id) {
				$page = get_post($parent_id);
				$breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '" itemprop="item">' . esc_html(get_the_title($page->ID)) . '</a>';
				$parent_id = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo $breadcrumbs[$i];
				if ($i != count($breadcrumbs) - 1) {
					echo $delimiter;
				}

			}
			echo $delimiter . $before . esc_html(get_the_title()) . $after;

		} elseif (is_404()) {
			echo $before . esc_html__('404 Error - Page Not Found', 'blossom-fashion-pro') . $after;
		}

		if (get_query_var('paged')) {
			echo __(' (Page', 'blossom-fashion-pro') . ' ' . get_query_var('paged') . __(')', 'blossom-fashion-pro');
		}

		echo '</div></div><!-- .breadcrumb-wrapper -->';

	}
}
endif;

if (!function_exists('blossom_fashion_pro_get_banner')):
/**
 * Prints Banner Section
 */
function blossom_fashion_pro_get_banner($slider_layout = 'one') {
	$ed_banner = get_theme_mod('ed_banner_section', 'slider_banner');
	$slider_type = get_theme_mod('slider_type', 'latest_posts');
	$slider_cat = get_theme_mod('slider_cat');
	$slider_pages = get_theme_mod('slider_pages');
	$slider_custom = get_theme_mod('slider_custom');
	$posts_per_page = get_theme_mod('no_of_slides', 3);
	$ed_full_image = get_theme_mod('slider_full_image');
	$ed_caption = get_theme_mod('slider_caption', true);
	$read_more = get_theme_mod('slider_readmore', __('Continue Reading', 'blossom-fashion-pro'));

	if ($slider_layout == 'six') {
		$image_size = 'blossom-fashion-slider-six';
	} elseif ($slider_layout == 'one') {
		$image_size = $ed_full_image ? 'full' : 'blossom-fashion-slider';
	} else {
		$image_size = 'blossom-fashion-slider';
	}

	if ($ed_banner == 'static_banner' && has_custom_header()) {
		?>
		<div class="banner<?php if (has_header_video()) {
			echo esc_attr(' video-banner');
		}
		?>">
		<?php the_custom_header_markup();?>
	</div>
	<?php
} elseif ($ed_banner == 'slider_banner') {
	if ($slider_type == 'latest_posts' || $slider_type == 'cat' || $slider_type == 'pages') {

		$args = array(
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
		);

		if ($slider_type === 'cat' && $slider_cat) {
			$args['post_type'] = 'post';
			$args['cat'] = $slider_cat;
			$args['posts_per_page'] = -1;
		} elseif ($slider_type == 'pages' && $slider_pages) {
			$args['post_type'] = 'page';
			$args['posts_per_page'] = -1;
			$args['post__in'] = blossom_fashion_pro_get_id_from_page($slider_pages);
			$args['orderby'] = 'post__in';
		} else {
			$args['post_type'] = 'post';
			$args['posts_per_page'] = $posts_per_page;
		}

		$qry = new WP_Query($args);

		if ($qry->have_posts()) {
			?>
			<div class="banner banner-layout-<?php echo esc_attr($slider_layout); ?>">
				<?php if ($slider_layout == 'seven') {
					echo '<div class="container">';
				}
				?>
				<div id="banner-slider<?php if ($slider_layout == 'five' || $slider_layout == 'six') {
					echo esc_attr('-' . $slider_layout);
				}
				?>" class="owl-carousel">
				<?php while ($qry->have_posts()) {
					$qry->the_post();?>
					<div class="item">
						<?php
						if (has_post_thumbnail()) {
							the_post_thumbnail($image_size);
						} else {
							blossom_fashion_pro_fallback_image($image_size);
						}

						if ($ed_caption) {
							?>
							<div class="banner-text">
								<div class="container">
									<div class="text-holder">
										<?php
										blossom_fashion_pro_category();
										the_title('<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
										if ($slider_layout == 'two' || $slider_layout == 'three' || $slider_layout == 'four') {
											if ($read_more) {
												echo '<a href="' . esc_url(get_the_permalink()) . '" class="btn-more">' . esc_html($read_more) . '</a>';
											}

										}
										?>
									</div>
								</div>
							</div>
						<?php }?>
					</div>
				<?php }?>
			</div>
			<?php if ($slider_layout == 'seven') {
				echo '</div>';
			}
			?>
		</div>
		<?php
		wp_reset_postdata();
	}

} elseif ($slider_type == 'custom' && $slider_custom) {
	?>
	<div class="banner banner-layout-<?php echo esc_attr($slider_layout); ?>">
		<?php if ($slider_layout == 'seven') {
			echo '<div class="container">';
		}
		?>
		<div id="banner-slider<?php if ($slider_layout == 'five' || $slider_layout == 'six') {
			echo esc_attr('-' . $slider_layout);
		}
		?>" class="owl-carousel">
		<?php
		foreach ($slider_custom as $slide) {
			if ($slide['thumbnail'] || $slide['title'] || $slide['subtitle']) {
				?>
				<div class="item">
					<?php
					if ($slide['thumbnail']) {
						$image = wp_get_attachment_image_url($slide['thumbnail'], $image_size);?>
						<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($slide['title']); ?>" />
						<?php
					} else {
						blossom_fashion_pro_fallback_image($image_size);
					}

					if ($ed_caption) {
						?>
						<div class="banner-text">
							<div class="container">
								<div class="text-holder">
									<?php
									if ($slide['subtitle']) {
										echo '<span class="category">';
										if ($slide['link']) {
											echo '<a href="' . esc_url($slide['link']) . '">';
										}

										echo esc_html($slide['subtitle']);
										if ($slide['link']) {
											echo '</a>';
										}

										echo '</span>';
									}
									if ($slide['title']) {
										echo '<h2 class="title">';
										if ($slide['link']) {
											echo '<a href="' . esc_url($slide['link']) . '" rel="bookmark">';
										}

										echo wp_kses_post($slide['title']);
										if ($slide['link']) {
											echo '</a>';
										}

										echo '</h2>';
									}

									if ($slider_layout == 'two' || $slider_layout == 'three' || $slider_layout == 'four') {
										if ($read_more) {
											echo '<a href="' . esc_url($slide['link']) . '" class="btn-more">' . esc_html($read_more) . '</a>';
										}

									}
									?>
								</div>
							</div>
						</div>
					<?php }?>
				</div>
				<?php
			}
		}
		?>
	</div>
	<?php if ($slider_layout == 'seven') {
		echo '</div>';
	}
	?>
</div>
<?php
}
}
}
endif;

if (!function_exists('blossom_fashion_pro_page_header')):
/**
 * Prints Page Header for archive and single page
 */
function blossom_fashion_pro_page_header() {
	if ((is_archive() && !is_author()) || is_page() && !is_front_page() ) {
		?>
		<div class="page-header">
			<?php
			if (is_archive() && !is_author()) {
				the_archive_title();
				the_archive_description('<div class="archive-description">', '</div>');
			}

			if (is_page()) {
				the_title('<h1 class="page-title">', '</h1>');
			}
			?>
		</div>
		<?php
	}
}
endif;

if (!function_exists('blossom_fashion_pro_theme_comment')):
/**
 * Callback function for Comment List
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments
 */
function blossom_fashion_pro_theme_comment($comment, $args, $depth) {
	if ('div' == $args['style']) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo $tag ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent')?> id="comment-<?php comment_ID()?>">

	<?php if ('div' != $args['style']): ?>
		<div id="div-comment-<?php comment_ID()?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
		<?php endif;?>

		<footer class="comment-meta">
			<div class="comment-author vcard">
				<?php if ($args['avatar_size'] != 0) {
					echo get_avatar($comment, $args['avatar_size']);
				}
				?>
			</div><!-- .comment-author vcard -->
		</footer>

		<div class="text-holder">
			<div class="top">
				<div class="left">
					<?php if ($comment->comment_approved == '0'): ?>
						<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'blossom-fashion-pro');?></em>
						<br />
					<?php endif;?>
					<?php printf(__('<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s</b> <span class="says">says:</span>', 'blossom-fashion-pro'), get_comment_author_link());?>
					<div class="comment-metadata commentmetadata">
						<?php esc_html_e('Posted on', 'blossom-fashion-pro');?>
						<a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>">
							<time itemprop="commentTime" datetime="<?php echo esc_attr(get_gmt_from_date(get_comment_date() . get_comment_time(), 'Y-m-d H:i:s')); ?>"><?php printf(esc_html__('%1$s at %2$s', 'blossom-fashion-pro'), get_comment_date(), get_comment_time());?></time>
						</a>
					</div>
				</div>
				<div class="reply">
					<?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])));?>
				</div>
			</div>
			<div class="comment-content" itemprop="commentText"><?php comment_text();?></div>
		</div><!-- .text-holder -->

		<?php if ('div' != $args['style']): ?>
		</div><!-- .comment-body -->
	<?php endif;?>

	<?php
}
endif;

if (!function_exists('blossom_fashion_pro_sidebar')):
/**
 * Return sidebar layouts for pages/posts
 */
function blossom_fashion_pro_sidebar($sidebar = false, $class = false) {
	global $post;
	$return = false;
	$array_one = array('one-full', 'two-full', 'three-full', 'four-full', 'five-full', 'six-full', 'seven-full');
	$array_two = array('one', 'two', 'three', 'four', 'five', 'six', 'seven');
	$array_three = array('one-left', 'two-left', 'three-left', 'four-left', 'five-left', 'six-left', 'seven-left');

	if ((is_front_page() && is_home()) || is_home()) {
			//blog/home page
		$home_sidebar = get_theme_mod('home_page_sidebar', 'sidebar');
		$home_layout = get_theme_mod('home_layout', 'one');

		if (in_array($home_layout, $array_one) || !is_active_sidebar($home_sidebar)) {
			if ($sidebar) {
				$return = false;
			}
				// Fullwidth
			if ($class) {
				$return = 'full-width';
			}

		} elseif (is_active_sidebar($home_sidebar)) {
			if ($sidebar) {
				$return = $home_sidebar;
			}
			//With Sidebar
			if ($class) {
				if (in_array($home_layout, $array_two)) {
					$return = 'rightsidebar';
				}

				if (in_array($home_layout, $array_three)) {
					$return = 'leftsidebar';
				}

			}
		} else {
			if ($sidebar) {
				$return = false;
			}
			// Fullwidth
			if ($class) {
				$return = 'full-width';
			}

		}
	}

	if (is_archive()) {
		//archive page
		$archive_sidebar = get_theme_mod('archive_page_sidebar', 'sidebar');
		$cat_sidebar = get_theme_mod('cat_archive_page_sidebar', 'default-sidebar');
		$tag_sidebar = get_theme_mod('tag_archive_page_sidebar', 'default-sidebar');
		$date_sidebar = get_theme_mod('date_archive_page_sidebar', 'default-sidebar');
		$author_sidebar = get_theme_mod('author_archive_page_sidebar', 'default-sidebar');
		$archive_layout = get_theme_mod('archive_layout', 'one');

		if (is_category()) {

			if ($cat_sidebar == 'no-sidebar' || ($cat_sidebar == 'default-sidebar' && $archive_sidebar == 'no-sidebar') || in_array($archive_layout, $array_one)) {
				if ($sidebar) {
					$return = false;
				}
				//Fullwidth
				if ($class) {
					$return = 'full-width';
				}

			} elseif ($cat_sidebar == 'default-sidebar' && $archive_sidebar != 'no-sidebar' && is_active_sidebar($archive_sidebar)) {
				if ($sidebar) {
					$return = $archive_sidebar;
				}

				if ($class && in_array($archive_layout, $array_two)) {
					$return = 'rightsidebar';
				}
				//With Sidebar
				if ($class && in_array($archive_layout, $array_three)) {
					$return = 'leftsidebar';
				}

			} elseif (is_active_sidebar($cat_sidebar)) {
				if ($sidebar) {
					$return = $cat_sidebar;
				}

				if ($class && in_array($archive_layout, $array_two)) {
					$return = 'rightsidebar';
				}
				//With Sidebar
				if ($class && in_array($archive_layout, $array_three)) {
					$return = 'leftsidebar';
				}

			} else {
				if ($sidebar) {
					$return = false;
				}
				//Fullwidth
				if ($class) {
					$return = 'full-width';
				}

			}

		} elseif (is_tag()) {

			if ($tag_sidebar == 'no-sidebar' || ($tag_sidebar == 'default-sidebar' && $archive_sidebar == 'no-sidebar') || in_array($archive_layout, $array_one)) {
				if ($sidebar) {
					$return = false;
				}
				//Fullwidth
				if ($class) {
					$return = 'full-width';
				}

			} elseif (($tag_sidebar == 'default-sidebar' && $archive_sidebar != 'no-sidebar' && is_active_sidebar($archive_sidebar))) {
				if ($sidebar) {
					$return = $archive_sidebar;
				}

				if ($class && in_array($archive_layout, $array_two)) {
					$return = 'rightsidebar';
				}
				//With Sidebar
				if ($class && in_array($archive_layout, $array_three)) {
					$return = 'leftsidebar';
				}

			} elseif (is_active_sidebar($tag_sidebar)) {
				if ($sidebar) {
					$return = $tag_sidebar;
				}

				if ($class && in_array($archive_layout, $array_two)) {
					$return = 'rightsidebar';
				}
				//With Sidebar
				if ($class && in_array($archive_layout, $array_three)) {
					$return = 'leftsidebar';
				}

			} else {
				if ($sidebar) {
					$return = false;
				}
				//Fullwidth
				if ($class) {
					$return = 'full-width';
				}

			}

		} elseif (is_author()) {

			if ($author_sidebar == 'no-sidebar' || ($author_sidebar == 'default-sidebar' && $archive_sidebar == 'no-sidebar') || in_array($archive_layout, $array_one)) {
				if ($sidebar) {
					$return = false;
				}
				//Fullwidth
				if ($class) {
					$return = 'full-width';
				}

			} elseif (($author_sidebar == 'default-sidebar' && $archive_sidebar != 'no-sidebar' && is_active_sidebar($archive_sidebar))) {
				if ($sidebar) {
					$return = $archive_sidebar;
				}

				if ($class && in_array($archive_layout, $array_two)) {
					$return = 'rightsidebar';
				}
				//With Sidebar
				if ($class && in_array($archive_layout, $array_three)) {
					$return = 'leftsidebar';
				}

			} elseif (is_active_sidebar($author_sidebar)) {
				if ($sidebar) {
					$return = $author_sidebar;
				}

				if ($class && in_array($archive_layout, $array_two)) {
					$return = 'rightsidebar';
				}
				//With Sidebar
				if ($class && in_array($archive_layout, $array_three)) {
					$return = 'leftsidebar';
				}

			} else {
				if ($sidebar) {
					$return = false;
				}
				//Fullwidth
				if ($class) {
					$return = 'full-width';
				}

			}

		} elseif (is_date()) {

			if ($date_sidebar == 'no-sidebar' || ($date_sidebar == 'default-sidebar' && $archive_sidebar == 'no-sidebar') || in_array($archive_layout, $array_one)) {
				if ($sidebar) {
					$return = false;
				}
				//Fullwidth
				if ($class) {
					$return = 'full-width';
				}

			} elseif (($date_sidebar == 'default-sidebar' && $archive_sidebar != 'no-sidebar' && is_active_sidebar($archive_sidebar))) {
				if ($sidebar) {
					$return = $archive_sidebar;
				}

				if ($class && in_array($archive_layout, $array_two)) {
					$return = 'rightsidebar';
				}
				//With Sidebar
				if ($class && in_array($archive_layout, $array_three)) {
					$return = 'leftsidebar';
				}

			} elseif (is_active_sidebar($date_sidebar)) {
				if ($sidebar) {
					$return = $date_sidebar;
				}

				if ($class && in_array($archive_layout, $array_two)) {
					$return = 'rightsidebar';
				}
				//With Sidebar
				if ($class && in_array($archive_layout, $array_three)) {
					$return = 'leftsidebar';
				}

			} else {
				if ($sidebar) {
					$return = false;
				}
				//Fullwidth
				if ($class) {
					$return = 'full-width';
				}

			}

		} elseif (is_woocommerce_activated() && (is_shop() || is_product_category() || is_product_tag())) {
			//For Woocommerce

			if (is_active_sidebar('shop-sidebar')) {
				if ($class) {
					$return = 'rightsidebar';
				}

			} else {
				if ($class) {
					$return = 'full-width';
				}

			}

		} else {
			if ($archive_sidebar != 'no-sidebar' && is_active_sidebar($archive_sidebar)) {
				if ($sidebar) {
					$return = $archive_sidebar;
				}

				if ($class) {
					$return = 'rightsidebar';
				}

			} else {
				if ($sidebar) {
					$return = false;
				}
				//Fullwidth
				if ($class) {
					$return = 'full-width';
				}

			}
		}

	}

	if (is_singular()) {
		$post_sidebar = get_theme_mod('single_post_sidebar', 'sidebar');
		$page_sidebar = get_theme_mod('single_page_sidebar', 'sidebar');
		$page_layout = get_theme_mod('page_sidebar_layout', 'right-sidebar'); //Default Layout Style for Pages
		$post_layout = get_theme_mod('post_sidebar_layout', 'right-sidebar'); //Default Layout Style for Posts
		$single_layout = get_theme_mod('single_post_layout', 'one');

		if (get_post_meta($post->ID, '_sidebar_layout', true)) {
			$sidebar_layout = get_post_meta($post->ID, '_sidebar_layout', true);
		} else {
			$sidebar_layout = 'default-sidebar';
		}

		if (get_post_meta($post->ID, '_fashion_pro_sidebar', true)) {
			$single_sidebar = get_post_meta($post->ID, '_fashion_pro_sidebar', true);
		} else {
			$single_sidebar = 'default-sidebar';
		}

		if (is_page()) {

			if (($single_sidebar == 'no-sidebar') || (($single_sidebar == 'default-sidebar') && ($page_sidebar == 'no-sidebar'))) {
				if ($sidebar) {
					$return = false;
				}
				//Fullwidth
				if ($class) {
					$return = 'full-width';
				}

			} elseif ($single_sidebar == 'default-sidebar' && $page_sidebar != 'no-sidebar' && is_active_sidebar($page_sidebar)) {
				if ($sidebar) {
					$return = $page_sidebar;
				}

				if ($class && (($sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar') || ($sidebar_layout == 'right-sidebar'))) {
					$return = 'rightsidebar';
				}

				if ($class && (($sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar') || ($sidebar_layout == 'left-sidebar'))) {
					$return = 'leftsidebar';
				}

			} elseif (is_active_sidebar($single_sidebar)) {
				if ($sidebar) {
					$return = $single_sidebar;
				}

				if ($class && (($sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar') || ($sidebar_layout == 'right-sidebar'))) {
					$return = 'rightsidebar';
				}

				if ($class && (($sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar') || ($sidebar_layout == 'left-sidebar'))) {
					$return = 'leftsidebar';
				}

			} else {
				if ($sidebar) {
					$return = false;
				}
				//Fullwidth
				if ($class) {
					$return = 'full-width';
				}

			}
		}

		if (is_single()) {
			if (is_woocommerce_activated() && 'product' === get_post_type()) {
				if (is_active_sidebar('shop-sidebar')) {
					if ($class && $post_layout == 'right-sidebar') {
						$return = 'rightsidebar';
					}
					//With Sidebar
					if ($class && $post_layout == 'left-sidebar') {
						$return = 'leftsidebar';
					}

				} else {
					if ($class) {
						$return = 'full-width';
					}

				}
			} elseif (($single_layout == 'five') || ($single_sidebar == 'no-sidebar') || (($single_sidebar == 'default-sidebar') && ($post_sidebar == 'no-sidebar'))) {
				if ($sidebar) {
					$return = false;
				}
				//Fullwidth
				if ($class) {
					$return = 'full-width';
				}

			} elseif ($single_sidebar == 'default-sidebar' && $post_sidebar != 'no-sidebar' && is_active_sidebar($post_sidebar)) {
				if ($sidebar) {
					$return = $post_sidebar;
				}

				if ($class && (($sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar') || ($sidebar_layout == 'right-sidebar'))) {
					$return = 'rightsidebar';
				}

				if ($class && (($sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar') || ($sidebar_layout == 'left-sidebar'))) {
					$return = 'leftsidebar';
				}

			} elseif (is_active_sidebar($single_sidebar)) {
				if ($sidebar) {
					$return = $single_sidebar;
				}

				if ($class && (($sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar') || ($sidebar_layout == 'right-sidebar'))) {
					$return = 'rightsidebar';
				}

				if ($class && (($sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar') || ($sidebar_layout == 'left-sidebar'))) {
					$return = 'leftsidebar';
				}

			} else {
				if ($sidebar) {
					$return = false;
				}
				//Fullwidth
				if ($class) {
					$return = 'full-width';
				}

			}
		}
	}

	if (is_search()) {
		$search_sidebar = get_theme_mod('search_page_sidebar', 'sidebar');
		$search_layout = get_theme_mod('search_page_sidebar_layout', 'right-sidebar');

		if ($search_sidebar != 'no-sidebar' && is_active_sidebar($search_sidebar)) {
			if ($sidebar) {
				$return = $search_sidebar;
			}

			if ($class && $search_layout == 'right-sidebar') {
				$return = 'rightsidebar';
			}
			//With Sidebar
			if ($class && $search_layout == 'left-sidebar') {
				$return = 'leftsidebar';
			}

		} else {
			if ($sidebar) {
				$return = false;
			}
			//Fullwidth
			if ($class) {
				$return = 'full-width';
			}

		}

	}

	return $return;
}
endif;

if (!function_exists('blossom_fashion_pro_get_posts')):
/**
 * Fuction to list Custom Post Type
 */
function blossom_fashion_pro_get_posts($post_type = 'post', $slug = false) {

	$args = array(
		'posts_per_page' => -1,
		'post_type' => $post_type,
		'post_status' => 'publish',
		'suppress_filters' => true,
	);
	$posts_array = get_posts($args);

		// Initate an empty array
	$post_options = array();
	$post_options[''] = __(' -- Choose -- ', 'blossom-fashion-pro');
	if (!empty($posts_array)) {
		foreach ($posts_array as $posts) {
			if ($slug) {
				$post_options[$posts->post_title] = $posts->post_title;
			} else {
				$post_options[$posts->ID] = $posts->post_title;
			}
		}
	}
	return $post_options;
	wp_reset_postdata();
}
endif;

if (!function_exists('blossom_fashion_pro_get_categories')):
/**
 * Function to list post categories in customizer options
 */
function blossom_fashion_pro_get_categories($select = true, $taxonomy = 'category', $slug = false) {

	/* Option list of all categories */
	$categories = array();

	$args = array(
		'hide_empty' => false,
		'taxonomy' => $taxonomy,
	);

	$catlists = get_terms($args);
	if ($select) {
		$categories[''] = __('Choose Category', 'blossom-fashion-pro');
	}

	foreach ($catlists as $category) {
		if ($slug) {
			$categories[$category->slug] = $category->name;
		} else {
			$categories[$category->term_id] = $category->name;
		}
	}

	return $categories;
}
endif;

if (!function_exists('blossom_fashion_pro_get_id_from_page')):
/**
 * Get page ids from page name.
 */
function blossom_fashion_pro_get_id_from_page($slider_pages) {
	if ($slider_pages) {
		$ids = array();
		foreach ($slider_pages as $p) {
			if (!empty($p['page'])) {
				$page_ids = get_page_by_title($p['page']);
				$ids[] = $page_ids->ID;
			}
		}
		return $ids;
	} else {
		return false;
	}
}
endif;

if (!function_exists('blossom_fashion_pro_get_affiliate_shop')):
/**
 * Affiliate Link from Shop Style
 */
function blossom_fashion_pro_get_affiliate_shop() {
	$affiliate_code = get_post_meta(get_the_ID(), '_fashion_pro_affiliate_code', true);
	$aff_widget_label = get_theme_mod('affiliate_widget_label', __('#Shop This Look', 'blossom-fashion-pro'));
	$aff_single_label = get_theme_mod('affiliate_widget_single_label', __('Shop This Look', 'blossom-fashion-pro'));
	$section_title = is_single() ? $aff_single_label : $aff_widget_label;

	if ($affiliate_code) {
		echo '<div class="post-shope-holder">';
		if ($section_title) {
			?>
			<section class="header">
				<?php
				if ($section_title) {
					echo '<h2 class="title">' . esc_html($section_title) . '</h2>';
				}

				?>
			</section>
		<?php }
		echo htmlspecialchars_decode(stripslashes($affiliate_code));
		echo '</div>';
	}
}
endif;

if (!function_exists('blossom_fashion_pro_get_patterns')):
/**
 * Function to list Custom Pattern
 */
function blossom_fashion_pro_get_patterns() {
	$patterns = array();
	$patterns['nobg'] = get_template_directory_uri() . '/images/patterns_thumb/' . 'nobg.png';
	for ($i = 0; $i < 38; $i++) {
		$patterns['pattern' . $i] = get_template_directory_uri() . '/images/patterns_thumb/' . 'pattern' . $i . '.png';
	}
	for ($j = 1; $j < 26; $j++) {
		$patterns['hbg' . $j] = get_template_directory_uri() . '/images/patterns_thumb/' . 'hbg' . $j . '.png';
	}
	return $patterns;
}
endif;

if (!function_exists('blossom_fashion_pro_get_dynamnic_sidebar')):
/**
 * Function to list dynamic sidebar
 */
function blossom_fashion_pro_get_dynamnic_sidebar($nosidebar = false, $sidebar = false, $default = false) {
	$sidebar_arr = array();
	$sidebars = get_theme_mod('sidebar');

	if ($default) {
		$sidebar_arr['default-sidebar'] = __('Default Sidebar', 'blossom-fashion-pro');
	}

	if ($sidebar) {
		$sidebar_arr['sidebar'] = __('Sidebar', 'blossom-fashion-pro');
	}

	if ($sidebars) {
		foreach ($sidebars as $sidebar) {
			$id = $sidebar['name'] ? sanitize_title($sidebar['name']) : 'rara-sidebar-one';
			$sidebar_arr[$id] = $sidebar['name'];
		}
	}

	if ($nosidebar) {
		$sidebar_arr['no-sidebar'] = __('No Sidebar', 'blossom-fashion-pro');
	}

	return $sidebar_arr;
}
endif;

if (!function_exists('blossom_fashion_pro_get_all_fonts')):
/**
 * Return Web safe font and google font
 */
function blossom_fashion_pro_get_all_fonts() {
	$google = array();
	$standard = array(
		'georgia-serif' => __('Georgia', 'blossom-fashion-pro'),
		'palatino-serif' => __('Palatino Linotype, Book Antiqua, Palatino', 'blossom-fashion-pro'),
		'times-serif' => __('Times New Roman, Times', 'blossom-fashion-pro'),
		'arial-helvetica' => __('Arial, Helvetica', 'blossom-fashion-pro'),
		'arial-gadget' => __('Arial Black, Gadget', 'blossom-fashion-pro'),
		'comic-cursive' => __('Comic Sans MS, cursive', 'blossom-fashion-pro'),
		'impact-charcoal' => __('Impact, Charcoal', 'blossom-fashion-pro'),
		'lucida' => __('Lucida Sans Unicode, Lucida Grande', 'blossom-fashion-pro'),
		'tahoma-geneva' => __('Tahoma, Geneva', 'blossom-fashion-pro'),
		'trebuchet-helvetica' => __('Trebuchet MS, Helvetica', 'blossom-fashion-pro'),
		'verdana-geneva' => __('Verdana, Geneva', 'blossom-fashion-pro'),
		'courier' => __('Courier New, Courier', 'blossom-fashion-pro'),
		'lucida-monaco' => __('Lucida Console, Monaco', 'blossom-fashion-pro'),
	);

	$fonts = include wp_normalize_path(get_template_directory() . '/inc/custom-controls/typography/webfonts.php');

	foreach ($fonts['items'] as $font) {
		$google[$font['family']] = $font['family'];
	}
	$all_fonts = array_merge($standard, $google);
	return $all_fonts;
}
endif;

if (!function_exists('blossom_fashion_pro_get_social_share')):
/**
 * Get list of social sharing icons
 * http://www.sharelinkgenerator.com/
 *
 */
function blossom_fashion_pro_get_social_share($share) {
	global $post;

	switch ($share) {
		case 'facebook':
		echo '<li><a href="' . esc_url('https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink($post->ID)) . '" rel="nofollow" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';

		break;

		case 'twitter':
		echo '<li><a href="' . esc_url('https://twitter.com/home?status=' . get_the_title($post->ID)) . '&nbsp;' . get_the_permalink($post->ID) . '" rel="nofollow" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';

		break;

		case 'linkedin':
		echo '<li><a href="' . esc_url('https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink($post->ID) . '&title=' . get_the_title($post->ID)) . '" rel="nofollow" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>';

		break;

		case 'pinterest':
		echo '<li><a href="' . esc_url('https://pinterest.com/pin/create/button/?url=' . get_the_permalink($post->ID) . '&description=' . get_the_title($post->ID)) . '" rel="nofollow" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>';

		break;

		case 'email':
		echo '<li><a href="' . esc_url('mailto:?Subject=' . get_the_title($post->ID) . '&Body=' . get_the_permalink($post->ID)) . '" rel="nofollow" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>';

		break;

		case 'gplus':
		echo '<li><a href="' . esc_url('https://plus.google.com/share?url=' . get_the_permalink($post->ID)) . '" rel="nofollow" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>';

		break;

		case 'reddit':
		echo '<li><a href="' . esc_url('http://www.reddit.com/submit?url=' . get_the_permalink($post->ID) . '&title=' . get_the_title($post->ID)) . '" rel="nofollow" target="_blank"><i class="fa fa-reddit" aria-hidden="true"></i></a></li>';

		break;

		case 'tumblr':
		echo '<li> <a href=" ' . esc_url('https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . get_the_permalink($post->ID) . '&title=' . get_the_title($post->ID)) . ' " rel="nofollow" target="_blank"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>';

		break;

		case 'digg':
		echo '<li> <a href=" ' . esc_url('http://digg.com/submit?url=' . get_the_permalink($post->ID)) . ' " rel="nofollow" target="_blank"><i class="fa fa-digg" aria-hidden="true"></i></a></li>';

		break;

		case 'weibo':
		echo '<li> <a href=" ' . esc_url('https://service.weibo.com/share/share.php?url=' . get_the_permalink($post->ID)) . ' " rel="nofollow" target="_blank"><i class="fa fa-weibo" aria-hidden="true"></i></a></li>';

		break;

		case 'xing':
		echo '<li> <a href=" ' . esc_url('https://www.xing.com/app/user?op=share&url=' . get_the_permalink($post->ID)) . ' " rel="nofollow" target="_blank"><i class="fa fa-xing" aria-hidden="true"></i></a></li>';

		break;

		case 'vk':
		echo '<li> <a href=" ' . esc_url('http://vk.com/share.php?url=' . get_the_permalink($post->ID) . '&title=' . get_the_title($post->ID)) . ' " rel="nofollow" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a></li>';

		break;

		case 'pocket':
		echo '<li> <a href=" ' . esc_url('https://getpocket.com/edit?url=' . get_the_permalink($post->ID) . '&title=' . get_the_title($post->ID)) . ' " rel="nofollow" target="_blank"><i class="fa fa-get-pocket" aria-hidden="true"></i></a></li>';

		break;
	}
}
endif;

if (!function_exists('blossom_fashion_pro_like_count')):
/**
 * Prints like count of post
 */
function blossom_fashion_pro_like_count() {
	global $post;
	echo '<span class="like" id="like-' . esc_attr($post->ID) . '"><i class="fa fa-heart-o"></i>' . blossom_fashion_pro_get_like_count($post->ID) . '</span>';
}
endif;

if (!function_exists('blossom_fashion_pro_single_like_count')):
/**
 * Prints like count of post
 */
function blossom_fashion_pro_single_like_count() {
	global $post;
	echo '<span class="single-like" data-id="' . esc_attr($post->ID) . '"><i class="fa fa-heart-o"></i>' . blossom_fashion_pro_get_like_count($post->ID) . '</span>';
}
endif;

if (!function_exists('blossom_fashion_pro_get_like_count')):
/**
 * Return post like count
 */
function blossom_fashion_pro_get_like_count($post_id) {
	$count = get_post_meta($post_id, '_bfp_post_like', true);
	if ($count) {
		return $count;
	} else {
		return 0;
	}
}
endif;

if (!function_exists('blossom_fashion_pro_get_ad_block')):
/**
 * Display AD block
 *
 * @param $image     - Ad Image file
 * @param $link      - Ad Link
 * @param $target    - Link target
 * @param $adcode    - Adsence Adcode
 * @param $ed_adcode - Enable/disable Adcode
 */
function blossom_fashion_pro_get_ad_block($image, $link = false, $target, $adcode = false, $ed_adcode) {
	?>
	<div class="advertise-holder">
		<?php
		if ($ed_adcode && $adcode) {
			echo $adcode;
		} elseif ($image && !$ed_adcode) {
			if ($link) {
				echo '<a href="' . esc_url($link) . '"' . $target . '>';
			}
			?>
			<img src="<?php echo esc_url($image); ?>" />
			<?php
			if ($link) {
				echo '</a>';
			}

		}
		?>
	</div>
	<?php
}
endif;

if (!function_exists('blossom_fashion_pro_get_ad_before_content')):
/**
 * Get AD before single content
 */
function blossom_fashion_pro_get_ad_before_content() {
		$ed_ad = get_theme_mod('ed_bc_post_ad'); //from customizer
		$ad_img = get_theme_mod('bc_post_ad'); //from customizer
		$ad_link = get_theme_mod('bc_post_ad_link'); //from customizer
		$target = get_theme_mod('open_link_diff_tab_bc_post', true) ? 'target="_blank"' : '';
		$ed_ad_code = get_theme_mod('ed_bc_post_ad_code');
		$ad_code = get_theme_mod('bc_post_ad_code');

		if ($ad_img) {
			$image = wp_get_attachment_image_url($ad_img, 'full');
		} else {
			$image = false;
		}

		if ($ed_ad && ($ad_img || ($ed_ad_code && $ad_code))) {
			blossom_fashion_pro_get_ad_block($image, $ad_link, $target, $ad_code, $ed_ad_code);
		}

	}
endif;

if (!function_exists('blossom_fashion_pro_author_social')):
/**
 * Author Social Links
 */
function blossom_fashion_pro_author_social() {
	$id = get_the_author_meta('ID');
	$socials = get_user_meta($id, '_blossom_fashion_pro_user_social_icons', true);

	if ($socials) {
		echo '<ul class="social-networks">';
		foreach ($socials as $key => $link) {
			$add = ($key == 'youtube') ? '-play' : '';
			if ($link) {
				echo '<li><a href="' . esc_url($link) . '" target="_blank" rel="nofollow"><i class="fa fa-' . esc_attr($key . $add) . '"></i></a></li>';
			}

		}
		echo '</ul>';
	}
}
endif;

if (!function_exists('blossom_fashion_pro_create_post')):
/**
 * A function used to programmatically create a post and assign a page template in WordPress.
 *
 * @link https://tommcfarlin.com/programmatically-create-a-post-in-wordpress/
 * @link https://tommcfarlin.com/programmatically-set-a-wordpress-template/
 */
function blossom_fashion_pro_create_post($title, $slug, $template) {

		// Setup the author, page
	$author_id = 1;

		// Look for the page by the specified title. Set the ID to -1 if it doesn't exist.
		// Otherwise, set it to the page's ID.
	$page = get_page_by_title($title, OBJECT, 'page');
	$page_id = (null == $page) ? -1 : $page->ID;

		// If the page doesn't already exist, then create it
	if ($page_id == -1) {

			// Set the post ID so that we know the post was created successfully
		$post_id = wp_insert_post(
			array(
				'comment_status' => 'closed',
				'ping_status' => 'closed',
				'post_author' => $author_id,
				'post_name' => $slug,
				'post_title' => $title,
				'post_status' => 'publish',
				'post_type' => 'page',
			)
		);

		if ($post_id) {
			update_post_meta($post_id, '_wp_page_template', $template);
		}

			// Otherwise, we'll stop
	} else {
		update_post_meta($page_id, '_wp_page_template', $template);
		} // end if

	} // end programmatically_create_post
endif;

if (!function_exists('blossom_fashion_pro_fallback_image')):
/**
 * Prints Fallback Images
 */
function blossom_fashion_pro_fallback_image($image_size) {
	$placeholder = get_template_directory_uri() . '/images/fallback/' . $image_size . '.jpg';
	if (get_theme_mod('ed_lazy_load', true)) {
		$placeholder_src = '';
		$layzr_attr = ' data-layzr="' . esc_attr($placeholder) . '"';
	} else {
		$placeholder_src = $placeholder;
		$layzr_attr = '';
	}
	echo '<img src="' . esc_url($placeholder_src) . '" alt="' . esc_attr(get_the_title()) . '"' . $layzr_attr . '/>';
}
endif;

/**
 * Is Blossom Theme Toolkit active or not
 */
function is_bttk_activated() {
	return class_exists('Blossomthemes_Toolkit') ? true : false;
}

/**
 * Is BlossomThemes Email Newsletters active or not
 */
function is_btnw_activated() {
	return class_exists('Blossomthemes_Email_Newsletter') ? true : false;
}

/**
 * Is BlossomThemes Instagram Feed active or not
 */
function is_btif_activated() {
	return class_exists('Blossomthemes_Instagram_Feed') ? true : false;
}

/**
 * Query WooCommerce activation
 */
function is_woocommerce_activated() {
	return class_exists('woocommerce') ? true : false;
}

/**
 * Check if Contact Form 7 Plugin is installed
 */
function is_cf7_activated() {
	return class_exists('WPCF7') ? true : false;
}

/**
 * Query Jetpack activation
 */
function is_jetpack_activated($gallery = false) {
	if ($gallery) {
		return (class_exists('jetpack') && Jetpack::is_module_active('tiled-gallery')) ? true : false;
	} else {
		return class_exists('jetpack') ? true : false;
	}
}

if (!function_exists('blossom_fashion_pro_escape_text_tags')):
/**
 * Remove new line tags from string
 *
 * @param $text
 *
 * @return string
 */
function blossom_fashion_pro_escape_text_tags($text) {
	return (string) str_replace(array("\r", "\n"), '', strip_tags($text));
}
endif;