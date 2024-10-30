<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              catchplugins.com
 * @since             1.0.0
 * @package           Catch_Dark_Mode
 *
 * @WordPress-plugin
 * Plugin Name:       Catch Dark Mode
 * Plugin URI:        catchplugins.com/plugins/catch-dark-mode
 * Description:       Activate the dark version of your site with Catch Dark Mode Pro! A Premium Dark Mode WordPress plugin with fully customizable features and visually aesthetic schemes that allows you to enable the dark mode option on your WordPress site for your visitors.
 * Version:           1.2.1
 * Author:            Catch Plugins
 * Author URI:        catchplugins.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       catch-dark-mode
 * Tags:              dark, dark-mode, theme, color
 * Domain Path:       /languages
 */

// If this file is called directly, abort.

// Block direct access to the main plugin file.
defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

if ( ! class_exists( 'Catch_Dark_Mode_Main' ) ) {
	/**
	 * Catch Dark Mode class
	 */
	final class Catch_Dark_Mode_Main {


		/**
		 * A reference to an instance of this class.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    object
		 */
		private static $instance = null;


		/**
		 * Minimum PHP version required
		 *
		 * @var string
		 */
		private static $min_php = '5.6.0';

		/**
		 * Sets up needed actions/filters for the plugin to initialize.
		 *
		 * @return void
		 * @since  1.0.0
		 * @access public
		 */
		public function __construct() {
			if ( $this->check_environment() ) {
				$this->set_plugin_constants();
				$this->do_hooks();
				$this->load_files();
			}

		}

		/**
		 * Do Hooks
		 * put all the hooks necessary, here
		 *
		 * @return void
		 */
		public function do_hooks() {
			add_action( 'admin_init', array( $this, 'set_plugin_version_constant' ) );
			register_activation_hook( __FILE__, array( $this, 'activate' ) );
			register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
			add_shortcode( 'catch_dark_mode', array( $this, 'render_switch' ) );
		}


		/**
		 * Function catch_dark_mode_activate
		 *
		 * @return void
		 */
		public function activate() {
			$required = 'catch-dark-mode-pro/plugin.php';
			if ( is_plugin_active( $required ) ) {
				$message = esc_html__( 'Sorry, Pro plugin is already active. No need to activate Free version. %1$s&laquo; Return to Plugins%2$s.', 'catch-dark-mode' );
				$message = sprintf( $message, '<br><a href="' . esc_url( admin_url( 'plugins.php' ) ) . '">', '</a>' );
				wp_die( $message );
			}
			require_once CATCH_DARK_MODE_INCLUDES . '/class-activator.php';
			Catch_Dark_Mode_Activator::activate();
		}

		/**
		 * The code that runs during plugin deactivation.
		 * This action is documented in includes/class-deactivator.php
		 */
		public function deactivate() {
			require_once CATCH_DARK_MODE_INCLUDES . '/class-deactivator.php';
			Catch_Dark_Mode_Deactivator::deactivate();
		}

		/**
		 * Ensure theme and server variable compatibility
		 *
		 * @return boolean
		 * @since  1.0.0
		 * @access private
		 */
		private function check_environment() {
			$return = true;

			/** Check the PHP version compatibility */
			if ( version_compare( PHP_VERSION, self::$min_php, '<=' ) ) {
				$return = false;

				$notice = sprintf( esc_html__( 'Unsupported PHP version Min required PHP Version: "%s"', 'catch-dark-mode-pro' ), self::$min_php );
			}

			/** Add notice and deactivate the plugin if the environment is not compatible */
			if ( ! $return ) {
				add_action(
					'admin_notices',
					function () use ( $notice ) { ?>
					<div class="notice is-dismissible notice-error">
						<p><?php echo esc_html( $notice ); ?></p>
					</div>
						<?php
					}
				);

				return $return;
			} else {
				return $return;
			}
		}

		/**
		 * Include required core files used in admin and on the frontend.
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function load_files() {
			// core includes.
			include_once CATCH_DARK_MODE_INCLUDES . '/class-dark-mode.php';
		}

		/**
		 * Set plugin constants.
		 *
		 * Path/URL to root of this plugin, with trailing slash and plugin version.
		 */
		private function set_plugin_constants() {

			// Path/URL to root of this plugin, with trailing slash.
			if ( ! defined( 'CATCH_DARK_MODE_PATH' ) ) {
				define( 'CATCH_DARK_MODE_PATH', plugin_dir_path( __FILE__ ) );
			}
			if ( ! defined( 'CATCH_DARK_MODE_URL' ) ) {
				define( 'CATCH_DARK_MODE_URL', plugin_dir_url( __FILE__ ) );
			}
			if ( ! defined( 'CATCH_DARK_MODE_FILE' ) ) {
				define( 'CATCH_DARK_MODE_FILE', __FILE__ );
			}
			if ( ! defined( 'CATCH_DARK_MODE_BASENAME' ) ) {
				define( 'CATCH_DARK_MODE_BASENAME', plugin_basename( __FILE__ ) );
			}
			if ( ! defined( 'CATCH_DARK_MODE_ASSETS' ) ) {
				define( 'CATCH_DARK_MODE_ASSETS', CATCH_DARK_MODE_URL . '/assets' );
			}
			if ( ! defined( 'CATCH_DARK_MODE_INCLUDES' ) ) {
				define( 'CATCH_DARK_MODE_INCLUDES', CATCH_DARK_MODE_PATH . '/includes' );
			}
			if ( ! defined( 'CATCH_DARK_MODE_TEMPLATES ' ) ) {
				define( 'CATCH_DARK_MODE_TEMPLATES ', CATCH_DARK_MODE_PATH . '/templates' );
			}
			$this->set_plugin_version_constant();
		}

		/**
		 * Set plugin version constant -> CATCH_DARK_MODE_VERSION.
		 */
		public function set_plugin_version_constant() {
			if ( ! defined( 'CATCH_DARK_MODE_VERSION' ) ) {
				include_once ABSPATH . 'wp-admin/includes/plugin.php';
				$plugin_data = get_plugin_data( __FILE__ );
				define( 'CATCH_DARK_MODE_VERSION', $plugin_data['Version'] );
			}
		}


		/**
		 * Returns the options array for Top options
		 *
		 *  @since    1.0
		 */
		public function get_options() {
			$defaults = $this->default_options();
			$options  = get_option( 'catch_dark_mode_options', $defaults );

			return wp_parse_args( $options, $defaults );
		}

		/**
		 * Return array of default options
		 *
		 * @param array $option some options.
		 * @since     1.0
		 * @return    array    default options.
		 */
		public function default_options( $option = null ) {

			$default_options = array(
				'scheme'          => 'amber',
				'enable_default'  => '0',
				'floating_switch' => '1',
				'os_aware'        => '0',
				'switch_style'    => 'style-1',
				'switch_position' => 'bottom-left',
			);

			if ( null === $option ) {
				return apply_filters( 'catch_dark_mode_options', $default_options );
			} else {
				return $default_options[ $option ];
			}
		}

		/**
		 * Switch styles
		 *
		 * @return array style
		 */
		public function switch_styles() {
			$styles = array(
				'style-1' => array(
					'label' => 'Style 1',
					'icon'  => CATCH_DARK_MODE_URL . '/image/button/style-1.png',
					'light' => CATCH_DARK_MODE_URL . '/image/button/button-1/light.svg',
					'dark'  => CATCH_DARK_MODE_URL . '/image/button/button-1/dark.svg',
				),
				'style-2' => array(
					'label' => 'Style 2',
					'icon'  => CATCH_DARK_MODE_URL . '/image/button/style-2.png',
					'light' => CATCH_DARK_MODE_URL . '/image/button/button-2/light.svg',
					'dark'  => CATCH_DARK_MODE_URL . '/image/button/button-2/dark.svg',
				),
				'style-3' => array(
					'label' => 'Style 3',
					'icon'  => CATCH_DARK_MODE_URL . '/image/button/style-3.png',
					'light' => CATCH_DARK_MODE_URL . '/image/button/button-2/light.svg',
					'dark'  => CATCH_DARK_MODE_URL . '/image/button/button-2/dark.svg',
				),
				'style-4' => array(
					'label'  => 'Style 4',
					'icon'   => CATCH_DARK_MODE_URL . '/image/button/style-4.png',
					'light'  => CATCH_DARK_MODE_URL . '/image/button/button-2/light.svg',
					'dark'   => CATCH_DARK_MODE_URL . '/image/button/button-2/dark.svg',
					'is_pro' => true,
				),
				'style-5' => array(
					'label'  => 'Style 5',
					'icon'   => CATCH_DARK_MODE_URL . '/image/button/style-5.png',
					'light'  => CATCH_DARK_MODE_URL . '/image/button/button-2/light.svg',
					'dark'   => CATCH_DARK_MODE_URL . '/image/button/button-2/dark.svg',
					'is_pro' => true,
				),
				'style-6' => array(
					'label'  => 'Style 6',
					'icon'   => CATCH_DARK_MODE_URL . '/image/button/style-6.png',
					'light'  => CATCH_DARK_MODE_URL . '/image/button/button-2/light.svg',
					'dark'   => CATCH_DARK_MODE_URL . '/image/button/button-2/dark.svg',
					'is_pro' => true,
				),
				'style-7' => array(
					'label'  => 'Style 7',
					'icon'   => CATCH_DARK_MODE_URL . '/image/button/style-7.png',
					'light'  => CATCH_DARK_MODE_URL . '/image/button/button-2/light.svg',
					'dark'   => CATCH_DARK_MODE_URL . '/image/button/button-2/dark.svg',
					'is_pro' => true,
				),
				'style-8' => array(
					'label'  => 'Style 8',
					'icon'   => CATCH_DARK_MODE_URL . '/image/button/style-8.png',
					'light'  => CATCH_DARK_MODE_URL . '/image/button/button-2/light.svg',
					'dark'   => CATCH_DARK_MODE_URL . '/image/button/button-2/dark.svg',
					'is_pro' => true,
				),
			);
			return $styles;
		}


		/**
		 * Switch Postitions
		 * .
		 *
		 * @return array positions
		 */
		public function switch_positions() {
			$positions = array(
				'bottom-left'  => esc_html__( 'Bottom Left', 'catch-dark-mode' ),
				'bottom-right' => esc_html__( 'Bottom Right', 'catch-dark-mode' ),
			);
			return $positions;
		}

		/**
		 * Color schemes
		 *
		 * @return array style
		 */
		public function color_schemes() {
			$schemes = array(
				'amber'  => array(
					'label'  => esc_html__( 'Amber', 'catch-dark-mode' ),
					'icon'   => CATCH_DARK_MODE_URL . '/image/schemes/amber.svg',
					'scheme' => array(
						'background' => '#1a1a1a',
						'foreground' => '#ffffff',
						'primary'    => '#ffab00',
						'secondary'  => '#cd5087',
						'tertiary'   => '#fa6742',
					),
				),
				'teal'   => array(
					'label'  => esc_html__( 'Teal', 'catch-dark-mode' ),
					'icon'   => CATCH_DARK_MODE_URL . '/image/schemes/teal.svg',
					'scheme' => array(
						'background' => '#1a1a1a',
						'foreground' => '#ffffff',
						'primary'    => '#00bfa5',
						'secondary'  => '#00adef',
						'tertiary'   => '#fa6742',
					),
				),
				'red'    => array(
					'label'  => esc_html__( 'Red', 'catch-dark-mode' ),
					'icon'   => CATCH_DARK_MODE_URL . '/image/schemes/red.svg',
					'scheme' => array(
						'background' => '#1a1a1a',
						'foreground' => '#ffffff',
						'primary'    => '#d50000',
						'secondary'  => '#00adef',
						'tertiary'   => '#cd5087',
					),
				),
				'orange' => array(
					'label'  => esc_html__( 'Orange', 'catch-dark-mode' ),
					'icon'   => CATCH_DARK_MODE_URL . '/image/schemes/orange.svg',
					'scheme' => array(
						'background' => '#1a1a1a',
						'foreground' => '#ffffff',
						'primary'    => '#ff6d00',
						'secondary'  => 'rgba(255, 255, 255, 0.7)',
						'tertiary'   => 'rgba(255, 255, 255, 0.7)',
					),
					'is_pro' => true,
				),
				'yellow' => array(
					'label'  => esc_html__( 'Yellow', 'catch-dark-mode' ),
					'icon'   => CATCH_DARK_MODE_URL . '/image/schemes/yellow.svg',
					'scheme' => array(
						'background' => '#1a1a1a',
						'foreground' => '#ffffff',
						'primary'    => '#ffd600',
						'secondary'  => '#cd5087',
						'tertiary'   => '#fa6742',
					),
					'is_pro' => true,
				),
				'green'  => array(
					'label'  => esc_html__( 'Green', 'catch-dark-mode' ),
					'icon'   => CATCH_DARK_MODE_URL . '/image/schemes/green.svg',
					'scheme' => array(
						'background' => '#1a1a1a',
						'foreground' => '#ffffff',
						'primary'    => '#00c853',
						'secondary'  => '#00adef',
						'tertiary'   => '#fa6742',
					),
					'is_pro' => true,
				),
				'blue'   => array(
					'label'  => esc_html__( 'Blue', 'catch-dark-mode' ),
					'icon'   => CATCH_DARK_MODE_URL . '/image/schemes/blue.svg',
					'scheme' => array(
						'background' => '#1a1a1a',
						'foreground' => '#ffffff',
						'primary'    => '#2962ff',
						'secondary'  => '#00adef',
						'tertiary'   => '#cd5087',
					),
					'is_pro' => true,
				),
				'pink'   => array(
					'label'  => esc_html__( 'Pink', 'catch-dark-mode' ),
					'icon'   => CATCH_DARK_MODE_URL . '/image/schemes/pink.svg',
					'scheme' => array(
						'background' => '#1a1a1a',
						'foreground' => '#ffffff',
						'primary'    => '#c51162',
						'secondary'  => 'rgba(255, 255, 255, 0.7)',
						'tertiary'   => 'rgba(255, 255, 255, 0.7)',
					),
					'is_pro' => true,
				),
				'cyan'   => array(
					'label'  => esc_html__( 'Cyan', 'catch-dark-mode' ),
					'icon'   => CATCH_DARK_MODE_URL . '/image/schemes/cyan.svg',
					'scheme' => array(
						'background' => '#1a1a1a',
						'foreground' => '#ffffff',
						'primary'    => '#00b8d4',
						'secondary'  => '#00adef',
						'tertiary'   => '#cd5087',
					),
					'is_pro' => true,
				),
				'lime'   => array(
					'label'  => esc_html__( 'Lime', 'catch-dark-mode' ),
					'icon'   => CATCH_DARK_MODE_URL . '/image/schemes/lime.svg',
					'scheme' => array(
						'background' => '#1a1a1a',
						'foreground' => '#ffffff',
						'primary'    => '#aeea00',
						'secondary'  => 'rgba(255, 255, 255, 0.7)',
						'tertiary'   => 'rgba(255, 255, 255, 0.7)',
					),
					'is_pro' => true,
				),
			);

			return $schemes;
		}

		/**
		 * Returns path to template file.
		 *
		 * @param   null          $name
		 * @param   boolean|array $args
		 *
		 * @return bool|string
		 * @since 1.0.0
		 */
		public function get_template( $name = null, $args = false ) {
			if ( ! empty( $args ) && is_array( $args ) ) {
				extract( $args );
			}

			$template = locate_template( 'catch-dark-mode/templates/switch-style/' . $name . '.php' );

			if ( ! $template ) {
				$template = CATCH_DARK_MODE_PATH . "/templates/switch-style/$name.php";
			}

			if ( file_exists( $template ) ) {
				include $template;
			} else {
				return false;
			}
		}

		/**
		 * Render Swtich
		 *
		 * @param [type] $atts
		 * @return void
		 */
		public function render_switch( $atts ) {
			$atts = shortcode_atts(
				array(
					'floating' => 'no',
					'class'    => '',
					'style'    => 'style-1',
				),
				$atts
			);

			ob_start();

			if ( file_exists( CATCH_DARK_MODE_PATH . "/templates/switch-style/{$atts['style']}.php" ) ) {
				$this->get_template( "{$atts['style']}", $atts );
			} else {
				$this->get_template( 'style-1', $atts );
			}

			$allowed_atts           = array(
				'class' => array(),
				'type'  => array(),
				'id'    => array(),
				'src'   => array(),
				'alt'   => array(),
				'href'  => array(),
				'type'  => array(),
				'value' => array(),
				'name'  => array(),
				'for'   => array(),
			);
			$allowed_tags['label']  = $allowed_atts;
			$allowed_tags['input']  = $allowed_atts;
			$allowed_tags['button'] = $allowed_atts;
			$allowed_tags['span']   = $allowed_atts;
			$allowed_tags['div']    = $allowed_atts;
			$allowed_tags['img']    = $allowed_atts;

			echo wp_kses( ob_get_clean(), $allowed_tags );
		}

		/**
		 * Get colors
		 *
		 * @param string $scheme Contains the scheme variable.
		 * @return array Color schemes.
		 */
		public function get_colors( $scheme ) {
			$schemes = array(
				'one'   => array(
					'background' => '#000000',
					'foreground' => '#ffffff',
					'primary'    => '#00adef',
					'secondary'  => '#cd5087',
					'tertiary'   => '#fa6742',
				),
				'two'   => array(
					'background' => '#000',
					'foreground' => '#999999',
					'primary'    => '#cd5087',
					'secondary'  => '#00adef',
					'tertiary'   => '#fa6742',
				),
				'three' => array(
					'background' => '#000000',
					'foreground' => '#fff',
					'primary'    => '#fa6742',
					'secondary'  => '#00adef',
					'tertiary'   => '#cd5087',
				),
				'four'  => array(
					'background' => '#000000',
					'foreground' => 'rgba(153, 153, 153, 0.7)',
					'primary'    => 'rgba(255, 255, 255, 0.7)',
					'secondary'  => 'rgba(255, 255, 255, 0.7)',
					'tertiary'   => 'rgba(255, 255, 255, 0.7)',
				),
			);

			return $schemes[ $scheme ];
		}


		/**
		 * Main Catch_Dark_Mode Instance.
		 *
		 * Ensures only one instance of Catch_Dark_Mode is loaded or can be loaded.
		 *
		 * @return Catch_Dark_Mode_Main - Main instance.
		 * @since 1.0.0
		 * @static
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}
}

$cdm_main = Catch_Dark_Mode_Main::instance();

$cdm = new Catch_Dark_Mode( $cdm_main );
$cdm->run();
