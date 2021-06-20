<?php wp_nonce_field( 'bpp_format_audio_nonce', 'blossom_pin_pro_format_audio_nonce' ); ?>
<div id="blossom_pin_pro_box_for_post-format-audio" class="blossom_pin_pro_format_field blossom_pin_pro_format_field_audio" >
	<label for="bpp-format-audio-embed"><?php esc_html_e( 'Audio URL (oEmbed)', 'blossom-pin-pro' ); ?></label>
	<p><?php
		printf( esc_html__( 'Recommended to embed audio from %1$s soundcloud %2$s.', 'blossom-pin-pro' ), '<a href="'. esc_url( 'https://soundcloud.com/' ) .'" target="_blank"><b>', '</b></a>' ); 
	?></p>
	<textarea name="_bpp_format_audio_embed" id="bpp-format-audio-embed" tabindex="1"><?php echo htmlspecialchars_decode( stripslashes( get_post_meta( get_the_id(), '_bpp_format_audio_embed', true) ) ); ?></textarea>
</div>