<?php
/**
 * Elementor Widget
 * @package wphex
 * @since 1.0.0
 */

namespace Elementor;
class wphex_Price_Tag_Widget extends Widget_Base {

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
        return 'wphex-price-tag-widget';
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
        return esc_html__( 'wphex Price Tag', 'wphex-master' );
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
        return 'eicon-product-price';
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
            'content',
            [
                'label' => esc_html__( 'Content', 'wphex-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'price',
            [
                'label' => esc_html__( 'Title', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '$39', 'textdomain' ),
                'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
            ]
        );

        $this->add_responsive_control(
            'left',
            [
                'label' => esc_html__( 'Position Left', 'textdomain' ),
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
                    '{{WRAPPER}} .breadcrumb__theme.mt-5' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'bottom',
            [
                'label' => esc_html__( 'Position Bottom', 'textdomain' ),
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
                    '{{WRAPPER}} .breadcrumb__theme.mt-5' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
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
        <div class="breadcrumb__theme mt-5">
            <div class="breadcrumb__theme__offer">
                <span class="breadcrumb__theme__offer__price"><?php echo esc_html( $settings['price'] ); ?></span>
                <div class="breadcrumb__theme__offer__arrow arrow_svg">
                    <svg width="71" height="121" viewBox="0 0 71 121" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.6" fill="none" stroke="#3287E1" stroke-width="2" d="M23.6869 11.2519C24.2974 11.1203 24.4911 10.9704 24.7361 10.9668C40.9307 14.3287 53.9884 22.5636 62.7977 36.717C65.0311 40.2855 66.292 44.3584 66.65 48.6652C67.4974 57.8894 62.4519 66.2207 53.9301 69.7769C49.4992 71.6555 44.9331 72.6786 40.115 71.5739C39.0805 69.5557 38.1192 67.5119 36.9897 65.691C35.1328 62.7295 32.5301 60.6854 28.9695 60.1256C26.341 59.65 24.1475 60.4175 23.387 61.9968C22.3889 64.0696 23.1052 66.117 24.6442 67.4663C26.779 69.3457 29.1551 70.9766 31.5532 72.4356C33.1104 73.3681 34.9565 73.9533 36.6564 74.5896C38.3045 83.2874 31.7091 89.5347 21.1477 89.3725C20.4459 88.3048 19.7185 87.1641 18.9435 86.122C15.9717 82.3194 12.1151 79.9755 7.19079 79.9748C5.30443 79.9783 3.39975 80.3985 2.4747 82.4457C1.78731 83.9994 2.50369 86.0468 4.38993 87.685C7.41669 90.2372 11.0614 91.5063 14.8231 92.4061C16.1501 92.6805 17.4771 92.9549 18.7785 93.1561C21.7935 106.464 13.4867 119.548 0.43583 118.369C0.841549 119.294 1.04986 120.124 1.49584 120.46C2.04051 120.844 2.94713 120.855 3.65635 120.771C10.2806 119.767 15.801 117.015 18.9673 110.818C21.3731 106.201 22.3532 101.262 22.3244 96.0192C22.3135 95.2843 22.3025 94.5495 22.3647 93.789C22.3392 93.7159 22.4598 93.5916 22.6755 93.2699C23.3591 93.1128 24.1634 92.8314 25.0189 92.6962C35.3538 90.8037 39.5509 86.3805 40.886 75.6541C41.8658 75.6396 42.9917 75.5739 44.0702 75.6069C50.3654 75.5383 56.0465 73.7146 61.0844 69.818C69.2957 63.4979 72.5025 53.4297 69.6298 43.1085C68.0765 37.4964 65.2839 32.5641 61.5188 28.1363C52.3693 17.467 41.0699 10.5046 26.9992 8.28727C26.2863 8.12632 25.5259 8.06408 24.8131 7.90313C24.7144 7.85559 24.5901 7.73492 24.2172 7.37293C26.4985 5.91814 28.915 5.31886 31.3059 4.64646C33.5981 3.92652 36.0146 3.32725 38.5517 2.60369C37.6672 0.779241 36.3877 0.406168 34.9912 0.40234C33.3753 0.475252 31.7083 0.401928 30.2204 0.840451C26.2209 2.07567 22.174 3.40959 18.2293 5.036C15.162 6.35543 14.8731 8.34425 17.1578 10.4175C22.0488 14.7797 27.013 19.1163 31.9772 23.4529C32.796 24.1513 33.7099 24.6523 34.8724 25.3946C35.6987 23.2998 34.7044 22.3345 33.8088 21.4167C30.38 18.1844 27.1705 14.8754 23.6869 11.2519ZM5.43574 83.8719C10.711 82.7648 14.9808 84.8821 16.7864 89.339C12.6555 88.3221 8.74758 87.4735 5.43574 83.8719ZM26.1835 63.8909C30.8556 63.4053 33.9263 65.6139 35.0482 70.2279C31.4511 68.8601 28.2707 67.5106 26.1835 63.8909Z"/>
                    </svg>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new wphex_Price_Tag_Widget() );