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

if( ! class_exists( 'Blossom_Feminine_Pro_Typography_Control' ) ) {
    
    class Blossom_Feminine_Pro_Typography_Control extends WP_Customize_Control {
    
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
    		$this->json['l10n']    = apply_filters( 'blossom-feminine-typography-control/il8n/strings', array(
    			'on'                 => esc_attr__( 'ON', 'blossom-feminine-pro' ),
    			'off'                => esc_attr__( 'OFF', 'blossom-feminine-pro' ),
    			'all'                => esc_attr__( 'All', 'blossom-feminine-pro' ),
    			'cyrillic'           => esc_attr__( 'Cyrillic', 'blossom-feminine-pro' ),
    			'cyrillic-ext'       => esc_attr__( 'Cyrillic Extended', 'blossom-feminine-pro' ),
    			'devanagari'         => esc_attr__( 'Devanagari', 'blossom-feminine-pro' ),
    			'greek'              => esc_attr__( 'Greek', 'blossom-feminine-pro' ),
    			'greek-ext'          => esc_attr__( 'Greek Extended', 'blossom-feminine-pro' ),
    			'khmer'              => esc_attr__( 'Khmer', 'blossom-feminine-pro' ),
    			'latin'              => esc_attr__( 'Latin', 'blossom-feminine-pro' ),
    			'latin-ext'          => esc_attr__( 'Latin Extended', 'blossom-feminine-pro' ),
    			'vietnamese'         => esc_attr__( 'Vietnamese', 'blossom-feminine-pro' ),
    			'hebrew'             => esc_attr__( 'Hebrew', 'blossom-feminine-pro' ),
    			'arabic'             => esc_attr__( 'Arabic', 'blossom-feminine-pro' ),
    			'bengali'            => esc_attr__( 'Bengali', 'blossom-feminine-pro' ),
    			'gujarati'           => esc_attr__( 'Gujarati', 'blossom-feminine-pro' ),
    			'tamil'              => esc_attr__( 'Tamil', 'blossom-feminine-pro' ),
    			'telugu'             => esc_attr__( 'Telugu', 'blossom-feminine-pro' ),
    			'thai'               => esc_attr__( 'Thai', 'blossom-feminine-pro' ),
    			'serif'              => _x( 'Serif', 'font style', 'blossom-feminine-pro' ),
    			'sans-serif'         => _x( 'Sans Serif', 'font style', 'blossom-feminine-pro' ),
    			'monospace'          => _x( 'Monospace', 'font style', 'blossom-feminine-pro' ),
    			'font-family'        => esc_attr__( 'Font Family', 'blossom-feminine-pro' ),
    			'font-size'          => esc_attr__( 'Font Size', 'blossom-feminine-pro' ),
    			'font-weight'        => esc_attr__( 'Font Weight', 'blossom-feminine-pro' ),
    			'line-height'        => esc_attr__( 'Line Height', 'blossom-feminine-pro' ),
    			'font-style'         => esc_attr__( 'Font Style', 'blossom-feminine-pro' ),
    			'letter-spacing'     => esc_attr__( 'Letter Spacing', 'blossom-feminine-pro' ),
    			'text-align'         => esc_attr__( 'Text Align', 'blossom-feminine-pro' ),
    			'text-transform'     => esc_attr__( 'Text Transform', 'blossom-feminine-pro' ),
    			'none'               => esc_attr__( 'None', 'blossom-feminine-pro' ),
    			'uppercase'          => esc_attr__( 'Uppercase', 'blossom-feminine-pro' ),
    			'lowercase'          => esc_attr__( 'Lowercase', 'blossom-feminine-pro' ),
    			'top'                => esc_attr__( 'Top', 'blossom-feminine-pro' ),
    			'bottom'             => esc_attr__( 'Bottom', 'blossom-feminine-pro' ),
    			'left'               => esc_attr__( 'Left', 'blossom-feminine-pro' ),
    			'right'              => esc_attr__( 'Right', 'blossom-feminine-pro' ),
    			'center'             => esc_attr__( 'Center', 'blossom-feminine-pro' ),
    			'justify'            => esc_attr__( 'Justify', 'blossom-feminine-pro' ),
    			'color'              => esc_attr__( 'Color', 'blossom-feminine-pro' ),
    			'select-font-family' => esc_attr__( 'Select a font-family', 'blossom-feminine-pro' ),
    			'variant'            => esc_attr__( 'Variant', 'blossom-feminine-pro' ),
    			'style'              => esc_attr__( 'Style', 'blossom-feminine-pro' ),
    			'size'               => esc_attr__( 'Size', 'blossom-feminine-pro' ),
    			'height'             => esc_attr__( 'Height', 'blossom-feminine-pro' ),
    			'spacing'            => esc_attr__( 'Spacing', 'blossom-feminine-pro' ),
    			'ultra-light'        => esc_attr__( 'Ultra-Light 100', 'blossom-feminine-pro' ),
    			'ultra-light-italic' => esc_attr__( 'Ultra-Light 100 Italic', 'blossom-feminine-pro' ),
    			'light'              => esc_attr__( 'Light 200', 'blossom-feminine-pro' ),
    			'light-italic'       => esc_attr__( 'Light 200 Italic', 'blossom-feminine-pro' ),
    			'book'               => esc_attr__( 'Book 300', 'blossom-feminine-pro' ),
    			'book-italic'        => esc_attr__( 'Book 300 Italic', 'blossom-feminine-pro' ),
    			'regular'            => esc_attr__( 'Normal 400', 'blossom-feminine-pro' ),
    			'italic'             => esc_attr__( 'Normal 400 Italic', 'blossom-feminine-pro' ),
    			'medium'             => esc_attr__( 'Medium 500', 'blossom-feminine-pro' ),
    			'medium-italic'      => esc_attr__( 'Medium 500 Italic', 'blossom-feminine-pro' ),
    			'semi-bold'          => esc_attr__( 'Semi-Bold 600', 'blossom-feminine-pro' ),
    			'semi-bold-italic'   => esc_attr__( 'Semi-Bold 600 Italic', 'blossom-feminine-pro' ),
    			'bold'               => esc_attr__( 'Bold 700', 'blossom-feminine-pro' ),
    			'bold-italic'        => esc_attr__( 'Bold 700 Italic', 'blossom-feminine-pro' ),
    			'extra-bold'         => esc_attr__( 'Extra-Bold 800', 'blossom-feminine-pro' ),
    			'extra-bold-italic'  => esc_attr__( 'Extra-Bold 800 Italic', 'blossom-feminine-pro' ),
    			'ultra-bold'         => esc_attr__( 'Ultra-Bold 900', 'blossom-feminine-pro' ),
    			'ultra-bold-italic'  => esc_attr__( 'Ultra-Bold 900 Italic', 'blossom-feminine-pro' ),
    			'invalid-value'      => esc_attr__( 'Invalid Value', 'blossom-feminine-pro' ),
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
    		wp_enqueue_style( 'blossom-feminine-typography', get_template_directory_uri() . '/inc/custom-controls/typography/typography.css', null );
            /*
    		 * JavaScript
    		 */
            wp_enqueue_script( 'jquery-ui-core' );
    		wp_enqueue_script( 'jquery-ui-tooltip' );
    		wp_enqueue_script( 'jquery-stepper-min-js' );
    		
    		// Selectize
    		wp_enqueue_script( 'selectize', get_template_directory_uri() . '/inc/js/selectize.js', array( 'jquery' ), false, true );
    
    		// Typography
    		wp_enqueue_script( 'blossom-feminine-typography', get_template_directory_uri() . '/inc/custom-controls/typography/typography.js', array(
    			'jquery',
    			'selectize'
    		), false, true );
    
    		$google_fonts   = Blossom_Feminine_Pro_Fonts::get_google_fonts();
    		$standard_fonts = Blossom_Feminine_Pro_Fonts::get_standard_fonts();
    		$all_variants   = Blossom_Feminine_Pro_Fonts::get_all_variants();
    
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
    		wp_localize_script( 'blossom-feminine-typography', 'blossom_all_fonts', $final );
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