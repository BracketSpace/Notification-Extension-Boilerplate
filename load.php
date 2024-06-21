<?php
/**
 * Load file
 *
 * @package notification/slug-namexx
 */

declare(strict_types=1);

/**
 * Load the main plugin file.
 */
require_once __DIR__ . '/notification-slug-namexx.php';

/**
 * Initialize early.
 */
add_action(
	'notification/init',
	static function () {
		NotificationXXNAMESPACEXX::init(__FILE__)->init();
	},
	1
);
