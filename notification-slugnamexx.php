<?php
/**
 * Plugin Name: Notification : Nicenamexx
 * Description: Extension for Notification plugin
 * Plugin URI: https://bracketspace.com
 * Author: BracketSpace
 * Author URI: https://bracketspace.com
 * Version: 1.0.0
 * License: GPL3
 * Text Domain: notification-slugnamexx
 * Domain Path: /src/languages
 *
 * @package notification/slugnamexx
 */

/**
 * Things @todo. Replace globally these values:
 * - XXNAMESPACEXX
 * - Nicenamexx
 * - slugnamexx
 *
 * You can do this with this simple command replacing the sed parts:
 * find . -type f \( -iname \*.php -o -iname \*.txt -o -iname \*.json -o -iname \*.js \) -exec sed -i 's/XXNAMESPACEXX/YOURNAMESPACE/g; s/Nicenamexx/Your Nicename/g; s/slugnamexx/yourslug/g' {} +
 *
 * Or just execute the rename.sh script
 */

if ( ! class_exists( 'NotificationXXNAMESPACEXX' ) ) :

	/**
	 * NotificationXXNAMESPACEXX class
	 */
	class NotificationXXNAMESPACEXX {

		/**
		 * Runtime object
		 *
		 * @var BracketSpace\Notification\XXNAMESPACEXX\Runtime
		 */
		protected static $runtime;

		/**
		 * Initializes the plugin runtime
		 *
		 * @since  [Next]
		 * @param  string $plugin_file Main plugin file.
		 * @return BracketSpace\Notification\XXNAMESPACEXX\Runtime
		 */
		public static function init( $plugin_file ) {
			if ( ! isset( self::$runtime ) ) {
				// Autoloading.
				require_once dirname( $plugin_file ) . '/vendor/autoload.php';
				// Temporary fix for wrong template package, @see: https://github.com/TypistTech/imposter/issues/130.
				require_once dirname( $plugin_file ) . '/vendor/micropackage/templates/src/functions/template.php';
				self::$runtime = new BracketSpace\Notification\XXNAMESPACEXX\Runtime( $plugin_file );
			}

			return self::$runtime;
		}

		/**
		 * Gets runtime component
		 *
		 * @since  [Next]
		 * @return array
		 */
		public static function components() {
			return isset( self::$runtime ) ? self::$runtime->components() : [];
		}

		/**
		 * Gets runtime component
		 *
		 * @since  [Next]
		 * @param  string $component_name Component name.
		 * @return mixed
		 */
		public static function component( $component_name ) {
			return isset( self::$runtime ) ? self::$runtime->component( $component_name ) : null;
		}

		/**
		 * Gets runtime object
		 *
		 * @since  [Next]
		 * @return BracketSpace\Notification\Runtime
		 */
		public static function runtime() {
			return self::$runtime;
		}

	}

endif;

add_action( 'notification/init', function() {
	NotificationXXNAMESPACEXX::init( __FILE__ )->init();
}, 2 );
