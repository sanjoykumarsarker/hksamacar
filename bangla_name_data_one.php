<?php
 
$a=$_POST['reg'];
$b=$_POST['finalname_b'];
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
 
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



  
$sqld = "update reg set finalname_b='".$b."' where reg='".$a."'";
 
 if( $conn->query($sqld)==true)


 {
	 
	 echo " <script>alert('updated'); </script>";
 }
	
	 
  
  
 
 
    
	 	
	
	 

 
 ?>