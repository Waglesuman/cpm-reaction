<?
/*
 * Plugin Name:       CPM Reaction Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       This plugin will add like feature to post/page
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Suman Wagle
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       cpmreaction
 * Domain Path:       /languages
 */

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'cpmreaction', '1.0.0' );

//Define Constants
if ( !defined('CPM_PLUGIN_DIR')) {
  define('CPM_PLUGIN_DIR', plugin_dir_url( __FILE__ ));
}
if ( !defined('CPM_PLUGIN_DIR_PATH')) {
  define('CPM_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ));
}

require CPM_PLUGIN_DIR_PATH. 'inc/database.php';
function my_custom_plugin_activation() {
  create_db_tables();
}
register_activation_hook( __FILE__, 'my_custom_plugin_activation' );

// Functions to performa database related quries.
require CPM_PLUGIN_DIR_PATH. 'inc/db-class.php';

//Include Scripts & Styles
require CPM_PLUGIN_DIR_PATH. 'inc/scripts.php';

// // CPM Static Functions.
require CPM_PLUGIN_DIR_PATH. 'inc/validate.php';
require CPM_PLUGIN_DIR_PATH. 'inc/get-client-ip.php';

/* Including the file reaction.php in the plugin. */
require CPM_PLUGIN_DIR_PATH. 'inc/reaction.php';

//cpm Plugin Ajax Function for Saving Reaction
require CPM_PLUGIN_DIR_PATH. 'inc/ajax/save-reaction.php';
add_action('wp_ajax_cpm_save_reaction_ajax_action', 'cpm_save_reaction_ajax_action');
add_action('wp_ajax_nopriv_cpm_save_reaction_ajax_action', 'cpm_save_reaction_ajax_action');

require CPM_PLUGIN_DIR_PATH. 'inc/ajax/reaction-count.php';
add_action('wp_ajax_cpm_reaction_count_update', 'cpm_reaction_count_update');
add_action('wp_ajax_nopriv_cpm_reaction_count_update', 'cpm_reaction_count_update');