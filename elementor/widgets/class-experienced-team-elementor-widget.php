<?php

/**

 * Elementor Widget

 * @package Appside

 * @since 1.0.0

 */



namespace Elementor;

class WPHex_Experienced_Team extends Widget_Base {

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
        return 'wphex-experienced-team-members-widget';
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
        return esc_html__( 'WPHex Exerienced Team Members', 'wphex-master' );
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
        return 'eicon-info-box';
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

            'ex_team_member_content',

            [
                'label' => esc_html__( 'Content', 'wphex-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]

        );

        $this->add_control(
            'total_member',
            [
                'label' => esc_html__( 'Total Member', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '25', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type total member number here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Custom plugin development', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type service title here', 'wphex-master' ),
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

    protected function render() {

        $settings = $this->get_settings_for_display();
        $img = ! empty( $settings['image']['url'] ) ? $settings['image']['url'] : '';
        $img_id = get_post_thumbnail_id(get_the_ID());
        $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
        ?>
        <div class="wpHex_experience__single__item">
            <div class="wpHex_experience__single__item__experience bg-white radius-10">
                <h3 class="wpHex_experience__single__item__experience__title"><?php printf( esc_html( '%s', 'wphex-master' ), $settings['total_member'] ); ?></h3>
                <h5 class="wpHex_experience__single__item__experience__para mt-3"><?php printf( esc_html( '%s', 'wphex-master' ), $settings['title'] ); ?></h5>
            </div>
            <div class="wpHex_experience__single__item__experience bg-white radius-10">
                <div class="wpHex_experience__single__item__experience__thumb">
                    <img src="<?php echo esc_attr( $img ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>">
                </div>
            </div>
        </div>
        <?php

    }

}



Plugin::instance()->widgets_manager->register_widget_type( new WPHex_Experienced_Team() );