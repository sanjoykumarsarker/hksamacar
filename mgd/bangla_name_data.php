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

 
	</style>
	</head>
	
 
 
<body>

<?php

 
  $d =  $_POST['bbb'];
  
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
   nprefer ,istatus1,isinitiated,comments ,finalname,finalname_b 
   FROM reg WHERE templereg=$d ";
   
$resultr = $connr->query($sqlr);


if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	 	<th>English Name</th>	<th>Bangla Name</th>	<th>Click</th>   
	</tr>";
	
    // output data of each row
    while($row = $resultr->fetch_assoc())
	
	{
       	echo "<tr>
		 
		<form target='iframe1' action='bangla_name_data_one.php' method='POST'>
		
		<td class='panel panel-info'>".$row["finalname"]."</td>
		
		<td><input class='form-control'   type='text' name='finalname_b' value='".$row["finalname_b"]."'>
		<input   type='hidden' name='reg'    value='".$row["reg"]."'>
		</td>
	 <td>	<button   type='submit' class='btn btn-success' > OK</button></td>
		 
	 
		 
		</tr> </form>";
    }
    echo "</table>";
}   else {
}
$connr->close();
 

?>
 
<iframe name="iframe1" border="0px" height="opx" width="0px"></iframe>
</body>
</html>