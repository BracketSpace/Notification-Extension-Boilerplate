<?php
/**
 * Hooks compatibilty file.
 *
 * Automatically generated with `wp notification-slug-namexx dump-hooks`.
 *
 * @package notification/slug-namexx
 */

/** @var \BracketSpace\Notification\XXNAMESPACEXX\Runtime $this */

// phpcs:disable
add_action('notification/init', [$this, 'elements'], 10, 0);
add_action('init', [$this->component('BracketSpace\Notification\XXNAMESPACEXX\Dependencies\Micropackage\Internationalization\Internationalization'), 'load_translation'], 10, 0);
add_filter('notification/scripts/allowed_hooks', [$this->component('BracketSpace\Notification\XXNAMESPACEXX\Admin\Scripts'), 'addScreen'], 10, 1);
add_action('notification/scripts', [$this->component('BracketSpace\Notification\XXNAMESPACEXX\Admin\Scripts'), 'enqueueScripts'], 10, 1);
add_action('notification/settings/register', [$this->component('BracketSpace\Notification\XXNAMESPACEXX\Admin\Settings'), 'registerTriggerSettings'], 20, 1);
add_action('notification/settings/register', [$this->component('BracketSpace\Notification\XXNAMESPACEXX\Admin\Settings'), 'registerCarrierSettings'], 30, 1);
