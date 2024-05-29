
 
 

 <?php
session_start();
session_unset();
session_destroy();
 
 
 
 echo $_POST['logout'];
 if($_POST['logout']=="namakarana_login.php"){
 
header('Location:namakarana_login.php'); 
 
 }
 if($_POST['logout']=="namanirnaya_login.php"){
 
header('Location:namanirnaya_login.php');
 
 }

 if($_POST['logout']=="regsignup.php"){
 
header('Location:regsignup.php');
 
 }


?>
 