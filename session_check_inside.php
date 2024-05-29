<?php
session_start();
include_once "function.php";
 

  $session_user_key=$_SESSION["user_key"];
 
  $user_key=get_user_key($_SESSION["id"]);
  if($session_user_key!=$user_key){


    
    header("Location: hks_admin_login.php"); /* Redirect browser */
    exit();
  }

?>