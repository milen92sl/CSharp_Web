<?php
/**
 * Customizer Typography Control
 *
 * Taken from Kirki.
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Blossom_Fashion_Pro_Typography_Control' ) ) {
    
    class Blossom_Fashion_Pro_Typography_Control extends WP_Customize_Control {
    
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
    		$this->json['l10n']    = apply_filters( 'blossom-fashion-typography-control/il8n/strings', array(
    			'on'                 => esc_attr__( 'ON', 'blossom-fashion-pro' ),
    			'off'                => esc_attr__( 'OFF', 'blossom-fashion-pro' ),
    			'all'                => esc_attr__( 'All', 'blossom-fashion-pro' ),
    			'cyrillic'           => esc_attr__( 'Cyrillic', 'blossom-fashion-pro' ),
    			'cyrillic-ext'       => esc_attr__( 'Cyrillic Extended', 'blossom-fashion-pro' ),
    			'devanagari'         => esc_attr__( 'Devanagari', 'blossom-fashion-pro' ),
    			'greek'              => esc_attr__( 'Greek', 'blossom-fashion-pro' ),
    			'greek-ext'          => esc_attr__( 'Greek Extended', 'blossom-fashion-pro' ),
    			'khmer'              => esc_attr__( 'Khmer', 'blossom-fashion-pro' ),
    			'latin'              => esc_attr__( 'Latin', 'blossom-fashion-pro' ),
    			'latin-ext'          => esc_attr__( 'Latin Extended', 'blossom-fashion-pro' ),
    			'vietnamese'         => esc_attr__( 'Vietnamese', 'blossom-fashion-pro' ),
    			'hebrew'             => esc_attr__( 'Hebrew', 'blossom-fashion-pro' ),
    			'arabic'             => esc_attr__( 'Arabic', 'blossom-fashion-pro' ),
    			'bengali'            => esc_attr__( 'Bengali', 'blossom-fashion-pro' ),
    			'gujarati'           => esc_attr__( 'Gujarati', 'blossom-fashion-pro' ),
    			'tamil'              => esc_attr__( 'Tamil', 'blossom-fashion-pro' ),
    			'telugu'             => esc_attr__( 'Telugu', 'blossom-fashion-pro' ),
    			'thai'               => esc_attr__( 'Thai', 'blossom-fashion-pro' ),
    			'serif'              => _x( 'Serif', 'font style', 'blossom-fashion-pro' ),
    			'sans-serif'         => _x( 'Sans Serif', 'font style', 'blossom-fashion-pro' ),
    			'monospace'          => _x( 'Monospace', 'font style', 'blossom-fashion-pro' ),
    			'font-family'        => esc_attr__( 'Font Family', 'blossom-fashion-pro' ),
    			'font-size'          => esc_attr__( 'Font Size', 'blossom-fashion-pro' ),
    			'font-weight'        => esc_attr__( 'Font Weight', 'blossom-fashion-pro' ),
    			'line-height'        => esc_attr__( 'Line Height', 'blossom-fashion-pro' ),
    			'font-style'         => esc_attr__( 'Font Style', 'blossom-fashion-pro' ),
    			'letter-spacing'     => esc_attr__( 'Letter Spacing', 'blossom-fashion-pro' ),
    			'text-align'         => esc_attr__( 'Text Align', 'blossom-fashion-pro' ),
    			'text-transform'     => esc_attr__( 'Text Transform', 'blossom-fashion-pro' ),
    			'none'               => esc_attr__( 'None', 'blossom-fashion-pro' ),
    			'uppercase'          => esc_attr__( 'Uppercase', 'blossom-fashion-pro' ),
    			'lowercase'          => esc_attr__( 'Lowercase', 'blossom-fashion-pro' ),
    			'top'                => esc_attr__( 'Top', 'blossom-fashion-pro' ),
    			'bottom'             => esc_attr__( 'Bottom', 'blossom-fashion-pro' ),
    			'left'               => esc_attr__( 'Left', 'blossom-fashion-pro' ),
    			'right'              => esc_attr__( 'Right', 'blossom-fashion-pro' ),
    			'center'             => esc_attr__( 'Center', 'blossom-fashion-pro' ),
    			'justify'            => esc_attr__( 'Justify', 'blossom-fashion-pro' ),
    			'color'              => esc_attr__( 'Color', 'blossom-fashion-pro' ),
    			'select-font-family' => esc_attr__( 'Select a font-family', 'blossom-fashion-pro' ),
    			'variant'            => esc_attr__( 'Variant', 'blossom-fashion-pro' ),
    			'style'              => esc_attr__( 'Style', 'blossom-fashion-pro' ),
    			'size'               => esc_attr__( 'Size', 'blossom-fashion-pro' ),
    			'height'             => esc_attr__( 'Height', 'blossom-fashion-pro' ),
    			'spacing'            => esc_attr__( 'Spacing', 'blossom-fashion-pro' ),
    			'ultra-light'        => esc_attr__( 'Ultra-Light 100', 'blossom-fashion-pro' ),
    			'ultra-light-italic' => esc_attr__( 'Ultra-Light 100 Italic', 'blossom-fashion-pro' ),
    			'light'              => esc_attr__( 'Light 200', 'blossom-fashion-pro' ),
    			'light-italic'       => esc_attr__( 'Light 200 Italic', 'blossom-fashion-pro' ),
    			'book'               => esc_attr__( 'Book 300', 'blossom-fashion-pro' ),
    			'book-italic'        => esc_attr__( 'Book 300 Italic', 'blossom-fashion-pro' ),
    			'regular'            => esc_attr__( 'Normal 400', 'blossom-fashion-pro' ),
    			'italic'             => esc_attr__( 'Normal 400 Italic', 'blossom-fashion-pro' ),
    			'medium'             => esc_attr__( 'Medium 500', 'blossom-fashion-pro' ),
    			'medium-italic'      => esc_attr__( 'Medium 500 Italic', 'blossom-fashion-pro' ),
    			'semi-bold'          => esc_attr__( 'Semi-Bold 600', 'blossom-fashion-pro' ),
    			'semi-bold-italic'   => esc_attr__( 'Semi-Bold 600 Italic', 'blossom-fashion-pro' ),
    			'bold'               => esc_attr__( 'Bold 700', 'blossom-fashion-pro' ),
    			'bold-italic'        => esc_attr__( 'Bold 700 Italic', 'blossom-fashion-pro' ),
    			'extra-bold'         => esc_attr__( 'Extra-Bold 800', 'blossom-fashion-pro' ),
    			'extra-bold-italic'  => esc_attr__( 'Extra-Bold 800 Italic', 'blossom-fashion-pro' ),
    			'ultra-bold'         => esc_attr__( 'Ultra-Bold 900', 'blossom-fashion-pro' ),
    			'ultra-bold-italic'  => esc_attr__( 'Ultra-Bold 900 Italic', 'blossom-fashion-pro' ),
    			'invalid-value'      => esc_attr__( 'Invalid Value', 'blossom-fashion-pro' ),
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
    		wp_enqueue_style( 'typography', get_template_directory_uri() . '/inc/custom-controls/typography/typography.css', null );
            /*
    		 * JavaScript
    		 */
            wp_enqueue_script( 'jquery-ui-core' );
    		wp_enqueue_script( 'jquery-ui-tooltip' );
    		wp_enqueue_script( 'jquery-stepper-min-js' );
    		
    		// Selectize
    		wp_enqueue_script( 'selectize', get_template_directory_uri() . '/inc/js/selectize.js', array( 'jquery' ), false, true );
    
    		// Typography
    		wp_enqueue_script( 'typography', get_template_directory_uri() . '/inc/custom-controls/typography/typography.js', array(
    			'jquery',
    			'selectize'
    		), false, true );
    
    		$google_fonts   = Blossom_Fashion_Pro_Fonts::get_google_fonts();
    		$standard_fonts = Blossom_Fashion_Pro_Fonts::get_standard_fonts();
    		$all_variants   = Blossom_Fashion_Pro_Fonts::get_all_variants();
    
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
    		wp_localize_script( 'typography', 'all_fonts', $final );
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
    	protected function content_template() { ?>
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
                        <select id="rara-typography-font-family-{{{ data.id }}}" placeholder="{{ data.l10n['select-font-family'] }}"></select>
                    </div>
                    <div class="variant rara-variant-wrapper">
                        <h5>{{ data.l10n['style'] }}</h5>
                        <select class="variant" id="rara-typography-variant-{{{ data.id }}}"></select>
                    </div>
                <# } #>   
                
            </div>
            <?php
    	}
    
    }
}