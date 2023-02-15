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
register_activation_hook( __FILE__, 'create_db_tables' );


// Functions to performa database related quries.
require CPM_PLUGIN_DIR_PATH. 'inc/db-class.php';

//Include Scripts & Styles
require CPM_PLUGIN_DIR_PATH. 'inc/scripts.php';

// // CPM Static Functions.
require CPM_PLUGIN_DIR_PATH. 'inc/validate.php';
require CPM_PLUGIN_DIR_PATH. 'inc/static-functions.php';

/* Including the file reaction.php in the plugin. */
require CPM_PLUGIN_DIR_PATH. 'inc/reaction.php';



?>
<script type="text/javascript">
    var clicks = 0;

function onClick() {
  clicks += 1;
  // clicks = 1;

  document.getElementById("clicks").innerHTML = clicks;
};
    </script>
<?



function display_content_after_post( $content ) {
  $content .= '<div class="after-post-content">';
  $content .= '<span title="like" class="CPM-reaction-icon"><img onClick="onClick()" src="'.CPM_PLUGIN_DIR.'assets/img/emoji_like_1.png" alt="Like Reaction"></span>';
  $content .= '<span title="love" class="CPM-reaction-icon"><img onClick="onClick()" src="'.CPM_PLUGIN_DIR.'assets/img/emoji_love_1.png" alt="Like Reaction" onClick="onClick()" ></span>';
  $content .= '<span title="laugh" class="CPM-reaction-icon"><img onClick="onClick()" src="'.CPM_PLUGIN_DIR.'assets/img/emoji_laugh_1.png" alt="Like Reaction"></span>';
  $content .= '<span title="sad" class="CPM-reaction-icon" ><img onClick="onClick()" src="'.CPM_PLUGIN_DIR.'assets/img/emoji_sad_1.png" alt="Like Reaction"></span>';
  $content .= '</div>';
  $content .= '<p>Clicks: <a id="clicks">0</a></p>';

  return $content;
}
add_filter( 'the_content', 'display_content_after_post' );

function reactionplugin(){
  echo'hello there ';
}
add_action( "wp_footer", "reactionplugin" );



//cpm Plugin Ajax Function for Saving Reaction
require CPM_PLUGIN_DIR_PATH. 'inc/ajax/save-reaction.php';
add_action('wp_ajax_cpm_save_reaction_ajax_action', 'cpm_save_reaction_ajax_action');
add_action('wp_ajax_nopriv_cpm_save_reaction_ajax_action', 'cpm_save_reaction_ajax_action');

require CPM_PLUGIN_DIR_PATH. 'inc/ajax/reaction-count.php';
add_action('wp_ajax_cpm_reaction_count_update', 'cpm_reaction_count_update');
add_action('wp_ajax_nopriv_cpm_reaction_count_update', 'cpm_reaction_count_update');