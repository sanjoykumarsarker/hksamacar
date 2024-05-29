<?php
require_once "../db.php";

$db = new Database();

$all = $db->mysqli->query("SELECT DISTINCT finalname FROM reg LIMIT 100,100");
// $all = $db->mysqli->query("SELECT DISTINCT nnn FROM `ttt` LIMIT 49832");
$res = [];
while ($row = $all->fetch_assoc() ) {
    $res[] = $row['finalname'];
    // $res[] = $row['nnn'];
}

echo json_encode(array_filter($res));

?>