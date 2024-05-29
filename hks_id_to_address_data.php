<?php

  
  $id=$_GET["q"];



$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";

// Create connection


 

// Create connection
$conn_id = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_id->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn_id,"utf8");
$sql_id = "SELECT Name,Org,vill,po,dist,mob,email,ag_quantity,status,balance FROM tblMem where ID_EN =$id";
$result_id = $conn_id->query($sql_id);

if ($result_id->num_rows > 0) {
    // output data of each row
    $row = $result_id->fetch_assoc();
       
         echo $row["Name"]."@#".$row["Org"]. $row["vill"].$row["po"].$row["dist"]."@#".$row["mob"];


} else {
    echo "0 results";
}
$conn_id->close();



?>