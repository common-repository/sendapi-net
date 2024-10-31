<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://sendapi.net
 * @since      1.0.0
 *
 * @package    sendapi
 * @subpackage sendapi/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    sendapi
 * @subpackage sendapi/public
 * @author     sendapi <info@sendapi.net>
 */
class sendapi_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $sendapi    The ID of this plugin.
	 */
	private $sendapi;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $sendapi       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $sendapi, $version ) {

		$this->sendapi = $sendapi;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in sendapi_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The sendapi_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->sendapi, plugin_dir_url( __FILE__ ) . 'css/sendapi-public.css', array(), $this->version, 'all' );

	}

	public function general_settings(){
		
		$sendapi_widget_id = get_option('widget_id');
		$sendapi_widget_position =  get_option('widget_position');
		$sendapi_widget_hidden_mobile = get_option('widget_hidden_mobile');
		$sendapi_widget_hidden_desktop = get_option('widget_hidden_desktop');
		$sendapi_widget_hidden_call_back = get_option('widget_hidden_call_back');
		
		if ($sendapi_widget_id == false){
				return 0;
		}
		
		require_once plugin_dir_path( __FILE__ ). 'partials/sendapi-public-display.php';
		
	}

	public function shortcode_content( $atts ){
		try {
		$product = new WC_Product(get_the_ID());
		$sendapi_button_name = get_option('button_name');
		$sendapi_widget_oneclick_hidden_desktop = get_option('widget_oneclick_hidden_desktop') ? "true" : "";
		$sendapi_widget_oneclick_hidden_mobile = get_option('widget_oneclick_hidden_mobile') ? "true" : "";
		$price = ($product->get_sale_price() ? $product->get_sale_price() : $product->get_price());
		$product_url = get_permalink($product->id);
		$thumb = get_the_post_thumbnail_url($product->id);
		$images = $product->get_gallery_image_ids();
		$first_image_url = '';
		if ( is_array( $images ) && !empty($images) ) {
			$first_image_url = wp_get_attachment_url( $images[0] );
		}
		$image_url = ($thumb ? $thumb : $first_image_url);
		return
		'
		<div class="sendapi_widget"
		data-widget_theme="1"
		data-button_text="'.$sendapi_button_name.'"
		data-widget_title=""
		data-widget_description="false"
		data-buy_in_one_click="true"
		data-buy_in_one_click_title='.$product->name .'
		data-buy_in_one_click_city=""
		data-buy_in_one_click_price='.$price .'
		data-buy_in_one_click_images='.$image_url .'
		data-buy_in_one_click_url='.$product_url .'
		data-buy_in_one_click_hidden_mobile='.$sendapi_widget_oneclick_hidden_mobile.'
		data-buy_in_one_click_hidden_desktop='.$sendapi_widget_oneclick_hidden_desktop.'
		>
    </div>
		';
	}
	catch (Exception $e) {
		return '';
	}
}

	public function woo_settings(){
		$sendapi_woo_status = get_option('woo_status');
		$sendapi_widget_id = get_option('widget_id');
		$sendapi_woo_button_position = get_option('woo_button_position');
		if ($sendapi_widget_id == false || $sendapi_woo_status == false){
			
			return 0;
		}
		if ($sendapi_woo_button_position == 'after_atc') {
			add_action('woocommerce_after_add_to_cart_button', [$this,'insert_wa_woobutton']);
		} elseif ($sendapi_woo_button_position == 'before_atc') {
			add_action('woocommerce_before_add_to_cart_button', [$this,'insert_wa_woobutton']);
		}
		
		add_shortcode( 'spi_button', array( $this, 'shortcode_content') );
		
	}

	public function insert_wa_woobutton() {
		global $woocommerce;
		
		$product = new WC_Product(get_the_ID());
		$sendapi_button_name = get_option('button_name');
		$sendapi_widget_oneclick_hidden_desktop = get_option('widget_oneclick_hidden_desktop');
		$sendapi_widget_oneclick_hidden_mobile = get_option('widget_oneclick_hidden_mobile');
		$price = ($product->get_sale_price() ? $product->get_sale_price() : $product->get_price());
		$product_url = get_permalink($product->id);
		$thumb = get_the_post_thumbnail_url($product->id);
		$images = $product->get_gallery_image_ids();
		$first_image_url = '';
		if ( is_array( $images ) && !empty($images) ) {
			$first_image_url = wp_get_attachment_url( $images[0] );
		}
		$image_url = ($thumb ? $thumb : $first_image_url);
		require_once plugin_dir_path( __FILE__ ). 'partials/sendapi-woo-display.php';
		
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in sendapi_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The sendapi_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_script( $this->sendapi, plugin_dir_url( __FILE__ ) . 'js/sendapi-public.js', array( 'jquery' ), $this->version, false );

	}

}
