<?php

function blossom_pin_pro_post_format_scripts() {
	global $pagenow;
	if ( in_array($pagenow, array( 'post.php', 'post-new.php' ) ) ) {
		/* --------
		add theme styles
		------------------------------------------- */
		wp_enqueue_style( 'blossom-pin-pro-format-style', get_template_directory_uri() . '/inc/formats/formatstyle.css', array(), '1' );

		/* --------
		include format scripts
		------------------------------------------- */
		wp_enqueue_script( 'blossom-pin-pro-format-script', get_template_directory_uri() . '/inc/formats/formatscript.js', array( 'jquery' ), '1', true );

		/* --------
		add sortable library for gallery
		------------------------------------------- */
		wp_enqueue_script('jquery-ui-sortable');

		$post_formats = get_theme_support( 'post-formats' );
		if ( in_array( 'gallery', $post_formats[0] ) ) {
			add_action( 'save_post', 'blossom_pin_pro_post_format_gallery_save_post');
		}
		if ( in_array( 'image', $post_formats[0] ) ) {
			add_action( 'save_post', 'blossom_pin_pro_post_format_image_save_post');
		}
		if ( in_array( 'video', $post_formats[0] ) ) {
			add_action( 'save_post', 'blossom_pin_pro_post_format_video_save_post');
		}
		if ( in_array( 'audio', $post_formats[0] ) ) {
			add_action( 'save_post', 'blossom_pin_pro_post_format_audio_save_post');
		}
		if ( in_array( 'quote', $post_formats[0] ) ) {
			add_action( 'save_post', 'blossom_pin_pro_post_format_quote_save_post');
		}
	}
}
add_action( 'admin_init', 'blossom_pin_pro_post_format_scripts' );

function blossom_pin_pro_add_post_format_metabox(){
	//Trip Gallery
    add_meta_box(
		'blossom_pin_pro_post_format_metabox',
		__( 'Post Format Metabox', 'blossom-pin-pro' ),
		'blossom_pin_pro_post_format_metaboxes_cb',
		'post',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'blossom_pin_pro_add_post_format_metabox' );

function blossom_pin_pro_post_format_gallery_save_post( $post_id ) {
	if ( ! isset( $_POST['blossom_pin_pro_format_gallery_nonce'] ) || ! wp_verify_nonce( $_POST['blossom_pin_pro_format_gallery_nonce'], 'bpp_format_gallery_nonce' ) ) return;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if ( isset( $_POST['_bpp_format_custom_gallery'] ) ) {
        update_post_meta( $post_id, '_bpp_format_custom_gallery', $_POST['_bpp_format_custom_gallery'] );
    } else {
        delete_post_meta( $post_id, '_bpp_format_custom_gallery' );
    }
}

function blossom_pin_pro_post_format_image_save_post( $post_id ) {
	if ( ! isset( $_POST['blossom_pin_pro_format_custom_image_nonce'] ) || ! wp_verify_nonce( $_POST['blossom_pin_pro_format_custom_image_nonce'], 'bpp_format_custom_image_nonce' ) ) return;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    
	if ( isset( $_POST['_bpp_format_custom_image'] ) ) {
        update_post_meta( $post_id, '_bpp_format_custom_image', $_POST['_bpp_format_custom_image'] );
    } else {
        delete_post_meta( $post_id, '_bpp_format_custom_image' );
    }
}

function blossom_pin_pro_post_format_video_save_post( $post_id ) {
	if ( ! isset( $_POST['blossom_pin_pro_format_video_nonce'] ) || ! wp_verify_nonce( $_POST['blossom_pin_pro_format_video_nonce'], 'bpp_format_video_nonce' ) ) return;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if ( isset( $_POST['_bpp_format_video_embed'] ) ) {
		update_post_meta( $post_id, '_bpp_format_video_embed', htmlspecialchars_decode( stripslashes( $_POST['_bpp_format_video_embed'] ) ) );
	}
}

function blossom_pin_pro_post_format_audio_save_post( $post_id ) {
	if ( ! isset( $_POST['blossom_pin_pro_format_audio_nonce'] ) || ! wp_verify_nonce( $_POST['blossom_pin_pro_format_audio_nonce'], 'bpp_format_audio_nonce' ) ) return;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if ( isset( $_POST['_bpp_format_audio_embed'] ) ) {
		update_post_meta( $post_id, '_bpp_format_audio_embed', htmlspecialchars_decode( stripslashes( $_POST['_bpp_format_audio_embed'] ) ) );
	}
}

function blossom_pin_pro_post_format_quote_save_post( $post_id ) {
	if ( ! isset( $_POST['blossom_pin_pro_format_quote_nonce'] ) || ! wp_verify_nonce( $_POST['blossom_pin_pro_format_quote_nonce'], 'bpp_format_quote_nonce' ) ) return;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if ( isset( $_POST['_bpp_format_quote_source_name'] ) ) {
        update_post_meta( $post_id, '_bpp_format_quote_source_name', sanitize_text_field( $_POST['_bpp_format_quote_source_name'] ) );
    } else {
        delete_post_meta( $post_id, '_bpp_format_quote_source_name' );
    }
    if ( isset( $_POST['_bpp_format_quote_source_content'] ) ) {
        update_post_meta( $post_id, '_bpp_format_quote_source_content', wp_kses_post( $_POST['_bpp_format_quote_source_content'] ) );
    } else {
        delete_post_meta( $post_id, '_bpp_format_quote_source_content' );
    }
}

function blossom_pin_pro_post_format_metaboxes_cb( $post ) {
	$post_formats = get_theme_support( 'post-formats' );
	if ( ! empty( $post_formats[0] ) && is_array( $post_formats[0] ) ) {
		global $post;
		$current_post_format = get_post_format( get_the_id() );

		// support the possibility of people having hacked in custom
		// post-formats or that this theme doesn't natively support
		// the post-format in the current post - a tab will be added
		// for this format but the default WP post UI will be shown ~sp
		if ( ! empty( $current_post_format ) && ! in_array( $current_post_format, $post_formats[0] ) ) {
			array_push( $post_formats[0], get_post_format_string( $current_post_format ) );
		}
		array_unshift($post_formats[0], 'standard');
		$post_formats = $post_formats[0];

		$formats = array(
			'quote',
			'video',
			'image',
			'gallery',
			'audio',
		);

		foreach ( $formats as $format ) {
			if ( in_array( $format, $post_formats ) ) {
				get_template_part( '/inc/formats/boxes/format', $format );
			}
		}
	}
}