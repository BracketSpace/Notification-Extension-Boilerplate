<?php
/**
 * ExampleRecipient recipient
 *
 * @package notification-slugnamexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX\Elements\Recipient;

use BracketSpace\Notification\Abstracts;
use BracketSpace\Notification\Defaults\Field;
use BracketSpace\Notification\Traits\Users;

/**
 * ExampleRecipient recipient
 */
class ExampleRecipient extends Abstracts\Recipient {

	use Users;

	/**
	 * ExampleRecipient constructor
	 *
	 * @since [Next]
	 */
	public function __construct() {
		parent::__construct( [
			'slug'          => 'user',
			'name'          => __( 'User', 'notification' ),
			'default_value' => get_current_user_id(),
		] );
	}

	/**
	 * {@inheritdoc}
	 *
	 * @since  [Next]
	 * @param  string $value Raw value saved by the user.
	 * @return array         Array of resolved values
	 */
	public function parse_value( $value = '' ) {

		if ( empty( $value ) ) {
			$value = [ $this->get_default_value() ];
		}

		return [ $value ];

	}

	/**
	 * {@inheritdoc}
	 *
	 * @since  [Next]
	 * @return object
	 */
	public function input() {

		$users = $this->get_all_users();

		$opts = [];

		foreach ( $users as $user ) {
			$opts[ $user->ID ] = esc_html( $user->display_name ) . ' (ID: ' . $user->ID . ')';
		}

		return new Field\SelectField( [
			'label'     => __( 'Recipient', 'notification' ),
			'name'      => 'recipient',
			'css_class' => 'recipient-value',
			'value'     => $this->get_default_value(),
			'pretty'    => true,
			'options'   => $opts,
		] );

	}

}
