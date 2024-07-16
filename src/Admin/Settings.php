<?php
/**
 * Settings
 *
 * @package notification/slug-namexx
 */

declare(strict_types=1);

namespace BracketSpace\Notification\XXNAMESPACEXX\Admin;

use BracketSpace\Notification\Utils\Settings\CoreFields;

/**
 * Settings class
 */
class Settings
{
	/**
	 * Registers trigger settings
	 *
	 * @action notification/settings/register 20
	 *
	 * @since  [Next]
	 * @param  \BracketSpace\Notification\Utils\Settings $settings Settings API object.
	 * @return void
	 */
	public function registerTriggerSettings($settings)
	{
		$triggers = $settings->addSection(__('Triggers', 'notification-slug-namexx'), 'triggers');

		$triggers->addGroup(__('Nicenamexx', 'notification-slug-namexx'), 'slug-namexx')
			->addField(
				[
					'name' => __('Enable', 'notification-slug-namexx'),
					'slug' => 'enable',
					'default' => 'true',
					'addons' => [
						'label' => __('Enable Nicenamexx Triggers', 'notification-slug-namexx'),
					],
					'render' => [new CoreFields\Checkbox(), 'input'],
					'sanitize' => [new CoreFields\Checkbox(), 'sanitize'],
				]
			);
	}

	/**
	 * Registers carrier settings
	 *
	 * @action notification/settings/register 30
	 *
	 * @since  [Next]
	 * @param  \BracketSpace\Notification\Utils\Settings $settings Settings API object.
	 * @return void
	 */
	public function registerCarrierSettings($settings)
	{
		$carriers = $settings->addSection(__('Carriers', 'notification-slug-namexx'), 'carriers');

		$carriers->addGroup(__('Nicenamexx', 'notification-slug-namexx'), 'slug-namexx')
			->addField(
				[
					'name' => __('Enable', 'notification-slug-namexx'),
					'slug' => 'enable',
					'default' => 'true',
					'addons' => [
						'label' => __('Enable Nicenamexx Carrier', 'notification-slug-namexx'),
					],
					'render' => [new CoreFields\Checkbox(), 'input'],
					'sanitize' => [new CoreFields\Checkbox(), 'sanitize'],
				]
			);
	}
}
