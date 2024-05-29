<!DOCTYPE html>
<html>
<body>
 <?php
 
  $value1 = $_POST['name'];
 $value2 = $_POST['edu'];
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO MyGuests (id,firstname, lastname)
VALUES (28466, '$value1','$value2')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 

</body>
</html>