<?php
function cpm_reaction_count_update() {
    $cpm_db = new CPM_DB;
    if(isset($_POST['pid']) && cpm_check_post_id($_POST['pid'])) {

        $post_id = intval($_POST['pid']);
        $reaction_id = intval($_POST['rid']);

        if( !$post_id ) {
            $post_id = '';
        }
        if( !$reaction_id ) {
            $reaction_id = '';
        }
        if ( strlen( $post_id ) > 10 ) {
            $post_id = substr( $post_id, 0, 10 );
        }
        if ( strlen( $reaction_id ) > 10 ) {
            $reaction_id = substr( $reaction_id, 0, 10 );
        }
        if($post_id != "" && $post_id > 0 && $reaction_id !="" && $reaction_id > 0) {
            $like_count = $cpm_db->cpm_reaction_count($post_id, $reaction_id);
            // $like_count = cpm_format_reaction_numbers($like_count);
            echo $like_count;
        } else {
            _e("invalid post id", "cpmlike");
        }
    }
    wp_die();
}