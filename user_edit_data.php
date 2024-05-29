<?php

 
$a=$_POST['u_id'];
$b=$_POST['username'];
$c=$_POST['password'];
$d=$_POST['permission'];
$e=$_POST['u_name'];
$f=$_POST['u_address'];
$g=$_POST['u_email'];
$h=$_POST['u_mobile'];



$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";


	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

  
$sqld = "update users set
user_name='".$b."', password='".$c."',permission='".$d."', u_name='".$e."', 
u_address='".$f."', u_email='".$g."', u_mobile='".$h."' where id='".$a."'";
 
 if( $conn->query($sqld)==true)

 {
	echo " <script>alert('Edited'); </script>";
 }
	


?>