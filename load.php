<?php
/**
 * Load file
 *
 * @package notification/slug-namexx
 */

/**
 * Load the main plugin file.
 */
require_once __DIR__ . '/notification-slug-namexx.php';

/**
 * Initialize early.
 */
add_action( 'notification/init', function() {
	NotificationXXNAMESPACEXX::init( __FILE__ )->init();
}, 1 );
