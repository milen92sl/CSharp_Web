<?php  wp_nonce_field( 'bpp_format_quote_nonce', 'blossom_pin_pro_format_quote_nonce' ); ?>
<div id="blossom_pin_pro_box_for_post_format_quote" class="blossom_pin_pro_format_field blossom_pin_pro_format_field_quote" >
	<div class="cf-elm-block">
		<label for="bpp-format-quote-source-name"><?php esc_html_e( 'Quote Author Name', 'blossom-pin-pro' ); ?></label>
		<input type="text" name="_bpp_format_quote_source_name" value="<?php echo esc_attr(get_post_meta(get_the_id(), '_bpp_format_quote_source_name', true)); ?>" id="bpp-format-quote-source-name" tabindex="1" />
	</div>
	<div class="cf-elm-block">
		<label for="bpp-format-quote-source-content"><?php esc_html_e( 'Quote Content', 'blossom-pin-pro' ); ?></label>
		<textarea name="_bpp_format_quote_source_content" id="bpp-format-quote-source-content" tabindex="1"><?php echo esc_textarea(get_post_meta(get_the_id(), '_bpp_format_quote_source_content', true)); ?></textarea>
	</div>
</div>