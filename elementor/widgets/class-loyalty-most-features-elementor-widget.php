<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */
namespace Elementor;

class HexCoupon_Loyalty_Most_Features extends Widget_Base {

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
        return 'loyalty-most-features';
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
        return esc_html__( 'Loyalty Most Features', 'hexcoupon-master' );
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
            'show_main_title',
            [
                'label' => esc_html__( 'Show Main Title', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'textdomain' ),
                'label_off' => esc_html__( 'No', 'textdomain' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'main_title',
            [
                'label' => esc_html__( 'Main Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Most Anticipated Features by Businesses', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'hexcoupon-master' ),
                'condition' => [
        			'show_main_title' => 'yes',
        		],
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Coupon Features Crafted for Your Business', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'List', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_title',
                        'label' => esc_html__( 'Title', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'label_block' => true,
                    ],
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Choose Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'reverse',
            [
                'label' => esc_html__( 'Make it reverse', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'textdomain' ),
                'label_off' => esc_html__( 'No', 'textdomain' ),
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
        $image = ! empty( $settings['image']['url'] ) ? $settings['image']['url'] : '';
        ?>
        <!--Most Features start-->
        <section class="most-features pt-60">
            <div class="container-1430">
                <?php if ( $settings['show_main_title'] === 'yes' ) : ?>
                <div class="main-heading">
                    <h2 class="large-heading text-center"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['main_title'] ) ); ?></h2>
                    <div class="devider"></div>
                </div>
                <?php endif; ?>
                <div class="features-wraper">
                    <!--Coupen Features-->
                    <div class="single-features pt-60 pb-60">
                        <div class="row g-4 align-items-center <?php if ( $settings['reverse'] === 'yes' ) echo esc_attr( 'flex-row-reverse' ); ?>">
                            <div class="col-lg-5">
                                <h3 class="sec-heading"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['sub_title'] ) ); ?></span></h3>
                                <ul class="features-item-list">
                                    <?php if ( $settings['list'] ) : foreach ( $settings['list'] as $item ) : ?>
                                    <li><?php printf( esc_html__( '%s', 'hex-coupon-for-woocommerce' ), esc_html( $item['list_title'] ) ); ?></li>
                                    <?php endforeach; endif; ?>
                                </ul>
                            </div>
                            <div class="col-lg-7">
                                <div class="img bg-purpel">
                                    <img src="<?php echo esc_url( $image ); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Most Features end-->
        <?php
    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Loyalty_Most_Features() );