<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";

try {
    $conn = new PDO("mysql:host=$servername;dbname=HareKrishnaSamacar", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = $conn->prepare("SELECT id, district_name FROM districts order by district_name asc");
$sql->execute();

$result = $sql->setFetchMode(PDO::FETCH_ASSOC);


echo "<table>";
foreach($sql->fetchAll() as $k=>$v) {
    echo $v['district_name'];
}
echo "</table>";


?>

<h1>Hello</h1>