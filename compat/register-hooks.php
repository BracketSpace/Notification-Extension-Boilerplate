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
add_action('init', [$this->component('i18n'), 'load_translation'], 10, 0);
add_filter('notification/scripts/allowed_hooks', [$this->component('scripts'), 'addScreen'], 10, 1);
add_action('notification/scripts', [$this->component('scripts'), 'enqueueScripts'], 10, 1);
add_action('notification/settings/register', [$this->component('admin/settings'), 'registerTriggerSettings'], 20, 1);
add_action('notification/settings/register', [$this->component('admin/settings'), 'registerCarrierSettings'], 30, 1);
