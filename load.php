<?php
/**
 * Load file
 *
 * @package notification/slugnamexx
 */

/**
 * Load the main plugin file.
 */
require_once __DIR__ . '/notification-slugnamexx.php';

/**
 * Initialize early.
 */
add_action( 'notification/init', function() {
	NotificationXXNAMESPACEXX::init( __FILE__ )->init();
}, 1 );
