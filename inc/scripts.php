<?

function cpm_plugin_enqueue_scripts() {
  wp_enqueue_style( 'cpm-plugin-style', CPM_PLUGIN_DIR. 'assets/css/reactioncpm.css');
  wp_enqueue_script( 'cpm-plugin-script', CPM_PLUGIN_DIR. 'assets/js/reactioncpm.js', 'jQuery', '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'cpm_plugin_enqueue_scripts' );



    function cpm_plugin_scripts() {

        //Get User ID
        $user_id = get_current_user_id();
        //Get User IP
        $user_ip = cpm_get_client_ip();
        //jQuery
        wp_enqueue_script( 'jquery');

        //Plugin Frontend CSS
        // wp_enqueue_style('cpm-css', CPM_PLUGIN_DIR. 'assets/css/front-end.css');

            //FontAwesome CSS
            wp_enqueue_style( 'font-awesome', CPM_PLUGIN_DIR. 'assets/font-awesome/css/all.min.css', array(), NULL);
            wp_enqueue_style( 'font-awesome-v4', CPM_PLUGIN_DIR. 'assets/font-awesome/css/v4-shims.min.css', array(), NULL);
      

        //Plugin JS
        wp_enqueue_script('cpm-ajax', CPM_PLUGIN_DIR. 'assets/js/ajax.js', 'jQuery');
        wp_enqueue_script('cpm-frontend-ajax', CPM_PLUGIN_DIR. 'assets/js/frontend.js');

        wp_localize_script( 'cpm-ajax', 'cpm_ajax_url', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'user_id'  => ''.$user_id.'',
            'user_ip'  => ''.$user_ip.'',
        ));
    }
    add_action('wp_enqueue_scripts', 'cpm_plugin_scripts');

    function cpm_plugin_admin_scripts(){

        //Plugin Back-end CSS
        // wp_enqueue_style('cpm-css', CPM_PLUGIN_DIR. 'assets/css/main.css');
        //Plugin Back-end JS
        wp_enqueue_script('cpm-js', CPM_PLUGIN_DIR. 'assets/js/main.js', 'jQuery', '1.0.0', true );

    }
    add_action( 'admin_enqueue_scripts', 'cpm_plugin_admin_scripts' );
