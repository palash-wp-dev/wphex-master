<?php
/**
 * Elementor Widget
 * @package wphex
 * @since 1.0.0
 */

namespace Elementor;
class WPHex_Brand_Slider_Widget extends Widget_Base {

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
        return 'wphex-brand-slider-widget';
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
        return esc_html__( 'WPHex Brand Slider', 'wphex-master' );
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
        return 'eicon-logo';
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

        // brand slider content section starts here
        $this->start_controls_section(
            'content',
            [
                'label' => esc_html__( 'Content', 'wphex-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'wphex' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'We are Trusted by more then 2,000 companies', 'wphex' ),
                'placeholder' => esc_html__( 'Type your title here', 'wphex' ),
            ]
        );
        
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'image',
            [
                'label' => esc_html__( 'Brand Image', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
            ]
        );
        
        $repeater->add_control(
            'image_link',
            [
                'label' => esc_html__( 'Image Link', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'wphex-master' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true
                ],
                'label_block' => true,
            ]
        );
        

        $this->add_control(
            'brand_slider_list',
            [
                'label' => esc_html__( 'Brand Slider List', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
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
        <div class="wphex_brand_area bg_one padding-top-50 padding-bottom-50">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="wphex_brand center-text">
                            <h4 class="wphex_brand__title"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['title'] )?></h4>
                            <div class="wphex_brand__slider mt-4">
                                <div class="global-slick-init brand-slider nav-style-one slider-inner-margin" data-infinite="true" data-arrows="false" data-dots="false" data-slidesToShow="6" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500"
                                     data-prevArrow='<div class="prev-icon"><i class="las la-arrow-left"></i></div>' data-nextArrow='<div class="next-icon"><i class="las la-arrow-right"></i></div>' data-responsive='[{"breakpoint": 1500,"settings": {"slidesToShow": 6}},{"breakpoint": 1400,"settings": {"slidesToShow": 5}},{"breakpoint": 1200,"settings": {"slidesToShow": 4}},{"breakpoint": 992,"settings": {"slidesToShow": 4}},{"breakpoint": 768, "settings": {"slidesToShow": 3}},{"breakpoint": 575, "settings": {"slidesToShow": 2}}]'>
                                    <?php
                                    if ( $settings['brand_slider_list'] ) :
                                        foreach ( $settings['brand_slider_list'] as $single_item ) :
                                            $img = ! empty( $single_item['image']['url'] ) ? $single_item['image']['url'] : '';
                                            $img_id = get_post_thumbnail_id(get_the_ID());
                                            $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                                            $img_link = ! empty( $list_single['image_link']['url'] ) ? $list_single['image_link']['url'] : '';
                                    ?>
                                    <div class="slick-slider-item">
                                        <div class="wphex_brand__item">
                                            <div class="wphex_brand__item__thumb">
                                                <a href="<?php echo esc_url( $img_link ); ?>"><img src="<?php echo esc_attr( $img ); ?>" alt="<?php printf( esc_attr__( '%s', 'wphex-master' ), $alt_text )?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new WPHex_Brand_Slider_Widget() );