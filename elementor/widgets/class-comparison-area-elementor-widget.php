<?php
/**
 * Elementor Widget
 * @package HexCoupon
 * @since 1.0.0
 */

namespace Elementor;
class WPhex_Comparison_Area extends Widget_Base {

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
        return 'wphex-comparison-area-widget';
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
        return esc_html__( 'WPHex Comparison Area', 'hexcoupon-master' );
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
        return [ 'hexcoupon_widgets' ];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
            'comparison_area_content',
            [
                'label' => esc_html__( 'Comparison Area Content', 'hexcoupon-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_menu',
            [
                'label' => esc_html__( 'Show Menu', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'hexcoupon-master' ),
                'label_off' => esc_html__( 'Hide', 'hexcoupon-master' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'menu_list',
            [
                'label' => esc_html__( 'Menu List', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'menu_title',
                        'label' => esc_html__( 'Menu Title', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Menu Title' , 'hexcoupon-master' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'menu_attr',
                        'label' => esc_html__( 'Menu Attr', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'menu-attr' , 'hexcoupon-master' ),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'menu_icon',
                        'label' => esc_html__( 'Icon', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fas fa-circle',
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

                    [
                        'name' => 'make_it_active',
                        'label' => esc_html__( 'Make it active', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Yes', 'hexcoupon-master' ),
                        'label_off' => esc_html__( 'No', 'hexcoupon-master' ),
                        'return_value' => 'yes',
                        'default' => '',
                    ],
                ],

                'condition' => [
                    'show_menu' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'free_title_text',
            [
                'label' => esc_html__( 'Free Title Text', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Free Version', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title text here', 'hexcoupon-master' ),
            ]
        );
        
         $this->add_control(
            'make_free_colorful',
            [
                'label' => esc_html__( 'Make it colorful', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'textdomain' ),
                'label_off' => esc_html__( 'Hide', 'textdomain' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'premium_title_text',
            [
                'label' => esc_html__( 'Premium Title Text', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Premium Version', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title text here', 'hexcoupon-master' ),
            ]
        );
        
         $this->add_control(
            'make_pro_colorful',
            [
                'label' => esc_html__( 'Make it colorful', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'textdomain' ),
                'label_off' => esc_html__( 'Hide', 'textdomain' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'third_title_text',
            [
                'label' => esc_html__( 'Third Title Text', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Third Version', 'hexcoupon-master' ),
                'placeholder' => esc_html__( 'Type your title text here', 'hexcoupon-master' ),
            ]
        );
        
         $this->add_control(
            'make_third_colorful',
            [
                'label' => esc_html__( 'Make it colorful', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'textdomain' ),
                'label_off' => esc_html__( 'Hide', 'textdomain' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'features_list',
            [
                'label' => esc_html__( 'Features List', 'hexcoupon-master' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'feature_title',
                        'label' => esc_html__( 'Feature Title', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Feature Title' , 'hexcoupon-master' ),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'show_text',
                        'label' => esc_html__( 'Show Text', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'hexcoupon-master' ),
                        'label_off' => esc_html__( 'Hide', 'hexcoupon-master' ),
                        'return_value' => 'yes',
                        'default' => '',
                    ],

                    [
                        'name' => 'free_text',
                        'label' => esc_html__( 'Free Text', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Free Text' , 'hexcoupon-master' ),
                        'label_block' => true,
                        'condition' => [
                            'show_text' => 'yes',
                        ],
                    ],

                    [
                        'name' => 'pro_text',
                        'label' => esc_html__( 'Pro Text', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Pro Text' , 'hexcoupon-master' ),
                        'label_block' => true,
                        'condition' => [
                            'show_text' => 'yes',
                        ],
                    ],

                    [
                        'name' => 'enable_cross_icon',
                        'label' => esc_html__( 'Show Cross Icon on Free', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'hexcoupon-master' ),
                        'label_off' => esc_html__( 'Hide', 'hexcoupon-master' ),
                        'return_value' => 'yes',
                        'default' => '',
                        'condition' => [
                            'show_text' => '',
                        ],
                    ],

                    [
                        'name' => 'enable_cross_icon_two',
                        'label' => esc_html__( 'Show Cross Icon on Pro', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'hexcoupon-master' ),
                        'label_off' => esc_html__( 'Hide', 'hexcoupon-master' ),
                        'return_value' => 'yes',
                        'default' => '',
                        'condition' => [
                            'show_text' => '',
                        ],
                    ],

                    [
                        'name' => 'enable_cross_icon_third',
                        'label' => esc_html__( 'Show Cross Icon on Third', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'hexcoupon-master' ),
                        'label_off' => esc_html__( 'Hide', 'hexcoupon-master' ),
                        'return_value' => 'yes',
                        'default' => '',
                        'condition' => [
                            'show_text' => '',
                        ],
                    ],

                    [
                        'name' => 'menu_attr',
                        'label' => esc_html__( 'Menu Attr', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'menu-attr' , 'hexcoupon-master' ),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'make_it_active',
                        'label' => esc_html__( 'Make it active', 'hexcoupon-master' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Yes', 'hexcoupon-master' ),
                        'label_off' => esc_html__( 'No', 'hexcoupon-master' ),
                        'return_value' => 'yes',
                        'default' => '',
                    ],

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
        ?>
        <!-- Comparison area start -->
        <div class="comparison">
            <?php if ( 'yes' == $settings['show_menu'] ) : ?>
            <div class="comparison__tab">
                <?php if ( $settings['menu_list'] ) : foreach ( $settings['menu_list'] as $item ) : ?>
                <button type="button" data-filter=".<?php echo esc_attr( $item['menu_attr'] ); ?>" class="<?php if ( 'yes' === $item['make_it_active'] ) echo esc_attr( 'active' ); ?>"><?php \Elementor\Icons_Manager::render_icon( $item['menu_icon'], [ 'aria-hidden' => 'true' ] ); ?><span><?php printf( esc_html__( '%s', 'hex-coupon-for-woocommerce' ), esc_html( $item['menu_title'] ) );?></span></button>
                <?php endforeach; endif; ?>
            </div>
            <?php endif; ?>
            <div class="comparison__table">
                <table class="table table-rounded">
                    <thead class="hide-first-th">
                    <tr>
                        <th colspan="1"></th>
                        <th>
                            <div class="btn_wrapper">
                                <a href="javascript:void(0)" class="cmn_btn <?php if ( 'yes' == $settings['make_free_colorful'] ) echo esc_attr( 'gradient_1' ); ?> btn_bg_gray radius-5 w-100"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['free_title_text'] ) ); ?></a>
                            </div>
                        </th>
                        <th>
                            <div class="btn_wrapper">
                                <a href="javascript:void(0)" class="cmn_btn <?php if ( 'yes' == $settings['make_pro_colorful'] ) echo esc_attr( 'gradient_1' ); ?> btn_bg_gray radius-5 w-100"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['premium_title_text'] ) ); ?></a>
                            </div>
                        </th>
                        
                        <?php if ( $settings['third_title_text'] ) : ?>
                        <th>
                            <div class="btn_wrapper">
                                <a href="javascript:void(0)" class="cmn_btn <?php if ( 'yes' == $settings['make_third_colorful'] ) echo esc_attr( 'gradient_1' ); ?> btn_bg_gray radius-5 w-100"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $settings['third_title_text'] ) ); ?></a>
                            </div>
                        </th>
                        <?php endif; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ( $settings['features_list'] ) : foreach ( $settings['features_list'] as $item ) : ?>
                        <tr class="<?php echo esc_attr( $item['menu_attr'] ); ?> <?php if ( 'yes' === $item['make_it_active'] ) echo esc_attr( 'show' ); ?>">
                            <td><span class="comparison__feature"><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $item['feature_title'] ) ); ?></span></td>
                            <td style="text-align: center;">
                                <?php if ( 'yes' === $item['show_text'] ) : ?>
                                    <span><?php if ( 'yes' === $item['show_text'] ) printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $item['free_text'] ) ); ?></span>
                                <?php else : ?>
                                    <span class="comparison__icon <?php if ( 'yes' === $item['enable_cross_icon'] ) echo esc_attr( 'crossIcon' ); ?>"></span>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: center;">
                                <?php if ( 'yes' === $item['show_text'] ) : ?>
                                    <span><?php printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $item['pro_text'] ) ); ?></span>
                                <?php else : ?>
                                    <span class="comparison__icon <?php if ( 'yes' === $item['enable_cross_icon_two'] ) echo esc_attr( 'crossIcon' ); ?>"></span>
                                <?php endif; ?>
                            </td>
                             <?php if ( $settings['third_title_text'] ) : ?>
                            <td style="text-align: center;">
                                <?php if ( 'yes' === $item['show_text'] ) : ?>
                                    <span><?php if ( 'yes' === $item['show_text'] ) printf( esc_html__( '%s', 'hexcoupon-master' ), esc_html( $item['free_text'] ) ); ?></span>
                                <?php else : ?>
                                    <span class="comparison__icon <?php if ( 'yes' === $item['enable_cross_icon_third'] ) echo esc_attr( 'crossIcon' ); ?>"></span>
                                <?php endif; ?>
                            </td>
                             <?php endif; ?>
                        </tr>
                    <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Comparison area ends -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register( new WPhex_Comparison_Area() );