<!DOCTYPE html>
<html>
  
<title>Namakarana Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="refresh" content="30">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<body>
<a href="tel:12345678900"><img src="http://yourownhostedsite.com/transparent.png"></a>



<?php
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
 
// Create connection
$connr = new mysqli($servername, $username, $password, $dbname);
 $sqlr="select reg,phone,ename from reg";
	$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {
    
	// output data of each row
    while($row = $resultr->fetch_assoc()) {
		
		echo " <a href='sms:".$row["phone"]."?body=hare krishna,".$row["ename"]." Your ID:".$row["reg"]."'>SEND TO:".$row["ename"].$row["reg"]." </a><br><br>";
	 
	}
}
		
?>		
 
  



</body>


</html>