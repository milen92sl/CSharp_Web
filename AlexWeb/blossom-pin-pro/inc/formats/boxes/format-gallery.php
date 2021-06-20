<?php 
    wp_nonce_field( 'bpp_format_gallery_nonce', 'blossom_pin_pro_format_gallery_nonce' );
    $ids   = get_post_meta( $post->ID, '_bpp_format_custom_gallery', true );
?>

<div id="blossom_pin_pro_box_for_post_format_gallery" class="blossom_pin_pro_format_field blossom_pin_pro_format_field_gallery" >

    <label><span><?php esc_html_e( 'Gallery Images', 'blossom-pin-pro' ); ?></span></label>
      <table class='form-table'>
        <tr>
            <td>
                <a class='img-gallery-add button' href='javascript:void(0);' data-uploader-title='<?php esc_attr_e( 'Add image(s) to gallery', 'blossom-pin-pro' );?>' data-uploader-button-text='<?php esc_attr_e( 'Add image(s)', 'blossom-pin-pro' ); ?>'><?php esc_html_e( 'Add image(s)', 'blossom-pin-pro' ); ?></a>
                <ul id='img-gallery-metabox-list'>
                <?php
                if( $ids ){ 
                    foreach( $ids as $key => $value ){ 
                        $image = wp_get_attachment_image_src( $value ); ?>
                        <li>
                            <input type='hidden' name='_bpp_format_custom_gallery[<?php echo $key; ?>]' value='<?php echo esc_attr( $value ); ?>'>
                            <img class='image-preview' src='<?php echo esc_url( $image[0] ); ?>'>
                            <a class='change-image button button-small' href='#' data-uploader-title='Change image' data-uploader-button-text='Change image'><?php esc_html_e( 'Change image','blossom-pin-pro' );?></a><br>
                            <small><a class='remove-image' href='#'><?php esc_html_e( 'Remove image','blossom-pin-pro' );?></a></small>
                        </li>
                    <?php 
                    }
                } 
                ?>
                </ul>
            </td>
        </tr>
    </table>
</div>
