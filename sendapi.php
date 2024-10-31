<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://sendapi.net
 * @since             1.0.0
 * @package           sendapi
 *
 * @wordpress-plugin
 * Plugin Name:       sendapi.net
 * Plugin URI:        http://wpt.auno.kz/
 * Description:       Поддерживайте постоянную связь с Вашими клиентами через любой удобный клиенту мессенджер. Будьте всегда на связи, обслуживайте своих клиентов удобным для клиента способом. Увеличивайте продажи c помощью функции «Покупка через WhatsApp» и WhatsApp-рассылки, используйте WhatsApp API в Ваши проекты и для итеграции в CRM-системы. Будьте осведомлены о работе Ваших специалистов - пользуйтесь статистикой.
 * Version:           1.0.1
 * Author:            sendapi.net
 * Author URI:        https://sendapi.net/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sendapi
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.1
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SENDAPI_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sendapi-activator.php
 */
function activate_sendapi() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sendapi-activator.php';
	sendapi_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sendapi-deactivator.php
 */
function deactivate_sendapi() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sendapi-deactivator.php';
	sendapi_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sendapi' );
register_deactivation_hook( __FILE__, 'deactivate_sendapi' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sendapi.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sendapi() {

	$plugin = new sendapi();
	$plugin->run();

}
run_sendapi();
