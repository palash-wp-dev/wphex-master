<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class wphex_Product_Grid_One_Widget extends Widget_Base {

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
		return 'wphex-product-grid-one-widget';
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
		return esc_html__( 'Featured Products', 'wphex-master' );
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
		return ' eicon-image-box';
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
			'settings_section',
			[
				'label' => esc_html__( 'General Settings', 'wphex-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control( 'column', [
			'label'       => esc_html__( 'Column', 'wphex-master' ),
			'type'        => Controls_Manager::SELECT,
			'options' => [
			  '6' => esc_html__('02 Column','wphex-master'),
			  '4' => esc_html__('03 Column','wphex-master'),
			  '3' => esc_html__('04 Column','wphex-master'),
            ],
			'default'     => '4',
			'description' => esc_html__( 'select column' )
		] );
		$this->add_control( 'total', [
			'label'       => esc_html__( 'Total Posts', 'wphex-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '-1',
			'description' => esc_html__( 'enter how many post you want in masonry , enter -1 for unlimited post.' )
		] );
		$this->add_control('product_by_id',[
			'label'       => esc_html__( 'Product By ID', 'wphex-master' ),
			'type'        => Controls_Manager::SWITCHER,
            'default' => 'no'
        ]);
		$this->add_control( 'post__in', [
			'label'       => esc_html__( 'Post In', 'wphex-master' ),
			'type'        => Controls_Manager::SELECT2,
			'options'     => wphex()->get_post_type_list( 'download', 'id' ),
			'label_block' => true,
 			'multiple' => true,
            'condition' => ['product_by_id' => 'yes']
		] );
		$this->add_control( 'category', [
			'label'       => esc_html__( 'Category', 'wphex-master' ),
			'type'        => Controls_Manager::SELECT2,
			'options'     => wphex()->get_terms_names( 'download_category', 'id' ),
			'multiple' => true,
			'condition' => ['product_by_id' => 'no']
		] );
		$this->add_control( 'order', [
			'label'       => esc_html__( 'Order', 'wphex-master' ),
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'ASC'  => esc_html__( 'Ascending', 'wphex-master' ),
				'DESC' => esc_html__( 'Descending', 'wphex-master' ),
			),
			'default'     => 'ASC',
			'description' => esc_html__( 'select order', 'wphex-master' )
		] );
		$this->add_control( 'orderby', [
			'label'       => esc_html__( 'OrderBy', 'wphex-master' ),
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'ID'            => esc_html__( 'ID', 'wphex-master' ),
				'title'         => esc_html__( 'Title', 'wphex-master' ),
				'date'          => esc_html__( 'Date', 'wphex-master' ),
				'rand'          => esc_html__( 'Random', 'wphex-master' ),
				'comment_count' => esc_html__( 'Most Comments', 'wphex-master' ),
			),
			'default'     => 'ID',
			'description' => esc_html__( 'select order', 'wphex-master' )
		] );
		$this->end_controls_section();


	}

	/**
	 * Render Elementor widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings             = $this->get_settings_for_display();
        //query settings
		$post__in = $settings['post__in'];
		$total_posts = $settings['total'];
		$category    = $settings['category'];
		$order       = $settings['order'];
		$orderby     = $settings['orderby'];

		//setup query
		$args = array(
			'post_type' => 'download',
			'posts_per_page' => $total_posts,
			'order' => $order,
			'orderby' => $orderby,
			'post_status' => 'publish',
			'ignore_sticky_posts' => 1,
		);

		if (!empty($category) && !empty($settings['product_by_id'])) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'download_category',
					'field' => 'term_id',
					'terms' => $category
				)
			);
		}
		if (!empty($post__in)) {
			$args['post__in'] = $post__in;
			$args['posts_per_page'] = count($post__in);
			unset($args['order']);
			unset($args['orderby']);
		}

		$post_data = new \WP_Query($args);
		?>
        <div class="product-grid-wrapper ">
                <div class="row">
				<?php
                    while ($post_data->have_posts()):$post_data->the_post();
	                    $wphex = wphex();
	                    $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false ;
	                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'wphex_product',false) : '';
	                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
	                    $img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';

						//download metabox
	                    $sales = get_post_meta(get_the_ID(),'sales',true);
	                    $_cut_price = get_post_meta(get_the_ID(),'wphex_cut_price',true);
	                    $_rating = get_post_meta(get_the_ID(),'wphex_rating',true);
	                    $_rating_count = get_post_meta(get_the_ID(),'wphex_rating_count',true);
	                    $demo_url = get_post_meta(get_the_ID(),'wphex_demo_url',true);
	                    $product_type = get_post_meta(get_the_ID(),'wphex_type',true);
	                    $envato_product_id = get_post_meta(get_the_ID(),'wphex_envato_product_id',true);
	                    $average_rating =  !empty($_rating) ? ($_rating * 100 ) / 5 : '';
	                    
	                     //if sales number not avilable extact it form envato
                        $item_sales = get_post_meta(get_the_ID(),'_edd_download_sales',true);
                        if($item_sales == 0 && !empty($envato_product_id)){
                            $item_price = \wphex_Envato::get_product_sales_by_id($envato_product_id);
                            update_post_meta(get_the_ID(),'_edd_download_sales',$item_price);
                        }
                        
					?>
                    <div class="col-lg-<?php echo esc_attr($settings['column'])?> col-md-6">
                        <div class="wphex-download-grid">
	                        <div class="thumbnail">
		                        <a href="<?php the_permalink();?>"> <img src="<?php echo esc_url($img_url);?>" alt="<?php echo esc_attr($img_alt);?>"></a>
		                       <div class="sales-count"> <?php echo esc_html($item_sales);?> <span><?php esc_html_e(' Sales','wphex');?></span></div>
	                        </div>
	                        <div class="content">
		                        <div class="top-content">
                                    <div class="wphex-cats ">
				                        <?php
				                        $all_category = wp_get_post_terms(get_the_ID(),'download_category');
				                        foreach ($all_category as $cat){
					                        printf('<a href="%1$s" class="%3$s">%2$s</a>',get_term_link($cat->term_id),esc_html($cat->name),esc_attr($cat->slug));
				                        }
				                        ?>
                                    </div>
			                        <?php if (!empty($_rating)):?>
                                        <div class="rating-wrap">
                                            <div class="ratings">
                                                <span class="hide-rating"></span>
                                                <span class="show-rating" style="width: <?php echo esc_attr($average_rating.'%');?>"></span>
                                            </div>
                                            <span class="total-ratings">(<?php echo esc_html($_rating_count)?>)</span>
                                        </div>
			                        <?php endif;?>
		                        </div>
		                        <div class="middle-content">
			                        <a href="<?php the_permalink();?>"><h4 class="title"><?php the_title();?></h4></a>
		                        </div>
		                        <div class="bottom-content">
                                    <div class="price-wrap">
				                        <?php
				                        edd_price(get_the_ID());
				                        if(!empty($_cut_price)) printf('<del class="cut-price">%1$s%2$s</del>',edd_currency_symbol(),esc_html($_cut_price));
				                        ?>
                                    </div>
			                        <div class="wphex-download-options">
				                        <ul>
					                        <li><a href="<?php echo esc_url($demo_url);?>" title="<?php echo esc_attr('Live Preview','wphex-master');?>" data-toggle="tooltip" data-placement="top" target="_blank"><i class="fa fa-desktop"></i></a></li>
					                        <?php
					                        if ($product_type == 'envato') printf('<li><a href="%1$s" title="%2$s" data-toggle="tooltip" data-placement="top" target="_blank"><i class="fa fa-shopping-cart"></i></a></li>',esc_url('https://codecanyon.net/cart/add_items?item_ids='.$envato_product_id),esc_attr('Buy From Envato','wphex-master'));
					                        ?>
				                        </ul>
			                        </div>
		                        </div>
	                        </div>
                        </div>
                    </div>
				<?php
                    endwhile;
				    wp_reset_query();
				?>
                </div>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new wphex_Product_Grid_One_Widget() );
