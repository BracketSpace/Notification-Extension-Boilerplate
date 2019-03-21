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
 * Domain Path: /languages
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

require_once 'vendor/autoload.php';

function notification_slugnamexx_runtime() {

	global $notification_slugnamexx_runtime;

	if ( empty( $notification_slugnamexx_runtime ) ) {
		$notification_slugnamexx_runtime = new BracketSpace\Notification\XXNAMESPACEXX\Runtime( __FILE__ );
	}

	return $notification_slugnamexx_runtime;

}

/**
 * Boot up the plugin
 */
add_action( 'notification/boot/initial', function() {

	/**
	 * Requirements check
	 */
	$requirements = new BracketSpace\Notification\XXNAMESPACEXX\Utils\Requirements( __( 'Notification : Nicenamexx', 'notification-slugnamexx' ), [
		'php'          => '5.6',
		'wp'           => '4.9',
		'notification' => true, // Add specific version here if you want.
	] );

	$requirements->add_check( 'notification', require 'src/inc/requirements/notification.php' );

	if ( ! $requirements->satisfied() ) {
		add_action( 'admin_notices', [ $requirements, 'notice' ] );
		return;
	}

	$runtime = notification_slugnamexx_runtime();
	$runtime->boot();

} );
