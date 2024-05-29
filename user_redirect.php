<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
//$_SESSION = array();
session_unset();

//session_destroy();
include "function.php";

$username = $_POST["username"];
$password = $_POST["password"];
$role = strval($_POST["role"]);
$uid = user_np_id($username, $password);



function generateRandomString($length = 50)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


if ($uid == "FALSE") {
    header("Location: hks_admin_login.php"); /* Redirect browser */
    exit();
}

if (intval($uid) > 1000 && $role == "hksamacar") {

    $_SESSION['id'] =  $uid;
    $user_key = generateRandomString();
    $_SESSION['user_key'] = $user_key;
    $_SESSION['counter'] = 1;

    set_user_key($uid, $user_key);
    header("Location: hks_dashboard.php"); /* Redirect browser */
}
