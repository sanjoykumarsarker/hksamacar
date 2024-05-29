 <?php


$servername = "localhost";
$username = "root";
$password = "1866";
$dbname = "HareKrishnaSamacar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 mysqli_set_charset($conn,"utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Name, Org, mob FROM tblMem";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["Org"]." ".$row["mob"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?> 
