<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */
namespace Elementor;

class HexCoupon_Loyalty_Banner_Area extends Widget_Base {

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
        return 'hexcoupon-';
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
        return esc_html__( 'Loyalty Banner Area', 'hexcoupon-master' );
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
                'default' => esc_html__( 'The Ultimate Answer to Your Marketing Needs', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Create Coupons & Loyalty Program with HexCoupon & Maximize Your Sales. Satisfaction Guaranteed. Not Satisfied with the Results? Get Your Money Back.', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Get HexCoupon', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => esc_html__( 'Button URL', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::URL,
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
            'button_text_two',
            [
                'label' => esc_html__( 'Button Two Text', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Button Two Text', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type your text here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'button_url_two',
            [
                'label' => esc_html__( 'Button Two URL', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::URL,
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
            'bg_img',
            [
                'label' => esc_html__( 'Choose BG Image', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'content_img',
            [
                'label' => esc_html__( 'Choose Content Image', 'wphex-master' ),
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
        $bg_img = ! empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
        $content_img = ! empty( $settings['content_img']['url'] ) ? $settings['content_img']['url'] : '';
        $button_url = ! empty( $settings['button_url']['url'] ) ? $settings['button_url']['url'] : '';
        $button_url_two = ! empty( $settings['button_url_two']['url'] ) ? $settings['button_url_two']['url'] : '';
        ?>
        <!-- Banner area Starts -->
        <section class="banner-part pb-60">
            <div class="bg-banner" style="background-image: url('<?php echo esc_url( $bg_img ); ?>');">
            </div>
            <div class="container-1430">
                <div class="text-part text-center">
                    <div class="main-heading">
                        <h2 class="large-heading text-center"><?php printf( esc_html__( '%s', 'wphex-master' ), esc_html( $settings['title'] ) ); ?></h2>
                    </div>
                    <div class="des-text text-center">
                        <?php printf( esc_html__( '%s', 'wphex-master' ), esc_html( $settings['sub_title'] ) ); ?>
                    </div>
                    <?php if ( ! empty( $settings['button_text'] ) ) : ?>
                    <a href="<?php echo esc_url( $button_url ); ?>" class="btn-black new-cmnBtn"><?php printf( esc_html__( '%s', 'wphex-master' ), esc_html( $settings['button_text'] ) ); ?></a>
                    <?php endif; ?>
                    <?php if ( ! empty( $settings['button_text_two'] ) ) : ?>
                    <a href="<?php echo esc_url( $button_url_two ); ?>" class="btn-black new-cmnBtn"><?php printf( esc_html__( '%s', 'wphex-master' ), esc_html( $settings['button_text_two'] ) ); ?></a>
                    <?php endif; ?>
                </div>
                <div class="img-part">
                    <img src="<?php echo esc_url( $content_img ); ?>" class="img-fluid" alt="">
                </div>
            </div>
        </section>
        <!-- Banner area ends -->
        <?php
    }

}

Plugin::instance()->widgets_manager->register( new HexCoupon_Loyalty_Banner_Area() );