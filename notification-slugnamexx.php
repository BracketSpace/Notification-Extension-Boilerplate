<?php
/**
 * Plugin Name: Notification : Nicenamexx
 * Description: Extension for Notification plugin
 * Plugin URI: https://bracketspace.com
 * Author: Author
 * Author URI: https://bracketspace.com
 * Version: 1.0.0
 * License: GPL3
 * Text Domain: notification-slugnamexx
 * Domain Path: /languages
 *
 * @package notification/slugnamexx
 */

/**
 * Thing @todo. Replace globally these values:
 * - XXNAMESPACEXX
 * - Nicenamexx
 * - slugnamexx
 *
 * You can do this with this simple command replacing the sed parts:
 * find . -type f \( -iname \*.php -o -iname \*.txt  -o -iname \*.json \) -exec sed -i 's/XXNAMESPACEXX/YOURNAMESPACE/g; s/Nicenamexx/Your Nicename/g; s/slugnamexx/yourslug/g' {} +
 *
 * Or just executing rename.sh script
 */

/**
 * Plugin's autoload function
 *
 * @param  string $class class name.
 * @return mixed         false if not plugin's class or void
 */
function notification_slugnamexx_autoload( $class ) {

	$parts      = explode( '\\', $class );
	$namespaces = array( 'BracketSpace', 'Notification', 'XXNAMESPACEXX' );

	foreach ( $namespaces as $namespace ) {
		if ( array_shift( $parts ) !== $namespace ) {
			return false;
		}
	}

	$file = trailingslashit( dirname( __FILE__ ) ) . trailingslashit( 'class' ) . implode( '/', $parts ) . '.php';

	if ( file_exists( $file ) ) {
		require_once $file;
	}

}
spl_autoload_register( 'notification_slugnamexx_autoload' );

/**
 * Boot up the plugin in theme's action just in case the Notification
 * is used as a bundle.
 */
add_action( 'after_setup_theme', function() {

	/**
	 * Requirements check
	 */
	$requirements = new BracketSpace\Notification\XXNAMESPACEXX\Utils\Requirements( __( 'Notification : Nicenamexx', 'notification-slugnamexx' ), array(
		'php'          => '5.6',
		'wp'           => '4.9',
		'notification' => true, // Add specific version here if you want.
	) );

	/**
	 * Tests if Notification plugin is active
	 * We have to do it like this in case the plugin
	 * is loaded as a bundle.
	 *
	 * @param string $comparsion value to test.
	 * @param object $r          requirements.
	 * @return void
	 */
	function notification_slugnamexx_check_base_plugin( $comparsion, $r ) {
		if ( ! function_exists( 'notification_runtime' ) ) {
			$r->add_error( __( '<a href="https://wordpress.org/plugins/notification/" target="_blank">Notification</a> plugin active', 'notification-woocommerce' ) );
			return;
		}

		if ( true !== $comparsion ) {
			if ( ! defined( 'NOTIFICATION_VERSION' ) ) {
				$r->add_error( __( 'Notification plugin updated to the latest version', 'notification-woocommerce' ) );
			} elseif ( version_compare( $comparsion, NOTIFICATION_VERSION, '>' ) ) {
				// translators: version number.
				$r->add_error( sprintf( __( 'Notification plugin in version at least %s', 'notification-woocommerce' ), $comparsion ) );
			}
		}
	}

	$requirements->add_check( 'notification', 'notification_slugnamexx_check_base_plugin' );

	if ( ! $requirements->satisfied() ) {
		add_action( 'admin_notices', array( $requirements, 'notice' ) );
		return;
	}

	$files_class = new BracketSpace\Notification\Utils\Files( __FILE__ );
	$view_class  = new BracketSpace\Notification\Utils\View( $files_class );
	$scripts     = notification_add_doc_hooks( new BracketSpace\Notification\XXNAMESPACEXX\Scripts( $files_class ) );

} );
