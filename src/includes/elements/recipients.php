<?php
/**
 * Triggers
 *
 * @package notification-slugnamexx
 */

use BracketSpace\Notification\XXNAMESPACEXX\Elements\Recipient;

if ( notification_get_setting( 'carriers/slugnamexx/enable' ) ) {
	notification_register_recipient( 'example-carrier', new Recipient\ExampleRecipient() );
}
