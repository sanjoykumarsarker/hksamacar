 
<style>

 
table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}

table {
	align:center;
	background-color: #fbe9e7;
     box-shadow: 2px 2px 2px #888888;
     border-collapse: collapse;
    
}

th, td {
    padding: 2px;
}
</style>


 

 

<?php

   $q = $_GET['qnn'];
   
   if(str_word_count($q)==2){
	   
	   
		   
	 
$a=  stristr($q," " );


$q=substr($a,1);   

   
   }
    if(str_word_count($q)==3){
	   
	   
		   
	 
$a0=  stristr($q," " );


$q0=substr($a0,1); 
$a=  stristr($q0," " );


$q=substr($a,1);  


   }
   
   
   

	   
	   
	   
 
 
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

$sql = "SELECT nnn FROM ttt where nnn LIKE '".$q."%' ";
$result = $conn->query($sql);
 

 

if ($result->num_rows > 0) {
    echo "<table class='table ' ><tr><th>Predicted Name</th> </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
	 
   // echo "" . $x . " &nbsp <b style='color:blue'>" . $x_value."%</b> <br>";
	
	echo "<tr><td style='color:BLACK'> " .   $row['nnn']."</td> </tr>";
   
 


	}
 	
 echo "</table>";	 
	
	
} else {
    echo "0 results";
}

$conn->close();
?> 

 