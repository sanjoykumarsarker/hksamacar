<?php
include_once "session_check.php";
include_once "function.php";

$connection = make_connection();
$postage = $_POST['postage'];
$transaction_id = $_POST['transaction_id'];
$consignment_id = $_POST['consignment_id'];
$res = [];

$sql = "UPDATE tblIssue SET postage=$postage, VPNo=$consignment_id WHERE transaction_id=$transaction_id";

if ($connection->query($sql) === TRUE) {    
    $res['message'] =  true;
    // header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    // echo "Error updating record: " . $connection->error;
    $res['message'] =  false;
}

echo json_encode($res);
// header("location:javascript://history.go(-1); location.reload();");
