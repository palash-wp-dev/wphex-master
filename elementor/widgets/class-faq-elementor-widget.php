<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */
namespace Elementor;

class WPHex_FAQ_Area extends Widget_Base {

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
        return 'wphex-faq-area-widget';
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
        return esc_html__( 'WPHex Faq Area', 'hexcoupon-master' );
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
        return [ 'general' ];
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
        $this->start_controls_section(            'faq_area_content',
            [
                'label' => esc_html__( 'Faq Area Content', 'hexcoupon-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Frequently Asked Questions', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type title text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Didn’t find the right answer? here you can ask your own questions to our support', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your description here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Ask A Question', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Get HexCoupon Now', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type button text here', 'hexcoupon-master' ),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Button Link', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'hexcoupon-master' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'faq_list',
            [
                'label' => esc_html__( 'Faq List', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'faq_title',
                        'label' => esc_html__( 'Faq Title', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'How loyalty program works' , 'hexcoupon-master' ),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'faq_description',
                        'label' => esc_html__( 'Faq Description', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__( 'Default description' , 'hexcoupon-master' ),
                        'label_block' => true,
                    ],
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
        <!-- Faq area start -->
        <section class="faq__area growth__bg pat-120 pab-50">
            <div class="container">
                <div class="row g-4 gx-5 justify-content-between">
                    <div class="col-lg-5">
                        <div class="faq__wrap">
                            <div class="new_sectionTitle text-left">
                                <h2 class="title animated-title"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['title'] ) ); ?></h2>
                                <p class="section_para mt-3"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['description'] ) )?></p>
                            </div>
                            <div class="btn_wrapper mt-4 mt-xl-5">
                                <a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="cmn_btn btn_bg_1 radius-5"><?php printf(  esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['button_text'] ) ); ?>
                                    <i class="las la-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-contents">
                        <?php if ( $settings['faq_list'] ) : $count = 1; foreach ( $settings['faq_list'] as $item ) : ?>
                            <div class="faq-item <?php if ( 1 == $count ) echo esc_attr( 'active open' ); ?>">
                                <div class="faq-title">
                                    <?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $item['faq_title'] ) ); ?>
                                </div>
                                <div class="faq-panel">
                                    <p class="faq-para"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $item['faq_description'] ) ); ?></p>
                                </div>
                            </div>
                        <?php $count++; endforeach; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Faq area end -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register( new WPHex_FAQ_Area() );