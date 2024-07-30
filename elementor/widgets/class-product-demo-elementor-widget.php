<?php

/**

 * Elementor Widget

 * @package Appside

 * @since 1.0.0

 */



namespace Elementor;

class wphex_Product_Demo extends Widget_Base {

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
        return 'wphex-product-demo-widget';
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
        return esc_html__( 'WPHex Product Demo', 'wphex-master' );
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

            'product_demo_content',

            [
                'label' => esc_html__( 'Product Demo Content', 'wphex-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]

        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Choose Image', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(

            'image_border_radius',

            [

                'label' => esc_html__( 'Image Border Radius', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::SLIDER,

                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],

                'range' => [

                    'px' => [

                        'min' => 0,

                        'max' => 1000,

                        'step' => 5,

                    ],

                    '%' => [

                        'min' => 0,

                        'max' => 100,

                        'step' => 5,

                    ],

                ],

                'default' => [

                    'unit' => 'px',

                    'size' => 10,

                ],

                'selectors' => [

                    '{{WRAPPER}} .wpHex_plugin__thumb img' => 'border-radius: {{SIZE}}{{UNIT}};',

                ],

            ]

        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Custom plugin development', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type service title here', 'wphex-master' ),
            ]
        );

        $this->add_control(

            'product_link',

            [

                'label' => esc_html__( 'Product Link', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::URL,

                'placeholder' => esc_html__( '#', 'wphex-master' ),

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

            'description',

            [

                'label' => esc_html__( 'Description', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'We craft bespoke WordPress plugins tailored to your specific requirements. Our team of skilled developers utilizes industry.', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type service description here', 'wphex-master' ),

            ]

        );

        $this->add_control(
            'button_one_text',
            [
                'label' => esc_html__( 'Button One Text', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'View Demo', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type button one text here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'button_one_link',
            [
                'label' => esc_html__( 'Butotn One Link', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'wphex-maste' ),
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
            'button_two_text',
            [
                'label' => esc_html__( 'Button One Text', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'View Details', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type button one text here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'button_two_link',
            [
                'label' => esc_html__( 'Butotn One Link', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'wphex-master' ),
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
        $product_link = ! empty( $settings['product_link']['url'] ) ? $settings['product_link']['url'] : '';

        $button_one_link = ! empty( $settings['button_one_link']['url'] ) ? $settings['button_one_link']['url'] : '';
        $button_two_link = ! empty( $settings['button_two_link']['url'] ) ? $settings['button_two_link']['url'] : '';

        $img = ! empty( $settings['image']['url'] ) ? $settings['image']['url'] : '';
        $img_id = get_post_thumbnail_id(get_the_ID());
        $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);

        ?>
        <div class="wpHex_plugin">
            <div class="wpHex_plugin__thumb">
                <a href="<?php echo esc_url( $product_link ); ?>"><img src="<?php echo esc_attr( $img ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>"></a>
            </div>
            <div class="wpHex_plugin__contents mt-4">
                <h4 class="wpHex_plugin__title"><a href="<?php echo esc_url( $product_link ); ?>"><?php printf( esc_html( '%s', 'wphex-master' ), $settings['title'] )?></a></h4>
                <p class="wpHex_plugin__para mt-3"><?php printf( esc_html( '%s', 'wphex-master' ), $settings['description'] )?> </p>
                <div class="btn_wrapper flex_btn mt-4">
                    <a href="<?php echo esc_url( $button_one_link ); ?>" class="wphex_cmn_btn btn_gradient_one btn_small radius-5"><?php printf( esc_html( '%s', 'wphex-master' ), $settings['button_one_text'] )?></a>
                    <a href="<?php echo esc_url( $button_two_link ); ?>" class="wphex_cmn_btn btn_outline_border hover_bg_1 btn_small radius-5"><?php printf( esc_html( '%s', 'wphex-master' ), $settings['button_two_text'] )?></a>
                </div>
            </div>
        </div>
        <?php

    }

}



Plugin::instance()->widgets_manager->register_widget_type( new wphex_Product_Demo() );