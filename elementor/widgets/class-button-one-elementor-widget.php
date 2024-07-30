<?php
/**
 * Elementor Widget
 * @package wphex
 * @since 1.0.0
 */

namespace Elementor;
class wphex_Button_One_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'wphex-button-one-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return esc_html__( 'Button With Icon', 'wphex-master' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'eicon-button';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_categories() {
		return [ 'wphex_widgets' ];
	}

	/**
	 * Register Elementor widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'General Settings', 'wphex-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'wphex-master' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'enter title.', 'wphex-master' ),
				'default'     => esc_html__( 'Phone', 'wphex-master' )
			]
		);
		$this->add_control(
			'url',
			[
				'label'       => esc_html__( 'URL', 'wphex-master' ),
				'type'        => Controls_Manager::URL,
				'description' => esc_html__( 'enter url.', 'wphex-master' ),
			]
		);
		$this->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Icon', 'wphex-master' ),
				'type'        => Controls_Manager::ICONS,
				'description' => esc_html__( 'select Icon.', 'wphex-master' ),
			]
		);

		$this->add_responsive_control( 'button_alignment', [
			'label'   => esc_html__( 'Alignment', 'wphex-master' ),
			'type'    => Controls_Manager::CHOOSE,
			'options' => [
				'left'   => [
					'title' => esc_html__( 'Left', 'wphex-master' ),
					'icon'  => 'fa fa-align-left'
				],
				'center' => [
					'title' => esc_html__( 'Center', 'wphex-master' ),
					'icon'  => 'fa fa-align-center'
				],
				'right'  => [
					'title' => esc_html__( 'Right', 'wphex-master' ),
					'icon'  => 'fa fa-align-right'
				]
			],
            'toggle'  => true,
			'default' => 'left',
		] );

		$this->end_controls_section();
		$this->start_controls_section(
			'styling_settings_section',
			[
				'label' => esc_html__( 'Button Styling', 'wphex-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'button_style_tabs'
		);

		$this->start_controls_tab(
			'button_style_normal_tab',
			[
				'label' => __( 'Normal', 'wphex-master' ),
			]
		);
		$this->add_control( 'button_color', [
			'label'     => esc_html__( 'Color', 'wphex-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .button-wrapper .btn-with-icon" => "color: {{VALUE}}"
			]
		] );
		$this->add_group_control( Group_Control_Background::get_type(), [
			'name'     => 'button_background_control',
			'selector' => "{{WRAPPER}} .button-wrapper .btn-with-icon"
		] );
		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_style_hover_tab',
			[
				'label' => __( 'Hover', 'wphex-master' ),
			]
		);
		$this->add_control( 'hover_button_color', [
			'label'     => esc_html__( 'Color', 'wphex-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .button-wrapper .btn-with-icon:hover" => "color: {{VALUE}}"
			]
		] );
		$this->add_group_control( Group_Control_Background::get_type(), [
			'name'     => 'hover_button_background_control',
			'selector' => "{{WRAPPER}} .button-wrapper .btn-with-icon:hover"
		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		$this->start_controls_section(
			'icon_styling_settings_section',
			[
				'label' => esc_html__( 'Icon Styling', 'wphex-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);


		$this->start_controls_tabs(
			'icon_style_tabs'
		);

		$this->start_controls_tab(
			'icon_style_normal_tab',
			[
				'label' => __( 'Normal', 'wphex-master' ),
			]
		);
		$this->add_control( 'icon_color', [
			'label'     => esc_html__( 'Color', 'wphex-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .button-wrapper .btn-with-icon i" => "color: {{VALUE}}"
			]
		] );
		$this->add_group_control( Group_Control_Background::get_type(), [
			'name'     => 'icon_background_control',
			'selector' => "{{WRAPPER}} .button-wrapper .btn-with-icon i"
		] );
		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_style_hover_tab',
			[
				'label' => __( 'Hover', 'wphex-master' ),
			]
		);
		$this->add_control( 'icon_button_color', [
			'label'     => esc_html__( 'Color', 'wphex-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .button-wrapper .btn-with-icon:hover i" => "color: {{VALUE}}"
			]
		] );
		$this->add_group_control( Group_Control_Background::get_type(), [
			'name'     => 'hover_icon_background_control',
			'selector' => "{{WRAPPER}} .button-wrapper .btn-with-icon:hover i"
		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	/**
	 * Render Elementor widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_render_attribute( 'button_wrapper', 'class', 'button-wrapper' );
		if ( ! empty( $settings['button_alignment'] ) ) {
			$this->add_render_attribute( 'button_wrapper', 'class', 'text-' . $settings['button_alignment'] );
		}
		$this->add_render_attribute( 'button_attr', 'class', 'btn-with-icon' );
		if ( ! empty( $settings['url']['url'] ) ) {
			$this->add_link_attributes( 'button_attr', $settings['url'] );
		}
		?>
        <div <?php echo $this->get_render_attribute_string( 'button_wrapper' ); ?>>
            <a <?php echo $this->get_render_attribute_string( 'button_attr' ); ?>><?php echo esc_html__( $settings['title'] ); ?><?php Icons_Manager::render_icon( $settings['icon'] ); ?></a>
        </div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new wphex_Button_One_Widget() );