<?php

/**

 * Elementor Widget

 * @package wphex

 * @since 1.0.0

 */



namespace Elementor;

class Wphex_All_Products_Widget extends Widget_Base {



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

        return 'wphex-all-products-widget';

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

        return esc_html__( 'Wphex All Products', 'wphex-master' );

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

            'all_products_content',

            [

                'label' => esc_html__( 'All Products Content', 'wphex-master' ),

                'tab'   => Controls_Manager::TAB_CONTENT,

            ]

        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Explore Our WordPress Plugin', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type your title here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'One of the primary functions of HR is talent acquisition, which involves attracting, selecting, and hiring the right individuals with the skills and competencies necessary', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type your description here', 'wphex-master' ),
            ]

        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Explore More', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type your button text here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Button Link', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(

            'list',

            [

                'label' => esc_html__( 'All Plugin List', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'image',
                        'label' => esc_html__( 'Choose Image', 'wphex-master' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'title',
                        'label' => esc_html__( 'Title', 'wphex-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'description',
                        'label' => esc_html__( 'Description', 'wphex-master' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'button_text',
                        'label' => esc_html__( 'Button Text', 'wphex-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'button_link',
                        'label' => esc_html__( 'Button Link', 'wphex-master' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'options' => [ 'url', 'is_external', 'nofollow' ],
                        'default' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => true,
                            // 'custom_attributes' => '',
                        ],
                        'label_block' => true,
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
        ?>
        <!-- Wp Plugin area start -->
        <section class="wpHex_wpPlugin_area gradient_section_parent gradientBg_section padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="row g-4 g-xl-5 ">
                    <div class="col-lg-5 col-md-12">
                        <div class="wphex_section__title text-left">
                            <h2 class="title"><?php printf( esc_html__( '%s', 'wphex-master' ), esc_html( $settings['title'] ) ); ?></h2>
                            <p class="wphex_section__para mt-4"><?php printf( esc_html__( '%s', 'wphex-master' ), esc_html( $settings['description'] ) ); ?></p>
                            <div class="btn_wrapper mt-4">
                                <a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="wphex_cmn_btn btn_outline_1 btn_small color_1 radius-5"><?php printf( esc_html__( '%s', 'wphex-master' ), esc_html( $settings['button_text'] ) ); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="wpHex_wpPlugin">
                            <div class="row g-4">
                                <?php if ( $settings['list'] ) : foreach ( $settings['list'] as $item ) : ?>
                                <div class="col-sm-6">
                                    <div class="wpHex_wpPlugin_item">
                                        <div class="wpHex_wpPlugin_item_logo"><img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="plugin1"></div>
                                        <div class="wpHex_wpPlugin_item_contents mt-4">
                                            <h4 class="wpHex_wpPlugin_item_contents_title"><?php printf( esc_html__( '%s', 'wphex-master' ), esc_html( $item['title'] ) ); ?></h4>
                                            <p class="wpHex_wpPlugin_item_contents_para mt-3"><?php printf( esc_html__( '%s', 'wphex-master' ), esc_html( $item['description'] ) ); ?></p>
                                            <div class="btn_wrapper mt-4">
                                                <a href="<?php echo esc_url( $item['button_link']['url'] ); ?>" class="wphex_cmn_btn btn_outline_border btn_small radius-5"><?php printf( esc_html__( '%s', 'wphex-master' ), esc_html( $item['button_text'] ) ); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Wp Plugin area end -->
        <?php

    }

}



Plugin::instance()->widgets_manager->register_widget_type( new Wphex_All_Products_Widget() );