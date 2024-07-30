<?php

/**

 * Elementor Widget

 * @package wphex

 * @since 1.0.0

 */



namespace Elementor;

class wphex_Contact_Info extends Widget_Base {



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

        return 'wphex-contact-info-widget';

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

        return esc_html__( 'Contact Info', 'wphex-master' );

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

        return ' eicon-info-circle-o';

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



        // newsletter content section starts here

        $this->start_controls_section(

            'newsletter_content',

            [

                'label' => esc_html__( 'Contact Info Contents', 'wphex-master' ),

                'tab'   => Controls_Manager::TAB_CONTENT,

            ]

        );



        $this->add_control(

            'heading',

            [

                'label' => esc_html__( 'Heading', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::TEXT,

                'default' => esc_html__( 'Lets Talk', 'wphex-master' ),

                'placeholder' => esc_html__( 'Type your heading here', 'wphex-master' ),

            ]

        );



        $this->add_control(

            'description',

            [

                'label' => esc_html__( 'Description', 'wphex-master' ),

                'type' => Controls_Manager::TEXTAREA,

                'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'wphex-master' ),

                'placeholder' => esc_html__( 'Paste your shortcode Here', 'wphex-master' ),

                'separator' => 'before',

            ]

        );

        $this->add_control(
            'heading_align',
            [
                'label' => esc_html__( 'Heading Alignment', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'wphex-master' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'wphex-master' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'wphex-master' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .contact_details' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'show_map',
            [
                'label' => esc_html__( 'Show Map', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'wphex-master' ),
                'label_off' => esc_html__( 'Hide', 'wphex-master' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );



        $this->add_control(

            'info_list',

            [

                'label' => esc_html__( 'Info List', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::REPEATER,

                'fields' => [

                    [

                        'name' => 'title',

                        'label' => esc_html__( 'Title', 'wphex-master' ),

                        'type' => \Elementor\Controls_Manager::TEXT,

                        'default' => esc_html__( 'Info Title' , 'wphex-master' ),

                        'label_block' => true,

                    ],

                    [

                        'name' => 'type',

                        'label' => esc_html__( 'Type', 'wphex-master' ),

                        'type' => \Elementor\Controls_Manager::SELECT,

                        'default' => 'phone',

                        'options' => [

                            'phone' => esc_html__( 'Phone', 'wphex-master' ),

                            'email'  => esc_html__( 'Email', 'wphex-master' ),

                            'website'  => esc_html__( 'Website', 'wphex-master' ),

                        ],

                    ],

                    [

                        'name' => 'content',

                        'label' => esc_html__( 'Content', 'wphex-master' ),

                        'type' => \Elementor\Controls_Manager::TEXTAREA,

                        'default' => esc_html__( 'Info Content' , 'wphex-master' ),

                        'show_label' => false,

                    ],

                    [

                        'name' => 'icon_bg_color',

                        'label' => esc_html__( 'Color', 'wphex-master' ),

                        'type' => \Elementor\Controls_Manager::COLOR,

                        'selectors' => [

                            '{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'

                        ],

                    ],

                    [

                        'name' => 'icon',

                        'label' => esc_html__( 'Icon', 'wphex-master' ),

                        'type' => \Elementor\Controls_Manager::ICONS,

                        'default' => [

                            'value' => 'fas fa-phone-alt',

                            'library' => 'fa-solid',

                        ],

                        'recommended' => [

                            'fa-solid' => [

                                'circle',

                                'dot-circle',

                                'square-full',

                            ],

                            'fa-regular' => [

                                'circle',

                                'dot-circle',

                                'square-full',

                            ],

                        ],

                    ],

                ],

                'title_field' => '{{{ title }}}',

            ]

        );



        $this->end_controls_section();

        // contact info content section ends here



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

        <div class="contact">

            <div class="contact_details">

                <h4 class="contact_details__title"><?php echo esc_html( $settings['heading'] ); ?></h4>

                <p class="contact_details__para mt-3"><?php echo esc_html( $settings['description'] ); ?></p>

            </div>

            <ul class="contact__list mt-4 mt-lg-5">

                <?php foreach ( $settings['info_list'] as $single_item ) : ?>

                <li class="contact__list__item wow fadeInUp" data-wow-delay=".3s">

                    <div class="contact__list__flex">

                        <div class="contact__list__icon">

                            <?php \Elementor\Icons_Manager::render_icon( $single_item['icon'], [ 'aria-hidden' => 'true' ] ); ?>

                        </div>

                        <div class="contact__list__contents">

                            <h5 class="contact__list__label"><?php echo esc_html( $single_item['title'] ); ?></h5>

                            <span class="contact__list__para"><a href="<?php if( 'phone' == $single_item['type'] ) {echo esc_html( 'tel:'. $single_item['content']);} elseif( 'email' == $single_item['type'] ) {echo esc_html( 'mailto:'. $single_item['content'] );} if( 'website' == $single_item['type'] ) {echo esc_html( '#' );} ?>"><?php echo esc_html( $single_item['content'] ); ?></a></span>

                        </div>

                    </div>

                </li>

                <?php endforeach; ?>

            </ul>
            <?php if( 'yes'  == $settings['show_map'] ) { ?>
            <div class="contact_map mt-4">

                <iframe src="https://www.openstreetmap.org/export/embed.html?bbox=90.45112609863283%2C23.577832956897762%2C91.35749816894531%2C24.12920858513251&amp;layer=mapnik"></iframe>

            </div>
            <?php } ?>
        </div>

        <?php

    }

}



Plugin::instance()->widgets_manager->register_widget_type( new wphex_Contact_Info() );