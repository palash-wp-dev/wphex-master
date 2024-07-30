<?php

/**

 * Elementor Widget

 * @package wphex

 * @since 1.0.0

 */



namespace Elementor;

class wphex_Static_SVG_Widget extends Widget_Base {



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

        return 'wphex-static-svg-widget';

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

        return esc_html__( 'wphex Static SVG', 'wphex-master' );

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

        return 'eicon-wordpress';

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

        return [ 'wordpress' ];

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

            'content',

            [

                'label' => esc_html__( 'Content', 'wphex-master' ),

                'tab'   => Controls_Manager::TAB_CONTENT,

            ]

        );

        $this->add_responsive_control(

            'margin_left',

            [

                'label' => esc_html__( 'Margin Left', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::SLIDER,

                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],

                'range' => [

                    'px' => [

                        'min' => -1000,

                        'max' => 1000,

                        'step' => 1,

                    ],

                    '%' => [

                        'min' => 0,

                        'max' => 100,

                        'step' => 1,

                    ],

                ],

                'selectors' => [

                    '{{WRAPPER}} .section_title_right.square_big' => 'margin-left: {{SIZE}}{{UNIT}} !important;',
                    '{{WRAPPER}} .footer_shapes__item.triangle_svg' => 'left: {{SIZE}}{{UNIT}} !important;',
                    '{{WRAPPER}} .footer_shapes__item.circle_svg' => 'left: {{SIZE}}{{UNIT}} !important;',

                ],

            ]

        );



        $this->add_responsive_control(

            'margin_top',

            [

                'label' => esc_html__( 'Margin Top', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::SLIDER,

                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],

                'range' => [

                    'px' => [

                        'min' => -1000,

                        'max' => 1000,

                        'step' => 1,

                    ],

                    '%' => [

                        'min' => 0,

                        'max' => 100,

                        'step' => 1,

                    ],

                ],

                'selectors' => [

                    '{{WRAPPER}} .section_title_right.square_big' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
                    '{{WRAPPER}} .footer_shapes__item.triangle_svg' => 'bottom: {{SIZE}}{{UNIT}} !important;',
                    '{{WRAPPER}} .footer_shapes__item.circle_svg' => 'bottom: {{SIZE}}{{UNIT}} !important;',

                ],

            ]

        );

        $this->add_control(
			'show_svg_one',
			[
				'label' => esc_html__( 'Show First SVG', 'wphex-master' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'wphex-master' ),
				'label_off' => esc_html__( 'Hide', 'wphex-master' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'show_svg_two',
			[
				'label' => esc_html__( 'Show Second SVG', 'wphex-master' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'wphex-master' ),
				'label_off' => esc_html__( 'Hide', 'wphex-master' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'show_svg_three',
			[
				'label' => esc_html__( 'Show Third SVG', 'wphex-master' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'wphex-master' ),
				'label_off' => esc_html__( 'Hide', 'wphex-master' ),
				'return_value' => 'yes',
				'default' => 'yes',
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

        ?>

        <?php if( 'yes' == $settings['show_svg_one'] ) { ?>
        <div class="section_title_right square_big">
            <svg width="110" height="106" viewBox="0 0 110 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path stroke="#D0D0D0" stroke-width="1" fill="D0D0D0" d="M50.5 0C50.5 27.876 27.9362 50.5 0 50.5C27.9362 50.5 50.5 73.124 50.5 101C50.5 73.124 73.0638 50.5 101 50.5C73.0638 50.5 50.5 27.876 50.5 0ZM50.5 77.8373C44.9934 65.7173 35.1888 56.0213 23.1011 50.5C35.1888 44.9787 44.859 35.148 50.5 23.1627C56.0066 35.2827 65.8112 44.9787 77.8989 50.5C65.8112 56.0213 56.0066 65.852 50.5 77.8373Z"/>
                <path stroke="#D0D0D0" stroke-width="1" fill="D0D0D0" d="M86 58C86 71.248 75.2766 82 62 82C75.2766 82 86 92.752 86 106C86 92.752 96.7234 82 110 82C96.7234 82 86 71.248 86 58ZM86 94.992C83.383 89.232 78.7234 84.624 72.9787 82C78.7234 79.376 83.3191 74.704 86 69.008C88.617 74.768 93.2766 79.376 99.0213 82C93.2766 84.624 88.617 89.296 86 94.992Z"/>
            </svg>
        </div>
        <?php } ?>
        
        <?php if( 'yes' == $settings['show_svg_two'] ) { ?>
        <div class="footer_shapes__item triangle_svg">
            <svg width="69" height="79" viewBox="0 0 69 79" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.5006 50.1185L22.3448 14.0588L53.1514 32.8197L21.5006 50.1185Z" stroke="#D0D0D0" stroke-width="3" stroke-linejoin="round"/>
                <path d="M24.1127 65.5347L25.038 26.0118L58.8032 46.5745L24.1127 65.5347Z" stroke="#D0D0D0" stroke-linejoin="round"/>
            </svg>
        </div>
        <?php } ?>

        <?php if( 'yes' == $settings['show_svg_three'] ) { ?>
        <div class="footer_shapes__item circle_svg">
            <svg width="59" height="70" viewBox="0 0 59 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="23.0491" cy="23.0491" r="21.5491" stroke="#D0D0D0" stroke-width="3"/>
                <circle cx="35.7268" cy="46.0984" r="22.5491" stroke="#D0D0D0" stroke-width="1"/>
            </svg>
        </div>
        <?php } ?>
        <?php

    }

}



Plugin::instance()->widgets_manager->register_widget_type( new wphex_Static_SVG_Widget() );