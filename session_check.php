<?php
if (!isset($_SESSION)) session_start();
if (!defined('SUPER_ACCESS')) {define('SUPER_ACCESS', true);}
include_once 'function.php';

$session_user_key = $_SESSION["user_key"];
$user_key = get_user_key($_SESSION["id"]);

// Redirect to Under Construction
if (false) {
  echo "<script>window.top.location.href = '//www.harekrishnasamacar.com/under_construction.php';</script>";
  exit();
}


if ($session_user_key != $user_key) {
  echo "<script>window.top.location.href = '/hks_admin_login.php';</script>";
  // header("Location: hks_admin_login.php"); /* Redirect browser */
  exit();
}
