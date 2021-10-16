<?php
/**
 * Runtime
 *
 * @package notification/slug-namexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX;

use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Requirements\Requirements as RequirementsEngine;
use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\DocHooks\HookTrait;
use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\DocHooks\Helper as DocHooksHelper;
use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Filesystem\Filesystem;
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
	 * Filesystems
	 *
	 * @var Filesystem
	 */
	protected $filesystem;

	/**
	 * Components
	 *
	 * @var array<string,mixed>
	 */
	protected $components = [];

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
	public function init() {

		// Plugin has been already initialized.
		if ( did_action( 'notification/slug-namexx/init' ) || $this->requirements_unmet ) {
			return;
		}

		// Requirements check.
		$requirements = new RequirementsEngine( __( 'Notification : Nicenamexx', 'notification-slug-namexx' ), [
			'php'          => '7.0',
			'wp'           => '5.3',
			'notification' => '7.0.0',
		] );

		$requirements->register_checker( Requirements\BasePlugin::class );

		if ( ! $requirements->satisfied() ) {
			$requirements->print_notice();
			$this->requirements_unmet = true;
			return;
		}

		$this->filesystem = new Filesystem( dirname( $this->plugin_file ) );
		Core\Templates::register_storage();
		$this->singletons();
		$this->cli_commands();
		$this->actions();

		do_action( 'notification/slug-namexx/init' );

	}

	/**
	 * Registers WP CLI commands
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function cli_commands() {
		if ( ! defined( 'WP_CLI' ) || \WP_CLI !== true ) {
			return;
		}

		\WP_CLI::add_command( 'notification-slug-namexx dump-hooks', Cli\DumpHooks::class );
	}

	/**
	 * Registers all the hooks with DocHooks
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function register_hooks() {
		// Hook Runtime.
		$this->add_hooks();

		// Hook all the components.
		foreach ( $this->components as $component ) {
			if ( is_object( $component ) ) {
				$this->add_hooks( $component );
			}
		}
	}

	/**
	 * Gets filesystem
	 *
	 * @since  [Next]
	 * @return Filesystem|null
	 */
	public function get_filesystem() {
		return $this->filesystem;
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
		$this->add_component( 'i18n', new Internationalization( 'notification-slug-namexx', $this->get_filesystem( 'includes' )->path( 'languages' ) ) );
		$this->add_component( 'scripts', new Admin\Scripts( $this->get_filesystem( 'dist' ) ) );
		$this->add_component( 'admin/settings', new Admin\Settings() );
	}

	/**
	 * All WordPress actions this plugin utilizes
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function actions() {
		$this->register_hooks();

		notification_register_settings( [ $this->component( 'admin/settings' ), 'register_trigger_settings' ], 20 );
		notification_register_settings( [ $this->component( 'admin/settings' ), 'register_carrier_settings' ], 30 );

		// DocHooks compatibility.
		if ( ! DocHooksHelper::is_enabled() && $this->get_filesystem()->exists( 'compat/register-hooks.php' ) ) {
			include_once $this->get_filesystem()->path( 'compat/register-hooks.php' );
		}
	}

	/**
	 * Loads elements
	 *
	 * @action notification/init
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function elements() {
		array_map(
			[ $this, 'load_element' ],
			[
				'carriers',
				'recipients',
				'triggers',
			],
			[
				Repository\CarrierRepository::class,
				Repository\RecipientRepository::class,
				Repository\TriggerRepository::class,
			]
		);
	}

	/**
	 * Loads element
	 *
	 * @since  [Next]
	 * @param  string       $element    Element name.
	 * @param  class-string $class_name Element Registerer class name.
	 * @return void
	 */
	public function load_element( $element, $class_name ) {
		if ( apply_filters( 'notification/slug-namexx/load/element/' . $element, true ) ) {
			if ( is_callable( [ $class_name, 'register' ] ) ) {
				$class_name::register();
			}
		}
	}

}
