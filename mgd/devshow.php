<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit devotee record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td {
    border: 1px solid #dddddd;
    padding: 8px;
}

th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
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

tr:nth-child(even) {
    background-color: #dddddd;
}
	</style>
	</head>
<body>

<?php
  $d =  $_GET['g'];
  
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
   $sqlr = "SELECT
   reg,
   bname,
   ename,
   age,
   address,
   phone,
   service,
   gender,
   education,
   mstatus,
   nprefer,
  isinitiated
   FROM reg WHERE templereg=$d and isinitiated!='Initiated' and isinitiated!='Absent' ";
   
$resultr = $connr->query($sqlr);


if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>Reg</th>	<th> নাম</th>		<th>Name</th>	<th>Age</th>	<th>Address</th>
	<th>Phone</th>	<th>Service</th>	<th>Gender</th>		<th>Education</th>
	<th>Status</th>	<th>Lila</th>	
	</tr>";
	
    // output data of each row
    while($row = $resultr->fetch_assoc())
	
	{
       	echo "<tr>
		<td>
		<form target='_blank' action='devedit.php' method='POST'>
		<button name='edit' class= 'tbutton' type='submit' value=".$row["reg"]." > ".$row["reg"]."</button>
		</form></td>
		<td>".$row["bname"]."</td>		<td>".$row["ename"]."</td>
		<td style='text-align:center' >".$row["age"]."</td> 	<td>".$row["address"]."</td> 	<td style='text-align:center' > ".$row["phone"]."</td> 
		<td style='text-align:center' >".$row["service"]."</td> <td style='text-align:center' >".$row["gender"]."</td>		<td style='text-align:center' >".$row["education"]."</td>
		<td style='text-align:center' >".$row["mstatus"]."</td><td style='text-align:center' >".$row["nprefer"]."</td>
		</tr>";
    }
    echo "</table>";
}   else {
}
$connr->close();
 

?>


</body>
</html>