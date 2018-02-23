<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://oliverbelmont.com
 * @since             1.0.0
 * @package           Acf_widont
 *
 * @wordpress-plugin
 * Plugin Name:       ACF Widont
 * Plugin URI:        https://github.com/obelmont/widont
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Oliver
 * Author URI:        https://oliverbelmont.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       acf_widont
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ACF_WIDONT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-acf_widont-activator.php
 */
function activate_acf_widont() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-acf_widont-activator.php';
	Acf_widont_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-acf_widont-deactivator.php
 */
function deactivate_acf_widont() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-acf_widont-deactivator.php';
	Acf_widont_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_acf_widont' );
register_deactivation_hook( __FILE__, 'deactivate_acf_widont' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-acf_widont.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_acf_widont() {

	$plugin = new Acf_widont();
	$plugin->run();

}
run_acf_widont();
