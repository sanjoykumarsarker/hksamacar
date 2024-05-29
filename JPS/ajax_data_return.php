
<?php
$a = $_GET['q'];
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

  
$sqld = "SELECT  ename FROM reg where reg='$a'";
$resultd = $conn->query($sqld);
 

    // output data of each row
     



    if ($resultd->num_rows > 0) {
        // output data of each row
        while($row = $resultd->fetch_assoc()) {
            echo $row["ename"];
        }
      } else {
      //  echo "NO result";
      }
      $conn->close();

?>