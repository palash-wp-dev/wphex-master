<?php
/**
 * Elementor Widget
 * @package wphex
 * @since 1.0.0
 */

namespace Elementor;
class WPhex_Counterup_Area extends Widget_Base {

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
        return 'wphex-counterup-area-widget';
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
        return esc_html__( 'WPHex Counterup Area', 'wphex-master' );
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
            'counterup_area_content',
            [
                'label' => esc_html__( 'Counterup Area Content', 'wphex-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'Counterup List', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__( 'Title', 'wphex-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Awesome Product' , 'wphex-master' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'number',
                        'label' => esc_html__( 'Number', 'wphex-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( '100' , 'wphex-master' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'suffix',
                        'label' => esc_html__( 'Number Extension', 'wphex-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( '+' , 'wphex-master' ),
                        'label_block' => true,
                    ],
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
        <section class="wphex_counter gradient_section_parent gradientBg_section padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="row g-4 gy-5">
                    <?php if ( $settings['list'] ) : foreach ( $settings['list'] as $item ) : ?>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="single_counter bg-white single_counter__about">
                            <div class="single_counter__contents">
                                <div class="single_counter__icon mb-4 radius-5">
                                    <i class="las la-check-circle"></i>
                                </div>
                                <div class="single_counter__count">
                                    <span class="color-heading odometer odometer-auto-theme" data-odometer-final="<?php printf( esc_html__( '%s', 'wphex-master' ), $item['number'] ); ?>"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">1</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span>
                                    <span class="single_counter__count__title color-heading"> <?php echo esc_html( $item['suffix'] ); ?> </span>
                                </div>
                                <p class="single_counter__para mt-2"><?php printf( esc_html__( '%s', 'wphex-master' ), $item['title'] ); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new WPhex_Counterup_Area() );