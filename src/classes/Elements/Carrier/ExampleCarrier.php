<?php
/**
 * ExampleCarrier Carrier
 *
 * @package notification-slugnamexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX\Elements\Carrier;

use BracketSpace\Notification\Interfaces\Triggerable;
use BracketSpace\Notification\Abstracts;
use BracketSpace\Notification\Defaults\Field;

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
		parent::__construct( 'example-carrier', __( 'Example Carrier', 'notification-slugnamexx' ) );
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
			'label' => __( 'Subject', 'notification' ),
			'name'  => 'subject',
		] ) );

		$this->add_form_field( new Field\RecipientsField( [
			'carrier' => $this->get_slug(),
		] ) );

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
