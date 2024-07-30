<?php

/**

 * Elementor Widget

 * @package Appside

 * @since 1.0.0

 */



namespace Elementor;

class wphex_Info_Box extends Widget_Base {

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
    return 'wphex-info-box-widget';
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
    return esc_html__( 'WPHex Info Box', 'wphex-master' );
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
    return 'eicon-info-box';
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

            'info_box_content',

            [
                'label' => esc_html__( 'Info Box Content', 'wphex-master' ),
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

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Custom plugin development', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type service title here', 'wphex-master' ),
            ]
        );

        $this->add_control(

            'link',

            [

                'label' => esc_html__( 'Service Link', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::URL,

                'placeholder' => esc_html__( '#', 'wphex-master' ),

                'options' => [ 'url', 'is_external', 'nofollow' ],

                'default' => [

                    'url' => '',

                    'is_external' => true,

                    'nofollow' => true,

                    // 'custom_attributes' => '',

                ],

                'label_block' => true,

            ]

        );



        $this->add_control(

            'description',

            [

                'label' => esc_html__( 'Description', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'We craft bespoke WordPress plugins tailored to your specific requirements. Our team of skilled developers utilizes industry.', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type service description here', 'wphex-master' ),

            ]

        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__( 'Service Icon', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::ICONS,
              
            ]
        );

        $this->end_controls_section();
		
		 $this->start_controls_section(
            'info_box_style',

            [
                'label' => esc_html__( 'Info Box Style', 'wphex-master' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_border_radius',
            [
                'label' => esc_html__('Icon Border Radius', 'wphex-master'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                         'min' => 0,
                        'max' => 100,
                        'step' => 5,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpHex_service__icon' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		
		$this->add_control(
			'icon_bg_color_headig',
			[
				'label' => esc_html__( 'Icon BG Color', 'wphex-master' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
        $this->add_group_control(
             Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg_color',
                'selector' => "{{WRAPPER}} .wpHex_service__icon"
            ]
        );

        $this->add_control( 'icon_hover_color',
            [
                'label'     => esc_html__( 'Icon Hover Color', 'wphex-master' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} .wpHex_service:hover .wpHex_service__icon" => "color: {{VALUE}}"
                ]
            ]
        );
		
		$this->add_control(
			'icon_bg_hover_color_headig',
			[
				'label' => esc_html__( 'Icon Hover BG Color', 'wphex-master' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
        $this->add_group_control(
             Group_Control_Background::get_type(),
            [
                'name'     => 'icon_hover_bg_color',
                'selector' => "{{WRAPPER}} .wpHex_service:hover .wpHex_service__icon"
            ]
        );
		
		$this->add_control(
			'icon_bg_innver_hover_color_headig',
			[
				'label' => esc_html__( 'Icon Inner Hover BG Color', 'wphex-master' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'icon_hover_bg_inner_color',
                'selector' => "{{WRAPPER}} .wpHex_service .wpHex_service__icon:hover"
            ]
        );
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'service_border',
				'selector' => '{{WRAPPER}} .wpHex_service',
			]
		);

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
        $link = ! empty( $settings['link']['url'] ) ? $settings['link']['url'] : '';
        ?>
        <!-- service box contents starts -->
        <div class="wpHex_service bg-white radius-10">
            <div class="wpHex_service__icon">
				<?php if( 'one' === $settings['style'] ) { ?>
                	<?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
				<?php } ?>
				<?php if( 'two' === $settings['style'] ) { ?>
					<?php if( '' === $settings['icon']['value'] ) : ?>
						<i class="las la-lightbulb"></i>
					<?php else : ?>
						<?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
					<?php endif; ?>
				<?php } ?>
            </div>
            <div class="wpHex_service__contents mt-3">
                <h4 class="wpHex_service__title"><a href="<?php echo esc_url( $link ); ?>"><?php printf( esc_html( '%s', 'wphex-master' ), $settings['title'] ); ?></a></h4>
                <p class="wpHex_service__para mt-2"><?php printf( esc_html( '%s', 'wphex-master' ), $settings['description'] ); ?></a></p>
            </div>
        </div>
        <!-- service box contents end -->
        <?php

    }

}



Plugin::instance()->widgets_manager->register_widget_type( new wphex_Info_Box() );