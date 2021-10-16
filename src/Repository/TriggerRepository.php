<?php
/**
 * Register Triggers.
 *
 * @package notification/slug-namexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX\Repository;

use BracketSpace\Notification\XXNAMESPACEXX\Repository\Trigger;
use BracketSpace\Notification\Register;

/**
 * Trigger Repository.
 */
class TriggerRepository {

	/**
	 * @return void
	 */
	public static function register() {
		if ( notification_get_setting( 'triggers/slug-namexx/enable' ) ) {
			Register::trigger( new Trigger\ExampleTrigger() );
		}
	}

}
