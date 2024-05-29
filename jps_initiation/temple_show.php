<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Temple Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
  
 <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

.tbutton {
	background-color: Transparent;
	border: none;
    background-repeat:no-repeat;
    cursor:pointer;
    overflow: hidden;
	text-align: left;
    outline:none;
	color:blue;
}
</style>
</head>


<body>

<?php
 
$q =  $_GET['q'];
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$connr = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connr->connect_error) {
     die("Connection failed: " . $connr->connect_error);
}
 
$sqlr = "select temple_en_name,temple_bn_name,temple_recommendator,temple_phone,
temple_email,temple_id,temple_website,temple_province,temple_address,
temple_country_name,temple_postcode ,temple_city FROM temple WHERE temple_country_name='$q' ";
  
  if ($q== "country_all"){
	  
	  $sqlr = "select temple_en_name,temple_bn_name,temple_recommendator,temple_phone,
temple_email,temple_id,temple_website,temple_province,temple_address,
temple_country_name,temple_postcode ,temple_city FROM temple ";
  }
  
  
   	$resultr = $connr->query($sqlr);
	
if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>ID</th>	<th>মন্দিরের নাম</th>	<th>Temple Name</th>	<th>Recommender</th>
	<th>Mobile</th>	<th>Address</th>	<th>Country</th>	<th>Email/Website</th>
		</tr>";
    // output data of each row
    while($row = $resultr->fetch_assoc()) {
       	echo "<tr>
		<td><form target='_blank' action='temple_edit.php' method='POST'>
		<button name='edit' target='_blank' class='tbutton' type='submit' value=".$row["temple_id"]."
		>".$row["temple_id"]."</button> </form></td>
		<td>".$row["temple_bn_name"]."</td>
		<td>".$row["temple_en_name"]."</td>
		<td>".$row["temple_recommendator"]."</td>
		<td>".$row["temple_phone"]."</td>
		<td>".$row["temple_address"].",&nbsp" .$row["temple_city"].",&nbsp ".$row["temple_postcode"].",&nbsp ".$row["temple_province"]."</td>
		<td>".$row["temple_country_name"]."</td>
		<td>".$row["temple_email"].",&nbsp ".$row["temple_website"]."</td></tr>";
    }
    echo "</table>";
} else {
     
}



$connr->close();
?>

</body>
</html>