<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */
namespace Elementor;

class HexCoupon_Loyalty_Features_Cart extends Widget_Base {

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
        return 'loyalty-features-cart';
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
        return esc_html__( 'Loyalty Features Cart', 'hexcoupon-master' );
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
                'default' => esc_html__( 'Loyalty Program Features Crafted to Retain Customers', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'Banner List', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_title',
                        'label' => esc_html__( 'Title', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'label_block' => true,
                    ],
                    [
                        'name' => 'list_description',
                        'label' => esc_html__( 'Description', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'label_block' => true,
                    ],
                    [
                        'name' => 'bg_img',
                        'label' => esc_html__( 'BG Image', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'icon',
                        'label' => esc_html__( 'Icon Image', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                     ]

                ],
            ]
        );

        $this->end_controls_section();

        // product features content section ends here
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
        <!--Loyalty Program Features Start-->
        <section class="loyalty-features pt-60 pb-60">
            <div class="container-1430">
                <div class="main-heading main-heading-center">
                    <h2 class="sec-heading text-center"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['title'] ) ); ?></h2>
                </div>
                <div class="features-wraper grid-4">
                    <?php
                    if ( $settings['list'] ) :
                        foreach ( $settings['list'] as $item ) :
                        $bg_img = ! empty( $item['bg_img']['url'] ) ? $item['bg_img']['url'] : '';
                        $icon = ! empty( $item['icon']['url'] ) ? $item['icon']['url'] : '';
                    ?>
                    <!--SINGLE FEATURES-->
                    <div class="single-features light-box" style="background: url('<?php echo esc_url( $bg_img ); ?>') padding-box, linear-gradient(135deg, #F2F2F2, #A760FE) border-box;">
                        <div class="icon">
                            <img src="<?php echo esc_url( $icon ); ?>" alt="">
                        </div>
                        <div class="text text-center">
                            <p class="small-heading"><?php printf( esc_html__( '%s', 'hex-coupon-for-woocommerce' ), esc_html( $item['list_title'] ) ); ?></p>
                            <p class="text"><?php printf( esc_html__( '%s', 'hex-coupon-for-woocommerce' ), esc_html( $item['list_description'] ) ); ?> </p>
                        </div>
                    </div>
                    <!--SINGLE FEATURES-->
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>
        <!--Loyalty Program Features End-->
        <?php

    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Loyalty_Features_Cart() );