<?php
include_once './Request.php';
include_once './Net/SSH2.php';
Request::header();


$res = [];

/**
 * @param server_ip, pd, name, cmd
 * @return String
 *
 */

if (Request::method('POST')) {
    if (Request::get('server_ip') && Request::get('pd')) {
        $ssh = new Net_SSH2(Request::get('server_ip'));
        $time_start = microtime(true);
        if (!$ssh->login(Request::get('name'), Request::get('pd'))) {
            // exit('Login Failed');
            $res = ["message" => "Login Failed", "status" => false];
        }
        $str = $ssh->exec(Request::get('cmd'));
        $time_end = microtime(true);
        $res = ["message" => $str, "status" => true, 'time' => intval($time_end - $time_start) . 'sec'];
    } else {
        $res = ["message" => "Credentials NOT found", "status" => false];
    }
} else {
    $res = ["message" => "Method not supported", "status" => false];
}

echo json_encode($res);

// https://eibuilder.com/terminal/
