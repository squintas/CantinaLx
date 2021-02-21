<?php
/**
 * Skyrocket Customizer Custom Controls
 *
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Simple Notice Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */
	class Skyrocket_Simple_Notice_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'simple_notice';

		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$allowed_html = array(
				'a'      => array(
					'href'   => array(),
					'title'  => array(),
					'class'  => array(),
					'target' => array(),
				),
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
				'i'      => array(
					'class' => array()
				),
				'span'   => array(
					'class' => array(),
				),
				'code'   => array(),
			);
			?>
            <div class="simple-notice-custom-control">
				<?php if ( ! empty( $this->label ) ) { ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if ( ! empty( $this->description ) ) { ?>
                    <span class="customize-control-description"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>
				<?php } ?>
            </div>
			<?php
		}
	}

	/**
	 * Slider Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */
	class Skyrocket_Slider_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'slider_control';

		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'skyrocket-custom-controls-js', trailingslashit( get_template_directory_uri() ) . 'js/customizer.js', array(
				'jquery',
				'jquery-ui-core'
			), gloriafood_get_version(), true );
			wp_enqueue_style( 'skyrocket-custom-controls-css', trailingslashit( get_template_directory_uri() ) . 'css/customizer.css', array(), gloriafood_get_version(), 'all' );
		}

		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
            <div class="slider-custom-control">
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><input type="number"
                                                                                                           id="<?php echo esc_attr( $this->id ); ?>"
                                                                                                           name="<?php echo esc_attr( $this->id ); ?>"
                                                                                                           value="<?php echo esc_attr( $this->value() ); ?>"
                                                                                                           class="customize-control-slider-value" <?php $this->link(); ?> />
                <div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>"
                     slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>"
                     slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div>
                <span class="slider-reset dashicons dashicons-image-rotate"
                      slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
            </div>
			<?php
		}
	}

	/**
	 * Toggle Switch Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */
	class Skyrocket_Toggle_Switch_Custom_control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'toogle_switch';

		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_style( 'skyrocket-custom-controls-css', trailingslashit( get_template_directory_uri() ) . 'css/customizer.css', array(), gloriafood_get_version(), 'all' );
		}

		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
            <div class="toggle-switch-control">
                <div class="toggle-switch">
                    <input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>"
                           name="<?php echo esc_attr( $this->id ); ?>" class="toggle-switch-checkbox"
                           value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link();
					checked( $this->value() ); ?>>
                    <label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
                        <span class="toggle-switch-inner"></span>
                        <span class="toggle-switch-switch"></span>
                    </label>
                </div>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if ( ! empty( $this->description ) ) { ?>
                    <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
            </div>
			<?php
		}
	}

	/**
	 * Switch sanitization
	 *
	 * @param  string        Switch value
	 *
	 * @return integer    Sanitized value
	 */
	if ( ! function_exists( 'skyrocket_switch_sanitization' ) ) {
		function skyrocket_switch_sanitization( $input ) {
			if ( true === $input ) {
				return 1;
			} else {
				return 0;
			}
		}
	}

	/**
	 * Integer sanitization
	 *
	 * @param  string        Input value to check
	 *
	 * @return integer    Returned integer value
	 */
	if ( ! function_exists( 'skyrocket_sanitize_integer' ) ) {
		function skyrocket_sanitize_integer( $input ) {
			return (int) $input;
		}
	}

	/**
	 * Text sanitization
	 *
	 * @param  string    Input to be sanitized (either a string containing a single string or multiple, separated by commas)
	 *
	 * @return string    Sanitized input
	 */
	if ( ! function_exists( 'skyrocket_text_sanitization' ) ) {
		function skyrocket_text_sanitization( $input ) {
			if ( strpos( $input, ',' ) !== false ) {
				$input = explode( ',', $input );
			}
			if ( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[ $key ] = sanitize_text_field( $value );
				}
				$input = implode( ',', $input );
			} else {
				$input = sanitize_text_field( $input );
			}

			return $input;
		}
	}
}