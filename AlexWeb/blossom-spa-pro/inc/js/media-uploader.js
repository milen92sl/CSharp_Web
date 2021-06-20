jQuery(function($){
  'use strict';
    $('body').on('click','.blossom-upload-button',function(e) {
        e.preventDefault();
        var clicked = $(this).closest('div');
        var custom_uploader = wp.media({
            title: $(this).data('uploader-title'),
            button: {
                text: $(this).data('uploader-button-text'),
            },
            multiple: false 
            })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            clicked.find('.blossom-screenshot').empty().hide().append('<img src="' + attachment.sizes.medium.url + '"><a class="blossom-remove-image"></a>').slideDown('fast');                
            clicked.find('.blossom-upload').val(attachment.id).trigger('change');
            clicked.find('.blossom-upload-button').val(bcp_media_data.change);
        }) 
        .open();
    });

    $('body').on('click','.blossom-remove-image',function(e) {
        
        var selector = $(this).parent('div').parent('div');
        selector.find('.blossom-upload').val('').trigger('change');
        selector.find('.blossom-remove-image').hide();
        selector.find('.blossom-screenshot').slideUp();
        selector.find('.blossom-upload-button').val(bcp_media_data.upload);
        
        return false;
    });  
});