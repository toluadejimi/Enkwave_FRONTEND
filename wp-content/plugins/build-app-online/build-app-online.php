<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://buildapp.online
 * @since             1.0.0
 * @package           Build_App_Online
 *
 * @wordpress-plugin
 * Plugin Name:       Build App Online
 * Plugin URI:        https://wordpress.org/plugins/build-app-online
 * Description:       Help you to build and run mobile app.
 * Version:           10.0.2
 * Author:            Abdul Hakeem
 * Author URI:        https://buildapp.online
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       build-app-online
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if (!class_exists('ReduxFramework') && file_exists(plugin_dir_path(__FILE__) . '/admin/optionspanel/framework.php')) {
    require_once ('admin/optionspanel/framework.php');
}

if (!isset($redux_demo) && file_exists(plugin_dir_path(__FILE__) . '/admin/optionspanel/config.php')) {
    require_once ('admin/optionspanel/config.php');
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BUILD_APP_ONLINE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-build-app-online-activator.php
 */
function activate_build_app_online() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-build-app-online-activator.php';
	Build_App_Online_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-build-app-online-deactivator.php
 */
function deactivate_build_app_online() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-build-app-online-deactivator.php';
	Build_App_Online_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_build_app_online' );
register_deactivation_hook( __FILE__, 'deactivate_build_app_online' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-build-app-online.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_build_app_online() {

	$plugin = new Build_App_Online();
	$plugin->run();

}
run_build_app_online();
