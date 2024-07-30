<?php

/**

 * Elementor Widget

 * @package Attorg

 * @since 1.0.0

 */



namespace Elementor;

class WPHex_Counterup_Two extends Widget_Base {



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

        return 'wphex-counterup-two-widget';

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

        return esc_html__( 'WPHex Counterup Two', 'wphex-master' );

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

        return 'eicon-counter';

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

        $this->add_control( 'title', [

            'label'       => esc_html__( 'Title', 'wphex-master' ),

            'type'        => Controls_Manager::TEXT,

            'default'     => esc_html__( 'Awesome Product', 'wphex-master' ),

            'description' => esc_html__( 'enter title', 'wphex-master' )

        ] );

        $this->add_control( 'number', [

            'label'       => esc_html__( 'Number', 'wphex-master' ),

            'type'        => Controls_Manager::TEXT,

            'default'     => esc_html__( '100', 'wphex-master' ),

            'description' => esc_html__( 'enter counterup number', 'wphex-master' )

        ] );

        $this->add_control( 'sign', [

            'label'       => esc_html__( 'sign', 'wphex-master' ),

            'type'        => Controls_Manager::TEXT,

            'default'     => esc_html__( '+', 'wphex-master' ),

            'description' => esc_html__( 'enter counterup sign', 'wphex-master' )

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

        $settings  = $this->get_settings_for_display();

        $title = $settings['title'];

        $number = $settings['number'];

        $sign = $settings['sign'];

        ?>
        <div class="single_counter desktop-center">
            <div class="single_counter__contents">
                <div class="single_counter__count">
                    <span class="odometer color-heading" data-odometer-final="<?php printf( esc_attr__( '%d', 'wphex-master' ), $number )?>"></span>
                    <span class="single_counter__count__title color-heading"> <?php printf( esc_html__( '%s', 'wphex-master' ), $sign )?> </span>
                </div>
                <p class="single_counter__para mt-2 mt-lg-3"><?php printf( esc_html__( '%s', 'wphex-master' ), $title )?></p>
            </div>
        </div>
        <?php

    }

}



Plugin::instance()->widgets_manager->register_widget_type( new WPHex_Counterup_Two() );