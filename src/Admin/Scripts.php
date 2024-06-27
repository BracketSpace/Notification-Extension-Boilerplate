<?php
/**
 * Enqueues scripts
 *
 * @package notification/slug-namexx
 */

declare(strict_types=1);

namespace BracketSpace\Notification\XXNAMESPACEXX\Admin;

use BracketSpace\Notification\XXNAMESPACEXX\Dependencies\Micropackage\Filesystem\Filesystem;

/**
 * Scripts class
 */
class Scripts
{
	/**
	 * Filesystem object
	 *
	 * @var Filesystem
	 */
	private $filesystem;

	/**
	 * Scripts constructor
	 *
	 * @since [Next]
	 * @param Filesystem $fs Assets filesystem object.
	 */
	public function __construct(Filesystem $fs)
	{
		$this->filesystem = $fs;
	}

	/**
	 * Adds a page hook where Notification scripts should be loaded.
	 *
	 * Either:
	 * - Add new page hook to this array
	 * - Create new action if you don't need any core Notification scripts or styles
	 *
	 * @filter notification/scripts/allowed_hooks
	 *
	 * @since  [Next]
	 * @param  array $pageHooks Page hooks.
	 * @return array
	 */
	public function addScreen($pageHooks)
	{
		return $pageHooks;
	}

	/**
	 * Enqueue scripts and styles for admin
	 *
	 * @action notification/scripts
	 *
	 * @param  string $pageHook current page hook.
	 * @return void
	 */
	public function enqueueScripts($pageHook)
	{
		wp_enqueue_style(
			'notification-slug-namexx',
			$this->filesystem->url('resources/css/dist/style.css'),
			[],
			$this->filesystem->mtime('resources/css/dist/style.css')
		);

		if ($this->filesystem->exists('resources/js/dist/script.asset.php')) {
			$scriptData = require $this->filesystem->path('resources/js/dist/script.asset.php');
			$dependencies = $scriptData['dependencies'];
			$version = $scriptData['version'];
		} else {
			$dependencies = [];
			$version = $this->filesystem->mtime('resources/js/dist/script.js');
		}

		wp_enqueue_script(
			'notification-slug-namexx',
			$this->filesystem->url('resources/js/dist/script.js'),
			$dependencies,
			$version,
			true
		);

		wp_localize_script(
			'notification-slug-namexx',
			'notificationSlugNamexx',
			[
				'ajaxurl' => admin_url('admin-ajax.php'),
			]
		);
	}
}
