<?php
// Validation functions
/**
 * It checks if the user ID is empty or not numeric
 * 
 * @param uid The user ID of the user you want to check.
 */
function cpm_check_user($uid) {

    // scenario 1: empty
    if (empty($uid)) {
        return false;
    }
    // scenario 2: numeric
    if (!is_numeric($uid)) {
        return false;
    }

    return true;
}
/**
 * It checks if the post ID is empty or not numeric
 * 
 * @param pid The post ID of the post you want to check.
 */
function cpm_check_post_id($pid) {

    // scenario 1: empty
    if (empty($pid)) {
        return false;
    }
    // scenario 2: numeric
    if (!is_numeric($pid)) {
        return false;
    }

    return true;
}