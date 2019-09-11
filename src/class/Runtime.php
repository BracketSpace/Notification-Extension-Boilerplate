<?php
/**
 * Runtime
 *
 * @package notification/slugnamexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX;

use BracketSpace\Notification\Utils;

/**
 * Runtime class
 */
class Runtime extends Utils\DocHooks {

	/**
	 * Class constructor
	 *
	 * @since [Next]
	 * @param string $plugin_file Plugin main file full path.
	 */
	public function __construct( $plugin_file ) {
		$this->plugin_file = $plugin_file;
	}

	/**
	 * Loads needed files
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function boot() {

		$this->instances();
		$this->load_functions();
		$this->actions();

	}

	/**
	 * Registers all the hooks with DocHooks
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function register_hooks() {

		$this->add_hooks();

		foreach ( get_object_vars( $this ) as $instance ) {
			if ( is_object( $instance ) ) {
				$this->add_hooks( $instance );
			}
		}

	}

	/**
	 * Creates needed class instances
	 * Assing an instance to a property to use dochooks.
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function instances() {

		$this->files = new Utils\Files( $this->plugin_file );

		$this->i18n    = new Utils\Internationalization( $this->files, 'notification-slugnamexx' );
		$this->scripts = new Admin\Scripts( $this->files );

	}

	/**
	 * Creates instances when Notification plugin is fully loaded
	 * Useful when you are depending on registered Carriers or Triggers
	 *
	 * @action notification/boot
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function late_instances() {

	}

	/**
	 * All WordPress actions this plugin utilizes
	 * Should register plugin settings as well.
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function actions() {

		$this->register_hooks();

		// DocHooks compatibility.
		$hooks_file = $this->files->file_path( 'inc/hooks.php' );
		if ( ! notification_dochooks_enabled() && file_exists( $hooks_file ) ) {
			include_once $hooks_file;
		}

	}

	/**
	 * Returns new View object
	 *
	 * @since  [Next]
	 * @return View view object
	 */
	public function view() {
		return new Utils\View( $this->files );
	}

	/**
	 * Loads functions from src/inc/functions directory
	 * All .php files are loaded automatically
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function load_functions() {

		$function_files = glob( $this->files->dir_path( 'src/inc/functions/' ) . '*.php' );

		if ( empty( $function_files ) ) {
			return;
		}

		foreach ( $function_files as $file ) {
			require_once $file;
		}

	}

}
