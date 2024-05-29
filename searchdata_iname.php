<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
	<style>

	body {
        background: #555 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAB9JREFUeNpi/P//PwM6YGLAAuCCmpqacC2MRGsHCDAA+fIHfeQbO8kAAAAASUVORK5CYII=);
        font: 13px 'Lucida sans', Arial, Helvetica;
        color: #eee;
    }
	
	a {
        color: #ccc;
    }
	
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


tr:nth-child(even) {
    background-color: ;
}
	</style>
	</head>
<body>

<?php

include 'function.php';

  $search =  $_GET['qn'];
  $usearch =  strtoupper($search);
  
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
   finalname,
   finalname_b
   
   FROM reg  WHERE
   isinitiated='Initiated' and
   
  reg LIKE '%$search%'         OR
   bname LIKE '%$search%'         OR
   ename LIKE '%$search%'         OR
   age LIKE '%$search%'	    	OR
   address LIKE '%$search%'       OR
   phone LIKE '%$search%'         OR
   finalname LIKE '%$search%'         OR
   service  LIKE '%$search%' ";
   
	  
$resultr = $connr->query($sqlr);


if ($resultr->num_rows > 0) {
	
    echo "
	<span style='color:yellow; text-align: left; font-size:20px;'> From Initiation Table</span>
	<table>
	<tr>
	<th>Reg</th>	<th> নাম</th>		<th>Name</th>	<th>Age</th>	<th>Address</th>
	<th>Service</th>	<th>Spiritual Name</th>		<th>দীক্ষা নাম</th>
	<th>মন্দির</th>	
	</tr>";

    while($row = $resultr->fetch_assoc())
	
{	$reg=strtoupper($row["reg"]);
	$bname= strtoupper($row["bname"]);
	$ename= strtoupper($row["ename"]);
	$age= strtoupper($row["age"]);
	$address= strtoupper($row["address"]);
	$phone= strtoupper($row["phone"]);
	$finalname= strtoupper($row["finalname"]);

$rt=substr($reg, 0, 6);

       	echo "<tr>	<td> " ;
		  if (strpos($reg, $usearch) !== false) {
			echo "<span style='background-color:red;color:white'>".$row["reg"]."</span>";
}
		else{ echo"<p>".$row["reg"]."</p>";} 			
		
		echo "</td> <td>";
		  if (strpos($bname, $usearch) !== false) {
			echo "<span style='background-color:red;color:white'>".$row["bname"]."</span>";
}
		else{ echo"<p  >".$row["bname"]."</p>";} 		
		
		echo "</td> <td>";
		  if (strpos($ename, $usearch) !== false) {
			echo"<span style='background-color:red;color:white'>".$row["ename"]."</span>";
}
		else{ echo"<p  >".$row["ename"]."</p>";} 		
		
		echo"</td>	<td style='text-align:center' >";
		  
		  if (strpos($age, $usearch) !== false) {
			echo"<span style='background-color:red;color:white'>".$row["age"]."</span>";
}
		else{ echo"<p  >".$row["age"]."</p>";}

		echo "</td> <td>";
		  
		  if (strpos($address, $usearch) !== false) {
			echo"<span style='background-color:red;color:white'>".$row["address"]."</span>";
}
		else{ echo"<p  >".$row["address"]."</p>";}	
		  
		echo  "</td> 
		<td style='text-align:center' >".$row["service"]."</td>";
		
		echo "<td>";
		if (strpos($finalname, $usearch) !== false) {
			echo"<span style='background-color:red;color:white'>".$row["finalname"]."</span>";
}
		else{ echo"<p>".$row["finalname"]."</p>";}	
		  
		echo  "</td>
		
		<td style='text-align:center' >".$row["finalname_b"]."</td>
		<td style='text-align:center' >".tbname($rt)."</td>
		</tr>";
    }
    echo "</table>";
}   else {
}
	
$connr->close();
?>

</body>
</html>