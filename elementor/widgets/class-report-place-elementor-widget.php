<?php

use Elementor\Controls_Manager;

class WPHex_Product_Report_Place extends \Elementor\Widget_Base {

    public function get_name() {
        return 'wphex-product-report-place';
    }

    public function get_title() {
        return esc_html__( 'report-place', 'elementor-addon' );
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_categories() {
        return [ 'xgenious_widgets_reportgenix' ];
    }

    public function get_keywords() {
        return [ 'banner'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content',
            [
                'label' => esc_html__( 'Content', 'xgenious' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'List', 'xgenious' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'action_link',
                        'label' => esc_html__( 'Action Link', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'options' => [ 'url', 'is_external', 'nofollow' ],
                        'default' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => true,
                            // 'custom_attributes' => '',
                        ],
                        'label_block' => true,
                    ],
                    [
                        'name' => 'bg_img',
                        'label' => esc_html__( 'Choose Image', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'right_img',
                        'label' => esc_html__( 'Choose Image', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'title',
                        'label' => esc_html__( 'Title', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'All your data in one place' , 'xgenious' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'style',
                        'label' => esc_html__( 'Style', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'one',
                        'options' => [
                            'one'  => esc_html__( 'One', 'xgenious' ),
                            'two' => esc_html__( 'Two', 'xgenious' ),
                            'three' => esc_html__( 'Three', 'xgenious' ),
                        ],
                    ],
                    [
                        'name' => 'feature_icon',
                        'label' => esc_html__( 'Feature Icon', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'condition' => [
                            'style' => 'one',
                        ],
                    ],
                    [
                        'name' => 'feature_icon_bg',
                        'label' => esc_html__( 'Icon Color', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .place-report .report-body .img' => 'background: {{VALUE}} !important',
                        ],
                        'condition' => [
                            'style' => 'one',
                        ],
                    ],
                    [
                        'name' => 'feature_title',
                        'label' => esc_html__( 'Feature Title', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'All your data in one place' , 'xgenious' ),
                        'label_block' => true,
                        'condition' => [
                            'style' => 'one',
                        ],
                    ],
                    [
                        'name' => 'feature_description',
                        'label' => esc_html__( 'Feature Description', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__( 'Decision-making process of a machine learning Model like mine Relies on the' , 'xgenious' ),
                        'label_block' => true,
                        'condition' => [
                            'style' => 'one',
                        ],
                    ],

                    [
                        'name' => 'feature_icon_two',
                        'label' => esc_html__( 'Feature Icon Two', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'condition' => [
                            'style' => 'one',
                        ],
                    ],
                    [
                        'name' => 'feature_icon_bg_two',
                        'label' => esc_html__( 'Icon Color Two', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .place-report .report-body .img.img2' => 'background: {{VALUE}} !important',
                        ],
                        'condition' => [
                            'style' => 'one',
                        ],
                    ],
                    [
                        'name' => 'feature_title_two',
                        'label' => esc_html__( 'Feature Title Two', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'All your data in one place' , 'xgenious' ),
                        'label_block' => true,
                        'condition' => [
                            'style' => 'one',
                        ],
                    ],
                    [
                        'name' => 'feature_description_two',
                        'label' => esc_html__( 'Feature Description Two', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__( 'Decision-making process of a machine learning Model like mine Relies on the' , 'xgenious' ),
                        'label_block' => true,
                        'condition' => [
                            'style' => 'one',
                        ],
                    ],

                    [
                        'name' => 'feature_icon_three',
                        'label' => esc_html__( 'Feature Icon Three', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'condition' => [
                            'style' => 'one',
                        ],
                    ],
                    [
                        'name' => 'feature_icon_bg_three',
                        'label' => esc_html__( 'Icon Color Three', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .place-report .report-body .img.img3' => 'background: {{VALUE}} !important',
                        ],
                        'condition' => [
                            'style' => 'one',
                        ],
                    ],
                    [
                        'name' => 'feature_title_three',
                        'label' => esc_html__( 'Feature Title Three', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'All your data in one place' , 'xgenious' ),
                        'label_block' => true,
                        'condition' => [
                            'style' => 'one',
                        ],
                    ],
                    [
                        'name' => 'feature_description_three',
                        'label' => esc_html__( 'Feature Description Three', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__( 'Decision-making process of a machine learning Model like mine Relies on the' , 'xgenious' ),
                        'label_block' => true,
                        'condition' => [
                            'style' => 'one',
                        ],
                    ],
                    [
                        'name' => 'long_description',
                        'label' => esc_html__( 'Long Description', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__( 'Refers to the incorporation of artificial intelligence (AI) technologies and capabilities into existing systems, Processes, or applications' , 'xgenious' ),
                        'label_block' => true,
                        'condition' => [
                            'style' => [ 'two', 'three' ],
                        ],
                    ],
                    [
                        'name' => 'features_list',
                        'label' => esc_html__( 'Features', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'condition' => [
                            'style' => 'three',
                        ],
                    ],
                    [
                        'name' => 'button_text',
                        'label' => esc_html__( 'Button Title', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Get Started' , 'xgenious' ),
                        'label_block' => true,
                        'condition' => [
                            'style' => 'two',
                        ],
                    ],
                    [
                        'name' => 'button_link',
                        'label' => esc_html__( 'Button Link', 'xgenious' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'options' => [ 'url', 'is_external', 'nofollow' ],
                        'default' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => true,
                            // 'custom_attributes' => '',
                        ],
                        'label_block' => true,
                        'condition' => [
                            'style' => 'two',
                        ],
                    ]
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="report-slider-all-report slider-outer">
            <?php if ( $settings['list'] ) : foreach ( $settings['list'] as $item ) : if  ( 'one' === $item['style'] ) : $action_link = ! empty( $item['action_link']['url'] ) ? $item['action_link']['url'] : ''; ?>

                <div class="all-report pt-60 pb-60 slider-up">
                    <a href="<?php echo esc_url( $action_link ); ?>">
                    <div class="container">
                        <div class="place-report wraper-padding" style="background-image: url('<?php echo esc_url( $item['bg_img']['url'] ); ?>')">
                            <div class="row align-items-end">
                                <div class="col-lg-6">
                                    <h2 class="report-second-heading"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['title'] ) ); ?></h2>
                                    <div class="report-body">
                                        <div class="single-part mb-16">
                                            <div class="image-icon">
                                                <div class="img">
                                                    <?php \Elementor\Icons_Manager::render_icon( $item['feature_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                </div>
                                            </div>
                                            <div class="text-part">
                                                <div class="text">
                                                    <h3 class="report-third-heading"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['feature_title'] ) ); ?></h3>
                                                    <p><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['feature_description'] ) ); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-part mb-16">
                                            <div class="image-icon">
                                                <div class="img img2">
                                                    <?php \Elementor\Icons_Manager::render_icon( $item['feature_icon_two'], [ 'aria-hidden' => 'true' ] ); ?>
                                                </div>
                                            </div>
                                            <div class="text-part">
                                                <div class="text">
                                                    <h3 class="report-third-heading"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['feature_title_two'] ) ); ?></h3>
                                                    <p><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['feature_description_two'] ) ); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-part">
                                            <div class="image-icon">
                                                <div class="img img3">
                                                    <?php \Elementor\Icons_Manager::render_icon( $item['feature_icon_three'], [ 'aria-hidden' => 'true' ] ); ?>
                                                </div>
                                            </div>
                                            <div class="text-part">
                                                <div class="text">
                                                    <h3 class="report-third-heading"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['feature_title_three'] ) ); ?></h3>
                                                    <p><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['feature_description_three'] ) ); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="right-image-wraper">
                                        <div class="right-image">
                                            <img src="<?php echo esc_url( $item['right_img']['url'] ); ?>" alt="all report">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   </a>
                </div>
            <?php endif; ?>

                <?php if ( 'two' === $item['style'] ) : ?>
                    <div class="data pt-60 pb-60 slider-up">
                        <a href="<?php echo esc_url( $action_link ); ?>">
                        <div class="container">
                            <div class="data-wraper wraper-padding" style="background-image: url('<?php echo esc_url( $item['bg_img']['url'] ); ?>')">
                                <div class="row g-5 g-lg-0">
                                    <div class="col-lg-6">
                                        <div class="data-text pe-lg-4">
                                            <h2 class="report-second-heading mb-26"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['title'] ) ); ?></h2>
                                            <p class="mb-38"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['long_description'] ) ); ?></p>
                                            <?php if ( ! empty( $item['button_link']['url'] ) ) : ?>
                                                <div class="data-btn">
                                                    <a href="<?php echo esc_url( $item['button_link']['url'] ); ?>" class="report-cmn-btn report-transparent-btn"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['button_text'] ) ); ?> <i class="fa-solid fa-arrow-right"></i></a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="image-wraper">
                                            <div class="image">
                                                <img src="<?php echo esc_url( $item['right_img']['url'] ); ?>" alt="Data">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if ( 'three' === $item['style'] ) : ?>
                    <div class="reportgenix-report-builder slider-up pt-60 pb-60">
                        <a href="<?php echo esc_url( $action_link ); ?>">
                        <div class="container">
                            <div class="report-builder-wraper wraper-padding" style="background-image: url('<?php echo esc_url( $item['bg_img']['url'] ); ?>');">
                                <div class="wraper-padding-inside-01 d-flex">
                                    <div class="row g-5 align-self-center">
                                        <div class="col-lg-6">
                                            <div class="text">
                                                <h2 class="report-second-heading mb-26"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['title'] ) ); ?></h2>
                                                <p class="mb-26"><?php printf( esc_html__( '%s', 'xgenious' ), esc_html( $item['long_description'] ) ); ?></p>
                                                <?php
                                                $allowed_html = [
                                                    'ul'  => [
                                                        'class'       => [],
                                                    ],
                                                    'li' => [
                                                        'class'    => [],
                                                    ],
                                                    'i' => [
                                                        'class' => [],
                                                    ],
                                                    'span' => [
                                                        'class' => [],
                                                    ]
                                                ];
                                                echo wp_kses( $item['features_list'], $allowed_html );
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="image text-end">
                                                <img src="<?php echo esc_url($item['right_img']['url']); ?>" alt="report builder">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>

                <?php endif; ?>
            <?php endforeach; endif; ?>
        </div>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new WPHex_Product_Report_Place() );