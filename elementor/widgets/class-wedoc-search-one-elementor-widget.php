<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_WeDocs_Search_One_Widget extends Widget_Base
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
        return 'xgenious-we-docs-search-one-widget';
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
        return esc_html__('We Doc: Search', 'xgenious-master');
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
        return 'eicon-site-search';
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
        return ['xgenious_widgets'];
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

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'xgenious-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('title', [
            'label' => esc_html__('Title', 'xgenious-master'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__("Search Documentation", 'xgenious-master'),
            'description' => esc_html__('add title for search form','xgenious-master'),
            'label_block' => true
        ]);
        $this->end_controls_section();
        $this->start_controls_section(
            'style_settings_section',
            [
                'label' => esc_html__('Style Settings', 'xgenious-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(),[
           'name' => 'title_typography',
           'label' => esc_html__('Title Typography'),
           'selector' => "{{WRAPPER}} .weDocs-search-form-wrapper > .title"
        ]);
        $this->end_controls_section();


    }

    /**
     * Render Elementor widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="weDocs-search-form-wrapper">
            <h2 class="title"><?php echo esc_html($settings['title']);?></h2>
            <form class="weDocsSearchForm" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="<?php echo esc_html__('Search Documentation')?>" name="q">
                </div>
                <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
                <span class="close"><i class="fa fa-times"></i></span>
                <div class="ajax-search-wrap"></div>
            </form>
        </div>
        <div class="weDocs-form-backdrop"></div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Xgenious_WeDocs_Search_One_Widget());
