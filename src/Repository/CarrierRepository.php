<?php
/**
 * Register Carriers.
 *
 * @package notification/slug-namexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX\Repository;

use BracketSpace\Notification\XXNAMESPACEXX\Repository\Carrier;
use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\DocHooks\Helper as DocHooksHelper;
use BracketSpace\Notification\Register;

/**
 * Carrier Repository.
 */
class CarrierRepository {

	/**
	 * @return void
	 */
	public static function register() {
		if ( notification_get_setting( 'carriers/slug-namexx/enable' ) ) {
			Register::carrier( DocHooksHelper::hook( new Carrier\ExampleCarrier() ) );
		}
	}

}
