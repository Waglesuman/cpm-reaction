<?php

class CPM_DB {

    private $wpdb;
    // public $likes_table;
    public $reactions_table;
    public $post_id;
    public $user_id;
    public $user_ip;
    public $reaction_id;
    public $status; 
    public $post_reaction_count;
    public $post_reaction_count_key;
   /**
    * It creates a new table in the database called "sumanwagle" and adds a column called
    * "post_reactions" to it.
    */
    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->reactions_table = $this->wpdb->prefix . "sumanwagle";
        $this->post_reaction_count_key = "_cpm_post_reactions";
    }

    // Count number of all reactions
    public function cpm_reactions_count($pid,$rid) {
        $this->post_id = $pid;
        $this->reaction_id = $rid;
        $this->wpdb->hide_errors(); 
        $reaction_count = $this->wpdb->get_var( $this->wpdb->prepare(
            "SELECT COUNT(*) FROM `$this->reactions_table` WHERE post_id = %d",
            $this->post_id,
            $this->reaction_id
        ) );

        return $reaction_count;
    }
    // Count number of individual reactions
    public function cpm_reaction_count($pid,$rid) {

        $this->post_id = $pid;
        $this->reaction_id = $rid;
        $this->wpdb->hide_errors(); 
        $reaction_count = $this->wpdb->get_var( $this->wpdb->prepare(
            "SELECT COUNT(*) FROM `$this->reactions_table` WHERE post_id = %d AND reaction_id = %d",
            $this->post_id,
            $this->reaction_id
        ) );

        return $reaction_count;
    }
 
    // Check if a user has already reacted to the post
    public function cpm_check_reaction($pid, $uid) {
        $this->post_id = $pid;
        $this->user_id = $uid;
        $check_reaction = $this->wpdb->get_var( $this->wpdb->prepare(
            "SELECT COUNT(*) FROM `$this->reactions_table` WHERE user_id = %d AND post_id = %d",
            $this->user_id,
            $this->post_id
        ) );
        return $check_reaction;
    }
    
    //Check Reacction Status by IP
 /**
  * It checks if the user has already reacted to the post
  * 
  * @param pid The post ID
  * @param uip user ip
  * 
  * @return The number of rows that match the query.
  */
    public function cpm_check_reaction_ip($pid, $uip) {

        $this->post_id = $pid;
        $this->user_ip = $uip;
        $check_reaction = $this->wpdb->get_var( $this->wpdb->prepare(
            "SELECT COUNT(*) FROM `$this->reactions_table` WHERE user_ip = %s AND post_id = %d",
            $this->user_ip,
            $this->post_id
        ) );
        return $check_reaction;
    }
   
    // Add new reaction to database
    public function cpm_insert_new_reaction($uid, $uip, $pid, $rid) {

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        // $this->wpdb->hide_errors(); 
        $this->user_id = intval($uid);
        $this->user_ip = $uip;
        $this->post_id = intval($pid);
        $this->reaction_id = intval($rid);

        $this->status = 0;
        if($this->post_id > 0 && $this->post_id != "" && $this->reaction_id > 0 && $this->reaction_id !=""){
                 
            $this->wpdb->insert( 
                ''.$this->reactions_table.'', 
                   [ 
                    'post_id' => $this->post_id,
                    'user_id' => $this->user_id,
                    'user_ip' => $this->user_ip,
                    'reaction_id' => $this->reaction_id
                    ]
                , 
                [
                    '%d', 
                    '%d',
                    '%s',
                    '%d'
                ]
            );
            if($this->wpdb->insert_id) {
                $this->status = 1;
                $this->post_reaction_count = get_post_meta($this->post_id, $this->post_reaction_count_key, true);
                if($this->post_reaction_count==''){
                    $this->post_reaction_count = 0;
                    delete_post_meta($this->post_id, $this->post_reaction_count_key);
                    add_post_meta($this->post_id, $this->post_reaction_count_key, '1');
                } else{
                    $this->post_reaction_count = $this->cpm_count_likes($this->post_id);
                    update_post_meta($this->post_id, $this->post_reaction_count_key, $this->post_reaction_count);
                }
            } else {
                $this->status = 0;
            }
        } else {
            $this->status = 0;
        }
        return $this->status;
    }
}