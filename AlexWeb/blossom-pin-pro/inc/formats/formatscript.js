jQuery( document ).ready(function($) {

    if($('.custom-attachment-id').val() != '' )
    {
        $('#custom-img-metabox a.change-image').show();
        $('#custom-img-metabox .remove-image').show();
        $('#custom-img-metabox a.featured-image-add').fadeOut();
    }
    // else{
    //     $('#custom-img-metabox a.change-image').fadeOut();
    //     $('#custom-img-metabox .remove-image').show();
    //     $('#custom-img-metabox a.featured-image-add').fadeOut();
    // }
    
    
    $('#custom-img-metabox .remove-image').click(function(e){
        e.preventDefault();
        $('.image-preview').attr('src','');
        $('.custom-attachment-id').attr('value','');
        $('#custom-img-metabox a.change-image').hide();
        $('#custom-img-metabox .remove-image').hide();
        $('#custom-img-metabox a.featured-image-add').fadeIn();
    })
    $( "input[name='post_format']" ).each(function() {
        if($(this).is(':checked') )
        {
            if( $(this).attr('id') == 'post-format-0' )
            {
                $('#blossom_pin_pro_post_format_metabox').fadeOut();
            }
        }
        else{
            $('#blossom_pin_pro_post_format_metabox').show();
        }
    });
    $("input[name='post_format']").click(function(){
        if( $(this).attr('id') == 'post-format-0' )
        {
            $('#blossom_pin_pro_post_format_metabox').fadeOut('500');
        }
        else{
            $('#blossom_pin_pro_post_format_metabox').fadeIn('500');
        }
    });

    jQuery('#post-formats-select input').each(function() {
        if(jQuery(this).is(':checked')) {
            boxClass = '.blossom_pin_pro_format_field_' + jQuery(this).attr('value');
            jQuery(boxClass).show();
        }
    });

    jQuery('#post-formats-select input').on('change', function() {
        jQuery('.blossom_pin_pro_format_field').hide();
    	boxClass = '.blossom_pin_pro_format_field_' + jQuery(this).attr('value');
    	jQuery(boxClass).show();
    });

});

jQuery(function($) {

  var file_frame;

  $(document).on('click', '#blossom_pin_pro_box_for_post_format_gallery a.img-gallery-add', function(e) {

    e.preventDefault();

    if (file_frame) file_frame.close();

    file_frame = wp.media.frames.file_frame = wp.media({
      title: $(this).data('uploader-title'),
      button: {
        text: $(this).data('uploader-button-text'),
      },
      multiple: true
    });

    file_frame.on('select', function() {
      var listIndex = $('#img-gallery-metabox-list li').index($('#img-gallery-metabox-list li:last')),
          selection = file_frame.state().get('selection');

      selection.map(function(attachment, i) {
        attachment = attachment.toJSON(),
        console.log( attachment );
        index      = listIndex + (i + 1);

        $('#img-gallery-metabox-list').append('<li><input type="hidden" name="_bpp_format_custom_gallery[' + index + ']" value="' + attachment.id + '"><img class="image-preview" src="' + attachment.sizes.thumbnail.url + '"><a class="change-image button button-small" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image">Change image</a><br><small><a class="remove-image" href="#">Remove image</a></small></li>');
      });
    });

    makeSortable();
    
    file_frame.open();

  });

  $(document).on('click', '#blossom_pin_pro_box_for_post_format_gallery a.change-image', function(e) {

    e.preventDefault();

    var that = $(this);

    if (file_frame) file_frame.close();

    file_frame = wp.media.frames.file_frame = wp.media({
      title: $(this).data('uploader-title'),
      button: {
        text: $(this).data('uploader-button-text'),
      },
      multiple: false
    });

    file_frame.on( 'select', function() {
      attachment = file_frame.state().get('selection').first().toJSON();

      that.parent().find('input:hidden').attr('value', attachment.id);
      that.parent().find('img.image-preview').attr('src', attachment.sizes.thumbnail.url);
    });

    file_frame.open();

  });

  function resetIndex() {
    $('#img-gallery-metabox-list li').each(function(i) {
      $(this).find('input:hidden').attr('name', '_bpp_format_custom_gallery[' + i + ']');
    });
  }

  function makeSortable() {
    $('#img-gallery-metabox-list').sortable({
      opacity: 0.6,
      stop: function() {
        resetIndex();
      }
    });
  }

  $(document).on('click', '#blossom_pin_pro_box_for_post_format_gallery a.remove-image', function(e) {
    e.preventDefault();

    $(this).parents('li').animate({ opacity: 0 }, 200, function() {
      $(this).remove();
      resetIndex();
    });
  });

  makeSortable();
  
   $(document).on('click', '#blossom_pin_pro_box_for_post_format_image a.featured-image-add', function(e) {

    e.preventDefault();

    if (file_frame) file_frame.close();

    file_frame = wp.media.frames.file_frame = wp.media({
      title: $(this).data('uploader-title'),
      button: {
        text: $(this).data('uploader-button-text'),
      },
      multiple: false
    });

    file_frame.on('select', function() {
        selection = file_frame.state().get('selection');
      selection.map(function(attachment, i) {
        attachment = attachment.toJSON(),
        $('.image-preview').attr('src',attachment.url);
        $('.custom-attachment-id').attr('value',attachment.id);
        $('#custom-img-metabox a.change-image').show();
        $('#custom-img-metabox .remove-image').show();
        $('#custom-img-metabox a.featured-image-add').fadeOut();
      });
    });

    makeSortable();
    
    file_frame.open();

  });

   $(document).on('click', '#custom-img-metabox a.change-image', function(e) {

    e.preventDefault();

    if (file_frame) file_frame.close();

    file_frame = wp.media.frames.file_frame = wp.media({
      title: $(this).data('uploader-title'),
      button: {
        text: $(this).data('uploader-button-text'),
      },
      multiple: false
    });

    file_frame.on('select', function() {
        selection = file_frame.state().get('selection');
      selection.map(function(attachment, i) {
        attachment = attachment.toJSON(),
        $('.image-preview').attr('src',attachment.url);
        $('.custom-attachment-id').attr('value',attachment.id);
        $('#custom-img-metabox a.change-image').show();
        $('#custom-img-metabox .remove-image').show();
        $('#custom-img-metabox a.featured-image-add').fadeOut();
      });
    });

    makeSortable();
    
    file_frame.open();

  });


});