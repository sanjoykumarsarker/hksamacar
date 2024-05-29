<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Enter Bengali Name</title>
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


<div class="container">

<br><br><br>

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
     die("Connection failed:" . $connr->connect_error);
}
 
  
$sqlr = "SELECT tname,t_addr, t_dist from tmpl where tregid='$d' ";
  $resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {
   
  
  // output data of each row
    while($row = $resultr->fetch_assoc()) {
        echo "<h3 style=' text-align:center;color:purple; '><u> ". $row["tname"].",&nbsp".$row["t_addr"].",&nbsp".$row["t_dist"]." </u></h3> <br><br>";
    }
     
} else {
  echo "No---Result";     
}
$connr->close();


 
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
   nprefer ,postponed,listed,absent,comments ,finalname,finalname_b 
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
	 <td width='10px'>	<button type='submit' class='btn btn-success' > OK</button></td>
		 
	 
		 
		</tr> </form>";
    }
    echo "</table>";
}   else {
}
$connr->close();
?>
</div>
<br><br>
    <footer>
            <div class="row">
                <div class="col-lg-12" style= "text-align:center;cursor:pointer;">
                    <Span style="padding:10px">Copyright &copy; hksamacar 2017</span>
                    <Span style="padding:10px"> <a href="indexn.php" target="_self" > Go To Home </a> </span>
                </div>
            </div>
    </footer>
<iframe name="iframe1" border="0px" height="0px" width="0px"></iframe>
</body>
</html>