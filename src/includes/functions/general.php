<?php
/**
 * General functions
 *
 * @package notification/slugnamexx
 */

/**
 * Gets one of the plugin filesystems
 *
 * @since  [Next]
 * @param  string $name Filesystem name.
 * @return Filesystem|null
 */
function notification_slugnamexx_filesystem( $name ) {
	return \NotificationXXNAMESPACEXX::runtime()->get_filesystem( $name );
}

/**
 * Prints the template
 * Wrapper for micropackage's template function
 *
 * @since  [Next]
 * @param  string $template_name Template name.
 * @param  array  $vars          Template variables.
 *                               Default: empty.
 * @return void
 */
function notification_slugnamexx_template( $template_name, $vars = [] ) {
	BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Templates\template( 'templates', $template_name, $vars );
}

/**
 * Gets the template
 * Wrapper for micropackage's get_template function
 *
 * @since  [Next]
 * @param  string $template_name Template name.
 * @param  array  $vars          Template variables.
 *                               Default: empty.
 * @return string
 */
function notification_slugnamexx_get_template( $template_name, $vars = [] ) {
	return BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Templates\get_template( 'templates', $template_name, $vars );
}
