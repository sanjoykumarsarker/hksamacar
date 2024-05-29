<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title> Edit Temple </title>
<style>
.input-group-addon {	
	min-width:120px;
	background-color: whitesmoke;
    text-align:left;
}

</style>
</head>
<body>
  <br><br> 
<div style= "text-align:center" > 
<?php
 
$servername = "103.41.212.202";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$conne = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conne->connect_error) {
     die("Connection failed: " . $connr->connect_error);
}

 
$sqle = "SELECT reg,ename from reg ";
    
$resulte = $conne->query($sqle);


if ($resulte->num_rows > 0) {
    
    // output data of each row
    while($row = $resulte->fetch_assoc()) {
		
	echo $row["ename"];
		 
    }
     
}  
 
$conne->close();
 
   ?>
   </body>
   
   </html>