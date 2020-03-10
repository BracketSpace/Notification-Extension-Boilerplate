<?php
/**
 * Runtime
 *
 * @package notification/slugnamexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX;

use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Requirements\Requirements;
use BracketSpace\Notification\Vendor\Micropackage\DocHooks\HookTrait;
use BracketSpace\Notification\Vendor\Micropackage\DocHooks\Helper as DocHooksHelper;
use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Filesystem\Filesystem;
use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Templates\Storage as TemplateStorage;
use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Internationalization\Internationalization;

/**
 * Runtime class
 */
class Runtime {

	use HookTrait;

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
	 * Components
	 *
	 * @var array
	 */
	protected $components = [];

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
		$this->elements();

		do_action( 'notification/slugnamexx/init' );

	}

	/**
	 * Registers all the hooks with DocHooks
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function register_hooks() {

		$this->add_hooks( $this );

		foreach ( $this->components as $component ) {
			if ( is_object( $component ) ) {
				$this->add_hooks( $component );
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
	 * Adds runtime component
	 *
	 * @since  [Next]
	 * @throws \Exception When component is already registered.
	 * @param  string $name      Component name.
	 * @param  mixed  $component Component.
	 * @return $this
	 */
	public function add_component( $name, $component ) {

		if ( isset( $this->components[ $name ] ) ) {
			throw new \Exception( sprintf( 'Component %s is already added.', $name ) );
		}

		$this->components[ $name ] = $component;

		return $this;

	}

	/**
	 * Gets runtime component
	 *
	 * @since  [Next]
	 * @param  string $name Component name.
	 * @return mixed        Component or null
	 */
	public function component( $name ) {
		return isset( $this->components[ $name ] ) ? $this->components[ $name ] : null;
	}

	/**
	 * Gets runtime components
	 *
	 * @since  [Next]
	 * @return array
	 */
	public function components() {
		return $this->components;
	}

	/**
	 * Creates needed classes
	 * Singletons are used for a sake of performance
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function singletons() {

		$this->add_component( 'i18n', new Internationalization( 'notification-slugnamexx', $this->get_filesystem( 'includes' )->path( 'languages' ) ) );
		$this->add_component( 'scripts', new Admin\Scripts( $this->get_filesystem( 'dist' ) ) );

		$this->add_component( 'admin_settings', new Admin\Settings() );

	}

	/**
	 * All WordPress actions this plugin utilizes
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function actions() {

		$this->register_hooks();

		notification_register_settings( [ $this->component( 'admin_settings' ), 'register_trigger_settings' ], 20 );
		notification_register_settings( [ $this->component( 'admin_settings' ), 'register_carrier_settings' ], 30 );

		// DocHooks compatibility.
		if ( ! DocHooksHelper::is_enabled() && $this->get_filesystem( 'includes' )->exists( 'hooks.php' ) ) {
			include_once $this->get_filesystem( 'includes' )->path( 'hooks.php' );
		}

	}

	/**
	 * Loads elements
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function elements() {
		array_map( [ $this, 'load_element' ], [
			'triggers',
			'recipients',
			'carriers',
		] );
	}

	/**
	 * Loads element
	 *
	 * @since  [Next]
	 * @param  string $element element file slug.
	 * @return void
	 */
	public function load_element( $element ) {
		if ( apply_filters( 'notification/slugnamexx/load/element/' . $element, true ) ) {
			$path = sprintf( 'elements/%s.php', $element );
			if ( $this->get_filesystem( 'includes' )->exists( $path ) ) {
				require_once $this->get_filesystem( 'includes' )->path( $path );
			}
		}
	}

}
