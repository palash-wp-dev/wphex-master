<?php

/**

 * Elementor Widget

 * @package wphex

 * @since 1.0.0

 */



namespace Elementor;

class wphex_Blog_Grid_Widget extends Widget_Base {



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

        return 'wphex-blog-grid-widget';

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

        return esc_html__( 'Blog Grid', 'wphex-master' );

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

            'blog_grid_content',

            [

                'label' => esc_html__( 'Blog Grid Content', 'wphex-master' ),

                'tab'   => Controls_Manager::TAB_CONTENT,

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

            'all_posts_link_text',

            [

                'label' => esc_html__( 'All Post Test', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::TEXT,

                'default' => esc_html__( 'Explore All', 'wphex-master' ),

                'placeholder' => esc_html__( 'Type your title here', 'wphex-master' ),

                'condition' => [

                      'show_button' => 'yes'

                ]

            ]

        );



        $this->add_control(

            'button_icon',

            [

                'label' => esc_html__( 'Icon', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::ICONS,

                'default' => [

                    'value' => 'fas fa-chevron-right',

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

                'condition' => [

                    'show_button' => 'yes'

                ]

            ]

        );



        $this->add_control(

            'show_pagination',

            [

                'label' => esc_html__( 'Show Pagination', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::SWITCHER,

                'label_on' => esc_html__( 'Show', 'wphex-master' ),

                'label_off' => esc_html__( 'Hide', 'wphex-master' ),

                'return_value' => 'yes',

                'default' => 'yes',

            ]

        );



        $this->end_controls_section();

        // blog grid content area ends here



        // featured image style section starts here

        $this->start_controls_section(

            'blog_grid_image',

            [

                'label' => esc_html__( 'Featured Image Style', 'wphex-master' ),

                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]

        );



        $this->add_control(

            'image_border_radius',

            [

                'label' => esc_html__( 'Border Radius', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::SLIDER,

                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],

                'range' => [

                    'px' => [

                        'min' => 0,

                        'max' => 1000,

                        'step' => 1,

                    ],

                    '%' => [

                        'min' => 0,

                        'max' => 100,

                        'step' => 1,

                    ],

                ],

                'default' => [

                    'unit' => 'px',

                    'size' => 10,

                ],

                'selectors' => [

                    '{{WRAPPER}} .single_blog__thumb img' => 'border-radius: {{SIZE}}{{UNIT}};',

                ],

            ]

        );



        $this->end_controls_section();

        // featured image style section ends here



        // button style section starts here

        $this->start_controls_section(

            'button_style_section',

            [

                'label' => esc_html__( 'Button Style', 'wphex-master' ),

                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]

        );



        $this->add_group_control(

            \Elementor\Group_Control_Background::get_type(),

            [

                'name' => 'button_background',

                'types' => [ 'classic', 'gradient' ],

                'selector' => '{{WRAPPER}} .cmn-btn.btn-gradient-1::before',

            ]

        );



        $this->add_control(

            'button_text_color',

            [

                'label' => esc_html__( 'Text Color', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::COLOR,

                'selectors' => [

                    '{{WRAPPER}} .cmn-btn.btn-gradient-1' => 'color: {{VALUE}}',

                ],

            ]

        );



        $this->add_control(

            'button_border_radius',

            [

                'label' => esc_html__( 'Border Radius', 'wphex-master' ),

                'type' => \Elementor\Controls_Manager::SLIDER,

                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],

                'range' => [

                    'px' => [

                        'min' => 0,

                        'max' => 1000,

                        'step' => 1,

                    ],

                    '%' => [

                        'min' => 0,

                        'max' => 100,

                        'step' => 1,

                    ],

                ],

                'default' => [

                    'unit' => 'px',

                    'size' => 10,

                ],

                'selectors' => [

                    '{{WRAPPER}} .cmn-btn.radius-10' => 'border-radius: {{SIZE}}{{UNIT}};',

                ],

            ]

        );



        $this->end_controls_section();

        // button style section ends here



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

        ));

        ?>

        <div class="row g-4 mt-4">

            <?php

            if( $new_query->have_posts() ) : while( $new_query->have_posts() ) : $new_query->the_post();

                $blog_date = get_the_date('d M y');

                $blog_time = get_the_time();

                $post_tags = get_the_tags();

                $post_tags_1 = ! empty( $post_tags[0]->name ) ? $post_tags[0]->name : '';

                $post_tags_2 = ! empty( $post_tags[1]->name ) ? $post_tags[1]->name : '';

            ?>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay=".1s">

                <div class="single_blog">

                    <div class="single_blog__thumb">

                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

                    </div>

                    <div class="single_blog__contents mt-3">

                        <div class="single_blog__tag">

                            <div class="single_blog__tag__item">

                                <?php if ( $post_tags ) : ?>

                                <a href="<?php echo the_permalink(); ?>" class="single_blog__tag__link"><?php echo esc_html( $post_tags_1 ); ?></a>

                                <a href="<?php echo the_permalink(); ?>" class="single_blog__tag__link"><?php echo esc_html( $post_tags_2 ); ?></a>

                                <?php endif; ?>

                            </div>

                            <div class="single_blog__tag__list">

                                <a href="<?php echo the_permalink(); ?>" class="single_blog__tag__list__item"><?php echo esc_html( $blog_time ); ?></a>

                                <a href="<?php echo the_permalink(); ?>" class="single_blog__tag__list__item"><?php echo esc_html( $blog_date ); ?></a>

                            </div>

                        </div>

                        <h4 class="single_blog__title mt-3"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h4>

                    </div>

                </div>

            </div>

            <?php endwhile; endif; ?>

            <?php if( 'yes' == $settings['show_button'] ) : ?>

            <div class="btn-wrapper center-text">

                <a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="cmn-btn btn-gradient-1 radius-10"><?php echo esc_html( $settings['all_posts_link_text'] ); ?> <?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>

            </div>

            <?php endif; ?>

        </div>


        <div class="row mt-5">

            <div class="col-lg-12">

                <div class="pagination_wrap">



                    <?php

                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                    $big = 12345678;

                    if( 'yes' === $settings['show_pagination'] ) {

                        $paginate = paginate_links(array(

                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),

                            'total' => $new_query->max_num_pages,

                            'prev_next' => true,

                            'type' => 'list',

                            'prev_text' => '<i class="fa-solid fa-angle-left"></i>',

                            'next_text' => '<i class="fa-solid fa-angle-right"></i>',

                            'current' => max(1, $paged),

                        ));



                        $paginate = str_replace( 'page-numbers', 'pagination_list', $paginate );

                        $paginate = str_replace( '<a class="pagination_list"', '<a class="pagination_list__item__link"', $paginate );

                        $paginate = str_replace( '</span>', '</a>', $paginate );

                        $paginate = str_replace( '<li>', '<li class="pagination_list__item">', $paginate );

                        $paginate = str_replace( '<li class="pagination_list__item"><a class="next pagination_list"', '<li class="pagination_list__item__prev"><a class="pagination_list__item__link"', $paginate );

                        $paginate = str_replace( '<li class="pagination_list__item"><a class="prev pagination_list"', '<li class="pagination_list__item__prev"><a class="pagination_list__item__link"', $paginate );

                        $paginate = str_replace( '<li class="pagination_list__item"><a class="next pagination_list"', '<li class="pagination_list__item__next"><a class="pagination_list__item__link"', $paginate );

                        $paginate = str_replace( '<li class="pagination_list__item"><span aria-current="page" class="pagination_list current">', '<li class="pagination_list__item active"><a href="javascript:void(0)" class="pagination_list__item__link">', $paginate );

                        $paginate = str_replace( '</span>', '</a>', $paginate );



                        echo $paginate;

                    }

                    ?>





                </div>

            </div>

        </div>

        <?php

    }

}



Plugin::instance()->widgets_manager->register_widget_type( new wphex_Blog_Grid_Widget() );