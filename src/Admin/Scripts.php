<?php
/**
 * Enqueues scripts
 *
 * @package notification/slug-namexx
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
	 * Scripts constructor
	 *
	 * @since [Next]
	 * @param Filesystem $fs Assets filesystem object.
	 */
	public function __construct( Filesystem $fs ) {
		$this->filesystem = $fs;
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
		wp_enqueue_style(
			'notification-slug-namexx',
			$this->filesystem->url( 'resources/css/dist/style.css' ),
			[],
			$this->filesystem->mtime( 'resources/css/dist/style.css' )
		);

		if ( $this->filesystem->exists( 'resources/js/dist/main.asset.php' ) ) {
			$script_data  = require $this->filesystem->path( 'resources/js/dist/main.asset.php' );
			$dependencies = $script_data['dependencies'];
			$version      = $script_data['version'];
		} else {
			$dependencies = [];
			$version      = $this->filesystem->mtime( 'resources/js/dist/scripts.js' );
		}

		wp_enqueue_script(
			'notification-slug-namexx',
			$this->filesystem->url( 'resources/js/dist/scripts.js' ),
			$dependencies,
			$version,
			true
		);

		wp_localize_script( 'notification-slug-namexx', 'notification_slug_namexx', [
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		] );
	}

}
