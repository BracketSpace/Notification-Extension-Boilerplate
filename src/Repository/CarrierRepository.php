<?php
/**
 * Register Carriers.
 *
 * @package notification/slug-namexx
 */

declare(strict_types=1);

namespace BracketSpace\Notification\XXNAMESPACEXX\Repository;

use BracketSpace\Notification\Register;

/**
 * Carrier Repository.
 */
class CarrierRepository
{
	/**
	 * @return void
	 */
	public static function register()
	{
		if (! \Notification::settings()->getSetting('carriers/slug-namexx/enable')) {
			return;
		}

		Register::carrier(new Carrier\ExampleCarrier());
	}
}
