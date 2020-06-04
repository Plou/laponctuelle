<?php
namespace Skin\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Show extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'show';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Liste des spéctacles', 'show' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'show' ];
	}

	/**
	 * Whether the reload preview is required or not.
	 *
	 * Used to determine whether the reload preview is required.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return bool Whether the reload preview is required.
	 */
	public function is_reload_preview_required() {
		return true;
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Photo', 'show' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'show__caption', [
				'label' => __( 'Légende', 'show' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Légende' , 'show' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'show__image',
			[
				'label' => __( 'Image', 'show' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$repeater->add_control(
			'show__link',
			[
				'label' => __( 'Liens', 'show' ),
				'type' => \Elementor\Controls_Manager::URL,
				'show_external' => false,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Liste', 'show' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'show__caption' => __( 'Légende', 'show' ),
					],
					[
						'show__caption' => __( 'Légende', 'show' ),
					],
				],
				'title_field' => '{{{ show__caption }}}',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render shortcode widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$shortcode = '';
		if ( $settings['list'] ) {
			$shortcode = '[show-wrapper]';
			foreach (  $settings['list'] as $key => $item ) {
        $shortcode .= '[show
          show__caption="'.$item['show__caption'].'" 
          show__link="'.$item['show__link']['url'].'" 
          show__image="'.$item['show__image']['id'].'"
        ]';
			}
			$shortcode .= '[/show-wrapper]';
		}

		echo do_shortcode( $shortcode );
	}
	/**
	 * Render shortcode widget as plain content.
	 *
	 * Override the default behavior by printing the shortcode instead of rendering it.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function render_plain_content() {
		// In plain mode, render without shortcode
		$settings = $this->get_settings_for_display();
		$shortcode = '';
		if ( $settings['list'] ) {
			$shortcode = '[show-wrapper]';
			foreach (  $settings['list'] as $key => $item ) {
				$shortcode .= '[show
					show__caption="'.$item['show__caption'].'" 
          show__link="'.$item['show__link']['url'].'" 
					show__image="'.$item['show__image']['id'].'"
				]';
			}
			$shortcode .= '[/show-wrapper]';
		}

		echo $shortcode;
	}

	/**
	 * Render shortcode widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {}

}
