<?php
/**
 * Settings
 *
 * @package notification/slugnamexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX\Admin;

use BracketSpace\Notification\Utils\Settings\CoreFields;

/**
 * Settings class
 */
class Settings {

	/**
	 * Registers trigger settings
	 *
	 * @since  [Next]
	 * @param  object $settings Settings API object.
	 * @return void
	 */
	public function register_trigger_settings( $settings ) {

		$triggers = $settings->add_section( __( 'Triggers', 'notification-slugnamexx' ), 'triggers' );

		$triggers->add_group( __( 'Nicenamexx', 'notification-slugnamexx' ), 'slugnamexx' )
			->add_field( [
				'name'     => __( 'Enable', 'notification-slugnamexx' ),
				'slug'     => 'enable',
				'default'  => 'true',
				'addons'   => [
					'label' => __( 'Enable Nicenamexx Triggers', 'notification' ),
				],
				'render'   => [ new CoreFields\Checkbox(), 'input' ],
				'sanitize' => [ new CoreFields\Checkbox(), 'sanitize' ],
			] );

	}

	/**
	 * Registers carrier settings
	 *
	 * @since  [Next]
	 * @param  object $settings Settings API object.
	 * @return void
	 */
	public function register_carrier_settings( $settings ) {

		$carriers = $settings->add_section( __( 'Carriers', 'notification-slugnamexx' ), 'carriers' );

		$carriers->add_group( __( 'Nicenamexx', 'notification-slugnamexx' ), 'slugnamexx' )
			->add_field( [
				'name'     => __( 'Enable', 'notification-slugnamexx' ),
				'slug'     => 'enable',
				'default'  => 'true',
				'addons'   => [
					'label' => __( 'Enable Nicenamexx Carrier', 'notification' ),
				],
				'render'   => [ new CoreFields\Checkbox(), 'input' ],
				'sanitize' => [ new CoreFields\Checkbox(), 'sanitize' ],
			] );

	}

}
