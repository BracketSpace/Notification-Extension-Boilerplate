<?php
/**
 * Runtime
 *
 * @package notification/slugnamexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX;

use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Requirements\Requirements;
use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\DocHooks\Helper as DocHooks;
use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Filesystem\Filesystem;
use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Templates\Storage as TemplateStorage;
use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Internationalization\Internationalization;

/**
 * Runtime class
 */
class Runtime {

	/**
	 * Main plugin file path
	 *
	 * @var string
	 */
	protected $plugin_file;

	/**
	 * Flag for unmet requirements
	 *
	 * @var bool
	 */
	protected $requirements_unmet;

	/**
	 * Class constructor
	 *
	 * @since [Next]
	 * @param string $plugin_file plugin main file full path.
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
	public function init() {

		// Plugin has been already initialized.
		if ( did_action( 'notification/slugnamexx/init' ) || $this->requirements_unmet ) {
			return;
		}

		// Autoloading.
		require_once dirname( $this->plugin_file ) . '/vendor/autoload.php';

		// Requirements check.
		$requirements = new Requirements( __( 'Notification : Nicenamexx', 'notification-slugnamexx' ), [
			'php'          => '7.0',
			'wp'           => '5.3',
			'notification' => '7.0.0',
		] );

		$requirements->register_checker( __NAMESPACE__ . '\\Requirements\\BasePlugin' );

		if ( ! $requirements->satisfied() ) {
			$requirements->print_notice();
			$this->requirements_unmet = true;
			return;
		}

		$this->filesystems();
		$this->templates();
		$this->singletons();
		$this->actions();
		$this->components();

		do_action( 'notification/slugnamexx/init' );

	}

	/**
	 * Registers all the hooks with DocHooks
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function register_hooks() {

		DocHooks::hook( $this );

		foreach ( get_object_vars( $this ) as $instance ) {
			if ( is_object( $instance ) ) {
				DocHooks::hook( $instance );
			}
		}

	}

	/**
	 * Sets up the templates storage
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function templates() {

		TemplateStorage::add( 'templates', $this->get_filesystem( 'root' )->path( 'src/templates' ) );

	}

	/**
	 * Sets up the plugin filesystems
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function filesystems() {

		$root = new Filesystem( dirname( $this->plugin_file ) );

		$this->filesystems = [
			'root'     => $root,
			'dist'     => new Filesystem( $root->path( 'dist' ) ),
			'includes' => new Filesystem( $root->path( 'src/includes' ) ),
		];

	}

	/**
	 * Gets filesystem
	 *
	 * @since  [Next]
	 * @param  string $name Filesystem name.
	 * @return Filesystem|null
	 */
	public function get_filesystem( $name ) {
		return $this->filesystems[ $name ];
	}

	/**
	 * Creates needed classes
	 * Singletons are used for a sake of performance
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function singletons() {

		$this->i18n    = new Internationalization( 'notification-slugnamexx', $this->get_filesystem( 'includes' )->path( 'languages' ) );
		$this->scripts = new Admin\Scripts( $this, $this->get_filesystem( 'dist' ) );

		$this->admin_settings = new Admin\Settings();

	}

	/**
	 * All WordPress actions this plugin utilizes
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function actions() {

		$this->register_hooks();

		notification_register_settings( [ $this->admin_settings, 'register_trigger_settings' ], 20 );
		notification_register_settings( [ $this->admin_settings, 'register_carrier_settings' ], 30 );

		// DocHooks compatibility.
		if ( ! DocHooks::is_enabled() && $this->get_filesystem( 'includes' )->exists( 'hooks.php' ) ) {
			include_once $this->get_filesystem( 'includes' )->path( 'hooks.php' );
		}

	}

	/**
	 * Loads components
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function components() {
		array_map( [ $this, 'load_component' ], [
			'triggers',
			'recipients',
			'carriers',
		] );
	}

	/**
	 * Loads component
	 *
	 * @since  [Next]
	 * @param  string $component Component file slug.
	 * @return void
	 */
	public function load_component( $component ) {
		if ( apply_filters( 'notification/slugnamexx/load/component/' . $component, true ) ) {
			$path = sprintf( 'components/%s.php', $component );
			if ( $this->get_filesystem( 'includes' )->exists( $path ) ) {
				require_once $this->get_filesystem( 'includes' )->path( $path );
			}
		}
	}

}
