<?php
/**
 * ExampleRecipient recipient
 *
 * @package notification/slug-namexx
 */

declare(strict_types=1);

namespace BracketSpace\Notification\XXNAMESPACEXX\Repository\Recipient;

use BracketSpace\Notification\Repository\Recipient\BaseRecipient;
use BracketSpace\Notification\Repository\Field;
use BracketSpace\Notification\Database\Queries\UserQueries;

/**
 * ExampleRecipient recipient
 */
class ExampleRecipient extends BaseRecipient
{
	/**
	 * ExampleRecipient constructor
	 *
	 * @since [Next]
	 */
	public function __construct()
	{
		parent::__construct(
			[
				'slug' => 'user',
				'name' => __('User', 'notification'),
				'default_value' => get_current_user_id(),
			]
		);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @since  [Next]
	 * @param  string $value Raw value saved by the user.
	 * @return array<mixed>
	 */
	public function parseValue($value = '')
	{
		if (empty($value)) {
			$value = [$this->getDefaultValue()];
		}

		return [$value];
	}

	/**
	 * {@inheritdoc}
	 *
	 * @since  [Next]
	 * @return Fillable
	 */
	public function input()
	{
		$opts = [];

		foreach (UserQueries::all() as $user) {
			$opts[$user['ID']] = esc_html($user['display_name']) . ' (ID: ' . $user['ID'] . ')';
		}

		return new Field\SelectField(
			[
				'label' => __('Recipient', 'notification'),
				'name' => 'recipient',
				'css_class' => 'recipient-value',
				'value' => $this->getDefaultValue(),
				'pretty' => true,
				'options' => $opts,
			]
		);
	}
}
