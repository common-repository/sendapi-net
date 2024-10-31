<?php

class sendapi_Admin {

	private $sendapi;
	private $version;

	public function __construct( $sendapi, $version ) {

		$this->sendapi = $sendapi; // plugin name
		$this->version = $version;
		$this->admin_php = "class-sendapi-admin.php";

	}
	
	
	function sendapi_admin_menu() {
		add_menu_page(
			'sendapi.net',
			'sendapi.net',
			'administrator',
			__FILE__,
			array( $this, 'load_admin_page_content' ), // Calls function to require the partial
			plugins_url('sendapi-net/images/sendapi-menu.svg' )
		);	 
	}


	 public function add_action_links($links) {
		$settings_link = array(
			'<a href="' . admin_url( 'admin.php?page=' . $this->sendapi ) . "/admin/".$this->admin_php.'">' . __('Настройки', $this->sendapi) . '</a>',
		);
		return array_merge($settings_link, $links);
	}


	 function register_sendapi_settings() {
		//register our settings
		register_setting( 'sendapi-settings', 'widget_id' );
		register_setting( 'sendapi-settings', 'button_name' );
		register_setting( 'sendapi-settings', 'widget_position' );
		register_setting( 'sendapi-settings', 'widget_hidden_mobile' );
		register_setting( 'sendapi-settings', 'widget_hidden_desktop' );
		register_setting( 'sendapi-settings', 'widget_hidden_call_back' );
		register_setting( 'sendapi-settings', 'widget_oneclick_hidden_desktop' );
		register_setting( 'sendapi-settings', 'widget_oneclick_hidden_mobile' );
		register_setting( 'sendapi-settings', 'woo_button_position' );
		register_setting( 'sendapi-settings', 'woo_status' );
		
	}
	
	public function load_admin_page_content() {
		require_once plugin_dir_path( __FILE__ ). 'partials/sendapi-admin-display.php';
	}

	public function enqueue_styles() {

		wp_enqueue_style( $this->sendapi, plugin_dir_url( __FILE__ ) . 'css/sendapi-admin.css', array(), $this->version, 'all' );
		
	}

	public function enqueue_scripts() {

		// wp_enqueue_script( $this->sendapi, plugin_dir_url( __FILE__ ) . 'js/sendapi-admin.js', array( 'jquery' ), $this->version, false );
		    
	}

}
