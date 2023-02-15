<?
function cpm_plugin_scripts()
{
   //Get User ID
    $user_id = get_current_user_id();
    //Get User IP
    $user_ip = cpm_get_client_ip();
    //jQuery
    wp_enqueue_script('jquery');

    /* Enqueuing the css file. */
    wp_enqueue_style('cpm-plugin-style', CPM_PLUGIN_DIR . 'assets/css/reactioncpm.css');

    //Plugin JS
    wp_enqueue_script('cpm-ajax', CPM_PLUGIN_DIR . 'assets/js/ajax.js', 'jQuery');
    wp_enqueue_script('cpm-frontend-ajax', CPM_PLUGIN_DIR . 'assets/js/frontend.js');

    /* Passing the variables to the javascript file. */
    wp_localize_script('cpm-ajax', 'cpm_ajax_url', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'user_id' => '' . $user_id . '',
        'user_ip' => '' . $user_ip . '',
    )
    );
}
add_action('wp_enqueue_scripts', 'cpm_plugin_scripts');