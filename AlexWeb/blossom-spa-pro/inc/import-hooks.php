<?php
/**
 * Blossom Spa Pro Import Hooks.
 *
 * @package Blossom_Spa_Pro
 */

/** Import content data*/
if ( !function_exists( 'blossom_spa_pro_import_files' ) ) :
	function blossom_spa_pro_import_files() {
		return array(
			array(
				'import_file_name' => 'Default Layout',
				'import_file_url' => 'https://blossomthemes.com/wp-content/uploads/2018/12/blossomspapro.xml',
				'import_widget_file_url' => 'https://blossomthemes.com/wp-content/uploads/2018/12/blossomspapro.wie',
				'import_customizer_file_url' => 'https://blossomthemes.com/wp-content/uploads/2018/12/blossomspapro.dat',
				'import_preview_image_url' => get_template_directory_uri() . '/screenshot.png',
				'import_notice' => __( 'Please wait for about 10 - 15 minutes. Do not close or refresh the page until the import is complete.', 'blossom-spa-pro' ),
				'preview_url' => 'https://demo.blossomthemes.com/blossom-spa-pro/',
			),
	        array(
	            'import_file_name'           => 'One Page Layout',
	            'import_file_url'            => 'https://blossomthemes.com/wp-content/uploads/2018/12/blossomspaproonepage.xml',
	            'import_widget_file_url'     => 'https://blossomthemes.com/wp-content/uploads/2018/12/blossomspaproonepage.wie',
	            'import_customizer_file_url' => 'https://blossomthemes.com/wp-content/uploads/2018/12/blossomspaproonepage.dat',
	            'import_preview_image_url'   => get_template_directory_uri() . '/screenshot.png',
	            'import_notice'              => __( 'Please wait for about 10 - 15 minutes. Do not close or refresh the page until the import is complete.', 'blossom-spa-pro' ),
	            'preview_url'                => 'https://demo.blossomthemes.com/blossom-spa-pro-one-page/',
	        ),  
		);
	}
	add_filter('pt-ocdi/import_files', 'blossom_spa_pro_import_files');
endif;

/** Programmatically set the front page and menu */
if ( !function_exists( 'blossom_spa_pro_after_import' ) ) :
	function blossom_spa_pro_after_import($selected_import) {
		if ( 'Default Layout' === $selected_import['import_file_name'] ) {
			//Set Menu
			$primary = get_term_by('name', 'Primary', 'nav_menu');
			set_theme_mod('nav_menu_locations', array(
				'primary' => $primary->term_id,
			)
			);

			/** Set Front page */
		    $page = get_page_by_path('home'); /** This need to be slug of the page that is assigned as Front page */
		        if ( isset( $page->ID ) ) {
		        update_option( 'page_on_front', $page->ID );
		        update_option( 'show_on_front', 'page' );
		    }
		    
		    /** Blog Page */
		    $postpage = get_page_by_path('blog'); /** This need to be slug of the page that is assigned as Posts page */
		    if( $postpage ){
		        $post_pgid = $postpage->ID;
		        
		        update_option( 'page_for_posts', $post_pgid );
		    }
		}
	}
	add_action('pt-ocdi/after_import', 'blossom_spa_pro_after_import');
endif;

add_filter('pt-ocdi/disable_pt_branding', '__return_true');