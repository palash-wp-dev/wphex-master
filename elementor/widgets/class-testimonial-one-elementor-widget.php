<?php
/**
 * Elementor Widget
 * @package Attorg
 * @since 1.0.0
 */

namespace Elementor;
class wphex_Testimonial_One_Widget extends Widget_Base {

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
		return 'wphex-testimonial-one-widget';
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
		return esc_html__( 'Testimonial One', 'wphex-master' );
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
		return 'eicon-blockquote';
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
		$this->add_control( 'theme', [
			'label'   => esc_html__( 'Theme', 'wphex-master' ),
			'type'    => Controls_Manager::SELECT,
			'options' => array(
				''      => esc_html__( 'White', 'wphex-master' ),
				'black' => esc_html__( 'Black', 'wphex-master' )
			),
			'default' => 'black'
		] );
		$this->add_control( 'testimonial_items', [
			'label'       => esc_html__( 'Testimonial Item', 'wphex-master' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => [
				[
					'name'        => 'image',
					'label'       => esc_html__( 'Image', 'wphex-master' ),
					'type'        => Controls_Manager::MEDIA,
					'description' => esc_html__( 'enter title.', 'wphex-master' ),
					'default'     => array(
						'url' => Utils::get_placeholder_image_src()
					)
				],
				[
					'name'        => 'name',
					'label'       => esc_html__( 'Name', 'wphex-master' ),
					'type'        => Controls_Manager::TEXT,
					'description' => esc_html__( 'enter name', 'wphex-master' ),
					'default'     => esc_html__( 'Lara Croft', 'wphex-master' )
				],
				[
					'name'        => 'designation',
					'label'       => esc_html__( 'Designation', 'wphex-master' ),
					'type'        => Controls_Manager::TEXT,
					'description' => esc_html__( 'enter designation', 'wphex-master' ),
					'default'     => esc_html__( 'CEO, Appside', 'wphex-master' )
				],
				[
					'name'        => 'description',
					'label'       => esc_html__( 'Description', 'wphex-master' ),
					'type'        => Controls_Manager::TEXTAREA,
					'description' => esc_html__( 'enter description', 'wphex-master' ),
					'default'     => esc_html__( 'They  provide innovative solutions with the best.  tempor incididunt utla bore et dolor  tempor incididunt .', 'wphex-master' )
				]

			],
			'title_field' => '{{name}}'
		] );
		$this->end_controls_section();

		$this->start_controls_section(
			'slider_settings_section',
			[
				'label' => esc_html__( 'Slider Settings', 'wphex-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'items',
			[
				'label'       => esc_html__( 'Items', 'wphex-master' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'you can set how many item show in slider', 'wphex-master' ),
				'default'     => '1'
			]
		);
		$this->add_control(
			'margin',
			[
				'label'       => esc_html__( 'Margin', 'wphex-master' ),
				'description' => esc_html__( 'you can set margin for slider', 'wphex-master' ),
				'type'        => Controls_Manager::SLIDER,
				'range'       => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 5,
					]
				],
				'default'     => [
					'unit' => 'px',
					'size' => 0,
				],
				'size_units'  => [ 'px' ],
			]
		);
		$this->add_control(
			'loop',
			[
				'label'       => esc_html__( 'Loop', 'wphex-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'you can set yes/no to enable/disable', 'wphex-master' ),
				'default'     => 'yes'
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label'       => esc_html__( 'Autoplay', 'wphex-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'you can set yes/no to enable/disable', 'wphex-master' ),
				'default'     => 'yes'
			]
		);
		$this->add_control(
			'dots',
			[
				'label'       => esc_html__( 'Dots', 'wphex-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'you can set yes/no to enable/disable', 'wphex-master' ),
				'default'     => 'yes'
			]
		);
		$this->add_control(
			'autoplaytimeout',
			[
				'label'      => esc_html__( 'Autoplay Timeout', 'wphex-master' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 10000,
						'step' => 2,
					]
				],
				'default'    => [
					'unit' => 'px',
					'size' => 5000,
				],
				'size_units' => [ 'px' ],
				'condition'  => array(
					'autoplay' => 'yes'
				)
			]

		);
		$this->end_controls_section();

	}

	/**
	 * Render Elementor widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings              = $this->get_settings_for_display();
		$all_testimonial_items = $settings['testimonial_items'];
		$rand_numb             = rand( 333, 999999999 );

		//slider settings
		$loop            = $settings['loop'] ? 'true' : 'false';
		$dots            = $settings['dots'] ? 'true' : 'false';
		$items           = $settings['items'] ? $settings['items'] : 4;
		$autoplay        = $settings['autoplay'] ? 'true' : 'false';
		$autoplaytimeout = $settings['autoplaytimeout']['size'];
		?>
        <div class="testimonial-carousel-wrapper">
            <div class="testimonial-carousel owl-carousel"
                 id="testimonial-one-carousel-<?php echo esc_attr( $rand_numb ); ?>"
                 data-loop="<?php echo esc_attr( $loop ); ?>"
                 data-margin="<?php echo esc_attr( $settings['margin']['size'] ); ?>"
                 data-items="<?php echo esc_attr( $items ); ?>"
                 data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
                 data-dots="<?php echo esc_attr( $dots ); ?>"
                 data-autoplaytimeout="<?php echo esc_attr( $autoplaytimeout ); ?>"
            >
				<?php
				foreach ( $all_testimonial_items as $item ):
					$image_id = $item['image']['id'];
					$image_url = wp_get_attachment_image_src( $image_id, 'full', false );
					$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
					?> 
                    <div class="single-testimonial-item <?php echo esc_attr($settings['theme'])?>">
                        <div class="content">

                            <div class="description"><?php echo esc_html( $item['description'] ); ?></div>
                        </div>
                        <div class="author-meta">
                            <div class="left-content">
                                <h4 class="title"><?php echo esc_html( $item['name'] ); ?></h4>
                                <span class="designation"><?php echo esc_html( $item['designation'] ); ?></span>
                            </div>
                            <div class="thumb">
                                <img src="<?php echo esc_url( $image_url[0] ); ?>"
                                     alt="<?php echo esc_attr( $image_alt ); ?>">
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new wphex_Testimonial_One_Widget() );