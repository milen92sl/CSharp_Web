<?php 
/**
* Metabox for Sidebar Layout
*
* @package Blossom_Fashion_Pro
*
*/ 

function blossom_fashion_pro_add_sidebar_layout_box(){
    $post_id   = isset( $_GET['post'] ) ? $_GET['post'] : '';
    $template  = get_post_meta( $post_id, '_wp_page_template', true );
    $templates = array( 'templates/blossom-portfolio.php' );
    
    if( ! in_array( $template, $templates ) ){
        add_meta_box( 
            'blossom_fashion_pro_sidebar_layout',
            __( 'Sidebar Layout', 'blossom-fashion-pro' ),
            'blossom_fashion_pro_sidebar_layout_callback', 
            'page',
            'normal',
            'high'
        );
    }
    
    //for post
    add_meta_box( 
        'blossom_fashion_pro_sidebar_layout',
        __( 'Sidebar Layout', 'blossom-fashion-pro' ),
        'blossom_fashion_pro_sidebar_layout_callback', 
        'post',
        'normal',
        'high'
    );
    
    add_meta_box( 
        'blossom_fashion_pro_affiliate_box',
        __( 'Affiliate Box', 'blossom-fashion-pro' ),
        'blossom_fashion_pro_affiliate_box_callback', 
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'blossom_fashion_pro_add_sidebar_layout_box' );

$blossom_fashion_pro_sidebar_layout = array(    
    'default-sidebar'=> array(
    	 'value'     => 'default-sidebar',
    	 'label'     => __( 'Default Sidebar', 'blossom-fashion-pro' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/default-sidebar.png'
   	),
    'left-sidebar' => array(
         'value'     => 'left-sidebar',
    	 'label'     => __( 'Left Sidebar', 'blossom-fashion-pro' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/left-sidebar.png'         
    ),
    'right-sidebar' => array(
         'value'     => 'right-sidebar',
    	 'label'     => __( 'Right Sidebar', 'blossom-fashion-pro' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'         
     )    
);

function blossom_fashion_pro_sidebar_layout_callback(){
    global $post , $blossom_fashion_pro_sidebar_layout;
    wp_nonce_field( basename( __FILE__ ), 'blossom_fashion_pro_nonce' );
    $sidebars = blossom_fashion_pro_get_dynamnic_sidebar( true, true, true );
    $sidebar  = get_post_meta( $post->ID, '_fashion_pro_sidebar', true );
?>
 
<table class="form-table">
    <tr>
        <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'blossom-fashion-pro' ); ?></em></td>
    </tr>

    <tr>
        <td>
        <?php  
            foreach( $blossom_fashion_pro_sidebar_layout as $field ){  
                $layout = get_post_meta( $post->ID, '_sidebar_layout', true ); ?>

            <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="blossom_fashion_pro_sidebar_layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $layout ); if( empty( $layout ) ){ checked( $field['value'], 'default-sidebar' ); }?>/>
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
        <td colspan="3"><em class="f13"><?php esc_html_e( 'Choose Sidebar', 'blossom-fashion-pro' ); ?></em></td>
    </tr>
    
    <tr>
        <td>
            <select name="blossom_fashion_pro_sidebar">
            <?php 
                foreach( $sidebars as $k => $v ){ ?>
                    <option value="<?php echo esc_attr( $k ); ?>" <?php selected( $sidebar, $k ); if( empty( $sidebar ) && $k == 'default-sidebar' ){ echo "selected='selected'";}?> ><?php echo esc_html( $v ); ?></option>
                <?php }
            ?>
            </select>
        </td>    
    </tr>
    
    <tr>
        <td><em class="f13"><?php printf( esc_html__( 'You can set up the sidebar content from %s', 'blossom-fashion-pro' ), '<a href="'. esc_url( admin_url( 'widgets.php' ) ) .'">here</a>' ); ?></em></td>
    </tr>
</table>
 
<?php 
}

function blossom_fashion_pro_save_sidebar_layout( $post_id ){
      global $blossom_fashion_pro_sidebar_layout , $post;

       // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'blossom_fashion_pro_nonce' ] ) || !wp_verify_nonce( $_POST[ 'blossom_fashion_pro_nonce' ], basename( __FILE__ ) ) )
        return;
    
 // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  
        return;

    if ( 'page' == $_POST['post_type'] ) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }

    // Make sure that it is set.
	if ( ! isset( $_POST['blossom_fashion_pro_sidebar'] ) ) {
		return;
	}
    
    foreach( $blossom_fashion_pro_sidebar_layout as $field ){  
        //Execute this saving function
        $old = get_post_meta( $post_id, '_sidebar_layout', true ); 
        $new = sanitize_text_field( $_POST['blossom_fashion_pro_sidebar_layout'] );
        if( $new && $new != $old ) {  
            update_post_meta( $post_id, '_sidebar_layout', $new );  
        }elseif( '' == $new && $old ) {  
            delete_post_meta( $post_id, '_sidebar_layout', $old );  
        } 
     } // end foreach
     
     // Sanitize user input.
	$sidebar = sanitize_text_field( $_POST['blossom_fashion_pro_sidebar'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_fashion_pro_sidebar', $sidebar );     
}
add_action( 'save_post' , 'blossom_fashion_pro_save_sidebar_layout' );

/**
 * Callback for Additional Info for Team
*/
function blossom_fashion_pro_affiliate_box_callback(){
    global $post;
    wp_nonce_field( basename( __FILE__ ), 'blossom_fashion_pro_affiliate_nonce' );
    
    $code = get_post_meta( $post->ID, '_fashion_pro_affiliate_code', true );
    ?>
        
    <div class="clearfix">
        <label class="bold-label float-left input_label" for="blossom_fashion_pro_affiliate_code"><?php _e( 'Affiliate Code :', 'blossom-fashion-pro' ); ?></label>
        <div class="below_row_input float-left">
            <pre>
            <textarea id="blossom_fashion_pro_affiliate_code" name="blossom_fashion_pro_affiliate_code"><?php echo htmlspecialchars_decode( stripslashes( $code ) ); ?></textarea>
            </pre>
        </div>
    </div>
    <?php
}

function blossom_fashion_pro_save_affiliate_code( $post_id ){
    // Check if our nonce is set.
	if ( ! isset( $_POST['blossom_fashion_pro_affiliate_nonce'] ) || ! wp_verify_nonce( $_POST['blossom_fashion_pro_affiliate_nonce'], basename( __FILE__ ) ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) return;		
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	}
    
    if ( ! isset( $_POST['blossom_fashion_pro_affiliate_code'] ) ) {
		return;
	}
    
    // Sanitize user input.
	$code = htmlspecialchars_decode( stripslashes( $_POST['blossom_fashion_pro_affiliate_code'] ) );
    
	// Update the meta field in the database.
	update_post_meta( $post_id, '_fashion_pro_affiliate_code', $code );
    
}
add_action( 'save_post', 'blossom_fashion_pro_save_affiliate_code' );

/**
 * User Profile Extra Fields
 */
function blossom_fashion_pro_user_fields( $user ) { 
    
    wp_nonce_field( basename( __FILE__ ), 'blossom_fashion_pro_user_fields_nonce' ); 
    
    if( is_string( $user ) === true ){
        $user = new stdClass();//create a new
        $id = -9999;
        unset( $user );
    }else{
        $id = $user->ID;
    }
    
    $defaults = apply_filters( 'blossom_fashion_pro_user_social_icons', array( 
        'facebook'     => '', 
        'twitter'      => '',
        'instagram'    => '',
        'snapchat'     => '',
        'pinterest'    => '',
        'linkedin'     => '',
        'google-plus'  => '',
        'youtube'      => ''
    ) );
    $social_icons = get_user_meta( $id, '_blossom_fashion_pro_user_social_icons', true );
    
    $social_icons = $social_icons ? $social_icons : $defaults; ?>
    
    <h3><?php esc_html_e( 'User Social Link', 'blossom-fashion-pro' ); ?></h3>
    
    <ul class="user-social-sortable-icons">    
        <?php foreach( $social_icons as $k => $v ){ ?>        
        <li>
            <label for="<?php echo esc_attr( $k ); ?>"><?php printf( esc_html__( '%s :', 'blossom-fashion-pro' ), ucfirst( $k ) ); ?></label>            
            <input type="text" name="blossom_fashion_pro_user_social_icons[<?php echo esc_attr( $k ); ?>]" id="<?php echo esc_attr( $k ); ?>" value="<?php echo isset( $v ) ? esc_attr( $v ) : ''; ?>" class="regular-text" /><br />
            <span class="description"><?php printf( esc_html__( 'Please enter your %s Url.', 'blossom-fashion-pro' ), ucfirst( $k ) ); ?></span>
        <?php } ?>                  
    </ul>
<?php 
}
/** Hooks to add extra field in profile */
add_action( 'show_user_profile', 'blossom_fashion_pro_user_fields' ); // editing your own profile
add_action( 'edit_user_profile', 'blossom_fashion_pro_user_fields' ); // editing another user
add_action( 'user_new_form', 'blossom_fashion_pro_user_fields' ); // creating a new user

/**
 * Saving Extra User Profile Information
*/ 
function blossom_fashion_pro_save_user_fields( $user_id ) {
    $socials = array();
    // Check if our nonce is set.
    if ( ! isset( $_POST['blossom_fashion_pro_user_fields_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['blossom_fashion_pro_user_fields_nonce'], basename( __FILE__ ) ) ) {
        return;
    }

    if ( !current_user_can( 'edit_user', $user_id ) ) return false;
    
    if( isset( $_POST['blossom_fashion_pro_user_social_icons'] ) ){
        foreach( $_POST['blossom_fashion_pro_user_social_icons'] as $key => $links ){
            $socials[$key] = esc_url_raw( $links );
        }
        update_user_meta( $user_id, '_blossom_fashion_pro_user_social_icons', $socials );
    }
}
/** Hook to Save Extra User Fields */
add_action( 'personal_options_update', 'blossom_fashion_pro_save_user_fields' );
add_action( 'edit_user_profile_update', 'blossom_fashion_pro_save_user_fields' );
add_action( 'user_register', 'blossom_fashion_pro_save_user_fields' );