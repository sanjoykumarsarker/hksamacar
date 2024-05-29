<option>Post Office</option>
<?php

$sb_dist = preg_replace('/[0-9]+/', '', $_GET['q']);
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT suboffice, postcode FROM postoffices where district='$sb_dist' order by suboffice asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option>".$row['suboffice']."-".$row['postcode']."</option>";
 

        
    }
 } else {
 }
$conn->close();



 



?>