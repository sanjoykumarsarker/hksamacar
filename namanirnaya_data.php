<?php

session_start();
 
// $_SESSION['cd']

 
//$namanirnaya_user=$_SESSION['idnn'];
$namanirnaya_id=$_SESSION['namanirnaya_id'];;
 
 
?>




<!DOCTYPE html>

<html>


<head>
  <title>Temple
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
  </head>
 <body style="background-color:yellow;text-transform: uppercase; ">
 
 
 <?php

  $fname= $_POST['rid'];
 
echo " <p style='color:red'> &#9989 $fname</p>";

$reg= $_POST['reg'];
 
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
$sqlu= "UPDATE reg SET  finalname='$fname',namanirnaya_id='$namanirnaya_id',namanirnaya_time=now()  WHERE reg= '$reg'";
 
$resultu = $conn->query($sqlu);
$conn->close();

 
 ?>
 

  
 
  </body>
  </html>