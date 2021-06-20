<?php
/**
 * Blossom Recipe Pro Import Hooks.
 *
 * @package Blossom_Recipe_Pro
 */

/** Import content data*/
if (!function_exists('blossom_recipe_pro_import_files')):
	function blossom_recipe_pro_import_files() {
		return array(
			array(
				'import_file_name' 				=> 'Default Layout',
				'import_file_url' 				=> 'https://blossomthemes.com/wp-content/uploads/2019/02/blossomrecipepro.xml',
				'import_widget_file_url' 		=> 'https://blossomthemes.com/wp-content/uploads/2019/02/blossomrecipepro.wie',
				'import_customizer_file_url' 	=> 'https://blossomthemes.com/wp-content/uploads/2019/02/blossomrecipepro.dat',
				'import_preview_image_url' 		=> get_template_directory_uri() . '/screenshot.png',
				'import_notice' 				=> __( 'Please wait for about 10 - 15 minutes. Do not close or refresh the page until the import is complete.', 'blossom-recipe-pro' ),
				'preview_url' 					=> 'https://demo.blossomthemes.com/blossom-recipe-pro/',
			),
		);
	}
	add_filter('pt-ocdi/import_files', 'blossom_recipe_pro_import_files');
endif;

/** Programmatically set the front page and menu */
if (!function_exists('blossom_recipe_pro_after_import')):
	function blossom_recipe_pro_after_import($selected_import) {
		if ('Default Layout' === $selected_import['import_file_name']) {
			//Set Menu
			$primary = get_term_by('name', 'Primary', 'nav_menu');
			set_theme_mod('nav_menu_locations', array(
				'primary' => $primary->term_id,
			)
			);
		}
	}
	add_action('pt-ocdi/after_import', 'blossom_recipe_pro_after_import');
endif;

add_filter('pt-ocdi/disable_pt_branding', '__return_true');