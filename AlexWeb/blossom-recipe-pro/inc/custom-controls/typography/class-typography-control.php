<?php
/**
 * Blossom Recipe Pro Customizer Typography Control
 *
 * @package Blossom_Recipe_Pro
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Blossom_Recipe_Pro_Typography_Control' ) ) {
    
    class Blossom_Recipe_Pro_Typography_Control extends WP_Customize_Control {
    
    	public $tooltip = '';
    	public $js_vars = array();
    	public $output = array();
    	public $option_type = 'theme_mod';
    	public $type = 'typography';
    
    	/**
    	 * Refresh the parameters passed to the JavaScript via JSON.
    	 *
    	 * @access public
    	 * @return void
    	 */
    	public function to_json() {
    		parent::to_json();
    
    		if ( isset( $this->default ) ) {
    			$this->json['default'] = $this->default;
    		} else {
    			$this->json['default'] = $this->setting->default;
    		}
    		$this->json['js_vars'] = $this->js_vars;
    		$this->json['output']  = $this->output;
    		$this->json['value']   = $this->value();
    		$this->json['choices'] = $this->choices;
    		$this->json['link']    = $this->get_link();
    		$this->json['tooltip'] = $this->tooltip;
    		$this->json['id']      = $this->id;
    		$this->json['l10n']    = apply_filters( 'blossom_recipe_pro_il8n_strings', array(
    			'on'                 => esc_attr__( 'ON', 'blossom-recipe-pro' ),
    			'off'                => esc_attr__( 'OFF', 'blossom-recipe-pro' ),
    			'all'                => esc_attr__( 'All', 'blossom-recipe-pro' ),
    			'cyrillic'           => esc_attr__( 'Cyrillic', 'blossom-recipe-pro' ),
    			'cyrillic-ext'       => esc_attr__( 'Cyrillic Extended', 'blossom-recipe-pro' ),
    			'devanagari'         => esc_attr__( 'Devanagari', 'blossom-recipe-pro' ),
    			'greek'              => esc_attr__( 'Greek', 'blossom-recipe-pro' ),
    			'greek-ext'          => esc_attr__( 'Greek Extended', 'blossom-recipe-pro' ),
    			'khmer'              => esc_attr__( 'Khmer', 'blossom-recipe-pro' ),
    			'latin'              => esc_attr__( 'Latin', 'blossom-recipe-pro' ),
    			'latin-ext'          => esc_attr__( 'Latin Extended', 'blossom-recipe-pro' ),
    			'vietnamese'         => esc_attr__( 'Vietnamese', 'blossom-recipe-pro' ),
    			'hebrew'             => esc_attr__( 'Hebrew', 'blossom-recipe-pro' ),
    			'arabic'             => esc_attr__( 'Arabic', 'blossom-recipe-pro' ),
    			'bengali'            => esc_attr__( 'Bengali', 'blossom-recipe-pro' ),
    			'gujarati'           => esc_attr__( 'Gujarati', 'blossom-recipe-pro' ),
    			'tamil'              => esc_attr__( 'Tamil', 'blossom-recipe-pro' ),
    			'telugu'             => esc_attr__( 'Telugu', 'blossom-recipe-pro' ),
    			'thai'               => esc_attr__( 'Thai', 'blossom-recipe-pro' ),
    			'serif'              => _x( 'Serif', 'font style', 'blossom-recipe-pro' ),
    			'sans-serif'         => _x( 'Sans Serif', 'font style', 'blossom-recipe-pro' ),
    			'monospace'          => _x( 'Monospace', 'font style', 'blossom-recipe-pro' ),
    			'font-family'        => esc_attr__( 'Font Family', 'blossom-recipe-pro' ),
    			'font-size'          => esc_attr__( 'Font Size', 'blossom-recipe-pro' ),
    			'font-weight'        => esc_attr__( 'Font Weight', 'blossom-recipe-pro' ),
    			'line-height'        => esc_attr__( 'Line Height', 'blossom-recipe-pro' ),
    			'font-style'         => esc_attr__( 'Font Style', 'blossom-recipe-pro' ),
    			'letter-spacing'     => esc_attr__( 'Letter Spacing', 'blossom-recipe-pro' ),
    			'text-align'         => esc_attr__( 'Text Align', 'blossom-recipe-pro' ),
    			'text-transform'     => esc_attr__( 'Text Transform', 'blossom-recipe-pro' ),
    			'none'               => esc_attr__( 'None', 'blossom-recipe-pro' ),
    			'uppercase'          => esc_attr__( 'Uppercase', 'blossom-recipe-pro' ),
    			'lowercase'          => esc_attr__( 'Lowercase', 'blossom-recipe-pro' ),
    			'top'                => esc_attr__( 'Top', 'blossom-recipe-pro' ),
    			'bottom'             => esc_attr__( 'Bottom', 'blossom-recipe-pro' ),
    			'left'               => esc_attr__( 'Left', 'blossom-recipe-pro' ),
    			'right'              => esc_attr__( 'Right', 'blossom-recipe-pro' ),
    			'center'             => esc_attr__( 'Center', 'blossom-recipe-pro' ),
    			'justify'            => esc_attr__( 'Justify', 'blossom-recipe-pro' ),
    			'color'              => esc_attr__( 'Color', 'blossom-recipe-pro' ),
    			'select-font-family' => esc_attr__( 'Select a font-family', 'blossom-recipe-pro' ),
    			'variant'            => esc_attr__( 'Variant', 'blossom-recipe-pro' ),
    			'style'              => esc_attr__( 'Style', 'blossom-recipe-pro' ),
    			'size'               => esc_attr__( 'Size', 'blossom-recipe-pro' ),
    			'height'             => esc_attr__( 'Height', 'blossom-recipe-pro' ),
    			'spacing'            => esc_attr__( 'Spacing', 'blossom-recipe-pro' ),
    			'ultra-light'        => esc_attr__( 'Ultra-Light 100', 'blossom-recipe-pro' ),
    			'ultra-light-italic' => esc_attr__( 'Ultra-Light 100 Italic', 'blossom-recipe-pro' ),
    			'light'              => esc_attr__( 'Light 200', 'blossom-recipe-pro' ),
    			'light-italic'       => esc_attr__( 'Light 200 Italic', 'blossom-recipe-pro' ),
    			'book'               => esc_attr__( 'Book 300', 'blossom-recipe-pro' ),
    			'book-italic'        => esc_attr__( 'Book 300 Italic', 'blossom-recipe-pro' ),
    			'regular'            => esc_attr__( 'Normal 400', 'blossom-recipe-pro' ),
    			'italic'             => esc_attr__( 'Normal 400 Italic', 'blossom-recipe-pro' ),
    			'medium'             => esc_attr__( 'Medium 500', 'blossom-recipe-pro' ),
    			'medium-italic'      => esc_attr__( 'Medium 500 Italic', 'blossom-recipe-pro' ),
    			'semi-bold'          => esc_attr__( 'Semi-Bold 600', 'blossom-recipe-pro' ),
    			'semi-bold-italic'   => esc_attr__( 'Semi-Bold 600 Italic', 'blossom-recipe-pro' ),
    			'bold'               => esc_attr__( 'Bold 700', 'blossom-recipe-pro' ),
    			'bold-italic'        => esc_attr__( 'Bold 700 Italic', 'blossom-recipe-pro' ),
    			'extra-bold'         => esc_attr__( 'Extra-Bold 800', 'blossom-recipe-pro' ),
    			'extra-bold-italic'  => esc_attr__( 'Extra-Bold 800 Italic', 'blossom-recipe-pro' ),
    			'ultra-bold'         => esc_attr__( 'Ultra-Bold 900', 'blossom-recipe-pro' ),
    			'ultra-bold-italic'  => esc_attr__( 'Ultra-Bold 900 Italic', 'blossom-recipe-pro' ),
    			'invalid-value'      => esc_attr__( 'Invalid Value', 'blossom-recipe-pro' ),
    		) );
    
    		$defaults = array( 'font-family'=> false );
    
    		$this->json['default'] = wp_parse_args( $this->json['default'], $defaults );
    	}
    
    	/**
    	 * Enqueue scripts and styles.
    	 *
    	 * @access public
    	 * @return void
    	 */
    	public function enqueue() {
    		wp_enqueue_style( 'blossom-recipe-pro-typography', get_template_directory_uri() . '/inc/custom-controls/typography/typography.css', null );
            
            wp_enqueue_script( 'jquery-ui-core' );
    		wp_enqueue_script( 'jquery-ui-tooltip' );
    		wp_enqueue_script( 'jquery-stepper-min-js' );
    		wp_enqueue_script( 'blossom-recipe-pro-selectize', get_template_directory_uri() . '/inc/js/selectize.js', array( 'jquery' ), false, true );
    		wp_enqueue_script( 'blossom-recipe-pro-typography', get_template_directory_uri() . '/inc/custom-controls/typography/typography.js', array( 'jquery', 'blossom-recipe-pro-selectize' ), false, true );
    
    		$google_fonts   = Blossom_Recipe_Pro_Fonts::get_google_fonts();
    		$standard_fonts = Blossom_Recipe_Pro_Fonts::get_standard_fonts();
    		$all_variants   = Blossom_Recipe_Pro_Fonts::get_all_variants();
    
    		$standard_fonts_final = array();
    		foreach ( $standard_fonts as $key => $value ) {
    			$standard_fonts_final[] = array(
    				'family'      => $value['stack'],
    				'label'       => $value['label'],
    				'is_standard' => true,
    				'variants'    => array(
    					array(
    						'id'    => 'regular',
    						'label' => $all_variants['regular'],
    					),
    					array(
    						'id'    => 'italic',
    						'label' => $all_variants['italic'],
    					),
    					array(
    						'id'    => '700',
    						'label' => $all_variants['700'],
    					),
    					array(
    						'id'    => '700italic',
    						'label' => $all_variants['700italic'],
    					),
    				),
    			);
    		}
    
    		$google_fonts_final = array();
    
    		if ( is_array( $google_fonts ) ) {
    			foreach ( $google_fonts as $family => $args ) {
    				$label    = ( isset( $args['label'] ) ) ? $args['label'] : $family;
    				$variants = ( isset( $args['variants'] ) ) ? $args['variants'] : array( 'regular', '700' );
    
    				$available_variants = array();
    				foreach ( $variants as $variant ) {
    					if ( array_key_exists( $variant, $all_variants ) ) {
    						$available_variants[] = array( 'id' => $variant, 'label' => $all_variants[ $variant ] );
    					}
    				}
    
    				$google_fonts_final[] = array(
    					'family'   => $family,
    					'label'    => $label,
    					'variants' => $available_variants
    				);
    			}
    		}
    
    		$final = array_merge( $standard_fonts_final, $google_fonts_final );
    		wp_localize_script( 'blossom-recipe-pro-typography', 'all_fonts', $final );
    	}
    
    	/**
    	 * An Underscore (JS) template for this control's content (but not its container).
    	 *
    	 * Class variables for this control class are available in the `data` JS object;
    	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
    	 *
    	 * I put this in a separate file because PhpStorm didn't like it and it fucked with my formatting.
    	 *
    	 * @see    WP_Customize_Control::print_template()
    	 *
    	 * @access protected
    	 * @return void
    	 */
    	protected function content_template(){ ?>
    		<# if ( data.tooltip ) { #>
                <a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
            <# } #>
            
            <label class="customizer-text">
                <# if ( data.label ) { #>
                    <span class="customize-control-title">{{{ data.label }}}</span>
                <# } #>
                <# if ( data.description ) { #>
                    <span class="description customize-control-description">{{{ data.description }}}</span>
                <# } #>
            </label>
            
            <div class="wrapper">
                <# if ( data.default['font-family'] ) { #>
                    <# if ( '' == data.value['font-family'] ) { data.value['font-family'] = data.default['font-family']; } #>
                    <# if ( data.choices['fonts'] ) { data.fonts = data.choices['fonts']; } #>
                    <div class="font-family">
                        <h5>{{ data.l10n['font-family'] }}</h5>
                        <select id="blossom-recipe-pro-typography-font-family-{{{ data.id }}}" placeholder="{{ data.l10n['select-font-family'] }}"></select>
                    </div>
                    <div class="variant blossom-recipe-pro-variant-wrapper">
                        <h5>{{ data.l10n['style'] }}</h5>
                        <select class="variant" id="blossom-recipe-pro-typography-variant-{{{ data.id }}}"></select>
                    </div>
                <# } #>   
                
            </div>
            <?php
    	}    
    }
}