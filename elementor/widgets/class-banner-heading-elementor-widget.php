<?php
/**
 * Elementor Widget
 * @package wphex
 * @since 1.0.0
 */

namespace Elementor;
class wphex_Banner_Heading_Widget extends Widget_Base {

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
        return 'wphex-banner-heading-widget';
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
        return esc_html__( 'WPHex Banner Heading', 'wphex-master' );
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
        return 'eicon-heading';
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
        // banner content area starts here
        $this->start_controls_section(
            'banner_content',
            [
                'label' => esc_html__( 'Banner Content', 'wphex-master' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
		
		$this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one' => esc_html__( 'One', 'wphex-master' ),
                    'two'  => esc_html__( 'Two', 'wphex-master' ),
					'three'  => esc_html__( 'Three', 'wphex-master' ),
                ],
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__( 'Heading', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Sleek and Exquisite WordPress Plugins & Themes', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type your heading here', 'wphex-master' ),
            ]
        );
		
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_two_typography',
                'selector' => '{{WRAPPER}} .wpHexBanner__content__single__title',
            ]
        );
		

        $this->add_control(
            'sub_heading',
            [
                'label' => esc_html__( 'Sub-Heading', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Building Brilliance with WordPress', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type your sub-heading here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Unlock the full potential of your website and propel it to new heights with our exceptional WordPress plugins.', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type your description here', 'wphex-master' ),
            ]
        );
		
		 $this->add_control(
            'heading_align',
            [
                'label' => esc_html__( 'Alignment', 'wphex-master' ),
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
                    '{{WRAPPER}} .wpHexBanner__content__single' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        // $this->add_control(
        //     'description_align',
        //     [
        //         'label' => esc_html__( 'Description Alignment', 'wphex-master' ),
        //         'type' => \Elementor\Controls_Manager::CHOOSE,
        //         'options' => [
        //             'left' => [
        //                 'title' => esc_html__( 'Left', 'wphex-master' ),
        //                 'icon' => 'eicon-text-align-left',
        //             ],
        //             'center' => [
        //                 'title' => esc_html__( 'Center', 'wphex-master' ),
        //                 'icon' => 'eicon-text-align-center',
        //             ],
        //             'right' => [
        //                 'title' => esc_html__( 'Right', 'wphex-master' ),
        //                 'icon' => 'eicon-text-align-right',
        //             ],
        //         ],
        //         'default' => 'center',
        //         'toggle' => true,
        //         'selectors' => [
        //             '{{WRAPPER}} .banner_single__content__para' => 'text-align: {{VALUE}}',
        //         ],
        //     ]
        // );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Explore our all plugin', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type your description here', 'wphex-master' ),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Button Link', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'wphex-master' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'button_ID',
            [
                'label' => esc_html__( 'Button ID', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => "wphex_header_banner_button",
                'label_block' => true,
            ]
        );
		
		 $this->add_control(
            'show_button',
            [
                'label' => esc_html__( 'Show Button', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'wphex-master' ),
                'label_off' => esc_html__( 'Hide', 'wphex-master' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
		
		$this->add_control(
            'netshape_or_watermark',
            [
                'label' => esc_html__( 'Netshape or Watermark', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'netshape',
                'options' => [
                    'netshape' => esc_html__( 'Netshape', 'wphex-master' ),
                    'watermark'  => esc_html__( 'Watermark', 'wphex-master' ),
                ],
                'condition' => [
                        'style' => 'two'
                ]
            ]
        );

        $this->add_control(
            'watermark_text',
            [
                'label' => esc_html__( 'Watermark Text', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'wpHex', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type watermark text here', 'wphex-master' ),
                'condition' => [
					'style' => 'three',
                ]
            ]
        );
        
//         $this->add_control(
//             'review_list',
//             [
//                 'label' => esc_html__( 'Review List', 'wphex-master' ),
//                 'type' => \Elementor\Controls_Manager::REPEATER,
//                 'fields' => [
//                     [
//                         'name' => 'image',
//                         'label' => esc_html__( 'Choose Image', 'wphex-master' ),
//                         'type' => \Elementor\Controls_Manager::MEDIA,
//                         'default' => [
//                             'url' => \Elementor\Utils::get_placeholder_image_src(),
//                         ],
//                     ],
//                     [
//                         'name' => 'review_text',
//                         'label' => esc_html__( 'Title', 'wphex-master' ),
//                         'type' => \Elementor\Controls_Manager::TEXT,
//                         'default' => esc_html__( '5.0/5 329 Reviews', 'wphex-master' ),
//                         'placeholder' => esc_html__( 'Type your text here', 'wphex-master' ),
//                     ],
//                     [
//                         'name' => 'rating',
//                         'label' => esc_html__( 'Rating', 'wphex-master' ),
//                         'type' => \Elementor\Controls_Manager::NUMBER,
//                         'min' => 1,
//                         'max' => 5,
//                         'step' => .5,
//                         'default' => 1,
//                     ],
//                 ],
//             ]
//         );
		
        $this->end_controls_section();
        // heading content area ends here

    }

    public function ratingStar( $rating, $echo = true ) {

        $starRating = '';

        $j = 0;

        for( $i = 0; $i <= 4; $i++ ) {

            $j++;

            if( $rating  >= $j   || $rating  == '5'   ) {

                $starRating .= '<i class="las la-star"></i>';

            }

            elseif( $rating < $j && $rating  > $i ) {

                $starRating .= '<i class="las la-star-half"></i>';

            }

            //  else {

            // $starRating .= '<i class="fal fa-star"></i>';

            //  }

        }

        if( $echo == true ) {

            echo $starRating;

        } else {

            return $starRating;

        }

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
        $button_url = ! empty( $settings['button_link']['url'] ) ? $settings['button_link']['url'] : '';
        $review_list = ! empty( $settings['review_list'] ) ? $settings['review_list'] : '';

        $img_id = get_post_thumbnail_id(get_the_ID());
        $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
        ?>


        <!-- Banner area Starts -->
			<?php if( 'one' === $settings['style'] ) : ?>
                    <div class="wpHexBanner wpHexBanner__padding gradient_section_parent gradientBg_section">
                <div class="wpHex__netShape">
                    <div class="wpHex__netShape__thumb">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/net_shape.png" alt="netShape">
                    </div>
                </div>
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-10">
                            <div class="wpHexBanner__content">
                                <div class="wpHexBanner__content__single center-text">
                                    <span class="wpHexBanner__content__single__subtitle mb-4"><?php printf( esc_html__( '%s', 'wphex' ), $settings['sub_heading'] ); ?></span>
                                    <h1 class="wpHexBanner__content__single__title"><?php printf( esc_html__( '%s', 'wphex' ), $settings['heading'] ); ?></h1>
                                    <p class="wpHexBanner__content__single__para mt-4"><?php printf( esc_html__( '%s', 'wphex' ), $settings['description'] ); ?> </p>
									<?php if( 'yes' === $settings['show_button'] ) : ?>
                                    <div class="btn_wrapper">
                                        <a href="<?php echo esc_url( $button_url ); ?>" 
                                        <?php 
                                        
                                        if(!empty($settings['button_ID'])){
                                            echo 'id="'.esc_attr($settings['button_ID']).'"';
                                        }
                                        
                                        ?>
                                        class="wphex_cmn_btn btn_gradient_one radius-5 mt-4 mt-lg-5"><?php printf( esc_html__( '%s', 'wphex' ), $settings['button_text'] ); ?></a>
                                    </div>
									<?php endif; ?>
                                </div>
<!-- 								
								<div class="wpHexBanner__content__marketplace mt-4 mt-lg-5">
                                    <div class="wpHexBanner__content__marketplace__flex">

                                        <?php if( ! empty( $review_list ) ) : foreach( $review_list as $review_single ) : ?>
                                        <div class="wpHexBanner__content__marketplace__item center-text">
                                            <div class="wpHexBanner__content__marketplace__thumb">
                                                <img src="<?php echo esc_html( $review_single['image']['url'] ); ?>" alt="<?php esc_html( $alt_text ); ?>">
                                            </div>
                                            <div class="wpHexBanner__content__marketplace__reviews mt-3">
                                                <div class="wpHexBanner__content__marketplace__reviews__star">
                                                    <?php
                                                    // echo the star rating
                                                    $rating = $review_single['rating'];
                                                    $echo = true;
                                                    $this->ratingStar( $rating, $echo )
                                                    ?>
                                                </div>
                                                <p class="wpHexBanner__content__marketplace__reviews__para mt-3"><?php printf( esc_html__( '%s', 'wphex' ), $review_single['review_text'] ); ?></p>
                                            </div>
                                        </div>
                                        <?php endforeach; endif; ?>
                                    </div>
                                </div> -->
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php endif; ?>
			<?php if( 'two' === $settings['style'] ) : ?>
            <section class="wphex_mission gradient_section_parent gradientBg_section padding-top-100 padding-bottom-100">
                    <div class="wpHex__netShape">
                        <div class="wpHex__netShape__thumb">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/net_shape.png" alt="netShape">
                        </div>
                    </div>
                <div class="container">
                    <div class="wphex_section__title">
                        <span class="subtitle"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['sub_heading'] ); ?></span>
                        <h2 class="title"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['heading'] ); ?></h2>
                        <p class="section_para"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['description'] ); ?> </p>
                    </div>
                </div>
            </section>
			<?php elseif( 'three' === $settings['style'] ) : ?>
			<div class="wpHex_guide_area gradient_section_parent gradientBg_section padding-top-100 padding-bottom-100">
            <div class="wphex__opacity">
                <h2 class="wphex__opacity__text"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['watermark_text'] ); ?></h2>
            </div>
				<div class="container">
					<div class="wphex_section__title">
						<span class="subtitle"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['sub_heading'] ); ?></span>
						<h2 class="title"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['heading'] ); ?></h2>
						<p class="section_para"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['description'] ); ?></p>
					</div>

				</div>
       		 </div>
            <?php endif; ?>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new wphex_Banner_Heading_Widget() );