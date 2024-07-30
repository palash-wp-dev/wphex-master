<?php
/**
 * All Elementor widget init
 * @package wphex
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}


if ( !class_exists('wphex_Elementor_Widget_Init') ){

	class wphex_Elementor_Widget_Init{
		/*
		* $instance
		* @since 1.0.0
		* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array($this,'_widget_categories') );
			//elementor widget registered
			add_action('elementor/widgets/register',array($this,'_widget_registered'));
		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}
		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories($elements_manager){
			$elements_manager->add_category(
				'wphex_widgets',
				[
					'title' => __( 'wphex Widgets', 'wphex-master' ),
					'icon' => 'fa fa-plug',
				]
			);
		}

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered(){
			if( !class_exists('Elementor\Widget_Base') ){
				return;
			}
			$elementor_widgets = array(
				// 'accordion',
				// 'header-one',
				// 'product-grid-one',
				// 'latest-product-one',
				// 'counterup-one',
				// 'testimonial-one',
				// 'image-box-one',
				// 'button-one',
				// 'wedoc-grid-one',
				// 'wedoc-search-one',
                'info-box',
                'product-features-list',
    //             'newsletter',
    //             'blog-grid',
    //             'testimonial-two',
                'header-two',
    //             'product-grid-two',
    //             'header-three',
    //             'contact-info',
    //             'brand',
    //             'features',
    //             'wp-search',
    //             'product-search',
    //             'advanced-product-search',
    //             'navigation-menu',
    //             'about-us',
    //             'contact-info-two',
    //             'scroll-to-section-breadcrumb',
    //             'breadcrumb',
    //             'static-svg',
				// 'price-tag',
				'banner-heading',
				'banner-two',
				'comment-form',
				'social-share',
				'single-post-meta',
                'product-demo',
                'call-to-action',
                'experienced-team',
                'satisfied-clients',
                'grid-testimonial',
                'counterup-two',
                'brand-slider',
                'latest-blog-slider',
				'contact-form-area',
                'our-mission-area',
				'counterup-area',
				'all-products',
                'hexcoupon-product',
                'report-place',
                'loyalty-features-cart',
                'loyalty-most-features',
                'loyalty-upcoming-features',
                'loyalty-banner-area',
                'pricing-area',
                'comparison-area',
                'faq',
                'animated-heading',
			);

			$elementor_widgets = apply_filters('wphex_elementor_widget',$elementor_widgets);
			sort($elementor_widgets);
			if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
				foreach ( $elementor_widgets as $widget ){
					if(file_exists(wphex_MASTER_ELEMENTOR.'/widgets/class-'.$widget.'-elementor-widget.php')){
						require_once wphex_MASTER_ELEMENTOR.'/widgets/class-'.$widget.'-elementor-widget.php';
					}
				}
			}
 
		}

	}

	if ( class_exists('wphex_Elementor_Widget_Init') ){
		wphex_Elementor_Widget_Init::getInstance();
	}

}//end if