<?php
/**
 * Templates class
 *
 * @package notification/slug-namexx
 */

declare(strict_types=1);

namespace BracketSpace\Notification\XXNAMESPACEXX\Core;

use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Templates\Storage;
use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Templates\Template;

/**
 * Templates class
 */
class Templates
{
	/**
	 * Templates storage name.
	 */
	const TEMPLATE_STORAGE = 'templates';

	/**
	 * Renders the template
	 *
	 * @since  [Next]
	 * @param  string       $name Template name.
	 * @param  array<mixed> $vars Template variables.
	 * @return void
	 */
	public static function render(string $name, array $vars = [])
	{
		self::create($name, $vars)->render();
	}

	/**
	 * Gets the template string
	 *
	 * @since  [Next]
	 * @param  string       $name Template name.
	 * @param  array<mixed> $vars Template variables.
	 * @return string
	 */
	public static function get(string $name, array $vars = [])
	{
		return self::create($name, $vars)->output();
	}

	/**
	 * Creates the Template object
	 *
	 * @since  [Next]
	 * @param  string       $name Template name.
	 * @param  array<mixed> $vars Template variables.
	 * @return Template
	 */
	public static function create(string $name, array $vars = []): Template
	{
		return new Template(self::TEMPLATE_STORAGE, $name, $vars);
	}

	/**
	 * Renders the template
	 *
	 * @since  [Next]
	 * @return void
	 */
	public static function registerStorage()
	{
		Storage::add(self::TEMPLATE_STORAGE, \NotificationXXNAMESPACEXX::fs()->path('resources/templates'));
	}
}
