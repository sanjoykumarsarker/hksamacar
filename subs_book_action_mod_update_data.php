<!DOCTYPE html>
<html>
<head>

<title>Subscriber Book</title>
  <meta charset="utf-8">
 <link rel="shortcut icon" href="favicon1.ico" />
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 
</head>
<?php
include_once "session_check.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$user=$_SESSION["id"];
  
$id=$_POST["id"];
$status=$_POST["status"];
$skip=$_POST["skip"];

$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $conn->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
    $conn->query('SET NAMES "utf8"'); 
    // prepare sql and bind parameters
   /*
   $stmt = $conn->prepare("INSERT INTO tblMem (ID,ID_EN,Name,vill,po,ps,dist,cont,phone,mob,email,comment,paymode,ag_quantity)
    VALUES (:ID,:ID_EN,:Name,:vill,:po,:ps,:dist,:cont,:phone,:mob,:email,:comment,:paymode,:ag_quantity)");
*/
        $stmt = $conn->prepare("UPDATE tblMem SET status=:status,ag_quantity=:ag_quantity,skip=:skip,user=:user WHERE ID_EN=:ID_EN");
                $stmt->bindParam(':ID_EN', $id);
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':ag_quantity', $quantity);     
                $stmt->bindParam(':skip', $skip);
                $stmt->bindParam(':user', $user);
                $stmt->execute();

                $skipped = $skip?"<p>SKIPPED FOR: $skip MONTH</p>":'';
        echo '<div class="mt-4 alert" role="alert">
        <h4 class="alert-heading">Successfull</h4>
        <p class="mt-4">'.$id.'- STATUS UPDATED: '.$status.'</p>
        '.$skipped.'
        <hr class="mb-0 border-2">
        <p class="text-success text-muted mb-0">'.date('d-m-Y H:i:s').'</p>
      </div>';
    }
catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
$conn = null;
$conn_trans = null;
 

?>  