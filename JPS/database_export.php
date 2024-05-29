<?php



$DB_HOST = "localhost";
$DB_USER = "sanpro_hksamacar";
$DB_PASS = "01915876543";
$DB_NAME = "sanpro_diksa";

$con = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if($con->connect_errno > 0) {
  die('Connection failed [' . $db->connect_error . ']');
}

$tableName  = 'reg';
$backupFile = 'etc/yourtable111.sql';
$query      = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";
$result = mysqli_query($con,$query);
?>