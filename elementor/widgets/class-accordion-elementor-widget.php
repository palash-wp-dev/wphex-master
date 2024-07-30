<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class wphex_Accordion_One extends Widget_Base {

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
        return 'wphex-accordion-one-widget';
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
        return esc_html__( 'Accordion 01', 'wphex-master' );
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
        return 'eicon-editor-list-ul';
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
            'settings_section',
            [
                'label' => esc_html__( 'General Settings', 'wphex-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'accordion_items', [
            'label'       => esc_html__( 'Accordion Item', 'wphex-master' ),
            'type'        => Controls_Manager::REPEATER,
            'default'     => [
                [
                    'title'        => esc_html__( 'How wphex help you?', 'wphex-master' ),
                    'description' => esc_html__('Duis aute irure dolor reprehenderit in voluptate velit essle cillum dolore eu fugiat nulla pariatur. Excepteur sint ocaec at cupdatat proident suntin culpa qui officia deserunt mol anim id esa laborum perspiciat.','wphex-master'),
                ]
            ],
            'fields'      => [
                [
                    'name'        => 'title',
                    'label'       => esc_html__( 'Title', 'wphex-master' ),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__( 'Enter title', 'wphex-master' )
                ],
                [
                    'name'        => 'description',
                    'label'       => esc_html__( 'Description', 'wphex-master' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'description' => esc_html__( 'Enter description', 'wphex-master' )
                ]
            ],
            'title_field' => "{{title}}"
        ] );
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
        $accordion_items = $settings['accordion_items'];
        $random_number = rand(999,999999);
        ?>
        <div class="accordion-wrapper">
            <div id="accordion-<?php echo esc_attr($random_number);?>">
                <?php
                $a = 0;
                foreach ( $accordion_items as $item ):
                    $collapse_class = (0 == $a) ? '' : 'collapsed';
                    $show_class = (0 == $a) ? 'show' : '';
                    $aria_expanded = (0 == $a) ? 'true' : 'false';
                    $a++;
                    $random__item_number = rand(999,999999);
                    ?>
                    <div class="card">
                        <div class="card-header" id="headingOne_<?php echo esc_attr($random__item_number);?>">
                            <h5 class="mb-0">
                                <a class="<?php echo esc_attr($collapse_class);?>" data-toggle="collapse" role="button" data-target="#collapseOne_<?php echo esc_attr($random__item_number);?>" aria-expanded="<?php echo esc_attr($aria_expanded);?>" aria-controls="collapseOne_<?php echo esc_attr($random__item_number);?>">
                                    <?php echo esc_html($item['title']);?>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseOne_<?php echo esc_attr($random__item_number);?>" class="collapse <?php echo esc_attr($show_class); ?>"  data-parent="#accordion-<?php echo esc_attr($random_number);?>">
                            <div class="card-body">
                                <?php echo esc_html($item['description']);?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new wphex_Accordion_One() );