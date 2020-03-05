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
				require_once dirname( $plugin_file ) . '/src/classes/Runtime.php';
				self::$runtime = new BracketSpace\Notification\XXNAMESPACEXX\Runtime( $plugin_file );
			}

			return self::$runtime;
		}

		/**
		 * Gets runtime component
		 *
		 * @since  [Next]
		 * @param  string $component_name Component name.
		 * @return mixed
		 */
		public static function component( $component_name ) {
			if ( isset( self::$runtime, self::$runtime->{ $component_name } ) ) {
				return self::$runtime->{ $component_name };
			}
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
