<option>Police Station</option>
<?php
include_once "function.php";
$sb_dist = intval($_GET['q']);
 
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,district_id, upazila_name FROM upazilas where district_id='$sb_dist' order by upazila_name asc ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
    while($row = $result->fetch_assoc()) {
  
        echo "<option value =".$row['upazila_name'].">".ps_en_bn($row['upazila_name'])."</option>";

        
    }
 } else {
 }
$conn->close();



 



?>