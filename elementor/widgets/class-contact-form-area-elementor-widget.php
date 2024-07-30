<?php

/**
 * Elementor Widget
 * @package wphex
 * @since 1.0.0
 */


namespace Elementor;

class WpHex_Contact_Form_Area_Widget extends Widget_Base
{


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

    public function get_name()
    {
        return 'wphex-contact-form-area-widget';
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

    public function get_title()
    {
        return esc_html__('WPhex Contact Form Area', 'wphex-master');
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

    public function get_icon()
    {
        return 'eicon-form-vertical';
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

    public function get_categories()
    {
        return ['wphex_widgets'];
    }


    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function _register_controls()
    {
        // heading content area starts here
        $this->start_controls_section(
            'heading_two_content',
            [
                'label' => esc_html__('Heading Content', 'wphex-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'wphex-master'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Type your heading here', 'wphex-master'),
            ]
        );

         $this->add_control(
             'description',
             [
                 'label' => esc_html__('Description', 'wphex-master'),
                 'type' => \Elementor\Controls_Manager::TEXTAREA,
                 'placeholder' => esc_html__('Type your description here', 'wphex-master'),
             ]
         );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'wphex-master'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Create a Ticket', 'wphex-master' ),
                'placeholder' => esc_html__('Type your button text here', 'wphex-master'),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Button Link', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'wphex-master' ),
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
            'image',
            [
                'label' => esc_html__( 'Choose Image', 'wphex-master' ),
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

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $image = ! empty( $settings['image']['url'] ) ? $settings['image']['url'] : [];
        ?>

        <div class="wpHex_contactTheme">
            <div class="wphex_section__title text-left">
                <h2 class="title"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['heading'] ); ?></h2>
                <p class="section_para"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['description'] ); ?></p>
            </div>
            <div class="btn_wrapper mt-4">
                <a href="javascript:void(0)" class="wphex_cmn_btn btn_gradient_one radius-5"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['button_text'] ); ?></a>
            </div>
            <div class="wpHex_contactTheme__thumb mt-4">
                <img src="<?php echo esc_url( $image ); ?>" alt="contact">
            </div>
        </div>

        <?php

    }

}


Plugin::instance()->widgets_manager->register_widget_type(new WpHex_Contact_Form_Area_Widget());