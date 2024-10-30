<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       catchplugins.com
 * @since      1.0.0
 *
 * @package    Catch_Dark_Mode
 * @subpackage Catch_Dark_Mode/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Catch_Dark_Mode
 * @subpackage Catch_Dark_Mode/admin
 * @author     catchplugins.com <info@catchplugins.com>
 */
class Catch_Dark_Mode_Admin {


	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $CATCH_    The ID of this plugin.
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
	 * @param    string $catch_dark_mode    The name of this plugin.
	 * @param    string $version    The version of this plugin.
	 */
	public function __construct( $catch_dark_mode, $version, $class ) {
		$this->main            = $class;
		$this->catch_dark_mode = $catch_dark_mode;
		$this->version         = $version;
		$this->options         = $this->main->get_options();
	}

	/**
	 * Register the stylesheets for the admin area.
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
		wp_enqueue_style( $this->catch_dark_mode, plugin_dir_url( __FILE__ ) . 'css/style.css', array(), $this->version, 'all' );
		if ( isset( $_GET['page'] ) && 'catch-dark-mode' == $_GET['page'] ) {
			wp_enqueue_style( $this->catch_dark_mode . '-tabs', plugin_dir_url( __FILE__ ) . 'css/dashboard.css', array(), $this->version, 'all' );
		}
	}

	/**
	 * Register the JavaScript for the admin area.
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

		if ( isset( $_GET['page'] ) && 'catch-dark-mode' == $_GET['page'] ) {

			wp_enqueue_script( $this->catch_dark_mode . '-match-height', plugin_dir_url( __FILE__ ) . 'js/jquery.matchHeight.min.js', array( 'jquery' ), $this->version, false );

			wp_register_script( $this->catch_dark_mode, plugin_dir_url( __FILE__ ) . 'js/script.js', array( 'jquery', 'jquery-ui-tooltip' ), $this->version, false );

			// Escaping JS before localizing.
			$escaped_options = $this->escape_js( $this->options ) ;
			wp_localize_script( $this->catch_dark_mode, 'darkmodeOptions', $escaped_options );
			wp_enqueue_script( $this->catch_dark_mode );

			wp_enqueue_media();
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 * @param array $options Options.
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
	 * Dark Mode: action_links
	 * Dark Mode Settings Link function callback
	 *
	 * @param arrray $links Link url.
	 *
	 * @param arrray $file File name.
	 */
	public function action_links( $links, $file ) {
		if ( $file === $this->catch_dark_mode . '/' . $this->catch_dark_mode . '.php' ) {
			$settings_link = '<a href="' . esc_url( admin_url( 'admin.php?page=dark-mode' ) ) . '">' . esc_html__( 'Settings', 'catch-dark-mode' ) . '</a>';

			array_unshift( $links, $settings_link );
		}
		return $links;
	}

	/**
	 * Dark Mode: add_plugin_settings_menu
	 * add Dark Mode to menu
	 */
	public function add_plugin_settings_menu() {
		$icon = CATCH_DARK_MODE_URL . '/image/icon.svg';
		add_menu_page(
			esc_html__( 'Catch Dark Mode', 'catch-dark-mode-pro' ),
			esc_html__( 'Catch Dark Mode', 'catch-dark-mode-pro' ),
			'manage_options',
			'catch-dark-mode',
			array( $this, 'settings_page' ),
			$icon,
			'99.01564'
		);

		/*
		 add_submenu_page(
			'options-general.php',
			esc_html__( 'Catch Dark Mode', 'catch-dark-mode' ),
			esc_html__( 'Catch Dark Mode', 'catch-dark-mode' ),
			'manage_options',
			'catch-dark-mode',
			array( $this, 'settings_page' )
		); */
	}

	/**
	 * Dark Mode: catch_web_tools_settings_page
	 * Dark Mode Setting function
	 */
	public function settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.' ) );
		}

		require plugin_dir_path( __FILE__ ) . 'partials/display.php';
	}

	/**
	 * Dark Mode: register_settings
	 * Dark Mode Register Settings
	 */
	public function register_settings() {
		register_setting(
			'catch-dark-mode-group',
			'catch_dark_mode_options',
			array( $this, 'sanitize_callback' )
		);
	}

	/**
	 * Dark Mode: sanitize_callback
	 * Dark Mode Sanitization function callback
	 *
	 * @param array $input Input data for sanitization.
	 */
	public function sanitize_callback( $input ) {
		if ( ( isset( $input['reset'] ) && $input['reset'] ) ) {
			// If reset, restore defaults
			return $this->main->default_options();
		}

		// Verify the nonce before proceeding.
		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			|| ( ! isset( $_POST['catch_dark_mode_nonce'] )
				|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['catch_dark_mode_nonce'] ) ), CATCH_DARK_MODE_BASENAME ) )
			|| ( ! check_admin_referer( CATCH_DARK_MODE_BASENAME, 'catch_dark_mode_nonce' ) )
		) {
			if ( null !== $input ) {

				if ( isset( $input['preset'] ) ) {
					$input['preset'] = sanitize_key( $input['preset'] );
				}
				$input['enable_default']  = ( isset( $input['enable_default'] ) && '1' === $input['enable_default'] ) ? '1' : '0';
				$input['floating_switch'] = ( isset( $input['floating_switch'] ) && '1' === $input['floating_switch'] ) ? '1' : '0';
				$input['os_aware']        = ( isset( $input['os_aware'] ) && '1' === $input['os_aware'] ) ? '1' : '0';

				if ( isset( $input['switch_style'] ) ) {
					$input['switch_style'] = sanitize_key( $input['switch_style'] );
				}
				if ( isset( $input['switch_position'] ) ) {
					$input['switch_position'] = sanitize_key( $input['switch_position'] );
				}
			}

			return $input;
		} // End if().
		return 'Invalid Nonce';
	}

	/**
	 * Dark Mode: add_plugin_meta_links
	 * Dark Mode Sanitization function callback
	 *
	 * @param array  $meta_fields Meta fileds.
	 * @param string $file file name.
	 */
	public function add_plugin_meta_links( $meta_fields, $file ) {
		if ( CATCH_DARK_MODE_BASENAME === $file ) {
			$meta_fields[] = "<a href='https://catchplugins.com/support-forum/forum/dark-mode/' target='_blank'>Support Forum</a>";
			$meta_fields[] = "<a href='https://wordpress.org/support/plugin/dark-mode/reviews#new-post' target='_blank' title='Rate'>
			        <i class='ct-rate-stars'>"
				. "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
				. "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
				. "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
				. "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
				. "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
				. '</i></a>';

			$stars_color = '#ffb900';

			echo '<style>'
				. '.ct-rate-stars{display:inline-block;color:' . esc_html( $stars_color ) . ';position:relative;top:3px;}'
				. '.ct-rate-stars svg{fill:' . esc_html( $stars_color ) . ';}'
				. '.ct-rate-stars svg:hover{fill:' . esc_html( $stars_color ) . '}'
				. '.ct-rate-stars svg:hover ~ svg{fill:none;}'
				. '</style>';
		}

		return $meta_fields;
	}
}
