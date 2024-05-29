<?php session_start();?>
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
   nprefer 
   
   FROM reg  WHERE
   reg LIKE '%$search%'         OR
   bname LIKE '%$search%'         OR
   ename LIKE '%$search%'         OR
   age LIKE '%$search%'	    	OR
   address LIKE '%$search%'       OR
   phone LIKE '%$search%'         OR
   service  LIKE '%$search%'	    ";
   
   
$sqlt = "SELECT 
	tregid,
	t_div  ,
	t_dist , 
	t_ps  ,
	t_addr  ,
	tname_b ,
	trecom_b , 
	tname ,
	trecom , 
	t_ph FROM tmpl WHERE  
	
	tregid LIKE '%$search%'         OR
	t_div LIKE '%$search%'         OR
	t_dist LIKE '%$search%'	    	OR
	t_ps LIKE '%$search%'       OR
	t_addr LIKE '%$search%'         OR
	tname LIKE '%$search%'         OR
	trecom LIKE '%$search%'         OR
	t_ph  LIKE '%$search%'	    ";
	
	  
$resultr = $connr->query($sqlr);
$resultt = $connr->query($sqlt);



if ($resultr->num_rows > 0) {
	
    echo "
	<span style='color:yellow; text-align: left; font-size:20px;'> From Devotee Database</span>
	<table>
	<tr>
	<th>Reg</th>	<th> নাম</th>		<th>Name</th>	<th>Age</th>	<th>Address</th>
	<th>Phone</th>	<th>Service</th>	<th>Gender</th>		<th>Education</th>
	<th>Status</th>	<th>Lila</th>		<th>মন্দির</th>	
	</tr>";

    while($row = $resultr->fetch_assoc())
	
{	$reg=strtoupper($row["reg"]);
	$bname= strtoupper($row["bname"]);
	$ename= strtoupper($row["ename"]);
	$age= strtoupper($row["age"]);
	$address= strtoupper($row["address"]);
	$phone= strtoupper($row["phone"]);

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
		else{ echo"<p  >".$row["age"]."</p>";}			echo "</td> <td>";
		  
		  if (strpos($address, $usearch) !== false) {
			echo"<span style='background-color:red;color:white'>".$row["address"]."</span>";
}
		else{ echo"<p  >".$row["address"]."</p>";}	
		  
		echo  "</td> <td> Can't Show </td> 
		<td style='text-align:center' >".$row["service"]."</td>
		<td style='text-align:center' >".$row["gender"]."</td>		
		<td style='text-align:center' >".$row["education"]."</td>
		<td style='text-align:center' >".$row["mstatus"]."</td>
		<td style='text-align:center' >".$row["nprefer"]."</td>
		<td style='text-align:center' >".tbname($rt)."</td>
		</tr>";
    }
    echo "</table>";
}   else {
}

   
if ($resultt->num_rows > 0) {
	
	echo " <br><br><br>
	<span style='color:yellow; text-align: left; font-size:20px;'> From Temple Database</span>	
	<table>
	<tr>
	<th>ID</th>	<th>মন্দিরের নাম</th>	<th>অনুমোদন</th>	<th>Temple Name</th>
	<th>Recommendation</th>	<th>Phone</th>	<th>Address</th>	</tr>";
    // output data of each row
    
	while($row = $resultt->fetch_assoc()) 
       	
{	$tregid=strtoupper($row["tregid"]);
	$tname_b=strtoupper($row["tname_b"]);
	$trecom_b=strtoupper($row["trecom_b"]);
	$tname=strtoupper($row["tname"]);
	$trecom=strtoupper($row["trecom"]);
	$t_ph=strtoupper($row["t_ph"]);
	$t_addr=strtoupper($row["t_addr"]);$t_ps=strtoupper($row["t_ps"]);$t_dist=strtoupper($row["t_dist"]);

		echo "<tr>	<td> " ;
		  if (strpos($tregid, $usearch) !== false) {
			echo "<span style='background-color:red;color:white'>".$row["tregid"]."</span>";
}
		else{ echo"<p  >".$row["tregid"]."</p>";} 			
		
		echo "</td> <td>";
		  if (strpos($tname_b, $usearch) !== false) {
			echo "<span style='background-color:red;color:white'>".$row["tname_b"]."</span>";
}
		else{ echo"<p  >".$row["tname_b"]."</p>";} 	
		
		echo "</td> <td>";
		  if (strpos($trecom_b, $usearch) !== false) {
			echo "<span style='background-color:red;color:white'>".$row["trecom_b"]."</span>";
}
		else{ echo"<p  >".$row["trecom_b"]."</p>";}

		echo "</td> <td>";
		  if (strpos($tname, $usearch) !== false) {
			echo "<span style='background-color:red;color:white'>".$row["tname"]."</span>";
}
		else{ echo"<p  >".$row["tname"]."</p>";} 		
		
		echo "</td> <td>";
		  if (strpos($trecom, $usearch) !== false) {
			echo "<span style='background-color:red;color:white'>".$row["trecom"]."</span>";
}
		else{ echo"<p  >".$row["trecom"]."</p>";}

		echo "</td> <td>";
		  if (strpos($t_ph, $usearch) !== false) {
			echo "<span style='background-color:red;color:white'>".$row["t_ph"]."</span>";
}
		else{ echo"<p  >".$row["t_ph"]."</p>";}

		echo "</td> <td>";
		  if (strpos($t_addr, $t_ps, $t_dist, $usearch) !== false) {
			echo "<span style='background-color:red;color:white'>".$row["t_addr"].",&nbsp" .$row["t_ps"].",&nbsp ".$row["t_dist"]."</span>";
}
		else { echo"<p>".$row["t_addr"].",&nbsp" .$row["t_ps"].",&nbsp ".$row["t_dist"]."</p></td></tr>";
		
}		
		
}		echo "</table>" ;
}   else {
}
	
$connr->close();
?>

</body>
</html>