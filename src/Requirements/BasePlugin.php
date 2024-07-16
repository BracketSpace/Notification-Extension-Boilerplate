<?php
/**
 * Custom requirement
 *
 * @package notification/slug-namexx
 */

declare(strict_types=1);

namespace BracketSpace\Notification\XXNAMESPACEXX\Requirements;

use BracketSpace\Notification\XXNAMESPACEXX\Dependencies\Micropackage\Requirements;

/**
 * BasePlugin checker
 */
class BasePlugin extends Requirements\Abstracts\Checker
{
	/**
	 * Checker name
	 *
	 * @var string
	 */
	protected $name = 'notification';

	/**
	 * Checks if the requirement is met
	 *
	 * @param  string $value Requirement.
	 * @return void
	 */
	public function check( $value )
	{

		if (! class_exists('Notification')) {
			$this->add_error('The Notification plugin is required to be active.');
		}

		if (! version_compare(\Notification::version(), $value, '<')) {
			return;
		}

		$this->add_error(
			sprintf(
				// Translators: 1. Required Notification version, 2. Used Notification version.
				__(
					'Minimum required version of Notification plugin is %1$s. Your version is %2$s',
					'notification-slug-namexx'
				),
				$value,
				\Notification::version()
			)
		);
	}
}
