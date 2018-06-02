<?php
/**
 * Enqueues scripts
 *
 * @package notification/slugnamexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX;

use BracketSpace\Notification\Utils\Files;

/**
 * Scripts class
 */
class Scripts {

	/**
	 * Files class
     *
	 * @var object
	 */
	private $files;

	/**
	 * Scripts constructor
	 *
	 * @since 1.0.0
	 * @param Files $files Files class.
	 */
	public function __construct( Files $files ) {
		$this->files = $files;
	}

	/**
	 * Enqueue scripts and styles for admin
     *
	 * @param  string $page_hook current page hook.
	 * @return void
	 */
	public function enqueue_scripts( $page_hook ) {

		wp_enqueue_style( 'notification-slugnamexx', $this->files->asset_url( 'css', 'style.css' ), array(), $this->files->asset_mtime( 'css', 'style.css' ) );
		wp_enqueue_script( 'notification-slugnamexx', $this->files->asset_url( 'js', 'scripts.min.js' ), array( 'jquery' ), $this->files->asset_mtime( 'js', 'scripts.min.js' ), true );

		wp_localize_script( 'notification-slugnamexx', 'notification_slugnamexx', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		) );

	}


}
