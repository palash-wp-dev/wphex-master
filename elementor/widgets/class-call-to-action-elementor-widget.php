<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;

class WPHex_Call_To_Action extends Widget_Base {

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
        return 'wphex-call-to-action-widget';
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
        return esc_html__( 'WPHex Call To Action', 'wphex-master' );
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
            'call_to_action_content',
            [
                'label' => esc_html__( 'Call To Action Content', 'wphex-master' ),
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
            'image_link',
            [
                'label' => esc_html__( 'Image Link', 'wphex-master' ),
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
            'title',
            [
                'label' => esc_html__( 'Title', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Discover Our New WordPress Plugin for an Unparalleled Experience', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type call to action title here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Explore Plugins', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type call to action title here', 'wphex-master' ),
            ]
        );
        $this->add_control(
            'button_ID',
            [
                'label' => esc_html__( 'Button ID', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => "wphex_cta_button",
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Service Link', 'wphex-master' ),
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
        $image_link = ! empty( $settings['image_link']['url'] ) ? $settings['image_link']['url'] : '';
        $button_link = ! empty( $settings['button_link']['url'] ) ? $settings['button_link']['url'] : '';

        $img = ! empty( $settings['image']['url'] ) ? $settings['image']['url'] : '';
        $img_id = get_post_thumbnail_id(get_the_ID());
        $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);

        ?>
        <div class="discover__wrapper bg_one radius-10">
            <div class="discover__contents">
                <div class="discover__contents__logo">
                    <a href="<?php echo esc_url( $image_link ); ?>"><img src="<?php echo esc_attr( $img ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>"></a>
                </div>
                <div class="discover__contents__inner mt-4">
                    <div class="discover__contents__flex">
                        <div class="discover__contents__left">
                            <h3 class="discover__contents__title"><?php printf( esc_html( '%s', 'wphex-master' ), $settings['title'] ); ?></h3>
                        </div>
                        <div class="discover__contents__right">
                            <div class="btn-wrapper">
                                <a href="<?php echo esc_url( $button_link ); ?>" 
                                
                                <?php
                                    if(!empty($settings["button_ID"])){
                                        echo 'id="'.esc_attr($settings["button_ID"]).'"';
                                    }
                                ?>
                                
                                class="wphex_cmn_btn btn_gradient_one btn_small radius-5"><?php printf( esc_html( '%s', 'wphex-master' ), $settings['button_text'] ); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new WPHex_Call_To_Action() );