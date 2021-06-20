<?php 
/**
* Metabox for Sidebar Layout
*
* @package Blossom_Feminine_Pro
*
*/ 

function blossom_feminine_pro_add_sidebar_layout_box(){
    $post_id   = isset( $_GET['post'] ) ? $_GET['post'] : '';
    $template  = get_post_meta( $post_id, '_wp_page_template', true );
    $templates = array( 'templates/blossom-portfolio.php' );
    
    if( ! in_array( $template, $templates ) ){
        add_meta_box( 
            'blossom_feminine_pro_sidebar_layout',
            __( 'Sidebar Layout', 'blossom-feminine-pro' ),
            'blossom_feminine_pro_sidebar_layout_callback', 
            'page',
            'normal',
            'high'
        );
    }
    
    //for post
    add_meta_box( 
        'blossom_feminine_pro_sidebar_layout',
        __( 'Sidebar Layout', 'blossom-feminine-pro' ),
        'blossom_feminine_pro_sidebar_layout_callback', 
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'blossom_feminine_pro_add_sidebar_layout_box' );

$blossom_feminine_pro_sidebar_layout = array(    
    'default-sidebar'=> array(
    	 'value'     => 'default-sidebar',
    	 'label'     => __( 'Default Sidebar', 'blossom-feminine-pro' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/default-sidebar.png'
   	),
    'left-sidebar' => array(
         'value'     => 'left-sidebar',
    	 'label'     => __( 'Left Sidebar', 'blossom-feminine-pro' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/left-sidebar.png'         
    ),
    'right-sidebar' => array(
         'value'     => 'right-sidebar',
    	 'label'     => __( 'Right Sidebar', 'blossom-feminine-pro' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'         
     )    
);

function blossom_feminine_pro_sidebar_layout_callback(){
    global $post , $blossom_feminine_pro_sidebar_layout;
    wp_nonce_field( basename( __FILE__ ), 'blossom_feminine_pro_nonce' );
    $sidebars = blossom_feminine_pro_get_dynamnic_sidebar( true, true, true );
    $sidebar  = get_post_meta( $post->ID, '_bfp_sidebar', true );
?>
 
<table class="form-table">
    <tr>
        <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'blossom-feminine-pro' ); ?></em></td>
    </tr>

    <tr>
        <td>
        <?php  
            foreach( $blossom_feminine_pro_sidebar_layout as $field ){  
                $layout = get_post_meta( $post->ID, '_sidebar_layout', true ); ?>

            <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="blossom_feminine_pro_sidebar_layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $layout ); if( empty( $layout ) ){ checked( $field['value'], 'default-sidebar' ); }?>/>
                <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                    <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" />                    
                </label>
            </div>
            <?php } // end foreach 
            ?>
            <div class="clear"></div>
        </td>
    </tr>
    
    <tr>
        <td colspan="3"><em class="f13"><?php esc_html_e( 'Choose Sidebar', 'blossom-feminine-pro' ); ?></em></td>
    </tr>
    
    <tr>
        <td>
            <select name="blossom_feminine_pro_sidebar">
            <?php 
                foreach( $sidebars as $k => $v ){ ?>
                    <option value="<?php echo esc_attr( $k ); ?>" <?php selected( $sidebar, $k ); if( empty( $sidebar ) && $k == 'default-sidebar' ){ echo "selected='selected'";}?> ><?php echo esc_html( $v ); ?></option>
                <?php }
            ?>
            </select>
        </td>    
    </tr>
    
    <tr>
        <td><em class="f13"><?php printf( esc_html__( 'You can set up the sidebar content from %s', 'blossom-feminine-pro' ), '<a href="'. esc_url( admin_url( 'widgets.php' ) ) .'">here</a>' ); ?></em></td>
    </tr>
    
</table>
 
<?php 
}

function blossom_feminine_pro_save_sidebar_layout( $post_id ){
      global $blossom_feminine_pro_sidebar_layout , $post;

       // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'blossom_feminine_pro_nonce' ] ) || !wp_verify_nonce( $_POST[ 'blossom_feminine_pro_nonce' ], basename( __FILE__ ) ) )
        return;
    
 // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;

    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }

    // Make sure that it is set.
	if ( ! isset( $_POST['blossom_feminine_pro_sidebar'] ) ) {
		return;
	}
    
    foreach( $blossom_feminine_pro_sidebar_layout as $field ){  
        //Execute this saving function
        $old = get_post_meta( $post_id, '_sidebar_layout', true ); 
        $new = sanitize_text_field( $_POST['blossom_feminine_pro_sidebar_layout'] );
        if( $new && $new != $old ) {  
            update_post_meta( $post_id, '_sidebar_layout', $new );  
        }elseif( '' == $new && $old ) {  
            delete_post_meta( $post_id, '_sidebar_layout', $old );  
        } 
     } // end foreach   
     
     // Sanitize user input.
	$sidebar = sanitize_text_field( $_POST['blossom_feminine_pro_sidebar'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_bfp_sidebar', $sidebar ); 
}
add_action( 'save_post' , 'blossom_feminine_pro_save_sidebar_layout' );