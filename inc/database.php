<?
function create_db_tables(){
global $wpdb;
$cpm_db_version = cpmreaction;
// $wpac_installed_db_version = get_option( 'wpac_db_version' );
$table_name = $wpdb->prefix . 'sumanwagle';
$charset_collate = $wpdb->get_charset_collate();

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  user_id mediumint(9) NOT NULL,
  post_id mediumint(9) NOT NULL,
  reaction_id mediumint(9) NOT NULL,
  cookie_id mediumint(10),
  user_ip varchar(50),
  time timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY  (id)
) $charset_collate;";

dbDelta( $sql );
// add_option( 'wpac_db_version', $wpac_db_version );



}