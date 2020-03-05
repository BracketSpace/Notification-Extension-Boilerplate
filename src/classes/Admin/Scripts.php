<?php
/**
 * Enqueues scripts
 *
 * @package notification/slugnamexx
 */

namespace BracketSpace\Notification\XXNAMESPACEXX\Admin;

use BracketSpace\Notification\XXNAMESPACEXX\Vendor\Micropackage\Filesystem\Filesystem;

/**
 * Scripts class
 */
class Scripts {

	/**
	 * Filesystem object
	 *
	 * @var Filesystem
	 */
	private $filesystem;

	/**
	 * Runtime class
	 *
	 * @var object
	 */
	private $runtime;

	/**
	 * Scripts constructor
	 *
	 * @since [Next]
	 * @param object     $runtime Plugin Runtime class.
	 * @param Filesystem $fs      Assets filesystem object.
	 */
	public function __construct( $runtime, Filesystem $fs ) {
		$this->filesystem = $fs;
		$this->runtime    = $runtime;
	}

	/**
	 * Adds a page hook where Notification scripts should be loaded.
	 *
	 * Either:
	 * - Add new page hook to this array
	 * - Create new action if you don't need any core Notification scripts or styles
	 *
	 * @filter notification/scripts/allowed_hooks
	 *
	 * @since  [Next]
	 * @param  array $page_hooks Page hooks.
	 * @return array
	 */
	public function add_screen( $page_hooks ) {
		// $page_hook[] = 'tools.php'
		return $page_hooks;
	}

	/**
	 * Enqueue scripts and styles for admin
	 *
	 * @action notification/scripts
	 *
	 * @param  string $page_hook current page hook.
	 * @return void
	 */
	public function enqueue_scripts( $page_hook ) {

		wp_enqueue_style( 'notification-slugnamexx', $this->filesystem->url( 'css/style.css' ), [], $this->filesystem->mtime( 'css/style.css' ) );
		wp_enqueue_script( 'notification-slugnamexx', $this->filesystem->url( 'js/scripts.js' ), [ 'jquery' ], $this->filesystem->mtime( 'js/scripts.js' ), true );

		wp_localize_script( 'notification-slugnamexx', 'notification_slugnamexx', [
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		] );

	}

}
