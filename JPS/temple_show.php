<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Temple Registration</title>
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
 
$sqlr = "SELECT 
	autoid,
	tregid,
	t_div  ,
	t_dist , 
	t_ps  ,
	t_addr  ,
	tname_b ,
	trecom_b , 
	tname ,
	trecom , 
	t_ph FROM tmpl WHERE t_div='$q' ";
   
$sqlra = "SELECT 
	autoid,
	tregid,
	t_div  ,
	t_dist , 
	t_ps  ,
	t_addr  ,
	tname_b ,
	trecom_b , 
	tname ,
	trecom , 
	t_ph   FROM tmpl WHERE t_div=$q ";

	$resultr = $connr->query($sqlr);
	$resultra = $connr->query($sqlra);

if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>ID</th>	<th>মন্দিরের নাম</th>	<th>অনুমোদন</th>	<th>Temple Name</th>
	<th>Recommendation</th>	<th>Phone</th>	<th>Address</th>	<th>Password</th>
	
	</tr>";
    // output data of each row
    while($row = $resultr->fetch_assoc()) {
       	echo "<tr>
		<td><form target='_blank' action='temple_edit.php' method='POST'><button name='edit' target='_blank' class='tbutton' type='submit' value=".$row["tregid"]." >".$row["tregid"]."</button> </form></td> <td>".$row["tname_b"]."</td><td>".$row["trecom_b"]."</td>
		<td>".$row["tname"]."</td><td>".$row["trecom"]."</td><td  contenteditable='true'>".$row["t_ph"]."</td>
		<td>".$row["t_addr"].",&nbsp" .$row["t_ps"].",&nbsp ".$row["t_dist"]."</td><td>".$row["autoid"]."</td></tr>";
    }
    echo "</table>";
} else {
     
}

if ($resultra->num_rows > 0) {
    echo "<table>
	<tr>	
	<th>ID</th>		<th>মন্দিরের নাম</th>		<th>অনুমোদন</th>		<th>Temple Name</th>	<th>Recommendation</th>
	<th>Phone</th>	<th>Address</th>	<th>Password</th>
	</tr>";
    // output data of each row
	
    while($row = $resultra->fetch_assoc()) {
		
		echo "<tr>
		<td><form target='_blank' action='temple_edit.php' method='POST'><button name='edit' class='tbutton' type='submit' value=".$row["tregid"]." >".$row["tregid"]."</button> </form></td><td>".$row["tname_b"]."</td> <td>".$row["trecom_b"]."</td>
		<td>".$row["tname"]."</td><td>".$row["trecom"]."</td><td  contenteditable='true'>".$row["t_ph"]."</td>
		<td>".$row["t_addr"].",&nbsp" .$row["t_ps"].",&nbsp ".$row["t_dist"].",&nbsp ".$row["t_div"].  "</td><td>".$row["autoid"]."</td></tr>";
		 
    }
    echo "</table>";
} else{   
}
		$connr->close();
?>

</body>
</html>