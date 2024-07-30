<?php

/**

 * Elementor Widget

 * @package wphex

 * @since 1.0.0

 */



namespace Elementor;

class WPHex_Header_Area_Two_Widget extends Widget_Base {



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

        return 'wphex-header-area-two-widget';

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

        return esc_html__( 'Header Area Two', 'wphex-master' );

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

        return 'eicon-heading';

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

        // heading content area starts here

        $this->start_controls_section(

            'heading_two_content',

            [

                'label' => esc_html__( 'Heading Content', 'wphex-master' ),

                'tab'   => Controls_Manager::TAB_CONTENT,

            ]

        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one' => esc_html__( 'One', 'textdomain' ),
                    'two' => esc_html__( 'Two', 'textdomain' ),
                ],
            ]
        );

        $this->add_control(

            'heading_two',

            [

                'label' => esc_html__( 'Heading', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::TEXTAREA,

                'default' => esc_html__( 'Our Best Method for your company', 'wphex-master' ),

                'placeholder' => esc_html__( 'Type your title here', 'wphex-master' ),

            ]

        );

        $this->add_control(

            'button',

            [

                'label' => esc_html__( 'Button Text', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::TEXTAREA,

                'default' => esc_html__( 'View all Plugins', 'wphex-master' ),

                'placeholder' => esc_html__( 'Type butotn text here', 'wphex-master' ),
                'condition' => [
                        'style' => 'two'
                ]

            ]

        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Button Link', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'wphex-master' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition' => [
                    'style' => 'two'
                ]
            ]
        );

        $this->add_responsive_control(

            'heading_two_text_align',

            [

                'label' => esc_html__( 'Alignment', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::CHOOSE,

                'options' => [

                    'left' => [

                        'title' => esc_html__( 'Left', 'wphex-master' ),

                        'icon' => 'eicon-text-align-left',

                    ],

                    'center' => [

                        'title' => esc_html__( 'Center', 'wphex-master' ),

                        'icon' => 'eicon-text-align-center',

                    ],

                    'right' => [

                        'title' => esc_html__( 'Right', 'wphex-master' ),

                        'icon' => 'eicon-text-align-right',

                    ],

                ],

                'default' => 'center',

                'toggle' => true,

                'selectors' => [

                    '{{WRAPPER}} .wphex_section__title .title' => 'text-align: {{VALUE}}',

                ],

            ]

        );



        $this->end_controls_section();

        // heading content area ends here



        // heading style section starts here

        $this->start_controls_section(

            'heading_two_style',

            [

                'label' => esc_html__( 'Heading', 'wphex-master' ),

                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]

        );



        // normal design

        $this->add_group_control(

            \Elementor\Group_Control_Typography::get_type(),

            [

                'name' => 'heading_two_typography',

                'selector' => '{{WRAPPER}} .wphex_section__title .title',

            ]

        );



        $this->add_control(

            'heading_two_color',

            [

                'label' => esc_html__( 'Color', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::COLOR,

                'selectors' => [

                    '{{WRAPPER}} .wphex_section__title .title' => 'color: {{VALUE}}',

                ],

            ]

        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'heading_bg_color',
                'selector' => "{{WRAPPER}} .wphex_section__title"
            ]
        );

        $this->add_control(
            'heading_borde_radius',
            [
                'label' => esc_html__('Border Radius', 'wphex-master'),
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
                    '{{WRAPPER}} .wphex_section__title' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );



        $this->add_group_control(

            \Elementor\Group_Control_Text_Stroke::get_type(),

            [

                'name' => 'heading_two_text_stroke',

                'selector' => '{{WRAPPER}} .wphex_section__title .title',

            ]

        );



        $this->add_group_control(

            \Elementor\Group_Control_Text_Shadow::get_type(),

            [

                'name' => 'heading_two_text_shadow',

                'label' => esc_html__( 'Text Shadow', 'wphex-master' ),

                'selector' => '{{WRAPPER}} .wphex_section__title .title',

            ]

        );



        $this->add_responsive_control(

            'heading_two_margin',

            [

                'label' => esc_html__( 'Margin', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::DIMENSIONS,

                'size_units' => [ 'px', '%', 'em' ],

                'selectors' => [

                    '{{WRAPPER}} .wphex_section__title .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],

            ]

        );



        $this->add_responsive_control(

            'heading_two_padding',

            [

                'label' => esc_html__( 'Padding', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::DIMENSIONS,

                'size_units' => [ 'px', '%', 'em' ],

                'selectors' => [

                    '{{WRAPPER}} .wphex_section__title .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],

            ]

        );



        $this->end_controls_section();

        // info box title style section ends here

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
        $allowed_html = array( 'span' => array( 'style' => array(), 'class' => array() ), 'br' => array(), 'p' => array(), 'strong' => array() );

        $button_link = ! empty( $settings['button_link']['url'] ) ? $settings['button_link']['url'] : '';
        ?>
        <?php if ( 'one' == $settings['style'] ) { ?>
            <div class="wphex_section__title">
                <h2 class="title"><?php echo wp_kses( $settings['heading_two'], $allowed_html ); ?></h2>
            </div>
        <?php } ?>
        <?php if ( 'two' == $settings['style'] ) { ?>
            <div class="wphex_section__title text-left title_flex">
                <h2 class="title"><?php echo wp_kses( $settings['heading_two'], $allowed_html ); ?></h2>
                <div class="btn_wrapper">
                    <a href="<?php echo esc_url( $button_link ); ?>" class="wphex_cmn_btn btn_gradient_one btn_small radius-5"> <?php printf( esc_html__( '%s', 'wphex-master' ), $settings['button'] ); ?></a>
                </div>
            </div>
        <?php } ?>
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new WPHex_Header_Area_Two_Widget() );