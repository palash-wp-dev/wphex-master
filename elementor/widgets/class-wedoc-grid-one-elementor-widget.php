<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Xgenious_WeDocs_Grid_One_Widget extends Widget_Base
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
        return 'xgenious-we-docs-grid-one-widget';
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
        return esc_html__('We Doc Grid', 'xgenious-master');
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
        return 'eicon-document-file';
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
        $this->add_control('total_number', [
            'label' => esc_html__('Total Number', 'xgenious-master'),
            'type' => Controls_Manager::NUMBER,
            'description' => esc_html__('enter how many doc you want to show , enter -1 for unlimited post.')
        ]);
        $this->add_control('column', [
            'label' => esc_html__('Column', 'xgenious-master'),
            'type' => Controls_Manager::SELECT,
            'options' => [
                '6' => esc_html__('02 Column', 'xgenious-master'),
                '4' => esc_html__('03 Column', 'xgenious-master'),
                '3' => esc_html__('04 Column', 'xgenious-master'),
            ],
            'default' => '4',
            'description' => esc_html__('select column')
        ]);
        $this->add_control('total', [
            'label' => esc_html__('Total Sections', 'xgenious-master'),
            'type' => Controls_Manager::NUMBER,
            'default' => 10,
            'description' => esc_html__('enter how many doc section you want in list , enter -1 for unlimited post.')
        ]);
        $this->add_control('read_more', [
            'label' => esc_html__('Read More Text', 'xgenious-master'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__("Read More", 'xgenious-master'),
            'description' => esc_html__('read more button text')
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
        //query settings

        $parent_args = [
            'post_type' => 'docs',
            'parent' => 0,
            'sort_column' => 'menu_order',
            'number' => $settings['total_number']
        ];
        // have to work for paginate  it

        $parent_docs = get_pages($parent_args);
        $docs = [];
        // arrange the docs
        if ($parent_docs) {
            foreach ($parent_docs as $root) {
                $sections = get_children([
                    'post_parent' => $root->ID,
                    'post_type' => 'docs',
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'numberposts' => (int)$settings['total'],
                ]);

                $arranged[] = [
                    'doc' => $root,
                    'sections' => $sections,
                ];
            }
            $docs = $arranged;
        }
        ?>
        <div class="weDocs-grid-wrapper ">
            <div class="row">
                <?php
                if ($docs) :
                    $a = 1;
                    foreach ($docs as $main_doc):
                        ?>
                        <div class="col-lg-<?php  echo esc_attr($settings['column']) ?> col-md-6">
                            <div class="single-doc-item style-<?php echo esc_attr($a); ?>">
                                <?php
                                printf('<h3 class="title"><a href="%1$s">%2$s</a></h3>', esc_url(get_permalink($main_doc['doc']->ID)), esc_html($main_doc['doc']->post_title));
                                if ($main_doc['sections']):
                                    ?>
                                    <div class="inner-section-wrap">
                                        <ul class="doc-section-list">
                                            <?php
                                            foreach ($main_doc['sections'] as $section) {
                                                printf('<li><a href="%1$s">%2$s</a></li>', get_permalink($section->ID), esc_html($section->post_title));
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                <?php
                                endif;
                                printf('<div class="btn-wrapper"><a href="%1$s">%2$s</a></div>', esc_url(get_permalink($main_doc['doc']->ID)), esc_html($settings['read_more']));
                                ?>
                            </div>
                        </div>
                    <?php
                    if ($a == 6){$a = 1;}else{$a++;}
                    endforeach;
                endif; ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Xgenious_WeDocs_Grid_One_Widget());
