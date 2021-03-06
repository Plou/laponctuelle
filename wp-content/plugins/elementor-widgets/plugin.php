<?php
namespace Skin;

use Skin\Widgets\Chapo;
use Skin\Widgets\GalleryShow;
use Skin\Widgets\Calendar;
use Skin\Widgets\Show;
use Skin\Widgets\Inline_Editing;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		require __DIR__ . '/widgets/chapo.php';
		require __DIR__ . '/widgets/gallery-show.php';
		require __DIR__ . '/widgets/show.php';
		require __DIR__ . '/widgets/calendar.php';
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Chapo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new GalleryShow() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Show() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calendar() );
	}
}

new Plugin();
