<?php
/**
 * @package wphex
 * @author Ir-Tech
 */
if (!defined("ABSPATH")) {
    exit(); //exit if access directly
}

if (!class_exists('wphex_Shortcodes')) {

    class wphex_Shortcodes
    {
        /*
        * $instance
        * @since 1.0.0
        * */
        protected static $instance;

        public function __construct()
        {
        	//Load plugin assets
	        add_action('wp_enqueue_scripts',array($this,'plugin_assets'));
        	//Load plugin admin assets
	       // add_action('admin_enqueue_scripts',array($this,'admin_assets'));
            // Load elementor support assets
            // add_action( 'admin_enqueue_scripts', array($this,'elementor_assets'));
        	//load plugin text domain
	        add_action('init',array($this,'load_textdomain'));

	        //load plugin dependency files()
	        self::load_plugin_dependency_files();
        }

        /**
         * getInstance()
         * */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

		/**
		 * Load Plugin Text domain
		 * @since 1.0.0
		 * */
		public function load_textdomain(){
			load_plugin_textdomain('wphex-master',false,wphex_MASTER_ROOT_PATH .'/languages');
		}

		/**
		 * load plugin dependency files()
		 * @since 1.0.0
		 * */
		public function load_plugin_dependency_files(){
			$includes_files = array(
				array(
					'file-name' => 'codestar-framework',
					'folder-name' => wphex_MASTER_LIB .'/codestar-framework'
				),
				array(
					'file-name' => 'class-menu-page',
					'folder-name' => wphex_MASTER_ADMIN
				),
				array(
					'file-name' => 'class-post-column-customize',
					'folder-name' => wphex_MASTER_ADMIN
				),
				array(
					'file-name' => 'class-wphex-excerpt',
					'folder-name' => wphex_MASTER_INC
				),
				// array(
				// 	'file-name' => 'class-envato',
				// 	'folder-name' => wphex_MASTER_INC
				// ),
				array(
					'file-name' => 'class-wphex-shortcodes',
					'folder-name' => wphex_MASTER_INC
				),
				array(
					'file-name' => 'class-elementor-widget-init',
					'folder-name' => wphex_MASTER_ELEMENTOR
				),
				array(
					'file-name' => 'class-about-us-widget',
					'folder-name' => wphex_MASTER_WP_WIDGETS
				),
				array(
					'file-name' => 'class-recent-post-widget',
					'folder-name' => wphex_MASTER_WP_WIDGETS
				),
                array(
                    'file-name' => 'class-table-of-contents-widget',
                    'folder-name' => wphex_MASTER_WP_WIDGETS
                ),
				array(
					'file-name' => 'class-contact-info-widget',
					'folder-name' => wphex_MASTER_WP_WIDGETS
				),
				array(
                    'file-name' => 'class-form-shortcode-widget',
                    'folder-name' => wphex_MASTER_WP_WIDGETS
                ),
				array(
                    'file-name' => 'class-wp-search-widget',
                    'folder-name' => wphex_MASTER_WP_WIDGETS
                ),
				array(
                    'file-name' => 'class-navigation-menu-widget',
                    'folder-name' => wphex_MASTER_WP_WIDGETS
                ),
				array(
                    'file-name' => 'class-ir-quote-widget',
                    'folder-name' => wphex_MASTER_WP_WIDGETS
                ),
				array(
					'file-name' => 'popular-product-widget',
					'folder-name' => wphex_MASTER_WP_WIDGETS
				),
				array(
					'file-name' => 'class-cron-job',
					'folder-name' => wphex_MASTER_INC
				),
				 array(
					'file-name' => 'ajax-request',
					'folder-name' => wphex_MASTER_INC
				),
			);

			if (is_array($includes_files) && !empty($includes_files)){
				foreach ($includes_files as $file){
					if (file_exists($file['folder-name'].'/'.$file['file-name'].'.php')){
						require_once $file['folder-name'].'/'.$file['file-name'].'.php';
					}
				}
			}
		}

		/**
		 * admin assets
		 * @since 1.0.0
		 * */
		public function plugin_assets(){
			self::load_plugin_css_files();
			self::load_plugin_js_files();
		}

	    /**
	     * load plugin css files()
	     * @since 1.0.0
	     * */
	    public function load_plugin_css_files(){
		    $plugin_version = wphex_MASTER_VERSION;
		    $all_css_files = array(
			    array(
				    'handle' => 'owl-carousel',
				    'src' => wphex_MASTER_CSS .'/owl.carousel.min.css',
				    'deps' => array(),
				    'ver' => $plugin_version,
				    'media' => 'all'
			    ),
			    array(
				    'handle' => 'wphex-master-wedocs-style',
				    'src' => wphex_MASTER_CSS .'/wedocs.css',
				    'deps' => array(),
				    'ver' => $plugin_version,
				    'media' => 'all'
			    ),
                array(
                    'handle' => 'wphex-master-all-plugin-style',
                    'src' => wphex_MASTER_CSS .'/all_plugin.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
			    array(
				    'handle' => 'wphex-master-main-style',
				    'src' => wphex_MASTER_CSS .'/main-style.css',
				    'deps' => array(),
				    'ver' => $plugin_version,
				    'media' => 'all'
			    ),
			     array(
                    'handle' => 'wphex-home-2-style',
                    'src' => wphex_MASTER_CSS .'/style-new.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
			    
			    
		    );

		    $all_css_files = apply_filters('wphex_master_css',$all_css_files);

		    if (is_array($all_css_files) && !empty($all_css_files)){
			    foreach ($all_css_files as $css){
				    call_user_func_array('wp_enqueue_style',$css);
			    }
		    }

	    }

	    /**
	     * load plugin js
	     * @since 1.0.0
	     * */
	    public function load_plugin_js_files(){
		    $plugin_version = wphex_MASTER_VERSION;
		    $all_js_files = array(
			    array(
				    'handle' => 'waypoints',
				    'src' => wphex_MASTER_JS .'/waypoints.min.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'args' => [
				         'in_footer' => true
				   ]
			    ),
			    array(
				    'handle' => 'counterup',
				    'src' => wphex_MASTER_JS .'/jquery.counterup.min.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'args' => [
				         'in_footer' => true
				   ]
			    ),
                array(
                    'handle' => 'wow',
                    'src' => wphex_MASTER_JS .'/wow.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'args' => [
				         'in_footer' => true
				   ]
                ),
			    array(
				    'handle' => 'owl-carousel',
				    'src' => wphex_MASTER_JS .'/owl.carousel.min.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'args' => [
				         'in_footer' => true
				   ]
			    ),
			    array(
				    'handle' => 'wphex-master-main-script',
				    'src' => wphex_MASTER_JS .'/main.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'args' => [
				         'in_footer' => true
				   ]
				   
			    ),
		    );

		    $all_js_files = apply_filters('wphex_master_js',$all_js_files);
		    if (is_array($all_js_files) && !empty($all_js_files)){
			    foreach ($all_js_files as $js){
				    call_user_func_array('wp_enqueue_script',$js);
			    }
		    }
		     wp_localize_script('wphex-master-main-script','xgObj',[
                'ajaxUrl' =>  admin_url('admin-ajax.php')
            ]);
	    }

		/**
		 * admin assets
		 * @since 1.0.0
		 * */
		public function admin_assets(){
			self::load_admin_css_files();
			self::load_admin_js_files();
		}
        public function elementor_assets() {
            self::load_elementor_js_files();
        }

		/**
		 * load plugin admin css files()
		 * @since 1.0.0
		 * */
		public function load_admin_css_files(){
			$plugin_version = wphex_MASTER_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'wphex-master-admin-style',
					'src' => wphex_MASTER_ADMIN_ASSETS .'/css/admin.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				)
			);

			$all_css_files = apply_filters('wphex_admin_css',$all_css_files);
			if (is_array($all_css_files) && !empty($all_css_files)){
				foreach ($all_css_files as $css){
					call_user_func_array('wp_enqueue_style',$css);
				}
			}
		}

		/**
		 * load plugin admin js
		 * @since 1.0.0
		 * */
		public function load_admin_js_files(){
			$plugin_version = wphex_MASTER_VERSION;
			$all_js_files = array(
				array(
					'handle' => 'wphex-master-widget',
					'src' => wphex_MASTER_ADMIN_ASSETS .'/js/widget.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
			);

			$all_js_files = apply_filters('wphex_admin_js',$all_js_files);
			if (is_array($all_js_files) && !empty($all_js_files)){
				foreach ($all_js_files as $js){
					call_user_func_array('wp_enqueue_script',$js);
				}
			}
		}

        /**
         * load elementor support js
         * @since 1.0.0
         * */
        public function load_elementor_js_files(){
            $plugin_version = wphex_MASTER_VERSION;
            $all_js_files = array(
                array(
                    'handle' => 'elementor-support',
                    'src' => wphex_MASTER_JS .'/elementor-support.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
            );

            $all_js_files = apply_filters('wphex_admin_js',$all_js_files);
            if (is_array($all_js_files) && !empty($all_js_files)){
                foreach ($all_js_files as $js){
                    call_user_func_array('wp_enqueue_script',$js);
                }
            }
        }


    }//end class
    if (class_exists('wphex_Shortcodes')){
	    wphex_Shortcodes::getInstance();
    }
}

