<?php
/**
 * Elementor Widget
 * @package wphex
 * @since 1.0.0
 */

namespace Elementor;
class wphex_Single_Post_Meta extends Widget_Base {

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
        return 'wphex-single-post-meta-widget';
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
        return esc_html__( 'wphex Single Post Meta', 'wphex-master' );
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
        return 'eicon-meta-data';
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

        $author_name = get_the_author_meta( 'nicename' );
        $blog_date = get_the_date('d M y');
        $blog_time = get_the_time();
        ?>
        <div class="blog_details__author">
            <h4 class="blog_details__author__title"><?php echo $author_name; ?></h4>
            <ul class="blog_details__author__list">
                <li class="blog_details__author__list__item">
                    <a href="javascript:void(0)" class="blog_details__author__list__item__link"><?php echo $blog_date; ?></a>
                </li>
                <li class="blog_details__author__list__item">
                    <a href="javascript:void(0)" class="blog_details__author__list__item__link"><?php echo $blog_time; ?></a>
                </li>
            </ul>
        </div>
        <?php

    }
}

Plugin::instance()->widgets_manager->register_widget_type( new wphex_Single_Post_Meta() );