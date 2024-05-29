<?php

  
 
   
    $q  = json_decode($_POST['myData7'],true);
 
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";



 
// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


  
$sqld = "update reg set isinitiated='Initiated' where idate='$q' ";

 if( $conn->query($sqld)===true)
 {
	 
	 echo " Devotees of Date ".$q." has been Initiated";
 }	 
 
 
$conn->close();
echo " No update";

?> 	

 