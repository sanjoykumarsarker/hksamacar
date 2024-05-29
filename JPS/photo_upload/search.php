<?php
require_once('db.php');

$db = new Database();

function search($image_id)
{    
    global $db;
    return $db->getRow("SELECT bname,imagename FROM reg WHERE image_id = $image_id");    
}
$name = search($_POST['name']);

if ($name) {
    echo json_encode($name);
} else {
    echo json_encode(["Not found..."]);
}


?>