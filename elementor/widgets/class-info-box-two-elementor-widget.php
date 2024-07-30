<?php
/**
 * Elementor Widget
 * @package wphex
 * @since 1.0.0
 */

namespace Elementor;
class wphex_Info_Box_Two_Widget extends Widget_Base
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
        return 'wphex-info-box-two-widget';
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
        return esc_html__('Info Box Two', 'wphex-master');
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
        return 'eicon-alert';
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

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'wphex-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'wphex-master'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter title.', 'wphex-master'),
                'default' => esc_html__('Phone', 'wphex-master')
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'wphex-master'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('(|) , {our_time} & {vis_time}', 'wphex-master'),
                'default' => esc_html__('+111 222 333 444', 'wphex-master')
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'wphex-master'),
                'type' => Controls_Manager::ICON,
                'description' => esc_html__('select Icon.', 'wphex-master'),
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
        ?>
        <div class="single-info-box-02">
            <div class="icon">
                <i class="<?php echo esc_attr($settings['icon']) ?>"></i>
            </div>
            <div class="content">
                <h4 class="title"><?php echo esc_html__($settings['title']) ?></h4>
                <?php
                 $all_details = explode('|',$settings['description']);
                 foreach ($all_details as $detail){
                     $our_time = str_replace('{our_time}','<span class="our-time" id="our_time"></span>',$detail);
                     $our_time = str_replace('{vis_time}','<span class="visitor-time" id="visitor_time"></span>',$our_time);
                     printf('<span class="details">%1$s</span>',$our_time);
                 }
                ?>
            </div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new wphex_Info_Box_Two_Widget());