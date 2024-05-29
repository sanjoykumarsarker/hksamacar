<?php

 include 'function.php';
 
 
   
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


  
$sqld = "SELECT  reg, place, tithi, igroup, idate FROM date_set where idate='$q'";

$resultd = $conn->query($sqld);
 
  
if ($resultd->num_rows > 0) {
 
    // output data of each row
    while($row = $resultd->fetch_assoc()) {
	 
	 $qq=substr($row["reg"], 0, 6);
	
	 
	 if(empty($st)){
		 
		$st=1; 
		 
	 } 
	 
	  $ss=substr($row["reg"], 0, 6);
 
  if($st!=$ss)
	 { 
 
	echo" <div style='background-color:green; color:white;'>$ss</div>";
	 
	$st=substr($row["reg"], 0, 6);
	
	
	 }
	
	

echo "<div class='container sss'> <li id='".$row["reg"]."'>  <div class='col-sm-1'>  ".$row["reg"]." </div>  <div class='col-sm-3'> ".ename($row["reg"])."</div> <div class='col-sm-4'>".bname($row["reg"])."</div><div class='col-sm-4'>".tbname($qq)."</div></li></div> ";
	  
	
		}  

  

}

 	
$conn->close();
?> 	

 