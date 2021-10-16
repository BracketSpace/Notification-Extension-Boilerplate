<?php
/**
 * ExampleTrigger Trigger
 *
 * @package notification/slug-namexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX\Repository\Trigger;

use BracketSpace\Notification\Abstracts\Trigger as TriggerAbstract;
use BracketSpace\Notification\Defaults\MergeTag;

/**
 * ExampleTrigger Trigger
 */
class ExampleTrigger extends TriggerAbstract {

	/**
	 * Constructor
	 */
	public function __construct() {

		parent::__construct(
			'slug-namexx/example_trigger',
			__( 'Example Trigger', 'notification-slug-namexx' )
		);

		$this->add_action( 'any_action_hook' );

		$this->set_group( __( 'Nicenamexx', 'notification-slug-namexx' ) );

		$this->set_description(
			__( 'Fires when **put a description here**', 'notification-slug-namexx' )
		);

	}

	/**
	 * Sets up the trigger context
	 *
	 * @since  [Next]
	 * @return false|void False if no notifications should be sent
	 */
	public function context() {
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
			'name'     => __( 'Trigger property', 'notification-slug-namexx' ),
			'resolver' => function ( $trigger ) {
				return $trigger->prop;
			},
		] ) );
	}

}
