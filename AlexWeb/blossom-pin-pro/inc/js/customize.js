jQuery(document).ready(function($){    
    $('#sub-accordion-section-header_layout_settings').on( 'click', '.header_layout_two_note', function(e){
        e.preventDefault();
        wp.customize.control( 'header_bg_image' ).focus();        
    });

    $('#sub-accordion-section-child_support_settings').on( 'click', '.h-layout', function(e){
       e.preventDefault();
       wp.customize.control( 'header_layout' ).focus();        
    });        
    
    $('#sub-accordion-section-child_support_settings').on( 'click', '.s-layout', function(e){
       e.preventDefault();
       wp.customize.control( 'slider_layout' ).focus();        
    });
    
    $('#sub-accordion-section-child_support_settings').on( 'click', '.ho-layout', function(e){
       e.preventDefault();
       wp.customize.control( 'home_layout' ).focus();        
    });                    
});