<?php
/**
 * linkbird Content Marketing :: Main file
 *
 * @link http://www.linkbird.com
 * @package linkbird-content-marketing
 *
 * @wordpress-plugin
 * Plugin Name: linkbird Content Marketing
 * Plugin URI:  http://www.linkbird.com/
 * Description: Create drafts and publish posts out of linkbird. On publishing the plugin will automatically update the content status in the linkbird tool.
 * Version:     1.0.1
 * Author:      linkbird GmbH
 * Author URI:  https://www.linkbird.com/
 * Text Domain: linkbird-content-marketing
 * Domain Path: languages
 */

// Abort, if this file is called directly
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Plugin Activation
 * This action is documented in includes/class-linkbird-content-marketing-activator.php
 */
function lbcm_activate_plugin() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-linkbird-content-marketing-activator.php';
    Linkbird_Content_Marketing_Activator::activate();
}

register_activation_hook( __FILE__, 'lbcm_activate_plugin' );

/**
 * Plugin Deactivation
 * This action is documented in includes/class-linkbird-content-marketing-deactivator.php
 */
function lbcm_deactivate_plugin() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-linkbird-stork-api.php';
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-linkbird-content-marketing-deactivator.php';
    Linkbird_Content_Marketing_Deactivator::deactivate();
}

register_deactivation_hook( __FILE__, 'lbcm_deactivate_plugin' );

/**
 * Plugin Uninstallation
 * This action is documented in includes/class-linkbird-content-marketing-uninstaller.php
 */
function lbcm_uninstall_plugin() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-linkbird-content-marketing-uninstaller.php';
    Linkbird_Content_Marketing_Uninstaller::uninstall();
}

register_uninstall_hook( __FILE__, 'lbcm_uninstall_plugin' );

/**
 * Load core plugin class for internationalization, hooks, etc.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-linkbird-content-marketing.php';

/**
 * Initialize the plugin
 */
function run_linkbird_content_marketing() {
    $plugin = new Linkbird_Content_Marketing();
    $plugin->run();
}

run_linkbird_content_marketing();
