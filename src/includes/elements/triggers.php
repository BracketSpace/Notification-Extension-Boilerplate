<?php
/**
 * Triggers
 *
 * @package notification-slugnamexx
 */

use BracketSpace\Notification\XXNAMESPACEXX\Elements\Trigger;

if ( notification_get_setting( 'triggers/slugnamexx/enable' ) ) {
	notification_register_trigger( new Trigger\ExampleTrigger() );
}
