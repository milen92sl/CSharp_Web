jQuery(document).ready(function($){
    
    //Sortable for Team social links
    $('.user-social-sortable-icons').sortable({
        cursor: "move"
    });   
        
});

jQuery(document).ready(function($){
    //Scroll to section
    $('body').on('click', '#post-formats-select', function() {
        
        $("html, body").animate({
        scrollTop: $( "#postbox-container-2" ).offset().top
        }, 1000);
    });       
});