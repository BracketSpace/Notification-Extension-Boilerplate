<?php
/**
 * Register Recipients.
 *
 * @package notification/slug-namexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX\Repository;

use BracketSpace\Notification\XXNAMESPACEXX\Repository\Recipient;
use BracketSpace\Notification\Register;

/**
 * Recipient Repository.
 */
class RecipientRepository {

	/**
	 * @return void
	 */
	public static function register() {
		Register::recipient( 'example-carrier', new Recipient\ExampleRecipient() );
	}

}
