<?php
/**
 * Settings
 *
 * @package notification/slug-namexx
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

		$triggers = $settings->add_section( __( 'Triggers', 'notification-slug-namexx' ), 'triggers' );

		$triggers->add_group( __( 'Nicenamexx', 'notification-slug-namexx' ), 'slug-namexx' )
			->add_field( [
				'name'     => __( 'Enable', 'notification-slug-namexx' ),
				'slug'     => 'enable',
				'default'  => 'true',
				'addons'   => [
					'label' => __( 'Enable Nicenamexx Triggers', 'notification-slug-namexx' ),
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

		$carriers = $settings->add_section( __( 'Carriers', 'notification-slug-namexx' ), 'carriers' );

		$carriers->add_group( __( 'Nicenamexx', 'notification-slug-namexx' ), 'slug-namexx' )
			->add_field( [
				'name'     => __( 'Enable', 'notification-slug-namexx' ),
				'slug'     => 'enable',
				'default'  => 'true',
				'addons'   => [
					'label' => __( 'Enable Nicenamexx Carrier', 'notification-slug-namexx' ),
				],
				'render'   => [ new CoreFields\Checkbox(), 'input' ],
				'sanitize' => [ new CoreFields\Checkbox(), 'sanitize' ],
			] );

	}

}
