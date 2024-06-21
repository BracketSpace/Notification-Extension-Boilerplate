<?php
/**
 * Register Triggers.
 *
 * @package notification/slug-namexx
 */

declare(strict_types=1);

namespace BracketSpace\Notification\XXNAMESPACEXX\Repository;

use BracketSpace\Notification\Register;

/**
 * Trigger Repository.
 */
class TriggerRepository
{
	/**
	 * @return void
	 */
	public static function register()
	{
		if (! \Notification::settings()->getSetting('triggers/slug-namexx/enable')) {
			return;
		}

		Register::trigger(new Trigger\ExampleTrigger());
	}
}
