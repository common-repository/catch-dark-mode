<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       catchplugins.com
 * @since      1.0.0
 *
 * @package    Catch_Dark_Mode
 * @subpackage Catch_Dark_Mode/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Catch_Dark_Mode
 * @subpackage Catch_Dark_Mode/public
 * @author     catchplugins.com <info@catchplugins.com>
 */
class Catch_Dark_Mode_Public {


	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $CATCH_DARK_MODE    The ID of this plugin.
	 */
	private $CATCH_DARK_MODE;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $CATCH_DARK_MODE       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $catch_dark_mode, $version, $class ) {
		$this->main            = $class;
		$this->catch_dark_mode = $catch_dark_mode;
		$this->version         = $version;
		$this->options         = $this->main->get_options();
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Catch_Dark_Mode_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Catch_Dark_Mode_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->catch_dark_mode, plugin_dir_url( __FILE__ ) . 'css/style.css', array( 'dashicons' ), $this->version, 'all' );
		$options = $this->options;
		if ( isset( $options['theme'] ) && null !== $options['theme'] ) {
			wp_enqueue_style( 'dark-theme', $options['theme'], array(), $this->version, 'all' );
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Catch_Dark_Mode_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Catch_Dark_Mode_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_register_script( $this->catch_dark_mode, plugin_dir_url( __FILE__ ) . 'js/script.js', array( 'jquery' ), $this->version, false );

		// Escaping JS before localizing.
		$escaped_options = $this->escape_js( $this->options );

		wp_localize_script( $this->catch_dark_mode, 'darkmodeOptions', $escaped_options );
		wp_enqueue_script( $this->catch_dark_mode );
	}

	/**
	 * Escape JS
	 *
	 * @param [type] $options
	 * @return void
	 */
	public function escape_js( $options ) {
		$escaped_options = array();
		foreach ( $options as $key => $option ) {
			if ( is_array( $option ) ) {
				$escaped_options[ $key ] = $this->escape_js( $option );
			} else {
				$escaped_options[ $key ] = esc_js( $option );
			}
		}

		return $escaped_options;
	}

	/**
	 * Dynamic CSS Enqueue
	 *
	 * @return void
	 */
	public function dynamic_css_enqueue() {
		wp_enqueue_style(
			'dynamic-css',
			admin_url( 'admin-ajax.php' ) . '?action=dynamic_css',
			array(),
			false,
			'all'
		);
	}

	/**
	 * Dynamic CSS
	 *
	 * @return void
	 */
	public function dynaminc_css() {
		require CATCH_DARK_MODE_PATH . '/includes/dynamic.css.php';
		exit;
	}

	/**
	 * Render Button
	 *
	 * @return void
	 */
	public function render_button() {
		$option = $this->options;
		echo do_shortcode( '[catch_dark_mode floating="yes" style="' . $option['switch_style'] . '"]' );

	}

	/**
	 * Add Dark Mode Class to HTML
	 *
	 * @param [type] $output
	 * @param [type] $doctype
	 * @return void
	 */
	public function add_dark_mode_class_to_html( $output, $doctype ) {
		if ( 'html' !== $doctype ) {
			return $output;
		}

		$output .= ' class="darkMode"';

		return $output;
	}

}
