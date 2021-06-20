<?php
/**
 * Pricing Table Widget
 *
 * @package Blossom_Spa_Pro
 */

// register Blossom_Spa_Pro_Pricing_Table_Widget widget
function blossom_spa_pro_register_pricing_table_widget(){
    register_widget( 'Blossom_Spa_Pro_Pricing_Table_Widget' );
}
add_action('widgets_init', 'blossom_spa_pro_register_pricing_table_widget');
 
 /**
 * Adds Blossom_Spa_Pro_Pricing_Table_Widget widget.
 */
class Blossom_Spa_Pro_Pricing_Table_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        add_action( 'admin_print_footer_scripts', array( $this, 'item_template' ) );
        parent::__construct(
			'bsp_pt_widget', // Base ID
			__( 'Blossom: Pricing Table', 'blossom-spa-pro' ), // Name
			array( 
                'class' => 'bsp_pt_widget our-pricing',
                'description' => __( 'A Pricing Table Widget.', 'blossom-spa-pro' ),
            ) // Args
		);
    }

    /**
    * Items template.
    */
    function item_template(){ ?>        
        <div class="bsp-item-template">
            <li class="bsp-items-wrap">
                <p>
                    <input class="items-length" name="<?php echo esc_attr( $this->get_field_name( 'items[{{indexed}}]' ) ); ?>" type="text" value="" />
                    <span class="bsp-del-item dashicons-no" style="font-family: 'dashicons'"></span>
                </p>
            </li>
        </div>
    <?php
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ){
        //Checked for customizer view.
        $plan_type = ! empty( $instance['plan_type'] ) ? $instance['plan_type'] : 'basic';
        $title     = ! empty( $instance['title'] ) ? $instance['title'] : ''; 
        $currency  = ! empty( $instance['currency'] ) ? $instance['currency'] : ''; //left blank...no use of default
        $price     = ! empty( $instance['price'] ) ? $instance['price'] : '';  //left blank...no use of default
        $time      = ! empty( $instance['time'] ) ? $instance['time'] : ''; //left blank...no use of default
        $label     = ! empty( $instance['label'] ) ? $instance['label'] : '';
        $link      = ! empty( $instance['link'] ) ? $instance['link'] : '';
        $image     = ! empty( $instance['image'] ) ? $instance['image'] : '';

        echo $args['before_widget']; 
        
        $class = ( $plan_type == 'popular' ) ? ' featured' : ''; ?>
        
        <div class="pricing-tbl-block<?php echo esc_attr( $class ); ?>">
            <?php 
                if( $title || $currency || $price || $time ){
                    echo '<div class="pricing-tbl-header">';
                        if( 'popular' == $plan_type ) echo '<span class="pricing-tbl-tag"><span>' . esc_html__( 'Best Package', 'blossom-spa-pro' ) . '</span></span>';
						if( $title ) echo '<h3 class="title">'. esc_html( $title ) .'</h3>'; 
						if( $currency || $price || $time ){
                            echo '<div class="price-wrap">';
							if( $currency ) echo '<sup>' . esc_html( $currency ) . '</sup>';
                            $explode_price = explode( '.', $price );
                            if( array_key_exists ( 1, $explode_price ) ) :
                                echo '<span class="pricing-tbl-amt">' . esc_html( $explode_price[0] ) . '<sup>.' . esc_html( $explode_price[1] ) . '</sup></span>';
                            else:
                                echo '<span class="pricing-tbl-amt">' . esc_html( $explode_price[0] ) . '<sup>.00</sup></span>';
                            endif;
                            if( $time ) echo '<span class="pricing-tbl-type">/' . esc_html( $time ) . '</span>';
                            echo '</div>';
                        }
                    echo '</div>';
                }

                if( $image ) { 
                    $image_array = wp_get_attachment_image_src( $image, 'blossom-spa-pricing' ); ?>
                    <div class="pricing-tbl-img">
                        <span class="upper-overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 390 50.086"><defs><style>.upa,.upb{fill:#fff;}.upa{opacity:0.35;}</style></defs><g transform="translate(389 51.332) rotate(180)"><path class="upa" d="M-1,13.052c90.709-33.325,146.978,21,232.448,38.9H-1Z" transform="translate(0 -0.623)"/><path class="upb" d="M-1,24.6c17.56,16.25,55.007,26.728,92.407,26.728,63.593,0,88.138-11.205,132.619-26.728S323.078-5.712,389,4.765V51.332H-1Z" transform="translate(0 0)"/></g></svg>
                        </span>
                        <img src="<?php echo esc_url( $image_array[0] ); ?>" alt="">
                        <span class="lower-overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 390 50.086"><defs><style>.loa,.lob{fill:#fff;}.loa{opacity:0.35;}</style></defs><g transform="translate(1 -1.247)"><path class="loa" d="M-1,13.052c90.709-33.325,146.978,21,232.448,38.9H-1Z" transform="translate(0 -0.623)"/><path class="lob" d="M-1,24.6c17.56,16.25,55.007,26.728,92.407,26.728,63.593,0,88.138-11.205,132.619-26.728S323.078-5.712,389,4.765V51.332H-1Z" transform="translate(0 0)"/></g></svg>
                        </span>
                    </div>
                <?php }

                if( isset( $instance['items'] ) && ! empty( $instance['items'] ) ){ 
                    echo '<div class="pricing-tbl-feature"><ul>';
                        $items    = $instance['items'];
                        $arr_keys = array_keys( $items );
                        foreach( $items as $key => $value ){ 
                            if ( array_key_exists( $key, $instance['items'] ) ){ ?>
                                <li><?php echo wp_kses_post( $instance['items'][$key] ); ?></li>
                            <?php
                            }
                        }
                    echo '</ul></div>';
                } 

                if( ! empty( $link ) && ! empty( $label ) ){
                    echo '<div class="btn-wrap"><a href="' . esc_url( $link ) . '" class="btn-readmore">'. esc_html( $label ) .'</a></div>';
                }
            ?>
        </div>
        <?php            
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ){
        $default = array( 
            'plan_type' => 'basic', 
            'title'     => '', 
            'currency'  => '$', 
            'price'     => 275, 
            'time'      => 'mo', 
            'link'      => '',
            'label'     => '',
            'image'     => ''
        );
        $instance = wp_parse_args( (array) $instance, $default );
        
        $plan_type = $instance['plan_type'];
        $title     = $instance['title'];
        $currency  = $instance['currency'];
        $price     = $instance['price'];
        $time      = $instance['time'];
        $link      = $instance['link'];
        $label     = $instance['label'];
        $image     = $instance['image'];
        ?>

		<p class="pt-block">   
            <label for="<?php echo esc_attr( $this->get_field_id( 'plan_type' ) ); ?>"><?php esc_html_e( 'Plan Type', 'blossom-spa-pro' ); ?></label> 
            <select name="<?php echo $this->get_field_name('plan_type'); ?>" id="<?php echo $this->get_field_id('plan_type'); ?>" class="widefat">
                <?php
                    $types = array (
                        'basic'   => __( 'Basic Plan', 'blossom-spa-pro' ),
                        'popular' => __( 'Popular Plan', 'blossom-spa-pro' ),
                    );

                    foreach ( $types as $key => $option) {
                    echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $plan_type, $key, false ) . ' >' . esc_html( $option ) .'</option>';
                    }
                ?>
            </select>
        </p>

        <p class="pt-block">
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'blossom-spa-pro' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />            
		</p>
        
        <p class="pt-block">
            <label for="<?php echo esc_attr( $this->get_field_id( 'currency' ) ); ?>"><?php esc_html_e( 'Currency', 'blossom-spa-pro' ); ?></label>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'currency' ) ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'currency' ) ); ?>" value="<?php print $currency; ?>">
        </p>

        <p class="pt-block">
            <label for="<?php echo esc_attr( $this->get_field_id( 'price' ) ); ?>"><?php esc_html_e( 'Price', 'blossom-spa-pro' ); ?></label>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'price' ) ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'price' ) ); ?>" value="<?php print $price; ?>">
        </p>

        <p class="pt-block">
            <label for="<?php echo esc_attr( $this->get_field_id( 'time' ) ); ?>"><?php esc_html_e( 'Per value', 'blossom-spa-pro' ); ?></label>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'time' ) ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'time' ) ); ?>" value="<?php print $time; ?>">
        </p>

        <?php blossom_spa_pro_get_image_field( $this->get_field_id( 'image' ), $this->get_field_name( 'image' ), $image, __( 'Upload Image', 'blossom-spa-pro' ) ); ?>
        
        <script type='text/javascript'>
        jQuery(document).ready(function($) {
            $('.bsp-sortable-items').sortable({
                cursor: 'move',
                update: function (event, ui) {
                    $('ul.bsp-sortable-items input').trigger('change');
                }
            });
        });
        </script>

        <ul class="bsp-sortable-items pricing-list" id="<?php echo esc_attr( $this->get_field_id( 'blossom-spa-pro-items' ) ); ?>">
            <?php
            if(isset($instance['items'])){
                $items    = $instance['items'];
                $arr_keys = array_keys( $items );
                if( isset( $arr_keys ) ){
                    foreach( $arr_keys as $key => $value ){ 
                        if( array_key_exists( $value, $instance['items'] ) ){ ?>
                            <li class="bsp-items-wrap">
                                <p>
                                    <input class="items-length" name="<?php echo esc_attr( $this->get_field_name( 'items['.$value.']' ) ) ?>" type="text" value="<?php echo esc_attr( $instance['items'][$value] );?>" />
                                    <span class="bsp-del-item dashicons-no" style="font-family: 'dashicons'"></span>
                                </p>
                            </li>
                        <?php
                        }
                    }
                }
            }
            ?>
            <div class="bsp-items-holder"></div>
        </ul>
        <input class="bsp-items-add button-secondary" type="button" value="<?php _e( 'Add Item', 'blossom-spa-pro' );?>"><br><br>
        <span class="widget-note"><?php _e( 'Click the above button to add items. You can sort them as well.', 'blossom-spa-pro' );?></span>
        
        <p class="pt-block">
            <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Featured Link', 'blossom-spa-pro' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_url( $link ); ?>" />            
        </p>

        <p class="pt-block">
            <label for="<?php echo esc_attr( $this->get_field_id( 'label' ) ); ?>"><?php esc_html_e( 'Label', 'blossom-spa-pro' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'label' ) ); ?>" type="text" value="<?php echo esc_attr( $label ); ?>" />            
        </p>

        <?php
	}
    
    /**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
        $instance['plan_type'] = sanitize_key( $new_instance['plan_type'] );
        $instance['title']     = sanitize_text_field( $new_instance['title'] );
        $instance['currency']  = sanitize_text_field( $new_instance['currency'] );
        $instance['price']     = wp_kses_post( $new_instance['price'] );
        $instance['time']      = sanitize_text_field( $new_instance['time'] );
        $instance['link']      = sanitize_text_field( $new_instance['link'] );
        $instance['label']     = sanitize_text_field( $new_instance['label'] );
        $instance['image']     = absint( $new_instance['image'] );

        if( isset( $new_instance['items'] ) && ! empty( $new_instance['items'] ) ){
            $arr_keys  = array_keys( $new_instance['items'] );
                    
            foreach( $arr_keys as $key => $value ){ 
                if( array_key_exists( $value, $new_instance['items'] ) ){ 
                    $instance['items'][$value] =  $new_instance['items'][$value];
                }
            }
        }
        
        return $instance;
	}
    
}  // class Blossom_Spa_Pro_Pricing_Table_Widget


/**
 * Retrieves the image field.
 *  
 * @link https://pippinsplugins.com/retrieve-attachment-id-from-image-url/
 */
function blossom_spa_pro_get_image_field( $id, $name, $image, $label ){
    $output = '';
    $output .= '<div class="widget-upload">';
    $output .= '<label for="' . esc_attr( $id ) . '">' . esc_html( $label ) . '</label><br/>';
    if ( filter_var( $image, FILTER_VALIDATE_URL ) === false ) {
      $image = str_replace('http://','',$image);
    }
    if ( !filter_var( $image, FILTER_VALIDATE_URL ) === false ) {
        $image = wp_get_attachment_image_src( $image );
    }
    $output .= '<input id="' . esc_attr( $id ) . '" class="blossom-upload" type="hidden" name="' . esc_attr( $name ) . '" value="' . esc_attr( $image ) . '" placeholder="' . __( 'No file chosen', 'blossom-spa-pro' ) . '" />' . "\n";
    if ( function_exists( 'wp_enqueue_media' ) ) {
        if ( $image == '' ) {
            $output .= '<input id="upload-' . esc_attr( $id ) . '" class="blossom-upload-button button" type="button" value="' . __( 'Upload', 'blossom-spa-pro' ) . '" />' . "\n";
        } else {
            $output .= '<input id="upload-' . esc_attr( $id ) . '" class="blossom-upload-button button" type="button" value="' . __( 'Change', 'blossom-spa-pro' ) . '" />' . "\n";
        }
    } else {
        $output .= '<p><i>' . __( 'Upgrade your version of WordPress for full media support.', 'blossom-spa-pro' ) . '</i></p>';
    }

    $output .= '<div class="blossom-screenshot" id="' . esc_attr( $id ) . '-image">' . "\n";

    if ( $image != '' ) {
        $remove = '<a class="blossom-remove-image">' . __( 'Remove Image','blossom-spa-pro' ) . '</a>';
        $attachment_id = $image;
        $attachment_id = str_replace('http://','',$attachment_id);
        if ( !filter_var( $image, FILTER_VALIDATE_URL ) === false ) {
            $attachment_id = wp_get_attachment_image_src( $attachment_id );
        }
        $image_array = wp_get_attachment_image_src( $attachment_id, 'full');
        $image = preg_match('/(^.*\.jpg|jpeg|png|gif|ico*)/i', $image_array[0]);
        if ( $image ) {
            $output .= '<img src="' . esc_url( $image_array[0] ) . '" alt="" />' . $remove;
        } else {
            // Standard generic output if it's not an image.
            $output .= '<small>' . __( 'Please upload valid image file.', 'blossom-spa-pro' ) . '</small>';
        }     
    }
    $output .= '</div></div>' . "\n";
    
    echo $output;
}