<?php

/**

 * Elementor Widget

 * @package wphex

 * @since 1.0.0

 */



namespace Elementor;

class WPHex_Latest_Blog_Slider extends Widget_Base {



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

        return 'wphex-latest-blog-slider-widget';

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

        return esc_html__( 'WPHex Latest Blog Slider', 'wphex-master' );

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

        return 'eicon-posts-grid';

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

        // blog grid content area starts here



        $category_dropdown[0] = 'Select Category';

        $terms  = get_terms( array( 'taxonomy' => "category", 'fields' => 'id=>name' ) );

        foreach ( $terms as $id => $name ) {

            $category_dropdown[$id] = $name;
        }

        $this->start_controls_section(

            'blog_slider_content',

            [

                'label' => esc_html__( 'Latest Blog Slider Content', 'wphex-master' ),

                'tab'   => Controls_Manager::TAB_CONTENT,

            ]

        );

        $this->add_control(
            'slider_title',
            [
                'label' => esc_html__( 'Title', 'wphex-master' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Our Latest Blog', 'wphex-master' ),
                'placeholder' => esc_html__( 'Type blog title here', 'wphex-master' ),
            ]
        );

        $this->add_control(

            'posts_per_page',

            [

                'label' => esc_html__( 'Posts Per Page', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::NUMBER,

                'min' => 3,

                'max' => 12,

                'step' => 1,

                'default' => -1,

            ]

        );
		
		$this->add_control(
			'post_order',
			[
				'label' => esc_html__( 'Order', 'wphex-master' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC' => esc_html__( 'ASC', 'wphex-master' ),
					'DESC'  => esc_html__( 'DESC', 'wphex-master' ),
				],
			]
		);



        $this->add_control(

            'category',

            [

                'label'   => esc_html__( 'Category', 'rsaddon' ),

                'type'    => Controls_Manager::SELECT2,

                'default' => 0,

                'options' => [



                    ]+ $category_dropdown,

                'multiple' => true,

                'separator' => 'before',

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

            'post_button_text',

            [

                'label' => esc_html__( 'Post Button Text', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::TEXT,

                'default' => esc_html__( 'Read Article', 'wphex-master' ),

                'placeholder' => esc_html__( 'Type your button text here', 'wphex-master' ),

            ]

        );

        $this->end_controls_section();

        // blog grid content area ends here
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

        $new_query = new \wp_Query(array(

            'post_type'      => 'post',
            'posts_per_page' => $settings['posts_per_page'],
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => $settings['post_order'],

        ));

        ?>

        <!-- Blog area start -->
        <div class="wphex_blog_area gradient_section_parent gradientBg_section padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="wphex_section__title text-left title_flex">
                    <h2 class="title"><?php printf( esc_html__( '%s', 'wphex-master' ), $settings['slider_title'] )?></h2>
                    <div class="append-blog"></div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12 mt-4">
                        <div class="global-slick-init nav-style-one slider-inner-margin" data-appendArrows=".append-blog" data-infinite="true" data-arrows="true" data-dots="false" data-slidesToShow="3" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500"
                             data-prevArrow='<div class="prev-icon"><i class="las la-arrow-left"></i></div>' data-nextArrow='<div class="next-icon"><i class="las la-arrow-right"></i></div>' data-responsive='[{"breakpoint": 1500,"settings": {"slidesToShow": 3}},{"breakpoint": 1400,"settings": {"slidesToShow": 3}},{"breakpoint": 1200,"settings": {"slidesToShow": 2}},{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 768, "settings": {"slidesToShow": 1}}]'>
                        <?php
                        if( $new_query->have_posts() ) : while( $new_query->have_posts() ) : $new_query->the_post();

                            $blog_date = get_the_date();

                            $post_tags = get_the_category();

                            $post_tags_1 = ! empty( $post_tags[0]->name ) ? $post_tags[0]->name : '';

                            ?>
                            <div class="slick-slider-item">
                                <div class="wphex_blog bg-white radius-10">
                                    <div class="wphex_blog__thumb thumb_shape">
                                        <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail(); ?> </a>

                                    </div>
                                    <div class="wphex_blog__contents">
                                        <div class="wphex_blog__contents__tag mb-3">
                                            <div class="wphex_blog__contents__tag__flex">
                                                <div class="wphex_blog__contents__tag__item">
                                                    <a class="wphex_blog__contents__tag__item__single" href="javascript:void(0)"><?php printf( esc_html__( '%s', 'wphex-master' ), $post_tags_1 ); ?></a>
                                                </div>
                                                <div class="wphex_blog__contents__tag__item">
                                                    <span class="wphex_blog__contents__tag__item__date"><?php printf( esc_html__( '%s', 'wphex-master' ), $blog_date )?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="wphex_blog__contents__title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h3>
                                        <p class="wphex_blog__contents__para mt-3"><?php echo wp_trim_words( get_the_content(), 20 ); ?></p>
                                        <?php if ( 'yes' == $settings['show_button'] ) : ?>
                                        <div class="btn_wrapper mt-4">
                                            <a href="<?php the_permalink(); ?>" class="wpHex_service__btn radius-5"> <?php printf( esc_html__( '%s', 'wphex-master' ), $settings['post_button_text'] )?> </a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog area end -->

        <?php

    }

}



Plugin::instance()->widgets_manager->register_widget_type( new WPHex_Latest_Blog_Slider() );