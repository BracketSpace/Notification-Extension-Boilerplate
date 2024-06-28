<?php
/**
 * Plugin Name: Notification : Nicenamexx
 * Description: Extension for Notification plugin
 * Plugin URI: https://bracketspace.com
 * Author: BracketSpace
 * Author URI: https://bracketspace.com
 * Version: 1.0.0
 * License: GPL3
 * Text Domain: notification-slug-namexx
 * Domain Path: /resources/languages
 *
 * @package notification/slug-namexx
 *
 * phpcs:disable PSR1.Files.SideEffects.FoundWithSymbols
 * phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 * phpcs:disable Squiz.Classes.ClassFileName.NoMatch
 */

declare(strict_types=1);

/**
 * Things @todo. Replace globally these values:
 * - XXNAMESPACEXX
 * - Nicenamexx
 * - slug_namexx
 * - slug-namexx
 * - notificationSlugNamexx
 *
 * You can do this with this simple command replacing the sed parts:
 *
 * find . -type f \( -iname \*.php -o -iname \*.txt -o -iname \*.json -o -iname \*.js \) -exec \
 * sed -i 's/XXNAMESPACEXX/YOURNAMESPACE/g; s/Nicenamexx/Your Nicename/g; \
 * s/slug_namexx/your_slug/g; s/slug-namexx/your-slug/g; s/notificationSlugNamexx/yourSlug/g' {} +
 *
 * Or just execute the rename.sh script
 */

if (! class_exists('NotificationXXNAMESPACEXX')) :

	/**
	 * NotificationXXNAMESPACEXX class
	 */
	class NotificationXXNAMESPACEXX
	{
		/**
		 * Runtime object
		 *
		 * @var ?BracketSpace\Notification\XXNAMESPACEXX\Runtime
		 */
		protected static $runtime;

		/**
		 * Initializes the plugin runtime
		 *
		 * @since  [Next]
		 * @param  string $pluginFile Main plugin file.
		 * @return BracketSpace\Notification\XXNAMESPACEXX\Runtime
		 */
		public static function init($pluginFile)
		{
			if (self::$runtime === null) {
				// Autoloading.
				require_once dirname($pluginFile) . '/vendor/autoload.php';
				self::$runtime = new BracketSpace\Notification\XXNAMESPACEXX\Runtime($pluginFile);
			}

			return self::$runtime;
		}

		/**
		 * Gets runtime component
		 *
		 * @since  [Next]
		 * @return array<class-string,mixed>
		 */
		public static function components()
		{
			return self::$runtime !== null ? self::$runtime->components() : [];
		}

		/**
		 * Gets runtime component
		 *
		 * @since  [Next]
		 * @param  string $componentName Component name.
		 * @return mixed
		 */
		public static function component($componentName)
		{
			return self::$runtime !== null ? self::$runtime->component($componentName) : null;
		}

		/**
		 * Gets runtime object
		 *
		 * @since  [Next]
		 * @return ?BracketSpace\Notification\XXNAMESPACEXX\Runtime
		 */
		public static function runtime()
		{
			return self::$runtime;
		}

		/**
		 * Gets plugin filesystem
		 *
		 * @since  [Next]
		 * @throws \Exception When runtime wasn't invoked yet.
		 * @return ?\BracketSpace\Notification\XXNAMESPACEXX\Dependencies\Micropackage\Filesystem\Filesystem
		 */
		public static function fs()
		{
			if (self::$runtime === null) {
				throw new \Exception('Runtime has not been invoked yet.');
			}

			return self::$runtime->getFilesystem();
		}
	}

endif;

add_action(
	'notification/init',
	static function () {
		NotificationXXNAMESPACEXX::init(__FILE__)->init();
	},
	2
);
