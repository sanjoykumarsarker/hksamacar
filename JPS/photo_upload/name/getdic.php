<?php
require_once "../db.php";

$db = new Database();

$all = $db->mysqli->query("SELECT DISTINCT finalname, finalname_b FROM reg31012020 WHERE finalname_b IS NOT NULL");

$res = [];
while ($row = $all->fetch_assoc() ) {
    $names = explode(' ', $row['finalname']);    
    $res[] = ['en'=>$row['finalname'], 'bn'=>$row['finalname_b']];
}

echo json_encode($res);

?>