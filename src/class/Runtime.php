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
	 * Plugin file path
	 *
	 * @var string
	 */
	protected $plugin_file;

	/**
	 * Class constructor
	 *
	 * @since [Next]
	 * @param string $plugin_file Plugin main file full path.
	 */
	public function __construct( $plugin_file ) {
		$this->plugin_file = $plugin_file;
		$this->add_hooks();
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

	}

	/**
	 * Creates needed class instances
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function instances() {

		$this->files = new Utils\Files( $this->plugin_file );

		$i18n    = $this->add_hooks( new Utils\Internationalization( $this->files, 'notification-slugnamexx' ) );
		$scripts = $this->add_hooks( new Admin\Scripts( $this->files ) );

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
