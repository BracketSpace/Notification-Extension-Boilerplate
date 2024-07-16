<?php
/**
 * Runtime
 *
 * @package notification/slug-namexx
 */

declare(strict_types=1);

namespace BracketSpace\Notification\XXNAMESPACEXX;

use BracketSpace\Notification\XXNAMESPACEXX\Dependencies\Micropackage\Requirements\Requirements as RequirementsEngine;
use BracketSpace\Notification\XXNAMESPACEXX\Dependencies\Micropackage\DocHooks\HookTrait;
use BracketSpace\Notification\XXNAMESPACEXX\Dependencies\Micropackage\DocHooks\Helper as DocHooksHelper;
use BracketSpace\Notification\XXNAMESPACEXX\Dependencies\Micropackage\Filesystem\Filesystem;
use BracketSpace\Notification\XXNAMESPACEXX\Dependencies\Micropackage\Internationalization\Internationalization;

/**
 * Runtime class
 *
 * @since  [Next]
 */
class Runtime
{
	use HookTrait;

	/**
	 * Main plugin file path
	 *
	 * @var string
	 */
	protected $pluginFile;

	/**
	 * Flag for unmet requirements
	 *
	 * @var bool
	 */
	protected $requirementsUnmet;

	/**
	 * Filesystems
	 *
	 * @var Filesystem
	 */
	protected $filesystem;

	/**
	 * Components
	 *
	 * @var array<class-string, object>
	 */
	protected $components = [];

	/**
	 * Class constructor
	 *
	 * @param string $pluginFile Plugin main file full path.
	 */
	public function __construct($pluginFile)
	{
		$this->pluginFile = $pluginFile;
	}

	/**
	 * Loads needed files
	 *
	 * @return void
	 */
	public function init()
	{
		// Plugin has been already initialized.
		if (did_action('notification/slug-namexx/init') || $this->requirementsUnmet) {
			return;
		}

		// Requirements check.
		$requirements = new RequirementsEngine(
			__('Notification : Nicenamexx', 'notification-slug-namexx'),
			[
				'php' => '7.4',
				'wp' => '5.3',
				'notification' => '9.0.0',
			]
		);

		$requirements->register_checker(Requirements\BasePlugin::class);

		if (! $requirements->satisfied()) {
			$requirements->print_notice();
			$this->requirementsUnmet = true;
			return;
		}

		$this->filesystem = new Filesystem(dirname($this->pluginFile));
		Core\Templates::registerStorage();
		$this->singletons();
		$this->cliCommands();
		$this->actions();

		do_action('notification/slug-namexx/init');
	}

	/**
	 * Registers WP CLI commands
	 *
	 * @return void
	 */
	public function cliCommands()
	{
		if (! defined('WP_CLI') || \WP_CLI !== true) {
			return;
		}

		\WP_CLI::add_command('notification-slug-namexx dump-hooks', Cli\DumpHooks::class);
	}

	/**
	 * Registers all the hooks with DocHooks
	 *
	 * @return void
	 */
	public function registerHooks()
	{
		// Hook Runtime.
		$this->add_hooks();

		// Hook all the components.
		foreach ($this->components as $component) {
			if (! is_object($component)) {
				continue;
			}

			$this->add_hooks($component);
		}
	}

	/**
	 * Gets filesystem
	 *
	 * @return Filesystem
	 */
	public function getFilesystem()
	{
		if ($this->filesystem === null) {
			throw new \Exception('Filesystem has not been invoked yet.');
		}

		return $this->filesystem;
	}

	/**
	 * Adds runtime component
	 *
	 * @throws \Exception When component is already registered.
	 * @param mixed $component Component.
	 * @return $this
	 */
	public function addComponent($component)
	{
		if (! is_object($component)) {
			throw new \Exception('Component has to be an object.');
		}

		$name = get_class($component);

		if (isset($this->components[$name])) {
			throw new \Exception(sprintf('Component %s is already added.', $name));
		}

		$this->components[$name] = $component;

		return $this;
	}

	/**
	 * Gets runtime component
	 *
	 * @param string $name Component name.
	 * @return object|null Component or null
	 */
	public function component($name)
	{
		return $this->components[$name] ?? null;
	}

	/**
	 * Gets runtime components
	 *
	 * @return array<class-string, object>
	 */
	public function components()
	{
		return $this->components;
	}

	/**
	 * Creates needed classes
	 * Singletons are used for a sake of performance
	 *
	 * @return void
	 */
	public function singletons()
	{
		$this->addComponent(
			new Internationalization('notification-slug-namexx', $this->getFilesystem()->path('resources/languages'))
		);
		$this->addComponent(new Admin\Scripts($this->getFilesystem()));
		$this->addComponent(new Admin\Settings());
	}

	/**
	 * All WordPress actions this plugin utilizes
	 *
	 * @return void
	 */
	public function actions()
	{
		$this->registerHooks();

		// DocHooks compatibility.
		if (DocHooksHelper::is_enabled() || !$this->getFilesystem()->exists('compat/register-hooks.php')) {
			return;
		}

		include_once $this->getFilesystem()->path('compat/register-hooks.php');
	}

	/**
	 * Loads elements
	 *
	 * @action notification/init
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function elements()
	{
		array_map(
			[$this, 'loadElement'],
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
	 * @param  class-string $className Element Registerer class name.
	 * @return void
	 */
	public function loadElement($element, $className)
	{
		if (! apply_filters('notification/slug-namexx/load/element/' . $element, true)) {
			return;
		}

		if (! is_callable([$className, 'register'])) {
			return;
		}

		$className::register();
	}
}
