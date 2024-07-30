<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */
namespace Elementor;

class HexCoupon_Upcoming_Features extends Widget_Base {

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
        return 'hexcoupon-boost-area-widget';
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
        return esc_html__( 'Loyalty Upcoming Features', 'hexcoupon-master' );
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
        return 'eicon-scroll';
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
        return [ 'hexcoupon_widgets' ];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {
        // product features content section starts here
        $this->start_controls_section(
            'boost_area_content',
            [
                'label' => esc_html__( 'Boost Area Content', 'hexcoupon-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Upcoming Features to Rocket Boost Your Business', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Let’s learn what we’re building next for your business?', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'part1_title',
            [
                'label' => esc_html__( 'Part1 Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Autometion', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'part1_image',
            [
                'label' => esc_html__( 'Choose Part1 Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'part1_icon',
            [
                'label' => esc_html__( 'Choose Part1 Icon', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'part2_title',
            [
                'label' => esc_html__( 'Part2 Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Gift Card', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'part2_image',
            [
                'label' => esc_html__( 'Choose Part2 Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'part2_icon',
            [
                'label' => esc_html__( 'Choose Part2 Icon', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'part3_title',
            [
                'label' => esc_html__( 'Part3 Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Spin Wheel', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'part3_image',
            [
                'label' => esc_html__( 'Choose Part3 Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'part3_icon',
            [
                'label' => esc_html__( 'Choose Part3 Icon', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
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
        $part1_image =  ! empty( $settings['part1_image']['url'] ) ? $settings['part1_image']['url'] : '';
        $part2_image =  ! empty( $settings['part2_image']['url'] ) ? $settings['part2_image']['url'] : '';
        $part3_image =  ! empty( $settings['part3_image']['url'] ) ? $settings['part3_image']['url'] : '';

        $part1_icon =  ! empty( $settings['part1_icon']['url'] ) ? $settings['part1_icon']['url'] : '';
        $part2_icon =  ! empty( $settings['part2_icon']['url'] ) ? $settings['part2_icon']['url'] : '';
        $part3_icon =  ! empty( $settings['part3_icon']['url'] ) ? $settings['part3_icon']['url'] : '';
        ?>
        <!--Upcoming Features Start-->
        <section class="upcoming-features pt-60 pb-60">
            <div class="container-1430">
                <div class="grid-3">
                    <div class="text-part-wraper">
                        <h3 class="sec-heading animated-title"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['title'] ) ); ?></h3>
                        <p class="mb-0"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['sub_title'] ) ); ?></p>
                    </div>
                    <div class="features-left">
                        <div class="single-features light-box mb-3" style="background: url('<?php echo esc_url( $part1_image );  ?>') padding-box, linear-gradient(135deg, #F2F2F2, #A760FE) border-box;">
                            <div class="icon">
                                <img src="<?php echo esc_url( $part1_icon ); ?>" alt="">
                            </div>
                            <p class="feature-title text-center"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['part1_title'] ) ); ?></p>
                        </div>
                        <div class="single-features light-box" style="background: url('<?php echo esc_url( $part2_image );  ?>') padding-box, linear-gradient(135deg, #F2F2F2, #A760FE) border-box;">
                            <div class="icon">
                                <img src="<?php echo esc_url( $part2_icon ); ?>" alt="">
                            </div>
                            <p class="feature-title text-center"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['part2_title'] ) ); ?></p>
                        </div>
                    </div>
                    <div class="single-features light-box d-flex flex-column justify-content-around" style="background: url('<?php echo esc_url( $part3_image );  ?>') padding-box, linear-gradient(135deg, #F2F2F2, #A760FE) border-box;">
                        <div class="icon">
                            <img src="<?php echo esc_url( $part3_icon ); ?>" alt="">
                        </div>
                        <p class="feature-title text-center"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['part3_title'] ) ); ?></p>
                    </div>
                </div>
            </div>
        </section>
        <!--Upcoming Features End-->
        <?php

    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Upcoming_Features() );