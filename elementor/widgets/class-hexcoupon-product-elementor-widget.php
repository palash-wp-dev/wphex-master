<?php
/**
 * Elementor Widget
 * @package wphex
 * @since 1.0.0
 */

namespace Elementor;
class WPhex_Hexcoupon_Product_Widget extends Widget_Base {

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
        return 'wphex-hexcoupon-product-widget';
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
        return esc_html__( 'WPHex HexCoupon', 'wphex-master' );
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
        // banner content area starts here
        $this->start_controls_section(
            'hexcoupon_content',
            [
                'label' => esc_html__( 'Content', 'wphex-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'main_image',
            [
                'label' => esc_html__( 'Choose Image', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => esc_html__( 'Choose Image', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__( 'Heading', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__( '<Hex>Coupon', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type sub heading here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'sub_heading',
            [
                'label' => esc_html__( 'Sub Heading', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Best Coupon Solution for your WooCommerce Store', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type sub heading here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'We craft bespoke WordPress plugins tailored to your specific requirements. Our team of skilled developers utilizes industry. Our team of skilled developers utilizes industry.', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type sub description here', 'wphex-master' ),
            ]
        );
        
		$this->add_responsive_control(
			'description_pera',
			[
				'label' => esc_html__( 'Description Padding', 'wphex-master' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .best-coupon-solution .text-container .pera' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
            'rating_and_review',
            [
                'label' => esc_html__( 'Rating & Reviews', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( '4.8 (290+ reviews)', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type rating and reviews here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'link_text',
            [
                'label' => esc_html__( 'Link Text', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Explore our all plugin', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type your description here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'link_url',
            [
                'label' => esc_html__( 'Link URL', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'wphex-master' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
        // heading content area ends here

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
        $main_image = ! empty( $settings['main_image']['url'] ) ? $settings['main_image']['url'] : '';
        $icon_image = ! empty( $settings['icon_image']['url'] ) ? $settings['icon_image']['url'] : '';
        $find = [ '<','>' ];
        $replace = [ '<span class="highlight">', '</span>' ];

        $heading = str_replace( $find, $replace, $settings['heading'] );

        $allowed_html = [ 'br' => [] ];

        $link_url = $settings['link_url']['url'] ?? '';
        ?>
        <div class="best-coupon-solution gradientBg_section padding-bottom-100 padding-top-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="image-container">
                            <img src="<?php echo esc_url( $main_image ); ?>" alt="Illustration" class="illustration">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="text-container">
                            <div class="hexCupon">
                                <div class="logo"><img src="<?php echo esc_url( $icon_image ); ?>" alt="Logo" class="image-fluid"></div>
                                <h2><?php echo $heading; ?></h2>
                            </div>
                            <h2 class="heading"><?php echo wp_kses( $settings['sub_heading'], $allowed_html ); ?></h2>
                            <p class="pera"><?php echo wp_kses( $settings['description'], $allowed_html ); ?></p>
                            <div class="info-container">
                                <div class="rating">
                                    <span class="star"><i class="fas fa-star"></i></span>
                                    <span class="text"><?php printf( esc_html__( '%s', 'wphex' ), esc_html( $settings['rating_and_review'] ) ); ?></span>
                                </div>
                                <a href="<?php echo esc_url( $link_url ); ?>" class="learn-more"><?php printf( esc_html__( '%s', 'wphex' ), esc_html( $settings['link_text'] ) ); ?> <i class="fa-solid fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register( new WPhex_Hexcoupon_Product_Widget() );