<?php
/**
 * ExampleTrigger Trigger
 *
 * @package notification/slug-namexx
 */

declare(strict_types=1);

namespace BracketSpace\Notification\XXNAMESPACEXX\Repository\Trigger;

use BracketSpace\Notification\Repository\Trigger\BaseTrigger;
use BracketSpace\Notification\Repository\MergeTag;

/**
 * ExampleTrigger Trigger
 */
class ExampleTrigger extends BaseTrigger
{
	/**
	 * Example property.
	 *
	 * @var  string
	 */
	public $prop;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct(
			'slug-namexx/example_trigger',
			__('Example Trigger', 'notification-slug-namexx')
		);

		$this->addAction('any_action_hook');

		$this->setGroup(__('Nicenamexx', 'notification-slug-namexx'));

		$this->setDescription(
			__('Fires when **put a description here**', 'notification-slug-namexx')
		);
	}

	/**
	 * Sets up the trigger context
	 *
	 * @since  [Next]
	 * @return false|void False if no notifications should be sent
	 */
	public function context()
	{
		$this->prop = 'test';
	}

	/**
	 * Registers Merge Tags
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function mergeTags()
	{
		$this->addMergeTag(
			new MergeTag\StringTag(
				[
					'slug' => 'prop',
					'name' => __('Trigger property', 'notification-slug-namexx'),
					'resolver' => static function ( $trigger ) {
						return $trigger->prop;
					},
				]
			)
		);
	}
}
