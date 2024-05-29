 
<style>

 
table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}

table {
	align:center;
	background-color: #EEDDDEE;
    box-shadow: 10px 10px 5px #888888;
    border-collapse: collapse;
    
}

th, td {
    padding: 2px;
}
</style>


 

 

<?php

   $q = $_GET['qnn'];
   
   
 
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT firstname FROM nname where firstname LIKE '".$q."%' ";
$result = $conn->query($sql);
 

$myArray=array();

if ($result->num_rows > 0) {
    echo "<table  ><tr><th>Similar Name</th><th>%</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
	 	$var=   $q;
 	$name= $row["nnn"];
		similar_text($var, $name, $percent); 
		
		
		 
	$npercent=round($percent);	
	
	 
 
	

if( $npercent>80) {
	 

$myArray[$name] = $npercent ;
  	
}	  	
		
    }
	
	arsort($myArray);
	
	foreach($myArray as $x => $x_value) {
   // echo "" . $x . " &nbsp <b style='color:blue'>" . $x_value."%</b> <br>";
	
	echo "<tr><td style='color:BLACK'> " .   $x."</td><td style='color:BLUE'>".$x_value."%  </td></tr>";
   
}
	
 echo "</table>";	 
	
	
} else {
   
}

$conn->close();
?> 

 