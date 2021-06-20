<?php 
    wp_nonce_field( 'bpp_format_custom_image_nonce', 'blossom_pin_pro_format_custom_image_nonce' );
	$img_id   = get_post_meta( $post->ID, '_bpp_format_custom_image', true );
?>

<div id="blossom_pin_pro_box_for_post_format_image" class="blossom_pin_pro_format_field blossom_pin_pro_format_field_image" >

	<label><span><?php esc_html_e( 'Featured image with custom link', 'blossom-pin-pro' ); ?></span></label>
    <?php $image = wp_get_attachment_image_src( $img_id ); ?>
    <span id="custom-img-metabox">
        <input type='hidden' class="custom-attachment-id" name='_bpp_format_custom_image' value='<?php echo esc_attr( $img_id ); ?>'>
        <img class='image-preview' src='<?php echo esc_url( $image[0] ); ?>'>
        <a class='change-image button button-small' href='#' data-uploader-title='Change image' data-uploader-button-text='Change image'><?php esc_html_e( 'Change image', 'blossom-pin-pro' )?></a><br>
        <small><a class='remove-image button button-small' href='#'><?php esc_html_e( 'Remove image','blossom-pin-pro' );?></a></small>
        <a class='featured-image-add button' href='javascript:void(0);' data-uploader-title='<?php esc_attr_e( 'Add featured Image', 'blossom-pin-pro' );?>' data-uploader-button-text='<?php esc_attr_e( 'Add image', 'blossom-pin-pro' ); ?>'><?php esc_html_e( 'Add image', 'blossom-pin-pro' ); ?></a>
    </span>
    <br>    
</div>