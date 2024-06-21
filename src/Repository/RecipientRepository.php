<?php
/**
 * Register Recipients.
 *
 * @package notification/slug-namexx
 */

declare(strict_types=1);

namespace BracketSpace\Notification\XXNAMESPACEXX\Repository;

use BracketSpace\Notification\Register;

/**
 * Recipient Repository.
 */
class RecipientRepository
{
	/**
	 * @return void
	 */
	public static function register()
	{
		Register::recipient('example-carrier', new Recipient\ExampleRecipient());
	}
}
