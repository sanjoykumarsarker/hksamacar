<!DOCTYPE html>
<html lang="en">
<head>
  <title>Temple Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
<body>

<?php
$q =  $_GET['q'];
  
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$connd = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connd->connect_error) {
     die("Connection failed: " . $connd->connect_error);
}
 
$sqld = "SELECT 
tname ,tregid, t_dist   FROM tmpl WHERE t_div='$q' ";
   
$resultd = $connd->query($sqld);
	
    echo "<select  class='form-control'   name='strg'  onchange='edit(this.value)'>";
		echo "<option >Select Any</option>";
	while($row = $resultd->fetch_assoc()) {
       	echo "<option value=".$row["tregid"]." >".$row["tname"].", ".$row["t_dist"]."</option>";
    }
    echo "</select>";
$connd->close();
?>















</body>
</html>