jQuery(document).ready(function($){
    
    // script for pricing table widget
    $('body').on('click', '.bsp-items-add', function(e){
        e.preventDefault();        
        da = $(this).siblings('.bsp-sortable-items').attr('id');
        suffix = da.match(/\d+/);
        var len = $('.items-length:visible').length;
        len++;
        var newinput = $('.bsp-item-template').clone();
        newinput.html(function(i, oldHTML) {
            newinput.find( '.items-length' ).attr('name', 'widget-bsp_pt_widget['+suffix+'][items]['+len+']');
        });
        $(this).siblings('.bsp-sortable-items').find('.bsp-items-holder').before(newinput.html());
    });
    
    $('body').on('click', '.bsp-del-item', function() {
        var con = confirm( bsp_admin.are_you_sure );
        if (!con) {
            return false;
        }
        $(this).parent().parent().fadeOut('slow', function() {
            $(this).remove();
            $('ul.bsp-sortable-items input').trigger('change');
        });
    });

    //Sortable for social links
    $('.user-social-sortable-icons').sortable({
        cursor: "move"
    });
        
});