<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       catchplugins.com
 * @since      1.0.0
 *
 * @package    Catch_Dark_Mode
 * @subpackage Catch_Dark_Mode/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Catch_Dark_Mode
 * @subpackage Catch_Dark_Mode/includes
 * @author     catchplugins.com <info@catchplugins.com>
 */
class Catch_Dark_Mode {


	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Catch_Dark_Mode_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $DARK_MODE    The string used to uniquely identify this plugin.
	 */
	// protected $DARK_MODE;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $class ) {
		$this->main    = $class;
		$this->version = CATCH_DARK_MODE_VERSION;

		$this->catch_dark_mode = 'catch-dark-mode';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();

		// if ( isset( $options['enable_frontend'] ) && '1' === $options['enable_frontend'] ) {
		$this->define_public_hooks();
		// }
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Catch_Dark_Mode_Loader. Orchestrates the hooks of the plugin.
	 * - Catch_Dark_Mode_i18n. Defines internationalization functionality.
	 * - Catch_Dark_Mode_Admin. Defines all hooks for the admin area.
	 * - Catch_Dark_Mode_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-public.php';

		$this->loader = new Catch_Dark_Mode_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Catch_Dark_Mode_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {
		$plugin_i18n = new Catch_Dark_Mode_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {
		$plugin_admin = new Catch_Dark_Mode_Admin( $this->get_catch_dark_mode(), $this->get_version(), $this->main );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_settings_menu' );

		$this->loader->add_action( 'admin_init', $plugin_admin, 'register_settings' );

		$this->loader->add_filter( 'plugin_action_links', $plugin_admin, 'action_links', 10, 2 );

		$this->loader->add_filter( 'plugin_row_meta', $plugin_admin, 'add_plugin_meta_links', 10, 2 );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
		$options       = $this->main->get_options();
		$plugin_public = new Catch_Dark_Mode_Public( $this->get_catch_dark_mode(), $this->get_version(), $this->main );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'dynamic_css_enqueue', 100 );
		$this->loader->add_action( 'wp_ajax_dynamic_css', $plugin_public, 'dynaminc_css' );
		$this->loader->add_action( 'wp_ajax_nopriv_dynamic_css', $plugin_public, 'dynaminc_css' );

		if ( isset( $options['floating_switch'] ) && '1' === $options['floating_switch'] ) {
			$this->loader->add_action( 'wp_footer', $plugin_public, 'render_button' );
		}

		if ( isset( $options['enable_default'] ) && '1' === $options['enable_default'] ) {
			$this->loader->add_filter( 'language_attributes', $plugin_public, 'add_dark_mode_class_to_html', 10, 2 );
		}
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_catch_dark_mode() {
		return $this->catch_dark_mode;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Catch_Dark_Mode_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}
