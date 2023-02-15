<?php
/*
* Static Functions for cpm Reaction System
*/
/**
 * If the number is greater than 1000, then format it to be displayed as a number with a letter after
 * it (e.g. 1.2k, 1.3m, etc.). If the number is less than 1000, then display it as a number with a
 * decimal point (e.g. 0.9k, 0.8k, etc.).
 * 
 * @param num The number to format
 * 
 * @return the number of reactions.
 */
// function cpm_format_reaction_numbers($num) {

//     if($num>1000) {
//             $x = round($num);
//             $x_number_format = number_format($x);
//             $x_array = explode(',', $x_number_format);
//             $x_parts = array('k', 'm', 'b', 't');
//             $x_count_parts = count($x_array) - 1;
//             $x_display = $x;
//             $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
//             $x_display .= $x_parts[$x_count_parts - 1];

//             return $x_display;
//     } else {
//         $under_1k = "";
//         if($num == 1000) {
//             $under_1k = "1k+";
//         } elseif($num > 900) {
//             $under_1k = "0.9k";
//         } elseif($num > 800) {
//             $under_1k = "0.8k";
//         } elseif($num > 700) {
//             $under_1k = "0.7k";
//         } elseif($num > 600) {
//             $under_1k = "0.6k";
//         } elseif($num > 500) {
//             $under_1k = "0.5k";
//         } else {
//             $under_1k = $num;
//         }
//         return $under_1k;
//     }
//     return $num;

// }
// Function to get the client ip address
/**
 * If the user is behind a proxy, the proxy's IP address will be returned, otherwise the user's IP
 * address will be returned.
 * 
 * @return The IP address of the user.
 */
function cpm_get_client_ip() {
    $ip_address = '';
    //whether ip is from share internet
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from remote address
    else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }
 
    return $ip_address;
}
