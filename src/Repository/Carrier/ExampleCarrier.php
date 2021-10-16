<?php
/**
 * ExampleCarrier Carrier
 *
 * @package notification/slug-namexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX\Repository\Carrier;

use BracketSpace\Notification\Abstracts;
use BracketSpace\Notification\Defaults\Field;
use BracketSpace\Notification\Interfaces\Triggerable;

/**
 * ExampleCarrier Carrier
 */
class ExampleCarrier extends Abstracts\Carrier {

	/**
	 * Carrier constructor
	 *
	 * @since [Next]
	 */
	public function __construct() {
		parent::__construct( 'example-carrier', __( 'Example Carrier', 'notification-slug-namexx' ) );
	}

	/**
	 * Used to register Carrier form fields
	 * Uses $this->add_form_field();
	 *
	 * @since  [Next]
	 * @return void
	 */
	public function form_fields() {
		$this->add_form_field( new Field\InputField( [
			'label' => __( 'Subject', 'notification-slug-namexx' ),
			'name'  => 'subject',
		] ) );

		$this->add_recipients_field();
	}

	/**
	 * Sends the notification
	 *
	 * @since  [Next]
	 * @param  Triggerable $trigger trigger object.
	 * @return void
	 */
	public function send( Triggerable $trigger ) {
		$data = $this->data;
		file_put_contents( dirname( __FILE__ ) . '/data.log', print_r( $data, true ) . "\r\n\r\n", FILE_APPEND ); // phpcs:ignore
	}

}
