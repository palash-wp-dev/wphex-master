<?php

/**

 * Elementor Widget

 * @package Appside

 * @since 1.0.0

 */



namespace Elementor;

class WPHex_Satisfied_Clients extends Widget_Base {

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
        return 'wphex-satisfied-clients-widget';
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
        return esc_html__( 'WPHex Satisfied Clients', 'wphex-master' );
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

            'content',

            [
                'label' => esc_html__( 'Content', 'wphex-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]

        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '2X', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type title here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Build faster with our world-class Plugin let you connect with us form anywhere.', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type your description here', 'wphex-master' ),
            ]
        );
        $this->add_control(
            'clients_number',
            [
                'label' => esc_html__( 'Title', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '2k+', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type total number here', 'wphex-master' ),
            ]
        );
        $this->add_control(
            'satisfied_text',
            [
                'label' => esc_html__( 'Satisfiction Title', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Satisfied Clients', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type satisfiction text here', 'wphex-master' ),
            ]
        );
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'list_image', [
				 'label' => esc_html__( 'Choose Image', 'wphex' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
			]
		);
		
        $this->add_control(
            'clients_list',
            [
                'label' => esc_html__( 'Clients List', 'wphex' ),
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
        <div class="wpHex_experience__single__item">
            <div class="wpHex_experience__single__item__clients">
                <div class="wpHex_experience__single__item__clients__view bg-white radius-10">
                    <ul class="wpHex_experience__single__item__clients__list">
                        <?php
                            if( $settings['clients_list'] ) :
                                foreach( $settings['clients_list'] as $list_single ) :
                                    $img = ! empty( $list_single['list_image']['url'] ) ? $list_single['list_image']['url'] : '';
                                    $img_id = get_post_thumbnail_id(get_the_ID());
                                    $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                         ?>
                        <li><img src="<?php echo esc_attr( $img ); ?>" alt="<?php printf( esc_attr__( '%s', 'wphex-master' ), $alt_text );?>"></li>
                        <?php endforeach; endif; ?>
                        <li><a href="javascript:void(0)" class="viewMore_clients"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['clients_number'] );?></a></li>
                    </ul>
                    <p class="wpHex_experience__single__item__clients__para mt-3"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['satisfied_text'] );?></p>
                </div>
            </div>
            <div class="wpHex_experience__single__item__clients">
                <div class="wpHex_experience__single__item__clients__connect center-text radius-10">
                    <h4 class="wpHex_experience__single__item__clients__connect__title"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['title'] ); ?></h4>
                    <p class="wpHex_experience__single__item__clients__connect__para mt-xxl-4 mt-3"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['description'] );?></p>
                </div>
            </div>
        </div>
        <?php

    }

}



Plugin::instance()->widgets_manager->register_widget_type( new WPHex_Satisfied_Clients() );