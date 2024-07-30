<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */

namespace Elementor;
class HexCoupon_Pricing_Area extends Widget_Base {

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
        return 'hexcoupon-pricing-area-widget';
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
        return esc_html__( 'HexCoupon Pricing Area', 'hexcoupon-master' );
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
        $this->start_controls_section(
            'pricing_area_content',
            [
                'label' => esc_html__( 'Pricing Content', 'hexcoupon-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Basic', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Subtitle', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Package description will go in here', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your subtitle', 'hexcoupon-master' ),
            ]
        );
        
         $this->add_control(
            'regular_price_text',
            [
                'label' => esc_html__( 'Regular Price Text', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Regular Price', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Enter your regular price text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => esc_html__( 'Regular Price', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '$29.99', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Enter your price here', 'hexcoupon-master' ),
            ]
        );
        
        
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .money.regular-price',
			]
		);
        
         $this->add_control(
            'discount_price_text',
            [
                'label' => esc_html__( 'Discount Price Text', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Discount Price', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Enter your regular price text here', 'hexcoupon-master' ),
            ]
        );
        
         $this->add_control(
            'discount_price',
            [
                'label' => esc_html__( 'Discount Price', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '$29.99', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Enter your price here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'time_frame',
            [
                'label' => esc_html__( 'Time Frame', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '/Year', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Enter time frame here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Get Started', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Enter button text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'product_id',
            [
                'label' => esc_html__( 'Product Id', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
            ]
        );

        $this->add_control(
            'product_price_id',
            [
                'label' => esc_html__( 'Product Pricing Id', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'Features List', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'feature_title',
                        'label' => esc_html__( 'Feature Title', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Coupon Validity for specific Days/Hours' , 'hexcoupon-master' ),
                        'label_block' => true,
                    ],
					[
                        'name' => 'make_it_bold',
                        'label' => esc_html__( 'Make It Bold', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Yes', 'hexcoupon-master' ),
                        'label_off' => esc_html__( 'No', 'hexcoupon-master' ),
                        'return_value' => 'yes',
                        'default' => '',
                    ],
                    [
                        'name' => 'show_cross_icon',
                        'label' => esc_html__( 'Show Cross Icon', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'hexcoupon-master' ),
                        'label_off' => esc_html__( 'Hide', 'hexcoupon-master' ),
                        'return_value' => 'yes',
                        'default' => '',
                    ]
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
        $site_url = get_site_url();
        if ( ! empty( $settings['product_id'] ) && ! empty( $settings['product_price_id'] ) ) {
            $edd_url = $site_url . '/checkout/?edd_action=add_to_cart&download_id='.$settings['product_id'].'&edd_options[price_id]='.$settings['product_price_id'].'"';
        } else {
            $edd_url = '#';
        }
        ?>
        <section class="price-plan pt-60 pb-60">
        <div class="container-1430">
            <div class="pricing-card-wraper">
                <div class="row g-4">
                        <!--Single Card-->
                        <div class="single-price-card">
                            <div class="price-card-head">
                                <h3 class="packege-name"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['title'] ) ); ?></h3>
                                <div class="package-des"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['sub_title'] ) ); ?></div>
                            
                                
                                <div class="package-value"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['regular_price_text'] ) ); ?> <span class="money regular-price"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['price'] ) ); ?></span> <?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['time_frame'] ) ); ?></div>
                                 <div class="package-value"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['discount_price_text'] ) ); ?> <span class="money"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['discount_price'] ) ); ?></span> <?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['time_frame'] ) ); ?></div>
                                <a href="<?php echo esc_url( $edd_url ); ?>" class="new-cmnBtn w-100 price-plan-btn"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['button_text'] ) ); ?> <i class="la la-arrow-right"></i></a>
                            </div>
                            <div class="price-card-body">
                                <ul class="item-list">
                                    <?php if ( $settings['list'] ) : foreach ( $settings['list'] as $item ) : ?>
                                    <li class="<?php if ( 'yes' === $item['show_cross_icon'] ) { echo esc_attr( 'cross' ); } else { echo esc_attr( 'check' ); } ?>">
                                        <?php if ( 'yes' === $item['make_it_bold'] ) echo '<b>'; ?>
                                        <?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $item['feature_title'] ) ); ?>
                                        <?php if ( 'yes' === $item['make_it_bold'] ) echo '</b>'; ?>
                                    </li>
                                    <?php endforeach; endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </section>
        <?php

    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Pricing_Area() );