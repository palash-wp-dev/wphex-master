<?php

/**

 * Elementor Widget

 * @package Appside

 * @since 1.0.0

 */



namespace Elementor;

class WPHex_Grid_Testimonial extends Widget_Base {



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

        return 'wphex-grid-testimonial-widget';

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

        return esc_html__( 'WPHex Grid Testimonial', 'wphex-master' );

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



        // product features content section starts here

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

                'default' => esc_html__( 'What are the clients saying about us', 'wphex-master' ),

                'placeholder' => esc_html__( 'Type your title here', 'wphex-master' ),

            ]

        );
	

        $this->add_control(

            'testimonial_list',

            [

                'label' => esc_html__( 'Testimonial List', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::REPEATER,

                'fields' => [

                    [
                        'name' => 'client_image',
                        'label' => esc_html__( 'Choose Client Image', 'wphex-master' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [

                        'name' => 'client_name',

                        'label' => esc_html__( 'Name', 'wphex-master' ),

                        'type' => \Elementor\Controls_Manager::TEXT,

                        'default' => esc_html__( 'Albert Flores' , 'wphex-master' ),

                        'label_block' => true,

                    ],
                    [

                        'name' => 'twitter_user_name',

                        'label' => esc_html__( 'Name', 'wphex-master' ),

                        'type' => \Elementor\Controls_Manager::TEXT,

                        'default' => esc_html__( 'twitter_albert' , 'wphex-master' ),

                        'label_block' => true,

                    ],
                    [

                        'name' => 'feedback',

                        'label' => esc_html__( 'Feedback', 'wphex-master' ),

                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'row' => 5,
                        'default' => esc_html__( 'Client feedback' , 'wphex-master' ),

                        'label_block' => true,

                    ],
                    [
                        'name' => 'rating',
                        'label' => esc_html__( 'Rating', 'wphex-master' ),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 5,
                        'step' => .5,
                        'default' => 1,
                    ],
                    [
                        'name' => 'rating_image',
                        'label' => esc_html__( 'Choose Rating Image', 'wphex' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
					
				],



                'default' => [

                    [

                        'client_name' => esc_html__( 'Albert Flores', 'wphex-master' ),
                        'twitter_user_name' => esc_html__( 'twitter_albert', 'wphex-master' ),
                        'feedback' => esc_html__( 'Client feedback', 'wphex-master' ),
                        'rating' => [
                            'default' => 1
                        ]

                    ],

                    [

                        'client_name' => esc_html__( 'Albert Flores', 'wphex-master' ),
                        'twitter_user_name' => esc_html__( 'twitter_albert', 'wphex-master' ),
                        'feedback' => esc_html__( 'Client feedback', 'wphex-master' ),
                        'rating' => [
                            'default' => 1
                        ]

                    ],
                    [

                        'client_name' => esc_html__( 'Albert Flores', 'wphex-master' ),
                        'twitter_user_name' => esc_html__( 'twitter_albert', 'wphex-master' ),
                        'feedback' => esc_html__( 'Client feedback', 'wphex-master' ),
                        'rating' => [
                            'default' => 1
                        ]

                    ],

                ],

            ]

        );

        $this->end_controls_section();

        // product features content section ends here

    }

    public function ratingStar( $rating, $echo = true ) {

        $starRating = '';

        $j = 0;

        for( $i = 0; $i <= 4; $i++ ) {

            $j++;

            if( $rating  >= $j   || $rating  == '5'   ) {

                $starRating .= '<span class="wphex_testimonial__rating__icon" ><i class="fas fa-star"></i></span>';

            }

            elseif( $rating < $j && $rating  > $i ) {

                $starRating .= '<span class="wphex_testimonial__rating__icon" ><i class="fas fa-star-half-alt"></i></span>';

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
        $button_link = ! empty( $settings['product_features_button_link']['url'] ) ? $settings['product_features_button_link']['url'] : '';
        ?>
        <section class="wphex_testimonial_area gradient_section_parent gradientBg_section padding-top-100 padding-bottom-100">
            <!-- <div class="gradient_section">
                <div class="blur_item"></div>
                <div class="blur_item"></div>
                <div class="blur_item"></div>
                <div class="blur_item"></div>
                <div class="blur_item"></div>
            </div> -->
            <div class="wpHex__netShape">
                <div class="wpHex__netShape__thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner/net_shape.png" alt="netShape">
                </div>
            </div>
            <div class="container">
                <div class="wphex_section__title">
                    <h2 class="title"><?php printf(  esc_html__( '%s', 'wphex-master' ), $settings['title'] )?></h2>
                </div>
                <div class="row g-4 mt-4">
                    <?php
                        if ( $settings['testimonial_list'] ) :
                            foreach ( $settings['testimonial_list'] as $list_single ) :
                                $img = ! empty( $list_single['rating_image']['url'] ) ? $list_single['rating_image']['url'] : '';
                                $img2 = ! empty( $list_single['client_image']['url'] ) ? $list_single['client_image']['url'] : '';
                                $img_id = get_post_thumbnail_id(get_the_ID());
                                $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="wphex_testimonial bg-white radius-10">
                            <div class="wphex_testimonial__contents">
                                <div class="wphex_testimonial__author mt-2">
                                    <div class="wphex_testimonial__author__flex">
                                        <div class="wphex_testimonial__author__thumb">
                                            <img src="<?php echo esc_attr( $img2 ); ?>" alt="<?php printf(  esc_html__( '%s', 'wphex-master' ), $alt_text )?>">
                                        </div>
                                        <div class="wphex_testimonial__author__contents">
                                            <h5 class="wphex_testimonial__author__title"><?php printf(  esc_html__( '%s', 'wphex-master' ), $list_single['client_name'] )?> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonial/verified.png" alt=""></h5>
                                            <p class="wphex_testimonial__author__subtitle mt-1"><?php printf(  esc_html__( '@ %s', 'wphex-master' ), $list_single['twitter_user_name'] )?></p>
                                        </div>
                                    </div>
                                </div>
                                <p class="wphex_testimonial__contents__para mt-3"><?php printf(  esc_html__( '"%s"', 'wphex-master' ), $list_single['feedback'] )?></p>
                                <div class="wphex_testimonial__rating mt-4">
                                    <div class="wphex_testimonial__rating__logo">
                                        <img src="<?php echo esc_attr( $img ); ?>" alt="<?php echo esc_attr( $img ); ?>" alt="<?php printf(  esc_html__( '%s', 'wphex-master' ), $alt_text )?>">
                                    </div>
                                    <div class="wphex_testimonial__rating__flex d-flex gap-1">
                                        <?php
                                        // echo the star rating
                                        $rating = $list_single['rating'];
                                        $echo = true;
                                        $this->ratingStar( $rating, $echo )
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new WPHex_Grid_Testimonial() );