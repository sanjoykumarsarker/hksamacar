<?php

include_once "session_check.php";
session_start();
  $id="-".$_SESSION["id"];
  

    $si=$_POST["si"];

    $notes=$_POST["notes"];



 date_default_timezone_set("Asia/Dhaka");
 $time= date("m/d/Y h:i:sa")."by".$id;
 $rdate= date("m/d/Y");



 
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
     $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $conn->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
    $conn->query('SET NAMES "utf8"'); 
    // prepare sql and bind parameters
   /*
   $stmt = $conn->prepare("INSERT INTO tblMem (ID,ID_EN,Name,vill,po,ps,dist,cont,phone,mob,email,comment,paymode,ag_quantity)
    VALUES (:ID,:ID_EN,:Name,:vill,:po,:ps,:dist,:cont,:phone,:mob,:email,:comment,:paymode,:ag_quantity)");
*/

$stmt = $conn->prepare("update notes set  notes =:notes ,id=concat(id,:id),time=concat(time,:time) where si=:si");




    
$stmt->bindParam(':id', $id);

    $stmt->bindParam(':si', $si);
    $stmt->bindParam(':notes', $notes);
 
    $stmt->bindParam(':time', $time);

 
    $stmt->execute();   echo "     Updated   ";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
  
$conn_trans = null;
 

?>  