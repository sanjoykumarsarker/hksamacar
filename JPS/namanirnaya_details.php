<?php session_start();
include "function.php";
?>
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
     width: 100%;
}

td {
    border: 2px solid #dddddd;
 }

th {
    border: 1px solid #dddddd;
    text-align: center;
 }
.tbutton {
 
	color:blue;
}

 
	</style>
	</head>
<body>

<?php
  $d =  $_POST['edit'];
  
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
   mstatus,spouse_id,spouse_name,
   nprefer,nchoice1,nchoice2,
  isinitiated,finalname,result_viva
   FROM reg WHERE templereg=$d and isinitiated!='Initiated' and isinitiated!='Absent' and result_viva='fit' ";
   
$resultr = $connr->query($sqlr);


if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>Reg</th>	 	<th>Name</th><th>Spouse</th>	<th>Age</th>	 
	 	<th>Gender</th>		 
	<th>Status</th>	
    <th>Lila</th>
    <th>C-1</th>
    <th>C-2</th>
    <th>C-3</th>


    <th>Finalname</th>


	</tr>";
	
    // output data of each row
    while($row = $resultr->fetch_assoc())
	
	{
       	echo "<tr>
		<td>
		<form target='_blank' action='devedit.php' method='POST'>
		<button name='edit' class= 'tbutton' type='submit' value=".$row["reg"]." > ".$row["reg"]."</button>
		</form></td>
		 	<td>".$row["ename"]."</td>

		 	<td>".$row["spouse_name"].ename($row["spouse_id"])."</td>
 
            <td style='text-align:center' >".$row["age"]."</td> 	 	 
       <td style='text-align:center' >".$row["gender"]."</td>	
 		<td style='text-align:center' >".$row["mstatus"]."</td>
        <td style='text-align:center' >".$row["nprefer"]."</td> 
        
        <td style='text-align:center' >".$row["nchoice1"]."</td>
        <td style='text-align:center' >".$row["nchoice2"]."</td>
        <td style='text-align:center' >".$row["nchoice3"]."</td>

        <td style='text-align:center' >".$row["finalname"]."</td>


		</tr>";
    }
    echo "</table>";
}   else {
}
$connr->close();
 

?>


</body>
</html>