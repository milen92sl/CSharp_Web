<?php wp_nonce_field( 'bpp_format_video_nonce', 'blossom_pin_pro_format_video_nonce' ); ?>
<div id="blossom_pin_pro_box_for_post-format-video" class="blossom_pin_pro_format_field blossom_pin_pro_format_field_video" >
	<label for="bpp-format-video-embed"><?php esc_html_e( 'Video URL (oEmbed)', 'blossom-pin-pro' ); ?></label>
	<p><?php
		printf( esc_html__( 'Recommended to embed videos from %1$s Youtube %2$s  or %3$s Viemo %4$s ', 'blossom-pin-pro' ), '<a href="'. esc_url( 'https://youtube.com/' ) .'" target="_blank"><b>', '</b></a>', '<a href="'. esc_url( 'https://vimeo.com/' ) .'" target="_blank"><b>', '</b></a>' ); 
	?></p>
	<textarea name="_bpp_format_video_embed" id="bpp-format-video-embed" tabindex="1"><?php echo htmlspecialchars_decode( stripslashes( get_post_meta( get_the_id(), '_bpp_format_video_embed', true) ) ); ?></textarea>
</div>