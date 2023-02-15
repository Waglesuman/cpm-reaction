<?php
/**
 * If the client is behind a proxy, the proxy's IP address is returned, otherwise the client's IP
 * address is returned.
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
