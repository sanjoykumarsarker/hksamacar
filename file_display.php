<?php
 include "file_constants.php";
 // just so we know it is broken
 error_reporting(E_ALL);
 // some basic sanity checks
 if(isset($_GET['id']) && is_numeric($_GET['id'])) {
     //connect to the db
     $link = mysqli_connect("$host", "$user", "$pass")
     or die("Could not connect: " . mysqli_error());

     // select our database
     mysqli_select_db($link,"$db") or die(mysqli_error());

     // get the image from the db
     $sql = "SELECT image FROM test_image WHERE id=" .$_GET['id'] . ";";

     // the result of the query
     $result = mysqli_query($link,"$sql") or die("Invalid query: " . mysqli_error());

     // set the header for the image
     header("Content-type: image/jpeg");
     echo mysql_result($result, 0);

     // close the db link
     mysqli_close($link);
 }
 else {
     echo 'Please use a real id number';
 }
?>