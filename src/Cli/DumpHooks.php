<?php
/**
 * Dump all the Dochooks to an external file: /inc/hooks.php
 *
 * It's used when OPcache's `save_comments` is disabled.
 *
 * @usage: wp notification-slug-namexx dump-hooks
 *
 * @package notification/slug-namexx
 */

declare(strict_types=1);

namespace BracketSpace\Notification\XXNAMESPACEXX\Cli;

use NotificationXXNAMESPACEXX as MainClass;
use WP_CLI;

/**
 * Dump all hooks
 */
class DumpHooks
{
	/**
	 * Dump all the Dochooks.
	 *
	 * @param list<string> $args Arguments.
	 * @return void
	 */
	public function __invoke($args)
	{
		$runtime = MainClass::runtime();
		$filesystem = $runtime->getFilesystem();
		$hooksFile = 'compat/register-hooks.php';

		// Build an array of searchable instances.
		$objects = [];
		foreach (MainClass::components() as $componentName => $instance) {
			if (! is_object($instance)) {
				continue;
			}

			$objects[$componentName] = get_class($instance);
		}

		$hookFunctions = [];

		// Loop over each class registering hooks.
		foreach ($runtime->get_calls() as $className => $hooks) {
			$count = 0;

			if ($className === 'BracketSpace\\Notification\\XXNAMESPACEXX\\Runtime') {
				$callbackObjectName = '$this';
			} else {
				$componentName = array_search($className, $objects, true);
				if (! $componentName) {
					WP_CLI::warning(
						str_replace('BracketSpace\\Notification\\XXNAMESPACEXX\\', '', $className) .
						' skipped, no instance available'
					);
					continue;
				}
				$callbackObjectName = "\$this->component('" . $componentName . "')";
			}

			foreach ($hooks as $hook) {
				$hookFunctions[] = sprintf(
					"add_%s('%s', [%s, '%s'], %d, %d);",
					$hook['type'],
					$hook['name'],
					$callbackObjectName,
					$hook['callback'],
					$hook['priority'],
					$hook['arg_count']
				);

				$count++;
			}

			WP_CLI::log(
				str_replace('BracketSpace\\Notification\\XXNAMESPACEXX\\', '', $className)
				. ' added ' . $count . ' hooks'
			);
		}

		// Clear the hooks file.
		if ($filesystem->exists($hooksFile)) {
			$filesystem->delete($hooksFile);
		}

		$fileHeader = '<?php
/**
 * Hooks compatibilty file.
 *
 * Automatically generated with `wp notification-slug-namexx dump-hooks`.
 *
 * @package notification/slug-namexx
 */

/** @var \BracketSpace\Notification\XXNAMESPACEXX\Runtime $this */

// phpcs:disable
';

		// Save the content.
		$filesystem->put_contents($hooksFile, $fileHeader . implode("\n", $hookFunctions) . "\n");

		WP_CLI::success('All hooks dumped!');
	}
}
