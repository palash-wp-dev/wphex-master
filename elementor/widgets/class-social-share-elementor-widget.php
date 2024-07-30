<?php
/**
 * Elementor Widget
 * @package wphex
 * @since 1.0.0
 */

namespace Elementor;
class wphex_Social_Share_Widget extends Widget_Base {

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
        return 'wphex-social-share-widget';
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
        return esc_html__( 'wphex Social Share', 'wphex-master' );
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
        return 'eicon-share';
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
            'content',
            [
                'label' => esc_html__( 'Content', 'wphex-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'facebook',
            [
                'label' => esc_html__( 'Share On Facebook', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'textdomain' ),
                'label_off' => esc_html__( 'No', 'textdomain' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'twitter',
            [
                'label' => esc_html__( 'Share On Twitter', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'textdomain' ),
                'label_off' => esc_html__( 'No', 'textdomain' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'linkedin',
            [
                'label' => esc_html__( 'Share On Linkedin', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'textdomain' ),
                'label_off' => esc_html__( 'No', 'textdomain' ),
                'return_value' => 'yes',
                'default' => 'yes',
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
        $post_title = get_the_title();
        $post_url = get_permalink();
        $post_thumbnail = get_the_post_thumbnail_url();

       

        ?>
        <div class="blog_details__social">
            <div class="blog_details__social__flex">
                <ul class="blog_details__social__list">
                    <?php if( 'yes' == $settings['facebook'] ) { ?>
                    <li class="blog_details__social__list__item">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($post_url); ?>" class="blog_details__social__list__link"><i class="fa-brands fa-facebook-f"></i></a>
                    </li>
                    <?php } ?>
                    <?php if( 'yes' == $settings['twitter'] ) { ?>
                    <li class="blog_details__social__list__item">
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($post_url); ?>" class="blog_details__social__list__link"><i class="fa-brands fa-twitter"></i></a>
                    </li>
                    <?php } ?>
                    <?php if( 'yes' == $settings['linkedin'] ) { ?>
                    <li class="blog_details__social__list__item">
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($post_url); ?>" class="blog_details__social__list__link"><i class="fa-brands fa-linkedin-in"></i></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php

    }
}

Plugin::instance()->widgets_manager->register_widget_type( new wphex_Social_Share_Widget() );