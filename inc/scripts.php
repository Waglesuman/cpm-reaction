<?

function cpm_plugin_enqueue_scripts() {
  wp_enqueue_style( 'cpm-plugin-style', CPM_PLUGIN_DIR. 'assets/css/reactioncpm.css');
  wp_enqueue_script( 'cpm-plugin-script', CPM_PLUGIN_DIR. 'assets/js/reactioncpm.js', 'jQuery', '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'cpm_plugin_enqueue_scripts' );

