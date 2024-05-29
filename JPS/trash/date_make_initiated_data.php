<?php

  
 
   
    $q  = json_decode($_POST['myData'],true);
 
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


  
$sqld = "update reg set isinitiated='Initiated' where idate='$q' ";

$resultd = $conn->query($sqld);
 
 
	
	

  

  

 

 	
$conn->close();
?> 	

 