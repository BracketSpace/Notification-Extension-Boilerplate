<?php
/**
 * This file dumps all the Dochooks to an external file: /inc/hooks.php
 * It's used only when OP Cache has `save_comments` setting saved to false.
 *
 * @usage: wp eval-file dump-hooks.php
 * 	       wp eval-file wp-content/plugins/notification-slugnamexx/bin/dump-hooks.php
 *
 * @package notification/slugnamexx
 */

$runtime    = NotificationXXNAMESPACEXX::runtime();
$filesystem = $runtime->get_filesystem( 'includes' );
$hooks_file = 'hooks.php';
$namespace  = 'BracketSpace\\Notification\\XXNAMESPACEXX\\';

// Build an array of searchable instances.
$objects = [];
foreach ( NotificationXXNAMESPACEXX::components() as $component_name => $instance ) {
	if ( is_object( $instance ) ) {
		$objects[ $component_name ] = get_class( $instance );
	}
}

$hook_functions = [];

// Loop over each class who added own hooks.
foreach ( $runtime->get_calls() as $class_name => $hooks ) {
	$count = 0;

	if ( $namespace . 'Runtime' === $class_name ) {
		$callback_object_name = '$this';
	} else {
		$component_name = array_search( $class_name, $objects );
		if ( ! $component_name ) {
			WP_CLI::warning( str_replace( $namespace, '', $class_name ) . ' skipped, no instance available' );
			continue;
		}
		$callback_object_name = '$this->component( \'' . $component_name . '\' )';
	}

	foreach ( $hooks as $hook ) {
		$hook_functions[] = sprintf(
			"add_%s( '%s', [ %s, '%s' ], %d, %d );",
			$hook['type'],
			$hook['name'],
			$callback_object_name,
			$hook['callback'],
			$hook['priority'],
			$hook['arg_count']
		);

		$count++;
	}

	WP_CLI::log( str_replace( $namespace, '', $class_name ) . ' added ' . $count . ' hooks' );
}


// Clear the hooks file.
if ( $filesystem->exists( $hooks_file ) ) {
	$filesystem->delete( $hooks_file );
}

// Save the content.
$file_content = '<?php
/**
 * Hooks compatibilty file.
 *
 * Automatically generated with bin/dump-hooks.php file.
 *
 * @package notification/slugnamexx
 */

// phpcs:disable
';

$file_content .= implode( "\r\n", $hook_functions );
$file_content .= "\r\n";

$filesystem->put_contents( $hooks_file, $file_content );

WP_CLI::success( 'All the hooks dumped!' );
