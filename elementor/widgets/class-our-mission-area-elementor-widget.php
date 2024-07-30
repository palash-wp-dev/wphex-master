<?php
/**
 * Elementor Widget
 * @package wphex
 * @since 1.0.0
 */

namespace Elementor;
class WPhex_Our_Mission_Area extends Widget_Base {

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
        return 'wphex-our-mission-area-widget';
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
        return esc_html__( 'WPHex Our Mission Area', 'wphex-master' );
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
            'our_mission_area_content',
            [
                'label' => esc_html__( 'Our Mission Area Content', 'wphex-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => esc_html__( 'Section Title', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Empowering Your Digital Presence', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type your heading here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label' => esc_html__( 'Section Sub-Title', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Our Mission', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type your heading here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'section_paragraph',
            [
                'label' => esc_html__( 'Section Paragraph', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'At wpHex, our mission is to empower your brands digital presence through innovative and captivating web solutions. We believe that the digital realm offers boundless opportunities, and we are dedicated to helping you harness its full potential.', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type your heading here', 'wphex-master' ),
            ]
        );
        
        $this->add_control(
			'section_image',
			[
				'label' => esc_html__( 'Choose Section Image', 'textdomain' ),
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
        $image_url = ! empty( $settings['section_image']['url'] ) ? $settings['section_image']['url'] : '';
        $image_alt = ! empty( $settings['section_image']['alt'] ) ? $settings['section_image']['alt'] : '';
        ?>
        <section class="wphex_mission gradient_section_parent gradientBg_section padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="wphex_section__title text-left">
                            <span class="subtitle"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['section_subtitle'] ); ?></span>
                            <h2 class="title"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['section_title'] ); ?></h2>
                            <p class="section_para"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['section_paragraph'] ); ?> </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mission__wrapper">
                            <div class="wpHex__netShape">
                                <div class="wpHex__netShape__thumb">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/net_shape.png" alt="netShape">
                                </div>
                            </div>
                            <div class="mission__thumb">
                                <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new WPhex_Our_Mission_Area() );