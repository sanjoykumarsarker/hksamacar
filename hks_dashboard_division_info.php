<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function make_connection()
{
    $servername = "localhost";
    $username = "HKSamacar_local";
    $password = "Jpsk/1866";
    $dbname = "HareKrishnaSamacar";

    $connection = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($connection, "utf8");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    if ($connection) {
        return $connection;
    }
}
$DB = make_connection();

$id = 3;
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

$districts = [];
// ID_EN in where clause return either agent or subscriber
// $total_query = $DB->query("SELECT SUM(ag_quantity) AS total, dist FROM tblMem WHERE ID_EN<10000 AND status='CONT' GROUP BY Dist ");
$total_query = $DB->query("SELECT SUM(ag_quantity) AS total, dist FROM tblMem WHERE status='CONT' GROUP BY dist ");

while ($row = $total_query->fetch_assoc()) {
    $dist = preg_replace('/\d/', '', $row['dist']);
    $districts[$dist] = $row['total'];
}

$division_3 = $DB->query("SELECT id, bn_name, district_name FROM `districts` WHERE division_id = $id");


while ($dhaka_division = $division_3->fetch_assoc()) {
    echo "<tr  data-toggle='collapse' data-target='#collapse" . $dhaka_division['district_name'] . "' aria-expanded='false' aria-controls='collapse" . $dhaka_division['district_name'] . "'>
    <td>" . $dhaka_division['id'] . "</td>
    <td>" . $dhaka_division['bn_name'] . "</td>
    <td>" . ($districts[$dhaka_division['district_name']] ?? 'No') . "  ";

    echo "</td>
    </tr>
    <tr id='collapse" . $dhaka_division['district_name'] . "' class='collapse bg-light' aria-labelledby='heading" . $dhaka_division['id'] . "' data-parent='#division_info'>
    <td colspan='3'><ul class='list-group slimscroll' style='max-height:280px;overflow-y:scroll;'>";
    $thana_query = $DB->query("SELECT SUM(ag_quantity) AS total, ps FROM tblMem WHERE status='CONT' AND dist='" . $dhaka_division['id'] . $dhaka_division['district_name'] . "' GROUP BY ps");

    $d_id = $dhaka_division['id'];
    $thana_names = $DB->query("SELECT upazila_name, bn_name FROM upazilas WHERE district_id='$d_id'");

    $thana_index = 1;
    $thana_info = [];

    while ($thana_result = $thana_query->fetch_assoc()) {
        // $thana_info[trim(preg_replace('/upazilla/i', '', strtolower($thana_result['ps'])))] = $thana_result['total'];
        $thana_amount = $thana_result['total'] ?? 0;
        $thana_class = $thana_amount > 0 ? 'badge badge-primary' : '';
        echo "<li class='list-group-item d-flex justify-content-between align-items-center'> <div>" . $thana_index . ". " . $thana_result['ps'] . "</div>
<div class='$thana_class'>$thana_amount</div></li>";
        $thana_index += 1;
    }
    //     while ($thana = $thana_names->fetch_assoc()) {
    //         //     echo "<li class='list-group-item d-flex justify-content-between align-items-center'> <div>" . $thana_index . ". " . $thana_info['ps'] . "</div>
    //         //  <div>" . $thana_info['total'] . "</div></li>
    //         //   ";
    //         $up = trim(preg_replace('/upazilla/i', '', strtolower($thana['upazila_name'])));
    //         $thana_amount = $thana_info[$up] ?? 0;
    //         $thana_class = $thana_amount > 0 ? 'badge badge-primary' : '';
    //         echo "<li class='list-group-item d-flex justify-content-between align-items-center'> <div>" . $thana_index . ". " . $thana['bn_name'] . "</div>
    // <div class='$thana_class'>$thana_amount</div></li>";
    //         $thana_index += 1;
    //     }
    echo "</ul></td></tr>";
}
// var_dump($districts);
echo "<script>
localStorage.setItem('districts', JSON.stringify(" . json_encode($districts) . "))
</script>";
