<?php



function temple_id_to_temple_name($a){
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
// Create connection
	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT temple_en_name, temple_address, temple_city,temple_province,temple_country_name FROM temple where temple_id=$a";
$result = $conn->query($sql);

 
     // output data of each row
   $row = $result->fetch_assoc() ;
       return  $row["temple_en_name"].",".$row["temple_address"].",".$row["temple_city"].",".$row["temple_province"].",".$row["temple_country_name"];
    
   
$conn->close();



}





?>