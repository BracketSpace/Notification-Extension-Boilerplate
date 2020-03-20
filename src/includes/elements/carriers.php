<?php
/**
 * Carriers
 *
 * @package notification-slugnamexx
 */

use BracketSpace\Notification\XXNAMESPACEXX\Elements\Carrier;
use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\DocHooks\Helper as DocHooksHelper;

if ( notification_get_setting( 'carriers/slugnamexx/enable' ) ) {
	notification_register_carrier( DocHooksHelper::hook( new Carrier\ExampleCarrier() ) );
}
