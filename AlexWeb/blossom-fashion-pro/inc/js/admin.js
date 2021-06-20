jQuery(document).ready(function($){
    var post_type = bfp_admin.post_type;
       
    function check_page_templates(){
        $('.inside #page_template').each(function(i,e){
            console.log($(this).val());
            if( $(this).val() === "contact.php" ){
                $('#blossom_fashion_pro_sidebar_layout').hide('fast');
            }else{
                $('#blossom_fashion_pro_sidebar_layout').show();
            }
        });
    }
    
    if( post_type == 'page' ){
        $('.inside #page_template').on( 'change', check_page_templates );
        check_page_templates();
    }else{
        $('#blossom_fashion_pro_sidebar_layout').show();
    }
   
});