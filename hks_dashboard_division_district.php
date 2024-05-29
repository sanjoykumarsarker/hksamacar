<?php
function make_connection(){
    $servername = "localhost";
    $username = "HKSamacar_local";
    $password = "Jpsk/1866";
    $dbname = "HareKrishnaSamacar";

    $connection = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($connection,"utf8");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    if ($connection) {
        return $connection;
    }
}
$DB = make_connection();

$division_3 = $DB->query("SELECT id, bn_name FROM `districts` WHERE division_id = 3");
    while ($dhaka_division = $division_3->fetch_assoc()) {                                                              
    echo "<tr>
    <td>".$dhaka_division['id']."</td>
    <td>".$dhaka_division['bn_name']."</td>
    <td>1200</td>
    </tr>";
}
?>