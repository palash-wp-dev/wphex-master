<?php
/**
 * Elementor Widget
 * @package wphex
 * @since 1.0.0
 */

namespace Elementor;
class wphex_Header_Area_One_Widget extends Widget_Base {

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
		return 'wphex-header-area-one-widget';
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
		return esc_html__( 'Header Area', 'wphex-master' );
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
		return 'eicon-archive-title';
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
				'label' => esc_html__( 'Section Contents', 'wphex-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one' => esc_html__( 'One', 'wphex-master' ),
                    'two'  => esc_html__( 'Two', 'wphex-master' ),
                ],
            ]
        );
		$this->add_control( 'subtitle', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Subtitle', 'wphex-master' ),
			'default' => esc_html__( 'We Create Digital Products', 'wphex-master' ),
            'condition' => [
                    'style' => 'one'
            ]
		] );
		$this->add_control( 'title', [
			'type'    => Controls_Manager::TEXTAREA,
			'label'   => esc_html__( 'Title', 'wphex-master' ),
			'default' => esc_html__( 'Web Template & WordPress Themes', 'wphex-master' )
		] );
        $this->add_control( 'description', [
            'type'    => Controls_Manager::TEXTAREA,
            'label'   => esc_html__( 'Description', 'wphex-master' ),
            'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'wphex-master' ),
            'condition' => [
                'style' => 'two'
            ]
        ] );
		$this->add_control( 'btn_one_status',
			[
				'label'       => esc_html__( 'Button One Show/Hide', 'wphex-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
				'description' => esc_html__( 'show/hide button one', 'wphex-master' ),
                'condition' => [
                    'style' => 'one'
                ]
		] );
		$this->add_control( 'btn_one_icon',
			[
				'label'       => esc_html__( 'Button One icon', 'wphex-master' ),
				'type'        => Controls_Manager::ICONS,
				'description' => esc_html__( 'set button one icon', 'wphex-master' ),
				'condition'   => [
					'btn_one_status' => 'yes'
				]
			] );
		$this->add_control( 'btn_one_text',[
			'label'       => esc_html__( 'Button One Label', 'wphex-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'About Us', 'wphex-master' ),
			'description' => esc_html__( 'enter button one text', 'wphex-master' ),
			'condition'   => [
				'btn_one_status' => 'yes'
			]
		]);
		$this->add_control( 'btn_one_url',[
			'label'       => esc_html__( 'Button One URL', 'wphex-master' ),
			'type'        => Controls_Manager::URL,
			'default'     => [
				'url' => '#'
			],
			'description' => esc_html__( 'enter button one url', 'wphex-master' ),
			'condition'   => [
				'btn_one_status' => 'yes'
			]
		]);
		$this->add_control( 'btn_two_status',[
			'label'       => esc_html__( 'Button Two Show/Hide', 'wphex-master' ),
			'type'        => Controls_Manager::SWITCHER,
			'default'     => 'yes',
			'description' => esc_html__( 'show/hide button two', 'wphex-master' ),
            'condition'   => [
                'style' => 'one'
            ]
		]);
		$this->add_control( 'btn_two_icon',
			[
				'label'       => esc_html__( 'Button Two icon', 'wphex-master' ),
				'type'        => Controls_Manager::ICONS,
				'description' => esc_html__( 'set button two icon', 'wphex-master' ),
				'condition'   => [
					'btn_two_status' => 'yes'
				]
			] );
		$this->add_control( 'btn_two_text',[
			'label'       => esc_html__( 'Button Two Label', 'wphex-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Our Product', 'wphex-master' ),
			'description' => esc_html__( 'enter button two text', 'wphex-master' ),
			'condition'   => [
				'btn_two_status' => 'yes'
			]
		]);
		$this->add_control( 'btn_two_url',[
			'label'       => esc_html__( 'Button Two URL', 'wphex-master' ),
			'type'        => Controls_Manager::URL,
			'default'     => [
				'url' => '#'
			],
			'description' => esc_html__( 'enter button two url', 'wphex-master' ),
			'condition'   => [
				'btn_two_status' => 'yes'
			]
		]);
		$this->add_control('bottom_image',[
			'type' => Controls_Manager::MEDIA,
			'label' => esc_html__('Bottom Image','wphex-master')
		]);
		$this->add_control('top_right_shape_image',[
			'type' => Controls_Manager::MEDIA,
			'label' => esc_html__('Top Right Image','wphex-master')
		]);
		$this->end_controls_section();
		$this->start_controls_section(
			'css_styles',
			[
				'label' => esc_html__( 'Styling Settings', 'wphex-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control('background',[
			'name' => 'header-background',
			'label' => esc_html__('Background','wphex-master'),
			'selector' => "{{WRAPPER}} .header-area"
		]);
		$this->add_control('divider',[
			'type' => Controls_Manager::DIVIDER
		]);
		$this->add_responsive_control( 'padding', [
			'label'              => esc_html__( 'Padding', 'wphex-master' ),
			'type'               => Controls_Manager::DIMENSIONS,
			'size_units'         => [ 'px', 'em' ],
			'allowed_dimensions' => [ 'top', 'bottom' ],
			'selectors'          => [
				'{{WRAPPER}} .header-area' => 'padding-top: {{TOP}}{{UNIT}};padding-bottom: {{BOTTOM}}{{UNIT}};'
			],
			'description'        => esc_html__( 'set padding for header area ', 'wphex-master' )
		] );
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
		$bottom_image_id = $settings['bottom_image']['id'];
		$bottom_image_url = !empty($bottom_image_id) ? wp_get_attachment_image_src($bottom_image_id,'full',true)[0] : '';
		$bottom_image_alt = !empty($bottom_image_id) ? get_post_meta($bottom_image_id,'_wp_attachment_image_alt',true) : '';
		//
		$top_right_image_id = $settings['top_right_shape_image']['id'];
		$top_right_image_url = !empty($top_right_image_id) ? wp_get_attachment_image_src($top_right_image_id,'full',true)[0] : '';
		$top_right_image_alt = !empty($top_right_image_id) ? get_post_meta($top_right_image_id,'_wp_attachment_image_alt',true) : '';
		?>
        <?php if( 'one' == $settings['style'] ) : ?>
        <div class="header-carousel-wrapper">
            <div class="header-area">
                <?php
                    if (!empty($top_right_image_id)){
                        printf('<div class="top-right-shape "><img src="%1$s" class="skip-lazy" alt="%2$s"/></div>',esc_url($top_right_image_url),esc_attr($top_right_image_alt));
                    }
                ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11">
                            <div class="header-inner">
                                <h2 class="title"><span class="subtitle"><?php echo esc_html( $settings['subtitle'] ); ?></span> <?php echo esc_html( $settings['title'] ) ?></h2>
                                <div class="btn-wrapper">
									<?php if ( 'yes' == $settings['btn_one_status'] ): ?>
                                        <a href="<?php echo esc_url( $settings['btn_one_url']['url'] ); ?>" class="boxed-btn " <?php echo ( $settings['btn_one_url']['is_external'] ) ? 'target="_blank"' : ''; ?>
                                        > <?php echo esc_html( $settings['btn_one_text'] ) ?> <?php Icons_Manager::render_icon( $settings['btn_one_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
									<?php endif; ?>
									<?php if ( 'yes' == $settings['btn_two_status'] ): ?>
                                        <a href="<?php echo esc_url( $settings['btn_two_url']['url'] ); ?>"
											<?php echo ( $settings['btn_two_url']['is_external'] ) ? 'target="_blank"' : ''; ?>
                                                class="boxed-btn blank"> <?php echo esc_html( $settings['btn_two_text'] ) ?> <?php Icons_Manager::render_icon( $settings['btn_two_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
									<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="bottom-image-wrap">
                                <img src="<?php echo esc_url($bottom_image_url);?>" alt="<?php echo esc_attr($bottom_image_alt);?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else : ?>
            <div class="breadcrumb__contents center-text">
                <h2 class="breadcrumb__title"> <?php echo esc_html( $settings['title'] ) ?></h2>
                <p class="breadcrumb__para mt-4"><?php echo esc_html( $settings['description'] ); ?></p>
                <div class="btn-wrapper flex-btn gap-2 mt-4">
                    <a href="javascript:void(0)" class="cmn-btn btn-gradient-1 radius-5"><?php echo esc_html( $settings['btn_one_text'] ) ?> <?php Icons_Manager::render_icon( $settings['btn_one_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
                    <a href="javascript:void(0)" class="cmn-btn btn-outline-1 color-one radius-5"><?php echo esc_html( $settings['btn_two_text'] ) ?> <?php Icons_Manager::render_icon( $settings['btn_two_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
                </div>
            </div>
        <?php endif; ?>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new wphex_Header_Area_One_Widget() );