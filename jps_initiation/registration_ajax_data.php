 <?php

 
$a = explode(",", $_GET["q"]);
echo $a[0];
echo  $a[1];
 
 $c="bdman";
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

$sql = "UPDATE registration SET father_name= 'kkkkff ',".$a[1]."= '".$a[0]."'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


   ?>