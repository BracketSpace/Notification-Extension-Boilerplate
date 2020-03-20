<?php
/**
 * ExampleTrigger Trigger
 *
 * @package notification-slugnamexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX\Elements\Trigger;

use BracketSpace\Notification\Abstracts;
use BracketSpace\Notification\Defaults\MergeTag;

/**
 * ExampleTrigger Trigger
 */
class ExampleTrigger extends Abstracts\Trigger {

	/**
	 * Constructor
	 */
	public function __construct() {

		parent::__construct(
			'slugnamexx/example_trigger',
			__( 'Example Trigger', 'notification-slugnamexx' )
		);

		$this->add_action( 'any_action_hook' );

		$this->set_group( __( 'Nicenamexx', 'notification-slugnamexx' ) );

		$this->set_description(
			__( 'Fires when **put a description here**', 'notification-slugnamexx' )
		);

	}

	/**
	 * Trigger's action
	 *
	 * @since  [Next]
	 * @return mixed void or false if no notifications should be sent
	 */
	public function action() {

		$this->prop = 'test';

	}

	/**
	 * Registers Merge Tags
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function merge_tags() {

		$this->add_merge_tag( new MergeTag\StringTag( [
			'slug'     => 'prop',
			'name'     => __( 'Trigger property', 'notification-slugnamexx' ),
			'resolver' => function( $trigger ) {
				return $trigger->prop;
			},
		] ) );

	}

}
