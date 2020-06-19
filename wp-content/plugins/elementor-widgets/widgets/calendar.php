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
class Calendar extends Widget_Base {

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
		return 'calendar';
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
		return __( 'Calendrier', 'calendar' );
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
		return [ 'calendar' ];
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
				'label' => __( 'Date', 'calendar' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'calendar__nameToggle', [
				'label' => __( 'Afficher le nom', 'calendar' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'calendar__date', [
				'label' => __( 'Date', 'calendar' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Date' , 'calendar' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'calendar__time', [
				'label' => __( 'Horaire', 'calendar' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Horaire' , 'calendar' ),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'calendar__name', [
				'label' => __( 'Nom de l\'événement', 'calendar' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Nom de l\'événement' , 'calendar' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'calendar__what', [
				'label' => __( 'description de l\'événement', 'calendar' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Description' , 'calendar' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'calendar__location', [
				'label' => __( 'Lieu', 'calendar' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Lieu' , 'calendar' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'calendar__city', [
				'label' => __( 'Ville', 'calendar' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Ville' , 'calendar' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Dates', 'calendar' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'calendar__date' => __( 'Date', 'calendar' ),
						'calendar__location' => __( 'Lieu', 'calendar' ),
					],
				],
				'title_field' => '{{{ calendar__date }}} | {{{ calendar__location }}}',
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
			$shortcode = '[calendar-wrapper]';
			foreach (  $settings['list'] as $key => $item ) {
				$shortcode .= '[calendar
					calendar__date="'.$item['calendar__date'].'" 
					calendar__time="'.$item['calendar__time'].'" 
					calendar__name="'.$item['calendar__name'].'" 
					calendar__what="'.$item['calendar__what'].'" 
					calendar__location="'.$item['calendar__location'].'" 
					calendar__city="'.$item['calendar__city'].'"
					calendar__nametoggle="'.$settings['calendar__nameToggle'].'"
				]';
			}
			$shortcode .= '[/calendar-wrapper]';
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
			$shortcode = '[calendar-wrapper]';
			foreach (  $settings['list'] as $key => $item ) {
				$shortcode .= '[calendar
					calendar__date="'.$item['calendar__date'].'" 
					calendar__time="'.$item['calendar__time'].'" 
					calendar__name="'.$item['calendar__name'].'" 
					calendar__what="'.$item['calendar__what'].'" 
					calendar__location="'.$item['calendar__location'].'" 
					calendar__city="'.$item['calendar__city'].'" 
					calendar__nametoggle="'.$settings['calendar__nameToggle'].'"
				]';
			}
			$shortcode .= '[/calendar-wrapper]';
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
